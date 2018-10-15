<?php session_start(); 
include "../control/functions.php"; 
if(!isset($_SESSION['_JMEMAIL'])) {
	 header( 'Location:index.php'); 
	 } ?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/jquery.Jcrop.css" type="text/css" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="icon" href="img/favicon.ico">
    <title>Jamesmatrimony.com</title>
</head>

<body onLoad="partner_update();">
    <div class="yellow_bg"></div>
    <div class="cm_logo">
        <img src="img/cm_logo.png">
    </div>
    <div class="box">
        <div class="container-fluid">
            <div class="row-fluid">
               <div class="logo_bg" style="margin-left: -20px;">
                    <a href="index.php">
                        <img style="margin-top: -75px;" src="img/logo.png" alt="JM_logo">
                    </a>
                </div>
                <div class="progress progress-warning progress-striped">
                        <div class="bar" style="width: 40%;"></div>
                    </div>
            </div>
            <div class="form-wizard">
                    <div class="navbar steps">
                        <div class="navbar-inner">
                            <ul class="row-fluid nav nav-pills">
                                <li class="span" style="width:15%">
                                    <a class="step"> <span class="number">1</span>
                                        <span class="desc"><i class="icon-ok"></i> Register</span> 
                                    </a>
                                </li>
                                <li class="span" style="width:19%">
                                    <a class="step"> <span class="number">2</span>
                                        <span class="desc"><i class="icon-ok"></i> Personal details</span> 
                                    </a>
                                </li>
                                <li class="span" style="width:15%">
                                    <a class="step"> <span class="number">3</span>
                                        <span class="desc"><i class="icon-ok"></i> Interests</span> 
                                    </a>
                                </li>
                                <li class="span active" style="width:19%">
                                    <a class="step active"> <span class="number">4</span>
                                        <span class="desc"><i class="icon-ok"></i> Partner details</span> 
                                    </a>
                                </li>
                                <li class="span" style="width:17%">
                                    <a class="step"> <span class="number">5</span>
                                        <span class="desc"><i class="icon-ok"></i> Photo upload</span> 
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
             
            <div class="row-fluid">
                <div class="alert alert-error" style="display:none;" id="error">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <h4>Warning!</h4>
                    <p id="errorTxt" class="text-error"></p>
                </div>
                <section class="row-fluid">
                    <form class="form-horizontal" method="post" action="../control/partner.php" onSubmit="return partner();">
                        <?php 
						$id=$_SESSION['_JMUID'];
