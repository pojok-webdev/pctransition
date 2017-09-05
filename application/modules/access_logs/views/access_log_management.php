    	<h1><?php echo $this->lang->line('access_log');?></h1>
		<form id="cariForm" name="cariForm" method="post" action="<?php echo base_url();?>index.php/access_logs/advertise_handler">
		<div class="search">
                Pencarian :
                <input type="text" value="" name="cari">
                <input id="submit_cari" type="submit" value="Cari" name="btn_cari">
        
        </div>
        <div class="content_isi">
                <table class="tabel" width="100%" cellspacing="0" cellpadding="2" border="0">
                	<thead>
                    	<tr>
                        	<th width="3%" align="center">
                                <input type="hidden" value="__default" name="boxchecked">
                                <input type="hidden" value="" name="task">
                                <input type="checkbox" onclick="checkAll(21);" value="" name="toggle">
                            </th>
                            <th width="20%" align="left">DATETIME</th>
                            <th width="7%">USER</th>
                            <th width="14%">IP ADDR</th>
                            <th width="19%">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $datestring = "%d  %M %Y - %h:%i %a";
                    foreach ($access_logs as $acl){
                    ?>
                    	<tr>
                        	<td align="center">
                            	<input id="cb1" type="checkbox" onclick="isChecked(this.checked);" value="<?php echo $acl->id;?>" name="id[]">
                            </td>
                            <td><?php echo $acl->create_date;?></td>
                            <td align="center"><?php echo $acl->user_name;?></td>
                            <td align="center"><?php echo $acl->ipaddr;?></td>
                            <td><?php echo $acl->action;?></td>
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
            <i> Of </i ><?php echo $page_count;?> . Total Records Found: <?php echo $total;?>
            </p>
            <?php echo $this->pagination->create_links();?>
        </div>
        <div id="footer"><?php echo $this->setting['footer_text'];?></div>            
