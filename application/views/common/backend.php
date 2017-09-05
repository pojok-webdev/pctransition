<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Padinet<?php echo (isset($alertcount))?' (' . $alertcount . ')':'';?></title>


<link rel='shortcut icon' href="<?php echo base_url();?>themes/<?php echo $this->setting['theme'];?>/images/favicon.png" />
<link rel='stylesheet' href="<?php echo base_url();?>themes/<?php echo $this->setting['theme']?>/css/heydings.css" type='text/css' />
<link rel='stylesheet' href="<?php echo base_url();?>themes/<?php echo $this->setting['theme']?>/css/heydings_icons-webfont.css" type='text/css' />
<link rel='stylesheet' href="<?php echo base_url();?>themes/<?php echo $this->setting['theme']?>/css/symbolsign.css" type='text/css' />
<link rel='stylesheet' href="<?php echo base_url();?>themes/<?php echo $this->setting['theme']?>/css/modern-pictograms.css" type='text/css' />

	<style type="text/css" media="screen">
		.heydings {font: 60px/68px 'HeydingsControlsRegular', Arial, sans-serif;letter-spacing: 0;}
		.heydingssmall {font: 30px/30px 'HeydingsControlsRegular', Arial, sans-serif;letter-spacing: 0;}
		.heydings2 {font: 60px/68px 'HeydingsCommonIconsRegular', Arial, sans-serif;letter-spacing: 0;}
		.heydingssmall2 {font: 28px/28px 'HeydingsCommonIconsRegular', Arial, sans-serif;letter-spacing: 0;}
		.symbolsign {font: 60px/68px 'SymbolSignsBasisset', Arial, sans-serif;letter-spacing: 0;}
		.symbolsignsmall {font: 30px/30px 'SymbolSignsBasisset', Arial, sans-serif;letter-spacing: 0;text-align: center;}
		.modernpictograms {font: 60px/68px 'ModernPictogramsNormal', Arial, sans-serif;letter-spacing: 0;}
		.modernpictogramssmall {font: 15px/15px 'ModernPictogramsNormal', Arial, sans-serif;letter-spacing: 0;text-align: center;}
		.normalfont {font: 60px/68px 'Tahoma'}
		.normalfontsmall {font: 30px/30px 'Tahoma'}
		p.style1 {font: 18px/27px 'HeydingsControlsRegular', Arial, sans-serif;}
		
		#container {
			width: 800px;
			margin-left: auto;
			margin-right: auto;
		}
	</style>


<link rel='stylesheet' href='<?php echo base_url();?>asset/smoothness/jquery-ui-1.8.14.custom.css' />
<link href="<?php echo base_url();?>themes/<?php echo $this->setting['theme'];?>/css/back-end.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>themes/<?php echo $this->setting['theme'];?>/css/ddaccordion.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.5.1.min.js"></script>
<script type='text/javascript' src='<?php echo base_url();?>js/jquery-ui-1.8.14.custom.min.js'></script>

<script type="text/javascript" src="<?php echo base_url();?>js/ddaccordion.js"></script>
<script type="text/javascript">

<!-- for accordion menu -->
ddaccordion.init({
	headerclass: "expandable", //Shared CSS class name of headers group that are expandable
	contentclass: "categoryitems", //Shared CSS class name of contents group
	revealtype: "click", //Reveal content when user clicks or onmouseover the header? Valid value: "click", "clickgo", or "mouseover"
	mouseoverdelay: 200, //if revealtype="mouseover", set delay in milliseconds before header expands onMouseover
	collapseprev: true, //Collapse previous content (so only one open at any time)? true/false 
	defaultexpanded: [0], //index of content(s) open by default [index1, index2, etc]. [] denotes no content
	onemustopen: false, //Specify whether at least one header should be open always (so never all headers closed)
	animatedefault: false, //Should contents open by default be animated into view?
	persiststate: true, //persist state of opened contents within browser session?
	toggleclass: ["", "openheader"], //Two CSS classes to be applied to the header when it's collapsed and expanded, respectively ["class1", "class2"]
	togglehtml: ["prefix", "", ""], //Additional HTML added to the header when it's collapsed and expanded, respectively  ["position", "html1", "html2"] (see docs)
	animatespeed: "fast", //speed of animation: integer in milliseconds (ie: 200), or keywords "fast", "normal", or "slow"
	oninit:function(headers, expandedindices){ //custom code to run when headers have initalized
		//do nothing
	},
	onopenclose:function(header, index, state, isuseractivated){ //custom code to run whenever a header is opened or closed
		//do nothing
	}
})
$(document).ready(function(){
$('.dtpicker').datepicker(
		{
			dateFormat:'d/mm/yy',
			changeYear:true,
			changeMonth:true,
			minDate:'-20Y',
			maxDate:'+10Y'
		}
		);
});
</script>
<!-- end accordion menu -->
