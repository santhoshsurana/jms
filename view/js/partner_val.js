/* 
	Title: james matrimony validations
	Author: Santhosh kumar surana
	Company: Azul computer technologies.llp
	version: 0.1
	last updated: 2014 January
*/
function partner_update() {
    $("#stAge").val($("#start_age").val());
    $("#enAge").val($("#end_age").val());
    fromFeet = getFeet($("#height_from").val());
    toFeet = getFeet($("#height_to").val());
    $("#fromFeet").val(fromFeet);
    $("#toFeet").val(toFeet);
    var marital = +$("#marital").val() + 1;
    $('#maritalStatus' + marital).prop('checked', true);
    if (marital >= 3) {
        $('#havchildrendiv').show();
        var child_live = +$("#child_live").val() + 1;
        $('#havChild' + child_live).prop('checked', true);
    }
    var phySts = $("#physical_status").val();
    $('#physicStatus' + phySts).prop('checked', true);
    $("#denom_left").val($("#denom").val());
    moveOptions(denom_left, denom_right);
    anyChk(denom_left, denom_right);
    $("#denom_left").val('');
    $("#mothertongue_left").val($("#mother_tounge").val());
    moveOptions(mothertongue_left, mothertongue_right);
    anyChk(mothertongue_left, mothertongue_right);
    $("#mothertongue_left").val('');
    $("#caste_left").val($("#caste").val());
    moveOptions(caste_left, caste_right);
    anyChk(caste_left, caste_right);
    $("#caste_left").val('');
    var eat = $("#eat_habit").val();
    $('#eating_habit' + eat).prop('checked', true);
    var smoke = $("#smk_habit").val();
    $('#drinking_habit' + smoke).prop('checked', true);
    var drink = $("#drnk_habit").val();
    $('#smoke_habit' + drink).prop('checked', true);
    var education_type = $("#education_type").val();
    $('#edu_type4').prop('checked', true);
    eduOption(education_left, education_right, 4);
	$("#country_left").val($("#country").val());
    moveOptions(country_left, country_right);
    anyChk(country_left, country_right);
	$("#country_left").val('');
	$("#citizenship_left").val($("#citizenship").val());
    moveOptions(citizenship_left, citizenship_right);
    anyChk(citizenship_left, citizenship_right);
	$("#citizenship_left").val('');
}

function valAge() {
    var stAge = $("#stAge").val();
    var enAge = $("#enAge").val();
    if (stAge != 0 || enAge != 0) {
        if ((stAge > enAge) || (stAge == 0 && enAge != 0) || (stAge != 0 && enAge == 0)) {
            showError('1', 'Invalid Age selection');
            $("#enAge").focus();
            return false;
        }
        else if ((enAge - stAge) < 3) {
            showError('1', 'There should be a minimal age gap of three years, as you have chosen the same age, only few prospects will be shown.');
            return false;
        }
    }
    else {
        $("#stAge").focus();
        return false;
    }
    $("#start_age").val(stAge);
    $("#end_age").val(enAge);
    showError('0', '');
    return true;
}

function maritalChk(selVal) {
    $('#maritalStatus1').prop('checked', false);
    if ((selVal == 0) || ($('#maritalStatus2').is(':checked') == true && $('#maritalStatus3').is(':checked') == true && $('#maritalStatus4').is(':checked') == true && $('#maritalStatus5').is(':checked') == true)) {
        $('#maritalStatus1').prop('checked', true);
        $('#maritalStatus2').prop('checked', false);
        $('#maritalStatus3').prop('checked', false);
        $('#maritalStatus4').prop('checked', false);
        $('#maritalStatus5').prop('checked', false);
        $('#havchildrendiv').fadeIn(1000);
    }
    else if ($('#maritalStatus2').is(':checked') == true) {
        if ($('#maritalStatus1').is(':checked') == false && $('#maritalStatus3').is(':checked') == false && $('#maritalStatus4').is(':checked') == false && $('#maritalStatus5').is(':checked') == false) {
            $('#havchildrendiv').fadeOut(1000);
        }
        else {
            $('#havchildrendiv').fadeIn(1000);
        }
    }
    else {
        $('#havchildrendiv').fadeIn(1000);
        return false;
    }
    return true;
}

