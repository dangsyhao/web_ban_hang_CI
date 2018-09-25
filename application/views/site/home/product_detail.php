
<div class="content"> 
			       			       <!-- video -->
<script type="text/javascript" src="http://localhost/webproduct/public/site/tivi/jwplayer.js"></script>
<script type="text/javascript">

jQuery('document').ready(function(){
	 jwplayer('mediaspace').setup({
    'flashplayer': 'http://localhost/webproduct/public/site/tivi/player.swf',
    'file': 'https://www.youtube.com/watch?v=zAEYQ6FDO5U',
    'controlbar': 'bottom',
    'width': '560',
    'height': '315',
    'autoplay' : false,
  });
})
</script>

<script type="text/javascript">
$(document).ready(function(){
	
    $('a.tab').click(function(){
    	var an_di=$('a.selected').attr('rel'); //lấy title của thẻ &lt;a class='active'&gt;
    	$('div#'+an_di).hide(); //ẩn thẻ &lt;div id='an_di'&gt;
    	$('a.selected').removeClass('selected');
    	$(this).addClass('selected');
    	var hien_thi=$(this).attr('rel'); //lấy title của thẻ &lt;a&gt; khi ta kick vào nó
   		$('div#'+hien_thi).show(); //hiện lên thẻ &lt;div id='hien_thi'&gt;
    });
});

</script>


<!-- zoom image -->
<link rel="stylesheet" href="<?php echo public_url("site")?>/jqzoom_ev/css/jquery.jqzoom.css" type="text/css">
<script type="text/javascript" src="<?php echo public_url("site")?>/jqzoom_ev/js/jquery.jqzoom-core.js" >

</script>

<script type="text/javascript">
$(document).ready(function() {
	$('.jqzoom').jqzoom({
            zoomType: 'standard',
    });
});
</script>
<!-- end zoom image -->


 <div class="box-center"><!-- The box-center product-->
    <div class="tittle-box-center"><h2>Chi tiết sản phẩm</h2></div>
    
    <!-- The box-content-center -->

		<div class="box-content-center product">
        
		   <div class="product_view_img">
		      <a href="<?php echo base_url().'uploads/product/'.$product_data->image_link?>" class="jqzoom" rel="gal1" title="<?php echo $product_data->name ?>">
	 			   <img src="<?php echo base_url().'uploads/product/'.$product_data->image_link?>" alt="<?php $product_data->name ?> " style="width:280px !important">
			 </a>
	<div class="clear" style="height:10px"></div>
	<div class="clearfix">
    
     
	<ul id="thumblist">
    <?php foreach(json_decode($product_data->image_list) as $row):?>
		<li>
		<a class="zoomThumbActive" href="javascript:void(0);" >
		<img src="<?php echo base_url()."uploads/product/".$row->file_name ?>">
		 </a>
		</li>
	 <?php endforeach; ?>
	</ul>
    
    
	</div>
	</div>
		           
       <div class="product_view_content">
           <h1><?php echo $product_data->name ?></h1>
           
           <p class="option">
           Giá: <span class="product_price"><?php echo $product_data->price ?> đ</span> 
           </p>
           
            <p class="option">
              Danh mục: <a href="http://localhost/webphp/danh-muc-LG/15.html" title="<?php echo $product_data->name ?>"><b><?php echo $product_data->name ?></b></a>
           </p>
           
           <p class="option">
              Lượt xem: <b><?php echo $product_data->view ?></b> 
           </p>
           
           <p class="option">
              Bảo hành: <b><?php echo $product_data->warranty ?></b> 
           </p>
           
            <p class="option">
              Tặng quà: <b><?php echo $product_data->gifts ?></b> 
           </p>

		   <div class="action">
			<a class="button" style="float:left;padding:8px 15px;font-size:16px" 
            href="<?php echo base_url()."cart/add/".$product_data->id ?>" title="Mua ngay">Thêm vào giỏ hàng</a>
                 
			<div class="clear"></div>
			</div>
        
		</div>
	<div class="clear" style="height:15px"></div>
        
	<center>
  <!-- AddThis Button BEGIN -->
