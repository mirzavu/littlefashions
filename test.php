
<!doctype html>
<html lang="en">  
    <head>
        <title>Cloud Zoom Example: Responsive website</title>
       
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, maximum-scale=1.0">
        <!-- Include jQuery -->
        <script type="text/javascript" src="zoom/jquery.js"></script>
      
        <!-- Various page styles. -->
        <style type="text/css">
           
            body {
                font-family: arial, sans-serif;
                color: #444;
                font-size: 16px;
                padding:0px;
                margin:0px;
            }
            
            p {
                line-height: 20px;
            }
            
            code {
                font-weight: bold;
                color: #f44;;
            }
            a {
                color:#3d8dde;
            }
            
            #wrapper {
                padding:10px;
            }
        </style>
        
        <!-- Include Cloud Zoom JavaScript -->
        <script type="text/javascript" src="zoom/cloudzoom.js"></script>
        
        <!-- Include Thumbelina JavaScript -->
        <script type="text/javascript" src="zoom/thumbelina.js"></script>

        
        <!-- Include Cloud Zoom CSS -->
        <link href="zoom/cloudzoom.css" type="text/css" rel="stylesheet" />
        
        <!-- Include Thumbelina CSS -->
        <link href="zoom/thumbelina.css" type="text/css" rel="stylesheet" />

        
        <script type = "text/javascript">
            CloudZoom.quickStart();
            
            // Initialize the slider.
            $(function(){
                $('#slider1').Thumbelina({
                    $bwdBut:$('#slider1 .left'), 
                    $fwdBut:$('#slider1 .right')
                });
            });

            
        </script>
        
        <style>
            
            /* div that surrounds Cloud Zoom image and content slider. */
            #surround {
                width:50%;
                min-width: 256px;
                max-width: 480px;
            }
            
            /* Image expands to width of surround */
            img.cloudzoom {
                width:100%;
            }
            
            /* CSS for slider - will expand to width of surround */
            #slider1 {
                margin-left:20px;
                margin-right:20px;
                height:119px;
                border-top:1px solid #aaa;
                border-bottom:1px solid #aaa;
                position:relative;
            }
            
        </style>
        <script type="text/javascript">
            
             // The following piece of code can be ignored.
             $(function(){
                 $(window).resize(function() {
                     $('#info').text("Page width: "+$(this).width());
                 });
                 $(window).trigger('resize');
             });
             
            // The following piece of code can be ignored.
            if (window.location.hostname.indexOf("starplugins.") != -1) {
                var _gaq = _gaq || [];
                _gaq.push(['_setAccount', 'UA-254857-7']);
                _gaq.push(['_trackPageview']);
                (function() {
                    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
                    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'https://www') + '.google-analytics.com/ga.js';
                    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
                })();
            }
             
        </script>
    </head>
    <body>
        <div id="wrapper">
<div id="surround">
    
    <img class="cloudzoom" alt ="Cloud Zoom small image" id ="zoom1" src="images/bannerimg2.jpg"
       data-cloudzoom='
           zoomSizeMode:"image",
           autoInside: 550
       '>
 
 
    <div id="slider1">
        <div class="thumbelina-but horiz left">&#706;</div>
        <ul>
            <li><img class='cloudzoom-gallery' src="images/trend1.png" 
                     data-cloudzoom ="useZoom:'.cloudzoom', image:'images/trend1.png' "></li>

            <li><img class='cloudzoom-gallery' src="images/bannerimg2.jpg" 
                     data-cloudzoom ="useZoom:'.cloudzoom', image:'images/bannerimg2.jpg' "></li>
            <li><img class='cloudzoom-gallery' src="images/bannerimg2.jpg" 
                     data-cloudzoom ="useZoom:'.cloudzoom', image:'images/bannerimg2.jpg' "></li>
            <li><img class='cloudzoom-gallery' src="images/bannerimg2.jpg" 
                     data-cloudzoom ="useZoom:'.cloudzoom', image:'images/bannerimg2.jpg' "></li>
            <li><img class='cloudzoom-gallery' src="images/bannerimg2.jpg" 
                     data-cloudzoom ="useZoom:'.cloudzoom', image:'images/bannerimg2.jpg' "></li>
            <li><img class='cloudzoom-gallery' src="images/bannerimg2.jpg" 
                     data-cloudzoom ="useZoom:'.cloudzoom', image:'images/bannerimg2.jpg' "></li>
           

        </ul>
        <div class="thumbelina-but horiz right">&#707;</div>
    </div>
    
</div>
 
        </div>
        
    </body>
</html>

