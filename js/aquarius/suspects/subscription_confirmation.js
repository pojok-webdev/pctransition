$(document).ready(function(){
    $.ajax({
        url:thisdomain+"clients/getJson/"+$('#clientid').val(),
        type:'get',
        dataType:'json'
    }).done(function(data){
        if(!data['has_internet_connection']){
            console.log('has_internet_connection is null');
        }
        if(data['has_internet_connection']==="1"){
            $("#yes_radio").prop("checked",true);
            $("#yes_radio").parents("span").addClass("checked");            
            $("#no_radio").prop("checked",false);
            $("#no_radio").parents("span").removeClass("checked");            
        }
        if(data['has_internet_connection']==="0"){
            $("#no_radio").prop("checked",true);
            $("#no_radio").parents("span").addClass("checked");            
            $("#yes_radio").prop("checked",false);
            $("#yes_radio").parents("span").removeClass("checked");            
        }
    });
    $("#btnnextdata").click(function(){
        console.log($('input[name="use_internet"]:checked').val());
        switch($('input[name="use_internet"]:checked').val()){
            case "menggunakan Internet":
                $.post(thisdomain+'suspects/edit_client',{id:$('#clientid').val(),has_internet_connection:'1'}).done(function(data){
                    $.ajax({
                        url:thisdomain+'suspects/updatebyclientid',
                        data:{client_id:$('#clientid').val(),has_internet_connection:'1'},
                        type:'post'
                    })
                    .done(function(){
                        window.location.href = thisdomain+'suspects/provider_yg_digunakan/'+$('#clientid').val();
                    })
                    .fail(function(){
                        console.log("Error update suspects");
                    });
                        
                }).fail(function(){
                        alert("Tidak dapat mengupdate Client, silakan hubungi Developer");
                });
                break;
            case "Belum menggunakan Internet":
                $.post(thisdomain+'suspects/edit_client',{id:$('#clientid').val(),has_internet_connection:'0'}).done(function(data){
                        window.location.href = thisdomain+'suspects/internet_need_confirmation/'+$('#clientid').val();
                }).fail(function(){
                        alert("Tidak dapat mengupdate Client, silakan hubungi Developer");
                });
                break;
            default:
                $(this).showModal({message:"Anda harus memilih salah satu check box yang telah disediakan",expire:3000});
                break;
        }
    });
        $("#btnprevdata").click(function(){
            window.location.href = thisdomain+"suspects/add_pic/"+$("#clientid").val();
        });
})
