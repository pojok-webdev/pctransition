(function($){
    $("#clientname").focus(function(){
        $(this).select();
    });
    $.ajax({
        url:'/clients/list_clients',
        dataType:'json',
        success:function(clnts){
            pelanggan = clnts.out;
            console.log('out',clnts.out);

            $('#clientname').autocomplete({
                lookup: clnts.out,
                onSelect: function(suggestion) {
                    $(".hcpic").html("");
                    console.log("suggestion data",suggestion.data);
                    $.ajax({
                        url:'/clients/getclient/'+suggestion.nofb,
                        type:'get',
                        dataType:'JSON'
                    })
                    .done(function(res){
                        $.ajax({
                            url:'/clients/getpics/'+suggestion.data,
                            type:'get',
                            dataType:'JSON'
                        })
                        .done(function(pics){
                            $.ajax({
                                url:'/clients/getclientservices/'+suggestion.data,
                                type:'get',
                                dataType:'JSON'
                            })
                            .done(function(services){
                                arrservices = [];
                                $.each(services,function(x,y){
                                    console.log('service',x,y);
                                    arrservices.push(y);
                                });
                                strservices = arrservices.join(",");
                                $("#hservice").html(strservices);
                                console.log("Pics",pics);
                                console.log("ADM",pics.adm.name,pics.adm.role,pics.adm.position);
                                $("#hpic").html();
                                $("#picadm").html("ADM : "+pics.adm.name+","+pics.adm.role+","+pics.adm.position);
                                $("#picbilling").html("BILLING : "+pics.billing.name+","+pics.billing.role+","+pics.billing.position);
                                $("#picresp").html("RESP : "+pics.resp.name+","+pics.resp.role+","+pics.resp.position);
                                $("#picsubscriber").html("RESP : "+pics.subscriber.name+","+pics.subscriber.role+","+pics.subscriber.position);
                                $("#picsupport").html("SUPPORT : "+pics.support.name+","+pics.support.role+","+pics.support.position);
                                $("#picteknis").html("TEKNIS : "+pics.teknis.name+","+pics.teknis.role+","+pics.teknis.position);
                            })
                            .fail(function(err){
                                console.log("Err Services",err);
                            });
                        })
                        .fail(function(errpics){
                            console.log("Err Pics",errpics);
                        });
                        console.log("getclient success");
                        console.log("Name",res.name);
                        console.log("Address",res.address);
                        $("#hnpwp").html(res.npwp);
                        $("#hsiup").html(res.siup);
                        $("#hcity").html(res.city);
                        $("#hname").html(res.name);
                        $("#haddress").html(res.address);
                        $("#hservice").html(res.service);
                    })
                    .fail(function(err){
                        console.log("getclient error",err);
                    });
                    console.log('suggestion',suggestion);
                    //$('#selction-backbone').html('You selected: ' + suggestion.value + ', ' + suggestion.data);
                },
                onHint: function (hint) {
                    console.log('hint',hint);
                    //$('#autocomplete-backbone-x').val(hint);
                },
                onInvalidateSelection: function() {
                    //$('#selction-backbone').html('You selected: none');
                }
            });
        }
    });
    $.fn.applyfilter = function(options){
        var settings = $.extend({
            dcontainer : ''
        },options);
        $(this).change(function(){
            console.log("ccontainer change");
            if($(this).prop("checked")){
                console.log("dcontainer show");
                settings.dcontainer.show();
            }else{
                console.log("dcontainer hide");
                settings.dcontainer.hide();
            }
        });
    }
    $("#cpic").prop("checked",true);
    $("#ccontact").prop("checked",true);
    $("#cnpwp").prop("checked",true);
    $("#cservice").applyfilter({
        dcontainer:$("#dservice")
    });
    $("#cnpwp").applyfilter({
        dcontainer:$("#dnpwp")
    });
    $("#ccontact").applyfilter({
        dcontainer:$("#dcontact")
    });
    $("#cpic").applyfilter({
        dcontainer:$("#dpic")
    });
}(jQuery))
