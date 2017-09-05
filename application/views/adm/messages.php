<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('adm/head');?>
<script type='text/javascript' src='<?php echo base_url();?>js/aquarius/messages.js'></script>
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
                <li><a href="#">DB_Teknis</a> <span class="divider">></span></li>
                <li><a href="#">User</a> <span class="divider">></span></li>
                <li class="active">Message</li>
            </ul>
			<?php $this->load->view('adm/buttons');?>
        </div>
        <div class="workplace">
            <div class="row-fluid">
                <div class="span12">
                    <div class="head clearfix">
                        <div class="isw-grid"></div>
                        <h1>Pesan masuk</h1>
                    </div>
                    <div class="block messaging">
                        <?php foreach(Message::populate($this->session->userdata['username']) as $message){?>
                        <div class="itemIn">
                            <a href="#" class="image"><img src="<?php echo base_url();?>media/users/<?php echo $message->sender;?>.jpg" class="img-polaroid" width=50 height=50 /></a>
                            <div class="text message" message_id='<?php echo $message->id;?>'>
                                <div class="info clearfix">
                                    <span class="name"><?php echo $message->sender;?></span>
                                    <span class="date" title="<?php echo $message->createdate;?>"><?php echo $message->createdate;?></span>
                                </div>
                                <?php echo $message->description;?>
                            </div>
                        </div>
                        <?php foreach(Message::get_replies($message->id) as $reply){?>
                        <div class="itemOut">
                            <a href="#" class="image"><img src="<?php echo base_url();?>media/users/<?php echo $reply->sender;?>.jpg" class="img-polaroid" width=50 height=50 /></a>
                            <div class="text message" message_id='<?php echo $reply->id;?>'>
                                <div class="info clearfix">
                                    <span class="name"><?php echo $reply->sender;?></span>
                                    <span class="date">any times ago</span>
                                </div>
                                <?php echo $reply->description;?>
                            </div>
                        </div>
                        <?php }?>
                        <?php }?>
                    </div>
                </div>
        </div>
    </div>
</body>
</html>
