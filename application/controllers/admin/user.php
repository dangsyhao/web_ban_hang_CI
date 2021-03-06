<?php
Class User extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }
    
    /*
     * Lay ra danh sach danh muc san pham
     */
    function index()
    {
        $user_data = $this->user_model->get_list();
        $this->data['user_data'] = $user_data;
        
        //lay nội dung của biến message
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        
        //load view
        $this->data['temp'] = 'admin/user/index';
        $this->load->view('admin/main', $this->data);
    }
    
    /*
     * Them moi du lieu
     */
    function add()
    {
        //load thư viện validate dữ liệu
        $this->load->library('form_validation');
        $this->load->helper('form');
        
        //neu ma co du lieu post len thi kiem tra
        if($this->input->post())
        {
            $this->form_validation->set_rules('name', 'Tên', 'required');
            
            //nhập liệu chính xác
            if($this->form_validation->run())
            {

                //luu du lieu can them
                $data = array(
                    'name'         => $this->input->post('name'),
					'email'        => $this->input->post('email'),
					'phone'        => $this->input->post('phone'),
					'address'      => $this->input->post('address'),
					'created'      => now_format(),
                );
                //them moi vao csdl
                if($this->user_model->create($data))
                {
                    //tạo ra nội dung thông báo
                    $this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
                }else{
                    $this->session->set_flashdata('message', 'Không thêm được');
                }
                //chuyen tới trang danh sách
                redirect(admin_url('user'));
            }
        }

        $this->data['temp'] = 'admin/user/add';
        $this->load->view('admin/main', $this->data);
    }
    
    /*
     * Cập nhật du lieu
     */
    function edit()
    {
        //load thư viện validate dữ liệu
        $this->load->library('form_validation');
        $this->load->helper('form');
    
        //lay id danh mục
        $id = $this->uri->rsegment(3);
        $info = $this->user_model->get_info($id);

        $this->data['info'] = $info;
        
        //neu ma co du lieu post len thi kiem tra
        if($this->input->post())
        {
			$id=$this->input->post('id');
			$this->form_validation->set_rules('name', 'Tên', 'required');

            //nhập liệu chính xác
            if($this->form_validation->run()==TRUE)
            {
              	//luu du lieu can them
                $data = array(
				
                    'name'         => $this->input->post('name'),
					'email'        => $this->input->post('email'),
					'phone'        => $this->input->post('phone'),
					'address'      =>$this->input->post('address'),
					'created'      => now_format(),
                   
                );
                //them moi vao csdl
                if($this->user_model->update($id, $data))
                {
                    //tạo ra nội dung thông báo
                    $this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công');
                }else{
                    $this->session->set_flashdata('message', 'Không thêm được');
                }
                //chuyen tới trang danh sách
                redirect(admin_url('user'));
            }
			
        }
		
		 if(!$info)
		 {
			//tạo ra nội dung thông báo
			$this->session->set_flashdata('message', 'không tồn tại danh mục này');
			redirect(admin_url('user/index'));
		 }

        $this->data['temp'] = 'admin/user/edit';
        $this->load->view('admin/main', $this->data);
    }
    
    /*
     * Xoa danh mục
     */
    function delete()
    {
        //lay id danh mục
        $id = $this->uri->rsegment(3);
        $info = $this->user_model->get_info($id);

        if(!$info)
        {
            //tạo ra nội dung thông báo
            $this->session->set_flashdata('message', 'không tồn tại danh mục này');
            redirect(admin_url('user'));
        }
        //xoa du lieu
        $this->user_model->delete($id);
        //tạo ra nội dung thông báo
        $this->session->set_flashdata('message', 'Xóa dữ liệu thành công');
        redirect(admin_url('user'));
    }
	

	function del_select(){

		//
		$id_array =array();
		$id_array =$this->input->post('ids') ;
		foreach($id_array as $row){
				
				//láy thông tin sản phẩm
			$data= $this->user_model->get_info($id_array);	
					
					// xoa thong tin sp
			if($this->user_model->delete($id_array)==TRUE){
	
				$this->session->set_flashdata('message', 'Xóa dữ liệu thành công !');
			
			}else{
				$this->session->set_flashdata('message', 'Xóa dữ liệu thất bại');
				
			}


		}//

	}
	
	
	
}

