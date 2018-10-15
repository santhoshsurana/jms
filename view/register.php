<?php session_start(); include "../control/functions.php"; if(!isset($_POST[ 'submit'])) { header( 'Location:index.php'); } ?>
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

<body onLoad='register_update();'>
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
                <div class="progress progress-warning progress-striped active">
                    <div class="bar" style="width: 20%;"></div>
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
                            <li class="span active" style="width:19%">
                                <a class="step active"> <span class="number">2</span>
                                    <span class="desc"><i class="icon-ok"></i> Personal details</span> 
                                </a>
                            </li>
                            <li class="span" style="width:15%">
                                <a class="step"> <span class="number">3</span>
                                    <span class="desc"><i class="icon-ok"></i> Interests</span> 
                                </a>
                            </li>
                            <li class="span" style="width:19%">
                                <a class="step"> <span class="number">4</span>
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
                <div class="row-fluid">
                    <form method="post" action="../control/registration.php" class="form-horizontal" onSubmit='return Register()'>
                        <input type="hidden" name='profile_for' id='profile_for' value="<?php echo $_POST['profile_for']; ?>" />
                        <input type="hidden" name='name' id='name' value="<?php echo $_POST['name']; ?>" />
                        <input type="hidden" id='gender_val' name='gender_val' value="<?php echo $_POST['gender_val']; ?>" />
                        <input type="hidden" name='dob' id='dob' value="<?php echo $_POST['dob']; ?>" />
                        <input type="hidden" name='age' id='age' value="<?php echo $_POST['age']; ?>" />
                        <input type="hidden" id='denom' name='denom' value="<?php echo $_POST['denom']; ?>" />
                        <input type="hidden" id='caste' name='caste' value="<?php echo $_POST['caste']; ?>" />
                        <input type="hidden" name='subcaste' id='subcaste' value="<?php echo $_POST['subcaste']; ?>" />
                        <input type="hidden" id='motherTongue' name='motherTongue' value="<?php echo $_POST['motherTongue']; ?>" />
                        <input type="hidden" id='country' name='country' value="<?php echo $_POST['country']; ?>" />
                        <input type="hidden" id='Mcode' name='Mcode' value="<?php echo $_POST['Mcode']; ?>" />
                        <input type="hidden" id='mobile' name='mobile' value="<?php echo $_POST['mobile']; ?>" />
                        <input type="hidden" name='email' id='email' value="<?php echo $_POST['email']; ?>" />
                        <input type="hidden" name='password' id='password' value="<?php echo $_POST['password']; ?>" />
                        <input type="hidden" name='child_belong' id='child_belong' value="" />
                        <h4>Personal Information</h4>
                        <div class="control-group">
                            <label class="control-label" for='maritalStatus'><strong>Marital status</strong>  <span style="color:#FF0000">&lowast;</span>
                            </label>
                            <div class="controls">
                                <select name='maritalStatus' id='maritalStatus' onChange="maritalClick()">
                                    <option value='0' selected>--- Select ---</option>
                                    <option value='1'>Unmarried</option>
                                    <option value='2'>Widow / Widower</option>
                                    <option value='3'>Divorced</option>
                                    <option value='4'>Awaiting divorce</option>
                                </select>
                            </div>
                        </div>
                        <div class="control-group" style="display:none" id="child_div">
                            <label class="control-label" for="no_child"><strong>No. of children</strong>  <span style="color:#FF0000">&lowast;</span>
                            </label>
                            <div class="controls">
                                <select name="no_child" id="no_child" onChange="noc_Chk()">
                                    <option value="9" selected>- Select -</option>
                                    <option value="0">None</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4 and above</option>
                                </select>
                                <div style="display:none" id="childlive_div">
                                    <label for="childwith_Y">
                                        <input name="childwith" id="childwith_Y" value="1" type="radio">Children living with me</label>
                                    <label for="childwith_N">
                                        <input name="childwith" id="childwith_N" value="2" type="radio">Children not living with me</label>
                                </div>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><strong>Country Living In</strong>
                            </label>
                            <div class="controls">
                                <?php $id=$_POST[ 'country'];
$sql="SELECT `country_name` FROM `countries` WHERE `country_id`='$id'" ;
$result=_db($sql);
$data=mysqli_fetch_row($result);
echo "<input type='text' value='".$data[0].
                                "' readonly />";
?>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for='residingState'><strong>Residing State</strong>  <span style="color:#FF0000">&lowast;</span>
                            </label>
                            <div class="controls">
                                <?php $id=$_POST[ 'country'];
if($id==93 || $id==211){ $sql="SELECT `state_id`, `state_name` FROM `states` WHERE `country_id`='$id'" ;
$result=_db($sql);
echo "<select name='residingState' id='residingState' onChange='showCityReg();'>
					<option value='0'>--- Select ---</option>";
while($data=mysqli_fetch_row($result)) { echo "<option value='".$data[ '0']. "'>".$data[ '1']. "</option>";
} echo "</select>";
}else{ echo
                                "<input type='text' name='residingState' onKeyPress='charChk(event,'name');' onBlur='customState();' id='residingState' maxlength='40' >";
} ?>
                            </div>
                        </div>
                        <div class="control-group" id="cityDiv" style="display:none">
                            <label class="control-label" for='residingCity'><strong>Residing City </strong><span style="color:#FF0000">&lowast;</span>
                            </label>
                            <div class="controls" id="cityTypeDiv">
                                <input type='text' name='residingCity' onKeyPress="charChk(event,'name');" onBlur="customCity();" id='residingCity' value=''>
                            </div>
                        </div>
                        <div style="display:none" id="othrCitizen">
                            <div class="control-group">
                                <label class="control-label"><strong>Citizenship</strong>  <span style="color:#FF0000">&lowast;</span>
                                </label>
                                <div class="controls">
                                    <select id='citizenship' name='citizenship'>
                                        <option value='0'>--- Select ---</option>
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
                                        <option>-------------------------</option>
                                        <?php $sql="SELECT `country_id`, `country_name` FROM `countries`" ;
