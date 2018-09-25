<?php
Class Support extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('support_model');
    }
    
    /*
     * Lay ra danh sach danh muc san pham
     */
    function index()
    {
        $support_data = $this->support_model->get_list();
        $this->data['support_data'] = $support_data;
        
        //lay nội dung của biến message
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        
        //load view
        $this->data['temp'] = 'admin/support/index';
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
					'skype'        => $this->input->post('skype'),
					'phone'        => $this->input->post('phone'),
                );
                //them moi vao csdl
                if($this->support_model->create($data))
                {
                    //tạo ra nội dung thông báo
                    $this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
                }else{
                    $this->session->set_flashdata('message', 'Không thêm được');
                }
                //chuyen tới trang danh sách
                redirect(admin_url('support'));
            }
        }

        $this->data['temp'] = 'admin/support/add';
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
        $info = $this->support_model->get_info($id);

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
					'skype'        => $this->input->post('skype'),
					'phone'        => $this->input->post('phone'),
                   
                );
                //them moi vao csdl
                if($this->support_model->update($id, $data))
                {
                    //tạo ra nội dung thông báo
                    $this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công');
                }else{
                    $this->session->set_flashdata('message', 'Không thêm được');
                }
                //chuyen tới trang danh sách
                redirect(admin_url('support'));
            }
			
        }
		
		 if(!$info)
		 {
			//tạo ra nội dung thông báo
			$this->session->set_flashdata('message', 'không tồn tại danh mục này');
			redirect(admin_url('support/index'));
		 }

        $this->data['temp'] = 'admin/support/edit';
        $this->load->view('admin/main', $this->data);
    }
    
    /*
     * Xoa danh mục
     */
    function delete()
    {
        //lay id danh mục
        $id = $this->uri->rsegment(3);
        $info = $this->support_model->get_info($id);

        if(!$info)
        {
            //tạo ra nội dung thông báo
            $this->session->set_flashdata('message', 'không tồn tại danh mục này');
            redirect(admin_url('support'));
        }
        //xoa du lieu
        $this->support_model->delete($id);
        //tạo ra nội dung thông báo
        $this->session->set_flashdata('message', 'Xóa dữ liệu thành công');
        redirect(admin_url('support'));
    }
	

	function del_select(){

		//
		$id_array =array();
		$id_array =$this->input->post('ids') ;
		foreach($id_array as $row){
				
				//láy thông tin sản phẩm
			$data= $this->support_model->get_info($id_array);	
					
					// xoa thong tin sp
			if($this->support_model->delete($id_array)==TRUE){
	
				$this->session->set_flashdata('message', 'Xóa dữ liệu thành công !');
			
			}else{
				$this->session->set_flashdata('message', 'Xóa dữ liệu thất bại');
				
			}


		}//

	}
	
	
	
}

