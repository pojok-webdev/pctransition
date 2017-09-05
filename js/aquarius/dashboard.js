$(document).ready(function(){
	$.getJSON(thisdomain+'adm/get_account',function(data){
		$.each(data,function(x,y){
		});
	});
			
	$('#permintaanmaintenance').click(function(){
		window.location.href = thisdomain+'adm/maintenance_add';
	});
	
	$('#permintaansurvey').click(function(){
		window.location.href = thisdomain+'adm/preclient_lookup';
	});

	$('#permintaaninstalasi').click(function(){
		window.location.href = thisdomain+'adm/add_install_lookup';
	});
	
	$('#showdashboard').click(function(){
		$('#mydashboard').html("");
		$.getJSON(thisdomain+'adm/get_dashboard/'+$('#dtdashboard1').val()+'/'+$('#dtdashboard2').val(),function(data){
			$.each(data,function(a,b){
				var content = '';
				
				$.each(b,function(row,val){
						content += '<tr><td>'+row+'</td><td>'+val['Survey']['nama']+'</td><td>'+val['Survey']['layanan']+'</td><td>'+val['Survey']['status']+'</td><td>'+val['Install']['nama']+'</td><td>'+val['Install']['layanan']+'</td><td>'+val['Install']['status']+'</td><td>'+val['Maintenance']['nama']+'</td><td>'+val['Maintenance']['problem']+'</td><td>'+val['Maintenance']['status']+'</td></tr>';
					
					
				});

				$('#mydashboard').append('<div class="row-fluid"><div class="span12"><div class="head clearfix"><div class="isw-grid"></div><h1>'+a+'</h1></div><div class="block-fluid table-sorting clearfix"><table cellpadding="0" cellspacing="0" width="100%" class="table" id="tSortable_2"><thead><tr><th width="10%" rowspan=2>No</th><th colspan=3 width="30%">Survey</th><th colspan=3 width="30%">Install</th><th colspan=3 width="30%">Troubleshoot</th></tr><tr><th width="10%">Nama</th><th width="10%">Layanan</th><th width="10%">Status</th><th width="10%">Nama</th><th width="10%">Layanan</th><th width="10%">Status</th><th width="10%">Nama</th><th width="10%">Problem</th><th width="10%">Status</th></tr></thead><tbody>'+content+'</tbody></table></div></div></div>');
			})
		});
	});
	
});

get_dashbnotification = function(){
	var notifi = 0;
	var group = 'TS';
	$.getJSON(thisdomain+'adm/get_notification/'+group,function(data){
		switch(group){
			case 'sales':
			$.each(data,function(x,y){
				y = y*1;
				if(x==='survey_2'){
					notifi += y;
				}
				if(x==='install_2'){
					notifi += y;
				}
				if(x==='maintenance_2'){
					notifi += y;
				}
			});
			break;
			case 'TS':
			$.each(data,function(x,y){
				y = y*1;
				if(x==='survey_not_read'){
				$('#survey_not_read').text(y);
				}
				if(x==='survey_not_done'){
				$('#survey_not_done').text(y);
				}
				if(x==='survey_done'){
				$('#survey_done').text(y);
				}
				if(x==='install_not_read'){
					$('#install_not_read').text(y);
				}
				if(x==='install_not_done'){
					$('#install_not_done').text(y);
				}
				if(x==='install_done'){
					$('#install_done').text(y);
				}
				if(x==='maintenance_not_read'){
					$('#maintenance_not_read').text(y);
				}
				if(x==='maintenance_not_done'){
					$('#maintenance_not_done').text(y);
				}
				if(x==='maintenance_done'){
					$('#maintenance_done').text(y);
				}
			});
			break;
		}
	});
}
