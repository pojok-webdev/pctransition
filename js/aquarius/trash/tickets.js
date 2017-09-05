$(document).ready(function(){
	oTable = $(".tickettable").dataTable();

	setInterval(function(){
		d = new Date();
		$.each($(".vartime"),function(){
			prevtime = id2jsdate($(this).parent().prev().prev().find('span').html());
			if($(this).parent().prev().find('span').html()){
				nexttime = id2jsdate($(this).parent().prev().find('span').html());
			}else{
				nexttime = new Date();
			}
			$(this).timelength(nexttime,prevtime);
			$(this).html($(this).attr('timelength'));
		});;
	},2000);
	
	$("#modaltitle").click(function(){
		$("#ts").getdate().addhour($("#tsh")).addminute($("#tsm")).getjsdate();
		$("#te").getdate().addhour($("#teh")).addminute($("#tem")).getjsdate();
		dt1 = new Date($("#te").attr("jsdate"));
		dt2 = new Date($("#ts").attr("jsdate"));
		resu = datediff(dt1,dt2);
		$("#content").timelength(dt2);
		alert(resu.day + ' ' + resu.hour + ' ' + resu.minute);
	});
	
	$(".tohuman").sql2idformat();

	$("#btnaddticket").click(function(){
		$("#clientname").populate($("#requesttype").val());
		$("#btnsaveticket").show();
		$("#btnupdateticket").hide();
		$("#modaltitle").html("Penambahan Request");
		$("#expmodal").modal();
	});
	
	$(".btnclose").click(function(){
		$("#expmodal").modal("hide");
	});
	
	$(".btneditticket").click(function(){
		id = $(this).attr('myid');
		editticket(id);
	});
	
	$("#btnsaveticket").click(function(){
		//$('inp_ticket').makekeyvalparam();
		$.post(thisdomain+'tickets/add',{requesttype:$('#requesttype').val(),clientname:$('#clientname :selected').text(),location:$('#location').val(),subject:'',content:$('#content').val(),status:'1',user_name:'',ticketstart:$('#ts').getdate().addhour($('#tsh')).addminute($('#tsm')).attr('datetime'),ticketend:$('#te').getdate().addhour($('#teh')).addminute($('#tem')).attr('datetime'),requeststart:$('#rs').getdate().addhour($('#rsh')).addminute($("#rsm")).attr('datetime'),requestend:$('#re').getdate().addhour($('#reh')).addminute($('#rem')).attr('datetime'),cause:$('#cause :selected').text()}).done(function(data){
			$(".tickettable").dataTable().fnAddData([
			$('#clientname :selected').text(),
			$('#rs').getdate().addhour($('#rsh')).addminute($("#rsm")).attr('datetime'),
			$('#re').getdate().addhour($('#reh')).addminute($('#rem')).attr('datetime'),
			'durasi',
			'<a class="icon-pencil btneditticket" id="btneditticket'+data+'" myid="'+data+'"></a>'
			]);
			$("#btneditticket"+data).bind('click',function(){
				id = $(this).attr('myid');
				editticket(id);
			});
		}).fail(function(){
			alert('Tidak dapat menyimpan ticket, silakan hubungi Developer');
		});
		
	});
	
	$("#btnsearch").click(function(){
		$("#dSearch").modal();
	});
	
	$("#btnupdateticket").click(function(){
		$.post(thisdomain+'tickets/update',{id:$(this).attr('myid'),requesttype:$("#requesttype").val(),clientname:$("#clientname :selected").text(),location:$("#location").val(),subject:"",content:$("#content").val(),reporter:$("#name").val(),status:"",ticketstart:$("#ts").getdate().addhour($("#tsh")).addminute($("#tsm")).attr('datetime'),ticketend:$("#te").getdate().addhour($("#teh")).addminute($("#tem")).attr("datetime"),requeststart:$("#rs").getdate().addhour($("#rsh")).addminute($("#rsm")).attr("datetime"),requestend:$("#re").getdate().addhour($("#reh")).addminute($("#rem")).attr("datetime"),cause:$("#cause :selected").text()}).done(function(data){
	        var anSelected = fnGetSelected( oTable );
			if ( anSelected.length !== 0 ) {
				oTable.fnUpdate( [$("#clientname :selected").text(),$("#rs").getdate().addhour($("#rsh")).addminute($("#rsm")).attr("datetime"),$("#re").getdate().addhour($("#reh")).addminute($("#rem")).attr("datetime"),'d','','<a class="icon-pencil btneditticket"> </a>'], anSelected[0]);
			}
			
            
		}).fail(function(){
			alert("Tidak dapat mengupdate Ticket, silakan menghubungi Developer");
		});;
	});
	
	$('.cleardatetime').click(function(){
		$.each($(this).parent().parent().find(".dttime"),function(){
			$(this).val("");
		});
	});
	
	$('.datetimepickers').datepicker({dateFormat:'dd/mm/yy'});
	
	$("#requesttype").change(function(){
		$("#clientname").populate($(this).val());
	});
	
	$("#search").click(function(){
		oTable.fnDraw();
		//oTable.fnFilter($("#searchname").val());
		$("#dSearch").modal('hide');
	});
	
	$("#service").populateservice();
	
    $(".tickettable tbody tr").click( function( e ) {
        if ( $(this).hasClass('row_selected') ) {
            $(this).removeClass('row_selected');
        }
        else {
            oTable.$('tr.row_selected').removeClass('row_selected');
            $(this).addClass('row_selected');
        }
    });
    
   	//fnHide(5);
});



