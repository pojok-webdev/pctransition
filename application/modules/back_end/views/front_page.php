    	<h1><?php echo $this->lang->line('front_page');?></h1>
  <div class="content_isi">
        	<form id="adminForm" name="adminForm" method="post" action="<?php echo base_url()?>index.php/back_end/front_page_handler">
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
                    	<legend>Entry News</legend>
                        <table style='width:"100%"; cellspacing:"2"; cellpadding:"2"; border:"0";'>
                        	<tbody>
                            	<tr>
                                    <td width="23%"><?php echo $this->lang->line('subject');?></td>
                                    <td width="1%">:</td>
                                    <td width="76%">
                                    <input id="subject" type="text" value="<?php echo $subject;?>" name="subject" class="text_very_long">
                                    </td>
                                </tr>
                            	<tr>
                                    <td width="23%"><?php echo $this->lang->line('content');?></td>
                                    <td width="1%">:</td>
                                    <td width="76%">
                                    <textarea class='ckeditor' id='front_page' name='front_page'><?php echo $content;?></textarea>
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
