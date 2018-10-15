/* 
	Title: james matrimony validations
	Author: Santhosh kumar surana
	Company: Azul computer technologies
	version: 0.1
	last updated: 2014 January
*/

$(window).load(function () {
    $(".loader").fadeOut("slow");
    sticky_relocate();
});


$(window).scroll(function () {
    sticky_relocate();
});


function sticky_relocate() {
	var docheight=window.innerHeight;
	var boxheight=$('.box').height();
    var window_top = $(window).scrollTop();
    var div_top = $('header').height()-20;
    if (window_top > div_top) {
        $('header').addClass('top-header');
    } else {
        $('header').removeClass('top-header');
    }
}

function model(data) {
    $('#' + data).modal('show');
}

function getUserId(userId) {
    $.get({
        url: "control/getUserId.php",
        data: {
            userId: userId
        },
        success: function (result) {
            alert(result);
            return result;
        },
    });
}

function charChk(evt,regtype) {
	
  var theEvent = evt || window.event;
  var key = theEvent.keyCode || theEvent.which;
    if(key == 37 || key == 38 || key == 39 || key == 40 || key == 8 || key == 46) { // Left / Up / Right / Down Arrow, Backspace, Delete keys
     return;
 }
  key = String.fromCharCode( key );
  var regex = '';
  if(regtype=='num'){
	  regex = /[0-9]+$/;
  }else if(regtype=='alpha'){
	  regex = /^[a-zA-Z]+$/;
  }else if(regtype=='alphanum'){
	  regex = /^[a-zA-Z0-9]+$/;
  }else if(regtype=='email'){
	  regex = /^[a-zA-Z0-9\.\@]+$/;
  }else if(regtype=='name'){
	  regex = /^[a-zA-Z\s]+$/;
  }else if(regtype=='uid'){
	  regex = /^[a-zA-Z0-9\.\@]+$/;
  }
  
  if( !regex.test(key) ) {
    theEvent.preventDefault();
    if(theEvent.preventDefault){
		 theEvent.preventDefault();}
  }
}

var NS4 = (navigator.appName == "Netscape" && parseInt(navigator.appVersion) < 5);

function moveOptions(from, to) {
    var selLength = from.length;
    var selectedText = new Array();
    var selectedValues = new Array();
    var selectedCount = 0;
    var cou1 = 1;
    var anyflg = 1;
    var adflag = 0;
    var i;
    var MoveRestriction = arguments[2];
    var casterestrictalert;
    var totalcastecount;
    for (i = selLength - 1; i >= 0; i--) {
        if (from.options[i].selected) {
            if (from.options[i].value == 0) {
                anyflg = 0;
            }
            for (j = 0; j < to.length; j++) {
                cou1 = 1;
                if (to.options[j].value == 0) {
                    anyflg = 0;
                }
                if (to.options[j].text == from.options[i].text) {
                    cou1 = 0
                }
            }
            if (cou1 == 1) {
                selectedText[selectedCount] = from.options[i].text;
                selectedValues[selectedCount] = from.options[i].value;
                selectedCount++;
            }
        }
    }
    if (to.length > 0) {
        totalcastecount = to.length;
        for (i = selectedCount - 1; i >= 0; i--) {
            adflag = 0;
            for (j = 0; j < to.length; j++) {
                if (selectedText[i] == to.options[j].text && adflag == 0) {
                    adflag = 1
                }
            }
            if (adflag == 0) {
                if (MoveRestriction == 1) {
                    if (anyflg == 0 && totalcastecount <= 30 && from.options[0].value == 0)
                        addOption(to, selectedText[i], selectedValues[i]);
                    else if (totalcastecount >= 30)
                        casterestrictalert = 1;
                    else
                        addOption(to, selectedText[i], selectedValues[i]);
                } else {
                    addOption(to, selectedText[i], selectedValues[i]);
                }
                totalcastecount++;
            }
        }
    } else {
        for (i = selectedCount - 1; i >= 0; i--) {
            if (MoveRestriction == 1 && selectedCount > 30 && (selectedCount - i) > 30)
                casterestrictalert = 1;
            else
                addOption(to, selectedText[i], selectedValues[i]);
        }
    }
    if (casterestrictalert == 1) {
        showError("Sorry, you can select only up to 30 castes");
        return false;
    }
    if (NS4) history.go(0);
}

function removeOptions(to, from) {
    var selLength = from.length;
    var selectedText = new Array();
    var selectedValues = new Array();
    var selectedCount = 0;
    var i;

    for (i = selLength - 1; i >= 0; i--) {
        if (from.options[i].selected) {
            selectedText[selectedCount] = from.options[i].text;
            selectedValues[selectedCount] = from.options[i].value;
            deleteOption(from, i);
            selectedCount++;
        }
    }
    if (NS4) history.go(0);
}

function createOption(objSelect, OptionTxt, OptionVal) {
    var objOption = document.createElement("option");
    var selLength = objSelect.length;
    for (i = selLength - 1; i >= 0; i--)
        objSelect.options[i] = null;

    objOption.text = OptionTxt;
    objOption.value = OptionVal;

    if (document.all && !window.opera) {
        objSelect.add(objOption);
    } else {
        objSelect.add(objOption, null);
    };
}

function addOption(theSel, theText, theValue) {
    var newOpt = new Option(theText, theValue);
    var selLength = theSel.length;
    theSel.options[selLength] = newOpt;
}

function deleteOption(theSel, theIndex) {
    var selLength = theSel.length;
    if (selLength > 0) {
        theSel.options[theIndex] = null;
    }
}

function showError(show, text) {
    if (show == 1) {
        $('#error').show();
    } else {
        $('#error').hide();
    }
    $('#errorTxt').html(text + '\n');
}

function subscribe() {
	var subscribe = $("#subscribe").val();
	if (subscribe=='') {
		$("#subscribe_txt").html('Please enter the e-mail address');
		return false;
	} else if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(subscribe))) {
		$("#subscribe_txt").html('Please enter a valid e-mail address');
		return false;
	}
	var url = '../control/subscribe.php';
	var dataStr="email="+subscribe;
	var result = returnAjax('GET',url, dataStr);
	$("#subscribe_txt").html(result);
}

function returnAjax(typeOpt,varRequestUrl, dataStr){ //common ajax request function						
        return  response = $.ajax({
                        url:varRequestUrl,
                        type:typeOpt,
						data: dataStr,
                        async: false,
                        success: function(result) {
                        } 
                }).responseText;									

                //return response;							
                }
