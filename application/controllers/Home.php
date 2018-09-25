<?php
Class Home extends MY_Controller
{

	function index()
	{
		$data = array();

		//slide
		$this->load->model('Slide_model');
		
		$input=array();
		$input['order']=array('id','DESC');
		$news_data=$this->Slide_model->get_list($input);
		
		$this->data['slide_data']=$news_data;

		//san pham
		$this->load->model('Product_model');

		//load ra thu vien phan trang

		 //lay tong so luong ta ca cac san pham trong websit
        $total_rows = $this->Product_model->get_total();

        //load ra thu vien phan trang
        $this->load->library('pagination');
        $config = array();
        $config['total_rows'] = $total_rows;//tong tat ca cac san pham tren website
        $config['base_url']   = base_url('home/index'); //link hien thi ra danh sach san pham
        $config['per_page']   = 6;//so luong san pham hien thi tren 1 trang
        $config['uri_segment'] = 3;//phan doan hien thi ra so trang tren url
        $config['next_link']   = 'Trang kế tiếp';
        $config['prev_link']   = 'Trang trước';
        //khoi tao cac cau hinh phan trang
        $this->pagination->initialize($config);
        
        $segment = $this->uri->segment(3);
        $segment = intval($segment);

		//san pham moi nhat
		
		$input = array();
		$input['order'] = array('created'=>'DESC');
		$input['limit'] = array($config['per_page'], $segment);
		$product_data=$this->Product_model->get_list($input);
		$this->data['product_data'] = $product_data;
	

		//san pham xem nhieu
		
		$input = array();
		$input['where'] = array("view >="=>"5");
        $input['limit'] = array($config['per_page'], $segment);
		

		$view_best=$this->Product_model->get_list($input);
		$this->data['view_best'] = $view_best;

		//load data sang View
		$data['temp'] = 'site/home/index';
		$this->load->view('site/layout', $data);
		
		
	}
	
	
}