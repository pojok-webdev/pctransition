/*
 * WRITTEN by PUJI W PRAYITNO
 * 2014,2015
 * mailto:puji@padi.net.id
 * */
$.fn.textsql2idformat = function(){
	$.each($(this),function(){
		if($(this).text()){
			if(!isidformatted($(this).html())){
				arr1 = $(this).html().split(" ");
				iddate = arr1[0].split("-");
				out = iddate[2]+'/'+iddate[1]+'/'+iddate[0] + ' ' + arr1[1];
				$(this).text(out);
			}
		}
	});
}
empty = function(data){
	if(typeof(data) == 'number' || typeof(data) == 'boolean'){
		return false;
	}
	if(typeof(data) == 'undefined' || data === null){
		return true;
	}
	if(typeof(data.length) != 'undefined'){
		return data.length == 0;
	}
	var count = 0;
	for(var i in data){
		if(data.hasOwnProperty(i)){
			count ++;
		}
	}
	return count == 0;
}
$.fn.checkEmpty = function(options){
	var settings = $.extend({
		className:'className'
	},options);
	result = true;
	$("."+settings.className).each(function(){
		if($(this).val().length===0){
			result = false;
		}
	});
	return result;
}
addzero = function(num){
	for(c=num.toString().length;c<2;c++){
		num = '0'+num.toString();
	}
	return num.toString();
}
$.fn.jsage_ = function(options){
	var settings = $.extend({
		pdate:'',
		pyear:'',
		pmonth:'',
		pday:'',
		phour:'',
		pminute:'',
		psecond:'',
		usedate:'pdate',
		stoptime:'',
		warninglabel:"warninglabel"
	},options);
	_this = $(this);
	isstopped = _this.stairUp({level:1}).find(".isstopped").html();
//	console.log("AM",am);
	if(_this.attr("execdate")!==""){
		_pdate = sql2jsdate(_this.attr("execdate"));
		_name = _this.stairUp({level:1}).find(".tdname").html();
		switch(settings.usedate){
		case "pdates":
			pdate = new Date(settings.pyear,settings.pmonth,settings.pday,settings.phour,settings.pminute,settings.psecond);
			break;
		case "pdate":
			pdate = new Date(_pdate.toString());
		}
		if(isstopped=="stopped:"){
			fdate = new Date(2017,5,22,0,0,0,0);
		}else{
			fdate = new Date();
		}
		age = fdate - pdate;
		second = Math.floor(age/(1000));
		_second = (second%60).toString();
		minute = Math.floor(age/(60*1000));
		_minute = (minute%60).toString();
		hour = Math.floor(age/(60*60*1000));
		_hour = (hour%24).toString();
		day = Math.floor(age/(24*60*60*1000));
		_day = (day).toString();
		if(day>7){
			_this.stairUp({level:1}).find(".warninglabel").html("(Lewat batas waktu)");
		}
		if(_day==="0"){
			_dayprint = "";
		}else{
			_dayprint = _day.toString()+" hari, ";
		}
		if(_hour==="0"){
			_hourprint = "";
		}else{
			_hourprint = _hour.toString()+" jam, ";
		}
		if(_minute==="0"){
			_minuteprint = "";
		}else{
			_minuteprint = _minute.toString()+" menit, ";
		}
		if(_second==="0"){
			_secondprint = "";
		}else{
			_secondprint = _second.toString()+" dt ";
		}
		out = _dayprint+_hourprint+_minuteprint+_secondprint;
		_this.html(out);
	}else{
		_this.html("belum dimulai");
	}
}
$.fn.jsage = function(options){
	var settings = $.extend({
		pdate:'',
		pyear:'',
		pmonth:'',
		pday:'',
		phour:'',
		pminute:'',
		psecond:'',
		usedate:'pdate'
	},options);
	_this = $(this);
	if(_this.attr("execdate")!==""){
		_pdate = sql2jsdate(_this.attr("execdate"));
		_name = _this.stairUp({level:1}).find(".tdname").html();
//		console.log("Name",_name,_pdate);
		switch(settings.usedate){
		case "pdates":
			pdate = new Date(settings.pyear,settings.pmonth,settings.pday,settings.phour,settings.pminute,settings.psecond);
			break;
		case "pdate":
//			console.log("Start date",_pdate.toString());
			pdate = new Date(_pdate.toString());
		}
		printage(pdate,_this);
	}else{
		_this.html("belum dimulai");
	}
}
printage = function(pdate,output){
		setInterval(function(){
		fdate = new Date();
		age = fdate - pdate;
		second = Math.floor(age/(1000));
		_second = (second%60).toString()+' detik';
		minute = Math.floor(age/(60*1000));
		_minute = (minute%60).toString()+' menit,';
		hour = Math.floor(age/(60*60*1000));
		_hour = (hour%24).toString()+' jam,';
		day = Math.floor(age/(24*60*60*1000));
		_day = (day).toString()+' hr,';
		out = _day+addzero(_hour)+':'+addzero(_minute)+':'+addzero(_second);
		output.html(out);
 	},1000);
}
$.fn.thengoto = function(options){
	var settings = $.extend({
		address:'https://database.padinet.com'
	},options);
	result = true;
	window.location.href = settings.address;
	return this;
}
$.fn.addhour = function(element){
	newval  = $(this).attr('datetime') + ' ' + element.val();
	$(this).attr('datetime',newval);
	return $(this);
}
$.fn.addminute = function(element){
	newval = $(this).attr('datetime') + ':' + element.val();
	$(this).attr('datetime',newval);
	return $(this);
}
$.fn.fieldUpdater = function(options){
	var settings = $.extend({
		url:'',
		cellClass:'updatable',
		fieldName:'fieldName',
		idAttr:'rowid',
		enabled:true,
		interval:40000,
		type:'post',
	},options);
	if(settings.enabled){
		setInterval(function(){
			$.ajax({
				url:settings.url,
				type:settings.type,
				dataType:'json'
			}).done(function(data){
				dict = new Array();
				$.each(data,function(rows,rowarr){
					$.each(rowarr,function(rowid,rowval){
						dict[rowid] = new Array();
						$.each(rowval,function(fieldName,fieldVal){
							dict[rowid][fieldName] = fieldVal;
						});
					});
				});
				$("."+settings.cellClass).each(function(){
					if($(this).stairUp({level:1}).attr(settings.idAttr) in dict){
						$(this).html(dict[$(this).stairUp({level:1}).attr(settings.idAttr)][$(this).attr(settings.fieldName)]);
					}
				});
			}).fail(function(){
				console.log("Tidak dapat mengupdate Table, silakan hubungi Developer");
			});
		},settings.interval);
	}
}
$.fn.populateDay = function(options){
	var settings = $.extend({dayNum:25,selected:0},options);
	for(c=0;c<=settings.dayNum;c++){
		if(c==settings.selected){
			$(this).append('<option value='+c+' selected="selected">'+c+'</option>');
		}else{
			$(this).append('<option value='+c+'>'+c+'</option>');
		}
	}
}
$.fn.populateHour = function(options){
	var settings = $.extend({selected:0},options);
	for(c=0;c<25;c++){
		if(c==settings.selected){
			$(this).append('<option value='+c+' selected="selected">'+c+'</option>');
		}else{
			$(this).append('<option value='+c+'>'+c+'</option>');
		}
	}
}
$.fn.populateMinute = function(options){
	var settings = $.extend({selected:0},options);
	for(c=0;c<61;c++){
		if(c==settings.selected){
			$(this).append('<option value='+c+' selected="selected">'+c+'</option>');
		}else{
			$(this).append('<option value='+c+'>'+c+'</option>');
		}
	}
}
function fnGetSelected( oTableLocal ){
    return oTableLocal.$('tr.row_selected');
}
/*$.fn.printPdf = function(options){
	var settings = $.extend({
		elementId:''
	},options);
	var pdf = new jsPDF('p', 'pt', 'letter');
	pdf.addHTML($('#'+settings.elementId)[0], function () {
	pdf.save('Test.pdf');
	});
}*/