$sql="SELECT `gender`, `start_age`, `end_age`, `height_from`, `height_to`, `marital_status`, `child_live`, `physical_status`, `eat_habit`, `smk_habit`, `drnk_habit`, `denomination`, `mother_tongue`, `caste`, `education`, `country`, `citizenship` FROM `partner` WHERE `partner_id`='$id'";
$result=_db($sql);
$data=mysqli_fetch_row($result);
$sql="SELECT `edu_type` FROM `education` WHERE `education_id`=".$data[14];
$result=_db($sql);
$education_type=mysqli_fetch_row($result);
                        ?>
                        <input type="hidden" name="gender" id="gender" value="<?php echo $data[0]; ?>" />
                        <input type="hidden" name="start_age" id="start_age" value="<?php echo $data[1]; ?>" />
                        <input type="hidden" name="end_age" id="end_age" value="<?php echo $data[2]; ?>" />
                        <input type="hidden" name="height_from" id="height_from" value="<?php echo $data[3]; ?>" />
                        <input type="hidden" name="height_to" id="height_to" value="<?php echo $data[4]; ?>" />
                        <input type="hidden" name="marital" id="marital" value="<?php echo $data[5]; ?>" />
                        <input type="hidden" name="child_live" id="child_live" value="<?php echo $data[6]; ?>" />
                        <input type="hidden" name="physical_status" id="physical_status" value="<?php echo $data[7]; ?>" />
                        <input type="hidden" name="eat_habit" id="eat_habit" value="<?php echo $data[8]; ?>" />
                        <input type="hidden" name="smk_habit" id="smk_habit" value="<?php echo $data[9]; ?>" />
                        <input type="hidden" name="drnk_habit" id="drnk_habit" value="<?php echo $data[10]; ?>" />
                        <input type="hidden" name="denom" id="denom" value="<?php echo $data[11]; ?>" />
                        <input type="hidden" name="mother_tounge" id="mother_tounge" value="<?php echo $data[12]; ?>" />
                        <input type="hidden" name="caste" id="caste" value="<?php echo $data[13]; ?>" />
                        <input type="hidden" name="education" id="education" value="<?php echo $data[14]; ?>" />
                        <input type="hidden" name="education_type" id="education_type" value="<?php echo $education_type[0]; ?>" />
                        <input type="hidden" name="country" id="country" value="<?php echo $data[15]; ?>" />
                        <input type="hidden" name="citizenship" id="citizenship" value="<?php echo $data[16]; ?>" />
                        <input type="hidden" name="usastate" id="usastate" value="" />
                        <input type="hidden" name="instate" id="instate" value="" />
                        <input type="hidden" name="city" id="city" value="" />
                        <input type="hidden" name="occupation" id="occupation" value="" />
                        <div class="control-group">
                            <label class="control-label" for="stAge"><span style="color:#FF0000">&lowast;</span>  <strong>Preferred Age</strong>
                            </label>
                            <div class="controls">
                                <select name="stAge" id="stAge" onchange="valAge();">
                                    <option value='0'>-- From --</option>
                                    <?php for($i=18;$i<=50;$i++){echo "<option value='$i'>$i</option>";}?>
                                </select>&nbsp;to&nbsp;
                                <select name="enAge" id="enAge" onchange="valAge();">
                                    <option value='0'>-- To --</option>
                                    <?php for($i=18;$i<=50;$i++){echo "<option value='$i'>$i</option>";}?>
                                </select>&nbsp;Years</div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><span style="color:#FF0000">&lowast;</span>  <strong>Marital Status</strong> 
                            </label>
                            <div class="controls">
                                <label for="maritalStatus1" class="pull-left">
                                    <input type="checkbox" id="maritalStatus1" name="maritalStatus" value="0" onclick="maritalChk(this.value);" />Any</label>
                                <label for="maritalStatus2" class="pull-left">
                                    <input type="checkbox" id="maritalStatus2" name="maritalStatus" value="1" onclick="maritalChk(this.value);" />unmarried</label>
                                <label for="maritalStatus3" class="pull-left">
                                    <input type="checkbox" id="maritalStatus3" name="maritalStatus" value="2" onclick="maritalChk(this.value);" />widow/widower</label>
                                <label for="maritalStatus4" class="pull-left">
                                    <input type="checkbox" id="maritalStatus4" name="maritalStatus" value="3" onclick="maritalChk(this.value);" />Divorced</label>
                                <label for="maritalStatus5" class="pull-left">
                                    <input type="checkbox" id="maritalStatus5" name="maritalStatus" value="4" onclick="maritalChk(this.value);" />Awaiting divorce</label>
                            </div>
                        </div>
                        <div class="control-group" style="display:none;" id="havchildrendiv">
                            <label class="control-label"><strong>Have Children</strong>
                            </label>
                            <div class="controls">
                                <label for="havChild1" class="pull-left">
                                    <input name="havChild" id="havChild1" value="0" type="radio">No</label>
                                <label for="havChild2" class="pull-left">
                                    <input name="havChild" id="havChild2" value="1" type="radio">Yes. living together</label>
                                <label for="havChild3" class="pull-left">
                                    <input name="havChild" id="havChild3" value="2" type="radio">Yes. not living together</label>
                                <label for="havChild4" class="pull-left">
                                    <input name="havChild" id="havChild4" value="3" type="radio" checked>Doesn't matter</label>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="feet"><span style="color:#FF0000">&lowast;</span>  <strong>Height</strong>
                            </label>
                            <div class="controls">
                                <select name="fromFeet" onChange="valHeight()" id="fromFeet">
                                    <option value='0'>-- From Height Feet --</option>
                                    <option value='4-6'>4 ft - 6 In</option>
                                    <option value='4-7'>4 ft - 7 In</option>
                                    <option value='4-8'>4 ft - 8 In</option>
                                    <option value='4-9'>4 ft - 9 In</option>
                                    <option value='4-10'>4 ft - 10 In</option>
                                    <option value='4-11'>4 ft - 11 In</option>
                                    <?php for($i=5;$i<=6;$i++){ for($j=0;$j<=11;$j++){ echo "<option value='$i-$j'>$i". " ft"; if($j==0){}else{ echo " - ".$j. " In";} echo "</option>"; } } ?>
                                    <option value='7-0'>7 ft</option>
                                </select>to
                                <select name="toFeet" onChange="valHeight()" id="toFeet">
                                    <option value='0'>-- To Height Feet --</option>
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
                            <label class="control-label"><span style="color:#FF0000">&lowast;</span>  <strong>Physical Status</strong>
                            </label>
                            <div class="controls">
                                <label for="physicStatus1" class="pull-left">
                                    <input type="radio" name="physicStatus" id="physicStatus1" value="1" />Normal</label>
                                <label for="physicStatus2" class="pull-left">
                                    <input type="radio" name="physicStatus" id="physicStatus2" value="2" />Physically challenged</label>
                                <label for="physicStatus3" class="pull-left">
                                    <input type="radio" name="physicStatus" id="physicStatus3" value="0" checked />Doesn't matter</label>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><span style="color:#FF0000">&lowast;</span>  <strong>Denomination</strong>
                            </label>
                            <div class="controls">
                                <select id='denom_left' name='denom_left' multiple size=6 onDblClick="moveOptions(denom_left, denom_right); anyChk(denom_left, denom_right);">
                                    <option value='0'>Any</option>
                                    <?php $sql="SELECT * FROM `denominations`" ;
