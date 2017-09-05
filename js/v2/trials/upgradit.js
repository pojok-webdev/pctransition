$( "#txtclient" ).autocomplete({
    source: "/pclients/feed",
    minLength: 2,
    focus:function(event,ui){
        $("#txtclient").val(ui.item.label);
        return false;
    },
    select:function(event,ui){
        console.log("Label dipilih",ui.item.label);
        $("#txtclient").val(ui.item.label);
        $("#client_site_id").val(ui.item.value);
        return false;
    }
})
$("#btnsave").click(function(){
    console.log("test");
    switch($('#product :selected').text()){
        case "Enterprise":
            integer_part = $("#integer_part_enterprise_up").val();
            fraction_part = $("#fraction_part_enterprise_up").val();
            integer_part_down = $("#integer_part_enterprise_down").val();
            fraction_part_down = $("#fraction_part_enterprise_down").val();
        break;
        case "IIX":
            integer_part = $("#integer_part_iix_up").val();
            fraction_part = $("#fraction_part_iix_up").val();
            integer_part_down = $("#integer_part_iix_down").val();
            fraction_part_down = $("#fraction_part_iix_down").val();
        break;
        case "Local Loop":
            integer_part = $("#integer_part").val();
            fraction_part = $("#fraction_part").val();
            integer_part_down = $("#integer_part").val();
            fraction_part_down = $("#fraction_part").val();
        break;
        case "Smart Value":
            integer_part = $("#smartvalue :selected").text();
            fraction_part = 0;
            integer_part_down = 0;
            fraction_part_down = 0;
        break;
        case "Business":
            integer_part = $("#business :selected").text();
            fraction_part = 0;
            integer_part_down = 0;
            fraction_part_down = 0;
        break;
    }
    $.ajax({
        url:"/ptrials/update",
        data:{
            "id":$("#trialsid").val(),
            "trialtype":'0',
            "product":$('#product :selected').text(),
            "integer_part":integer_part,
            "fraction_part":fraction_part,
            "integer_part_down":integer_part_down,
            "fraction_part_down":fraction_part_down,
            "startdate":humantosqldate($("#startdate").val())+" "+$("#starthour").val()+":"+$("#startminute").val(),
            "enddate":humantosqldate($("#enddate").val())+" "+$("#endhour").val()+":"+$("#endminute").val(),
        },
        type:"post"
    })
    .done(function(res){
        console.log("Res",res,$('#product :selected').text());
        window.location.href = "/ptrials";
    })
    .fail(function(err){
        console.log("Err",err);
    });
});
$("#btnapprove").click(function(){
    $.ajax({
        url:"/ptrials/update",
        data:{
            "id":$("#trialsid").val(),
            "approved":"1"
        },
        type:"post"
    })
    .done(function(res){
        console.log("Res",res);
        window.location.href = "/ptrials";
    })
    .fail(function(err){
        console.log("Err",err);
    })
});
$(".dtpicker").datepicker({
    dateFormat:"dd/mm/yy"
});
humantosqldate = function(dt){
    dtarray = dt.split("/");
    return dtarray[2]+"-"+dtarray[1]+"-"+dtarray[0];
}
humantosqltime = function(dt,time){
    dtarray = dt.split(" ");
    timearray = dtarray.split(":");
    switch(time){
        case "hour":
        return timearray["0"];
        break;
        case "minute":
        return timearray["1"];
        break;
        case "second":
        return timearray["2"];
        break;
    }
}
$(".dtpicker").datepicker({
    dateFormat:"dd/mm/yy"
});
humantosqldate = function(dt){
    dtarray = dt.split("/");
    return dtarray[2]+"-"+dtarray[1]+"-"+dtarray[0];
}
humantosqltime = function(dt,time){
    dtarray = dt.split(" ");
    timearray = dtarray.split(":");
    switch(time){
        case "hour":
        return timearray["0"];
        break;
        case "minute":
        return timearray["1"];
        break;
        case "second":
        return timearray["2"];
        break;
    }
}
hidedetail = function(){
    $("#denterprise").hide();$("#diix").hide();$("#dlocalloop").hide();$("#dbusiness").hide();$("#dsmartvalue").hide();
}
hidedetail();
changeproduct = function(){
    console.log("change product");
    switch($("#product :selected").text()){
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
changeproduct();
$("#product").change(function(){
    hidedetail();
    console.log($("#product :selected").text());
    changeproduct();
});