<!-- head -->
<?php $this->load->view('admin/slide/head', $this->data)?>

<div class="line"></div>

<div class="widget">
	
		<div class="title">
			<img src="<?php echo public_url('admin/images')  ?>/icons/dark/dialog.png" class="titleIcon">
			<h6>Danh sách Slide</h6>
		</div>
		
		<div class="gallery">
        	<ul>
                <?php foreach($list as $row): ?>    
                      	
                <li id="<?php echo $row->id ?>">
                
                 <a class="lightbox cboxElement" title="<?php echo $row->name ?>" href="../upload/slide/31.jpg">
                     <img src='<?php echo base_url("uploads/slide/".$row->image_link) ?>' width="280px">
                 </a>
            
                 <div class="actions" style="display: none;">
                    <a href='<?php echo admin_url("slide/update/".$row->id) ?>' class="tipS" original-title="Chỉnh sửa">
                    <img src="<?php echo public_url('admin/images')  ?>/icons/color/edit.png"></a>
                    
                    <a href='<?php echo admin_url("slide/delete/".$row->id) ?>' class="tipS verify_action" original-title="Xóa">
                        <img src="<?php echo public_url('admin/images')  ?>/icons/color/delete.png">
                    </a>
                 </div>
               </li>
               
               <?php endforeach; ?>

            </ul>
            
        <div class="clear" style="height:20px"></div>
        
        </div>	
            
		
	</div>


