(function($){
	console.log("Helo PadiNET");
	$('#site').dataTable({
		bFilter:false,
		bSort:false,
		bPaginate:false,
//		bInfo:false,
		bLengthChange:false,
		bAutoWidth:false
	});
	$('.btnsave').click(function(){
		$('.inp_client').makekeyvalparam();
		$.ajax({
			url:thisdomain+'client_sites/update',
			type:'post',
			data:JSON.parse('{"id":"'+$("#client_id").val()+'",'+$('.inp_client').attr('keyval')+'}')
		}).done(function(data){
			var str = "";
			$("input:checked").each(function(){
				console.log("check",$(this).val());
				str+=$(this).val();
			});
			console.log("BRANCHES",str);
			console.log("CLIENTID",$("#client_id").val());
			$.ajax({
				url:thisdomain+"client_sites/savebranch",
				data:{client_site_id:$("#client_id").val(),branches:str},
				type:"post"
			})
			.done(function(data){
				console.log("client id",$("#client_id").val());
				console.log("client updated",data);
				$('#dModal').modal().hideafter(1000);
			})
			.fail(function(err){
				console.log("TIDAK DAPAT MENYIMPOAN BRANCH",err);
			});
			
		}).fail(function(){
			alert("Tidak dapat mengupdate Pelanggan, silakan hubungi Developer");
		});
	});
	$('.closemodal').click(function(){
		$(this).stairUp({level:4}).modal('hide');
	});
	$('.closemodal5').click(function(){
		$(this).stairUp({level:5}).modal('hide');
	});
	$('.closemodal6').click(function(){
		$(this).stairUp({level:6}).modal('hide');
	});
	$("#btnaddservice").click(function(){
		$("#dAddService").modal();
		$("#updateservice").hide();
		$("#saveaddservice").show();
		console.log("yeeaaaahhhh");
	});
	$(".btneditservice").click(function(){
		$("#service tr").removeClass("selected");
		selected = $(this).stairUp({level:5});
		selected.addClass("selected");
		name = selected.find(".sname").html();
		$.ajax({
			url:'/client_sites/getservice',
			data:{id:selected.attr("myid")},
			type:'post',
			dataType:"json"
		})
		.done(function(res){
			$("#sname").val(name);
//			console.log("Integer_part",res.integer_part);
			$("#sproduct").val(res.product);
			hidedetail();
			switchproduct();
			$(".integer_part").val(res.integer_part);
			$(".fraction_part").val(res.fraction_part);
			$(".integer_part_down").val(res.integer_part_down);
			$(".fraction_part_down").val(res.fraction_part_down);
			$("#saveaddservice").hide();
			$("#updateservice").show();
			$("#dAddService").modal();
			console.log("ahsan:"+res.product);
		})
		.fail(function(){

		});
	});
	$("#saveaddservice").click(function(){
		console.log("service added");
		console.log("Product",$('#sproduct :selected').text());
		$.ajax({
			url:'/client_sites/saveservice',
			data:{
				client_site_id:$("#client_id").val(),
				product:$('#sproduct :selected').text(),
				name:$("#sname").val()
			},
			type:'post'
		})
		.done(function(res){
			$("#service tbody").prepend('<tr myid='+res+'><td class="sname">'+$("#sproduct :selected").text()+' '+$("#sname").val()+'</td><td><div class="btn-group"><button data-toggle="dropdown" class="btn btn-warning dropdown-toggle">Action <span class="caret"></span></button><ul class="dropdown-menu"><li><a class="btneditservice">Edit</a></li><li class="divider"></li><li><a class="btnremoveservice">Hapus</a></li></ul></div> </td></tr>');
			console.log("Res",res);
		})
		.fail(function(err){
			console.log("Err",err);
		});
		
	});
	$("#updateservice").click(function(){
		selected = $("#service tr.selected");
		myid = selected.attr('myid');
		switch($("#sproduct :selected").text()){
			case "Enterprise":
			integer_part = $("#integer_part_enterprise_up :selected").text();
			break;
			case "IIX":
			integer_part = $("#integer_part_iix_up :selected").text();
			break;
			case "Local Loop":
			integer_part = $("#integer_part").val();
			break;
			case "Business":
			integer_part = $("#business :selected").text();
			break;
			case "Smart Value":
			integer_part = $("#smartvalue :selected").text();
			break;
		}
		$.ajax({
			url:'/client_sites/updateservice',
			data:{
				id:myid,
				client_site_id:$("#client_id").val(),
				product:$('#sproduct :selected').text(),
				name:$("#sname").val(),
				integer_part:integer_part
			},
			type:'post'
		})
		.done(function(res){
			console.log("Res",res);
		})
		.fail(function(err){
			console.log("Err",err);
		});
		
	});
hidedetail = function(){
    $("#denterprise").hide();$("#diix").hide();$("#dlocalloop").hide();$("#dbusiness").hide();$("#dsmartvalue").hide();
}
hidedetail();
switchproduct = function(){
    switch($("#sproduct :selected").text()){
        case "Enterprise":
            $("#denterprise").show();
        break;
        case "IIX":
            $("#diix").show();
        break;
        case "Local Loop":
            $("#dlocalloop").show();
        break;
        case "Business":
            $("#dbusiness").show();
        break;
        case "Smart Value":
            $("#dsmartvalue").show();
        break;
    }    
}
switchproduct();
$("#sproduct").change(function(){
    hidedetail();
    console.log($("#sproduct :selected").text());
    switchproduct();
});
$(".btnremoveservice").click(function(){
	$("#service tr").removeClass("selected");
	tr = $(this).stairUp({level:5});
	tr.addClass("selected");
	myid = $(this).stairUp({level:5}).attr("myid");
	console.log(myid);
	$.ajax({
		url:'/client_sites/removeservice/'+myid,
		type:'get'
	})
	.done(function(res){
		console.log("Sukses hapus layanan",res);
		$("#service tr.selected").remove();
	})
	.fail(function(err){
		console.log("Err hapus layanan",err);
	});
})
}(jQuery));
