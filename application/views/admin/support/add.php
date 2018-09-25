<!-- head -->
<?php $this->load->view('admin/support/head', $this->data)?>

<div class="line"></div>

<div class="wrapper">
      <div class="widget">
           <div class="title">
			<h6>Thêm mới Thông tin hỗ trợ </h6>
		</div>

      <form id="form" class="form" enctype="multipart/form-data" method="post" action="<?php echo admin_url('support/add')?>">
          <fieldset>
       
            <div class="formRow">
                <label for="param_name" class="formLeft">Tên:<span class="req">*</span></label>
                <div class="formRight">
                    <span class="oneTwo"><input type="text" _autocheck="true" id="param_name" value="<?php echo set_value('name')?>" name="name"></span>
                    <span class="autocheck" name="name_autocheck"></span>
                    <div class="clear error" name="name_error"><?php echo form_error('name')?></div>
                </div>
                <div class="clear"></div>
            </div>
            

             <div class="formRow">
                <label for="param_name" class="formLeft">Email:</label>
                <div class="formRight">
                    <span class="oneTwo"><input type="text" id="param_sort_order" name="email"></span>
                <span class="autocheck" name="sort_order_autocheck"></span>
                <div class="clear error" name="sort_order_error"><?php echo form_error('sort_order')?></div>
                </div>
                <div class="clear"></div>
            </div>
            
            <div class="formRow">
                <label for="param_name" class="formLeft">Skype:</label>
                <div class="formRight">
                    <span class="oneTwo"><input type="text" id="param_sort_order"  name="skype"></span>
                <span class="autocheck" name="sort_order_autocheck"></span>
                <div class="clear error" name="sort_order_error"><?php echo form_error('sort_order')?></div>
                </div>
                <div class="clear"></div>
            </div>
            
            <div class="formRow">
                <label for="param_name" class="formLeft">Số điện thọaị:</label>
                <div class="formRight">
                    <span class="oneTwo"><input type="text" id="param_sort_order" name="phone"></span>
                <span class="autocheck" name="sort_order_autocheck"></span>
                <div class="clear error" name="sort_order_error"><?php echo form_error('sort_order')?></div>
                </div>
                <div class="clear"></div>
            </div>
            
            <div class="formSubmit">
                    <input type="submit" class="redB" value="Thêm mới">
            </div>
          </fieldset>
      </form>
      
      </div>
</div>
