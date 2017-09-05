myeditor = $('.myeditor').cleditor({width:'300',height:'100',controls:"bold italic underline | color highlight removeformat | bullets numbering"});

$('#btnaddupstream').click(function(){
	$("#btnupdateupstream_").hide();
	$("#btnsaveupstream").show();
	$("#upstream").val("");
	$("#ucomplaint").val("");
	$("#ureporter").val("");
	$("#ureporterphone").val("");
	$("#selectedClient tbody tr").remove();
	$('#dAddUpstream').modal();
});
$('#btnLookUp').click(function(){
	$('#dClientLookup').modal();
});
$('#clientLookup').dataTable({
	"bLengthChange":false
});
$('#clientLookup').on('click','tbody tr',function(){
	var that = $(this);
	console.log('HTML',$(this).html());
	console.log('TRID',$(this).attr('trid'));
	$('#selectedClient tbody').append('<tr trid="'+that.attr('trid')+'" siteid="'+that.attr('siteid')+'" class="newClient"><td class="sname">'+$(this).find('.cName').html()+'</td><td class="saddress">'+$(this).find('.cAddress').html()+'</td><td class="removeClient">Hapus</td></tr>');
	$('#dClientLookup').modal('hide');
});
$('#selectedClient').on('click','tbody tr td.removeClient',function(){
	$(this).stairUp({level:1}).remove();
});
var suggests = {xl:"xl",is:"indosat",ip:"Iconplus",ni:"napinfo",la:"lintasarta",th:"tellon"};
$.ajax({
	url:thisdomain+"datacenters/get",
	dataType:"json"
}).done(function(datacenter){
	$.each(datacenter,function(x,y){
		console.log("DATACENTER",x,y);
	});
});
$('#upstreamtype').change(function(){
	switch($(this).val()){
		case "backbone":
			$("#dudescription").show();
			console.log("BACKBONE SELECTED");
			$.ajax({
				url:thisdomain+"backbones/get",
				dataType:"json"
			}).done(function(backbone){
				$('#upstream').autocomp({
					data:backbone
				});			
			});
		break;
		case "bts":
			$("#dudescription").hide();
			console.log("BTS SELECTED");
			$.ajax({
				url:thisdomain+"btses/get",
				dataType:"json"
			}).done(function(bts){
				$('#upstream').autocomp({
					data:bts
				});			
			});
		break;
		case "datacenter":
			$("#dudescription").hide();
			console.log("DATACENTER SELECTED");
			$.ajax({
				url:thisdomain+"datacenters/get",
				dataType:"json"
			}).done(function(datacenter){
				$('#upstream').autocomp({
					data:datacenter
				});			
			});
		break;
		case "ptp":
			$("#dudescription").hide();
			console.log("PTP SELECTED");
			$.ajax({
				url:thisdomain+"ptps/gets",
				dataType:"json"
			}).done(function(ptp){
				$('#upstream').autocomp({
					data:ptp
				});			
			});
		break;
		case "core":
			$("#dudescription").show();
			console.log("CORE SELECTED");
			$.ajax({
				url:thisdomain+"cores/gets",
				dataType:"json"
			}).done(function(core){
				$('#upstream').autocomp({
					data:core
				});			
			});
		break;
		case "ap":
			$("#dudescription").show();
				console.log("CORE SELECTED");
				$.ajax({
					url:"/aps/getplus",
					dataType:"json"
				}).done(function(core){
					$('#upstream').autocomp({
						data:core
					});			
				});
		break;
	}
});
switch($('.upstreamtype').val()){
	case "backbone":
		$("#dudescription").show();
			console.log("BACKBONE SELECTED");
			$.ajax({
				url:thisdomain+"backbones/get",
				dataType:"json"
			}).done(function(backbone){
				$('#upstream').autocomp({
					data:backbone
				});			
			});
//			suggests = {xl:"xl",is:"indosat",ip:"Iconplus",ni:"napinfo",la:"lintasarta",th:"tellon"};
//			$('#upstream').autocomp({
//				data:suggests
//			});			
	break;
	case "bts":
		$("#dudescription").hide();
			console.log("BTS SELECTED");
			$.ajax({
				url:thisdomain+"btses/get",
				dataType:"json"
			}).done(function(bts){
				$('#upstream').autocomp({
					data:bts
				});			
			});
//			suggests = {tr:"trinity",ne:"neo",ar:"architect",or:"oracle",km:"keymaker",rl:"roland"};
//			$('#upstream').autocomp({
//				data:suggests
//			});			
	break;
	case "datacenter":
		$("#dudescription").hide();
			console.log("DATACENTER SELECTED");
			$.ajax({
				url:thisdomain+"datacenters/get",
				dataType:"json"
			}).done(function(datacenter){
				$('#upstream').autocomp({
					data:datacenter
				});			
			});
	break;
	case "ptp":
		$("#dudescription").hide();
			console.log("PTP SELECTED");
			$.ajax({
				url:thisdomain+"ptps/gets",
				dataType:"json"
			}).done(function(ptp){
				$('#upstream').autocomp({
					data:ptp
				});			
			});
	break;
	case "core":
		$("#dudescription").show();
			console.log("CORE SELECTED");
			$.ajax({
				url:thisdomain+"cores/gets",
				dataType:"json"
			}).done(function(core){
				$('#upstream').autocomp({
					data:core
				});			
			});
	break;
	case "ap":
		$("#dudescription").show();
			console.log("CORE SELECTED");
			$.ajax({
				url:"/paps/getplus",
				dataType:"json"
			}).done(function(core){
				$('#upstream').autocomp({
					data:core
				});			
			});
	break;
}
$('#btnsaveupstream').click(function(){
	var dataproperty = {
				clientname:$("#upstream").val(),
				requesttype:$("#upstreamtype :selected").text(),
				complaint:$("#ucomplaint").val(),
				reporter:$("#ureporter").val(),
				//ticketstart:$("#ticketstart").formatDate({inputFormat:"dd/MM/YYYY",outputFormat:"YYYY-MM-dd"}),
				reporterphone:$("#ureporterphone").val(),
				downtimestart:"0000-00-00 00:00:00",
				downtimeend:"0000-00-00 00:00:00",
			};
			switch($("#upstreamtype :selected").text().toLowerCase()){
				case "backbone":
					dataproperty.backbone_id=$("#upstream").attr("key");
					dataproperty.description=$("#udescription").val();
				break;
				case "bts":
					dataproperty.btstower_id=$("#upstream").attr("key");
				break;
				case "datacenter":
					dataproperty.datacenter_id=$("#upstream").attr("key");
				break;
				case "ptp":
				console.log("PTP KEY",$("#upstream").attr("key"));
					dataproperty.ptp_id=$("#upstream").attr("key");
				break;
				case "core":
				console.log("CORE KEY",$("#upstream").attr("key"));
					dataproperty.core_id=$("#upstream").attr("key");
					dataproperty.description=$("#udescription").val();
				break;
				case "ap":
				console.log("APS KEY",$("#upstream").attr("key"));
					dataproperty.ap_id=$("#upstream").attr("key");
					dataproperty.description=$("#udescription").val();
				break;
				default:
					console.log("x",$("#upstreamtype :selected").text());
				break;
			}
		$.ajax({
			url:thisdomain+'tickets/saves',
			data:dataproperty,
			type:'post'
		})
		.done(function(res){
			console.log("RESULT",res);
			var immediateFU = false;
					/*start test followup ticket*/
					switch($("#upstreamtype :selected").text().toLowerCase()){
						case "backbone":
							immediateFU = true;
						break;
						case "core":
							immediateFU = true;
						break;
						default:
							immediateFU = false;
						break;
					}
					if(immediateFU){
						$.post(thisdomain + 'ticket_followups/add', {
							ticket_id: res,
							result: '0',
							followUpDate: $(this).currentTime({format:"YYYY-MM-dd HH:mm:ss"}),//getdate('sql','00:00:00'),
							picname: $("#ureporter").val(),
							description: $("#udescription").val(),
							confirmationresult: '-',
							position: '-',
							picphone: $("#ureporterphone").val(),
							username: $('#createuser').val()
						}).done(function (data) {
							console.log("TEST FOLLOUWYP TICKET",data);

						}).fail(function () {
							console.log('Tidak bisa mengupdate Follow Up, silakan hubungi Developer');
						});						
					}
				/*end test followup ticket*/
			
			
			$("#selectedClient tbody tr").each(function(){
				var that = $(this);
				console.log("NAME",that.find(".sname").html());
				console.log("CLIENTID",that.attr("trid"));
				$.ajax({
					url:thisdomain+'tickets/saves',
					data:{
						"clientname":that.find(".sname").html()+"("+$("#upstreamtype :selected").text()+"-"+$("#upstream").val()+")",
						//"clientname":that.find(".sname").html(),
						"client_id":that.attr("trid"),
						"client_site_id":that.attr("siteid"),
						"parentid":res,
						"requesttype":"pelanggan",
						"reporter":"pelanggan komplain",
						"downtimestart":"0000-00-00 00:00:00",
						"downtimeend":"0000-00-00 00:00:00"
					},
					type:'post'
				})
				.done(function(resu){
					console.log("RESU",resu);
					//updateRecordRow();
				})
				.fail(function(){
					console.log("fail to save upstream children");
				});
			});
			updateRecordRow();
		})
		.fail(function(err){
			console.log("Fail save upstream parent__",err);
		});
});
$('#btnupdateupstream_').click(function(){
	console.log("DESCRIPTION",$("#udescription").val());
	var parentid = $("#tbl_ticket tbody tr.selected").attr("thisid");
	console.log("COMPLAINT",$("#complaint").val());
	console.log("REPORTER",$("#reporter").val());
	console.log("REPORTERPHONE",$("#reporterphone").val());
	
		$.ajax({
			url:thisdomain+'tickets/update',
			data:{
				id:parentid,
//				status:$("#eUpstreamStatus").val(),
				status:"0",
				clientname:$("#upstream").val(),
				requesttype:$("#upstreamtype :selected").text(),
				complaint:$("#ucomplaint").val(),
				reporter:$("#ureporter").val(),
				reporterphone:$("#ureporterphone").val(),
				downtimestart:"0000-00-00 00:00:00",
				downtimeend:"0000-00-00 00:00:00",
				description:$("#udescription").val()
			},
			type:'post'
		})
		.done(function(res){
			console.log("RESULT",res);
			$("#selectedClient tbody tr.newClient").each(function(){
				var that = $(this);
				console.log("NAME",that.find(".sname").html());
				console.log("CLIENTID",that.attr("trid"));
				console.log("siteID",that.attr("siteid"));
				$.ajax({
					url:thisdomain+'tickets/saves',
					data:{
						"clientname":that.find(".sname").html()+"("+$("#upstreamtype :selected").text()+"-"+$("#upstream").val()+")",
						"client_id":that.attr("trid"),
						"client_site_id":that.attr("siteid"),
						"parentid":parentid,
						"requesttype":"pelanggan",
						"reporter":"pelanggan komplain",
						"downtimestart":"0000-00-00 00:00:00",
						"downtimeend":"0000-00-00 00:00:00"
					},
					type:'post'
				})
				.fail(function(){
					console.log("fail to save upstream children");
				})
				.done(function(ticketid){
					//updateRecordRow();
				});
			});
			updateRecordRow();
		})
		.fail(function(){
			console.log("Fail save upstream parent__");
		});
});
