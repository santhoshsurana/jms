<?php 
require_once('header.php'); 
require_once('sidebar.php'); 
include "../control/array.php"; 
if(isset($_GET['profile'])) { 
$id=$_GET['profile']; 
$host_id=$_SESSION['_JMUID'];
$sql = "SELECT * FROM `viewed_profile` WHERE `user_id`=$host_id AND `viewed_id`=$id";
$result=_db($sql);
$count   = mysqli_num_rows($result); 
if($count==0){
$sql = "INSERT INTO `viewed_profile` (`user_id`, `viewed_id`) VALUES ('$host_id', '$id');";
	_db($sql);}
}else{ 
$id=$_SESSION['_JMUID']; 
} 
$sql="SELECT `personal`. `user_id`,
`personal`. `profile_for`,
`personal`. `name`,
`personal`. `gender`,
`personal`. `dob`, 
`personal`. `age`,
`personal`. `height`,
`personal`. `weight`,
`personal`. `body_type`,
`personal`. `complexion`,
`personal`. `physic_status`,
`personal`. `marital_status`,
`personal`. `no_child`,
`personal`. `child_live`,
`religion`.`religion_name`,
`denominations`.`denom`,
`castes` .`caste`,
`personal`. `subcaste`,
`languages` .`language`,
`countries` .`country_name`,
`personal`.`state`,
`personal`.`city`,
`citizen` .`country_name` AS `citizenship`,
`personal`. `resident_status`,
`personal`. `religious_view`,
`personal`. `mcode`,
`personal`. `mobile_no`,
`personal`. `ethnicity`,
`personal`. `eating_habits`,
`personal`. `smk_habits`,
`personal`. `drink_habit`,
`personal`. `description`
FROM `personal`  
INNER JOIN `denominations` ON `personal`.`denomination`=`denominations`.`denomination_id` 
INNER JOIN `religion` ON `personal`.`religion`=`religion`.`religion_id` 
INNER JOIN `castes` ON `personal`.`caste`=`castes` .`caste_id` 
INNER JOIN `languages` ON `personal`.`mother_tongue`=`languages` .`id` 
INNER JOIN `countries` ON `personal`.`country`=`countries` .`country_id` 
INNER JOIN `countries` AS `citizen` ON `personal`.`citizenship`=`citizen`.`country_id` 
WHERE `user_id`=".$id; 

		$result=_db($sql); 
		$profile=mysqli_fetch_row($result); 
		
	if($profile[20]!=0){
		$sql = "SELECT `state_name` FROM `states` WHERE `state_id`=".$profile[20];
		$result=_db($sql); 
		$state=mysqli_fetch_row($result); 
			if($profile[20]==93){
			$sql = "SELECT `city_name` FROM `cities` WHERE `city_id`=".$profile[21];
			$result=_db($sql); 
			$city=mysqli_fetch_row($result); 
			$profile[21]=$city[0];
			}else{
				$sql = "SELECT `user_city` FROM `personal` WHERE `user_id`=".$id;
				$result=_db($sql); 
				$city=mysqli_fetch_row($result); 
				$profile[21]=$city[1];
			}
			$profile[20]=$state[0];
		}
	else{
		$sql = "SELECT `user_state`, `user_city` FROM `personal` WHERE `user_id`=".$id;
		$result=_db($sql); 
		$state=mysqli_fetch_row($result); 
		$profile[20]=$state[0];
		$profile[21]=$state[1];
			}
		$sql="SELECT `education`.`education`, `professional`.`edu_details`,`professional`.`employed_in`,`occupation`.`occupation`,`professional`.`ocp_details`,`professional`.`income_type`,`countries`.`currency_code`,`professional`.`income` FROM `professional`  INNER JOIN `education` ON `professional`.`education`=`education`.`education_id` INNER JOIN `occupation` ON `professional`.`occupation`=`occupation`.`id` INNER JOIN `countries` ON `professional`.`currency_code`=`countries`  .`country_id` WHERE `user_id`=".$id; 
		$result=_db($sql); 
		$professional=mysqli_fetch_row($result); 
		
		$sql="SELECT * FROM `family` WHERE `family_id`=".$id; 
		$result=_db($sql); 
		$family=mysqli_fetch_row($result); 
		
		$sql="SELECT * FROM `interests` WHERE `id`=".$id; 
		$result=_db($sql); 
		$interests=mysqli_fetch_row($result); 
				
		$sql = "SELECT `gender`, `start_age`, `end_age`, `height_from`, `height_to`, `marital_status`, `child_live`, `physical_status`, `eat_habit`, `smk_habit`, `drnk_habit`, `denomination`, `mother_tongue`, `caste`, `education` FROM `partner` WHERE `partner_id`=".$id;
		$result = _db($sql);
		$partner = mysqli_fetch_row($result);
		
		$education=explode('~',$partner[14]);
		$sql = "SELECT `education` FROM `education` WHERE `education_id`=".$education[0];
		$result = _db($sql);
		$education_type = mysqli_fetch_row($result); ?>
        
