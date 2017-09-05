xcancel = function(){
    switch($("#xcancelreason :selected").text()){
        case "Pilihlah":
            alert("Anda harus memilih");
        break;
    }
}
$("#btnsave").click(function(){
    isvalid = true;
    switch($("#action :selected").text()){
        case "Pilihlah":
            alert("Anda harus memilih");
        break;
        case "Cancel":
            status = "3";
            cancelreason = $("#ncancelreason :selected").text();
            console.log("CANCEL REASON",$("#ncancelreason :selected").text());
            extendreason = "";
            if($("#ncancelreason :selected").text()==="Pilihlah"){
                isvalid = false;
            }
            if($("#ncancelreason :selected").text().toString()==="Lainnya"){
                isvalid = true;
                cancelreason = $("#otherncancelreason").val();
                console.log("cancelreason = ",cancelreason);
            }
            break;
        case "Join":
            status = "1";
            cancelreason = "";
            extendreason = "";
        break;
        case "Extend":
            status = "2";
            cancelreason = "";
            extendreason = $("#extendreason :selected").text();
            if($("#extendreason :selected").text()==="Pilihlah"){
                isvalid = false;
            }
        break;
        default:
            status = "0";
            cancelreason = "";
            extendreason = "";
        break;
    }
    console.log("followup status",status);
    if(isvalid){
        $.ajax({
            url:"/ptrials/update",
            data:{
                id:$("#trialsid").val(),
                cancelreason:cancelreason,
                extendreason:extendreason,
                status:status
                },
            type:"post"
        })
        .done(function(res){
            console.log("Extendreason",extendreason);
            console.log("Res",res);
            window.location.href = "/ptrials/";
        })
        .fail(function(err){
            console.log("Err",err);
        });
    }else{
        alert("Alasan harus diisi");
    }
});
cancelreasonevent = function(){
    if($("#ncancelreason :selected").text().toString()==="Lainnya"){
        console.log("Lainnya selected");
        $("#otherncancelreason").show();
    }else if($("#ncancelreason :selected").text().toString()==="Pilihlah"){

    }
    else{
        console.log("Lainnya not selected");
        $("#otherncancelreason").hide();
    }
}
cancelreasonevent();
$("#ncancelreason").change(function(){
    cancelreasonevent();
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
console.log($("#action :selected").text());
switch($("#action :selected").text()){
    case "Pilihlah":
        $("#divncancel").hide();
        $("#divxcancel").hide();
        $("#divextendreason").hide();
        $("#divextend").hide();
    break;
    case "Extend":
        $("#divextend").show();
        $("#divextendreason").show();
        $("#divncancel").hide();
        $("#divxcancel").hide();
    break;
    case "Cancel":
        console.log("canceled");
        $("#divncancel").show();
        $("#divextendreason").hide();
        $("#divextend").hide();
        $("#divxcancel").hide();
    break;
    case "Join":
        $("#divncancel").hide();
        $("#divextendreason").hide();
        $("#divextend").hide();
        $("#divxcancel").hide();
    break;
}
$("#action").change(function(){
    switch($("#action :selected").text()){
        case "Pilihlah":
            $("#divncancel").hide();
            $("#divxcancel").hide();
            $("#divextendreason").hide();
            $("#divextend").hide();
        break;
        case "Extend":
            $("#divextend").show();
            $("#divncancel").hide();
            $("#divxcancel").hide();
            $("#divextendreason").show();
        break;
        case "Cancel":
            $("#divncancel").show();
            $("#divextendreason").hide();
            $("#divextend").hide();
            $("#divxcancel").hide();
        break;
        case "Join":
            $("#divncancel").hide();
            $("#divextendreason").hide();
            $("#divextend").hide();
            $("#divxcancel").hide();
        break;
    }
});
$("#otherreason").hide();
$("#extendreason").change(function(){
    if($("#extendreason :selected").text()="Lainnya"){
        $("#otherreason").show();
    }else{
        $("#otherreason").hide();
    }
});
