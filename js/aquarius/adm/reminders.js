(function($){
	tReminder = $('#tReminder').dataTable({
		"aLengthMenu":[5,10],
	});
	var taContent = $("#remindercontent").cleditor({width:"100%", height:"100%",controls:"bold italic underline | font size style | color highlight removeformat | bullets numbering | outdent alignleft center alignright justify"})[0].focus();
	tReminder.on("click","tr .btntogglereminder",function(){
		var selected = $(this).stairUp({level:4});
		var active = selected.find(".active").html();
		var activeval = "1";
		console.log(active);
		switch(active){
			case "Non Aktif":
				activeval = "1";
				selected.find(".active").html("Aktif");
				selected.find(".btntogglereminder").html("<a>Jadikan Non Aktif</a>");
			break;
			case "Aktif":
				activeval = "0";
				selected.find(".active").html("Non Aktif");
				selected.find(".btntogglereminder").html("<a>Jadikan Aktif</a>");
			break;
		}
		$.ajax({
			url:thisdomain+"reminders/update",
			data:{"id":selected.attr("myid"),"active":activeval},
			type:"post"
		}).done(function(data){
			console.log(data);
		}).fail(function(){
			console.log("Tidak dapat mengupdate reminder, silakan hubungi Developer");
		});
	});
	tReminder.on('click','tr .btneditreminder',function(){
		var selected = $(this).stairUp({level:4});
		$.ajax({
			url:thisdomain+"reminders/getJson",
			data:{"id":selected.attr("myid")},
			type:"post",
			dataType:"json"
		}).done(function(data){
			console.log("Expire date : "+data["expiredatehour"]);
			console.log("Content : "+data["content"]);
			console.log("Period : "+$("#period").val());

			$("#tReminder tbody tr").removeClass("selected");
			selected.addClass("selected");
			$("#myModalLabel").html("Perubahan Reminder");
			$("#period").val(data["period"]);
			switch($("#period").val()){
				case "1":
				$("#perioddetaillabel").html("Menit ke");
				break;
				case "2":
				$("#perioddetaillabel").html("Jam ke");
				break;
				case "3":
				$("#perioddetaillabel").html("Pada Hari");
				break;
				case "4":
				$("#perioddetaillabel").html("Pada Tanggal");
				break;
				case "5":
				$("#perioddetaillabel").html("Pada Bulan");
				break;
			}

			$("#perioddetail").val(data["perioddetail"]);
			$("#subject").val(data["subject"]);
			$("#recipient").val(data["recipient"]);
			$("#remindercontent").val(data["content"]);
			taContent.refresh();
			$("#expiredate").val(data["expiredatedate"]);
			$("#expireHour").val(data["expiredatehour"]);
			$("#expireMinute").val(data["expiredateminute"]);
			$("#btnAddReminderUpdate").show();
			$("#btnAddReminderSave").hide();
			$('#dAddReminder').modal();
		}).fail(function(){
			console.log("Tidak dapat");
		});
	});
	$('#btnAddReminder').click(function(){
		$("#btnAddReminderUpdate").hide();
		$("#btnAddReminderSave").show();
		$("#myModalLabel").html("Penambahan Reminder");
		$('#dAddReminder').modal();
	});
	switch($("#period").val()){
		case "1":
		$("#perioddetaillabel").html("Menit ke");
		break;
		case "2":
		$("#perioddetaillabel").html("Jam ke");
		break;
		case "3":
		$("#perioddetaillabel").html("Pada Hari");
		break;
		case "4":
		$("#perioddetaillabel").html("Pada Tanggal");
		break;
		case "5":
		$("#perioddetaillabel").html("Pada Bulan");
		break;
	}
	$('#perioddetail').populateCombo({
		url:thisdomain+'reminders/getCombo/'+$("#period").val(),
		keyvalpaired:true
	});
	$('#period').change(function(){
		var thisid = $(this).val();
		switch(thisid){
			case "1":
			$("#perioddetaillabel").html("Menit ke");
			break;
			case "2":
			$("#perioddetaillabel").html("Jam ke");
			break;
			case "3":
			$("#perioddetaillabel").html("Pada Hari");
			break;
			case "4":
			$("#perioddetaillabel").html("Pada Tanggal");
			break;
			case "5":
			$("#perioddetaillabel").html("Pada Bulan");
			break;
		}
		$('#perioddetail').populateCombo({
			url:thisdomain+'reminders/getCombo/'+thisid,
			keyvalpaired:true
		});
	});
	$('#btnAddReminderSave').click(function(){
		$('.inp_reminder').makekeyvalparam();
		console.log(thisdomain);
		console.log($('.inp_reminder').attr('keyval'));
		$.ajax({
			url:thisdomain+'reminders/save',
			type:'post',
			data:JSON.parse('{'+$('.inp_reminder').attr('keyval')+'}'),
		}).done(function(data){
			console.log("Data ID created"+data);
		}).fail(function(){
			alert('Tidak dapat menyimpan Reminder, silakan hubungi Developer');
		});
		//alert($('.inp_reminder').attr('keyval'));
	});
	$("#btnAddReminderUpdate").click(function(){
		$('.inp_reminder').makekeyvalparam();
		$.ajax({
			url:thisdomain+"reminders/update",
			data:JSON.parse('{"id":"'+$("#tReminder tbody tr.selected").attr("myid")+'",'+$('.inp_reminder').attr('keyval')+'}'),
			type:"post"
		}).done(function(data){
			console.log(data);
			var newperiod;
			switch($("#period").val()){
				case "1":
				newperiod="Hourly, menit ke "+$("#perioddetail").val();
				break;
				case "2":
				newperiod="Daily, jam ke "+$("#perioddetail").val();
				break;
				case "3":
				newperiod="Weekly, Hari ke "+$("#perioddetail").val();
				break;
				case "4":
				newperiod="Monthly, Hari ke "+$("#perioddetail").val();
				break;
				case "5":
				newperiod="Yearly, bulan ke "+$("#perioddetail").val();
				break;
			}
			$("#tReminder tbody tr.selected").find(".tperiod").html(newperiod);
			$("#tReminder tbody tr.selected").find(".trecipient").html($("#recipient").val());
			$("#tReminder tbody tr.selected").find(".tsubject").html($("#subject").val());
			
		}).fail(function(){
			console.log("Tidak dapat mengupdate Reminder,silakan hubungi Developer");
		});
	});
}(jQuery));
