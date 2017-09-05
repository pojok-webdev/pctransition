<?php 
$rpt = '<html>';
$rpt.= '<h1>Field Report</h1>';
$rpt.= '<table>';
$rpt.= '<tr>';
$rpt.= '<th>LOKASI</th><th>:</th><th>SURABAYA</th>';
$rpt.= '</tr><tr>';
$rpt.= '<th>JENIS</th><th>:</th><th>SURVEY PTP/WLL</th>';
$rpt.= '</tr>';
$rpt.= '</table>';

$rpt.= '<table>';
$rpt.= '<tr>';
$rpt.= '<td>Nama Calon Customer</td><td>:</td><td>' . $client . '</td>';
$rpt.= '</tr>';
$rpt.= '<tr>';
$rpt.= '<td>Tipe Bisnis</td><td>:</td><td>' . $business_field . '</td>';
$rpt.= '</tr>';


$c = 1;
foreach ($client_sites as $site){


$rpt.= '<tr>';
$rpt.= '<td>Alamat ' . $c . '</td><td>:</td><td>' . $site->address . '</td>';
$rpt.= '</tr>';


$c++;
}

$rpt.= '<tr>';
$rpt.= '<td>Tgl Pelaksanaan</td><td>:</td><td>' . $survey_date . '</td>';
$rpt.= '</tr>';
$rpt.= '<tr>';
$rpt.= '<td>Pelaksana</td><td>:</td><td>' . $surveyors . '</td>';
$rpt.= '</tr>';
$rpt.= '</table>';
$rpt.= '<h1>A. Data Teknis</h1>';
$rpt.= '<table class="report_site_tables">';
$rpt.= '<tbody>';


foreach ($sites as $site){
$address2= (count($site)==2)?$site[1]->address:'';
$location= (count($site)==2)?$site[1]->location_s_degree . $site[1]->location_s_minute . $site[1]->location_s_second:'';
	$rpt.= '<tr><th colspan=3>' . $site[0]->address . '</th><th colspan=3>' . $address2 . '</th></tr>';
$rpt.= '<tr>';
$rpt.= '<td>Location</td><td>:</td><td>' . $site[0]->location_s_degree . $site[0]->location_s_minute . $site[0]->location_s_second . '</td>';


$rpt.= (isset($site[1]))?'<td>Location</td><td>:</td><td>' . $site[1]->location_s_degree . $site[1]->location_s_minute . $site[1]->location_s_second . '</td>':'<td colspan=3></td>';


$rpt.= '</tr>';
$rpt.= '<tr>';
$rpt.= '<td></td><td></td><td>' . $site[0]->location_e_degree . $site[0]->location_e_minute . $site[0]->location_e_second . '</td>';
$rpt.= '<td></td><td></td><td>' . $location . '</td>';
$rpt.= '</tr>';
$rpt.= '<tr>';
$rpt.= '<td>Elevation</td><td>:</td><td>' . $site[0]->elevation_rooftop . '</td>';


$rpt.= (isset($site[1]))?'<td>Elevation</td><td>:</td><td>' . $site[1]->elevation_rooftop . '</td>':'<td colspan=3></td>';


$rpt.= '</tr>';
$rpt.= '<tr>';
$rpt.= '<td></td><td></td><td>' . $site[0]->elevation_ground . '</td>';


$rpt.= (isset($site[1]))?'<td></td><td>:</td><td>' . $site[1]->elevation_ground . '</td>':'<td colspan=3></td>';


$rpt.= '</tr>';
}

$rpt.= '</tbody>';
$rpt.= '</table>';

$rpt.= '<h1>B. Foto Lokasi</h1>';

$rpt.= '<table class="report_image_tables">';
$rpt.= '<tbody>';


foreach ($client_sites as $site){


$rpt.= '<tr><th colspan=2>' . $site->address . '</th></tr>';


foreach (Survey_site::get_images($site->id) as $image){

$img = (isset($image[1]))?'<img src=' . base_url() . 'media/surveys_used/' . $image[1]->name . ' />':'';
$rpt.= '<tr><td><img src=' . base_url() . 'media/surveys_used/' . $image[0]->name . ' /></td>';
$rpt.= '<td>' . $img . '</td></tr>';


}
}

$rpt.= '</tbody>';
$rpt.= '</table>';

$rpt.= '<h1>C. Data Jarak</h1>';
$rpt.= '<h2>1. Link PTP</h2>';

$rpt.= '<table class="report_distance_tables">';
$rpt.= '<thead>';
$rpt.= '<tr><th>Lokasi</th><th>BTS</th><th>Jarak</th><th>Keterangan</th></tr>';
$rpt.= '</thead>';
$rpt.= '<tbody>';


foreach ($client_sites as $site){
foreach (Survey_site::get_client_distance($site->id) as $distance){


$rpt.= '<tr>';
$rpt.= '<td><label class="addr">' . $site->address . '</label></td>';
$rpt.= '<td>';

$rpt.= $distance->client->name;

$rpt.= '</td>';

$rpt.= '<td>';

$rpt.= $distance->distance;

$rpt.= '</td>';
$rpt.= '<td></td>';
$rpt.= '</tr>';
}
}

