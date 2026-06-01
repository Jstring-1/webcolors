   <form name="colors" method="post" action="/" class="cgen" id="cgen">
    <input type="hidden" name="palette" value="<?php echo htmlspecialchars($palette, ENT_QUOTES); ?>">

    <div class="cgen-row">

     <div class="cgen-group">
      <span class="cgen-head">Amount</span>
      <label class="cgen-num">Dots/Boxes <input type="number" min="100" max="9999" name="n" value="<?php echo $n; ?>" onchange="this.form.submit()"></label>
      <label class="cgen-num">Dot/Box size <input type="number" min="1" max="99" name="size" value="<?php echo $size; ?>" onchange="this.form.submit()"></label>
      <label class="cgen-num">Hue Sections <input type="number" min="1" max="99" name="sections" value="<?php echo $sections; ?>" onchange="this.form.submit()"></label>
     </div>

     <div class="cgen-group">
      <span class="cgen-head">Order by</span>
      <div class="seg">
<?php
       $sorts = array("h"=>"Hue","s"=>"Sat","l"=>"Light","x"=>"Hex","sl"=>"Sat\xC3\x97Light");
       foreach ($sorts as $v => $lbl) {
        $id = "s1-$v";
        echo '<input type="radio" class="tg" id="'.$id.'" name="sort1" value="'.$v.'" onchange="this.form.submit()"'.($sort1==$v?' checked':'').'>'
            .'<label class="tg-btn" for="'.$id.'">'.$lbl.'</label>';
       }
?>
      </div>
      <div class="seg">
       <input type="hidden" name="sort2" value="<?php echo $sort2; ?>">
       <button type="submit" name="sort2" value="<?php echo $sort2=="asc" ? "desc" : "asc"; ?>" class="tg-btn tg-toggle"><?php echo $sort2=="asc" ? "Ascending &#8593;" : "Descending &#8595;"; ?></button>
      </div>
     </div>

     <div class="cgen-group">
      <span class="cgen-head">Options</span>
      <div class="seg seg-wrap">
       <input type="hidden" name="black" value="no">
       <input type="checkbox" class="tg" id="o-black" name="black" value="yes" onchange="this.form.submit()"<?php echo $black=="yes"?" checked":""; ?>>
       <label class="tg-btn" for="o-black">Black BG</label>
       <input type="checkbox" class="tg" id="o-square" name="shape" value="square" onchange="this.form.submit()"<?php echo $shape=="square"?" checked":""; ?>>
       <label class="tg-btn" for="o-square">Square</label>
       <input type="checkbox" class="tg" id="o-wide" name="serious" value="totally" onchange="this.form.submit()"<?php echo $serious=="totally"?" checked":""; ?>>
       <label class="tg-btn" for="o-wide">Wide</label>
       <input type="checkbox" class="tg" id="o-spacer" name="sectionspacer" value="no" onchange="this.form.submit()"<?php echo $sectionspacer=="no"?" checked":""; ?>>
       <label class="tg-btn" for="o-spacer">No Spacer</label>
       <input type="checkbox" class="tg" id="o-disco" name="discomode" value="righton" onchange="this.form.submit()"<?php echo $discomode=="righton"?" checked":""; ?>>
       <label class="tg-btn" for="o-disco">Disco</label>
      </div>
     </div>

     <div class="cgen-group">
      <span class="cgen-head">Palettes</span>
      <div class="pal-row">
       <span class="pal-name">Web Safe Colors</span>
       <button type="button" class="pbtn" onclick="wcModal('websafe')">View</button>
       <button type="submit" name="palette" value="<?php echo $palette=="websafe"?"":"websafe"; ?>" class="pbtn<?php echo $palette=="websafe"?" pbtn-on":""; ?>"><?php echo $palette=="websafe"?"Using \xE2\x9C\x93":"Restrict colors"; ?></button>
      </div>
      <div class="pal-row">
       <span class="pal-name">Crayola Colors</span>
       <button type="button" class="pbtn" onclick="wcModal('crayola')">View</button>
       <button type="submit" name="palette" value="<?php echo $palette=="crayola"?"":"crayola"; ?>" class="pbtn<?php echo $palette=="crayola"?" pbtn-on":""; ?>"><?php echo $palette=="crayola"?"Using \xE2\x9C\x93":"Restrict colors"; ?></button>
      </div>
     </div>

     <div class="cgen-group cgen-meta">
      <button type="button" class="rand-btn" onclick="wcRandomize()">&#127922; Randomize</button>
     </div>

    </div>
   </form>

   <div id="color-wrappage" style="width:<?php echo ( $serious == "totally" ) ? ($n / max(1,$sections)) * ($size * 1.1) . "px" : "98%"; ?>;">
<?php
// Sort the array by hue initially, calculate the section size, and chunk into sections
$colors = sortmulti( $colors, 'h', 'desc' );
$num = max( 1, ceil( count( $colors ) / $sections ) );
$colors = array_chunk( $colors, $num, true );
$shown = count( $colors );

for ( $i = 0; $i < $shown; $i++ ) {
 $arr = sortmulti( $colors[$i], $sort1, $sort2 );
 foreach ( $arr as $key => $val ) {
  $hue = round( 360 * $colors[$i][$key]['h'] ) . "&deg;";
  $saturation = round( 100 * $colors[$i][$key]['s'] ); if ( $saturation > 100 ) { $saturation = 100; } $saturation .= "%";
  $lightness = round( 100 * $colors[$i][$key]['l'] ) . "%";
  $radius = ( $shape != "square" ) ? "border-radius:50%;" : "";
  echo '<div class="swatch copy-target cursor-pointer" data-clipboard-text="#' . $colors[$i][$key]['x']
     . '" title="HEX: #' . $colors[$i][$key]['x'] . ', HSL: (' . $hue . ', ' . $saturation . ', ' . $lightness . ')"'
     . ' style="background:#' . $colors[$i][$key]['x'] . ';width:' . $size . 'px;height:' . $size . 'px;' . $radius . '"></div>';
 }
 echo '<div class="spacer" style="height:' . ( $sectionspacer != "no" ? "10px" : "0" ) . ';">&nbsp;</div>';
}
unset( $hue, $saturation, $lightness );
?>
   </div>
