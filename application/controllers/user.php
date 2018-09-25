<?php

Class User extends MY_Controller
{
	
    function __construct()
    {
        parent::__construct();
		
        //load ra file model
        $this->load->model('User_model');
		
	
    }
	
	
	public $data=array();
	
	// LOAD index User
	
	public function index(){
		
		$email_key=	$this->session->userdata("email");
		
		if($email_key){
			//	
			$input=array();
			$input['where']=array('email'=>$email_key);
			$user_data= $this->User_model->get_row($input);

			$this->data['user_data']=$user_data;	
			//Load view
			$this->data['temp']='site/home/user/user_info';
			$this->load->view('site/layout',$this->data);
		
		}else{
			redirect(base_url()."user/login");
		}
			
		

	}
	
		// LOAD login User
	 function login(){
 
		if($this->session->userdata('email')){
			
			redirect(base_url()."user/index");
		}
		
			
		if($this->input->post('submit')){
			
			 //them vao csdl
			 $email		=$this->input->post('email');
			 $password	=$this->input->post('password');
			 
			 $input				=array();
			 $input['where']	=array('email'=>$email,'password'=>$password);
			 $login_data		=$this->User_model->get_row($input);

	
			if(count($login_data)>0)
			{
				$user_data=array(	
									"user_id"	=>$login_data->id,
									"username"	=>$login_data->name,
									"email"		=>$login_data->email,
									"phone"		=>$login_data->phone,
									"address"	=>$login_data->address,
									
									);

				$this->session->set_userdata($user_data); 

				//tạo ra nội dung thông báo
				$this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
				redirect(base_url()."user/index");

			}else{
				$this->session->set_flashdata('message', 'Không thêm được');
				//chuyen tới trang danh sách San Pham
				 redirect(base_url()."user/login");
			}
			
		}

		//Load view
		$this->data["temp"]="site/home/user/login";
		$this->load->view('site/layout',$this->data);
		

	}
	
	
	// LOAD register User
	function register(){
		
		if($this->session->userdata('email')){
			
			redirect(base_url()."user/index");
		}
			
 		$this->load->helper('form');
		
		if($this->input->post()){

			//Kiem tra nhap du lieu !
			$this->load->library("form_validation");

			$this->form_validation->set_rules("email" ,"email" , "required|valid_email");
			$this->form_validation->set_rules("password" ,"Mật khẩu" , "required|min_length[6]");
			$this->form_validation->set_rules("re_password" ,"Xác nhận Mật khẩu" , "required|matches[password]");
			$this->form_validation->set_rules("name" ,"Tên người dùng" , "required|min_length[6]");
			$this->form_validation->set_rules("phone" ,"Số điện thoại" , "required|numeric");
			$this->form_validation->set_rules("address" ,"Địa chỉ" , "required");
		
			if($this->form_validation->run()==TRUE){
	
             //them vao csdl
			 $email=$this->input->post('email');
			 
			 $input=array();
			 $input['where']=array('email'=>$email);
			 $email_check= $this->User_model->get_row($input);

			 if(count($email_check)!== 0){
				 
				  $this->session->set_flashdata('message', 'Email đã được sử dụng bởi người dùng khác !');
				 redirect(base_url()."user/register");
			 }
       
                $data=array(
					'email'         => $email,
					'password'   	=> $this->input->post('password'),
					'name'   		=> $this->input->post('name'),
                    'phone'         => $this->input->post('phone'),
                    'address'       => $this->input->post('address'),

               		);
					

                if($this->User_model->create($data))
                { 	
					// Tao session
					$user_data=array(
									"username"	=>$this->input->post('name'),
									"email"		=>$this->input->post('email')
									);

					$this->session->set_userdata($user_data); 
				
                    //tạo ra nội dung thông báo
                    $this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
					redirect(base_url()."user/index");

                }else{
                    $this->session->set_flashdata('message', 'Không thêm được');
					//chuyen tới trang danh sách San Pham
                	redirect(base_url()."user/register");
                }

          	}
		}

		//Load view
		$this->data['temp']='site/home/user/register';
		$this->load->view('site/layout',$this->data);

	}
	
	//Load Update
	
	function update(){

 		$this->load->helper('form');
		
		if($this->input->post()){

			//Kiem tra nhap du lieu !
			$this->load->library("form_validation");
			$this->form_validation->set_rules("password" ,"Mật khẩu" , "required|min_length[6]");
			$this->form_validation->set_rules("re_password" ,"Xác nhận Mật khẩu" , "required|matches[password]");
			$this->form_validation->set_rules("name" ,"Tên người dùng" , "required|min_length[4]");
			$this->form_validation->set_rules("phone" ,"Số điện thoại" , "required|numeric");
			$this->form_validation->set_rules("address" ,"Địa chỉ" , "required");
		
			if($this->form_validation->run()==TRUE){
	
             //them vao csdl
			 $email=$this->input->post('email');
			 $input=array();
			 $input['where']=array('email'=>$email);
			 $email_check= $this->User_model->get_row($input);
			 $id=$email_check->id;

                $data=array(
					'password'   	=> $this->input->post('password'),
					'name'   		=> $this->input->post('name'),
                    'phone'         => intval($this->input->post('phone')),
                    'address'       => $this->input->post('address'),

               		);
					

                if($this->User_model->update($id,$data))
                { 
                    //tạo ra nội dung thông báo
                    $this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
					redirect(base_url()."user/index");

                }else{
                    $this->session->set_flashdata('message', 'Không thêm được');
					//chuyen tới trang danh sách San Pham
                	edirect(base_url()."user/index");
                }

          	}
		}

		//Load view
		$this->data['temp']='site/home/user/register';
		$this->load->view('site/layout',$this->data);

	}
	
	
	//Load Logout
	
	function logout(){
		
		if($this->session->userdata('email')){
			
			$this->session->sess_destroy();
			redirect(base_url()."user/login");
			
		}
		
	
	}
	
	
	
	
	
	
	
}