function maritalVal() {
    var maritalstatus = '';
    if ($('#maritalStatus1').is(':checked') == true) {
        maritalstatus = $('#maritalStatus1').val() + '~';
    }
    if ($('#maritalStatus2').is(':checked') == true) {
        maritalstatus = maritalstatus + $('#maritalStatus2').val() + '~';
    }
    if ($('#maritalStatus3').is(':checked') == true) {
        maritalstatus = maritalstatus + $('#maritalStatus3').val() + '~';
    }
    if ($('#maritalStatus4').is(':checked') == true) {
        maritalstatus = maritalstatus + $('#maritalStatus4').val() + '~';
    }
    if ($('#maritalStatus5').is(':checked') == true) {
        maritalstatus = maritalstatus + $('#maritalStatus5').val()+ '~';
    }
	maritalstatus = maritalstatus.substring(0, maritalstatus.length - 1);
    return maritalstatus;
}

function valHeight() {
    var fromFeet = getCms($("#fromFeet").val());
    var toFeet = getCms($("#toFeet").val());
    if (fromFeet == 0 || toFeet == 0) {
        showError('1', 'please select Height');
        $("#toFeet").focus();
        return false;
    }
    else if (fromFeet >= toFeet) {
        showError('1', 'Invalid Height selection');
        $("#toFeet").focus();
        return false;
    }
    else if ((toFeet - fromFeet) < 15) {
        showError('1', 'The minimal gap of start height should be six inches');
        $("#toFeet").focus();
        return false;
    }
    $("#height_from").val(fromFeet);
    $("#height_to").val(toFeet);
    showError('0', '');
    return true;
}

function getFeet(cms) {
    var feet = parseInt(cms) / 30.48;
    feet = feet.toString();
    var f1 = feet.split(".");
    var f2 = "0." + f1[1];
    var inc = Math.round(f2 * 100);
    inc = Math.round(inc * 0.12);
    if (inc >= 12) {
        inc = inc - 12;
        f1[0] = parseInt(f1[0]) + 1;
    }
    if (inc == 0) {
        return f1[0];
    }
    else {
        return f1[0] + "-" + inc;
    }
}

function getCms(feet) {
    if (feet.indexOf("-") != -1) {
        var htarr = feet.split("-");
        var incms = parseInt(htarr[0]) * 30.48 + parseInt(htarr[1]) * 2.54;
        return Math.round(incms);
    }
    else {
        var incms = parseInt(feet) * 30.48;
        return Math.round(incms);
    }
}

function physicStatus() {
    if ($('input[name=physicStatus]').is(':checked') == false) {
        return false;
    }
    $('input[name=physicStatus]').val();
    return true;
}

function eatingChk(selVal) {
    if (selVal == 4 || ($('#eating_habit1').is(':checked') == true && $('#eating_habit2').is(':checked') == true && $('#eating_habit3').is(':checked') == true)) {
        for (i = 1; i <= 3; i++)
            for (i = 1; i <= 3; i++) {
                $('#eating_habit' + i).prop('checked', false);
            }
        $('#eating_habit4').prop('checked', true);
    }
    else {
        $('#eating_habit4').prop('checked', false);
    }
}

function eatVal() {
    var eatingstatus = '';
    if ($('#eating_habit1').is(':checked') == true) {
        eatingstatus = $('#eating_habit1').val() + '~';
    }
    if ($('#eating_habit2').is(':checked') == true) {
        eatingstatus = eatingstatus + $('#eating_habit2').val() + '~';
    }
    if ($('#eating_habit3').is(':checked') == true) {
        eatingstatus = eatingstatus + $('#eating_habit3').val();
    }
    if ($('#eating_habit4').is(':checked') == true) {
        eatingstatus = $('#eating_habit4').val();
    }
    return eatingstatus;
}

function smokingChk(selVal) {
    if (selVal == 4) {
        for (i = 1; i <= 3; i++)
            $('#smoke_habit' + i).prop('checked', false);
    }
    else if ($('#smoke_habit1').is(':checked') == true && $('#smoke_habit2').is(':checked') == true && $('#smoke_habit3').is(':checked') == true) {
        for (i = 1; i <= 3; i++) {
            $('#smoke_habit' + i).prop('checked', false);
        }
        $('#smoke_habit4').prop('checked', true);
    }
    else {
        $('#smoke_habit4').prop('checked', false);
    }
}

