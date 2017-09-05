(function($){
	$("#disconnectionbtnsave").click(function(){
		$('.inp_disconnection').makekeyvalparam();
		$.ajax({
			url:thisdomain+'disconnections/update/',
			type:'post',
			data:JSON.parse('{"id":"'+$("#disconnection_id").val()+'",'+$('.inp_disconnection').attr('keyval')+'}'),
		}).done(function(data){
			$("#dModal").modal().hideafter(2000);
		}).fail(function(){
			alert("Tidak dapat menyimpan ...");
		});
	});
	$("#tAntenna").on("click",".removeAntenna",function(){
		selected = $(this).stairUp({level:3});
		id = selected.attr("myid");
		that = $(this);
		name = selected.find(".info").html()
		if(selected.find(".ele").is(":checked")){
			mystatus="1";
		}else{
			mystatus="0";
		}
		$.ajax({
			url:'/disconnections/device_withdrawal',
			data:{modul:'disconnection',device:"Antenna",status:mystatus,device_id:id,createuser:$("#createuser").val()},
			type:"post"
		})
		.done(function(res){
			console.log("Res",res);
			that.removeClass("icon-remove");
			that.addClass("icon-ok");
		})
		.fail(function(err){
			console.log("Err",err)
		});
		console.log("remove Antenna"+id);
	})
	$("#tWirelessradio").on("click",".removeWirelessradio",function(){
		selected = $(this).stairUp({level:3});
		id = selected.attr("myid");
		that = $(this);
		name = selected.find(".info").html()
		if(selected.find(".ele").is(":checked")){
			mystatus="1";
		}else{
			mystatus="0";
		}
		console.log("Status",mystatus);
		$.ajax({
			url:'/disconnections/device_withdrawal',
			data:{modul:'disconnection',device:"Wireless Radio",status:mystatus,device_id:id,createuser:$("#createuser").val()},
			type:"post"
		})
		.done(function(res){
			console.log("Res",res);
			that.removeClass("icon-remove");
			that.addClass("icon-ok");
		})
		.fail(function(err){
			console.log("Err",err)
		});
		console.log("remove Wireless Radio"+id);
	})
	$("#tSwitch").on("click",".removeswitch",function(){
		selected = $(this).stairUp({level:3});
		id = selected.attr("myid");
		that = $(this);
		name = selected.find(".info").html()
		if(selected.find(".ele").is(":checked")){
			mystatus="1";
		}else{
			mystatus="0";
		}
		$.ajax({
			url:'/disconnections/device_withdrawal',
			data:{modul:'disconnection',device:"Switch",status:mystatus,device_id:id,createuser:$("#createuser").val()},
			type:"post"
		})
		.done(function(res){
			console.log("Res",res);
			that.removeClass("icon-remove");
			that.addClass("icon-ok");
		})
		.fail(function(err){
			console.log("Err",err)
		});
		console.log("remove Switch"+id);
	})	
	$("#tPccard").on("click",".removepccard",function(){
		selected = $(this).stairUp({level:3});
		id = selected.attr("myid");
		that = $(this);
		name = selected.find(".info").html()
		if(selected.find(".ele").is(":checked")){
			mystatus="1";
		}else{
			mystatus="0";
		}
		$.ajax({
			url:'/disconnections/device_withdrawal',
			data:{modul:'disconnection',device:"Pccard",status:mystatus,device_id:id,createuser:$("#createuser").val()},
			type:"post"
		})
		.done(function(res){
			console.log("Res",res);
			that.removeClass("icon-remove");
			that.addClass("icon-ok");
		})
		.fail(function(err){
			console.log("Err",err)
		});
		console.log("remove Switch"+id);
	})	
	$("#tDevice").on("click",".removedevice",function(){
		selected = $(this).stairUp({level:3});
		id = selected.attr("myid");
		that = $(this);
		name = selected.find(".info").html()
		if(selected.find(".ele").is(":checked")){
			mystatus="1";
		}else{
			mystatus="0";
		}
		$.ajax({
			url:'/disconnections/device_withdrawal',
			data:{modul:'disconnection',device:"Device",status:mystatus,device_id:id,createuser:$("#createuser").val()},
			type:"post"
		})
		.done(function(res){
			console.log("Res",res);
			that.removeClass("icon-remove");
			that.addClass("icon-ok");
		})
		.fail(function(err){
			console.log("Err",err)
		});
		console.log("remove Device"+id);
	})	
	$("#tApwifi").on("click",".removeapwifi",function(){
		selected = $(this).stairUp({level:3});
		id = selected.attr("myid");
		that = $(this);
		name = selected.find(".info").html()
		if(selected.find(".ele").is(":checked")){
			mystatus="1";
		}else{
			mystatus="0";
		}
		$.ajax({
			url:'/disconnections/device_withdrawal',
			data:{modul:'disconnection',device:"APWifi",status:mystatus,device_id:id,createuser:$("#createuser").val()},
			type:"post"
		})
		.done(function(res){
			console.log("Res",res);
			that.removeClass("icon-remove");
			that.addClass("icon-ok");
		})
		.fail(function(err){
			console.log("Err",err)
		});
		console.log("remove Device"+id);
	})	
	$("#tRouter").on("click",".removerouter",function(){
		selected = $(this).stairUp({level:3});
		id = selected.attr("myid");
		that = $(this);
		name = selected.find(".info").html()
		if(selected.find(".ele").is(":checked")){
			mystatus="1";
		}else{
			mystatus="0";
		}
		$.ajax({
			url:'/disconnections/device_withdrawal',
			data:{modul:'disconnection',device:"Router",status:mystatus,device_id:id,createuser:$("#createuser").val()},
			type:"post"
		})
		.done(function(res){
			console.log("Res",res);
			that.removeClass("icon-remove");
			that.addClass("icon-ok");
		})
		.fail(function(err){
			console.log("Err",err)
		});
		console.log("remove Router"+id);
	})	
	$("#tAntenna").on("change",".ele",function(){
		that = $(this);
		selected = that.stairUp({level:4});
		myid = selected.attr("myid");
		console.log("Antenna Result",that.stairUp({level:4}).attr("myid"))
		if(selected.find(".ele").is(":checked")){
			mystatus="1";
		}else{
			mystatus="0";
		}
		$.ajax({
			url:'/disconnections/toggledevstatus',
			data:{id:myid},
			type:'post'
		})
		.done(function(res){
			console.log("Res",res);
		})
		.fail(function(err){
			console.log("Err",err);
		});

	})
}(jQuery))
