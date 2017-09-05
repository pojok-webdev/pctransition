<style type='text/css'>
.pointer{
	cursor: pointer;
	}
</style>

<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('adm/head')?>
	<script type='text/javascript' src='<?php echo base_url();?>js/aquarius/EOS/maintenancereport/add.js'></script>
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
    
    <div id="dAddPicture" class="modal hidex fade" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalImageLabel">Penambahan Gambar Survey</h3>
        </div>
        <div class="modal-body">
            <div class="row-fluid">
                <div class="span12">
                    <div class="block-fluid without-head">
                        <div class="row-form clearfix">
                            <div class="span3">File</div>
                            <div class="span9">
                                <img id="output" width=200 height=200>
                                <input type="file" id="addImage" onchange="uploadImage1(event)"/>
                            </div>
                            <div class="span1" id="status"></div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Ket.</div>
                            <div class="span9"><textarea type="text" name="file_description" id="file_description" ></textarea></div>
                        </div>
                        <div class="footer">
                            <button class="btn closemodal" type="button" id='btnSaveImage'>Simpan</button>
                            <button class="btn closemodal" type="button">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="header">
        <a class="logo" href="index.html"><img src="<?php echo base_url();?>img/aquarius/logo.png" alt="PadiNET App" title="PadiNET App"/></a>
        <ul class="header_menu">
            <li class="list_icon"><a href="#">&nbsp;</a></li>
        </ul>
    </div>
	<?php $this->load->view('adm/menu');?>
    <div class="content">
        <div class="breadLine">
            <ul class="breadcrumb">
                <li><a href="#">PadiApp</a> <span class="divider">></span></li>
                <li><a href="#">Maintenance</a> <span class="divider">></span></li>
                <li class="active">Add</li>
            </ul>
            <?php $this->load->view('adm/buttons');?>
        </div>
        <div class="workplace" username="<?php echo $this->session->userdata['username'];?>" id="workplace">
		<input type="hidden" name="createuser" value="<?php echo $this->session->userdata['username'];?>" class="inp_maintenance" />
		<input type="hidden" name="user_id" value="<?php echo $this->session->userdata['user_id'];?>" class="inp_maintenance" />
            <div class="row-fluid">
                <div class="span12">
                    <div class="block-fluid without-head">
                        <div class="toolbar clearfix">
                            <div class="left">
                                <div class="btn-group">
                                </div>
                            </div>
                            <div class="right">
                                <div class="btn-group">
                                    <button id="btnsavereport">Simpan</button>
                                </div>
                            </div>
                        </div>
					</div>
				</div>
			</div>
            <div class="row-fluid">
                <div class="span6">
                    <div class="block-fluid without-head">
                        <div class="toolbar clearfix">
                            <div class="left">
                                <div class="btn-group">
                                </div>
                            </div>
                            <div class="right">
                                <div class="btn-group">
                                </div>
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Pilih Jadwal Maintenance</div>
                            <div class="span9">
                                <?php echo form_dropdown("schedule",$schedules,"id='schedule'");?>
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Kompetitor</div>
                            <div class="span9">
                                <?php echo form_dropdown("operator",$operators,"id='operator'");?>
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Pembagian antar Kompetitor</div>
                            <div class="span9">
								<textarea id="distribution" class="myeditor"></textarea>
							</div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Penggunaan Internet</div>
                            <div class="span9">
								<?php echo form_dropdown('usage_periobds',$usage_periods,1,'id="usage_periods" class="" type="selectid"');?>
							</div>
                        </div>
                    </div>

                    <div class="block-fluid without-head">
                        <div class="toolbar nopadding-toolbar clearfix">
                            <h4>Gambar Survey</h4>
                            <span id="status" ></span>
                        </div>
                        <div class="toolbar clearfix paditablehead">
                            <div class="left">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-small btn-danger tip btn_addimage" title="Tambah Gambar"><span class="icon-plus icon-white"></span></button>
                                    <button type="button" class="btn btn-small btn_addimage">Penambahan Gambar Survey</button>
                                </div>
                            </div>
                        </div>
                        <table cellpadding="0" cellspacing="0" width="100%" class="table images gambar" id="tImage">
                            <thead>
                                <tr>
                                    <th width="30">Gambar</th>
                                    <th width="20">Nama</th>
                                    <th width="60">Keterangan</th>
                                    <th width="30">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <tr class="rImage" image_id=1 >
                                    <td class="image_path">
                                        <a class="fancyboxx" rel="groupx">
                                        <img src="#" class="img-polaroidx prevImage" onclick="viewImage(this)" width=50 height=38 />
                                        </a>
                                    </td>
                                    <td class="info image_name"><a>imagepath</a><span>IMAGEPATH</span></td>
                                    <td class="image_description">description</td>
                                    <td>
                                        <a><span class="icon-remove removesurveyimage"></span></a>
                                        <a><span class="icon-arrow-up switchup pointer"></span></a>
                                        <a><span class="icon-arrow-down switchdown pointer"></span></a>
                                        <a><span class="icon-pencil imageedit pointer"></span></a>
                                    </td>
                                </tr>
                                <tr class="rImage" image_id=1 >
                                    <td class="image_path">
                                        <a class="fancyboxx" rel="groupx">
                                        <img src="#" class="img-polaroidx prevImage" onclick="viewImage(this)" width=50 height=38 />
                                        </a>
                                    </td>
                                    <td class="info image_name"><a>imagepath</a><span>IMAGEPATH</span></td>
                                    <td class="image_description">description</td>
                                    <td>
                                        <a><span class="icon-remove removesurveyimage"></span></a>
                                        <a><span class="icon-arrow-up switchup pointer"></span></a>
                                        <a><span class="icon-arrow-down switchdown pointer"></span></a>
                                        <a><span class="icon-pencil imageedit pointer"></span></a>
                                    </td>
                                </tr>
                                <tr class="rImage" image_id=1 >
                                    <td class="image_path">
                                        <a class="fancyboxx" rel="groupx">
                                        <img src="#" class="img-polaroidx prevImage" onclick="viewImage(this)" width=50 height=38 />
                                        </a>
                                    </td>
                                    <td class="info image_name"><a>imagepath</a><span>IMAGEPATH</span></td>
                                    <td class="image_description">description</td>
                                    <td>
                                        <a><span class="icon-remove removesurveyimage"></span></a>
                                        <a><span class="icon-arrow-up switchup pointer"></span></a>
                                        <a><span class="icon-arrow-down switchdown pointer"></span></a>
                                        <a><span class="icon-pencil imageedit pointer"></span></a>
                                    </td>
                                </tr>
                                
                            </tbody>
                        </table>
                        <div class="toolbar bottom-toolbar clearfix">
                            <div class="left">
                            </div>
                            <div class="right">
                                Total : <span id="total_image">XXX</span>
                            </div>
                        </div>
                    </div>                    
                    
                </div>
                <div class="span6">
                    <div class="block-fluid without-head">
                        <div class="toolbar clearfix">
                            <div class="left">
                                <div class="btn-group">
                                </div>
                            </div>
                            <div class="right">
                                <div class="btn-group">
                                </div>
                            </div>
                        </div>

                        <div class="row-form clearfix">
                            <div class="span3">Keluhan/Problem</div>
                            <div class="span9"><textarea name="problem" id="problem" class="inp_maintenance myeditor" type="textarea"></textarea></div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Kesimpulan &amp Status Problem</div>
                            <div class="span9">
                                <select>
                                    <option value="1">Bisa Dilaksanakan</option>
                                    <option value="0">Belum Selesai</option>
                                </select>
                            </div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Request Pelanggan</div>
                            <div class="span9"><textarea name="problem" id="problem" class="inp_maintenance myeditor" type="textarea"></textarea></div>
                        </div>
                        <div class="row-form clearfix">
                            <div class="span3">Usulan VAS</div>
                            <div class="span9">
                                <select>
                                    <option value="1">Satu</option>
                                    <option value="0">Dua</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span6">
                </div>
                <div class="span6">
                </div>
            </div>
        </div>
    </div>
</body>
<script type="text/javascript">
    
    (function($){
        $('.myeditor').cleditor({width:'300',height:'160px',controls:"bold italic underline | color highlight removeformat | bullets numbering"});
    }(jQuery))

$(".btn_addimage").click(function(){
    alert("add image");
    $("#dAddPicture").modal();
});
</script>
</html>
