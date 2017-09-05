(function($){
	console.log("js invoked");
	mytable = $('#tClient').dataTable({
		"aLengthMenu":[[5,10,30,-1],[5,10,30,'Semua']],
		"bPaginate":true,
		"bFilter":true
//		"aoColumnDefs":[{"bSearchable":true,"bVisible":false,"aTargets":[4]}]
	});
	$("#btnaddclient").click(function(){
		$("#btnsaveclient").show();
		$("#btnupdateclient").hide();
		$("#addClientDialog").modal();
	});
	$("#btnsaveclient").click(function(){
		$(".inp_client").makekeyvalparam();
		console.log($(".inp_client").attr("keyval"));
		console.log("sale_id",$("#sale_id").val());
		$.ajax({
			url:thisdomain+"clients/save",
			data:JSON.parse('{"dataorigin":"0","user_id":"'+$("#sale_id").val()+'",'+$(".inp_client").attr("keyval")+',"status":"1"}'),
			type:"post",
			success:function(data){
				console.log("sukses add data",data);
				var tr = '<tr myid='+data+'>';
                    tr+= '<td>'+$('#clientname').val()+'</td>';
                    tr+= '<td>'+$('#sale_id :selected').text()+'</td>';
                    tr+= '<td>'+$('#address').val()+'</td>';
                    tr+= '<td></td>';
                    tr+= '<td>'+$('#phone_area').val()+'</td>';
                    tr+= '<td>';
					tr+= '<div class="btn-group">';
					tr+= '<button data-toggle="dropdown" class="btn btn-small dropdown-toggle"  >Aksi <span class="caret"></span></button>';
					tr+= '<ul class="dropdown-menu pull-right">';
					tr+= '<li class="btneditclient"><a href="#">Edit</a></li>';
					tr+= '<li class="btnviewsites" ><a href="#">Lihat Cabang</a></li>';
					tr+= '<li class="divider survey_save"></li>';
					tr+= '<li class="btnsurvey"><a href="#">Survey</a></li>';
					tr+= '</ul>';
					tr+= '</div>';
                    tr+= '</td>';
                    tr+= '</tr>';
				$("#tClient tbody").prepend(tr);
				$("#addClientDialog").modal("hide");
			},
			error:function(err){
				console.log("error",err);
			}
		});
	});
	$('#tClient').on('click','tbody tr .btneditpic',function(){
		var tr = $(this).stairUp({level:4}),
			client_id = tr.attr('myid');
			$('#tClient tbody tr').removeClass('selected');
			tr.addClass('selected');
			$.ajax({
				url:thisdomain+'pics/getbyclientid',
				data:JSON.parse('{"client_id":'+client_id+'}'),
				type:'post',
				dataType:'json',
				success:function(data){
					$('.clearinit').val('');
					$.each(data.x,function(x,y){
						$('#name'+y.rolenum).val(y.name);
						$('#telp_hp'+y.rolenum).val(y.telp_hp);
						$('#email'+y.rolenum).val(y.email);
						$.each(y,function(a,b){
							console.log(a,b);
						});
					});
					$("#addPICModalLabel").html($("#tClient tbody tr.selected td.clientname").html());
					$("#editAllPICDialog").modal();
				},
				error:function(err){
					console.log('err',err);
				}
			});
	});
	$("#tClient").on("click","tbody tr .btnsetnonactive",function(){
		var tr = $(this).stairUp({level:4}),myid = tr.attr('myid');
		$.ajax({
			url:thisdomain+'clients/update',
			data:{id:myid,active:'0'},
			type:'post',
			success:function(){
				tr.remove();
				console.log('success update');
			},
			error:function(err){
				console.log('err',err);
			}
		});
	});
	$("#btnsaveallpic").click(function(){
		console.log("save all pic is invoked");
		for(var c=1;c<7;c++){
			$(".inp_pic"+c).makekeyvalparam();
			$.ajax({
				url:thisdomain+'pics/saveupdate',
				data:JSON.parse('{"client_id":"'+$('#tClient tr.selected').attr('myid')+'",'+$(".inp_pic"+c).attr("keyval")+'}'),
				type:'post',
				success:function(data){
					console.log('success',data);
				},
				error:function(err){
					console.log('error',err);
				}
			});
		}
	});
	$(".closemodal").click(function(){
		$(this).stairUp({level:3}).modal('hide');
		$("#editAllPICDialog").modal("hide");
	});
	$('#tClient').on('click','tbody tr .btneditclient',function(){
		id=$(this).stairUp({level:4}).attr('myid');
		window.location.href = thisdomain+'clients/edit/'+id;
	});
	$('.btnremoveclient').click(function(){
		alert('Removeclient');
	});
	$('.btnsurvey').click(function(){
		myid = $(this).stairUp({level:4}).attr('myid');
		window.location.href = thisdomain+'survey_requests/add/'+myid;
	});
	$('.btninstallation').click(function(){
		myid = $(this).stairUp({level:4}).attr('myid');
		window.location.href = thisdomain+'install_requests/edit/'+myid;
	});
	$('.btnupgrade').click(function(){
		myid = $(this).stairUp({level:4}).attr('myid');
		window.location.href = thisdomain+'altergrades/add/'+myid;
	});
	$('.btndisconnection').click(function(){
		myid = $(this).stairUp({level:4}).attr('myid');
		window.location.href = thisdomain+'disconnections/add/'+myid;
	});
	$('.btntroubleshoot').click(function(){
		window.location.href = thisdomain+'troubleshoots/add_lookup';
	});
	$("#tClient").on("click",".btnviewsites",function(){
		window.location.href = thisdomain+"client_sites/index/"+$(this).stairUp({level:4}).attr('myid');
	});
	$('.clientStatus').click(function(){
		$('.clientStatus').removeClass('selected');
		$(this).addClass('selected');
		$(this).parent().hide();
		$(this).parent().removeClass('active');
		mytable.fnDraw();
	});
	$('#nonactiveclient').click(function(){
		mytable.fnDraw();
	});
	$('#activeclient').click(function(){
		mytable.fnDraw();
	});
	$('#exclient').click(function(){
		mytable.fnDraw();
	});
	$('#all').click(function(){
		mytable.fnDraw();
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
