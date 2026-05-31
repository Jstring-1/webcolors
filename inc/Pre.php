<?php $time=microtime();$time=explode(' ',$time );$time=$time[1]+$time[0];$start=$time;

 $x = $_GET['x'];
 $pages = array("RandomColorGenerator", "WebSafeColors", "CrayolaColors", "Resources", "Wiki", "About");
 if ( in_array( $x, $pages ) ) {
  $page = $_GET['x'];
  $page .= ".php";
 } else {
  $page = "RandomColorGenerator.php";
 }
 unset( $pages, $x );

////////////////////////////   FUNCTIONS   ///////////////////////////
function rgbToHsl($r, $g, $b) { $r /= 255; $g /= 255; $b /= 255; $max = max($r, $g, $b); $min = min($r, $g, $b); $h = 0; $s = 0; $l = ($max + $min) / 2; if($max == $min){ $h = $s = 0; }else{ $d = $max - $min; $s = $l > 0.5 ? $d / (2 - $max - $min) : $d / ($max + $min); switch($max){ case $r: $h = ($g - $b) / $d + ($g < $b ? 6 : 0); break; case $g: $h = ($b - $r) / $d + 2; break; case $b: $h = ($r - $g) / $d + 4; break; } $h /= 6; } return array('h'=>$h, 's'=>$s, 'l'=>$l); }
function array_orderby(){$args = func_get_args();$data = array_shift($args);foreach ($args as $n => $field) {if (is_string($field)) { $tmp = array();foreach ($data as $key => $row)$tmp[$key] = $row[$field];$args[$n] = $tmp;}  }  $args[] = &$data; call_user_func_array('array_multisort', $args); return array_pop($args);}
function sortmulti($array,$index,$order,$natsort=FALSE,$case_sensitive=FALSE){if(is_array($array)&&count($array)>0){foreach(array_keys($array)as $key){$temp[$key]=$array[$key][$index];} if(!$natsort){if($order=='asc'){asort($temp,SORT_NUMERIC);}else{arsort($temp,SORT_NUMERIC);}} foreach(array_keys($temp)as $key){$sorted[$key]=$array[$key];} return $sorted;} return $sorted;}

if ( $page == "RandomColorGenerator.php" ) {
 //  Establish default form variables, get user values if they are legal
 $n = ( is_numeric( $_GET["n"] ) && $_GET["n"] >= 100 && $_GET["n"] <= 9999 ) ? $_GET["n"] : "444";
 $sort1 = ( $_GET["sort1"] == "x" || $_GET["sort1"] == "h" || $_GET["sort1"] == "s" || $_GET["sort1"] == "l" || $_GET["sort1"] == "sl" ) ? $_GET["sort1"] : "l";
 $sort2 = ( $_GET["sort2"] == "asc" || $_GET["sort2"] == "desc" ) ? $_GET["sort2"] : "asc";
 $sections = ( is_numeric( $_GET["sections"] ) && $_GET["sections"] >= 1 && $_GET["sections"] <= 100 ) ? $_GET["sections"] : "6";
 $size = ( is_numeric( $_GET["size"] ) && $_GET["size"] >= 1 && $_GET["size"] <= 100 ) ? $_GET["size"] : "30";
 $shape = ( $_GET["shape"] == "square" ) ? $_GET["shape"] : "";
 $serious = ( $_GET["serious"] == "totally" ) ? $_GET["serious"] : "";
 $black = ( $_GET["black"] == "yes" ) ? $_GET["black"] : "";
 $sectionspacer = ( $_GET["sectionspacer"] == "no" ) ? $_GET["sectionspacer"] : "";
 $discomode = ( $_GET["discomode"] == "righton" ) ? $_GET["discomode"] : "";
 //  Array used to get random hex codes
 $digits = array('15'=>'0','14'=>'1','13'=>'2','12'=>'3','11'=>'4','10'=>'5','9'=>'6','8'=>'7','7'=>'8','6'=>'9','5'=>'A','4'=>'B','3'=>'C','2'=>'D','1'=>'E','0'=>'F');
 //  Add a 30% to the given color amount to account for pulling only unique values below, but keep the primary variable for slicing the array below
 $nn = $n + (.3 * $n);
 // Generate the random color hex codes
 for ($i = 0; $i < $nn; $i++) {
  $hex_arr[$i] = $digits[ mt_rand(0, 15) ] . $digits[ mt_rand(0, 15) ] . $digits[ mt_rand(0, 15) ] . $digits[ mt_rand(0, 15) ] . $digits[ mt_rand(0, 15) ] . $digits[ mt_rand(0, 15) ];
 }
 // Save random color hex codes into array
 $hex_arr = array_unique( $hex_arr );
 $hex_arr = array_slice( $hex_arr, 0, $n ); 
 unset( $digits, $nn ); 
 $total = count( $hex_arr );
 // Use rgbToHsl to get HSL values for each color, save it all in a big fucking array
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
  unset( $key, $val, $g, $r, $b, $hsl, $sl, $hex_arr );  //  Be cool, pack it in, pack it out.  Shakka.
 }
 //  Get random BG colors for display fun times
 $colors = sortmulti( $colors,'l','desc' );
 $bg1 = array_slice( $colors, 0, 1 );
 $bg1 = array_slice( $colors, 1, 2 );
 $colors = sortmulti( $colors,'l','asc' );
 $range = round( count( $colors ) * .09 );
 $text = array_slice( $colors, $range, $range+1 );
 $text = array_slice( $colors, $range+1, $range+2 );
 $text = array_slice( $colors, $range+2, $range+3 );

} elseif ( $page == "WebSafeColors.php" ) {
 
} elseif ( $page == "CrayolaColors.php" ) {
 
} elseif ( $page == "Wiki.php" ) {
 $wiki_url = "https://en.wikipedia.org/w/api.php?action=query&titles=Web%20colors&prop=revisions&rvprop=content&format=json&rvparse";
 $wiki_contents = file_get_contents( $wiki_url );
 $wiki_array = json_decode( $wiki_contents, true );
 $wiki_html = $wiki_array["query"]["pages"]["286621"]["revisions"]["0"]["*"];
 unset( $wiki_url, $wiki_contents, $wiki_array, $key );
 $wiki_html = str_replace( "/wiki/", "https://en.wikipedia.org/wiki/", $wiki_html );
 $wiki_html = str_replace( "<a href=\"h", "<a target='_blank' href=\"h", $wiki_html );
 $wiki_html = str_replace( "<span class=\"mw-editsection\">", "<!-- <span class=\"mw-editsection\">", $wiki_html );
 $wiki_html = str_replace( "<span class=\"mw-editsection-bracket\">]</span></span>", "<span class=\"mw-editsection-bracket\">]</span></span> -->", $wiki_html );

 } elseif ( $page == "Resources.php" ) {
 
 } elseif ( $page == "About.php" ) {
 
 }
?>