<!DOCTYPE html>
<html>
    <head>
        <title>Padi Structure</title>
        <meta charset=utf-8 />
        <link href="<?php echo base_url(); ?>asset/bootstrap-3.3.1/css/bootstrap.css" rel="stylesheet" />
        <!--[if lt IE 8]>
            <link href="<?php echo $csspath;?>ie7.css" rel="stylesheet" type="text/css" />
        <![endif]-->        
        <link href="<?php echo base_url(); ?>css/nodeview.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>css/aquarius/stylesheets.css" rel="stylesheet" type="text/css" />
        <script src="<?php echo base_url(); ?>js/jquery-1.11.2.min.js"></script>
        <script type='text/javascript' src='<?php echo base_url(); ?>js/aquarius/plugins/bootstrap.min.js'></script>
        
        <script src="<?php echo base_url(); ?>asset/cytoscape/cytoscape-2.3.8/cytoscape.min.js"></script>
        <script src="<?php echo base_url(); ?>js/aquarius/links.js"></script>
        <script src="<?php echo base_url(); ?>js/aquarius/radu.js"></script>
        <script src="<?php echo base_url(); ?>js/usernodeview.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#addNode").click(function () {
                    $("#dAddNode").modal();
                });
                $("#saveNode").click(function () {
                    //addNode();
                    $(this).addNode({
                        target: $("#parent :selected").val(),
                        id: $("#name").val()
                    });
                    //$("#dModal").modal();
                });
                $(".closemodal").click(function () {
                    $(this).stairUp({level:3}).modal("hide");
                });
            });
        </script>
    </head>
    <body>
        <div id="dModal" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Konfirmasi</h3>
            </div>
            <div class="modal-body">
                <p id="modalMessage">Data telah tersimpan.</p>
            </div>

        </div>
        <div id="dAddNode" class="modal hidex fade" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Penambahan Node</h3>
            </div>
            <div class="modal-body">
                <div class="row-fluid">
                    <div class="span12">
                        <div class="block-fluid without-head">
                            <div class="row-form clearfix">
                                <div class="span3">Nama</div>
                                <div class="span9">
                                    <input type="text" name="name" id="name" />
                                </div>
                                <div class="span3">parent</div>
                                <div class="span9">
                                    <select id="parent">
                                        <option>None</option>
                                        <option id="csisca" value="sisca">Sisca</option>
                                        <option id="cketut" value="ketut">Ketut</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer">
                    <button class="btn closemodal" type="button" id='saveNode'>Simpan</button>
                    <button class="btn closemodal" type="button">Tutup</button>
                </div>
            </div>
        </div>

        <h1>Struktur Jabatan </h1>
        <button id="addNode" class="button">Add Node</button>
        <button id="rearrange" class="button">Rearrange</button>
        <div id="cy"></div>
        <div id="cuyu"></div>
    </body>
</html>
