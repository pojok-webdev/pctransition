(function($){
	$(".addSite").click(function(){
		$("#dAddSiteDistance").modal("show");
	});
	
	$("#saveSiteDistance").click(function(){
		$.post(thisdomain+'adm/surveysitedistanceadd',{
			survey_site_id:$("#workplace").attr("site_id"),
			createuser:$("#createuser").val(),
			obstacle:$("#obstacle").val(),
			los:$("#los").val(),
			address:$("#site_id :selected").text(),
			distance:$("#site_distance").val(),
			description:$("#site_description").val()
		}).done(function(data){
			populate_other_site(data);
			update_rowcount($("#total_client_site"),$(".otherclient tbody tr"));
		}).fail(function(){
			alert("Tidak bisa menyimpan jarak site, hubungi Developer");
		});
	});
	
	populate_other_site = function(rowid){
		//$(".otherclient").append("<tr myid="+rowid+"><td><a>"+$("#site_id :selected").text()+"</a></td><td class='info'><a>"+$("#site_description").val()+"</a></td><td>"+$("#site_distance").val()+"</td><td><a><span class='icon-remove pointer otherclient_remove' ></span></a></td></tr>"); 
		$(".otherclient").append("<tr myid="+rowid+"><td><a>"+$("#site_id :selected").text()+"</a></td><td>"+$("#site_distance").val()+"</td><td><a>"+$("#los :selected").text()+"</a></td><td><a>"+$("#obstacle").val()+"</a></td><td class='info'><a>"+$("#site_description").val()+"</a></td><td><a><span class='icon-remove pointer otherclient_remove'></span></a></td></tr>"); 
		
		$('.otherclient_remove').bind('click',function(){
			selected = $(this).stairUp({level:3});
			myid = selected.attr('myid');
			$.ajax({
				url:thisdomain+'survey_site_distances/remove',
				data:{id:myid},
				type:'post',
				async:false
			}).done(function(data){
				$(this).showModal({
					message:'Cabang Pelanggan terpilih telah dihapus'
				});
				selected.remove();
				update_rowcount($("#total_client_site"),$(".otherclient tbody tr"));
			});
		});
	}

	$('.otherclient_remove').click(function(){
		selected = $(this).stairUp({level:3});
		myid = selected.attr('myid');
		$.ajax({
			url:thisdomain+'survey_site_distances/remove',
			data:{id:myid},
			type:'post',
			async:false
		}).done(function(data){
			$(this).showModal({
				message:'Cabang Pelanggan terpilih telah dihapus'
			});
			selected.remove();
			update_rowcount($("#total_client_site"),$(".otherclient tbody tr"));
		});
	});
}(jQuery));