<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">
	stLight.options({publisher: "19a4ed9e-bb0c-4fd0-8791-eea32fb55964", doNotHash: false, doNotCopy: false, 	hashAddressBar: false});
</script>

<span class="st_facebook_hcount" displaytext="Facebook" st_processed="yes"><span style="text-decoration:none;color:#000000;display:inline-block;cursor:pointer;" class="stButton"><span><span class="stMainServices st-facebook-counter" style="background-image: url(&quot;http://w.sharethis.com/images/2017/facebook_counter.png&quot;);">&nbsp;</span><span class="stArrow"><span class="stButton_gradient stHBubble" style="display: inline-block;"><span class="stBubble_hcount">0</span></span></span></span></span></span>
<span class="st_fblike_hcount" displaytext="Facebook Like" st_processed="yes"><span style="text-decoration:none;color:#000000;display:inline-block;cursor:pointer;position:relative;margin:3px 3px 0;padding:0px;font-size:11px;line-height:0px;vertical-align:bottom;overflow:visible;"><div data-action="" data-send="false" data-layout="button_count" data-show-faces="false" class="fb-like fb_iframe_widget" data-href="file:///C:/xampp/htdocs/webproduct/public/site/product.html" fb-xfbml-state="rendered" fb-iframe-plugin-query="app_id=170796359666689&amp;container_width=0&amp;href=file%3A%2F%2F%2FC%3A%2Fxampp%2Fhtdocs%2Fwebproduct%2Fpublic%2Fsite%2Fproduct.html&amp;layout=button_count&amp;locale=en_US&amp;sdk=joey&amp;send=false&amp;show_faces=false"><span style="vertical-align: top; width: 0px; height: 0px; overflow: hidden;"><iframe name="f2384cff6ecae2" allowtransparency="true" allowfullscreen="true" scrolling="no" title="fb:like Facebook Social Plugin" style="border: medium none; visibility: visible; width: 0px; height: 0px;" src="https://www.facebook.com/plugins/like.php?app_id=170796359666689&amp;channel=http%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2FNh1oH0K63yz.js%3Fversion%3D42%23cb%3Df3a34d5ba286b4e%26domain%3D%26origin%3Dfile%253A%252F%252F%252Ff2095585fca8b32%26relation%3Dparent.parent&amp;container_width=0&amp;href=file%3A%2F%2F%2FC%3A%2Fxampp%2Fhtdocs%2Fwebproduct%2Fpublic%2Fsite%2Fproduct.html&amp;layout=button_count&amp;locale=en_US&amp;sdk=joey&amp;send=false&amp;show_faces=false" frameborder="0" height="1000px" width="1000px"></iframe></span></div></span></span>
<span class="st_googleplus_hcount" displaytext="Google +" st_processed="yes"><span style="text-decoration:none;color:#000000;display:inline-block;cursor:pointer;" class="stButton"><span><span class="stButton_gradient"><span class="chicklets googleplus">Google +</span></span><span class="stArrow"><span class="stButton_gradient stHBubble" style="display: inline-block;"><span class="stBubble_hcount">0</span></span></span></span></span></span>
<span class="st_twitter_hcount" displaytext="Tweet" st_processed="yes"><span style="text-decoration:none;color:#000000;display:inline-block;cursor:pointer;" class="stButton"><span><span class="stMainServices st-twitter-counter" style="background-image: url(&quot;http://w.sharethis.com/images/2017/twitter_counter.png&quot;);">&nbsp;</span><span class="stArrow"><span class="stButton_gradient stHBubble" style="display: inline-block;"><span class="stBubble_hcount">0</span></span></span></span></span></span>
<!-- AddThis Button END -->
</center>  

	<div class="clear" style="height:10px"></div>
	 <table class="tbsicons" cellspacing="0" cellpadding="3" border="0" width="100%">
		<tbody>
		 <tr>
		<td width="25%"><img alt="Phục vụ chu đáo" src='<?php echo public_url("site") ?>/images/icon-services.png'> <div>Phục vụ chu đáo</div>
        </td>
		<td width="25%"><img alt="Giao hàng đúng hẹn" src='<?php echo public_url("site") ?>/images/icon-shipping.png'><div>Giao hàng đúng hẹn</div>
        </td>
	    <td width="25%"><img alt="Đổi hàng trong 24h" src='<?php echo public_url("site") ?>/images/icon-delivery.png'> <div>Đổi hàng trong 24h</div></td>
	   </tr>
       
	</tbody>
	</table>
	 </div>
     
