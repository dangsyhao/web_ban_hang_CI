<!-- head -->
<?php $this->load->view('admin/product/head',$this->data)?>

<div class="line"></div>

<div class="wrapper">

	   	<!-- Form -->
<form class="form" id="form" action='<?php echo admin_url("product/update/")?>' 
																method="post"  enctype="multipart/form-data">
	<fieldset>
    
        <div class="widget">
        
            <div class="title">
                <img src="<?php echo public_url('admin/images') ?>/icons/dark/add.png" class="titleIcon">
                <h6>Chĩnh sửa Thông tin Sản phẩm</h6>
            </div>
            
            <ul class="tabs">
                <li><a href="#tab1">Thông tin chung</a></li>
                <li><a href="#tab2">SEO Onpage</a></li>
                <li><a href="#tab3">Bài viết</a></li>
                
            </ul>
            
    <div class="tab_container">
    
     	<!---- Tab - 1 --->
            
    	<div id="tab1" class="tab_content pd0">
        
        <!-- ID -->
            
        <div class="formRow">
			<label class="formLeft" for="param_name">Mã SP (không thay đổi):<span class="req"></span></label>
    
            <div class="formRight">
                <span class="oneTwo"><input name="id" id="param_name" readonly="readonly"  type="text" value="<?php echo $row->id ?>"></span>
                <span name="name_autocheck" class="autocheck"></span>
                <div name="name_error" class="clear error"></div>
            </div>
            <div class="clear"></div>
        </div>
        
                <!-- Price -->
            
        <div class="formRow">
            <label class="formLeft" for="param_cat">Danh mục SP:<span class="req">*</span></label>
                <div class="formRight">
                  <select name="catalog_id" _autocheck="true" id="param_cat" class="left">
                    <option value="">_Lựa chọn danh mục_</option>
					
                   	<option selected="selected" value="<?php echo $catalogs_data->id ?>">
						<?php echo $catalogs_data->name ?>
                    </option>
					

                    </select>
                    <span name="cat_autocheck" class="autocheck"></span>
                    <div name="cat_error" class="clear error"></div>
                </div>
            
            <div class="clear"></div>
        </div>
        
	
        <!-- Price -->
            
       <div class="formRow">
            <label class="formLeft" for="param_cat">Nhà sản xuất <span class="req">*</span></label>
                <div class="formRight">
                  <select name="maker_id" _autocheck="true" id="param_maker" class="left">
                    <option value="">_Lựa chọn danh mục_</option>
					
                   	<option selected="selected" value="<?php echo $maker_catalog_data->id ?>">
						<?php echo $maker_catalog_data->name ?>
                    </option>
					
                    </select>
                    <span name="cat_autocheck" class="autocheck"></span>
                    <div name="cat_error" class="clear error"></div>
                </div>
            
            <div class="clear"></div>
        </div>
        
        <!-- Price -->
            
       <div class="formRow">
            <label class="formLeft" for="param_cat">Loại SP :<span class="req">*</span></label>
                <div class="formRight">
                  <select name="product_id" _autocheck="true" id="param_cat" class="left">
                    <option value="">_Lựa chọn danh mục_</option>

                   <option selected="selected" value="<?php echo $product_catalog_data->id ?>">
						<?php echo $product_catalog_data->name ?>
                    </option>
                  
				
                    </select>
                    <span name="cat_autocheck" class="autocheck"></span>
                    <div name="cat_error" class="clear error"></div>
                </div>
            
            <div class="clear"></div>
        </div>
        

        <!-- Name-->
            
        <div class="formRow">
			<label class="formLeft" for="param_name">Tên:<span class="req">*</span></label>
    
            <div class="formRight">
                <span class="oneTwo"><input name="name" id="param_name" _autocheck="true" type="text" value="<?php echo $row->name ?>"></span>
                <span name="name_autocheck" class="autocheck"></span>
                <div name="name_error" class="clear error"></div>
            </div>
            <div class="clear"></div>
        </div>
        
		<!-- Price -->
        
        <div class="formRow">
            <label class="formLeft">Hình ảnh:<span class="req">*</span></label>
                <div class="formRight">
                    <div class="left"><input id="image" name="image" type="file" ></div>
                    <div name="image_error" class="clear error"></div>
                </div>
                
                <div class="">
						<img  style=" margin-left: 60%; height:100px ; width: 150px; "
                        			src='<?php echo base_url("uploads/product/".$row->image_link )?>' height="50">
						<div class="clear"></div>
				</div>
                    
            <div class="clear"></div>
        </div>
        
        			
        
        <!-- Price -->

        <div class="formRow">
            <label class="formLeft">Ảnh kèm theo:</label>
            <div class="formRight">
                <div class="left"><input id="image_list" name="image_list[]" multiple="multiple" type="file"></div>
                <div name="image_list_error" class="clear error"></div>
            </div>
            
            <?php 
				$image_data=json_decode($row->image_list,true);
				for($i=0;$i<=1 ;$i++){
			 ?>
            <div class="">
  					<img  style=" margin-left: 60%; height:100px ; width: 150px; display:inline-table " 
                         src='<?php echo base_url("uploads/product/".$image_data[$i]['file_name'])?>' height="50">
                    <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </div>
        
        	 <?php }; ?>

        <!-- Price -->
        <div class="formRow">
            <label class="formLeft" for="param_price">Giá :<span class="req">*</span></label>
            <div class="formRight">
                <span class="oneTwo">
                    <input name="price" type="number" style="width:100px" id="param_price" class="format_number" _autocheck="true" 		 													 value="<?php echo $row->price ?>" type="text">
                    
                    <img class="tipS" title="Giá bán sử dụng để giao dịch" style="margin-bottom:-8px" src="<?php echo 	 										public_url('admin/crown/images') ?>/icons/notifications/information.png">
                </span>
                <span name="price_autocheck" class="autocheck"></span>
                <div name="price_error" class="clear error"></div>
            </div>
            
            <div class="clear"></div>
        </div>

		<!-- Price -->
        
        <div class="formRow">
            <label class="formLeft" for="param_discount">Giảm giá (VNĐ) <span></span>:</label>
            <div class="formRight">
                <span><input type="number" name="discount" style="width:100px" id="param_discount" class="format_number" type="text"
                  value="<?php echo $row->discount ?>" >
                    <img class="tipS" title="Số tiền giảm giá" style="margin-bottom:-8px" src="<?php echo public_url(   												'admin/crown/images') ?>/icons/notifications/information.png">
                </span>
                <span name="discount_autocheck" class="autocheck"></span>
                <div name="discount_error" class="clear error"></div>
            </div>
            
            <div class="clear"></div>
        </div>

      
        <!-- warranty -->
        <div class="formRow">
            <label class="formLeft" for="param_warranty">Bảo hành : </label>
                <div class="formRight">
                    <span class="oneFour"><input name="warranty" id="param_warranty" type="text" 
                    											value="<?php echo $row->warranty ?>"></span>
                    <span name="warranty_autocheck" class="autocheck"></span>
                    <div name="warranty_error" class="clear error"></div>
                </div>
                
            <div class="clear"></div>
        </div>

        <div class="formRow">
            <label class="formLeft" for="param_sale">Tặng quà:</label>
            <div class="formRight">
                <span class="oneTwo"><textarea name="sale" id="param_sale" rows="4" cols=""
               						 > <?php echo $row->gifts ?></textarea></span>
                <span name="sale_autocheck" class="autocheck"></span>
                <div name="sale_error" class="clear error"></div>
            </div>
            <div class="clear"></div>
        </div>					         
	<div class="formRow hide"></div>
    
	 </div>
     
      <!---- Tab - 2 --->
						 
