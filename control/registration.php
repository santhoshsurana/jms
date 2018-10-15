<?php
session_start();
require_once('functions.php');
require_once('sendmail.php');
//user table data
$email    = $_POST['email'];
$password = md5($_POST['password']);

// profile table data
$profile_for      = $_POST['profile_for'];
$name             = $_POST['name'];
$gender           = $_POST['gender_val'];
$dob              = $_POST['dob'];
$age              = $_POST['age'];
$maritalStatus    = $_POST['maritalStatus'];
$no_child         = $_POST['no_child'];
$child_live       = $_POST['child_belong'];
$denom            = $_POST['denom'];
$caste            = $_POST['caste'];
$subcaste         = $_POST['subcaste'];
$motherTongue     = $_POST['motherTongue'];
$country          = $_POST['country'];
$residingState    = $_POST['residingState'];
$custom_state	  = NULL;
$residingCity     = $_POST['residingCity'];
$custom_city	  = NULL;
$religious        = $_POST['religious'];
$citizenship      = $_POST['citizenship'];
if($citizenship=='0'){
	$citizenship  = $_POST['country'];
}
$residentStatus   = $_POST['residentStatus'];
$education        = $_POST['education'];
$educationDetail  = $_POST['educationDetail'];
$occupation       = $_POST['occupation'];
$occupationDetail = $_POST['occupationDetail'];
$employCat        = $_POST['employCat'];
$income_type      = $_POST['incomeTypeSel'];
$income_currency  = $_POST['incomeCurrency'];
$income           = $_POST['income'];
$Mcode            = $_POST['Mcode'];
$mobile           = $_POST['mobile'];
$height           = $_POST['cms'];
$weight           = $_POST['kgs'];
$bodyType         = $_POST['bodyType'];
$complexion       = $_POST['complexion'];
$ethnicity        = $_POST['ethnicity'];
$physicalStatus   = $_POST['physicalStatus'];
$eatingHabits     = $_POST['eatingHabits'];
$smokingHabits    = $_POST['smokingHabits'];
$drinkingHabits   = $_POST['drinkingHabits'];
$familyValue      = $_POST['familyValue'];
$familyType       = $_POST['familyType'];
$familyStatus     = $_POST['familyStatus'];
$numOfBrothers    = $_POST['numOfBrothers'];
$brothersMarried  = $_POST['brothersMarried'];
$numOfSisters     = $_POST['numOfSisters'];
$sistersMarried   = $_POST['sistersMarried'];
$description      = $_POST['description'];

if ($no_child > 0) {
    $no_child = $child_live;
}
if($country !=93){
	$custom_city=$residingCity;
	$custom_state=$residingState;
	$residingCity=0;
	$residingState=0;
}else if($country !=211){
	$custom_state=$residingState;
	$residingState=0;
}

$sql = "SELECT `call_code` FROM `countries` WHERE `country_id`=$Mcode";
$result=_db($sql);
$data   = mysqli_fetch_row($result);
$Mcode  = $data['0'];

$sql = "INSERT INTO `user` (`id`, `email`, `password`, `login_token`, `status`, `account_date`, `last_login`) VALUES (NULL, '$email', '$password', '0', '1', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);";
_db($sql);

$sql    = "SELECT `id` FROM `user` WHERE `email`= '$email'";
$result=_db($sql);
$data   = mysqli_fetch_row($result);
$id     = $data['0'];
$token  = md5($id.time());

$sql    = "UPDATE `user` SET `login_token` = '$token' WHERE `user`.`id` =".$id;
_db($sql);

$sql = "INSERT INTO `personal` (`user_id`, `profile_for`, `name`, `gender`, `dob`, `age`, `height`, `weight`, `body_type`, `complexion`, `physic_status`, `marital_status`, `no_child`, `child_live`, `religion`, `denomination`, `caste`, `subcaste`, `mother_tongue`, `country`, `state`, `user_state`, `city`, `user_city`, `citizenship`, `resident_status`, `religious_view`, `mcode`, `mobile_no`, `ethnicity`, `eating_habits`, `smk_habits`, `drink_habit`, `description`) VALUES ('$id', '$profile_for', '$name', '$gender', '$dob', '$age', '$height', '$weight', '$bodyType', '$complexion', '$physicalStatus', '$maritalStatus', '$no_child', '$child_live', '8', '$denom', '$caste', '$subcaste', '$motherTongue', '$country', '$residingState', '$custom_state', '$residingCity', '$custom_city', '$citizenship', '$residentStatus', '$religious', '$Mcode', '$mobile',   '$ethnicity',  '$eatingHabits', '$smokingHabits',  '$drinkingHabits', '$description');";
_db($sql);

