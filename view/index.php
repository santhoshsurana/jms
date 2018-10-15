<?php session_start();
include "../control/functions.php";
if(isset($_SESSION['_JMEMAIL']))
	{
		header('Location:home.php');
		}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="icon" href="img/favicon.ico">
<title>Jamesmatrimony.com</title>
</head>

<body>
<div id="fb-root"></div>
<div class="yellow_bg"></div>
<div class="cm_logo"><img src="img/cm_logo.png"></div>
<div class="box">
<?php require_once('menu.php');?>
<div class="container-fluid">
<div class="row-fluid">
<div class="span7">
<img src="img/regbg.jpg" class="img-polaroid"/>
<div class="thumbnails">
<div class="row-fluid">
                            <h4>Users voice </h4>
                            
                            <article align="center">
                                <blockquote class="pull-left">
  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
  <small>Someone famous <cite title="Source Title">Source Title</cite></small>
</blockquote>
                            </article>
                        </div>
                        </div>
</div>
<div class="span5">
<div class="alert alert-error" style="display:none;" id="error">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<h4>Warning!</h4>
	<p id="errorTxt" class="text-error"></p>
</div>
<h3 align='center'>Free signup</h3>
<form method='post' action='register.php' class='form-horizontal' name='register' onSubmit='return homeReg()'>
<input type="hidden" name="regtype" id="regType" value="1"/>
<div class="control-group">
<label class="control-label" for='profile_for'>Profile for my <span style="color:#FF0000">&lowast;</span></label>
    <div class="controls">
    <select name='profile_for' id='profile_for' onChange='selGender();'>
            <option value='0'>--- Select ---</option>
            <option value='1'>self</option>
            <option value='2'>Son</option>
            <option value='3'>Daughter</option>
            <option value='4'>Brother</option>
            <option value='5'>Sister</option>
            <option value='6'>Relative</option>
            <option value='7'>Friend</option>
            </select>
     </div>
</div>
<div class="control-group">
<label class="control-label" for='name'>Name <span style="color:#FF0000">&lowast;</span></label>
    <div class="controls">
    <input name='name' id='name' maxlength='40' onChange='nameChk();' onKeyPress="alphaOnly(event);"  type='text' on>
     </div>
</div>
<div class="control-group">
<label class="control-label" for='gender'>Gender <span style="color:#FF0000">&lowast;</span></label>
    <div class="controls">
    <label for='gender_male' class="pull-left"><input id='gender_male' name='gender' value='1' type='radio'> Male</label>
    <label for='gender_female' class="pull-left"><input id='gender_female' name='gender' value='0' type='radio'> Female</label>
    <input id='gender_val' name='gender_val' type='hidden'>
     </div>
</div>
<div class="control-group">
 <label class="control-label" for='dob'>Date of birth <span style="color:#FF0000">&lowast;</span></label>
    <div class="controls">
        <select class='date' id='dobDate'>
            <option value='0' selected>DD</option>
            <?php 
			for($i=1;$i<=31;$i++){
				echo"<option value='$i'>$i</option>";
			}
			?>
        </select>
        <select class='date' id='dobMonth' onchange="updateDays('month','register','dobYear','dobMonth','dobDate');">
            <option value='0' selected>MM</option>
            <option value='1'>Jan</option>
            <option value='2'>Feb</option>
            <option value='3'>Mar</option>
            <option value='4'>Apr</option>
            <option value='5'>May</option>
            <option value='6'>Jun</option>
            <option value='7'>Jul</option>
            <option value='8'>Aug</option>
            <option value='9'>Sep</option>
            <option value='10'>Oct</option>
            <option value='11'>Nov</option>
            <option value='12'>Dec</option>
        </select>
        <select class='date' id='dobYear'  onchange="updateDays('year','register','dobYear','dobMonth','dobDate');">
            <option value='0' selected>YYYY</option>
            <?php
				$date=date('Y')-18;
				$limit=date('Y')-50;

				for($date;$date>=$limit;$date--)
					{
					echo "<option value='$date'>$date</option>";
					}?>
        </select>
        <input type='hidden' name='age' id='age'>
        <input type='hidden' name='dob' id='dob'>
     </div>
</div>
<div class="control-group">
<label class="control-label" for='denom'>Denomination <span style="color:#FF0000">&lowast;</span></label>
    <div class="controls">
        <select id='denom' name='denom' >
			<option selected value='0'>--- Select ---</option>
            <?php
				 $sql = "SELECT * FROM `denominations`";
				 $result=_db($sql);
				 while($data=mysqli_fetch_row($result))
					{
					echo "<option value='".$data['0']."'>".$data['1']."</option>";
					}?>
			</select>
     </div>
