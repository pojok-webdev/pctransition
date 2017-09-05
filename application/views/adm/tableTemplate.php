<!DOCTYPE html>
<html lang="en">
	<link href="<?php echo base_url();?>css/aquarius/stylesheets.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/radu.css" />
<link rel='stylesheet' href='<?php echo base_url();?>css/reports/report.css' />
<script type='text/javascript' src='<?php echo base_url();?>js/jquery-1.8.2.min.js'></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery-ui-1.8.14.custom.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jspdf/jspdf.debug.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jspdf/jspdf.min.js"></script>
<body>
    <div class="header">
        <a class="logo" href="index.html"><img src="img/logo.png" alt="PadiApp" title="PadiApp"/></a>
        <ul class="header_menu">
            <li class="list_icon"><a href="#">&nbsp;</a></li>
        </ul>
    </div>
    <div class="fullContent">
        <div class="workplace">
			<div id="editor" class="bypass"></div>
            <div class="row-fluid">
                <div class="span12">
                    <div class="head clearfix">
                        <div class="isw-grid"></div>
                        <h1>Simple table</h1>
                        <ul class="buttons">
                            <li><a href="#" class="isw-print" id="downloadPDF"></a></li>
                            <li><a href="#" class="isw-cancel"></a></li>
                        </ul>
                    </div>
                    <div class="block-fluid" id="mybody">
                        <table cellpadding="0" cellspacing="0" width="100%" class="table">
                            <thead>
                                <tr>
                                    <th width="25%">ID</th>
                                    <th width="25%">Name</th>
                                    <th width="25%">E-mail</th>
                                    <th width="25%">Phone</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>101</td>
                                    <td>Dmitry</td>
                                    <td>dmitry@domain.com</td>
                                    <td>+98(765)432-10-98</td>
                                </tr>
                                <tr>
                                    <td>102</td>
                                    <td>Alex</td>
                                    <td>alex@domain.com</td>
                                    <td>+98(765)432-10-99</td>
                                </tr>
                                <tr>
                                    <td>103</td>
                                    <td>John</td>
                                    <td>john@domain.com</td>
                                    <td>+98(765)432-10-97</td>
                                </tr>
                                <tr>
                                    <td>104</td>
                                    <td>Angelina</td>
                                    <td>angelina@domain.com</td>
                                    <td>+98(765)432-10-90</td>
                                </tr>
                                <tr>
                                    <td>105</td>
                                    <td>Tom</td>
                                    <td>tom@domain.com</td>
                                    <td>+98(765)432-10-92</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="<?php echo base_url();?>js/aquarius/tableTemplate.js" ></script>
</body>
</html>