</div>

<div class="usual" id="usual1">
     <ul>
	       <li><a title="Chi tiết sản phẩm" rel="tab2" href="javascript:void(0)" class="tab selected">Chi tiết sản phẩm</a></li>
	       <li><a title="Video" rel="tab3" href="javascript:void(0)" class="tab">Video</a></li> 
	       <li><a title="Hỏi đáp về sản phẩm" rel="tab4" href="javascript:void(0)" class="tab">Hỏi đáp về sản phẩm</a></li>         
	</ul>
</div><!-- end  <div class="usual" id="usual1">-->

<div class="usual-content">
	<div id="tab2" style="display: block;"> 
		<p>Bài viết cho sản phẩm này đang được cập nhật! ...</p>
      
		<!-- comment facebook -->
		<center>
        
<div id="fb-root" class=" fb_reset"><div style="position: absolute; top: -10000px; height: 0px; width: 0px;"><div><iframe name="fb_xdm_frame_http" allowtransparency="true" allowfullscreen="true" scrolling="no" id="fb_xdm_frame_http" aria-hidden="true" title="Facebook Cross Domain Communication Frame" tabindex="-1" style="border: medium none;" src="http://staticxx.facebook.com/connect/xd_arbiter/r/Nh1oH0K63yz.js?version=42#channel=f2095585fca8b32&amp;origin=file%3A%2F%2F" frameborder="0"></iframe><iframe name="fb_xdm_frame_https" allowtransparency="true" allowfullscreen="true" scrolling="no" id="fb_xdm_frame_https" aria-hidden="true" title="Facebook Cross Domain Communication Frame" tabindex="-1" style="border: medium none;" src="https://staticxx.facebook.com/connect/xd_arbiter/r/Nh1oH0K63yz.js?version=42#channel=f2095585fca8b32&amp;origin=file%3A%2F%2F" frameborder="0"></iframe></div></div><div style="position: absolute; top: -10000px; height: 0px; width: 0px;"><div><iframe name="f3af811a3413fc" allowtransparency="true" allowfullscreen="true" scrolling="no" style="display: none;" src="https://www.facebook.com/connect/ping?client_id=170796359666689&amp;domain=&amp;origin=1&amp;redirect_uri=http%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2FNh1oH0K63yz.js%3Fversion%3D42%23cb%3Df153c26672bd19a%26domain%3D%26origin%3Dfile%253A%252F%252F%252Ff2095585fca8b32%26relation%3Dparent&amp;response_type=token%2Csigned_request%2Ccode&amp;sdk=joey" frameborder="0"></iframe></div></div></div>
<script src="http://connect.facebook.net/en_US/all.js#appId=170796359666689&amp;xfbml=1"></script>
<div class="fb-comments fb_iframe_widget_loader fb_iframe_widget fb_hide_iframes" data-href="http://localhost/webphp/index.php/san-pham-Tivi-LG-520/9.html" data-num-posts="5" data-width="550" data-colorscheme="light" fb-xfbml-state="rendered"><span style="height: 100px; width: 550px;"><iframe id="f24c4440cf93a04" name="f2e9ca72449cf58" scrolling="no" style="border: medium none; overflow: hidden; height: 100px; width: 550px;" title="Facebook Social Plugin" class="fb_ltr" src="https://www.facebook.com/plugins/comments.php?api_key=170796359666689&amp;channel_url=http%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2FNh1oH0K63yz.js%3Fversion%3D42%23cb%3Df2d48c7542d6164%26domain%3D%26origin%3Dfile%253A%252F%252F%252Ff2095585fca8b32%26relation%3Dparent.parent&amp;colorscheme=light&amp;href=http%3A%2F%2Flocalhost%2Fwebphp%2Findex.php%2Fsan-pham-Tivi-LG-520%2F9.html&amp;locale=en_US&amp;numposts=5&amp;sdk=joey&amp;skin=light&amp;width=550"></iframe></span></div>

