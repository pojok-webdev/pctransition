<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		
		<title>DataTables example</title>
		<style type="text/css" title="currentStyle">
			@import "<?php echo base_url();?>css/aquarius/dataTable/demo_page.css";
			@import "<?php echo base_url();?>css/aquarius/dataTable/demo_table.css";
		</style>
		<script type="text/javascript" language="javascript" src="<?php echo base_url();?>js/jquery-1.8.2.min.js"></script>
		<script type="text/javascript" language="javascript" src="<?php echo base_url();?>js/aquarius/plugins/dataTables/jquery.dataTables.js"></script>
		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				var oTable = $('#example').dataTable( {
					"bProcessing": true,
					//"sAjaxSource": "<?php echo base_url();?>js/aquarius/plugins/dataTables/sources/objects.txt",
					"sAjaxSource":"<?php echo base_url();?>tickets/ajaxh",
					"aoColumns": [
						{ "mData": "engine" },
						{ "mData": "browser" },
						{ "mData": "platform" },
						{ "mData": "version" },
						{ "mData": "grade" }
					]
				} );
			} );
		</script>
	</head>
	<body id="dt_example">
		<div id="container">
			<div id="dynamic">
				<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
					<thead>
						<tr>
							<th width="20%">Rendering engine</th>
							<th width="25%">Browser</th>
							<th width="25%">Platform(s)</th>
							<th width="15%">Engine version</th>
							<th width="15%">CSS grade</th>
						</tr>
					</thead>
					<tbody>
						
					</tbody>
					<tfoot>
						<tr>
							<th>Rendering engine</th>
							<th>Browser</th>
							<th>Platform(s)</th>
							<th>Engine version</th>
							<th>CSS grade</th>
						</tr>
					</tfoot>
				</table>
			</div>
			<div class="spacer"></div>
			
			
			
		</div>
	</body>
</html>
