/*
 * WRITTEN BY PUJI W PRAYITNO
 * 072015
 * emailto: puji@padi.net.id
 * */
solusi = $('.myeditor').cleditor({width:'300',height:'100',controls:"bold italic underline | color highlight removeformat | bullets numbering"});
$('.btn_addofficer').click(function(){
	$('#dAddOfficer').modal();
});
$('.userpic').click(function(){
	var _this = $(this);
	$.ajax({
		url:thisdomain+'troubleshoot_officers/save',
		data:{troubleshoot_request_id:$('#troubleshoot_id').val(),name:_this.attr('officer_name'),createuser:$('#createuser').val()},
		type:'post'
	}).done(function(data){
		$('#tOfficer tbody').append('<tr trid='+data+'><td class="officername">'+_this.attr('officer_name')+'</td><td class="removeOfficer pointer">Hapus</td></tr>');
		$('.removeOfficer').click(function(){
			$(this).doRemoveTableRow({
				removerButtonDepth:1,
				tableName:'tOfficer',
				url:thisdomain+'troubleshoot_officers/rmv'
			});
		});		
		$('#dAddOfficer').modal('hide');
		update_rowcount($("#total_installer"),$("#tOfficer tbody tr"));
	}).fail(function(){
		console.log('Tidak dapat menyimpan User');
	});
});
$('.removeOfficer').click(function(){
	$(this).doRemoveTableRow({
		removerButtonDepth:1,
		tableName:'tOfficer',
		url:thisdomain+'troubleshoot_officers/rmv'
	});
});