$result=_db($sql);
while($data=mysqli_fetch_row($result)){ echo "<option value='".$data[ '0']. "'>".$data[ '1']. "</option>";}?>
                                </select>
                                <input type="button" class='btn' value="Add" onClick="moveOptions(denom_left, denom_right); anyChk(denom_left, denom_right);">
                                <input type="button" class='btn' value="Remove" onClick="removeOptions(denom_left, denom_right);">
                                <select multiple size=6  name="denom_right" id="denom_right" onDblClick="removeOptions(denom_left, denom_right);">
                                    <option value="0">Any</option>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="mothertongue_left" class="control-label"><span style="color:#FF0000">&lowast;</span>  <strong>Mother Tongue</strong>
                            </label>
                            <div class="controls">
                                <select id='mothertongue_left' name='mothertongue_left' multiple size=6 onDblClick="moveOptions(mothertongue_left, mothertongue_right); anyChk(mothertongue_left, mothertongue_right);">
                                    <option value='0'>Any</option>
                                    <?php $sql="SELECT * FROM `languages`" ;
$result=_db($sql);
while($data=mysqli_fetch_row($result)) { echo "<option value='".$data[ '0']. "'>".$data[ '1']. "</option>";
}?>
                                </select>
                                <input type="button" class='btn' value="Add" onClick="moveOptions(mothertongue_left, mothertongue_right); anyChk(mothertongue_left, mothertongue_right);">
                                <input type="button" class='btn' value="Remove" onClick="removeOptions(mothertongue_left, mothertongue_right);">
                                <select multiple size=6  name="mothertongue_right" id="mothertongue_right" onDblClick="removeOptions(mothertongue_left, mothertongue_right);">
                                    <option value="0">Any</option>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="caste_left" class="control-label"><span style="color:#FF0000">&lowast;</span>  <strong>Caste</strong>
                            </label>
                            <div class="controls">
                                <select id='caste_left' name='caste_left' multiple size=6 onDblClick="moveOptions(caste_left, caste_right);anyChk(caste_left, caste_right);">
                                    <option value='0'>Any</option>
                                    <?php $sql="SELECT * FROM `castes`" ;
