
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Filter_left extends MY_Controller
{
	public $data=array();

	
	function index(){
		
		
		if($this->input->post('search'))
		{
			//Lay PRICE
			$price_from=$this->input->post('price_from');
			$price_to=$this->input->post('price_to');
	
			//Load Product DATA
			$this->load->model('Product_model');
			
			//load ra thu vien phan trang
			$total_rows = $this->Product_model->get_total();
			
			$this->load->library('pagination');
			$config = array();
			$config['total_rows'] = $total_rows;//tong tat ca cac san pham tren website
			$config['base_url']   = base_url("filter_left/index/"); //link hien thi ra danh sach san pham
			$config['per_page']   = 4;//so luong san pham hien thi tren 1 trang
			$config['uri_segment'] = 4;//phan doan hien thi ra so trang tren url
			$config['next_link']   = 'Trang kế tiếp';
			$config['prev_link']   = 'Trang trước';
			//khoi tao cac cau hinh phan trang
			$this->pagination->initialize($config);
			
			$segment = $this->uri->segment(3);
			$segment = intval($segment);

			$input=array();
			$input['where']=array('price >='=>$price_from,'price <='=>$price_to);
			$input['limit'] = array($config['per_page'], $segment);
			
			$filter_data= $this->Product_model->get_list($input);
			
			$this->data['filter_data']=$filter_data;
	
			//load view
			$this->data['temp']='site/home/filter_left';
			$this->load->view('site/layout',$this->data);
		}else{
			redirect(base_url());
		}
		
		
		
	}
	
	
	
	
	
}

?>