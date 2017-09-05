    	<h1>Entry Survey request</h1>
  <div class="content_isi">
        	<form id="adminForm" name="adminForm" method="post" 
        	action="<?php echo base_url()?>index.php/survey_requests/entry_ts_survey_request_handler">
        	<?php 
        	echo form_hidden('type',$type);
        	echo form_hidden('id',$id);
//        	echo form_hidden('install_id',$install_id);
        	echo form_hidden('active','1');
        	echo form_hidden('pic_name',$pic_name);
        	echo form_hidden('pic_position',$pic_position);
        	echo form_hidden('pic_phone',$pic_phone);
        	echo form_hidden('clients',$client);
        	echo form_hidden('sql_survey_date',$sql_survey_date);
        	echo form_hidden('followuplink','survey_requests/entry_survey_request');
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
                 	<label>
                        <input type="image" style="float: left; background: none;" src="<?php echo base_url()?>themes/<?php echo $this->setting['theme'];?>/images/preview.jpg" value="report" name="report">
                        <br>
                        <span style="clear:both; display:block;">Preview</span>
                    </label>
                 	<label>
                        <input type="image" style="float: left; background: none;" src="<?php echo base_url()?>themes/<?php echo $this->setting['theme'];?>/images/email_edit.jpg" value="report" name="mreport">
                        <br>
                        <span style="clear:both; display:block;">Mail</span>
                    </label>
                 	<label>
                        <input type="image" style="float: none; background: none;" src="<?php echo base_url()?>themes/<?php echo $this->setting['theme'];?>/images/calendar_edit.jpg" value="report" name="revisi_tanggal">
                        <br>
                        <span style="clear:both; display:block;">Date Revision</span>
                    </label>
                </div>
                <div id="form">
                	<fieldset style="margin-top:50px">
                    	<legend>Entry User</legend>
                    	<h2>Client</h2>
                        <table width="100%" cellspacing="2" cellpadding="2" border="0">
                        	<tbody>
                            	<tr>
                                    <td width="23%"><?php echo $this->lang->line('name');?></td>
                                    <td width="1%">:</td>
                                    <td width="76%">
                                    <?php echo $client;?>
                                    </td>
                                </tr>
                            	<tr>
                                    <td width="23%"><?php echo $this->lang->line('service');?></td>
                                    <td width="1%">:</td>
                                    <td width="76%">
                                    <?php echo $service;?>
                                    </td>
                                </tr>
                            	<tr>
                                    <td width="23%">Survey date</td>
                                    <td width="1%">:</td>
                                    <td width="76%">
                                    <?php echo $survey_date;?>
                                    </td>
                                </tr>
                            	<tr>
                                    <td width="23%">PIC name</td>
                                    <td width="1%">:</td>
                                    <td width="76%">
                                    <?php echo $pic_name;?>
                                    </td>
                                </tr>
                            	<tr>
                                    <td width="23%">PIC position</td>
                                    <td width="1%">:</td>
                                    <td width="76%">
                                    <?php echo $pic_position;?>
                                    </td>
                                </tr>
                            	<tr>
                                    <td width="23%">PIC phone</td>
                                    <td width="1%">:</td>
                                    <td width="76%">
                                    <?php echo $pic_phone;?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Surat Pengantar</td>
                                    <td>:</td>
                                    <td>
									<?php echo $covering_letter;?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <h2>Sites</h2>
                        <?php 
//                        echo form_submit('add_client_site','Add Client Site');
                        ?>
                        <table class='padi_table'>
                        <thead>
                        <tr><th>Address</th><th>Telp</th><th>PIC</th><th colspan=2>Action</th></tr>
                        </thead>
                        <tbody>
                        <?php foreach ($sites as $site){?>
                        <tr>
                        <td><?php echo $site->address;?></td>
                        <td><?php echo $site->phone_area . ' - ' . $site->phone;?></td>
                        <td><?php echo $site->pic . ' - (' . $site->pic_position . ')';?></td>
                        <td><?php echo anchor(base_url() . 'index.php/survey_sites/add_ts_client_site/type/edit/survey_id/' . $id . '/id/' . $site->id,'Edit');?></td>
                        <td><?php echo anchor(base_url() . 'index.php/back_end/delete_client_site/id/' . $site->id . '/request/' . $id,'Delete');?></td>
                        </tr>
                        <?php }?>
                        </tbody>
                        </table>
                        
                        <?php echo form_submit('add_surveyor','Pelaksana survey');?>
                        <table class='padi_table border'>
                        <thead><tr><th>Name</th><th>Action</th></tr></thead>
                        <tbody>
                        <?php foreach ($surveyors as $surveyor){?>
                        <tr>
                        <td><?php echo $surveyor->name;?></td><td><a href='<?php echo base_url();?>index.php/back_end/remove_survey_surveyor/id/<?php echo $id;?>/surveyor_id/<?php echo $surveyor->id;?>'>delete</a></td>
                        </tr>
                        <?php }?>
                        </tbody>
                        </table>
                        <h2>Resume</h2>
                        <textarea name='textresume' class='ckeditor'><?php echo $textresume;?></textarea>
                        <table class='padi_table border'>
						<tr>
						<td>Kesimpulan</td>
						<td>:</td>
						<td>
						<?php echo form_radio('resume','0',$resume0);?>
						Bisa dilaksanakan
						<?php echo form_radio('resume','1',$resume1);?>
						Bisa dilaksanakan dengan syarat
						<?php echo form_radio('resume','2',$resume2);?>
						Tidak bisa dilaksanakan
						</td>
						</tr>
						</table>
                    </fieldset>
                </div>
                
            </form>
        </div>
        <div id="footer"><?php echo $this->setting['footer_text'];?></div>            