$sql = "INSERT INTO `professional` (`user_id`, `education`, `edu_details`, `employed_in`, `occupation`, `ocp_details`, `income_type`, `currency_code`, `income`) VALUES ('$id', '$education', '$educationDetail', '$employCat', '$occupation', '$occupationDetail',  '$income_type', '$income_currency', '$income');";
_db($sql);

$sql = "INSERT INTO `family` (`family_id`, `family_value`, `family_type`, `family_status`, `no_brothers`, `bro_married`, `no_sisters`, `sis_married`) VALUES ('$id', '$familyValue', '$familyType', '$familyStatus', '$numOfBrothers', '$brothersMarried', '$numOfSisters', '$sistersMarried');";
_db($sql);

if ($gender == 1) {
    $gender      = 0;
    $end_age     = $age - 1;
    $start_age   = $end_age - 5;
    $from_height = $height - 15;
    $to_height   = $height;
} else {
    $gender      = 1;
    $start_age   = $age + 1;
    $end_age     = $start_age + 5;
    $from_height = $height;
    $to_height   = $height + 15;
}

if ($end_age <= 18) {
    $end_age = 18;
} else if ($start_age <= 18) {
    $start_age = 18;
}
if ($from_height <= 136) {
    $from_height = 136;
} else if ($to_height <= 136) {
    $to_height = 136;
}

$sql = "INSERT INTO `partner`(`partner_id`, `gender`, `start_age`, `end_age`, `marital_status`, `child_live`, `physical_status`, `height_from`, `height_to`, `denomination`, `mother_tongue`, `caste`, `eat_habit`, `smk_habit`, `drnk_habit`, `country`, `in_state`, `usa_state`, `city`, `citizenship`, `education`, `occupation`, `from_income`, `to_income`, `description`) VALUES ('$id', '$gender', '$start_age', '$end_age','$maritalStatus', '$no_child','$physicalStatus', '$from_height', '$to_height','$denom', '$motherTongue', '$caste','$eatingHabits', '$smokingHabits', '$drinkingHabits','$country', '0', '0', '$residingCity', '$citizenship', '$education', '$occupation', '','','')";
_db($sql);
$message = "
 <html>
  <head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' type='text/css' href='http://jamesmatrimony.com/view/css/bootstrap.css'>
    <link rel='stylesheet' type='text/css' href='http://jamesmatrimony.com/view/css/bootstrap-responsive.css'>
    <link rel='stylesheet' type='text/css' href='http://jamesmatrimony.com/view/css/style.css'>
    <link rel='icon' href='img/favicon.ico'>
    <title>
      Jamesmatrimony.com
    </title>
  </head>
  
  <body>
    <div style='width:600px;margin:0 auto;'>
      <center>
        <a href='http://jamesmatrimony.com/jm/index.php'>
          <img src='http://jamesmatrimony.com/view/img/cm_logo.png' style='background:darkorange;'>
        </a>
      </center>
      
      <p>
        Hello " . $name . ",\r\n
        
        This email is to inform you that your new Jamesmatrimony user account has been created.\r\n
        please verify your user account 
        <a href='http://jamesmatrimony.com/view/verify.php?id=" . $id . "&token=" . $token . "'>
          http://jamesmatrimony.com/view/verify.php?id=" . $id . "&token=" . $token . "
        </a>
        \r\n
        To log in to Member Account 
        <a href='http://jamesmatrimony.com/view/login.php'>
          click here
        </a>
      </p>
    </div>
  </body>
</html>";
sendMail($email, 'Jamesmatrimony Email Verification', 'noreply@jamesmatrimony.com', $message);

$_SESSION['_JMUID']=$id;
$_SESSION['_JMEMAIL']=$email;
header('Location:../view/interests.php'); 
?>