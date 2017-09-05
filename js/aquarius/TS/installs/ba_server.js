(function($){
	$(".btn_addba").click(function(){
		$("#dAddBeritaAcara").modal("show");
	});
	$(".remove_ba").click(function(){
		$.post(thisdomain+'adm/baremove',{id:$(this).attr("ba_id")});
		$.post(thisdomain+"adm/get_rowcount",{modelname:'install_ba',colname:'install_site_id',colval:$('#workplace').attr('install_site_id')}).done(function(count){
			$("#total_ba").html('Total : '+count);
		});

	});
	$("#saveba").click(function(){
		$.post(thisdomain+'adm/baadd',{install_site_id:$("#workplace").attr("install_site_id"),createuser:$("#workplace").attr("user_name"),name:$("#nameba").val(),path:$("#pathba").val(),description:$("#descriptionba").val()}).done(function(data){
			$("#ba").appendba(data)
		}).fail(function(){
			alert("tidak dapat menambah Berita Acara, hubungi Developer");
		});
	});
}(jQuery))
$.fn.appendba = function(data){
	$(this).append('<tr><td><a class="fancybox" rel="group" href="'+baseurl+'db_teknis/media/installs/ba/'+$("#pathba").val()+'"><img src="'+baseurl+'db_teknis/media/installs/ba/'+$("#pathba").val()+'" class="img-polaroid" width=50 height=38 /></a></td><td>'+$("#nameba").val()+'</td><td class="info"><a>'+$("#pathba").val()+'</a> <span></span> <span></span></td><td>'+$("#descriptionba").val()+'</td><td><a><span class="icon-trash row_remove remove_ba" ba_id='+data+'></span></a></td></tr>');

	$.post(thisdomain+"adm/get_rowcount",{modelname:'install_ba',colname:'install_site_id',colval:$('#workplace').attr('install_site_id')}).done(function(count){
		$("#total_ba").html('Total : '+count);
	});
	$(".remove_ba").bind("click",function(){
		$.post(thisdomain+'adm/baremove',{id:$(this).attr("ba_id")});
		$.post(thisdomain+"adm/get_rowcount",{modelname:'install_ba',colname:'install_site_id',colval:$('#workplace').attr('install_site_id')}).done(function(count){
			$("#total_ba").html('Total : '+count);
		});
		$(this).parent().parent().parent().fadeOut(200);
	});
}
