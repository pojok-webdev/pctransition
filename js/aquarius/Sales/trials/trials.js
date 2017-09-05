(function($){
	$(".spinner").spinner();
	$(this).fieldUpdater({
		url:thisdomain+"trials/feedData",
		cellClass:'updatable',
		fieldName:'fieldName',
		idAttr:'myid',
		enabled:true
	});
	mytable = $('#tTrial').dataTable({
		"aLengthMenu":[[5,10,-1],[5,10,"Semua"]],"iDisplayLength":5,
	});
	$('#btnAddTrial').click(function(){
		window.location.href = thisdomain+'trials/add';
	});
	$("#product").change(function(){
		//thisval = $(this).val();
		thisval = $("#product :selected").text();
		console.log("Product",thisval);
		switch(thisval){
			case "SmartValue":
			$("#dropdownsmartvalue").show();
			$("#dropdownbusiness").hide();
			$("#updown").hide();
			break;
			case "Business":
			$("#dropdownbusiness").show();
			$("#dropdownsmartvalue").hide();
			$("#updown").hide();
			break;

			case "enterprise":
				$("#dropdownsmartvalue").hide();
				$("#dropdownbusiness").show();
			break;
			case "iix":
				$("#dropdownsmartvalue").hide();
				$("#dropdownbusiness").show();
			break;

			default:
			$("#dropdownsmartvalue").hide();
			$("#dropdownsmartbusiness").hide();
			$("#updown").show();
			break;
		}
	});
	switch($("#product :selected").text()){
		case "SmartValue":
		$("#dropdownsmartvalue").show();
		$("#dropdownbusiness").hide();
		$("#updown").hide();
		break;
		case "Business":
		$("#dropdownsmartvalue").hide();
		$("#dropdownbusiness").show();
		$("#updown").hide();
		break;
		default:
		$("#dropdownsmartvalue").hide();
		$("#dropdownbusiness").hide();
		$("#updown").show();
		break;
	}
	$('#tTrial').on('click','tr .btnedittrial',function(){
		trialid = $(this).stairUp({level:4}).attr('myid');
		tr = $(this).stairUp({level:4});
		$("#tTrial tr").removeClass("selected");
		tr.addClass("selected");
		$.ajax({
			url:thisdomain+'trials/getTrial',
			data:{id:trialid},
			type:'post',
			dataType:'json',
		}).done(function(data){
			var mystartdate = $(this).splitDate({dateToSplit:data['startdate']});
			var stdate = mystartdate[0].split("/");
			var myenddate = $(this).splitDate({dateToSplit:data['enddate']});
			var enddate = myenddate[0].split("/");
			$('#clientid').val(data['client_site_id']);
			$('#clientedit').text(data['client']);
			$('#startdate').val(stdate[2]+"/"+stdate[1]+"/"+stdate[0]);
			$('#startHour').val(mystartdate[1]);
			$('#startMinute').val(mystartdate[2]);
			$('#enddate').val(enddate[2]+"/"+enddate[1]+"/"+enddate[0]);
			$('#endHour').val(myenddate[1]);
			$('#endMinute').val(myenddate[2]);
			$('#product').select_text({"compared":data['product'],casesensitif:false});
			$('#integer_part').val(data['integer_part']);
			$('#fraction_part').val(data['fraction_part']);
			$('#id').val(trialid);
			console.log("PRODUCT::::",data['product'].toLowerCase());
			switch(data['product'].toLowerCase()){
				case 'smartvalue':
				console.log("smarval",data['product']);
					$("#dropdownsmartvalue").show();
					$("#dropdownbusiness").hide();
					$("#updown").hide();
					$("#dropdownsmartvalue").select_text({"compared":data["integer_part"],casesensitif:false});
				break;
				case 'business':
				console.log("bisnes",data['product']);
					$("#dropdownsmartvalue").hide();
					$("#dropdownbusiness").show();
					$("#updown").hide();
					$("#dropdownbusiness").select_text({"compared":data["integer_part"],casesensitif:false});
				break;
				default:
				console.log("defol",data['product']);
					$("#dropdownsmartvalue").hide();
					$("#dropdownbusiness").hide();
					$("#updown").show();
				break;
			}
			ip = data['integer_part'];
			fp = data['fraction_part'];
			$.each(ip,function(x,y){
				console.log(x,y);
				if(isNaN(y)){
					$("#integer_part"+x).val('0');
				}else{
					$("#integer_part"+x).val(y);
				}
			});
			$.each(fp,function(x,y){
				console.log(x,y);
				$("#fraction_part"+x).val(y);
			});
			$("#editclientpictbl tbody tr").remove();
			//console.log("Product",data['product']);
			//console.log("Integer Part",data['integer_part']);
			//console.log("Fraction Part",data['fraction_part']);
			$.ajax({
				url:thisdomain+"trials/getpics",
				type:"post",
				//data:{"id":"2"},
				data:{"id":$("#tTrial tbody tr.selected").attr("myid")},
				dataType:"json"
			})
			.done(function(res){
				$.each(res.out,function(x,y){
					console.log("Res",y);
					$("#editclientpictbl tbody").append("<tr myid='"+y.id+"'><td>"+y.username+"</td><td><span class='removeclientpictbl isb-delete'></span></td></tr>");
				});
			})
			.fail(function(err){
				console.log("Err",err);
			});
			
			console.log("state"+stdate[0]);
		}).fail(function(){
			alert("Tidak dapat meretrieve data Trial");
		});
		
		$('#dEditTrial').modal();
	});
	$("#editclientpictbl").on("click",".removeclientpictbl ",function(){
		$.ajax({
			url:thisdomain+"trials/removepic",
			data:{"id":$(this).stairUp({level:2}).attr("myid")},
			type:"post"
		})
		.done(function(res){
			$.ajax({
				url:thisdomain+"trials/gettrialpics",
				data:{"trial_id":$('#tTrial tr.selected').attr("myid")},
				type:"post",
			})
			.done(function(res){
				console.log("Res",res);
				$("#tTrial tbody tr.selected td.trialofficers").html(res);
			})
			.fail(function(err){
				console.log("Err",err);
			});
			console.log("Res",res);
		})
		.fail(function(err){
			console.log("Err",err);
		});
		$(this).stairUp({level:2}).remove();
	});
	$('#btnSave').click(function(){
		$('.inp_trial').makekeyvalparam();
		console.log("INP TRIAL KEYVAL",$('.inp_trial').attr("keyval"));
		/*ip = $("#integer_part0").val()+$("#integer_part1").val()+$("#integer_part2").val()+$("#integer_part3").val();
		fp = $("#fraction_part0").val()+$("#fraction_part1").val();*/


		switch($("#product :selected").text()){
			case "SmartValue":
				ip = $("#smartvalue :selected").text();
				fp = "";
			break;
			case "Business":
				ip = $("#business :selected").text();
				fp = "";
			break;
			default:
				ip = $("#integer_part0").val()+$("#integer_part1").val()+$("#integer_part2").val()+$("#integer_part3").val();
				fp = $("#fraction_part0").val()+$("#fraction_part1").val();
			break;
		}

		product = $("#product :selected").text();
		console.log("ip fp",ip,fp);
		$.ajax({
			url:thisdomain+'trials/update',
			data:JSON.parse('{'+$('.inp_trial').attr('keyval')+',"product":"'+product+'","integer_part":"'+ip+'","fraction_part":"'+fp+'"}'),
			type:'post',
		}).done(function(data){
			$('#dConfirmation').modal().hideafter(2000);
			console.log(data);
			$("#tTrial tr.selected .trialproduct").html(product+'-'+ip+', '+fp);
		}).fail(function(){
			alert('Tidak dapat mengupdate Trial, silakan hubungi Developer');
		});
	});
	$("#btnAddPIC").click(function(){
		$("#dAddPIC").modal();
	});
	$("#btnSavePIC").click(function(){
		$.ajax({
			url:thisdomain+'trials/addpic',
			data:{"username":$("#addpic").val(),trial_id:$('#tTrial tr.selected').attr("myid")},
			type:"post"
		})
		.done(function(res){
			console.log("RES",res);
			$("#editclientpictbl tbody").append("<tr><td>"+$("#addpic").val()+"</td><td><span class='isb-delete picremove'></span></td></tr>");
			$.ajax({
				url:thisdomain+"trials/gettrialpics",
				data:{"trial_id":$('#tTrial tr.selected').attr("myid")},
				type:"post",
			})
			.done(function(res){
				console.log("Res",res);
				$("#tTrial tbody tr.selected td.trialofficers").html(res);
			})
			.fail(function(err){
				console.log("Err",err);
			});
		})
		.fail(function(err){
			console.log("ERR",err);
		});
	});
	$("#tTrial").on("click",".btnfutrial",function(){
		myid = $(this).stairUp({level:4}).attr("myid");
		window.location.href = thisdomain+"trials/fu/"+myid;
		console.log("Myid",myid)
	});
}(jQuery));
