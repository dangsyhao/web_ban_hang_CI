
<div class="box-left">
  <div class="title tittle-box-left">
	 <h2> Tìm kiếm theo giá </h2>
 </div>
		<div class="content-box"><!-- The content-box -->
			<form class="t-form form_action" method="post" style="padding:10px" 
           							 action="<?php echo base_url()."filter_left/index" ?>" name="search">
                                     
                                     
              <div class="form-row">
					<label for="param_price_from" class="form-label" style="width:70px">
                    Giá từ:<span class="req">*</span>
                    </label>
						<div class="form-item" style="width:90px">
                        	<select class="input" id="price_from" name="price_from">
                         <?php $price=1000000; for($i=1;$i<=20;$i++):?>   
                            
						<option value="<?php echo $price*$i ?>"> <?php echo number_format( $price*$i); ?>
                        	<b> .đ</b>
                        </option>
							
                         <?php endfor; ?>       							         
							</select>
                            <div class="clear"></div>
                            <div class="error" id="price_from_error"></div>
                        
						</div>
				<div class="clear"></div>
			</div>
                  
                  
			<div class="form-row">
				<label for="param_price_from" class="form-label" style="width:70px">
                Giá tới:<span class="req">*</span>
                </label>
					<div class="form-item" style="width:90px">
					<select class="input" id="price_to" name="price_to">
                        
					<?php $price=1000000; for($i=1;$i<=20;$i++):?>   
                            
                    <option value="<?php echo $price*$i; ?>">
                     <?php echo number_format( $price*$i); ?><b> .đ</b>
                   
                    </option>
							
                         <?php endfor; ?>   
							 
						</select>
                            
					<div class="clear"></div>
					<div class="error" id="price_from_error"></div>
					</div>
                        
				<div class="clear"></div>
		 </div>
				  
		 <div class="form-row">
			<label class="form-label">&nbsp;</label>
				<div class="form-item">
				   	<input class="button" name="search" value="Tìm kiếm" style="height:30px !important;line-height: 						30px !important;padding:0px 10px !important" type="submit">
                    
				</div>
				<div class="clear"></div>
                
		</div>
        
    	</form>
            
	    </div><!-- End content-box -->
</div>

<div class="box-left">

  <div class="title tittle-box-left"><h2> Danh mục sản phẩm </h2></div>

	<?php foreach($product_info as $value):?>

		<div class="content-box"><!-- The content-box -->
  			<ul class="catalog-main">
             
            
                <li><span><a href="#"><?php echo $value->cata_name ?></a></span></li>
            </ul>   
             <!-- lay danh sach danh muc con -->

             <?php foreach($value->product_data as $key=>$row):?>    
             <ul class="catalog-sub"> 
             
                 <li>
                  <a href="<?php echo base_url()."product_detail/index/".$row['id'] ?>" >
				  			<?php echo $row['cate_name'].' - '.$row['name'] ?></a>
                 </li>		
                            			                    
             </ul>
             
		 	<?php endforeach;?>
			
   	 </div><!-- End content-box -->
     

     <?php endforeach;?>
     
     
</div>
			  