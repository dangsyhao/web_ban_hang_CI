<?php $this->load->view('site/slide');?>

<div class="box-center"><!-- The box-center product-->
    <div class="tittle-box-center"><h2>Sản phẩm mới</h2></div>
              

              
  <div class="box-content-center product"><!-- The box-content-center -->
  
   	<?php foreach ($product_data as $row): ?>
 
     <div class="product_item">
        <h3><a title="Sản phẩm" href=""> <?php  echo $row->name ?></a> </h3>
         <div class="product_img">
           <a title="Sản phẩm" href="<?php echo base_url().'product_detail/index/'.$row->id ?>">
              <img alt="" src="<?php echo base_url().'uploads/product/'.$row->image_link ?>" height="85px" width="35px">
           </a>
          </div>
            <p class="price">  <?php  echo number_format($row->price )?> .đ </p>
       
       <div class="action">
       <p style="float:left;margin-left:10px">Lượt xem: <b> <?php  echo $row->view ?></b></p>
	    <a title="Thêm" href="<?php echo base_url()."cart/add/".$row->id?>" class="button">Thêm vào giỏ</a>
              
	<div class="clear"></div>
                           
   </div>
              
 </div>
 	<?php endforeach; ?>
              
	 </div><!-- End box-content-center -->
     
     <div class="pagination">
	 <?php echo $this->pagination->create_links();?>
     </div>
     
    

</div>


<div class="box-center"><!-- The box-center product-->
    <div class="tittle-box-center"><h2>Sản phẩm xem nhiều</h2></div>
              

              
  <div class="box-content-center product"><!-- The box-content-center -->
  
  <?php if($view_best): ?>
   	<?php foreach ($view_best as $row): ?>
    
     <div class="product_item">
        <h3><a title="Sản phẩm" href=""> <?php  echo $row->name ?></a> </h3>
         <div class="product_img">
           <a title="Sản phẩm" href="<?php echo base_url().'product_detail/index/'.$row->id ?>">
              <img alt="" src="<?php echo base_url().'uploads/product/'.$row->image_link ?>" height="85px" width="35px">
           </a>
          </div>
            <p class="price">  <?php  echo number_format($row->price )?> .đ </p>

       <div class="action">
       <p style="float:left;margin-left:10px">Lượt xem: <b> <?php  echo $row->view ?></b></p>
	    <a title="Thêm" href="<?php echo base_url()."cart/add/".$row->id?>" class="button">Thêm vào giỏ</a>
              
	<div class="clear"></div>
                           
   </div>
              
 </div>
 
 	<?php endforeach; ?>
     <?php else: ?>
     	<div class=""><h2>Không tồn tại sản phẩm ! .</h2></div>
     <?php endif ?>
              
	 </div><!-- End box-content-center -->
     
     <div class="pagination">
	 <?php echo $this->pagination->create_links();?>
     </div>
     
    

</div>


