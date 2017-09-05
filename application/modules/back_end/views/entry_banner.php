    	<h1><?php echo $this->lang->line('entry_banner');?></h1>
<div class="content_isi">
        	<form id="adminForm" name="adminForm" method="post" action="<?php echo base_url();?>index.php/back_end/entry_banner_handler">
        	<?php 
        	echo form_hidden('type',$type);
        	if(isset($id)){
        		echo form_hidden('id',$id);
        	}
        	if(isset($page)){
        		echo form_hidden('page',$page);
        	}
        	else 
        	{
        		echo form_hidden('page','0');
        	}
        	?>
            	<div class="toolbar">
                	<label>
                        <input type="image" style="float: left; background: none;" src="<?php echo base_url();?>themes/<?php echo $this->setting['theme'];?>/images/save.png" value="save" name="save">
                        <br>
                        <span style="clear:both; display:block;">Simpan</span>
                    </label>
                	<label>
                        <input type="image" style="float: left; background: none;" src="<?php echo base_url();?>themes/<?php echo $this->setting['theme'];?>/images/cancel.png" value="cancel" name="cancel">
                        <br>
                        <span style="clear:both; display:block;">Batal</span>
                    </label>
                </div>
                <div id="form">
                	<fieldset style="margin-top:50px">
                    	<legend>Entry Banner</legend>
                        <table width="100%" cellspacing="2" cellpadding="2" border="0">
                        	<tbody>
                            	<tr>
                                    <td width="23%"><?php echo $this->lang->line('banner_name');?></td>
                                    <td width="1%">:</td>
                                    <td width="76%">
                                    <input id="name" type="text" value="<?php echo $name;?>" name="name" class="text_long">
                                    </td>
                                </tr>
                                <tr>
                                    <td><?php echo $this->lang->line('banner_type');?></td>
                                    <td>:</td>
                                    <td>
                                    <?php 
                                    echo form_dropdown('btype',$btypes, $btype);
                                    ?>
                                    <input id="cek_menu_akses" type="checkbox" style="display: none;" value="checkbox" name="cek_menu_akses">
                                    </td>
                                </tr>
                            	<tr>
                                    <td width="23%">URL </td>
                                    <td width="1%">:</td>
                                    <td width="76%">
                                    <input id="name" type="text" value="<?php echo $url;?>"  name="url" class="text_long">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Upload</td>
                                    <td>:</td>
                                    <td>
                                    <input type='text' name='gbr' value='<?php echo $gambar;?>' />
                                    <input type="submit"  name='gambar' value='Gambar' /></td>
                                </tr>                                                                
                                <tr>
                                    <td><?php echo $this->lang->line('active');?></td>
                                    <td>:</td>
                                    <td>
                                    <?php 
                                    	echo form_radio('aktif','1',$status);
                                    ?>
                                    Ya
                                    <?php 
                                    	echo form_radio('aktif','0',!$status);
                                    ?>
                                    Tidak
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </fieldset>
                </div>
                
            </form>
        </div>
        <!--div class="paging">
            <p><svaluestrong>Page : 1
            <i> Of </i>1 . Total Records Found: 3</svaluestrong>
            </p>
        </div-->
        <div id="footer">KPI Call Center © 2012. All Rights Reserved.</div>            