$result=_db($sql);
while($data=mysqli_fetch_row($result)) { echo "<option value='".$data[ '0']. "'>".$data[ '1']. "</option>";
}?>
                                </select>
                                <input type="button" class='btn' value="Add" onClick="moveOptions(caste_left, caste_right); anyChk(caste_left, caste_right);">
                                <input type="button" class='btn' value="Remove" onClick="removeOptions(caste_left, caste_right);">
                                <select multiple size=6  name="caste_right" id="caste_right" onDblClick="removeOptions(caste_left, caste_right);">
                                    <option value="0">Any</option>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><span style="color:#FF0000">&lowast;</span>  <strong>Eating Habits</strong>
                            </label>
                            <div class="controls">
                                <label for="eating_habit1" class="pull-left">
                                    <input type="checkbox" onclick="eatingChk(this.value);" name="eating_habit" id="eating_habit1" value="1" />Vegetarian</label>
                                <label for="eating_habit2" class="pull-left">
                                    <input type="checkbox" onclick="eatingChk(this.value);" name="eating_habit" id="eating_habit2" value="2" />Non-Vegetarian</label>
                                <label for="eating_habit3" class="pull-left">
                                    <input type="checkbox" onclick="eatingChk(this.value);" name="eating_habit" id="eating_habit3" value="3" />Eggetarian</label>
                                <label for="eating_habit4" class="pull-left">
                                    <input type="checkbox" onclick="eatingChk(this.value);" name="eating_habit" id="eating_habit4" value="4" />Doesn't Matter</label>
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="drinking_habit" class="control-label"><span style="color:#FF0000">&lowast;</span>  <strong>Drinking Habits</strong>
                            </label>
                            <div class="controls">
                                <label for="drinking_habit1" class="pull-left">
                                    <input type="checkbox" onclick="drinkingChk(this.value);" name="drinking_habit" id="drinking_habit1" value="1" />Non-Drinker</label>
                                <label for="drinking_habit2" class="pull-left">
                                    <input type="checkbox" onclick="drinkingChk(this.value);" name="drinking_habit" id="drinking_habit2" value="2" />Light/Social Drinker</label>
                                <label for="drinking_habit3" class="pull-left">
                                    <input type="checkbox" onclick="drinkingChk(this.value);" name="drinking_habit" id="drinking_habit3" value="3" />Regular Drinker</label>
                                <label for="drinking_habit4" class="pull-left">
                                    <input type="checkbox" onclick="drinkingChk(this.value);" name="drinking_habit" id="drinking_habit4" value="4" />Doesn't Matter</label>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><span style="color:#FF0000">&lowast;</span><strong>Smoking Habits</strong>
                            </label>
                            <div class="controls">
                                <label for="smoke_habit1" class="pull-left">
                                    <input type="checkbox" onclick="smokingChk(this.value);" name="smoke_habit" id="smoke_habit1" value="1" />Non-Smoker</label>
                                <label for="smoke_habit2" class="pull-left">
                                    <input type="checkbox" onclick="smokingChk(this.value);" name="smoke_habit" id="smoke_habit2" value="2" />Light/Social Smoker</label>
                                <label for="smoke_habit3" class="pull-left">
                                    <input type="checkbox" onclick="smokingChk(this.value);" name="smoke_habit" id="smoke_habit3" value="3" />Regular Smoker</label>
                                <label for="smoke_habit4" class="pull-left">
                                    <input type="checkbox" onclick="smokingChk(this.value);" name="smoke_habit" id="smoke_habit4" value="4" />Doesn't Matter</label>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><span style="color:#FF0000">&lowast;</span>  <strong>Country Living In</strong>
                            </label>
                            <div class="controls">
                                <select id='country_left' name='country_left' multiple size=6 onDblClick="moveOptions(country_left, country_right);anyChk(country_left, country_right);changecountry(country_left, country_right);citizenshipChk();">
                                    <option value='0'>Any</option>
                                    <option value='93'>India</option>
                                    <option value='211'>United States of America</option>
                                    <option value='209'>United Arab Emirates</option>
                                    <option value='210'>United Kingdom</option>
                                    <option value='121'>Malaysia</option>
                                    <option value='13'>Australia</option>
                                    <option value='176'>Saudi Arabia</option>
                                    <option value='37'>Canada</option>
                                    <option value='181'>Singapore</option>
                                    <option value='107'>Kuwait</option>
                                    <optgroup label="-------------------------"></optgroup>
                                    <?php $sql="SELECT `country_id`, `country_name` FROM `countries` " ;
$result=_db($sql);
while($data=mysqli_fetch_row($result)) { echo "<option value='".$data[ '0']. "'>".$data[ '1'].
                                    "</option>";
}?>
                                </select>
                                <input type="button" class='btn' value="Add" onClick="moveOptions(country_left, country_right);anyChk(country_left, country_right);changecountry(country_left, country_right);citizenshipChk();">
                                <input type="button" class='btn' value="Remove" onClick="removeOptions(country_left, country_right);removeCountry();citizenshipChk();">
                                <select multiple size=6  name="country_right" id="country_right" onDblClick="removeOptions(country_left, country_right);anyChk(country_left, country_right);removeCountry();citizenshipChk();">
                                    <option value="0">Any</option>
                                </select>
                            </div>
                        </div>
                        <div class="control-group" style="display:none;" id="UsaStateDiv">
                            <label class="control-label"><strong>Residing State In USA</strong>
                            </label>
                            <div class="controls">
                                <select multiple size=6  name="usaState_left" id="usaState_left" onDblClick="moveOptions(usaState_left, usaState_right);anyChk(usaState_left, usaState_right);">
                                    <option value="0">Any</option>
                                    <?php $sql="SELECT `state_id`, `state_name` FROM `states` WHERE `country_id`='211'" ;
