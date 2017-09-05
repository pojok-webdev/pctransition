    	<h1>User Management</h1>
		<form id="cariForm" name="cariForm" method="post" action="<?php echo base_url();?>index.php/back_end/user_handler">
        <div class="search">
                Pencarian :
                <input type="text" value="" name="cari">
                <input id="submit_cari" type="submit" value="Cari" name="btn_cari">
        </div>
        <div class="content_isi">
            	<div class="toolbar">
                	<a href="<?php echo base_url(); ?>index.php/back_end/entry_user/type/add">
                        <img width="32" height="32" border="0" src="<?php echo base_url();?>themes/<?php echo $this->setting['theme'];?>/images/add.png">
                        <br>
                        <?php echo $this->lang->line('add');?>
                    </a>
                	<label>
                        <input type="image" class="btn_trash"  src="<?php echo base_url()?>themes/<?php echo $this->setting['theme'];?>/images/trash-big.png" value="remove" name="remove">
                        <br>
                        <span class="btn_trash_label" style="clear:both; display:block;"><?php echo $this->lang->line('delete');?></span>
                    </label>

                    <a style="float: right;" href="#">
                        <img width="32" height="32" border="0" src="<?php echo base_url();?>themes/<?php echo $this->setting['theme'];?>/images/reload.png">
                        <br>
                        <?php echo $this->lang->line('refresh');?>
                    </a>
                </div>
                <table  class="tabel" width="100%" cellspacing="0" cellpadding="2" border="0">
                	<thead>
                    	<tr>
                        	<th width="3%" align="center">
                                <input type="hidden" value="__default" name="boxchecked">
                                <input type="hidden" value="" name="task">
                                <input type="checkbox" onclick="checkAll(21);" value="" name="toggle">
                            </th>
                            <th width="15%" align="left"><?php echo $this->lang->line('name');?></th>
                            <th width="20%" align="left"><?php echo $this->lang->line('email');?></th>
                            <th width="19%" align="left"><?php echo $this->lang->line('group');?></th>
                            <th width="7%"><?php echo $this->lang->line('active');?></th>
                            <th width="14%"><?php echo $this->lang->line('registered');?></th>
                            <th width="19%"><?php echo $this->lang->line('last_login');?></th>
                            <th width="3%"> </th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
						foreach($users as $user){
					?>
                    	<tr>
                        	<td align="center">
                            	<input id="cb1" type="checkbox" onclick="isChecked(this.checked);" value="<?php echo $user->id;?>" name="id[]">
                            </td>
                            <td><?php echo $user->username;?></td>
                            <td><?php echo $user->email;?></td>
                            <td><?php echo $user->group->name;?></td>
                            <?php
                            $status = ($user->status=='1')?'ya.png':'tidak.png';
							?>
                            <td align="center"><img src="<?php echo base_url();?>themes/<?php echo $this->setting['theme'];?>/images/<?php echo $status;?>" /></td>
                            <td align="center"><?php echo $user->createdate;?></td>
                            <td align="center">10:44:32 16 September 2012</td>
                            <td align="center"><a href='<?php echo base_url();?>index.php/back_end/entry_user/type/edit/id/<?php echo $user->id;?>'><img src="<?php echo base_url();?>themes/<?php echo $this->setting['theme'];?>/images/edit.png" /></a></td>
                        </tr>
                        <?php
							}
						?>
                    </tbody>
                </table>
        </div>
		</form>
        <div class="paging">
            <p>Page : 1
            <i> Of </i>1 . Total Records Found: <?php echo $total;?>
            </p>
            <?php echo $this->pagination->create_links();?>
        </div>
        <div id="footer"><?php echo $this->setting['footer_text'];?></div>            
