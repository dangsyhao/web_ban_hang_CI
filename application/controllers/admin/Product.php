<?php
Class Product extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
		
        //load ra file model
        $this->load->model('product_model');
		
		$this->load->model('catalog_model');
		$this->load->model('maker_model');
		$this->load->model('category_model');
    }
    
    /*
     * Hien thi danh sach san pham
     */
	 
    function index()
    {
		$this->data['image_json']='';
		
        //lay tong so luong ta ca cac san pham trong websit
        $total_rows = $this->product_model->get_total();
		$this->data['total_rows'] = $total_rows;

        //load ra thu vien phan trang
        $this->load->library('pagination');
        $config = array();
        $config['total_rows'] = $total_rows;//tong tat ca cac san pham tren website
        $config['base_url']   = admin_url('product/index'); //link hien thi ra danh sach san pham
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
		
		//lay danh sach danh muc san pham

        $input = array();
        $input['order'] = array('id','DESC');
		
        $catalogs_data = $this->catalog_model->get_list($input);
        $maker_data = $this->maker_model->get_list($input);
		$category_data = $this->category_model->get_list($input);
		
		$this->data['catalogs_data'] = $catalogs_data;
		$this->data['maker_data'] = $maker_data;
		$this->data['category_data'] = $category_data;

        
        //kiem tra co thuc hien loc du lieu hay khong
		
		$date_order = $this->input->get('date-order');
		if($date_order !='')
		{
		   $input['like'] = array('created'=>$date_order);
		}

		
		$maker_id = $this->input->get('maker_id');
		if($maker_id !='')
		{
		   $input['like'] = array('maker_id'=>$maker_id);
		}
		
		$cate_id = $this->input->get('cate_id');
		if($cate_id !='')
		{
		   $input['where'] = array('cate_id'=>$cate_id);
		}

    
        //lay danh sach san pham
        $list = $this->product_model->get_list($input);
        $this->data['list'] = $list;

        //lay nội dung của biến message
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        
        //load view
        $this->data['temp'] = 'admin/product/index';
        $this->load->view('admin/main', $this->data);
		
    }
	
	//
	
	public function add(){
		
 		$this->load->helper('form');
		$this->load->helper('uploads');
		
		if($this->input->post()){
			
			// up 01 anh
			$image_path ="./uploads/product";
			$image_name ="image";
			$image_link = array();
			$image_link = up_image($image_path,$image_name);
			
			// up nhieu  anh
			$image_name="image_list";
			$image_list= up_image_list($image_path,$image_name);
			
			//Kiem tra nhap du lieu !
			$this->load->library("form_validation");

			$this->form_validation->set_rules("name" ,"Tên sản phẩm" , "required");
			$this->form_validation->set_rules("price" ,"Gía sản phẩm" , "required");
			$this->form_validation->set_rules("catalog_id" ,"Danh mục sản phẩm" , "required");
			$this->form_validation->set_rules("catalog_id" ,"Danh mục sản phẩm" , "required");
			$this->form_validation->set_rules("maker_id" ,"Nhà sản xuất" , "required");
			$this->form_validation->set_rules("cate_id" ,"Loại sản phẩm" , "required");
		
			if($this->form_validation->run()==TRUE){
	
             //them vao csdl
       
                $data=array(
				
					'catalog_id'   => $this->input->post('catalog_id'),
					'maker_id'     => $this->input->post('maker_id'),
					'cate_id'   => $this->input->post('cate_id'),
					'name'         => $this->input->post('name'),
					'image_link'   => $image_link['file_name'],
					'image_list'   => $image_list,
                    'price'        => intval($this->input->post('price')),
                    'discount'     => $this->input->post('discount'),
					'warranty'     => $this->input->post('warranty'),
					'gifts'        => $this->input->post('sale'),
					'meta_desc'    => $this->input->post('meta_desc'),
					'meta_key'     => $this->input->post('meta_key'),
					'content'      => $this->input->post('content'),
					'site_title'   => $this->input->post('site_title'),
					'created'  	   => now_format(),
					
               		);
					
				
                if($this->product_model->create($data))
                { 
                    //tạo ra nội dung thông báo
                    $this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
					redirect(admin_url('product'));

                }else{
                    $this->session->set_flashdata('message', 'Không thêm được');
					//chuyen tới trang danh sách San Pham
                	redirect(admin_url('product/add'));
                }

          	}
		}
        
		
		//lay danh sach danh muc san pham

        $input = array();
        $input['order'] = array('id','DESC');
		
        $catalogs_data = $this->catalog_model->get_list($input);
        $maker_data = $this->maker_model->get_list($input);
		$category_data = $this->category_model->get_list($input);
		
		//pre($maker_data);
		
        $this->data['catalogs_data'] = $catalogs_data;
		$this->data['maker_data'] = $maker_data;
		$this->data['category_data'] = $category_data;
		
		//Load view
		$this->data['temp']='admin/product/add';
		$this->load->view('admin/main',$this->data);
		

	}
	
	//
	
	function update(){
		
		//lay id san pham 
		$id=$this->uri->segment('4');
		$id=intval($id);

		//LOAD data danh muc san pham
       		
		$row= $this->product_model->get_info($id);
        $catalogs_data = $this->catalog_model->get_info($row->catalog_id);
        $maker_data = $this->maker_model->get_info($row->maker_id);
		$category_data = $this->category_model->get_info($row->cate_id);
		
		//Send DATA sang View;
		
        $this->data['catalogs_data'] = $catalogs_data;
		$this->data['maker_data'] = $maker_data;
		$this->data['category_data'] = $category_data;
		
		$this->data['row']=$row;
		
		//update Data
		
		if($this->input->post()){
			
			//
			$this->load->helper('uploads');
			
			//
			$id=$this->input->post('id');
			
			
		// up 01 anh
			$image_path ="./uploads/product";
			$image_name ="image";
			$image_link = array();
			$image_link = up_image($image_path,$image_name);
			
			// up nhieu  anh
			$image_name="image_list";
			$image_list= up_image_list($image_path,$image_name);
			
			//Kiem tra nhap du lieu !
			$this->load->library("form_validation");

			$this->form_validation->set_rules("name" ,"Tên sản phẩm" , "required");
			$this->form_validation->set_rules("price" ,"Gía sản phẩm" , "required");
			$this->form_validation->set_rules("catalog_id" ,"Danh mục sản phẩm" , "required");
			$this->form_validation->set_rules("catalog_id" ,"Danh mục sản phẩm" , "required");
			$this->form_validation->set_rules("maker_id" ,"Nhà sản xuất" , "required");
			$this->form_validation->set_rules("cate_id" ,"Loại sản phẩm" , "required");
		
			if($this->form_validation->run()==TRUE){

				 //them vao csdl
		   
					$input=array(
						'catalog_id'   => $this->input->post('catalog_id'),
						'maker_id'     => $this->input->post('maker_id'),
						'cate_id'   => $this->input->post('cate_id'),
						'name'         => $this->input->post('name'),
						'name'         => $this->input->post('name'),
						'image_link'   => $image_link['file_name'],
						'image_list'   => $image_list,
						'price'        => intval($this->input->post('price')),
						'discount'     => $this->input->post('discount'),
						'warranty'     => $this->input->post('warranty'),
						'gifts'        => $this->input->post('sale'),
						'meta_desc'    => $this->input->post('meta_desc'),
						'meta_key'     => $this->input->post('meta_key'),
						'content'      => $this->input->post('content'),
						'site_title'   => $this->input->post('site_title'),
						'created'  	   => now_format(),
						);
							
				//			
				if(count($image_link['file_name'])<1){
					
					unset($input['image_link']);
				
				}
				
				if($image_list =='[]'){
					
					unset($input['image_list']);
				
				} 	 	
				
			
				if($this->product_model->update($id,$input)==TRUE){
					
					$this->session->set_flashdata('message', 'Sữa dữ liệu thành công');
					redirect(admin_url('product'));
					
				}else{
					$this->session->set_flashdata('message', 'Sữa dữ liệu thất bại');
					
					redirect(admin_url('product'));
					
				}
			
			
			}//VALIDATE
		

		}//Post
		

		//Load view
		$this->data['temp']='admin/product/update';
		$this->load->view('admin/main',$this->data);
		
		
	}//end
	
	
	
	
	//xoa san pham
	
	function delete(){
		
		//
		$id=$this->uri->segment('4');
		$id=intval($id);
		
		//
		//láy thông tin sản phẩm
		$row= $this->product_model->get_info($id);
		

		// xoa thong tin sp
		if($this->product_model->delete($id)==TRUE){
			
				//xoa file 1 anh 
			
			$image_link = "./uploads/product/".$row->image_link;
			
			if(file_exists("./uploads/product/".$row->image_link)){
				unlink($image_link);
			}
			
			//xoa file nhieu anh 

			$image_array = json_decode($row->image_list);
			
			foreach($image_array as $image_obj){
				
				$image_link="./uploads/product/".$image_obj->file_name ;
				
				if(file_exists("./uploads/product/".$image_obj->file_name)){
					
					unlink($image_link);
				}
			
			}

			//
			$this->session->set_flashdata('message', 'Xóa dữ liệu thành công !');
			redirect(admin_url('product'));
			
		}else{
			$this->session->set_flashdata('message', 'Xóa dữ liệu thất bại');
			redirect(admin_url('product/delete'));
		}
		
	
		
	}
	

	function del_select(){

		//
		$id_array =array();
		$id_array =isset($_POST['ids'])?$_POST['ids']:FALSE ;

		for($i=0;$i<=count($id_array)-1;$i++){
				
				//láy thông tin sản phẩm
			$row= $this->product_model->get_info($id_array[$i]);	
					
					// xoa thong tin sp
			if($this->product_model->delete($id_array[$i])==TRUE){
				
					//xoa file 1 anh 
				
				$image_link = "./uploads/product/".$row->image_link;
				
				if(file_exists("./uploads/product/".$row->image_link)){
					unlink($image_link);
				}
				
				//xoa file nhieu anh 
	
				$image_array = json_decode($row->image_list);
				
				foreach($image_array as $image_obj){
					
					$image_link="./uploads/product/".$image_obj->file_name ;
					
					if(file_exists("./uploads/product/".$image_obj->file_name)){
						
						unlink($image_link);
					}
				
				}
	
				//
				$this->session->set_flashdata('message', 'Xóa dữ liệu thành công !');
			
			}else{
				$this->session->set_flashdata('message', 'Xóa dữ liệu thất bại');
				
			}


			}//

	}
	
	
	
	
}