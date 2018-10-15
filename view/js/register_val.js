/* 
	Title: james matrimony validations
	Author: Santhosh kumar surana
	Company: Azul computer technologies
	version: 0.1
	last updated: 2014 January
*/

function register_update(){
	var country = $("#country").val();
	if(country!=93)	{
		$("#othrCitizen").show();
		$("#cityDiv").show();
		$("#incomeCurrency").val(country);
	}
	
}
profile_array={1:"self", 2:"Son", 3:"Daughter", 4:"Brother", 5:"Sister", 6:"Relative", 7:"Friend"};

function selGender(){
	var register = this.document.register;
	var profile_for = $("#profile_for").val();	
	if (profile_for!=0) {
		register.gender[1].disabled = false;
		register.gender[0].disabled = false;
		if(profile_for==2 || profile_for==4)
		{
			register.gender[0].checked = true;
			register.gender[1].disabled = true;
		}
		else if(profile_for==3 || profile_for==5)
		{
			register.gender[1].checked = true;
			register.gender[0].disabled = true;
		}
		return false;
	}
	showError('0', '');
return true;
	}
	
function calAge(YY,MM,DD) {
	var past  = new Date(YY,MM-1,DD);
	var now		= new Date();
	var oneyear = 31557600000;	 // 1000*60*60*24*365.25 Micro seconds for one year..
    var diff    = now-past;
    return (Math.floor(diff/oneyear));
}
function updateDays(Change,formName,YearName,MonthName,DayName){
	frmName = document.forms[formName];
	var dobDate = $("#dobDate").val();
	var dobMonth = $("#dobMonth").val();
	var dobYear = $("#dobYear").val();
	DaySelect = frmName[DayName];
	if(dobYear==0) { dobYear = new Date().getFullYear()-18;}
	if(dobMonth>0) {
		if((Change=='year' &&  dobMonth==2) || Change=='month') {
			var Days = DaysInMonth(dobYear,dobMonth-1);
			DaySelect.length = 0;
			DaySelect.length = Days;
			var key= 0;
			while(key <= Days)
			{
				if(key==0){DaySelect[key] = new Option("DD",key);key++;}
				else
				{
					DaySelect[key] = new Option(key,key);
					key++;
				}
			}
			if(dobDate>Days) {
				DaySelect.selectedIndex = Days;
			}
			else{
				DaySelect.selectedIndex = dobDate;
			}
		}
	}
}
function DaysInMonth(Year,Month)
{
	return 32 - new Date(Year, Month, 32).getDate();
}

function enableOther(a, b) {

		if($('#'+a).is(':checked')==true)		
		{$('#'+b).prop('disabled', false);}
		else 
		{$('#'+b).prop('disabled', true);}	
	}

function checkOthers(id){
	var others = $("#"+id).val();
	if(others=='')
	{
		showError('1', 'please enter the feild');
		$("#"+id).focus();
	}else{
		var othersRegExp= /^[a-zA-Z\s\.]+$/;
		if (!others.match(othersRegExp)) {
		showError('1', 'numbers and special charachets are not allowed');
		$("#"+id).focus();
	}
	}
}

function feetConvert(){
	var feet_val=$("#feet").val();
	if(feet_val!=0)
	{
		if(feet_val.indexOf("-")!=-1)
		{	var htarr=feet_val.split("-");
			var incms=parseInt(htarr[0])*30.48+parseInt(htarr[1])*2.54;
			$("#cms").val(Math.round(incms));
		}
		else
		{
			var incms=parseInt(feet_val)*30.48;
			$("#cms").val(Math.round(incms));
		}
		$("#height").val("0");
	}
}

function cmsConvert(){
	var cms=$("#cms").val();
	if(cms!=0)
	{
		var feet=parseInt(cms)/30.48;
		feet=feet.toString();
		var f1=feet.split(".");
		var f2="0."+f1[1];
		var inc=Math.round(f2*100);
		    inc=Math.round(inc*0.12);
		if (inc>=12)
		{inc=inc-12; f1[0]=parseInt(f1[0])+1;}
		if(inc==0)
		{$("#feet").val(f1[0]);}else{$("#feet").val(f1[0]+"-"+inc);}
		$("#height").val("1");
	}
}

function kgsConvert(){
	var kgs_val=$("#kgs").val();
	if(kgs_val!=0)
	{
		var inlbs=parseInt(kgs_val)*2.204;
		$("#lbs").val(Math.round(inlbs));
		$("#weight").val("0");
	}
}

