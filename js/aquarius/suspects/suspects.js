$(document).ready(function () {
    console.log("suspect.js loaded, thisdomain is " + thisdomain);
    mytable = $('#tSuspect').dataTable({
        "aLengthMenu": [[5, 10, -1], [5, 10, "Semua"]], "iDisplayLength": 5,
        bFilter: true,
        bSort: true,
        bPaginate: true,
//		bInfo:false,
        bLengthChange: true,
        "aaSorting": [[5, "desc"]],
        bAutoWidth: true
    });
    $("#btnaddsuspect").click(function () {
        window.location.href = thisdomain + "suspects/add_suspect";
    });
    $("#tSuspect").on("click", "tbody tr .btneditsuspect", function () {
        myid = $(this).stairUp({level: 4}).attr('myid');
        console.log(myid);
        window.location.href = thisdomain + 'suspects/edit/' + myid;
    });
    $('#tSuspect').on("click", " tbody tr .btnmovetoprospect", function () {
        mytr = $(this).stairUp({level: 4});
        myid = mytr.attr('myid');
        $.post(thisdomain + 'clients/update', {id: myid, status: "1",prospectdate:padicurdate()}).fail(function () {
            alert('Tidak dapat menyimpan data, silakan hubungi Developer');
        }).done(function () {
            $.post(thisdomain+'suspects/updatebyclientid',{client_id:myid,status:"1"})
            .fail(function(){
                console.log("update suspects failed");
            })
            .done(function(){
                console.log("update suspects success");
            })
            $(this).showModal({
                element: 'dModal',
                title: 'Konfirmasi Pemindahan Data',
                message: 'Data sudah dipindahkan ke Prospect',
                expire: 2000
            });
            mytr.fadeOut(2000).remove();
        });
    });
    $("#tSuspect").on("click", "tbody tr", function (e) {
        if ($(this).hasClass('row_selected')) {
            $(this).removeClass('row_selected');
        }
        else {
            mytable.$('tr.row_selected').removeClass('row_selected');
            $(this).addClass('row_selected');
        }
    });
    $("#tSuspect").on("click","tbody tr .sname",function(){
        var myid = $(this).stairUp({level:1}).attr("myid");
        console.log("myid",$(this).stairUp({level:1}).attr("myid"));
        $.ajax({
            url:thisdomain+"suspects/getDescription/"+myid,
            type:"get",
            dataType:"json"
        })
        .done(function(res){
            $('#tFollowup tbody').html("");
            $.each(res.out,function(x,y){
                $('#tFollowup tbody').append('<tr><td>'+y.followupdate+'</td><td>'+y.description+'</td></tr>');
            });
            $('#dFollowup').modal();
        })
        .fail(function(err){
            console.log("Err",err);
        });
    });
});

