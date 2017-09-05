    	<script type='text/javascript'>
    	$(document).ready(function(){
        	$('#bts').change(function(){
            	populate_cbox();
            });
        });

        populate_cbox = function(){
            $('#ap').html('');
            $.getJSON('<?php echo base_url();?>index.php/back_end/get_aps',{bts_id:$('#bts').val()},function(data){
                $.each(data,function(key,val){
                    $('<option value='+key+'>'+val+'</option>').appendTo('#ap');
                });
            });
        }
    	</script>
    	<h1><?php echo 'Perangkat';?></h1>
  <div class="content_isi">
        	<form id="adminForm" name="adminForm" method="post" action="<?php echo base_url()?>index.php/back_end/add_survey_device_handler">
        	<?php 
        	echo form_hidden('type',$type);
//        	echo form_hidden('id',$id);
        	echo form_hidden('site_id',$site_id);
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
                                    <td width="43%">Antenna</td>
                                    <td width="1%">:</td>
                                    <td width="56%">
                                    <?php echo form_radio('antenna_status','1',$antenna_status);?>Dipinjamkan
                                    <?php echo form_radio('antenna_status','0',!$antenna_status);?>Diberikan
                                    <?php echo form_input('antenna_amount',$antenna_amount);?> pcs
                                    </td>
                                    
                                </tr>
                            	<tr>
                                    <td width="43%">Radio</td>
                                    <td width="1%">:</td>
                                    <td width="56%">
                                    <?php echo form_radio('radio_status','1',$radio_status);?>Dipinjamkan
                                    <?php echo form_radio('radio_status','diberikan',!$radio_status);?>Diberikan
                                    <?php echo form_input('radio_amount',$radio_amount);?> pcs
                                    </td>
                                </tr>
                            	<tr>
                                    <td width="43%">PC Card</td>
                                    <td width="1%">:</td>
                                    <td width="56%">
                                    <?php echo form_radio('pccard_status','1',$pccard_status);?>Dipinjamkan
                                    <?php echo form_radio('pccard_status','diberikan',!$pccard_status);?>Diberikan
                                    <?php echo form_input('pccard_amount',$pccard_amount);?> pcs
                                    </td>
                                </tr>
                            	<tr>
                                    <td width="43%">Pig tail</td>
                                    <td width="1%">:</td>
                                    <td width="56%">
                                    <?php echo form_radio('pigtail_status','1',$pigtail_status);?>Dipinjamkan
                                    <?php echo form_radio('pigtail_status','diberikan',!$pigtail_status);?>Diberikan
                                    <?php echo form_input('pigtail_amount',$pigtail_amount);?> pcs
                                    </td>
                                </tr>


                            	<tr>
                                    <td width="43%">Jumper</td>
                                    <td width="1%">:</td>
                                    <td width="56%">
                                    <?php echo form_radio('jumper_status','1',$jumper_status);?>Dipinjamkan
                                    <?php echo form_radio('jumper_status','diberikan',!$jumper_status);?>Diberikan
                                    <?php echo form_input('jumper_amount',$pccard_amount);?> pcs
                                    </td>
                                </tr>
                            	<tr>
                                    <td width="43%">Outdoor box</td>
                                    <td width="1%">:</td>
                                    <td width="56%">
                                    <?php echo form_radio('outdoorbox_status','1',$outdoorbox_status);?>Dipinjamkan
                                    <?php echo form_radio('outdoorbox_status','diberikan',!$outdoorbox_status);?>Diberikan
                                    <?php echo form_input('outdoorbox_amount',$outdoorbox_amount);?> pcs
                                    </td>
                                </tr>
                            	<tr>
                                    <td width="43%">Adaptor</td>
                                    <td width="1%">:</td>
                                    <td width="56%">
                                    <?php echo form_radio('adaptor_status','1',$adaptor_status);?>Dipinjamkan
                                    <?php echo form_radio('adaptor_status','diberikan',!$adaptor_status);?>Diberikan
                                    <?php echo form_input('adaptor_amount',$adaptor_amount);?> pcs
                                    </td>
                                </tr>
                            	<tr>
                                    <td width="43%">PoE</td>
                                    <td width="1%">:</td>
                                    <td width="56%">
                                    <?php echo form_radio('poe_status','1',$poe_status);?>Dipinjamkan
                                    <?php echo form_radio('poe_status','diberikan',!$poe_status);?>Diberikan
                                    <?php echo form_input('poe_amount',$poe_amount);?> pcs
                                    </td>
                                </tr>
                            	<tr>
                                    <td width="43%">Surge Protector</td>
                                    <td width="1%">:</td>
                                    <td width="56%">
                                    <?php echo form_radio('surgeprotector_status','1',$surgeprotector_status);?>Dipinjamkan
                                    <?php echo form_radio('surgeprotector_status','diberikan',!$surgeprotector_status);?>Diberikan
                                    <?php echo form_input('surgeprotector_amount',$surgeprotector_amount);?> pcs
                                    </td>
                                </tr>
                            	<tr>
                                    <td width="43%">Router</td>
                                    <td width="1%">:</td>
                                    <td width="56%">
                                    <?php echo form_radio('router_status','1',$router_status);?>Dipinjamkan
                                    <?php echo form_radio('router_status','diberikan',!$router_status);?>Diberikan
                                    <?php echo form_input('router_amount',$router_amount);?> pcs
                                    </td>
                                </tr>
                            	<tr>
                                    <td width="43%">BW Management</td>
                                    <td width="1%">:</td>
                                    <td width="56%">
                                    <?php echo form_radio('bwmanagement_status','1',$bwmanagement_status);?>Dipinjamkan
                                    <?php echo form_radio('bwmanagement_status','diberikan',!$bwmanagement_status);?>Diberikan
                                    <?php echo form_input('bwmanagement_amount',$bwmanagement_amount);?> pcs
                                    </td>
                                </tr>
                            	<tr>
                                    <td width="43%">Switch</td>
                                    <td width="1%">:</td>
                                    <td width="56%">
                                    <?php echo form_radio('switch_status','1',$switch_status);?>Dipinjamkan
                                    <?php echo form_radio('switch_status','diberikan',!$switch_status);?>Diberikan
                                    <?php echo form_input('switch_amount',$switch_amount);?> pcs
                                    </td>
                                </tr>
                            	<tr>
                                    <td width="43%">UPS</td>
                                    <td width="1%">:</td>
                                    <td width="56%">
                                    <?php echo form_radio('ups_status','1',$ups_status);?>Dipinjamkan
                                    <?php echo form_radio('ups_status','diberikan',!$ups_status);?>Diberikan
                                    <?php echo form_input('ups_amount',$ups_amount);?> pcs
                                    </td>
                                </tr>
                            	<tr>
                                    <td width="43%">Stavolt</td>
                                    <td width="1%">:</td>
                                    <td width="56%">
                                    <?php echo form_radio('stavolt_status','1',$stavolt_status);?>Dipinjamkan
                                    <?php echo form_radio('stavolt_status','diberikan',!$stavolt_status);?>Diberikan
                                    <?php echo form_input('stavolt_amount',$stavolt_amount);?> pcs
                                    </td>
                                </tr>
                            	<tr>
                                    <td width="43%">AP Wifi Indoors</td>
                                    <td width="1%">:</td>
                                    <td width="56%">
                                    <?php echo form_radio('apwifiindoors_status','1',$apwifiindoors_status);?>Dipinjamkan
                                    <?php echo form_radio('apwifiindoors_status','diberikan',!$apwifiindoors_status);?>Diberikan
                                    <?php echo form_input('apwifiindoors_amount',$apwifiindoors_amount);?> pcs
                                    </td>
                                </tr>
							</tbody>
						</table>



</fieldset>
</div>
</form>
</div>