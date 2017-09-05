(function($){
	$(".btn_addofficer").click(function(){
		$('.updateoficer').hide();
		$("#dAddOfficer").modal();
	});
	$(".userpic").click(function(){
		var _this = $(this),
			oname = $(this).attr("officer_name").toLowerCase();
		$.post(thisdomain+'install_sites/add_officer/',{officer_name:oname,site_id:$('#install_site_id').val()}).done(function(data){
			$("#officer").append('<tr thisid='+data+'><td><a class="fancybox" rel="group" href="'+baseurl+'media/users/'+oname+'.jpg"><img src="'+_this.find('img').attr('src')+'" class="img-polaroid" width=20 height=20 /></a></td><td class="info"><a>'+oname+'</a></td><td><a><span class="icon-trash pointer remove_installer" officer="'+oname+'" ></span></a></td></tr>');
			update_rowcount($("#total_installer"),$("#officer tbody tr"));
			$("#dAddOfficer").modal("hide");
		}).fail(function(){
			alert("Tidak dapat menyimpan petugas, silakan hubungi Developer");
		});
	});
	$("#officer").on("click",".remove_installer",function(){
		selected = $(this).stairUp({level:3});
		$.post(thisdomain+'install_installers/remove',{id:selected.attr("thisid")}).done(function(data){
			selected.fadeOut(2000);selected.remove();
			update_rowcount($("#total_installer"),$("#officer tbody tr"));
		}).fail(function(){
			alert("Tidak dapat menghapus petugas, silakan hubungi Developer");
		});
	});
}(jQuery))
