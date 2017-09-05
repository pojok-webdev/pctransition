setTimeout(function(){
	$(".btnCurrentPccard").click();
	},0);
$(".btn_addpccard").click(function(){
	$('#savepccard').show();
	$('#updatepccard').hide();
	$("#dAddPccard").modal();
});
$("#savepccard").click(function(){
	_this = $(this);
	$(".inp_pccard").makekeyvalparam();
	$.ajax({
		url:thisdomain+"troubleshoots/saveDevice",
		data:JSON.parse('{' + $(".inp_pccard").attr("keyval") + ',"className":"Site_pccard","client_site_id":'+$('#client_site_id').val()+'}'),
		type:"post"
	}).done(function(data){
		$("#dAddPccard").modal('hide');
		$(".btnCurrentPccard").click();
	}).fail(function(){
		console.log("tidak dapat menyimpan pccard , silakan hubungi Developer");
	});
});
$(".btnCurrentPccard").click(function(){
	$(this).setButtonActive({value:'1'});
	$('.btnWithdrawnPccard').setButtonActive({value:'0'});
	$("#tPccard tbody").empty();
	$("#tPccard").fillContent({
		url:thisdomain+'site_pccards/get_by_site_id',
		keyid:'client_site_id',
		keyval:$('#client_site_id').val(),
		ioflag:'1',inpclass:'inp_pccard',
		editerurl:thisdomain+'site_pccards/post_by_id/',
		removerClass:'remove_pccard',editerClass:'edit_pccard',device_name:'Pccard',
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
					url:thisdomain+'site_pccards/update',
					data:{"id":settings.device_id,"ioflag":"0","withdrawdate":getdate("sql","")},
					type:'post'
				}).done(function(data){
					$(".btnCurrentPccard").click();
					console.log("sukses mengupdate site_pccard")
				}).fail(function(){
					console.log("tidak sukses mengupdate site_pccard")
				});
			}).fail(function(){
				console.log("Tidak dapat menyalin data (dari troubleshoot ke withdrawals)");
			});
		},
	
		dUpdaterBtn:'updatepccard',dSaverBtn:'savepccard',editDialog:'dAddPccard',
		modalLabelId:'pccardModalLabel',modalLabel:'Add/Edit PCCard',
		totalLabelId:'total_pccard',
		columns:[		{colName:'Nama',className:'nama',classVal:'name'},
						{colName:'Mac Address',className:'macaddress',classVal:'macaddress'},
						{colName:'Petugas',className:'petugas',classVal:'createuser'},
						{colName:'Tgl Pasang',className:'tglpasang',classVal:'createdate'},
						],
		actions:{colName:'Aksi',columns:[{actName:'remove',actClass:'remove_pccard',actIcon:'icon-home'},{actName:'edit',actClass:'edit_pccard',actIcon:'icon-pencil'}]}
	});
});
$(".btnWithdrawnPccard").click(function(){
	$(this).setButtonActive({value:'1'});
	$('.btnCurrentPccard').setButtonActive({value:'0'});
	$("#tPccard tbody").empty();
	$("#tPccard").fillContent({
		url:thisdomain+'site_pccards/get_by_site_id',
		keyid:'client_site_id',
		keyval:$('#client_site_id').val(),
		ioflag:'0',
		removerClass:'removePccard',device_name:'Pccard',
		totalLabelId:'total_pccard',
		columns:[		{colName:'Nama',className:'nama',classVal:'name'},
						{colName:'Mac Address',className:'macaddress',classVal:'macaddress'},
						{colName:'Petugas',className:'petugas',classVal:'createuser'},
						{colName:'Tgl Tarik',className:'tgltarik',classVal:'withdrawdate'},
						],
	});
});
 
$('#updatepccard').click(function(){
	_this = $(this);
	$('.inp_pccard').makekeyvalparam();
	$.ajax({
		url:thisdomain+'site_pccards/update',
		data:JSON.parse('{"id":"'+$("#tPccard tr.selected").attr("trid")+'",'+$('.inp_pccard').attr('keyval')+'}'),
		type:'post'
	}).done(function(data){
		$('#tPccard tr.selected td.nama').html($("#pccards :selected").text());
		$('#tPccard tr.selected td.macaddress').html($("#pccard_macaddress").val());
		$('#tPccard tr.selected td.petugas').html($("#createuser").val());
	}).fail(function(){
		console.log('tidak dapet mengupdate PCCard');
	});
});
