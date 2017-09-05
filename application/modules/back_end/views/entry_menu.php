    	<h1><?php echo $this->lang->line('entry_menu');?></h1>
  <div class="content_isi">
        	<form id="adminForm" name="adminForm" method="post" action="<?php echo base_url()?>index.php/back_end/entry_menu_handler">
        	<?php 
        	echo form_hidden('type',$type);
        	echo form_hidden('id',$id);
        	echo form_hidden('page',0);
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
                        <table class="table_entry" >
                        	<tbody>
                            	<tr>
                                    <td width="23%"><?php echo $this->lang->line('name');?></td>
                                    <td width="1%">:</td>
                                    <td width="76%">
                                    <input id="name" class="input_general1" type="text" value="<?php echo $name;?>" name="name">
                                    </td>
                                </tr>
                            	<tr>
                                    <td width="23%"><?php echo $this->lang->line('order');?></td>
                                    <td width="1%">:</td>
                                    <td width="76%">
                                    <?php echo form_dropdown('menu_order',$order_numbers, $menu_order);?>
                                    </td>
                                </tr>
                            	<tr>
                                    <td width="23%"><?php echo $this->lang->line('display_as');?></td>
                                    <td width="1%">:</td>
                                    <td width="76%">
                                    <?php echo form_radio('menu_type','0',$menu_type) . $this->lang->line('url');?>
                                    <?php echo form_radio('menu_type','1',!$menu_type) . $this->lang->line('page');?>
                                    </td>
                                </tr>

                            	<tr>
                                    <td width="23%"><?php echo $this->lang->line('url');?></td>
                                    <td width="1%">:</td>
                                    <td width="76%">
                                    <input id="url" class="input_url" type="text" value="<?php echo $url;?>"  name="url">
                                    </td>
                                </tr>

                            	<tr>
                                    <td width="23%"><?php echo $this->lang->line('page');?></td>
                                    <td width="1%">:</td>
                                    <td width="76%">
                                    <?php echo form_dropdown('page',$pages, $page);?>
                                    </td>
                                </tr>

                                <tr>
                                    <td><?php echo $this->lang->line('is_top');?></td>
                                    <td>:</td>
                                    <td>
                                    <?php echo form_radio('is_top','1',$is_top);?>
                                    Ya
                                    <?php echo form_radio('is_top','0',!$is_top);?>
                                    Tidak
                                    </td>
                                </tr>
                                <tr>
                                    <td><?php echo $this->lang->line('parent_id');?></td>
                                    <td>:</td>
                                    <td>
                                    <?php echo form_dropdown('parent_id',$menus, $menu_id)?>
                                    
                                    </td>
                                </tr>                                
                                <tr>
                                    <td><?php echo $this->lang->line('active');?></td>
                                    <td>:</td>
                                    <td>
                                    <?php echo form_radio('status','1',$status);?>
                                    Ya
                                    <?php echo form_radio('status','0',!$status);?>
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
