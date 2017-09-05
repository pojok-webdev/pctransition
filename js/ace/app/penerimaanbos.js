var thisdomain = "http://localhost/ace_accounting/index.php/";
$(document).ready(function(){
	$("#btnsimpanbos").click(function(){
		$.post(thisdomain+"adm/incomeadd",{date:changeformat($("#tanggal").val()),description:$("#uraian").val(),source:"BOS",source_id:"",account:$("#account").val(),contraaccount:$("#lawanakun").val(),amount:$("#jumlah").val(),}).done(function(data){
			window.location.href = thisdomain+'adm/penerimaanboslist';
			}).fail(function(){alert("Tidak bisa menyimpan BOS, hubungi developer");});
	});
	$('.date-picker').datepicker().next().on(ace.click_event, function(){
		$(this).prev().focus();
	});
	$('[data-rel=tooltip]').tooltip({container:'body'});
	$('textarea[class*=autosize]').autosize({append: "\n"});
})

changeformat = function(mydate){
	out = mydate.split("-");
	return out[2]+'-'+out[1]+'-'+out[0];
}
