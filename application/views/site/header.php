<!-- The box-header-->			        
<link rel="stylesheet" href="<?php echo public_url()?>/js/jquery/autocomplete/css/smoothness/jquery-ui-1.8.16.custom.css" type="text/css">	
<script src="<?php echo public_url()?>/js/jquery/autocomplete/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(function() {
    $( "#text-search" ).autocomplete({
        source: "product/search_ac.html",
    });
});
</script>


<div class="top">
      <!-- The top -->
      <div id="logo"><!-- the logo -->
           <a title="Học lập trình website với PHP và MYSQL" href="http://localhost/webproduct/">
	           <img alt="Học lập trình website với PHP và MYSQL" src="<?php echo public_url()?>/site/images/logo.jpg">
	       </a>
       </div>
       <!-- End logo -->
       
       <!--  load gio hàng -->
      <div class="cart" id="cart_expand"> 
            <a class="cart_link" href="<?php echo base_url("cart/index"); ?>">
               Giỏ hàng <span id="in_cart">
               <?php 
			   $cart=$this->cart->contents();
			   $qty_total=0;
			   
			   foreach($cart as $key=>$item){
				   
				   $qty_total +=$item['qty'];
 
			   }
			   echo isset($qty_total)? $qty_total:'0' ;
			   ?>
               </span> sản phẩm
            </a> 
            <img src="<?php echo public_url()?>/site/images/cart.png" alt="cart bnc"> 
	</div>       
    
     <div id="search"><!-- the search -->
     
	<form action="<?php echo base_url()."filter_center/index" ?>" method="post">
		<input type="text" aria-haspopup="true" aria-autocomplete="list" role="textbox" autocomplete="off" class="ui-autocomplete-input" placeholder="Tìm kiếm sản phẩm..." value="" name="key-search" id="text-search">
		<input type="submit" value="Tìm Kiếm " name="but" id="but">
	</form>
    
    </div><!-- End search -->
       
              
    <div class="clear"></div><!-- clear float --> 
</div><!-- End top -->			   <!-- End box-header  -->
               
               <!-- The box-header-->
			        <div id="menu"><!-- the menu -->
           <ul class="menu_top">
                <li class="active index-li"><a href="http://localhost/webproduct/">Trang chủ </a></li>
                <li class=""><a href="info/view/1.html">Giới thiệu</a></li>
                <li class=""><a href="info/view/2.html">Hướng dẫn</a></li>
                <li class=""><a href="san-pham.html">Sản phẩm</a></li>
                <li class=""><a href="tin-tuc.html">Tin tức</a></li>
                <li class=""><a href="video.html">Video</a></li>
                <li class=""><a href="lien-he.html">Liên hệ</a></li>
                <li class="register"><a href="<?php echo base_url("user/register"); ?>">Đăng ký</a></li>
                <li class="login"><a href="<?php echo base_url("user/login"); ?>">Đăng nhập</a></li>
          </ul>
          
          <script language="javascript" >
		  var flag="<?php echo $this->session->userdata("username") ?>";
		  if(flag.length>0){
			 $('.register a').attr("href","<?php echo base_url("user/index")?>");
			 $('.register a').attr("style","color:red");
			 $('.register a').text('Thông tin : <?php echo $this->session->userdata("username")?>');
			 
			 $('.login a').attr("href","<?php echo base_url("user/logout")?>");
			 $('.login a').attr("style","color:red");
			 $('.login a').text('Đăng Xuất');
			 
		  }
		  
		  </script>
          
</div><!-- End menu -->
               <!-- End box-header  -->
		       
	