$result=_db($sql);
while($data=mysqli_fetch_row($result)) { echo "<option value='".$data[ '0']. "'>".$data[
                                    '1']. "</option>";
}?>
                                </select>
                                <input type="button" class='btn' value="Add" onClick="moveOptions(usaState_left, usaState_right);anyChk(usaState_left, usaState_right);">
                                <input type="button" class='btn' value="Remove" onClick="removeOptions(usaState_left, usaState_right);">
                                <select multiple size=6 id="usaState_right" name="usaState_right"  onDblClick="removeOptions(usaState_left, usaState_right);">
                                    <option value="0">Any</option>
                                </select>
                            </div>
                        </div>
                        <div class="control-group" style="display:none;" id="InStateDiv">
                            <label class="control-label"><strong>Residing State In India</strong>
                            </label>
                            <div class="controls">
                                <select multiple size=6  name="inState_left" id="inState_left" onDblClick="moveOptions(inState_left, inState_right);anyChk(inState_left, inState_right);showCity();">
                                    <option value="0">Any</option>
                                    <?php $sql="SELECT `state_id`, `state_name` FROM `states` WHERE `country_id`='93'" ;
$result=_db($sql);
while($data=mysqli_fetch_row($result)) { echo "<option value='".$data[ '0']. "'>".$data[
                                    '1']. "</option>";
} ?>
                                </select>
                                <input type="button" class='btn' value="Add" onClick="moveOptions(inState_left, inState_right);anyChk(inState_left, inState_right);showCity();">
                                <input type="button" class='btn' value="Remove" onClick="removeOptions(inState_left, inState_right);showCity();">
                                <select multiple size=6 id="inState_right" name="inState_right" size='5' onDblClick="removeOptions(inState_left, inState_right);showCity();">
                                    <option value="0">Any</option>
                                </select>
                            </div>
                        </div>
                        <div class="control-group" style="display:none;" id="cityDiv">
                            <label class="control-label"><strong>City</strong>
                            </label>
                            <div class="controls">
                                <select id='city_left' name='city_left' multiple size=6 onDblClick="moveOptions(city_left, city_right);anyChk(city_left, city_right);">
                                    <option value="0">Any</option>
                                </select>
                                <input type="button" class='btn' value="Add" onClick="moveOptions(city_left, city_right); anyChk(city_left, city_right);">
                                <input type="button" class='btn' value="Remove" onClick="removeOptions(city_left, city_right);">
                                <select multiple size=6 id="city_right" name="city_right"  onDblClick="removeOptions(city_left, city_right);">
                                    <option value="0">Any</option>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="citizenship" class="control-label"><span style="color:#FF0000">&lowast;</span>  <strong>Citizenship</strong>
                            </label>
                            <div class="controls">
                                <select id='citizenship_left' name='citizenship_left' multiple size=6 onDblClick="moveOptions(citizenship_left, citizenship_right); anyChk(citizenship_left, citizenship_right);citizenshipChk();">
                                    <option value='0'>Any</option>
                                    <option value='93'>India</option>
                                    <option value='211'>United States of America</option>
                                    <option value='209'>United Arab Emirates</option>
                                    <option value='210'>United Kingdom</option>
                                    <option value='121'>Malaysia</option>
                                    <option value='13'>Australia</option>
                                    <option value='176'>Saudi Arabia</option>
                                    <option value='37'>Canada</option>
                                    <option value='181'>Singapore</option>
                                    <option value='107'>Kuwait</option>
                                    <optgroup label="-------------------------"></optgroup>
                                    <?php $sql="SELECT `country_id`, `country_name` FROM `countries`" ;
