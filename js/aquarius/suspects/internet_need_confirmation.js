$(document).ready(function(){
    $.ajax({
        url:thisdomain+"clients/getJson/"+$('#client_id').val(),
        type:'get',
        dataType:'json'
    }).done(function(data){
        if(!data['internet_demand']){
            console.log('internet_demand is null');
        }
        if(data['internet_demand']==="1"){
            $("#yes_radio").prop("checked",true);
            $("#yes_radio").parents("span").addClass("checked");            
            $("#no_radio").prop("checked",false);
            $("#no_radio").parents("span").removeClass("checked");            
        }
        if(data['internet_demand']==="0"){
            $("#no_radio").prop("checked",true);
            $("#no_radio").parents("span").addClass("checked");            
            $("#yes_radio").prop("checked",false);
            $("#yes_radio").parents("span").removeClass("checked");            
        }
    });
    $("#btnnextdata").click(function(){
        console.log($('input[name="use_internet"]:checked').val());
        switch($('input[name="need_internet"]:checked').val()){
            case "membutuhkan Internet":
                $.post(thisdomain+'suspects/edit_client',{id:$('#client_id').val(),internet_demand:'1'}).done(function(){
                        window.location.href = thisdomain+'suspects/ttg_padinet/'+$('#client_id').val();
                }).fail(function(){
                        alert('Tidak dapat mengupdate Client, silakan hubungi Developer');
                });
                break;
            case "tidak membutuhkan Internet":
                $.post(thisdomain+'suspects/edit_client',{id:$('#client_id').val(),internet_demand:'0'}).done(function(){
                        $(this).showModal({
                                message:"Terimakasih bersedia dihubungi",
                                nextUrl:thisdomain+"suspects",
                                labelAlignment:"left"
                        });
                }).fail(function(){
                        alert('Tidak dapat mengupdate Client, silakan hubungi Developer');
                });
                break;
            default:
                $(this).showModal({message:"Anda harus memilih salah satu check box yang telah disediakan",expire:3000});
                break;
        }
    });
    $("#btnprevdata").click(function(){
        window.location.href = thisdomain+"suspects/subscription_confirmation/"+$("#client_id").val();
    });
})
