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
		$("#bModal").modal();
	});
	
	$("#btnaddblockgrant").click(function(){
		$.post(thisdomain+"adm/incomeadd",{date:changeformat($("#tanggal").val()),description:$("#uraian").val(),source:"Block Grant",source_id:"",account:$("#account").val(),contraaccount:$("#contraaccount").val(),amount:$("#amount").val(),}).done(function(data){
			window.location.href = thisdomain+'adm/penerimaanblockgrantlist';
			}).fail(function(){alert("Tidak bisa menyimpan Block Grant, hubungi developer");});
	});
	
	
	$("#btnremoveblockgrant").click(function(){
		$.post(thisdomain+"adm/bosremove",{id:$(this).attr("blockgrantid")}).done(function(data){}).fail(function(){alert("Tidak bisa menghapus BOS, hubungi Developer")});
		//$("#sample-table-2").child()
	});
	
	$(".removeblockgrant").click(function(){
		$("#btnremoveblockgrant").attr("blockgrantid",$(this).parent().parent().parent().attr("objid"));
		$("#bremoveblockgrant").modal();
	});
});

changeformat = function(mydate){
	out = mydate.split("-");
	return out[2]+'-'+out[1]+'-'+out[0];
}
