$(".svresume").click(function(){
	$.ajax({
		url:thisdomain+'install_requests/svresume',
		data:{'install_site_id':$('#install_site_id').val(),'resume':$('#siteresume').val()},
		type:'post'
	});
});
$(".addresume").click(function(){
	$("#addresume").show();
	$("#updateresume").hide();
	$("#dAddResume").modal();
});
$("#saveresume").click(function(){
	$.ajax({
		url:thisdomain+'install_requests/saveresume',
		data:{'install_site_id':$('#install_site_id').val(),'name':$('#resume').val(),'createuser':'puji'},
		type:'post'
	})
	.done(function(res){
		console.log(res);
		$("#tblResume tbody").append('<tr rowid='+res+' class="resumerow"><td class="info"><a class="resume_edit pointer">'+$('#resume').val()+'</a></td><td><a><span class="icon-remove resume_remove"></span></a></td></tr>');
		$("#total_resume").html($("#tblResume tbody tr:last").index()+1);
	})
	.fail(function(err){
		console.log(err);
	});
});
$("#tblResume tbody").on("click",".resume_remove",function(){
	$("#tblResume tbody tr").removeClass('selected');
	selected = $(this).stairUp({level:3});
	selected.addClass('selected');
	$.ajax({
		url:thisdomain+'install_requests/removeresume',
		data:{id:selected.attr('rowid')},
		type:'post'
	})
	.done(function(res){
		console.log(res);
		selected.remove();
		$("#total_resume").html($("#tblResume tbody tr:last").index()+1);
	})
	.fail(function(err){
		console.log(err);
	});
})
$('.myeditor').cleditor({width:'300',height:'160px',controls:"bold italic underline | color highlight removeformat | bullets numbering"});
