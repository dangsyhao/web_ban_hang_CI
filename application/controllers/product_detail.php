<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Product_detail extends MY_Controller
{
	function __construct(){
		
		parent::__construct();
		
		//
		$this->load->model('Product_model');
			
		//Them luot view
		
		$segment=$this->uri->segment(3);
		$id=intval($segment);
		
		$input=array();
		$input['where']=array('id'=>$id);
		
		$view_data= $this->Product_model->get_row($input);
		$view_data=intval($view_data->view);
		$view_data +=1;
		$this->Product_model->update($id,array("view"=>$view_data));

	}
	
	
	public $data = array();
	

	function index(){

		$segment=$this->uri->segment(3);
		$id=intval($segment);

		$input=array();
		$input['where']=array('id'=>$id);
		$product_data=array();
		$product_data= $this->Product_model->get_row($input);
		
		$this->data['product_data']=$product_data;
		
		// san pham tương tự
		$cate_id=$product_data->cate_id;
		$maker_id=$product_data->maker_id;
		
		$input=array();
		$input['where']=array('cate_id'=>$cate_id);
		$input['like']=array('maker_id'=>$maker_id);
		$list_data= $this->Product_model->get_list($input);
		$this->data['list_data']=$list_data;
		
		//gui Rate vao Database
		if($this->input->post()){
			$id=$this->input->post('id');
			
			$rate_data=array(
							'rate_total'=>$this->input->post('score')
							
						);
			
			$this->Product_model->update($id,$rate_data);
			
		}

		//Gui Data sang View
		$this->data['temp'] = 'site/home/product_detail';
		$this->load->view('site/layout', $this->data);
		
	
	}










	
}

?>