function smokeVal() {
    var smokingstatus = '';
    if ($('#smoke_habit1').is(':checked') == true) {
        smokingstatus = $('#smoke_habit1').val() + '~';
    }
    if ($('#smoke_habit2').is(':checked') == true) {
        smokingstatus = smokingstatus + $('#smoke_habit2').val() + '~';
    }
    if ($('#smoke_habit3').is(':checked') == true) {
        smokingstatus = smokingstatus + $('#smoke_habit3').val();
    }
    if ($('#smoke_habit4').is(':checked') == true) {
        smokingstatus = $('#smoke_habit4').val();
    }
    return smokingstatus;
}

function drinkingChk(selVal) {
    if (selVal == 4) {
        for (i = 1; i <= 3; i++)
            $('#drinking_habit' + i).prop('checked', false);
    }
    else if ($('#drinking_habit1').is(':checked') == true && $('#drinking_habit2').is(':checked') == true && $('#drinking_habit3').is(':checked') == true) {
        for (i = 1; i <= 3; i++) {
            $('#drinking_habit' + i).prop('checked', false);
        }
        $('#drinking_habit4').prop('checked', true);
    }
    else {
        $('#drinking_habit4').prop('checked', false);
    }
}

function drinkVal() {
    var drinkingstatus = '';
    if ($('#drinking_habit1').is(':checked') == true) {
        drinkingingstatus = $('#drinking_habit1').val() + '~';
    }
    if ($('#drinking_habit2').is(':checked') == true) {
        drinkingingstatus = drinkingingstatus + $('#drinking_habit2').val() + '~';
    }
    if ($('#drinking_habit3').is(':checked') == true) {
        drinkingingstatus = drinkingingstatus + $('#drinking_habit3').val();
    }
    if ($('#drinking_habit4').is(':checked') == true) {
        drinkingingstatus = $('#drinking_habit4').val();
    }
    return drinkingingstatus;
}

function changecountry(cleft, cright) {
    var cityDiv = '';
    var len = cright.length;
    $('#InStateDiv').hide();
    $('#UsaStateDiv').hide();
    if ($('#cityDiv').css('display') == 'block') {
        $('#cityDiv').hide();
        cityDiv = 1;
    }
    for (i = 0; i < len; i++) {
        if (cright.options[i].value == 93) {
            $('#InStateDiv').fadeIn(1000);;
            if (cityDiv == 1)
                $('#cityDiv').fadeIn(1000);
        }
        if (cright.options[i].value == 211)
            $('#UsaStateDiv').fadeIn(1000);
    }
}

function removeCountry() {
    var country_right = $("#country_right")[0];
    var cityDiv = '';
    var len = $("#country_right")[0].length;
    $('#InStateDiv').hide();
    $('#UsaStateDiv').hide();
    if ($('#citydiv').css('display') == "block") {
        $('#citydiv').hide();
        cityDiv = 1;
    }
    for (i = 0; i < len; i++) {
        if ($("#country_right")[0].options[i].value == 93) {
            $('#InStateDiv').show();
            if (cityDiv == 1)
                $('#citydiv').show();
        }
        if ($("#country_right")[0].options[i].value == 211)
            $('#UsaStateDiv').show();
    }
}

function showCity() {
    var cityval = '',
        indval = '0';
    var stateval = getVal($('#inState_right')[0]);
    if ($("#inState_right").length == 0 || stateval == 0) {
        if ($('#cityDiv').css('display') == "block")
            $('#cityDiv').hide();
    }
    else {
        if ($('#city_right')[0]) {
            cityval = getVal($('#city_right')[0]);
        }
        var numlen = $("#country_right")[0].options.length;
        for (var i = 0; i < numlen; i++) {
            if ($("#country_right")[0].options[i].value == "93") {
                var argUrl = '../control/getCity.php';
                var arg = "state=" + stateval;
                $.ajax({
                    url: argUrl,
                    type: "GET",
                    data: arg,
                    success: function (result) {
                        $("#city_left").html(result);
                    }
                });
                indval = '1';
            }
        }
        if (indval == "1") {
            $("#cityDiv").show();
        }
        else {
            $("#cityDiv").hide();
        }
    }
}

