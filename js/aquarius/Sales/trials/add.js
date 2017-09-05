(function($){
	$.fn
	console.log("PT PdiNET Surabaya-Indon esia");
	var arr = Array("Monyet","Kambing","Sapi");
	//initialization
	for(var i=0;i<4;i++){
		$("#ipenterprise"+i).val("0");
		$("#ipiix"+i).val("0");
		$("#iplocalloop"+i).val("0");
	}
	for(var i=0;i<2;i++){
		$("#apenterprise"+i).val("0");
		$("#apiix"+i).val("0");
		$("#aplocalloop"+i).val("0");
	}
	tipe = $('#trialtype').val();
	/*$('#client_site_id').populateCombo({
		url:thisdomain+'clients/get_combo_data/'+tipe,
		keyvalpaired:true,
	});	*/
	$("#localloop1").spinner({
		step:1
	});
	$("#localloop2").spinner({
		step:1
	});
	$("#iix1").spinner({
		step:1
	});
	$("#iix2").spinner({
		step:1
	});
	$("#enterprise1").spinner({
		step:1
	});
	$(".pspinner").spinner({step:1});
	$("#enterprise1").change(function(){
		$(this).val(arr[$(this).val()]);
	});
	$("#enterprise2").spinner();
	$('#trial_save').click(function(){
		if($('#trialtype').val()=='2'){
			$(this).showModal({
				message:"Pilihlah jenis Trial"
			});
			exit();
		}
		if($('#product :selected').text()=='Pilihlah'){
			$(this).showModal({
				message:"Pilihlah jenis Produk"
			});
			exit();
		}
		switch($("#product :selected").text().toLowerCase()){
			case "enterprise":
				service = "enterprise";
				//integer_part = $("#enterprise1").val();
				integer_part = $("#ipenterprise0").val()+$("#ipenterprise1").val()+$("#ipenterprise2").val()+$("#ipenterprise3").val();
				fraction_part = $("#apenterprise0").val()+$("#apenterprise1").val();
				//fraction_part = $("#enterprise2").val();
			break;
			case "iix":
				service = "iix";
				//integer_part = $("#iix1").val();
				integer_part = $("#ipiix0").val()+$("#ipiix1").val()+$("#ipiix2").val()+$("#ipiix3").val();
				fraction_part = $("#apiix0").val()+$("#apiix1").val();
				//fraction_part = $("#iix2").val();
			break;
			case "localloop":
				service = "localloop";
//				integer_part = $("#localloop1").val();
				integer_part = $("#iplocalloop0").val()+$("#iplocalloop1").val()+$("#iplocalloop2").val()+$("#iplocalloop3").val();
				fraction_part = $("#aplocalloop0").val()+$("#aplocalloop1").val();
//				fraction_part = $("#localloop2").val();
			break;
			case "business":
				service = "business";
				integer_part = $("#business :selected").text();
				fraction_part = "-";
				if($('#business :selected').text().toLowerCase()=='pilihlah'){
					$(this).showModal({
						message:"Pilihlah jenis Bisnis"
					});
					exit();
				}
			break;
			case "smartvalue":
				service = "smartvalue";
				integer_part = $("#smartvalue :selected").text();
				fraction_part = "-";
				if($('#smartvalue :selected').text().toLowerCase()=='pilihlan'){
					$(this).showModal({
						message:"Pilihlah jenis SmartValue"
					});
					exit();
				}
			break;
		}
		$('.inp_trial').makekeyvalparam();
		console.log("INP TRIAL KEY VAL",$('.inp_trial').attr("keyval"));
		$.ajax({
			url:thisdomain+'trials/save',
			data:JSON.parse('{'+$('.inp_trial').attr('keyval')+',"product":"'+service+'","integer_part":"'+integer_part+'","fraction_part":"'+fraction_part+'"}'),
			type:'post',
		}).done(function(data){
			$.each($("#trialpic tbody tr .addpic"),function(x,y){
				username = $(this).html();
				$.ajax({
					url:thisdomain+'trials/addpic',
					data:{"username":username,trial_id:data},
					type:"post"				
				});
			})
			.thengoto({address:thisdomain+'trials'});
//			window.location.href= thisdomain+'trials';
		}).fail(function(){
			alert('Tidak dapat menyimpan Trial, silakan hubungi Developer');
		});
	});
/*	$('#trialtype').change(function(){
		tipe = ($(this).val());
		$('#client_site_id').populateCombo({
			url:thisdomain+'clients/get_combo_data/'+tipe,
			keyvalpaired:true,
		});
	});*/
	$("#btnAddClientPIC").click(function(){
		$("#dAddPIC").modal();
	});
	$("#btnSavePIC").click(function(){
		$("#trialpic tbody").append("<tr><td class='addpic'>"+$("#addpic").val()+"</td><td><span class='isb-delete picremove'></span></td></tr>");
	});
	$("#trialpic tbody").on("click",".picremove",function(){
		tr = $(this).stairUp({level:2});
		tr.remove();
	});
	$("#product").change(function(){
		switch($("#product :selected").text().toLowerCase()){
			case "enterprise":
				$("#enterprise").show();
				$("#iix").hide();
				$("#localloop").hide();
				$("#business").hide();
				$("#smartvalue").hide();
			break;
			case "iix":
				$("#enterprise").hide();
				$("#iix").show();
				$("#localloop").hide();
				$("#business").hide();
				$("#smartvalue").hide();
			break;
			case "localloop":
				$("#enterprise").hide();
				$("#iix").hide();
				$("#localloop").show();
				$("#business").hide();
				$("#smartvalue").hide();
			break;
			case "business":
				$("#enterprise").hide();
				$("#iix").hide();
				$("#localloop").hide();
				$("#business").show();
				$("#smartvalue").hide();
			break;
			case "smartvalue":
				$("#enterprise").hide();
				$("#iix").hide();
				$("#localloop").hide();
				$("#business").hide();
				$("#smartvalue").show();
			break;
			default:
				$("#enterprise").hide();
				$("#iix").hide();
				$("#localloop").hide();
				$("#business").hide();
				$("#smartvalue").hide();		
			break;
		}
		console.log("selected Product",$("#product :selected").text().toLowerCase());
	});
	switch($("#product :selected").text().toLowerCase()){
		case "enterprise":
			$("#enterprise").show();
			$("#iix").hide();
			$("#localloop").hide();
			$("#business").hide();
			$("#smartvalue").hide();
		break;
		case "iix":
			$("#enterprise").hide();
			$("#iix").show();
			$("#localloop").hide();
			$("#business").hide();
			$("#smartvalue").hide();
		break;
		case "localloop":
			$("#enterprise").hide();
			$("#iix").hide();
			$("#localloop").show();
			$("#business").hide();
			$("#smartvalue").hide();
		break;
		case "business":
			$("#enterprise").hide();
			$("#iix").hide();
			$("#localloop").hide();
			$("#business").show();
			$("#smartvalue").hide();
		break;
		case "smartvalue":
			$("#enterprise").hide();
			$("#iix").hide();
			$("#localloop").hide();
			$("#business").hide();
			$("#smartvalue").show();
		break;
		default:
			$("#enterprise").hide();
			$("#iix").hide();
			$("#localloop").hide();
			$("#business").hide();
			$("#smartvalue").hide();		
		break;
	}
}(jQuery));
