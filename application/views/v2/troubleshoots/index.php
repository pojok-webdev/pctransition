<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view("v2/commons/head");?>
    <?php $this->load->view("v2/commons/jquery");?>
    <?php $this->load->view("v2/commons/plugins");?>
</head>
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
                <li><a href="/">PadiApp</a> <span class="divider">></span></li>                
                <li><a href="/troubleshoots">Troubleshoots</a> <span class="divider">></span></li>                
                <li class="active">Index</li>
            </ul>
            <?php $this->load->view('adm/buttons');?>                        
        </div>
        
        <div class="workplace">
            <div class="row-fluid">
                <div class="span12">                    
                    <div class="head clearfix">
                        <div class="isw-grid"></div>
                        <h1><?php echo $tablelabel;?></h1>
                        <ul class="buttons">
                            <li><a href="#" class="isw-download"></a></li>                                                        
                            <li><a href="#" class="isw-attachment"></a></li>
                            <li>
                                <a href="#" class="isw-settings"></a>
                                <ul class="dd-list">
                                    <li><a href="#"><span class="isw-plus"></span> New document</a></li>
                                    <li><a href="#"><span class="isw-edit"></span> Edit</a></li>
                                    <li><a href="#"><span class="isw-delete"></span> Delete</a></li>
                                </ul>
                            </li>
                        </ul>                        
                    </div>
                    <div class="block-fluid table-sorting clearfix">
                        <table cellpadding="0" cellspacing="0" width="100%" class="table" id="ttroubleshoots">
                            <thead>
                                <tr>
                                    <th width="25%">Nama</th>
                                    <th width="25%">Tgl Request</th>
                                    <th width="25%">Tipe</th>
                                    <th width="25%">Alamat</th>
                                    <th width="25%">Phone</th>
                                    <th width="25%">Status</th>
                                    <th width="25%">Tgl Troubleshoot</th>
                                    <th width="25%">Cabang</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($objs as $obj){?>
                                <tr>
                                    <td><?php echo $obj->name;?></td>
                                    <td><?php echo $obj->request_date1;?></td>
                                    <td><?php echo $obj->troubleshoottype;?></td>
                                    <td><?php echo $obj->address;?></td>
                                    <td><?php echo $obj->pic_phone . " " . $obj->pic_email;?></td>                                    
                                    <td><?php echo $obj->status;?></td>
                                    <td><?php echo $obj->troubleshoot_date;?></td>
                                    <td><?php echo $obj->branch;?></td>
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
    <script type="text/javascript" src="/js/v2/troubleshoots/index.js"></script>
</body>
</html>
