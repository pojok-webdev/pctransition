<form action='<?php echo base_url();?>index.php/back_end/add_survey_client_handler' method='post'>
<input type='hidden' name='site_id' value='<?php echo $site_id;?>' />
<input type='hidden' name='survey_id' value='<?php echo $survey_id;?>' />
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

<table>
<tbody>
<tr>
<td>Pelanggan</td><td>:</td><td><?php echo form_dropdown('client',$clients, $client);?></td>
</tr>
<tr>
<td>Jarak</td><td>:</td><td><?php echo form_input('distance',$distance);?> Km</td>
</tr>

</tbody>
</table>
</form>