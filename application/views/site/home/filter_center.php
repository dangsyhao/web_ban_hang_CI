
<div class="box-center"><!-- The box-center product-->
  <div class="tittle-box-center"><h2>Tìm kiếm Sản phẩm có từ : <?php echo "'".$this->input->post('key-search')."'";?></h2>
  </div>
 
  <div class="box-content-center product"><!-- The box-content-center -->
  
   	<?php foreach ($filter_data as $row): ?>
    
     <div class="product_item">
        <h3><a title="Sản phẩm" href=""> <?php  echo $row->name ?></a> </h3>
        
         <div class="product_img">
           <a title="Sản phẩm" href="<?php echo base_url().'product_detail/index/'.$row->id ?>">
              <img alt="" src="<?php echo base_url().'uploads/product/'.$row->image_link ?>" height="85px" width="35px">
           </a>
          </div>
            <p class="price"> <?php  echo number_format($row->price) ?> <b>.đ</b></p>
                      
        <center>
                <div data-score="4" id="9" style="margin: 10px 0px; width: 100px;" class="raty" title="good">
                <img src="raty/img/star-on.png" alt="1" title="good">&nbsp;
                <img src="raty/img/star-on.png" alt="2" title="good">&nbsp;
                <img src="raty/img/star-on.png" alt="3" title="good">&nbsp;
                <img src="raty/img/star-on.png" alt="4" title="good">&nbsp;
                <img src="raty/img/star-off.png" alt="5" title="good">
                <input type="hidden" name="score" value="4" readonly="readonly"></div>
       </center>
       
       <div class="action">
       <p style="float:left;margin-left:10px">Lượt xem: <b> <?php  echo $row->view ?></b></p>
	    <a title="Mua ngay" href="them-vao-gio-9.html" class="button">Mua ngay</a>
              
	<div class="clear"></div>
                           
   </div>
              
 </div>
 
 	<?php endforeach; ?>
                   
	 </div><!-- End box-content-center -->
     
     <div class="pagination">
	 <?php echo $this->pagination->create_links();?>
     </div>
     

</div>

