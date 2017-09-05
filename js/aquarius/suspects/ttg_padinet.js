$(document).ready(function () {
	$('.dtpicker').datepicker({dateFormat: 'dd/mm/yy'});
	$('#btnprevdata').click(function () {
		window.location.href = thisdomain + "suspects/internet_need_confirmation/" + $("#client_id").val();
	});
	$('#btnnextdata').click(function () {
		$.post(thisdomain + 'suspects/drop_client_priority', {client_id: $('#client_id').val()}).fail(function () {
			alert('drop client  failed');
		}).done(function () {
			var c = 1;
			$.each($("#sortable li"), function () {
				$.post(thisdomain + 'suspects/save_client_priority', {client_id: $('#client_id').val(), name: $(this).text(), priority: c});
				c += 1;
			});
		});
		$('.ttgpadinet').makekeyvalparam();
		$.post(thisdomain + 'suspects/edit_client', JSON.parse('{"id":"' + $('#workplace').attr('myid') + '",' + $('.ttgpadinet').attr('keyval') + '}')).done(function (data) {
			$.ajax({
				url:thisdomain+'suspects/updatebyclientid',
				data:JSON.parse('{"client_id":"' + $('#workplace').attr('myid') + '",' + $('.ttgpadinet').attr('keyval') + '}'),
				type:'post'
			})
			.done(function(res){
				console.log("Resulst suspect edut",res);
				console.log("ttg padinet",$('.ttgpadinet').attr('keyval'));
				var complete = true;
				var uncompletefields = [];
				if($("#interested").val()==="2"){
					complete = false;
					uncompletefields.push("tertarik");
				}else if($("#interested").val()==="1"){
					if(($("#service_interested_to").val()==="0")){
						complete = false;
						uncompletefields.push("layanan diinginkan");
					}
				}
				if($("#known_us").val()==="2"){
					complete = false;
					uncompletefields.push("Kenal PadiNET");
				}else if($("#known_us").val()==="1"){
					if($("#known_from").val()==="pilihlah"){
						complete = false;
						uncompletefields.push("tahu dari");
					}				
				}
				if(complete){
					/*$('#dModal').modal().hideafter({
						timeout: 2000,
						nexturl: thisdomain + 'suspects'
					});				*/
					$(this).showModal({
						message:"Terimakasih telah mengisi data",
						expire:2000,
						nextUrl:thisdomain+"suspects"
					});
				}else{
					$(this).showModal({
						message:"Data harus lengkap ("+uncompletefields.join()+")",
						expire:2000
					});
				}
				
			})
			.fail(function(err){
				console.log("Error update suspect",err);
			});
		}).fail(function () {
			alert('Tidak dapat menyimpan,silakan hubungi Developer');
		});
	});
	$("#known_us").change(function(){
		switch($(this).val()){
			case "0":
				$("#dknwnfrom").hide();
			break;
			case "1":
				$("#dknwnfrom").show();
			break;
		}
});
	$("#interested").change(function(){
		switch($(this).val()){
			case "0":
				$("#whichsrvc").hide();
			break;
			case "1":
				$("#whichsrvc").show();
			break;
		}
});


	$('#sortable').sortable();
	$('#sortable').disableSelection();
});
