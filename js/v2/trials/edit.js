$("#btnsave").click(function(){
    $.ajax({
        url:"/ptrials/update",
        data:{
            "id":$("#trialsid").val(),
            "product":$("#product :selected").text(),
            "integer_part":$("#integer_part").val(),
            "fraction_part":$("#fraction_part").val(),
            "startdate":humantosqldate($("#startdate").val())+" "+$("#starthour").val()+":"+$("#startminute").val(),
            "enddate":humantosqldate($("#enddate").val())+" "+$("#endhour").val()+":"+$("#endminute").val(),
        },
        type:"post"
    })
    .done(function(res){
        console.log("Res update trial",res);
        window.location.href = "/ptrials";
    })
    .fail(function(Err){
        console.log("Err update trial",err);
    });
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
    console.log("selected product",$("#product :selected").text());
    changeproduct();
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