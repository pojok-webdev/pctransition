setTimeout(function(){
	$(".btnCurrentApwifi").click();
	},0);
$(".btn_addapwifi").click(function(){
	$('#savewifi').show();
	$('#updatewifi').hide();
	$("#dAddAPWifi").modal();
});
$("#savewifi").click(function(){
	_this = $(this);
	$(".inp_apwifi").makekeyvalparam();
	$.ajax({
		url:thisdomain+"troubleshoots/saveDevice",
		data:JSON.parse('{' + $(".inp_apwifi").attr("keyval") + ',"className":"Site_apwifi","client_site_id":'+$('#client_site_id').val()+'}'),
		type:"post"
	}).done(function(data){
		$("#dAddApwifi").modal('hide');
		$(".btnCurrentApwifi").click();
	}).fail(function(){
		console.log("tidak dapat menyimpan apwifi , silakan hubungi Developer");
	});
});
$(".btnCurrentApwifi").click(function(){
	$(this).setButtonActive({value:'1'});
	$('.btnWithdrawnApwifi').setButtonActive({value:'0'});
	$("#tApwifi tbody").empty();
	$("#tApwifi").fillContent({
		url:thisdomain+'site_apwifis/get_by_site_id',
		keyid:'client_site_id',
		keyval:$('#client_site_id').val(),
		ioflag:'1',inpclass:'inp_apwifi',
		editerurl:thisdomain+'site_apwifis/post_by_id/',
		removerClass:'remove_apwifi',device_name:'AP Wifi',editerClass:'edit_apwifi',
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
					url:thisdomain+'site_apwifis/update',
					data:{"id":settings.device_id,"ioflag":"0","withdrawdate":getdate("sql","")},
					type:'post'
				}).done(function(data){
					$(".btnCurrentApwifi").click();
					console.log("sukses mengupdate site_apwifis")
				}).fail(function(){
					console.log("tidak sukses mengupdate site_apwifis")
				});
			}).fail(function(){
				console.log("Tidak dapat menyalin data (dari troubleshoot ke withdrawals)");
			});
		},
		dUpdaterBtn:'updatewifi',dSaverBtn:'savewifi',editDialog:'dAddAPWifi',
		modalLabelId:'wifiModalLabel',modalLabel:'Add/Edit AP Wifi',
		totalLabelId:'total_apwifi',
		columns:[		{colName:'Tipe',className:'edit_router router_type',classVal:'tipe'},
						{colName:'Macboard',className:'macboard',classVal:'macboard'},
						{colName:'Lokasi',className:'lokasi',classVal:'location'},
						{colName:'Petugas',className:'petugas',classVal:'createuser'},
						{colName:'Tgl Pasang',className:'tglpasang',classVal:'create_date'},
						],		
		actions:{colName:'Aksi',columns:[{actName:'remove',actClass:'remove_apwifi',actIcon:'icon-home'},{actName:'edit',actClass:'edit_apwifi',actIcon:'icon-pencil'}]}
	});
});
$(".btnWithdrawnApwifi").click(function(){
	$(this).setButtonActive({value:'1'});
	$('.btnCurrentApwifi').setButtonActive({value:'0'});
	$("#tApwifi tbody").empty();
	$("#tApwifi").fillContent({
		url:thisdomain+'site_apwifis/get_by_site_id',
		keyid:'client_site_id',
		keyval:$('#client_site_id').val(),
		ioflag:'0',
		removerClass:'removeApwifi',device_name:'AP Wifi',
		totalLabelId:'total_apwifi',
		columns:[		{colName:'Tipe',className:'edit_router router_type',classVal:'tipe'},
						{colName:'Macboard',className:'macboard',classVal:'macboard'},
						{colName:'Lokasi',className:'lokasi',classVal:'location'},
						{colName:'Petugas',className:'petugas',classVal:'updateuser'},
						{colName:'Tgl Tarik',className:'tgltarik',classVal:'withdrawdate'},
						],		
		});
});
$('#updatewifi').click(function(){
	_this = $(this);
	$('.inp_apwifi').makekeyvalparam();
	$.ajax({
		url:thisdomain+'site_apwifis/update',
		data:JSON.parse('{"id":"'+$("#tApwifi tr.selected").attr("trid")+'",'+$('.inp_apwifi').attr('keyval')+'}'),
		type:'post'
	}).done(function(data){
		$('#tApwifi tr.selected td.edit_router').html($("#tipe_apwifi :selected").text());;
		$('#tApwifi tr.selected td.macboard').html($("#macboard_apwifi").val());;
		$('#tApwifi tr.selected td.petugas').html($("#createuser").val());;
		$('#tApwifi tr.selected td.lokasi').html($("#location_apwifi").val());;
	}).fail(function(){
		console.log('tidak dapet mengupdate AP Wifi');
	});
});
