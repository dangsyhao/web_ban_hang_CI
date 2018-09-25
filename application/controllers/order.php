
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Order extends MY_Controller
{
	
	
	function __construct(){
		
		parent::__construct();

	}
	
	
	public $data=array();

	
	function index(){
		
		
		//
		$cart= $this->cart->contents();
		$this->data['cart']=$cart;
		
		
		if($this->input->post()){
		
		//Kiem tra nhap du lieu !
			$this->load->library("form_validation");
			$this->form_validation->set_rules("email" ,"email" , "required|valid_email");
			$this->form_validation->set_rules("name" ,"Tên người dùng" , "required|min_length[4]");
			$this->form_validation->set_rules("phone" ,"Số điện thoại" , "required|numeric");

			if($this->form_validation->run()==TRUE){
				
				//
				$this->load->model('transaction_model');
				$this->load->model('order_model');
					
				// them vao transaction
				$trans_data=array(
										'status'		=>'0',
										'user_id'		=>$this->session->userdata('user_id'),
										'user_name'		=>$this->input->post('name'),
										'user_email'	=>$this->input->post('email'),
										'user_phone'	=>$this->input->post('phone'),
										'amount'		=>intval($this->input->post('amount')),
										'payment'		=>$this->input->post('payment'),
										'message'		=>$this->input->post('messenger'),
										'created'		=>now_format(),
										);
				
		$this->transaction_model->create($trans_data);
		$transaction_id=$this->db->insert_id();

		// them vao CART

			foreach($cart as $key=>$item){

					$order_data=array(
										'transaction_id'=>$transaction_id,
										'name'			=>$item['name'],
										'qty'			=>$item['qty'],
										'amount'		=>$item['subtotal'],
										'created'		=>now_format(),
										'status'		=>'0',
										);
					 
					$this->order_model->create($order_data);

			}	
			
			$this->cart->destroy();
			redirect();	
							
					
		}
	}
		
		
		
		//load view
		$this->data['temp']='site/home/order';
		$this->load->view('site/layout',$this->data);
		
		
	}
	
	
	
	
	
}


?>