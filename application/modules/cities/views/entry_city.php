    	<h1>Entry City</h1>
  <div class="content_isi">
        	<form id="adminForm" name="adminForm" method="post" action="<?php echo base_url()?>index.php/cities/entry_city_handler">
        	<?php 
        	echo form_hidden('type',$type);
        	echo form_hidden('id',$id);
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
                                    <td width="23%">Nama</td>
                                    <td width="1%">:</td>
                                    <td width="76%">
                                    <input id="name" type="text" value="<?php echo $name;?>" name="name">
                                    </td>
                                </tr>
                            	<tr>
                                    <td width="23%">Keterangan</td>
                                    <td width="1%">:</td>
                                    <td width="76%">
                                    <input id="description" type="text" value="<?php echo $description;?>"  name="description" class="long_text">
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
                    </fieldset>
                </div>
                
            </form>
        </div>
        <div id="footer"><?php echo $this->setting['footer_text'];?></div>            
