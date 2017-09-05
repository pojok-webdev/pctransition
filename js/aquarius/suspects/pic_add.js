$(document).ready(function(){
	$("#btnnextdata").click(function(){
		window.location.href = thisdomain+'suspects/subscription_confirmation/'+$('#clientid').val();
	});
	$("#btnprevdata").click(function(){
		window.location.href = thisdomain+'suspects/add_suspect/'+$('#clientid').val();
	});

                    $("#insertpic").click(function(){
		$.post(thisdomain+'suspects/pic_add_x',{client_id:$('#clientid').val(),name:$('#name').val(),position:$('#picposition :selected').text(),hp:$('#handphone').val(),email:$('#email').val()}).done(function(){
			$("#tblpics").append('<tr><td>'+$('#name').val()+'</td><td>'+$('#picposition :selected').text()+'</td><td>'+$('#email').val()+'</td><td>'+$('#handphone').val()+'</td></tr>');
			$('#name').val('');
			$('#handphone').val('');
			$('#email').val('');
		}).fail(function(){
			alert('Tidak dapat menyimpan PIC, silakan hubungi Developer');
		});
	});
	$("#btnaddsuspect").click(function(){
		$("#dAddPic").modal();
	});
	$("#savePic").click(function(){
		$(".inp_pic").makekeyvalparam();
		$.ajax({
			url:thisdomain+"pics/save",
			data:JSON.parse('{'+$(".inp_pic").attr("keyval")+'}'),
			type:"post"
		}).done(function(data){
			console.log("data tersimpan");
			$("#tblpics tbody").append('<tr><th width="25%">'+$("#pic_name").val()+'</th><th width="25%">'+$("#pic_position :selected").text()+'</th><th width="25%">'+$("#pic_email").val()+'</th><th width="25%">'+$("#pic_hp").val()+'</th></tr>');
		}).fail(function(){
			console.log("error data tidak tersimpan");
		});
	});
	$(".closemodal").click(function(){
		$("#dAddPic").modal("hide");
	});
});
