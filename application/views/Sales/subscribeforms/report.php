<html>
	<head>
		<link rel="stylesheet" href="/asset/report/bootstrap-3.3.6.min.css">
		<link rel="stylesheet" href="/asset/jqueryui.1.12.0.css">
        <link rel="stylesheet" type="text/css" href="/asset/report/print.css">
		<script src="/asset/report/jquery-1.12.0.min.js"></script>
		<script src="/asset/report/bootstrap-3.3.6.min.js"></script>
		<title>Form Berlangganan</title>
	</head>
	<body>
        <input type="hidden" id="clientsiteid" value="<?php echo $id;?>">
		<div class="container">
            <div class="row">
                <div class="col-xs-6">
                    <div class="row"><img src="/img/aquarius/logo.png" width=200px height="70px"></div>
                    <div class="row">Mayjend Sungkono 83, Surabaya 60242</div>
                    <div class="row">Ph. 031-5616330 Fax. 031 - 5616304</div>
                </div>
                <div class="col-xs-6">
                    <div class="row"><strong>Jakarta Branch</strong></div>
                    <div class="row">Graha Sucofindo Lt.10, Jl Raya Pasar Minggu Kav 34 Jakarta Selatan 12780</div>
                    <div class="row">Ph. 021-791886/30 Fax. 021 - 79188602</div>
                    <div class="row"><strong>Malang Branch</strong></div>
                    <div class="row">Letjen S. Parman 21 Malang 65141</div>
                    <div class="row">Ph. 0341-404900 Fax. 0341 - 412115</div>
                    <div class="row"><strong>Bali Branch</strong></div>
                    <div class="row">Benoa Square 3rd floor</div>
                    <div class="row">Bypass Ngurah Rai 21A, Kedonganan 80361</div>
                    <div class="row">Ph. 0361-8957723 Fax. 0361 - 8957723</div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6"><strong>Form Berlangganan</strong></div>
                <div class="col-xs-6"><strong>No. :<span id=fbid><?php echo $fb->nofb;?></span></strong></div>
            </div>
            <div class="row thick">&nbsp;</div>
            <div class="row"></div>
            <div class="row bordered">
                <div class="col-xs-12"><strong>Catatan</strong> : Untuk mewakili perusahaan / badan hukum , pengisian aplikasi wajib dilakukan oleh pejabat yang berwenang</div>
            </div>
            <div class="row">
                <div class="col-xs-2">Kategori</div>
                <div class="col-xs-2" id="cat-korporasi">&#9745;&nbsp;Korporasi</div>
                <div class="col-xs-3" id="cat-game">&#9744;&nbsp;Game Online</div>
                <div class="col-xs-2" id="cat-perorangan">&#9744;&nbsp;Perorangan</div>
                <div class="col-xs-3" id="cat-lain">&#9744;&nbsp;Lainnya</div>
            </div>
            <div class="row">
                <div class="col-xs-12 subtitle">DATA PERUSAHAAN</div>
            </div>
            <div class="row">
                <div class="col-xs-12"><strong>Nama Perusahaan / Pelanggan</strong></div>
            </div>
            <div class="row bordered">
                <div class="col-xs-12"><span id="clientname">PT Ranteindo Teknik Mandiri</span></div>
            </div>
            <div class="row bordered">
                <div class="col-xs-12"><strong>Jenis Usaha</strong> <span id="businesstype">Power Transmision</span></div>
            </div>
            <div class="row bordered">
                <div class="col-xs-12">Nomor Pendaftaran Perusahaan (Harap melampirkan SIUP dan NPWP)</div>
            </div>
            <div class="row">
                <div class="col-xs-12"><strong>SIUP</strong> <span id="siup">510/134/404 62 /2014</span></div>
            </div>
            <div class="row bordered">
                <div class="col-xs-12"><strong>NPWP</strong> <span id="npwp">31 265 507 9-643 000</span></div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <strong>Alamat</strong> 
                    <span id="clientaddress"><?php echo $clientsite->address;?></span>
                </div>
            </div>
            <div class="row bordered">
                <div class="col-xs-12"><strong>Telp/Fax</strong> <span id="clientphone">031 8532270</span><span id="clientfax"></span></div>
            </div>
            <div class="row bordered">
                <div class="col-xs-12">Pemohon dan Penanggung Jawab (Harap melampirkan foto kopi kartu identitas)</div>
            </div>
            <div class="row bottomborder">
                <div class="col-xs-6">
                    <div class="row">
                        <div class="col-xs-12"><strong>Pemohon</strong></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-3">Nama</div>
                        <div class="col-xs-9" id="subscribername">Ajeeb</div>
                    </div>
                    <div class="row">
                        <div class="col-xs-3">Jabatan</div>
                        <div class="col-xs-9" id="subscriberposition">Pemohon</div>
                    </div>
                    <div class="row">
                        <div class="col-xs-3">No ID (KTP)</div>
                        <div class="col-xs-9" id="subscriber_id">357804120682 0002</div>
                    </div>
                    <div class="row">
                        <div class="col-xs-3">Telp/HP</div>
                        <div class="col-xs-9" id="subscriberphone">08155 09 5555</div>
                    </div>
                    <div class="row">
                        <div class="col-xs-3">Email</div>
                        <div class="col-xs-9" id="subscriberemail">Suwanto@gmail.com</div>
                    </div>
                </div>
                <div class="col-xs-6 rightside">
                    <div class="row">
                        <div class="col-xs-12"><strong>Penanggung Jawab (setara Direktur atau Pemilik Usaha)</strong></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-3">Nama</div>
                        <div class="col-xs-9" id="respname">Ajeeb</div>
                    </div>
                    <div class="row">
                        <div class="col-xs-3">Jabatan</div>
                        <div class="col-xs-9" id="respposition">Penanggung Jawab</div>
                    </div>
                    <div class="row">
                        <div class="col-xs-3">No ID (KTP)</div>
                        <div class="col-xs-9" id="resp_id">357804120682 0002</div>
                    </div>
                    <div class="row">
                        <div class="col-xs-3">Telp/HP</div>
                        <div class="col-xs-9" id="respphone">08155 09 5555</div>
                    </div>
                    <div class="row">
                        <div class="col-xs-3">Email</div>
                        <div class="col-xs-9" id="respemail">Suwanto@gmail.com</div>
                    </div>
                </div>
            </div>            
            <div class="row bottomborder">
                <div class="col-xs-6">
                    <div class="row">
                        <div class="col-xs-12"><strong>Untuk keperluan administrasi, PadiNET akan menghubungi</strong></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-3">Nama</div>
                        <div class="col-xs-9" id="admname">Ajeeb</div>
                    </div>
                    <div class="row">
                        <div class="col-xs-3">Jabatan</div>
                        <div class="col-xs-9" id="admposition">Administratif Staff</div>
                    </div>
                    <div class="row">
                        <div class="col-xs-3">No ID (KTP)</div>
                        <div class="col-xs-9" id="adm_id">357804120682 0002</div>
                    </div>
                    <div class="row">
                        <div class="col-xs-3">Telp/HP</div>
                        <div class="col-xs-9" id="admphone">08155 09 5555</div>
                    </div>
                    <div class="row">
                        <div class="col-xs-3">Email</div>
                        <div class="col-xs-9" id="admemail">Suwanto@gmail.com</div>
                    </div>
                </div>
                <div class="col-xs-6 rightside">
                    <div class="row">
                        <div class="col-xs-12"><strong>Untuk setup teknis dan instalasi, PadiNET akan menghubungi</strong></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-3">Nama</div>
                        <div class="col-xs-9" id="technicianname">Ajeeb</div>
                    </div>
                    <div class="row">
                        <div class="col-xs-3">Jabatan</div>
                        <div class="col-xs-9" id="technicianposition">Purchasing Staff</div>
                    </div>
                    <div class="row">
                        <div class="col-xs-3">No ID (KTP)</div>
                        <div class="col-xs-9" id="technician_id">357804120682 0002</div>
                    </div>
                    <div class="row">
                        <div class="col-xs-3">Telp/HP</div>
                        <div class="col-xs-9" id="technicianphone">08155 09 5555</div>
                    </div>
                    <div class="row">
                        <div class="col-xs-3">Email</div>
                        <div class="col-xs-9" id="technicianemail">Suwanto@gmail.com</div>
                    </div>
                </div>
            </div>            

            <div class="row bottomborder">
                <div class="col-xs-6">
                    <div class="row">
                        <div class="col-xs-12"><strong>Untuk penagihan, PadiNET akan menghubungi</strong></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-3">Nama</div>
                        <div class="col-xs-9" id="billingname">Ajeeb</div>
                    </div>
                    <div class="row">
                        <div class="col-xs-3">Jabatan</div>
                        <div class="col-xs-9" id="billingposition">Purchasing Staff</div>
                    </div>
                    <div class="row">
                        <div class="col-xs-3">No ID (KTP)</div>
                        <div class="col-xs-9" id="billing_id">357804120682 0002</div>
                    </div>
                    <div class="row">
                        <div class="col-xs-3">Telp/HP</div>
                        <div class="col-xs-9" id="billingphone">08155 09 5555</div>
                    </div>
                    <div class="row">
                        <div class="col-xs-3">Email</div>
                        <div class="col-xs-9" id="billingemail">Suwanto@gmail.com</div>
                    </div>
                </div>
                <div class="col-xs-6 rightside">
                    <div class="row">
                        <div class="col-xs-12"><strong>Untuk support teknis 24 jam, PadiNET akan menghubungi</strong></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-3">Nama</div>
                        <div class="col-xs-9" id="supportname">Maryono</div>
                    </div>
                    <div class="row">
                        <div class="col-xs-3">Jabatan</div>
                        <div class="col-xs-9">TS</div>
                    </div>
                    <div class="row">
                        <div class="col-xs-3">No ID (KTP)</div>
                        <div class="col-xs-9" id="support_id">357804120682 0002</div>
                    </div>
                    <div class="row">
                        <div class="col-xs-3">Telp/HP</div>
                        <div class="col-xs-9" id="supportphone">08155 09 5555</div>
                    </div>
                    <div class="row">
                        <div class="col-xs-3">Email</div>
                        <div class="col-xs-9" id="supportemail">Suwanto@gmail.com</div>
                    </div>
                </div>
            </div>            
            <div class="row bottomborder">
                <div class="col-xs-6">
                    <div class="row">
                        <div class="col-xs-12"><strong>Penagihan</strong></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12"><strong>&#9745;</strong> &nbsp; Account Baru</div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">&#9744; &nbsp; Ditambahkan ke account yang telah ada</div>
                    </div>
                </div>
                <div class="col-xs-6 rightside">
                    <div class="row">
                        <div class="col-xs-12"><strong>Alamat Penagihan (diisi jika berbeda dengan alamat perusahaan/pelanggan)</strong></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12" id="billaddress">Komplek Pergudangan Permata Gedangan Blok A / 16</div>
                    </div>
                </div>
            </div>
            <div class="row  thisfooter">
                <div class="col-xs-6">Paraf Pelanggan</div>
                <div class="col-xs-6 align-right">Confidential Hal 1</div>
            </div>

            <div class="row">
                <div class="col-xs-12 subtitle">LAYANAN</div>
            </div>
            <div class="row">
                <div class="col-xs-6">
                    Padi Smart Value Up to 2 Mbps
                </div>
                <div class="col-xs-6 rightside">
                    <div class="row">
                        <div class="col-xs-12">Tanggal Aktifasi <span id="activationdate">18 September 2015</span></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">Periode Kontrak <span id="period1">18 September 2015</span> -  <span id="period2">30 September 2016</span></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 subtitle">BIAYA BERLANGGANAN</div>
            </div>
            <div class="row">
                <div class="col-xs-4">
                    Biaya Setup
                </div>
                <div class="col-xs-8">
                    <span id="setupfee"></span><span id="setupfeeppnlabel"> + PPn = </span><span id="setupfeetotal"></span>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-4">
                    Biaya Berlangganan Bulanan
                </div>
                <div class="col-xs-8">
                    <span id="monthlyfee"></span><span id="monthlyfeeppn"> + PPn = </span><span id="monthlyfeetotal"></span>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-4">
                    Biaya Perangkat
                </div>
                <div class="col-xs-8">
                    <span id="devicefee"></span><span id="devicefeeppn"> + PPn = </span><span id="devicefeetotal"></span>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-4">
                    Biaya Lainnya Deposit Perangkat
                </div>
                <div class="col-xs-8">
                    <span id="otherfee"></span><span id="otherfeeppn"> + PPn = </span><span id="otherfeetotal"></span>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 subtitle">PERSETUJUAN</div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    Dengan menandatangani Form Berlangganan ini, Pelanggan setuju untuk mematuhi beberapa ketentuan berikut:
                </div>
            </div>
            <div class="row bottomborder">
                <ol>
                    <li>Pelanggan memberikan konfirmasi atas keinginannya menggunakan layanan yang disediakan oleh PadiNET dan secara otomatis terikat dengan SYARAT DAN KETENTUAN BERLANGGANAN yang diberlakukan oleh PadiNET.</li>
                    <li>Form Berlangganan ini berfungsi dan memiliki kekuatan sebagaimana Kontrak Berlangganan, sesuai dengan periode yang tercantum dalam halaman 2</li>
                    <li>PadiNET akan melaksanakan kegiatan instalasi dan setup sesuai dengan layanan yang dipilih sebagaimana tertera di atas dan akan dituangkan kemudian dalan Berita Acara Aktivasi.</li>
                    <li>Pelanggan setuju bahwa Form Berlangganan bersama dengan Berita Acara Aktivasi dapat digunakan oleh PadiNET sebagai dasar penagihan.</li>
                    <li>Untuk layanan yang menggunakan media wireless dan layanan collocation, proses upgrade bisa dilakukan sewaktu-waktu mengikuti periode kontrak sebelumnya.</li>
                    <li>Downgrade hanya bisa dilaksanakan setelah layanan dan/atau perubahan terakhir layanan berjalan minimal 3 bulan</li>
                    <li>Downgrade yang dilaksanakan pada tahun pertama secara otomatis akan memperpanjang masa kontrak selama 12 bulan kedepan sejak dilaksanakannya downgrade</li>
                    <li>Upgrade layanan yang menggunakan media fiber optik dan satelit wajib dipertahankan sampai minimal kontrak 12 bulan berakhir.</li>
                    <li>Downgrade untuk layanan yang menggunakan media fiber optik dan satelit baru dapat dilaksanakan setelah minimal periode kontrak 12 bulan berjalan</li>
                </ol>
            </div>
            <div class="row">
                <div class="col-xs-6">
                    <div class="row">Saya menyatakan bahwa form ini diisi dengan sebenar-benarnya dan saya bersedia untuk mengikuti segala persyaratan dan ketentuan yang ditetapkan PadiNET</div>
                </div>
                <div class="col-xs-6">
                    <div class="row">Autorisasi PadiNET</div>
                </div>
            </div>
            <div class="row">&nbsp;</div>
            <div class="row">&nbsp;</div>
            <div class="row">&nbsp;</div>
            <div class="row">&nbsp;</div>
            <div class="row">
                <div class="col-xs-6">
                    <div class="row">
                        <div class="col-xs-1">&nbsp;</div>
                        <div class="col-xs-4 topborder sidepad text-center">
                        <small>Tanda Tangan &amp; Nama Terang</small>
                        </div>
                        <div class="col-xs-1">&nbsp;</div>
                        <div class="col-xs-2 topborder sidepad text-center">
                        <small>Tanggal</small>
                        </div>
                        <div class="col-xs-1">&nbsp;</div>
                        <div class="col-xs-2 topborder sidepad text-center">
                        <small text-center>Stempel</small>
                        </div>
                        <div class="col-xs-1">&nbsp;</div>
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="row">
                        <div class="col-xs-1">&nbsp;</div>
                        <div class="col-xs-5 topborder sidepad text-center">
                        <small>Tanda Tangan &amp; Nama Terang</small>
                        </div>
                        <div class="col-xs-1">&nbsp;</div>
                        <div class="col-xs-4 topborder sidepad text-center">
                        <small>Stempel PadiNET</small>
                        </div>
                        <div class="col-xs-1">&nbsp;</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 subtitle">UNTUK PENGAJUAN INTERNAL</div>
            </div>
            <div class="row">
                <div class="col-xs-6">
                    <div class="row">&nbsp;</div>
                    <div class="row">&nbsp;</div>
                    <div class="row">&nbsp;</div>
                    <div class="row">
                        <div class="col-xs-1">&nbsp;</div>
                        <div class="col-xs-6 text-center"><small><span id="usernamex">&nbsp;</username></small></div>
                        <div class="col-xs-1">&nbsp;</div>
                        <div class="col-xs-1">&nbsp;</div>
                        <div class="col-xs-2 text-center"></div>
                        <div class="col-xs-1">&nbsp;</div>
                    
                    
                    </div>
                    <div class="row bottomborder">
                        <div class="col-xs-1">&nbsp;</div>
                        <div class="col-xs-6 text-center topborder"><small>Tanda tangan &amp; Nama AM</small></div>
                        <div class="col-xs-1">&nbsp;</div>
                        <div class="col-xs-1">&nbsp;</div>
                        <div class="col-xs-2 text-center topborder"><small>Tanggal</small></div>
                        <div class="col-xs-1">&nbsp;</div>
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="row rightside">&nbsp;Keterangan:</div>
                    <div class="row rightside">&nbsp;</div>
                    <div class="row rightside">&nbsp;</div>
                    <div class="row rightside">&nbsp;</div>
                    <div class="row rightside">&nbsp;</div>
                </div>
            </div>

            <div class="row  thisfooter">
                <div class="col-xs-6">Paraf Pelanggan</div>
                <div class="col-xs-6 align-right">Confidential Hal 2</div>
            </div>

   		</div>
		<script type="text/javascript" src="<?php echo base_url();?>js/padilibs/padi.url.js"></script>
		<script type="text/javascript" src="/js/aquarius/subscriptionforms/print.js"></script>

	</body>
</html>
