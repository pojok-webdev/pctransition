setTimeout(function(){
	$(".btnCurrentWirelessradio").click();
	},0);
$(".btn_addwirelessradio").click(function(){
	$('#savewirelessradio').show();
	$('#updatewirelessradio').hide();
	$("#dAddWirelessRadio").modal();
});
$.fn.fill_ap = function(btsid,selected){
	$(this).html("");
	thisap = $(this);
	console.log("id",btsid);
	thisap.append('<option value="Belum ada AP" selected=selected>Belum ada AP</option>');
	$.getJSON('/paps/get_name_by_bts/'+btsid,function(data){
		console.log("returned");
		$.each(data,function(x,y){
			console.log("X",x);
			if(selected==y){
				thisap.append('<option value='+y+' selected=selected>'+y+'</option>');
			}else{
				thisap.append('<option value='+y+'>'+y+'</option>');
			}
		});
	});
}
$("#bts_wireless_radio").change(function(){
	$("#ip_ap_wireless_radio").fill_ap($(this).val(),null);
});
$("#savewirelessradio").click(function(){
	_this = $(this);
	$(".inp_wireless").makekeyvalparam();
	$.ajax({
		url:thisdomain+"troubleshoots/saveDevice",
		data:JSON.parse('{' + $(".inp_wireless").attr("keyval") + ',"className":"Site_wireless_radio","client_site_id":'+$('#client_site_id').val()+'}'),
		type:"post"
	}).done(function(data){
		$("#dAddWirelessRadio").modal('hide');
		$(".btnCurrentWirelessradio").click();
	}).fail(function(){
		console.log("tidak dapat menyimpan wirelessradio , silakan hubungi Developer");
	});
});
$(".btnCurrentWirelessradio").click(function(){
	$(this).setButtonActive({value:'1'});
	$('.btnWithdrawnWirelessradio').setButtonActive({value:'0'});
	$("#tWirelessradio tbody").empty();
	$("#tWirelessradio").fillContent({
		url:thisdomain+'site_wireless_radios/get_by_site_id',
		keyid:'client_site_id',
		keyval:$('#client_site_id').val(),
		ioflag:'1',inpclass:'inp_wireless',
		editerurl:thisdomain+'site_wireless_radios/post_obj_by_id/post_by_id/',
		removerClass:'remove_wirelessradio',device_name:'Wireless Radio',editerClass:'edit_wirelessradio',
		removeAction : function(options){
			settings = $.extend({
				url:'tes',
				data:{},
				type:'post',
				device_id:0
			},options);
			$.ajax({
				url:settings.url,
				data:settings.data,
				type:settings.type
			}).done(function(data){
				$.ajax({
					url:thisdomain+'site_wireless_radios/update',
					data:{"id":settings.device_id,"ioflag":"0","withdrawdate":getdate("sql","")},
					type:'post'
				}).done(function(data){
					$(".btnCurrentWirelessradio").click();
					console.log("sukses mengupdate site_wireless_radio")
				}).fail(function(){
					console.log("tidak sukses mengupdate site_wireless_radio")
				});
			}).fail(function(){
				console.log("Tidak dapat menyalin data (dari troubleshoot ke withdrawals)");
			});
		},
		
		dUpdaterBtn:'updatewirelessradio',dSaverBtn:'savewirelessradio',editDialog:'dAddWirelessRadio',
		modalLabelId:'wirelessModalLabel',modalLabel:'Add/Edit Wireless Radio',
		totalLabelId:'total_wirelessradio',
		columns:[		{colName:'Tipe',className:'tipe',classVal:'tipe'},
						{colName:'Macboard',className:'macboard',classVal:'macboard'},
						{colName:'Petugas',className:'petugas',classVal:'createuser'},
						{colName:'Tgl Pasang',className:'tglpasang',classVal:'createdate'},
						],
		actions:{colName:'Aksi',columns:[{actName:'remove',actClass:'remove_wirelessradio',actIcon:'icon-home'},{actName:'edit',actClass:'edit_wirelessradio',actIcon:'icon-pencil'}]}
	});
});
$(".btnWithdrawnWirelessradio").click(function(){
	$(this).setButtonActive({value:'1'});
	$('.btnCurrentWirelessradio').setButtonActive({value:'0'});
	$("#tWirelessradio tbody").empty();
	$("#tWirelessradio").fillContent({
		url:thisdomain+'site_wireless_radios/get_by_site_id',
		keyid:'client_site_id',
		keyval:$('#client_site_id').val(),
		ioflag:'0',
		removerClass:'removeWirelessradio',device_name:'Wireless Radio',editerClass:'edit_wirelessradio',
		dUpdaterBtn:'updatewirelessradio',dSaverBtn:'savewidrelessradio',editDialog:'dAddWirelessRadio',
		totalLabelId:'total_wirelessradio',
		columns:[		{colName:'Tipe',className:'tipe',classVal:'tipe'},
						{colName:'Macboard',className:'macboard',classVal:'macboard'},
						{colName:'Petugas',className:'petugas',classVal:'createuser'},
						{colName:'Tgl Tarik',className:'tgltarik',classVal:'withdrawdate'},
						],
	});
});
$('#updatewirelessradio').click(function(){
	_this = $(this);
	$('.inp_wireless').makekeyvalparam();
	console.log('keyval',$('.inp_wireless').attr('keyval'));
	$.ajax({
		url:thisdomain+'site_wireless_radios/update',
		data:JSON.parse('{"id":"'+$("#tWirelessradio tr.selected").attr("trid")+'",'+$('.inp_wireless').attr('keyval')+'}'),
		type:'post'
	}).done(function(data){
		$('#tWirelessradio tr.selected td.tipe').html($("#tipe_wireless_radio :selected").text());;
		$('#tWirelessradio tr.selected td.macboard').html($("#macboard_wireless_radio").val());;
		$('#tWirelessradio tr.selected td.petugas').html($("#createuser").val());;
		console.log('data',data);
	}).fail(function(){
		console.log('tidak dapet mengupdate AP Wifi');
	});
});
