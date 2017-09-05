<h1>Survey Request</h1>
<form id="cariForm" name="cariForm" method="post" action="<?php echo base_url();?>index.php/survey_requests/survey_request_handler">
<input type='hidden' name='type' value='add' />
<div class="search">
Pencarian :
<input type="text" value="" name="cari">
<input id="btn_cari" type="submit" value="Cari" name="btn_cari">
</div>
<div class="content_isi">
<div class="toolbar">
<a href="<?php echo ($this->preference['c'][2]=='1')?base_url() . 'index.php/survey_requests/entry_survey_request/type/add':'#'; ?>">
<img width="32" height="32" border="0" src="<?php echo base_url();?>themes/<?php echo $this->setting['theme'];?>/images/add.png">
<br>
Tambah
</a>
<label>
<input type="image" class="btn_trash"  src="<?php echo base_url()?>themes/<?php echo $this->setting['theme'];?>/images/trash-big.png" value="remove" name="remove">
<br>
<span class="btn_trash_label" style="clear:both; display:block;"><?php echo $this->lang->line('delete');?></span>
</label>
<a style="float: right;" href="#">
<img width="32" height="32" border="0" src="<?php echo base_url();?>themes/<?php echo $this->setting['theme'];?>/images/reload.png">
<br>
Refresh
</a>
</div>
<table class="tabel" cellspacing="0" cellpadding="2" border="0">
<thead>
<tr>
<th width="3%" align="center">
<input type="hidden" value="__default" name="boxchecked">
<input type="hidden" value="" name="task">
<input type="checkbox" onclick="checkAll(21);" value="" name="toggle">
</th>
<th width="10%" align="center">NAMA</th>
<th width="5%" align="center">KESIMPULAN</th>
<th width="13%" align="center">KETERANGAN</th>
<th width="7%" align="center">TGL SURVEY</th>
<th width="4%" align="center">INSTALL</th>
<th width="10%">DIBUAT</th>
<th width="3%"> </th>
</tr>
</thead>
<tbody>
<?php
foreach($objs as $obj){
switch ($obj->resume){
case '0':
$resume = 'Bisa dilaksanakan';
break;
case '1':
$resume = 'Bisa dilaksanakan dg syarat';
break;
case '2':
$resume = 'Tidak bisa dilaksanakan';
break;
case '3':
$resume = 'Belum diputuskan';
default:
$resume = 'Belum diputuskan';
break;
}
?>
<tr>
<td align="center">
<input id="cb1" type="checkbox" onclick="isChecked(this.checked);" value="<?php echo $obj->id;?>" name="id[]">
</td>
<td><?php echo $obj->client->name;?></td>

<td><?php echo $resume;?></td>
<td><?php echo $obj->client->address;?></td>
<td align="center"><?php echo $obj->survey_date;?></td>
<td align="center"><?php echo anchor(base_url() . 'index.php/install_requests/entry_install_request/type/add/survey_id/' . $obj->id ,'install');?></td>
<td align="center"><?php echo $obj->create_date;?></td>
<?php 
$edit_url = ($this->preference['u'][2] == '1')?base_url() . 'index.php/survey_requests/entry_survey_request/type/edit/id/' . $obj->id:'#';
?>
<td align="center"><a href='<?php echo $edit_url;?>'><img src="<?php echo base_url();?>themes/<?php echo $this->setting['theme'];?>/images/edit.png" /></a></td>
</tr>
<?php
}
?>
</tbody>
</table>
</div>
</form>
<div class="paging">
<p>Page : <?php echo $page;?>
<i> Of </i><?php echo $page_count;?> . Total Records Found: <?php echo $total;?>
</p>
<?php echo $this->pagination->create_links();?>
</div>
<div id="footer"><?php echo $this->setting['footer_text']?></div>            