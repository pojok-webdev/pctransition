<script type='text/javascript' src="<?php echo base_url();?>js/aquarius/menu.js"></script>
<div class="menu padimenu">                
	<div class="breadLine">            
		<div class="arrow"></div>
		<div class="adminControl active">
			Hi, <?php 
			$myuser = $this->ion_auth->user()->row();
			echo $myuser->username;
			?>
		</div>
	</div>
	
	<div class="admin">
		<div class="image">
			<img src="<?php echo base_url();?>media/users/<?php echo strtolower($myuser->username);?>.jpg" class="img-polaroid" width=32 height=32/>                
		</div>
		<ul class="control">                
			<li><span class="icon-comment"></span> <a href="<?php echo base_url();?>index.php/adm/messages">Messages</a> <a href="<?php echo base_url();?>adm/messages" class="caption red notification">0</a></li>
			<li><span class="icon-cog"></span> <a href="<?php echo base_url();?>index.php/adm/settings">Settings</a></li>
			<li><span class="icon-share-alt"></span> <a href="<?php echo base_url();?>index.php/adm/logout">Logout</a></li>
		</ul>
		<div class="info">
			<span id='lastvisit'>Your last visit: <?php echo App_log::get_lastvisit($this->session->userdata['username']);?></span>
		</div>
	</div>
	
	<ul class="navigation">
		
		<?php //if(Common::member_of($this->ionuser->id,'Administrator')){?>        
		<li>
			<a href="<?php echo base_url();?>index.php/dashboards">
				<span class="isw-grid"></span><span class="text">Dashboard</span>
			</a>
		</li>
		<?php //}?>
		<?php 
		if(Common::member_of($this->ionuser->id,'Administrator')){?>
		<li>
			<a href="<?php echo base_url();?>index.php/users">
				<span class="isw-users"></span><span class="text">Users</span>
			</a>
		</li>
		<li>
			<a href="#">
				<span class="isw-users"></span><span class="text" style="color:red" id="removeAll">Hapus semua Data</span>
			</a>
		</li>
		<?php }?>
		<?php //if(Common::member_of($this->ionuser->id,'Sales')){?>
		<li>
			<a href="<?php echo base_url();?>index.php/suspects">
				<span class="isw-grid"></span><span class="text">Suspect</span>
			</a>
		</li>
		<li>
			<a href="<?php echo base_url();?>index.php/prospects">
				<span class="isw-grid"></span><span class="text">Prospek</span>
			</a>
		</li>
		<?php //}?>
		<?php //if(Common::memberoneofgroups($this->ionuser->id,array('TS','Sales'))){?>
		<li>
			<a href="<?php echo base_url();?>index.php/surveys">
				<span class="isw-grid"></span><span class="text">Survey</span>
			</a>
		</li>
		<?php //}?>
		<li>
			<a href="<?php echo base_url();?>index.php/trials">
				<span class="isw-grid"></span><span class="text">Trial</span>
			</a>
		</li>
		<li>
			<a href="<?php echo base_url();?>index.php/install_requests">
				<span class="isw-grid"></span><span class="text">Instalasi</span>
			</a>
		</li>
		<li>
			<a href="<?php echo base_url();?>index.php/altergrades">
				<span class="isw-grid"></span><span class="text">Perubahan Layanan</span>
			</a>
		</li>
		<li>
			<a href="<?php echo base_url();?>index.php/maintenances">
				<span class="isw-grid"></span><span class="text">Maintenance Schedule</span>
			</a>
		</li>
		<li>
			<a href="<?php echo base_url();?>index.php/maintenance_requests">
				<span class="isw-grid"></span><span class="text">Maintenance</span>
			</a>
		</li>
		<?php //if(Common::member_of($this->ionuser->id,'TS')){?>
		<li>
			<a href="<?php echo base_url();?>index.php/troubleshoots">
				<span class="isw-grid"></span><span class="text">Troubleshoot</span>
			</a>
		</li>
		<?php //}?>
		<li>
			<a href="<?php echo base_url();?>index.php/disconnections/">
				<span class="isw-grid"></span><span class="text">Disconnection</span>
			</a>
		</li>
		<?php //if(Common::member_of($this->ionuser->id,'TS')){?>
		<li>
			<a href="<?php echo base_url();?>index.php/tickets">
				<span class="isw-grid"></span><span class="text">Tiket</span>
			</a>
		</li>
		<?php //}?>
		<li>
			<a href="<?php echo base_url();?>index.php/clients">
				<span class="isw-grid"></span><span class="text">Pelanggan</span>
			</a>
		</li>
		<li>
			<a href="<?php echo base_url();?>index.php/reports">
				<span class="isw-grid"></span><span class="text">Laporan</span>
			</a>
		</li>

		<li class="openable">
			<a href="<?php echo base_url();?>index.php/adm/troubleshoots">
				<span class="isw-grid"></span><span class="text">Master</span>
			<ul>
				<li>
					<a href="<?php echo base_url();?>index.php/adm/devicetypes">
						<span class="icon-th"></span><span class="text">Jenis Peralatan</span>
					</a>
				</li>
				<li>
					<a href="<?php echo base_url();?>index.php/adm/devices">
						<span class="icon-th"></span><span class="text">Daftar Peralatan</span>
					</a>
				</li>
				<li>
					<a href="<?php echo base_url();?>index.php/adm/materialtypes">
						<span class="icon-th"></span><span class="text">Jenis Material</span>
					</a>
				</li>
				<li>
					<a href="<?php echo base_url();?>index.php/adm/materials">
						<span class="icon-th"></span><span class="text">Daftar Material</span>
					</a>
				</li>
				<li>
					<a href="<?php echo base_url();?>index.php/adm/backbones">
						<span class="icon-th"></span><span class="text">Backbones</span>
					</a>
				</li>
				<li>
					<a href="<?php echo base_url();?>index.php/adm/btses">
						<span class="icon-th"></span><span class="text">BTS</span>
					</a>
				</li>
				<li>
					<a href="<?php echo base_url();?>index.php/adm/aps">
						<span class="icon-th"></span><span class="text">AP</span>
					</a>
				</li>
			</ul>
			</a>
		</li>

		
	</ul>
</div>
