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

                        <h2>Data GPS</h2>
                        <input name=add_gps_data value='<?php echo $this->lang->line('add');?>' type='submit' />
                        <input name=remove_gps_data value='<?php echo $this->lang->line('remove');?>' type='submit' />
                        <table class='padi_table'>
                        <thead>
                        <tr>
                        <th><?php echo form_checkbox('gps_data');?></th>
                        <th><?php echo $this->lang->line('address');?></th>
                        <th><?php echo $this->lang->line('location');?></th>
                        <th><?php echo 'elevation';?></th>
                        <th><?php echo 'bearing';?></th>
                        <th><?php echo 'leg course';?></th>
                        <th><?php echo 'leg distance';?></th>
                        <th><?php echo 'AMSL';?></th>
                        <th><?php echo 'AGL';?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($gps_datas as $gps){?>
                        <tr>
                        <td><?php echo form_checkbox('gps_id','1','checked');?></td>
                        <td><?php echo $gps->address;?></td>
                        <td><?php echo $gps->location_e;?></td>
                        <td><?php echo $gps->elevation;?></td>
                        <td><?php echo $gps->bearing;?></td>
                        <td><?php echo $gps->leg_course;?></td>
                        <td><?php echo $gps->leg_distance;?></td>
                        <td><?php echo $gps->amsl;?></td>
                        <td><?php echo $gps->agl;?></td>
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
