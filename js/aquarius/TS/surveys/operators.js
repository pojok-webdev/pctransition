(function($){
    $(".btnaddoperator").click(function(){
		$("#dAddOperator").modal("show");
	});
	$('.petugasSurvey').click(function(){
		var nama = $(this).attr('username'),
			email = $(this).attr('surveyor_email'),
			img = $(this).find('.imageholder img').attr("src"),
			tr = '';
		$.post(thisdomain+"adm/addsurveyofficer",{
			survey_request_id:$('#survey_request_id').val(),
			name:nama,
			email:email,
			createuser:$('#createuser').val()
		}).done(function(data){
			tr += '<tr><td class="info">';
			tr += '<a><img src="'+img+'" width=20 height=20  class="img-polaroid" /></a>';
			tr += '</td><td>';
			tr += '<a>'+nama+'</a></td>';
			tr += '<td class="info"><a>'+nama+'</a></td>';
			tr += '<td>'+email+'</td>';
			tr += '<td><a><span class="icon-trash surveyor_remove" surveyor_id="'+data+'" ></span></a></td>';
			tr += '</tr>';
			$('.tsurveyor tbody').append(tr);
			$("#total_surveyor").html($(".tsurveyor tbody tr:last").index()+1);
		}).fail(function(){
			alert('Tidak dapat menambah Petugas Survey');
		});
		$("#dAddOperator").modal("hide");
	});
    $('.tsurveyor').on('click','.surveyor_remove',function(){
		$.post(thisdomain+'surveys/remove_surveyor',{id:$(this).attr('surveyor_id')}).done(function(data){
			$("#total_surveyor").html($(".tsurveyor tbody tr:last").index()+1);
		});
		$(this).stairUp({level:3}).remove();
	});
}(jQuery))
