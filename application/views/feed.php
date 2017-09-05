<html>
<head lang="en">
    <!-- jquery is required for jsreport embedding -->
    <script src="https://code.jquery.com/jquery-latest.min.js"></script>
    <script src="http://database.padinet.com:88/extension/embedding/public/js/embed.js"></script>
</head>
<body>
    <script>
        var jsreport;
        jsreportInit = function () {
            console.log("init jsreport");
            //use jsreport object to render reports or open editor
        };
        
        /*$(function($){
            jsreport = jsreportInit();
            jsreport.render({ conent: "foo", recipe: "phantom-pdf", engine: "jsrender" });
        }(jQuery))*/
        //jsreport will call jsreportInit function from global scope when its initialized
    </script>    
</body>
</html>