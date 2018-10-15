<?php
session_start();
include "functions.php";
$id=$_SESSION['_JMUID'];
$start_age=$_POST['start_age'];
$end_age=$_POST['end_age'];
$height_from=$_POST['height_from'];
$height_to=$_POST['height_to'];
$marital=$_POST['marital'];
$child_live=$_POST['child_live'];
$physic_status=$_POST['physical_status'];
$eat_habit=$_POST['eat_habit'];
$smoke_habit=$_POST['smk_habit'];
$drink_habit=$_POST['drnk_habit'];
$denom=$_POST['denom'];
$mother_tounge=$_POST['mother_tounge'];
$caste=$_POST['caste'];
$education=$_POST['education'];
$country=$_POST['country'];
$usastate=$_POST['usastate'];
$instate=$_POST['instate'];
$city=$_POST['city'];
$citizenship=$_POST['citizenship'];
$occupation=$_POST['occupation'];
$from_income=$_POST['from_income'];
$to_income=$_POST['to_income'];
$description=$_POST['description'];


$sql = "UPDATE `partner` SET `start_age` = '$start_age', `end_age` = '$end_age', `marital_status` = '$marital', `child_live` ='$child_live', `height_from` = '$height_from', `height_to` = '$height_to', `mother_tongue` = '$mother_tounge', `eat_habit` = '$eat_habit', `physical_status` = '$physic_status', `smk_habit` = '$smoke_habit', `drnk_habit` = '$drink_habit', `caste` = '$caste', `education` = '$education', `occupation` = '$occupation', `from_income` = '$from_income', `to_income` = '$to_income', `citizenship` = '$citizenship', `country` = '$country', `in_state` = '$instate', `usa_state` = '$usastate', `city` = '$city', `description` = '$description' WHERE `partner_id` = $id;";
_db($sql);
 $sql = "UPDATE `user` SET `status` = '3' WHERE `user`.`id` = $id;";
_db($sql);
 header('Location:../view/addphoto.php');
?>