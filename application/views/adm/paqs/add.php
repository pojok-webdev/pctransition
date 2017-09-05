<!DOCTYPE html>
<html lang="en">
<?php $this->load->view("adm/head");?>
<body>
    <div class="header">
        <a class="logo" href="index.html"><img src="img/logo.png" alt="PadiApp" title="PadiApp"/></a>
        <ul class="header_menu">
            <li class="list_icon"><a href="#">&nbsp;</a></li>
        </ul>
    </div>
    <?php $this->load->view("adm/menu");?>
    <div class="content">
        <div class="breadLine">
            <ul class="breadcrumb">
                <li><a href="#">PadiApp</a> <span class="divider">></span></li>
                <li><a href="#">Explanation</a> <span class="divider">></span></li>
                <li class="active">Add</li>
            </ul>
        </div>
        <div class="workplace">
            <div class="row-fluid">
                <div class="span12">
                    <div class="head clearfix">
                        <div class="isw-favorite"></div>
                        <h1>Question</h1>
						<ul class="buttons">
							<li><span class="isw-ok" id="btnsave" title="simpan"></span></li>
						</ul>
                    </div>
                    <div class="block-fluid" id="qwysiwyg_container">
                        <textarea id="question" name="question" style="height: 300px;"></textarea>
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span12">
                    <div class="head clearfix">
                        <div class="isw-favorite"></div>
                        <h1>Explanation</h1>
                    </div>
                    <div class="block-fluid" id="wysiwyg_container">
                        <textarea id="explanation" name="explanation" style="height: 300px;"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="<?php echo base_url();?>js/aquarius/adm/paqs/add.js"></script>
</body>
</html>
