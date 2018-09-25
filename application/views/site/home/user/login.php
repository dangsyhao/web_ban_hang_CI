<div class="content"> 
			       			       
<div class="box-center"><!-- The box-center register-->
             <div class="tittle-box-center">
		        <h2>Đăng Nhập </h2>
		      </div>
		      <div class="box-content-center register"><!-- The box-content-center -->
            <h1>Đăng Nhập</h1>
            <form action="<?php echo base_url()."user/login" ;?>" method="post" class="t-form form_action">
              <div class="form-row">
                    <label class="form-label" for="param_email">Email:<span class="req">*</span></label>
                    <div class="form-item">
                        <input name="email" id="email" class="input" type="text">
                        <div class="clear"></div>
                        <div id="email_error" class="error"></div>
                    </div>
                    <div class="clear"></div>
              </div>
				  
              <div class="form-row">
                    <label class="form-label" for="param_password">Mật khẩu:<span class="req">*</span></label>
                    <div class="form-item">
                        <input name="password" id="password" class="input" type="password">
                        <div class="clear"></div>
                        <div id="password_error" class="error"></div>
                    </div>
                    <div class="clear"></div>
              </div>

              <div class="form-row">
                    <label class="form-label">&nbsp;</label>
                    <div class="form-item">
                        <input name="submit" value="Đăng Nhập" class="button" type="submit">
                    </div>
               </div>
               
            </form>
         </div><!-- End box-content-center register-->
 </div><!-- End box-center -->
 
 </div>