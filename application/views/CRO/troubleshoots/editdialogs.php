<div id="dAddOfficer" class="modal hidex fade" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalLabel">Penambahan Petugas Survey</h3>
	</div>
	<div class="modal-body">
		<div class="row-fluid">
			<div class="span12">
				<div class="block gallery clearfix">
					<div class="block thumbas clearfix">
					<?php foreach(User::get_user_by_group('TS') as $user){?>
						<div class="thumbnail petugasTroubleshoot pointer userpic" officer_name="<?php echo $user->username;?>" surveyor_email="<?php echo $user->email;?>">
							<div class="imageholder">
								<img src="<?php echo $user->pic;?>" width="50" height="50" />
							</div>
							<div class="caption">
								<?php echo $user->username;?>
							</div>
						</div>
					<?php }?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="dConfirmation" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="confirmationModalLabel">Info</h3>
	</div>
	<div class="modal-body">
		<div class="row-fluid">
			<div class="span12">
				<div class="block-fluid without-head">
					<div class="row-form clearfix">
						<div class="span3"></div>
						<div class="span9">
							<span id="info_name"></span>
						</div>
					</div>
				</div>
			</div>
			<div class="footer">
				<button class="btn closemodal" type="button" id="btnConfirmationYes">Ya</button>
				<button class="btn closemodal" type="button" id="btnConfirmationNo">Tidak</button>
			</div>
		</div>
	</div>
</div>
