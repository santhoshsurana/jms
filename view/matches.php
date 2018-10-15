<?php require_once('header.php');
	  require_once('ads.php');
	  if(isset($_GET['action'])==true){
		  $sendUserId=$_GET['sent'];
		  $recievedUserId=$_GET['recieve'];
		  switch($_GET['action']){
			  case 'INTRST':
			  	$sql = "INSERT INTO `matches` (`id`, `sent_user_id`, `recieved_user_id`) VALUES (NULL, '$sendUserId', '$recievedUserId');";
			  break;
			  case 'SHRTLST':
			  	
			  break;
		  }
	  }
	  
	  
	  ?>
      
      
<div class="span8">


      <?php
	  $sql = "SELECT `sent_user_id` FROM `matches` WHERE `recieved_user_id`=1111137 LIMIT 0, 10 ";
	  $result=_db($sql); 
	  $tmpCount   = mysqli_num_rows($result);
	  $user_id=mysqli_fetch_row($result);
	  for($i=0;$i<$tmpCount;$i++)
	  {
		  
$sql="SELECT 
		`personal`. `user_id`,
		`personal`. `profile_for`,
		`personal`. `name`, 
		`personal`. `age`, 
		`personal`. `height`, 
		`denominations`.`denom`,
		`castes` .`caste`, 
		`personal`. `subcaste`, 
		`countries`  .`country_name`,
		`personal`.`state`
		FROM `personal`
		INNER JOIN `denominations` ON `personal`.`denomination`=`denominations`.`denomination_id`
		INNER JOIN `castes` ON `personal`.`caste`=`castes` .`caste_id`
		INNER JOIN `countries` ON `personal`.`country`=`countries`  .`country_id`
		WHERE `user_id`=".$user_id[$i]; 
		$result=_db($sql); 
		$profile=mysqli_fetch_row($result); 
		
		$sql="SELECT `education`.`education`,`occupation`.`occupation` FROM `professional`  
		INNER JOIN `education` ON `professional`.`education`=`education`.`education_id` 
		INNER JOIN `occupation` ON `professional`.`occupation`=`occupation`.`id` 
		WHERE `user_id`=".$user_id[$i]; 
		$result=_db($sql); 
		$professional=mysqli_fetch_row($result); 
?>

<div class="profile">
        <h4 style="text-transform:capitalize;"><a href="profile.php?profile=<?php echo $profile['0'];?>"><?php echo $profile['2'];?> (JM<?php echo $profile['0'];?>)</a></h4>
        <div class="row-fluid">
            <div class="span3">
                <img src="<?php echo getPhoto($user_id[$i]); ?>" class="img-polaroid" />
            </div>
            <div class="span6 pull-left">
                <dl class="dl-horizontal">
                    <dt>Age</dt>
                    <dd>
                        <?php echo $profile[ '3'];?>years
                    </dd>
                    <dt>Height</dt>
                    <dd>
                        <?php cm2foot($profile['4']);?> /
                        <?php echo $profile[ '4'];?>cms
                    </dd>
                    <dt>Denomination</dt>
                    <dd>
                        <?php echo $profile[ '5'];?>
                    </dd>
                    <dt>Caste / Sub Caste</dt>
                    <dd>
                        <?php echo $profile[ '6']. ' / '.$profile[ '7'];?>
                    </dd>
                    <dt>Location </dt>
                    <dd>
                        <?php echo $profile[ '8'];?>
                    </dd>
                    <dt>Education</dt>
                    <dd>
                        <?php echo $professional[ '0'];?>
                    </dd>
                    <dt>Occupation</dt>
                    <dd>
                        <?php echo $professional[ '1'];?>
                    </dd>
                </dl>
                <div style="border: 1px dotted #ebebeb;margin: 1px 0px;"></div>
            </div>
            <?php if(!isset($_GET[ 'profile'])) { ?>
            <div class="span3 pull-left">
                <a class="btn">shortlist</a>
                <a class="btn">interest</a>
            </div>
            <?php }?>
        </div>
    </div>
    
    <?php }?>
    
</div>
<?php include('ads.php');?>
<?php require_once('footer.php');?>