<h1><?php echo $this->lang->line('entry_property');?></h1>
  <div class="content_isi">
        	<form id="adminForm" name="adminForm" method="post" action="<? echo base_url();?>index.php/back_end/entry_property_handler">
            	<div class="toolbar">
                	<label>
                        <input type="image" style="float: left; background: none;" src="<?php echo base_url();?>themes/<?php echo $this->setting['theme'];?>/images/save.png" value="save" name="save">
                        <br>
                        <span style="clear:both; display:block;">Simpan</span>
                    </label>
                	<label>
                        <input type="image" style="float: left; background: none;" src="<?php echo base_url();?>themes/<?php echo $this->setting['theme'];?>/images/cancel.png" value="save" name="cancel">
                        <br>
                        <span style="clear:both; display:block;">Batal</span>
                    </label>
                </div>
                <?php
					$prp = $property[0];
					echo form_hidden('TYPE',$TYPE);
					echo form_hidden('id',$prp['id']);
					echo form_hidden('page',$page);
				?>
                <div id="form">
                	<fieldset style="margin-top:50px">
                    	<legend>Entry User</legend>
                        <table width="100%" cellspacing="2" cellpadding="2" border="0">
                        	<tbody>
                            	<tr>
                                    <td width="23%">Kode Listing</td>
                                    <td width="1%">:</td>
                                    <td width="76%">
                                    <input type="text" value="<?php echo $prp['KDMRUMAH'];?>" maxlength="20" size="20" name="KDMRUMAH">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Status </td>
                                    <td>:</td>
                                    <td>
                                    <?php
										echo form_dropdown('STATUS',$statuses,$prp['STATUS']);
									?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Alamat / Area (nama jalan)</td>
                                    <td>:</td>
                                    <td>
                                    <input type="text" maxlength="60" size="50" name="ALAMAT" value="<?php echo $prp['ALAMAT'];?>" id="address" >
                                    </td>
                                </tr>
                                <tr>
                                    <td>Kota</td>
                                    <td>:</td>
                                    <td>
                                    <?php
										echo form_dropdown('KOTA',$cities,$prp['KOTA']);
									?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Wilayah</td>
                                    <td>:</td>
                                    <td>
                                    <?php
										echo form_dropdown('city_part',$city_parts,$prp['city_part']);
									?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Type Property</td>
                                    <td>:</td>
                                    <td>
                                    <?php
										echo form_dropdown('TIPE',$property_types,$prp['TIPE']);
									?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Luas Tanah</td>
                                    <td>:</td>
                                    <td>
                                    <input type="text" value="<?php echo $prp['LT'];?>" maxlength="10" size="10" name="LT">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Luas Bangunan</td>
                                    <td>:</td>
                                    <td>
                                    <input type="text" value="<?php echo $prp['LB'];?>" maxlength="10" size="10" name="LB">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Harga</td>
                                    <td>:</td>
                                    <td>
                                    <input type="text" value="<?php echo $prp['HARGA'];?>" maxlength="60" size="50" name="HARGA">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Hadap</td>
                                    <td>:</td>
                                    <td>
                                    <?php
										echo form_dropdown('HADAP',$directions,$prp['HADAP']);
									?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tingkat/Lantai</td>
                                    <td>:</td>
                                    <td>
                                    <input maxlength="60" value="<?php echo $prp['TINGKAT'];?>" size="10" name="TINGKAT">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Kamar Tidur</td>
                                    <td>:</td>
                                    <td>
                                    <input type="text" value="<?php echo $prp['KTIDUR'];?>" maxlength="10" size="10" name="KTIDUR">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Kamar Mandi</td>
                                    <td>:</td>
                                    <td>
                                    <input type="text" value="<?php echo $prp['KMANDI'];?>" maxlength="10" size="10" name="KMANDI">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Listrik</td>
                                    <td>:</td>
                                    <td>
                                    <input type="text" value="<?php echo $prp['LISTRIK'];?>" maxlength="10" size="20" name="LISTRIK">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Air</td>
                                    <td>:</td>
                                    <td>
                                    <?php echo form_dropdown('AIR',$water_provider, 0)?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Surat</td>
                                    <td>:</td>
                                    <td>
                                    <?php
										echo form_dropdown('SURAT',$documents,$prp['SURAT']);
									?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Aktif</td>
                                    <td>:</td>
                                    <td>
                                    <?php 
                                    $aktif = ($prp['AKTIF']=='1')?TRUE:FALSE;
                                    echo form_radio('aktif','1',$aktif) . 'Ya';
                                    echo form_radio('aktif','0',!$aktif) . 'Tidak';
                                    ?>
                                    
                                </tr>
                                <tr>
                                    <td>Gambar</td>
                                    <td>:</td>
                                    <td>
                                    <?php
//										echo form_input('GAMBAR1',$prp['GAMBAR1'],'id="gambar1"');
										echo form_input('gbr1',$imagepath,'id="gambar1"');
										echo form_submit('gambar1','Ambil gambar');
									?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Keterangan</td>
                                    <td>:</td>
                                    <td>
                                      <textarea name="KETERANGAN" cols="50" class="ckeditor"><?php echo $property[0]['KETERANGAN'];?></textarea>
                                  </td>
                                </tr>
                            </tbody>
                        </table>
                    </fieldset>
                </div>
                
            </form>
        </div>
        <div id="footer">KPI Call Center © 2012. All Rights Reserved.</div>            


        
