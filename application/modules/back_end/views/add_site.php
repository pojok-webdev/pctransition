    	<h1><?php echo 'Survey';?></h1>
  <div class="content_isi">
        	<form id="adminForm" name="adminForm" method="post" action="<?php echo base_url()?>index.php/back_end/add_site_handler">
        	<?php 
        	echo form_hidden('type',$type);
        	echo form_hidden('id',$id);
        	echo form_hidden('survey_id',$survey_id);
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
                                <td colspan=3><strong>Data BTS</strong></td>
                                </tr>
                            	<tr>
                                    <td width="23%"><?php echo $this->lang->line('address');?></td>
                                    <td width="1%">:</td>
                                    <td width="76%">
                                    <input id="address" type="text" value="<?php echo $address;?>" maxlength="20" size="20" name="address">
                                    </td>
                                </tr>
                            	<tr>
                                    <td width="23%"><?php echo $this->lang->line('location');?> E</td>
                                    <td width="1%">:</td>
                                    <td width="76%">
                                    <input id="location_e_degree" type="text" value="<?php echo $location_e_degree;?>" maxlength="20" size="20" name="location_e_degree"><sup>o</sup>
                                    <input id="location_e_minute" type="text" value="<?php echo $location_e_minute;?>" maxlength="20" size="20" name="location_e_minute">'
									<input id="location_e_second" type="text" value="<?php echo $location_e_second;?>" maxlength="20" size="20" name="location_e_second">"
                                    </td>
                                </tr>
                            	<tr>
                                    <td width="23%"><?php echo $this->lang->line('location');?> S</td>
                                    <td width="1%">:</td>
                                    <td width="76%">
                                    <input id="location_s_degree" type="text" value="<?php echo $location_s_degree;?>" maxlength="20" size="20" name="location_s_degree"><sup>o</sup>
                                    <input id="location_s_minute" type="text" value="<?php echo $location_s_minute;?>" maxlength="20" size="20" name="location_s_minute">' 
									<input id="location_s_second" type="text" value="<?php echo $location_s_second;?>" maxlength="20" size="20" name="location_s_second">"
                                    </td>
                                </tr>
                            	<tr>
                                    <td width="23%"><?php echo $this->lang->line('elevation');?> Rooftop</td>
                                    <td width="1%">:</td>
                                    <td width="76%">
                                    <input id="elevation_rooftop" type="text" value="<?php echo $elevation_rooftop;?>" maxlength="20" size="20" name="elevation_rooftop">
                                    </td>
                                </tr>
                            	<tr>
                                    <td width="23%"><?php echo $this->lang->line('elevation');?> Ground</td>
                                    <td width="1%">:</td>
                                    <td width="76%">
                                    <input id="elevation_ground" type="text" value="<?php echo $elevation_ground;?>" maxlength="20" size="20" name="elevation_ground">
                                    </td>
                                </tr>
                            	<tr>
                                    <td width="23%"><?php echo $this->lang->line('bearing');?></td>
                                    <td width="1%">:</td>
                                    <td width="76%">
                                    <input id="bearing" type="text" value="<?php echo $bearing;?>" maxlength="20" size="20" name="bearing">
                                    </td>
                                </tr>

                            	<tr>
                                    <td width="23%"><?php echo $this->lang->line('leg_course');?></td>
                                    <td width="1%">:</td>
                                    <td width="76%">
                                    <input id="leg_course" type="text" value="<?php echo $leg_course;?>" maxlength="20" size="20" name="leg_course">
                                    </td>
                                </tr>
                            	<tr>
                                    <td width="23%"><?php echo $this->lang->line('leg_dist');?></td>
                                    <td width="1%">:</td>
                                    <td width="76%">
                                    <input id="leg_dist" type="text" value="<?php echo $leg_dist;?>" maxlength="20" size="20" name="leg_dist">
                                    </td>
                                </tr>
                            	<tr>
                                    <td width="23%"><?php echo $this->lang->line('amsl');?></td>
                                    <td width="1%">:</td>
                                    <td width="76%">
                                    <input id="amsl" type="text" value="<?php echo $amsl;?>" maxlength="20" size="20" name="amsl">
                                    </td>
                                </tr>
                            	<tr>
                                    <td width="23%"><?php echo $this->lang->line('agl');?></td>
                                    <td width="1%">:</td>
                                    <td width="76%">
                                    <input id="agl" type="text" value="<?php echo $agl;?>" maxlength="20" size="20" name="agl">
                                    </td>
                                </tr>
                                <tr>
                                <td colspan=3><strong>Distance between client</strong></td>
                                </tr>
                            	<tr>
                                    <td width="23%"><?php echo $this->lang->line('distance');?></td>
                                    <td width="1%">:</td>
                                    <td width="76%">
                                    <input id="distance" type="text" value="<?php echo $distance;?>" maxlength="20" size="20" name="distance">
                                    </td>
                                </tr>
							</tbody>
						</table>