function lbsConvert(){
	var lbs_val=$("#lbs").val();
	if(lbs_val!=0)
	{
		var inkgs=parseInt(lbs_val)*0.453;
		$("#kgs").val(Math.round(inkgs));
		$("#weight").val("1");
	}
}

function showCityReg() {
  var cityval='',indval='0';
  var country = $("#country").val();
  var stateval=$('#residingState').val();
  if((stateval!=0)){
	  if(country==93){
      var argUrl='../control/getCity.php';
	  var arg="state="+stateval;
		$.ajax({  
		url: argUrl,	
		type: "GET",
		data: arg,
		success: function (result){		   
			$("#cityTypeDiv").html(result);
		   }
		});	
	  $("#cityDiv").fadeIn(1000);
	  }
	  else{
		  $("#cityDiv").fadeIn(1000);
	  }
  }
else {$("#cityDiv").hide();}
}

function nummarg(gender){
	var noBros=$('#numOfBrothers').val();
	var noSis=$('#numOfSisters').val();								
		if(gender=="1"){
        if(noBros!=0 && noBros!=99){										
			 $('#brothersMarried option').each(function(i, option){		
               $(option).remove();
             });
             if(noBros==1){
				$("#brothersMarried").append("<option value='0' selected>--- Select Brothers Married ---</option>");
                $("#brothersMarried").append("<option value='99'>None</option>");
				$("#brothersMarried").append("<option value='1'>1</option>");
				}
             else if(noBros==2){
				$("#brothersMarried").append("<option value='0' selected>--- Select Brothers Married ---</option>");
       			$("#brothersMarried").append("<option value='99'>None</option>");
				$("#brothersMarried").append("<option value='1'>1</option>");
                $('#brothersMarried').append("<option value='2'>2</option>");											
             }
             else if(noBros==3) {
 				$("#brothersMarried").append("<option value='0' selected>--- Select Brothers Married ---</option>");
                $("#brothersMarried").append("<option value='99'>None</option>");
                for(i=1;i<=3;i++){$("#brothersMarried").append("<option value="+i+">"+i+"</option>");}
             }
             else if(noBros==4) {
				$("#brothersMarried").append("<option value='0' selected>--- Select Brothers Married ---</option>");
				$("#brothersMarried").append("<option value='99'>None</option>");
				for(i=1;i<=4;i++){$("#brothersMarried").append("<option value="+i+">"+i+"</option>");}
               }
             else if(noBros==5){
				$("#brothersMarried").append("<option value='0' selected>--- Select Brothers Married ---</option>");
				$("#brothersMarried").append("<option value='99'>None</option>");
				for(i=1;i<=5;i++){$("#brothersMarried").append("<option value="+i+">"+i+"</option>");}
				}
			else if(noBros==6){
				$("#brothersMarried").append("<option value='0' selected>--- Select Brothers Married ---</option>");
				$("#brothersMarried").append("<option value='99'>None</option>");
				for(i=1;i<=6;i++){$("#brothersMarried").append("<option value="+i+">"+i+"</option>");}
                }									
                $('#brosMarried').show();
                }
                else{$('#brosMarried').hide();}
        }
        else if(gender=="0"){
                if(noSis!=0 && noSis!=99)
                {$('#sistersMarried option').each(function(i, option)
                  {$(option).remove(); });
                if(noSis==1){
                	$("#sistersMarried").append("<option value='0' selected>--- Select Sisters Married ---</option>");
					$("#sistersMarried").append("<option value='99'>None</option>");
					$("#sistersMarried").append("<option value='1'>1</option>");
				}
                else if(noSis==2){
					$("#sistersMarried").append("<option value='0' selected>--- Select Sisters Married ---</option>");
					$("#sistersMarried").append("<option value='99'>None</option>");
					$("#sistersMarried").append("<option value='1'>1</option>");
					$('#sistersMarried').append("<option value='2'>2</option>");											
                }
				else if(noSis==3){
					$("#sistersMarried").append("<option value='0' selected>--- Select Sisters Married ---</option>");
					$("#sistersMarried").append("<option value='99'>None</option>");
              		for(i=1;i<=3;i++){$("#sistersMarried").append("<option value="+i+">"+i+"</option>");}
                 }
                else if(noSis==4){
					$("#sistersMarried").append("<option value='0' selected>--- Select Sisters Married ---</option>");
					$("#sistersMarried").append("<option value='99'>None</option>");
					for(i=1;i<=4;i++){$("#sistersMarried").append("<option value="+i+">"+i+"</option>");}
                }
				else if(noSis==5){
					$("#sistersMarried").append("<option value='0' selected>--- Select Sisters Married ---</option>");
					$("#sistersMarried").append("<option value='99'>None</option>");
					for(i=1;i<=5;i++){$("#sistersMarried").append("<option value="+i+">"+i+"</option>");}
               }
			   else if(noSis==6) {
				   $("#sistersMarried").append("<option value='0' selected>--- Select Sisters Married ---</option>");
				   $("#sistersMarried").append("<option value='99'>None</option>");
				   for(i=1;i<=6;i++){ $("#sistersMarried").append("<option value="+i+">"+i+"</option>");}
               }		
			   $('#sisMarried').show();										
				}
                else{ $('#sisMarried').hide();}
                }
        }
