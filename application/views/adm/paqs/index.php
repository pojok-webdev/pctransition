<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('adm/head');?>
<body>
    <div class="header">
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
                <li class="active">Probably Asked Questions</li>
            </ul>
			<?php $this->load->view('adm/buttons');?>
        </div>
        <div class="workplace">
            <div class="row-fluid">
                <div class="span12">
                    <div class="head clearfix">
                        <div class="isw-grid"></div>
                        <h1>Probability Asked Questions</h1>
                    </div>
                    <div class="block-fluid table-sorting clearfix">
                        <table cellpadding="0" cellspacing="0" width="100%" class="table" id="tPAQ">
                            <thead>
                                <tr>
                                    <th width="100%">Pertanyaan</th>
                                </tr>
                            </thead>
                            <tbody>
								<?php foreach($objs as $obj){?>
                                <tr>
                                    <td><?php echo $obj->question;?>(<a href="<?php echo base_url();?>index.php/paqs/explanation/<?php echo $obj->id;?>">Lihat Jawaban</a>)
                                    <?php
                                    if($this->session->userdata["role"]==="Administrator"){
										echo "<a href='".base_url()."index.php/paqs/edit/".$obj->id."'>Edit</a>";
									}
                                    ?>
                                    </td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="dr"><span></span></div>
        </div>
    </div>
    <script type="text/javascript" src="<?php echo base_url();?>js/aquarius/adm/paqs/paqs.js"></script>
</body>
</html>
