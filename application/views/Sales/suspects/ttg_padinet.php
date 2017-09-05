<!DOCTYPE html>
<html lang="en">
	<?php $this->load->view('adm/head'); ?>
	<body>
		<?php $this->load->view('adm/header'); ?>
		<?php $this->load->view('adm/menu'); ?>
		<div id="dModal" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h3 id="myModalLabel">Konfirmasi</h3>
			</div>
			<div class="modal-body">
				<p id="modalMessage">Data telah tersimpan.</p>
			</div>
		</div>
		<div class="content">
			<div class="breadLine">
				<ul class="breadcrumb">
					<li><a href="#">PadiApp</a> <span class="divider">></span></li>
					<li><a href="#">Suspect</a> <span class="divider">></span></li>
					<li class="active">Tentang PadiNET</li>
				</ul>
				<?php $this->load->view('adm/buttons'); ?>
			</div>
			<div class="workplace" id='workplace' myid='<?php echo $id; ?>' >
				<input type="hidden" name="id" id="client_id" value="<?php echo $this->uri->segment(3); ?>">
				<div class="row-fluid">
					<div class="span6">
						<div class="head clearfix">
							<div class="isw-pin"></div>
							<h1>Tentang PadiNET</h1>
						</div>
						<div class="block-fluid">
							<div class="row-form clearfix">
								<div class="span5">Tahu PadiNET ?:</div>
								<div class="span7">
									<?php echo form_dropdown('known_us', array('2'=>'Pilihlah','1' => 'Ya', '0' => 'Tidak'), '2', 'id="known_us" class="ttgpadinet" type="selectid"'); ?>
								</div>
							</div>
							<div class="row-form clearfix" id="dknwnfrom">
								<div class="span5">Tahu dari:</div>
								<div class="span7">
									<?php echo form_dropdown('known_from', array('pilihlah'=>'Pilihlah','Website' => 'Website', 'Teman' => 'Teman', 'Pameran' => 'Pameran'), 'pilihlah', 'id="known_from" class="ttgpadinet" type="select"'); ?>
								</div>
							</div>
							<div class="row-form clearfix">
								<div class="span5">Tertarik menggunakan layanan PadiNET ?:</div>
								<div class="span7">
									<?php echo form_dropdown('interested', array('2'=>'Pilihlah','1' => 'Ya', '0' => 'Tidak'), '2', 'id="interested" class="ttgpadinet" type="selectid"'); ?>
								</div>
							</div>
							<div class="row-form clearfix" id="whichsrvc">
								<div class="span5">Layanan yg mana ?:</div>
								<div class="span7">
									<?php echo form_dropdown('service_interested_to', $services, '0', 'id="service_interested_to" class="ttgpadinet" type="selectid" '); ?>
								</div>
							</div>
						</div>
					</div>
					<div class="span6">
						<div class="head clearfix">
							<div class="isw-calendar"></div>
							<h1>Prioritas dan Penjadwalan</h1>
							<ul class="buttons">
								<li><span class="isw-left" id="btnprevdata"></span></li>
								<li><span class="isw-right" id="btnnextdata"></span></li>
							</ul>
						</div>
						<div class="block-fluid">
							<div class="row-form clearfix">
								<div class="span5">Urutan Prioritas:</div>
								<div class="span7">
									<ol id="sortable">
										<li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Kualitas Link</li>
										<li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Harga</li>
										<li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Support Teknis</li>
									</ol>
								</div>
							</div>
							<div class="row-form clearfix">
								<div class="span5">Budget:</div>
								<div class="span7">
									<?php echo form_dropdown('budget', $budgets, '', 'id="budget" class="ttgpadinet" type="selectid" '); ?>
								</div>
							</div>
							<div class="row-form clearfix">
								<div class="span5">Kapan bisa dihubungi lagi ?:</div>
								<div class="span3">
									<input type="text" id="next_follow_up" class="ttgpadinet datepicker" name="follow_up">
								</div>
								<div class="span2">
									<?php echo form_dropdown('hour', $hours, '', 'id="hours" class="dttime" parent="next_follow_up"'); ?>
								</div>
								<div class="span2">
									<?php echo form_dropdown('hour', $minutes, '', 'id="minutes" class="dttime" grandparent="next_follow_up"'); ?>
								</div>
							</div>
							<div class="row-form clearfix">
								<div class="span5">Target Implementasi:</div>
								<div class="span2">
									<input type="text" id="implementation_target" class="ttgpadinet dtpicker" name="implementation_target">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script type="text/javascript" src="<?php echo base_url(); ?>js/aquarius/suspects/ttg_padinet.js"></script>
	</body>
</html>