<h2>Pelaksana Survey</h2>
<input name=add_surveyor value='<?php echo $this->lang->line('add');?>' type='submit' />
<input name=remove_surveyor value='<?php echo $this->lang->line('remove');?>' type='submit' />
<table class='padi_table'>
<thead>
<tr><th><?php echo form_checkbox('surveyor');?></th><th>Nama</th></tr>
</thead>
<tbody>
<?php foreach ($surveyors as $surveyor){?>
<tr>
<td><?php echo form_checkbox('surveyor_id','1','checked');?></td>
<td><?php echo $surveyor->username;?></td>
</tr>
<?php }?>
</tbody>
</table>



<h2><?php echo $this->lang->line('bts_distance');?></h2>
<input name=add_bts_distance value='<?php echo $this->lang->line('add');?>' type='submit' />
<input name=remove_bts_distance value='<?php echo $this->lang->line('remove');?>' type='submit' />
<table class='padi_table'>
<thead>
<tr>
<th><?php echo form_checkbox('bts_data');?></th>
<th><?php echo $this->lang->line('bts_name');?></th>
<th><?php echo $this->lang->line('distance');?></th>
<th><?php echo 'LOS/NLOS';?></th>
<th><?php echo 'APN';?></th>
</tr>
</thead>
<tbody>
<?php foreach ($bts_distances as $bts){?>
<tr>
<td><?php echo form_checkbox('gps_id','1','checked');?></td>
<td><?php echo $bts->name;?></td>
<td><?php echo $bts->distance;?></td>
<td><?php echo $bts->los;?></td>
<td><?php echo $bts->ap;?></td>
</tr>
<?php }?>
</tbody>
</table>


<h2><?php echo $this->lang->line('neighbour_distance');?></h2>
<input name=add_neighbour_distance value='<?php echo $this->lang->line('add');?>' type='submit' />
<input name=remove_neighbour_distance value='<?php echo $this->lang->line('remove');?>' type='submit' />
<table class='padi_table'>
<thead>
<tr>
<th><?php echo form_checkbox('neighbour_data');?></th>
<th><?php echo $this->lang->line('name');?></th>
<th><?php echo $this->lang->line('distance');?></th>
<th><?php echo 'LOS/NLOS';?></th>
</tr>
</thead>
<tbody>
<?php foreach ($neighbour_distances as $neighbour){?>
<tr>
<td><?php echo form_checkbox('gps_id','1','checked');?></td>
<td><?php echo $neighbour->name;?></td>
<td><?php echo $neighbour->distance;?></td>
<td><?php echo $neighbour->los;?></td>
</tr>
<?php }?>
</tbody>
</table>




<h2><?php echo $this->lang->line('devices');?></h2>
<input name=add_device value='<?php echo $this->lang->line('add');?>' type='submit' />
<input name=remove_device value='<?php echo $this->lang->line('remove');?>' type='submit' />
<table class='padi_table'>
<thead>
<tr>
<th><?php echo form_checkbox('neighbour_data');?></th>
<th><?php echo $this->lang->line('name');?></th>
<th><?php echo $this->lang->line('status');?></th>
<th><?php echo $this->lang->line('amount');?></th>
</tr>
</thead>
<tbody>
<?php foreach ($devices as $device){?>
<tr>
<td><?php echo form_checkbox('device_id','1','checked');?></td>
<td><?php echo $device->name;?></td>
<td><?php echo $device->status;?></td>
<td><?php echo $device->amount;?></td>
</tr>
<?php }?>
</tbody>
</table>




<h2><?php echo $this->lang->line('materials');?></h2>
<input name=add_material value='<?php echo $this->lang->line('add');?>' type='submit' />
<input name=remove_material value='<?php echo $this->lang->line('remove');?>' type='submit' />
<table class='padi_table'>
<thead>
<tr>
<th><?php echo form_checkbox('neighbour_data');?></th>
<th><?php echo $this->lang->line('name');?></th>
<th><?php echo $this->lang->line('amount');?></th>
</tr>
</thead>
<tbody>
<?php foreach ($materials as $material){?>
<tr>
<td><?php echo form_checkbox('material_id','1','checked');?></td>
<td><?php echo $material->name;?></td>
<td><?php echo $material->amount;?></td>
</tr>
<?php }?>
</tbody>
</table>
</fieldset>
</div>
</form>
</div>