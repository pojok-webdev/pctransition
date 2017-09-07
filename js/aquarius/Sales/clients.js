(function($){
	console.log("js invoked");
	$('.myeditor').cleditor({width:'300',height:'160px',controls:"bold italic underline | color highlight removeformat | bullets numbering"});
	mytable = $('#tClient').dataTable({
		"aLengthMenu":[[5,10,30,-1],[5,10,30,'Semua']],
		"bPaginate":true,
		"bFilter":true
//		"aoColumnDefs":[{"bSearchable":true,"bVisible":false,"aTargets":[4]}]
	});
	$('#tClient').on('click','tbody tr .btneditclient',function(){
		console.log("edit invoked");
		id=$(this).stairUp({level:4}).attr('myid');
		window.location.href = '/clients/edit/'+id;
	});
	$('.btnremoveclient').click(function(){
		alert('Removeclient');
	});
	$('.btnsurvey').click(function(){
		myid = $(this).stairUp({level:4}).attr('myid');
		window.location.href = '/survey_requests/add/'+myid;
	});
	$('.btninstallation').click(function(){
		myid = $(this).stairUp({level:4}).attr('myid');
		window.location.href = '/install_requests/edit/'+myid;
	});
	$('.btnupgrade').click(function(){
		myid = $(this).stairUp({level:4}).attr('myid');
		window.location.href = '/altergrades/add/'+myid;
	});
	$('.btndisconnection').click(function(){
		myid = $(this).stairUp({level:4}).attr('myid');
		window.location.href = '/disconnections/add/'+myid;
	});
	$('.btntroubleshoot').click(function(){
		window.location.href = '/troubleshoots/add_lookup';
	});
	$('#tClient').on('click','tbody tr .btnsetam',function(){
		console.log("yo klik me");
		$('#tClient tbody tr').removeClass('selected');
		$(this).stairUp({level:4}).addClass('selected');
		var myid = $(this).stairUp({level:4}).attr("myid"),
			clientname = $(this).stairUp({level:4}).find(".clientname").html(),
			am = $(this).stairUp({level:4}).find(".am").html();
		$("#ambefore").html(am);
		$("#setAMModalLabel").html("&nbsp; Set AM : "+clientname);
		$("#dSetAM").modal();
	});
	$('#tClient').on('click','tbody tr .amhistory',function(){
		$('#tClient tbody tr').removeClass('selected');
		$(this).stairUp({level:4}).addClass('selected');
		var myid = $(this).stairUp({level:4}).attr("myid"),
			clientname = $(this).stairUp({level:4}).find(".clientname").html(),
			am = $(this).stairUp({level:4}).find(".am").html();
			$.ajax({
				url:baseurl+'clients/getam',
				data:{client_id:myid},
				type:'post',
				dataType:'json'
			})
			.done(function(res){
				console.log('Baseurl',baseurl);
				console.log('Res',res.content);
				$("#tAMHistory tbody").html("");
				$.each(res.content,function(a,b){
					console.log(b['createdate']);
					$("#tAMHistory tbody").append('<tr><td>'+b['createdate']+'</td><td>'+b['username']+'</td><td>'+b['description']+'</td></tr>');
				});
				$("#setAMHistoryModalLabel").html("&nbsp; Histori AM : "+clientname);
				$("#dAMHistory").modal();				
			})
			.fail(function(err){
				console.log('Err',err);
			});
	});
	$('#amsave').click(function(){
		var id = $('#tClient tbody tr.selected').attr('myid'),
			displacementdate = $("#displacementdate").getdate();
		$.ajax({
			url:'/clients/displaceam',
			data:{'id':id,'sale_id':$('#replacersales').val()},
			type:'post'
		})
		.done(function(res){
			console.log(res);
			console.log('Displacement',$("#displacementdate").attr("datetime"));
			$("#dSetAM").modal("hide");
			$('#tClient tbody tr.selected td.am').html($("#replacersales :selected").text());
			console.log('sales replace',$("#replacersales :selected").text());
			$.ajax({
				url:'/clients/saveamhistory',
				data: {'client_id':id,'user_id':$('#replacersales').val(),'username':$('#replacersales :selected').text(),'displacementdate':$("#displacementdate").attr("datetime"),'description':$('#description').val(),'createuser':'puji'},
				type:'post'
			});
		})
		.fail(function(err){
			console.log(err);
		});
	});
	$("#tClient").on("click",".btnviewsites",function(){
		window.location.href = "/client_sites/index/"+$(this).stairUp({level:4}).attr('myid');
	});
	$("#tClient").on("click",".btnsetpadibranch",function(){
		console.log("SET PADIBRANCH INVOKED");
		var myid = $(this).stairUp({level:4}).attr("myid");
		$.ajax({
			url:"/client_sites/getbranches",
			data:{id:myid,columntoinspect:"client_id"},
			type:"post",
			dataType:"json"
		})
		.done(function(data){
			$(".tsbranch").attr("checked",false);
			$(".tsbranch").each(function(){
				var that = $(this);
				console.log("TSBRANCH VAL",$(this).val());
				brid = $(this).val();
				$.each(data,function(x,y){
					//console.log(x,y.id);
					if(y.id===brid){
						console.log("ID MATCH",y.id);
						that.prop("checked",true);
					}
				});
			});
			console.log("DATA",data);
			$("#dSetTSCabang").modal();
		})
		.fail(function(){
			console.log("ERROR",err);
		});
	});
	$('.clientStatus').click(function(){
		$('.clientStatus').removeClass('selected');
		$(this).addClass('selected');
		$(this).parent().hide();
		$(this).parent().removeClass('active');
		mytable.fnDraw();
	});
	$("#nonactiveclient").click(function(){
		window.location.href = "/clients/index/nonactive";
	});
	$("#activeclient").click(function(){
		window.location.href = "/clients/index/active";
	});
}(jQuery));

$.fn.dataTableExt.afnFiltering.push(function(oSettings, aData, iDataIndex){
	var status = $('.selected').attr('status');
	//n=str.search(status);
	/*if(aData[4]==status){
		return true;
	}*/
	if(aData[4].search(status)>=0){
		return true;
	}
});
