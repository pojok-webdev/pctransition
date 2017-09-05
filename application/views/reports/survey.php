<html>
<head>
<?php $this->load->view('reports/reporthead');?>
</head>
<body>
<div class="header">
        <a class="home" href="#"><img src="<?php echo base_url()?>img/header_menu_list.png" alt="Menu" title="Menu" /></a>
</div>
<div class="content">
	<div class="menubar">
		<ul class="buttons">
			<li><a href="#" ><span class="icon-user"></span><span class="text">Cetak</span></a></li>
		</ul>
	</div>
</div>
<div class="container container-sixteen">
<div class="sixteen columns">
<div class="sixteen columns"><h3>FIELD REPORT</h3></div>
<div class="sixteen columns"><h4>Lokasi <?php echo $obj->client->city;?></h4></div>
<div class="sixteen columns"><h4>Jenis SURVEY</h4></div>
<div class="sixteen columns"><h4>Kebutuhan <?php echo $obj->service->name;?></h4></div>
<hr />
<div class="sixteen columns alpha offset-by-zero"><h4>Data Calon Pelanggan</h4></div>
<div class="ten columns alpha underlined">Nama Calon Customer</div><div class="six columns omega"><?php echo humanize($obj->client->name);?></div>
<div class="ten columns alpha">Tipe bisnis</div><div class="six columns omega"><?php echo $obj->client->business_field;?></div>
<div class="ten columns alpha">Kontak Teknis</div><div class="six columns omega">-</div>
<?php $c=1;?>
<?php foreach($obj->survey_site as $site){?>
<div class="ten columns alpha underlined">Alamat <?php echo $c++;?></div><div class="six columns omega"><?php echo $site->address;?></div>
<?php }?>
<div class="ten columns alpha">Tanggal Pelaksanaan</div><div class="six columns omega"><?php echo Common::longsql_to_human_date($obj->survey_date);?></div>
<div class="ten columns alpha">Pelaksana</div><div class="six columns omega">Bagus</div>


<div class="sixteen columns alpha offset-by-zero"><h4>Data Teknis</h4></div>
<?php foreach($obj->survey_site as $site){?>
	<div class="ten columns alpha">Location</div><div class="six columns omega"><?php echo $site->location_s;?></div>
	<div class="six columns offset-by-ten"><?php echo $site->location_e;?></div>
	<div class="ten columns">Elevation</div><div class="six columns omega"><?php echo $site->amsl;?></div>
	<div class="six columns offset-by-ten"><?php echo $site->agl;?></div>
<?php }?>


<div class="sixteen columns alpha offset-by-zero"><h4>Data Jarak</h4></div>

<div class="four columns alpha underlined pcenter lborder tborder bborder rhborder ">BTS</div>
<div class="three columns pcenter lhborder tborder bborder rhborder">Jarak</div>
<div class="three columns pcenter lhborder tborder bborder rhborder">NLOS/LOS</div>
<div class="three columns pcenter lhborder tborder bborder rhborder">AP</div>
<div class="three columns omega pcenter lhborder tborder bborder rborder">Penghalang</div>

<div class="four columns alpha pcenter rhborder lborder">Neo</div>
<div class="three columns pcenter lhborder rhborder ">9.50 Km</div>
<div class="three columns pcenter lhborder rhborder ">NLOS</div>
<div class="three columns pcenter lhborder rhborder ">MPM</div>
<div class="three columns pcenter omega lhborder rborder">Gedung Spazio</div>

<div class="four columns alpha pcenter rhborder lborder">Architect</div>
<div class="three columns pcenter lhborder rhborder ">13.1 Km</div>
<div class="three columns pcenter lhborder rhborder">NLOS</div>
<div class="three columns pcenter lhborder rhborder">Nana</div>
<div class="three columns pcenter omega lhborder rborder ">Kontur Tanah + Pohon</div>

<div class="four columns alpha pcenter rhborder bborder lborder">Smith</div>
<div class="three columns pcenter lhborder bborder rhborder">12.1 Km</div>
<div class="three columns pcenter lhborder bborder rhborder">NLOS</div>
<div class="three columns pcenter lhborder bborder rhborder">Alim</div>
<div class="three columns pcenter omega lhborder bborder rborder">Kontur Tanah + Pohon</div>


