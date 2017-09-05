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
                                    <td width="23%"><?php echo humanize($this->lang->line('bts'));?></td>
                                    <td width="1%">:</td>
                                    <td width="76%">
                                    <?php echo form_dropdown('bts',$btses, $bts);?>
                                    </td>
                                </tr>
                            	<tr>
                                    <td width="23%"><?php echo humanize($this->lang->line('distance'));?></td>
                                    <td width="1%">:</td>
                                    <td width="76%">
                                    <input id="distance" type="text" value="<?php echo $distance;?>" maxlength="20" size="20" name="distance">
                                    </td>
                                </tr>
                            	<tr>
                                    <td width="23%"><?php echo humanize($this->lang->line('los'));?></td>
                                    <td width="1%">:</td>
                                    <td width="76%">
                                    <input id="los" type="text" value="<?php echo $los;?>" maxlength="20" size="20" name="los">
                                    </td>
                                </tr>
                            	<tr>
                                    <td width="23%"><?php echo humanize($this->lang->line('nlos'));?></td>
                                    <td width="1%">:</td>
                                    <td width="76%">
                                    <input id="nlos" type="text" value="<?php echo $nlos;?>" maxlength="20" size="20" name="nlos">
                                    </td>
                                </tr>
                            	<tr>
                                    <td width="23%"><?php echo humanize($this->lang->line('ap'));?></td>
                                    <td width="1%">:</td>
                                    <td width="76%">
                                    <input id="ap" type="text" value="<?php echo $ap;?>" maxlength="20" size="20" name="ap">
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
