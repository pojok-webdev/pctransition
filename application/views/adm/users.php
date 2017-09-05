<!DOCTYPE html>
<html lang="en">
    <?php $this->load->view('adm/head'); ?>
    <script>
	function resizeImage2(url,width, callback){
		var canvas = document.createElement("canvas");
		var MAX_WIDTH_ALLOWED = width;
		var MAX_HEIGHT = 0;
		canvas.width = width;
		var img = new Image();
		img.onload = function(){
			MAX_HEIGHT = img.height * MAX_WIDTH_ALLOWED / img.width;
			canvas.height = MAX_HEIGHT;
			var ctx = canvas.getContext("2d");
			ctx.drawImage(img, 0, 0, MAX_WIDTH_ALLOWED, MAX_HEIGHT);
			callback(canvas.toDataURL("image/jpeg"));
		}
		img.src = url;
	}
	function uploadImage(evt){
	  var input = evt.target;
	  var fileReader = new FileReader();
	  fileReader.onloadend = function(){
		  $("body").css("cursor","wait");
			resizeImage2(fileReader.result,200,function(uri){
				$("#output").attr("src",uri);
				$("body").css("cursor","default");
			});
	  }
	  fileReader.readAsDataURL(input.files[0]);
	}
	</script>
	<script type='text/javascript' src='<?php echo base_url();?>js/aquarius/plugins/fancybox/jquery.fancybox.pack.js'></script>
    <body>
        <div class="header">
            <a class="logo" href="index.html"><img src="<?php echo base_url(); ?>img/aquarius/logo.png" alt="PadiNET App" title="PadiNET App"/></a>
            <ul class="header_menu">
                <li class="list_icon"><a href="#">&nbsp;</a></li>
            </ul>
        </div>
        <?php $this->load->view('adm/menu'); ?>
        <?php $this->load->view('adm/users/modal'); ?>
        <div class="content">
            <div class="breadLine">
                <ul class="breadcrumb">
                    <li><a href="#">PadiApp</a> <span class="divider">></span></li>
                    <li><a href="#">users</a> <span class="divider">></span></li>
                    <li class="active">List</li>
                </ul>
                <?php $this->load->view('adm/buttons'); ?>
            </div>
            <div class="workplace">
                <div class="row-fluid">
                    <div class="span12">
                        <div class="head clearfix">
                            <div class="isw-users"></div>
                            <h1>Users</h1>
                            <ul class="buttons">
                                <li><span class="isw-plus" id="btnAdd"></span></li>
                                <li><span class="isw-users" id="btnNodeView"></span></li>
                            <li>
                                <a href="#" class="isw-settings"></a>
                                <ul class="dd-list">
                                    <li id="alluser"><a href="#"><span class="isw-users"></span> Tampilkan Semua</a></li>
                                    <li id="activeuser" ><a href="#"><span class="isw-ok"></span> Tampilkan Aktif</a></li>
                                    <li id="nonactiveuser"><a href="#"><span class="isw-cancel"></span> Tampilkan Non Aktif</a></li>
                                </ul>
                            </li>
                        </ul>                                    
                            
                        </div>
                        <div class="block-fluid table-sorting clearfix">
                            <table cellpadding="0" cellspacing="0" width="100%" class="table" id="tUsers">
                                <thead>
                                    <tr><th>Foto</th><th>Nama</th><th>Phone-Mail</th><th>Divisi</th><th>Cabang</th><th>Aksi</th>
                                    <th class="aktif">Aktif</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $c = 1;?>
                                    <?php foreach ($objs as $user) { ?>
										<?php $activeflag = ($user->active ==='0')?' (non aktif)':'';?>
										<?php $activeflag2 = ($user->active ==='0')?' (non_active_user)':'(active-user)';?>
                                        <tr thisid='<?php echo $user->id;?>'>
                                            <td>
												<a>
                                                <?php echo $user->id;?>
                                                </a>
                                            </td>
                                            <td class='username'><?php echo $user->username . $activeflag; ?></td>
                                            <td class='phone'><div><?php echo $user->phone; ?></div><span class="mail"><?php echo $user->email; ?></span></td>
                                            <td>
                                                <?php echo $user->groupname; ?>
                                                </td>
                                            <td>
                                                <?php echo $user->branch; ?>                                                
                                                </td>
                                            <td>
												<div class="btn-group">
													<button data-toggle="dropdown" class="btn btn-small dropdown-toggle" >
														Aksi 
														<span class="caret"></span>
													</button>
													<ul class="dropdown-menu pull-right">
														<li class="btnedituser pointer"><a>Edit</a></li>
														<li class="btnedituserpopup pointer"><a>Edit (Popup)</a></li>
														<li class="btnsetpicture pointer"><a>Ubah Gambar</a></li>
														<li class="btnsetpassword pointer"><a>Ubah Password</a></li>
														<li class="divider "></li>
														<?php if($user->active ==='1'){?>
														<li class="btnsetnonaktif pointer"><a>Set Non Aktif</a></li>
														<?php }?>
														<?php if($user->active ==='0'){?>
														<li class="btnsetaktif pointer"><a>Set Aktif</a></li>
														<?php }?>
													</ul>
												</div>											
											</td>
											<td class="aktif"><?php echo "allusers_ " . $activeflag2;?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="dr"><span></span></div>
            </div>
        </div>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/aquarius/users.js"></script>
    </body>
</html>
