<?php

/*
* Ham up loanh  1 anh
*/

	function up_image($image_path='',$image_name=''){

		//
		if(empty($image_name) and empty($image_path)){
			
			return false;
		}
		
		//
		$CI=& get_instance();
		
		
		//Load thu vien upload
			$config['upload_path'] = $image_path;
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = '1024';
			$config['max_width']  = '1900';
			$config['max_height']  = '1900';
			
			$CI->load->library("upload", $config);
			
			if($CI->upload->do_upload($image_name)==TRUE){
				
            	return $CI->upload->data();
			}

	}
	
/*
* Ham up loanh  Nhieu Anh
*/
	
	function up_image_list($image_path='',$image_name=''){

		//
		if(empty($image_name) and empty($image_path)){
			
			return false;
		}
		//
		
		$CI=& get_instance();

			//Load thu vien upload
			$config['upload_path'] = $image_path ;
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = '1024';
			$config['max_width']  = '1900';
			$config['max_height']  = '1900';
			
			$CI->load->library("upload", $config);
			
		
			$file  = $_FILES[$image_name];
			$count = count($file['name']);//lấy tổng số file được upload
			
			$image_list=array();
			for($i=0; $i<=$count-1; $i++) {
				  
				  $_FILES['userfile']['name']     = $file['name'][$i];  //khai báo tên của file thứ i
				  $_FILES['userfile']['type']     = $file['type'][$i]; //khai báo kiểu của file thứ i
				  $_FILES['userfile']['tmp_name'] = $file['tmp_name'][$i]; //khai báo đường dẫn tạm của file thứ i
				  $_FILES['userfile']['error']    = $file['error'][$i]; //khai báo lỗi của file thứ i
				  $_FILES['userfile']['size']     = $file['size'][$i]; //khai báo kích cỡ của file thứ i
	
				if($CI->upload->do_upload()==TRUE){
					
					 $image_list[$i]=$CI->upload->data();
		
				}
				
			}/*/--For---/*/
			
			$image_json=json_encode($image_list);

			return $image_json;
				
	
	}



