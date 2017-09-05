<?php 
$data = array(
'csspath' => $csspath,
'jspath' => $jspath,
'imagepath' => $imagepath,
);
?><!DOCTYPE html>
<html lang="en">
<?php $this->load->view('adm/head');?>
<body>
    
    <div class="header">
        <a class="logo" href="index.html"><img src="<?php echo $imagepath;?>logo.png" alt="Aquarius -  responsive admin panel" title="Aquarius -  responsive admin panel"/></a>
        <ul class="header_menu">
            <li class="list_icon"><a href="#">&nbsp;</a></li>
        </ul>    
    </div>
    
    <?php $this->load->view('adm/menu',$data);?>
    <div class="content">
        
        
        <div class="breadLine">
            
            <ul class="breadcrumb">
                <li><a href="#">Simple Admin</a> <span class="divider">></span></li>                
                <li class="active">Tables</li>
            </ul>
			<?php $this->load->view('adm/buttons');?>
        </div>
        
        <div class="workplace">
            <!-- to use -->
            <div class="row-fluid">
                
                <div class="span12">                    
                    <div class="head clearfix">
                        <div class="isw-grid"></div>
                        <h1>Sortable table</h1>                               
                    </div>
                    <div class="block-fluid table-sorting clearfix">
                        <table cellpadding="0" cellspacing="0" width="100%" class="table" id="tSortable">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" name="checkall"/></th>
                                    <th width="25%">ID</th>
                                    <th width="25%">Name</th>
                                    <th width="25%">E-mail</th>
                                    <th width="25%">Phone</th>                                    
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="checkbox" name="checkbox"/></td>
                                    <td>101</td>
                                    <td>Dmitry</td>
                                    <td>dmitry@domain.com</td>
                                    <td>+98(765)432-10-98</td>                                    
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="checkbox"/></td>
                                    <td>102</td>
                                    <td>Alex</td>
                                    <td>alex@domain.com</td>
                                    <td>+98(765)432-10-99</td>                                    
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="checkbox"/></td>
                                    <td>103</td>
                                    <td>John</td>
                                    <td>john@domain.com</td>
                                    <td>+98(765)432-10-97</td>                                    
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="checkbox"/></td>
                                    <td>104</td>
                                    <td>Angelina</td>
                                    <td>angelina@domain.com</td>
                                    <td>+98(765)432-10-90</td>                                    
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="checkbox"/></td>
                                    <td>105</td>
                                    <td>Tom</td>
                                    <td>tom@domain.com</td>
                                    <td>+98(765)432-10-92</td>                                    
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="checkbox"/></td>
                                    <td>106</td>
                                    <td>Helen</td>
                                    <td>helen@domain.com</td>
                                    <td>+98(765)432-11-33</td>                                    
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="checkbox"/></td>
                                    <td>107</td>
                                    <td>Aqvatarius</td>
                                    <td>aqvatarius@domain.com</td>
                                    <td>+98(765)432-15-66</td>                                    
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="checkbox"/></td>
                                    <td>108</td>
                                    <td>Olga</td>
                                    <td>olga@domain.com</td>
                                    <td>+98(765)432-11-97</td>                                    
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="checkbox"/></td>
                                    <td>109</td>
                                    <td>Homer</td>
                                    <td>homer@domain.com</td>
                                    <td>+98(765)432-11-90</td>                                    
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="checkbox"/></td>
                                    <td>110</td>
                                    <td>Tifany</td>
                                    <td>tifany@domain.com</td>
                                    <td>+98(765)432-11-92</td>                                    
                                </tr>                                
                            </tbody>
                        </table>
                    </div>
                </div>                                
                
            </div>            
            <!-- to use -->   
            <div class="dr"><span></span></div>            
            
        </div>
        
    </div>   
    
</body>
</html>
