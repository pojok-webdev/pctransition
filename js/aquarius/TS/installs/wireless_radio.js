(function($){
	$("#ip_ap_wireless_radio").fill_ap($("#bts_wireless_radio :selected").val(),null);
	$(".btn_addwirelessradio").click(function(){
		$(".savewr").show();
		$(".updatewr").hide();
		$("#dAddWirelessRadio").modal("show");
	});
	$("#bts_wireless_radio").change(function(){
		$("#ip_ap_wireless_radio").fill_ap($(this).val(),null);
	});
	$("#wirelessradio").on("click",".remove_wireless_radio",function(){
		selected = $(this).stairUp({level:4});
		id = (selected.attr('thisid'));
		$("#wirelessradio tbody tr").each(function(){
			$(this).removeClass("selected");
		});
		selected.addClass("selected");
		$("#dConfirmation").removeConfirmation({
			removeUrl:thisdomain+"install_wireless_radios/remove",
			idElement:selected.attr("thisid"),
			selectedElement:selected,
			totalElement:"total_wireless_radio",
			tableElement:"wirelessradio",
		});
	});
	$("#wirelessradio").on("click",".edit_wireless_radio",function(){
		selected = $(this).stairUp({level:4});
		id = (selected.attr('thisid'));
		$("#wirelessradio tbody tr").each(function(){
			$(this).removeClass("selected");
		});
		selected.addClass("selected");
		console.log("ID Wireless : "+id);
		$(".savewr").hide();
		$(".updatewr").show();
		$(".updatewr").attr("id",id);
		$.getJSON(thisdomain+'install_wireless_radios/getjsonwirelessradio/'+id,function(data){
			$("#tipe_wireless_radio option").each(function(){
				if($(this).text() === data['tipe']){
					$(this).attr('selected','selected');
				}
			});
			$("#bts_wireless_radio option").each(function(){
				if($(this).text() === data['bts']){
					$(this).attr('selected','selected');
				}
			});
			$("#ip_ap_wireless_radio").fill_apbyname(data['bts'],data['ip_ap']);
			$("#macboard_wireless_radio").val(data['macboard']);
			$("#ip_radio_wireless_radio").val(data['ip_radio']);
			$("#essid_wireless_radio").val(data['essid']);
			$("#freqwency_wireless_radio").val(data['freqwency']);
			$("#polarization_wireless_radio").val(data['polarization']);
			$("#user_wireless_radio").val(data['user']);
			$("#password_wireless_radio").val(data['password']);
			$("#signal_wireless_radio").val(data['signal']);
			$("#quality_wireless_radio").val(data['quality']);
			$("#troughput_udp_wireless_radio").val(data['throughput_udp']);
			$("#troughput_tcp_wireless_radio").val(data['throughput_tcp']);
			$("#noise").val(data['noise']);
			$("#ip_ethernet_wireless_radio").val(data['ip_ethernet']);
		});
		$("#dAddWirelessRadio").modal();
	});
	$("#wirelessradio").on("click",".remove_wireless_radio",function(){
		var selected = $(this).stairUp({level:4});
		$("#dConfirmation").removeConfirmation({
			removeUrl:thisdomain+"install_wireless_radios/remove",
			idElement:selected.attr("thisid"),
			selectedElement:selected,
			totalElement:"total_wireless_radio",
			tableElement:"wirelessradio",
		});
	});
	$("#savewirelessradio").click(function(){
		$(".inp_wireless").makekeyvalparam();
		$.ajax({
			url:thisdomain+'install_wireless_radios/add',
			data:JSON.parse('{"install_site_id":"'+$("#workplace").attr("install_site_id")+'",'+$(".inp_wireless").attr("keyval")+'}'),
			type:"post",
		}).fail(function(){
			console.log("Tidak dapat menambah wireless radio");
		}).done(function(data){
			$("#wirelessradio").appendwirelessradio(data);
		});
	});
	$(".updatewr").click(function(){
		$(".inp_wireless").makekeyvalparam();
		console.log("inp_wireless : "+$(".inp_wireless").attr("keyval"));
		$.ajax({
			url:thisdomain+"install_wireless_radios/edit",
			data:JSON.parse('{"id":"'+$("#wirelessradio tbody tr.selected").attr("thisid")+'",'+$(".inp_wireless").attr("keyval")+'}'),
			type:"post"
		}).fail(function(){
			console.log("Tidak dapat mengupdate");
		}).done(function(data){
			$("#wirelessradio tbody tr.selected").find(".tipe_wireless_radio").html($("#tipe_wireless_radio :selected").text());
			$("#wirelessradio tbody tr.selected").find(".info").html('<a>Macboard: '+$("#macboard_wireless_radio").val()+'</a> <span>IP Radio : '+$("#ip_radio_wireless_radio").val()+'</span> <span>Frek.'+$("#freqwency_wireless_radio").val()+'</span>');
			$("#wirelessradio tbody tr.selected").find(".tessid").html($("#essid_wireless_radio").val());
		});
	});
}(jQuery))
$.fn.appendwirelessradio = function(data){
	$(this).append('<tr thisid='+data+'><td class="tipe_wireless_radio">'+$("#tipe_wireless_radio :selected").text()+'</td><td class="info"><a>Macboard: '+$("#macboard_wireless_radio").val()+'</a> <span>IP Radio : '+$("#ip_radio_wireless_radio").val()+'</span> <span>'+$("#freqwency_wireless_radio").val()+'</span></td><td>'+$("#essid_wireless_radio").val()+'</td><td><div class="btn-group"><button data-toggle="dropdown" class="btn btn-small dropdown-toggle"  > Aksi <span class="caret"></span></button><ul class="dropdown-menu pull-right"><li class="edit_wireless_radio"><a>Edit</a></li><li class="divider"></li><li class="remove_wireless_rdio"><a>Hapus</a></li></ul></div></td></tr>');
	$.post(thisdomain+"adm/get_rowcount",{modelname:'install_wireless_radio',colname:'install_site_id',colval:$('#workplace').attr('install_site_id')}).done(function(count){
		$("#total_wireless_radio").html('Total : '+count);
	});
}
