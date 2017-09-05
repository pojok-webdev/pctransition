setTimeout(function(){
	$(".btnCurrentDevice").click();
	},0);
$(".btn_adddevice").click(function(){
	$('#savedevice').show();
	$('#updatedevice').hide();
	$("#dAddDevice").modal();
}); 
$("#savedevice").click(function(){
	_this = $(this);
	$(".inp_device").makekeyvalparam();
	$.ajax({
		url:thisdomain+"troubleshoots/savedevice",
		data:JSON.parse('{' + $(".inp_device").attr("keyval") + ',"className":"Site_device","client_site_id":'+$('#client_site_id').val()+'}'),
		type:"post"
	}).done(function(data){
		$("#dAddDevice").modal('hide');
		$(".btnCurrentDevice").click();
	}).fail(function(){
		console.log("tidak dapat menyimpan device , silakan hubungi Developer");
	});
});
$(".btnCurrentDevice").click(function(){
	$(this).setButtonActive({value:'1'});
	$('.btnWithdrawnDevice').setButtonActive({value:'0'});
	$("#tDevice tbody").empty();
	$("#tDevice").fillContent({
		url:thisdomain+'site_devices/get_by_site_id',
		keyid:'client_site_id',
		keyval:$('#client_site_id').val(),
		ioflag:'1',inpclass:'inp_device',
		editerurl:thisdomain+'site_devices/post_by_id/',
		removerClass:'remove_device',editerClass:'edit_device',
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
					url:thisdomain+'site_devices/update',
					data:{"id":settings.device_id,"ioflag":"0","withdrawdate":getdate("sql","")},
					type:'post'
				}).done(function(data){
					$(".btnCurrentDevice").click();
					console.log("sukses mengupdate site_devices")
				}).fail(function(){
					console.log("tidak sukses mengupdate site_devices")
				});
			}).fail(function(){
				console.log("Tidak dapat menyalin data (dari troubleshoot ke withdrawals)");
			});
		},
		
		dUpdaterBtn:'updatedevice',dSaverBtn:'savedevice',editDialog:'dAddDevice',
		modalLabelId:'deviceModalLabel',modalLabel:'Add/Edit Device',
		totalLabelId:'total_device',device_name:'Device',
		columns:[		{colName:'Tipe',className:'devicetype',classVal:'devicetype'},
						{colName:'Lokasi',className:'location',classVal:'location'},
						{colName:'Petugas',className:'petugas',classVal:'createuser'},
						{colName:'Tgl Pasang',className:'tglpasang',classVal:'createdate'},
						],
		actions:{colName:'Aksi',columns:[{actName:'remove',actClass:'remove_device',actIcon:'icon-home'},{actName:'edit',actClass:'edit_device',actIcon:'icon-pencil'}]}
	});
});
$(".btnWithdrawnDevice").click(function(){
	$(this).setButtonActive({value:'1'});
	$('.btnCurrentDevice').setButtonActive({value:'0'});
	$("#tDevice tbody").empty();
	$("#tDevice").fillContent({
		url:thisdomain+'site_devices/get_by_site_id',
		keyid:'client_site_id',
		keyval:$('#client_site_id').val(),
		ioflag:'0',
		removerClass:'removeDevice',device_name:'Device',
		totalLabelId:'total_device',
		columns:[		{colName:'Tipe',className:'devicetype',classVal:'devicetype'},
						{colName:'Lokasi',className:'location',classVal:'location'},
						{colName:'Petugas',className:'petugas',classVal:'createuser'},
						{colName:'Tgl Tarik',className:'tgltarik',classVal:'withdrawdate'},
						],

	});
});
$('#updatedevice').click(function(){
	_this = $(this);
	$('.inp_device').makekeyvalparam();
	$.ajax({
		url:thisdomain+'site_devices/update',
		data:JSON.parse('{"id":"'+$("#tDevice tr.selected").attr("trid")+'",'+$('.inp_device').attr('keyval')+'}'),
		type:'post'
	}).done(function(data){
		$('#tDevice tr.selected td.devicetype').html($("#devicetype :selected").text());
		$('#tDevice tr.selected td.location').html($("#device_location").val());
		$('#tDevice tr.selected td.petugas').html($("#createuser").val());
	}).fail(function(){
		console.log('tidak dapet mengupdate Devices');
	});
});
