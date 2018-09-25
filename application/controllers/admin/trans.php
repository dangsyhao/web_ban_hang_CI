<?php
Class Trans extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        //load ra file model
        $this->load->model('transaction_model');
    }
    
    /*
     * Hien thi danh sach san pham
     */
    function index()
    {
        //lay tong so luong ta ca cac san pham trong website
       $total_rows = $this->transaction_model->get_total();
        $this->data['total_rows'] = $total_rows;
        
        //load ra thu vien phan trang
        $this->load->library('pagination');
        $config = array();
        $config['total_rows'] = $total_rows;//tong tat ca cac san pham tren website
        $config['base_url']   = admin_url('trans/index'); //link hien thi ra danh sach san pham
        $config['per_page']   = 5;//so luong san pham hien thi tren 1 trang
        $config['uri_segment'] = 4;//phan doan hien thi ra so trang tren url
        $config['next_link']   = 'Trang kế tiếp';
        $config['prev_link']   = 'Trang trước';
        //khoi tao cac cau hinh phan trang
        $this->pagination->initialize($config);
        
        $segment = $this->uri->segment(4);
        $segment = intval($segment);
        
        //kiem tra co thuc hien loc du lieu hay khong
		$input = array();
		$input['order'] = array('id','DESC');
		$data_filter = $this->transaction_model->get_list($input);
		
		$this->data['data_filter'] = $data_filter;

        if($this->input->post()){
			
			$product_name = $this->input->post('name-product');
			if($product_name !='')
			{
			   $input['like']= array('user_name'=>$product_name );
			}
			
			$date_trans = $this->input->post('date-trans');
			if($date_trans !='')
			{
			   $input['where'] = array('created'=>$date_trans);
			}
			
			$trans_form = $this->input->post('status');
			if($trans_form !='')
			{
				$input['where'] = array('status'=>$trans_form);
			}
			

		}
		
		// gioi han trang
		$input['limit'] = array($config['per_page'], $segment);

        //lay danh sach san pham
        $list = $this->transaction_model->get_list($input);
        $this->data['list'] = $list;
       

        //lay nội dung của biến message
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message; 
		

        //load view
        $this->data['temp'] = 'admin/trans/index';
        $this->load->view('admin/main', $this->data);
    }
	
	public function delete()
    {
        $id = $this->uri->segment('4');
        $id = intval($id);

        $this->transaction_model->delete($id);
        
        $this->session->set_flashdata('message', 'Xóa dữ liệu thành công');
        redirect(admin_url('trans'));
    }
}