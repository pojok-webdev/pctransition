<!DOCTYPE html>
<html lang="en">
    <?php $this->load->view('adm/head'); ?>
    <link href="<?php echo base_url(); ?>css/nodeview.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>css/aquarius/padi.autocomplete.css" rel="stylesheet" />
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
        <div id="dUserSearch" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3>Pilih User</h3>
            </div>
            <div class="modal-body">
                <div class="row-fluid">
                    <div class="span12">
                        <div class="block-fluid without-head">
                            <div class="row-form clearfix">
                                <div class="span3">Nama</div>
                                <div class="span9">
                                    <input type="text" name="searchusername" id="searchusername" class="pautocomplete" />
                                    <ul id='result'>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer">
                    <button class="btn closemodal" type="button" id='btncekuser'>Simpan</button>
                    <button class="btn closemodal" type="button">Tutup</button>
                </div>
            </div>
        </div>        
        <div id="dProperties" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="property_label">User</h3>
            </div>
            <div class="modal-body">
                <div class="row-fluid">
                    <div class="span12">
                        <div class="block-fluid without-head">
                            <div class="row-form clearfix">
                                <div class="span3">Nama</div>
                                <div class="span9">
                                    <input type="text" name="prusername" id="prusername" />
                                </div>
                            </div>
                            <div class="row-form clearfix">
                                <div class="span3">Supervisor</div>
                                <div class="span9">
                                    <input type="text" name="prsupervisor" id="prsupervisor" class="pautocomplete" />
                                    <ul id='spv'></ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer">
                    <button class="btn closemodal" type="button" id='btnsaveproperty'>Simpan</button>
                    <button class="btn closemodal" type="button">Tutup</button>
                </div>
            </div>
        </div>        
        <div class="header">
            <a class="logo" href="index.html"><img src="<?php echo base_url(); ?>img/aquarius/logo.png" alt="PadiNET App" title="PadiNET App"/></a>
            <ul class="header_menu">
                <li class="list_icon"><a href="#">&nbsp;</a></li>
            </ul>
        </div>
        <?php $this->load->view('adm/menu'); ?>
        <div class="content">
            <div class="breadLine">
                <ul class="breadcrumb">
                    <li><a href="#">PadiApp</a> <span class="divider">></span></li>
                    <li><a href="#">users</a> <span class="divider">></span></li>
                    <li class="active">List</li>
                </ul>
                <?php $this->load->view('adm/buttons'); ?>
            </div>
            <div class="workplace">
                <div class="row-fluid">
                    <div class="span12">
                        <div class="head clearfix">
                            <div class="isw-users"></div>
                            <h1>Users</h1>
                            <ul class="buttons">
                                <li><span class="isw-list" id="btnTableView" title="Padi Table View"></span></li>
                                <li>
                                    <a href="#" class="isw-zoom"></a>
                                    <ul class="dd-list">
                                        <li id="btnsearch"><a><span class="isw-user"></span> User</a></li>
                                        <li id="btnShowAll"><a><span class="isw-users"></span> Tampilkan semua</a></li>
                                    </ul>
                                </li>
                                <li id="btnproperties"><span class="isw-settings" title="Properties"></span></li>
                                <li><span class="isw-refresh" id="btnrearrange" title="Rearrange"></span></li>
                            </ul>
                        </div>
                        <div class="block-fluid clearfix">
                            <div id="cy"></div>
                        </div>
                    </div>
                </div>
                <div class="dr"><span></span></div>
            </div>
        </div>
        <script src="<?php echo base_url(); ?>asset/cytoscape/cytoscape-2.3.8/cytoscape.min.js"></script>
        <script src="<?php echo base_url(); ?>js/aquarius/padi.autocomplete.js"></script>
        <script src="<?php echo base_url(); ?>js/aquarius/Sales/clientnodeview.js"></script>
        <script type="text/javascript">
            $(function($){
                var suggests = {id:"indonesia",ml:"malaysia",br:"brunei",pl:"philipine",sg:"singapore",th:"thailand"};
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
            }(jQuery));
        </script>
        
    </body>
</html>
