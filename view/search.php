<?php session_start();
$id=$_SESSION['_JMUID'];
if(!isset($_SESSION['_JMEMAIL']))
	{
		header('Location:login.php');
		}
?>

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
<div id="fb-root"></div>
<div class="yellow_bg"></div>
<div class="cm_logo"><img src="img/cm_logo.png"></div>
<div class="box">
<?php require_once('menu.php');?>
<div class="container-fluid">
<section class="row-fluid">
<?php require_once('ads.php'); ?>
<div class="span9">
                    <form class="form-horizontal" method="post" action="../control/match.php" onSubmit="return partner();">

                        <?php 
						$id=$_SESSION[ '_JMUID']; 
						$sql = "SELECT `gender`, `start_age`, `end_age`, `height_from`, `height_to`, `marital_status`, `child_live`, `physical_status`, `eat_habit`, `smk_habit`, `drnk_habit`, `denomination`, `mother_tongue`, `caste`, `education` FROM `partner` WHERE `partner_id`='$id'"; 
						
						$result=_db($sql); 
						$data=mysqli_fetch_row($result);  ?>
                        <input type="hidden" name="gender" id="gender" value="<?php echo $data[0]; ?>" />
                        <input type="hidden" name="start_age" id="start_age" value="<?php echo $data[1]; ?>" />
                        <input type="hidden" name="end_age" id="end_age" value="<?php echo $data[2]; ?>" />
                        <input type="hidden" name="height_from" id="height_from" value="<?php echo $data[3]; ?>" />
                        <input type="hidden" name="height_to" id="height_to" value="<?php echo $data[4]; ?>" />
                        <input type="hidden" name="marital" id="marital" value="<?php $marital=explode('~',$data[5]); echo $marital[0];  ?>" />
                        <input type="hidden" name="child_live" id="child_live" value="<?php echo $data[6]; ?>" />
                        <input type="hidden" name="physical_status" id="physical_status" value="<?php echo $data[7]; ?>" />
                        <input type="hidden" name="denom" id="denom" value="<?php echo $data[11]; ?>" />
                        <input type="hidden" name="mother_tounge" id="mother_tounge" value="<?php echo $data[12]; ?>" />
                        <input type="hidden" name="caste" id="caste" value="<?php echo $data[13]; ?>" />
                        <input type="hidden" name="education" id="education" value="<?php echo $data[14]; ?>" />
                        <input type="hidden" name="country" id="country" value="" />

                        <div class="control-group">
                            <label class="control-label" for="stAge"><span style="color:#FF0000">&lowast;</span>  <strong>Age</strong>
                            </label>
                            <div class="controls">
                                <select name="stAge" id="stAge" onchange="valAge();">
                                    <option value='0'>-- From --</option>
                                    <?php for($i=18;$i<=50;$i++){echo "<option value='$i'>$i</option>";}?>
                                </select>&nbsp;to&nbsp;

                                <select name="enAge" id="enAge" onchange="valAge();">
                                    <option value='0'>-- To --</option>
                                    <?php for($i=18;$i<=50;$i++){echo "<option value='$i'>$i</option>";}?>
                                </select>&nbsp;Years
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
                        <div class="control-group">
                            <label class="control-label"><span style="color:#FF0000">&lowast;</span>  <strong>Denomination</strong>
                            </label>
                            <div class="controls">
                                <select id='denom_left' name='denom_left' multiple onDblClick="moveOptions(denom_left, denom_right); anyChk(denom_left, denom_right);">
                                    <option value='0'>Any</option>
                                    <?php $sql="SELECT * FROM `denominations`" ; $result=_db($sql); while($data=mysqli_fetch_row($result)){ echo "<option value='".$data[ '0']. "'>".$data[ '1']. "</option>";}?>
                                </select>

                                <input type="button" class='btn' value="Add" onClick="moveOptions(denom_left, denom_right); anyChk(denom_left, denom_right);">
                                <input type="button" class='btn' value="Remove" onClick="removeOptions(denom_left, denom_right);">

                                <select multiple size="5" name="denom_right" id="denom_right" onDblClick="removeOptions(denom_left, denom_right);">
                                    <option value="0">Any</option>
                                </select>
                            </div>
                        </div>


                        <div class="control-group">
                            <label for="mothertongue_left" class="control-label"><span style="color:#FF0000">&lowast;</span>  <strong>Mother Tongue</strong>
                            </label>
                            <div class="controls">
                                <select id='mothertongue_left' name='mothertongue_left' multiple onDblClick="moveOptions(mothertongue_left, mothertongue_right); anyChk(mothertongue_left, mothertongue_right);">
                                    <option value='0'>Any</option>
                                    <?php $sql="SELECT * FROM `languages`" ; $result=_db($sql); while($data=mysqli_fetch_row($result)) { echo "<option value='".$data[ '0']. "'>".$data[ '1']. "</option>"; }?>
                                </select>

                                <input type="button" class='btn' value="Add" onClick="moveOptions(mothertongue_left, mothertongue_right); anyChk(mothertongue_left, mothertongue_right);">
                                <input type="button" class='btn' value="Remove" onClick="removeOptions(mothertongue_left, mothertongue_right);">

                                <select multiple size="5" name="mothertongue_right" id="mothertongue_right" onDblClick="removeOptions(mothertongue_left, mothertongue_right);">
                                    <option value="0">Any</option>
                                </select>
                            </div>
                        </div>

                        <div class="control-group">
                            <label for="caste_left" class="control-label"><span style="color:#FF0000">&lowast;</span>  <strong>Caste</strong>
                            </label>
                            <div class="controls">
                                <select id='caste_left' name='caste_left' multiple onDblClick="moveOptions(caste_left, caste_right);anyChk(caste_left, caste_right);">
                                    <option value='0'>Any</option>
                                    <?php $sql="SELECT * FROM `castes`" ; $result=_db($sql); while($data=mysqli_fetch_row($result)) { echo "<option value='".$data[ '0']. "'>".$data[ '1']. "</option>"; }?>
                                </select>

                                <input type="button" class='btn' value="Add" onClick="moveOptions(caste_left, caste_right); anyChk(caste_left, caste_right);">
                                <input type="button" class='btn' value="Remove" onClick="removeOptions(caste_left, caste_right);">

                                <select multiple size="5" name="caste_right" id="caste_right" onDblClick="removeOptions(caste_left, caste_right);">
                                    <option value="0">Any</option>
                                </select>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label"><span style="color:#FF0000">&lowast;</span>  <strong>Country Living In</strong>
                            </label>
                            <div class="controls">
                                <select id='country_left' name='country_left' multiple onDblClick="moveOptions(country_left, country_right);anyChk(country_left, country_right);changecountry(country_left, country_right);citizenshipChk();">
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
                                    <?php $sql="SELECT `country_id`, `country_name` FROM `countries` " ; $result=_db($sql); while($data=mysqli_fetch_row($result)) { echo "<option value='".$data[ '0']. "'>".$data[ '1']. "</option>"; }?>
                                </select>

                                <input type="button" class='btn' value="Add" onClick="moveOptions(country_left, country_right);anyChk(country_left, country_right);changecountry(country_left, country_right);citizenshipChk();">
                                <input type="button" class='btn' value="Remove" onClick="removeOptions(country_left, country_right);removeCountry();citizenshipChk();">

                                <select multiple size="5" name="country_right" id="country_right" onDblClick="removeOptions(country_left, country_right);anyChk(country_left, country_right);removeCountry();citizenshipChk();">
                                    <option value="0">Any</option>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><span style="color:#FF0000">&lowast;</span><strong>Education</strong>
                            </label>
                            <div class="controls">
                                <select id='education_left' name='education_left' multiple onDblClick="moveOptions(education_left, education_right);anyChk(education_left, education_right);">
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

                                <select multiple id='education_right' name='education_right' size="5" onDblClick="removeOptions(education_left, education_right)">
                                    <option value="0">Any</option>
                                </select>
                            </div>
                        </div>

                    
                        <div class="control-group">
                            <div class="controls">
                                <input type="submit" name="submit" class="btn" value="submit" />
                            </div>
                        </div>
                    </form>
                    </div>
<?php require_once('footer.php');?>