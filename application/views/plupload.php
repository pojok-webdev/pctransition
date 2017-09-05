<html>
<head>
	<script type='text/javascript' src='http://teknis/js/aquarius/jquery.js'></script>
	<script type='text/javascript' src='http://teknis/js/aquarius/plugins/plupload/plupload.js'></script>
	<script type='text/javascript' src='http://teknis/js/aquarius/plugins/plupload/plupload.gears.js'></script>


	<script type='text/javascript' src='http://teknis/js/aquarius/plugins/plupload/plupload.silverlight.js'></script>
	<script type='text/javascript' src='http://teknis/js/aquarius/plugins/plupload/plupload.flash.js'></script>
	<script type='text/javascript' src='http://teknis/js/aquarius/plugins/plupload/plupload.browserplus.js'></script>
	<script type='text/javascript' src='http://teknis/js/aquarius/plugins/plupload/plupload.html4.js'></script>
	<script type='text/javascript' src='http://teknis/js/aquarius/plugins/plupload/plupload.html5.js'></script>
	<script type='text/javascript' src='http://teknis/js/aquarius/plugins/plupload/jquery.plupload.queue/jquery.plupload.queue.js'></script>

	<script type='text/javascript'>
$(document).ready(function(){
         if($("#uploader_v5").length > 0){
            $("#uploader_v5").pluploadQueue({		
                    runtimes : 'html5',
                    url : 'tests/pluploadhandler.php',
                    max_file_size : '1mb',
                    chunk_size : '1mb',
                    unique_names : true,
                    dragdrop : true,

                    resize : {width : 320, height : 240, quality : 100},

                    filters : [
                            {title : "Image files", extensions : "jpg,gif,png"},
                            {title : "Zip files", extensions : "zip"}
                    ]
            });
         }
	
         if($("#uploader_v4").length > 0){
            $("#uploader_v4").pluploadQueue({		
                    runtimes : 'html4',
                    url : 'tests/pluploadhandler.php',
                    unique_names : true,
                    filters : [
                            {title : "Image files", extensions : "jpg,gif,png"},
                            {title : "Zip files", extensions : "zip"}
                    ]
            });
         }                  
	});
</script>
</head>
<body>
            <div class="row-fluid">
                
                <div class="span12">                    
                    <div class="head clearfix">
                        <div class="isw-download"></div>
                        <h1>HTML5 File uploader</h1>      
                    </div>
                    <div class="block-fluid">
                        <div id="uploader_v5"><center>Browser don't support a HTML5</center></div>
                    </div>
                </div>                                                                  
                
            </div>            


            
            <div class="dr"><span></span></div>                       
            
            <div class="row-fluid">
                
                <div class="span12">                    
                    <div class="head clearfix">
                        <div class="isw-download"></div>
                        <h1>HTML4 File uploader</h1>      
                    </div>
                    <div class="block-fluid">
                        <div id="uploader_v4"></div>
                    </div>
                </div>                                                                  
                
            </div>            
            
            <div class="dr"><span></span></div>           
</body>
</html>
