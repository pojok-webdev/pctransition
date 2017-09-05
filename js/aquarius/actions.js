$(document).ready(function(){

    //File Upload
    // collapsing widgets
    
        $(".toggle a").click(function(){
            
            var box = $(this).parents('[class^=head]').parent('div[class^=span]').find('div[class^=block]');
            
            if(box.length == 1){
                
                if(box.is(':visible')){        
                    
                    if(box.attr('data-cookie'))                    
                        $.cookies.set(box.attr('data-cookie'),'hidden');
                                        
                    $(this).parent('li').addClass('active');
                    box.slideUp(100);
                    
                }else{
                    
                    if(box.attr('data-cookie'))                    
                        $.cookies.set(box.attr('data-cookie'),'visible');
                                        
                    $(this).parent('li').removeClass('active');
                    box.slideDown(200);
                    
                }
            }
            
            return false;
        });
    
    // collapsing widgets
    
    // setting for list with button <<more>>
        
    var cList = 5; // count list items
    
    
    $(".withList").each(function(){

        if($(this).find('.list li').length > cList){
        
            $(this).find('.list li').hide().filter(':lt('+cList+')').show();
        
            $(this).append('<div class="footer"><button type="button" class="btn btn-small more">show more...</button></div>');
                        
        }
        
        if($(this).hasClass('scrollBox'))
                $(this).find('.scroll').mCustomScrollbar("update");
    });
    
    
    $(".more").live('click',function(){
        
        if(!$(this).hasClass('disabled')){
        
            cList = cList+5;

            var wl = $(this).parents('.withList');
            var list = wl.find('.list li');

            list.filter(':lt('+cList+')').show();

            if(list.length < cList) $(this).addClass('disabled');


            if($(wl).hasClass('scrollBox'))
                $(wl).find('.scroll').mCustomScrollbar("update");

        }
    });    
    // eof setting for list with button <<more>>
    
    
    
    $(".header_menu .list_icon").click(function(){
        
        var menu = $("body > .menu");
        
        if(menu.is(":visible"))
            menu.fadeOut(200);
        else
            menu.fadeIn(300);
        
        return false;
    });
    
    if($(".adminControl").hasClass('active')){
        $('.admin').fadeIn(300);
    }
    
    
    $(".adminControl").click(function(){
        
        if($(this).hasClass('active')){
            
            $.cookies.set('b_Admin_visibility','hidden');
            
            $('.admin').fadeOut(200);
            
            $(this).removeClass('active');
            
        }else{
            
            $.cookies.set('b_Admin_visibility','visible');
            
            $('.admin').fadeIn(300);
            
            $(this).addClass('active');
        }
        
    });
    
    
    $(".navigation .openable > a").click(function(){
        var par = $(this).parent('.openable');
        var sub = par.find("ul");

        if(sub.is(':visible')){
            par.find('.popup').hide();
            par.removeClass('active');            
        }else{
            par.addClass('active');            
        }
        
        return false;
    });
    
    $(".jbtn").button();
    
    $(".alert").click(function(){
        $(this).fadeOut(300, function(){            
                $(this).remove();            
        });
    });
    
    $(".buttons li > a").click(function(){
        
        var parent   = $(this).parent();
        
        if(parent.find(".dd-list").length > 0){
        
            var dropdown = parent.find(".dd-list");

            if(dropdown.is(":visible")){
                dropdown.hide();
                parent.removeClass('active');
            }else{
                dropdown.show();
                parent.addClass('active');
            }

            return false;
            
        }
        
    });


    $("#menuDatepicker").datepicker();
    $(".menuDatepicker").datepicker();
    $(".datepicker").datepicker({dateFormat:'d/m/yy'});
    $(".monthdatepicker").datepicker({dateFormat:'MM - yy'});
	$(".mysqldatepicker").datepicker({dateFormat:'yy-m-d'});

    /* begin of survey handling */
    /* end of survey handling */
    
/*    $('.material_remove').click(function(){
		$(this).parent().parent().parent().fadeOut(200);
		$.post(thisdomain+"index.php/adm/material_remove",{material_id:$(this).attr('material_id')}).done(function(data){alert('sukses');}).fail(function(data){alert('gagal');});
        return false;
	});*/
    //
    
     $(".link_navPopCabangKlien").click(function(){
        if($("#navPopCabangKlien").is(":visible")){
            $("#navPopCabangKlien").fadeOut(200);
        }else{
            $("#navPopCabangKlien").fadeIn(300);
        }
        return false;
    });

	$('#saveotherclient').click(function(){
		saveotherclient();
	});
	
	$('.otherclient_remove').click(function(){
		$(this).parent().parent().parent().fadeOut(200);
		$.post(thisdomain+"adm/survey_removeotherclent",{id:$(this).attr('id')}).done(function(data){}).fail(function(){alert('gagal');});
	});
	
     $(".link_navPopPetugasSurvey").click(function(){
        if($("#navPopPetugasSurvey").is(":visible")){
            $("#navPopPetugasSurvey").fadeOut(200);
        }else{
            $("#navPopPetugasSurvey").fadeIn(300);
        }
        return false;
    });
    
     $(".link_navRemPetugasSurvey").click(function(){
            $(this).parent().parent().parent().fadeOut(200);
            $.post(baseurl+"adm/survey_removeofficer",{survey_id:$(this).attr('survey_id'),user_id:$(this).attr('user_id')});
        return false;
    });
	
	removepetugassurvey = function(){
            $(this).parent().parent().parent().fadeOut(200);
            $.post(baseurl+"adm/survey_removeofficer",{survey_id:$(this).attr('survey_id'),user_id:$(this).attr('user_id')});
	}
	
	function getbaseurl(){
		var l = window.location;
		var base_url = l.protocol + "//" + l.host + "/" + l.pathname.split('/')[1];
		return base_url;
	}
	
	
	/* BEGIN REMOVE DEVICE */
 /*   $('.device_remove').click(function(){
		$(this).parent().parent().parent().fadeOut(200);
        $.post(thisdomain+"adm/survey_removedevice",{device_id:$(this).attr('device_id')}).done(function(data){}).fail(function(){alert('gagal');});
        return false;
	});*/
	/* END OF REMOVE DEVICE */
	
    $(".link_navPopMessages").click(function(){
        if($("#navPopMessages").is(":visible")){
            $("#navPopMessages").fadeOut(200);
        }else{
            $("#navPopMessages").fadeIn(300);
        }
        return false;
    });
    
    $(".link_bcPopupList").click(function(){
        if($("#bcPopupList").is(":visible")){
            $("#bcPopupList").fadeOut(200);
        }else{
            $("#bcPopupList").fadeIn(300);
        }
        return false;
    });    
    
    $(".link_bcPopupSearch").click(function(){
        if($("#bcPopupSearch").is(":visible")){
            $("#bcPopupSearch").fadeOut(200);
        }else{
            $("#bcPopupSearch").fadeIn(300);
        }
        return false;
    });        
    
    
    $(".link_bcPopupFilter").click(function(){
        if($("#bcPopupFilter").is(":visible")){
            $("#bcPopupFilter").fadeOut(200);
        }else{
            $("#bcPopupFilter").fadeIn(300);
        }
        return false;
    });        
    
    $("input[name=checkall]").click(function(){
    
        if(!$(this).is(':checked'))
            $(this).parents('table').find('.checker span').removeClass('checked').find('input[type=checkbox]').attr('checked',false);
        else
            $(this).parents('table').find('.checker span').addClass('checked').find('input[type=checkbox]').attr('checked',true);
            
    });    
    
    
    $(".fancybox").fancybox();
    
    gallery();
    thumbs();
    headInfo();
});

