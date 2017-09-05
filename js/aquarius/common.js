function getCurrentDate(){
	var dt = new Date();
/*	var day = (new Date).getDate();
	var month = (new Date).getMonth()+1;
	var year = (new Date).getFullYear();
	return year+"-"+month+"-"+day;
	*/
	return dt.getFullYear()+"-"+("0"+(dt.getMonth()+1)).slice(-2)+"-"+("0"+dt.getDate()).slice(-2);
}
