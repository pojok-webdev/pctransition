<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('adm/head');?>
<script type="text/javascript" src="<?php echo base_url();?>js/aquarius/suspects/provider_yg_digunakan.js"></script>
<body>
	<?php $this->load->view('adm/header');?>
	<?php $this->load->view('adm/menu');?>
	<div class="content">
		<div class="breadLine">
			<ul class="breadcrumb">
				<li><a href="#">PadiApp</a> <span class="divider">></span></li>
				<li><a href="#">Suspect</a> <span class="divider">></span></li>
				<li class="active">Provider yang dipergunakan</li>
			</ul>
			<?php $this->load->view('adm/buttons');?>
		</div>
		<div class="workplace">
			<input type="hidden" id="suspect_id" name="id" value="<?php echo $this->uri->segment(3);?>" class="inp_suspect">
			<div class="row-fluid">
				<div class="span6">
					<div class="head clearfix">
						<div class="isw-empty_document"></div>
						<h1>Data Provider Existing</h1>
					</div>
					<div class="block-fluid">
						<div class="row-form clearfix">
							<div class="span5">Media:</div>
							<div class="span7">
								<?php echo form_dropdown('media',$medias,Media::getIndex($objs->media),'id="media" class="inp_suspect" type="select"');?>
							</div>
						</div>
						<div class="row-form clearfix">
							<div class="span5">Kecepatan:</div>
							<div class="span7">
								<?php echo form_dropdown("speed",$speeds,Speed::getIndex($objs->speed),'id="speed" class="inp_suspect" type="select"');?>
							</div>
						</div>
						<div class="row-form clearfix">
							<div class="span5">Durasi Penggunaan Per Hari:</div>
							<div class="span7">
								<?php echo form_dropdown("duration",$durations,Duration::getIndex($objs->duration),'id="duration" class="inp_suspect" type="select"');?>
							</div>
						</div>
						<div class="row-form clearfix">
							<div class="span5">Periode Penggunaan:</div>
							<div class="span7">
								<?php echo form_dropdown("usage_period",$usage_periods,Usage_period::getIndex($objs->usage_period),'id="usage_period" class="inp_suspect" type="select"');?>
							</div>
						</div>
						<div class="row-form clearfix">
							<div class="span5">Jumlah PC Pengguna Internet:</div>
							<div class="span7">
								<?php echo form_dropdown("user_amount",$internet_users,Internet_user::getIndex($objs->user_amount),'id="user_amount" class="inp_suspect" type="select"');?>
							</div>
						</div>
					</div>
				</div>
				<div class="span6">
					<div class="head clearfix">
						<div class="isw-empty_document"></div>
						<h1>Data Provider Existing</h1>
   						<ul class="buttons">
							<li><span class="isw-right" id="btnnextdata"></span></li>
						</ul>
					</div>
					<div class="block-fluid">
						<div class="row-form clearfix">
							<div class="span5">Aplikasi yg Digunakan:</div>
							<div class="span7">
								<?php foreach($applications as $app){
									echo '<span class="checkboxlist"><input class="appChk" type="checkbox" name="apps" appname="' . $app . '" />' . $app  . '&nbsp</span>';
								}?>
							</div>
						</div>
						<div class="row-form clearfix">
							<div class="span5">Aplikasi Lainnya:</div>
							<div class="span7">
								<input type="text" id="media">
							</div>
						</div>
						<div class="row-form clearfix">
							<div class="span5">Biaya Internet:</div>
							<div class="span7">
								<?php echo form_dropdown("fee",$internet_fees,Internet_fee::getIndex($objs->fee),'id="fee" class="inp_suspect" type="select"');?>
							</div>
						</div>
						<div class="row-form clearfix">
							<div class="span5">ISP/Operator yang digunakan:</div>
							<div class="span7">
								<?php echo form_dropdown("operator",$operators,Operator::getIndex($objs->operator),'id="operator" class="inp_suspect" type="select"');?>
							</div>
						</div>
						<div class="row-form clearfix">
							<div class="span5">Tanggal Kontrak Berakhir:</div>
							<div class="span7">
								<input type="text" id="end_of_contract" name="end_of_contract" class="datepicker inp_suspect" >
								<input type="hidden" name="hour" id="hour" value="0" parent="end_of_contract" class="dttime" />
								<input type="hidden" name="minute" id="minute" value="0" grandparent="end_of_contract" class="dttime" />
							</div>
						</div>
						<div class="row-form clearfix">
							<div class="span5">Problem yg pernah dialami:</div>
							<div class="span7">
								<?php echo form_dropdown("problems",$problems,Problem::getIndex($objs->problems),'id="problems" class="inp_suspect" type="select"');?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
