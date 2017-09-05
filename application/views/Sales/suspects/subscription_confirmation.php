<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('adm/head');?>
    <script type="text/javascript" src="<?php echo base_url()?>js/aquarius/suspects/subscription_confirmation.js"></script>
    <body>
        <div id="dModal" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Konfirmasi</h3>
            </div>
            <div class="modal-body">
                <p id="modalMessage">Data telah tersimpan.</p>
            </div>
        </div>
    <?php $this->load->view('adm/header');?>
	<?php $this->load->view('adm/menu');?>
        <div class="content">
            <div class="breadLine">
                <ul class="breadcrumb">
                    <li><a href="#">PadiApp</a> <span class="divider">></span></li>
                    <li><a href="#">Suspect</a> <span class="divider">></span></li>
                    <li class="active">Data Calon Pelanggan</li>
                </ul>
			<?php $this->load->view('adm/buttons');?>
            </div>
            <div class="workplace">
                <input type='hidden' id='clientid' value='<?php echo $this->uri->segment(3);?>'>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="head clearfix">
                            <div class="isw-documents"></div>
                            <h1>Penggunaan Internet</h1>
                            <ul class="buttons">
                                <li><span class="isw-left" id="btnprevdata"></span></li>
                                <li><span class="isw-right" id="btnnextdata"></span></li>
                            </ul>
                        </div>
                        <div class="block-fluid">
                            <div class="row-form clearfix">
                                <div class="span3">Apakah sudah menggunakan Internet ?</div>
                                <div class="span9">
                                    <input type="radio" name="use_internet" id="yes_radio"  value="menggunakan Internet"/>Ya
                                    <input type="radio" name="use_internet" id="no_radio" value="Belum menggunakan Internet"/>Tidak
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="dr"><span></span></div>
            </div>
        </div>
    </body>
</html>
