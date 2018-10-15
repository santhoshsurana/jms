<?php session_start();
require_once('functions.php');
 $email=$_SESSION['_JMEMAIL'];
 $sql = "SELECT `id` FROM `user` WHERE `email`= '$email'";
 $result=_db($sql);
 $data=mysqli_fetch_row($result);
 $id = $data['0'];
 $cuisine=$_POST['cuisine'];
 $music=$_POST['music'];
 $read=$_POST['read'];
 $hobby=$_POST['hobby'];
 $interest=$_POST['interest'];
 $fashion=$_POST['fashion'];
 $movies=$_POST['movies'];
 $language=$_POST['language'];
 $sports=$_POST['sports'];
 
 if(isset($_POST['cuisineOther'])){
 $cuisineOther=$_POST['cuisineOther'];
 }
 else{$cuisineOther=NULL;}
 
 if(isset($_POST['cuisineOther'])){
 $musicOther=$_POST['musicOther'];
 }
 else{$musicOther=NULL;}

 if(isset($_POST['readOther'])){
 $readOther=$_POST['readOther'];
 }
 else{$readOther=NULL;}

 if(isset($_POST['hobbyOther'])){
 $hobbyOther=$_POST['hobbyOther'];
 }
 else{$hobbyOther=NULL;}

 if(isset($_POST['interestOther'])){
 $interestOther=$_POST['interestOther'];
 }
 else{$interestOther=NULL;}

 if(isset($_POST['fashionOther'])){
 $fashionOther=$_POST['fashionOther'];
 }
 else{$fashionOther=NULL;}

 if(isset($_POST['moviesOther'])){
 $moviesOther=$_POST['moviesOther'];
 }
 else{$moviesOther=NULL;}

 if(isset($_POST['languageOther'])){
 $languageOther=$_POST['languageOther'];
 }
 else{$languageOther=NULL;}

 if(isset($_POST['sportsOther'])){
 $sportsOther=$_POST['sportsOther'];
 }else{$sportsOther=NULL;}

$sql = "INSERT INTO `matrimony`.`interests` (`id`, `cuisine`, `other_cuisine`, `music`, `other_music`, `reading`, `other_reading`, `hobbies`, `other_hobbies`, `interests`, `other_interests`, `dressing`, `other_dressing`, `movies`, `other_movies`, `languages`, `other_languages`, `sports`, `other_sports`) VALUES ('$id', '$cuisine', ' $cuisineOther', '$music', '$musicOther', '$read', '$readOther', '$hobby', '$hobbyOther', '$interest', '$interestOther', '$fashion', '$fashionOther', '$movies', '$moviesOther', '$language', '$languageOther', '$sports', '$sportsOther')";
_db($sql);
$sql = "UPDATE `user` SET `status` = '2' WHERE `id` = $id;";
_db($sql);
header('Location:../view/partner.php');


?>