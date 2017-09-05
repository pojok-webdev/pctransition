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
            <li class="openable">
                <a href="#">
                    <span class="isw-list"></span><span class="text">UI elements</span>
                </a>
                <ul>
                    <li>
                        <a href="ui.html">
                            <span class="icon-th"></span><span class="text">UI Elements</span>
                        </a>
                    </li>
                    <li>
                        <a href="widgets.html">
                            <span class="icon-th-large"></span><span class="text">Widgets</span>
                        </a>
                    </li>
                    <li>
                        <a href="buttons.html">
                            <span class="icon-chevron-right"></span><span class="text">Buttons</span>
                        </a>
                    </li>
                    <li>
                        <a href="icons.html">
                            <span class="icon-fire"></span><span class="text">Icons</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="forms.html">
                    <span class="isw-archive"></span><span class="text">Forms stuff</span>
                </a>
            </li>
            <li class="openable">
                <a href="#">
                    <span class="isw-chat"></span><span class="text">Messages</span>
                </a>
                <ul>
                    <li>
                        <a href="messages.html">
                            <span class="icon-comment"></span><span class="text">Messages widgets</span></a>

                            <a href="#" class="caption yellow link_navPopMessages">5</a>

                            <div id="navPopMessages" class="popup" style="display: none;">
                                <div class="head clearfix">
                                    <div class="arrow"></div>
                                    <span class="isw-chats"></span>
                                    <span class="name">Personal messages</span>
                                </div>
                                <div class="body messages">

                                    <div class="item clearfix">
                                        <div class="image"><a href="#"><img src="img/users/aqvatarius.jpg" class="img-polaroid"/></a></div>
                                        <div class="info">
                                            <a href="#" class="name">Aqvatarius</a>
                                            <p>Lorem ipsum dolor. In id adipiscing diam. Sed lobortis dui ut odio tempor blandit. Suspendisse scelerisque mi nec nunc gravida quis mollis lacus dignissim.</p>
                                            <span>19 feb 2012 12:45</span>
                                        </div>
                                    </div>
                                    <div class="item clearfix">
                                        <div class="image"><a href="#"><img src="img/users/olga.jpg" class="img-polaroid"/></a></div>
                                        <div class="info">
                                            <a href="#" class="name">Olga</a>
                                            <p>Cras nec risus dolor, ut tristique neque. Donec mauris sapien, pellentesque at porta id, varius eu tellus.</p>
                                            <span>18 feb 2012 12:45</span>
                                        </div>
                                    </div>
                                    <div class="item clearfix">
                                        <div class="image"><a href="#"><img src="img/users/dmitry.jpg" class="img-polaroid"/></a></div>
                                        <div class="info">
                                            <a href="#" class="name">Dmitry</a>
                                            <p>In id adipiscing diam. Sed lobortis dui ut odio tempor blandit.</p>
                                            <span>17 feb 2012 12:45</span>
                                        </div>
                                    </div>
                                    <div class="item clearfix">
                                        <div class="image"><a href="#"><img src="img/users/helen.jpg" class="img-polaroid"/></a></div>
                                        <div class="info">
                                            <a href="#" class="name">Helen</a>
                                            <p>Sed lobortis dui ut odio tempor blandit. Suspendisse scelerisque mi nec nunc gravida quis mollis lacus dignissim. Donec mauris sapien, pellentesque at porta id, varius eu tellus.</p>
                                            <span>15 feb 2012 12:45</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <button class="btn link_navPopMessages" type="button">Close</button>
                                </div>
                            </div>
                    </li>
                </ul>
            </li>
            <li>
                <a href="statistic.html">
                    <span class="isw-graph"></span><span class="text">Statistics</span>
                </a>
            </li>
            <li>
                <a href="tables.html">
                    <span class="isw-text_document"></span><span class="text">Tables</span>
                </a>
            </li>
            <li class="openable">
                <a href="#">
                    <span class="isw-documents"></span><span class="text">Sample pages</span>
                </a>
                <ul>
                    <li>
                        <a href="user.html">
                            <span class="icon-user"></span><span class="text">User profile</span>
                        </a>
                    </li>
                    <li>
                        <a href="users.html">
                            <span class="icon-list"></span><span class="text">Users</span>
                        </a>
                    </li>
                    <li>
                        <a href="stream.html">
                            <span class="icon-refresh"></span><span class="text">Stream activity</span>
                        </a>
                    </li>
                    <li>
                        <a href="mail.html">
                            <span class="icon-envelope"></span><span class="text">Mailbox</span>
                        </a>
                    </li>
                    <li>
                        <a href="edit.html">
                            <span class="icon-pencil"></span><span class="text">User edit</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="openable active">
                <a href="#">
                    <span class="isw-zoom"></span><span class="text">Other</span>
                </a>
                <ul>
                    <li>
                        <a href="gallery.html">
                            <span class="icon-picture"></span><span class="text">Gallery</span>
                        </a>
                    </li>
                    <li class="active">
                        <a href="typography.html">
                            <span class="icon-pencil"></span><span class="text">Typography</span>
                        </a>
                    </li>
                    <li>
                        <a href="files.html">
                            <span class="icon-upload"></span><span class="text">File handling</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="openable">
                <a href="#">
                    <span class="isw-cancel"></span><span class="text">Error pages</span>
                </a>
                <ul>
                    <li><a href="403.html"><span class="icon-warning-sign"></span><span class="text">403 Forbidden</span></a></li>
                    <li><a href="404.html"><span class="icon-warning-sign"></span><span class="text">404 Not Found</span></a></li>
                    <li><a href="500.html"><span class="icon-warning-sign"></span><span class="text">500 Internal Server Error</span></a></li>
                    <li><a href="503.html"><span class="icon-warning-sign"></span><span class="text">503 Service Unavailable</span></a></li>
                    <li><a href="504.html"><span class="icon-warning-sign"></span><span class="text">504 Gateway Timeout</span></a></li>
                </ul>
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
        <div class="widget-fluid">
            <div class="wBlock clearfix">
                <div class="dSpace">
                    <h3>Last visits</h3>
                    <span class="number">6,302</span>
                    <span>5,774 <b>unique</b></span>
                    <span>3,512 <b>returning</b></span>
                </div>
                <div class="rSpace">
                    <h3>Today</h3>
                    <span class="mChartBar" sparkType="bar" sparkBarColor="white"><!--240,234,150,290,310,240,210,400,320,198,250,222,111,240,221,340,250,190--></span>
                    <span>&nbsp;</span>
                    <span>65% <b>New</b></span>
                    <span>35% <b>Returning</b></span>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="breadLine">
            <ul class="breadcrumb">
                <li><a href="#">Simple Admin</a> <span class="divider">></span></li>
                <li class="active">Typography</li>
            </ul>
        </div>
        <div class="workplace">
            <div class="row-fluid">
                <div class="span12">
                    <div class="head clearfix">
                        <h1>PadiApp Doc</h1>
                    </div>
                    <div class="block">

                        <h1>Menambahkan Prospek Baru</h1>
                        <p>Prospek dibuat oleh <strong>Sales</strong>. Yaitu daftar calon pelanggan yang diharapkan dapat menjadi pelanggan PT Padi Internet.<em>Nullam id dolor id nibh</em> ultricies vehicula.</p>
                        <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec ullamcorper nulla non metus auctor fringilla. <span class="label label-important">Duis mollis</span>, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Donec ullamcorper nulla non metus auctor fringilla.</p>
                        <p>Maecenas sed diam eget risus varius <strong>blandit sit amet</strong> non magna. <em>Donec id elit non mi porta</em> gravida at eget metus. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</p>

                        <h4>Lead body copy</h4>
                        <p class="lead">Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est non commodo luctus.</p>

                        <h4>Emphasis</h4>
                        <p>Some default text and <small>This line of text is meant to be treated as fine print.</small></p>

                        <h4>Emphasis classes</h4>
                        <p class="muted">Fusce dapibus, tellus ac cursus commodo, tortor mauris nibh.</p>
                        <p class="text-warning">Etiam porta sem malesuada magna mollis euismod.</p>
                        <p class="text-error">Donec ullamcorper nulla non metus auctor fringilla.</p>
                        <p class="text-info">Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis.</p>
                        <p class="text-success">Duis mollis, est non commodo luctus, nisi erat porttitor ligula.</p>
