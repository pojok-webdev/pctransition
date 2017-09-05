<ul class="buttons">
	<li>
		<a href="#" id="btnNotification"><span class="icon-exclamation-sign"></span><span class="text">Notifikasi</span></a>
		<div id="bcPopupList" class="popup">
			<div class="head clearfix">
				<div class="arrow"></div>
				<span class="isw-users"></span>
				<span class="name">Pesan belum terbaca</span>
			</div>
			<div class="footer">
				<button class="btn btn-danger btnNotification" type="button">Close</button>
			</div>
		</div>
	</li>
	<li>
		<a href="#" id="btnChangeRole"><span class="icon-search"></span><span class="text">Ganti Role</span></a>
	</li>
	<li><span></span><span><a class="btnclock"></a></span></li>
</ul>
<input type="hidden" name="loggeduserid" id="loggeduserid" value="<?php echo $this->session->userdata("user_id");?>">
<script type="text/javascript" src="<?php echo base_url();?>js/aquarius/buttons.js"></script>
