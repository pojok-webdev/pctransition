(function($){
	$(".dttmcheck").each(function(){
		myorigin = $(this).html();
		if(issqlformatted(myorigin)){
			$(this).html(sql2idformat(myorigin));
		}
	});
	$(this).fieldUpdater({
		url:thisdomain+"disconnections/feedData",
		cellClass:'updatable',
		fieldName:'fieldName',
		idAttr:'myid',
		enabled:true
	});
	$('.btneditdisconnection').click(function(){
		id = $(this).stairUp({level:4}).attr('myid');
		window.location.href = thisdomain+'disconnections/edit/'+id;
	});
	$('.btndetaildisconnection').click(function(){
		id = $(this).stairUp({level:4}).attr('myid');
		window.location.href = thisdomain+'disconnections/detail/'+id;
	});
	$('.btndetailtemporerdisconnection').click(function(){
		id = $(this).stairUp({level:4}).attr('myid');
		window.location.href = thisdomain+'disconnections/detail_temporer/'+id;
	});
	$('.btnreaktifasidisconnection').click(function(){
		mytr = $(this).stairUp({level:4});
		myid = mytr.attr('myid');
		$(".disconnection_id").val(myid);
		$("#tDisconnections tbody tr").removeClass("selected");
		mytr.addClass("selected");
		$("#dReaktivasi").modal();
	});
	$('.btnpermanentdisconnection').click(function(){
		$("#tDisconnections tbody tr").removeClass("selected");
		mytr = $(this).stairUp({level:4});
		myid = mytr.attr('myid');
		mytr.addClass("selected");
		$(".disconnection_id").val(myid);
		$("#dPermanen").modal();
	});
	$('#tDisconnections').dataTable({
		"aLengthMenu": [[5, 10, 20, -1], [5, 10, 20, "All"]],
		"iDisplayLength": 5,
	});
	$(".btnperpanjangandisconnection").click(function(){
		thisrow = $(this).stairUp({level:4});
		myid = thisrow.attr('myid');
		$("#disconnection_id").val(myid);
		$.ajax({
			url:thisdomain+'disconnections/getmaxdate',
			data:{id:myid},
			type:'post',
			dataType:"json",
			async:false,
		}).done(function(data){
			mindate = new Date(sql2jsdate(data["mindate"]));
			maxdate = new Date(sql2jsdate(data["maxdate"]));
			$(".datepicker3m").datepicker("destroy");
			$(".datepicker3m").datepicker({minDate:mindate,maxDate:maxdate,dateFormat:'d/m/yy'})
			$("#tDisconnections tr").removeClass("selected");
			thisrow.addClass("selected");
			$("#dPerpanjangan").modal();
		});
	});
	$(".closemodal").click(function(){
		$(this).stairUp({level:3}).modal("hide");
	});
	$("#btnPerpanjanganSave").click(function(){
		$(".inp_disconnection").makekeyvalparam();
		$.post(thisdomain+'disconnections/update',JSON.parse('{'+$(".inp_disconnection").attr('keyval')+',"reactivationdate":"'+$("#finishdate").getdate().addhour($("#finishhour")).addminute($("#finishminute")).attr("datetime")+'"}')).done(function(data){
			$(this).showModal({
				message:"Data perpanjangan telah disimpan",
			});
		}).fail(function(){
			alert('Tidak dapat menjadikan permanen, silakan hubungi Developer');
		});
	});
	$("#btnReactivationSave").click(function(){
		$(".inp_reactivation").makekeyvalparam();
		$.post(thisdomain+'disconnections/update',JSON.parse('{'+$(".inp_reactivation").attr('keyval')+',"disconnectiontype":"0","status":"0"}')).done(function(data){
			$("#tDisconnections tbody tr.selected").find(".disconnectiontype").html("Reactivation");
			$("#tDisconnections tbody tr.selected").find(".status").html("Dalam Progress");
			$("#tDisconnections tbody tr.selected").find(".reactivation").html($("#reactivationdate").val());
			$(this).showModal({
				message:"Pengajuan Reaktivasi telah disimpan",
			});
		}).fail(function(){
			alert('Tidak dapat menjadikan permanen, silakan hubungi Developer');
		});
	});
	$("#btnPermanentSave").click(function(){
		$(".inp_permanent").makekeyvalparam();
		$.post(thisdomain+'disconnections/update',JSON.parse('{'+$(".inp_permanent").attr('keyval')+',"disconnectiontype":"3","status":"0"}')).done(function(data){
			$("#tDisconnections tbody tr.selected").find(".disconnectiontype").html("Permanen");
			$("#tDisconnections tbody tr.selected").find(".status").html("Dalam Progress");
			$("#tDisconnections tbody tr.selected").find(".reactivation").html($("#permanentdate").val());
			$(this).showModal({
				message:"Pengajuan Pemutusan Permanen telah disimpan",
			});
		}).fail(function(){
			alert('Tidak dapat menjadikan permanen, silakan hubungi Developer');
		});
	});
}(jQuery))
