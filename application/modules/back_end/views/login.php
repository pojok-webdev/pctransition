<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
            <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
            <title>KPI :. Login</title>
            <link href="<?php echo base_url();?>themes/<?php echo $this->setting['theme'];?>/css/login.css" rel="stylesheet" type="text/css" />
        </head>

        <body>
            <div class="content">
                <form method="post" action="back_end/login_handler" name="form" id="form">
                    <div class="form">
					<div>username : <input name="name" id="usrname" type="text" /></div>
                    <div>password : <input name="password" id="pwd" type="password" /></div>
                    </div>
                    <?php echo '<span>' . $alert . '</span>';?>
                    <div class="button">
                        <input name="login" class="submit" value="LOGIN" id="btn" type="submit" />
                    </div>
                </form>
<span class='smallcase'><a href='<?php echo base_url();?>index.php/back_end/forgot_password'>Lupa Password</a></span>
            </div>
            
			<div class="footer"><?php echo $this->setting['footer_text'];?></div>
</body></html>
