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
    source: "/pclients/feedbyclient",
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
    if(defaval.getTime()===realval.getTime()){
        console.log("realval sama dengan defaval");
        approved = "1";
        rangeapprove = "1";
        cansave = true;
    }else if(realval>defaval){
        console.log("realval lebih dari defaval");
        approved = "0";
        rangeapprove = "2";
        cansave = true;
    }else if(realval<defaval){
        console.log("realval kurang dari defaval");
        approved = "0";
        rangeapprove = "2";
        cansave = false;
    }else{
        console.log("masalah defaval selainnya");
        approved = "0";
        rangeapprove = "1";
        cansave = false;
    }
    if(cansave){
    console.log("test",$('#product :selected').text());
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
        console.log('PadiNET',integer_part,integer_part_down,fraction_part,fraction_part_down);
        cansave = true;
        if(cansave)
        {$.ajax({
            url:"/ptrials/save",
            data:{
                "client_site_id":$("#client_site_id").val(),
                "trialtype":'1',
                "product":$('#product :selected').text(),
                "integer_part":integer_part,
                "fraction_part":fraction_part,
                "integer_part_down":integer_part_down,
                "fraction_part_down":fraction_part_down,
                "startdate":humantosqldate($("#startdate").val())+" "+$("#starthour").val()+":"+$("#startminute").val(),
                "enddate":humantosqldate($("#enddate").val())+" "+$("#endhour").val()+":"+$("#endminute").val(),
                "approved":approved,
                "rangeapprove":rangeapprove
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
        }
    }else{
        alert("Tidak dapat menyimpan karena data tidak valid");
    }
});
$(".padiselectonfocus").focus(function(){
    $(this).select();
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