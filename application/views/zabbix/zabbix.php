<!doctype html>
<html>
<head>
	<?php
	header("Access-Control-Allow-Origin: *");
	header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
	header('Access-Control-Max-Age: 1000');
	header('Access-Control-Allow-Headers: Content-Type');
	?>
	
<meta charset="UTF-8" />
<title>PadiNET Zabbix</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/main.css" media="screen" />
<script type="text/javascript" charset="utf-8" src="<?php echo base_url();?>asset/jqzabbix/jquery-2.1.1.min.js"></script>
<script type="text/javascript" charset="utf-8" src="<?php echo base_url();?>asset/jqzabbix/jqzabbix.js"></script>
<script type="text/javascript" charset="utf-8" src="<?php echo base_url();?>asset/jqzabbix/main.js"></script>
<body>

<!-- header -->
<div id="header"><h1>PadiNET Zabbix</h1></div>

<!-- contens -->
<div id="login">

    <form>
      <ul>
        <li>Username <input type="text" name="username" value="Admin"/></li>
        <li>Password <input type="password" name="password" value="zabbix"/></li>
      </ul>
      <p><input type="button" value="Authenticate" onclick="doAuth(this.form)"/></p>
    </form>

</div>

<div id="request" style="display:none;">

  <form>
    <ul>
      <li>Method: <select class="method1" name="method1" onChange="changeMethod2(this.value)"></select> . <select class="method2" name="method2" onChange="changeParameters(this.form.method1.value, this.form.method2.value)"></select></li>
      <li><a href="javascript:toggleParameters()">Parameters</a></li>
      <p class="parameters"></p>
      <li><input type="button" value="Send Request" onClick="doRequest(this.form)"/></li>
    </ul>
  </form>

</div>

<div id="result"></div>

<!-- footer -->
<div id="footer"><address>Copyright &copy PadiNET.</address></div>
</body>
</html>