sqltohumandate = function(str,dt,hr,mn){
	data = str.split(" ");
	data0 = data[0];
	data1 = data[1];
	mydate = data0.split("-");
	mytime = data1.split(":");
	$(dt).val(mydate[2]+'/'+mydate[1]+'/'+mydate[0]);
	$(hr).val(mytime[0]);
	$(mn).val(mytime[1]);
};

editticket = function(id){
	$.getJSON(thisdomain+'tickets/getJSON/'+id,function(dt){
		$("#requesttype").selectopt(dt['requesttype']);
		$("#clientname").populate($("#requesttype").val()).selectopt(dt['clientname']);
		$("#location").val(dt['location']);
		$("#name").val(dt['reporter']);
		$("#cause").val(dt['cause']);
		sqltohumandate(dt['requeststart'],"#rs","#rsh","#rsm");
		sqltohumandate(dt['requestend'],"#re","#reh","#rem");
		sqltohumandate(dt['ticketstart'],"#ts","#tsh","#tsm");
		sqltohumandate(dt['ticketend'],"#te","#teh","#tem");
	});
	$("#modaltitle").html("Edit Request");
	$("#btnsaveticket").hide();
	$("#btnupdateticket").attr("myid",id);
	$("#btnupdateticket").show();
	$("#expmodal").modal();
	
}

$.fn.dataTableExt.afnFiltering.push(
	function(oSettings, aData, iDataIndex){
		data1 = sql2jsdate($('"'+aData[1]+'"').html());
		data2 = sql2jsdate($('"'+aData[2]+'"').html());
		filterdate1 = ($("#searchtime1").getdate().addhour($("#filterhour1")).addminute($("#filterminute1")).attr("datetime"));
		filterdate2 = ($("#searchtime2").getdate().addhour($("#filterhour2")).addminute($("#filterminute2")).attr("datetime"));
		filter1 = sql2jsdate(filterdate1+':00');
		filter2 = sql2jsdate(filterdate2+':00');
		duration = datediff(data2,data1);
		if($("#cbnama").is(":checked")){
			if(aData[0].toLowerCase().indexOf($("#searchname").val().toLowerCase())!=-1){
				return true;
			}
		}
		if($("#cbrentangwaktu").is(":checked")){
			if(filter2>data1 && data2>filter1){
				return true;
			}
		}
		if($("#cbdurasi").is(":checked")){
			if(duration.simple==$("#searchduration :selected").text()){
				return true;
			}
		}
		if($("#cbcause").is(":checked")){
			if(aData[4]==$("#searchcause :selected").text()){
				return true;
			}
		}
		$(".tohuman").sql2idformat();
	}
);

$.fn.populate = function(thisval){
	$(this).html("");
	opt = '';
	thiselement = $(this);
	switch(thisval){
		case 'backbone':
			$.ajax({
				url:thisdomain+"backbones/get",
				async:false,
				dataType:'json'
			}).done(function(data){
				$.each(data,function(x,y){
					opt+='<option value="'+y+'">'+y+'</option>';
				});
				$(opt).appendTo(thiselement);
			});
		break;
		case 'pelanggan':
			$.ajax({
				url:thisdomain+"clients/get_combo_data_address",
				async:false,
				dataType:'json'
			}).done(function(data){
				$.each(data,function(x,y){
					opt+='<option value="'+y+'">'+y+'</option>';
				});
				$(opt).appendTo(thiselement);
			});
		break;
		case 'datacenter':
			$.ajax({
				url:thisdomain+"datacenters/get",
				async:false,
				dataType:'json'
			}).done(function(data){
				$.each(data,function(x,y){
					opt+='<option value="'+y+'">'+y+'</option>';
				});
				$(opt).appendTo(thiselement);
			});
		break;
		case 'bts':
			$.ajax({
				url:thisdomain+"btses/get",
				async:false,
				dataType:'json'
			}).done(function(data){
				$.each(data,function(x,y){
					opt+='<option value="'+y+'">'+y+'</option>';
				});
				$(opt).appendTo(thiselement);
			});
		break;
	}
	return thiselement;
}

$.fn.populateservice = function(){
	$(".service").empty();
	opt = '';
	$.getJSON(thisdomain+'services/getJSON/',function(data){
		$.each(data,function(x,y){
			opt+='<option value="'+x+'">'+y+'</option>';
		});
		$(opt).appendTo("#service");
	});
	
}

function fnShowHide( iCol ){
	/* Get the DataTables object again - this is not a recreation, just a get of the object */
	var oTable = $('.tickettable').dataTable();
	 
	var bVis = oTable.fnSettings().aoColumns[iCol].bVisible;
	oTable.fnSetColumnVis( iCol, bVis ? false : true );
}

function fnHide( iCol ){
	/* Get the DataTables object again - this is not a recreation, just a get of the object */
	/*otable = $(".tickettable").dataTable();*/
	var bVis = oTable.fnSettings().aoColumns[iCol].bVisible;
	oTable.fnSetColumnVis( iCol, false );
}

function fnGetSelected( oTableLocal ){
    return oTableLocal.$('tr.row_selected');
}
