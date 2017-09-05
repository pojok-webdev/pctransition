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
    	<h1><?php echo 'Survey Material';?></h1>
  <div class="content_isi">
        	<form id="adminForm" name="adminForm" method="post" action="<?php echo base_url()?>index.php/back_end/add_survey_material_handler">
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
                                    <td width="23%">Pipa / Triangle Tower</td>
                                    <td width="1%">:</td>
                                    <td width="76%">
                                    <?php echo form_radio('pipe','Pipa',$pipe);?>Pipa
                                    <?php echo form_radio('pipe','Triangle tower',!$pipe);?>Triangle Tower
                                    </td>
                                </tr>
                            	<tr>
                                    <td width="23%">Panjang pipa</td>
                                    <td width="1%">:</td>
                                    <td width="76%">
                                    <?php echo form_input('pipe_length',$pipe_length);?> m
                                    </td>
                                </tr>
                            	<tr>
                                    <td width="23%">Kabel</td>
                                    <td width="1%">:</td>
                                    <td width="76%">
                                    <?php echo form_input('cable_length',$cable_length);?> m
                                    </td>
                                </tr>
                            	<tr>
                                    <td width="23%">Pangkon</td>
                                    <td width="1%">:</td>
                                    <td width="76%">
									<?php echo form_input('pangkon_amount',$pangkon_amount);?> pcs
                                    </td>
                                </tr>
                            	<tr>
                                    <td width="23%">Besi siku</td>
                                    <td width="1%">:</td>
                                    <td width="76%">
									<?php echo form_input('besi_siku_amount',$besi_siku_amount);?> pcs
                                    </td>
                                </tr>
                            	<tr>
                                    <td width="23%">Klem</td>
                                    <td width="1%">:</td>
                                    <td width="76%">
									<?php echo form_input('klem_amount',$klem_amount);?> pcs
                                    </td>
                                </tr>
                            	<tr>
                                    <td width="23%">Sling</td>
                                    <td width="1%">:</td>
                                    <td width="76%">
									<?php echo form_input('sling_amount',$sling_amount);?> pcs
                                    </td>
                                </tr>
                            	<tr>
                                    <td width="23%">Ground Rod</td>
                                    <td width="1%">:</td>
                                    <td width="76%">
									<?php echo form_input('ground_rod_amount',$ground_rod_amount);?> pcs
                                    </td>
                                </tr>
                            	<tr>
                                    <td width="23%">Kabel NYA</td>
                                    <td width="1%">:</td>
                                    <td width="76%">
									<?php echo form_input('kabel_nya_amount',$kabel_nya_amount);?> m
                                    </td>
                                </tr>
                            	<tr>
                                    <td width="23%">Spitter</td>
                                    <td width="1%">:</td>
                                    <td width="76%">
									<?php echo form_input('spitter_amount',$spitter_amount);?> pcs
                                    </td>
                                </tr>
                            	<tr>
                                    <td width="23%">Cable Duct</td>
                                    <td width="1%">:</td>
                                    <td width="76%">
									<?php echo form_input('cable_duct_amount',$cable_duct_amount);?> pcs
                                    </td>
                                </tr>
                            	<tr>
                                    <td width="23%">Pipa Clip Sal</td>
                                    <td width="1%">:</td>
                                    <td width="76%">
									<?php echo form_input('pipa_clip_sal_amount',$pipa_klip_sal_amount);?> pcs
                                    </td>
                                </tr>
                            	<tr>
                                    <td width="23%">Lain-lain (sebutkan)</td>
                                    <td width="1%">:</td>
                                    <td width="76%">
									<?php echo form_input('lainlain');?> pcs
                                    </td>
                                </tr>
							</tbody>
						</table>



</fieldset>
</div>
</form>
</div>