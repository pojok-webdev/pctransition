(function($){
	$("#tDisconnection").dataTable({
		"aLengthMenu":[5,10],"iDisplayLength":5
	});
	$(this).formatDates({dtClass:"dttmcheck"});
	$('.btneditdisconnection').click(function(){
		id = $(this).stairUp({level:4}).attr('clientid');
		window.location.href = '/disconnections/edit/'+id;
	});
	$(this).fieldUpdater({
		url:"/disconnections/feedData",
		cellClass:'updatable',
		fieldName:'fieldName',
		idAttr:'myid',
		type:'get',
		enabled:true
	});
	$('.btnviewdisconnection').click(function(){
		id = $(this).stairUp({level:4}).attr('clientid');
		window.location.href = '/disconnections/view/'+id;
	});
	$('.btndisconnect').click(function(){
		thiselement = $(this);
		mytr = $(this).stairUp({level:4});
		myid = mytr.attr('myid');
		$.post('/disconnections/update',{id:myid,executed:'1',status:'1'}).done(function(res){
			console.log("Res",res);
			mytr.find(".status").html("Sudah dilaksanakan");
			$(this).showModal({
				message:"Pelaksanaan Diskoneksi sudah disimpan",
				nextUrl:thisdomain+'disconnections',
			});
		});
		thiselement.hide();
	});
	$("#tDisconnection").on("click",".btnentrydisconnection",function(){
		window.location.href = "/disconnections/entryreport/"+$(this).stairUp({level:4}).attr("clientid");
	});
	$('.btnreactivate').click(function(){
		thiselement = $(this);
		mytr = $(this).stairUp({level:4});
		myid = mytr.attr('myid');
		$.post('/disconnections/update',{id:myid,executed:'1',status:'3'});
		mytr.find(".status").html("Telah direaktivasi");
		thiselement.hide();
	});	
}(jQuery))
