<!DOCTYPE html>
<html lang="en">
	<style type="text/css">
		#tTroubleshoot	tbody tr.red td{
			background-color:red;
		}
		#tTroubleshoot	tbody tr.yellow td{
			background-color:yellow;
		}
	</style>
<?php $this->load->view('adm/head');?>
<body>
    <div class="header">
        <a class="logo" href="index.html"><img src="<?php echo base_url();?>img/aquarius/logo.png" alt="PadiNET App" title="PadiNET App"/></a>
        <ul class="header_menu">
            <li class="list_icon"><a href="#">&nbsp;</a></li>
        </ul>
    </div>
    <?php $this->load->view('adm/menu');?>
    <div class="content">
        <div class="breadLine">
            <ul class="breadcrumb">
                <li><a href="#">PadiApp</a> <span class="divider">></span></li>
                <li><a href="#">Troubleshoots</a> <span class="divider">></span></li>
                <li class="active">List</li>
            </ul>
			<?php $this->load->view('adm/buttons');?>
        </div>
        <div class="workplace">
            <div class="row-fluid">
                <div class="span12">
                    <div class="head clearfix">
                        <div class="isw-grid"></div>
                        <h1>Troubleshoot</h1>
                        <ul class="buttons">
                            <!--<li><a href="#" class="isw-plus" id="permintaantroubleshoot"></a></li>-->
                        </ul>
                    </div>
                    <div class="block-fluid table-sorting clearfix">
                        <table cellpadding="0" cellspacing="0" width="100%" class="table" id="tTroubleshoot">
                            <thead>
                                <tr>
                                    <th width="25%">Name</th>
                                    <th width="25%">Tgl Request</th>
                                    <th width="25%">Type</th>
                                    <th width="20%">Alamat</th>
                                    <th width="25%">E-mail/Phone</th>
                                    <th>Status</th>
                                    <th>Tgl Troubleshoot</th>
                                    <th width="5%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
								<?php foreach($objs as $obj){
									switch($obj->status){
										case '0':
										$status = 'Progress';
										$color='red';
										break;
										case '1':
										$status = 'Solved';
										$color='white';
										break;
										case '2':
										$status = 'Monitoring';
										$color='yellow';
										break;
										default:
										$status = 'Unknown';
										break;
									}
								?>
                                <tr myid='<?php echo $obj->id;?>' class='<?php echo $color;?>'>
                                    <td><?php echo $obj->nameofmtype;?></td>
                                    <td>
										<?php 
										//echo $obj->gethumandate('request_date1');
										echo $obj->request_date1;
										?>
                                    </td>
                                    <td><?php echo $obj->troubleshoottype;?></td>
                                    <td><?php echo $obj->client_site->address;?></td>
                                    <td><?php echo $obj->client_site->client->pic->email . ',  ' . $obj->client_site->client->pic->phone;?></td>
                                    <td><?php echo $status;?></td>
                                    <td><?php echo $obj->gethumandate('troubleshoot_date');?></td>
                                    <td>
										<div class="btn-group">
                                        <button data-toggle="dropdown" class="btn dropdown-toggle">Action <span class="caret"></span></button>
                                        <ul class="dropdown-menu pull-right">
											<li class='btnViewReport'><a href="#">View Report</a></li>
                                        </ul>
										</div>
                                    </td>
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
	<script type='text/javascript' src='<?php echo base_url();?>js/aquarius/TS/troubleshoots/troubleshoot.js'></script>
    <script type='text/javascript' src='<?php echo base_url();?>js/aquarius/TS/troubleshoots/index.js'></script>
</body>
</html>
