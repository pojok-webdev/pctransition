    	<h1><?php echo $this->lang->line('install_request');?></h1>
		<form id="cariForm" name="cariForm" method="post" action="<?php echo base_url();?>index.php/back_end/obj_handler">
        <div class="search">
                <?php echo $this->lang->line('search');?> :
                <input type="text" value="" name="cari">
                <input id="btn_cari" type="submit" value="<?php echo $this->lang->line('find')?>" name="btn_cari">
        </div>
        <div class="content_isi">
                <table class="tabel" cellspacing="0" cellpadding="2" border="0">
                	<thead>
                    	<tr>
                        	<th width="3%" align="center">
                                <input type="hidden" value="__default" name="boxchecked">
                                <input type="hidden" value="" name="task">
                                <input type="checkbox" onclick="checkAll(21);" value="" name="toggle">
                            </th>
                            <th width="15%" align="center"><?php echo $this->lang->line('name');?></th>
                            <th width="20%" align="center"><?php echo $this->lang->line('description');?></th>
                            <th width="11%" align="center"><?php echo $this->lang->line('install_date');?></th>
                            <th width="10%"><?php echo $this->lang->line('created');?></th>
                            <th width="3%"> </th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
						foreach($objs as $obj){
					?>
                    	<tr>
                        	<td align="center">
                            	<input id="cb1" type="checkbox" onclick="isChecked(this.checked);" value="<?php echo $obj->id;?>" name="id[]">
                            </td>
                            <td><?php echo $obj->client->name;?></td>
                            <td><?php echo $obj->client->address;?></td>
                            <td align="center"><?php echo $obj->install_date;?></td>
                            <td align="center"><?php echo $obj->create_date;?></td>
                            <?php 
                            $edit_url = ($this->preference['u'][3] == '1')?base_url() . 'index.php/install_requests/ts_entry_install_request/type/edit/id/' . $obj->id:'#';
                            ?>
                            <td align="center"><a href='<?php echo $edit_url;?>'><span class='heydingssmall'>L</span></a></td>
                        </tr>
                        <?php
							}
						?>
                    </tbody>
                </table>
            <!--/form-->
        </div>
		</form>
        <div class="paging">
            <p>Page : <?php echo $page;?>
            <i> Of </i><?php echo $page_count;?> . Total Records Found: <?php echo $total;?>
            </p>
            <?php echo $this->pagination->create_links();?>
        </div>
        <div id="footer"><?php echo $this->setting['footer_text']?></div>            
