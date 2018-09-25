<?php
Class Maker extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('maker_model');
    }
    
    /*
     * Lay ra danh sach danh muc san pham
     */
    function index()
    {
        $maker_data = $this->maker_model->get_list();
        $this->data['maker_data'] = $maker_data;
        
        //lay nội dung của biến message
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        
        //load view
        $this->data['temp'] = 'admin/maker/index';
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
                    'name'      => $this->input->post('maker_name'),
                    'sort_order' => $this->input->post('maker_sort_order')
                );
                //them moi vao csdl
                if($this->maker_model->create($data))
                {
                    //tạo ra nội dung thông báo
                    $this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
                }else{
                    $this->session->set_flashdata('message', 'Không thêm được');
                }
                //chuyen tới trang danh sách
                redirect(admin_url('maker/index'));
            }
        }
        
        //lay danh sach danh muc cha
        $input = array();
        $input['order'] = array('id','DESC');
        $list = $this->maker_model->get_list($input);
        $this->data['list']  = $list;
        
        $this->data['temp'] = 'admin/maker/add';
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
        $info = $this->maker_model->get_info($id);
		
        if(!$info)
        {
            //tạo ra nội dung thông báo
            $this->session->set_flashdata('message', 'không tồn tại danh mục này');
            redirect(admin_url('maker/index'));
        }
		
        $this->data['info'] = $info;
        
        //neu ma co du lieu post len thi kiem tra
        if($this->input->post())
        {
            $this->form_validation->set_rules('name', 'Tên', 'required');
    
            //nhập liệu chính xác
            if($this->form_validation->run())
            {
              
                //luu du lieu can them
                $data = array(
                    'name'      => $this->input->post('maker_name'),
                    'sort_order' => $this->input->post('maker_sort_order')
                );
                //them moi vao csdl
                if($this->maker_model->update($id, $data))
                {
                    //tạo ra nội dung thông báo
                    $this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công');
                }else{
                    $this->session->set_flashdata('message', 'Không thêm được');
                }
                //chuyen tới trang danh sách
                redirect(admin_url('maker'));
            }
        }
    
        //lay danh sach danh muc cha
        $input = array();
        $input['order'] = array('id','DESC');
        $list = $this->maker_model->get_list($input);
        $this->data['list']  = $list;
    
        $this->data['temp'] = 'admin/maker/edit';
        $this->load->view('admin/main', $this->data);
    }
    
    /*
     * Xoa danh mục
     */
    function delete()
    {
        //lay id danh mục
        $id = $this->uri->rsegment(3);
        $info = $this->maker_model->get_info($id);

        if(!$info)
        {
            //tạo ra nội dung thông báo
            $this->session->set_flashdata('message', 'không tồn tại danh mục này');
            redirect(admin_url('maker'));
        }
        //xoa du lieu
        $this->maker_model->delete($id);
        //tạo ra nội dung thông báo
        $this->session->set_flashdata('message', 'Xóa dữ liệu thành công');
        redirect(admin_url('maker'));
    }
	

	function del_select(){

		//
		$id_array =array();
		$id_array =$this->input->post('ids') ;
		foreach($id_array as $row){
				
				//láy thông tin sản phẩm
			$data= $this->maker_model->get_info($id_array);	
					
					// xoa thong tin sp
			if($this->maker_model->delete($id_array)==TRUE){
	
				$this->session->set_flashdata('message', 'Xóa dữ liệu thành công !');
			
			}else{
				$this->session->set_flashdata('message', 'Xóa dữ liệu thất bại');
				
			}


		}//

	}
	
	
	
}

