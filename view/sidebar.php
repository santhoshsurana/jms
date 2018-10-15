 <?php require_once( '../control/functions.php');
		$id=$_SESSION[ '_JMUID']; 
		//echo get_gender($id);
		$sql = "SELECT DISTINCT f.`user_id` FROM `feature_profile` f,`personal` p WHERE p.`gender`=0 AND datediff(now(), `valid_till`) <= 0 ORDER BY RAND()";
		$sql = "SELECT `user_id` FROM `feature_profile` WHERE datediff(now(), `valid_till`) <= 0 ORDER BY RAND()";
        echo $sql;
		$result=_db($sql);
		$data=mysqli_fetch_row($result); 
		$user_id=$data[0];
		$sql="SELECT `personal`. `user_id`,
		`personal`. `name`,
		`personal`. `age`,
		`personal`. `height`,
		`countries` .`country_name`
		FROM `personal`    
		INNER JOIN `countries` ON `personal`.`country`=`countries` .`country_id`
		WHERE `user_id`=".$user_id; 
		$result=_db($sql); 
		$profile=mysqli_fetch_row($result); 
		
		$sql="SELECT `education`.`education` 
		FROM `professional`  INNER JOIN `education` 
		ON `professional`.`education`=`education`.`education_id`  
		 WHERE `user_id`=".$user_id; 
		$result=_db($sql); 
		$professional=mysqli_fetch_row($result); 
		?>
        
<div class="span3 sidebar">
        <h5>Feature profile</h5>
        <div class="thumbnail" style="background:#FFFFFF">
           <p align="center" class="title">JM<?php echo $profile[0];?></p>
                               <img src="<?php echo getPhoto($user_id); ?>" />
                                    <p align="center" class="title"><?php echo $profile[1];?></p>
									<p align="center"><?php echo $profile[2];?> years, <?php cm2foot($profile[3]);?>,<br/> 
									<?php echo $professional[0];?>, <?php echo $profile[4];?></p>
        </div>
        <h5>Quick search</h5>
        <form method="post" action="matches.php?act=side" method="get">
            <input type="hidden" name="gender" id="gender" value="<?php echo $partner[0]; ?>" />
            <input type="hidden" name="start_age" id="start_age" value="<?php echo $partner[1]; ?>" />
            <input type="hidden" name="end_age" id="end_age" value="<?php echo $partner[2]; ?>" />
            <input type="hidden" name="height_from" id="height_from" value="<?php echo $partner[3]; ?>" />
            <input type="hidden" name="height_to" id="height_to" value="<?php echo $partner[4]; ?>" />
            <input type="hidden" name="drnk_habit" id="drnk_habit" value="<?php echo $partner[10]; ?>" />
            <input type="hidden" name="denom" id="denom" value="<?php echo $partner[11]; ?>" />
            <input type="hidden" name="mother_tounge" id="mother_tounge" value="<?php echo $partner[12]; ?>" />
            <input type="hidden" name="caste" id="caste" value="<?php echo $partner[13]; ?>" />
            <div class="control-group">
                <label class="control-label" for="stAge">Age
                </label>
                <div class="controls">
                    <select name="stAge" id="stAge" onchange="valAge();" class="span5">
                        <?php for($i=18;$i<=50;$i++){echo "<option value='$i'>$i</option>";}?>
                    </select>&nbsp;to&nbsp;

                    <select name="enAge" id="enAge" onchange="valAge();" class="span5">
                        <?php for($i=18;$i<=50;$i++){echo "<option value='$i'>$i</option>";}?>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="feet">Height
                </label>
                <div class="controls">
                    <select name="fromFeet" onChange="valHeight()" id="fromFeet" class="span5">
                        <option value='4-6'>4 ft - 6 In</option>
                        <option value='4-7'>4 ft - 7 In</option>
                        <option value='4-8'>4 ft - 8 In</option>
                        <option value='4-9'>4 ft - 9 In</option>
                        <option value='4-10'>4 ft - 10 In</option>
                        <option value='4-11'>4 ft - 11 In</option>
                        <?php for($i=5;$i<=6;$i++){ for($j=0;$j<=11;$j++){ echo "<option value='$i-$j'>$i". " ft"; if($j==0){}else{ echo " - ".$j. " In";} echo "</option>"; } } ?>
                        <option value='7-0'>7 ft</option>
                    </select>to
                    <select name="toFeet" onChange="valHeight()" id="toFeet" class="span5">
                        <option value='4-6'>4 ft - 6 In</option>
                        <option value='4-7'>4 ft - 7 In</option>
                        <option value='4-8'>4 ft - 8 In</option>
                        <option value='4-9'>4 ft - 9 In</option>
                        <option value='4-10'>4 ft - 10 In</option>
                        <option value='4-11'>4 ft - 11 In</option>
                        <option value='5-0'>5 ft</option>
                        <option value='5-1'>5 ft - 1 In</option>
                        <option value='5-2'>5 ft - 2 In</option>
                        <option value='5-3'>5 ft - 3 In</option>
                        <option value='5-4'>5 ft - 4 In</option>
                        <option value='5-5'>5 ft - 5 In</option>
                        <option value='5-6'>5 ft - 6 In</option>
                        <option value='5-7'>5 ft - 7 In</option>
                        <option value='5-8'>5 ft - 8 In</option>
                        <option value='5-9'>5 ft - 9 In</option>
                        <option value='5-10'>5 ft - 10 In</option>
                        <option value='5-11'>5 ft - 11 In</option>
                        <?php for($i=6;$i<=6;$i++){ for($j=0;$j<=11;$j++){ echo "<option value='$i-$j'>$i". " ft"; if($j==0){}else{ echo " - ".$j. " In";} echo "</option>"; } } ?>
                        <option value='7-0'>7 ft</option>
                    </select>

                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Denomination
                </label>
                <div class="controls">
                    <select id='denom_left' name='denom_left' class="span10">
                        <option value='0'>Any</option>
                        <?php $sql="SELECT * FROM `denominations`" ; $result=_db($sql); while($denom=mysqli_fetch_row($result)){ echo "<option value='".$denom[ '0']. "'>".$denom[ '1']. "</option>";}?>
                    </select>
                </div>
            </div>

            <div class="control-group">
                <label for="mothertongue_left" class="control-label">Mother Tongue
                </label>
                <div class="controls">
                    <select id='mothertongue_left' name='mothertongue_left' class="span10">
                        <option value='0'>Any</option>
                        <?php $sql="SELECT * FROM `languages`" ; $result=_db($sql); while($language=mysqli_fetch_row($result)) { echo "<option value='".$language[ '0']. "'>".$language[ '1']. "</option>"; }?>
                    </select>
                </div>
            </div>

            <div class="control-group">
                <label for="caste_left" class="control-label">Caste
                </label>
                <div class="controls">
                    <select id='caste_left' name='caste_left' class="span10">
                        <option value='0'>Any</option>
                        <?php $sql="SELECT * FROM `castes`" ; $result=_db($sql); while($caste=mysqli_fetch_row($result)) { echo "<option value='".$caste[ '0']. "'>".$caste[ '1']. "</option>"; }?>
                    </select>
                </div>
            </div>


            <input type="submit" class="btn" name="submit" value="search" />
        </form>
</div>