</center>   

	</div>
    
    
	<div id="tab3" style="display: none;"> 
	    <!-- the div chay video -->
	    <div id="mediaspace" style="margin:5px;"></div>
	</div>
	
	<div id="tab4" style="display: none;"> 
	       <div class="box-show-product">
	       <!-- hiển thị danh sách comment và form comment -->
	       <div class="comments">
	<div class="title">
    <h3>THẢO LUẬN CỦA KHÁCH HÀNG <span class="yellow">(0)</span></h3>
    <h4>Ý kiến khách hàng về Sản phẩm Tivi LG 520</h4>
    </div>
	<br class="break">
	<div class="reviews">
	<div class="content">
	 </div>
	</div>
    </div>

	<div class="clear"></div>	       


<style>
.error{margin:15px 0px;}
</style>


<form name="send_comment" id="show_box_comment" class="t-form form_action" method="post" action="http://localhost/webphp/comment/add.html">
     <table style="margin:10px auto" cellspacing="0" cellpadding="0" border="0" width="90%">
          <tbody>
              <tr>
	              <td style="width:210px;padding-right:15px;vertical-align:top">
	                   <input style="width:200px;" class="input" id="user_name" placeholder="Họ tên" value="" name="user_name" type="text">
				       <div name="user_name_error" class="error"></div>
				       <input style="width:200px;" id="user_email" class="input" placeholder="Email" value="" name="user_email" type="text">
                       <div name="user_email_error" class="error"></div>
                       <img id="imgsecuri" src="http://localhost/webphp/captcha/three.html" style="margin-bottom: -6px;" _captcha="http://localhost/webphp/captcha/three.html" class="imgrefresh">
					   
					   <input class="input" style="width:80px;" id="security_code" placeholder="Mã xác nhận" name="security_code" type="text">
					   <div name="security_code_error" class="error"></div>
	              </td>
	              <td>
	                    <textarea id="content_comment" cols="50" rows="3" style="width:320px" class="input" placeholder="Nội dung phản hồi" name="content">	                    </textarea>
                        <div name="content_error" class="error"></div>
                        <input name="product_id" value="9" type="hidden">
				        <input name="parent_id" id="comment_parent_id" value="" type="hidden">
				        <input class="button button-border medium blue f" id="" value="Gửi" name="_submit" type="submit">
				        <input class="button button-border medium red f" value="Nhập lại" type="reset">
				        <div class="clear"></div>
	              </td>
              </tr>
          </tbody>
     </table>
</form>	       </div>
	</div>
	
</div>


<div class="box-center">
<!-- The box-center product-->
   <div class="tittle-box-center"><h2>Sản phẩm tương tự</h2></div>
   
	<div class="box-content-center product"><!-- The box-content-center -->
    <?php foreach($list_data as $row):?>
		<div class="product_item">
             <h3><a href="" title="<?php echo $row->name ?>"> <?php echo $row->name ?></a></h3>
                 <div class="product_img">
                    <a href="<?php echo base_url()."product_detail/index/".$row->id ?>" title="<?php echo $row->name ?>">
                        <img src="<?php echo base_url()."uploads/product/".$row->image_link ?>" alt="">
                    </a>
                 </div
          ><p class="price"> <?php echo number_format($row->price) ?> đ</p>
  
    <div class="action">
        <p style="float:left;margin-left:10px">Lượt xem: <b>1</b></p>
	         <a class="button" href="http://localhost/webphp/them-vao-gio-6.html" title="Mua ngay">Mua ngay</a>
	<div class="clear"></div>
     </div>
     
   </div>
   
   <?php endforeach; ?>

 <div class="clear"></div>
 </div><!-- End box-content-center -->
 
</div>	<!-- End box-center product-->	   
 




			   </div>