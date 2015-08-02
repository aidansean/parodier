<?php

$text = array () ;
$text[0] = 'KEEP'  ;
$text[1] = 'CALM'  ;
$text[2] = 'AND'   ;
$text[3] = 'CARRY' ;
$text[4] = 'ON'    ;
if(isset($_GET['text1'])) $text[0] = strtoupper($_GET['text1']) ;
if(isset($_GET['text2'])) $text[1] = strtoupper($_GET['text2']) ;
if(isset($_GET['text3'])) $text[2] = strtoupper($_GET['text3']) ;
if(isset($_GET['text4'])) $text[3] = strtoupper($_GET['text4']) ;
if(isset($_GET['text5'])) $text[4] = strtoupper($_GET['text5']) ;

$source = imagecreatefrompng('source.png') ;
$w = 425 ;
$h = 600 ;
$image = imagecreatetruecolor($w,$h) ;
// Set background color
$color = imagecolorat($source,10,10) ;
$rgb   = imagecolorsforindex($source,$color) ;
$color = color($rgb[red],$rgb[green],$rgb[blue]) ;
$backgroundColor = color(255,255,0) ;
imagefill($image,0,0,$color) ;
// Get crest
$left   = 145 ;
$top    =  20 ;
$across = 135 ;
$down   = 115 ;
imagecopy($image,$source,$left,$top,$left,$top,$across,$down) ;
// Get font
$font = 'ariblk.ttf' ;
$font = 'Johnston_ITC_Bold.ttf' ;
$fontColor = color(255,255,255) ;
text(70,215,$text[0]) ;
text(70,308,$text[1]) ;
text(35,365,$text[2]) ;
text(70,453,$text[3]) ;
text(70,548,$text[4]) ;

header("Content-type: image/png") ;
imagepng($image) ;
imagedestroy($image) ;

function text($size,$y,$string){
  global $image , $font , $fontColor , $w ;
  $box = imagettfbbox($size,0,$font,$string) ;
  $width  = $box[2] - $box[0] ;
  $height = $box[1] - $box[7] ;
  if($width>$w){
    $size = $size*0.9*$w/$width ;
    $box = imagettfbbox($size,0,$font,$string) ;
    $width  = $box[2] - $box[0] ;
    $height = $box[1] - $box[7] ;
  }
  imagettftext($image,$size,0,0.5*($w-$width),$y,$fontColor,$font,$string) ;
}

function color($r,$g,$b){
  global $image ;
  $color = imagecolorexact($image,$r,$g,$b) ;
  if($color==-1){
    $color = imagecolorallocate($image,$r,$g,$b) ;
    if($color == -1){
      $color = imagecolorclosest($image,$r,$g,$b) ;
    }
  }
  return $color ;
}

?>