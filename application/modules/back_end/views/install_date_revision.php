    	<h1>Pengajuan Revisi Tanggal Instalasi</h1>
  <div class="content_isi">
        	<form id="adminForm" name="adminForm" method="post" 
        	action="<?php echo base_url()?>index.php/back_end/send_internal_message">
        	<?php 
        	echo form_hidden('recipient' , '17');
        	echo form_hidden('message_type' , '1');
        	echo form_hidden('obj_id' , '1');
        	echo form_hidden('install_id' , $install_id);
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
                                    <td width="23%">Rentang tanggal</td>
                                    <td width="1%">:</td>
                                    <td width="76%">
                                    <input type='text' name='proposed_date1' /> SD <input type='text' name='proposed_date2' />
                                    </td>
                                </tr>
                            	<tr>
                                    <td width="23%">Pesan</td>
                                    <td width="1%">:</td>
                                    <td width="76%">
                                    <textarea name='content' ></textarea>
                                    </td>
                                </tr>
                        </tbody>
                        </table>
                    </fieldset>
                </div>
                
            </form>
        </div>
        <div id="footer"><?php echo $this->setting['footer_text'];?></div>            
