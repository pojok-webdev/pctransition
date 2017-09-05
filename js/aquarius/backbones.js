$(document).ready(function(){
	tBackbone = $("#tBackbone").dataTable();
	$('#addBackbone').click(function(){
		$("#dAddBackbone").modal("show");
	});	
	$(".closemodal").click(function(){
		$(this).stairUp({level:6}).modal("hide");
	});
	$('#dEditBackbone').on('hidden.bs.modal', function (e) {
		$("#branchsign_Surabaya").html("&#9746;");
		$("#branchsign_Jakarta").html("&#9746;");
		$("#branchsign_Malang").html("&#9746;");
		$("#branchsign_Bali").html("&#9746;");
	})
	$(".link_material").click(function(){
		$("#addmaterialpopup").fadeOut(200);
	});
	$(".modalclose").click(function(){
		$(this).stairUp({level:3}).modal("hide");
	});
	$("#modal_backbone_remove").click(function(){
		$.ajax({
			url:"/backbones/remove/"+$("#tBackbone tr.selected").attr("thisid"),
			type:"get"
		}).done(function(){
			
		}).fail(function(){
			console.log("Tidak dapat menghapus, silakan hubungi Developer");
		});
	});
	$(".tblbackbone").on("click","tr .remove_backbone",function(){
		thistr = $(this).stairUp({level:2});
		$("#tBackbone tr").each(function(){
			$(this).removeClass("selected");
		});
		thistr.addClass("selected");
		$("#modal_backbone_id").html($("#tBackbone tr.selected").attr("thisid"));
		$("#dconfirmation").modal();
	});
	$(".tblbackbone").on("click","tr .editbackbone",function(){
		$(".backbonebranchedit[type=checkbox]").attr("checked",false);
		$(".tblbackbone tr").each(function(){
			$(this).removeClass("selected");
		});
		$(this).stairUp({level:2}).addClass("selected");
		thisid = $(this).stairUp({level:2}).attr("thisid");
		$.ajax({
			url:"/pbackbones/getBackbone/"+thisid,
			type:"get",
			dataType:"json"
		}).done(function(data){
			$.ajax({
				url:"/pbackbones/getBranches/"+thisid,
				type:"get",
				dataType:"json",
				async:false
			})
			.done(function(branches){
				var shouldbechecked = false,that;
					branch_modal(branches,function(){
						$("#dEditBackbone").modal();
					});
				$("#backbone_name_update").val(data["name"]);
				$("#location_update").val(data["location"]);
				$("#dEditBackbone").modal();
				console.log("branches",x,y);
			})
			.fail(function(err){
				console.log("Error get branches",err);
			});
		})
		.fail(function(err){
			console.log("Errorgetbackbone",err);
		});
	});
	branch_modal = function(branches,callback){
		$(".branchsign").each(function(){
			console.log($(this).next().html(),"unselected");
			$(this).html("&#9746;");
		});
		$.each(branches,function(x,y){
			console.log("value of y",x,y.valueOf());
			console.log("Branches Y",y);
			$(".backbonebranchedit").each(function(){
				console.log("unzelected");
				$("#branchsign_"+y.valueOf()).html("&#9745;");
			});
			$(".backbonebranchedit").each(function(){
				if($(this).html()===y.valueOf()){
					console.log("selected",$(this).html(),x);
					$("#branchsign_"+y.valueOf()).html("&#9746;");
				}
			});
		});
		callback();
	}
	$(".branchsign").click(function(){
		if($(this).html().charCodeAt(0).toString()==="9745"){
			$(this).html("&#9746;");
		}else{
			$(this).html("&#9745;");
		}
	});
	$("#save_backbone").click(function(){
		var str = "";
		var arr = [];
		$("input:checked").each(function(){
			console.log("check",$(this).val());
			str+=$(this).val();
			arr.push($(this).attr("textvalue"));
		});
		console.log("BRANCHES",str);
		$.post('/adm/backbonesave',{
			branch_id_:$("#branches").val(),
			name:$('#backbone_name').val(),
			location:$("#location").val(),
			createuser:$('#workplace').attr('username')
		}).done(function(data){
			console.log("BACKBONE_ID",data);
			$.ajax({
				url:"/adm/backbonebranchsave",
				data:{backbone_id:data,branches:str},
				type:"post"
			})
			.done(function(result){
				console.log("RESULT",result);
			});
			$(".materials").dataTable()
			.fnAddData(["<input type='checkbox' name='checkbox' />",arr.join(","),$('#backbone_name').val(),$('#location').val(),"<span class='icon-pencil'></span><span class='remove_backbone icon-trash' material_name='"+$('#material_name').val()+"' material_id='"+data+"'></span>"]);
			$("#dAddBackbone").modal("hide");
			$(".remove_backbone").bind("click",function(e){
				if($(this).stairUp({level:2}).hasClass('row_selected')){
					$(this).stairUp({level:2}).removeClass('row_selected');
				}
				else{
					$(".materials").find("tr.row_selected").removeClass("row_selected");
					$(this).stairUp({level:2}).addClass("row_selected");
				}
				$("#modal_material_name").text($(this).attr("material_name"));
				$("#modal_backbone_id").text($(this).attr("material_id"));
				$("#dconfirmation").modal("show");
			});
		}).fail(function(){alert('gagal');});
	});
	$("#update_backbone").click(function(){
		console.log("update backbone");
		var str = "";
		var arr = [];
		$(".branchsign").each(function(){
			if($(this).html().charCodeAt(0).toString()==="9745"){
				str+=$(this).attr("strval");
				arr.push($(this).next().html());
			}
		});
		console.log("BRANCHES",str);
		console.log("ID BACKBONE "+$("#tBackbone tr.selected").attr("thisid"));
		$.ajax({
			url:"/adm/backboneupdate",
			data:{
				id:$("#tBackbone tr.selected").attr("thisid"),
				name:$('#backbone_name_update').val(),
				location:$("#location_update").val()
				},
			type:"post",
			success:function(){
				console.log("SUCCESS UPDATE");
				$.ajax({
					url:"/adm/backbonebranchsave",
					data:{backbone_id:$("#tBackbone tr.selected").attr("thisid"),branches:str},
					type:"post"
				})
				.done(function(result){
					console.log("RESULT",result);
					$('#tBackbone tbody tr.selected td.backbonebranch').html(arr.join(","));
					$('#tBackbone tbody tr.selected td.backbonename').html($("#backbone_name_update").val());
					$('#tBackbone tbody tr.selected td.backbonelocation').html($("#location_update").val());
					$("#dEditBackbone").modal("hide");
				})
				.fail(function(err){
					console.log("ERRORbackbonebranchsave",err);
				});
			},
			error:function(err){
				console.log("ERRORbackboneupdate",err);
			}
		});
	});
});
populaterow = function(material_id,name,satuan,description){
	$("#tSortable")
	.append('<tr><td><input type="checkbox" name="checkbox" value="'+material_id+'"/></td><td>'+name+'</td><td>'+satuan+'</td><td>'+description+'</td><td><span class="icon-pencil"></span><span class="icon-trash"></span></td></tr>');
}
function fnGetSelected(){
    return $(".materials").find('tr.row_selected').index();
}
