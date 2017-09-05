var thisdomain = 'http://localhost/ace_accounting/index.php/';
$(document).ready(function(){
	/*
	var oTable1 = $('#sample-table-2').dataTable( {
		"aoColumns": [
	      { "bSortable": false },
	      null, null,null, null, null,
		  { "bSortable": false }
		] } );
	*/
	$("#btnaddbos").click(function(){
		//window.location.href = thisdomain+"adm/penerimaanbos";
		$("#bBOS").modal();
	});
	
	$("#btnremovebos").click(function(){
		$.post(thisdomain+"adm/bosremove",{id:$(this).attr("bosid")}).done(function(data){}).fail(function(){alert("Tidak bisa menghapus BOS, hubungi Developer")});
		//$("#sample-table-2").child()
	});
	
	$(".removebos").click(function(){
		$("#btnremovebos").attr("bosid",$(this).parent().parent().parent().attr("objid"));
		$("#bModal").modal();
	});

	$("#btnaddinsidentil").click(function(){
		$.post(thisdomain+'adm/incomeadd',{date:changeformat($("#tanggal").val()),description:$("#uraian").val(),account:$("#account").val(),contraaccount:$("#contraaccount").val(),amount:$("#amount").val(),source:'BOS'}).fail(function(){
			alert("Tidak dapat menyimpan insidentil, hubungi Developer");}).done(function(data){
//			alert(data);
/*				$("#tinsidentil").dataTable().fnAddData([
				                                         '<label class="center"><input type="checkbox"><span class="lbl"></span></label>',
				                                         '<a>'+$("#uraian").val()+'</a>',
				                                         $("#amount").val(),
				                                         $("#tanggal").val(),$("#student").val(),'1106',
				                                         '<div class="hidden-phone visible-desktop action-buttons"><a class="green"><i class="icon-pencil bigger-130"></i></a><a class="red"><i class="icon-trash bigger-130"></i></a></div>'
				                                         ]);*/
			});
		$("#bBOS").modal("hide");
	});
});

changeformat = function(mydate){
	out = mydate.split("-");
	return out[2]+'-'+out[1]+'-'+out[0];
}