function noc_Click()
{
	if($("#maritalStatus").val()>1)
	{
		if($("#no_child").val()!="9" && $("#no_child").val()!=0)
		{
			if($('input[name=childwith]').is(':checked')==false)
			{
				showError('1', 'Please select children living status');
				return false;
			}
			else{
				var child_belong=$('input[name=childwith]').val();
				$("#child_belong").val(child_belong);
			}
		}
	}
	showError('0', '');
return true;
}
function edu_chang()
{
	var edu = $("#education").val();
	if(edu==0) {
		showError('1', 'Please select education.');
		return false;
	} else {		
		if(edu >=72 && edu <= 81) {
			$('#eduInDetail').show();
		} else {
			$('#eduInDetail').hide();
			$('#educationDetail').val('');
		}
		showError('0', '');
return true;
	}
}

function occ_chang()
{
		var employ_cat=$("input[name='employCat']").length;
		var income_type=$("input[name='incomeType']").length;
		if($('#occupation').val()=='57' || $('#occupation').val()=='61')
		{
			for(i=0;i<employ_cat;i++)
			{
				$("input[name='employCat']")[i].checked=false;
				$("input[name='employCat']")[i].disabled=true;
			}
			for(j=0;j<income_type;j++){
				$("input[name='incomeType']")[j].checked=false;
				$("input[name='incomeType']")[j].disabled=true;
			}
			$('#incomeCurrency').attr('disabled',true);
			$('#incomeCurrency').val('0');
			$('#income').attr('disabled',true);
			$('#income').val('');
		}
		else
		{
			for(i=0;i<employ_cat;i++){$("input[name='employCat']")[i].checked=false;
			$("input[name='employCat']")[i].disabled=false;}
			for(j=0;j<income_type;j++){$("input[name='incomeType']")[j].checked=false;
			$("input[name='incomeType']")[j].disabled=false;}			

			$('#incomeCurrency').prop('disabled',null);
			$('#income').prop('disabled',null);
			$('#income').val('');

		}
	showError('0', '');
return true;
}	
function profileChk(){
	var profile_for = $("#profile_for").val();	
	if (profile_for==0) {
		showError('1', 'Please select for who you are registering the profile!');
		return false;
	}
	showError('0', '');
return true;
	}

function nameChk(){
	var name = $("#name").val();
	var nameRegExp= /^[a-zA-Z\s\.]+$/;
	
	if (name=='') {
		showError('1', 'Please enter the name');
		return false;
	}
	if (!name.match(nameRegExp)) {
		showError('1', 'Please enter the valid name');
		return false; 
	}
	showError('0', '');
return true;
	}
function genderChk(){
	var register = this.document.register;
	if (!register.gender[0].checked && !register.gender[1].checked) {
		showError('1', 'Please select the gender');
		return false;
	} 
	
	showError('0', '');
return true;
	}

