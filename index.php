<?php @include_once(   "inc/Pre.php" );
  $bgcolor = "";
  if (isset($black) && $black == "yes" && !empty($text)){$bgcolor="background:#000;color:#" . key($text) . ";";}
  elseif (isset($black) && $black == "yes"){$bgcolor="background:#000;color:#ddd;";}
  if (isset($discomode) && $discomode == "righton"){$bgcolor="background: red;
background: -webkit-linear-gradient(left,red,orange,yellow,green,blue,indigo,violet);
background: -o-linear-gradient(left,red,orange,yellow,green,blue,indigo,violet);
background: -moz-linear-gradient(left,red,orange,yellow,green,blue,indigo,violet);
background: linear-gradient(to right, red,orange,yellow,green,blue,indigo,violet);";}
?>
<!doctype html>
<html lang="en">
 <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>WebColors</title>
  <link rel="apple-touch-icon"sizes="57x57"href="/icons/apple-icon-57x57.png"><link rel="apple-touch-icon"sizes="60x60"href="/icons/apple-icon-60x60.png"><link rel="apple-touch-icon"sizes="72x72"href="/icons/apple-icon-72x72.png"><link rel="apple-touch-icon"sizes="76x76"href="/icons/apple-icon-76x76.png"><link rel="apple-touch-icon"sizes="114x114"href="/icons/apple-icon-114x114.png"><link rel="apple-touch-icon"sizes="120x120"href="/icons/apple-icon-120x120.png"><link rel="apple-touch-icon"sizes="144x144"href="/icons/apple-icon-144x144.png"><link rel="apple-touch-icon"sizes="152x152"href="/icons/apple-icon-152x152.png"><link rel="apple-touch-icon"sizes="180x180"href="/icons/apple-icon-180x180.png"><link rel="icon"type="image/png"sizes="192x192"href="/icons/android-icon-192x192.png"><link rel="icon"type="image/png"sizes="32x32"href="/icons/favicon-32x32.png"><link rel="icon"type="image/png"sizes="96x96"href="/icons/favicon-96x96.png"><link rel="icon"type="image/png"sizes="16x16"href="/icons/favicon-16x16.png"><link rel="manifest"href="/icons/manifest.json"><meta name="msapplication-TileColor"content="#ffffff"><meta name="msapplication-TileImage"content="/icons/ms-icon-144x144.png"><meta name="theme-color"content="#111111">
  <meta name="description" content="Random web color generator with HSL info, web-safe and Crayola palettes, and one-click hex copy.">
  <meta name="keywords" content="random color generator, web safe colors, crayola colors, html color codes, hex color code, hsl">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link href="css/freestyle-rollerskating.css<?php echo "?id=".rand(1111,9999); ?>" rel="stylesheet" type="text/css" />
 </head>
 <body style="<?php echo $bgcolor; unset($bgcolor); ?>">

  <div id="wrapper">

   <div id="header">
    <h1><a href="/"><img align="bottom" src="img/wheel-40.png" /> WebColors</a></h1>
   </div>

   <div id="page">
    <?php @include_once( "inc/" . $page ); ?>
   </div>

   <div id="ad">
     <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script><!--webcolors.online--><ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-8272820157791982" data-ad-slot="5547967074" data-ad-format="auto"></ins><script>(adsbygoogle=window.adsbygoogle||[]).push({});</script>
   </div>

   <div id="footer">
    &copy; WebColors &nbsp;|&nbsp;
    <?php $time = microtime();$time = explode(' ', $time);$time = $time[1] + $time[0];$finish = $time;$total_time = round(($finish - $start), 8);echo $total_time . "s"; ?>
   </div>

  </div>

  <div class="wc-modal" id="m-websafe" onclick="if(event.target===this)wcClose()">
   <div class="wc-modal-box">
    <div class="wc-modal-bar"><h3>Web Safe Colors</h3><button type="button" class="wc-x" onclick="wcClose()">&times;</button></div>
    <p class="wc-modal-note">Click any color to copy its hex code.</p>
    <div class="wc-grid"><?php render_palette_grid($websafe_colors); ?></div>
   </div>
  </div>

  <div class="wc-modal" id="m-crayola" onclick="if(event.target===this)wcClose()">
   <div class="wc-modal-box">
    <div class="wc-modal-bar"><h3>Crayola Colors</h3><button type="button" class="wc-x" onclick="wcClose()">&times;</button></div>
    <p class="wc-modal-note">Click any color to copy its hex code.</p>
    <div class="wc-grid"><?php render_palette_grid($crayola_colors); ?></div>
   </div>
  </div>

  <script src="js/donkey-balls.js"></script>
  <script src="js/clipboard.min.js"></script>
  <script src="js/tooltips.js"></script>
  <script>
   function wcModal(n){var m=document.getElementById('m-'+n);if(m){m.classList.add('open');document.documentElement.style.overflow='hidden';}}
   function wcClose(){var m=document.querySelector('.wc-modal.open');if(m){m.classList.remove('open');document.documentElement.style.overflow='';}}
   document.addEventListener('keydown',function(e){if(e.key==='Escape')wcClose();});
   function wcRandomize(){
    var f=document.getElementById('cgen');if(!f)return;
    var ri=function(a,b){return Math.floor(Math.random()*(b-a+1))+a;};
    f.n.value=ri(100,9999);f.sections.value=ri(1,99);f.size.value=ri(8,60);
    var s1=['h','s','l','x','sl'][ri(0,4)];f.querySelector('input[name="sort1"][value="'+s1+'"]').checked=true;
    f.querySelector('input[type="hidden"][name="sort2"]').value=['asc','desc'][ri(0,1)];
    ['o-black','o-square','o-wide','o-spacer','o-disco'].forEach(function(id){var el=document.getElementById(id);if(el)el.checked=Math.random()<0.5;});
    f.querySelector('input[type="hidden"][name="palette"]').value='';
    f.submit();
   }
  </script>

   </body>
</html>