function citizenshipChk() {
    var con = getVal($('#country_right')[0]);
    $('#country').val(con);
    var cit = getVal($('#citizenship_right')[0]);
    $('#citizenship').val(cit);
    var citizenship = $('#citizenship').val().split('~');
    var country = $('#country').val().split('~');
    if ($('#citizenship').val() != 0 && $('#country').val() != 0) {
        var indiaPos = citizenship.indexOf('93');
        if (indiaPos == -1) {
            var countryBaseCitizenAvail = 0;
            for (var i = 0; i < citizenship.length; i++) {
                for (var k = 0; k < country.length; k++) {
                    if (citizenship[i] == country[k]) {
                        countryBaseCitizenAvail = 1;
                        break;
                    }
                }
            }
            if (countryBaseCitizenAvail == 0) {
                showError('1', 'You have not chosen citizenship from the list of the country selected.');
            }
        }
    }
    showError('0', '');
    return true;
}

function eduOption(education_left, education_right, optVal) {
    var education_type = $("#education_type").val();
    if (optVal == 1) {
        createOption(education_right, 'Any', 0);
    }
    else if (optVal == 2 || optVal == 3 || optVal == 4) {
        var numleftEdulen = education_left.length;
        var numrightEdulen = education_right.length;
        for (i = numrightEdulen - 1; i >= 0; i--)
            education_right.options[i] = null;
        if (optVal == 2) {
            for (var i = 0; i < numleftEdulen; i++) {
                if (education_left.options[i].value != 0 && education_left.options[i].value != 14 && education_left.options[i].value != 15) {
                    education_right.add(new Option(education_left.options[i].text, education_left.options[i].value));
                }
            }
        }
        else if (optVal == 3) {
            for (var i = 0; i < numleftEdulen; i++) {
                if (education_left.options[i].value != 0 && education_left.options[i].value != 14 && education_left.options[i].value != 15 && education_left.options[i].value != 3 && education_left.options[i].value != 4) {
                    education_right.add(new Option(education_left.options[i].text, education_left.options[i].value));
                }
            }
        }
        else if (optVal == 4) {
            if (education_type > 13) {
                for (var i = 0; i < numleftEdulen; i++) {
                    if (education_left.options[i].value == 14 || education_left.options[i].value == 15) {
                        education_right.add(new Option(education_left.options[i].text, education_left.options[i].value));
                    }
                }
            }
            else {
                for (var i = 0; i < numleftEdulen; i++) {
                    if (education_left.options[i].value == education_type) {
                        education_right.add(new Option(education_left.options[i].text, education_left.options[i].value));
                    }
                }
            }
        }
    }
}

function incomeVal() {
    var ind_annual = new Array(0, 49999, 10000001);
    var us_annual = new Array(0, 1, 16);
    var counval = getVal($('#country_right')[0]);
    var stincomevals = $('#from_income').val();
    var array = new Array();
    var stat, showhide = 0;
    var RsFlag = 0,
        iRightLen = $("#country_right")[0].length;
    for (i = 0; i < iRightLen; i++) {
        if ($("#country_right")[0].options[i].value == 93 || $("#country_right")[0].options[i].value == 0)
            RsFlag = 1;
    }
    if (RsFlag == 1)
        stat = 1;
    else
        stat = 0;
    if (counval == '') {
        stat = 1;
    }
    if (stat == 1) {
        array = ind_annual;
    }
    else {
        array = us_annual;
    }
    for (var i = 0; i < array.length; i++) {
        if (array[i] == stincomevals) {
            showhide = 1;
        }
    }
    if (showhide == 1) {
        $('#annualIncome').hide();
        $('#to_income').val(0);
    }
    else {
        $('#annualIncome').show();
        $('#to_income').val(0);
    }
    return false;
}

function removeAllOptions(selectbox) {
    var i;
    if (selectbox[0]) {
        for (i = selectbox[0].options.length - 1; i >= 0; i--) {
            selectbox[0].remove(i);
        }
    }
}

