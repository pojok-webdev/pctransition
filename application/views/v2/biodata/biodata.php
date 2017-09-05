<html>
	<head>
		<!--<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">-->
		<link rel="stylesheet" href="/asset/report/bootstrap-3.3.6.min.css">
		<!--<link rel="stylesheet" href="http://code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">-->
		<link rel="stylesheet" href="/asset/jqueryui.1.12.0.css">
		<link rel="stylesheet" href="/css/padi.toggle_button.css" />
		<link rel="stylesheeet" href="/css/padi.biodata.css" />
		<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>-->
		<script src="/asset/report/jquery-1.12.0.min.js"></script>
		<!--<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>		-->
		<script src="/asset/report/bootstrap-3.3.6.min.js"></script>
		<!--<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>-->
		<script src="/asset/jqueryui.1.12.0.js"></script>
		<script src="/js/padilibs/padi.dateTimes.js"></script>
		<script src="/js/aquarius/links.js"></script>
		<script type="text/javascript" src="/js/autocomplete/jquery.autocomplete.js"></script>
		<link rel="stylesheet" href="/js/autocomplete/padi.autocomplete.styles.css" />
		<style>
			.rightaligned{
				text-align: right;
			}
		</style>
		<title>Biodata Pelanggan </title>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-sm-2">
					<h3>
						Nama
					</h3>
				</div>
				<div class="col-sm-8">
					<label>
					<input type="text" class="longinput" name="clientname" id="clientname" placeholder="Pilih Pelanggan (Autocomplete)"/>
					</label>
				</div>
				<div class="col-sm-2">
					<a class="rptanchor btn btn-success" href="/tickets">Home</a>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-2">
						<label class="switch">
							<input type="checkbox" id="ccontactx"/>
							<div class="slider"></div>
						</label>
					<p>Contact</p>
				</div>
				<div class="col-sm-2">
						<label class="switch">
							<input type="checkbox" id="ccontact"/>
							<div class="slider"></div>
						</label>
					<p>Contact</p>
				</div>
				<div class="col-sm-2">
						<label class="switch">
							<input type="checkbox" id="cpic"/>
							<div class="slider"></div>
						</label>
					<p>PIC</p>
				</div>
				<div class="col-sm-2">
						<label class="switch">
							<input type="checkbox" id="cnpwp"/>
							<div class="slider"></div>
						</label>
					<p>NPWP</p>
				</div>
				<div class="col-sm-2">
						<label class="switch">
							<input type="checkbox" id="cservice"/>
							<div class="slider"></div>
						</label>
					<p>Layanan</p>
				</div>
			</div>
			<div class="row" id="dcontact">
				<div class="col-sm-2">
					<span class="rightaligned">Alamat</span>
				</div>
				<div class="col-sm-5">
					<span id="haddress"></span>
				</div>
				<div class="col-sm-5">
					<span id="hcity"></span>
				</div>
			</div>
			<div class="row" id="dpic">
				<div class="col-sm-2">
					<span class="rightaligned">PIC</span>
				</div>
				<div class="col-sm-10">
					<h3 id="hpic" class="hcpic"></h3>
					<div id="picadm" class="hcpic"></div>
					<div id="picbilling" class="hcpic"></div>
					<div id="picresp" class="hcpic"></div>
					<div id="picsubscriber" class="hcpic"></div>
					<div id="picsupport" class="hcpic"></div>
					<div id="picteknis" class="hcpic"></div>
				</div>
			</div>
			<div class="row" id="dnpwp">
				<div class="col-sm-2">
					<span class="rightaligned">NPWP</span>
				</div>
				<div class="col-sm-10">
					<span id="hnpwp"></span>					
				</div>
			</div>
			<div class="row" id="dnpwp">
				<div class="col-sm-2">
					<span class="rightaligned">SIUP</span>
				</div>
				<div class="col-sm-10">
					<span id="hsiup"></span>
				</div>
			</div>
			<div class="row" id="dservice">
				<div class="col-sm-2">
					<span class="rightaligned">Layanan</span>
				</div>
				<div class="col-sm-10">
					<span id="hservice"></span>
				</div>
			</div>
		</div>
		<script type="text/javascript" src="/js/padilibs/padi.url.js"></script>
		<script type="text/javascript"src="/js/aquarius/biodata/biodata.js"></script>
	</body>
</html>
