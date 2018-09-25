<!-- head -->
<?php $this->load->view('admin/slide/head',$this->data)?>


<div class="line"></div>

<div class="wrapper">

	   	<!-- Form -->
<form class="form" id="form" action="<?php echo admin_url('slide/add') ?>"a method="post" enctype= 					 																							"multipart/form-data">
	<fieldset>
    
        <div class="widget">
        
            <div class="title">
                <img src="<?php echo public_url('admin/images') ?>/icons/dark/add.png" class="titleIcon">
                <h6>Thêm mới Slide</h6>
            </div>
            
            <ul class="tabs">
                <li><a href="#tab1">Thông tin chung</a></li>
            </ul>
            
    <div class="tab_container">
    
     		 <!---- Tab - 1 --->
            
    	<div id="tab1" class="tab_content pd0">
        
        <!-- Price -->
            
        <div class="formRow">
			<label class="formLeft" for="param_name">Tên Slide:<span class="req">*</span></label>
    
            <div class="formRight">
                <span class="oneTwo"><input name="name" id="param_name" _autocheck="true" type="text"></span>
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
            <div class="clear"></div>
        </div>
        

        <!-- warranty -->
        <div class="formRow">
            <label class="formLeft" for="param_warranty">Đường dẫn : </label>
                <div class="formRight">
                    <span class="oneFour"><input name="link" id="param_link" type="text"></span>
                    <span name="warranty_autocheck" class="autocheck"></span>
                    <div name="warranty_error" class="clear error"></div>
                </div>
                
            <div class="clear"></div>
        </div>

	<div class="formRow hide"></div>
    
	 </div>
		
	</div><!-- End tab_container-->
	        		
        <div class="formSubmit">
            <input value="Thêm mới" class="redB" type="submit">
            <input value="Hủy bỏ" class="basic" type="reset">
        </div>
        <div class="clear"></div>
        
    </div>
    
        </fieldset>
        
    </form>
</div>

<div class="clear mt30"></div>