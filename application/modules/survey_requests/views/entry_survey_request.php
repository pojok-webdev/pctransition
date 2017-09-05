    	<h1>Entry Survey requests</h1>
  <div class="content_isi">
        	<form id="adminForm" name="adminForm" method="post" action="<?php echo base_url()?>index.php/survey_requests/entry_survey_request_handler">
        	<?php 
        	echo form_hidden('type',$type);
        	echo form_hidden('id',$id);
        	echo form_hidden('followuplink','survey_requests/entry_ts_survey_request');
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
                                    <td width="23%"><?php echo $this->lang->line('name');?></td>
                                    <td width="1%">:</td>
                                    <td width="76%">
                                    <?php echo form_dropdown('clients',$clients, $client);?>
                                    </td>
                                </tr>
                            	<tr>
                                    <td width="23%"><?php echo $this->lang->line('service');?></td>
                                    <td width="1%">:</td>
                                    <td width="76%">
                                    <?php echo form_dropdown('service',$services, $service);?>
                                    </td>
                                </tr>
                            	<tr>
                                    <td width="23%">Survey date</td>
                                    <td width="1%">:</td>
                                    <td width="76%">
                                    <input id="survey_date" type="text" value="<?php echo $survey_date;?>"  name="survey_date" class="text_medium dtpicker">
                                    <?php echo form_dropdown('hour',Common::get_hours_array(), $hour);?>
                                    <?php echo form_dropdown('minute',Common::get_minutes_array(), $minute);?>
                                    </td>
                                </tr>
                            	<tr>
                                    <td width="23%">PIC name</td>
                                    <td width="1%">:</td>
                                    <td width="76%">
                                    <input id="pic_name" type="text" value="<?php echo $pic_name;?>"  name="pic_name" class="text_long">
                                    </td>
                                </tr>
                            	<tr>
                                    <td width="23%">PIC position</td>
                                    <td width="1%">:</td>
                                    <td width="76%">
                                    <input id="pic_position" type="text" value="<?php echo $pic_position;?>"  name="pic_position" class="text_long">
                                    </td>
                                </tr>
                            	<tr>
                                    <td width="23%">PIC phone</td>
                                    <td width="1%">:</td>
                                    <td width="76%">
                                    <input id="pic_phone" type="text" value="<?php echo $pic_phone;?>"  name="pic_phone" class="text_long">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Surat Ijin</td>
                                    <td>:</td>
                                    <td>
                                    <?php echo form_radio('covering_letter','1',$active);?>
                                    Ya
                                    <?php echo form_radio('covering_letter','0',!$active);?>
                                    Tidak
                                    </td>
                                </tr>
                                <tr>
                                    <td>Aktif</td>
                                    <td>:</td>
                                    <td>
                                    <?php echo form_radio('active','1',$active);?>
                                    Ya
                                    <?php echo form_radio('active','0',!$active);?>
                                    Tidak
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        
                        <?php //echo anchor(base_url() . 'index.php/back_end/add_client_site/client/' . $client,'Add');
                        echo form_submit('add_client_site','Add Client Site');
                        ?>
                        <table class='padi_table'>
                        <thead>
                        <tr><th>Address</th><th>Telp</th><th>PIC</th><th>Action</th></tr>
                        </thead>
                        <tbody>
                        <?php foreach ($sites as $site){?>
                        <tr>
                        <td><?php echo $site->address;?></td>
                        <td><?php echo $site->phone_area . ' - ' . $site->phone;?></td>
                        <td><?php echo $site->pic . ' - (' . $site->pic_position . ')';?></td>
                        <td><?php echo anchor(base_url() . 'index.php/back_end/delete_client_site/id/' . $site->id . '/request/' . $id,'Delete');?></td>
                        </tr>
                        <?php }?>
                        </tbody>
                        </table>
                    </fieldset>
                </div>
                
            </form>
        </div>
        <div id="footer"><?php echo $this->setting['footer_text'];?></div>            