<div class="span9">
    <div class="profile">
        <h4 style="text-transform:capitalize;"><?php echo $profile[2];?> (JM<?php echo $profile[0];?>)</h4>
        <div class="row-fluid">
            <div class="span3">
                <img src="../uploads/<?php 
								$sql="SELECT `gender` FROM `personal` WHERE `user_id`=".$id; 
								$result=_db($sql); 
								$gender=mysqli_fetch_row($result); 
								$sql = "SELECT photo_name FROM `photos` WHERE `user_id`='".$id."' AND `dp_flag`='1'";
								$result = _db($sql);
								$count   = mysqli_num_rows($result); 
								$data=mysqli_fetch_row($result); 
								if($count>0){
									echo "../uploads/".$data[0]."_150.png";
									}
								else{
									if($gender[0]==1){
									echo "../uploads/m_default_150.jpg";
									}else{
										echo "../uploads/f_default_150.jpg";
									}
									}?>" class="img-polaroid" />
            </div>
            <div class="span6 pull-left">
                <dl class="dl-horizontal">
                    <dt>Age</dt>
                    <dd>
                        <?php echo $profile[5];?>years
                    </dd>
                    <dt>Height</dt>
                    <dd>
                        <?php cm2foot($profile[6]);?> /
                        <?php echo $profile[6];?>cms
                    </dd>
                    <dt>Denomination</dt>
                    <dd>
                        <?php echo $profile[15];?>
                    </dd>
                    <dt>Caste / Sub Caste</dt>
                    <dd>
                        <?php echo $profile[16]. ' / '.$profile[17];?>
                    </dd>
                    <dt>Location </dt>
                    <dd>
                        <?php echo $profile[19];?>
                    </dd>
                    <dt>Education</dt>
                    <dd>
                        <?php echo $professional[0];?>
                    </dd>
                    <dt>Occupation</dt>
                    <dd>
                        <?php echo $professional[3];?>
                    </dd>
                </dl>
            </div>
            <?php if(isset($_GET['profile'])) { ?>
            <div class="span3 pull-left">
                <input type="button" name="shortlist" class="btn" value="shortlist" onClick="bookmark();" />
                <br />
                <br />
                <input type="button" name="interest" class="btn" value="interest" onClick="bookmark();" />
            </div>
            <?php }?>
        </div>
    </div>
    <h4>PERSONAL INFORMATION</h4>
    <div class="row-fluid">
        <div class="span12">
            <h5 class="line">About My <?php echo $profile_for[$profile[1]];?></h5> 
            <p>
                <?php echo $profile[31];?>
            </p>
        </div>
    </div>
    <div class="row-fluid">
        <h5 class="line">Basic details</h5> 
        <dl class="dl-horizontal">
            <dt>Name</dt>
            <dd>
                <?php echo $profile[2];?>
            </dd>
            <dt>Age</dt>
            <dd>
                <?php echo $profile[5];?> years
            </dd>
            <dt>Height</dt>
            <dd>
                <?php cm2foot($profile[6]);?> /
                <?php echo $profile[6];?> cms
            </dd>
            <dt>Weight</dt>
            <dd>
                <?php echo $profile[7];?> lbs /
                <?php echo round($profile[7]*0.453);?> kgs
            </dd>
            <dt>Body Type / complexion</dt>
            <dd>
                <?php echo $body_type[$profile[8]]. ' / '.$complexion[$profile[9]];?>
            </dd>
            <dt>Physical status</dt>
            <dd>
                <?php echo $physical_status[$profile[10]];?>
            </dd>
            <dt>Marital Status</dt>
            <dd>
                <?php echo $marital_status[$profile[11]];?>
            </dd>
            <dt>Mother tongue</dt>
            <dd>
                <?php echo $profile[18];?>
            </dd>
            <dt>Eating habits</dt>
            <dd>
                <?php echo $eat_habit[$profile[28]];?>
            </dd>
            <dt>Smoking Habits</dt>
            <dd>
                <?php echo $smoke_habit[$profile[29]];?>
            </dd>
            <dt>Drinking habits</dt>
            <dd>
                <?php echo $drink_habit[$profile[30]];?>
            </dd>
        </dl>
    </div>
    <div class="row-fluid">
        <h5 class="line">Religious Infomation</h5> 
        <dl class="dl-horizontal">
            <dt>Religion</dt>
            <dd>
                <?php echo $profile[14];?>
            </dd>
            <dt>Denomination</dt>
            <dd>
                <?php echo $profile[15];?>
            </dd>
            <dt>Caste</dt>
            <dd>
                <?php echo $profile[16];?>
            </dd>
            <?php if($profile[16]==21){?>
            <dt>Sub Caste</dt>
            <dd>
                <?php echo $profile[17];?>
            </dd>
            <?php }?>
            <dt>Ethnicity</dt>
            <dd>
                <?php echo $profile[17];?>
            </dd>
        </dl>
    </div>
    <div class="row-fluid">
        <h5 class="line">Location</h5>
        <dl class="dl-horizontal">
            <dt>Country</dt>
            <dd>
                <?php echo $profile[19];?>
            </dd>
            <dt>State</dt>
            <dd>
            	<?php echo $profile[20];?>
            </dd>
            <dt>City</dt>
            <dd>
                <?php echo $profile[21];?>
            </dd>
            <dt>Citizenship</dt>
            <dd>
                <?php echo $profile[22];?>
            </dd>
            <dt>Resident Status</dt>
            <dd>
                <?php echo $resident_status[$profile[23]];?>
            </dd>
        </dl>
    </div>
    <div class="row-fluid">
        <h5 class="line">Professional Information</h5> 
        <dl class="dl-horizontal">
            <dt>Education</dt>
            <dd>
                <?php echo $professional[0];?>
            </dd>
            <?php if($professional[1]!='' ){?>
            <dt>Education in Detail</dt>
            <dd>
                <?php echo $professional[1];?>
            </dd>
            <?php }?>
            <dt>Occupation</dt>
            <dd>
                <?php echo $professional[3];?>
            </dd>
            <?php if($professional[4]!='' ){?>
            <dt>Occupation in Detail</dt>
            <dd>
                <?php echo $professional[4];?>
            </dd>
            <?php }?>
            <dt>Employed in</dt>
            <dd>
                <?php echo $employ_type[$professional[2]];?>
            </dd>
            <dt>Annual Income</dt>
            <dd>
                <?php echo $professional[6]. " - ".round($professional[7]). " / "; if($professional[5]==0){echo " Month";}else{echo " Year";}?>
            </dd>
        </dl>
    </div>
    <div class="row-fluid">
        <h5 class="line">Family Details</h5> 
        <dl class="dl-horizontal">
            <dt>Family Values</dt>
            <dd>
                <?php echo $family_value[$family[1]];?>
            </dd>
            <dt>Family Type</dt>
            <dd>
                <?php echo $family_type[$family[2]];?>
            </dd>
            <dt>Family Status</dt>
            <dd>
                <?php echo $family_status[$family[3]];?>
            </dd>
            <?php if($family[4]!=''){?>
            <dt>Ancestral Origin</dt>
            <dd>
                <?php echo $family[4];?>
            </dd>
            <?php } if($family[5]!=''){?>
            <dt>Father's occupation</dt>
            <dd>
                <?php echo $family[5];?>
            </dd>
            <?php } if($family[6]!=''){?>
            <dt>Mother's occupation</dt>
            <dd>
                <?php echo $family[6];?>
            </dd>
            <?php }?>
            <dt>No of Brother(s)</dt>
            <dd>
                <?php if($family[7]=='99'){echo 'none';}else{echo $family[7];};?>
            </dd>
            <?php if($family[7]!=99){?>
            <dt>No of Brother(s) married</dt>
            <dd>
                 <?php if($family[8]=='99'){echo 'none';}else{echo $family[8];};?>
            </dd>
            <?php }?>
            <dt>No of Sister(s)</dt>
            <dd>
                <?php if($family[9]=='99'){echo 'none';}else{echo $family[9];};?>
            </dd>
            <?php if($family[9]!=99){?>
            <dt>No of Sister(s) married</dt> 
            <dd>
                <?php if($family[10]=='99'){echo 'none';}else{echo $family[10];};?>
            </dd>
            <?php }?>
        </dl>
    </div>
    <div class="row-fluid">
        <h5 class="line">Hobbies &amp; Interests</h5> 
        <dl class="dl-horizontal">
            <dt>Hobbies</dt>
            <dd>
                <?php echo $profile[2];?>
            </dd>
            <dt>Interests</dt>
            <dd>
                <?php echo $profile[2];?>
            </dd>
            <dt>Favorite Music</dt>
            <dd>
                <?php echo $profile[2];?>
            </dd>
            <dt>Favorite Reads</dt>
            <dd>
                <?php echo $profile[2];?>
            </dd>
            <dt>Preferred Movies</dt>
            <dd>
                <?php echo $profile[2];?>
            </dd>
            <dt>Sports/Fitness</dt>
            <dd>
                <?php echo $profile[2];?>
            </dd>
            <dt>Favorite Cuisine</dt>
            <dd>
                <?php echo $profile[2];?>
            </dd>
            <dt>Preferred Dress Style</dt>
            <dd>
                <?php echo $profile[2];?>
            </dd>
            <dt>Spoken Languages</dt>
            <dd>
                <?php echo $profile[2];?>
            </dd>
        </dl>
    </div>
    <div class="row-fluid">
        <h5 class="line">About My Family</h5> 
        <dl class="dl-horizontal">
        </dl>
    </div>
    <h4>PARTNER PREFERENCE</h4>
    <div class="row-fluid">
        <h5 class="line">Basic & Religious Preferences</h5>
        <dl class="dl-horizontal">
            <dt><?php if($partner[0]==0){echo 'Brides';}else{echo 'Groom';
			}?>'s Age</dt>
            <dd><?php echo $partner[1].' - '.$partner[2];?>  years</dd>
            <dt>Height</dt>
            <dd><?php cm2foot($partner[3]);echo ' To ';cm2foot($partner[4]);?> <br/> <?php echo $partner[3].' cms To '.$partner[4].' cms';?></dd>
            <dt>Marital Status</dt>
            <dd><?php echo $marital_status[$partner[5]];?></dd>
            <dt>Physical Status</dt>
            <dd>Normal</dd>
            <dt>Eating Habits</dt>
            <dd>Non Vegetarian</dd>
            <dt>Smoking Habits</dt>
            <dd>Non-smoker</dd>
            <dt>Drinking Habits</dt>
            <dd>Non-drinker</dd>
            <dt>Religion</dt>
            <dd>Any Religion</dd>
            <dt>Mother Tongue</dt>
            <dd>Mother Tongue</dd>
            <dt>Caste</dt>
            <dd>Any Caste</dd>
            <dt>Sub Caste</dt>
            <dd>Any Sub Caste</dd>
        </dl>
    </div>
    <div class="row-fluid">
        <h5 class="line">Professional Preferences</h5> 
        <dl class="dl-horizontal">
            <dt>Education</dt>
            <dd>Masters - Engineering / Computers / Others, PhD, Bachelors - Management / Others, Masters - Management / Others, Bachelors - Engineering / Computers / Others</dd>
            <dt>Occupation</dt>
            <dd>Any Occupation</dd>
            <dt>Annual Income</dt>
            <dd>Any Income</dd>
        </dl>
    </div>
    <div class="row-fluid">
        <h5 class="line">Location Preferences</h5> 
        <dl class="dl-horizontal">
            <dt>Citizenship</dt>
            <dd>Any Citizenship</dd>
            <dt>Country</dt>
            <dd>Any Country</dd>
            <dt>Residing State</dt>
            <dd>Any State</dd>
            <dt>Residing City</dt>
            <dd>Any City</dd>
        </dl>
    </div>
    <div class="row-fluid">
        <dl class="dl-horizontal">
            <h5 class="line">What I am looking for</h5> 
            <div></div>
        </dl>
    </div>
    <?php require_once( 'footer.php');?>