(function($){
solusi = $('.myeditor').cleditor({width:'300',height:'100',controls:"bold italic underline | color highlight removeformat | bullets numbering"});
	$.ajax({
		url:thisdomain+'troubleshoot_officers/removesession',
		type:'get'
	}).done(function(data){
		console.log('Remove session success');
	}).fail(function(){
		console.log('Failed to remove sessions')
	});
	$.ajax({
		url:thisdomain+'troubleshoots/getTicketInfo/',
		data:{id:$('#ticketid').text()},
		type:"post",
		dataType:"json"
	}).done(function(data){
		$("#troubleshoottype").val(data['requesttype']);
		$("#nameofmtype").val(data['clientname']);
		

		$('#nameofmtype').find('option').each(function(){
			if($(this).val()==data['client_id']){
				$(this).attr('selected',true);
			};				
		});
	});
	$.fn.fillContent = function(options){
		var settings = $.extend({
			url:'',type:''
		},options),_this = $(this)
		$.ajax({
			url:settings.url,
			type:settings.type,
			dataType:'json'
		}).done(function(data){
			for(var i=0;i<data.officers.length;i++){
			var tr = '<tr thisid="'+data.officers[i].id+'">';
				tr+= '<td>';
				tr+= '<a class="fancybox" rel="group" href="'+thisdomain+'media/users/'+data.officers[i].name.toLowerCase()+'.jpg">';
				tr+= '<img src="'+data.officers[i].img+'" class="img-polaroid" width=20 height=20 />';
				tr+= '</a>';
				tr+= '</td>';
				tr+= '<td class="info"><a>'+data.officers[i].name+'</a></td>';
				tr+= '<td>';
				tr+= '<a><span class="icon-trash pointer remove_officer"></span></a>';
				tr+= '</td>';
				tr+= '</tr>';
			_this.find('tbody').prepend(tr);	
			$('.remove_officer').click(function(){
				console.log("id",$(this).stairUp({level:3}).attr('thisid'));
				$('#tOfficer tbody tr').removeClass('selected');
				$(this).stairUp({level:3}).addClass('selected');
				$('#info_name').html('Anda hendak menghapus '+$(this).stairUp({level:3}).find('.info').html()+' ?');
				$('#dConfirmation').modal();
			})
			}
		}).fail(function(){
			console.log(settings.url,"failed");
		});
	}
	$('#btnConfirmationYes').click(function(){
		$.ajax({
			url:thisdomain+'troubleshoot_officers/remove',
			data:{name:$('#tOfficer tbody tr.selected').attr('thisid')},
			type:'post'
		}).fail(function(){
			console.log("error remove officer");
		}).done(function(data){
			console.log("deleted",data);
			$('#tOfficer tbody tr.selected').remove();
		});
	});
	$('.closemodal').click(function(){
		$(this).stairUp({level:4}).modal('hide');
	});
/*	$("#tOfficer").fillContent({
		url:thisdomain+'troubleshoot_officers/get',
		type:'post'
	});*/
	function savetroubleshoot(callback){
		$('.troubleshoot').makekeyvalparam();
		$('#request_date1').getSQLDate({
			exceed:7
		});
		someDate = $('#request_date1').attr('sqldate');
		console.log($('.troubleshoot').attr('keyval'));
		params = '{"ticket_id":"'+$('#ticketid').text()+'"';
		params+=',"username":"'+$('#workplace').attr('username')+'"';
		params+=',"solvedschedule":"'+someDate+'"';
		params+=',"complaint":"'+$('#complaint').html()+'"';
		params+=','+$('.troubleshoot').attr('keyval');
		params+='}';
			$.ajax({
				url:thisdomain+'troubleshoots/save',
				data:JSON.parse(params),
				type:'post',
				async:false
			}).done(function(data){
				callback(data);
			}).fail(function(err){
				alert("Error"+err);
			});
			
	}
	$('#troubleshoot_save').click(function(){
		var not_ok = true;
		if($("#request_date1").val().length){
			not_ok = false;
		}
		if($("#request_date2").val().length){
			not_ok = false;
		}
		if(not_ok){
			alert('Tgl tidak boleh kosong');
			console.log('OK');
		}else{
			savetroubleshoot(function(data){
				console.log('DATA',data);
				$.ajax({
					url:thisdomain+'troubleshoot_officers/savetodatabase',
					data:{troubleshoot_id:data},
					type:'post'
				}).done(function(){
					console.log("Add officer sukses");
					window.location.href = thisdomain+'troubleshoots/';
				}).fail(function(){
					console.log("Error tidak bisa add officer, id:",data);
				});
				
				
			});
/* set disabled
 * 
 * 			$('.troubleshoot').makekeyvalparam();
			console.log("keyval",$('.troubleshoot').attr('keyval'));
			$.ajax({
				url:thisdomain+'troubleshoots/save',
				data:JSON.parse('{"ticket_id":"'+$('#ticketid').text()+'",'+$('.troubleshoot').attr('keyval')+'}'),
				type:'post',
				async:false
			}).done(function(data){
				$.ajax({
					url:thisdomain+'troubleshoot_officers/savetodatabase',
					data:{troubleshoot_id:data},
					type:'post'
				}).done(function(){
					console.log("Add officer sukses");
				}).fail(function(){
					console.log("Error tidak bisa add officer, id:",data);
				});
//				window.location.href = thisdomain+'troubleshoots/';
			}).fail(function(){
				console.log("Error");
			});*/
		}
	});
	$('#btnAddRouter').click(function(){
		$('#dAddRouter').modal();
	});
	$('.btn_addofficer').click(function(){
		$('#dAddOfficer').modal();
	});
	$('#saverouter').click(function(){
		$('.router').makekeyvalparam();
		$.ajax({
			url:thisdomain+'troubleshoots/save_router',
			data:JSON.parse('{"troubleshoot_site_id":"1",'+$('.router').attr('keyval')+'}'),
			type:'post',
		}).done(function(data){
			$('#dAddRouter').modal('hide');
			window.location.href = thisdomain+'troubleshoots/edit/'+data;
		});
	});
	$('.petugasTroubleshoot').click(function(){
		var src = $(this).find('div.imageholder img').attr('src'),tr = '',_this = $(this);
		$.ajax({
			url:thisdomain+'troubleshoot_officers/savetosession',
			data:{name:$(this).attr('officer_name'),id:$(this).attr('officer_name')},
			type:'post'
		}).done(function(data){
			console.log("data",data);
			//$('#tOfficer tbody').empty();
			/*$('#tOfficer').fillContent({
				url:thisdomain+'troubleshoot_officers/get',
				type:'post'
			});*/
			
			tr += '<tr thisid="'+data+'">';
				tr+= '<td>';
				tr+= '<a class="fancybox" rel="group" href="'+src+'.jpg">';
				tr+= '<img src="'+src+'" class="img-polaroid" width=20 height=20 />';
				tr+= '</a>';
				tr+= '</td>';
				tr+= '<td class="info"><a>'+_this.attr('officer_name')+'</a></td>';
				tr+= '<td>';
				tr+= '<a><span class="icon-trash pointer remove_officer"></span></a>';
				tr+= '</td>';
				tr+= '</tr>';
			$('#tOfficer').find('tbody').prepend(tr);	
			$('.remove_officer').click(function(){
				console.log("id",$(this).stairUp({level:3}).attr('thisid'));
				$('#tOfficer tbody tr').removeClass('selected');
				$(this).stairUp({level:3}).addClass('selected');
				$('#info_name').html('Anda hendak menghapus '+$(this).stairUp({level:3}).find('.info').html()+' ?');
				$('#dConfirmation').modal();
			})
			
			
			$('#dAddOfficer').modal('hide');
		}).fail(function(){
			console.log("ora iso");
		});
	});
}(jQuery));
