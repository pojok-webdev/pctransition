<!DOCTYPE html>
<html lang="en">
<link rel='stylesheet' href='<?php echo base_url();?>css/aquarius/stylesheets.css' />
<link rel='stylesheet' href='<?php echo base_url();?>css/aquarius/reportstylesheet.css' />
<script type='text/javascript' src='<?php echo base_url();?>js/jquery-1.8.2.min.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>js/aquarius/radu.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>js/aquarius/actions.js'></script>
<body>
    
    <div class="header">
        <a class="logo" href="index.html"><img src="<?php echo $imagepath;?>logo.png" alt="PadiNET App" title="PadiNET App"/></a>
        <ul class="header_menu">
            <li class="list_icon"><a href="#">&nbsp;</a></li>
        </ul>    
    </div>
    
    <div class="content">
        
        <div class="workplace">
            <div class="row-fluid">

                <div class="span16">
                    <div class="head clearfix">
                        <div class="isw-text_document"></div>
                        <h1>  <?php echo $title . ' ' . $objs->troubleshoot_request->client_site->client->name;?></h1>
                        <ul class="buttons">
                            <li><a href="#" class="isw-up" id="backToTroubleshoots"></a></li>
                        </ul>

                    </div>
                    <div class="block-fluid table-sorting clearfix">
                        <table cellpadding="0" cellspacing="0" width="100%" class="table">
                            <thead>
                                <tr>
                                    <th width="25%">Name</th>
                                    <th width="25%">No. Seri</th>
                                    <th width="10%">Pemilik</th>
                                    <th width="10%">Keadaan</th>
                                    <th width="10%">Macboard</th>
                                    <th width="10%">IP Public</th>
                                    <th width="10%">IP Private</th>
                                </tr>
                            </thead>
                            <tbody>
								<?php foreach($objs as $obj){?>
								<?php switch($obj->milikpadinet){
									case 0:
										$owner='Pelanggan';
									break;
									case 1:
										$owner='PadiNET';
									break;
								}?>
								<?php switch($obj->status){
									case 0:
										$status='Hilang';
									break;
									case 1:
										$status='Baik';
									break;
									case 2:
										$status='Rusak';
									break;
								}?>
                                <tr myid='<?php echo $obj->id;?>'>
                                    <td><?php echo $obj->tipe;?></td>
                                    <td><?php echo $obj->serialnum;?></td>
                                    <td><?php echo $owner;?></td>
                                    <td><?php echo $status;?></td>
                                    <td><?php echo $obj->macboard;?></td>
                                    <td><?php echo $obj->ip_public;?></td>
                                    <td><?php echo $obj->ip_private;?></td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>                                
                
            </div>            
            <div class="dr"><span></span></div>
        </div>
    </div>
    <script src='<?php echo base_url();?>js/aquarius/TS/troubleshoots/used_device.js'></script>
</body>
</html>