function dobChk(){
	var dobDate = $("#dobDate").val();
	var dobMonth = $("#dobMonth").val();
	var dobYear = $("#dobYear").val();
		
	if(dobDate=="0" && dobMonth=="0" &&  dobYear=="0"){
			showError('1', 'Please select the date of birth');
			$("#dobDate").focus();
			return false;
	}
	if (dobDate=='0') {
		showError('1', 'Please select the Date');
		$("#dobDate").focus();
		return false;
	}
	if (dobMonth=='0') {
		showError('1', 'Please select the Month');
		$("#dobMonth").focus();
		return false;
	}
	if (dobYear=='0') {
		showError('1', 'Please select the Year');
		$("#dobYear").focus();
		return false;
	}

	if(dobDate!="0" && dobMonth!="0" &&  dobYear!="0")	{
		var age = calAge(dobYear, dobMonth, dobDate);
		$('#age').val(age);
		var maleAge = 21;
		var femaleAge = 18;
		
		if (age < maleAge && register.gender[0].checked) {
			showError('1', 'Male registrant should be '+maleAge+' years to register');
			$("#dobYear").focus();
			return false;
		} 
		if (age<femaleAge && register.gender[1].checked) {
			showError('1', 'Female registrant should be '+femaleAge+' years to register');
			$("#dobYear").focus();
			return false;
		}
		if (age> 50) {
		showError('1', 'Maximum age allowed is 50');
		return false;
		} 
	}	
	showError('0', '');
return true;
}
	
function denominationChk() {
		var denom = $("#denom").val();
		if ( denom==0) {
			{
				showError('1', 'Please enter the Denomination');
				return false;
			}
		}
		showError('0', '');
return true;
}

function casteChk() {	
	var caste = $("#caste").val();
		if ( caste==0) {
			showError('1', 'Please enter the Caste');
			return false;
		}
	showError('0', '');
return true;
}
function showSubcaste(){
	var caste = $("#caste").val();
	if ( caste==21) {
		$("#subcasteDiv").fadeIn(1000);
		}else{
		$("#subcasteDiv").hide();
		}
}

function subcasteChk() {
	var suubcaste = $("#subcaste").val();
		if(subcaste=='')
		{
			showError('1', 'Please enter the Subcaste');
			return false;
		}
	showError('0', '');
return true;
}

function motherChk() {
	var motherTongue = $("#motherTongue").val();
	if ( motherTongue==0) {
		showError('1', 'Please select the Mother Tongue');
		return false;
		}
	showError('0', '');
return true;			
}

function countryChk() {
	var country = $("#country").val();
	if(country == 0 || country=="" ||  country=="-1") {
		showError('1', 'Please select the country of living');
		return false;
	}
	else{
		for(var i=0;i<document.register.Mcode.options.length;i++) {
		if (document.register.Mcode.options[i].value == country)
			document.register.Mcode.options[i].selected = true;
		}
	} 
	showError('0', '');
return true;
}

function McodeChk() {
	var Mcode = $("#Mcode").val();
		if(Mcode == 0 || Mcode=="") {
			showError('1', 'Please select the country code');
			return false;
		}
	showError('0', '');
return true;
}

function mobileChk() {
		var mobile = $("#mobile").val();
		var Mcode = $("#Mcode").val();
		var mobilearray		= {13:9,37:10,93:10,107:8,121:9,176:8,181:8,209:9,210:8,211:10};
		if (mobile=='') {
			showError('1', 'Please enter the Mobile Number');
			return false;
		}
		else{
			if(!phonecountChk(mobile,Mcode,9,mobilearray)) 
			{
				showError('1', 'Please enter a valid mobile number'); 
				return false;
			} else if (!(/^[0-9 ]+$/i.test(mobile)))
			{
				showError('1', 'Alphabetics not allowed'); 
				return false;
			}
		}
		if(country==93) {
			mobile= mobile.replace(/\s+/g, ""); 
			result	= mobile.length == 10 && mobile.match(/^((\+)?[1-9]{1,2})?([-\s\.])?((\(\d{1,4}\))|\d{1,4})(([-\s\.])?[0-9]{1,12}){1,2}$/);
			if(mobile.match(/^([0-9])\1*$/)!=null){
			result= false;
			}
			else if(mobile.match(/^.*?([7-9]{1})([0-9]{9})$/)==null){
			result= false;
			}
		}
		else if(country==211 || country==37 )
		{
			mobile= mobile.replace(/\s+/g, ""); 
			result	= mobile.length == 10 && mobile.match(/^((\+)?[1-9]{1,2})?([-\s\.])?((\(\d{1,4}\))|\d{1,4})(([-\s\.])?[0-9]{1,12}){1,2}$/);
		}
		else if(country==209 || country==121 || country==13 )  {
			mobile= mobile.replace(/\s+/g, ""); 
			result	= mobile.length >= 9 && mobile.match(/^((\+)?[1-9]{1,2})?([-\s\.])?((\(\d{1,4}\))|\d{1,4})(([-\s\.])?[0-9]{1,12}){1,2}$/);
		} 
		else if(country==210 || country==181 || country==107 || country==176) {
			mobile= mobile.replace(/\s+/g, ""); 
			result	= mobile.length >= 8 && mobile.match(/^((\+)?[1-9]{1,2})?([-\s\.])?((\(\d{1,4}\))|\d{1,4})(([-\s\.])?[0-9]{1,12}){1,2}$/);
		} else {
			mobile= mobile.replace(/\s+/g, ""); 
			result	= mobile.length >=8 && mobile.match(/^((\+)?[1-9]{1,2})?([-\s\.])?((\(\d{1,4}\))|\d{1,4})(([-\s\.])?[0-9]{1,12}){1,2}$/);
		}
		
		if(result ==false) {
			showError('1', 'Please enter a valid mobile number');
			return false;
		}else{
			showError('0', '');
return true;
		}
}

