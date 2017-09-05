<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('adm/head');?>
<body>
    <div class="loginBox">
        <div class="loginHead">
            <img src="<?php echo base_url();?>img/aquarius/logo.png" alt="PadiApp" title="PadiApp"/>
        </div>
        <input type='hidden' name='sender' value='login' />
        <?php
		$pending_url = ($this->session->userdata("pending_url")?$this->session->userdata("pending_url"):"")
        ?>
        <input type='hidden' name='pending_url' id="pending_url" value='<?php echo $pending_url;?>' />
            <div class="control-group">
		<label for="password">Login sebagai</label>
		<?php
			foreach($roles as $role){
				echo '<button class="btn btn-block btnChooseRole" value="'.$role->name.'">'.$role->name.'</button>';
			}
		?>
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-block btnLogout">Log out</button>
            </div>
    </div>
    <script type="text/javascript" src="<?php echo base_url();?>js/aquarius/adm/chooseRole.js"></script>
</body>
</html>
