<?php
Class Slide extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
		
        //load ra file model
        $this->load->model('slide_model');
    }
    
    /*
     * Hien thi danh sach san pham
     */
	 
    function index()
    {

        //lay danh sach san pham
		$input=array("order by"=>"id");
		
        $list = $this->slide_model->get_list($input);
        $this->data['list'] = $list;

       
        //lay nội dung của biến message
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        
        //load view
        $this->data['temp'] = 'admin/slide/index';
        $this->load->view('admin/main', $this->data);
		
    }
	
	//
	
	public function add(){
		
 		$this->load->helper('form');
		$this->load->helper('uploads');
		
		if($this->input->post()){
			
			// up 01 anh
			$image_path ="./uploads/slide";
			$image_name ="image";
			$image_link = array();
			$image_link = up_image($image_path,$image_name);

			//Kiem tra nhap du lieu !
			$this->load->library("form_validation");

			$this->form_validation->set_rules("name" ,"Tên sản phẩm" , "required");
			$this->form_validation->set_rules("link" ,"Đường dẫn" , "required");
		
			if($this->form_validation->run()==TRUE){
	
             //them vao csdl
       
                $data=array(
					'name'         => $this->input->post('name'),
					'image_link'   => $image_link['file_name'],
                    'link'         =>($this->input->post('link')),

               		);
					
				
                if($this->slide_model->create($data))
                { 
                    //tạo ra nội dung thông báo
                    $this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
					redirect(admin_url('slide/index'));

                }else{
                    $this->session->set_flashdata('message', 'Không thêm được');
					//chuyen tới trang danh sách San Pham
                	redirect(admin_url('slide/add'));
                }

          	}
		}

		
		//Load view
		$this->data['temp']='admin/slide/add';
		$this->load->view('admin/main',$this->data);
		

	}
	
	//
	
	function update(){
		
		//lay id san pham 
		$id=$this->uri->segment('4');
		$id=intval($id);

		//gui $id sang view
		$row= $this->slide_model->get_info($id);
		$this->data['row']=$row;
		
		//update Data
		
		if($this->input->post()){
			
			//
			$this->load->helper('uploads');
			
			//
			$id=$this->input->post('id');
			
		// up 01 anh
			$image_path ="./uploads/slide";
			$image_name ="image";
			$image_link = array();
			$image_link = up_image($image_path,$image_name);

			//Kiem tra nhap du lieu !
			$this->load->library("form_validation");

			$this->form_validation->set_rules("name" ,"Tên sản phẩm" , "required");
			$this->form_validation->set_rules("link" ,"Đường dẫn" , "required");
		
			if($this->form_validation->run()==TRUE){
	
             //them vao csdl
       
                $input=array(
					'name'         => $this->input->post('name'),
					'image_link'   => $image_link['file_name'],
                    'link'         =>($this->input->post('link')),

               		);
						
				//			
				if(count($image_link['file_name'])<1){
					
					unset($input['image_link']);
				
				}
	
				if($this->slide_model->update($id,$input)==TRUE){
					
					$this->session->set_flashdata('message', 'Sữa dữ liệu thành công');
					redirect(admin_url('slide'));
					
				}else{
					$this->session->set_flashdata('message', 'Sữa dữ liệu thất bại');
					
					redirect(admin_url("slide/update/".$row->id));
					
				}
			
			}
		

		}//Post


		//Load view
		$this->data['temp']='admin/slide/update';
		$this->load->view('admin/main',$this->data);
		
		
	}
	
	
	
	
	//xoa san pham
	
	function delete(){
		
		//
		$id=$this->uri->segment('4');
		$id=intval($id);
		
		//
		//láy thông tin sản phẩm
		$row= $this->slide_model->get_info($id);
		

		// xoa thong tin sp
		if($this->slide_model->delete($id)==TRUE){
			
				//xoa file 1 anh 
			
			$image_link = "./uploads/slide/".$row->image_link;
			
			if(file_exists("./uploads/slide/".$row->image_link)){
				unlink($image_link);
			}


			//
			$this->session->set_flashdata('message', 'Xóa dữ liệu thành công !');
				redirect(admin_url("slide"));
			
		}else{
			$this->session->set_flashdata('message', 'Xóa dữ liệu thất bại');
				redirect(admin_url("slide"));
		}
		
		
		
	}//
	


	
}