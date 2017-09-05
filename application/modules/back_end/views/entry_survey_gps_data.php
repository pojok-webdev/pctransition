    	<h1><?php echo $this->lang->line('entry_survey_gps_data');?></h1>
  <div class="content_isi">
        	<form id="adminForm" name="adminForm" method="post" action="<?php echo base_url()?>index.php/back_end/entry_survey_gps_data_handler">
        	<?php 
        	echo form_hidden('type',$type);
        	echo form_hidden('id',$id);
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
                        <table width="100%" cellspacing="2" cellpadding="2" border="0">
                        	<tbody>
                            	<tr>
                                    <td width="23%"><?php echo humanize($this->lang->line('address'));?></td>
                                    <td width="1%">:</td>
                                    <td width="76%">
                                    <input id="address" type="text" value="<?php echo $address;?>" maxlength="20" size="20" name="address">
                                    </td>
                                </tr>
                            	<tr>
                                    <td width="23%"><?php echo humanize($this->lang->line('location'));?></td>
                                    <td width="1%">:</td>
                                    <td width="76%">
                                    <input id="location" type="text" value="<?php echo $location;?>" maxlength="20" size="20" name="location">
                                    </td>
                                </tr>
                            	<tr>
                                    <td width="23%"><?php echo humanize($this->lang->line('elevation'));?></td>
                                    <td width="1%">:</td>
                                    <td width="76%">
                                    <input id="elevation" type="text" value="<?php echo $elevation;?>" maxlength="20" size="20" name="elevation">
                                    </td>
                                </tr>
                            	<tr>
                                    <td width="23%"><?php echo humanize($this->lang->line('bearing'));?></td>
                                    <td width="1%">:</td>
                                    <td width="76%">
                                    <input id="bearing" type="text" value="<?php echo $bearing;?>" maxlength="20" size="20" name="bearing">
                                    </td>
                                </tr>
                            	<tr>
                                    <td width="23%"><?php echo humanize($this->lang->line('leg_course'));?></td>
                                    <td width="1%">:</td>
                                    <td width="76%">
                                    <input id="leg_course" type="text" value="<?php echo $leg_course;?>" maxlength="20" size="20" name="leg_course">
                                    </td>
                                </tr>
                            	<tr>
                                    <td width="23%"><?php echo humanize($this->lang->line('leg_dist'));?></td>
                                    <td width="1%">:</td>
                                    <td width="76%">
                                    <input id="leg_dist" type="text" value="<?php echo $leg_dist;?>" maxlength="20" size="20" name="leg_dist">
                                    </td>
                                </tr>
                            	<tr>
                                    <td width="23%"><?php echo humanize($this->lang->line('amsl'));?></td>
                                    <td width="1%">:</td>
                                    <td width="76%">
                                    <input id="amsl" type="text" value="<?php echo $amsl;?>" maxlength="20" size="20" name="amsl">
                                    </td>
                                </tr>
                            	<tr>
                                    <td width="23%"><?php echo humanize($this->lang->line('agl'));?></td>
                                    <td width="1%">:</td>
                                    <td width="76%">
                                    <input id="agl" type="text" value="<?php echo $agl;?>" maxlength="20" size="20" name="agl">
                                    </td>
                                </tr>
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
        <div id="footer"><?php echo $this->setting['footer_text'];?></div>            