</div>
<div class="control-group">
<label class="control-label" for='caste'>Caste / Division <span style="color:#FF0000">&lowast;</span></label>
    <div class="controls">
        <select id='caste' name='caste'>
    	<option selected value='0'>--- Select ---</option>
        <?php
				 $sql = "SELECT * FROM  `castes`";
				 $result=_db($sql);
				 while($data=mysqli_fetch_row($result))
					{
					echo "<option value='".$data['0']."'>".$data['1']."</option>";
					}?>
	</select>
     </div>
</div>
<div class="control-group">
 <label class="control-label" for='motherTongue'>Sub caste </label>
    <div class="controls">
    <input type='text' name='subcaste' id='subcaste' onKeyPress="alphaOnly(event);" />
     </div>
</div>
<div class="control-group">
  <label class="control-label" for='motherTongue'>Mother tongue <span style="color:#FF0000">&lowast;</span></label>
    <div class="controls">
    <select  id='motherTongue' name='motherTongue'>
		<option alt='--- Select ---' title='--- Select ---' value='0'>--- Select ---</option>
        <?php
				 $sql = "SELECT * FROM  `languages`";
				 $result=_db($sql);
				 while($data=mysqli_fetch_row($result))
					{
					echo "<option value='".$data['0']."'>".$data['1']."</option>";
					}?>
        </select>
     </div>
</div>
<div class="control-group">
<label class="control-label" for='country'>Country living in <span style="color:#FF0000">&lowast;</span></label>
    <div class="controls">
        <select id='country' name='country' onchange='countryChk();'>
		<option  value='0'>--- Select ---</option>
        <option  value='93'>India</option>
		<option  value='211'>United States of America</option>
		<option  value='209'>United Arab Emirates</option>
        <option  value='210'>United Kingdom</option>
        <option  value='121'>Malaysia</option>
        <option  value='13'>Australia</option>
        <option  value='176'>Saudi Arabia</option>
        <option  value='37'>Canada</option>
        <option  value='181'>Singapore</option>
        <option  value='107'>Kuwait</option>
        <optgroup label='-------------------------'></optgroup>
        <?php
				 $sql = "SELECT `country_id`, `country_name` FROM `countries`";
				 $result=_db($sql);
				 while($data=mysqli_fetch_row($result))
					{
					echo "<option value='".$data['0']."'>".$data['1']."</option>";
					}?>
</select>
     </div>
</div>
<div class="control-group">
 <label class="control-label" for='Mcode'>Mobile No. <span style="color:#FF0000">&lowast;</span></label>
    <div class="controls">
        <select class='date' id='Mcode' name='Mcode'>
            <option  value='0' selected>M code</option>
            <option  value='93'>India (+91)</option>
            <option  value='211'>United States of America (+1)</option>
            <option  value='209'>United Arab Emirates (+971)</option>
            <option  value='210'>United Kingdom (+44)</option>
            <option  value='121'>Malaysia (+60)</option>
            <option  value='13'>Australia (+61)</option>
            <option  value='176'>Saudi Arabia (+966)</option>
            <option  value='37'>Canada (+1)</option>
            <option  value='181'>Singapore (+65)</option>
            <option  value='107'>Kuwait (+965)</option>
            <optgroup label='-------------------------'></optgroup>
            <?php
				 $sql = "SELECT `country_id`, `country_name`, `call_code` FROM `countries`";
				 $result=_db($sql);
				 while($data=mysqli_fetch_row($result))
					{
					echo "<option value='".$data['0']."'>".$data['1']." (+".$data['2'].")</option>";
					}?>
            </select>
            <input type='tel' id='mobile' name='mobile' size="10" onBlur="mobileChk();" onKeyPress="numOnly(event);" class='mobile' >
     </div>
</div>
<div class="control-group">
 <label class="control-label" for='email'>E-mail ID <span style="color:#FF0000">&lowast;</span></label>
    <div class="controls">
        <input name='email' id='email' maxlength='50'  onBlur="emailAvail()" onKeyPress="emailOnly(event);" type='text'>
     </div>
</div>
<div class="control-group">
 <label class="control-label" for='password'>Login password <span style="color:#FF0000">&lowast;</span></label>
    <div class="controls">
    <input name='password' id='password'  autocomplete='off' type='password'>
     </div>
</div>
<div class="control-group">
<input type='checkbox' name='agree' id='agree' checked/>I agree <a href="#" onClick="model('term');">Terms</a> &amp; <a href="#" onClick="model('policy');">Policies</a>
    <div class="controls">
    <input value='submit' name='submit' class='btn' type='submit' >
     </div>
</div>
</form>  
</div>
</div>
<?php require_once('footer.php');?>