function phonecountChk(mobile,Mcode,totlen,codearray) {
	if(!codearray[Mcode])	{
		if(mobile.length>=totlen && mobile.length<=10) {
			return true;
		}
	} else {
		if(mobile.length>=codearray[Mcode] && mobile.length<=10){
			return true;
		}
	}
	return false;
}

function emailChk() {
	var email = $("#email").val();
	if (email=='') {
		showError('1', 'Please enter the e-mail address');
		return false;
	} else if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(email))) {
		showError('1', 'Please enter a valid e-mail address');
		return false;
	}
	showError('0', '');
return true;	
}

function emailAvail(){
	var regType = $("#regType").val();
	var email = $("#email").val();
	var url = '';
	if(regType==0){
		url = 'control/chkEmail.php';
	}else{
		url = '../control/chkEmail.php';
	}
	var dataStr="email_value="+email;
	var status = returnAjax('POST', url, dataStr);
	if(status==1){
			showError('1', 'E-mail address already exists');
			return false;
		}
		showError('0', '');
return true;
}

function passwordChk() {
	var name = $("#name").val();
	var password = $("#password").val();
	var tmpPass = password;
	var goodPasswd = 1;
	var password = password.toUpperCase();
	var name = name.toUpperCase();
	
	if(password=="") {
		showError('1', 'Please enter your password');
		return false;
	}
	if(password.length < 6 ) {
		showError('1', 'Your password must have a minimum of 6 characters');
		return false;
	} 
	if (password == name) {
		showError('1', 'The name and password cannot be the same. Please change the password.');
		return false;
	} 
	/*for ( var i=0; i< tmpPass.length; i++ ) {
		ch = tmpPass.charAt(i);
		if ( (!((ch>='a') && (ch<='z')) && !((ch>='A') && (ch<='Z')) && !((ch>=0) && (ch <=9))) || (ch==' '))
			{goodPasswd = 0;break;}
	}
	if ( goodPasswd==0 ) {
		showError('1', 'Spaces or special characters are not allowed in the password');
		return false;
	}*/
	if(password=='123456' || password=='ABCDEF' || password=='123ABC' || password=='ABC123'){
		showError('1', 'Sorry, your password has been rejected.It is recommended that you submit a password with alphanumeric characters.');
		return false;
	}
	
	showError('0', '');
return true;
}

function termsChk(){
	var register  = this.document.register;
	if(!document.register.agree.checked){
		showError('1', 'Accept the terms and conditions to proceed further');
		return false; 
	}
	showError('0', '');
return true;
}

function heightChk()
{
	if($("#feet").val()==0 && $("#cms").val()==0)
	{showError('1', 'Please select height.');
	return false;
	}
	showError('0', '');
return true;
	
}

function weightChk()
{
	if($("#kgs").val()==0 && $("#lbs").val()==0)
	{showError('1', 'Please select weight.');
	return false;
	}
	showError('0', '');
return true;
}
		
function bodytypeChk()
{
	if($('input[name=bodyType]').is(':checked')==false) {
		showError('1', 'Please select body type.');
		return false;
	}
	showError('0', '');
return true;
}

function complexionChk()
{
	if($('input[name=complexion]').is(':checked')==false) {
		showError('1', 'Please select complexion.');
		return false;
	}
	showError('0', '');
return true;
}

function physicalstatusChk()
{
	if($('input[name=physicalStatus]').is(':checked')==false) {
		showError('1', 'Please select physical status.');
		return false;
	}
	showError('0', '');
return true;
}

function maritalChk() {
	var maritalStatus = $("#maritalStatus").val();
	if ( maritalStatus==0) {
		showError('1', 'Please select the Marital Status');
		return false;
	}
	showError('0', '');
return true;
}

