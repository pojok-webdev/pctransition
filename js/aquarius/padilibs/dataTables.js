update_rowcount = function(myselector,mytable){
	myselector.html(mytable.length);
}
$.fn.rowcount = function(){
	return $("tbody tr:last",this).index()+1;
}
$.fn.tableRowSelect = function(){
	$(this).find('tr').each(function(){
		$(this).bind('click',function(e){
			$(this).parent().find('.row_selected').removeClass('row_selected');
			e.preventDefault();
			e.stopPropagation();
			$(this).addClass('row_selected');
		});
	});
}
$.fn.doRemoveTableRow = function(options){
	var settings = $.extend({
		tableName:'fill with tableName',
		url:'fill with remove url',
		removerButtonDepth:1
	},options);
	$('#'+settings.tableName+' tbody tr').removeClass('selected');
	$(this).stairUp({level:settings.removerButtonDepth}).addClass('selected');
	$.ajax({
		url:settings.url,
		data:{id:$(this).stairUp({level:settings.removerButtonDepth}).attr('trid')},
		type:'post'
	}).done(function(data){
		$('#'+settings.tableName+' tbody tr.selected').remove();
		update_rowcount($("#total_installer"),$('#'+settings.tableName+' tbody tr'));
	}).fail(function(){
		console.log('cannot remove row');
	});
}
$.fn.getDataTableMaxAttr = function(options){
	settings = $.extend({
		idAttr:"thisid"
	},options);
	var nodes = this.fnGetNodes();
	var maxid = null;
	$.each(nodes,function(data){
		var thisid = parseInt($(this).attr(settings.idAttr));
		if(maxid==null||(thisid>maxid)){
			maxid = thisid;
		}
	});
	return maxid;
}
