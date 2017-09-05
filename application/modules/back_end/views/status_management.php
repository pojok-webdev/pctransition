    	<h1>Status Management</h1>
		<form id="adminForm" name="adminForm" method="post" action="<?php echo base_url();?>index.php/back_end/status_handler">
        <div class="search">
                Pencarian :
                <input type="text" value="" name="cari">
                <input id="submit_cari" type="submit" value="Cari" name="submit_cari">
        </div>
        <div class="content_isi">
            	<div class="toolbar">
                	<a href="<?php echo base_url(); ?>index.php/back_end/entry_status/type/add">
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
                <table class="tabel" width="100%" cellspacing="0" cellpadding="2" border="0">
                	<thead>
                    	<tr>
                        	<th width="3%" align="center">
                                <input type="hidden" value="__default" name="boxchecked">
                                <input type="hidden" value="" name="task">
                                <input type="checkbox" onclick="checkAll(21);" value="" name="toggle">
                            </th>
                            <th width="15%" align="center">NAMA</th>
                            <th width="20%" align="center">KETERANGAN</th>
                            <th width="7%">AKTIF</th>
                            <th width="14%">TERDAFTAR</th>
                            <th width="19%">TERAKHIR LOGIN </th>
                            <th width="3%"> </th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
						foreach($objs as $status){
					?>
                    	<tr>
                        	<td align="center">
                            	<input id="cb1" type="checkbox" onclick="isChecked(this.checked);" value="<?php echo $status->id;?>" name="id[]">
                            </td>
                            <td><?php echo $status->name;?></td>
                            <td><?php echo $status->description;?></td>
                            <?php
                            $aktif = ($status->aktif=='1')?'ya.png':'tidak.png';
							?>
                            <td align="center"><img src="<?php echo base_url();?>themes/<?php echo $this->setting['theme'];?>/images/<?php echo $aktif;?>" /></td>
                            <td align="center"><?php echo $status->createdate;?></td>
                            <td align="center">10:44:32 16 September 2012</td>
                            <td align="center"><a href='<?php echo base_url();?>index.php/back_end/entry_status/type/edit/id/<?php echo $status->id;?>'><img src="<?php echo base_url();?>themes/<?php echo $this->setting['theme'];?>/images/edit.png" /></a></td>
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
        <div id="footer">KPI Call Center © 2012. All Rights Reserved.</div>            
