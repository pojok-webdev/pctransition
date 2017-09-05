<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('adm/head');?>
<body>
    <div class="header">
        <a class="logo" href="index.html"><img src="img/logo.png" alt="Aquarius -  responsive admin panel" title="Aquarius -  responsive admin panel"/></a>
        <ul class="header_menu">
            <li class="list_icon"><a href="#">&nbsp;</a></li>
        </ul>
    </div>
    <?php $this->load->view("adm/menu");?>
    <div class="content">
        <div class="breadLine">
            <ul class="breadcrumb">
                <li><a href="#">PadiApp</a> <span class="divider">></span></li>
                <li><a href="<?php echo base_url();?>paqs/">PAQ</a> <span class="divider">></span></li>
                <li class="active">explanatin</li>
            </ul>
        </div>
        <div class="workplace">
            <div class="row-fluid">
                <div class="span12">
                    <div class="head clearfix">
                        <h1>PadiApp Doc</h1>
                    </div>
                    <div class="block">
                        <h1>Menambahkan Prospek Baru</h1>
                        <?php echo $objs->explanation;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
