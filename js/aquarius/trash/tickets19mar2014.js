$(document).ready(function() {
	var pelangganopt = "";
	var btsopt = "";
	var backboneopt = "";
	var datacenteropt = "";
	var serviceopt = "";
	var locationopt = "";
		
/*	setInterval(function(){
		//$(".tbl_duration").timeago();
		/*
			$.post(thisdomain+'adm/differenceintimes',{starttime:"2014-02-25 12:12:00",endtime:"2014-02-26 14:12:20"}).done(function(data){
				$(".tbl_duration").html(data);
			}).fail(function(){
				alert("tidak bisa mencetak hasil "+thisdomain);
			});*/
	/*	},2000);*/
	
	$(".vartime").timeago();
		
	$('#addticket').click(function() {
		$("#requeststart").val(currentDate());
		$("#myModal").modal({
			backdrop: true,
			keyboard: true
			}).addClass('modal-big');
	});
	
	$("#btnsearch").click(function(){
		$("#dSearch").modal();
	});
	
	$("#btn-ticket").click(function(){
		$("#dEditTicket").modal();
	});
		
	$("#cleardowntime").click(function(){
		$("#ticketstart").val("");
		$("#ticketend").val("");
		$("#timetotal").html("");
		$("#resumeticket").html("");
		
	});

	$(".clientname").change(function(){
		$("#service").html("");
		serviceopt="";
		fillService($(this).val());
	});
	
	$(".clientname").change(function(){
		$("#location").html("");
		locationopt="";
		fillLocation($(this).val());
	});

	//$(".tbl_duration").html();
	
	$(".editticket").click(function(){
		requestid = $(this).attr("requestid");
		$.getJSON(thisdomain+'adm/getticket/'+requestid,function(data){
			
			$("#erequesttype option").each(function(){
				if($(this).val()===data['requesttype']){
					$(this).attr('selected','selected');	
				};
			});
			//alert(data['clientname']);
			$("#eclientname option").each(function(){
				//alert($(this).val());
				if($(this).val()===data['clientname']){
					$(this).attr('selected','selected');	
				};
			});
		});
		$("#dEditRequest").attr("idrequest",requestid);
		$("#dEditRequest").modal({
			backdrop: true,
			keyboard: true
			}).addClass('modal-big');

	});
	
	$(".modal").on("show",function(){
		$(this).find('.modal-body').css({
			width: "auto",
			height: "auto",
			"max-height": "100%"
		});
	});
	
	

	fillbackboneopt = function(x,y){
		backboneopt+="<option value="+x+">"+y+"</option>";
	}

	fillpelangganopt = function(x,y){
		pelangganopt+="<option value="+x+">"+y+"</option>";
	}

	filldatacenteropt = function(x,y){
		datacenteropt+="<option value="+x+">"+y+"</option>";
	}

	fillbtsopt = function(x,y){
		btsopt+="<option value="+x+">"+y+"</option>";
	}
	
	fillserviceopt = function(x,y){
		serviceopt+="<option value="+x+">"+y+"</option>";
	}
	
	filllocationopt = function(x,y){
		locationopt+="<option value="+x+">"+y+"</option>";
	}
	

	fillbackbone = function(){
		$.getJSON(thisdomain+'backbones/get',function(data){
			$.each(data,function(x,y){
				fillbackboneopt(x,y);
			});
			$(backboneopt).appendTo(".clientname");
		});
	}

	fillpelanggan = function(){
		$.getJSON(thisdomain+'clients/getnamekey',function(data){
			$.each(data,function(x,y){
				fillpelangganopt(x,y);
			});
			$(pelangganopt).appendTo(".clientname");
		});
	}

	filldatacenter = function(){
		$.getJSON(thisdomain+'datacenters/get',function(data){
			$.each(data,function(x,y){
				filldatacenteropt(x,y);
			});
			$(datacenteropt).appendTo(".clientname");
		});
	}
	fillbts = function(){
		$.getJSON(thisdomain+'btses/get',function(data){
			$.each(data,function(x,y){
				fillbtsopt(x,y);
			});
			$(btsopt).appendTo(".clientname");
		});
	}
	
	fillService = function(client_id){
		$(".service").empty();
		$.getJSON(thisdomain+'clients/getservices/'+client_id,function(data){
			$.each(data,function(x,y){
				fillserviceopt(x,y);
			});
			$(serviceopt).appendTo(".service");
		});
	}
	
	fillLocation = function(client_id){
		$(".location").empty();
		$.getJSON(thisdomain+'clients/getlocations/'+client_id,function(data){
			$.each(data,function(x,y){
				filllocationopt(x,y);
			});
			$(locationopt).appendTo(".location");
		});
	}
	
	switch($('.requesttype').val()){
		case 'pelanggan':
			fillpelanggan();
		break;
		case 'datacenter':
			filldatacenter();
		break;
		case 'backbone':
			fillbackbone();
		break;
		case 'bts':
			fillbts();
		break;
	}


	$('.requesttype').change(function(){
		$('.clientname').html("");
		switch($(this).val()){
			case 'pelanggan':
				fillpelanggan();
			break;
			case 'datacenter':
				filldatacenter();
			break;
			case 'backbone':
				fillbackbone();
			break;
			case 'bts':
				fillbts();
			break;
		}
	});

	$(".datetimepickers").datetimepicker({
		step:1,
		onChangeDateTime: function(a,b){
			start = $('#ticketstart').val();
			end   = $('#ticketend').val();
			result = start - end;
			$.post(thisdomain+'adm/differenceintimes2',{starttime:start,endtime:end}).done(function(data){
				$("#timetotal").html(data);
				$("#resumeticket").html(data);
			}).fail(function(){
				alert("tidak bisa mencetak hasil "+thisdomain);
			});
			}
	});
	
	$("#request_selesai").click(function(){
		$.post(thisdomain+"adm/ticketupdate",{requesttype:$("#requesttype").val(),clientname:$("#clientname :selected").text(),service:$("#service").val(),location:$("#location :selected").text(),cause:$("#cause :selected").text(),content:$("#content").val(),ticketstart:changeformat($("#ticketstart").val()),ticketend:changeformat($("#ticketend").val()),requeststart:changeformat($("#requeststart").val()),requestend:currentDate()}).done(function(data){
			//alert(data);
			$(".tickettable").dataTable().fnAddData([$("#clientname :selected").text(),$("#ticketstart").val(),$("#ticketend").val(),"","<td class='tbl_action editticket'><a class='icon-pencil'></a></td>"]);
			//alert(changeformat($("#requeststart").val()));
			}).fail(function(){
				alert("Update Ticket tidak berhasil, silakan hubungi Developer. This domain : "+thisdomain);
				});
		$("#myModal").modal("hide");
	});
	
	$("#request_belum_selesai").click(function(){
		$.post(thisdomain+"adm/ticketupdate",{requesttype:$("#requesttype").val(),clientname:$("#clientname :selected").text(),service:$("#service").val(),location:$("#location :selected").text(),cause:$("#cause :selected").text(),content:$("#content").val(),ticketstart:changeformat($("#ticketstart").val()),ticketend:changeformat($("#ticketend").val()),requeststart:changeformat($("#requeststart").val())}).done(function(data){
			//alert(data);
			$(".tickettable").dataTable().fnAddData([$("#clientname :selected").text(),$("#ticketstart").val(),$("#ticketend").val(),"","<td class='tbl_action editticket'><a class='icon-pencil'></a></td>"]);
			//alert(changeformat($("#requeststart").val()));
			}).fail(function(){
				alert("Update Ticket tidak berhasil, silakan hubungi Developer. This domain : "+thisdomain);
				});
		$("#myModal").modal("hide");
	});
	
	
	$("#erequest_selesai").click(function(){
	//	alert($("#dEditRequest").attr("idrequest"));
alert($("#econtent").val());
		$.post(thisdomain+"adm/requestupdate",{id:$("#dEditRequest").attr("idrequest"),requesttype:$("#erequesttype").val(),clientname:$("#eclientname :selected").text(),service:$("#eservice :selected").text(),location:$("#elocation :selected").text(),cause:$("#ecause :selected").text(),content:$("#econtent").val(),ticketstart:changeformat($("#ticketstart").val()),ticketend:changeformat($("#ticketend").val()),requeststart:changeformat($("#erequeststart").val())}).done(function(data){
//			alert(data);
//			$(".tickettable").dataTable().fnAddData([$("#clientname :selected").text(),$("#ticketstart").val(),$("#ticketend").val(),"","<td class='tbl_action editticket'><a class='icon-pencil'></a></td>"]);
			}).fail(function(){
				alert("Update Ticket tidak berhasil, silakan hubungi Developer. This domain : "+thisdomain);
				});
		$("#dEditRequest").modal("hide");
	});
	$("#erequest_belum_selesai").click();
});


changeformat = function(mydate){
	data = mydate.split(" ");
	
	out = data[0].split("/");
	return out[0]+'-'+out[1]+'-'+out[2] + ' ' + data[1];
}

currentDate = function(){
	var curDate = new Date();
	return curDate.getFullYear()+'-'+curDate.getMonth()+'-'+curDate.getDate()+' '+curDate.getHours()+':'+curDate.getMinutes()+':'+curDate.getSeconds();
}

requesttypechange = function(){
			switch($("#requesttype").val()){
			case 'pelanggan':
				fillpelanggan();
			break;
			case 'datacenter':
				filldatacenter();
			break;
			case 'backbone':
				fillbackbone();
			break;
			case 'bts':
				fillbts();
			break;
		}
	}
