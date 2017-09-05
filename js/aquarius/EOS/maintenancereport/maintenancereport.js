/*
EOS maintenance report
by puji w prayitno<puji@padi.net.id>
*/
$("#createreport").click(function(){
    window.location.href = "maintenancereports/add";
});
$("#tMaintenance").dataTable({
	"aaSorting":[[0,'desc']],
	"iDisplayLength": 5, 
	"aLengthMenu": [5,10,25,50,100], 
	"sPaginationType": "full_numbers",
	"aoColumns": [ 
		{"bVisible":false},
		{"bVisible":true},
		{ "bSortable": true },
		null, 
		null, 
		null, 
		null
	]
	});
$("#tMaintenance").on("click",".tplogi",function(){
	console.log("Show Topologi");
	that = $(this);
	tsrc = that.find("img").attr("src");
	$("#topologi").attr("src",tsrc);
	$("#ftplg").attr("src",tsrc);
	$("#dShowTopologi").modal();
});
$("#topologi").click(function(){
	if($(this).attr("width")==500){
		$(this).attr("width",900);
	}else{
		$(this).attr("width",500);
	}
});
$("#tMaintenance").on("click","tbody tr td.problems",function(){
	that = $(this);
	tr = that.stairUp({level:1});
	eosactivity = tr.find(".eosactivity").html();
	console.log("Show Activity");
	$("#showactivity").html(eosactivity);
    $("#dShowActivity").modal();
})
$("#tMaintenance").on("click","tbody tr td.name",function(){
	that = $(this);
	tr = that.stairUp({level:1});
	services = tr.find(".services").html();
	console.log("Show Services");
	$("#showservices").html(services);
    $("#dShowServices").modal();
})
$("#tMaintenance").on("click","tbody tr .btnremove",function(){
	that = $(this);
	tr = that.stairUp({level:4});
	$("#tMaintenance tbody tr").removeClass("selected");
	tr.addClass("selected");
	id=tr.attr("myid");
	$.ajax({
		url:'/maintenancereports/remove/'+id
	})
	.done(function(res){
		console.log("Remove res",res);
		tr.remove();
	})
	.fail(function(err){
		console.log("Remove Err",err);
	});
})
$(".fancybox__").click(function(){
	$(this).fancybox({
        'transitionIn'  :   'elastic',
        'transitionOut' :   'elastic',
        'speedIn'       :   600, 
        'speedOut'      :   200, 
        'overlayShow'   :   false,		
  'hideOnOverlayClick':false,
   'hideOnContentClick': false

	});
});