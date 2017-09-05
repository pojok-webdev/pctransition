<?php
	function newTrialTemplate($clientname,$createuser,$baseurl,$id){
		$bodytext = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';
		$bodytext .= '<html xmlns="http://www.w3.org/1999/xhtml">';
		$bodytext .= '<head>';
		$bodytext .= '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
		$bodytext .= '</head>';
		$bodytext .= '<body yahoo bgcolor="white">';
		$bodytext .= '<table width="100%" bgcolor="white" border="0" cellpadding="0" cellspacing="0">';
		$bodytext .= '<tr>';
		$bodytext .= '<td>';
		$bodytext .= '<table class="content" align="center" cellpadding="10" cellspacing="0" border="0" width="60%">';
		$bodytext .= '<thead>';
		$bodytext .= '<tr>';
		$bodytext .= '<td  style="background-color:#FFCC00">';
		$bodytext .= '<img src="'.$baseurl.'img/aquarius/logo.png" alt="PadiApp" title="PadiApp"/>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';
		$bodytext .= '</thead>';

		$bodytext .= '<tbody>';

		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
		$bodytext .= '<td style="font-family:Arial, Helvetica, sans-serif;font-size:13px;">';
		$bodytext .= '<font color="black">';
		$bodytext .= 'Sebuah Pengajuan Trial dibuat atas nama:';
		$bodytext .= '</font>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';

		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
		$bodytext .= '<td style="text-align:center;">';
		$bodytext .= '<font color="black">';
		$bodytext .= '<span style="font-family: arial,times, serif; font-size:14pt; font-style:bold;color:#003366;">'. $clientname . '</span>';
		$bodytext .= '</font>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';

		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
		$bodytext .= '<td style="text-align:center">';
		$bodytext .= '<font color="black">';
		$bodytext .= '<a href='.$baseurl.'ptrials/edit/'.$id.' style="font-family:Arial, Helvetica, sans-serif;font-size:13px;text-decoration:none;padding:5px 10px;color:white;background-color:#000;">Masuk PadiApp &raquo;</a>';
		$bodytext .= '</font>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';

		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
		$bodytext .= '<td style="text-align:right">';
		$bodytext .= '<font style="font-family:Arial, Helvetica, sans-serif;font-size:12px;">';
		$bodytext .= 'Account manager: <strong>'. $createuser . '</strong>';
		$bodytext .= '</font>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';



		$bodytext .= '</tbody>';
		$bodytext .= '<tfoot>';

		$bodytext .= '<tr>';
		$bodytext .= '<td align="center" style="background-color:#FFCC00">';
		$bodytext .= '<p style="font-family: arial,times, serif; font-size:10px; font-style:italic">By PadiApp 2015</p>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';

		$bodytext .= '</tfoot>';
		$bodytext .= '</table>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';
		$bodytext .= '</table>';
		$bodytext .= '</html>';
		return $bodytext;
	}
	function newTrialRangeNeedApprovalTemplate($clientname,$createuser,$baseurl,$id){
		$doctype = '-//W3C//DTD XHTML 1.0 Transitional//EN';
		$utdurl = 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd';
		$bodytext = '<!DOCTYPE html PUBLIC "'.$doctype.'" "'.$utdurl.'">';
		$bodytext .= '<html xmlns="http://www.w3.org/1999/xhtml">';
		$bodytext .= '<head>';
		$bodytext .= '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
		$bodytext .= '</head>';
		$bodytext .= '<body yahoo bgcolor="white">';
		$bodytext .= '<table width="100%" bgcolor="white" border="0" cellpadding="0" cellspacing="0">';
		$bodytext .= '<tr>';
		$bodytext .= '<td>';
		$bodytext .= '<table class="content" align="center" cellpadding="10" cellspacing="0" border="0" width="60%">';
		$bodytext .= '<thead>';
		$bodytext .= '<tr>';
		$bodytext .= '<td  style="background-color:#FFCC00">';
		$bodytext .= '<img src="'.$baseurl.'img/aquarius/logo.png" alt="PadiApp" title="PadiApp"/>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';
		$bodytext .= '</thead>';

		$bodytext .= '<tbody>';

		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
		$bodytext .= '<td style="font-family:Arial, Helvetica, sans-serif;font-size:13px;">';
		$bodytext .= '<font color="black">';
		$bodytext .= 'Pengajuan Trial berikut ini membutuhkan Approval :';
		$bodytext .= '</font>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';

		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
		$bodytext .= '<td style="text-align:center;">';
		$bodytext .= '<font color="black">';
		$bodytext .= '<span style="font-family: arial,times, serif; font-size:14pt; font-style:bold;color:#003366;">';
		$bodytext .= $clientname;
		$bodytext .= '</span>';
		$bodytext .= '</font>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';

		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
		$bodytext .= '<td style="text-align:center">';
		$bodytext .= '<font color="black">';
		$bodytext .= '<a href='.$baseurl.'ptrials/edit/'.$id.' style="font-family:Arial, Helvetica, sans-serif;font-size:13px;text-decoration:none;padding:5px 10px;color:white;background-color:#000;">Masuk PadiApp &raquo;</a>';
		$bodytext .= '</font>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';

		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
		$bodytext .= '<td style="text-align:right">';
		$bodytext .= '<font style="font-family:Arial, Helvetica, sans-serif;font-size:12px;">';
		$bodytext .= 'Account manager: <strong>'. $createuser . '</strong>';
		$bodytext .= '</font>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';



		$bodytext .= '</tbody>';
		$bodytext .= '<tfoot>';

		$bodytext .= '<tr>';
		$bodytext .= '<td align="center" style="background-color:#FFCC00">';
		$bodytext .= '<p style="font-family: arial,times, serif; font-size:10px; font-style:italic">By PadiApp 2015</p>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';

		$bodytext .= '</tfoot>';
		$bodytext .= '</table>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';
		$bodytext .= '</table>';
		$bodytext .= '</html>';
		return $bodytext;
	}
	function newTrialRangeApprovedTemplate($clientname,$createuser,$baseurl,$id){
		$doctype = '-//W3C//DTD XHTML 1.0 Transitional//EN';
		$utdurl = 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd';
		$bodytext = '<!DOCTYPE html PUBLIC "'.$doctype.'" "'.$utdurl.'">';
		$bodytext .= '<html xmlns="http://www.w3.org/1999/xhtml">';
		$bodytext .= '<head>';
		$bodytext .= '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
		$bodytext .= '</head>';
		$bodytext .= '<body yahoo bgcolor="white">';
		$bodytext .= '<table width="100%" bgcolor="white" border="0" cellpadding="0" cellspacing="0">';
		$bodytext .= '<tr>';
		$bodytext .= '<td>';
		$bodytext .= '<table class="content" align="center" cellpadding="10" cellspacing="0" border="0" width="60%">';
		$bodytext .= '<thead>';
		$bodytext .= '<tr>';
		$bodytext .= '<td  style="background-color:#FFCC00">';
		$bodytext .= '<img src="'.$baseurl.'img/aquarius/logo.png" alt="PadiApp" title="PadiApp"/>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';
		$bodytext .= '</thead>';

		$bodytext .= '<tbody>';

		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
		$bodytext .= '<td style="font-family:Arial, Helvetica, sans-serif;font-size:13px;">';
		$bodytext .= '<font color="black">';
		$bodytext .= 'Pengajuan Trial berikut ini telah di Approve :';
		$bodytext .= '</font>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';

		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
		$bodytext .= '<td style="text-align:center;">';
		$bodytext .= '<font color="black">';
		$bodytext .= '<span style="font-family: arial,times, serif; font-size:14pt; font-style:bold;color:#003366;">';
		$bodytext .= $clientname;
		$bodytext .= '</span>';
		$bodytext .= '</font>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';

		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
		$bodytext .= '<td style="text-align:center">';
		$bodytext .= '<font color="black">';
		$bodytext .= '<a href='.$baseurl.'ptrials/edit/'.$id.' style="font-family:Arial, Helvetica, sans-serif;font-size:13px;text-decoration:none;padding:5px 10px;color:white;background-color:#000;">Masuk PadiApp &raquo;</a>';
		$bodytext .= '</font>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';

		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
		$bodytext .= '<td style="text-align:right">';
		$bodytext .= '<font style="font-family:Arial, Helvetica, sans-serif;font-size:12px;">';
		$bodytext .= 'Account manager: <strong>'. $createuser . '</strong>';
		$bodytext .= '</font>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';



		$bodytext .= '</tbody>';
		$bodytext .= '<tfoot>';

		$bodytext .= '<tr>';
		$bodytext .= '<td align="center" style="background-color:#FFCC00">';
		$bodytext .= '<p style="font-family: arial,times, serif; font-size:10px; font-style:italic">By PadiApp 2015</p>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';

		$bodytext .= '</tfoot>';
		$bodytext .= '</table>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';
		$bodytext .= '</table>';
		$bodytext .= '</html>';
		return $bodytext;
	}

	function trialCancelTemplate($clientname,$createuser,$baseurl,$id){
		$bodytext = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';
		$bodytext .= '<html xmlns="http://www.w3.org/1999/xhtml">';
		$bodytext .= '<head>';
		$bodytext .= '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
		$bodytext .= '</head>';
		$bodytext .= '<body yahoo bgcolor="white">';
		$bodytext .= '<table width="100%" bgcolor="white" border="0" cellpadding="0" cellspacing="0">';
		$bodytext .= '<tr>';
		$bodytext .= '<td>';
		$bodytext .= '<table class="content" align="center" cellpadding="10" cellspacing="0" border="0" width="60%">';
		$bodytext .= '<thead>';
		$bodytext .= '<tr>';
		$bodytext .= '<td  style="background-color:#FFCC00">';
		$bodytext .= '<img src="'.$baseurl.'img/aquarius/logo.png" alt="PadiApp" title="PadiApp"/>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';
		$bodytext .= '</thead>';

		$bodytext .= '<tbody>';

		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
		$bodytext .= '<td style="font-family:Arial, Helvetica, sans-serif;font-size:13px;">';
		$bodytext .= '<font color="black">';
		$bodytext .= 'Trial atas nama:';
		$bodytext .= '</font>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';

		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
		$bodytext .= '<td style="text-align:center;">';
		$bodytext .= '<font color="black">';
		$bodytext .= '<span style="font-family: arial,times, serif; font-size:14pt; font-style:bold;color:#003366;">'. $clientname . '</span>';
		$bodytext .= '</font>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';

		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
		$bodytext .= '<td style="text-align:center;">';
		$bodytext .= '<font color="black">';
		$bodytext .= 'telah dibatalkan. Silakan kunjungi pada tautan berikut: ';
		$bodytext .= '</font>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';

		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
		$bodytext .= '<td style="text-align:center">';
		$bodytext .= '<font color="black">';
		$bodytext .= '<a href='.$baseurl.'ptrials/ style="font-family:Arial, Helvetica, sans-serif;font-size:13px;text-decoration:none;padding:5px 10px;color:white;background-color:#000;">PadiApp &raquo;</a>';
		$bodytext .= '</font>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';


		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
		$bodytext .= '<td style="text-align:right">';
		$bodytext .= '<font style="font-family:Arial, Helvetica, sans-serif;font-size:12px;">';
		$bodytext .= 'Account manager: <strong>'. $createuser . '</strong>';
		$bodytext .= '</font>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';



		$bodytext .= '</tbody>';
		$bodytext .= '<tfoot>';

		$bodytext .= '<tr>';
		$bodytext .= '<td align="center" style="background-color:#FFCC00">';
		$bodytext .= '<p style="font-family: arial,times, serif; font-size:10px; font-style:italic">By PadiApp 2015</p>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';

		$bodytext .= '</tfoot>';
		$bodytext .= '</table>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';
		$bodytext .= '</table>';
		$bodytext .= '</html>';
		return $bodytext;
	}

	function trialReminderTemplate($clientname,$createuser,$baseurl,$id){
		$bodytext = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';
		$bodytext .= '<html xmlns="http://www.w3.org/1999/xhtml">';
		$bodytext .= '<head>';
		$bodytext .= '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
		$bodytext .= '</head>';
		$bodytext .= '<body yahoo bgcolor="white">';
		$bodytext .= '<table width="100%" bgcolor="white" border="0" cellpadding="0" cellspacing="0">';
		$bodytext .= '<tr>';
		$bodytext .= '<td>';
		$bodytext .= '<table class="content" align="center" cellpadding="10" cellspacing="0" border="0" width="60%">';
		$bodytext .= '<thead>';
		$bodytext .= '<tr>';
		$bodytext .= '<td  style="background-color:#FFCC00">';
		$bodytext .= '<img src="'.$baseurl.'img/aquarius/logo.png" alt="PadiApp" title="PadiApp"/>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';
		$bodytext .= '</thead>';

		$bodytext .= '<tbody>';

		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
		$bodytext .= '<td style="text-align:center;font-family:Arial, Helvetica, sans-serif;font-size:13px;">';
		$bodytext .= '<font color="black">';
		$bodytext .= 'Trial atas nama:';
		$bodytext .= '</font>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';

		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
		$bodytext .= '<td style="text-align:center;">';
		$bodytext .= '<font color="black">';
		$bodytext .= '<span style="font-family: arial,times, serif; font-size:14pt; font-style:bold;color:#003366;">'. $clientname . '</span>';
		$bodytext .= '</font>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';

		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
		$bodytext .= '<td style="text-align:center;font-family:Arial, Helvetica, sans-serif;font-size:13px;">';
		$bodytext .= '<font color="black">';
		$bodytext .= 'akan segera berakhir besok. Silakan ditindak lanjuti pada padiApp pada tautan berikut: ';
		$bodytext .= '</font>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';

		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
		$bodytext .= '<td style="text-align:center">';
		$bodytext .= '<font color="black">';
		$bodytext .= '<a href='.$baseurl.'ptrials/fu/'.$id.' style="font-family:Arial, Helvetica, sans-serif;font-size:13px;text-decoration:none;padding:5px 10px;color:white;background-color:#000;">Tindak Lanjut Trial &raquo;</a>';
		$bodytext .= '</font>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';


		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
		$bodytext .= '<td style="text-align:right">';
		$bodytext .= '<font style="font-family:Arial, Helvetica, sans-serif;font-size:12px;">';
		$bodytext .= 'Account manager: <strong>'. $createuser . '</strong>';
		$bodytext .= '</font>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';



		$bodytext .= '</tbody>';
		$bodytext .= '<tfoot>';

		$bodytext .= '<tr>';
		$bodytext .= '<td align="center" style="background-color:#FFCC00">';
		$bodytext .= '<p style="font-family: arial,times, serif; font-size:10px; font-style:italic">By PadiApp 2015</p>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';

		$bodytext .= '</tfoot>';
		$bodytext .= '</table>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';
		$bodytext .= '</table>';
		$bodytext .= '</html>';
		return $bodytext;
	}

	function trialReminderTemplate1($clientname,$createuser,$baseurl,$id){
		$bodytext = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';
		$bodytext .= '<html xmlns="http://www.w3.org/1999/xhtml">';
		$bodytext .= '<head>';
		$bodytext .= '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
		$bodytext .= '</head>';
		$bodytext .= '<body yahoo bgcolor="white">';
		$bodytext .= '<table width="100%" bgcolor="white" border="0" cellpadding="0" cellspacing="0">';
		$bodytext .= '<tr>';
		$bodytext .= '<td>';
		$bodytext .= '<table class="content" align="center" cellpadding="10" cellspacing="0" border="0" width="60%">';
		$bodytext .= '<thead>';
		$bodytext .= '<tr>';
		$bodytext .= '<td  style="background-color:#FFCC00">';
		$bodytext .= '<img src="'.$baseurl.'img/aquarius/logo.png" alt="PadiApp" title="PadiApp"/>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';
		$bodytext .= '</thead>';

		$bodytext .= '<tbody>';

		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
		$bodytext .= '<td style="text-align:center;font-family:Arial, Helvetica, sans-serif;font-size:13px;">';
		$bodytext .= '<font color="black">';
		$bodytext .= 'Trial atas nama:';
		$bodytext .= '</font>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';

		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
		$bodytext .= '<td style="text-align:center;">';
		$bodytext .= '<font color="black">';
		$bodytext .= '<span style="font-family: arial,times, serif; font-size:14pt; font-style:bold;color:#003366;">'. $clientname . '</span>';
		$bodytext .= '</font>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';

		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
		$bodytext .= '<td style="text-align:center;font-family:Arial, Helvetica, sans-serif;font-size:13px;">';
		$bodytext .= '<font color="black">';
		$bodytext .= 'jadwal trial akan  dimulai 15 Menit lagi. Silakan ditindak lanjuti dengan memilih tindakan sebagai berikut: ';
		$bodytext .= '</font>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';

		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
		$bodytext .= '<td style="text-align:center">';
		$bodytext .= '<font color="black">';
		$bodytext .= '<a href='.$baseurl.'ptrials/fu/'.$id.' style="font-family:Arial, Helvetica, sans-serif;font-size:13px;text-decoration:none;padding:5px 10px;color:white;background-color:#000;">Tindak Lanjuti Trial &raquo;</a>';
		$bodytext .= '</font>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';

		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
		$bodytext .= '<td style="text-align:right">';
		$bodytext .= '<font style="font-family:Arial, Helvetica, sans-serif;font-size:12px;">';
		$bodytext .= 'Account manager: <strong>'. $createuser . '</strong>';
		$bodytext .= '</font>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';

		$bodytext .= '</tbody>';
		$bodytext .= '<tfoot>';

		$bodytext .= '<tr>';
		$bodytext .= '<td align="center" style="background-color:#FFCC00">';
		$bodytext .= '<p style="font-family: arial,times, serif; font-size:10px; font-style:italic">By PadiApp 2015</p>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';

		$bodytext .= '</tfoot>';
		$bodytext .= '</table>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';
		$bodytext .= '</table>';
		$bodytext .= '</html>';
		return $bodytext;
	}
	function trialReminderTemplate2($clientname,$createuser,$baseurl,$id){
		$bodytext = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';
		$bodytext .= '<html xmlns="http://www.w3.org/1999/xhtml">';
		$bodytext .= '<head>';
		$bodytext .= '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
		$bodytext .= '</head>';
		$bodytext .= '<body yahoo bgcolor="white">';
		$bodytext .= '<table width="100%" bgcolor="white" border="0" cellpadding="0" cellspacing="0">';
		$bodytext .= '<tr>';
		$bodytext .= '<td>';
		$bodytext .= '<table class="content" align="center" cellpadding="10" cellspacing="0" border="0" width="60%">';
		$bodytext .= '<thead>';
		$bodytext .= '<tr>';
		$bodytext .= '<td  style="background-color:#FFCC00">';
		$bodytext .= '<img src="'.$baseurl.'img/aquarius/logo.png" alt="PadiApp" title="PadiApp"/>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';
		$bodytext .= '</thead>';

		$bodytext .= '<tbody>';

		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
		$bodytext .= '<td style="text-align:center;font-family:Arial, Helvetica, sans-serif;font-size:13px;">';
		$bodytext .= '<font color="black">';
		$bodytext .= 'Trial atas nama:';
		$bodytext .= '</font>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';

		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
		$bodytext .= '<td style="text-align:center;">';
		$bodytext .= '<font color="black">';
		$bodytext .= '<span style="font-family: arial,times, serif; font-size:14pt; font-style:bold;color:#003366;">'. $clientname . '</span>';
		$bodytext .= '</font>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';

		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
		$bodytext .= '<td style="text-align:center;font-family:Arial, Helvetica, sans-serif;font-size:13px;">';
		$bodytext .= '<font color="black">';
		$bodytext .= 'akan segera berakhir 15 Menit lagi. Silakan ditindak lanjuti dengan memilih tindakan sebagai berikut: ';
		$bodytext .= '</font>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';

		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
		$bodytext .= '<td style="text-align:center">';
		$bodytext .= '<font color="black">';
		$bodytext .= '<a href='.$baseurl.'ptrials/followup/'.$id.' style="font-family:Arial, Helvetica, sans-serif;font-size:13px;text-decoration:none;padding:5px 10px;color:white;background-color:#000;">Tindak Lanjuti Trial &raquo;</a>';
		$bodytext .= '</font>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';

		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
		$bodytext .= '<td style="text-align:right">';
		$bodytext .= '<font style="font-family:Arial, Helvetica, sans-serif;font-size:12px;">';
		$bodytext .= 'Account manager: <strong>'. $createuser . '</strong>';
		$bodytext .= '</font>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';

		$bodytext .= '</tbody>';
		$bodytext .= '<tfoot>';

		$bodytext .= '<tr>';
		$bodytext .= '<td align="center" style="background-color:#FFCC00">';
		$bodytext .= '<p style="font-family: arial,times, serif; font-size:10px; font-style:italic">By PadiApp 2015</p>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';

		$bodytext .= '</tfoot>';
		$bodytext .= '</table>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';
		$bodytext .= '</table>';
		$bodytext .= '</html>';
		return $bodytext;
	}
	function trialReminderTemplate3($clientname,$createuser,$baseurl,$id){
		$bodytext = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';
		$bodytext .= '<html xmlns="http://www.w3.org/1999/xhtml">';
		$bodytext .= '<head>';
		$bodytext .= '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
		$bodytext .= '</head>';
		$bodytext .= '<body yahoo bgcolor="white">';
		$bodytext .= '<table width="100%" bgcolor="white" border="0" cellpadding="0" cellspacing="0">';
		$bodytext .= '<tr>';
		$bodytext .= '<td>';
		$bodytext .= '<table class="content" align="center" cellpadding="10" cellspacing="0" border="0" width="60%">';
		$bodytext .= '<thead>';
		$bodytext .= '<tr>';
		$bodytext .= '<td  style="background-color:#FFCC00">';
		$bodytext .= '<img src="'.$baseurl.'img/aquarius/logo.png" alt="PadiApp" title="PadiApp"/>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';
		$bodytext .= '</thead>';

		$bodytext .= '<tbody>';

		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
		$bodytext .= '<td style="text-align:center;font-family:Arial, Helvetica, sans-serif;font-size:13px;">';
		$bodytext .= '<font color="black">';
		$bodytext .= 'Trial atas nama:';
		$bodytext .= '</font>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';

		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
		$bodytext .= '<td style="text-align:center;">';
		$bodytext .= '<font color="black">';
		$bodytext .= '<span style="font-family: arial,times, serif; font-size:14pt; font-style:bold;color:#003366;">'. $clientname . '</span>';
		$bodytext .= '</font>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';

		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
		$bodytext .= '<td style="text-align:center;font-family:Arial, Helvetica, sans-serif;font-size:13px;">';
		$bodytext .= '<font color="black">';
		$bodytext .= 'trial akan berakhir besok. Silakan ditindak lanjuti dengan memilih tindakan sebagai berikut: ';
		$bodytext .= '</font>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';

		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
		$bodytext .= '<td style="text-align:center">';
		$bodytext .= '<font color="black">';
		$bodytext .= '<a href='.$baseurl.'ptrials/fu/'.$id.' style="font-family:Arial, Helvetica, sans-serif;font-size:13px;text-decoration:none;padding:5px 10px;color:white;background-color:#000;">Tindak Lanjuti Trial &raquo;</a>';
		$bodytext .= '</font>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';

		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
		$bodytext .= '<td style="text-align:right">';
		$bodytext .= '<font style="font-family:Arial, Helvetica, sans-serif;font-size:12px;">';
		$bodytext .= 'Account manager: <strong>'. $createuser . '</strong>';
		$bodytext .= '</font>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';

		$bodytext .= '</tbody>';
		$bodytext .= '<tfoot>';

		$bodytext .= '<tr>';
		$bodytext .= '<td align="center" style="background-color:#FFCC00">';
		$bodytext .= '<p style="font-family: arial,times, serif; font-size:10px; font-style:italic">By PadiApp 2015</p>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';

		$bodytext .= '</tfoot>';
		$bodytext .= '</table>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';
		$bodytext .= '</table>';
		$bodytext .= '</html>';
		return $bodytext;
	}

	function closeTicketTemplate($clientname,$createuser,$baseurl,$id,$kdticket){
		$bodytext = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';
		$bodytext .= '<html xmlns="http://www.w3.org/1999/xhtml">';
		$bodytext .= '<head>';
		$bodytext .= '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
		$bodytext .= '</head>';
		$bodytext .= '<body yahoo bgcolor="white">';
		$bodytext .= '<table width="100%" bgcolor="white" border="0" cellpadding="0" cellspacing="0">';
		$bodytext .= '<tr>';
		$bodytext .= '<td>';
		$bodytext .= '<table class="content" align="center" cellpadding="10" cellspacing="0" border="0" width="60%">';
		$bodytext .= '<thead>';
		$bodytext .= '<tr>';
		$bodytext .= '<td  style="background-color:#FFCC00">';
		$bodytext .= '<img src="'.$baseurl.'img/aquarius/logo.png" alt="PadiApp" title="PadiApp"/>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';
		$bodytext .= '</thead>';

		$bodytext .= '<tbody>';

		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
		$bodytext .= '<td style="font-family:Arial, Helvetica, sans-serif;font-size:13px;">';
		$bodytext .= '<font color="black">';
		$bodytext .= 'Ticket atas nama:';
		$bodytext .= '</font>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';

		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
		$bodytext .= '<td style="text-align:center;">';
		$bodytext .= '<font color="black">';
		$bodytext .= '<span style="font-family: arial,times, serif; font-size:14pt; font-style:bold;color:#003366;">'. $clientname . '</span>';
		$bodytext .= '</font>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';

		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
		$bodytext .= '<td style="font-family:Arial, Helvetica, sans-serif;font-size:13px;text-align:center">';
		$bodytext .= '<font color="black">';
		$bodytext .= 'Telah ditutup';
		$bodytext .= '</font>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';

		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
		$bodytext .= '<td style="text-align:center">';
		$bodytext .= '<font color="black">';
		$bodytext .= '<a href='.$baseurl.'tickets/filter/'.$id.' style="font-family:Arial, Helvetica, sans-serif;font-size:13px;text-decoration:none;padding:5px 10px;color:white;background-color:#000;">Masuk PadiApp &raquo;</a>';
		$bodytext .= '</font>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';

		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
		$bodytext .= '<td style="text-align:right">';
		$bodytext .= '<font style="font-family:Arial, Helvetica, sans-serif;font-size:12px;">';
		$bodytext .= 'Technical Support: <strong>'. $createuser . '</strong>';
		$bodytext .= '</font>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';



		$bodytext .= '</tbody>';
		$bodytext .= '<tfoot>';

		$bodytext .= '<tr>';
		$bodytext .= '<td align="center" style="background-color:#FFCC00">';
		$bodytext .= '<p style="font-family: arial,times, serif; font-size:10px; font-style:italic">By PadiApp 2015</p>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';

		$bodytext .= '</tfoot>';
		$bodytext .= '</table>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';
		$bodytext .= '</table>';
		$bodytext .= '</html>';
		return $bodytext;
	}

	function trialExtendTemplate($clientname,$createuser,$baseurl,$id,$extendreason){
		$bodytext = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';
		$bodytext .= '<html xmlns="http://www.w3.org/1999/xhtml">';
		$bodytext .= '<head>';
		$bodytext .= '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
		$bodytext .= '</head>';
		$bodytext .= '<body yahoo bgcolor="white">';
		$bodytext .= '<table width="100%" bgcolor="white" border="0" cellpadding="0" cellspacing="0">';
		$bodytext .= '<tr>';
		$bodytext .= '<td>';
		$bodytext .= '<table class="content" align="center" cellpadding="10" cellspacing="0" border="0" width="60%">';
		$bodytext .= '<thead>';
		$bodytext .= '<tr>';
		$bodytext .= '<td  style="background-color:#FFCC00">';
		$bodytext .= '<img src="'.$baseurl.'img/aquarius/logo.png" alt="PadiApp" title="PadiApp"/>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';
		$bodytext .= '</thead>';

		$bodytext .= '<tbody>';

		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
		$bodytext .= '<td style="font-family:Arial, Helvetica, sans-serif;font-size:13px;">';
		$bodytext .= '<font color="black">';
		$bodytext .= 'Trial atas nama:';
		$bodytext .= '</font>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';

		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
		$bodytext .= '<td style="text-align:center;">';
		$bodytext .= '<font color="black">';
		$bodytext .= '<span style="font-family: arial,times, serif; font-size:14pt; font-style:bold;color:#003366;">'. $clientname . '</span>';
		$bodytext .= '</font>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';

		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
		$bodytext .= '<td style="text-align:center;">';
		$bodytext .= '<font color="black">';
		$bodytext .= 'akan diperpanjang, dengan alasan '.$extendreason.'. Selengkapnya silakan kunjungi pada tautan berikut: ';
		$bodytext .= '</font>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';

		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
		$bodytext .= '<td style="text-align:center">';
		$bodytext .= '<font color="black">';
		$bodytext .= '<a href='.$baseurl.'ptrials/ style="font-family:Arial, Helvetica, sans-serif;font-size:13px;text-decoration:none;padding:5px 10px;color:white;background-color:#000;">PadiApp &raquo;</a>';
		$bodytext .= '</font>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';


		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
		$bodytext .= '<td style="text-align:right">';
		$bodytext .= '<font style="font-family:Arial, Helvetica, sans-serif;font-size:12px;">';
		$bodytext .= 'Account manager: <strong>'. $createuser . '</strong>';
		$bodytext .= '</font>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';



		$bodytext .= '</tbody>';
		$bodytext .= '<tfoot>';

		$bodytext .= '<tr>';
		$bodytext .= '<td align="center" style="background-color:#FFCC00">';
		$bodytext .= '<p style="font-family: arial,times, serif; font-size:10px; font-style:italic">By PadiApp 2015</p>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';

		$bodytext .= '</tfoot>';
		$bodytext .= '</table>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';
		$bodytext .= '</table>';
		$bodytext .= '</html>';
		return $bodytext;
	}

	function trialJoinTemplate($clientname,$createuser,$baseurl,$id){
		$bodytext = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';
		$bodytext .= '<html xmlns="http://www.w3.org/1999/xhtml">';
		$bodytext .= '<head>';
		$bodytext .= '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
		$bodytext .= '</head>';
		$bodytext .= '<body yahoo bgcolor="white">';
		$bodytext .= '<table width="100%" bgcolor="white" border="0" cellpadding="0" cellspacing="0">';
		$bodytext .= '<tr>';
		$bodytext .= '<td>';
		$bodytext .= '<table class="content" align="center" cellpadding="10" cellspacing="0" border="0" width="60%">';
		$bodytext .= '<thead>';
		$bodytext .= '<tr>';
		$bodytext .= '<td  style="background-color:#FFCC00">';
		$bodytext .= '<img src="'.$baseurl.'img/aquarius/logo.png" alt="PadiApp" title="PadiApp"/>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';
		$bodytext .= '</thead>';

		$bodytext .= '<tbody>';

		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
		$bodytext .= '<td style="font-family:Arial, Helvetica, sans-serif;font-size:13px;">';
		$bodytext .= '<font color="black">';
		$bodytext .= 'Trial atas nama:';
		$bodytext .= '</font>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';

		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
		$bodytext .= '<td style="text-align:center;">';
		$bodytext .= '<font color="black">';
		$bodytext .= '<span style="font-family: arial,times, serif; font-size:14pt; font-style:bold;color:#003366;">'. $clientname . '</span>';
		$bodytext .= '</font>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';

		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
		$bodytext .= '<td style="text-align:center;">';
		$bodytext .= '<font color="black">';
		$bodytext .= 'telah bergabung. Selanjutnya untuk mengaktifkan pelanggan silakan kunjungi pada tautan berikut: ';
		$bodytext .= '</font>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';

		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
		$bodytext .= '<td style="text-align:center">';
		$bodytext .= '<font color="black">';
		$bodytext .= '<a href='.$baseurl.'clients/activate/'.$id.' style="font-family:Arial, Helvetica, sans-serif;font-size:13px;text-decoration:none;padding:5px 10px;color:white;background-color:#000;">PadiApp &raquo;</a>';
		$bodytext .= '</font>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';


		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
		$bodytext .= '<td style="text-align:right">';
		$bodytext .= '<font style="font-family:Arial, Helvetica, sans-serif;font-size:12px;">';
		$bodytext .= 'Account manager: <strong>'. $createuser . '</strong>';
		$bodytext .= '</font>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';



		$bodytext .= '</tbody>';
		$bodytext .= '<tfoot>';

		$bodytext .= '<tr>';
		$bodytext .= '<td align="center" style="background-color:#FFCC00">';
		$bodytext .= '<p style="font-family: arial,times, serif; font-size:10px; font-style:italic">By PadiApp 2015</p>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';

		$bodytext .= '</tfoot>';
		$bodytext .= '</table>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';
		$bodytext .= '</table>';
		$bodytext .= '</html>';
		return $bodytext;
	}

	function endTrialTemplate($clientname,$createuser,$baseurl,$id,$kdticket){
		$bodytext = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';
		$bodytext .= '<html xmlns="http://www.w3.org/1999/xhtml">';
		$bodytext .= '<head>';
		$bodytext .= '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
		$bodytext .= '</head>';
		$bodytext .= '<body yahoo bgcolor="white">';
		$bodytext .= '<table width="100%" bgcolor="white" border="0" cellpadding="0" cellspacing="0">';
		$bodytext .= '<tr>';
		$bodytext .= '<td>';
		$bodytext .= '<table class="content" align="center" cellpadding="10" cellspacing="0" border="0" width="60%">';
		$bodytext .= '<thead>';
		$bodytext .= '<tr>';
		$bodytext .= '<td  style="background-color:#FFCC00">';
		$bodytext .= '<img src="'.$baseurl.'img/aquarius/logo.png" alt="PadiApp" title="PadiApp"/>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';
		$bodytext .= '</thead>';

		$bodytext .= '<tbody>';

		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
		$bodytext .= '<td style="font-family:Arial, Helvetica, sans-serif;font-size:13px;">';
		$bodytext .= '<font color="black">';
		$bodytext .= 'Tim TS,<br />';
		$bodytext .= 'Masa Trial pelanggan berikut akan berakhir dalam 1 hari:';
		$bodytext .= '</font>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';

		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
		$bodytext .= '<td style="text-align:center;">';
		$bodytext .= '<font color="black">';
		$bodytext .= '<span style="font-family: arial,times, serif; font-size:14pt; font-style:bold;color:#003366;">'. $clientname . '</span>';
		$bodytext .= '</font>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';

		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
		$bodytext .= '<td style="text-align:center">';
		$bodytext .= '<font color="black">';
		$bodytext .= '<a href='.$baseurl.'tickets/filter/'.$id.' style="font-family:Arial, Helvetica, sans-serif;font-size:13px;text-decoration:none;padding:5px 10px;color:white;background-color:#000;">Masuk PadiApp &raquo;</a>';
		$bodytext .= '</font>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';

		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
		$bodytext .= '<td style="text-align:right">';
		$bodytext .= '<font style="font-family:Arial, Helvetica, sans-serif;font-size:12px;">';
		$bodytext .= '</font>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';



		$bodytext .= '</tbody>';
		$bodytext .= '<tfoot>';

		$bodytext .= '<tr>';
		$bodytext .= '<td align="center" style="background-color:#FFCC00">';
		$bodytext .= '<p style="font-family: arial,times, serif; font-size:10px; font-style:italic">By PadiApp 2015</p>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';

		$bodytext .= '</tfoot>';
		$bodytext .= '</table>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';
		$bodytext .= '</table>';
		$bodytext .= '</html>';
		return $bodytext;
	}
	
	function mailtemplate($ticket_id,$clientname){
		$subject = $clientname;
		$mailpurpose = 'Reminder';
		$bodytext = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';
		$bodytext .= '<html xmlns="http://www.w3.org/1999/xhtml">';
		$bodytext .= '<head>';
		$bodytext .= '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
		$bodytext .= '</head>';
		$bodytext .= '<body yahoo bgcolor="white">';
		$bodytext .= '<table width="100%" bgcolor="white" border="0" cellpadding="0" cellspacing="0">';
		$bodytext .= '<tr>';
		$bodytext .= '<td>';
		$bodytext .= '<table class="content" align="center" cellpadding="10" cellspacing="0" border="0" width="60%">';
		$bodytext .= '<thead>';
		$bodytext .= '<tr>';
		$bodytext .= '<td style="background-color:#FFCC00">';
		$bodytext .= '<img src="'.base_url().'img/aquarius/logo.png" alt="PadiApp" title="PadiApp"/>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';
		$bodytext .= '</thead>';
		$bodytext .= '<tbody>';
		$bodytext .= '<tr>';
		$bodytext .= '<td style="font-family:Arial, Helvetica, sans-serif;font-size:13px;">';
		$bodytext .= '<font color="black">';
		$bodytext .= 'Semua Troubleshoot dengan kode <span style="font-family: verdana,times, serif; font-size:14pt; font-style:bold;color:#003366"><u>'. $clientname . '</u></span> telah terselesaikan.<br />';
		$bodytext .= 'Maka ticket dengan nomer '. $clientname .' sudah siap untuk ditutup  ';
		$bodytext .= '</font>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';
		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
		$bodytext .= '<td style="text-align:center;font-family:Arial, Helvetica, sans-serif;font-size:13px;">';
		$bodytext .= '<font color="black">';
		$bodytext .= '<a href='.$this->config->item('baseurl').'tickets/filter/'.$ticket_id.' style="text-decoration:none;padding:5px 10px;color:white;background-color:#000;">Akses Ticket &raquo;</a>';
		$bodytext .= '</font>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';
		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
		$bodytext .= '<td align="center" style="font-family:Arial, Helvetica, sans-serif;font-size:13px;">';
		$bodytext .= '<font color="black">';
		
		$bodytext .= '</font>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';
		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
		$bodytext .= '<td style="font-family:Arial, Helvetica, sans-serif;font-size:13px;">';
		$bodytext .= '<font color="black">';
		$bodytext .= 'PadiApp - Troubleshoot';
		$bodytext .= '</font>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';
		$bodytext .= '</tbody>';
		$bodytext .= '<tfoot>';
		$bodytext .= '<tr>';
		$bodytext .= '<td align="center" style="background-color:#FFCC00">';
		$bodytext .= '<p style="font-family: arial,times,serif;font-style: italic;font-size:10px;">By PadiApp 2015</p>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';
		$bodytext .= '</tfoot>';
		$bodytext .= '</table>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';
		$bodytext .= '</table>';
		$bodytext .= '</html>';	
		return $bodytext;	
	}
	
	function installResulttTemplate($clientname,$createuser,$baseurl,$id,$status,$client_site_id){
		$bodytext = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';
		$bodytext .= '<html xmlns="http://www.w3.org/1999/xhtml">';
		$bodytext .= '<head>';
		$bodytext .= '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
		$bodytext .= '</head>';
		$bodytext .= '<body yahoo bgcolor="white">';
		$bodytext .= '<table width="100%" bgcolor="white" border="0" cellpadding="0" cellspacing="0">';
		$bodytext .= '<tr>';
		$bodytext .= '<td>';
		$bodytext .= '<table class="content" align="center" cellpadding="10" cellspacing="0" border="0" width="60%">';
		$bodytext .= '<thead>';
		$bodytext .= '<tr>';
		$bodytext .= '<td style="background-color:#FFCC00">';
		$bodytext .= '<img src="'.$baseurl.'img/aquarius/logo.png" alt="PadiApp" title="PadiApp"/>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';
		$bodytext .= '</thead>';
		$bodytext .= '<tbody>';
		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
		$bodytext .= '<td style="font-family:Arial, Helvetica, sans-serif;font-size:13px;">';
		$bodytext .= '<font color="black">';
		$bodytext .= 'Hasil Instalasi untuk:';
		$bodytext .= '</font>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';
		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
		$bodytext .= '<td style="text-align:center;">';
		$bodytext .= '<span style="font-family: arial,times,serif; font-size: 14pt;font-weight:bold; color:#003366">'. $clientname . '</span>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';
		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
		$bodytext .= '<td style="text-align:center;">';
		$bodytext .= '<span style="font-family: arial,times,serif; font-size: 14pt;font-weight:bold; color:#003366">'. $status . '</span>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';
		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
		$bodytext .= '<td align="center"  style="font-family:Arial, Helvetica, sans-serif;font-size:13px;">';
		$bodytext .= '<font color="black">';
		$bodytext .= 'Untuk selengkapnya silakan menelusuri tautan di bawah ini : ';
		$bodytext .= '</font>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';
		
		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
		$bodytext .= '<td align="center">';
		$bodytext .= '<font color="black" style="font-family:Arial, Helvetica, sans-serif;font-size:13px;">';
		$bodytext .= '<a href='.$baseurl. 'install_requests/edit/'.$id.'  style="font-family:Arial, Helvetica, sans-serif;font-size:13px;text-decoration:none;padding:5px 10px;color:white;background-color:#000;">Lihat di PadiApp &raquo;</a>';
		$bodytext .= '</font>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';
		
		
		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
		$bodytext .= '<td align="center">';
		$bodytext .= '<font color="black" style="font-family:Arial, Helvetica, sans-serif;font-size:13px;">';
		$bodytext .= '<a href='.$baseurl. 'install_requests/showreport2/'.$id.'  style="font-family:Arial, Helvetica, sans-serif;font-size:13px;text-decoration:none;padding:5px 10px;color:white;background-color:#000;">Lihat Report &raquo;</a>';
		$bodytext .= '</font>';
		
		$bodytext .= '&nbsp; atau &nbsp;';
		
		$bodytext .= '<font color="black" style="font-family:Arial, Helvetica, sans-serif;font-size:13px;">';
		$bodytext .= '<a href='.$baseurl.'ptrials/add2/'.$client_site_id.' style="font-family:Arial, Helvetica, sans-serif;font-size:13px;text-decoration:none;padding:5px 10px;color:white;background-color:#000;">Tambahkan ke Trial &raquo;</a>';
		$bodytext .= '</font>';

		$bodytext .= '</td>';
		$bodytext .= '</tr>';
		
		
		
		
		
		
		
		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
		$bodytext .= '<td style="text-align:right;">';
		$bodytext .= '<font style="font-family:Arial, Helvetica, sans-serif;font-size:12px;">';
		$bodytext .= 'Account Manager: <strong>'.$createuser.'</strong>';
		$bodytext .= '</font>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';
		$bodytext .= '</tbody>';
		$bodytext .= '<tfoot>';
		$bodytext .= '<tr>';
		$bodytext .= '<td align="center" style="background-color:#FFCC00">';
		$bodytext .= '<p style="font-family: arial,times, serif; font-size:10px; font-style:italic">By PadiApp 2015</p>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';
		$bodytext .= '</tfoot>';
		$bodytext .= '</table>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';
		$bodytext .= '</table>';
		$bodytext .= '</html>';
		return $bodytext;
	}

	function installRequestTemplate($clientname,$createuser,$baseurl,$id){
		$bodytext = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';
		$bodytext .= '<html xmlns="http://www.w3.org/1999/xhtml">';
		$bodytext .= '<head>';
		$bodytext .= '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
		$bodytext .= '</head>';
		$bodytext .= '<body yahoo bgcolor="white">';
		$bodytext .= '<table width="100%" bgcolor="white" border="0" cellpadding="0" cellspacing="0">';
		$bodytext .= '<tr>';
		$bodytext .= '<td>';
		$bodytext .= '<table class="content" align="center" cellpadding="10" cellspacing="0" border="0" width="60%">';
		$bodytext .= '<thead>';
		$bodytext .= '<tr>';
		$bodytext .= '<td style="background-color:#FFCC00">';
		$bodytext .= '<img src="'.$baseurl.'img/aquarius/logo.png" alt="PadiApp" title="PadiApp"/>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';
		$bodytext .= '</thead>';
		$bodytext .= '<tbody>';
		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
		$bodytext .= '<td style="font-family:Arial, Helvetica, sans-serif;font-size:13px;">';
		$bodytext .= '<font color="black">';
		$bodytext .= 'Pengajuan Instalasi untuk:';
		$bodytext .= '</font>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';
		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
		$bodytext .= '<td style="text-align:center;">';
		$bodytext .= '<span style="font-family: arial,times,serif; font-size: 14pt;font-weight:bold; color:#003366">'. $clientname . '</span>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';
		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
		$bodytext .= '<td style="font-family:Arial, Helvetica, sans-serif;font-size:13px;">';
		$bodytext .= '<font color="black">';
		$bodytext .= 'Untuk selengkapnya silakan menelusuri tautan di bawah ini : ';
		$bodytext .= '</font>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';
		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
		$bodytext .= '<td align="center">';
		$bodytext .= '<font color="black" style="font-family:Arial, Helvetica, sans-serif;font-size:13px;">';
		$bodytext .= '<a href='.$baseurl. 'install_requests/edit/'.$id.'  style="font-family:Arial, Helvetica, sans-serif;font-size:13px;text-decoration:none;padding:5px 10px;color:white;background-color:#000;">Lihat di PadiApp &raquo;</a>';
		$bodytext .= '</font>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';
		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
		$bodytext .= '<td style="text-align:right;">';
		$bodytext .= '<font style="font-family:Arial, Helvetica, sans-serif;font-size:12px;">';
		$bodytext .= 'Account Manager: <strong>'.$createuser.'</strong>';
		$bodytext .= '</font>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';
		$bodytext .= '</tbody>';
		$bodytext .= '<tfoot>';
		$bodytext .= '<tr>';
		$bodytext .= '<td align="center" style="background-color:#FFCC00">';
		$bodytext .= '<p style="font-family: arial,times, serif; font-size:10px; font-style:italic">By PadiApp 2015</p>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';
		$bodytext .= '</tfoot>';
		$bodytext .= '</table>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';
		$bodytext .= '</table>';
		$bodytext .= '</html>';
		return $bodytext;
	}

	function surveyResultTemplate($clientname,$createuser,$baseurl,$id,$status,$am){
		$subject = $clientname;
		$mailpurpose = 'Reminder';
		$bodytext = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';
		$bodytext .= '<html xmlns="http://www.w3.org/1999/xhtml">';
		$bodytext .= '<head>';
		$bodytext .= '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
		$bodytext .= '</head>';
		$bodytext .= '<body yahoo bgcolor="white">';
		$bodytext .= '<table width="100%" bgcolor="white" border="0" cellpadding="0" cellspacing="0">';
		$bodytext .= '<tr>';
		$bodytext .= '<td>';
		$bodytext .= '<table class="content" align="center" cellpadding="10" cellspacing="0" border="0" width="60%">';
		$bodytext .= '<thead>';
		$bodytext .= '<tr>';
		$bodytext .= '<td style="background-color:#FFCC00">';
		$bodytext .= '<img src="'.$baseurl.'img/aquarius/logo.png" alt="PadiApp" title="PadiApp"/>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';
		$bodytext .= '</thead>';
		$bodytext .= '<tbody>';
		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
		$bodytext .= '<td style="font-family:Arial, Helvetica, sans-serif;font-size:13px;">';
		$bodytext .= '<font color="black">';
		$bodytext .= 'Hasil Survey untuk:';
		$bodytext .= '</font>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';
		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
		$bodytext .= '<td align="center">';
		$bodytext .= '<font color="black">';
		$bodytext .= '<span style="font-family: arial,times,serif; font-size: 14pt;font-weight:bold; color:#003366"">'. $clientname . '</span>';
		$bodytext .= '</font>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';
		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
		$bodytext .= '<td align="center">';
		$bodytext .= '<font color="black">';
		$bodytext .= '<span style="font-family: arial,times,serif; font-size: 14pt;font-weight:bold; color:#003366"">'. $status . '</span>';
		$bodytext .= '</font>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';
		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
		$bodytext .= '<td style="font-family:Arial, Helvetica, sans-serif;font-size:13px;">';
		$bodytext .= '<font color="black">';
		$bodytext .= 'Untuk selengkapnya silakan menelusuri tautan di bawah ini : ';
		$bodytext .= '</font>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';
		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
		$bodytext .= '<td align="center">';
		$bodytext .= '<font color="black" style="font-family:Arial, Helvetica, sans-serif;font-size:13px;">';
		$bodytext .= '<u><a style="text-decoration:none;padding:5px 10px;color:white;background-color:#000;" href=' . $baseurl . 'surveys/edit/'.$id.'>Lihat Survey</a></u>';
		$bodytext .= '</font>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';
		
		
		

			
		
		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
		$bodytext .= '<td align="center">';
		$bodytext .= '<font color="black" style="font-family:Arial, Helvetica, sans-serif;font-size:13px;">';
		$bodytext .= '<u><a  style="text-decoration:none;padding:5px 10px;color:white;background-color:#000;" href=' . $baseurl . 'surveys/showreport/'.$id.'>Laporan Survey</a></u>';
		$bodytext .= '</font>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';
		
		
		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';

		$bodytext .= '<td style="text-align:right;">';
		$bodytext .= '<font style="font-family:Arial, Helvetica, sans-serif;font-size:12px;">';
		$bodytext .= 'AM: <strong>'.$am.'<strong>, ';
		$bodytext .= '</font>';

		$bodytext .= '<font style="font-family:Arial, Helvetica, sans-serif;font-size:12px;">';
		$bodytext .= 'TS: <strong>'.$createuser.'<strong>';
		$bodytext .= '</font>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';
		$bodytext .= '</tbody>';
		$bodytext .= '<tfoot>';
		$bodytext .= '<tr>';
		$bodytext .= '<td align="center" style="background-color:#FFCC00">';
		$bodytext .= '<p style="font-family: arial,times, serif; font-size:10px; font-style:italic">By PadiApp 2015</p>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';
		$bodytext .= '</tfoot>';
		$bodytext .= '</table>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';
		$bodytext .= '</table>';
		$bodytext .= '</html>';
		return $bodytext;	
	}
	
	function surveyRequestTemplate($clientname,$createuser,$baseurl,$id){
		$subject = $clientname;
		$mailpurpose = 'Reminder';
		$bodytext = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';
		$bodytext .= '<html xmlns="http://www.w3.org/1999/xhtml">';
		$bodytext .= '<head>';
		$bodytext .= '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
		$bodytext .= '</head>';
		$bodytext .= '<body yahoo bgcolor="white">';
		$bodytext .= '<table width="100%" bgcolor="white" border="0" cellpadding="0" cellspacing="0">';
		$bodytext .= '<tr>';
		$bodytext .= '<td>';
		$bodytext .= '<table class="content" align="center" cellpadding="10" cellspacing="0" border="0" width="60%">';
		$bodytext .= '<thead>';
		$bodytext .= '<tr>';
		$bodytext .= '<td style="background-color:#FFCC00">';
		$bodytext .= '<img src="'.$baseurl.'img/aquarius/logo.png" alt="PadiApp" title="PadiApp"/>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';
		$bodytext .= '</thead>';
		$bodytext .= '<tbody>';
		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
		$bodytext .= '<td style="font-family:Arial, Helvetica, sans-serif;font-size:13px;">';
		$bodytext .= '<font color="black">';
		$bodytext .= 'Pengajuan Survey untuk:';
		$bodytext .= '</font>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';
		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
		$bodytext .= '<td align="center">';
		$bodytext .= '<font color="black">';
		$bodytext .= '<span style="font-family: arial,times,serif; font-size: 14pt;font-weight:bold; color:#003366"">'. $clientname . '</span>';
		$bodytext .= '</font>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';
		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
		$bodytext .= '<td style="font-family:Arial, Helvetica, sans-serif;font-size:13px;text-align:center">';
		$bodytext .= '<font color="black">';
		$bodytext .= 'Untuk selengkapnya silakan menelusuri tautan di bawah ini : ';
		$bodytext .= '</font>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';
		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
		$bodytext .= '<td align="center">';
		$bodytext .= '<font color="black" style="font-family:Arial, Helvetica, sans-serif;font-size:13px;">';
		$bodytext .= '<a href=' . $baseurl . 'surveys/edit/'.$id.'  style="font-family:Arial, Helvetica, sans-serif;font-size:13px;text-decoration:none;padding:5px 10px;color:white;background-color:#000;">Lihat di PadiApp</a>';
		$bodytext .= '</font>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';
		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
		$bodytext .= '<td style="text-align:right;">';
		$bodytext .= '<font style="font-family:Arial, Helvetica, sans-serif;font-size:12px;">';
		$bodytext .= 'Account Manager: <strong>'.$createuser.'<strong>';
		$bodytext .= '</font>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';
		$bodytext .= '</tbody>';
		$bodytext .= '<tfoot>';
		$bodytext .= '<tr>';
		$bodytext .= '<td align="center" style="background-color:#FFCC00">';
		$bodytext .= '<p style="font-family: arial,times, serif; font-size:10px; font-style:italic">By PadiApp 2015</p>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';
		$bodytext .= '</tfoot>';
		$bodytext .= '</table>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';
		$bodytext .= '</table>';
		$bodytext .= '</html>';
		return $bodytext;	
	}

	function ticketTemplate($clientname,$createuser,$baseurl,$id,$kdticket){
		$bodytext = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';
		$bodytext .= '<html xmlns="http://www.w3.org/1999/xhtml">';
		$bodytext .= '<head>';
		$bodytext .= '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
		$bodytext .= '</head>';
		$bodytext .= '<body yahoo bgcolor="white">';
		$bodytext .= '<table width="100%" bgcolor="white" border="0" cellpadding="0" cellspacing="0">';
		$bodytext .= '<tr>';
		$bodytext .= '<td>';
		$bodytext .= '<table class="content" align="center" cellpadding="10" cellspacing="0" border="0" width="60%">';
		$bodytext .= '<thead>';
		$bodytext .= '<tr>';
		$bodytext .= '<td  style="background-color:#FFCC00">';
		$bodytext .= '<img src="'.$baseurl.'img/aquarius/logo.png" alt="PadiApp" title="PadiApp"/>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';
		$bodytext .= '</thead>';

		$bodytext .= '<tbody>';

		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
		$bodytext .= '<td style="font-family:Arial, Helvetica, sans-serif;font-size:13px;">';
		$bodytext .= '<font color="black">';
		$bodytext .= 'Sebuah ticket baru dibuat atas nama:';
		$bodytext .= '</font>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';

		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
		$bodytext .= '<td style="text-align:center;">';
		$bodytext .= '<font color="black">';
		$bodytext .= '<span style="font-family: arial,times, serif; font-size:14pt; font-style:bold;color:#003366;">'. $clientname . '</span>';
		$bodytext .= '</font>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';

		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
		$bodytext .= '<td style="text-align:center">';
		$bodytext .= '<font color="black">';
		$bodytext .= '<a href='.$baseurl.'tickets/filter/'.$id.' style="font-family:Arial, Helvetica, sans-serif;font-size:13px;text-decoration:none;padding:5px 10px;color:white;background-color:#000;">Masuk PadiApp &raquo;</a>';
		$bodytext .= '</font>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';

		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
		$bodytext .= '<td style="text-align:right">';
		$bodytext .= '<font style="font-family:Arial, Helvetica, sans-serif;font-size:12px;">';
		$bodytext .= 'Technical Support: <strong>'. $createuser . '</strong>';
		$bodytext .= '</font>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';



		$bodytext .= '</tbody>';
		$bodytext .= '<tfoot>';

		$bodytext .= '<tr>';
		$bodytext .= '<td align="center" style="background-color:#FFCC00">';
		$bodytext .= '<p style="font-family: arial,times, serif; font-size:10px; font-style:italic">By PadiApp 2015</p>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';

		$bodytext .= '</tfoot>';
		$bodytext .= '</table>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';
		$bodytext .= '</table>';
		$bodytext .= '</html>';
		return $bodytext;
	}

	function troubleshootFinishedTemplate($kdticket,$ticket_id){
		$bodytext = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';
		$bodytext .= '<html xmlns="http://www.w3.org/1999/xhtml">';
		$bodytext .= '<head>';
		$bodytext .= '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
		$bodytext .= '</head>';
		$bodytext .= '<body yahoo bgcolor="white">';
		$bodytext .= '<table width="100%" bgcolor="white" border="0" cellpadding="0" cellspacing="0">';
		$bodytext .= '<tr>';
		$bodytext .= '<td>';
		$bodytext .= '<table class="content" align="center" cellpadding="10" cellspacing="0" border="0" width="60%">';
		$bodytext .= '<thead>';
		$bodytext .= '<tr>';
		$bodytext .= '<td style="background-color:#FFCC00">';
		$bodytext .= '<img src="'.base_url().'img/aquarius/logo.png" alt="PadiApp" title="PadiApp"/>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';
		$bodytext .= '</thead>';
		$bodytext .= '<tbody>';
		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
		$bodytext .= '<td style="font-family:Arial, Helvetica, sans-serif;font-size:13px;">';
		$bodytext .= '<font color="black">';
		$bodytext .= 'Troubleshoot dengan kode ticket:';
		$bodytext .= '</font>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';
		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
		$bodytext .= '<td style="text-align:center;">';
		$bodytext .= '<span style="font-family: arial,times,serif; font-size: 14pt;font-weight:bold; color:#003366">'. $kdticket . '</span>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';
		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
		$bodytext .= '<td style="font-family:Arial, Helvetica, sans-serif;font-size:13px;">';
		$bodytext .= '<font color="black">';
		$bodytext .= 'Sudah selesai. Untuk menutup ticket silakan menelusuri tautan di bawah ini : ';
		$bodytext .= '</font>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';
		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
		$bodytext .= '<td align="center">';
		$bodytext .= '<font color="black" style="font-family:Arial, Helvetica, sans-serif;font-size:13px;">';
		$bodytext .= '<u><a href='.base_url().'tickets/filter/'.$ticket_id.' style="text-decoration:none;padding:5px 10px;color:white;background-color:#000;">Akses Ticket &raquo;</a></u>';
		$bodytext .= '</font>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';
		$bodytext .= '</tbody>';
		$bodytext .= '<tfoot>';
		$bodytext .= '<tr>';
		$bodytext .= '<td align="center" style="background-color:#FFCC00">';
		$bodytext .= '<p style="font-family: arial,times, serif; font-size:10px; font-style:italic">By PadiApp 2016</p>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';
		$bodytext .= '</tfoot>';
		$bodytext .= '</table>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';
		$bodytext .= '</table>';
		$bodytext .= '</html>';
		return $bodytext;
	}

	function maintenanceTemplate($id,$clientname){
		$baseurl = "https://database.padinet.com/";
		$bodytext = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';
		$bodytext .= '<html xmlns="http://www.w3.org/1999/xhtml">';
		$bodytext .= '<head>';
		$bodytext .= '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
		$bodytext .= '</head>';
		$bodytext .= '<body yahoo bgcolor="white">';
		$bodytext .= '<table width="100%" bgcolor="white" border="0" cellpadding="0" cellspacing="0">';
		$bodytext .= '<tr>';
		$bodytext .= '<td>';
		$bodytext .= '<table class="content" align="center" cellpadding="10" cellspacing="0" border="0" width="60%">';
		$bodytext .= '<thead>';
		$bodytext .= '<tr>';
		$bodytext .= '<td  style="background-color:#FFCC00">';
		$bodytext .= '<img src="'.$baseurl.'img/aquarius/logo.png" alt="PadiApp" title="PadiApp"/>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';
		$bodytext .= '</thead>';

		$bodytext .= '<tbody>';

		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
		$bodytext .= '<td style="font-family:Arial, Helvetica, sans-serif;font-size:13px;">';
		$bodytext .= '<font color="black">';
		$bodytext .= 'Sebuah reminder maintenance baru dibuat atas nama:';
		$bodytext .= '</font>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';

		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
		$bodytext .= '<td style="text-align:center;">';
		$bodytext .= '<font color="black">';
		$bodytext .= '<span style="font-family: arial,times, serif; font-size:14pt; font-style:bold;color:#003366;">'. $clientname . '</span>';
		$bodytext .= '</font>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';

		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
		$bodytext .= '<td style="text-align:center">';
		$bodytext .= '<font color="black">';
		$bodytext .= '<a href="'.$baseurl.'maintenancereports/edit/'.$id.'" style="font-family:Arial, Helvetica, sans-serif;font-size:13px;text-decoration:none;padding:5px 10px;color:white;background-color:#000;">Masuk PadiApp &raquo;</a>';
		$bodytext .= '</font>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';

		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
		$bodytext .= '<td style="text-align:right">';
		$bodytext .= '<font style="font-family:Arial, Helvetica, sans-serif;font-size:12px;">';
		$bodytext .= 'sent by <strong>Reminder PadiApp</strong>';
		$bodytext .= '</font>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';



		$bodytext .= '</tbody>';
		$bodytext .= '<tfoot>';

		$bodytext .= '<tr>';
		$bodytext .= '<td align="center" style="background-color:#FFCC00">';
		$bodytext .= '<p style="font-family: arial,times, serif; font-size:10px; font-style:italic">By PadiApp 2015</p>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';

		$bodytext .= '</tfoot>';
		$bodytext .= '</table>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';
		$bodytext .= '</table>';
		$bodytext .= '</html>';
		return $bodytext;
	}
	function disconnectionTemplate($id,$clientname,$sales,$baseurl){
		$baseurl = "http://padi-customer/";
		$bodytext = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';
		$bodytext .= '<html xmlns="http://www.w3.org/1999/xhtml">';
		$bodytext .= '<head>';
		$bodytext .= '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
		$bodytext .= '</head>';
		$bodytext .= '<body yahoo bgcolor="white">';
		$bodytext .= '<table width="100%" bgcolor="white" border="0" cellpadding="0" cellspacing="0">';
		$bodytext .= '<tr>';
		$bodytext .= '<td>';
		$bodytext .= '<table class="content" align="center" cellpadding="10" cellspacing="0" border="0" width="60%">';
		$bodytext .= '<thead>';
		$bodytext .= '<tr>';
		$bodytext .= '<td  style="background-color:#FFCC00">';
		$bodytext .= '<img src="'.$baseurl.'img/aquarius/logo.png" alt="PadiApp" title="PadiApp"/>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';
		$bodytext .= '</thead>';

		$bodytext .= '<tbody>';

		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
		$bodytext .= '<td style="font-family:Arial, Helvetica, sans-serif;font-size:13px;">';
		$bodytext .= '<font color="black">';
		$bodytext .= 'Sebuah pengajuan diskoneksi baru dibuat atas nama:';
		$bodytext .= '</font>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';

		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
		$bodytext .= '<td style="text-align:center;">';
		$bodytext .= '<font color="black">';
		$bodytext .= '<span style="font-family: arial,times, serif; font-size:14pt; font-style:bold;color:#003366;">'. $clientname . '</span>';
		$bodytext .= '</font>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';

		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
		$bodytext .= '<td style="text-align:center">';
		$bodytext .= '<font color="black">';
		$bodytext .= '<a href="'.$baseurl.'disconnections/edit/'.$id.'" style="font-family:Arial, Helvetica, sans-serif;font-size:13px;text-decoration:none;padding:5px 10px;color:white;background-color:#000;">Masuk PadiApp &raquo;</a>';
		$bodytext .= '</font>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';

		$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
		$bodytext .= '<td style="text-align:right">';
		$bodytext .= '<font style="font-family:Arial, Helvetica, sans-serif;font-size:12px;">';
		$bodytext .= 'sent by <strong>Reminder PadiApp</strong>';
		$bodytext .= '</font>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';



		$bodytext .= '</tbody>';
		$bodytext .= '<tfoot>';

		$bodytext .= '<tr>';
		$bodytext .= '<td align="center" style="background-color:#FFCC00">';
		$bodytext .= '<p style="font-family: arial,times, serif; font-size:10px; font-style:italic">By PadiApp 2017</p>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';

		$bodytext .= '</tfoot>';
		$bodytext .= '</table>';
		$bodytext .= '</td>';
		$bodytext .= '</tr>';
		$bodytext .= '</table>';
		$bodytext .= '</html>';
		return $bodytext;
	}
