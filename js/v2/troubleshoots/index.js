(function($){
    if($("#ttroubleshoots").length > 0)
    {
    $("#ttroubleshoots").dataTable(
        {
            "iDisplayLength": 5, 
            "aLengthMenu": [5,10,25,50,100], 
            "sPaginationType": "full_numbers", 
            "aoColumns": [ { "bSortable": true }, null, null, null, null,null,null,null]
        }
    );
    //$("#tSortable_2").dataTable({"iDisplayLength": 5, "sPaginationType": "full_numbers","bLengthChange": false,"bFilter": false,"bInfo": false,"bPaginate": true, "aoColumns": [ { "bSortable": false }, null, null, null, null]});
    }    
}(jQuery))