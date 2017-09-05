setTimeout(function(){
	$(".btnCurrentRouter").click();
	},0);
$(".btn_addrouter").click(function(){
	$('#saverouter').show();
	$('#updaterouter').hide();
	$("#dAddRouter").modal();
}); 
$("#saverouter").click(function(){
	_this = $(this);
	$(".inp_router").makekeyvalparam();
	$.ajax({
		url:thisdomain+"troubleshoots/saverouter",
		data:JSON.parse('{' + $(".inp_router").attr("keyval") + '}'),
		type:"post"
	}).done(function(data){
		$("#dAddRouter").modal('hide');
		$(".btnCurrentRouter").click();
	}).fail(function(){
		console.log("tidak dapat menyimpan router , silakan hubungi Developer");
	});
});
$('#updaterouter').click(function(){
	_this = $(this);
	$('.inp_router').makekeyvalparam();
	$.ajax({
		url:thisdomain+'site_routers/update',
		data:JSON.parse('{"id":"'+$("#tRouter tr.selected").attr("trid")+'",'+$('.inp_router').attr('keyval')+'}'),
		type:'post'
	}).done(function(data){
		console.log('data',data);
	}).fail(function(){
		console.log('tidak dapet mengupdate router');
	});
});
$(".btnCurrentRouter").click(function(){
	$(this).setButtonActive({value:'1'});
	$('.btnWithdrawnRouter').setButtonActive({value:'0'});
	$("#tRouter tbody").empty();
	$("#tRouter").fillContent({
		url:thisdomain+'site_routers/get_by_site_id',
		keyid:'client_site_id',
		keyval:$('#client_site_id').val(),
		ioflag:'1',inpclass:'inp_router',
		editerurl:thisdomain+'site_routers/get_by_id/',
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
					url:thisdomain+'site_routers/update',
					data:{"id":settings.device_id,"ioflag":"0","withdrawdate":getdate("sql","")},
					type:'post'
				}).done(function(data){
					$(".btnCurrentRouter").click();
					console.log("sukses mengupdate site_routers")
				}).fail(function(){
					console.log("tidak sukses mengupdate site_routers")
				});
			}).fail(function(){
				console.log("Tidak dapat menyalin data (dari troubleshoot ke withdrawals)");
			});
		},
		removerClass:'remove_router',editerClass:'edit_router',
		totalLabelId:'total_router',device_name:'Router',
		dUpdaterBtn:'updaterouter',dSaverBtn:'saverouter',editDialog:'dAddRouter',
		modalLabelId:'routerModalLabel',modalLabel:'Add/Edit Router',
		columns:[		{colName:'Tipe',className:'edit_router router_type',classVal:'tipe'},
						{colName:'Macboard',className:'info',classVal:'macboard'},
						{colName:'Lokasi',className:'',classVal:'location'},
						{colName:'Petugas',className:'info',classVal:'createuser'},
						{colName:'Tgl Pasang',className:'info',classVal:'createdate'},
						],		
		actions:{colName:'Aksi',columns:[{actName:'remove',actClass:'remove_router',actIcon:'icon-home'},{actName:'edit',actClass:'edit_router',actIcon:'icon-pencil'
		}]}
	});
});
$(".btnWithdrawnRouter").click(function(){
	$(this).setButtonActive({value:'1'});
	$('.btnCurrentRouter').setButtonActive({value:'0'});
	$("#tRouter tbody").empty();
	$("#tRouter").fillContent({
		url:thisdomain+'site_routers/get_by_site_id',
		keyid:'client_site_id',
		keyval:$('#client_site_id').val(),
		ioflag:'0',
		removerClass:'removeRouter',editerClass:'edit_router',device_name:'Router',
		dUpdaterBtn:'updaterouter',dSaverBtn:'saverouter',editDialog:'weleh',
		totalLabelId:'total_router',
		columns:[		{colName:'Tipe',className:'edit_router router_type',classVal:'tipe'},
						{colName:'Macboard',className:'info',classVal:'macboard'},
						{colName:'Lokasi',className:'',classVal:'location'},
						{colName:'Petugas',className:'info',classVal:'updateuser'},
						{colName:'Tgl Tarik',className:'info',classVal:'withdrawdate'},
						],		
	});
});
$.fn.routerchanged = function(options){
	var settings = $.extend({
		divelem1:'donot let this empty',
		elem1:'donot let this empty',
		divelem2:'donot let this empty',
		elem2:'donot let this empty'
	},options);
	var _this = $(this);
	switch(_this.val()){
		case '0':
			$('#'+settings.divelem1).show();
			$('#'+settings.elem1).addClass('inp_router');
			$('#'+settings.divelem2).hide();
			$('#'+settings.elem2).removeClass('inp_router');
		break;
		case '1':
			$('#'+settings.divelem2).show();
			$('#'+settings.elem2).addClass('inp_router');
			$('#'+settings.divelem1).hide();		
			$('#'+settings.elem1).removeClass('inp_router');		
		break;
	}
}
$('#pemilik_router').change(function(){
	var _this = $(this);
	_this.routerchanged({
		divelem1:'router_pelanggan',
		elem1:'tipe_router_pelanggan',
		divelem2:'router_padinet',
		elem2:'tipe_router'
	});
});
