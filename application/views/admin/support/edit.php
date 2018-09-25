<!-- head -->
<?php $this->load->view('admin/support/head', $this->data)?>

<div class="line"></div>

<div class="wrapper">
      <div class="widget">
           <div class="title">
			<h6>Chỉnh sửa Thông tin Thành viên</h6>
		</div>

      <form id="form" class="form" method="post" 
     										 action="<?php echo admin_url('support/edit') ?>">
          <fieldset>
          <div  class="">
          	<input hidden="hidden" type="text" value="<?php echo $info->id ?>" name="id"  />
            </div>
                
                <div class="formRow">
                	<label for="param_name" class="formLeft">Tên:<span class="req">*</span></label>
                	<div class="formRight">
                		<span class="oneTwo"><input type="text" id="param_name" value="<?php echo $info->name ?>" name="name"></span>
                		<span class="autocheck" name="name_autocheck"></span>
                		<div class="clear error" name="name_error"><?php echo form_error('name')?></div>
                	</div>
                	<div class="clear"></div>
                </div>
                

                 <div class="formRow">
                	<label for="param_name" class="formLeft">Email:<span class="req">*</span></label>
                	<div class="formRight">
                		<span class="oneTwo"><input type="text" id="param_email" value="<?php echo $info->email ?>" name="email"></span>
                        
                		<span class="autocheck" name="name_autocheck"></span>
                        
                		<div class="clear error" name="name_error"><?php echo form_error('name')?></div>
                	</div>
                	<div class="clear"></div>
                </div>
                
                <div class="formRow">
                	<label for="param_name" class="formLeft">Skype:<span class="req">*</span></label>
                	<div class="formRight">
                		<span class="oneTwo"><input type="text" id="param_email" value="<?php echo $info->skype ?>" name="skype"></span>
                        
                		<span class="autocheck" name="name_autocheck"></span>
                        
                		<div class="clear error" name="name_error"><?php echo form_error('name')?></div>
                	</div>
                	<div class="clear"></div>
                </div>
                
                
                <div class="formRow">
                	<label for="param_name" class="formLeft">Phone:<span class="req">*</span></label>
                	<div class="formRight">
                		<span class="oneTwo"><input type="text" _autocheck="true" id="param_phone" value="<?php echo $info->phone?>" name="phone"></span>
                		<span class="autocheck" name="name_autocheck"></span>
                		<div class="clear error" name="name_error"><?php echo form_error('name')?></div>
                	</div>
                	<div class="clear"></div>
                </div>

                
                <div class="formSubmit">
	           			<input type="submit" class="redB" value="Cập nhật">
	           	</div>
          </fieldset>
      </form>
      
      </div>
</div>
