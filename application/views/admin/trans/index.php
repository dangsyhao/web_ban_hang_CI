
<?php $this->load->view("admin/trans/head",$this->data)?>

<div class="line"></div>
<div class="wrapper">

	<div class="widget">
		<div class="title">
			<span class="titleIcon"><div class="checker" id="uniform-titleCheck"><span><input id="titleCheck" name="titleCheck" style="opacity: 0;" type="checkbox"></span></div></span>
			<h6>Danh sách Giao dịch</h6>
		 	<div class="num f12">Tổng số: <b><?php echo $total_rows ?></b></div>
		</div>
		
		<table class="sTable mTable myTable" id="checkAll" cellspacing="0" cellpadding="0" width="100%">
			
			<thead class="filter"><tr><td colspan="9">
            
				<form class="trans_data_filter form" action="<?php echo admin_url("trans/index")?>" method="post">
					<table cellspacing="0" cellpadding="0" width="100%"><tbody>
					
                    <tr>
                    
                    <td class="label" style="width:60px;"><label for="filter_id">Tên KH </label></td>
                    <td class="item">
                    <input name="name-product" id="filter_name-product" style="width:150px;" type="text" placeholder="--- Tên khách hàng ---" >
                    </td>

                    <td class="label"><label for="filter_status">Giao dịch</label></td>
                    <td class="item">
                        <select name="status" style="width:200px;" >
                        <option value="" >---Trạng thái giao dịch ---</option>
                        <option value="0"> Đợi xử lý</option>
                        <option value="1"> Thành công</option>
                        <option value="2"> Hủy bỏ</option>
                        </select>
                    </td>
                    
                    <td class="label" style="width:60px;"><label for="filter_id">Thời điểm</label></td>
                    <td class="item">
                    
                    <select name="date-trans" style="width:150px;" >
                    	<option value="" >---Ngày giao dịch ---</option>

                         <?php foreach($data_filter as $row):?>
                        <option value="<?php echo $row->created  ?>"
                         <?php echo ($this->input->post('date-trans'))? "selected = 'selected'" : false ?>  >
                        
                        <?php echo $row->created;?>
                         </option>
                        
                        <?php endforeach ; ?>
                   </select>

                    </td>
                    

                        <td colspan="2" style="width:60px">
                        <input class="button blueB" value="Lọc" type="submit">
                        
                        <input class="basic" value="Reset" type="submit">
                        
                        </td>
                        
                    </tr>
                    
                    <tr>
                    	<td></td>
                    </tr>

					</tbody></table>
				</form>
                
			</td></tr>
            
            </thead>
			<thead>
				<tr>
					<td style="width:10px;"><img src="<?php echo public_url('admin/images') ?>/icons/tableArrows.png"></td>
					<td style="width:60px;">Mã số</td>
					<td style="width:175px;">Thành viên</td>
					<td style="width:90px;">Số tiền</td>
					<td>Hình thức</td>
					<td style="width:100px;">Giao dịch</td>
					<td style="width:75px;">Ngày tạo</td>
					<td style="width:55px;">Hành động</td>
				</tr>
			</thead>
			
 			<tfoot class="auto_check_pages">
				<tr>
					<td colspan="8">
						 <div class="list_action itemActions">
								<a href="#submit" id="submit" class="button blueB" url="admin/tran/del_all.html">
									<span style="color:white;">Xóa hết</span>
								</a>
						 </div>
							
					     <div class="pagination">
                         <?php echo $this->pagination->create_links()?>
			              </div>
					</td>
				</tr>
			</tfoot>
			
			<tbody class="list_item">
            <?php foreach($list as $row):?>
            
							 <tr class="row_21">
					<td><div class="checker" id="uniform-undefined"><span><input name="id[]" value="21" style="opacity: 0;" type="checkbox"></span></div></td>
                    
					
                    
					<td class="textC"><?php echo $row->id ?></td>
					
					<td>
						<?php echo $row->user_name ?>
					</td>
					
					<td class="textR red"><?php echo number_format($row->amount) ?> .đ</td>
					
					<td class="textC">
					<?php echo $row->payment?></td>
					
					
					<td class="status textC">
                    <?php 
						$status='';
						
						if($row->status=="0"){
							$status="Đợi xử lý";
						}
						elseif($row->status=="1"){
							$status="Thành công";
						}
						elseif($row->status=="2"){
							$status="Hũy bỏ";
						}
						else {
							$status='chua cap nhat';
						}
						echo "<span class='pending'>";
                        
						echo $status ;
						echo "</span>";
						
					?>
					</td>
					
					<td class="textC">
						<?php  echo $row->created;?>
                    </td>
					
					<td class="textC">
							<a href="admin/tran/view/21.html" class="lightbox cboxElement">
								<img src="<?php echo public_url('admin/images') ?>/icons/color/view.png">
							</a>
							
						   <a href="<?php echo admin_url('trans/delete/'.$row->id) ?>" class="tipS verify_action" original-title=  			 																												"Xóa">
						    <img src="<?php echo public_url('admin/images') ?>/icons/color/delete.png">
						   </a>
					</td>
				</tr>
				<?php endforeach; ?>			 
						</tbody>
			
		</table>
	</div>
	
</div>

<div class="clear mt30"></div>