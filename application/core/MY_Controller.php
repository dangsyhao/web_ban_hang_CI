<?php
Class MY_Controller extends CI_Controller
{
    //bien gui du lieu sang ben view
    public $data = array();

    function __construct()
    {
        //ke thua tu CI_Controller
        parent::__construct();
        
        $controller = $this->uri->segment(1);
        switch ($controller)
        {
            case 'admin' :
                {
                    //xu ly cac du lieu khi truy cap vao trang admin
                    $this->load->helper('admin');
                    $this->_check_login();
                    break;
                }
            default:
                {	
					
                    // Load helper now_format
					$this->load->helper('now_format_helper');

					
					//Load thanh tin tuc
					$this->load->model('News_model');
					
					$input=array();
					$input['order']=array('id','DESC');
					$news_data=$this->News_model->get_list($input);
					$this->data['news_data']=$news_data;
					
				
					//Load Cart
					$this->load->model('Product_model');
					$this->load->library('cart');
					
					
					//Hỗ tro và liên hệ
					$this->load->model('support_model');
					
					$support_data=$this->support_model->get_list();
					$this->data['support_data']=$support_data;
					
					/*
					*Ket noi Table Catalog-Maker-Category-Product
					
					*/
					
					$this->load->model('product_model');
					$this->load->model('catalog_model');
					$this->load->model('category_model');

					//Tao Menu ben trai
				
					$product_info=$this->catalog_model->get_list();
					
					foreach($product_info as $row){
						
						$query=$this->db->query(
					
							"SELECT product.name,product.id,category.cate_name,catalog.id
								FROM 	product
								INNER JOIN catalog 				ON catalog.id = product.catalog_id
								INNER JOIN category 			ON category.id = product.cate_id
								
								WHERE  product.catalog_id =".$row->id
								
								 );
						$row->product_data= $query->result_array();		 
	
					}
		

				$this->data['product_info']=$product_info;

				}
					
            
        }
    }
    
    /*
     * Kiem tra trang thai dang nhap cua admin
     */
    private function _check_login()
    {
        $controller = $this->uri->rsegment('1');
        $controller = strtolower($controller);
        
        $login = $this->session->userdata('login');
        //neu ma chua dang nhap,ma truy cap 1 controller khac login
        if(!$login && $controller != 'login')
        {
            redirect(admin_url('login'));
        }
        //neu ma admin da dang nhap thi khong cho phep vao trang login nua.
        if($login && $controller == 'login')
        {
            redirect(admin_url('home'));
        }
    }
	
	
	
	
	
}//



	