$result=_db($sql);
while($data=mysqli_fetch_row($result)) { echo "<option value='".$data[ '0'].
                                        "'>".$data[ '1']. "</option>";
}?>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><strong>Resident status</strong>  <span style="color:#FF0000">&lowast;</span>
                                </label>
                                <div class="controls">
                                    <div class=' pull-left'>
                                        <label for='residentStatus1'>
                                            <input type='radio' id='residentStatus1' name='residentStatus' checked value='1'>Permanent Resident</label>
                                    </div>
                                    <div class=' pull-left'>
                                        <label for='residentStatus2'>
                                            <input type='radio' id='residentStatus2' name='residentStatus' value='2'>Work Permit</label>
                                    </div>
                                    <div class=' pull-left'>
                                        <label for='residentStatus3'>
                                            <input type='radio' id='residentStatus3' name='residentStatus' value='3'>Student Visa</label>
                                    </div>
                                    <div class=' pull-left'>
                                        <label for='residentStatus4'>
                                            <input type='radio' id='residentStatus4' name='residentStatus' value='4'>Temporary Visa</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="border: 1px dotted darkred;margin: 5px 0px;"></div>
                        <h4>Physical Attributes</h4>
                        <div class="control-group">
                            <label class="control-label" for="feet"><strong>Height</strong>  <span style="color:#FF0000">&lowast;</span>
                            </label>
                            <div class="controls">
                                <select name="feet" onChange="feetConvert()" id="feet">
                                    <option value='0' selected>--- Feet ---</option>
                                    <option value="4-6">4 ft - 6 In</option>
                                    <option value="4-7">4 ft - 7 In</option>
                                    <option value="4-8">4 ft - 8 In</option>
                                    <option value="4-9">4 ft - 9 In</option>
                                    <option value="4-10">4 ft - 10 In</option>
                                    <option value="4-11">4 ft - 11 In</option>
                                    <option value="5">5 ft</option>
                                    <option value="5-1">5 ft - 1 In</option>
                                    <option value="5-2">5 ft - 2 In</option>
                                    <option value="5-3">5 ft - 3 In</option>
                                    <option value="5-4">5 ft - 4 In</option>
                                    <option value="5-5">5 ft - 5 In</option>
                                    <option value="5-6">5 ft - 6 In</option>
                                    <option value="5-7">5 ft - 7 In</option>
                                    <option value="5-8">5 ft - 8 In</option>
                                    <option value="5-9">5 ft - 9 In</option>
                                    <option value="5-10">5 ft - 10 In</option>
                                    <option value="5-11">5 ft - 11 In</option>
                                    <option value="6">6 ft</option>
                                    <option value="6-1">6 ft - 1 In</option>
                                    <option value="6-2">6 ft - 2 In</option>
                                    <option value="6-3">6 ft - 3 In</option>
                                    <option value="6-4">6 ft - 4 In</option>
                                    <option value="6-5">6 ft - 5 In</option>
                                    <option value="6-6">6 ft - 6 In</option>
                                    <option value="6-7">6 ft - 7 In</option>
                                    <option value="6-8">6 ft - 8 In</option>
                                    <option value="6-9">6 ft - 9 In</option>
                                    <option value="6-10">6 ft - 10 In</option>
                                    <option value="6-11">6 ft - 11 In</option>
                                    <option value="7">7 ft</option>
                                </select>or
                                <select name="cms" onChange="cmsConvert()" id="cms">
                                    <option value='0' selected>--- Cms ---</option>
                                    <?php for($i=137;$i<=213;$i++){ echo "<option value='$i'>$i". " Cms". "</option>";
} ?>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for='kgs'><strong>Weight</strong>  <span style="color:#FF0000">&lowast;</span>
                            </label>
                            <div class="controls">
                                <select id='kgs' name='kgs' onChange="kgsConvert()">
                                    <option value='0' selected title='--Kgs--' alt='--Kgs--'>--Kgs--</option>
                                    <?php for($i=41;$i<=140;$i++){ echo "<option value='$i'>$i". " kgs". "</option>";
} ?>
                                </select>or
                                <select id='lbs' name='lbs' onChange="lbsConvert()">
                                    <option value='0' selected title='--lbs--' alt='--lbs--'>--lbs--</option>
                                    <?php for($i=90;$i<=310;$i++){ echo "<option value='$i'>$i". " lbs". "</option>";
} ?>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><strong>Body Type</strong>  <span style="color:#FF0000">&lowast;</span>
                            </label>
                            <div class="controls">
                                <div class=' pull-left'>
                                    <label for='bodyType1'>
                                        <input type='radio' id='bodyType1' name='bodyType' value='1'>Slim</label>
                                </div>
                                <div class=' pull-left'>
                                    <label for='bodyType2'>
                                        <input type='radio' id='bodyType2' name='bodyType' value='2'>Athletic</label>
                                </div>
                                <div class=' pull-left'>
                                    <label for='bodyType3'>
                                        <input type='radio' id='bodyType3' name='bodyType' value='3'>Average</label>
                                </div>
                                <div class=' pull-left'>
                                    <label for='bodyType4'>
                                        <input type='radio' id='bodyType4' name='bodyType' value='4'>Heavy</label>
                                </div>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><strong>Complexion</strong>  <span style="color:#FF0000">&lowast;</span>
                            </label>
                            <div class="controls">
                                <div class=' pull-left'>
                                    <label for='complexion1'>
                                        <input type='radio' id='complexion1' name='complexion' value='1'>Very Fair</label>
                                </div>
                                <div class=' pull-left'>
                                    <label for='complexion2'>
                                        <input type='radio' id='complexion2' name='complexion' value='2'>Fair</label>
                                </div>
                                <div class=' pull-left'>
                                    <label for='complexion3'>
                                        <input type='radio' id='complexion3' name='complexion' value='3'>Wheatish</label>
                                </div>
                                <div class=' pull-left'>
                                    <label for='complexion4'>
                                        <input type='radio' id='complexion4' name='complexion' value='4'>Wheatish brown</label>
                                </div>
                                <div class=' pull-left'>
                                    <label for='complexion5'>
                                        <input type='radio' id='complexion5' name='complexion' value='5'>Dark</label>
                                </div>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for='physical Status'><strong>Physical Status</strong>  <span style="color:#FF0000">&lowast;</span>
                            </label>
                            <div class="controls">
                                <div class='pull-left'>
                                    <label for='physicalStatus0'>
                                        <input type='radio' id='physicalStatus0' name='physicalStatus' value='1'>Normal</label>
                                </div>
                                <div class='pull-left'>
                                    <label for='physicalStatus1'>
                                        <input type='radio' id='physicalStatus1' name='physicalStatus' value='2'>Physically Challenged</label>
                                </div>
                            </div>
                        </div>
                        <div style="border: 1px dotted darkred;margin: 5px 0px;"></div>
                        <h4>Education & Profession</h4>
                        <div class="control-group">
                            <label class="control-label" for='education'><strong>Highest Education</strong>  <span style="color:#FF0000">&lowast;</span>
                            </label>
                            <div class="controls">
                                <select id='education' name='education' onChange="edu_chang()">
                                    <option value='0' selected>--Select --</option>
                                    <?php $sql="SELECT * FROM `education`"; 
									$result=_db($sql); 
									$flag="";
									while($data=mysqli_fetch_row($result)) { 
									if($data[2]==1){ 
										if($flag!=$data[2]) {
												$flag=$data[2];
												echo "<optgroup label='Bachelors - Engineering / Computers / Others'>";
												} 
											echo "<option value='".$data[ '0']."'>".$data[ '1']. "</option>";
											}
										else if($data[2]==2){ 
											if($flag!=$data[2]) {
												$flag=$data[2];
												echo "</optgroup><optgroup label='Masters - Engineering / Computers / Others'>";
												}
									 		echo "<option value='".$data[ '0']. "'>".$data[ '1']. "</option>";
											} 
										else if($data[2]==3){ 
											if($flag!=$data[2]) {
												$flag=$data[2];
												echo "</optgroup><optgroup label='Bachelors - Arts / Science / Commerce / Others'>";
												}
									 		echo "<option value='".$data[ '0']. "'>".$data[ '1']. "</option>";
											}
										else if($data[2]==4){ 
										if($flag!=$data[2]) {
												$flag=$data[2];
												echo "</optgroup><optgroup label='Masters - Arts / Science / Commerce / Others'>";
												}
												echo "<option value='".$data[ '0']. "'>".$data[ '1']. "</option>";
											}
 										else if($data[2]==5){ 
											if($flag!=$data[2]) {
												$flag=$data[2];
												echo "</optgroup><optgroup label='Bachelors - Management / Others'>";
												}
												echo "<option value='".$data[ '0']. "'>".$data[ '1']. "</option>";
											}
										else if($data[2]==6){ 
											if($flag!=$data[2]) {
											$flag=$data[2];
											echo "</optgroup><optgroup label='Masters - Management / Others'>";
											}
										 echo "<option value='".$data[ '0']. "'>".$data[ '1']."</option>";
										}
									 	else if($data[2]==7){ 
											if($flag!=$data[2]) {
											$flag=$data[2];
											echo "</optgroup><optgroup label='Bachelors - Medicine - General / Dental / Surgeon / Others'>";
											}
										echo "<option value='".$data[ '0']. "'>".$data[ '1']."</option>";
									}
									 else if($data[2]==8){
										if($flag!=$data[2]) {
										$flag=$data[2];
										echo "</optgroup><optgroup label='Masters - Medicine - General / Dental / Surgeon / Others'>";
										}
									echo "<option value='".$data[ '0']. "'>".$data[ '1']. "</option>";
									}
 									 else if($data[2]==9){
										if($flag!=$data[2]) {
										$flag=$data[2];
										echo "</optgroup><optgroup label='Bachelors - Legal / Others'>";
										}
 									 echo "<option value='".$data[ '0']. "'>".$data[ '1']. "</option>";
									}
 									 else if($data[2]==10){
										if($flag!=$data[2]) {$flag=$data[2];
										echo "</optgroup><optgroup label='Masters - Legal / Others'>";
										}
									echo "<option value='".$data[ '0']. "'>".$data[ '1']. "</option>";
									}
									 else if($data[2]==11){
										if($flag!=$data[2]) {
										$flag=$data[2];
										echo "</optgroup><optgroup label='Finance - ICWAI / CA / CS/ CFA / Others'>";
										}
 									 echo "<option value='".$data[ '0']. "'>".$data[ '1']. "</option>";
									}
 									 else if($data[2]==12){
										if($flag!=$data[2]) {
										$flag=$data[2];
										echo "</optgroup><optgroup label='Service - IAS / IPS / IRS / IES / IFS / Others'>";
										}
 									 echo "<option value='".$data[ '0']. "'>".$data[ '1']. "</option>";
									}
 									 else if($data[2]==13){
										if($flag!=$data[2]) {
										$flag=$data[2];
										echo "</optgroup><optgroup label='PhD'>";
										}
 									 echo "<option value='".$data[ '0']."'>".$data[ '1']. "</option>";
									}
 									 else if($data[2]==14){
										if($flag!=$data[2]) {
										$flag=$data[2];
										echo "</optgroup><optgroup label='Diploma / Others'>";
										}
 									 echo "<option value='".$data[ '0']. "'>".$data[ '1']. "</option>";
									}

									else if($data[2]==15){
										if($flag!=$data[2]) {
										$flag=$data[2];
										echo "</optgroup><optgroup label='High school / Scoundary'>";
										}
 									echo "<option value='".$data[ '0']. "'>".$data[ '1']. "</option>";
									}
 } ?></optgroup>
                                </select>
                            </div>
                        </div>
                        <div style="display:none" class="control-group" id="eduInDetail">
                            <label class="control-label" for='educationDetail'><strong>Education in Detail</strong>  <span style="color:#FF0000">&lowast;</span>
                            </label>
                            <div class="controls">
                                <input type='text' id='educationDetail' name='educationDetail' maxlength='40'>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><strong>Occupation</strong>  <span style="color:#FF0000">&lowast;</span>
                            </label>
                            <div class="controls">
                                <select id='occupation' name='occupation' onChange="occ_chang()">
                                    <option value='0'>--- Select ---</option>
                                    <optgroup label='ADMIN'>
                                        <option value='42'>Manager</option>
                                        <option value='58'>Supervisor</option>
                                        <option value='48'>Officer</option>
                                        <option value='2'>Administrative Professional</option>
                                        <option value='29'>Executive</option>
                                        <option value='17'>Clerk</option>
                                        <option value='36'>Human Resources Professional</option>
                                    </optgroup>
                                    <optgroup label='AGRICULTURE'>
                                        <option value='4'>Agriculture &amp; Farming Professional</option>
                                    </optgroup>
                                    <optgroup label='AIRLINE'>
                                        <option value='50'>Pilot</option>
                                        <option value='5'>Air Hostess</option>
                                        <option value='7'>Airline Professional</option>
                                    </optgroup>
                                    <optgroup label='ARCHITECT &amp; DESIGN'>
                                        <option value='8'>Architect</option>
                                        <option value='37'>Interior Designer</option>
                                    </optgroup>
                                    <optgroup label='BANKING &amp; FINANCE'>
                                        <option value='15'>Chartered Accountant</option>
                                        <option value='18'>Company Secretary</option>
                                        <option value='1'>Accounts / Finance Professional</option>
                                        <option value='12'>Banking Service Professional</option>
                                        <option value='11'>Auditor</option>
                                        <option value='32'>Financial Analyst / Planning</option>
                                        <option value='31'>Financial Accountant</option>
                                    </optgroup>
                                    <optgroup label='BEAUTY &amp; FASHION'>
                                        <option value='30'>Fashion Designer</option>
                                        <option value='13'>Beautician</option>
                                    </optgroup>
                                    <optgroup label='CIVIL SERVICES'>
                                        <option value='16'>Civil Services (IAS/IPS/IRS/IES/IFS)</option>
                                    </optgroup>
                                    <optgroup label='DEFENCE'>
                                        <option value='9'>Army</option>
                                        <option value='46'>Navy</option>
                                        <option value='6'>Airforce</option>
                                    </optgroup>
                                    <optgroup label='EDUCATION'>
                                        <option value='51'>Professor / Lecturer</option>
                                        <option value='59'>Teaching / Academician</option>
                                        <option value='25'>Education Professional</option>
                                    </optgroup>
                                    <optgroup label='HOSPITALITY'>
                                        <option value='35'>Hotel / Hospitality Professional</option>
                                    </optgroup>
                                    <optgroup label='IT &amp; ENGINEERING'>
                                        <option value='55'>Software Professional</option>
                                        <option value='33'>Hardware Professional</option>
                                        <option value='26'>Engineer - Non IT</option>
                                        <option value='23'>Web Designer</option>
                                    </optgroup>
                                    <optgroup label='LEGAL'>
                                        <option value='40'>Lawyer &amp; Legal Professional</option>
                                    </optgroup>
                                    <optgroup label='LAW ENFORCEMENT'>
                                        <option value='39'>Law Enforcement Officer</option>
                                    </optgroup>
                                    <optgroup label='MEDICAL'>
                                        <option value='24'>Doctor</option>
                                        <option value='34'>Health Care Professional</option>
                                        <option value='49'>Paramedical Professional</option>
                                        <option value='47'>Nurse</option>
                                    </optgroup>
                                    <optgroup label='MARKETING &amp; SALES'>
                                        <option value='44'>Marketing Professional</option>
                                        <option value='52'>Sales Professional</option>
                                    </optgroup>
                                    <optgroup label='MEDIA &amp; ENTERTAINMENT'>
                                        <option value='38'>Journalist</option>
                                        <option value='45'>Media Professional</option>
                                        <option value='27'>Entertainment Professional</option>
                                        <option value='28'>Event Management Professional</option>
                                        <option value='3'>Advertising / PR Professional</option>
                                        <option value='22'>Designer</option>
                                    </optgroup>
                                    <optgroup label='MERCHANT NAVY'>
                                        <option value='43'>Mariner / Merchant Navy</option>
                                    </optgroup>
                                    <optgroup label='SCIENTIST'>
                                        <option value='53'>Scientist / Researcher</option>
                                    </optgroup>
                                    <optgroup label='TOP MANAGEMENT'>
                                        <option value='21'>CXO / President, Director, Chairman</option>
                                        <option value='14'>Business Analyst</option>
                                    </optgroup>
                                    <optgroup label='OTHERS'>
                                        <option value='19'>Consultant</option>
                                        <option value='40'>Customer Care Professional</option>
                                        <option value='54'>Social Worker</option>
                                        <option value='56'>Sportsman</option>
                                        <option value='60'>Technician</option>
                                        <option value='10'>Arts &amp; Craftsman</option>
                                        <option value='57'>Student</option>
                                        <option value='41'>Librarian</option>
                                        <option value='61'>Not working</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                        <div style="display:none" class="control-group" id="occInDetail">
                            <label class="control-label"><strong>Occupation in Detail</strong>  <span style="color:#FF0000">&lowast;</span>
                            </label>
                            <div class="controls">
                                <input type='text' id='occupationDetail' name='occupationDetail' maxlength='40'>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><strong>Employed in</strong>  <span style="color:#FF0000">&lowast;</span>
                            </label>
                            <div class="controls">
                                <div class='pull-left'>
                                    <label for='employCat1'>
                                        <input type='radio' id='employCat1' name='employCat' value='1'>Government</label>
                                </div>
                                <div class='pull-left'>
                                    <label for='employCat2'>
                                        <input type='radio' id='employCat2' name='employCat' value='2'>Defence</label>
                                </div>
                                <div class='pull-left'>
                                    <label for='employCat3'>
                                        <input type='radio' id='employCat3' name='employCat' value='3'>Private</label>
                                </div>
                                <div class='pull-left'>
                                    <label for='employCat4'>
                                        <input type='radio' id='employCat4' name='employCat' value='4'>Business</label>
                                </div>
                                <div class='pull-left'>
                                    <label for='employCat6'>
                                        <input type='radio' id='employCat6' name='employCat' value='6'>Self Employed</label>
                                </div>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><strong>Income</strong> 
                            </label>
                            <div class="controls">
                                <div class='pull-left'>
                                    <label for='incomeMonthly'>
                                        <input type='radio' value='0' name='incomeType' id='incomeMonthly' onBlur="currencychk()">Monthly</label>
                                </div>
                                <div class='pull-left'>
                                    <label for='incomeYearly'>
                                        <input type='radio' value='1' name='incomeType' id='incomeYearly' onBlur="currencychk()">Annual</label>
                                </div>
                                <input type='hidden' value='' name='incomeTypeSel' id='incomeTypeSel'>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">
                                <select id='incomeCurrency' name='incomeCurrency' onChange="currencychk()">
                                    <option value='0'>--- Select ---</option>
                                    <option value='93'>India - INR</option>
                                    <option value='211'>United States of America - USD</option>
                                    <option value='210'>United Kingdom - GBP</option>
                                    <option value='209'>United Arab Emirates - AED</option>
                                    <optgroup label='-------------------'></optgroup>
                                    <?php $sql="SELECT `country_id`, `country_name`, `currency_code` FROM `countries`" ;
