<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="/css/padilibs/autocomplete/cosmetics.css" />
    <?php $this->load->view("v2/commons/head");?>
    <script type="text/javascript" src="/js/padilibs/padi.autocomplete.js"></script>
    <script type="text/javascript" src="/js/jqueryui.1.10.4/jquery.ui.autocomplete.js"></script>

</head>
<body>
    <div class="header">
        <a class="logo" href="index.html"><img src="/img/aquarius/logo.png" alt="padiApp" title="padiApp"/></a>
        <ul class="header_menu">
            <li class="list_icon"><a href="#">&nbsp;</a></li>
        </ul>    
    </div>
    <?php $this->load->view('adm/menu');?>
    <div class="content">
        
        
        <div class="breadLine">
            
            <ul class="breadcrumb">
                <li><a href="#">Simple Admin</a> <span class="divider">></span></li>                
                <li class="active">Forms stuff</li>
            </ul>
            <?php $this->load->view('adm/buttons');?>
        </div>
        
        <div class="workplace">
            
            <div class="row-fluid">
                
                <div class="span12">
                    <div class="head clearfix">
                        <div class="isw-documents"></div>
                        <h1>Text fields</h1>
                    </div>
                    <div class="block-fluid">
                        <div class="row-form clearfix">
                            <div class="span3">Input type text:</div>
                            <div class="span9"><input type="text" id="padiText" /></div>
                            <ul id='result'>
                            </ul>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Input type text:</div>
                            <div class="span6"><input type="text" id="padiText2" /></div>
                            <div class="span3"><input type="text" id="padiText2val" /></div>
                        </div>                        
                    </div>
                </div>  
            </div>            
            <div class="dr"><span></span></div>
        </div>
    </div>   
    <script type="text/javascript" src="/js/v2/clients/index.js"></script>
    <script type='text/javascript'>
        console.log("PadiNET");
        $.ajax({
            url:'/pclients/getclients',
            datatype:'json'
        })
        .done(function(res){
            console.log("Res",res);
            obj = JSON.parse(res);
            $('#padiText').autocomp({
                data:obj,
            });        
        })
        .fail(function(err){
            console.log("Err",err);
        });

        $( "#padiText2" ).autocomplete({
            source: "/pclients/feed",
            minLength: 2,
            focus:function(event,ui){
                $("#padText2").val(ui.item.label);
                return false;
            },
            select:function(event,ui){
                console.log("Label dipilih",ui.item.label);
                $("#padiText2").val(ui.item.label);
                $("#padiText2val").val(ui.item.value);
                return false;
            }
        })
    </script>
</body>
</html>
