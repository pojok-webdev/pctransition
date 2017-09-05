<link rel='stylesheet' href='<?php echo base_url();?>css/smoothness/jquery-ui-1.8.14.custom.css' />
<link rel='stylesheet' href='<?php echo base_url();?>css/custom.css' />
<link rel='stylesheet' href='<?php echo base_url();?>css/jquery.notice.css' />
<link rel='stylesheet' href='<?php echo base_url();?>css/tooltip/style.css' />

<script type='text/javascript' src='<?php echo base_url();?>js/jquery-1.5.1.min.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>js/jquery-ui-timepicker-addon.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>js/jquery.notice.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>js/jquery.hotkeys-0.7.9.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>js/jquery-ui-1.8.14.custom.min.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>js/jquery.betterTooltip.js'></script>

<script type='text/javascript'>
$(document).ready(function(){
	$('.tTip').betterTooltip({speed:150,delay:300});

	show_events=function(year,month,day){
		$.getJSON('<?php echo base_url();?>index.php/test/get_events/year/'+year+'/month/'+month+'/day/'+day,function(data){
			clients = new Array();
			$.each(data,function(key,val){
				clients[key]=val;
			});
			clie=clients.join('<br />');
            jQuery.noticeAdd({
                text: clie,
                stay: true
	        });
		});
	}
	clear_notifications = function(){
		jQuery.noticeRemove($('.notice-item-wrapper'), 400);
	}
	$('.dtpicker').datepicker(
			{
				dateFormat:'d/mm/yy',
				changeYear:true,
				changeMonth:true,
				minDate:null,
				maxDate:'+10Y'
			}
	);
	

	$('.button').button();
	$('.button_logout').button({
		icons:{primary:"ui-icon-power"},
		text: false
	});
	$('.button_home').button({
		icons:{primary:"ui-icon-home"},
		text: false
	});
	$('.button_home').bind('keydown','Ctrl+j',function(){alert('test')});
	$('.button_save').button({
		icons:{primary:"ui-icon-disk"},
		text: false
	});
	$('.button_close').button({
		icons:{primary:"ui-icon-close"},
		text: false
	});
	$('.button_password').button({
		icons:{primary:"ui-icon-key"},
		text: false
	});
	$('.button_calendar').button({
		icons:{primary:"ui-icon-calendar"},
		text: false
	});
	$('.button_plus').button({
		icons:{primary:"ui-icon-plus"},
		text: false
	});
	$('.button_email_closed').button({
		icons:{primary:"ui-icon-mail-closed"},
		text: false
	});
	$('.button_document').button({
		icons:{primary:"ui-icon-document"},
		text: false
	});
}
);
go = function(url){
	$(location).attr('href',url);
}
</script>
<head>
<?php 
	$title=(isset($param_title))?$param_title:'';
	echo '<title>' . $title . '</title>';
	echo '<div class="header">';
	$header=(isset($param_header))?$param_header:'';
	echo '<h2>' . $header . '</h2>';
	$sub_header = (isset($param_sub_header))?$param_sub_header:'';
	echo '<h4>' . $sub_header . '</h4>';
	echo '<div class="header_info">';
	$info = (isset($param_info))?$param_info:'';
	echo '<div>' . $info . '</div>';
	$properties = (isset($param_properties))?$param_properties:'';
	echo '<div>' . $properties . '</div>';
	echo '</div>';
	echo '</div>';
?>
</head>