function maritalClick()
{
	var maritalStatus = $("#maritalStatus").val();
	if(maritalStatus==1)
	{
		$("#child_div").hide();
		$("#childlive_div").hide();
		$("#no_child").val("9");
		$("input[name='childwith']")[0].checked=false;$("input[name='childwith']")[1].checked=false;
	}
	else
	{
		$("#no_child").val("9");
		$("#child_div").show();
		$("#childlive_div").hide();
		$("input[name='childwith']")[0].checked=false;$("input[name='childwith']")[1].checked=false;
	}
}

function noc_Chk()
{
	if($("#maritalStatus").val()>1)
	{
		if($("#no_child").val()=="9")
		{
			showError('1', 'Please select number of children.');
			$("#childlive_div").hide();
			return false;
		}
		else if($("#no_child").val()=="0")
		{
			$("#childlive_div").hide();
			return true;
		}
		else
		{
			$("#childlive_div").show();
		}
	}
	else{
		$("#child_div").hide();
		$("#childlive_div").hide();
		return true;}
		return true;
}


function residingStateChk()
{
	if($("#residingState").val()=="") {
		showError('1', 'Please enter the residing State.');
		return false;
	}
	showError('0', '');
return true;
}

function residingCityChk()
{
	if($("#residingCity").val()=="") {
		showError('1', 'Please enter the residing city.');
		return false;
	}
	showError('0', '');
return true;
}
function customCity()
{
	if($("#residingCity").val()=="") {
		showError('1', 'Please enter the residing city.');
		return false;
	}
	showError('0', '');
return true;
}
function citizenshipChk(){
	if($("#citizenship").val()==0) {
		showError('1', 'Please select the citizenship.');
		return false;
	}
	showError('0', '');
return true;
}
function residentStatusChk(){
	if($('input[name=residentStatus]').is(':checked')==false) {
		showError('1', 'Please select resident status.');
		return false;
	}
	showError('0', '');
return true;
}
function eatingHabitsChk()
{
	if($('input[name=eatingHabits]').is(':checked')==false) {
		showError('1', 'Please select eating habits.');
		return false;
	}
	showError('0', '');
return true;
}

function smokinghabitsChk()
{
	if($('input[name=smokingHabits]').is(':checked')==false) {
		showError('1', 'Please select smoking habits.');
		return false;
	}
	showError('0', '');
return true;
}


function drinkinghabitsChk()
{
	if($('input[name=drinkingHabits]').is(':checked')==false) {
		showError('1', 'Please select drinking habits.');
		return false;
	}
	showError('0', '');
return true;
}

function familystatusChk() {
	if($('input[name=familyStatus]').is(':checked')==false) {
		showError('1', 'Please select family status.');		
		return false;
	}
	showError('0', '');
return true;
}
function familytypeChk() {
	if($('input[name=familyType]').is(':checked')==false) {
		showError('1', 'Please select family type.');
	return false;
	}
	showError('0', '');
return true;
}
function famvalue_Chk() {
	if($('input[name=familyValue]').is(':checked')==false) {
		showError('1', 'Please select family values.');
		return false;
	}
	showError('0', '');
return true;
}

function nobroChk()
{
	if($('#occupation').val()==0)
	{
		showError('1', 'Please select occupation.');
		return false;
	}
	showError('0', '');
return true;
}

function nobroChk()
{
	if($('#numOfBrothers').val()==0)
	{
		showError('1', 'Please select number of brothers.');
		return false;
	}
	showError('0', '');
return true;
}
function nobro_MarriedChk(){
	if($('#brothersMarried').val()==0 && $('#numOfBrothers').val()!=99)
	{
		showError('1', 'Please select number of brothers married.');
		return false;
	}
	showError('0', '');
return true;
}
function nosisChk()
{
	if($('#numOfSisters').val()==0)
	{
		showError('1', 'Please select number of sister.');
		return false;
	}
	showError('0', '');
return true;
}

function nosis_MarriedChk(){
	if($('#sistersMarried').val()==0 && $('#numOfSisters').val()!=99)
	{
		showError('1', 'Please select number of sisters married.');
		return false;
	}
	showError('0', '');
return true;
}

function eduChk()
{
	if($("#education").val()==0)
	{
		showError('1', 'Please select education.');
		return false;
	}
	showError('0', '');
return true;
}

