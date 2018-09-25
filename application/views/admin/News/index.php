<!-- head -->
<?php $this->load->view('admin/news/head', $this->data)?>

<div class="line"></div>


<div id="main_news" class="wrapper">
	<div class="widget">
	
		<div class="title">
			<span class="titleIcon"><input type="checkbox" name="titleCheck" id="titleCheck"></span>
			<h6>
				Danh sách Tin tức :		
			</h6>
		 	<div class="num f12">Số lượng: <b><?php echo $total_rows?></b></div>
		</div>
		
		<table width="100%" cellspacing="0" cellpadding="0" id="checkAll" class="sTable mTable myTable">
			<thead>
				<tr>
					<td style="width:21px;"><img src="<?php echo public_url('admin/images')?>/icons/tableArrows.png"></td>
					<td style="width:60px;">Mã số</td>
					<td>Tên</td>
					<td>Trích dẫn </td>
					<td style="width:75px;">Ngày tạo</td>
					<td style="width:120px;">Hành động</td>
				</tr>
			</thead>
			
 			<tfoot class="auto_check_pages">
				<tr>
					<td colspan="6">
						 <div class="list_action itemActions">
								<a url="<?php echo admin_url('news/del_select') ?>" class="button blueB" id="submit" href="#submit">
									<span style="color:white;">Xóa hết</span>
								</a>
						 </div>
							
					     <div class="pagination">
					          <?php echo $this->pagination->create_links()?>
			             </div>
					</td>
				</tr> <
			</tfoot>
			
			<tbody class="list_item">
			     <?php foreach ($list as $row):?>
                 
                 <form action="" method="post" >
                 
			     	<tr class="<?php echo "row_".$row->id?>">
                 
					<td><input type="checkbox" value="<?php echo $row->id ?>" name="id[]"></td>
					
					<td class="textC"><?php echo $row->id?></td>
					
					<td>
                    
                        <div class="image_thumb">
                            <img height="50" src="<?php echo base_url('uploads/news/'.$row->image_link)?>">
                            <div class="clear"></div>
                        </div>
					
                        <a target="_blank" title="" class="tipS" href="">
                            <b><?php echo $row->title?></b>
                        </a>
					
						<div class="f11"> Xem: <?php echo $row->count_view?></div>
						
					</td>
                    
                    
                    <td class="option textC" width="300px">
                        <div>
                        <span> <?php echo $row->intro ?></span>
                        </div>
					</td>
                    

					<td class="textC">01-01-1970</td>
					
					<td class="option textC">
                        <a title="Xem chi tiết Bài Viết" class="tipS" target="_blank" href="news/view/9.html">
                         	<img src="<?php echo public_url('admin/images')?>/icons/color/view.png">
                        </a>
                        <a class="tipS" title="Chỉnh sửa" href='<?php echo admin_url("news/update/".$row->id)?>'>
                            <img src="<?php echo public_url('admin/images')?>/icons/color/edit.png">
                        </a>

					</td>
                    
				</tr>
                
                </form>
				<?php endforeach;?>
                
		   </tbody>
			
		</table>
	</div>
	
</div>



