<?php

$image = imagecreatetruecolor(16,16) ;
// Set background color
$color = color(207,0,0,1) ;
imagefill($image,0,0,$color) ;
header("Content-type: image/png") ;
imagepng($image) ;
imagedestroy($image) ;

function color($r,$g,$b,$a)
{
  global $image ;
  $color = imagecolorexactalpha($image,$r,$g,$b,$a) ;
  if($color==-1)
  {
    $color = imagecolorallocatealpha($image,$r,$g,$b,$a) ;
    if($color == -1)
    {
      $color = imagecolorclosestalpha($image,$r,$g,$b,$a) ;
    }
  }
  return $color ;
}

?>