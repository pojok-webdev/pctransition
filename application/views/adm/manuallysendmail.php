<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('adm/head');?>
<body>
    <div id="dModal" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Konfirmasi</h3>
        </div>
        <div class="modal-body">
            <p>Pesan telah terkirim.</p>
        </div>
    </div>
    <div class="header">
        <a class="logo" href="index.html"><img src="img/logo.png" alt="PadiApp" title="PadiApp"/></a>
        <ul class="header_menu">
            <li class="list_icon"><a href="#">&nbsp;</a></li>
        </ul>
    </div>
	<?php $this->load->view('adm/menu');?>
    <div class="content">
        <div class="breadLine">
            <ul class="breadcrumb">
                <li><a href="#">PadiApp</a> <span class="divider">></span></li>
                <li><a href="#">Sales</a> <span class="divider">></span></li>
                <li class="active">Manually Send Mail</li>
            </ul>
        </div>
        <div class="workplace" user_id='<?php echo $obj->id;?>'>
            <div class="row-fluid">
                <div class="span12">
                    <div class="head clearfix">
                        <div class="isw-documents"></div>
                        <h1>Send Mail</h1>
                    </div>
                    <div class="block-fluid">
                        <div class="row-form clearfix">
                            <div class="span3">Nama Perusahaan:</div>
                            <div class="span9">
								<input type="text" placeholder="Nama Perusahaan ..." value="" name='client_name' id='client_name' class="inpuser"/>
							</div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">URL:</div>
                            <div class="span9">
								<input type="text" placeholder="URL Instalasi ..." value="" name='url' id='url' class="inpuser"/>
							</div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">To:</div>
                            <div class="span9">
								<input type="text" placeholder="Penerima email, dipisahkan dg koma" value="ts@padi.net.id" name='recipient' id='recipient' class="inpuser"/>
							</div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">cc:</div>
                            <div class="span9">
								<input type="text" placeholder="Copy carbon, dipisahkan dg koma" value="marketing@padi.net.id" name='cc' id='cc' class="inpuser"/>
							</div>
                        </div>
                        <div class="row-form clearfix">
							<button type='button' class='btn' name='kirim' id='btnsend'>Kirim</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<script type='text/javascript' src='<?php echo base_url();?>js/padilibs/padi.imagelib.js'></script>
	<script type='text/javascript' src='<?php echo base_url();?>js/padilibs/padi.sendmail.js'></script>
	<script>
		(function($){
			$('#btnsend').click(function(){
				var clientname = $('#client_name').val(),
					status = 'Belum selesai',
					url = $('#url').val(),
					to = $('#recipient').val(),
					cc = $('#cc').val();
				/*if(sendsurveyrequest('Amir',clientname,'',url,function(subject,bodytext,tsmail,marketingmail){
										sendemail(subject,bodytext,tsmail,marketingmail);
									})){
					
				}*/
				if(sendinstallrequest('Amir',clientname,url)){
					alert('Mengirim email sukses');
				}else{
					alert('tidak bisa mengirim');
				}
/*				if(sendinstall(clientname,status,url)){
					console.log('Sukses mengirim email');
					$('#dModal').modal();
				}else{
					console.log('Error mengirim email');
				}*/
			});
		}(jQuery))
	</script>
</body>
</html>
