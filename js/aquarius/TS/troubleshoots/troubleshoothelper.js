/*
 * WRITTEN by PUJI W PRAYITNO
 * 062015
 * mailto:puji@padi.net.id
 * */
var device = {
	name:'tes',
	tipe:'best',
	id:45,
	remove:function(){
		console.log("fungis ini harus dioverride !");
		},
	edit:function(){
		console.log("fungis ini harus dioverride !");
		}
}
$.fn.setButtonActive = function(options){
	var settings = $.extend({value:'1'},options);
	if(settings.value === '1'){
		$(this).removeClass('btn-link');
		$(this).addClass('btn-success');
	}else{
		$(this).removeClass('btn-success');
		$(this).addClass('btn-link');		
	}
}
$.fn.fillContent = function(options){
	var settings = $.extend({
		url:'te',keyid:'te',keyval:'te',ioflag:'1',
		removerClass:'remove_router',
		editerClass:'should be ovveridden',
		totalLabelId:'total_router',
		editerurl:'te',
		removeAction:function(){},
		inpclass:'te',device_name:'te',
		dUpdaterBtn:'you should fill this with dialog button',
		dSaverBtn:'you should fill this with dialog button',
		editDialog:'you should override this',
		modalLabelId:'Dialog Title',modalLabel:'Add/Edit Device',
		columns:[		{colName:'Tipe',className:'edit_router router_type',classVal:'tipe'},
						{colName:'Macboard',className:'info',classVal:'macboard'},
						{colName:'Lokasi',className:'',classVal:'location'}],
		actions:[]
	},options);
	var thistable = $(this);
	$.ajax({
		url:settings.url,
		type:'post',
		data:JSON.parse('{"'+settings.keyid+'":"'+settings.keyval+'","ioflag":"'+settings.ioflag+'"}'),
		dataType:'json'
	}).done(function(data){
		var trStr = '<tr>';
		for(i = 0;i < settings.columns.length;i++){
			trStr += '<th>'+settings.columns[i].colName+'</th>';
		}
		if(settings.actions.columns){
			if(settings.actions.columns.length>0){
				trStr += '<th width=40>'+settings.actions.colName+'</th>';
			}
		}
		trStr += '</tr>';
		thistable.find("thead").html("");
		thistable.find("thead").append(trStr);
		$.each(data,function(key,val){
			$.each(val, function(x,y){
				var trStr = '<tr trid="'+y.id+'">';
				for(var i=0;i<settings.columns.length;i++){
					trStr += '<td class="'+settings.columns[i].className+'">'+y[settings.columns[i].classVal]+'</td>';
				}
				if(settings.actions.columns){
					if(settings.actions.columns.length>0){
						trStr += '<td>';
						for(var i=0;i<settings.actions.columns.length;i++){
							trStr += '<a><span class="'+settings.actions.columns[i].actIcon+' '+settings.actions.columns[i].actClass+'"></span></a>';
						}
						trStr += '</td>';
					}
				}
				trStr += '</tr>';
				thistable.find("tbody").prepend(trStr);
			})
		});
		$("#"+settings.totalLabelId).html("Total : "+thistable.find("tbody tr").length);
		$("."+settings.removerClass).each(function(){
			$(this).click(function(){
				var _this = $(this);
				device.remove = settings.removeAction;
				thistable.find("tbody tr").each(function(){
					$(this).removeClass("selected");
				});
				_this.stairUp({level:3}).addClass("selected");
				$("#deviceName").html(settings.device_name);
				$("#deviceType").html(thistable.find("tbody tr.selected ."+settings.columns[1].className).html());
				device.id = thistable.find("tbody tr.selected").attr("trid");
				device.tipe = thistable.find("tbody tr.selected").find("."+settings.columns[1].className).html();
				device.name = settings.device_name;
				$("#dWithdraw").modal();
			});
		});
		$("."+settings.editerClass).click(function(){
				var _this = $(this);
				thistable.find("tbody tr").each(function(){
					$(this).removeClass("selected");
				});
				_this.stairUp({level:3}).addClass("selected");
				$("#deviceName").html("Router");
				$("#deviceType").html(thistable.find("tbody tr.selected ."+settings.columns[1].className).html());
				device.id = thistable.find("tbody tr.selected").attr("trid");
				device.tipe = thistable.find("tbody tr.selected").find("."+settings.columns[1].className).html();
				device.name = settings.device_name;
				$('#'+settings.dUpdaterBtn).show();
				$('#'+settings.dSaverBtn).hide();
				$('#'+settings.modalLabelId).html(settings.modalLabel);
				$.ajax({
					url:settings.editerurl,
					data:{id:thistable.find('tbody tr.selected').attr('trid')},
					type:'post',
					dataType:'json',
					async:false
				}).done(function(data){
					$('.'+settings.inpclass).each(function(){
						var elem_name = $(this).attr('name');
						/*switch($(this).attr('type')){
							case 'select':
								console.log('has select component');
								$(this).populateCombo({
									keyvalpaired:false,
									url:thisdomain+'devices/getdevice/14',
									selected:data[$(this).attr('name')],
									type:'get',
									namebasedselect:true									
								});
							break;
							case 'selectid':
								console.log('has selectid component');
								$(this).populateCombo({
									keyvalpaired:true,
									url:$(this).attr('datasrc'),
									selected:'156',
									type:'get',
									namebasedselect:false									
								});
							break;
							default:
							$(this).val(data[$(this).attr('name')]);
							break;
						}*/
						$('#pemilik_router').change();
						$(this).val(data[$(this).attr('name')]);
					});					
				});
				$('#'+settings.editDialog).modal();
		});
	}).fail(function(){
		console.log("error retrieve data");
	});
}
$("#removeDeviceBtn").click(function(){
	device.remove({
		url:thisdomain+'troubleshoots/device_withdrawal',
		data:{"device_id":device.id,"device":device.name,"modul":"troubleshoot","status":$("#status").val(),"createuser":$("#createuser").val()},
		type:'post',
		device_id:device.id
	});
});
$(".closemodal").click(function(){
	$(this).stairUp({level:3}).modal("hide");
});
$('.myeditor').cleditor({width:'300',height:'100',controls:"bold italic underline | color highlight removeformat | bullets numbering"});
