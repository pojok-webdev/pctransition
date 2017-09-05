(function($){
	$(".btn_addpccard").click(function(){
		$('.updatepccard').hide();
		$("#dPCCard").modal();
	});
	$("#tblpccards").on("click",".remove_pccard",function(){
		var selected = $(this).stairUp({level:3});
		$("#dConfirmation").removeConfirmation({
			removeUrl:thisdomain+"install_sites/delete_pccard",
			idElement:selected.attr("myid"),
			selectedElement:selected,
			totalElement:"total_pccard",
			tableElement:"tblpccards",
		});
	});
	$("#savepccard").click(function(){
		$.post(thisdomain+'install_sites/add_pccard',{install_site_id:$('#workplace').attr('install_site_id'),name:$("#pccards :selected").text(),macaddress:$("#pccard_macaddress").val(),createuser:$("#createuser").val()}).fail(function(){
			alert("Tidak dapat menyimpan PC Card, silakan hubungi Developer");
		}).done(function(data){
			$('#tblpccards').append('<tr myid='+data+'><td>'+$('#pccards :selected').text()+'</td><td class="info"><a>Macboard: '+$('#pccard_macaddress').val()+'</a> <span></td><td><a><span class="icon-trash pointer remove_pccard" pccard_id='+data+' ></span></a></td></tr>');
			update_rowcount($("#total_pccard"),$("#tblpccards tbody tr"));
		});
		$("#dPCCard").modal("hide");
	});
}(jQuery))
