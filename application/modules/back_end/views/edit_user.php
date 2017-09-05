    	<h1>Edit user</h1>
  <div class="content_isi">
        	<form id="adminForm" name="adminForm" method="post" action="<?php echo base_url()?>index.php/back_end/entry_user_handler">
        	<?php 
        	echo form_hidden('type',$type);
        	echo form_hidden('id',$id);
        	echo '<span class="alert">' . $alert . '</span>';
        	?>
            	<div class="toolbar">
                	<label>
                        <input type="image" style="float: left; background: none;" src="<?php echo base_url()?>themes/<?php echo $this->setting['theme'];?>/images/save.png" value="save" name="save">
                        <br>
                        <span style="clear:both; display:block;">Simpan</span>
                    </label>
                	<label>
                        <input type="image" style="float: left; background: none;" src="<?php echo base_url()?>themes/<?php echo $this->setting['theme'];?>/images/cancel.png" value="cancel" name="cancel">
                        <br>
                        <span style="clear:both; display:block;">Batal</span>
                    </label>
                </div>
                <div id="form">
                	<fieldset style="margin-top:50px">
                    	<legend>Entry User</legend>
                        <table style='width:"100%"; cellspacing:"2"; cellpadding:"2"; border:"0";'>
                        	<tbody>
                            	<tr>
                                    <td width="23%">Nama</td>
                                    <td width="1%">:</td>
                                    <td width="76%">
                                    <input id="name" type="text" value="<?php echo $name;?>" maxlength="20" size="20" name="username">
                                    </td>
                                </tr>
                            	<tr>
                                    <td width="23%">Email</td>
                                    <td width="1%">:</td>
                                    <td width="76%">
                                    <input id="email" type="text" value="<?php echo $email;?>"  name="email">
                                    </td>
                                </tr>
                            	<tr>
                                    <td width="23%">Group</td>
                                    <td width="1%">:</td>
                                    <td width="76%">
                                    <?php 
                                    echo form_dropdown('group',$groups,$group);
                                    ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Aktif</td>
                                    <td>:</td>
                                    <td>
                                    <?php echo form_radio('aktif','1',$aktif);?>
                                    Ya
                                    <?php echo form_radio('aktif','0',!$aktif);?>
                                    Tidak
                                    </td>
                                </tr>
                            	<tr>
                                    <td width="23%">Password baru<sup>*</sup></td>
                                    <td width="1%">:</td>
                                    <td width="76%">
                                    <input id="password" type="password"  maxlength="20" size="20" name="password">
                                    </td>
                                </tr>
                            	<tr>
                                    <td width="23%">Konfirmasi Password<sup>*</sup></td>
                                    <td width="1%">:</td>
                                    <td width="76%">
                                    <input id="password2" type="password"  maxlength="20" size="20" name="password2">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <br />
                        <h2>Member of <?php echo $name;?></h2>
                        <?php echo anchor(base_url() . 'index.php/back_end/add_member/spv/' . $id,'Add member');?>
                        <?php echo form_submit('hapus_member','Hapus');?>
                        <?php echo form_submit('advanced_preference','Advanced Preferences');?>
                        <table class='padi_table'>
                        <thead>
                        <tr><th><input type='checkbox' name='select_all' /></th><th>Name</th><th>Group</th></tr>
                        </thead>
                        <tbody>
                        <?php foreach($members as $member){?>
                        <tr>
                        <td>
                        <?php echo form_checkbox('member_id[]',$member->id);?>
                        </td>
                        <td>
                        <?php echo $member->username;?>
                        </td>
                        <td>
                        <?php echo $member->group->name;?>
                        </td>
                        </tr>
                        <?php }?>
                        </tbody>
                        </table>
                    </fieldset>
                </div>
            </form>
        </div>
        <!--div class="paging">
            <p><svaluestrong>Page : 1
            <i> Of </i>1 . Total Records Found: 3</svaluestrong>
            </p>
        </div-->
        <div id="footer">KPI Call Center © 2012. All Rights Reserved.</div>            
