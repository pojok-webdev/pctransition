$.fn.addRow = function(options){
	var settings = $.extend({
		name:'',businesstype:'',siup:'',npwp:'',address:'',telp:''
	},options),_this = $(this);
	tr = '<tr myid="">';
	tr+='<td class="name">'+settings.name+'</td>';
	tr+='<td class="businesstype"><span class="">'+settings.businesstype+'</span></td>';
	tr+='<td><span class="siup">'+settings.siup+'</span></td>';
	tr+='<td><span class="npwp">'+settings.npwp+'</span></td>';
	tr+='<td class="address">'+settings.address+'</td><td class="telpfax">'+settings.telp+'</td>';
	tr+='<td><div class="btn-group">';
	tr+='<button data-toggle="dropdown" class="btn dropdown-toggle">Action <span class="caret"></span></button>';
	tr+='<ul class="dropdown-menu pull-right"><li class="btn_edit pointer"><a>Edit</a></li><li class="divider"></li><li class="btn_pic pointer"><a>PIC</a></li></ul>';
	tr+='</div></td></tr>';
	_this.find('tbody').prepend(tr);			

};
$.fn.populateRows = function(options){
	var settings = $.extend({
	},options),
	_this = $(this);
	$.ajax({
		url:thisdomain+'fbs/get',
		data:{},
		type:'post',
		dataType:'json'
	}).done(function(data){
		tr = '<tr><th width="10%">Nama</th><th width="10%">Bisnis</th><th width="10%">SIUP</th><th width="25%">NPWP</th><th width="10%">Alamat</th><th width="10%">Telp/Fax</th><th width="5%">Aksi</th></tr>';
		_this.find('thead').prepend(tr);
		$.each(data.obj,(obj,fb) => {
			$("#tFbs").addRow({
				name:fb.name,businesstype:fb.businesstype,siup:fb.siup,npwp:fb.npwp,address:fb.address,telp:fb.telp
			});
		});
		$('.btn_pic').click(function(){
			$('#dAddPIC').modal();
		});
	}).fail(function(){
		console.log("error retrieve data");
	});
}
$("#btnaddfb").click(function(){
	$("#dAddFB").modal();
});
$("#savefb").click(function(){
	$(".inp_fb").makekeyvalparam();
	console.log($(".inp_fb").attr('keyval'));
	$.ajax({
		url:thisdomain+'fbs/save',
		data:JSON.parse('{'+$(".inp_fb").attr('keyval')+'}'),
		type:'post'
	}).done(function(data){

		$("#tFbs").addRow({
			name:$('#clientname').val(),businesstype:$('#businesstype').val(),siup:$('#siup').val(),npwp:$('#npwp').val(),address:$('#clientaddress').val(),telp:$('#clienttelp').val()
		});
	}).fail(function(){
		console.log("error save data");
	});
});
$("#savepic").click(function(){
	$(".inp_pic").makekeyvalparam();
	$.ajax({
		url:thisdomain+'fbpics/save',
		data:JSON.parse('{'+$(".inp_pic").attr('keyval')+'}'),
		type:'post'
	}).done(function(data){
		console.log(data);
	}).fail(function(){
		console.log("error save data");
	});
});
$(".closemodal").click(function(){
	$(this).stairUp({level:3}).modal('hide');
});
$("#tFbs").populateRows();
