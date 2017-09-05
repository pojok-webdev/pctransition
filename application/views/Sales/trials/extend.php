<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('adm/head')?>
<script type='text/javascript' src='<?php echo base_url();?>js/aquarius/salesinstall_edit.js'></script>
<body>
	
    <div id="dModal" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Konfirmasi</h3>
        </div>
        <div class="modal-body">
            <p>Data telah tersimpan.</p>
        </div>
    </div>
        
    <div class="header" username="<?php echo $this->session->userdata['username'];?>">
        <a class="logo" href="index.html"><img src="<?php echo base_url();?>img/aquarius/logo.png" alt="PadiApp" title="PadiApp"/></a>
        <ul class="header_menu">
            <li class="list_icon"><a href="#">&nbsp;</a></li>
        </ul>    
    </div>

	<?php $this->load->view('adm/menu');?>
    <div class="content">
        <div class="breadLine">
            <ul class="breadcrumb">
                <li><a href="#">PadiApp</a> <span class="divider">></span></li>
                <li><a href="#">Trial</a> <span class="divider">></span></li>
                <li class="active">Extend</li>
            </ul>
			<?php $this->load->view('adm/buttons');?>            
		</div>
        <div class="workplace" id="workplace" >
            <input type="hidden" id="username" name="username" value="<?php echo $this->session->userdata['username'];?>">
            <input type="hidden" id="thisid" name="thisid" value="<?php echo $obj->id;?>">
            <input type="hidden" id="client_site_id" name="client_site_id" value="<?php echo $obj->client_site_id;?>">
            
            <div class="block-fluid without-head">                        
				<div class="toolbar clearfix">
					<div class="right">
						<div class="btn-group">
							<button class="btn dropdown-toggle" id="extend_save">Simpan 
							</button>
						</div>
					</div>
				</div>
			</div>
            <div class="row-fluid">                
                <div class="span12">                                        
                    <div class="block-fluid without-head">                        

                        <div class="row-form clearfix">
                            <div class="span3">Nama Pelanggan</div>
							<div class="span9">
								<?php echo form_input("client_id",$obj->client_site->client->name,"id='client_id' readonly");?>
							</div>
                        </div>


                        <div class="row-form clearfix">
                            <div class="span3">Alasan Extend</div>
                            <div class="span9">
								<?php echo form_dropdown("extendreason",$extendreason,0,"id='cbextendreason'");?>
                            </div>
                        </div>

                        <div class="row-form clearfix" id="otherreason">
                            <div class="span3">Alasan lain</div>
                            <div class="span9"><input type="text" name="pic_email" id="pic_email" value="<?php echo $obj->pic_email?>" class="installrequest installsite"/></div>
                        </div>                                                
                    </div>                    
                </div>
                
			</div>            
                        
        </div>
    </div>   
</body>
<script type="text/javascript">
	if ($("#cbextendreason :selected").text() === "Lainnya"){
		$("#otherreason").show();
		console.log("display block");
	}else{
		$("#otherreason").hide();
		console.log("display none");
	}

	$("#cbextendreason").change(function(){
		console.log("reason changed",$("#cbextendreason :selected").text());
		if ($("#cbextendreason :selected").text() === "Lainnya"){
			$("#otherreason").show();
			console.log("display block");
		}else{
			$("#otherreason").hide();
			console.log("display none");
		}
	});
	$("#extend_save").click(function(){
		console.log("extend save clicked");
		$.ajax({
			url:thisdomain+"trials/update",
			data:{"id":$("#thisid").val(),"extendreason":$("#cbextendreason :selected").text(),"extend":"1"},
			type:"post"
		})
		.done(function(res){
			console.log("Res",res);
			window.location.href = thisdomain+"trials/add2/"+$("#client_site_id").val()+"/"+$("#thisid").val();
		})
		.fail(function(err){
			console.log("Err",err);
		});
	});
</script>
</html>