function othereduchk()
{
	var edu = $("#education").val();
	if(edu >=72 && edu <= 81)
	{
		if($('#educationDetail').val()=="")
		{
			showError('1', 'Please enter education.');
			return false;
		}
	}
	showError('0', '');
return true;
}


function occ_Chk()
{
	if($('#occupation').val()==0)
	{
		showError('1', 'Please select occupation.');
		return false;
	}
	showError('0', '');
return true;
}

function employChk()
{ 
		if($('#occupation').val()!='57' && $('#occupation').val()!='61')
		{
		if($('input[name=employCat]').is(':checked')==false) {
				showError('1', 'Please select employment category.');
				return false;
			}
		}
		showError('0', '');
return true;
}

function currencychk()
{
	var incomeType = $("input[name='incomeType']:checked").val();
	$('#incomeTypeSel').val(incomeType);
	var incomeCurrency = $('#incomeCurrency').val();
	var income = $('#income').val();
	if((incomeType ==0 || incomeType ==1) && incomeCurrency!=0) {
		if(income!=''){
			if((/^[0-9 ]+$/i.test(income))==false || income.indexOf('0')==0){
				showError('1', 'Please enter a valid Annual/Monthly income amount in digits. Use commas as separators.');
				return false;}
			else{
					income =  income.replace(/[^0-9.]+/g,'');
					if(incomeType==1) {
						var displayincome = Math.round(income/12);
						var typeofincome = 'month';
					} else {
						var displayincome = Math.round(income*12);
						var typeofincome = 'year';
					}
	
					if((incomeCurrency==93)||(incomeCurrency==153)||(incomeCurrency==188)) 
						{displayincome = curArray[incomeCurrency]+'&nbsp;'+addCommasin(displayincome)+' per '+typeofincome;} 
					else { displayincome = curArray[incomeCurrency]+'&nbsp;'+addCommasothers(displayincome)+' per '+typeofincome;}
					$('#salary').show();
					$('#salary').html(displayincome);
					
					if(income < 50000 && income.indexOf('0')!=0 && incomeType==1 && incomeCurrency==98) {
						showError('1', 'Please check the annual income that you have provided.');
						return true;	}
				}
		 } 
		 else {
			showError('1', 'Please enter the income');
			$('#income').focus();
			return false;
		    }
	}
	else if(incomeCurrency==0) {
		showError('1', 'Please select the income Currency');
		$('#incomeCurrency').focus();
		return false;
	}
}

function addCommasin(nStr){
	nStr += '';
	x = nStr.split('.');
	x1 = x[0];
	x2 = x.length > 1 ? '.' + x[1] : '';
	var rgx1 = /(\d+)(\d{2})/;
	var rgx2 = /(\d+)(\d{3})/;
	if(rgx2.test(x1)) {
		d1=x1.replace(rgx2,'$1');
		d2=x1.replace(rgx2,'$2');
		while (rgx1.test(d1)) {
		d1 = d1.replace(rgx1, '$1' + ',' + '$2');
		}
	}else{
		return nStr;
	}	
	return d1+','+d2;
}

function addCommasothers(nStr)
{
	nStr += '';
	x = nStr.split('.');
	x1 = x[0];
	x2 = x.length > 1 ? '.' + x[1] : '';
	var rgx = /(\d+)(\d{3})/;
	while (rgx.test(x1)) {
		x1 = x1.replace(rgx, '$1' + ',' + '$2');
	}
	return x1 + x2;
}

function descchk()
{
	var desc_txt=$("#description").val();
	if(desc_txt=="")
	{
		showError('1', 'Please enter profile description.');
		return false;
	}

	else
	{
		if(desc_txt.length<50){
			showError('1', 'Please enter a profile description in not less than 50 characters');
			return false;
			}
		else if(desc_txt.length>500){
			showError('1', 'Maximum profile description is 500 characters only');
			return false;
		}
	}
	showError('0', '');
return true;
}

$("#description").focus(function(){
	var desc_txt=$("#description").val();
	$('#des_count').html(desc_txt.length);
	});
$("#description").keyup(function(){
	var desc_txt=$("#description").val();
	$('#des_count').html(desc_txt.length);
	});

