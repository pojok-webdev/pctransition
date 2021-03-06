<!DOCTYPE html>
<html lang="en">
	<style type='text/css'>
		.userpic{
			float:left;
			width:60px;
			height:50px;
		}
		.pic{
			width:40px;
			padding-left:auto;
			padding-right:auto;
		}
	</style>
<?php $this->load->view('adm/head');?>
<body>
    <div id="dModal" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Konfirmasi</h3>
        </div>
        <div class="modal-body">
            <p id='mContent'>Data telah tersimpan.</p>
        </div>
    </div>
    <div class="header">
        <a class="logo" href="index.html"><img src="<?php echo base_url();?>img/aquarius/logo.png" alt="PadiApp" title="PadiApp"/></a>
        <ul class="header_menu">
            <li class="list_icon"><a href="#">&nbsp;</a></li>
        </ul>
    </div>
	<?php $this->load->view('adm/menu');?>
    <div class="content">
        <div class="breadLine">
            <ul class="breadcrumb">
                <li><a href="#">Pelanggan</a> <span class="divider">></span></li>
                <li class="active">Edit Prospect</li>
            </ul>
            <?php $this->load->view('adm/buttons');?>
        </div>
        <div class="workplace" user_id='<?php echo $obj->id;?>'>
        <input id="disconnection_id" type="hidden" value="<?php echo $this->uri->segment(3);?>" />
        <input id="client_site_id" type="hidden" class="inp_disconnection" name="client_site_id" value="<?php echo $obj->client_site_id;?>" />
        <input id="createuser" type="hidden" value="<?php echo $this->ionuser->username;?>" name="createuser" class="inp_disconnection" />
        <input type='hidden' id='disconnectiontype' value='<?php echo $obj->disconnectiontype;?>' />
		<div class="row-fluid"><div class="span12"><div class="head clearfix">
			<div class="right">
				<ul class="buttons">
					<li><span class="isw-save" id="disconnectionbtnsave" title="simpan"></span></li>
				</ul>
            </div>
		</div>
		</div>
		</div>
            <div class="row-fluid">
                <div class="span6">
                    <div class="head clearfix">
                        <div class="isw-documents"></div>
                        <h1>Edit Pelanggan <?php echo $obj->client_site->client->name;?></h1>
                    </div>
                    <div class="block-fluid">
                        <div class="row-form clearfix" id="executiondatedivc">
							<div class="span4">Hingga Tanggal:</div>
                            <div class="span4">
								<?php
								$ed = Common::longsql_to_datepart($obj->finishdate);
								?>
								<?php echo form_input('finishdate',$ed['day'].'/'.$ed['month'].'/'.$ed['year'],'id="finishdate"  class="inp_disconnection datepicker" type="text"');?>
							</div>
                            <div class="span2 executiondate">
								<?php echo form_dropdown('executionhour',$hours,'0','id="executionday"  parent="finishdate" class="dttime"');?>
							</div>
                            <div class="span2">
								<?php echo form_dropdown('executionminute',$minutes,'0','id="executionminute"  grandparent="finishdate" class="dttime"');?>
							</div>
                        </div>
                    </div>
                </div>
                <div class="span6">
                    <div class="head clearfix">
                        <div class="isw-grid"></div>
                        <h1>Detail</h1>
                    </div>
                    <div class="block-fluid">
                        <div class="row-form clearfix" id="makepermanentdiv">
							<button class="btn makePermanent">Jadikan Permanen</button>
							<button class="btn reactivation">Reaktivasi</button>
                        </div>
                    </div>
                </div>
			</div>
        </div>
    </div>
    <script type='text/javascript' src='<?php echo base_url();?>js/aquarius/Accounting/disconnectionedit.js'></script>
</body>
</html>
