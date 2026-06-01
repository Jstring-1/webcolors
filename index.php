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
 <body class="mode-dark" style="background:#000;color:#ddd;">

  <div id="wrapper">

   <div id="header">
    <h1 class="logo"><a class="logo-link" href="/"><img class="logo-img" src="img/wheel-40.png" alt="" /> WebColors</a></h1>
   </div>

   <div id="page">

    <div class="cgen" id="cgen">
     <div class="cgen-row">

      <div class="cgen-group">
       <span class="cgen-head">Amount</span>
       <span class="cgen-num" title="How many colors to generate (100-9999)">Dots/Boxes
        <span class="num-wrap"><input class="num-input" type="number" min="100" max="9999" step="50" name="n" title="How many colors to generate (100-9999)"><span class="num-steps"><button type="button" class="num-up" data-step="n:50" title="Increase" aria-label="increase">&#9650;</button><button type="button" class="num-down" data-step="n:-50" title="Decrease" aria-label="decrease">&#9660;</button></span></span>
       </span>
       <span class="cgen-num" title="Size of each swatch in pixels (1-99)">Dot/Box size
        <span class="num-wrap"><input class="num-input" type="number" min="1" max="99" name="size" title="Size of each swatch in pixels (1-99)"><span class="num-steps"><button type="button" class="num-up" data-step="size:1" title="Increase" aria-label="increase">&#9650;</button><button type="button" class="num-down" data-step="size:-1" title="Decrease" aria-label="decrease">&#9660;</button></span></span>
       </span>
       <span class="cgen-num" title="Split the colors into this many hue groups (1-99)">Hue Sections
        <span class="num-wrap"><input class="num-input" type="number" min="1" max="360" name="sections" title="Split the colors into this many hue groups (1-360)"><span class="num-steps"><button type="button" class="num-up" data-step="sections:1" title="Increase" aria-label="increase">&#9650;</button><button type="button" class="num-down" data-step="sections:-1" title="Decrease" aria-label="decrease">&#9660;</button></span></span>
       </span>
      </div>

      <div class="cgen-group">
       <span class="cgen-head">Order by</span>
       <div class="seg">
        <input type="radio" class="tg" id="s1-h" name="sort1" value="h"><label class="tg-btn" for="s1-h" title="Sort each section by hue">Hue</label>
        <input type="radio" class="tg" id="s1-s" name="sort1" value="s"><label class="tg-btn" for="s1-s" title="Sort each section by saturation">Sat</label>
        <input type="radio" class="tg" id="s1-l" name="sort1" value="l"><label class="tg-btn" for="s1-l" title="Sort each section by lightness">Light</label>
        <input type="radio" class="tg" id="s1-x" name="sort1" value="x"><label class="tg-btn" for="s1-x" title="Sort each section by hex value">Hex</label>
        <input type="radio" class="tg" id="s1-sl" name="sort1" value="sl"><label class="tg-btn" for="s1-sl" title="Sort each section by saturation x lightness">Sat&#215;Light</label>
       </div>
       <div class="seg">
        <button type="button" class="tg-btn tg-toggle" id="sortDir" title="Toggle ascending / descending sort">&#8593;</button>
       </div>
      </div>

      <div class="cgen-group">
       <span class="cgen-head">Options</span>
       <div class="seg seg-wrap">
        <button type="button" class="tg-btn" id="bgBtn" title="Toggle the page background between black and white">BG</button>
        <input type="checkbox" class="tg" id="o-square"><label class="tg-btn" for="o-square" title="Use square swatches instead of circles">&#9679;&#8594;&#9632;</label>
        <input type="checkbox" class="tg" id="o-wide"><label class="tg-btn" for="o-wide" title="Stretch the grid so each hue section is its own column">Wide</label>
        <input type="checkbox" class="tg" id="o-spacer"><label class="tg-btn" for="o-spacer" title="Show gaps between hue sections">Spacer</label>
       </div>
      </div>

      <div class="cgen-group">
       <span class="cgen-head">Palettes</span>
       <div class="pal-row">
        <span class="pal-name">Web Safe Colors</span>
        <button type="button" class="pbtn" data-view="websafe" title="Browse all named web-safe colors">View</button>
        <button type="button" class="pbtn" data-pal="websafe" title="Generate using only web-safe colors">Restrict colors</button>
       </div>
       <div class="pal-row">
        <span class="pal-name">Crayola Colors</span>
        <button type="button" class="pbtn" data-view="crayola" title="Browse all Crayola colors">View</button>
        <button type="button" class="pbtn" data-pal="crayola" title="Generate using only Crayola colors">Restrict colors</button>
       </div>
       <button type="button" class="rand-btn" id="randBtn" title="Randomize every setting and colors">&#127922; Randomize</button>
      </div>

     </div>
    </div>

    <div id="palette-tray" class="palette-tray"></div>

    <div id="color-wrappage"></div>

   </div>

  </div>

  <div class="wc-modal" id="m-websafe">
   <div class="wc-modal-box">
    <div class="wc-modal-bar"><h3 class="wc-modal-title">Web Safe Colors</h3><button type="button" class="wc-x" onclick="wcClose()">&times;</button></div>
    <div class="wc-sort">
     <span class="wc-sort-lbl">Sort</span>
     <select class="wc-sort-sel" data-pal="websafe" aria-label="Sort by">
      <option value="name">Name</option>
      <option value="hue">Hue</option>
      <option value="sat">Saturation</option>
      <option value="lit">Lightness</option>
      <option value="hex">Hex</option>
      <option value="sl">Sat&#215;Light</option>
     </select>
     <button type="button" class="wc-sort-dir" data-pal="websafe" title="Ascending / descending">&#8593;</button>
    </div>
    <div class="wc-grid"></div>
   </div>
  </div>

  <div class="wc-modal" id="m-crayola">
   <div class="wc-modal-box">
    <div class="wc-modal-bar"><h3 class="wc-modal-title">Crayola Colors</h3><button type="button" class="wc-x" onclick="wcClose()">&times;</button></div>
    <div class="wc-sort">
     <span class="wc-sort-lbl">Sort</span>
     <select class="wc-sort-sel" data-pal="crayola" aria-label="Sort by">
      <option value="name">Name</option>
      <option value="hue">Hue</option>
      <option value="sat">Saturation</option>
      <option value="lit">Lightness</option>
      <option value="hex">Hex</option>
      <option value="sl">Sat&#215;Light</option>
     </select>
     <button type="button" class="wc-sort-dir" data-pal="crayola" title="Ascending / descending">&#8593;</button>
    </div>
    <div class="wc-grid"></div>
   </div>
  </div>

  <div id="color-pop" class="color-pop">
   <button type="button" class="color-pop-x" aria-label="close">&times;</button>
   <div class="color-pop-sw"><button type="button" class="cp-add" id="cpAdd" title="Add to palette" aria-label="Add to palette">+</button></div>
   <div class="color-pop-rows"></div>
  </div>

  <script src="js/palettes.js"></script>
  <script src="js/app.js"></script>
 </body>
</html>
