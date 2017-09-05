<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('adm/head');?>
<body>
    <div id="dModal" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel"></h3></div><div class="modal-body">
    <p>
    <ul>
    <li><button id="btnaddsurvey">Penambahan Survey</button></li>
    <li><button>Penambahan Instalasi</button></li>
    <li><button>Perubahan Layanan</button></li>
    <li><button>Penambahan Troubleshoot</button></li>
    </ul>
    </p></div></div>
    <div class="header">
        <a class="logo" href="index.html"><img src="img/logo.png" alt="PadiNET App" title="PadiNET App"/></a>
        <ul class="header_menu">
            <li class="list_icon"><a href="#">&nbsp;</a></li>
        </ul>
    </div>

    <?php $this->load->view('adm/menu',$path);?>
    
        
    <div class="content">
        
        
        <div class="breadLine">
            
            <ul class="breadcrumb">
                <li><a href="#">PadiNET App</a> <span class="divider">></span></li>                
                <li class="active">Dashboard</li>
            </ul>
        </div>
        
        <div class="workplace">
            
            <div class="row-fluid">
                
                <div class="span12">
                    <div class="head clearfix">
                        <div class="isw-documents"></div>
                        <h1>Kalender</h1>
                    </div>
                    <div class="block-fluid">                        
                        
                        <div class="row-form clearfix">
                            <div class="span3">
                            <div style='background:red'>Lewat batas waktu</div>
                            <div style='background:green'>Belum dilaksanakan</div>
                            <div style='background:blue'>Sudah dilaksanakan</div>
                            </div>
                            <div class="span9">
								<div id='agenda'></div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
            <div class="dr"><span></span></div>
        </div>
    </div>
	<script type='text/javascript' src='<?php echo base_url();?>js/aquarius/dashboards.js'></script>    
</body>
</html>
