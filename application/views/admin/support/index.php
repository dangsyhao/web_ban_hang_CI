<!-- head -->
<?php $this->load->view('admin/support/head', $this->data)?>

<div class="line"></div>

<div class="wrapper">

    <?php $this->load->view('admin/message', $this->data);?>
    
	<div class="widget">
	
		<div class="title">
			<span class="titleIcon">
			<div class="checker" id="uniform-titleCheck">
    			<span>
    			   <input type="checkbox" name="titleCheck" id="titleCheck" style="opacity: 0;">
    			</span>
			</div>
			</span>
			<h6>Thông tin hỗ trợ </h6>
		 	<div class="num f12">Tổng số: <b><?php echo count($support_data)?></b></div>
		</div>
		
		<table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll">
			<thead>
				<tr>
					<td style="width:10px;"><img src="<?php echo public_url('admin')?>/images/icons/tableArrows.png" /></td>
					<td style="width:80px;">Tên thành viên</td>
					<td>Email</td>
                    <td>Skype</td>
                    <td>Phone</td>

					<td style="width:100px;">Hành động</td>
				</tr>
			</thead>
			
 			<tfoot>
				<tr>
					<td colspan="7">
					     <div class="list_action itemActions">
                         
						<a href="<?php echo admin_url('support/del_select')?>" id="submit" class="button blueB">
							<span style='color:white;'>Xóa</span>
						</a>
						 </div>
					</td>
                    
				</tr>
			</tfoot>
 			
			<tbody>
			<?php foreach ($support_data as $row):?>
			<tr>
						<td><input type="checkbox" name="ids[]" value="<?php echo $row->id?>" /></td>
                        <td class="textC"><span class="tipS"><?php echo $row->name ?></span></td>
                        <td class="textC"><span class="tipS"><?php echo $row->email ?></span></td>
                        <td class="textC"><span class="tipS"><?php echo $row->skype ?></span></td>
                        <td class="textC"><span class="tipS"><?php echo $row->phone ?></span></td>

						<td class="option">
							<a href="<?php echo admin_url('support/edit/'.$row->id)?>" title="Chỉnh sửa" class="tipS ">
							   <img src="<?php echo public_url('admin')?>/images/icons/color/edit.png" />
							</a>
							
							<a href="<?php echo admin_url('support/delete/'.$row->id)?>" title="Xóa" class="tipS verify_action" >
							    <img src="<?php echo public_url('admin')?>/images/icons/color/delete.png" />
							</a>
						</td>
					</tr>
					<?php endforeach;?>
					</tbody>
				</table>
	</div>
</div>

<div class="clear mt30"></div>
