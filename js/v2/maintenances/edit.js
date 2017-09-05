COMMENT = "TS AND SALES USE THIS";
console.log("EDIT . JS");
$(".btn_addofficer").click(function(){
    $("#dialog").dialog();
});
$(".btn_addcompetitor").click(function(){
    console.log("Add Kompetitor");
    $("#dAddKompetitor").dialog();
});
$(".btnclose").click(function(){
    $(this).stairUp({level:2}).dialog("close");
});
$("#tOfficer").on("click","tbody tr",function(){
    selected = $(this);
    console.log("tr clicked");
    console.log("Name",selected.find(".name").html());
    thistime = new Date();
    $.ajax({
        url:"/pmaintenances/officeradd",
        data:{name:selected.find(".name").html(),maintenance_request_id:$("#maintenance_id").val()},
        type:"post"
    })
    .done(function(res){
        console.log("Res",res);
        tr = "<tr myid="+res+"><td>"+selected.find(".name").html()+"</td>";
        tr+= "<td>"+humandatetime()+"</td>";
        tr+= "<td><span class='icon-trash btnremoveofficer'></span></td></tr>";
        $("#tFormOfficer tbody")
        .prepend(tr);
        $("#dialog").dialog("close");
    })
    .fail(function(err){
        console.log("Err",err);
    });
});
$("#tFormOfficer").on("click",".btnremoveofficer",function(){
    selected = $(this).stairUp({level:2});
    console.log("form officer remove officer clicked",selected.attr("myid"));
    $.ajax({
        url:'/pmaintenances/removeofficer',
        type:"post",
        data:{id:selected.attr("myid")}
    })
    .done(function(res){
        console.log("Res",res);
        selected.remove();
    })
    .fail(function(err){
        console.log("Err",err);
    });
});
$("#tKompetitor").on("click",".btnaddoperator",function(){
    opr = $(this).stairUp({level:2}).find(".opr").html();
    oprid = $(this).stairUp({level:2}).attr("myid");
    console.log("test",opr,$("#maintenance_id").val());
    $.ajax({
        url:'/pmaintenances/competitoradd',
        data:{"maintenance_id":$("#maintenance_id").val(),"operator_id":oprid},
        type:'post'
    })
    .done(function(res){
        console.log("Res",res);
        tr = '<tr><td>'+opr+'</td>';
        tr+= '<td>'+humandatetime()+'</td>';
        tr+= '<td><span class="icon-trash btnremovekompetitor"></span></td></tr>';
        $("#tFormKompetitor tbody")
        .append(tr);
    })
    .fail(function(err){
        console.log("Err",err);
    });
});
$(".btnremovekompetitor").click(function(){
    tr = $(this).stairUp({level:2});
    oprid = tr.attr("myid");
    console.log("test",oprid);
    $.ajax({
        url:'/pmaintenances/competitorremove',
        data:{"id":oprid},
        type:"post"
    })
    .done(function(res){
        tr.remove();
        console.log("Res",res);
    })
    .fail(function(err){
        console.log("Err",err);
    });
});
$("#btnsaveclient").click(function(){
    console.log("maintenance edit saved",$("#maintenance_id").val());
    $.ajax({
        url:'/pmaintenances/update',
        data:{
            id:$("#maintenance_id").val(),
            distribution:$("#txtdistribution").val()
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
$(".btn_adddocument").click(function(){
    console.log("Add Document clicked");
    $("#updatedocument").hide();
    $("#dUpload").dialog();
});
function loadDocument(evt){
    console.log("Load Document done");
	var input = evt.target;
	var filereader = new FileReader();
	filereader.onload = function(){
		resizeImage(filereader.result, function(result){
			$("#documentimage").attr("src",result);
			console.log("Image loaded");
		})
	}
	filereader.readAsDataURL(input.files[0]);
}
$("#btnSaveAddCompetitor").click(function(){
    console.log("save add competitor");
    $.ajax({
        url:'/maintenancereports/saveoperator/'+$('#maintenancereport').val(),
        data:{
            operator_id:$("#competitor_id").val(),
            maintenancereport_id:$('#maintenance_id').val(),
            service:$("#competitor_service").val(),
            description:$("#competitor_description").val(),
        },
        type:"post",
    })
    .done(function(res){
        console.log("Success add competitor",res);
        console.log("Operator : "+$('#competitor_id :selected').text());
        str = '<tr myid="'+res+'">';
        str+= '<td>'+$('#competitor_id :selected').text()+'</td>';
        str+= '<td>'+$("#competitor_service").val()+'</td>';
        str+= '<td>'+$("#competitor_description").val()+'</td>';
        str+= '<td>'+humandatetime()+'</td>';
        str+= '<td><span class="icon-trash btnremovekompetitor"></span></td>';
        str+= '</tr>';
        $("#tFormKompetitor").prepend(str);
    })
    .fail(function(err){
        console.log("Err add competitor",err);
    })
});
$("#savedocument").click(function(){
    $.ajax({
        url:'/pmaintenances/savedocument',
        data:{
            maintenancereport_id:$("#maintenance_id").val(),
            image:$("#documentimage").attr("src"),
            name:$("#documentname").val(),
            description:$("#documentdescription").val()
        },
        type:'post'
    })
    .done(function(res){
        console.log("Save Document Success",res);
        str = '<tr myid="'+res+'">';
        str+= '<td><img class="documentimage" width="50" src="'+$("#documentimage").attr("src")+'"></td>';
        str+= '<td>'+$("#documentname").val()+'</td>';
        str+= '<td>'+$("#documentdescription").val()+'</td>';
        str+= '<td><span class="icon-trash btnremovekompetitor"></span></td>';
        str+= '</tr>';
        $("#tDocument").prepend(str);
    })
    .fail(function(err){
        console.log("Save Document Error",err);
    });
});
$(".closemodal2").click(function(){
    $(this).stairUp({level:2}).dialog("close");
})