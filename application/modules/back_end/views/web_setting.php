    	<h1>Web Settings</h1>

  		<div class="content_isi">

        	<form id="adminForm" name="adminForm" method="post" action="<?php echo base_url();?>index.php/back_end/web_setting_handler">

            	<div class="toolbar">

                	<label>

                        <input type="image" style="float: left; background: none;" src="<?php echo base_url();?>themes/<?php echo $this->setting['theme'];?>/images/save.png" value="save" name="save">

                        <br>

                        <span style="clear:both; display:block;"><?php echo $this->lang->line('save');?></span>

                    </label>

                	<label>

                        <input type="image" style="float: left; background: none;" src="<?php echo base_url();?>themes/<?php echo $this->setting['theme'];?>/images/cancel.png" value="save" name="cancel">

                        <br>

                        <span style="clear:both; display:block;"><?php echo $this->lang->line('cancel');?></span>

                    </label>

                </div>

                <div id="form">

                	<fieldset style="margin-top:50px">

                    	<legend>Global Configuration</legend>

                        <table class='table_entry'>

                        	<tbody>

                            	<tr>

                                    <td width="23%"><?php echo $this->lang->line('website_name');?></td>

                                    <td width="1%">:</td>

                                    <td width="76%">

                                    <input id="website_name"  type="text" value="<?php echo $website_name;?>" name="website_name">

                                    </td>

                                </tr>

                                <tr>

                                    <td width="23%"><?php echo $this->lang->line('website_title');?></td>

                                    <td width="1%">:</td>

                                    <td width="76%">

                                    <input id="website_title"  type="text" value="<?php echo $website_title;?>" name="website_title">

                                    </td>

                                </tr>

                                <tr>

                                    <td width="23%"><?php echo $this->lang->line('footer_text');?></td>

                                    <td width="1%">:</td>

                                    <td width="76%">

                                    <textarea id="footer_text" class="ckeditor" name="footer_text"><?php echo $footer_text;?></textarea>

                                    </td>

                                </tr>

                                <tr>

                                    <td><?php echo $this->lang->line('meta_keyword');?></td>

                                    <td>:</td>

                                    <td>

                                      <textarea id="max" name="meta_keyword" cols="50"><?php echo $meta_keyword;?></textarea>

                                  </td>

                                </tr>

                                <tr>

                                    <td><?php echo $this->lang->line('meta_description');?></td>

                                    <td>:</td>

                                    <td>

                                      <textarea id="max" name="meta_description" cols="50"><?php echo $meta_description;?></textarea>

                                  </td>

                                </tr>

                                <tr>

                                    <td width="23%">Email Master</td>

                                    <td width="1%">:</td>

                                    <td width="76%">

                                    <input id="master_email"  type="text" value="<?php echo $master_email;?>" name="master_email">

                                    </td>

                                </tr>

                                <tr>

                                    <td>Maintenance Mode</td>

                                    <td>:</td>

                                    <td>

                                    <?php echo form_radio('maintenance_mode','1',$maintenance_mode);?>

                                    On

                                    <?php echo form_radio('maintenance_mode','0',!$maintenance_mode)?>

                                    Off

                                    </td>

                                </tr>

                                <tr>

                                    <td>Property Auto Moderation</td>

                                    <td>:</td>

                                    <td>

                                    <?php echo form_radio('property_auto_moderation','1',$property_auto_moderation);?>

                                    On

                                    <?php echo form_radio('property_auto_moderation','0',!$property_auto_moderation);?>

                                    Off

                                    </td>

                                </tr>

                                <tr>

                                    <td>News Auto Moderation</td>

                                    <td>:</td>

                                    <td>

                                    <?php echo form_radio('news_auto_moderation','1',$news_auto_moderation);?>

                                    On

                                    <?php echo form_radio('news_auto_moderation','0',!$news_auto_moderation);?>

                                    Off

                                    </td>

                                </tr>

                                <tr>

                                    <td>Iklan Baris Auto Moderation</td>

                                    <td>:</td>

                                    <td>

                                    <?php echo form_radio('advertise_auto_moderation','1',$advertise_auto_moderation);?>

                                    On

                                    <?php echo form_radio('advertise_auto_moderation','0',!$advertise_auto_moderation);?>

                                    Off

                                    </td>

                                </tr>

                                <tr>

                                    <td width="23%">Max. Character - Iklan Baris</td>

                                    <td width="1%">:</td>

                                    <td width="76%">

                                    <input id="advertise_max_char"  type="text" value="<?php echo $advertise_max_char;?>"  name="advertise_max_char">

                                    </td>

                                </tr>

                                <tr>

                                    <td width="23%">Theme</td>

                                    <td width="1%">:</td>

                                    <td width="76%">

                                    <?php echo form_dropdown('theme',$themes, $theme, 'id="med"');?>

                                    </td>

                                </tr>

                                <tr>

                                    <td width="23%"><?php echo $this->lang->line('language');?></td>

                                    <td width="1%">:</td>

                                    <td width="76%">

                                    <?php echo form_dropdown('language',$languages, $language, 'id="med"');?>

                                    </td>

                                </tr>

                                <tr>

                                    <td width="23%">Logo</td>

                                    <td width="1%">:</td>

                                    <td width="76%">

                                    <?php 

                                    	echo form_input('logo',$image, 'id="min"');

                                    	echo form_submit('gambar',$this->lang->line('pictures'));

                                    ?>

                                    </td>

                                </tr>

                                <tr>

                                    <td width="23%">Twitter URL</td>

                                    <td width="1%">:</td>

                                    <td width="76%">

                                    <?php 

                                    	echo form_input('tw_url',$tw_url, 'id="max"');

                                    ?>

                                    </td>

                                </tr>

                                <tr>

                                    <td width="23%">Facebook URL</td>

                                    <td width="1%">:</td>

                                    <td width="76%">

                                    <?php 

                                    	echo form_input('fb_url',$fb_url, 'id="max"');

                                    ?>

                                    </td>

                                </tr>

                                <tr>

                                    <td width="23%">Header type</td>

                                    <td width="1%">:</td>

                                    <td width="76%">

                                    <?php 

                                    	echo form_dropdown('header_type',$header_types, $header_type, 'id="med"');

                                    ?>

                                    </td>

                                </tr>

                                <tr>

                                    <td width="23%">Header Color</td>

                                    <td width="1%">:</td>

                                    <td width="76%">

                                    <?php 

                                    	echo form_input('header_color',$header_color, 'id="max"');

                                    ?>

                                    </td>

                                </tr>

                                <tr>

                                    <td width="23%">Header Image</td>

                                    <td width="1%">:</td>

                                    <td width="76%">

                                    <?php 

                                    	echo form_input('header_image',$header_image, 'id="min"') . form_submit('header',$this->lang->line('pictures'));

                                    ?>

                                    </td>

                                </tr>

                            </tbody>

                        </table>

                    </fieldset>

                </div>

                

            </form>

        </div>

        <div id="footer"><?php echo $footer_text;?></div>            