$rpt.= '</tbody>';
$rpt.= '</table>';


$rpt.= '<h2>2. Link ke BTS</h2>';

$rpt.= '<table class="report_distance_tables">';
$rpt.= '<thead>';
$rpt.= '<tr><th>Lokasi</th><th>BTS</th><th>Jarak</th><th>Keterangan</th></tr>';
$rpt.= '</thead>';
$rpt.= '<tbody>';
foreach ($client_sites as $site){
foreach (Survey_site::get_distance_report($site->id) as $distance){
$rpt.= '<tr>';
$rpt.= '<td><label class="addr">' . $site->address . '</label></td>';
$rpt.= '<td>' . $distance->btstower->name . '</td>';
$rpt.= '<td>' . $distance->distance . '</td>';
$dstn = ($distance->los=='1')?'LOS':'NLOS';
$rpt.= '<td>' . $dstn . '</td>';
$rpt.= '<td></td>';
$rpt.= '</tr>';
}
}

$rpt.= '</tbody>';
$rpt.= '</table>';

$rpt.= '<h1>D. Kebutuhan Instalasi</h1>';
$rpt.= '<h2>1. Material</h2>';
foreach ($client_sites as $site){
$rpt.= '<strong>' . $site->address . '</strong>';
$rpt.= '<table class="report_distance_tables">';
$rpt.= '<thead>';
$rpt.= '<tr><th>No</th><th>Nama</th><th>Banyak/Satuan</th></tr>';
$rpt.= '</thead>';
$rpt.= '<tbody>';
$c = 1;
foreach (Survey_site::get_material_report($site->id) as $material){
$rpt.= '<tr>';
$rpt.= '<td>' . $c . '</td>';
$rpt.= '<td>' . $material->name . '</td>';
$rpt.= '<td>' . $material->amount . '</td>';
$rpt.= '<td></td>';
$rpt.= '</tr>';
$c++;
}
}
$rpt.= '</tbody>';
$rpt.= '</table>';

$rpt.= '<h2>2. Perangkat</h2>';

foreach ($client_sites as $site){

$rpt.= '<table class="report_distance_tables">';
$rpt.= '<thead>';
$rpt.= '<tr><th colspan=3><strong>' . $site->address . '</strong></th></tr>';
$rpt.= '<tr><th>No</th><th>Nama</th><th>Status</th><th>Banyak/Satuan</th></tr>';
$rpt.= '</thead>';
$rpt.= '<tbody>';
$c = 1;
foreach (Survey_site::get_device_report($site->id) as $device){
$rpt.= '<tr>';
$rpt.= '<td>' . $c . '</td>';
$rpt.= '<td>' . $device->name . '</td>';
$stts = ($device->status=='1')?'Dipinjamkan':'Diberikan';
$rpt.= '<td>' . $stts . '</td>';
$rpt.= '<td>' . $device->amount . '</td>';
$rpt.= '<td></td>';
$rpt.= '</tr>';
$c++;
}
}
$rpt.= '</tbody>';
$rpt.= '</table>';

$rpt.= '<h1>E. Resume</h1>';
$rpt.= '<p>' . $textresume . '</p>';
$rpt.= '</html>';
echo $rpt;
/****************************************************************************/

$mpdf=new mPDF();

$stylesheet = file_get_contents(base_url() . 'themes/mytheme/css/back-end.css');

$mpdf->WriteHTML($stylesheet,1);	// The parameter 1 tells that this is css/style only and no body/html/text
$mpdf->WriteHTML($rpt);

$content = $mpdf->Output('', 'S');

$content = chunk_split(base64_encode($content));
$mailto = 'pw.prayitno@gmail.com,pw.prayitno@yahoo.co.id';
$from_name = 'puji wp';
$from_mail = 'puji@padi.net.id';
$replyto = 'puji@padi.net.id';
$uid = md5(uniqid(time()));
$subject = 'Laporan Survey PT Jaya Pozt';
$message = 'Laporan Survey dalam attachment';
$filename = 'padee.pdf';

$header = "From: ".$from_name." <".$from_mail.">\r\n";
$header .= "Reply-To: ".$replyto."\r\n";
$header .= "MIME-Version: 1.0\r\n";
$header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";
$header .= "This is a multi-part message in MIME format.\r\n";
$header .= "--".$uid."\r\n";
$header .= "Content-type:text/plain; charset=iso-8859-1\r\n";
$header .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
$header .= $message."\r\n\r\n";
$header .= "--".$uid."\r\n";
$header .= "Content-Type: application/pdf; name=\"".$filename."\"\r\n";
$header .= "Content-Transfer-Encoding: base64\r\n";
$header .= "Content-Disposition: attachment; filename=\"".$filename."\"\r\n\r\n";
$header .= $content."\r\n\r\n";
$header .= "--".$uid."--";
$is_sent = @mail($mailto, $subject, "", $header);

//$mpdf->Output();


exit;
