    	<h1><?php echo 'Survey';?></h1>
  <div class="content_isi">
        	<form id="adminForm" name="adminForm" method="post" action="<?php echo base_url()?>index.php/back_end/entry_survey_handler">
        	<?php 
        	echo form_hidden('type',$type);
        	echo form_hidden('id',$id);
//        	echo form_hidden('page',$page);
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
                        <table width="100%" cellspacing="2" cellpadding="2" border="0">
                        	<tbody>
                            	<tr>
                                    <td width="23%"><?php echo $this->lang->line('survey_date');?></td>
                                    <td width="1%">:</td>
                                    <td width="76%">
                                    <input id="survey_date" type="text" value="<?php echo $survey_date;?>" maxlength="20" size="20" name="survey_date">
                                    </td>
                                </tr>
                            	<tr>
                                    <td width="23%"><?php echo $this->lang->line('request');?></td>
                                    <td width="1%">:</td>
                                    <td width="76%">
                                    <?php echo form_dropdown('survey_request',$survey_requests, $survey_request);?>
                                    </td>
                                </tr>
                                <tr>
                                    <td><?php echo $this->lang->line('problem');?></td>
                                    <td>:</td>
                                    <td>
                                    <textarea name='problem'><?php echo $problem;?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td><?php echo $this->lang->line('conclusion');?></td>
                                    <td>:</td>
                                    <td>
                                    <textarea name='conclusion'><?php echo $conclusion;?></textarea>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        
                        <h2>Add Site</h2>
                        <input name=add_site value='<?php echo $this->lang->line('add');?>' type='submit' />
                        <input name=remove_site value='<?php echo $this->lang->line('remove');?>' type='submit' />
                        <table class='padi_table'>
                        <thead>
                        <tr>
                        <th><?php echo form_checkbox('site');?></th>
                        <th><?php echo $this->lang->line('site');?></th>
                        <th>East</th>
                        <th>South</th>
                        <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($sites as $site){?>
                        <tr>
                        <td><?php echo form_checkbox('site_id','1','checked');?></td>
                        <td><?php echo $site->address;?></td>
                        <td><?php echo $site->location_e_degree . $site->location_e_minute . $site->location_e_second;?></td>
                        <td><?php echo $site->location_s_degree . $site->location_s_minute . $site->location_s_second;?></td>
                        <td><a href='<?php echo base_url();?>index.php/back_end/add_site/type/edit/survey_id/<?php echo $id;?>/id/<?php echo $site->id;?>'><img src="<?php echo base_url();?>themes/<?php echo $this->setting['theme'];?>/images/edit.png" /></a></td>
                        </tr>
                        <?php }?>
                        </tbody>
                        </table>
                    </fieldset>
                </div>
                
            </form>
        </div>
        <div id="footer"><?php echo $this->setting['footer_text'];?></div>            
