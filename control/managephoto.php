<?php 
	session_start();
	$id = $_SESSION['_JMUID'];
	include "functions.php";
	$name=$_GET['photo']; 
	$sql = "SELECT url FROM `photos` WHERE `photo_name`='$name'";
	$result=_db($sql);
	$data=mysqli_fetch_row($result);
	
	$targ_w = $targ_h = 150;
	$targ_w2 = $targ_h2 = 75;
	$jpeg_quality = 100;
	$src = $data[0];
	
	$img_r = imagecreatefromjpeg($src);
	$dst_r = imagecreatetruecolor( $targ_w, $targ_h );
	imagecopyresampled($dst_r, $img_r, 0, 0, $_POST['x'], $_POST['y'], $targ_w,$targ_h,$_POST['w'], $_POST['h']);
	imagejpeg($dst_r,'../uploads/'.$name.'_150.jpg',$jpeg_quality);
	imagedestroy($dst_r);
	$img_r = imagecreatefromjpeg($src);
	$dst_r = imagecreatetruecolor( $targ_w2, $targ_h2 );
	imagecopyresampled($dst_r, $img_r, 0, 0, $_POST['x'], $_POST['y'], $targ_w2,$targ_h2,$_POST['w'], $_POST['h']);
	imagejpeg($dst_r,'../uploads/'.$name.'_75.jpg',$jpeg_quality);
	imagedestroy($dst_r);
	
	// Load the stamp and the photo to apply the watermark to
	$stamp = imagecreatefrompng('../uploads/watermark.png');
	$im = imagecreatefromjpeg('../uploads/'.$name.'_150.jpg');
	
	// Set the margins for the stamp and get the height/width of the stamp image
	$marge_right = 100;
	$marge_bottom = 0;
	$sx = imagesx($stamp);
	$sy = imagesy($stamp);
	
	// Copy the stamp image onto our photo using the margin offsets and the photo 
	// width to calculate positioning of the stamp. 
	imagecopy($im, $stamp, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp));
	
	// Output and free memory
	imagepng($im, '../uploads/'.$name.'_150.png');
	imagedestroy($im);
	unlink("../uploads/".$name."_150.jpg");
	$sql = "UPDATE `matrimony`.`user` SET `status` = '4' WHERE `user`.`id` = $id;";
	$result=_db($sql);
	header('Location: ../view/home.php');
	
// If not a POST request, display page below:
?>