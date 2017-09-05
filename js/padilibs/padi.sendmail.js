function sendsurveyrequest(createuser,clientname,status,url,callback){
	var subject = clientname,
	mailpurpose = 'Pengajuan Survey',
	bodytext = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';
	bodytext += '<html xmlns="http://www.w3.org/1999/xhtml">';
	bodytext += '<head>';
	bodytext += '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
	bodytext += '</head>';
	bodytext += '<body yahoo bgcolor="red">';
	bodytext += '<table width="100%" bgcolor="white" border="0" cellpadding="0" cellspacing="0">';
	bodytext += '<tr>';
	bodytext += '<td>';
	bodytext += '<table class="content" align="center" cellpadding="10" cellspacing="0" border="0" width="60%">';
	bodytext += '<thead bgcolor="#FFFF00">';
	bodytext += '<tr>';
	bodytext += '<td>';
	bodytext += '<img src="'+thisdomain+'img/aquarius/logo.png" alt="PadiApp" title="PadiApp"/>';
	bodytext += '</td>';
	bodytext += '</tr>';
	bodytext += '</thead>';
	bodytext += '<tbody bgcolor="#FFFF66" link="white">';
	bodytext += '<tr bgcolor="#FFFF00" color="white">';
	bodytext += '<td>';
	bodytext += '<font color="black">';
	bodytext += 'Pengajuan Survey <span style="font-family: verdana,times, serif; font-size:14pt; font-style:bold"><u>'+ clientname + '</u></span>';
	bodytext += '</font>';
	bodytext += '</td>';
	bodytext += '</tr>';
	bodytext += '<tr bgcolor="#FFFF00" color="white">';
	bodytext += '<td>';
	bodytext += '<font color="black">';
	bodytext += 'Untuk selengkapnya silakan menelusuri tautan di bawah ini : ';
	bodytext += '</font>';
	bodytext += '</td>';
	bodytext += '</tr>';
	bodytext += '<tr bgcolor="#FFFF00" color="white">';
	bodytext += '<td align="center">';
	bodytext += '<font color="black">';
	bodytext += '<u><a href='+ url + '>'+url+'</a></u>';
	bodytext += '</font>';
	bodytext += '</td>';
	bodytext += '</tr>';
	bodytext += '<tr bgcolor="#FFFF00" color="white">';
	bodytext += '<td >';
	bodytext += '<font color="black">';
	bodytext += 'AM : '+createuser+'';
	bodytext += '</font>';
	bodytext += '</td>';
	bodytext += '</tr>';
	bodytext += '</tbody>';
	bodytext += '<tfoot>';
	bodytext += '<tr bgcolor="#CCFFFF">';
	bodytext += '<td align="center">';
	bodytext += '<p style="font-family: arial,times, serif; font-size:11pt; font-style:italic">By PadiApp 2015</p>';
	bodytext += '</td>';
	bodytext += '</tr>';
	bodytext += '</tfoot>';
	bodytext += '</table>';
	bodytext += '</td>';
	bodytext += '</tr>';
	bodytext += '</table>';
	bodytext += '</html>';
	callback(subject+", "+ mailpurpose,bodytext,tsmail,marketingmail);
	//sendemail(subject+", "+ mailpurpose,bodytext,tsmail,marketingmail);
	return true;
}
function sendsurveyresult(createuser,clientname,status,url,reporturl){
	var subject = clientname,
	mailpurpose = 'Hasil Survey',
	bodytext = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';
	bodytext += '<html xmlns="http://www.w3.org/1999/xhtml">';
	bodytext += '<head>';
	bodytext += '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
	bodytext += '</head>';
	bodytext += '<body yahoo bgcolor="white">';
	bodytext += '<table width="100%" bgcolor="white" border="0" cellpadding="0" cellspacing="0">';
	bodytext += '<tr>';
	bodytext += '<td>';
	bodytext += '<table class="content" align="center" cellpadding="10" cellspacing="0" border="0" width="60%" style="font-family:Arial, Helvetica, sans-serif;font-size:13px;">';
	bodytext += '<thead>';
	bodytext += '<tr>';
	bodytext += '<td style="background-color:#ffcc00;">';
	bodytext += '<img src="'+thisdomain+'img/aquarius/logo.png" alt="PadiApp" title="PadiApp"/>';
	bodytext += '</td>';
	bodytext += '</tr>';
	bodytext += '</thead>';
	bodytext += '<tbody>';
	bodytext += '<tr bgcolor="#FFFFFF" color="white">';
	bodytext += '<td>';
	bodytext += '<font color="black">';
	bodytext += 'Hasil Survey untuk:';
	bodytext += '</font>';
	bodytext += '</td>';
	bodytext += '</tr>';
	bodytext += '<tr bgcolor="#FFFFFF" color="white">';
	bodytext += '<td align="center">';
	bodytext += '<font color="black">';
	bodytext += '<span style="font-family: verdana,times, serif; font-size:14pt; font-style:bold;color:#003366">'+ clientname + '</span>';
	bodytext += '</font>';
	bodytext += '</td>';
	bodytext += '</tr>';
	bodytext += '<tr bgcolor="#FFFFFF" color="white">';
	bodytext += '<td align="center">';
	bodytext += '<font color="black">';
	bodytext += '<span style="background-color:#cc0000;color:#fff000;padding:5px 10px;font-weight:bold;">Status : '+status+'</span>';
	bodytext += '</font>';
	bodytext += '</td>';
	bodytext += '</tr>';
	bodytext += '<tr bgcolor="#FFFFFF" color="white">';
	bodytext += '<td align="center">';
	bodytext += '<font color="black">';
	bodytext += '<a href='+ url + ' style="text-decoration:none;padding:5px 10px;color:white;background-color:#000;">Lihat Survey &raquo;</a></u>';
	//bodytext += '<u><a href='+ url + '>Lihat Survey</a></u>';
	bodytext += '</font>';
	bodytext += '</td>';
	bodytext += '</tr>';

	bodytext += '<tr bgcolor="#FFFFFF" color="white">';
	bodytext += '<td align="center">';
	bodytext += '<font color="black">';
	bodytext += '<a href='+ reporturl + ' style="text-decoration:none;padding:5px 10px;color:white;background-color:#000;">Lihat Report &raquo;</a></u>';
	//bodytext += '<u><a href='+ reporturl + '>Lihat Report</a></u>';
	bodytext += '</font>';
	bodytext += '</td>';
	bodytext += '</tr>';

	bodytext += '<tr bgcolor="#FFFFFF" color="white">';
	bodytext += '<td align="right">';
	bodytext += '<font color="black">';
	bodytext += 'Technical Support : '+createuser+'';
	bodytext += '</font>';
	bodytext += '</td>';
	bodytext += '</tr>';
	bodytext += '</tbody>';
	bodytext += '<tfoot>';
	bodytext += '<tr bgcolor="#FFCC00">';
	bodytext += '<td align="center">';
	bodytext += '<p style="font-family: arial,times, serif; font-size:12px; font-style:italic">By PadiApp 2015</p>';
	bodytext += '</td>';
	bodytext += '</tr>';
	bodytext += '</tfoot>';
	bodytext += '</table>';
	bodytext += '</td>';
	bodytext += '</tr>';
	bodytext += '</table>';
	bodytext += '</html>';
	sendemail(subject+", "+ mailpurpose,bodytext,marketingmail,tsmail);
	return true;
}
function sendinstallrequest(createuser,clientname,url,callback){
	var subject = clientname,
	mailpurpose = 'Pengajuan Install',
	bodytext = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';
	bodytext += '<html xmlns="http://www.w3.org/1999/xhtml">';
	bodytext += '<head>';
	bodytext += '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
	bodytext += '</head>';
	bodytext += '<body yahoo bgcolor="red">';
	bodytext += '<table width="100%" bgcolor="white" border="0" cellpadding="0" cellspacing="0">';
	bodytext += '<tr>';
	bodytext += '<td>';
	bodytext += '<table class="content" align="center" cellpadding="10" cellspacing="0" border="0" width="60%">';
	bodytext += '<thead bgcolor="#FFFF00">';
	bodytext += '<tr>';
	bodytext += '<td>';
	bodytext += '<img src="'+thisdomain+'img/aquarius/logo.png" alt="PadiApp" title="PadiApp"/>';
	bodytext += '</td>';
	bodytext += '</tr>';
	bodytext += '</thead>';
	bodytext += '<tbody bgcolor="#FFFF66" link="white">';
	bodytext += '<tr bgcolor="#FFFF00" color="white">';
	bodytext += '<td>';
	bodytext += '<font color="black">';
	bodytext += 'Pengajuan Instalasi <span style="font-family: verdana,times, serif; font-size:14pt; font-style:bold"><u>'+ clientname + '</u></span>';
	bodytext += '</font>';
	bodytext += '</td>';
	bodytext += '</tr>';
	bodytext += '<tr bgcolor="#FFFF00" color="white">';
	bodytext += '<td>';
	bodytext += '<font color="black">';
	bodytext += 'Untuk selengkapnya silakan menelusuri tautan di bawah ini : ';
	bodytext += '</font>';
	bodytext += '</td>';
	bodytext += '</tr>';
	bodytext += '<tr bgcolor="#FFFF00" color="white">';
	bodytext += '<td align="center">';
	bodytext += '<font color="black">';
	bodytext += '<u><a href='+ url + '>'+url+'</a></u>';
	bodytext += '</font>';
	bodytext += '</td>';
	bodytext += '</tr>';
	bodytext += '<tr bgcolor="#FFFF00" color="white">';
	bodytext += '<td >';
	bodytext += '<font color="black">';
	bodytext += 'AM : '+createuser+'';
	bodytext += '</font>';
	bodytext += '</td>';
	bodytext += '</tr>';
	bodytext += '</tbody>';
	bodytext += '<tfoot>';
	bodytext += '<tr bgcolor="#CCFFFF">';
	bodytext += '<td align="center">';
	bodytext += '<p style="font-family: arial,times, serif; font-size:11pt; font-style:italic">By PadiApp 2015</p>';
	bodytext += '</td>';
	bodytext += '</tr>';
	bodytext += '</tfoot>';
	bodytext += '</table>';
	bodytext += '</td>';
	bodytext += '</tr>';
	bodytext += '</table>';
	bodytext += '</html>';
	sendemail(subject+", "+ mailpurpose,bodytext,tsmail,marketingmail);
	//callback(subject+", "+ mailpurpose,bodytext,tsmail,marketingmail);
	return true;
}
function sendsurvey(clientname,status,url){
	var subject = clientname,
	mailpurpose = 'Pengajuan Survey',
	bodytext = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';
	bodytext += '<html xmlns="http://www.w3.org/1999/xhtml">';
	bodytext += '<head>';
	bodytext += '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
	bodytext += '</head>';
	bodytext += '<body yahoo bgcolor="red">';
	bodytext += '<table width="100%" bgcolor="white" border="0" cellpadding="0" cellspacing="0">';
	bodytext += '<tr>';
	bodytext += '<td>';
	bodytext += '<table class="content" align="center" cellpadding="10" cellspacing="0" border="0" width="60%">';
	bodytext += '<thead bgcolor="#FFFF00">';
	bodytext += '<tr>';
	bodytext += '<td>';
	bodytext += '<img src="'+thisdomain+'img/aquarius/logo.png" alt="PadiApp" title="PadiApp"/>';
	bodytext += '</td>';
	bodytext += '</tr>';
	bodytext += '</thead>';

	bodytext += '<tbody bgcolor="#FFFF66" link="white">';

	bodytext += '<tr bgcolor="#FFFF00" color="white">';
	bodytext += '<td>';
	bodytext += '<font color="black">';
	bodytext += 'Pengajuan Survey <span style="font-family: arial,times, serif; font-size:14pt; font-style:bold"><u>'+ clientname + '</u></span>';
	bodytext += '</font>';
	bodytext += '</td>';
	bodytext += '</tr>';

	bodytext += '<tr bgcolor="#FFFF00" color="white">';
	bodytext += '<td>';
	bodytext += '<font color="black">';
	bodytext += 'Status <u>'+ status + '</u>';
	bodytext += '</font>';
	bodytext += '</td>';
	bodytext += '</tr>';

	bodytext += '<tr bgcolor="#FFFF00" color="white">';
	bodytext += '<td >';
	bodytext += '<font color="black">';
	bodytext += 'Aplikasi dapat diakses melalui tautan <u><a href='+ url + '>ini</a></u>';
	bodytext += '</font>';
	bodytext += '</td>';
	bodytext += '</tr>';



	bodytext += '</tbody>';
	bodytext += '<tfoot>';

	bodytext += '<tr bgcolor="#CCFFFF">';
	bodytext += '<td align="center">';
	bodytext += '<p style="font-family: arial,times, serif; font-size:11pt; font-style:italic">By PadiApp 2015</p>';
	bodytext += '</td>';
	bodytext += '</tr>';

	bodytext += '</tfoot>';
	bodytext += '</table>';
	bodytext += '</td>';
	bodytext += '</tr>';
	bodytext += '</table>';
	bodytext += '</html>';
	sendemail(subject+", "+ mailpurpose,bodytext,marketingmail,tsmail);
	return true;
}
function sendinstall(clientname,status,url){
	var subject = clientname,
	mailpurpose = 'Pengajuan Install',
	bodytext = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';
	bodytext += '<html xmlns="http://www.w3.org/1999/xhtml">';
	bodytext += '<head>';
	bodytext += '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
	bodytext += '</head>';
	bodytext += '<body yahoo bgcolor="red">';
	bodytext += '<table width="100%" bgcolor="white" border="0" cellpadding="0" cellspacing="0">';
	bodytext += '<tr>';
	bodytext += '<td>';
	bodytext += '<table class="content" align="center" cellpadding="10" cellspacing="0" border="0" width="60%">';
	bodytext += '<thead bgcolor="#FFFF00">';
	bodytext += '<tr>';
	bodytext += '<td>';
	bodytext += '<img src="'+thisdomain+'img/aquarius/logo.png" alt="PadiApp" title="PadiApp"/>';
	bodytext += '</td>';
	bodytext += '</tr>';
	bodytext += '</thead>';

	bodytext += '<tbody bgcolor="#FFFF66" link="white">';

	bodytext += '<tr bgcolor="#FFFF00" color="white">';
	bodytext += '<td>';
	bodytext += '<font color="black">';
	bodytext += 'Hasil Instalasi <span style="font-family: arial,times, serif; font-size:14pt; font-style:bold"><u>'+ clientname + '</u></span>';
	bodytext += '</font>';
	bodytext += '</td>';
	bodytext += '</tr>';

	bodytext += '<tr bgcolor="#FFFF00" color="white">';
	bodytext += '<td>';
	bodytext += '<font color="black">';
	bodytext += 'Status <u>'+ status + '</u>';
	bodytext += '</font>';
	bodytext += '</td>';
	bodytext += '</tr>';

	bodytext += '<tr bgcolor="#FFFF00" color="white">';
	bodytext += '<td >';
	bodytext += '<font color="black">';
	bodytext += 'Aplikasi dapat diakses melalui tautan <u><a href='+ url + '>ini</a></u>';
	bodytext += '</font>';
	bodytext += '</td>';
	bodytext += '</tr>';



	bodytext += '</tbody>';
	bodytext += '<tfoot>';

	bodytext += '<tr bgcolor="#CCFFFF">';
	bodytext += '<td align="center">';
	bodytext += '<p style="font-family: arial,times, serif; font-size:11pt; font-style:italic">By PadiApp 2015</p>';
	bodytext += '</td>';
	bodytext += '</tr>';

	bodytext += '</tfoot>';
	bodytext += '</table>';
	bodytext += '</td>';
	bodytext += '</tr>';
	bodytext += '</table>';
	bodytext += '</html>';
	sendemail(subject+", "+ mailpurpose,bodytext,marketingmail,tsmail);
	return true;
}
function sendinstallresult(createuser,clientname,status,url,reporturl){
	console.log('send install result');
	var subject = clientname,
	mailpurpose = 'Hasil Install',
	bodytext = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';
	bodytext += '<html xmlns="http://www.w3.org/1999/xhtml">';
	bodytext += '<head>';
	bodytext += '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
	bodytext += '</head>';
	bodytext += '<body yahoo bgcolor="white">';
	bodytext += '<table width="100%" bgcolor="white" border="0" cellpadding="0" cellspacing="0">';
	bodytext += '<tr>';
	bodytext += '<td>';
	bodytext += '<table class="content" align="center" cellpadding="10" cellspacing="0" border="0" width="60%" style="font-family:Arial, Helvetica, sans-serif;font-size:13px;">';
	bodytext += '<thead>';
	bodytext += '<tr>';
	bodytext += '<td style="background-color:#ffcc00;">';
	bodytext += '<img src="'+thisdomain+'img/aquarius/logo.png" alt="PadiApp" title="PadiApp"/>';
	bodytext += '</td>';
	bodytext += '</tr>';
	bodytext += '</thead>';

	bodytext += '<tbody>';

	bodytext += '<tr bgcolor="#FFFFFF" color="white">';
	bodytext += '<td>';
	bodytext += '<font color="black">';
	bodytext += 'Hasil Instalasi untuk:';
	bodytext += '</font>';
	bodytext += '</td>';
	bodytext += '</tr>';
	bodytext += '<tr bgcolor="#FFFFFF" color="white">';
	bodytext += '<td align="center">';
	bodytext += '<font color="black">';
	bodytext += '<span style="font-family: arial,times, serif; font-size:14pt; font-style:bold">'+ clientname + '</span>';
	bodytext += '</font>';
	bodytext += '</td>';
	bodytext += '</tr>';

	bodytext += '<tr bgcolor="#FFFFFF" color="white">';
	bodytext += '<td align="center">';
	bodytext += '<font color="black">';
	bodytext += '<span style="background-color:#cc0000;color:#fff000;padding:5px 10px;font-weight:bold;">Status :'+ status + '</span>';
	bodytext += '</font>';
	bodytext += '</td>';
	bodytext += '</tr>';

	bodytext += '<tr bgcolor="#FFFFFF" color="white">';
	bodytext += '<td align="center">';
	bodytext += '<font color="black">';
	bodytext += '<a href='+ url + ' style="text-decoration:none;padding:5px 10px;color:white;background-color:#000;">Lihat Hasil &raquo;</a></u>';
	bodytext += '</font>';
	bodytext += '</td>';
	bodytext += '</tr>';

	bodytext += '<tr bgcolor="#FFFFFF" color="white">';
	bodytext += '<td align="center">';
	bodytext += '<font color="black">';
	bodytext += '<a href='+ reporturl + ' style="text-decoration:none;padding:5px 10px;color:white;background-color:#000;">Lihat Report &raquo;</a></u>';
	bodytext += '</font>';
	bodytext += '</td>';
	bodytext += '</tr>';
	
	bodytext += '<tr bgcolor="#FFFFFF" color="white">';
	bodytext += '<td align="right">';
	bodytext += '<font color="black">';
	bodytext += 'Technical Support: '+ createuser + '';
	bodytext += '</font>';
	bodytext += '</td>';
	bodytext += '</tr>';



	bodytext += '</tbody>';
	bodytext += '<tfoot>';

	bodytext += '<tr bgcolor="#FFCC00">';
	bodytext += '<td align="center">';
	bodytext += '<p style="font-family: arial,times, serif; font-size:12px; font-style:italic">By PadiApp 2015</p>';
	bodytext += '</td>';
	bodytext += '</tr>';

	bodytext += '</tfoot>';
	bodytext += '</table>';
	bodytext += '</td>';
	bodytext += '</tr>';
	bodytext += '</table>';
	bodytext += '</html>';
	sendemail(subject+", "+ mailpurpose,bodytext,marketingmail,tsmail);
	return true;
}
function sendemail(subject,bodycontent,recipient,copycarbon){
	$.ajax({
		url:thisdomain+"adm/sendnotificationmail",
		data:{
			"recipient":recipient,
			"subject":subject,
			"body":bodycontent,
			"cc":copycarbon
		},
		type:"post",
		async:false
	}).done(function(){
		console.log('sukses');
		return true;
	}).fail(function(){
		console.log('gagal');
		return false;
	});
}
