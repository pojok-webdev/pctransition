getduration = function(starttime){
    oneday = 1000*60*60*24;
    mynow = new Date();
    diff = new Date() - starttime;
    myday = Math.round(diff/oneday);
    differ = new Date(diff);
    return myday+" hari,"+differ.getHours()+" jam,"+differ.getMinutes()+" menit,"+differ.getSeconds()+" detik";
}
getduration2 = function(starttime,endtime){
    oneday = 1000*60*60*24;
    diff = endtime - starttime;
    myday = Math.round(diff/oneday);
    differ = new Date(diff);
    return myday+" hari,"+differ.getHours()+" jam,"+differ.getMinutes()+" menit,"+differ.getSeconds()+" detik";
}
$("#ttickets tbody tr").each(function(){
    row = $(this);
    if(row.find(".status").html()=="Closed"){
        parts = row.find(".ticketstart").html().split(" ");
        dtparts = parts[0].split("-");
        tmparts = parts[1].split(":");
        year = dtparts[0];
        month = dtparts[1];
        date = dtparts[2];
        hour = tmparts[0];
        minute = tmparts[1];
        second = tmparts[2];
        msecond = "00";

        parts2 = row.find(".ticketend").html().split(" ");
        dtparts2 = parts2[0].split("-");
        tmparts2 = parts2[1].split(":");
        year2 = dtparts2[0];
        month2 = dtparts2[1];
        date2 = dtparts2[2];
        hour2 = tmparts2[0];
        minute2 = tmparts2[1];
        second2 = tmparts2[2];

        tm = new Date(year,month,date,hour,minute,second,msecond);
        tm2 = new Date(year2,month2,date2,hour2,minute2,second2,msecond);
        row.find(".duration").html(getduration(tm,tm2));
    }
});
setInterval(function(){
    $("#ttickets tbody tr").each(function(){
        row = $(this);
        if(row.find(".status").html()=="Open"){
            row.find(".duration").html(row.find(".ticketstart").html());
            parts = row.find(".ticketstart").html().split(" ");
            dtparts = parts[0].split("-");
            tmparts = parts[1].split(":");
            year = dtparts[0];
            month = dtparts[1];
            date = dtparts[2];
            hour = tmparts[0];
            minute = tmparts[1];
            second = tmparts[2];
            msecond = "00";
            tm = new Date(year,month,date,hour,minute,second,msecond);
            row.find(".duration").html(getduration(tm));
        }
    });
},1000);
$("#setrowamount").click(function(){
    $("#dRowAmount").modal();
    $(".dd-list").hide();
});
$("#setsearch").click(function(){
    $(".dd-list").hide();
});
$("#saverowamount").click(function(){
    currenturl=window.location.href;
    arr = currenturl.split("/");
    console.log("1",arr[1]);
    console.log("2",arr[2]);
    console.log("3",arr[3]);
    console.log("4",arr[4]);
//    window.location.href = currenturl;
});
$.urlParam = function(name){
    var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
    if (results==null){
       return null;
    }
    else{
       return results[1] || 0;
    }
}