function homeReg(){
	if(!profileChk())
	{	
		$("#profile_for").focus();
		return false;
	}
	if(!nameChk())
	{
		$("#name").focus();
		return false;
	}
	if(!genderChk())
	{
		document.register.gender[0].focus();
		return false;
	}
	if(!dobChk())
	{
		return false;
	}
	if(!denominationChk()) {
		$("#denom").focus();
		return false;
	}
	if(!casteChk()) {
		$("#caste").focus();
		return false;
	}
	if(!motherChk()){
		$("#motherTongue").focus();
		return false;
	}
	if(!countryChk()){
		$("#country").focus();
		return false;
	}
	if(!McodeChk()){
		$("#Mcode").focus();
		return false;
	}
	if(!mobileChk()){
		$("#mobile").focus();
		return false;
	}
	if(!emailChk()){
		$("#email").focus();
		return false;
	}
	if(!emailAvail()){
		$("#email").focus();
		return false;
	}
	if(!passwordChk()){
		$("#password").focus();
		return false;
	}
	if(!termsChk()){
		$("#agree").focus();
		return false;
	}
	
	var profile_for = $("#profile_for").val();
	var name = $("#name").val();	
	if(document.register.gender[0].checked)	{
		var gender = 1;
		$('#gender_val').val(gender);
	}
	else if(document.register.gender[1].checked){
		var gender = 0;
		$('#gender_val').val(gender);
	}
	var dobDate = $("#dobDate").val();
	var dobMonth = $("#dobMonth").val();
	var dobYear = $("#dobYear").val();
	var dob = dobYear+'-'+dobMonth+'-'+dobDate;
	$('#dob').val(dob);
	var age = $("#age").val();
	var denom = $("#denom").val();
	var caste = $("#caste").val();
	var subcaste = $("#subcaste").val();
	var motherTongue = $("#motherTongue").val();
	var country = $("#country").val();
	var Mcode = $("#Mcode").val();
	var mobile = $("#mobile").val();
	var email = $("#email").val();
	var password = $("#password").val();
}

function Register(){
	if(!maritalChk())
	{	
		$("#maritalStatus").focus();
		return false;
	}
	if(!noc_Chk())
	{	
		$("#no_child").focus();
		return false;
	}
	if(!noc_Click())
	{	
		$("#childwith_Y").focus();
		return false;
	}
	if(!residingStateChk())
	{	
		$("#residingState").focus();
		return false;
	}
	if(!residingCityChk())
	{	
		$("#residingCity").focus();
		return false;
	}
	if($("#country").val()!=93){
		if(!citizenshipChk())
		{	
			$("#citizenship").focus();
			return false;
		}
		if(!residentStatusChk())
		{	
			$("#residentStatus1").focus();
			return false;
		}
	}
	if(!heightChk())
	{	
		$("#feet").focus();
		return false;
	}
	if(!weightChk())
	{	
		$("#kgs").focus();
		return false;
	}
	if(!bodytypeChk())
	{	
		$("#bodyType1").focus();
		return false;
	}
	if(!complexionChk())
	{	
		$("#complexion1").focus();
		return false;
	}
	if(!physicalstatusChk())
	{	
		$("#physicalStatus0").focus();
		return false;
	}
	if(!eduChk())
	{	
		$("#education").focus();
		return false;
	}	
	if(!othereduchk())
	{	
		$("#educationDetail").focus();
		return false;
	}	
	if(!occ_Chk())
	{	
		$("#occupation").focus();
		return false;
	}	
	if(!employChk())
	{	
		$("#employCat1").focus();
		return false;
	}
	if(!eatingHabitsChk())
	{	
		$("#eatingHabits1").focus();
		return false;
	}
	if(!drinkinghabitsChk())
	{	
		$("#drinkingHabits1").focus();
		return false;
	}
	if(!smokinghabitsChk())
	{	
		$("#smokingHabits1").focus();
		return false;
	}
	if(!famvalue_Chk())
	{	
		$("#familyValue1").focus();
		return false;
	}
	if(!familytypeChk())
	{	
		$("#familyType1").focus();
		return false;
	}
	if(!familystatusChk())
	{	
		$("#familyStatus1").focus();
		return false;
	}
	if(!nobroChk())
	{	
		$("#numOfBrothers").focus();
		return false;
	}
	if(!nobro_MarriedChk())
	{	
		$("#brothersMarried").focus();
		return false;
	}
	if(!nosisChk())
	{	
		$("#numOfSisters").focus();
		return false;
	}
	if(!nosis_MarriedChk())
	{	
		$("#sistersMarried").focus();
		return false;
	}
	if(!descchk())
	{	
		$("#description").focus();
		return false;
	}
}