/*$(document).resize(function(){
    
    if($("body > .content").css('margin-left') == '220px'){
        if($("body > .menu").is(':hidden'))
            $("body > .menu").show();
    }
    
    gallery();
    thumbs();
    headInfo();
});*/

function headInfo(){
    var block = $(".headInfo .input-append");
    var input = block.find("input[type=text]");
    var button = block.find("button");
    
    input.width(block.width()-button.width()-44);
    
}

function thumbs(){
    
    var w_block = $(".thumbs.block").width()-20;
    var w_item  = $(".thumbs.block .thumbnail").width()+10;
    
    var c_items = Math.floor(w_block/w_item);
    
    var m_items = Math.floor( (w_block-w_item*c_items)/(c_items*2) );
    
    $(".thumbs.block .thumbnail").css('margin',m_items);

}

function gallery(){
    
    var w_block = $(".block.gallery").width()-20;
    var w_item  = $(".block.gallery a").width();
    
    var c_items = Math.floor(w_block/w_item);
    
    var m_items = Math.round( (w_block-w_item*c_items)/(c_items*2) );    
    
    $(".block.gallery a").css('margin',m_items);
}

changeformat = function(mydate){
	out = mydate.split("/");
	return out[2]+'-'+out[1]+'-'+out[0];
}
