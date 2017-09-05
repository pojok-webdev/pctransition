(function($){
	$(this).fieldUpdater({
		url:thisdomain+"trials/feedData",
		cellClass:'updatable',
		fieldName:'fieldName',
		idAttr:'myid',
		enabled:true
	});
	$('#tTrial').dataTable({
		"aLengthMenu":[[5,10,-1],[5,10,"Semua"]],"iDisplayLength":5,
	});
	console.log($(this).currentTime({
		format:"MM/dd/YYYY HH:mm:ss"
		//format:"YYYY-MM-dd HH:mm:ss"
	}));
	$("#tTrial .btnassignofficer").click(function(){
		var selected = $(this).stairUp({level:4});
		$("#tTrial tbody tr").each(function(){
			$(this).removeClass("selected");
		});
		selected.addClass("selected");
		console.log("ID : "+$(selected).attr('myid'));
		$.ajax({
			url:thisdomain+"trialofficers/getbytrial/"+$(selected).attr('myid'),
			dataType:'json'
		}).done(function(data){
			$(".petugasTrial").each(function(){
				$(this).css("background","");
			});
			$.each(data,function(x,y){
				console.log(y["name"]);
				$(".petugasTrial").each(function(){
					if($(this).attr("username")===y["name"]){
						$(this).addClass("choosen");
						$(this).css("background","red");
					}
				});
			});
		}).fail(function(){
			console.log("json error");
		});
		$("#dAddOperator").modal();
	});
	$(".petugasTrial").click(function(){
		thisCell = $(this);
		if($(this).hasClass("choosen")){
			$.ajax({
				url:thisdomain+"trialofficers/remove/"+$(this).attr("username")+"/"+$("#tTrial tbody tr.selected").attr("myid"),
				type:"get",
				async:false
			}).done(function(data){
				thisCell.removeClass("choosen");
				thisCell.css("background","");
				$.ajax({
					url:thisdomain+"trialofficers/getcommaseparatedbytrial/"+$("#tTrial tbody tr.selected").attr("myid"),
				}).done(function(result){
					$("#tTrial tbody tr.selected").find(".officers").html(result);
				});
				$(this).removeClass("choosen");
			});
		}else{
			$.ajax({
				url:thisdomain+"trialofficers/add",
				data:{trial_id:$("#tTrial tbody tr.selected").attr("myid"),username:$(this).attr("username")},
				type:"post",
				async:false
			}).done(function(data){
				console.log("Background color"+thisCell.css("background"));
				thisCell.addClass("choosen");
				thisCell.css("background","red");
				$.ajax({
					url:thisdomain+"trialofficers/getcommaseparatedbytrial/"+$("#tTrial tbody tr.selected").attr("myid"),
				}).done(function(result){
					$("#tTrial tbody tr.selected").find(".officers").html(result);
				});
				$(this).addClass("choosen");
			});
		}
	});
	$("#tTrial").on("click",".btnstart",function(){
		selected = $(this).stairUp({level:4});
		var myid = selected.attr('myid');
		$.ajax({
			url:thisdomain+"trials/update",
			data:{id:myid,startexecdate:$(this).currentTime({
				format:"YYYY-MM-dd HH:mm:ss"
			})},
			/*
			url:thisdomain+"install_requests/update",
			data:{id:myid,trial_periode1exec:$(this).currentTime({
				format:"YYYY-MM-dd HH:mm:ss"
			})},*/
			type:"post",
			async:false
		}).done(function(data){
			console.log(data);
			$.ajax({
				url:thisdomain+"trials/getTrial/",
				data:{id:myid},
				type:"post",
				dataType:"json"
			}).done(function(data){
				var startdate = data["startdate"];
				var startexecdate = data["startexecdate"];
				selected.find(".startdate").html(startdate + " " +startexecdate);
			});
			/*$.ajax({
				url:thisdomain+"install_requests/getTrial/",
				data:{id:myid},
				type:"post",
				dataType:"json"
			}).done(function(data){
				var startdate = data["startdate"];
				var startexecdate = data["startexecdate"];
				selected.find(".startdate").html(startdate + " " +startexecdate);
			});*/
		});
	});
	$("#tTrial").on("click",".btnedit",function(){
		selected = $(this).stairUp({level:4});
		$("#tTrial tbody tr").removeClass("selected");
		selected.addClass("selected");
		var myid = selected.attr('myid');
			$.ajax({
				//url:thisdomain+"install_requests/getTrial/",
				url:thisdomain+"trials/getTrial/",
				data:{id:myid},
				type:"post",
				dataType:"json"
			}).done(function(data){
				var startdate = data["startdate"];
				var enddate = data["enddate"];
				var startexecdate = data["startexecdate"];
				var endexecdate = data["endexecdate"];
				$("#trialstart").val(startexecdate);
				$("#trialend").val(endexecdate);
				//alert(startdate);
				$("#dEditTrial").modal();
			}).fail(function(){
				alert("failled");
			});
	});
	$("#tTrial").on("click",".btnend",function(){
		var currentTime = $(this).currentTime({
			format:"YYYY-MM-dd HH:mm:ss"
		})
		selected = $(this).stairUp({level:4});
		var myid = selected.attr('myid');
		$.ajax({
			url:thisdomain+"trials/update",
			data:{id:myid,endexecdate:$(this).currentTime({format:"YYYY-MM-dd HH:mm:ss"})},
			type:"post",
			async:false
		}).done(function(data){
			console.log(data);
			$.ajax({
				url:thisdomain+"trials/getTrial/",
				data:{id:myid},
				type:"post",
				dataType:"json"
			}).done(function(data){
				var enddate = data["enddate"];
				var endexecdate = data["endexecdate"];
				selected.find(".enddate").html(enddate + " " +endexecdate);
			});
		});
	});
	$("#savetrial").click(function(){
		var myid = $("#tTrial tr.selected").attr('myid');
		console.log("save trial",myid);
		console.log("trialstart",$("#trialstart").getdate().attr("datetime"));
		console.log("trialend",$("#trialend").getdate().attr("datetime"));
		$.ajax({
			url:thisdomain+"trials/update",
			data:{
				id:myid,
				startexecdate:$("#trialstart").getdate().attr("datetime"),
				//startexecdate:null,
				endexecdate:$("#trialend").getdate().attr("datetime"),
				//endexecdate:null,
			},
			type:"post",
			async:false
		})
		.done(function(res){
			console.log("RES",res);
		})
		.fail(function(err){
			console.log("ERR",err);
		});
	});
	$(".closemodal").click(function(){
		$("#dEditTrial").modal("hide");
	});
	$(".btnresetend").click(function(){
		$("#trialend").val("");
	});
	$(".btnresetstart").click(function(){
		$("#trialstart").val("");
	});
}(jQuery))
