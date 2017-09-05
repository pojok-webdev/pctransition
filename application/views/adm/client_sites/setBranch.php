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
    <?php $this->load->view('adm/menu');?>
    <div class="content">
        <div class="breadLine">
            <ul class="breadcrumb">
                <li><a href="#">PadiApp</a> <span class="divider">></span></li>
                <li><a href="#">Pelanggan</a> <span class="divider">></span></li>
                <li class="active">List</li>
            </ul>
			<?php $this->load->view('adm/buttons');?>
        </div>


        <div class="workplace">
            <div class="row-fluid">
                <div class="span4">
                    <div class="head clearfix">
                        <div class="isw-list"></div>
                        <h1>Not Filtered</h1>
                    </div>
                    <div class="block-fluid">
                        <ul class="sList sortable" id="uncategorized">
							<?php foreach($clientsites->where('branch_id',null)->get() as $cs){?>
							<li><?php echo $cs->address;?></li>
							<?php }?>
                        </ul>
                    </div>
                </div>
            <!--</div>

            <div class="dr"><span></span></div>
            <div class="row-fluid">-->
                <div class="span2">
                    <div class="head clearfix">
                        <div class="isw-list"></div>
                        <h1>Surabaya</h1>
                    </div>
                    <div class="block-fluid">
                        <ul class="sList sortable" id="sort_1">
							<?php foreach($clientsites->where('branch_id','1')->get() as $cs){?>
							<li><?php echo $cs->address;?></li>
							<?php }?>
                        </ul>
                    </div>
                </div>
                <div class="span2">
                    <div class="head clearfix">
                        <div class="isw-list"></div>
                        <h1>Surabaya</h1>
                    </div>
                    <div class="block-fluid">
                        <ul class="sList sortable" id="sort_2">
							<?php foreach($clientsites->where('branch_id','1')->get() as $cs){?>
							<li><?php echo $cs->address;?></li>
							<?php }?>
                        </ul>
                    </div>
                </div>
            <!--</div>
            <div class="row-fluid">-->
                <div class="span2">
                    <div class="head clearfix">
                        <div class="isw-list"></div>
                        <h1>Malang</h1>
                    </div>
                    <div class="block-fluid">
                        <ul class="sList sortable" id="sort_3">
							<?php foreach($clientsites->where('branch_id','1')->get() as $cs){?>
							<li><?php echo $cs->address;?></li>
							<?php }?>

                        </ul>
                    </div>
                </div>
                <div class="span2">
                    <div class="head clearfix">
                        <div class="isw-list"></div>
                        <h1>Bali</h1>
                    </div>
                    <div class="block-fluid">
                        <ul class="sList sortable" id="selectable_1">
							<?php foreach($clientsites->where('branch_id','4')->get() as $cs){?>
							<li><?php echo $cs->address;?></li>
							<?php }?>
                        </ul>
                    </div>
                </div>
            </div>
            <script>
				(function($){
					console.log('js invoked');
					$('.sortable')
					.sortable({
						connectWith:'.sortable',
						change:function(event,ui){
							//console.log("CHANGED",event,ui);
						},
						update:function(event,ui){
							//console.log("UPDATED EVENT",event);
							console.log("UPDATED  UI",ui.sender);
						}
					}
					)
					.disableSelection();
				}(jQuery))
            </script>
</body>
</html>
