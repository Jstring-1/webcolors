<?php @include_once(   "inc/Pre.php" );
  $bgcolor = "";
  if (isset($black) && $black == "yes"){$bgcolor="background:#000;color:#" . key($text) . ";";}
  if (isset($discomode) && $discomode == "righton"){$bgcolor="background: red; 
background: -webkit-linear-gradient(left,red,orange,yellow,green,blue,indigo,violet);  
background: -o-linear-gradient(left,red,orange,yellow,green,blue,indigo,violet); 
background: -moz-linear-gradient(left,red,orange,yellow,green,blue,indigo,violet); 
background: linear-gradient(to right, red,orange,yellow,green,blue,indigo,violet);";}
?>
<html>     
 <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>WebColors</title>
  <link rel="apple-touch-icon"sizes="57x57"href="/icons/apple-icon-57x57.png"><link rel="apple-touch-icon"sizes="60x60"href="/icons/apple-icon-60x60.png"><link rel="apple-touch-icon"sizes="72x72"href="/icons/apple-icon-72x72.png"><link rel="apple-touch-icon"sizes="76x76"href="/icons/apple-icon-76x76.png"><link rel="apple-touch-icon"sizes="114x114"href="/icons/apple-icon-114x114.png"><link rel="apple-touch-icon"sizes="120x120"href="/icons/apple-icon-120x120.png"><link rel="apple-touch-icon"sizes="144x144"href="/icons/apple-icon-144x144.png"><link rel="apple-touch-icon"sizes="152x152"href="/icons/apple-icon-152x152.png"><link rel="apple-touch-icon"sizes="180x180"href="/icons/apple-icon-180x180.png"><link rel="icon"type="image/png"sizes="192x192"href="/icons/android-icon-192x192.png"><link rel="icon"type="image/png"sizes="32x32"href="/icons/favicon-32x32.png"><link rel="icon"type="image/png"sizes="96x96"href="/icons/favicon-96x96.png"><link rel="icon"type="image/png"sizes="16x16"href="/icons/favicon-16x16.png"><link rel="manifest"href="/icons/manifest.json"><meta name="msapplication-TileColor"content="#ffffff"><meta name="msapplication-TileImage"content="/icons/ms-icon-144x144.png"><meta name="theme-color"content="#ffffff">
  <meta name="description" content="unique color generator, rgb to hsl, php convert rgb, color generator, hex code generator">
  <meta name="keywords" content="random color generator, websafe colors, hexcode wiki, web safe color wiki, html color codes, html colors, html color chart, hex color code, web safe colors">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800,300' rel='stylesheet' type='text/css' />
  <link href="css/freestyle-rollerskating.css<?php echo "?id=".rand(1111,9999); ?>" rel="stylesheet" type="text/css" />
 </head>
 <body style=" 
   <?php echo $bgcolor; unset($bgcolor); ?>
  ">
  
  <div id="wrapper">
 
   
   <div id="header">
    <h1><a href="/"><img align="bottom" src="img/wheel-60.png" /> WebColors</a></h1>
    <h3>
     <ul>
      <li><a href="/?x=RandomColorGenerator">Random Color Generator</a>
      <li><a href="/?x=WebSafeColors">Web Safe Colors</a>
      <li><a href="/?x=CrayolaColors">Crayola Colors</a>
      <li><a href="/?x=Wiki">Wiki</a>
      <li><a href="/?x=Resources">Resources</a>
      <li><a href="/?x=About">About</a>
     </ul>
    </h3>
   </div>
   
   <div id="page">
   
    <?php @include_once( "inc/" . $page ); ?>
   
   </div>

     <div id="ad">
       <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script><!--WebColors.info--><ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-8272820157791982" data-ad-slot="5547967074" data-ad-format="auto"></ins><script>(adsbygoogle=window.adsbygoogle||[]).push({});</script>
      </div> 
  
    </div>
  
  <script src="js/donkey-balls.js"></script>
  <script src="js/highlight.pack.min.js"></script>
  <script src="js/clipboard.min.js"></script>
  <script src="js/tooltips.js"></script>

  <!--
   I'd like to give thanks to my wife, who believes that I was cleaning the house while I coded this.
   without her ignorance, none of this bullshit would be possible.
   
   and also to lord satan for your warmth.
   good luck in the overlord champion soccer semi-finals next week.
  -->


<div id="footer">  
    &copy; WebColors &nbsp; | &nbsp; 
   <?php $time = microtime();$time = explode(' ', $time);$time = $time[1] + $time[0];$finish = $time;$total_time = round(($finish - $start), 8);echo $total_time . "s"; ?>
</div>

  </div>
</div>
   </body>
</html>
