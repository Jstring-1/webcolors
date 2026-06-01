<?php $time=microtime();$time=explode(' ',$time );$time=$time[1]+$time[0];$start=$time;

 require_once __DIR__ . "/palettes.php";

 // Single page now: the Random Color Generator.
 $page = "RandomColorGenerator.php";

 // Form state comes from POST (keeps the URL clean / no query string).
 $in = $_POST;

////////////////////////////   FUNCTIONS   ///////////////////////////
function rgbToHsl($r, $g, $b) { $r /= 255; $g /= 255; $b /= 255; $max = max($r, $g, $b); $min = min($r, $g, $b); $h = 0; $s = 0; $l = ($max + $min) / 2; if($max == $min){ $h = $s = 0; }else{ $d = $max - $min; $s = $l > 0.5 ? $d / (2 - $max - $min) : $d / ($max + $min); switch($max){ case $r: $h = ($g - $b) / $d + ($g < $b ? 6 : 0); break; case $g: $h = ($b - $r) / $d + 2; break; case $b: $h = ($r - $g) / $d + 4; break; } $h /= 6; } return array('h'=>$h, 's'=>$s, 'l'=>$l); }
function sortmulti($array,$index,$order,$natsort=FALSE,$case_sensitive=FALSE){$sorted=array();if(is_array($array)&&count($array)>0){foreach(array_keys($array)as $key){$temp[$key]=$array[$key][$index];} if(!$natsort){if($order=='asc'){asort($temp,SORT_NUMERIC);}else{arsort($temp,SORT_NUMERIC);}} foreach(array_keys($temp)as $key){$sorted[$key]=$array[$key];}} return $sorted;}

 //  Establish default form variables, get user values if they are legal
 $n = ( isset($in["n"]) && is_numeric( $in["n"] ) && $in["n"] >= 100 && $in["n"] <= 9999 ) ? (int)$in["n"] : 444;
 $sort1 = ( isset($in["sort1"]) && in_array($in["sort1"], array("x","h","s","l","sl"), true) ) ? $in["sort1"] : "l";
 $sort2 = ( isset($in["sort2"]) && ($in["sort2"] == "asc" || $in["sort2"] == "desc") ) ? $in["sort2"] : "asc";
 $sections = ( isset($in["sections"]) && is_numeric( $in["sections"] ) && $in["sections"] >= 1 && $in["sections"] <= 99 ) ? (int)$in["sections"] : 6;
 $size = ( isset($in["size"]) && is_numeric( $in["size"] ) && $in["size"] >= 1 && $in["size"] <= 99 ) ? (int)$in["size"] : 30;
 $shape = ( isset($in["shape"]) && $in["shape"] == "square" ) ? "square" : "";
 $serious = ( isset($in["serious"]) && $in["serious"] == "totally" ) ? "totally" : "";
 $black = ( !isset($in["black"]) || $in["black"] == "yes" ) ? "yes" : "";
 $sectionspacer = ( isset($in["sectionspacer"]) && $in["sectionspacer"] == "no" ) ? "no" : "";
 $discomode = ( isset($in["discomode"]) && $in["discomode"] == "righton" ) ? "righton" : "";
 $palette = ( isset($in["palette"]) && in_array($in["palette"], array("websafe","crayola"), true) ) ? $in["palette"] : "";

 // Build the set of hex codes: either a fixed palette, or freshly generated randoms.
 $hex_arr = array();
 if ( $palette !== "" ) {
  $src = ( $palette == "websafe" ) ? $websafe_colors : $crayola_colors;
  foreach ( $src as $v ) { if ( strlen($v) == 6 ) { $hex_arr[] = strtoupper($v); } }
  $hex_arr = array_values( array_unique( $hex_arr ) );
 } else {
  //  Array used to get random hex codes
  $digits = array('15'=>'0','14'=>'1','13'=>'2','12'=>'3','11'=>'4','10'=>'5','9'=>'6','8'=>'7','7'=>'8','6'=>'9','5'=>'A','4'=>'B','3'=>'C','2'=>'D','1'=>'E','0'=>'F');
  //  Add 30% to account for pulling only unique values below, but keep the primary variable for slicing
  $nn = $n + (.3 * $n);
  for ($i = 0; $i < $nn; $i++) {
   $hex_arr[$i] = $digits[ mt_rand(0, 15) ] . $digits[ mt_rand(0, 15) ] . $digits[ mt_rand(0, 15) ] . $digits[ mt_rand(0, 15) ] . $digits[ mt_rand(0, 15) ] . $digits[ mt_rand(0, 15) ];
  }
  $hex_arr = array_unique( $hex_arr );
  $hex_arr = array_slice( $hex_arr, 0, $n );
  unset( $digits, $nn );
 }
 $total = count( $hex_arr );

 // Use rgbToHsl to get HSL values for each color, save it all in a big array
 $colors = array();
 foreach ( $hex_arr as $val ) {
  $r = hexdec( substr( $val, 0, 2 ) );
  $g = hexdec( substr( $val, 2, 2 ) );
  $b = hexdec( substr( $val, 4, 2 ) );
  $hsl = rgbToHsl( $r, $g, $b );
  if ( strlen( $val ) == 6 ) {
   $sl = round( ( 1000 * $hsl['s'] ) * ( $hsl['l'] ), 20 );
   $colors[$val] = array(
    'x' => $val,
    'h' => str_pad( $hsl['h'], 20, "0" ),
    's' => str_pad( $hsl['s'], 20, "0" ),
    'l' => str_pad( $hsl['l'], 20, "0" ),
    'sl' => $sl,
   );
  }
 }
 unset( $val, $g, $r, $b, $hsl, $sl, $hex_arr );

 //  Pick a representative color for the page text when Black Background is on
 $colors = sortmulti( $colors, 'l', 'asc' );
 $range = round( count( $colors ) * .09 );
 $text = array_slice( $colors, $range + 2, $range + 3 );
?>
