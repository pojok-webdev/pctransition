    	<h1><?php echo $this->lang->line('interest_management');?></h1>
        <div class="search">
                <form id="cariForm" name="cariForm" method="post" action="">
                Pencarian :
                <input type="text" value="" name="cari">
                <input id="submit_cari" type="submit" value="Cari" name="submit_cari">
                </form>
        </div>
        <div class="content_isi">
        	<!--form id="adminForm" name="adminForm" method="post" action=""-->
            	<div class="toolbar">
                	<a href="<?php echo base_url(); ?>index.php/back_end/entry_interest/type/add">
                        <img width="32" height="32" border="0" src="<?php echo base_url();?>themes/<?php echo $this->setting['theme'];?>/images/add.png">
                        <br>
                        Tambah
                    </a>
                    <a onclick="" href="#">
                        <img width="32" height="32" border="0" src="<?php echo base_url();?>themes/<?php echo $this->setting['theme'];?>/images/trash-big.png">
                        <br>
                        Hapus
                    </a>
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
                            <th width="15%" align="center">BUNGA</th>
                            <th width="20%" align="center">KETERANGAN</th>
                            <th width="7%">AKTIF</th>
                            <th width="14%">DIBUAT</th>
                            <th width="3%"> </th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
						foreach($wps as $wp){
					?>
                    	<tr>
                        	<td align="center">
                            	<input id="cb1" type="checkbox" onclick="isChecked(this.checked);" value="admin" name="id[]">
                            </td>
                            <td><?php echo $wp->name;?></td>
                            <td><?php echo $wp->interest;?></td>
                            <td><?php echo $wp->description;?></td>
                            <?php
                            $aktif = ($wp->aktif=='1')?'ya.png':'tidak.png';
							?>
                            <td align="center"><img src="<?php echo base_url();?>themes/<?php echo $this->setting['theme'];?>/images/<?php echo $aktif;?>" /></td>
                            <td align="center"><?php echo $wp->create_date;?></td>
                            <td align="center"><a href='<?php echo base_url();?>index.php/back_end/entry_interest/type/edit/id/<?php echo $wp->id;?>'><img src="<?php echo base_url();?>themes/<?php echo $this->setting['theme'];?>/images/edit.png" /></a></td>
                        </tr>
                        <?php
							}
						?>
                    </tbody>
                </table>
            <!--/form-->
        </div>
        <div class="paging">
            <p>Page : 1
            <i> Of </i>1 . Total Records Found: <?php echo $total;?>
            </p>
            <?php echo $this->pagination->create_links();?>
        </div>
        <div id="footer">KPI Call Center © 2012. All Rights Reserved.</div>            
