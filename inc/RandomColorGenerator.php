   <h2>Unique Random Web Color Generator</h2>
   <div id="form" style="background:#<?php echo key($bg1); ?>;">
    <form name="colors" method="get" action="/WebColors">
     <div id="form-section">
      <div id="form-inner">
       <input type="hidden" name="x" value="<?php echo $_GET['x'];?>">
       <b>Number of Colors</b> (100 - 9,999)<br />
       <input type="text" maxlength="4" value="<?php echo $n; ?>" name="n"><br />
       <b>Hue Sections</b> (1 - 99)<br />
       <input type="text" maxlength="2" value="<?php echo $sections; ?>" name="sections"><br />
       <b>Size of Colors</b> (1px - 99px)<br />
       <input class="putter" maxlength="2" type="text" value="<?php echo $size; ?>" name="size">
      </div>
      <h4>
       Try these combos:<br />
       <a href="?x=rcg&n=3700&sections=100&size=30&sort1=l&sort2=desc&black=yes&shape=square&sectionspacer=no">Combo 1</a> - 
       <a href="?x=rcg&n=1824&sections=12&size=60&sort1=sl&sort2=asc&shape=square">Combo 2</a> - 
       <a href="?x=rcg&n=4950&sections=6&size=20&sort1=s&sort2=asc">Combo 3</a>
      </h4>
     </div>
     <div id="form-section">
      <div id="form-inner">
       <b>Order Sections By</b><br />
       <input type="radio" name="sort1" <?php echo ($sort1 == "h") ? "checked" : ""; ?> value="h" /> Hue (HSL)<br />
       <input type="radio" name="sort1" <?php echo ($sort1 == "s") ? "checked" : ""; ?> value="s" /> Saturation (HSL)<br />
       <input type="radio" name="sort1" <?php echo ($sort1 == "l") ? "checked" : ""; ?> value="l" /> Lightness (HSL, default)<br />
       <input type="radio" name="sort1" <?php echo ($sort1 == "x") ? "checked" : ""; ?> value="x" /> Hex Code<br />
       <input type="radio" name="sort1" <?php echo ($sort1 == "sl") ? "checked" : ""; ?> value="sl" /> Saturation * Lightness (HSL)<br /><br />
       <input type="radio" name="sort2" <?php echo ($sort2 == "desc") ? "checked" : ""; ?> value="desc" /> Descending<br />
       <input type="radio" name="sort2" <?php echo ($sort2 == "asc") ? "checked" : ""; ?> value="asc" /> Ascending (default)
      </div>
      <h4>
       &nbsp;<br />
       <b style="color:#c00;"><?php echo $total; ?></b> Colors Generated
     </div>
     <div id="form-section">
      <div id="form-inner">
       <b>Other Options</b><br />
       <input type="checkbox" name="black" <?php echo ( $_GET["black"] == "yes" ) ? "checked" : "";?> value="yes"> Black Background<br />
       <input type="checkbox" name="shape" <?php echo ( $_GET["shape"] == "square" ) ? "checked" : "";?> value="square"> Square Colors<br />
       <input type="checkbox" name="serious" <?php echo ( $_GET["serious"] == "totally" ) ? "checked" : "";?> value="totally"> Wide Mode<br />
       <input type="checkbox" name="sectionspacer" <?php echo ( $_GET["sectionspacer"] == "no" ) ? "checked" : "";?> value="no"> Remove Section Spacer<br />
       <input type="checkbox" name="discomode" <?php echo ( $_GET["discomode"] == "righton" ) ? "checked" : "";?> value="righton"> Disco Mode<br /><br />
       <input type="submit" value="Boogie" class="button"><br /><br />
      </div>
      <h4>
       HOVER for color info<br />
       CLICK to copy hex code to clipboard
      </h4>
     </div>
     <div id="clear-both"></div>
    </form>
   </div>
   <div id="color-wrappage" style="width:<?php echo ( $serious == "totally" ) ? ($n / $sections) * ($size * 1.1) : "98%"; ?>;">
<?php
// Sort the array by hue initially, calculate the section size, and chunk into sections
$colors = sortmulti( $colors,'h','desc' );
$num = ceil( count( $colors ) / $sections );
$colors = array_chunk( $colors, $num, true );

// DISPLAY CODE & HSL Calculations from decimals, sort by given data, cycle through the new array and display the colors
for ( $i = 0; $i < $sections; $i++ ) {
 $arr = sortmulti( $colors[$i], $sort1, $sort2 );
 foreach ( $arr as $key => $val ) {
  $hue = round( 360 * $colors[$i][$key]['h'] ) . "&deg;";
  $saturation = round( 100 * $colors[$i][$key]['s'] ) . "%";
  if ( $saturation > 100 ) { $saturation = "100%"; }  //  This fixed an error where this value got fucked up like this: 1.0E+21%  <-- what the fuck is that anyways?
  $lightness = round( 100 * $colors[$i][$key]['l'] ) . "%";

  // Display divs and put color values in the title attribute, and display that shit so people can read/copy it for fuck's sake
  echo "
    <div class=\"copy-target cursor-pointer\" data-clipboard-text=\"#" . $colors[$i][$key]['x'] . "\" id=\"color\" title=\"HEX: #" . $colors[$i][$key]['x'] . ", HSL: ($hue, $saturation, $lightness)\" style=\"background:#" . $colors[$i][$key]['x'] . ";width:" . $size . ";height:" . $size . "px;";if( $shape != "square" ){ echo "border-radius:50%;"; } echo "\"></div>";
 }
 echo "

    <div id=\"spacer\" style=\"height:"; if( $sectionspacer != "no" ){ echo "10px;"; } else { echo "0;"; } echo ";\">&nbsp;</div>
";
}
unset( $digits,$n, $hue, $saturation, $lightness, $total );  //  \m/
?>    
   </div>