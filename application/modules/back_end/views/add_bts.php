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
    	<h1><?php echo 'BTS';?></h1>
  <div class="content_isi">
        	<form id="adminForm" name="adminForm" method="post" action="<?php echo base_url()?>index.php/back_end/add_bts_handler">
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
                                    <td width="23%">BTS</td>
                                    <td width="1%">:</td>
                                    <td width="76%">
                                    <?php echo form_dropdown('bts',$btses, $bts,'id="bts"');?>
                                    </td>
                                </tr>
                            	<tr>
                                    <td width="23%"><?php echo $this->lang->line('distance');?></td>
                                    <td width="1%">:</td>
                                    <td width="76%">
                                    <input type='text' name='distance' value='' />
                                    </td>
                                </tr>
                            	<tr>
                                    <td width="23%">LOS / NLOS</td>
                                    <td width="1%">:</td>
                                    <td width="76%">
                                    <?php echo form_radio('losnlos','1',$los);?>LOS
                                    <?php echo form_radio('losnlos','0',!$los);?>NLOS
                                    </td>
                                </tr>
                            	<tr>
                                    <td width="23%">Acess Point</td>
                                    <td width="1%">:</td>
                                    <td width="76%">
									<?php echo form_dropdown('ap',$aps, $ap,'id="ap"');?>
                                    </td>
                                </tr>
							</tbody>
						</table>



</fieldset>
</div>
</form>
</div>