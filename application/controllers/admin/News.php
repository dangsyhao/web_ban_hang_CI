<?php
Class News extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
		
        //load ra file model
        $this->load->model('news_model');
    }
    
    /*
     * Hien thi danh sach san pham
     */
	 
    function index()
    {
		
        //lay tong so luong ta ca cac san pham trong websit
		$input=array();
		$input['order by']='id';
        $total_rows = $this->news_model->get_total($input);
        $this->data['total_rows'] = $total_rows;
        
        //load ra thu vien phan trang
        $this->load->library('pagination');
        $config = array();
        $config['total_rows'] = $total_rows;//tong tat ca cac san pham tren website
        $config['base_url']   = admin_url('news/index'); //link hien thi ra danh sach san pham
        $config['per_page']   = 5;//so luong san pham hien thi tren 1 trang
        $config['uri_segment'] = 4;//phan doan hien thi ra so trang tren url
        $config['next_link']   = 'Trang kế tiếp';
        $config['prev_link']   = 'Trang trước';
        //khoi tao cac cau hinh phan trang
        $this->pagination->initialize($config);
        
        $segment = $this->uri->segment(4);
        $segment = intval($segment);
        
        $input = array();
        $input['limit'] = array($config['per_page'], $segment);
        
        
        //lay danh sach san pham
        $list = $this->news_model->get_list($input);
        $this->data['list'] = $list;
		

        //lay nội dung của biến message
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        
        //load view
        $this->data['temp'] = 'admin/news/index';
        $this->load->view('admin/main', $this->data);
		
    }

	public function add(){
		
 		$this->load->helper('form');
		$this->load->helper('uploads');
		
		if($this->input->post()){
			
			// up 01 anh
			$image_path ="./uploads/news";
			$image_name ="image";
			$image_link = array();
			$image_link = up_image($image_path,$image_name);

			
			//Kiem tra nhap du lieu !
			$this->load->library("form_validation");

			$this->form_validation->set_rules("title" ,"Tên bài viết" , "required");
			$this->form_validation->set_rules("content" ,"Nội dung bài viết" , "required");
			
			if($this->form_validation->run()==TRUE){
	
             //them vao csdl
       
                $data=array(
				
				    'title'        => $this->input->post('title'),
					'image_link'   => $image_link['file_name'],
				    'intro'        => $this->input->post('intro'),
					'meta_desc'    => $this->input->post('meta_desc'),
					'meta_key'     => $this->input->post('meta_key'),
					'content'      => $this->input->post('content'),
					
               		);
					
				
                if($this->news_model->create($data))
                { 
                    //tạo ra nội dung thông báo
                    $this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
					redirect(admin_url('news'));

                }else{
                    $this->session->set_flashdata('message', 'Không thêm được');
					//chuyen tới trang danh sách San Pham
                	redirect(admin_url('news/add'));
                }

          	}
		}

		//Load view
		$this->data['temp']='admin/news/add';
		$this->load->view('admin/main',$this->data);
		

	}
	
	//
	
	function update(){
		
		//lay id san pham 
		$id=$this->uri->segment('4');
		$id=intval($id);

		//gui $id sang view
		$row= $this->news_model->get_info($id);
		$this->data['row']=$row;
		
		//update Data
		
		if($this->input->post()){
			
			//
			$this->load->helper('uploads');
			
			//
			$id=$this->input->post('id');
			
			// up 01 anh
			$image_path ="./uploads/news";
			$image_name ="image";
			$image_link = array();
			$image_link = up_image($image_path,$image_name);

			
			//Kiem tra nhap du lieu !
			$this->load->library("form_validation");

			$this->form_validation->set_rules("title" ,"Tên bài viết" , "required");
			$this->form_validation->set_rules("content" ,"Nội dung bài viết" , "required");
			
			if($this->form_validation->run()==TRUE){
	
             //them vao csdl
       
                $input=array(
				
				    'title'        => $this->input->post('title'),
					'image_link'   => $image_link['file_name'],
				    'intro'        => $this->input->post('intro'),
					'meta_desc'    => $this->input->post('meta_desc'),
					'meta_key'     => $this->input->post('meta_key'),
					'content'      => $this->input->post('content'),
					
               		);
			
					
					//			
				if(count($image_link['file_name'])<1){
					
					unset($input['image_link']);
				
				}
				
					
				if($this->news_model->update($id,$input)==TRUE )
				{ 
					//tạo ra nội dung thông báo
					$this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
					redirect(admin_url('news'));
	
				}else{
					$this->session->set_flashdata('message', 'Không thêm được');
					//chuyen tới trang danh sách San Pham
					redirect(admin_url("news/update".$row->id));
				}
			}//validate
			
		}//for

		//Load view
		$this->data['temp']='admin/news/update';
		$this->load->view('admin/main',$this->data);

		

	}
	

	//xoa san pham
	function del_select(){

		//
		$id_array =array();
		$id_array =isset($_POST['ids'])?$_POST['ids']:FALSE ;

		for($i=0;$i<=count($id_array)-1;$i++){
				
				//láy thông tin sản phẩm
			$row= $this->news_model->get_info($id_array[$i]);	
					
					// xoa thong tin sp
			if($this->news_model->delete($id_array[$i])==TRUE){
				
					//xoa file 1 anh 
				
				$image_link = "./uploads/news/".$row->image_link;
				
				if(file_exists("./uploads/news/".$row->image_link)){
					unlink($image_link);
				}
				
				//xoa file nhieu anh 
	
				$image_array = json_decode($row->image_list);
				
				foreach($image_array as $image_obj){
					
					$image_link="./uploads/news/".$image_obj->file_name ;
					
					if(file_exists("./uploads/news/".$image_obj->file_name)){
						
						unlink($image_link);
					}
				
				}//foreach

				$this->session->set_flashdata('message', 'Xóa dữ liệu thành công !');
			
			}else{
				$this->session->set_flashdata('message', 'Xóa dữ liệu thất bại');
				
			}
			

		}//for


		
	}
	
	
	
	
}