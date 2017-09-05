(function($){

	var tUsers = $('#tUsers').dataTable();
	tUsers.fnSetColumnVis(6,false);
	tUsers.fnFilter("active-user");
	$("#activeuser").click(function(){
		tUsers.fnFilter("active-user");
		$(".dd-list").hide();
	});
	$("#nonactiveuser").click(function(){
		tUsers.fnFilter("non_active_user");
		$(".dd-list").hide();
	});
	$("#alluser").click(function(){
		tUsers.fnFilter("allusers_");
		$(".dd-list").hide();
	});
	$("#btnNodeView").click(function(){
		window.location.href = thisdomain+"users/nodeview";
	});
	$("#btnAdd").click(function(){
		$('#userupdate').hide();
		$('#usersave').show();
		$("#dAddUser").modal();
	});
	$("#tUsers").on("click",".btnsetpassword",function(){
		$("#tUsers tbody tr").removeClass("selected");
		var tr = $(this).stairUp({level:4}),
			thisid = tr.attr('thisid');
			tr.addClass('selected');

		$("#dSetPassword").modal();
	});
	$('#btnsavepassword').click(function(){
		var mail = $("#tUsers tbody tr.selected").find('.phone .mail').html();
		console.log("MAIL",mail);
		console.log("PASSW",$('#cpassword').val());
		$.post(thisdomain+'users/updatepassword',{email:mail,newpassword:$('#cpassword').val()}).done(function(data){
			$('#dChangePassword').modal('hide');
			console.log("DATA",data);
		}).fail(function(){
			alert('Tidak dapat menyimpan password, silakan hubungi Developer');
		});
	});
	$("#userupdate").click(function(){
		$(".inp_user").makekeyvalparam();
		$.ajax({
			url:thisdomain+'users/update',
			data:JSON.parse('{"id":"'+$("#tUsers tbody tr.selected").attr("thisid")+'",'+$('.inp_user').attr('keyval')+',"group_id":"'+$('#group_id').val()+'"}'),
			type:'post',
			success:function(data){
				$("#tUsers tbody tr.selected").find('.phone').html('<div>'+$('#phone').val()+'</div><span>'+$('#email').val()+'</span>');
				console.log('sukes',data);
			},
			error:function(err){
				console.log('err',err);
			}
		});
	});
	$("#usersave").click(function(){
		$(".inp_user").makekeyvalparam();
		console.log($(".inp_user").attr('keyval'));
		console.log("group id",$('#group_id').val());
		$.ajax({
			url:thisdomain+'users/save',
			data:JSON.parse('{"active":"1",'+$('.inp_user').attr('keyval')+',"group_id":"'+$('#group_id').val()+'","branch_id":"'+$('#branch_id').val()+'"}'),
			type:'post',
			success:function(data){
				console.log('sukes',data);
			},
			error:function(err){
				console.log('err',err);
			}
		});
	});
	$("#tUsers").on("click","tbody td .btnedituserpopup",function(){
		var tr = $(this).stairUp({level:4}),
			thisid = tr.attr('thisid');
			tr.addClass('selected');
			$('#userupdate').show();
			$('#usersave').hide();
		$.ajax({
			url:thisdomain+'users/get',
			data:{id:thisid},
			type:'post',
			dataType:'json',
			success:function(data){
				console.log('data',data);
				$('#username').val(data.username);
				$('#email').val(data.email);
				$('#password').val(data.password);
				$('#phone').val(data.phone);
				$('#dAddUser').modal();
			},
			error:function(err){
				console.log('cannot load data',err);
			}
		});
	});
	$('#tUsers').on('click','.btnedituser',function(){
		window.location.href = thisdomain+'users/edit/'+$(this).stairUp({level:4}).attr('thisid');
	});
	$('#tUsers').on('click','.btnsetnonaktif',function(){
		var thisbutton = $(this);
		$('#tUsers tbody tr').removeClass('selected');
		$(this).stairUp({level:4}).addClass('selected');
		$.ajax({
			url:thisdomain+'users/update',
			data:{id:$(this).stairUp({level:4}).attr('thisid'),active:'0'},
			type:'post',
			success:function(){
				$('#tUsers tbody tr.selected td.username').html($('#tUsers tbody tr.selected td.username').html()+' (non aktif)');
				$('#tUsers tbody tr.selected td.aktif').html('allusers_  (non_active_user)');
				thisbutton.removeClass('btnsetnonaktif');
				thisbutton.addClass('btnsetaktif');
				thisbutton.html('<a>Set Aktif</a>');
				console.log('sukses update user');
			},
			error:function(){
				console.log('error update user');
			}
		});
	});
	$('#tUsers').on('click','.btnsetaktif',function(){
		var thisbutton = $(this);
		$('#tUsers tbody tr').removeClass('selected');
		$(this).stairUp({level:4}).addClass('selected');
		$.ajax({
			url:thisdomain+'users/update',
			data:{id:$(this).stairUp({level:4}).attr('thisid'),active:'1'},
			type:'post',
			success:function(){
				$('#tUsers tbody tr.selected td.username').html($('#tUsers tbody tr.selected td.username').html().replace(' (non aktif)',''));
				thisbutton.addClass('btnsetnonaktif');
				thisbutton.removeClass('btnsetaktif');
				thisbutton.html('<a>Set Non Aktif</a>');
				console.log('sukses update user');
			},
			error:function(){
				console.log('error update user');
			}
		});
	});
	$('#tUsers').on('click','.btnsetpicture',function(){
		var thisbutton = $(this);
		$('#tUsers tbody tr').removeClass('selected');
		$(this).stairUp({level:4}).addClass('selected');
		/*$.ajax({
			url:thisdomain+'users/singleUserJson',
			data:{username:$('#tUsers tbody tr.selected .img-polaroid').attr('src')}
		});*/
		$('#output').attr('src',$('#tUsers tbody tr.selected .img-polaroid').attr('src'));
		$('#dSetPicture').modal();
	});
	$('#savepicimage').click(function(){
		$.ajax({
			url:thisdomain+'users/update',
			data:{id:$('#tUsers tbody tr.selected').attr('thisid'),pic:$('#output').attr('src')},
			type:'post',
			success:function(){
				console.log('update pic success');
				$('#dSetPicture').modal('hide');
				$('#tUsers tbody tr.selected .img-polaroid').attr('src',$('#output').attr('src'));
			},
			error:function(err){
				console.log('update pic not success');
			}
		});
	});
	$('.closemodal').click(function(){
		$(this).stairUp({level:4}).modal('hide');
	});
}(jQuery))
