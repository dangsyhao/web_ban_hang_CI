
<div class="box-center"><!-- The box-center product-->
  <div class="tittle-box-center"><h2>Giỏ hàng của bạn :</h2>
  </div>
 
  <div class="box-content-center product"><!-- The box-content-center -->
  <style type="text/css">
  
  table{ border:2px #06F solid; border-radius:4px; margin-top:22px;margin-right:3px }
  table tr{width:200px;border:2px #06F solid; padding: 3px; text-align:center; height:50px;}
  
  table td{width:200px;border:2px #06F solid; padding: 3px;}
	  
  </style>
  
  <?php if(count($cart)>0): ?>
  
  <table >
  <form>
  	
        <tr>
            <td><b>Tên sản phẩm :</b> </td>
            <td><b>Số lượng : </b></td>
            <td><b>Đơn giá : </b></td>
            <td><b>Tổng giá : </b></td>
            <td><b>Reset Data : </b></td>
            
        </tr>
        <?php $total_cost=0; ?>
        
        <?php foreach($cart as $key=>$value): ?>
        <tr hidden="">
        	<td><input name="cart_id[]" value="<?php echo $value['id'] ?>"</td>
        </tr>
        
        <tr> 
            <td><?php echo $value['name'] ?> </td>
            
            <td><input name="<?php echo "qty".$value['id'] ?>" type="number" value="<?php echo $value['qty'] ?>" /> </td>
            <td><?php echo number_format($value['price']) ?> </td>
            
            <td><?php echo number_format($value['subtotal']) ?> </td>
            
            <td>
            <input type="submit" value="Xóa" style=" width: 50px; height:30px;" 
            		formaction=" <?php echo base_url()."cart/delete/".$value['id']?>" >
             </td>
                                
            <?php $total_cost +=$value['subtotal']; ?>
        </tr>
    
        <?php endforeach;?>
        <tr>
          <td colspan="2"><b>Tổng chi phí :</b> </td><td width="300px" colspan="2">
          		<span style="color:#F00;"><b><?php echo number_format($total_cost)?> .đ</b></span></td>
    
        </tr>
        
        <tr>
          <td colspan="4"><input value="Cập nhật giỏ hàng" type="submit" formmethod="post" 
          formaction=" <?php echo base_url()."cart/update/" ?>" style=" width: 75px; height:30px;" >
          </td>
          
          <td width="300px"><input type="submit" value="Hủy giỏ hàng"
           	formaction=" <?php echo base_url()."cart/delete_all"?>" style=" width: 75px; height:30px;">		 					 			</td>
    
        </tr>
        </form>

    </table>
    
         <div class="action">
                <a class="button" style="float:left;padding:8px 15px;font-size:16px" 
                href="<?php echo base_url()."order/index" ?>" title="Thanh toán hàng mua">Thanh toán</a>
                     
                <div class="clear"></div>
        </div>
        
        <div class="action">
                <a class="button" style="float:left;padding:8px 15px;font-size:16px" 
                href="<?php echo base_url() ?>" title="Mua ngay">Tiếp tục mua</a>
                     
                <div class="clear"></div>
        </div>
    
    <?php else: ?>
   	<h3>Không có sản phẩm nào trong giỏ hàng !</h3>
    <?php endif ?>

                   
	 </div><!-- End box-content-center -->
     
     
    

</div>

