/*
 * this file is a copy of survey_site.js with modification, since survey_edit use some elements of survey_site
 * April 30th 2014
 * Radu
 * */
$.fn.fill_ap = function(btsid,selected){
	$(this).html("");
	thisap = $(this);
	thisap.append('<option value="Belum ada AP" selected=selected>Belum ada AP</option>');
	$.getJSON('/paps/get_name_by_bts/'+btsid,function(data){
		$.each(data,function(x,y){
			if(selected==y){
				thisap.append('<option value='+y+' selected=selected>'+y+'</option>');
			}else{
				thisap.append('<option value='+y+'>'+y+'</option>');
			}
		});
	});
}
$(document).ready(function(){
	console.log("TS survey edit");
	if($("#losnlosselect :selected").text()=="NLOS"){
		$(".losap").hide();
	}else{
		$(".losap").show();
	}
	$(".closemodal").click(function(){
		$(this).stairUp({level:6}).modal("hide");
	});
    $('#losnlosselect').change(function(){
		if($("#losnlosselect :selected").text()=="NLOS"){
			$(".losap").hide();
		}else{
			$(".losap").show();
		}
	});
	surveyTable = $("#surveysite").dataTable({
		bFilter:false,
		bSort:false,
		bPaginate:false,
//		bInfo:false,
		bLengthChange:false,
		bAutoWidth:false
	});
	$(".addsurveysite").click(function(){
		$("#updatesurveysite").hide();
		$("#savesurveysite").show();
		$("#dAddSite").modal("show");
	});
	$(".edit_site").click(function(){
		$("#dAddSite").attr("site_id",$(this).attr("site_id"));
		window.location.href = thisdoman+'adm/survey_site/'+$('#dAddSite').attr('site_id');
	});
	$("#gotosurveys").click(function(){
		window.location.href = thisdomain+"adm/surveys";
	});
	$(".remove_site").click(function(){
		$.post(thisdomain+'adm/survey_removesite',{site_id:$(this).attr('site_id')}).done(function(data){}).fail(function(){alert('gagal')});
		$(this).parent().parent().parent().fadeOut(1000);
	});
});
function fnGetSelected( oTableLocal ){
    return oTableLocal.$('tr.row_selected');
}
changeformat = function(mydate){
	out = mydate.split("/");
	return out[2]+'-'+out[1]+'-'+out[0];
}
