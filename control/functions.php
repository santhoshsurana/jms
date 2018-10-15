<?php 
function _db($sql){
	$DB_HOST = "Localhost";
	$DB_NAME = "matrimony";
	$DB_USERNAME = "root";
	$DB_PASSWORD = "root";
	$CON = mysqli_connect($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME) or trigger_error(mysqli_error(),E_USER_ERROR);
	return mysqli_query($CON, $sql);
	}
	
function cm2foot($cm) {
    $decimal = $cm / 30.48;
    $feet = floor($decimal);
    $inch = $decimal - $feet;
    $inch = round($inch * 100);
    $inch = round($inch * 0.12);
    if ($inch >= 12) {
        $inch = $inch - 12;
        $feet = $feet + 1;
    }
    if ($inch != 0) {
        $feet = $feet.
        'ft-'.$inch.
        "in";
    }
    echo $feet;
}
	
function thumbs($user_id) {
    $sql = "SELECT `personal`. `user_id`,	`personal`. `name`,	`personal`. `age`,	`personal`. `height`,	`countries` .`country_name`	FROM `personal`	INNER JOIN `countries` ON `personal`.`country`=`countries` .`country_id` WHERE `user_id`=".$user_id;
    $result=_db($sql);
    $profile = mysqli_fetch_row($result);
    $sql = "SELECT `education`.`education` FROM `professional` INNER JOIN `education` ON `professional`.`education`=`education`.`education_id` WHERE `user_id`=".$user_id;
    $result=_db($sql);
    $professional = mysqli_fetch_row($result); 
	$profilePic=getPhoto($user_id);
	?>
     
    <div class = "thumbnail span3"> <a class="" href="profile.php?profile=<?php echo $profile[0]; ?>">
        <b align= "center"> JM <?php echo $profile[0]; ?> </b>
        <img src="../uploads/<?php echo $profilePic; ?>" />
        <b align="center"><?php echo $profile[1];?></b>
        <p><?php echo $profile[2]."years,". cm2foot($profile[3]).",".$professional[0].",".$profile[4];?><br/></p>
        </a>
    </div>
    
<?php }

function getPhoto($user_id) {
    $sql = "SELECT photo_name FROM `photos` WHERE `user_id`='".$user_id.
    "' AND `dp_flag`='1'";
    $result=_db($sql);
    $count = mysqli_num_rows($result);
    $data = mysqli_fetch_row($result);
    if ($count > 0) 
		{$url="../uploads/".$data[0]."_150.png";} 
	else {
		if ($gender[0] == 1) 
			 {$url="../uploads/m_default_150.jpg";} 
		else {$url="../uploads/f_default_150.jpg";}
		}
	return $url;
	}
		  
function getGender($user_id) {
    $sql = "SELECT `gender` FROM `personal` WHERE `user_id`=".$user_id;
    $result=_db($sql);
    $gender = mysqli_fetch_row($result);
    return $gender[0];
}
function getRecent($id){
	if(getGender($id)=='1'){
		$gender='0';
	}else{
		$gender='1';
	}
	$sql = "SELECT `user_id` FROM `personal` WHERE `gender`=$gender order by user_id desc LIMIT 0, 3 ";
	$result=_db($sql);
	$count = mysqli_num_rows($result);
    $recentId = mysqli_fetch_row($result);
	for($i=0;$i<=$count;$i++)
	{
		return thumbs($recentId[$i]);
		
	}
}

function getViewed($id){
	if(getGender($id)=='1'){
		$gender='0';
	}else{
		$gender='1';
	}
	$sql = "SELECT `viewed_id` FROM `viewed_profile` WHERE `user_id`=$id order by date desc LIMIT 0, 3 ";
	$result=_db($sql);
	$count = mysqli_num_rows($result);
    $viewedId = mysqli_fetch_row($result);
	for($i=0;$i<=$count;$i++)
	{
		return thumbs($viewedId[$i]);
		
	}
}

?>