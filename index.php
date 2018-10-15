<?php session_start();
if(isset($_SESSION['_JMEMAIL']))
	{
		header('Location:view/home.php');
		}
require_once('control/functions.php');

if(isset($_COOKIE['JMS_user']))
{
	$username = $_COOKIE['JMS_user'];
	$password = $_COOKIE['JMS_pass'];
	$sql = "SELECT `id` FROM `user` WHERE (`email`='$username' OR id='$username') AND `password`='$password'";
	$result=_db($sql);
	$count=mysqli_num_rows($result);
	$data=mysqli_fetch_row($result);
	$id = $data['0'];
	if($count==1) 
	{
		
		$date = date('Y-m-d H:i:s');
		$sql = "UPDATE `user` SET `last_login` = '$date' WHERE `user`.`id` = '$id';";
		mysqli_query($CON, $sql);
		$_SESSION['_JMUID']=$id;
		$_SESSION['_JMEMAIL']=$username;
		header('Location:view/index.php');
	}
}
?>
<!doctype html>
<html>
<head>
<meta charset='utf-8'>
<meta name='viewport' content='width=device-width' />
<title>jamesmatrimony</title>
<link rel='stylesheet' type='text/css' href='view/css/bootstrap.css'>
<link rel='stylesheet' type='text/css' href='view/css/bootstrap-responsive.css'>
<link rel='stylesheet' type='text/css' href='view/css/style.css' />
<link rel='icon' href='view/img/favicon.ico'>
</head>

<body>
<div class="loader"></div>
<header>
<div class='navbar'>
              <div class='navbar-inner'>
                  <a class='btn-navbar' data-toggle='collapse' data-target='.navbar-responsive-collapse'>
                    <span class='icon-bar'></span>
                    <span class='icon-bar'></span>
                    <span class='icon-bar'></span>
                  </a>
                  <div class='logo_bg'>
                  <a class='brand logo' href='index.php'><img src='view/img/logo.png'  alt=''/></a>
                  </div>
                  <div class='nav-collapse collapse navbar-responsive-collapse'>
                    <ul class='nav'>
                      <li><a href='view/index.php'>Home</a></li>
                      <li><a href='view/about.php'>About us</a></li>
                      <li><a href='#'>Success stories</a></li>
                    </ul>
                    <ul class='nav pull-right'>
                      <li><a href='view/login.php'>Login</a></li>
                    </ul>
                  </div><!-- /.nav-collapse -->
              </div><!-- /navbar-inner -->
            </div>
</header>

<div class='yellow_bg'></div>
<div class='yellow_bottom'></div>
<div class='bottom_content' align='center'>
	<div style='left: 10px; position: fixed; bottom: 10px; font-size: 14px'>
 		<div style='height: 10px; margin-bottom: 10px'>
			<p>© <?php echo date('Y');?> Reserved to Jamesmatrimony.com. Developed By <a href='http://azul.in'>AzulTech</a>
    &nbsp;<a href="#" onClick="model('term');">Terms</a> &amp; <a href="#" onClick="model('policy');">Policies</a></p>
		</div>
	</div>
</div>
<div class='register'>
<div class="alert alert-error" style="display:none;" id="error">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<h4>Warning!</h4>
	<p id="errorTxt" class="text-error"></p>
</div>
<h3 align='center'>Free signup</h3>
<form method='post' action='view/register.php' class='form-horizontal' name='register' onSubmit='return homeReg()'>
<input type="hidden" name="regtype" id="regType" value="0"/>
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
    <input name='name' id='name' maxlength='40' onChange='nameChk();' onKeyPress="charChk(event,'name');" type='text' on>
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
        <select id='caste' name='caste' onChange="showSubcaste();">
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
<div class="control-group" style="display:none" id="subcasteDiv">
 <label class="control-label" for='motherTongue'>Sub caste </label>
    <div class="controls">
    <input type='text' name='subcaste' id='subcaste' value="" onKeyPress="charChk(event,'alpha');" />
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
            <option value='0' selected>M code</option>
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
            <input type='tel' id='mobile' maxlength='10' name='mobile' size="10" onBlur="mobileChk();" onKeyPress="charChk(event,'num');" class='mobile' >
     </div>
</div>
<div class="control-group">
 <label class="control-label" for='email'>E-mail ID <span style="color:#FF0000">&lowast;</span></label>
    <div class="controls">
        <input name='email' id='email' maxlength='50'  onBlur="emailAvail();" onKeyPress="charChk(event,'email');" type='text'>
     </div>
</div>
<div class="control-group">
 <label class="control-label" for='password'>Login password <span style="color:#FF0000">&lowast;</span></label>
    <div class="controls">
    <input name='password' id='password'  autocomplete='off' type='password'>
     </div>
</div>
<div class="control-group">
    <div class="controls">
    <input type='checkbox' name='agree' id='agree' checked/>I agree <a href="#" onClick="model('term');">Terms</a> &amp; <a href="#" onClick="model('policy');">Policies</a>
     </div>
</div>
<div class="control-group">
    <div class="controls">
    <input value='submit' name='submit' class='btn' type='submit' >
     </div>
</div>
</form>  
</div>
<div class='cm_logo'><img src='view/img/cm_logo.png'></div>
           
           <?php require_once('view/terms.php');?>
<script src='view/js/jquery-2.0.3.min.js'></script>
<script src='view/js/bootstrap.js'></script>
<script src='view/js/custom.js'></script>
<script src='view/js/register_val.js'></script>
<script src='view/js/jquery.backstretch.min.js'></script>
<script>
$('#myTab a').click(function (e) {
    e.preventDefault();
    $(this).tab('show');
    });	  
</script>  
<script>
$.backstretch([
      'view/img/bg1.jpg',
	  'view/img/bg2.jpg',
	  'view/img/bg3.jpg'
  			], 
	{duration: 5000, fade: 5000});
</script>

</body>
</html>
