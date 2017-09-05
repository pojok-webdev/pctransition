    	<h1><?php echo $this->lang->line('entry_client');?></h1>
  <div class="content_isi">
        	<form id="adminForm" name="adminForm" method="post" action="<?php echo base_url()?>index.php/clients/entry_client_handler">
        	<?php 
			
        	$obj = new Client();
        	$data = array('test'=>'test ke 1','test2'=>'test ke 2');
        	echo form_hidden('type',$type);
        	echo form_hidden('id',$id);
        	echo form_hidden('obj',serialize($data));
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
                    	<legend>Entry Client</legend>
                        <table width="100%" cellspacing="2" cellpadding="2" border="0">
                        	<tbody>
                            	<tr>
                                    <td width="23%"><?php echo $this->lang->line('name');?></td>
                                    <td width="1%">:</td>
                                    <td width="76%">
                                    <input id="name" type="text" value="<?php echo $name;?>" name="name">
                                    </td>
                                </tr>
                                <tr>
                                    <td><?php echo $this->lang->line('business_field');?></td>
                                    <td>:</td>
                                    <td>
                                    <?php echo form_dropdown('business_field',$business_fields, $business_field);?>
                                    </td>
                                </tr>
                            	<tr>
                                    <td width="23%"><?php echo $this->lang->line('address');?></td>
                                    <td width="1%">:</td>
                                    <td width="76%">
                                    <input id="address" type="text" value="<?php echo $address;?>" name="address">
                                    </td>
                                </tr>
                                <tr>
                                    <td><?php echo $this->lang->line('city');?></td>
                                    <td>:</td>
                                    <td>
                                    <?php echo form_dropdown('city',$cities, $city);?>
                                    </td>
                                </tr>
                            	<tr>
                                    <td width="23%"><?php echo $this->lang->line('phone_area');?></td>
                                    <td width="1%">:</td>
                                    <td width="76%">
                                    <input id="phone_area" type="text" value="<?php echo $phone_area;?>" name="phone_area">
                                    </td>
                                </tr>
                            	<tr>
                                    <td width="23%"><?php echo $this->lang->line('phone');?></td>
                                    <td width="1%">:</td>
                                    <td width="76%">
                                    <input id="phone" type="text" value="<?php echo $phone;?>" name="phone">
                                    </td>
                                </tr>

                            	<tr>
                                    <td width="23%"><?php echo $this->lang->line('fax_area');?></td>
                                    <td width="1%">:</td>
                                    <td width="76%">
                                    <input id="fax_area" type="text" value="<?php echo $fax_area;?>" name="fax_area">
                                    </td>
                                </tr>
                            	<tr>
                                    <td width="23%"><?php echo $this->lang->line('fax');?></td>
                                    <td width="1%">:</td>
                                    <td width="76%">
                                    <input id="fax" type="text" value="<?php echo $fax;?>" name="fax">
                                    </td>
                                </tr>

                                <tr>
                                    <td><?php echo $this->lang->line('active');?></td>
                                    <td>:</td>
                                    <td>
                                    <?php echo form_radio('status','1',$active);?>
                                    Ya
                                    <?php echo form_radio('status','0',!$active);?>
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
        <div id="footer"><?php echo $this->setting['footer_text'];?></div>            
