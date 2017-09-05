<script type='text/javascript' src="<?php echo base_url();?>js/aquarius/menu.js"></script>
<div class="menu padimenu">
	<div class="breadLine">
		<div class="arrow"></div>
		<div class="adminControl active">
			Hi, <?php
			$myuser = $this->ion_auth->user()->row();
			echo $myuser->username;
			echo " [" . $this->session->userdata["role"] . "] <span class='icon-asterisk' id='changeRole'></span>";
			?>
		</div>
	</div>
	<div class="admin">
		<div class="image">
			<img id="userimage" src="<?php echo base_url();?>media/users/<?php echo strtolower($myuser->username);?>.jpg" class="img-polaroid" width=32 height=32/>
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
		<?php if($this->session->userdata["role"]==="Administrator"){?>
			<li>
				<a href="<?php echo base_url();?>index.php/dashboards">
					<span class="isw-grid"></span><span class="text">Dashboard</span>
				</a>
			</li>
		<?php }?>
		<?php
		if($this->session->userdata["role"]==="Administrator"){?>
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
		<?php if($this->session->userdata["role"]=="Sales"){?>
			<li class="<?php echo common::getMenuStatus($menuFeed,array('suspect'));?>">
				<a href="<?php echo base_url();?>index.php/suspects">
					<span class="isw-grid"></span><span class="text">Suspect</span>
				</a>
			</li>
			<li class="<?php echo common::getMenuStatus($menuFeed,array('prospect'));?>">
				<a href="<?php echo base_url();?>index.php/prospects">
					<span class="isw-grid"></span><span class="text">Prospek</span>
				</a>
			</li>
		<?php }?>
		<?php if(($this->session->userdata["role"]==="TS")||($this->session->userdata["role"]==="Sales")){?>
			<li class="<?php echo common::getMenuStatus($menuFeed,array('survey'));?>">
				<a href="<?php echo base_url();?>index.php/surveys">
					<span class="isw-grid"></span><span class="text">Survey</span>
				</a>
			</li>
		<?php }?>
		<?php if(($this->session->userdata["role"]==="TS")||($this->session->userdata["role"]==="Sales")){?>
			<li class="<?php echo common::getMenuStatus($menuFeed,array('install'));?>">
				<a href="<?php echo base_url();?>index.php/install_requests/index/all">
					<span class="isw-grid"></span><span class="text">Instalasi</span>
				</a>
			</li>
		<?php }?>
		<?php if(($this->session->userdata["role"]==="TS")||($this->session->userdata["role"]==="Sales")){?>
			<li class="<?php echo common::getMenuStatus($menuFeed,array('trial'));?>">
				<a href="<?php echo base_url();?>index.php/trials">
					<span class="isw-grid"></span><span class="text">Trial</span>
				</a>
			</li>
		<?php }?>
		<?php if(($this->session->userdata["role"]==="TS")||($this->session->userdata["role"]==="Sales")){?>
			<li class="<?php echo common::getMenuStatus($menuFeed,array('altergrade'));?>">
				<a href="<?php echo base_url();?>index.php/altergrades">
					<span class="isw-grid"></span><span class="text">Perubahan Layanan</span>
				</a>
			</li>
		<?php }?>
		<?php if(($this->session->userdata["role"]==="TS")||($this->session->userdata["role"]==="Sales")){?>
			<li class="<?php echo common::getMenuStatus($menuFeed,array('maintenance'));?>">
				<a href="<?php echo base_url();?>index.php/maintenances">
					<span class="isw-grid"></span><span class="text">Maintenance Schedule</span>
				</a>
			</li>
		<?php }?>
		<?php if(($this->session->userdata["role"]==="TS")||($this->session->userdata["role"]==="Sales")){?>
			<li class="<?php echo common::getMenuStatus($menuFeed,array('maintenancereport'));?>">
				<a href="<?php echo base_url();?>index.php/maintenance_requests">
					<span class="isw-grid"></span><span class="text">Maintenance Report</span>
				</a>
			</li>
		<?php }?>
		<?php if($this->session->userdata["role"]=="TS"){?>
			<li class="<?php echo common::getMenuStatus($menuFeed,array('troubleshoot'));?>">
				<a href="<?php echo base_url();?>index.php/troubleshoots">
					<span class="isw-grid"></span><span class="text">Troubleshoot</span>
				</a>
			</li>
		<?php }?>
		<?php if(($this->session->userdata["role"]==="TS")||($this->session->userdata["role"]==="Sales")||($this->session->userdata["role"]==="Accounting")){?>
			<li class="<?php echo common::getMenuStatus($menuFeed,array('disconnection'));?>">
				<a href="<?php echo base_url();?>index.php/disconnections/index/0">
					<span class="isw-grid"></span><span class="text">Disconnection</span>
				</a>
			</li>
		<?php }?>
		<?php if($this->session->userdata["role"]==="TS"){?>
			<li class="<?php echo common::getMenuStatus($menuFeed,array('ticket'));?>">
				<a href="<?php echo base_url();?>index.php/tickets">
					<span class="isw-grid"></span><span class="text">Tiket</span>
				</a>
			</li>
		<?php }?>
		<li class="openable <?php echo common::getMenuStatus($menuFeed,array('client','clientSite'));?>">
			<a href="<?php echo base_url();?>index.php/clients">
				<span class="isw-grid"></span><span class="text">Pelanggan</span>
				<ul>
					<li class="<?php echo common::getMenuStatus($menuFeed,array('clientSite'));?>">
						<a href="<?php echo base_url();?>index.php/clients">
						<span class="icon-th"></span><span class="text">Pelanggan</span>
						</a>
					</li>
					<li class="<?php echo common::getMenuStatus($menuFeed,array('clientSite'));?>">
						<a href="<?php echo base_url();?>index.php/client_sites/index/">
						<span class="icon-th"></span><span class="text">Cabang Pelanggan</span>
						</a>
					</li>
				</ul>
			</a>
		</li>
		<li class="<?php echo common::getMenuStatus($menuFeed,array('report'));?>">
			<a href="<?php echo base_url();?>index.php/reports">
				<span class="isw-grid"></span><span class="text">Laporan</span>
			</a>
		</li>
		<?php if(($this->session->userdata["role"]==="Administrator")){?>
		<li class="<?php echo common::getMenuStatus($menuFeed,array('report'));?>">
			<a href="<?php echo base_url();?>index.php/paqs">
				<span class="isw-grid"></span><span class="text">PAQs</span>
			</a>
		</li>
		<?php }?>
		<li class="openable <?php echo common::getMenuStatus($menuFeed,array('devicetype','device','materialtype','material','backbone','bts','ap','surveypackage'));?>">
			<a href="<?php echo base_url();?>index.php/adm/troubleshoots">
				<span class="isw-grid"></span><span class="text">Master</span>
			<ul>
				<?php if(($this->session->userdata["role"]==="Umum dan Warehouse")){?>
				<li>
					<a href="<?php echo base_url();?>index.php/adm/devicetypes">
						<span class="icon-th"></span><span class="text">Jenis Peralatan</span>
					</a>
				</li>
				<?php }?>
				<?php if(($this->session->userdata["role"]==="Umum dan Warehouse")){?>
				<li>
					<a href="<?php echo base_url();?>index.php/adm/devices">
						<span class="icon-th"></span><span class="text">Daftar Peralatan</span>
					</a>
				</li>
				<?php }?>
				<?php if(($this->session->userdata["role"]==="Umum dan Warehouse")){?>
				<li>
					<a href="<?php echo base_url();?>index.php/adm/materialtypes">
						<span class="icon-th"></span><span class="text">Jenis Material</span>
					</a>
				</li>
				<?php }?>
				<?php if(($this->session->userdata["role"]==="Umum dan Warehouse")){?>
				<li>
					<a href="<?php echo base_url();?>index.php/adm/materials">
						<span class="icon-th"></span><span class="text">Daftar Material</span>
					</a>
				</li>
				<?php }?>
				<?php if(($this->session->userdata["role"]==="TS")){?>
				<li>
					<a href="<?php echo base_url();?>index.php/adm/backbones">
						<span class="icon-th"></span><span class="text">Backbones</span>
					</a>
				</li>
				<?php }?>
				<?php if(($this->session->userdata["role"]==="TS")){?>
				<li>
					<a href="<?php echo base_url();?>index.php/adm/btses">
						<span class="icon-th"></span><span class="text">BTS</span>
					</a>
				</li>
				<?php }?>
				<?php if(($this->session->userdata["role"]==="TS")){?>
				<li>
					<a href="<?php echo base_url();?>index.php/adm/aps">
						<span class="icon-th"></span><span class="text">AP</span>
					</a>
				</li>
				<?php }?>
				<?php if($this->session->userdata["role"]==="Umum dan Warehouse"){?>
				<li>
					<a href="<?php echo base_url();?>index.php/surveypackages/">
						<span class="icon-th"></span><span class="text">Paket Perangkat Survey</span>
					</a>
				</li>
				<?php }?>
			</ul>
			</a>
		</li>
	</ul>
</div>
