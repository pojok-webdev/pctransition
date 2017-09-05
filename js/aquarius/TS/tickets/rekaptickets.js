populateAllCombos = (elem) => {
	requesttype = elem.val();
	$('#client_id').populateCombo({
		keyvalpaired: true,
		url: thisdomain + 'tickets/get_client_name/' + requesttype
	});
	clientid = $('#client_id').val();
	if (requesttype === "pelanggan") {
		$("#client_site_div").show();
		$("#client_site_id").addClass("inp_ticket");
		$('#client_site_id').populateCombo({
			keyvalpaired: true,
			url: thisdomain + 'clients/get_combo_data_sites/' + clientid
		});
		$('#client_id').change(function () {
			clientid = $(this).val();
			$('#client_site_id').populateCombo({
				keyvalpaired: true,
				url: thisdomain + 'clients/get_combo_data_sites/' + clientid
			});
		});	
	} else {
		$("#client_site_div").hide();
		$("#client_site_id").removeClass("inp_ticket");
	}
}
populateTable = () => {
	$.ajax({
		url:thisdomain+"tickets/getRekap/"+$("#requesttype").val()+"/"+$("#client_id").val(),
		type:"get",
		dataType:"json"
	})
	.done(function(data){
		tTicket.fnClearTable();
		$("#curr_client_id").val($("#client_id").val());
		$("#curr_requesttype").val($("#requesttype").val());
		$("#rekapClientName").html(data.obj[0].clientname);
		$.each(data,function(x,y){
			$.each(y,function(a,b){
				tTicket.fnAddData([b["kdticket"], b["problem"], b["solusi"], b["status"], b["duration"],'<div class="btn-group"><button data-toggle="dropdown" class="btn dropdown-toggle">Action <span class="caret"></span></button><ul class="dropdown-menu"><li class="btnupdateticket"><a href="#">Edit</a></li><li class="btntroubleshoot"><a href="#">Troubleshoot</a></li><li class="btnfollowup pointer"><a>Follow Up Ticket</a></li><li class="btncloseticket"><a href="#">Close Ticket</a></li><li class="divider"></li><li class="btnremoveticket"><a href="#">Hapus</a></li></ul></div>']);
			});
		});
	})
	.fail(function(){
		console.log("Error tidak dapat menampilkan rekap");
	});	
}
populateAllCombos($("#requesttype"));	
if($('#curr_requesttype').val()==='' && $('#curr_client_id').val()===''){
	$("#dSearch").modal();
}else{
	populateTable();
}
$("#btnsearch").click(function(){
	$("#dSearch").modal();
});
var tTicket = $("#tbl_ticket").dataTable();
$("#btnprint").click(function(){
	openInNewTab(thisdomain+'tickets/rekappdf/'+$("#curr_requesttype").val()+"/"+$("#curr_client_id").val());
});
$("#requesttype").change(function(){
	populateAllCombos($(this));	
});
$("#showRekap").click(function(){
	populateTable();
});
$(".closemodal").click(function(){
	$(this).stairUp({level:2}).modal("hide");
});
