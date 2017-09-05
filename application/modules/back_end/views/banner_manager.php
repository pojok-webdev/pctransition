<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>fancybox/jquery.fancybox-1.3.4.css" media="screen" />
<script type='text/javascript' src='<?php echo base_url();?>fancybox/jquery.fancybox-1.3.4.js'></script>
<script type='text/javascript'>
$(document).ready(function(){
	$('a.fance').fancybox();
});
</script>
    	<h1><?php echo $this->lang->line('banner_management');?></h1>
		<form id="cariForm" name="cariForm" method="post" action="<?php echo base_url();?>index.php/back_end/banner_handler">
		<div class="search">
                Pencarian :
                <input type="text" value="" name="cari">
                <input id="submit_cari" type="submit" value="Cari" name="btn_cari">
        </div>
        <div class="content_isi">
        	<!--form id="adminForm" name="adminForm" method="post" action=""-->
            	<div class="toolbar">
                	<a href="<?php echo base_url();?>index.php/back_end/entry_banner/type/add">
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
                        <img width="32" height="32" border="0" src="<?php echo base_url();?>themes/<?php echo $this->setting['theme'];?>/images//reload.png">
                        <br>
                        Refresh
                    </a>
                </div>
                <table class="tabel" width="100%" cellspacing="0" cellpadding="2" border="0">
                	<thead>
                    	<tr>
                        	<th width="3%" align="center">
                                <input type="hidden" value="__default" name="boxchecked">
                                <input type="hidden" value="" name="task">
                                <input type="checkbox" onclick="checkAll(21);" value="" name="toggle">
                            </th>
                            <th width="30%" align="left">Banner Name</th>
                            <th width="24%" align="left">Banner Type</th>
                            <th width="7%">AKTIF</th>
                            <th width="14%">ENTRY BY</th>
                            <th width="19%">ENTRY LOG</th>
                            <th width="3%" colspan=2> </th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    foreach ($banners as $banner){
                    ?>
                    	<tr>
                        	<td align="center">
                            	<input id="cb1" type="checkbox" onclick="isChecked(this.checked);" value="<?php echo $banner->id;?>" name="id[]">
                            </td>
                            <td><?php echo $banner->name;?></td>
                            <td><?php echo $banner->btype;?></td>
                            <?php 
                            $status = ($banner->status=='1')?'ya.png':'tidak.png';
                            ?>
                          	<td align="center"><img src="<?php echo base_url();?>themes/<?php echo $this->setting['theme'];?>/images/<?php echo $status;?>" /></td>
                            <td align="center"><?php echo $banner->user_name;?></td>
                            <td align="center"><?php echo $banner->create_date;?></td>
                            <td align="center"><a class="fance" href="<?php echo base_url();?>/media/banners/<?php echo $banner->gambar;?>">Preview</a></td>
                            <td align="center"><a href="<?php echo base_url();?>index.php/back_end/entry_banner/type/edit/page/<?php echo $segment;?>/id/<?php echo $banner->id;?>/image/<?php echo $banner->gambar;?>"><img src="<?php echo base_url();?>themes/<?php echo $this->setting['theme'];?>/images/edit.png" /></a></td>
                        </tr>
                    <?php 
                    }
                    ?>
                    </tbody>
                </table>
            <!--/form-->
        </div>
		</form>
        <div class="paging">
        <?php echo $this->pagination->create_links();?>
            <p>Page : <?php echo $page;?>
            <i> Of </i><?php echo $page_count;?> . Total Records Found: <?php echo $total;?>
            </p>
        </div>
        <div id="footer">KPI Call Center © 2012. All Rights Reserved.</div>            
