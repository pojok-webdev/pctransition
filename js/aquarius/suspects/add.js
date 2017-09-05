$(document).ready(function () {
	$.ajax({
		url:thisdomain+"clients/getJson/"+$("#client_id").val(),
		type:"get",
		dataType:"json"
	}).done(function(data){
		var found = false;
		console.log("Business_field : "+data["business_field"]);
		$("#businesstype option").each(function(){
			if($(this).val()===data["business_field"]){
				found = true;
				$(this).attr("selected","selected");
				$('#otherbusinesstype').hide();
			}
			console.log(this);
		});
		if(!found){
			$("#businesstype option").each(function(){
				if($(this).val()==="Lainnya"){
					$(this).attr("selected","selected");
					$('#otherbusinesstype').show();
				}
				console.log(this);
			});
		}
	});
	$("#btnnextdata").click(function () {
		if ($('#status').val() === 'new') {
			businessfield = ($('#businesstype :selected').text() === 'Lainnya') ? $('#otherbusinesstype').val() : $('#businesstype :selected').text();
			$('.inp_suspect').makekeyvalparam();
			$.post(thisdomain + 'suspects/add_client', JSON.parse('{"business_field":"' + businessfield + '","status":"0","active":"0",' + $('.inp_suspect').attr('keyval') + '}')).done(function (data) {
				window.location.href = thisdomain + "suspects/add_pic/" + data;
			}).fail(function () {
				alert('Tidak dapat menyimpan suspect, silakan hubungi Developer');
			});
		}
		if ($('#status').val() === 'edit') {
			businessfield = ($('#businesstype :selected').text() === 'Lainnya') ? $('#otherbusinesstype').val() : $('#businesstype :selected').text();
			$('.inp_suspect').makekeyvalparam();
			console.log($(".inp_suspect").attr("keyval"));
			console.log('thisdomain:' + thisdomain);
			console.log('Business Field : ' + businessfield);
			$.ajax({
				url: thisdomain + "suspects/edit_client",
				data: JSON.parse('{"business_field":"' + businessfield + '","id":"' + $("#client_id").val() + '",' + $(".inp_suspect").attr("keyval") + '}'),
				type: "post"
			}).done(function (data) {
				console.log("data tersimpan " + data);
				window.location.href = thisdomain + "suspects/add_pic/" + $('#client_id').val();
			}).fail(function () {
				console.log("error data tidak tersimpan");
			});
		}
	});
	if($("#businesstype :selected").text()==="Lainnya"){
		$("#otherbusinesstype").show();
	}
	if($("#businesstype :selected").text()!=="Lainnya"){
		$("#otherbusinesstype").hide();
	}
	$("#businesstype").change(function(){
		console.log("selected : ");
		if($("#businesstype :selected").text()==="Lainnya"){
			$("#otherbusinesstype").show();
		}
		if($("#businesstype :selected").text()!=="Lainnya"){
			$("#otherbusinesstype").hide();
		}
	});
});
