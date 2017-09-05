$('.dtpicker').datepicker(
    {
        dateFormat:'d/mm/yy',
        changeYear:true,
        changeMonth:true,
        minDate:null,
        maxDate:'+10Y'
    }
);
$(".addKompetitor").click(function(){
    $("#dAddKompetitor").modal();
})
$("#btnSaveAddCompetitor").click(function(){
    console.log("save add competitor");
    $.ajax({
        url:'../saveoperator/'+$('#maintenancereport').val(),
        data:{
            operator_id:$("#competitor_id").val(),
            maintenancereport_id:$('#report').val(),
            service:$("#competitor_service").val(),
            description:$("#competitor_description").val(),
        },
        type:"post",
    })
    .done(function(res){
        str = '<tr myid='+res+'>';
        str+= '<td><a>'+$('#competitor_id :selected').text()+'</a></td>';
        str+= '<td><a>'+$("#competitor_service").val()+'</a></td>';
        str+= '<td><a>'+$("#competitor_description").val()+'</a></td>';
        str+= '<td><a><span class="icon-remove kompetitor_remove"></span></a></td>';
        str+= '</tr>';
        $("#tKompetitor").prepend(str);
    })
    .fail(function(err){
        console.log("Err Add Competitor",err);
    })
});
$("#tOperator").on("click",".kompetitor_add",function(){
    myid = $(this).stairUp({level:3}).attr("myid");
    operatorname = $(this).stairUp({level:3}).find(".operatorname").html();
    $.ajax({
        url:'../saveoperator/'+$('#maintenancereport').val()+'/'+myid,
        data:{operator_id:myid,maintenancereport_id:$('#maintenancereport').val()},
        type:"post",
    })
    .done(function(res){
        console.log("Res",res);
        str = "<tr>";
        str+= "<td><a>"+operatorname+"</a></td>";
        str+= "<td><a><span class='icon-remove kompetitor_remove'></span></a></td>";
        str+= "</tr>";
        $("#tKompetitor tbody").append(str);
        $("#dAddKompetitor").modal("hide");
        update_rowcount($("#total_kompetitor"),$("#tKompetitor tbody tr"));
    })
    .fail(function(err){
        console.log("Err",err);
    });
});
$("#tKompetitor").on("click",".kompetitor_remove",function(){
    thisrow = $(this).stairUp({level:3});
    operator_id = $(this).stairUp({level:3}).attr("myid");
    report_id = $("#maintenancereport").val();
    $.ajax({
        url:'../removeoperator/'+operator_id,
        type:'post',
        data:{id:operator_id}
    })
    .done(function(res){
        console.log("Res",res);
        thisrow.remove();
        update_rowcount($("#total_kompetitor"),$("#tKompetitor tbody tr"));
    })
    .fail(function(err){
        console.log("Err",err);
    });
});
$(".btnsavereport").click(function(){
    reportstatus = $(this).attr("status");
    console.log("Maintenance ID",$('#maintenancereport').val());
    $.ajax({
        url:'../upsertreport',
        data:{
            maintenance_id:$('#maintenancereport').val(),
            problems:$('#problems').val(),
            distribution:$('#distribution').val(),
            clientrequest:$('#clientrequest').val(),
            reporter:$('#reporter').val(),
            resume:$('#distribution').val(),
            eosactivity:$("#eosactivity").val(),
            maintenancedate:$("#maintenancedate")
                .getdate()
                .addhour($('#mHour'))
                .addminute($('#mMinute'))
                .attr('datetime'),
            status:reportstatus,
            clientrequeststatus:$("#mrstatus").val(),
            monitoringresult:$("#monitoringresult").val(),
            monitoringsubject:$("#monitoringsubject").val()
        },
        type:'post'
    })
    .done(function(res){
        window.location.href = "/maintenancereports";
    })
    .fail(function(err){
        console.log("Error upsert maintenancereport",err);
    });
})
$(".addPadiNETDevice").click(function(){
    $("#padinetDeviceTypeName").change();
    $("#dAddPadiNETDevice").modal();
});
$(".addClientDevice").click(function(){
    $("#clientDeviceTypeName").change();
    $("#dAddClientDevice").modal();
});
$(".addEos").click(function(){
    $("#dEos").modal();
});
$("#clientDeviceTypeName").change(function(){
    id = $(this).val();
    $.ajax({
        url:'/devices/getJSONbyId/'+id,
        type:'get',
        dataType:'JSON'
    })
    .done(function(res){
        console.log("Success change devicetypename",res);
        $("#clientDeviceName option").each(function(){
            $(this).remove();
        });
        deviceopt = "";
		$.each(res,function(x,y){
            console.log("detail",x,y);
            deviceopt+="<option value="+x+">"+y+"</option>";
		});
		$(deviceopt).appendTo("#clientDeviceName");
    })
    .fail(function(err){
        console.log("Err",err);
    });
});
$("#padinetDeviceTypeName").change(function(){
    id = $(this).val();
    $.ajax({
        url:'/devices/getJSONbyId/'+id,
        type:'get',
        dataType:'JSON'
    })
    .done(function(res){
        console.log("Res",res);
        $("#padinetDeviceName option").each(function(){
            $(this).remove();
        });
        deviceopt = "";
		$.each(res,function(x,y){
            console.log("detail",x,y);
            deviceopt+="<option value="+x+">"+y+"</option>";
		});
		$(deviceopt).appendTo("#padinetDeviceName");
    })
    .fail(function(err){
        console.log("Err",err);
    });
});
$("#btnsaveclientdevice").click(function(){
    $.ajax({
        url:'/maintenancereports/saveclientdevice',
        data:{
            maintenancereport_id:$("#maintenancereport").val(),
            clientDeviceTypeName:$("#clientDeviceTypeName").val(),
            clientDeviceName:$("#clientDeviceName").val(),
            device_id:$("#clientDeviceName").val(),
            serialno:$("#clientserialno").val(),
            macaddress:$("#clientmacaddress").val(),
        },
        type:"post"
    })
    .done(function(res){
        console.log("Sukses saveclientdevice",res);
        str = "<tr myid="+res+">";
        str+= "<td><a>"+$("#clientDeviceTypeName :selected").text()+" - "+$("#clientDeviceName :selected").text()+"</a></td>";
        str+= "<td><a>"+$("#clientmacaddress").val()+" - "+$("#clientserialno").val()+"</a></td>";
        str+= "<td><a><span class='icon-remove pointer tclientdeviceremove'></span></a></td>";
        str+= "</tr>";
        $("#tClientDevice tbody").prepend(str);
        update_rowcount($("#total_clientdevice"),$("#tClientDevice tbody tr"));
    })
    .fail(function(err){
        console.log("Error saveclientdevice",err);
    });
});
$("#tClientDevice").on("click",".tclientdeviceremove",function(){
    selected = $(this).stairUp({level:3});
    $("#tClientDevice tbody tr").removeClass("selected");
    selected.addClass("selected");
    $.ajax({
        url:"/maintenancereports/removeclientdevice/"+selected.attr("myid"),
    })
    .done(function(res){
        console.log("Remove client device success",res);
        selected.remove();
        update_rowcount($("#total_clientdevice"),$("#tClientDevice tbody tr"));
    })
    .fail(function(err){
        console.log("Remove client device error",err);
    });
})
$("#btnsavepadinetdevice").click(function(){
    $.ajax({
        url:'/maintenancereports/savepadinetdevice',
        data:{
            maintenancereport_id:$("#maintenancereport").val(),
            padinetDeviceTypeName:$("#padinetDeviceTypeName").val(),
            padinetDeviceName:$("#padinetDeviceName").val(),
            device_id:$("#padinetDeviceName").val(),
            serialno:$("#padinetserialno").val(),
            macaddress:$("#padinetmacaddress").val(),
        },
        type:"post"
    })
    .done(function(res){
        console.log("Sukses savepadinetdevice",res);
        str = "<tr myid="+res+">";
        str+= "<td><a>"+$("#padinetDeviceTypeName :selected").text()+"</a></td>";
        str+= "<td><a>"+$("#padinetmacaddress").val()+" - "+$("#padinetserialno").val()+"</a></td>";
        str+= "<td><a><span class='icon-remove pointer tpadinetdeviceremove'></span></a></td>";
        str+= "</tr>";
        $("#tPadinetDevice tbody").prepend(str);
        update_rowcount($("#total_padinetdevice"),$("#tPadinetDevice tbody tr"));
    })
    .fail(function(err){
        console.log("Error savepadinetdevice",err);
    });
});
$("#btnSaveEos").click(function(){
    $.ajax({
        url:'/maintenancereports/saveeos',
        data:{
            maintenancereport_id:$("#maintenancereport").val(),
            name:$("#eos :selected").text()
        },
        type:"post"
    })
    .done(function(res){
        console.log("save eos res",res);
        str = "<tr myid="+res+"><td><a>"+$("#eos :selected").text()+"</a></td>";
        str+= "<td><a><span class='icon-remove pointer teosremove'></span></a></td>";
        str+= "</tr>"
        $("#tEos tbody").append(str);
    })
    .fail(function(err){
        console.log("save eos err",err);
    });
});
$("#tPadinetDevice").on("click",".tpadinetdeviceremove",function(){
    selected = $(this).stairUp({level:3});
    $("#tPadinetDevice tbody tr").removeClass("selected");
    selected.addClass("selected");
    $.ajax({
        url:"/maintenancereports/removepadinetdevice/"+selected.attr("myid"),
    })
    .done(function(res){
        console.log("Remove padinet device success",res);
        selected.remove();
        update_rowcount($("#total_padinetdevice"),$("#tPadinetDevice tbody tr"));
    })
    .fail(function(err){
        console.log("Remove padinet device error",err);
    });
})
$(".closemodal5").click(function(){
    $(this).stairUp({level:5}).modal("hide");
})
console.log("teos pliss");
$("#mrstatus").change(function(){
    console.log("status",$(this).val());
});
$("#dmonitoringsubject").hide();
$("#dmonitoringresult").hide();
$("#tEos").on("click",".teosremove",function(){
    
    that = $(this);
    tr = that.stairUp({level:2});
    myid = tr.attr("myid")
    console.log("remove eos clicked",myid);
    $.ajax({
        url:'/maintenancereports/removeeos/'+myid
    })
    .done(function(res){
        tr.remove();
        console.log("Res",res);
    })
    .fail(function(err){
        console.log("Err",err);
    });
})
$(".addClientProblem").click(function(){
    $("#dClientProblem").modal();
});
$("#btnSaveClientProblem").click(function(){
    console.log("Problem",$("#problem :selected").text());
    $.ajax({
        url:'/maintenancereports/saveclientproblem',
        data:{
            maintenancereport_id:$("#maintenancereport").val(),
            problem:$("#problem :selected").text()
        },
        type:"post"
    })
    .done(function(res){
        tr = "<tr myid="+res+">";
		tr+= "<td><a>"+$("#problem :selected").text()+"</a></td>";
		tr+= "	<td><a><span class='icon-remove pointer clientproblem_remove'></span></a></td>";
		tr+= "</tr>";
        $("#tClientProblem tbody").append(tr);
        console.log("Res",res);
    })
    .fail(function(err){
        console.log("Err",err);
    });
})
$("#t_vas").on("click",".vas_remove",function(){
    that = $(this);
    tr = that.stairUp({level:3});
    myid = tr.attr("myid")
    console.log("remove eos clicked",myid);
    $.ajax({
        url:'/maintenancereports/removevas/',
        data:{id:myid},
        type:'post'
    })
    .done(function(res){
        console.log("Res",res);
        tr.remove();
    })
    .fail(function(err){
        console.log("Err",err);
    });
});
$("#tClientProblem").on("click",".clientproblem_remove",function(){
    that = $(this);
    tr = that.stairUp({level:3});
    myid = tr.attr("myid")
    console.log("remove clientproblem_remove clicked",myid);
    $.ajax({
        url:'/maintenancereports/clientproblemremove/',
        data:{id:myid},
        type:'post'
    })
    .done(function(res){
        console.log("Res",res);
        tr.remove();
    })
    .fail(function(err){
        console.log("Err",err);
    });
});
update_rowcount($("#total_kompetitor"),$("#tKompetitor tbody tr"));
update_rowcount($("#total_application"),$(".t_usage tbody tr"));
update_rowcount($("#total_vas"),$(".t_vas tbody tr"));
update_rowcount($("#total_image"),$("#tImage tbody tr"));
update_rowcount($("#total_topologi"),$("#tTopologi tbody tr"));
update_rowcount($("#total_clientdevice"),$("#tClientDevice tbody tr"));
update_rowcount($("#total_padinetdevice"),$("#tPadinetDevice tbody tr"));