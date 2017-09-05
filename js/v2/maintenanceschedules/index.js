console.log("Bismillah");
if($("#tmaintenances").length > 0){
    mytable = $("#tmaintenances").dataTable(
        {
			"aaSorting":[[7,'desc']],
            "iDisplayLength": 5, 
            "aLengthMenu": [5,10,25,50,100], 
            "sPaginationType": "full_numbers", 
            "aoColumns": [ 
                { "bSortable": true },
                 null, 
                 null, 
                 null, 
                 null,
                 null,
                 null,
                 {"bVisible":false},
                 null
            ]
        }
    );
}    
$("#tmaintenances").on("click",".btnremovemaintenance",function(){
    tr = $(this).stairUp({level:5});
    myid = tr.attr("myid");
    console.log("remove maintenance",myid);
    $.ajax({
        url:"/pmaintenanceschedules/removemaintenance/",
        data:{id:myid},
        type:"post"
    })
    .done(function(res){
        console.log("Res",res);
        tr.remove();
        var aPos = mytable.fnGetPosition(tr); 
        mytable.fnDeleteRow(aPos);
    })
    .fail(function(err){
        console.log("Err",err);
    });
})
