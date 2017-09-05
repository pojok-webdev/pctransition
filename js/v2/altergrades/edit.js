console.log("edit js");
getjsdate = function(dttime){
	console.log("Alert");
		dttimesplit = dttime.split(" ");
		dt = dttimesplit[0].split("/");
		console.log("DT",dt);
		year = dt[2];
		month = dt[1]-1;
		day = dt[0];
		console.log("PADI APP, TEST FUNCTION",dttime);
		tm = dttimesplit[1].split(":");
		console.log("TM",tm);
		hour = tm[0];
		minute = tm[1];
		second = tm[2];
		return new Date(year,month,day,hour,minute,second);	
}
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
    console.log("val",$("#enddate").val()+" "+$("#endhour").val()+":"+$("#endminute").val()+":00");
    console.log("_val",$("#enddate").attr("_val"));
    realval = getjsdate($("#enddate").val()+" "+$("#endhour").val()+":"+$("#endminute").val()+":00");
    defaval = getjsdate($("#enddate").attr("_val")+" 00:00:00");
    console.log("realval",realval);
    console.log("defaval",defaval);
    if(defaval=realval){
        approved = "1";
        cansave = true;
    }else if(realval>defaval){
        approved = "0";
        cansave = true;
    }else{
        approved = "0";
        cansave = false;
    }
    console.log("approved",approved);
    if(cansave){
        console.log("Cansave");
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
        console.log("padiApp sv",humantosqldate($("#startdate").val())+" "+$("#starthour").val()+":"+$("#startminute").val());
        console.log(integer_part,fraction_part,integer_part_down,fraction_part_down);
        $.ajax({
            url:"/paltergrades/update",
            data:{
                "id":$("#myid").val(),
                "client_site_id":$("#client_site_id").val(),
                "altertype":'0',
                "product":$('#product :selected').text(),
                "integer_part":integer_part,
                "fraction_part":fraction_part,
                "integer_part_down":integer_part_down,
                "fraction_part_down":fraction_part_down,
                "executiontime":humantosqldate($("#startdate").val())+" "+$("#starthour").val()+":"+$("#startminute").val(),
                //"enddate":humantosqldate($("#enddate").val())+" "+$("#endhour").val()+":"+$("#endminute").val(),
                //"approved":approved
            },
            type:"post"
        })
        .done(function(res){
            console.log("Res",res,$('#product :selected').text());
            $.ajax({
                url:'/client_sites/changeservice',
                data:{id:$("#client_site_id").val(),name:$("product :selected").text()},
                type:'post'
            })
            .done(function(res){
                console.log("Res",res)
            })
            .fail(function(err){
                console.log("Err",err)
            });
//            window.location.href = "/paltergrades";
        })
        .fail(function(err){
            console.log("Err",err);
        });
    }else{
        alert("Tidak dapat menyimpan karena ada entri yang tidak sesuai");
    }
});
$("#enddate").change(function(){
    if($(this).val()>$(this).attr("_val")){
        console.log("the value is greater than default value");
    }else{
        console.log("the value is not greater than default value");
    }
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
switchproduct = function(){
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
switchproduct();
$("#product").change(function(){
    hidedetail();
    console.log($("#product :selected").text());
    switchproduct();
});