$result=_db($sql);
while($data=mysqli_fetch_row($result)) { echo "<option value='".$data[ '0']. "'>".$data[ '1'].
                                    "</option>";
}?>
                                </select>
                                <input type="button" class='btn' value="Add" onClick="moveOptions(citizenship_left, citizenship_right); anyChk(citizenship_left, citizenship_right);citizenshipChk();">
                                <input type="button" class='btn' value="Remove" onClick="removeOptions(citizenship_left, citizenship_right);citizenshipChk();">
                                <select multiple size=6 id="citizenship_right" name="citizenship_right"  onDblClick="removeOptions(citizenship_left, citizenship_right); anyChk(citizenship_left, citizenship_right);citizenshipChk();">
                                    <option value='0'>Any</option>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><span style="color:#FF0000">&lowast;</span><strong>Education</strong>
                            </label>
                            <div class="controls">
                                <label for="edu_type1" class="pull-left">
                                    <input name="edu_type" id="edu_type1" onClick="eduOption(education_left,education_right,1)" value="1" type="radio">Any Education</label>
                                <label for="edu_type2" class="pull-left">
                                    <input name="edu_type" id="edu_type2" onClick="eduOption(education_left,education_right,2)" value="2" type="radio">Any Degree</label>
                                <label for="edu_type3" class="pull-left">
                                    <input name="edu_type" id="edu_type3" onClick="eduOption(education_left,education_right,3)" value="3" type="radio">Any Professional Degree</label>
                                <label for="edu_type4" class="pull-left">
                                    <input name="edu_type" id="edu_type4" onClick="eduOption(education_left,education_right,4)" value="4" type="radio">Select Preferred Degree</label>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">
                                <select id='education_left' name='education_left' multiple size=6 onDblClick="moveOptions(education_left, education_right);anyChk(education_left, education_right);">
                                    <option value="0">Any</option>
                                    <option value='1'>Bachelors - Engineering / Computers / Others</option>
                                    <option value='2'>Masters - Engineering / Computers / Others</option>
                                    <option value='3'>Bachelors - Arts / Science / Commerce / Others</option>
                                    <option value='4'>Masters - Arts / Science / Commerce / Others</option>
                                    <option value='5'>Bachelors - Management / Others</option>
                                    <option value='6'>Masters - Management / Others</option>
                                    <option value='7'>Bachelors - Medicine - General / Dental / Surgeon / Others</option>
                                    <option value='8'>Masters - Medicine - General / Dental / Surgeon / Others</option>
                                    <option value='9'>Bachelors - Legal / Others</option>
                                    <option value='10'>Masters - Legal / Others</option>
                                    <option value='11'>Finance - ICWAI / CA / CS/ CFA / Others</option>
                                    <option value='12'>Service - IAS / IPS / IRS / IES / IFS / Others</option>
                                    <option value='13'>PhD</option>
                                    <option value='14'>Diploma / Others</option>
                                    <option value='15'>High school / Scoundary</option>
                                </select>
                                <input type="button" class='btn' value="Add" onClick="moveOptions(education_left, education_right); anyChk(education_left, education_right);">
                                <input type="button" class='btn' value="Remove" onClick="removeOptions(education_left, education_right)">
                                <select multiple size=6 id='education_right' name='education_right'  onDblClick="removeOptions(education_left, education_right)">
                                    <option value="0">Any</option>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><strong>Occupation</strong>
                            </label>
                            <div class="controls">
                                <select id='occupation_left' name='occupation_left' multiple size=6 onDblClick="moveOptions(occupation_left, occupation_right);anyChk(occupation_left, occupation_right);">
                                    <option value='0'>Any</option>
                                    <?php $sql="SELECT * FROM `occupation`" ;
