/*
 * WRITTEN BY PUJI W PRAYITNO
 * 062015
 * mailto:puji@padi.net.id
 * */
//var tTicket = $("#tbl_ticket").dataTable({"aaSorting":[[0,'desc']],"oSearch":{"sSearch":urlsegment(3)}}),allowToCloseTicket = false;

var tTicket = $("#tbl_ticket").dataTable({"aaSorting":[[0,'desc']]}),allowToCloseTicket = false;
console.log('tickets invoked');

$('.hist_description').click(function(){
	console.log('DESCRUOTUOO',this.attr('ticket_id'));
});

$('.btnhelp').click(function(){
	if($('#bcExp').is(":visible")){
		$('#bcExp').fadeOut(200);
	}else{
		$('#bcExp').fadeIn(200);
	}
});
$.ajax({
	url:thisdomain+'tickets/get_obj_by_id/'+urlsegment(3),
	dataType:'json'
}).done(function(tckt){
	tTicket.fnFilter(tckt.kdticket);
});
$('#btnCleanFilter').click(function(){
	console.log('clear filter invoked');
	tTicket.fnFilter("");
});
checkOkReq = function(){
	var notok = false;
	$('.okreq').each(function(){
		//if((!this.value.length) || ($('#confirmationresult').val().length === 4) || ($('.okreq').val().length===4)){
		/*
		 * sebagai permintaan TS Mei 2016, hasil konfirmasi tidak dijadikan mandatori
		 * */
		/*if((!this.value.length) || ($('#confirmationresult').val().length === 0)){
			console.log('false 1',$('#confirmationresult').val().length);
			notok = true;
		}*/
		if((!this.value.length) || ($('#fuDescription').val().length === 0)){
			console.log('false 1',$('#confirmationresult').val().length);
			notok = true;
		}
		if((!this.value.length) || ($('#followUpPIC').val().length === 0)){
			console.log('false 1',$('#followUpPIC').val().length);
			notok = true;
		}
		if((!this.value.length) || ($('#picPosition').val().length === 0)){
			console.log('false 1',$('#picPosition').val().length);
			notok = true;
		}
		if($('#solusi').val().length === 4){
			console.log('false 2',$('#solusi').val().length);
			notok = true;
		}
		if($('#followUpDate').val().length === 0){
			console.log('false 3',$('#followUpDate').val().length);
			console.log('the empty',$(this).attr('id'));
			notok = true;
		}
		if($('#cause').val() === '0'){
			console.log('false 4',$('#cause').val());
			console.log('cause is pilihlah',$(this).attr('id'));
			notok = true;
		}
	});
	if (notok){
		return false;
	}else{
		return true;
	}
}
$('#cause').change(function(){
	console.log('CAUSE',$('#cause :selected').text());
	switch($('#cause :selected').text()){
		case 'Lainnya':
			$('#dothercouse').show();
			$('#othercause').addClass('inp_ticket');
			$('#cause').removeClass('inp_ticket');
		break;
		default:
			$('#dothercouse').hide();
			$('#othercause').removeClass('inp_ticket');
			$('#cause').addClass('inp_ticket');
		break;
	}
});
checkBelumOkReq = function(){
			console.log('solusi false 2',$('.myeditor').cleditor()[0].length);
	var notbelumok = false;
	$('.okreq').each(function(){
		if($('#fuDescription').val().length === 4){
			notbelumok = true;
		}
		if($('#followUpDate').val().length === 0){
			console.log('the empty',$(this).attr('id'));
			notbelumok = true;
		}
		if($('#cause').val() === 0){
			console.log('cause is pilihlah',$(this).attr('id'));
			notbelumok = true;
		}
	});
	if (notbelumok){
		return false;
	}else{
		return true;
	}
}
checkBelumBisaDihubungiReq = function(){
	var not_oke = false;
	$('.okreq').each(function(){
		this.focus();
	});
	if($('#picPosition').val().length===0){
		console.log('pic position belum diisi');
		not_oke = true;
	}
	if($('#followUpPIC').val().length===0){
		console.log('followup pic belum diisi');
		not_oke = true;
	}
	if($('#fuDescription').val().length === 0){
		console.log('fuDescription belum diisi');
		not_oke = true;
	}
	if(($('#fuDescription').val().length === 4) && ($('#fuDescription').val() === '<br>')){
		console.log('fuDescription belum diisi');
		not_oke = true;
	}
	if($('#solusi').val().length === 0){
		console.log('solusi a belum diisi');
		not_oke = true;
	}
	if(($('#solusi').val().length === 4) && ($('#solusi').val() === '<br>')){
		console.log('solusi b belum diisi');
		not_oke = true;
	}
	if($('#followUpDate').val().length === 0){
		console.log('followupdate belum diisi');
		not_oke = true;
	}
	if($('#cause').val() === '0'){
		console.log('cause is pilihlah',$(this).attr('id'));
		not_oke = true;
	}
	if (not_oke){
		console.log('false');
		return false;
	}else{
		console.log('true');
		return true;
	}
}
cleanInput = function(){
	setTimeout(function(){
		$('#followUpPIC').val("");
		$('#picPosition').val("");
		$('#picPhone').val("");
		$('#fuDescription').attr("value","").blur();
		$('#confirmationresult').val("").blur();
		$('#solusi').val("").blur();
		$('#datepicker').val("");
		$('#followUpDate').val("");
		$('#futs').val("");
		$('#fute').val("");
		$('#followUpHour').val("00");
		$('#futsh').val("00");
		$('#futsm').val("00");
		$('#futeh').val("00");
		$('#futem').val("00");
		$('#followUpMinute').val("00");
		$('#dFollowUp').find('#fuDescription').val('');
		$('#cause').val(0);
		$('#othercouse').val("");
		console.log('fuDescription',$('#fuDescription').val());
		console.log('fuDescription',$('#fuDescription').val());
		console.log('solusi',$('#solusi').val());
		console.log('confirmationresult',$('#confirmationresult').val());
	},0);
}
$("#btnaddticket").click(function(){
	//populateAllCombos($("#requesttype"));
	$('#autocomplete-pelanggan').val('');
	$('#autocomplete-backbone').val('');
	$('#autocomplete-bts').val('');
	$('#autocomplete-datacenter').val('');
	$("#dAddTicket").modal();
});
$('#btnHistory').click(function(){
	var mytr = $('#tbl_ticket').find('tbody tr.selected'),
		clientname = mytr.find('td.clientname').html(),
		id = mytr.attr('thisid'),
		kdticket = mytr.find('td.kdticket').html();
	showFollowupHistory(clientname,id,kdticket);
});
$('#btn_saveupstream').click(function(){
		$('#upstreamtable tbody tr').each(function(){
			console.log($(this).attr('thisid'));
		});	
});
$("#btnsaveticket").click(function () {
	$(".inp_ticket").makekeyvalparam();
	console.log('inp_ticket',$(".inp_ticket").attr('keyval'));
	$.ajax({
		url: thisdomain + 'tickets/save',
		data: JSON.parse('{' + $(".inp_ticket").attr("keyval") + ',"clientname":"' + $("#client_id :selected").text() + '","downtimestart":"0000-00-00 00:00:00","downtimeend":"0000-00-00 00:00:00"}'),
		type: 'post',
		async: false
	}).fail(function () {
		console.log('Tidak dapat menyimpan data, silakan hubungi Developer');
	}).done(function (data) {
		$.ajax({
			url: thisdomain + 'tickets/get_obj_by_id/' + data,
			type: 'get',
			async: false,
			dataType: 'json',
		}).done(function (newticket) {
			var subject = '[[PadiApp]] Notifikasi Ticket Baru',
			mailpurpose = 'Ticket Baru dibuat',
			clientname = $("#client_id :selected").text(),
			url = thisdomain+'tickets',
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
			bodytext += 'Sebuah ticket baru dibuat atas nama <span style="font-family: arial,times, serif; font-size:14pt; font-style:bold"><u>'+ clientname + '</u></span>';
			bodytext += '</font>';
			bodytext += '</td>';
			bodytext += '</tr>';

			bodytext += '<tr bgcolor="#FFFF00" color="white">';
			bodytext += '<td>';
			bodytext += '<font color="black">';
			bodytext += '<u></u>';
			bodytext += '</font>';
			bodytext += '</td>';
			bodytext += '</tr>';

			bodytext += '<tr bgcolor="#FFFF00" color="white">';
			bodytext += '<td >';
			bodytext += '<font color="black">';
			bodytext += 'Aplikasi dapat diakses melalui tautan <u><a href='+ url + '/filter/'+data+'>ini</a></u>';
			bodytext += '</font>';
			bodytext += '</td>';
			bodytext += '</tr>';
			
			bodytext += '<tr bgcolor="#FFFF00" color="white">';
			bodytext += '<td >';
			bodytext += '<font color="black">';
			bodytext += 'TS : '+ $('#createuser').val() + '';
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
			sendmail(tsmail,"Pemberitahuan ticket baru",bodytext,developermail);

//			sendmail(recipient,subject,bodycontent,copycarbon);
			updateRecordRow();
			$('#dAddTicket').modal('hide');
		});
		console.log('query',data);
	});
});
sendmail = function(recipient,subject,bodycontent,copycarbon){
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
$('#request_type').change(function(){
				var _this = $(this);
				myref = _this.find("option:selected").text();
				console.log(_this.val());
			});
$("#requesttype").change(function(){
	populateAllCombos($(this));
});
$('#tbl_ticket').on('click', 'tr .btnfollowup', function () {
	$("#tbl_ticket").find("tbody tr").removeClass("selected");
	$(this).stairUp({level: 4}).addClass("selected");
	var id = $('#tbl_ticket tbody tr.selected').attr('thisid');
	var kdticket = $('#tbl_ticket tbody tr.selected td:first').html();
	var clientname = $('#tbl_ticket tbody tr.selected td.clientname').html();
	$('#btnCloseTicket').attr('myid', id);
	$('#btnCloseTicket').prop('disabled', true);
	$('#btnProgress').prop('disabled', true);
	$('#followUpModalLabel').text("Follow Up : " + clientname + ' (' + kdticket + ')');
	cleanInput();
	$.ajax({
		url:thisdomain+'tickets/get_obj_by_id/'+$("#tbl_ticket tbody tr.selected").attr("thisid"),
		type:'get',
		dataType:'json'
	}).done(function(data){
		var causereguler=false;
		console.log('DATA',data);
		console.log('CAUSE',data.cause);
		$('#cause option').each(function(opt){
			console.log('TEXT',$(this).text());
			if($(this).text()===data.cause){
				causereguler=true;
			}
		});
		if(causereguler===true){
			$('#cause').addClass('inp_ticket');
			$('#cause').show();
			$('#dothercouse').hide();
			$('#othercause').removeClass('inp_ticket');
			$('#cause').select_text(data.cause);
		}else{
			$('#cause').removeClass('inp_ticket');
			$('#cause').val('17');
			$('#dothercouse').show();
			$('#othercause').addClass('inp_ticket');
			$('#othercause').val(data.cause);
		}
		var startdate = data.downtimestart.split(" ");
		daydate = startdate[0].split("-");
		//console.log('data pelapor',data.reporter+' '+data.reporterphone);
		$('#reporter').html(data.reporter);
		$('#reporterphone').html(data.reporterphone);
		$("#futs").val(daydate[2]+"/"+daydate[1]+"/"+daydate[0]);
		daytime = startdate[1].split(":");
		$("#futsh option").each(function(){
			if($(this).val()===daytime[0]){
				$(this).attr("selected","selected");
			}
		});
		$("#futsm option").each(function(){
			if($(this).val()===daytime[1]){
				$(this).attr("selected","selected");
			}
		});
		var enddate = data.downtimeend.split(" ");
		daydate = enddate[0].split("-");
		$("#fute").val(daydate[2]+"/"+daydate[1]+"/"+daydate[0]);
		daytime = startdate[1].split(":");
		$("#futse option").each(function(){
			if($(this).val()===daytime[0]){
				$(this).attr("selected","selected");
			}
		});
		$("#futse option").each(function(){
			if($(this).val()===daytime[1]){
				$(this).attr("selected","selected");
			}
		});
		$('#ticketcontent').html(data.complaint);
		if(data.is_ok==='yes'){
			allowToCloseTicket = true;
		}else{
			allowToCloseTicket = false;
		}
		$('#dFollowUp').modal();
	}).fail(function(){
		console.log('Tidak dapat retrieve ticketjson');
	});
});
$('#btnCloseTicket').click(function () {
	if(!checkOkReq()){
		alert('Data belum lengkap');
		$('#btnCloseTicket').prop('disabled', true);
	}else{
		var cause='';
		if($('#cause :selected').text()==='Lainnya'){
			cause = $('#othercause').val();
		}else{
			cause = $('#cause :selected').text();
		}
		console.log('SOLUTION CONTENT',$('#solusi').val());
		$.post(thisdomain + 'tickets/update', {
			id: $('#tbl_ticket tbody tr.selected').attr('thisid'),
			status: '1',
//			solution:$("#fuDescription").val(),
			solution:$('#solusi').val(),
			cause:cause,
			mailsent:'2',
			ticketend: $('#followUpDate').getdate().addhour($('#followUpHour')).addminute($('#followUpMinute')).attr('datetime'),
		}).done(function (data) {
			$.post(thisdomain + 'ticket_followups/add', {
				ticket_id: $('#tbl_ticket tbody tr.selected').attr('thisid'),
				result: '1',
				followUpDate: $('#followUpDate').getdate().addhour($('#followUpHour')).addminute($('#followUpMinute')).attr('datetime'),
				picname: $('#followUpPIC').val(),
				description: $('#fuDescription').val(),
				position: $('#picPosition').val(),
				picphone: $('#picPhone').val(),
				username: $('#createuser').val(),
				confirmationresult: $('#confirmationresult').val()
			}).done(function (fu) {
				console.log("Follow Up disimpan dengan status CLOSE");
				$("#tbl_ticket tbody tr.selected .btnfollowup").remove();
				$("#tbl_ticket tbody tr.selected .ticketaction").attr('disabled','disabled');
				$("#tbl_ticket tbody tr.selected").removeClass('ticketOpen');
				$("#tbl_ticket tbody tr.selected").addClass('ticketClosed');
				/*start test update upstream client*/
				$.ajax({
					url:thisdomain+'tickets/closeUpstreamClients/'+$('#tbl_ticket tbody tr.selected').attr('thisid')
					//dataType:"json"
				})
				.done(function(res){
					console.log("UDAH KE UPDATE OY",res);
					//set the presentation layer
					$.ajax({
						url:thisdomain+'tickets/getUpstreamClients/'+$('#tbl_ticket tbody tr.selected').attr('thisid'),
						dataType:"json"
					})
					.done(function(res){
						for(var i=0;i<res.length;i++){
							$("#tbl_ticket tbody tr[thisid="+res[i].id+"]").removeClass("ticketOpen");
							$("#tbl_ticket tbody tr[thisid="+res[i].id+"]").addClass("ticketClosed");
							$("#tbl_ticket tbody tr[thisid="+res[i].id+"] .ticketaction").attr("disabled","disabled");
							console.log("CLIENT OF UPSTREAM",res[i].clientname);
						}
					})
					.fail(function(err){
						console.log("ERR",err);
					});
				})
				.fail(function(err){
					console.log("ERR",err);
				});
				
				/*end test update upstream client*/
				cleanInput();
			}).fail(function () {
				console.log('Tidak bisa mengupdate Follow Up, silakan hubungi Developer');
			});
		}).fail(function () {
			console.log('Tidak bisa mengupdate Ticket, silakan hubungi Developer');
		});
		$('#dFollowUp').modal('hide');
	}
});
$('#btnOK').click(function () {
	if(!checkOkReq()){
		alert('Data belum lengkap');
		$('#btnCloseTicket').prop('disabled', true);
	}else{
		if(allowToCloseTicket){
			$('#btnCloseTicket').prop('disabled', false);
			$('#btnProgress').prop('disabled', true);
		}else{
			$(this).showModal({
				element:'dWarn',
				title : 'Konfirmasi',
				titleElement : 'myModalLabel',
				labelElement : 'modalMessage',
				labelAlignment:'center',
				message : 'Ticket tidak dapat diclose karena masih ada troubleshoot yang belum solve',
				expire : 3000,
				nextUrl : 'null'				
			});			
		}
	}
});
$('#btnNotOK').click(function () {
	if(!checkBelumOkReq()){
		alert('Data belum lengkap');
		$('#btnProgress').prop('disabled', true);
	}else{
		$('#btnCloseTicket').prop('disabled', true);
		$('#btnProgress').prop('disabled', false);
	}
});
$('#btnProgress').click(function () {
	fudate = $('#followUpDate').getdate().addhour($('#followUpHour')).addminute($('#followUpMinute')).attr('datetime');
		var cause='';
		if($('#cause :selected').text()==='Lainnya'){
			cause = $('#othercause').val();
		}else{
			cause = $('#cause :selected').text();
		}
	
	$.post(thisdomain + 'ticket_followups/add', {
		ticket_id: $('#tbl_ticket tbody tr.selected').attr('thisid'),
		result: '0',
		followUpDate: $('#followUpDate').getdate().addhour($('#followUpHour')).addminute($('#followUpMinute')).attr('datetime'),
		picname: $('#followUpPIC').val(),
		description: $('#fuDescription').val(),
		confirmationresult: $('#confirmationresult').val(),
		position: $('#picPosition').val(),
		picphone: $('#picPhone').val(),
		username: $('#createuser').val()
	}).done(function (data) {
	$(".inp_futicket").makekeyvalparam();
	console.log("id",$("#tbl_ticket tbody tr.selected").attr("thisid"));
		$.ajax({
			url: thisdomain + 'tickets/update',
			data: JSON.parse('{' + $(".inp_futicket").attr("keyval") + ',"id":"'+$("#tbl_ticket tbody tr.selected").attr("thisid")+'","cause":"'+cause+'","status":"0","solution":"'+$('#solusi').val()+'"}'),
			type: 'post',
			async: false
		}).fail(function () {
			console.log('Tidak dapat menyimpan data, silakan hubungi Developer');
		}).done(function (data) {
			cleanInput();
			console.log("data",data);
		});
		console.log("Follow Up disimpan dengan status PROGRESS");
	}).fail(function () {
		console.log('Tidak bisa mengupdate Follow Up, silakan hubungi Developer');
	});
	$('#dFollowUp').modal('hide');

});
$('#btnReset').click(function(){
	cleanInput();
});
$('#btnCouldNotBeContacted').click(function(){
	if(!checkBelumBisaDihubungiReq()){
		alert('Data harus lengkap');
	}else{
		fudate = $('#followUpDate').getdate().addhour($('#followUpHour')).addminute($('#followUpMinute')).attr('datetime');
		var cause='';
		if($('#cause :selected').text()==='Lainnya'){
			cause = $('#othercause').val();
		}else{
			cause = $('#cause :selected').text();
		}
		$.post(thisdomain + 'ticket_followups/add', {
			ticket_id: $('#tbl_ticket tbody tr.selected').attr('thisid'),
			result: '3',
			followUpDate: $('#followUpDate').getdate().addhour($('#followUpHour')).addminute($('#followUpMinute')).attr('datetime'),
			picname: $('#followUpPIC').val(),
			description: $('#fuDescription').val(),
			position: $('#picPosition').val(),
			picphone: $('#picPhone').val(),
			username: $('#createuser').val()
		}).done(function (data) {
		$(".inp_futicket").makekeyvalparam();
		console.log("id",$("#tbl_ticket tbody tr.selected").attr("thisid"));
			$.ajax({
				url: thisdomain + 'tickets/update',
				data: JSON.parse('{' + $(".inp_futicket").attr("keyval") + ',"id":"'+$("#tbl_ticket tbody tr.selected").attr("thisid")+'","cause":"'+cause+'"}'),
				type: 'post',
				async: false
			}).fail(function () {
				console.log('Tidak dapat menyimpan data, silakan hubungi Developer');
			}).done(function (data) {
				cleanInput();
				console.log("data",data);
			});
			console.log("Follow Up disimpan dengan status PROGRESS");
		}).fail(function () {
			console.log('Tidak bisa mengupdate Follow Up, silakan hubungi Developer');
		});
		$('#dFollowUp').modal('hide');
	}
});
$('#dFollowUp').on('hidden.bs.modal',function(){
	cleanInput();
});
show_description = function(ticket_id){
	$.ajax({
		url:thisdomain+'tickets/getDescription/'+ticket_id,
		type:'get',
		fail:function(err){
			console.log('ERR',err);
		}
	})
	.done(function(res){
		$.ajax({
			url:thisdomain+'tickets/getComplaint/'+ticket_id,
			type:'get',			
		})
		.done(function(cmp){
			console.log('RESULT',res);
			$.ajax({
				url:thisdomain+'tickets/getSolution/'+ticket_id,
				type:'get',
			}).done(function(sol){
				console.log('SOLUTION',sol);
				$.ajax({
					url:thisdomain+'tickets/getCause/'+ticket_id,
					type:'get'
				}).done(function(cause){
					$.ajax({
						url:thisdomain+'tickets/getConfirmationResult/'+ticket_id,
						type:'get'
					})
					.done(function(confirmationresult){
						$('#complaintcontent').html(cmp);
						$('#causecontent').html(cause);
						$('#descriptioncontent').html(res);
						$('#solutioncontent').html(sol);
						$('#confirmationresultcontent').html(confirmationresult);
						$('#dDescription').modal();																
					})
					.fail(function(err){
						console.log("Error Confirmation Result",err);
					});
				});
			}).fail(function(err){
				console.log('ERROR SOLUTION',err);
			});
		});
	});
	//console.log('HALOOOOOOOOOOOOOOOOOOOO',ticket_id);
}
showFollowupHistory = function(clientname,id,kdticket){
	$('#myHistoryModalLabel').text('Histori Follow Up : [Nama : ' + clientname + ' Kode Ticket : ' + kdticket + '] ');
		$.ajax({
			url:thisdomain+'tickets/getTicketComplaint/'+id,
			type:'get',			
		})
		.done(function(cmp){
			$('#complaint').html('KELUHAN : '+cmp);
			console.log('complaint',id,cmp);
			oHistory = $('#tblHistory').dataTable({
				"bProcessing": true,
				"sAjaxSource": thisdomain + "tickets/ajaxHistory/" + id,
				"aoColumns": [
					{"mData": "followUpDate"},
					{"mData": "picname"},
					{"mData": "position"},
					{"mData": "picphone"},
					{"mData": "status"},
					{"mData": "username"},
					//{ "sWidth": "95px", "sClass": "hist_description" ,"fieldName":"description"}
					{"mData": "description"}
				],
				"bSort": true, "bFilter": false, "bInfo": false, "bPaginate": false, "bDestroy": true
			});
			oHistory.fnSort([[0,'desc']]);
			$('#dFollowUpHistory').modal();

		});	
}
$('.tickettable').on('click', 'tr .clientname', function () {
	var clientname = $(this).text(),
		id = $(this).parent().attr('thisid'),
		kdticket = $(this).prev().text();
		//console.log('ID,KDTICKET',id,kdticket);
	showFollowupHistory(clientname,id,kdticket);
});
$("#btnrekap").click(function(){
	window.location.href = thisdomain+"tickets/rekap";
});
$("#tbl_ticket").on("click","tr .btntroubleshoot",function () {
	var myid = $(this).stairUp({level: 4}).attr("thisid");
	window.location.href = thisdomain + "troubleshoots/add/" + myid;
});
$(this).fieldUpdater({
	url: thisdomain + "tickets/feedData",
	cellClass: 'updatable',
	fieldName: 'fieldName',
	idAttr: 'thisid',
	enabled: true
});
getRow = function(val, callback){
	return callback(val);
}
setLocation = function(val, callback){
	if(val){
		callback(val.location);
	}
}
populateAllCombos = function(elem){
	requesttype = elem.find("option:selected").text();
	$('#client_id').change();

	$.ajax({
		url:thisdomain+'tickets/getClient/'+requesttype,
		dataType:'json'
	}).done(function(data){
		$('#client_id').html('');
		$.each(data,function(col,row){
			$('#client_id').append('<option value='+row.id+'>'+row.name+'</option>');
		});
		$('#client_id').change();
	}).fail(function(){
		console.log('error retrieve data',requesttype);
	});
}
$('#client_id').change(function(){
	console.log("cLIENTID CHANGED");
	var thisval = $(this).val(),
	requesttype = $('#requesttype').find("option:selected").text();
	if(requesttype==='pelanggan'){
		$("#client_site_div").show();
		$("#client_site_textbox_div").hide();
		$("#client_site_id").addClass("inp_ticket");
		$('#client_site_id').populateCombo({
			keyvalpaired: true,
			url: thisdomain + 'clients/get_combo_data_sites/' + thisval
		});
		$('#client_site_id').change();
	}else{
		$("#client_site_div").hide();
		$("#client_site_textbox_div").show();
		$("#client_site_id").removeClass("inp_ticket");
		$("#location").addClass("inp_ticket");
		$.ajax({
			url:thisdomain+'tickets/getClient/'+requesttype,
			dataType:'json'
		}).done(function(data){
			thisrow = getRow(thisval,function(x){
				setLocation(data[x],function(dt){
					$('#location').val(dt);
				})
			});
		}).fail(function(){
			console.log("Tidak dapat retrieve data");
		});
	}
});
$('#client_site_id').change(function(){
	$('#location').val($('#client_site_id').find(' :selected').text());
});
updateRecordRow = function(){
	var maxid = tTicket.getDataTableMaxAttr({idAttr: "thisid"});
	$.ajax({
		url: thisdomain + 'tickets/getRecordOver/' + maxid,
		type: "get",
		dataType: "json"
	}).done(function (data) {
		$.each(data, function (key, val) {
			$.each(val, function (a, b) {
				console.log("CLIENTNAME",b["clientname"]);
				switch(b["status"]){
					case "0":
					status = "Open";
					break;
					case "1":
					status = "Closed";
					break;
				}
				var upstr = "";
				if(b["requesttype"]==="pelanggan"){
					upstr = "";
				}else{
					upstr = "<li class='editUpstream'><a href='#'>Edit Upstream</a></li>";
				}
				newRow = tTicket.fnAddData([b["kdticket"], b["clientname"], b["services"],status,0, b["create_date"],b.reporter,b.reporterphone, b.createuser,'<div class="btn-group"><button data-toggle="dropdown" class="btn dropdown-toggle">Action <span class="caret"></span></button><ul class="dropdown-menu pull-right">'+upstr+'<li class="btntroubleshoot"><a href="#">Troubleshoot</a></li><li class="btnfollowup pointer"><a>Follow Up Ticket</a></li></ul></div>']);
				var row = tTicket.fnGetNodes(newRow);
				//$(row).attr('thisid', maxid + 1);
				$(row).attr('thisid', b["id"]);
				$(row).addClass('ticketOpen');
				if(b["parentid"].length){
					$(row).addClass('ticketMassal');
				}
				if(b["requesttype"]!=="pelanggan"){
					$(row).addClass('ticketMassal');
				}
				
                    var nTr = tTicket.fnSettings().aoData[newRow[0]].nTr;
                    var nTds = $('td', nTr);
                    nTds.eq(1).addClass('clientname');
                    nTds.eq(1).addClass('pointer');
                    nTds.eq(3).addClass('updatable');
                    nTds.eq(3).attr('fieldName','status');
                    nTds.eq(4).addClass('updatable');
                    nTds.eq(4).attr('fieldName', 'duration');
			});
		});
	}).fail(function () {
		console.log("Tidak dapat memeriksa Record baru, silakan hubungi Developer");
	});
}
confirmationresult = $('.myeditor').cleditor({
	width:'300',
	height:'100',
	controls:"bold italic underline | color highlight removeformat | bullets numbering",
	keyup:function(){
		console.log('hoho');
	}
});
solusi = $('.myeditor').cleditor({width:'300',height:'100',controls:"bold italic underline | color highlight removeformat | bullets numbering"});

$("#tbl_ticket").on("click","tr .editUpstream",function () {
	var selected = $(this).stairUp({level:4}),
		selectedId = selected.attr("thisid");
		$("#tbl_ticket tbody tr").removeClass("selected");
		selected.addClass("selected");
		//$("#editUpstreamTitle").html(selected.find(".kdticket").html());
		$("#addUpstreamTitle").html(selected.find(".kdticket").html());
		$("#upstream").val(selected.find(".clientname").html());
		//$("#eupstream").val(selected.find(".clientname").html());
		$.ajax({
			url:thisdomain+"tickets/pGetJson/"+selectedId,
			dataType:"json"
		})
		.done(function(ticket){
			console.log("TICKETREPORTER:",ticket.obj[0].description);
			console.log("TICKETREPORTERPHONE",ticket.obj[0]["reporterphone"]);
			$("#ucomplaint").val(ticket.obj[0].complaint);
			$("#ureporter").val(ticket.obj[0].reporter);
			$("#udescription").val(ticket.obj[0].description).blur();
			$("#ureporterphone").val(ticket.obj[0]["reporterphone"]);
			$.ajax({
				url:thisdomain+'tickets/getUpstreamClients/'+selectedId,
				dataType:"json"
			})
			.done(function(res){
				$('#selectedClient tbody tr').remove();
				for(var i=0;i<res.length;i++){
					console.log("RES CLIENT NAME",res[i].clientname,res[i].id);
					$('#selectedClient tbody').append('<tr trid="'+res[i].id+'"><td>'+res[i].clientname+'</td><td>'+res[i].address+'</td><td class="removeExistingClient">Hapus</td></tr>');
				//	$('#eselectedClient tbody').append('<tr trid="'+res[i].id+'"><td>'+res[i].clientname+'</td><td>'+res[i].address+'</td><td class="removeClient">Hapus</td></tr>');
				}
			})
			.fail(function(err){
				console.log("ERR",err);
			});
			
		});
	//$("#dEditUpstream").modal();
	$("#btnupdateupstream").show();
	$("#btnsaveupstream").hide();
	$("#dAddUpstream").modal();
});
$('#selectedClient').on('click','tbody tr td.removeExistingClient',function(){
	thisid = $(this).stairUp({level:1}).attr("trid");
	$(this).stairUp({level:1}).remove();
	$.ajax({
		url:thisdomain+'tickets/remove/',
		data:{id:thisid},
		type:"post"
	})
	.done(function(res){
		console.log("RES TO REMOVE",res);
		//$("#tbl_ticket tbody tr[thisid="+thisid+"]").remove();//we cannot use this method to remove row, because the row will reappear
		//$("#tbl_ticket tbody tr[thisid="+thisid+"]").remove().draw(false);
		//tRow = $("#tbl_ticket tbody tr[thisid="+thisid+"]");
		tRow = $("#tbl_ticket tbody").find(" tr[thisid="+thisid+"]");
		//console.log("TROW HTML",tTicket.fnGetPosition($("tbl_ticket tbody tr.first")));
		//tRow = tTicket.fnGetPosition($("#tbl_ticket tbody tr[thisid="+thisid+"]"));
		tRow.addClass("kikikikik");
		//tTicket.fnDeleteRow($("#tbl_ticket body tr[thisid="+thisid+"]"));
		//$("tbl_ticket").dataTable().fnDeleteRow(tRow);
		//tTicket.fnDeleteRow(tRow);
		/*tTicket.fnDeleteRow(478,function(dtSettings,row){
			//console.log("SETTIGN",dtSettings,row);
			console.log("SETTIGN",row);
		},true);*/
		//tTicket.fnDraw();
		//$("#tbl_ticket tbody tr[thisid="+thisid+"]").addClass("todelete");
		//tTicket.rows('.todelete').remove().draw();
		//tTicket.row('.kikikikik').remove().draw( false );
		
		removeRow(tRow,function(row){
			console.log("invoked");
			//tTicket.row('.kikikikik').remove().draw( false );
			//tTicket.row('.textblack	').remove().draw( false );
			//row.remove().draw( false );
			//tTicket.fnDeleteRow(".kikikikik");
			//tTicket.fnDeleteRow('.kikikikik');
			position = tTicket.fnGetPosition(row[0])
			console.log("POSITION",position);
			tTicket.fnDeleteRow(position);
			console.log("CLASSNAME",row.className);
		});
	})
	.fail(function(err){
		console.log("ERR",err);
	});
});
removeRow = function(row,callback){
	tRow.addClass("kikikikik");
	callback(tRow);
}
$("#tbl_ticket").on("click","tr .btnviewtroubleshoot",function () {
	var tr = $(this).stairUp({level:4});
	$('#tb_ticket tr').removeClass('selected');
	tr.addClass('selected');
	$.ajax({
		url:thisdomain+'tickets/getTroubleshootSolutionsz/'+tr.attr('thisid'),
		type:'get',
		dataType:'json'
	}).done(function(trdata){
		var teks = 'Tiket ini memiliki' + trdata.rw.length + ' dari '+ trdata.rowcount +' Troubleshoot<br />';
		$.each(trdata.rw,function(x,y){
			teks+=y.activities + '<br />';
		});
		console.log('test show tambahan solusi');
		$('#trInfoModalLabel').html('Info Kode Ticket '+tr.find('td.kdticket').html());
		$('#trInfoMessage').html(teks);
		$('#dTroubleshootInfo').modal();		
	}).fail(function(){
		console.log('Tidak dapat retrieve troubleshoot');
	});
});
$('.closemodal').click(function(){
	$(this).stairUp({level:4}).modal('hide');
});

$('#addUpstreamClient').click(function(){
	console.log('add upstream client clicked');
	$('#dClientLookup').modal();
});
$("#total_router").click(function(){
//	tTicket.row().remove().draw(false);
//	tTicket.row('.textblack').delete().draw();
	tTicket.fnDeleteRow(0);
	
	console.log("total_router clicked");
});
$("#tbl_ticket").on("click",".kdticket",function(){
	var that = this;
	console.log("THIS",this);
	console.log("$(THIS)",$(this));
	alert(tTicket.fnGetPosition(that));
})
