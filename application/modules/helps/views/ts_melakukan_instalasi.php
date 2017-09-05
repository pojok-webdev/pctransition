<a href='<?php echo base_url();?>index.php/helps/show_help'>index</a>
<h2>TS Melakukan Instalasi</h2>

<ol>
<li>TS menerima data request Instalasi dari Sales</li>
<li>TS memeriksa jadwal apakah dapat melakukan instalasi pada waktu yang telah dijalankan</li>
<li>Apabila tidak dapat, maka TS meminta sales untuk melakukan <a href='<?php echo base_url();?>index.php/helps/show_help/type/penjadwalan_ulang_instalasi'>penjadwalan ulang</a></li>
<li>Ketika tanggal yang tepat telah ditemukan, TS memeriksa kelengkapan kemudian melakukan Instalasi</li>
<li>Setelah Instalasi, TS mengisi form dengan data-data sebagai berikut:
<ol>
<li>Pelaksana Instalasi</li>
<li>Data Perangkat</li>
<li>Nama klien</li>
<li>Alamat</li>
<li>PIC</li>
<li>Tanggal Instalasi</li>
<li>Berita Acara Aktivasi</li>
<li>Berita Acara Instalasi</li>
</ol>
</li>
<li>Selanjutnya Sales menuggu balasan dari TS apakah diperlukan revisi tanggal instalasi atau tidak</li> 
</ol>
<a href='<?php echo base_url();?>index.php/helps/show_help'>index</a>