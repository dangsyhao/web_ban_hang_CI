<div class="content"> 
			       			       
<div class="box-center"><!-- The box-center register-->
             <div class="tittle-box-center">
		        <h2>Thông tin thành viên</h2>
		      </div>
		      <div class="box-content-center register"><!-- The box-content-center -->
            <h1>Thông tin thành viên : <?php echo $user_data->name ?> </h1>
            <form enctype="multipart/form-data" action="" method="post" class="t-form form_action">
                  <div class="form-row">
						<label class="form-label" for="param_email">Email:<span class="req">*</span></label>
						<div class="form-item">
							<input style="color:red;" value="<?php echo $user_data->email ?>"  name="email" id="email" class="input" type="text" readonly="readonly"> (Không Thay đổi)
							<div class="clear"></div>
							<div id="email_error" class="error"></div>
						</div>
						<div class="clear"></div>
				  </div>
				  
				  <div class="form-row">
						<label class="form-label" for="param_password">Mật khẩu:<span class="req">*</span></label>
						<div class="form-item">
							<input name="password" id="password" class="input" type="text" value="<?php echo $user_data->password ?>">
							<div class="clear"></div>
							<div id="password_error" class="error"></div>
						</div>
						<div class="clear"></div>
				  </div>
				  
				  <div class="form-row">
						<label class="form-label" for="param_re_password">Gõ lại mật khẩu:<span class="req">*</span></label>
						<div class="form-item">
							<input name="re_password" id="re_password" class="input" type="password" value="<?php echo $user_data->password ?>">
							<div class="clear"></div>
							<div id="re_password_error" class="error"></div>
						</div>
						<div class="clear"></div>
				  </div>
                  
				  <div class="form-row">
						<label class="form-label" for="param_name">Họ và tên:<span class="req">*</span></label>
						<div class="form-item">
							<input name="name" id="name" class="input" type="text" value="<?php echo $user_data->name ?>">
							<div class="clear"></div>
							<div id="name_error" class="error"></div>
						</div>
						<div class="clear"></div>
				  </div>
				  <div class="form-row">
						<label class="form-label" for="param_phone">Số điện thoại:<span class="req">*</span></label>
						<div class="form-item">
							<input name="phone" id="phone" class="input" type="text" value="<?php echo $user_data->phone ?>">
							<div class="clear"></div>
							<div id="phone_error" class="error"></div>
						</div>
						<div class="clear"></div>
				  </div>
				  
				  <div class="form-row">
						<label class="form-label" for="param_address">Địa chỉ:<span class="req">*</span></label>
						<div class="form-item">
							<textarea name="address" id="address" class="input"><?php echo $user_data->address ?></textarea>
							<div class="clear"></div>
							<div id="address_error" class="error"></div>
						</div>
						<div class="clear"></div>
				  </div>
				  

				  <div class="form-row">
						<label class="form-label">&nbsp;</label>
						<div class="form-item">
				           	<button  type="submit" class="button" 
                            formaction="<?php echo base_url()."user/update" ?>" >Cập nhật thông tin</button>
						</div>
				   </div>

            </form>
         </div><!-- End box-content-center register-->
 </div><!-- End box-center -->
 			   </div>