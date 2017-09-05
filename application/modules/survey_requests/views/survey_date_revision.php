    	<h1>Pengajuan Revisi Tanggal Survey</h1>
  <div class="content_isi">
        	<form id="adminForm" name="adminForm" method="post" 
        	action="<?php echo base_url()?>index.php/survey_requests/survey_date_revision_handler">
        	<?php 
        	echo form_hidden('recipient' , '17');
        	echo form_hidden('message_type' , '0');
        	echo form_hidden('obj_id' , '1');
        	echo form_hidden('survey_id' , $survey_id);
        	echo form_hidden('recipient_group' , 2);
        	echo form_hidden('obj_type' , 'survey_requests');
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
                                    <td width="23%">Rentang tanggal</td>
                                    <td width="1%">:</td>
                                    <td width="76%">
                                    <input type='text' name='proposed_date1' class='dtpicker'/>
                                    <?php echo form_dropdown('revision_hour1',Common::get_hours_array(), $revision_hour1);?>
                                    <?php echo form_dropdown('revision_minute1',Common::get_minutes_array(), $revision_minute1);?>
                                    
                                     SD 
                                     <input type='text' name='proposed_date2' class='dtpicker' />
                                    <?php echo form_dropdown('revision_hour2',Common::get_hours_array(), $revision_hour2);?>
                                    <?php echo form_dropdown('revision_minute2',Common::get_minutes_array(), $revision_minute2);?>
                                    </td>
                                </tr>
                            	<tr>
                                    <td width="23%">Pesan</td>
                                    <td width="1%">:</td>
                                    <td width="76%">
                                    <textarea name='content' class='ckeditor'></textarea>
                                    </td>
                                </tr>
                        </tbody>
                        </table>
                    </fieldset>
                </div>
                
            </form>
        </div>
        <div id="footer"><?php echo $this->setting['footer_text'];?></div>            
