   <h2>Resources</h2>
<div style="margin-left:50px;">
<?php  //  rsc-page.php      "http://paletton.com/" => "World's BEST Color Scheme Designer",

  $link_arr = array(
  "http://paletton.com/" => "Paletton.com: World's BEST Color Scheme Designer",
  "http://labs.tineye.com/multicolr/" => "TinEye's Multicolor Search Lab powered by MulticolorEngine",
  "http://color.method.ac/" => "Color.Method.ac: Color Matching Game",
  "https://coolors.co/app" => "Coolors.co: Color Scheme Designer",
  "http://www.colorcombos.com/grabcolors.html" => "ColorCombos.com: Color Scheme Extraction Tool",
  "http://design-seeds.com/search" => "Design-Seeds.com: Color Palette Search",
  
 );
 
 foreach( $link_arr as $key => $val ){
  echo 
"<a target=\"_blank\" href=\"$key\">$val</a><br />";
 }
?>
</div>