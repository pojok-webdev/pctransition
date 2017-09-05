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

    <div class="menu">

        <div class="breadLine">
            <div class="arrow"></div>
            <div class="adminControl active">
                Hi, Aqvatarius
            </div>
        </div>

        <div class="admin">
            <div class="image">
                <img src="img/users/aqvatarius.jpg" class="img-polaroid"/>
            </div>
            <ul class="control">
                <li><span class="icon-comment"></span> <a href="messages.html">Messages</a> <a href="messages.html" class="caption red">12</a></li>
                <li><span class="icon-cog"></span> <a href="forms.html">Settings</a></li>
                <li><span class="icon-share-alt"></span> <a href="login.html">Logout</a></li>
            </ul>
            <div class="info">
                <span>Welcom back! Your last visit: 24.10.2012 in 19:55</span>
            </div>
        </div>

        <ul class="navigation">
            <li>
                <a href="index.html">
                    <span class="isw-grid"></span><span class="text">Dashboard</span>
                </a>
            </li>
        </ul>

        <div class="dr"><span></span></div>

        <div class="widget-fluid">
            <div id="menuDatepicker"></div>
        </div>
        <div class="dr"><span></span></div>
        <div class="widget">
            <div class="input-append">
                <input id="appendedInputButton" style="width: 118px;" type="text"><button class="btn" type="button">Search</button>
            </div>
        </div>
        <div class="dr"><span></span></div>
    </div>

    <div class="content">


        <div class="breadLine">

            <ul class="breadcrumb">
                <li><a href="#">Simple Admin</a> <span class="divider">></span></li>
                <li class="active">Tables</li>
            </ul>

            <ul class="buttons">
                <li>
                    <a href="#" class="link_bcPopupSearch"><span class="icon-search"></span><span class="text">Search</span></a>

                    <div id="bcPopupSearch" class="popup">
                        <div class="head clearfix">
                            <div class="arrow"></div>
                            <span class="isw-zoom"></span>
                            <span class="name">Search</span>
                        </div>
                        <div class="body search">
                            <input type="text" placeholder="Some text for search..." name="search"/>
                        </div>
                        <div class="footer">
                            <button class="btn" type="button">Search</button>
                            <button class="btn btn-danger link_bcPopupSearch" type="button">Close</button>
                        </div>
                    </div>
                </li>
            </ul>

        </div>

        <div class="workplace">


            <div class="row-fluid">

                <div class="span12">
                    <div class="head clearfix">
                        <div class="isw-grid"></div>
                        <h1>Simple Sortable tablet</h1>
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
                        <table cellpadding="0" cellspacing="0" width="100%" class="table" id="tPadi1">
							<thead>
								<tr>
									<th>First name</th>
									<th>Last name</th>
									<th>Position</th>
									<th>Office</th>
									<th>Start date</th>
									<th>Salary</th>
								</tr>
							</thead>

							<tfoot>
								<tr>
									<th>First name</th>
									<th>Last name</th>
									<th>Position</th>
									<th>Office</th>
									<th>Start date</th>
									<th>Salary</th>
								</tr>
							</tfoot>
                        </table>
                    </div>
                </div>

            </div>

            <div class="dr"><span></span></div>

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

            <div class="dr"><span></span></div>

        </div>

    </div>
<script type="text/javascript" src="<?php echo base_url();?>js/padi/tPadi.js"></script>
</body>
</html>
