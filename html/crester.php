<?php

$source = imagecreatefrompng('source.png') ;
$w = 425 ;
$h = 600 ;
$left   = 145 ;
$top    =  20 ;
$across = 135 ;
$down   = 115 ;
$image = imagecreatetruecolor($across,$down) ;
// Set background color
$color = imagecolorat($source,0,0) ;
$rgb   = imagecolorsforindex($source,$color) ;
$color = color(0,0,255,1) ;
$backgroundColor = color(255,255,255,1) ;
imagefill($image,0,0,$backrgoundColor) ;

// Get crest
for($y=$top ; $y<$top+$down ; $y+=1){
  for($x=$left ; $x<$left+$across ; $x+=1){
    $color = imagecolorat($source,$x,$y) ;
    $rgb   = imagecolorsforindex($source,$color) ;
    $color = color(255,0,255,$rgb[green]) ;
    imagesetpixel($image,$x-$left,$y-$top,$color) ;
  }
}
header("Content-type: image/png") ;
imagepng($image) ;
imagedestroy($image) ;

function color($r,$g,$b,$a){
  global $image ;
  $color = imagecolorexactalpha($image,$r,$g,$b,$a) ;
  if($color==-1){
    $color = imagecolorallocatealpha($image,$r,$g,$b,$a) ;
    if($color == -1){
      $color = imagecolorclosestalpha($image,$r,$g,$b,$a) ;
    }
  }
  return $color ;
}

?>