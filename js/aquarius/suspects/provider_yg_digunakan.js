$(document).ready(function(){
	$.getJSON(thisdomain+'suspects/getApps/'+$('#suspect_id').val(),function(data){
		$.each(data,function(x,y){
			$('.appChk[appname="'+y+'"]').prop('checked',true);
		});
	});
	$("#btnnextdata").click(function(){
		$('.inp_suspect').makekeyvalparam();
		$.each($('.appChk:checked'),function(){
			$.ajax({
				url:thisdomain+"suspects/save_app",
				data:{client_id:$("#suspect_id").val(),name:$(this).attr("appname")},
				type:"post",
				async:false
			}).fail(function(){
				console.log("Tidak dapat mengupdate aplikasi pelanggan, silakan hubungi Developer");
			});
		});
		$.ajax({
			url:thisdomain+"suspects/edit_client",
			data:JSON.parse('{'+$('.inp_suspect').attr('keyval')+'}'),
			type:"post",
			async:false
		}).fail(function(){
			alert('Tidak dapat mengupdate Suspect, silakan hubungi Developer');
		}).done(function(){
			$("#end_of_contract").getdate();
			$.ajax({
				url:thisdomain+'suspects/updatebyclientid',
				data:{media:$('#media :selected').text(),speed:$('#speed :selected').text(),duration:$("#duration :selected").text(),usage_period:$("#usage_period :selected").text(),user_amount:$("#user_amount :selected").text(),fee:$("#fee :selected").text(),operator:$("#operator :selected").text(),end_of_contract:$("#end_of_contract").attr("datetime"),problems:$("#problems :selected").text(),client_id:$("#suspect_id").val()},
				type:'post'
			})
			.done()
			.fail();
			window.location.href = thisdomain+'suspects/internet_need_confirmation/'+$('#suspect_id').val();
		});
	});
});
