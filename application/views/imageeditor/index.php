<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('adm/head');?>
<script type="text/javascript" src="<?php echo base_url();?>js/jscolor.js"></script>
<body>
	<div id="dText" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3 id="myWithdrawLabel">Text to write</h3>
		</div>
		<div class="modal-body">
			<div class="row-fluid">
				<div class="span12">
					<div class="block-fluid without-head">
						<div class="row-form clearfix">
							<div class="span3">Text</div>
							<div class="span9">
								<input id="textToWrite" />
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-warning closemodal" type="button" id='saveText'>OK</button>
				<button class="btn closemodal" type="button">Batalkan</button>
			</div>
		</div>
	</div>
    <div class="header">
        <a class="logo" href="index.html"><img src="img/logo.png" alt="PadiNET" title="PadiNET"/></a>
        <ul class="header_menu">
            <li class="list_icon"><a href="#">&nbsp;</a></li>
        </ul>
    </div>
    <div class="menu">
        <div class="breadLine">
            <div class="arrow"></div>
            <div class="adminControl active">
                Image Editor
            </div>
        </div>
        <div class="admin">
            <div class="image">
                <img src="img/face.png" class="img-polaroid"/>
            </div>
            <div class="info">
                <span>Image Editor 1.0</span>
            </div>
        </div>
        <ul class="navigation">
            <li>
                <a id="btnLoadImage" class="pointer">
                    <span class="isw-grid"></span><span class="text">Load Image</span>
                </a>
            </li>
            <li>
                <a id="btnSave" class="pointer">
                    <span class="isw-grid"></span><span class="text">Save</span>
                </a>
            </li>
            <li>
                <a id="btnClear" class="pointer">
                    <span class="isw-grid"></span><span class="text">Clear</span>
                </a>
            </li>
            <li>
                <a id="btnUndo" class="pointer">
                    <span class="isw-grid"></span><span class="text">Undo Last Action</span>
                </a>
            </li>
            <li class="openable active">
                <a href="#">
                    <span class="isw-settings"></span><span class="text">Tools</span>
                </a>
                <ul>
                    <li class="active">
                        <a id="btnLine" class="pointer">
                            <span class="icon-chevron-right"></span><span class="text">Line</span>
                        </a>
                    </li>
                    <li class="active">
                        <a id="btnArrow" class="pointer">
                            <span class="icon-chevron-right"></span><span class="text">Arrow</span>
                        </a>
                    </li>
                    <li>
                        <a id="btnCircle" class="pointer">
                            <span class="icon-chevron-right"></span><span class="text">Circle</span>
                        </a>
                    </li>
                    <li>
                        <a id="btnRectangle" class="pointer">
                            <span class="icon-chevron-right"></span><span class="text">Rectangle</span>
                        </a>
                    </li>
                    <!--<li>
                        <a id="btnRoundedRectangle" class="pointer">
                            <span class="icon-chevron-right"></span><span class="text">Rounded Rectangle</span>
                        </a>
                    </li>-->
                    <li>
                        <a id="btnFreeDrag" class="pointer">
                            <span class="icon-chevron-right"></span><span class="text">Free Draw</span>
                        </a>
                    </li>
                    <li>
                        <a id="btnText" class="pointer">
                            <span class="icon-chevron-right"></span><span class="text">Text</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="openable active">
                <a href="#">
                    <span class="isw-settings"></span><span class="text">Towers</span>
                </a>
                <ul>
                    <li class="active">
                        <a id="btnTower1" class="pointer">
                            <span class="icon-chevron-right"></span><span class="text">Tower 1</span>
                        </a>
                    </li>
                    <li>
                        <a id="btnTower2" class="pointer">
                            <span class="icon-chevron-right"></span><span class="text">Tower 2</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
        <div class="dr"><span></span></div>
    </div>
    <div class="content">
        <div class="breadLine">
            <ul class="breadcrumb">
                <li><a href="#">Image Editor</a> <span class="divider">></span></li>
                <li class="active">1.0</li>
            </ul>
        </div>
		<div class="workplace">
			<input type='hidden' id='id' value='<?php echo $obj->id;?>' />
			<input type='hidden' id='img' value='<?php echo $obj->img;?>' />
			<input type='hidden' id='saveurl' value='<?php echo $saveurl;?>' />
			<div class="row-fluid">
				<div class="span12">
					<div class="head clearfix">
						<div class="isw-picture"></div>
						<h1>Picture</h1>
						<ul class="buttons">
							<li><input id="picker_" class="color"></li>
						</ul>
					</div>
					<div class="block-fluid tabs">
						<canvas id="mycanvas" class="pointer" width=1000 height=1000 src="<?php echo $obj->img;?>"></canvas>
					</div>
				</div>
			</div>
			<div class="dr"><span></span></div>
		</div>
    </div>
	<script type="text/javascript" src="<?php echo base_url();?>js/padilibs/padi.peto.js"></script>
</body>
</html>
