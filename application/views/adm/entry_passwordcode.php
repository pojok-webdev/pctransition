<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('adm/head');?>
<script type="text/javascript" src="<?php echo base_url();?>js/aquarius/entry_passwordcode.js"></script>
<body>
    <div id="dModal" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Konfirmasi</h3>
        </div>
        <div class="modal-body">
            <p>Silakan periksa email anda, kami mengirimkan password yang telah direset. Jangan lupa untuk segera mengganti password setelah berhasil masuk ke Aplikasi Teknis</p>
            <p>Apabila anda tidak menerima email , silakan hubungi Developer.</p>
			<div class="footer">
				<button type="button" data-dismiss="modal closemodal" class="btn" id="btnok">OK</button>
			</div>
        </div>
    </div>      
    <div class="loginBox">        
        <div class="loginHead">
            <img src="img/logo.png" alt="PadiNET App" title="PadiNET App"/>
        </div>
        <input type='hidden' name='sender' value='login' />            
		<div class="control-group">
			<label for="username">Kode</label>                
			<input type="text" id="kode" name='kode'/>
		</div>
		<div class="form-actions">
			<button type="submit" class="btn btn-block" id="btn_reset_password">Kirim</button>
		</div>
    </div>    
</body>
</html>
