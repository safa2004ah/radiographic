<?php
function crop_image($file_name,$src,$des,$x,$y,$w,$h){
	
	$ext = pathinfo($file_name, PATHINFO_EXTENSION);
	
	$jpeg_quality = 90;

	if(strtolower($ext) == 'jpg' || strtolower($ext) == 'jpeg'){
		$img_r = imagecreatefromjpeg($src);
	}elseif(strtolower($ext) == 'png'){
		$img_r = imagecreatefrompng($src);
	}
	$dst_r = ImageCreateTrueColor( $w, $h );

	imagecopyresampled($dst_r,$img_r,0,0,$x,$y,
	$w,$h,$w,$h);

	imagejpeg($dst_r, $des, $jpeg_quality);

}

function resize_image($src,$des,$w,$h) {
	
	$jpeg_quality = 90;
	
    list($width, $height) = getimagesize($src);
    $r = $width / $height;
	
	if ($w/$h > $r) {
		$newwidth = $h*$r;
		$newheight = $h;
	} else {
		$newheight = $w/$r;
		$newwidth = $w;
	}
	
    $src = imagecreatefromjpeg($src);
    $dst = imagecreatetruecolor($newwidth, $newheight);
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

	imagejpeg($dst, $des, $jpeg_quality);
	
}
?>