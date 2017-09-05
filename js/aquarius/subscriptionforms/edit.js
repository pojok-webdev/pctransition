$("#monthlyfee").change(function(){
	console.log($("#monthlyfee").val());
	ppn = 1.1*$("#monthlyfee").val();
	$("#monthlyppn").val(ppn);
});
checkbusinessfield = function(){
	if($('#businesstype').val()==='4'){
		$('#otherbusinesstype').show();
	}else{
		$('#otherbusinesstype').hide();
	}
}
$('#btnAddOtherFee').click(function(){
	$('#dAddOtherFee').modal();	
});
$('.closemodal').click(function(){
	$(this).stairUp({level:4}).modal('hide');
});
checkbusinessfield();
$('.autonum').autoNumeric('init');
$('#setuptotal').autoNumeric('init');
$('#monthlytotal').autoNumeric('init');
$('#devicetotal').autoNumeric('init');
function changefeeval(fee,ppn,total){
	setuptotal = 0;
	setuptotal += parseInt($('#'+fee).autoNumeric('get'));
	setuptotal += parseInt($('#'+ppn).autoNumeric('get'));
	$('#'+total).html(setuptotal);
	$('#'+total).autoNumeric('update');	
}
$('.setup').mouseup(function(){
	changefeeval('setupfee','setupppn','setuptotal');
});
$('.setup').keyup(function(){
	changefeeval('setupfee','setupppn','setuptotal');
});
$('.monthly').mouseup(function(){
	changefeeval('monthlyfee','monthlyppn','monthlytotal');
});
$('.monthly').keyup(function(){
	changefeeval('monthlyfee','monthlyppn','monthlytotal');
});
$('.device').mouseup(function(){
	changefeeval('devicefee','deviceppn','devicetotal');
});
$('.device').keyup(function(){
	changefeeval('devicefee','deviceppn','devicetotal');
});
$('.other').mouseup(function(){
	changefeeval('otherfee','otherppn','othertotal');
});
$('.other').keyup(function(){
	changefeeval('otherfee','otherppn','othertotal');
});
$("#btn_preview").click(function(){
	window.location.href = "/subscribeforms/showreport/"+$("#client_id").val();
});
$('#othersave').click(function(){
	$.ajax({
		url:thisdomain+'subscribeforms/savefee',
		data:{"name":$("#othername").val(),"dpp":$("#otherfee").autoNumeric('get'),"ppn":$("#otherppn").autoNumeric('get'),"client_site_id":$("#client_site_id").val(),"createuser":$("#createuser").val()},
		type:'post'
	}).done(function(fbfee_id){
		console.log('fbfee_id',fbfee_id);
	}).fail(function(){
		console.log('tidak dapat menyimpan fee');
	});
	var othertext = '';
	othertext += '<div class="row-form clearfix">';
	othertext += '<div class="span3"><b>'+$('#othername').val()+'</b></div>';
	othertext += '<div class="span3"><input type="text" value='+$('#otherfee').val()+' class="autonum" /></div>';
	othertext += '<div class="span3"><input type="text" value='+$('#otherppn').val()+' class="autonum" /></div>';
	othertext += '<div class="span3" id="othertotal">';
	othertext += $('#othertotal').html();
	othertext += '<button class="btn btn-mini btnremovefee" type="button">Hapus</button>';
	othertext += '</div>';
	othertext += '</div>';
	$('#fees').append(othertext);
	$('.btnremovefee').click(function(){
		$(this).stairUp({level:2}).remove();
	});
});
function savepic(fb_id){
	$('.inp_subscriber').makekeyvalparam();
	console.log('fb_id',fb_id);
	console.log('subscruber keyval',$('.inp_subscriber').attr('keyval'));
	$.ajax({
		url:thisdomain+'fbpics/saveupdate',
		data:JSON.parse('{"fb_id":"'+fb_id+'","position":"PEMOHON",'+$('.inp_subscriber').attr('keyval')+'}'),
		type:'post'
	}).done(function(result){
		console.log(result);
	}).fail(function(err){
		console.log('Tidak dapat menyimpan pic inp_subscriber',err);
	});	
	$('.inp_resp').makekeyvalparam();
	$.ajax({
		url:thisdomain+'fbpics/saveupdate',
		data:JSON.parse('{"fb_id":"'+fb_id+'","position":"PENANGGUNGJAWAB",'+$('.inp_resp').attr('keyval')+'}'),
		type:'post'
	}).done(function(result){
		console.log(result);
	}).fail(function(err){
		console.log('Tidak dapat menyimpan pic inp_resp',err);
	});	
	$('.inp_teknis').makekeyvalparam();
	$.ajax({
		url:thisdomain+'fbpics/saveupdate',
		data:JSON.parse('{"fb_id":"'+fb_id+'","position":"TEKNIS",'+$('.inp_teknis').attr('keyval')+'}'),
		type:'post'
	}).done(function(result){
		console.log(result);
	}).fail(function(err){
		console.log('Tidak dapat menyimpan pic inp_teknis',err);
	});	
	$('.inp_adm').makekeyvalparam();
	$.ajax({
		url:thisdomain+'fbpics/saveupdate',
		data:JSON.parse('{"fb_id":"'+fb_id+'","position":"ADMINISTRASI",'+$('.inp_adm').attr('keyval')+'}'),
		type:'post'
	}).done(function(result){
		console.log(result);
	}).fail(function(err){
		console.log('Tidak dapat menyimpan pic inp_adm',err);
	});	
	$('.inp_billing').makekeyvalparam();
	$.ajax({
		url:thisdomain+'fbpics/saveupdate',
		data:JSON.parse('{"fb_id":"'+fb_id+'","position":"BILLING",'+$('.inp_billing').attr('keyval')+'}'),
		type:'post'
	}).done(function(result){
		console.log(result);
	}).fail(function(err){
		console.log('Tidak dapat menyimpan pic inp_billing',err);
	});	
	$('.inp_support').makekeyvalparam();
	$.ajax({
		url:thisdomain+'fbpics/saveupdate',
		data:JSON.parse('{"fb_id":"'+fb_id+'","position":"SUPPORT",'+$('.inp_support').attr('keyval')+'}'),
		type:'post'
	}).done(function(result){
		console.log(result);
	}).fail(function(err){
		console.log('Tidak dapat menyimpan pic inp_support',err);
	});	
	$.ajax({
		url:thisdomain+'fbfees/saveupdate',
		data:{client_id:$('#client_id').val(),dpp:$('#setupfee').autoNumeric('get'),ppn:$('#setupppn').autoNumeric('get'),name:"setup",createuser:$('#createuser').val()},
		type:'post'
	}).done(function(data){
		console.log('sukses update/insert fbfee setup');
	}).fail(function(err){
		console.log('gagal update/insert fbfee setup',err);
	});
	$.ajax({
		url:thisdomain+'fbfees/saveupdate',
		data:{client_id:$('#client_id').val(),dpp:$('#monthlyfee').autoNumeric('get'),ppn:$('#monthlyppn').autoNumeric('get'),name:"monthly",createuser:$('#createuser').val()},
		type:'post'
	}).done(function(data){
		console.log('sukses update/insert fbfee monthly');
	}).fail(function(err){
		console.log('gagal update/insert fbfee monthly',err);
	});
	$.ajax({
		url:thisdomain+'fbfees/saveupdate',
		data:{client_id:$('#client_id').val(),dpp:$('#devicefee').autoNumeric('get'),ppn:$('#deviceppn').autoNumeric('get'),name:"device",createuser:$('#createuser').val()},
		type:'post'
	}).done(function(data){
		console.log('sukses update/insert fbfee device');
	}).fail(function(err){
		console.log('gagal update/insert fbfee device',err);
	});
}
function savefb(callback){
	$('.inp_fb').makekeyvalparam();
	console.log("inp_fb",$(".inp_fb").attr("keyval"));
	$.ajax({
		url:'/fbs/saveupdate/',
		type:'post',
		data:JSON.parse('{'+$('.inp_fb').attr('keyval')+'}'),
		async:false
	}).done(function(data){
		console.log("Berhasil saveupdate",data);
		$.ajax({
			url:'/clients/update',
			data:{
				"id":$('#client_id').val(),
				"name":$('#clientname').val(),
				"business_field":$('#businesstype :selected').text(),
				"phone":$('#clientphone').val(),
				"fax":$('#clientfax').val()},
			type:'post',
			async:false
		}).fail(function(){
			console.log("Tidak dapat mengupdate tbl Client");
		}).done(function(dtclient){
			console.log("Berhasil update clients",dtclient);
			$.ajax({
				url:'/client_sites/update',
				type:'post',
				data:{
					"id":$('#client_site_id').val(),
					"address":$('#clientaddress').val(),
					"phone":$('#clientphone').val(),
					"fax":$('#clientfax').val()
				},
				async:false
			}).done(function(dtsite){
				$.ajax({
					url:'/subscribeforms/setfbcomplete',
					data:{"id":$('#client_site_id').val()},
					type:'post'
				}).done(function(cs_id){
					console.log('set complete success',cs_id);
				});				
				/*end of set client complete*/
				callback(data);
			}).fail(function(){
				console.log('Tidak dapat mengupdate tbl clientsite');
			});
			console.log("Berhasil mengupdate tbl Client",dtclient);
		});
		console.log('sukses',data);
		//window.location.href = thisdomain+'subscribeforms';
	}).fail(function(err){
		console.log('Tidak dapat menyimpan / mengupdate fbs',err);
	});
}
$('#btn_save').click(function(){
	savefb(savepic);
});
$('#businesstype').change(function(){
	checkbusinessfield();
});
$('#othersave').click(function(){
	
});
$.ajax({
	url:thisdomain+'subscribeforms/getpics/'+$('#nofb').val(),
	type:'post',
	dataType:'json'
}).done(function(data){
	console.log('data',data);
	$('#nofb').html(data['nofb']);
	$('#siup').val(data['siup']);
	$('#npwp').val(data['npwp']);
	$('#clientname').val(data['name']);
	$('#businesstype').find('option').each(function(){
		console.log($(this).text());
		if($(this).text()===data['businesstype']){
			$(this).attr('selected','selected');
		}
	});
	$('#clientaddress').val(data['address']);
	$('#clientphone').val(data['phone']);
	$('#clientfax').val(data['fax']);
	$('#subscriber_id').val(data['subscriber']['id']);
	$('#subscribername').val(data['subscriber']['name']);
	$('#subscriberposition').val(data['subscriber']['position']);
	$('#subscriberid').val(data['subscriber']['idnum']);
	$('#subscriberphone').val(data['subscriber']['phone']);
	$('#subscriberhp').val(data['subscriber']['hp']);
	$('#subscriberemail').val(data['subscriber']['email']);
	$('#resp_id').val(data['resp']['id']);
	$('#respname').val(data['resp']['name']);
	$('#respposition').val(data['resp']['position']);
	$('#respid').val(data['resp']['idnum']);
	$('#respphone').val(data['resp']['phone']);
	$('#resphp').val(data['resp']['hp']);
	$('#respemail').val(data['resp']['email']);
	$('#adm_id').val(data['adm']['id']);
	$('#admname').val(data['adm']['name']);
	$('#admphone').val(data['adm']['phone']);
	$('#admhp').val(data['adm']['hp']);
	$('#admemail').val(data['adm']['email']);
	$('#technician_id').val(data['teknis']['id']);
	$('#technicianname').val(data['teknis']['name']);
	$('#technicianphone').val(data['teknis']['phone']);
	$('#technicianhp').val(data['teknis']['hp']);
	$('#technicianemail').val(data['teknis']['email']);
	$('#billing_id').val(data['billing']['id']);
	$('#billingname').val(data['billing']['name']);
	$('#billingphone').val(data['billing']['phone']);
	$('#billinghp').val(data['billing']['hp']);
	$('#billingemail').val(data['billing']['email']);
	$('#support_id').val(data['support']['id']);
	$('#supportname').val(data['support']['name']);
	$('#supportphone').val(data['support']['phone']);
	$('#supporthp').val(data['support']['hp']);
	$('#supportemail').val(data['support']['email']);
	$('#activationdate').val(data['activationdate']);
	$('#period1').val(data['period1']);
	$('#period2').val(data['period2']);
	changefeeval('setupfee','setupppn','setuptotal');
	changefeeval('monthlyfee','monthlyppn','monthlytotal');
	changefeeval('devicefee','deviceppn','devicetotal');
}).fail(function(err){
	console.log('Tidak dapat retrieve',err);
	console.log('thisdomain',thisdomain);
});
$.ajax({
	url:'/fbfees/getfees/'+$('#client_id').val(),
	type:'post',
	data:{client_id:$('#client_id').val(),feetype:'other'},
	dataType:'json'
}).done(function(data){
	$.each(data,function(name,val){
		switch(name){
			case 'setup':
				$('#setupfee').val(val.dpp);
				$('#setupppn').val(val.ppn);
			break;
			case 'monthly':
				$('#monthlyfee').val(val.dpp);
				$('#monthlyppn').val(val.ppn);
			break;
			case 'device':
				$('#devicefee').val(val.dpp);
				$('#deviceppn').val(val.ppn);
			break;
			default:
				var othertext = '',
					setuptotal = 0;
				setuptotal += parseInt(val.dpp);
				setuptotal += parseInt(val.ppn);
	
				othertext += '<div class="row-form clearfix">';
				othertext += '<div class="span3"><b>'+name+'</b></div>';
				othertext += '<div class="span3"><input type="text" value='+val.dpp+' class="autonum" /></div>';
				othertext += '<div class="span3"><input type="text" value='+val.ppn+' class="autonum" /></div>';
				othertext += '<div class="span3" id="othertotal">';
				othertext += '<span class="autonum">'+setuptotal+'</span>';
				othertext += '<button class="btn btn-mini btnremovefee" type="button">Hapus</button>';
				othertext += '</div>';
				othertext += '</div>';
				$('#fees').append(othertext);			
				$('.autonum').autoNumeric('init');
			break;
		}
				$('.autonum').autoNumeric('update');	
	});
	console.log('data fb fees',data)
})
.fail(function(err){
	console.log("FAIL GET FEES,",err);
});
$('.myeditor').cleditor({width:'300',height:'160px',controls:"bold italic underline | color highlight removeformat | bullets numbering"});
