    	<h1>Entry user</h1>
  <div class="content_isi">
        	<form id="adminForm" name="adminForm" method="post" action="<?php echo base_url()?>index.php/back_end/entry_user_handler">
        	<?php 
        	echo form_hidden('type',$type);
        	echo form_hidden('id',$id);
        	?>
            	<div class="toolbar">
                	<label>
                        <input type="image" style="float: left; background: none;" src="<?php echo base_url()?>themes/<?php echo $this->setting['theme'];?>/images/save.png" value="save" name="save">
                        <br>
                        <span style="clear:both; display:block;"><?php echo $this->lang->line('save');?></span>
                    </label>
                	<label>
                        <input type="image" style="float: left; background: none;" src="<?php echo base_url()?>themes/<?php echo $this->setting['theme'];?>/images/cancel.png" value="cancel" name="cancel">
                        <br>
                        <span style="clear:both; display:block;"><?php echo $this->lang->line('cancel');?></span>
                    </label>
                </div>
                <div id="form">
                	<fieldset style="margin-top:50px">
                    	<legend>Entry User</legend>
                        <table style='width:"100%"; cellspacing:"2"; cellpadding:"2"; border:"0";'>
                        	<tbody>
                            	<tr>
                                    <td width="23%"><?php echo $this->lang->line('name');?></td>
                                    <td width="1%">:</td>
                                    <td width="76%">
                                    <input id="name" type="text" value="<?php echo $name;?>" maxlength="20" size="20" name="username">
                                    </td>
                                </tr>
                            	<tr>
                                    <td width="23%"><?php echo $this->lang->line('password');?></td>
                                    <td width="1%">:</td>
                                    <td width="76%">
                                    <input id="password" type="password" value="<?php echo $password;?>" maxlength="20" size="20" name="password">
                                    </td>
                                </tr>
                            	<tr>
                                    <td width="23%"><?php echo $this->lang->line('password_confirmation');?></td>
                                    <td width="1%">:</td>
                                    <td width="76%">
                                    <input id="password2" type="password" value="<?php echo $password;?>" maxlength="20" size="20" name="password2">
                                    </td>
                                </tr>
                            	<tr>
                                    <td width="23%"><?php echo $this->lang->line('email');?></td>
                                    <td width="1%">:</td>
                                    <td width="76%">
                                    <input id="email" type="text" value="<?php echo $email;?>"  name="email">
                                    </td>
                                </tr>
                            	<tr>
                                    <td width="23%"><?php echo $this->lang->line('group');?></td>
                                    <td width="1%">:</td>
                                    <td width="76%">
                                    <?php 
                                    echo form_dropdown('group',$groups,$group);
                                    ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td><?php echo $this->lang->line('active');?></td>
                                    <td>:</td>
                                    <td>
                                    <?php echo form_radio('aktif','1',$aktif);?>
                                    <?php echo $this->lang->line('yes');?>
                                    <?php echo form_radio('aktif','0',!$aktif);?>
                                    <?php echo $this->lang->line('no');?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </fieldset>
                </div>
                
            </form>
        </div>
        <div id="footer">KPI Call Center © 2012. All Rights Reserved.</div>            