function anyChk(from, to) {
    var selFrLength = from.length;
    var selToLength = to.length;
    var iAnyFound = 0;
    var iAnyGothraFound = 0;
    for (i = selFrLength - 1; i >= 0; i--) {
        if (from.options[i].selected) {
            if (from.options[i].value == 0) iAnyFound = 1;
        }
    }
    selToLength = to.length;
    if (iAnyFound == 1) {
        if (to.id == 'country_right') {
            if ($('#InStateDiv'))
                $('#InStateDiv').hide();
            if ($('#UsaStateDiv'))
                $('#UsaStateDiv').hide();
            if ($("cityDiv"))
                $("cityDiv").hide();
        }
        if (to.id == 'inState_right') {
            if ($("cityDiv")) {
                createOption(city_right, 'Any', 0);
                $("cityDiv").hide();
            }
        }
        for (i = selToLength - 1; i >= 0; i--) {
            if (to[i].value != 0)
                to.options[i] = null;
        }
    }
    else {
        for (i = selToLength - 1; i >= 0; i--) {
            if (to[i].value == 0)
                to.options[i] = null;
        }
    }
}

function getVal(selobj) {
    var myArray = "";
    var numlen = selobj.options.length;
    for (var i = 0; i < numlen; i++) {
        myArray += selobj.options[i].value + "~";
    }
    myArray = myArray.substring(0, myArray.length - 1);
    return myArray;
}

function selValChk(obj, msg) {
    if (obj.length > 30) {
        showError("Sorry, you can select only up to 30 " + msg + " values.");
        obj.focus();
        return false;
    }
    else
        return true;
}

function partner() {
    if (!valAge()) {
        $("#stAge").focus();
        return false;
    }
    if (!valHeight()) {
        $("#fromFeet").focus();
        return false;
    }
    if ($('input[name=maritalStatus]').is(':checked') == false) {
        showError('1', 'Please select marital status.');
        return false;
    }
    if ($('#denom_right')[0]) {
        if (!selValChk($('#denom_right')[0], 'denomination')) {
            return false;
        }
        else if ($("#denom_right")[0].options.length == 0) {
            showError('1', 'Please select denomination.');
            $("#denom_right").focus();
            return false;
        }
    }
    if ($('#mothertongue_right')[0]) {
        if (!selValChk($('#mothertongue_right')[0], 'mother tongue'))
            return false;
    }
    if ($('#caste_right')[0]) {
        if (!selValChk($('#caste_right')[0], 'caste'))
            return false;
    }
    if ($('#country_right')[0]) {
        if (!selValChk($('#country_right')[0], 'countries'))
            return false;
    }
    if ($('#usaState_right')[0]) {
        if (!selValChk($('#usaState_right')[0], 'states'))
            return false;
    }
    if ($('#inState_right')[0]) {
        if (!selValChk($('#inState_right')[0], 'states'))
            return false;
    }
    if ($('#city_right')[0]) {
        if (!selValChk($('#city_right')[0], 'cities'))
            return false;
    }
    if ($('#citizenship_right')[0]) {
        if (!selValChk($('#citizenship_right')[0], 'citizenships'))
            return false;
    }
    if ($('#occupation_right')[0]) {
        if (!selValChk($('#occupation_right')[0], 'occupations'))
            return false;
    }
    $('#marital').val(maritalVal());
    $('#eat_habit').val(eatVal());
    $('#smk_habit').val(smokeVal());
    $('#drnk_habit').val(drinkVal());
    $('#denom').val(getVal($('#denom_right')[0]));
    $('#caste').val(getVal($('#caste_right')[0]));
    $('#mother_tounge').val(getVal($('#mothertongue_right')[0]));
    $('#country').val(getVal($('#country_right')[0]));
    if ($('#instate')) {
        $('#instate').val(getVal($('#inState_right')[0]));
    }
    if ($('#usastate')) {
        $('#usastate').val(getVal($('#usaState_right')[0]));
    }
    if ($('#city')) {
        $('#city').val(getVal($('#city_right')[0]));
    }
    if ($('#citizenship_right')) {
        $('#citizenship').val(getVal($('#citizenship_right')[0]));
    }
    $('#education').val(getVal($('#education_right')[0]));
    $('#occupation').val(getVal($('#occupation_right')[0]));
    var stin = parseInt($("#from_income").val());
    var endin = parseInt($("#to_income").val());
    if (stin > endin) {
        showError('1', 'Invalid income selection');
        $("#from_income").focus();
        return false;
    }
    showError('0', '');
    return true;
}