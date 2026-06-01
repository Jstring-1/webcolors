<!doctype html>
<html lang="en">
 <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>WebColors</title>
  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-KDCHCXLSS8"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'G-KDCHCXLSS8');
  </script>
  <link rel="apple-touch-icon"sizes="57x57"href="/icons/apple-icon-57x57.png"><link rel="apple-touch-icon"sizes="60x60"href="/icons/apple-icon-60x60.png"><link rel="apple-touch-icon"sizes="72x72"href="/icons/apple-icon-72x72.png"><link rel="apple-touch-icon"sizes="76x76"href="/icons/apple-icon-76x76.png"><link rel="apple-touch-icon"sizes="114x114"href="/icons/apple-icon-114x114.png"><link rel="apple-touch-icon"sizes="120x120"href="/icons/apple-icon-120x120.png"><link rel="apple-touch-icon"sizes="144x144"href="/icons/apple-icon-144x144.png"><link rel="apple-touch-icon"sizes="152x152"href="/icons/apple-icon-152x152.png"><link rel="apple-touch-icon"sizes="180x180"href="/icons/apple-icon-180x180.png"><link rel="icon"type="image/png"sizes="192x192"href="/icons/android-icon-192x192.png"><link rel="icon"type="image/png"sizes="32x32"href="/icons/favicon-32x32.png"><link rel="icon"type="image/png"sizes="96x96"href="/icons/favicon-96x96.png"><link rel="icon"type="image/png"sizes="16x16"href="/icons/favicon-16x16.png"><link rel="manifest"href="/icons/manifest.json"><meta name="msapplication-TileColor"content="#111111"><meta name="msapplication-TileImage"content="/icons/ms-icon-144x144.png"><meta name="theme-color"content="#111111">
  <meta name="description" content="Random web color generator with HSL info, web-safe and Crayola palettes, and one-click hex copy.">
  <meta name="keywords" content="random color generator, web safe colors, crayola colors, html color codes, hex color code, hsl">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@500;600;700&family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link href="css/freestyle-rollerskating.css" rel="stylesheet" type="text/css" />
 </head>
 <body style="background:#000;color:#ddd;">

  <div id="wrapper">

   <div id="header">
    <h1><a href="/"><img align="bottom" src="img/wheel-40.png" /> WebColors</a></h1>
   </div>

   <div id="page">

    <div class="cgen" id="cgen">
     <div class="cgen-row">

      <div class="cgen-group">
       <span class="cgen-head">Amount</span>
       <span class="cgen-num">Dots/Boxes
        <span class="num-wrap"><input type="number" min="100" max="9999" step="50" name="n"><span class="num-steps"><button type="button" class="num-up" data-step="n:50" aria-label="increase">&#9650;</button><button type="button" class="num-down" data-step="n:-50" aria-label="decrease">&#9660;</button></span></span>
       </span>
       <span class="cgen-num">Dot/Box size
        <span class="num-wrap"><input type="number" min="1" max="99" name="size"><span class="num-steps"><button type="button" class="num-up" data-step="size:1" aria-label="increase">&#9650;</button><button type="button" class="num-down" data-step="size:-1" aria-label="decrease">&#9660;</button></span></span>
       </span>
       <span class="cgen-num">Hue Sections
        <span class="num-wrap"><input type="number" min="1" max="99" name="sections"><span class="num-steps"><button type="button" class="num-up" data-step="sections:1" aria-label="increase">&#9650;</button><button type="button" class="num-down" data-step="sections:-1" aria-label="decrease">&#9660;</button></span></span>
       </span>
      </div>

      <div class="cgen-group">
       <span class="cgen-head">Order by</span>
       <div class="seg">
        <input type="radio" class="tg" id="s1-h" name="sort1" value="h"><label class="tg-btn" for="s1-h">Hue</label>
        <input type="radio" class="tg" id="s1-s" name="sort1" value="s"><label class="tg-btn" for="s1-s">Sat</label>
        <input type="radio" class="tg" id="s1-l" name="sort1" value="l"><label class="tg-btn" for="s1-l">Light</label>
        <input type="radio" class="tg" id="s1-x" name="sort1" value="x"><label class="tg-btn" for="s1-x">Hex</label>
        <input type="radio" class="tg" id="s1-sl" name="sort1" value="sl"><label class="tg-btn" for="s1-sl">Sat&#215;Light</label>
       </div>
       <div class="seg">
        <button type="button" class="tg-btn tg-toggle" id="sortDir">Ascending &#8593;</button>
       </div>
      </div>

      <div class="cgen-group">
       <span class="cgen-head">Options</span>
       <div class="seg seg-wrap">
        <input type="checkbox" class="tg" id="o-black"><label class="tg-btn" for="o-black">Black BG</label>
        <input type="checkbox" class="tg" id="o-square"><label class="tg-btn" for="o-square">Square</label>
        <input type="checkbox" class="tg" id="o-wide"><label class="tg-btn" for="o-wide">Wide</label>
        <input type="checkbox" class="tg" id="o-spacer"><label class="tg-btn" for="o-spacer">No Spacer</label>
        <input type="checkbox" class="tg" id="o-disco"><label class="tg-btn" for="o-disco">Disco</label>
       </div>
      </div>

      <div class="cgen-group">
       <span class="cgen-head">Palettes</span>
       <div class="pal-row">
        <span class="pal-name">Web Safe Colors</span>
        <button type="button" class="pbtn" data-view="websafe">View</button>
        <button type="button" class="pbtn" data-pal="websafe">Restrict colors</button>
       </div>
       <div class="pal-row">
        <span class="pal-name">Crayola Colors</span>
        <button type="button" class="pbtn" data-view="crayola">View</button>
        <button type="button" class="pbtn" data-pal="crayola">Restrict colors</button>
       </div>
      </div>

      <div class="cgen-group cgen-meta">
       <button type="button" class="rand-btn" id="randBtn">&#127922; Randomize</button>
      </div>

     </div>
    </div>

    <div id="color-wrappage"></div>

   </div>

   <div id="ad">
     <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script><!--webcolors.online--><ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-8272820157791982" data-ad-slot="5547967074" data-ad-format="auto"></ins><script>(adsbygoogle=window.adsbygoogle||[]).push({});</script>
   </div>

   <div id="footer">
    &copy; WebColors
   </div>

  </div>

  <div class="wc-modal" id="m-websafe">
   <div class="wc-modal-box">
    <div class="wc-modal-bar"><h3>Web Safe Colors</h3><button type="button" class="wc-x" onclick="wcClose()">&times;</button></div>
    <p class="wc-modal-note">Click any color to copy its hex code.</p>
    <div class="wc-grid"></div>
   </div>
  </div>

  <div class="wc-modal" id="m-crayola">
   <div class="wc-modal-box">
    <div class="wc-modal-bar"><h3>Crayola Colors</h3><button type="button" class="wc-x" onclick="wcClose()">&times;</button></div>
    <p class="wc-modal-note">Click any color to copy its hex code.</p>
    <div class="wc-grid"></div>
   </div>
  </div>

  <script src="js/palettes.js"></script>
  <script src="js/app.js"></script>
 </body>
</html>
