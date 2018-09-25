<div class="content"> 
			       			       
<div class="box-center"><!-- The box-center register-->
             <div class="tittle-box-center">
		        <h2>Thanh toán mua hàng </h2>
		      </div>
		      <div class="box-content-center register"><!-- The box-content-center -->
            <h1>Thanh toán hàng mua</h1>
            
            <form action="<?php echo base_url()."order/index" ;?>" method="post" class="t-form form_action">
                  <div class="form-row">
						<label class="form-label" for="param_email">Email:<span class="req">*</span></label>
						<div class="form-item">
							<input value="<?php echo $data=$this->session->userdata('email'); isset($data)?$data:'';?>" name="email" id="email" class="input" type="text">
							<div class="clear"></div>
							<div id="email_error" class="error"></div>
						</div>
						<div class="clear"></div>
				  </div>
              
				  <div class="form-row">
						<label class="form-label" for="param_name">Họ và tên:<span class="req">*</span></label>
						<div class="form-item">
							<input value="<?php echo $data=$this->session->userdata('username'); isset($data)?$data:'';?>" name="name" id="name" class="input" type="text">
							<div class="clear"></div>
							<div id="name_error" class="error"></div>
						</div>
						<div class="clear"></div>
				  </div>
                  
				  <div class="form-row">
						<label class="form-label" for="param_phone">Số điện thoại:<span class="req">*</span></label>
						<div class="form-item">
							<input value="<?php echo $data=$this->session->userdata('phone'); isset($data)?$data:'';?>" name="phone" id="phone" class="input" type="text">
							<div class="clear"></div>
							<div id="phone_error" class="error"></div>
						</div>
						<div class="clear"></div>
				  </div>
				  
				  <div class="form-row">
						<label class="form-label" for="param_address">Địa chỉ:<span class="req">*</span></label>
						<div class="form-item">
                        
						<textarea name="address" id="address" class="input"><?php echo $data=$this->session->userdata('address'); isset($data)?$data:'';?></textarea>
							<div class="clear"></div>
							<div id="address_error" class="error"></div>
						</div>
						<div class="clear"></div>
				  </div>
                  
                  <div class="form-row">
						<label class="form-label" for="param_address">Nội dung:<span class="req">*</span></label>
						<div class="form-item">

  <div class="box-content-center1"><!-- The box-content-center -->
  <style type="text/css">
  
  table{ border:1px #06F solid; border-radius:4px; margin-top:22px;margin-right:15px; margin-bottom:15px; }
  table tr{width:200px;border:1px #06F solid; padding: 3px; text-align:center; height:50px;}
  
  table td{width:200px;border:1px #06F solid; padding: 3px;}
	  
  </style>
  
  <?php if(count($cart)>0): ?>
  
  <table >
  <form>
  	
        <tr>
            <td><b>Tên sản phẩm :</b> </td>
            <td><b>Số lượng : </b></td>
            <td><b>Đơn giá : </b></td>
            <td><b>Tổng tiền : </b></td>
   
        </tr>
        <?php $total_cost=0; ?>
        
        <?php foreach($cart as $key=>$value): ?>
        
        <tr> 
            <td><?php echo $value['name'] ?> </td>
            <td><?php echo $value['qty'] ?> </td>
            
            <td><?php echo number_format($value['price']) ?> </td>
            
            <td><?php echo number_format($value['subtotal']) ?> </td>
               
            <?php $total_cost+=$value['subtotal']; ?>
        </tr>
    
        <?php endforeach;?>
        
        <tr >
          <td colspan="2"><b>Số tiền phải trả :</b> </td>
          <td width="300px" colspan="2">
          	<input name="amount" type="hidden" value="<?php echo $total_cost ?>" />
                
            <label name="amount_info" style="color:#F00; font-weight:bold" /> 
            <b><?php echo number_format($total_cost)?>.đ</b>
            </label>
           </td>
    
        </tr>

        </form>

    </table>
    <?php else: ?>
    <div><h2>Khong co san pham nao !</h2></div>
    <?php endif ?>
                   

</div>

   <div class="clear"></div>
   <div id="address_error" class="error"></div>
    </div>
        
        <div class="clear"></div>
  </div>
  
  
  <div class="form-row">
						<label class="form-label" for="param_address">Ghi chú:<span class="req">*</span></label>
						<div class="form-item">
                        
						<textarea name="messenger" id="messenger" class="input" placeholder="Nhập yêu cầu tại đây !"></textarea>
							<div class="clear"></div>
							<div id="address_error" class="error"></div>
						</div>
						<div class="clear"></div>
				  </div>
  
 
                  
           <div class="form-row">
                <label class="form-label" for="param_address">Hình thức thanh toán:<span class="req">*</span></label>
                <div class="form-item">
                <select name="payment">
                
                <option value="">--- Chọn hình thức thanh toán ----</option>
                <option value="office">* Thanh toán sau khi giao hàng</option>
                <option value="baokim">* Bảo kim</option>
                <option value="nganluong">* Ngân lượng</option>
                
                </select>
                
                    
                    <div class="clear"></div>
                    <div id="address_error" class="error"></div>
                </div>
                <div class="clear"></div>
          </div>
                  
                  
				  

				  <div class="form-row">
						<label class="form-label">&nbsp;</label>
						<div class="form-item">
				           	<input name="submit" value=" Chấp nhận thanh toán" class="button" type="submit">
						</div>
                        <div class="clear"></div>
				   </div>
                   
                   
				  <div class="form-row">
						<label class="form-label">&nbsp;</label>
						<div class="form-item">
				           	<button name="submit" class="button" formaction="<?php echo base_url()."cart/index" ?>"" >Quay lại giỏ hàng</button>
						</div>
				   </div>
                   
            </form>
         </div><!-- End box-content-center register-->
 </div><!-- End box-center -->
 			   </div>