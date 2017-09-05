setTimeout(function(){
	$(".btnCurrentSwitch").click();
	},0);
$(".btn_addswitch").click(function(){
	$('#saveswitch').show();
	$('#updateswitch').hide();
	$("#dAddSwitch").modal();
});
$("#saveswitch").click(function(){
	_this = $(this);
	$(".inp_switch").makekeyvalparam();
	$.ajax({
		url:thisdomain+"troubleshoots/saveDevice",
		data:JSON.parse('{' + $(".inp_switch").attr("keyval") + ',"className":"Site_switch","client_site_id":'+$('#client_site_id').val()+'}'),
		type:"post"
	}).done(function(data){
		$("#dAddSwitch").modal('hide');
		$(".btnCurrentSwitch").click();
	}).fail(function(){
		console.log("tidak dapat menyimpan switch , silakan hubungi Developer");
	});
});
$(".btnCurrentSwitch").click(function(){
	$(this).setButtonActive({value:'1'});
	$('.btnWithdrawnSwitch').setButtonActive({value:'0'});
	$("#tSwitch tbody").empty();
	$("#tSwitch").fillContent({
		url:thisdomain+'site_switches/get_by_site_id',
		keyid:'client_site_id',
		keyval:$('#client_site_id').val(),
		ioflag:'1',inpclass:'inp_switch',
		editerurl:thisdomain+'site_switches/post_obj_by_id/',
		removerClass:'remove_switch',device_name:'Switch',editerClass:'edit_switch',
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
					url:thisdomain+'site_switches/update',
					data:{"id":settings.device_id,"ioflag":"0","withdrawdate":getdate("sql","")},
					type:'post'
				}).done(function(data){
					$(".btnCurrentSwitch").click();
					console.log("sukses mengupdate site_switches")
				}).fail(function(){
					console.log("tidak sukses mengupdate site_switches")
				});
			}).fail(function(){
				console.log("Tidak dapat menyalin data (dari troubleshoot ke withdrawals)");
			});
		},

		dUpdaterBtn:'updateswitch',dSaverBtn:'saveswitch',editDialog:'dAddSwitch',
		modalLabelId:'switchModalLabel',modalLabel:'Add/Edit Switch',
		totalLabelId:'total_switch',
		columns:[		{colName:'Nama',className:'nama',classVal:'name'},
						{colName:'User',className:'user',classVal:'user'},
						{colName:'Password',className:'password',classVal:'password'},
						{colName:'Petugas',className:'petugas',classVal:'createuser'},
						{colName:'Tgl Pasang',className:'tglpasang',classVal:'createdate'},
						],
		actions:{colName:'Aksi',columns:[{actName:'remove',actClass:'remove_switch',actIcon:'icon-home'},{actName:'edit',actClass:'edit_switch',actIcon:'icon-pencil'}]}
	});
	});
$(".btnWithdrawnSwitch").click(function(){
	$(this).setButtonActive({value:'1'});
	$('.btnCurrentSwitch').setButtonActive({value:'0'});
	$("#tSwitch tbody").empty();
	$("#tSwitch").fillContent({
		url:thisdomain+'site_switches/get_by_site_id',
		keyid:'client_site_id',
		keyval:$('#client_site_id').val(),
		ioflag:'0',
		removerClass:'remove_switch',device_name:'Switch',editerClass:'edit_switch',
		dUpdaterBtn:'updateswitch',dSaverBtn:'saveswitch',editDialog:'dAddSwitch',
		totalLabelId:'total_switch',
		columns:[		{colName:'Nama',className:'nama',classVal:'name'},
						{colName:'User',className:'user',classVal:'user'},
						{colName:'Password',className:'password',classVal:'password'},
						{colName:'Petugas',className:'petugas',classVal:'createuser'},
						{colName:'Tgl Tarik',className:'tgltarik',classVal:'withdrawdate'},
						],
		});
});
$('#updateswitch').click(function(){
	_this = $(this);
	$('.inp_switch').makekeyvalparam();
	$.ajax({
		url:thisdomain+'site_switches/update',
		data:JSON.parse('{"id":"'+$("#tSwitch tr.selected").attr("trid")+'",'+$('.inp_switch').attr('keyval')+'}'),
		type:'post'
	}).done(function(data){
		$('#tSwitch tr.selected td.nama').html($("#switchname :selected").text());;
		$('#tSwitch tr.selected td.user').html($("#switchuser").val());;
		$('#tSwitch tr.selected td.password').html($("#switchpassword").val());;
		$('#tSwitch tr.selected td.petugas').html($("#createuser").val());;
		console.log('data',data);
	}).fail(function(){
		console.log('tidak dapet mengupdate Switch');
	});
});