<div id="tab2" class="tab_content pd0">
						     			
        <div class="formRow">
            <label class="formLeft" for="param_site_title">Title:</label>
            <div class="formRight">
                <span class="oneTwo"><textarea name="site_title" id="param_site_title" _autocheck="true" rows="4" 
                								cols= ""><?php echo $row->site_title ?> </textarea></span>
                <span name="site_title_autocheck" class="autocheck"></span>
                <div name="site_title_error" class="clear error"></div>
            </div>
            <div class="clear"></div>
        </div>

        <div class="formRow">
            <label class="formLeft" for="param_meta_desc">Meta description:</label>
            <div class="formRight">
                <span class="oneTwo"><textarea name="meta_desc" id="param_meta_desc" _autocheck="true" rows="4" cols="" 				 							 > <?php echo $row->meta_desc ?></textarea></span>
                <span name="meta_desc_autocheck" class="autocheck"></span>
                <div name="meta_desc_error" class="clear error"></div>
            </div>
            <div class="clear"></div>
        </div>

        <div class="formRow">
            <label class="formLeft" for="param_meta_key">Meta keywords:</label>
            <div class="formRight">
                <span class="oneTwo"><textarea name="meta_key" id="param_meta_key" _autocheck="true" rows="4" cols=""
                	     			 			> <?php echo $row->meta_key ?></textarea></span>
                <span name="meta_key_autocheck" class="autocheck"></span>
                <div name="meta_key_error" class="clear error"></div>
            </div>
            <div class="clear"></div>
        </div>
	 <div class="formRow hide"></div>
     
	 </div>
     
     <!---- Tab - 3 --->
						 
  <div id="tab3" class="tab_content pd0">
  
        <div class="formRow">
        <label class="formLeft">Nội dung:</label>
            <div class="formRight">
                <textarea name="content" id="param_content" class="editor" ="" >
                									<?php echo $row->content ?></textarea>	  																											
                <div name="content_error" class="clear error"></div>
            </div>
        <div class="clear"></div>
       </div>
       
     <div class="formRow hide"></div>
	
    </div>
						
						
	</div><!-- End tab_container-->
	        		
        <div class="formSubmit">
            <input value="Hoàn tất" class="redB" type="submit">
            <input value="Hủy bỏ" class="basic"  type="reset">
        </div>
        <div class="clear"></div>
        
    </div>
    
        </fieldset>
        
    </form>
</div>

<div class="clear mt30"></div>
