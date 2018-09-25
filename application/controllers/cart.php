
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Cart extends MY_Controller
{
	
	
	function __construct(){
		
		parent::__construct();

	}
	
	public $data=array();
	
	
	function add(){

		//Layid
		
		$id=$this->uri->segment(3);
		$id=intval($id);
		
		//load DATA
		$input=array();
		$input['where']=array('id'=>$id);
		
		$product_data= $this->Product_model->get_row($input);
		
		//
		$name=	$product_data->name;
		$price=	$product_data->price;
		if($product_data->discount){
			
			$price =$product_data->price - $product_data->discount ;
		}

		//load cau hinh cart
		$data=array(
			"id"=>$id,
			"name"=>$name,
			"qty"=>'1',
			"price"=>$price
		);
		
		$this->cart->insert($data);
		
		
		//kiem tra lenh
		
		$order_link=$this->uri->segment(1);
		if( $order_link == 'order'){
			redirect(base_url()."order/index/");

		}
		
		redirect(base_url()."cart/index/");

	}
	
	
	
	function index(){
		
		$cart= $this->cart->contents();
		$this->data['cart']=$cart;

		//load view
		$this->data['temp']='site/home/cart';
		$this->load->view('site/layout',$this->data);
		
		
	}
	
	function update(){
		
		$cart_data= $this->cart->contents();
		$id=array();
		$id=$this->input->post('cart_id');
		
		//pre($cart_data);

		//load cau hinh cart
		
        foreach($cart_data as $key=>$item){
			
			for($i=0;$i<=count($id);$i++){
				
				if($item['id'] == $id[$i]){
					
					$qty=$this->input->post("qty".$id[$i]);
					$item['qty'] = $qty;
					$delOne = array(
					"rowid" => $item['rowid'], 
					"qty" => $item['qty'],
					"price"=>$item['price']
					 );
					 
					$this->cart->update($delOne);
				}
			}

        }

		redirect(base_url()."cart/index/");

	}
	
	function delete(){
		
		$cart_data= $this->cart->contents();
		
		
		
		//Layid
		
		$id=$this->uri->segment(3);
		$id=intval($id);
		

		//load cau hinh cart
        foreach($cart_data as $key=>$item){
            if($item['id'] == $id){
                $item['qty'] = 0;
                $delOne = array("rowid" => $item['rowid'], "qty" => $item['qty']);
            }
        }
		
		$this->cart->update($delOne);
		
		
		
		
		redirect(base_url()."cart/index/");
	
	
		
	}
	
	function delete_all(){
	
	$this->cart->destroy();
	redirect(base_url()."cart/index/");
		
	}
	
	
	
	
	
}

?>