<div class="sixteen columns alpha offset-by-zero"><h4>Foto Lokasi</h4></div>
<div class="eight columns alpha underlined"><img src="<?php echo base_url();?>media/surveys/bangunan_tampak_depan.png" width="400" height="300" /></div><div class="eight columns omega"><img src="<?php echo base_url();?>media/surveys/pandangan_ke_bts_neo_nlos.png"  width="400" height="300" /></div>
<div class="eight columns alpha underlined"><img src="<?php echo base_url();?>media/surveys/bangunan_tampak_depan.png"  width="400" height="300" /></div><div class="eight columns omega"><img src="<?php echo base_url();?>media/surveys/bangunan_tampak_depan.png"  width="400" height="300" /></div>
<div class="eight columns alpha underlined"><img src="<?php echo base_url();?>media/surveys/bangunan_tampak_depan.png"  width="400" height="300" /></div><div class="eight columns omega"><img src="<?php echo base_url();?>media/surveys/bangunan_tampak_depan.png"  width="400" height="300" /></div>
<div class="eight columns alpha underlined"><img src="<?php echo base_url();?>media/surveys/bangunan_tampak_depan.png"  width="400" height="300" /></div><div class="eight columns omega"><img src="<?php echo base_url();?>media/surveys/bangunan_tampak_depan.png"  width="400" height="300" /></div>



<div class="sixteen columns alpha offset-by-zero"><h4>Kebutuhan Instalasi</h4></div>

<div class="two columns alpha underlined pcenter lborder tborder rhborder bhborder">No</div>
<div class="ten columns pcenter tborder lhborder rhborder bhborder">Kebutuhan</div>
<div class="four columns omega pcenter lhborder tborder rborder bhborder">Banyak/Satuan</div>

<div class="two columns alpha underlined pcenter lborder thborder rhborder bhborder">1</div>
<div class="ten columns pcenter lhborder thborder rhborder bhborder">Pipa 1.5"</div>
<div class="four columns omega pcenter lhborder thborder rborder bhborder">6m</div>

<div class="two columns alpha underlined pcenter lborder thborder rhborder bhborder">2</div>
<div class="ten columns pcenter lhborder thborder rhborder bhborder">Kawat Seling</div>
<div class="four columns omega pcenter lhborder thborder rborder bhborder">6m</div>

<div class="two columns alpha underlined pcenter lborder thborder rhborder bhborder">3</div>
<div class="ten columns pcenter lhborder thborder rhborder bhborder">Papan Screw</div>
<div class="four columns omega pcenter lhborder thborder rborder bhborder">6m</div>



<div class="sixteen columns alpha offset-by-zero"><h4>Resume</h4></div>

<div class="two columns alpha pcenter">1</div>
<div class="fourteen columns">Bangunan rumah 3 lt difungsikan untuk tempat kos (30 kamar)</div>

<div class="two columns alpha pcenter">2</div>
<div class="fourteen columns">Ketinggian tiang yang direkomendasikan 3 m</div>

<div class="two columns alpha pcenter">3</div>
<div class="fourteen columns">Posisi penempatan tiang diklem pada samping tembok dengan 3 tarikan suspender</div>

<div class="two columns alpha pcenter">4</div>
<div class="fourteen columns">Posisi penempatan switch belum diketahui karena saat survey hanya ada penjaga rumah</div>

<div class="sixteen columns alpha offset-by-zero">&nbsp;</div>
<div class="sixteen columns alpha offset-by-zero">&nbsp;</div>


<div class="sixteen columns alpha">Status Projek : DAPAT DILAKSANAKAN</div>

<div class="sixteen columns alpha offset-by-zero">&nbsp;</div>
<div class="sixteen columns alpha offset-by-zero">&nbsp;</div>

<div class="sixteen columns alpha offset-by-zero">Pelaksana</div>

<div class="sixteen columns alpha offset-by-zero">&nbsp;</div>
<div class="sixteen columns alpha offset-by-zero">&nbsp;</div>

<div class="sixteen columns alpha offset-by-zero">Bagus</div>


</div>

</div>
<div class="footer">
        <a class="home" href="#"><img src="<?php echo base_url()?>img/header_menu_list.png" alt="Menu" title="Menu" /></a>
</div>

</body>
</html>