$result=_db($sql);
while($data=mysqli_fetch_row($result)) { echo "<option value='".$data[ '0']. "'>".$data[ '1']. "</option>";
}?>
                                </select>
                                <input type="button" class='btn' value="Add" onClick="moveOptions(occupation_left, occupation_right); anyChk(occupation_left, occupation_right);">
                                <input type="button" class='btn' value="Remove" onClick="removeOptions(occupation_left, occupation_right)">
                                <select multiple size=6 id='occupation_right' name='occupation_right'  onDblClick="removeOptions(occupation_left, occupation_right)">
                                    <option value="0">Any</option>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><strong>Annual Income</strong>
                            </label>
                            <div class="controls">
                                <select name="from_income" size="1" id="from_income" onChange="incomeVal();">
                                    <option value="0">Any</option>
                                    <option value="49999">Less than Rs.50 thousand</option>
                                    <option value="50000">Rs.50 thousand</option>
                                    <option value="100000">Rs.1 Lakh</option>
                                    <option value="200000">Rs.2 Lakh</option>
                                    <option value="300000">Rs.3 Lakh</option>
                                    <option value="400000">Rs.4 Lakh</option>
                                    <option value="500000">Rs.5 Lakh</option>
                                    <option value="600000">Rs.6 Lakh</option>
                                    <option value="700000">Rs.7 Lakh</option>
                                    <option value="800000">Rs.8 Lakh</option>
                                    <option value="900000">Rs.9 Lakh</option>
                                    <option value="1000000">Rs.10 Lakh</option>
                                    <option value="1200000">Rs.12 Lakh</option>
                                    <option value="1400000">Rs.14 Lakh</option>
                                    <option value="1600000">Rs.16 Lakh</option>
                                    <option value="1800000">Rs.18 Lakh</option>
                                    <option value="2000000">Rs.20 Lakh</option>
                                    <option value="2500000">Rs.25 Lakh</option>
                                    <option value="3000000">Rs.30 Lakh</option>
                                    <option value="3500000">Rs.35 Lakh</option>
                                    <option value="4000000">Rs.40 Lakh</option>
                                    <option value="4500000">Rs.45 Lakh</option>
                                    <option value="5000000">Rs.50 Lakh</option>
                                    <option value="6000000">Rs.60 Lakh</option>
                                    <option value="7000000">Rs.70 Lakh</option>
                                    <option value="8000000">Rs.80 Lakh</option>
                                    <option value="9000000">Rs.90 Lakh</option>
                                    <option value="10000000">Rs.1 Crore</option>
                                    <option value="10000001">Rs.1 Crore &amp; Above</option>
                                </select>&nbsp;<span id="annualIncome" style="display:none;">to&nbsp;
                                    <select name="to_income" size="1" id="to_income">
                                    <option value="0">Any</option>
                                    <option value="100000">Rs.1 Lakh</option>
                                    <option value="200000">Rs.2 Lakh</option>
                                    <option value="300000">Rs.3 Lakh</option>
                                    <option value="400000">Rs.4 Lakh</option>
                                    <option value="500000">Rs.5 Lakh</option>
                                    <option value="600000">Rs.6 Lakh</option>
                                    <option value="700000">Rs.7 Lakh</option>
                                    <option value="800000">Rs.8 Lakh</option>
                                    <option value="900000">Rs.9 Lakh</option>
                                    <option value="1000000">Rs.10 Lakh</option>
                                    <option value="1200000">Rs.12 Lakh</option>
                                    <option value="1400000">Rs.14 Lakh</option>
                                    <option value="1600000">Rs.16 Lakh</option>
                                    <option value="1800000">Rs.18 Lakh</option>
                                    <option value="2000000">Rs.20 Lakh</option>
                                    <option value="2500000">Rs.25 Lakh</option>
                                    <option value="3000000">Rs.30 Lakh</option>
                                    <option value="3500000">Rs.35 Lakh</option>
                                    <option value="4000000">Rs.40 Lakh</option>
                                    <option value="4500000">Rs.45 Lakh</option>
                                    <option value="5000000">Rs.50 Lakh</option>
                                    <option value="6000000">Rs.60 Lakh</option>
                                    <option value="7000000">Rs.70 Lakh</option>
                                    <option value="8000000">Rs.80 Lakh</option>
                                    <option value="9000000">Rs.90 Lakh</option>
                                    <option value="10000000">Rs.1 Crore</option>
                                    <option value="10000001">Rs.1 Crore &amp; Above</option>       
                                    </select>
                                   <span id="incomeTxt">&nbsp;</span>
                                </span>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><strong>Partner Description</strong>
                            </label>
                            <div class="controls">
                                <textarea name='description' id='description' title='spellcheck' rows="5" class="span7" placeholder="Describe your expectations and what you're looking for in a partner."></textarea>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">
                                <input type="submit" name="submit" class="btn" value="submit" />
                            </div>
                        </div>
                    </form>
                </section>
            </div>
            <p align="center">&copy; 2013 Reserved to christianmatrimony.com</p>
        </div>
        <!-- end of box -->
        <script src="js/jquery-2.0.3.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/custom.js"></script>
        <script src="js/partner_val.js"></script>
</body>

</html>