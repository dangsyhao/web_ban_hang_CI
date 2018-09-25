<!-- head -->
<?php $this->load->view('admin/product/head', $this->data)?>

<div class="line"></div>


<div id="main_product" class="wrapper">
	<div class="widget">
	
		<div class="title">
			<span class="titleIcon"><input type="checkbox" name="titleCheck" id="titleCheck"></span>
			<h6>
				Danh sách sản phẩm			
			</h6>
		 	<div class="num f12">Số lượng: <b><?php echo $total_rows?></b></div>
		</div>
		
		<table width="100%" cellspacing="0" cellpadding="0" id="checkAll" class="sTable mTable myTable">
			
			<thead class="filter"><tr><td colspan="6">
            
				<form method="get" action="<?php echo admin_url('product')?>" class="list_filter form">
					<table width="100%" cellspacing="0" cellpadding="0"><tbody>
						<tr>
                        
                        	<td style="width:70px;" class="label"><label for="filter_id">Loại SP </label></td>
							<td style="width:155px;" class="item">
                            <select name="product_id" style="width:150px;" >
                    			<option value="" >---Chọn SP ---</option>

								 <?php foreach($product_catalog_data as $row):?>
                                 <option value="<?php echo $row->id  ?>"
                                 <?php echo ($this->input->post('product_id'))?"selected ='selected'" : false ?> >
                                 <?php echo $row->name  ?>
                                
                                 </option>
                                <?php endforeach ; ?>
                  			 </select>
                            </td>
                            
                            <td style="width:70px;" class="label"><label for="filter_id">Hãng SX </label></td>
							<td style="width:155px;" class="item">
                            <select name="maker_id" style="width:150px;" >
                    			<option value="" >---Hãng SP ---</option>

								<?php foreach($maker_catalog_data as $row):?>
                                 <option value="<?php echo $row->id  ?>"
                                 <?php echo ($this->input->post('product_id'))?"selected = 'selected'" : false ?> >
                                 <?php echo $row->name  ?>
                                
                                 </option>
                                <?php endforeach ; ?>
                  			 </select>
                            </td>

                            <td style="width:70px;" class="label"><label for="filter_id">Ngày tạo </label></td>
							<td style="width:155px;" class="item">
                            <select name="date-order" style="width:150px;" >
                    			<option value="" >---Ngày tạo ---</option>

                        		 <?php foreach($list as $row):?>
                        		<option value="<?php echo $row->created  ?>"
                        		 <?php echo ($this->input->post('date-order'))? "selected = 'selected'" : false ?>  >
                        
                        			<?php echo $row->created;?>
                         		</option>
                        
                       			 <?php endforeach ; ?>
                  			 </select>
                            </td>
                            
							<td>
							<input type="submit" value="Lọc" class="button blueB">
                            </td>
                            <td>
							<input type="reset" onclick="window.location.href = '<?php echo admin_url('product/index')?>'; " value="Reset" class="basic">
							</td>
							
						</tr>
					</tbody></table>
				</form>
			</td></tr></thead>
			
			<thead>
				<tr>
					<td style="width:21px;"><img src="<?php echo public_url('admin/images')?>/icons/tableArrows.png"></td>
					<td style="width:30px;">Mã số</td>
					<td style="width:130px;">Tên</td>
					<td style="width:50px;">Giá</td>
                    <td style="width:50px;">Nhà SX</td>
					<td style="width:50px;">Ngày tạo</td>
					<td style="width:120px;">Hành động</td>
				</tr>
			</thead>
			
 			<tfoot class="auto_check_pages">
				<tr>
					<td colspan="6">
						 <div class="list_action itemActions">
								<a url="<?php echo admin_url('news/del_select') ?>" class="button blueB" id="submit" href="#submit">
									<span style="color:white;">Xóa</span>
								</a>
						 </div>
							
					     <div class="pagination">
					          <?php echo $this->pagination->create_links()?>
			             </div>
					</td>
				</tr>
			</tfoot>
			
			<tbody class="list_item">
            
			     <?php foreach ($list as $row):?>
			     <tr class="<?php echo "row_".$row->id?>">
					<td><input type="checkbox" value="<?php echo $row->id ?>" name="id[]"></td>
					
					<td style="width:30px;" class="textC"><?php echo $row->id?></td>
					
					<td class="textD" style="width:130px;" >
					<div class="image_thumb">
						<img height="50" src="<?php echo base_url('uploads/product/'.$row->image_link)?>">
						<div class="clear"></div>
					</div>
					
					<a target="_blank" title="" class="tipS" href="">
					    <b><?php echo $row->name?></b>
					</a>
					
					<div class="f11">
					  Đã bán: <?php echo $row->buyed?>	| Xem: <?php echo $row->view?>					
					 </div>
						
					</td>
					
					<td class="textR" style="width:50px;">
					    <?php if($row->discount > 0):?>
                        
					    <?php $price_new = $row->price - $row->discount;?>
					       <b style="color:red"><?php echo number_format($price_new)?> đ</b>
					       <p style="text-decoration:line-through"><?php echo number_format($row->price)?> đ</p>
					    <?php else:?>
					        <b style="color:red"><?php echo number_format($row->price)?> đ</b>
					    <?php endif;?>   				
					</td>
                    
                    <td class="textC" style="width:50px;">
					<?php foreach($maker_catalog_data as $row2):?>
                    <?php echo $row2->name ; ?>
                    <?php endforeach; ?>
                    </td>
					
					<td class="textC" style="width:50px;"><?php echo $row->created ?></td>
					
					<td class="textR">
                    <a title="Xem chi tiết sản phẩm" class="tipS" target="_blank" href="product/view/9.html">
                            <img src="<?php echo public_url('admin/images')?>/icons/color/view.png">
                     </a>
                     <a class="tipS" title="Chỉnh sửa" href="<?php echo admin_url('product/update/'.$row->id)?>">
                        <img src="<?php echo public_url('admin/images')?>/icons/color/edit.png">
                    </a>
                    
                    <a class="tipS verify_action" title="Xóa" href="<?php echo admin_url('product/delete/'.$row->id)?>">
                        <img src="<?php echo public_url('admin/images')?>/icons/color/delete.png">
                    </a>
					</td>
				</tr>
				<?php endforeach;?>
		   </tbody>
			
		</table>
	</div>
	
</div>