issqlformatted = function(str){
	if(str.indexOf("-")>0){
		return true;
	}
}
$.fn.makekeyvalparam = function(){
	thisval = '';
	thiselm = $(this);
	var myarray = [];
	$(this).each(function(){
		switch($(this).attr('type')){
			case 'select':
			thisval = $(this).find('option:selected').text();
			break;
			case 'selectid':
			thisval = $(this).find('option:selected').val();
			break;
			case 'text':
				if($(this).hasClass('datepicker')){
					thisid = $(this).attr('id');
					$(this).getdate().addhour($(this).stairUp({level:2}).find('.dttime[parent="'+thisid+'"]').filter(':first')).addminute($(this).stairUp({level:2}).find('.dttime[grandparent="'+thisid+'"]').filter(':first'));
					var d = new Date();
					thisval = $(this).attr('datetime')+':'+d.getSeconds();
				}
				else if($(this).hasClass('dtpicker')){
					$(this).getdate();
					thisval = $(this).attr('datetime');
				}
				else{
					thisval = $(this).val();
				}
			break;
			case 'hidden':
			thisval = $(this).val();
			break;
			case 'selectable':
			thisval = $.trim($(this).attr('myval'));
			break;
			case 'textarea':
			thisval = $.trim($(this).val());
			break;
		}
		myarray.push('"'+$(this).attr('name')+'":"'+thisval+'"');
	});
	obj = myarray.join();
	thiselm.attr('keyval',obj);
	return thiselm;
}
getValArray = function(element){
	thisval = '';
	var myarray = [];
	for(var c=0;c<element.length;c++){
		switch(element[c].attr('type')){
			case 'select':
			thisval = element[c].find('option:selected').text();
			break;
			case 'text':
			thisval = element[c].val();
			break;
			case 'hidden':
			thisval = element[c].val();
			break;
			case 'selectable':
			thisval = element[c].attr('myval');//$('#selectable').val();
		}
		myarray.push(thisval);
	};
	return myarray;
}
$.fn.selectopt = function(opt){
	thiselement = $(this);
	$(this).find('option').each(function(){
		if($(this).val()===opt){
			$(this).attr('selected','selected');
		}
	});
	return thiselement;
}
$.fn.select_text = function(opt){
	thiselement = $(this);
	//<![CDATA[
	console.log("iNISIALISASI TEXTFOUND");
	var settings = $.extend({compared:'',casesensitif:true},opt);
	$(this).find('option').each(function(){
		console.log("select_text",$(this).text());
		if(settings.casesensitif === true){
			if($(this).text().trim()==settings.compared.trim()){
				$(this).attr('selected','selected');
			}
		}else{
			if($(this).text().toLowerCase().trim()==settings.compared.toLowerCase().trim()){
				$(this).attr('selected','selected');
			}			
		}
	});
	return thiselement;
	//]]>
}
$.fn.showModal = function(options){
	var settings = $.extend({
		element : 'dModal',
		title : 'Konfirmasi',
		titleElement : 'myModalLabel',
		labelElement : 'modalMessage',
		labelAlignment:'center',
		message : 'Data sudah tersimpan',
		expire : 1000,
		nextUrl : 'null'
	},options);
	console.log("message : "+settings.message);
	$('#'+settings.labelElement).html(settings.message);
	$("#"+settings.labelElement).css("text-align",settings.labelAlignment);
	$('#'+settings.titleElement).html(settings.title),
	$('#'+settings.element).modal().hideafter({
		timeout : settings.expire,
		nexturl : settings.nextUrl
	});
}
$.fn.populateCombo = function(options){
	var settings = $.extend({
		keyvalpaired:false,
		url:'',
		selected:'',
		type:'get',
		namebasedselect:true
		},options);
	$(this).html("");
	opt = '';
	thiselement = $(this);
	$.ajax({
		url:settings.url,
		async:false,
		dataType:'json',
		type:settings.type,
	}).done(function(data){
		console.log(data);
		$.each(data,function(x,y){
			var comparator = x;
			if(settings.namebasedselect){
				comparator = y;
			}
			if(settings.selected==comparator){
				if(settings.keyvalpaired==true){
					opt+='<option value="'+x+'" selected="selected">'+y+'</option>';
				}else{
					opt+='<option value="'+y+'" selected="selected">'+y+'</option>';
				}
			}else{
				if(settings.keyvalpaired==true){
					opt+='<option value="'+x+'">'+y+'</option>';
				}else{
					opt+='<option value="'+y+'">'+y+'</option>';
				}
			}
		});
		$(opt).appendTo(thiselement);
	}).fail(function(){
		alert('Tidak dapat menampilkan data,silakan hubungi Developer');
	});
	return thiselement;
}
$.fn.checkNewRecord = function(options){//draft
	var settings = $.extend({
		url:"",
		maxId:"",
		enabled:true
	},options);
	if(settings.enabled){
		var thisTable = $(this);
		$.ajax({
			url:settings.url+"/"+settings.maxId,
			type:"get",
			dataType:"json"
		}).done(function(data){
			$.each(data,function(key,val){
				alert(key);
				thisTable.fnAddData(['s','t','v','w','x','y','z','p','q']);
			});
		}).fail(function(){
			alert("Tidak dapat memeriksa Record baru, silakan hubungi Developer");
		});
	}
}
$.fn.stairUp = function(options){
	var settings = $.extend({
		level:1
	},options);
	out=$(this);
	for(i=0;i<settings.level;i++){
		out=out.parent();
	}
	return out;
}
$.fn.modalClose = function(options){
	var settings = $.extend({
		depth : 1
	},options);
	console.log("Im Clicked !!!");
	var thisobj = $(this);
	for(var i=0;i<settings.depth;i++){
		if($(thisobj).hasClass("modal")){
			console.log(thisobj.attr("role"));
			console.log("found");
			$(thisobj).modal("hide");
		}else{
			console.log("up find");
			thisobj = thisobj.parent();
		}
	}		
}
$.fn.removeConfirmation = function(options){
	var settings = $.extend({
		element:$("#confirmation"),
		yesButton:$("#yesButton"),
		removeUrl:thisdomain+"",
		idElement:"myid",
		selectedElement:"",
		totalElement:"",
		tableElement:"",
		viewTotal:true,
		confirmed:function(){
			$.post(settings.removeUrl,{id:settings.idElement}).done(function(){
				$(settings.selectedElement).remove();
				if(settings.viewTotal){
					update_rowcount($("#"+settings.totalElement),$("#"+settings.tableElement+" tbody tr"));
				}
			});
		}
	},options)
	$(this).modal();
	$(settings.yesButton).bind("click",settings.confirmed);
}
var substringMatcher = function(strs) {
	return function findMatches(q, cb) {
		var matches, substringRegex;

		// an array that will be populated with substring matches
		matches = [];

		// regex used to determine if a string contains the substring `q`
		substrRegex = new RegExp(q, 'i');

		// iterate through the pool of strings and for any string that
		// contains the substring `q`, add it to the `matches` array
		$.each(strs, function(i, str) {
			if (substrRegex.test(str)) {
				// the typeahead jQuery plugin expects suggestions to a
				// JavaScript object, refer to typeahead docs for more info
				matches.push({ value: str });
			}
		});
		cb(matches);
	};
};