$result=_db($sql);
while($data=mysqli_fetch_row($result)) { echo "<option value='".$data[ '0']. "'>".$data[
                                    '1']. " - ".$data[ '2']. "</option>";
}?>
                                </select>
                                <input type='text' maxlength='40' name='income' id='income' placeholder="enter income" onKeyPress="charChk(event,'num');" onBlur="currencychk()">
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">
                                <p id="salary" style="display:none; color:#009900;">&nbsp;</p>
                            </div>
                        </div>
                        <div style="border: 1px dotted darkred;margin: 5px 0px;"></div>
                        <h4>Religious Information</h4>
                        <div class="control-group">
                            <label class="control-label" for='religious'><strong>Religious values</strong>
                            </label>
                            <div class="controls">
                                <select id='religious' name='religious'>
                                    <option value='0' selected title='Select' alt='Select'>Select</option>
                                    <option value='1' title='Very religious' alt='Very religious'>Very religious</option>
                                    <option value='2' title='Believe in Jesus not in religion' alt='Believe in Jesus not in religion'>Believe in Jesus not in religion</option>
                                    <option value='3' title='Sunday Church Goer' alt='Sunday Church Goer'>Sunday Church Goer</option>
                                    <option value='4' title='Average Christian' alt='Average Christian'>Average Christian</option>
                                    <option value='5' title='Not religious' alt='Not religious'>Not religious</option>
                                    <option value='6' title='Not given it a thought' alt='Not given it a thought'>Not given it a thought</option>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for='ethnicity'><strong>Ethnicity </strong>
                            </label>
                            <div class="controls">
                                <select id='ethnicity' name='ethnicity'>
                                    <option value='0' selected title='Select' alt='Select'>Select</option>
                                    <option value='1' title='African' alt='African'>African</option>
                                    <option value='2' title='Asian' alt='Asian'>Asian</option>
                                    <option value='3' title='Caribbean' alt='Caribbean'>Caribbean</option>
                                    <option value='4' title='East indian' alt='East indian'>East indian</option>
                                    <option value='5' title='Middle-eastern' alt='Middle-eastern'>Middle-eastern</option>
                                    <option value='6' title='Pacific islands' alt='Pacific islands'>Pacific islands</option>
                                    <option value='7' title='Arab' alt='Arab'>Arab</option>
                                    <option value='8' title='Black/African descent' alt='Black/African descent'>Black/African descent</option>
                                    <option value='9' title='Caucasian/white' alt='Caucasian/white'>Caucasian/white</option>
                                    <option value='10' title='Hispanic/Latino' alt='Hispanic/Latino'>Hispanic/Latino</option>
                                    <option value='11' title='Native american' alt='Native american'>Native american</option>
                                    <option value='12' title='South asian' alt='South asian'>South asian</option>
                                </select>
                            </div>
                        </div>
                        <div style="border: 1px dotted darkred;margin: 5px 0px;"></div>
                        <h4>Habits</h4>
                        <div class="control-group">
                            <label class="control-label"><strong>Food </strong><span style="color:#FF0000">&lowast;</span>
                            </label>
                            <div class="controls">
                                <div class=' pull-left'>
                                    <label for='eatingHabits1'>
                                        <input type='radio' id='eatingHabits1' name='eatingHabits' value='1'>Vegetarian</label>
                                </div>
                                <div class=' pull-left'>
                                    <label for='eatingHabits2'>
                                        <input type='radio' id='eatingHabits2' name='eatingHabits' value='2'>Non vegetarian</label>
                                </div>
                                <div class=' pull-left'>
                                    <label for='eatingHabits3'>
                                        <input type='radio' id='eatingHabits3' name='eatingHabits' value='3'>Eggetarian</label>
                                </div>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><strong>Drinking</strong>  <span style="color:#FF0000">&lowast;</span>
                            </label>
                            <div class="controls">
                                <div class='pull-left'>
                                    <label for='drinkingHabits1'>
                                        <input type='radio' id='drinkingHabits1' name='drinkingHabits' value='1'>No</label>
                                </div>
                                <div class='pull-left'>
                                    <label for='drinkingHabits2'>
                                        <input type='radio' id='drinkingHabits2' name='drinkingHabits' value='2'>Occasionally</label>
                                </div>
                                <div class='pull-left'>
                                    <label for='drinkingHabits3'>
                                        <input type='radio' id='drinkingHabits3' name='drinkingHabits' value='3'>Yes</label>
                                </div>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><strong>Smoking</strong>  <span style="color:#FF0000">&lowast;</span>
                            </label>
                            <div class="controls">
                                <div class='pull-left'>
                                    <label for='smokingHabits1'>
                                        <input type='radio' id='smokingHabits1' name='smokingHabits' value='1'>No</label>
                                </div>
                                <div class='pull-left'>
                                    <label for='smokingHabits2'>
                                        <input type='radio' id='smokingHabits2' name='smokingHabits' value='2'>Occasionally</label>
                                </div>
                                <div class='pull-left'>
                                    <label for='smokingHabits3'>
                                        <input type='radio' id='smokingHabits3' name='smokingHabits' value='3'>Yes</label>
                                </div>
                            </div>
                        </div>
                        <div style="border: 1px dotted darkred;margin: 5px 0px;"></div>
                        <h4>Family Information</h4>
                        <div class="control-group">
                            <label class="control-label" for='familyValue1'><strong>Family Value</strong>  <span style="color:#FF0000">&lowast;</span>
                            </label>
                            <div class="controls">
                                <div class=' pull-left'>
                                    <label for='familyValue1'>
                                        <input type='radio' id='familyValue1' name='familyValue' value='1'>Orthodox</label>
                                </div>
                                <div class=' pull-left'>
                                    <label for='familyValue2'>
                                        <input type='radio' id='familyValue2' name='familyValue' value='2'>Traditional</label>
                                </div>
                                <div class=' pull-left'>
                                    <label for='familyValue3'>
                                        <input type='radio' id='familyValue3' name='familyValue' value='3'>Moderate</label>
                                </div>
                                <div class=' pull-left'>
                                    <label for='familyValue4'>
                                        <input type='radio' id='familyValue4' name='familyValue' value='4'>Liberal</label>
                                </div>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for='familyType'><strong>Family Type</strong>  <span style="color:#FF0000">&lowast;</span>
                            </label>
                            <div class="controls">
                                <div class=' pull-left'>
                                    <label for='familyType1'>
                                        <input type='radio' id='familyType1' name='familyType' value='1'>Joint family</label>
                                </div>
                                <div class=' pull-left'>
                                    <label for='familyType2'>
                                        <input type='radio' id='familyType2' name='familyType' value='2'>Nuclear family</label>
                                </div>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for='familyStatus'><strong>Family Status</strong>  <span style="color:#FF0000">&lowast;</span>
                            </label>
                            <div class="controls">
                                <div class=' pull-left'>
                                    <label for='familyStatus1'>
                                        <input type='radio' id='familyStatus1' name='familyStatus' value='1'>Middle class</label>
                                </div>
                                <div class=' pull-left'>
                                    <label for='familyStatus2'>
                                        <input type='radio' id='familyStatus2' name='familyStatus' value='2'>Upper middle class</label>
                                </div>
                                <div class=' pull-left'>
                                    <label for='familyStatus3'>
                                        <input type='radio' id='familyStatus3' name='familyStatus' value='3'>Rich</label>
                                </div>
                                <div class=' pull-left'>
                                    <label for='familyStatus4'>
                                        <input type='radio' id='familyStatus4' name='familyStatus' value='4'>Affluent</label>
                                </div>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for='numOfBrothers'><strong>No. of Brothers</strong>  <span style="color:#FF0000">&lowast;</span>
                            </label>
                            <div class="controls">
                                <select id='numOfBrothers' name='numOfBrothers' onchange="nummarg('1')">
                                    <option value='0' selected title='--- Select No. of Brothers ---' alt='--- Select No. of Brothers ---'>--- Select No. of Brothers ---</option>
                                    <option value='99' title='None' alt='None'>None</option>
                                    <option value='1' title='1' alt='1'>1</option>
                                    <option value='2' title='2' alt='2'>2</option>
                                    <option value='3' title='3' alt='3'>3</option>
                                    <option value='4' title='4' alt='4'>4</option>
                                    <option value='5' title='5' alt='5'>5</option>
                                    <option value='6' title='6' alt='6'>6</option>
                                </select>
                            </div>
                        </div>
                        <div id="brosMarried" class="control-group" style="display:none">
                            <label class="control-label" for='brothersMarried'><strong>Brothers Married</strong>  <span style="color:#FF0000">&lowast;</span>
                            </label>
                            <div class="controls">
                                <select id='brothersMarried' name='brothersMarried'>
                                    <option value='0' selected title='--- Select Brothers Married ---' alt='--- Select Brothers Married ---'>--- Select Brothers Married ---</option>
                                    <option value='99' title='None' alt='None'>None</option>
                                    <option value='1' title='1' alt='1'>1</option>
                                    <option value='2' title='2' alt='2'>2</option>
                                    <option value='3' title='3' alt='3'>3</option>
                                    <option value='4' title='4' alt='4'>4</option>
                                    <option value='5' title='5' alt='5'>5</option>
                                    <option value='6' title='6' alt='6'>6</option>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><strong>No. of Sisters</strong>  <span style="color:#FF0000">&lowast;</span>
                            </label>
                            <div class="controls">
                                <select id='numOfSisters' name='numOfSisters' onchange="nummarg('0')">
                                    <option value='0' selected title='--- Select No. of Sisters ---' alt='--- Select No. of Sisters ---'>--- Select No. of Sisters ---</option>
                                    <option value='99' title='None' alt='None'>None</option>
                                    <option value='1' title='1' alt='1'>1</option>
                                    <option value='2' title='2' alt='2'>2</option>
                                    <option value='3' title='3' alt='3'>3</option>
                                    <option value='4' title='4' alt='4'>4</option>
                                    <option value='5' title='5' alt='5'>5</option>
                                    <option value='6' title='6' alt='6'>6</option>
                                </select>
                            </div>
                        </div>
                        <div id="sisMarried" class="control-group" style="display:none">
                            <label class="control-label"><strong>Sisters Married</strong>  <span style="color:#FF0000">&lowast;</span>
                            </label>
                            <div class="controls">
                                <select id='sistersMarried' name='sistersMarried'>
                                    <option value='0' selected title='--- Select Sisters Married ---' alt='--- Select Sisters Married ---'>--- Select Sisters Married ---</option>
                                    <option value='99' title='None' alt='None'>None</option>
                                    <option value='1' title='1' alt='1'>1</option>
                                    <option value='2' title='2' alt='2'>2</option>
                                    <option value='3' title='3' alt='3'>3</option>
                                    <option value='4' title='4' alt='4'>4</option>
                                    <option value='5' title='5' alt='5'>5</option>
                                    <option value='6' title='6' alt='6'>6</option>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><strong>Few lines about you</strong>  <span style="color:#FF0000">&lowast;</span>
                            </label>
                            <div class="controls">
                                <textarea name='description' id='description' title='spellcheck' rows="5" class="span7"></textarea>
                                <p class="error"><span id="des_count">0</span> Characters Typed. (Min. 50 Chars)</p>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">
                                <input type="submit" name="submit" class="btn" value="submit" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <p align="center">&copy;
                <?php echo date( 'Y');?>Reserved to christianmatrimony.com</p>
        </div>
        <!-- end of box -->
        <script src="js/jquery-2.0.3.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/custom.js"></script>
        <script src="js/register_val.js"></script>
        <script type="text/javascript">
            var curArray = new Array();
            curArray[1] = "AFN";
            curArray[2] = "ALL";
            curArray[3] = "DZD";
            curArray[4] = "USD";
            curArray[5] = "EUR";
            curArray[6] = "AOA";
            curArray[7] = "XCD";
            curArray[8] = "XCD";
            curArray[9] = "XCD";
            curArray[10] = "ARS";
            curArray[11] = "AMD";
            curArray[12] = "AWG";
            curArray[13] = "AUD";
            curArray[14] = "EUR";
            curArray[15] = "AZN";
            curArray[16] = "BSD";
            curArray[17] = "BHD";
            curArray[18] = "BDT";
            curArray[19] = "BBD";
            curArray[20] = "BYR";
            curArray[21] = "EUR";
            curArray[22] = "BZD";
            curArray[23] = "XOF";
            curArray[24] = "BMD";
            curArray[25] = "BTN";
            curArray[26] = "BOB";
            curArray[27] = "BAM";
            curArray[28] = "BWP";
            curArray[29] = "BRL";
            curArray[30] = "USD";
            curArray[31] = "BND";
            curArray[32] = "BGN";
            curArray[33] = "XOF";
            curArray[34] = "BIF";
            curArray[35] = "KHR";
            curArray[36] = "XAF";
            curArray[37] = "CAD";
            curArray[38] = "CVE";
            curArray[39] = "KYD";
            curArray[40] = "XAF";
            curArray[41] = "XAF";
            curArray[42] = "CLP";
            curArray[43] = "CNY";
            curArray[44] = "COP";
            curArray[45] = "KMF";
            curArray[46] = "XAF";
            curArray[47] = "CDF";
            curArray[48] = "NZD";
            curArray[49] = "CRC";
            curArray[50] = "HRK";
            curArray[51] = "CUP";
            curArray[52] = "EUR";
            curArray[53] = "CZK";
            curArray[54] = "DKK";
            curArray[55] = "DJF";
            curArray[56] = "XCD";
            curArray[57] = "DOP";
            curArray[58] = "ECS";
            curArray[59] = "EGP";
            curArray[60] = "SVC";
            curArray[61] = "XAF";
            curArray[62] = "ERN";
            curArray[63] = "EUR";
            curArray[64] = "ETB";
            curArray[65] = "EUR";
            curArray[66] = "FKP";
            curArray[67] = "DKK";
            curArray[68] = "FJD";
            curArray[69] = "EUR";
            curArray[70] = "EUR";
            curArray[71] = "EUR";
            curArray[72] = "EUR";
            curArray[73] = "XAF";
            curArray[74] = "GMD";
            curArray[75] = "GEL";
            curArray[76] = "EUR";
            curArray[77] = "GHS";
            curArray[78] = "GIP";
            curArray[79] = "EUR";
            curArray[80] = "DKK";
            curArray[81] = "XCD";
            curArray[82] = "EUR";
            curArray[83] = "USD";
            curArray[84] = "QTQ";
            curArray[85] = "GGP";
            curArray[86] = "GNF";
            curArray[87] = "GYD";
            curArray[88] = "HTG";
            curArray[89] = "HNL";
            curArray[90] = "HKD";
            curArray[91] = "HUF";
            curArray[92] = "ISK";
            curArray[93] = "INR";
            curArray[94] = "IDR";
            curArray[95] = "IRR";
            curArray[96] = "IQD";
            curArray[97] = "EUR";
            curArray[98] = "ILS";
            curArray[99] = "EUR";
            curArray[100] = "JMD";
            curArray[101] = "JPY";
            curArray[102] = "JOD";
            curArray[103] = "KZT";
            curArray[104] = "KES";
            curArray[105] = "AUD";
            curArray[106] = "KPW";
            curArray[107] = "KWD";
            curArray[108] = "KGS";
            curArray[109] = "LAK";
            curArray[110] = "LVL";
            curArray[111] = "LBP";
            curArray[112] = "LSL";
            curArray[113] = "LRD";
            curArray[114] = "LYD";
            curArray[115] = "CHF";
            curArray[116] = "LTL";
            curArray[117] = "EUR";
            curArray[118] = "MOP";
            curArray[119] = "MGF";
            curArray[120] = "MWK";
            curArray[121] = "MYR";
            curArray[122] = "MVR";
            curArray[123] = "XOF";
            curArray[124] = "EUR";
            curArray[125] = "USD";
            curArray[126] = "EUR";
            curArray[127] = "MRO";
            curArray[128] = "MUR";
            curArray[129] = "EUR";
            curArray[130] = "MXN";
            curArray[131] = "USD";
            curArray[132] = "MDL";
            curArray[133] = "EUR";
            curArray[134] = "MNT";
            curArray[135] = "XCD";
            curArray[136] = "MAD";
            curArray[137] = "MZN";
            curArray[138] = "MMK";
            curArray[139] = "NAD";
            curArray[140] = "AUD";
            curArray[141] = "NPR";
            curArray[142] = "EUR";
            curArray[143] = "ANG";
            curArray[144] = "XPF";
            curArray[145] = "NZD";
            curArray[146] = "NIO";
            curArray[147] = "XOF";
            curArray[148] = "NGN";
            curArray[149] = "NZD";
            curArray[150] = "AUD";
            curArray[151] = "NOK";
            curArray[152] = "OMR";
            curArray[153] = "PKR";
            curArray[154] = "USD";
            curArray[155] = "PAB";
            curArray[156] = "PGK";
            curArray[157] = "PYG";
            curArray[158] = "PEN";
            curArray[159] = "PHP";
            curArray[160] = "PLN";
            curArray[161] = "EUR";
            curArray[162] = "USD";
            curArray[163] = "QAR";
            curArray[164] = "EUR";
            curArray[165] = "RON";
            curArray[166] = "RUB";
            curArray[167] = "RWF";
            curArray[168] = "SHP";
            curArray[169] = "XCD";
            curArray[170] = "XCD";
            curArray[171] = "EUR";
            curArray[172] = "XCD";
            curArray[173] = "WST";
            curArray[174] = "EUR";
            curArray[175] = "STD";
            curArray[176] = "SAR";
            curArray[177] = "XOF";
            curArray[178] = "RSD";
            curArray[179] = "SCR";
            curArray[180] = "SLL";
            curArray[181] = "SGD";
            curArray[182] = "EUR";
            curArray[183] = "EUR";
            curArray[184] = "SBD";
            curArray[185] = "SOS";
            curArray[186] = "ZAR";
            curArray[187] = "EUR";
            curArray[188] = "LKR";
            curArray[189] = "SDG";
            curArray[190] = "SRD";
            curArray[191] = "SZL";
            curArray[192] = "SEK";
            curArray[193] = "CHF";
            curArray[194] = "SYP";
            curArray[195] = "TJS";
            curArray[196] = "TZS";
            curArray[197] = "THB";
            curArray[198] = "XOF";
            curArray[199] = "NZD";
            curArray[200] = "TOP";
            curArray[201] = "TTD";
            curArray[202] = "TND";
            curArray[203] = "TRY";
            curArray[204] = "TMT";
            curArray[205] = "USD";
            curArray[206] = "AUD";
            curArray[207] = "UGX";
            curArray[208] = "UAH";
            curArray[209] = "AED";
            curArray[210] = "GBP";
            curArray[211] = "USD";
            curArray[212] = "UYU";
            curArray[213] = "UZS";
            curArray[214] = "VUV";
            curArray[215] = "EUR";
            curArray[216] = "VEF";
            curArray[217] = "VND";
            curArray[218] = "XPF";
            curArray[219] = "YER";
            curArray[220] = "ZMW";
            curArray[221] = "ZWD";
        </script>
</body>

</html>