<p>Nullam quis <span class="label">Default</span> risus eget <span class="label label-success">Success</span> urna mollis ornare <span class="label label-warning">Warning</span> vel eu leo. Cum sociis natoque penatibus <span class="label label-important">Important</span> et magnis dis parturient montes, nascetur <span class="label label-info">Info</span> ridiculus mus. Nullam id dolor id nibh ultricies <span class="label label-inverse">Inverse</span> vehicula.</p>
                        <p>Cum sociis <span class="badge">1</span> natoque penatibus et magnis <span class="badge badge-success">2</span> dis parturient montes, <span class="badge badge-warning">4</span> nascetur ridiculus mus. Donec ullamcorper <span class="badge badge-important">6</span> nulla non metus auctor fringilla. Duis mollis, est non <span class="badge badge-info">8</span> commodo luctus, nisi erat porttitor ligula, eget lacinia odio <span class="badge badge-inverse">10</span> sem nec elit. Donec ullamcorper nulla non metus auctor fringilla.</p>


                        <div class="well">
                            Default well... Maecenas sed diam eget risus varius blandit sit amet non magna. Donec id elit non mi porta gravida at eget metus. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.
                        </div>
                        <div class="well well-large">
                            Large well... Maecenas sed diam eget risus varius blandit sit amet non magna. Donec id elit non mi porta gravida at eget metus. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.
                        </div>
                        <div class="well well-small">
                            Small well... Maecenas sed diam eget risus varius blandit sit amet non magna. Donec id elit non mi porta gravida at eget metus. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.
                        </div>


                        <h4>Lists</h4>
                        <ul>
                            <li>Fusce dapibus, tellus ac cursus commodo, tortor mauris nibh.</li>
                            <li>Etiam porta sem malesuada magna mollis euismod.</li>
                            <li>Donec ullamcorper nulla non metus auctor fringilla.</li>
                            <li>Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis.</li>
                            <li>Duis mollis, est non commodo luctus, nisi erat porttitor ligula.</li>
                        </ul>

                        <h4>Description</h4>
                        <dl>
                            <dt>Description lists</dt>
                            <dd>A description list is perfect for defining terms.</dd>
                            <dt>Euismod</dt>
                            <dd>Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit.</dd>
                            <dd>Donec id elit non mi porta gravida at eget metus.</dd>
                            <dt>Malesuada porta</dt>
                            <dd>Etiam porta sem malesuada magna mollis euismod.</dd>
                        </dl>

                    </div>
                </div>
            </div>

            <div class="row-fluid">
                <div class="span6">
                    <div class="head clearfix">
                        <div class="isw-mail"></div>
                        <h1>Addresses</h1>
                    </div>
                    <div class="block">

                        <address>
                            <strong>Twitter, Inc.</strong><br>
                            795 Folsom Ave, Suite 600<br>
                            San Francisco, CA 94107<br>
                            <abbr title="Phone">P:</abbr> (123) 456-7890
                        </address>

                        <address>
                            <strong>Full Name</strong><br>
                            <a href="mailto:#">first.last@gmail.com</a>
                        </address>

                    </div>
                </div>

                <div class="span6">
                    <div class="head clearfix">
                        <div class="isw-bookmark"></div>
                        <h1>Blockquotes</h1>
                    </div>
                    <div class="block">
                        <h4>Default blockquote</h4>
                        <blockquote>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                        </blockquote>

                        <h4>Blockquote options</h4>
                        <blockquote>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                            <small>Someone famous <cite title="Source Title">Source Title</cite></small>
                        </blockquote>

                    </div>
                </div>

            </div>



        </div>

    </div>

</body>
</html>
