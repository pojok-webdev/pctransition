var thisdomain = 'http://localhost/ace_accounting/index.php/';
$(document).ready(function(){
	$(".removeitem").click(function(){
		$("#confirmsource").text($(this).parent().parent().prev().prev().html());
		$("#confirmdate").text($(this).parent().parent().prev().prev().prev().html());
		$("#rowid").text($(this).parent().parent().parent().index());
		$("#dConfirmation").modal();
	});
	$("#tinsidentil").dataTable();
	$("#btn_addinsidentil").click(function(){
		$("#bModal").modal();
	});
	
	$("#btnadddps").click(function(){
		$.post(thisdomain+'adm/expenseadd',{date:changeformat($("#tanggal").val()),description:$("#uraian").val(),destination:'gaji guru',account:$("#account").val(),contraaccount:$("#contraaccount").val(),amount:$("#amount").val(),source_id:13}).fail(function(){
			alert("Tidak dapat menyimpan dana partisipasi, hubungi Developer");}).done(function(data){
				$("#tinsidentil").dataTable().fnAddData([
                     '<label class="center"><input type="checkbox"><span class="lbl"></span></label>',
                     '<a>'+$("#uraian").val()+'</a>',
                      $("#amount").val(),
                      $("#tanggal").val(),'Gaji Guru','1106',
                      '<div class="hidden-phone visible-desktop action-buttons"><a class="green"><i class="icon-pencil bigger-130"></i></a><a class="red"><i class="icon-trash bigger-130"></i></a></div>'
                      ]);
			});
		$("#bModal").modal("hide");
	});
	
	$("#btnremoveinsidentil").click(function(){
		//$.post(thisdomain+'adm/incomeremove',{id:$(this).attr("rowid");});
		$("#tinsidentil").dataTable().fnDeleteRow($("#rowid").text());
	});
	
	$(".date-picker").datepicker();
	
	
});

changeformat = function(mydate){
	out = mydate.split("-");
	return out[2]+'-'+out[1]+'-'+out[0];
}
