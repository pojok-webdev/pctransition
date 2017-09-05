/* dateTime lib
 * WRITTEN BY PUJI W PRAYITNO
 * 2014-2015
 * mailto:puji@padi.net.id
 * */
datediff = function(a,b){
	substra = a - b;
	simpleobj = '> 24 jam';
	if(substra < 1000*60*30){
		simpleobj = ' < 30 menit';
	}else if(substra <= 1000*60*60){
		simpleobj = '30 menit - < 1 jam';
	}else if(substra <= 1000*60*60*2){
		simpleobj = '1 jam - < 2 jam';
	}else if(substra <= 1000*60*60*4){
		simpleobj = '2 jam - < 4 jam';
	}else if(substra <= 1000*60*60*24){
		simpleobj = '4 jam - < 24 jam';
	}
	var obj = {
		day: Math.floor( (a-b)/(3600000*24) ),
		hour: Math.floor(((a-b)%(3600000*24))/3600000),
		minute: Math.floor( ((a-b)%3600000)/60000 ),
		simple:simpleobj
	}
	return obj;
}
$.fn.getdate = function(){/*indonesian format only*/
	if( $.trim($(this).val())==="" ){
		$(this).attr('datetime',"null");
	}else{
		data = $.trim($(this).val()).split("/");
		out = data[2]+'-'+data[1]+'-'+data[0];
		$(this).attr('datetime',out);
	}
	return $(this);
}
$.fn.getjsdate = function(){/*mysql format only*/
	data = $(this).attr("datetime").split("-");
	out = data.join();
	newdate = new Date(out);
	$(this).attr('jsdate',newdate);
	return $(this);
}
$.fn.hideafter = function(options){
	var settings = $.extend({
		timeout:2000,
		nexturl:'null'
	}
	,options);
	mydiv = $(this);
	setTimeout(function(){
		mydiv.modal('hide');
		if(settings.nexturl!='null'){
			window.location.href = settings.nexturl;
		}
	},settings.timeout);
}
id2jsdate = function(date){
	data = date.split(" ");alert(data.length());
	dt = data[0].split("/");
	tm = data[1].split(":");
	return new Date(dt[2],(dt[1]-1),dt[0],tm[0],tm[1],tm[2]);
}
isidformatted = function(str){
	if(str.indexOf("/")>0){
		return true;
	}
}
$.fn.formatidtime = function(){
	$.each($(this),function(){
		if($(this).text()){
			if(!isidformatted($(this).html())){
				arr1 = $(this).html().split(" ");
				out = arr1[1];
				$(this).html(out);
			}
		}
	});
}
$.fn.timelength = function(nextime,prevtime){
	t = datediff(nextime,prevtime);
	$(this).attr('timelength',t.day + ' hari ' + t.hour + ' jam ' + t.minute + ' menit ('+t.simple+')');
	return $(this);
} 
$.fn.newdate = function(){
	return new Date();
}
$.fn.splitDate = function(options){
	var settings = $.extend({
		dateToSplit:"",
		dateSeparator:"/",
	},options);
	var splited1 = settings.dateToSplit.split(' ');
	var splited2 = splited1[0].split(settings.dateSeparator);
	var splited3 = splited1[1].split(":");
	var mydate = splited2[2]+'/'+splited2[1]+'/'+splited2[0];
	var myhour = splited3[0];
	var myminute = splited3[1];
	var mysecond = splited3[2];
	console.log("splited1[0] : "+splited1[0]);
	console.log("splited2[0] : "+splited2[0]);
	var out = new Array();
	out[0] = mydate;
	out[1] = myhour;
	out[2] = myminute;
	return out;
}
$.fn.currentTime = function(options){
	var settings = $.extend({
		format:"dd/MM/YYYY HH:mm:ss",
	},options);
	var day = (new Date).getDate();
	var month = (new Date).getMonth()+1;
	var year = (new Date).getFullYear();
	var hour = (new Date).getHours();
	var minute = (new Date).getMinutes();
	var second = (new Date).getSeconds();
	var out = "";
	switch(settings.format.trim()){
		case "dd/MM/YYYY HH:mm:ss":
		out = day+"/"+month+"/"+year+" "+hour+":"+minute+":"+second;
		break;
		case "YYYY-MM-dd HH:mm:ss":
		out = year+"-"+month+"-"+day+" "+hour+":"+minute+":"+second;
		break;
		case "MM/dd/YYYY HH:mm:ss":
		out = month+"/"+day+"/"+year+" "+hour+":"+minute+":"+second;
		break;
		case "dd/MM/YYYY":
		out = day+"/"+month+"/"+year;
		break;
		case "YYYY-MM-dd":
		out = year+"-"+month+"-"+day;
		break;
		case "MM/dd/YYYY":
		out = month+"/"+day+"/"+year;
		break;
		default:
		out = "Please choose either MM/dd/YYYY, YYYY-MM-dd, dd/MM/YYYY, MM/dd/YYYY HH:mm:ss, YYYY-MM-dd HH:mm:ss, dd/MM/YYYY HH:mm:ss format !";
		break;
	}
	return out;
}
$.fn.formatDate = function(options){
	var settings = $.extend({
		inputFormat:"dd/MM/YYYY",
		outputFormat:"dd/MM/YYYY HH:mm:ss",
	},options);
	var day = "";
	var month = "";
	var year = "";
	var hour = "";
	var minute = "";
	var second = "";
	var splited;
	switch(settings.inputFormat){
		case "dd/MM/YYYY":
			splited = $(this).val().split("/");
			day = splited[0];
			month = splited[1];
			year = splited[2];
		break;
	}
	var out = "";
	switch(settings.outputFormat.trim()){
		case "dd/MM/YYYY HH:mm:ss":
		out = day+"/"+month+"/"+year+" "+hour+":"+minute+":"+second;
		break;
		case "YYYY-MM-dd HH:mm:ss":
		out = year+"-"+month+"-"+day+" "+hour+":"+minute+":"+second;
		break;
		case "MM/dd/YYYY HH:mm:ss":
		out = month+"/"+day+"/"+year+" "+hour+":"+minute+":"+second;
		break;
		case "dd/MM/YYYY":
		out = day+"/"+month+"/"+year;
		break;
		case "YYYY-MM-dd":
		out = year+"-"+month+"-"+day;
		break;
		case "MM/dd/YYYY":
		out = month+"/"+day+"/"+year;
		break;
		default:
		out = "Please choose either MM/dd/YYYY, YYYY-MM-dd, dd/MM/YYYY, MM/dd/YYYY HH:mm:ss, YYYY-MM-dd HH:mm:ss, dd/MM/YYYY HH:mm:ss outputFormat !";
		break;
	}
	return out;
}
$.fn.formatDates = function(options){
	var settings = $.extend({
		dtClass:"dttmcheck"
	},options);
	$('.'+settings.dtClass).each(function(){
		myorigin = $(this).html();
		if(!isidformatted(myorigin)){
			$(this).html(sql2idformat(myorigin));
		}
	});
}
$.fn.simpletimelength = function(nextime,prevtime){
	t = datediff(nextime,prevtime);
	$(this).attr('timelength',t.simple);
	return $(this);
}
time_is_between = function(time1,time2,time){
	if(time1<=time && time2 >= time){
		return true;
	}
	return false;
}
formatiddate = function(str){
	arr = str.split(" ");
	out = arr[0].split("-");
	return out[2]+"/"+out[1]+"/"+out[0];
}
formatidtime = function(str){
	arr = str.split(" ");
	return arr[1];
}
$.fn.formatiddate = function(){
	$.each($(this),function(){
		if($(this).text()){
			if(!isidformatted($(this).html())){
				arr1 = $(this).html().split(" ");
				out = arr1[0].split("-");
				$(this).html(out[2]+"/"+out[1]+"/"+out[0]);
			}
		}
	});
}
$.fn.sql2idformat = function(){
	$.each($(this),function(){
		console.log($(this).html());
		if($(this).text()){
			if(!isidformatted($(this).html())){
				arr1 = $(this).html().split(" ");
				iddate = arr1[0].split("-");
				out = iddate[2]+'/'+iddate[1]+'/'+iddate[0] + ' ' + arr1[1];
				$(this).html(out);
			}
		}
	});
}
sql2idformat = function(str){
	arr1 = str.split(" ");
	iddate = arr1[0].split("-");
	return iddate[2]+'/'+iddate[1]+'/'+iddate[0] + ' ' + arr1[1];
}
sql2idformatnotime = function(str){
	arr1 = str.split(" ");
	iddate = arr1[0].split("-");
	return iddate[2]+'/'+iddate[1]+'/'+iddate[0];
}
sql2jsdate = function(sql){
	if(sql){
	arr = sql.split(" ");
	dt = arr[0].split("-");
	tm = arr[1].split(":");
		return new Date(dt[0],dt[1]-1,dt[2],tm[0],tm[1],tm[2]);
	}
	return new Date();
}
num2textmonth = function(num){
	switch(num){
		case '01':
		out = 'jan';
		break;
		case '02':
		out = 'feb';
		break;
		case '03':
		out = 'mar';
		break;
		case '04':
		out = 'apr';
		break;
		case '05':
		out = 'mei';
		break;
		case '06':
		out = 'jun';
		break;
		case '07':
		out = 'jul';
		break;
		case '08':
		out = 'ags';
		break;
		case '09':
		out = 'sep';
		break;
		case '10':
		out = 'okt';
		break;
		case '11':
		out = 'nov';
		break;
		case '12':
		out = 'des';
		break;
	}
	return out;
}
function getdate(dateformat,exceed){
	var d = new Date(),out = '',year = d.getFullYear(), month = d.getMonth()+1, date = d.getDate()+exceed;
	d.setDate(d.getDate()+exceed);
	month = d.getMonth()+1;
	switch(dateformat){
		case 'sql':
			out = d.getFullYear()+'/'+month+'/'+d.getDate()+' '+'00:00:00';
		break;
		default:
			out = d.getFullYear()+'/'+month+'/'+d.getDate()+' '+'00:00:00';
		break;
	}
	return out
}
function getcustomdate(_date,dateformat,exceed){
	
	var d = _date//new Date()
	,out = '',year = d.getFullYear(), month = d.getMonth()+1, date = d.getDate()+exceed;
	d.setDate(d.getDate()+exceed);
	month = d.getMonth()+1;
	switch(dateformat){
		case 'sql':
			out = d.getFullYear()+'/'+month+'/'+d.getDate()+' '+'00:00:00';
		break;
		default:
			out = d.getFullYear()+'/'+month+'/'+d.getDate()+' '+'00:00:00';
		break;
	}
	console.log('CUSTOM DATE',out);
	return out
}
function sqldateparts(obj){
	if(!obj){return {day:'00',month:'00',year:'0000',hour:'00',minute:'00',second:'00'};}
	ob = obj.split(' ');
	dt = ob[0];
	tm = ob[1];
	dtpart = dt.split('-');
	tmpart = tm.split(':');
	var out = {
		day:dtpart[2],
		month:dtpart[1],
		year:dtpart[0],
		hour:tmpart[0],
		minute:tmpart[1],
		second:tmpart[2],
	}
	return out;
}
$.fn.getSQLDate = function(options){
	var settings = $.extend({
		exceed:0
	},options),out = "",newdate=0,_this = $(this);
	var arr = $(this).val().split('/');
	newdate+=1*settings.exceed;
	newdate+=parseInt(arr[0]);
	out = arr[2]+'-'+arr[1]+'-'+newdate;
	_this.attr('sqldate',out);
	return _this;
}
padicurdate = function(){
	var d = new Date(),
		month = d.getMonth()+1,
		day = d.getDate(),
		fullYear = d.getFullYear(),
		output = '';
		if (month<10){
			lmonth = '0'+month;
		}else{
			lmonth = month;
		}
		output = fullYear+'-'+lmonth+'-'+day;
		return output;
}
humandatetime = function(){
	var day = (new Date).getDate();
	var month = (new Date).getMonth()+1;
	var year = (new Date).getFullYear();
	var hour = (new Date).getHours();
	var minute = (new Date).getMinutes();
	var second = (new Date).getSeconds();
	var out = day+"/"+month+"/"+year+" "+hour+":"+minute+":"+second;
	return out;
}
sqldatetime = function(){
	var day = (new Date).getDate();
	var month = (new Date).getMonth()+1;
	var year = (new Date).getFullYear();
	var hour = (new Date).getHours();
	var minute = (new Date).getMinutes();
	var second = (new Date).getSeconds();
	var out = year+"-"+month+"-"+day+" "+hour+":"+minute+":"+second;
	return out;
}