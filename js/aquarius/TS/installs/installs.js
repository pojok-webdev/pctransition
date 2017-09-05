$(document).ready(function(){
	var tInstall = $("#tInstall").dataTable({
		"bPaginate":true,
		"aLengthMenu": [[5, 10, 20, -1], [5, 10, 20, "All"]],
		"iDisplayLength": 5,
		"bSort":true,
		"aaSorting":[[1,"desc"]],
	});
	/*
	setInterval(function(){
		var maxid = tInstall.getDataTableMaxAttr({idAttr:"myid"});
		$.ajax({
			url:thisdomain+'install_requests/getRecordOver/'+maxid,
			type:"get",
			dataType:"json"
		}).done(function(data){
			$.each(data,function(key,val){
				$.each(val,function(a,b){
					$.each(b,function(x,y){
						console.log(x+' and '+y+' or '+b[x] );
					});
					newRow = tInstall.fnAddData([b["name"],b["create_date"],b["createuser"],b["address"],'tgl','pic','<button class="btn btn_edit" type="button">Edit</button>']);
					var row = tInstall.fnGetNodes(newRow);
					$(row).attr('myid', maxid+1);
					var nTr = tInstall.fnSettings().aoData[newRow[0]].nTr;
					var nTds = $('td', nTr);
					nTds.eq(5).addClass('updatable');
					nTds.eq(5).attr('fieldName','duration');
				});
			});
		}).fail(function(){
			console.log("Tidak dapat memeriksa Record baru, silakan hubungi Developer");
		});
	},2000);
		*/
	var nNodes = tInstall.fnGetNodes();
	$(nNodes).find(".tohuman").sql2idformat();
	$(nNodes).find(".tohumandate").formatiddate();
	$(nNodes).find(".tohumanhourminute").formatidtime();
	$('#permintaanmainstalasi').click(function(){
		window.location.href = thisdomain+'install_requests/add_lookup';
	});
	$('#tInstall').on("click","tbody tr .btn_edit",function(){
		window.location.href = thisdomain+'install_requests/install_edit/'+$(this).stairUp({level:4}).attr('install_id');
	});
	$('#tInstall').on("click","tbody tr .btnReport",function(){
		window.location.href = thisdomain+'install_requests/showreport/'+$(this).stairUp({level:4}).attr('install_id');
	});
	$('#tInstall').on("click","tbody tr .btnReport2",function(){
		window.location.href = thisdomain+'install_requests/showreport2/'+$(this).stairUp({level:4}).attr('install_id');
	});
});
