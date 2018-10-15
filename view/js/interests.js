/* 
	Title: james matrimony validations
	Author: Santhosh kumar surana
	Company: Azul computer technologies
	version: 0.1
	last updated: 2014 January
*/
function interests() {
    $('#cuisine').val(getVal($('#cuisine_right')[0]));
    if (($('#cuisine').val()) == '') {
        showError('1', 'select atleast one favorite cuisine');
		$('#cuisine_left').focus();
        return false;
    }
    if ($('#cuisineOtherchk').is(':checked') == true) {
        if (($('#cuisineOther').val()) == '') {
            showError('1', 'please enter your favorite cuisine');
            $('#cuisineOther').focus();
        return false;
        }
    }
    $('#music').val(getVal($('#music_right')[0]));
    if (($('#music').val()) == '') {
        showError('1', 'select atleast one favorite music genre');
		$('#music_left').focus();
        return false;
    }
    if ($('#musicOtherchk').is(':checked') == true) {
        if (($('#musicOther').val()) == '') {
			 showError('1', 'please enter your favorite music genre');
            $('#musicOther').focus();
        return false;
		}
    }
    $('#read').val(getVal($('#read_right')[0]));
    if (($('#read').val()) == '') {
        showError('1', 'select atleast one favorite type of books');
        $('#read_left').focus();
        return false;
    }
    if ($('#readOtherchk').is(':checked') == true) {
        if (($('#readOther').val()) == '') {
            showError('1', 'please enter what type of books you like');
            $('#readOther').focus();
        return false;
        }
    }
    $('#hobby').val(getVal($('#hobby_right')[0]));
    if (($('#hobby').val()) == '') {
        showError('1', 'select atleast one hobby');
        $('#hobby_left').focus();
        return false;
    }
    if ($('#hobbyOtherchk').is(':checked') == true) {
        if (($('#hobbyOther').val()) == '') {
            showError('1', 'please enter your hobbies');
            $('#hobbyOther').focus();
        return false;
        }
    }
    $('#interest').val(getVal($('#interest_right')[0]));
    if (($('#interest').val()) == '') {
        showError('1', 'select atleast one interest');
        $('#interest_left').focus();
        return false;
    }
    if ($('#interestOtherchk').is(':checked') == true) {
        if (($('#interestOther').val()) == '') {
            showError('1', 'please enter your interests');
            $('#interestOther').focus();
        return false;
        }
    }
    $('#fashion').val(getVal($('#fashion_right')[0]));
    if (($('#fashion').val()) == '') {
        showError('1', 'select atleast one favorite fashion style');
        $('#fashion_left').focus();
        return false;
    }
    if ($('#fashionOtherchk').is(':checked') == true) {
        if (($('#fashionOther').val()) == '') {
            showError('1', 'please enter what type of fashion you like');
            $('#fashionOther').focus();
        return false;
        }
    }
    $('#movies').val(getVal($('#movies_right')[0]));
    if (($('#movies').val()) == '') {
        showError('1', 'select atleast one favorite movies');
        $('#movies_left').focus();
        return false;
    }
    if ($('#moviesOtherchk').is(':checked') == true) {
        if (($('#moviesOther').val()) == '') {
            showError('1', 'please enter your favorite movies');
            $('#moviesOtherchk').focus();
        return false;
        }
    }
    $('#language').val(getVal($('#language_right')[0]));
    if (($('#language').val()) == '') {
        showError('1', 'select atleast one language you can speak');
        $('#language_left').focus();
        return false;
    }
    if ($('#languageOtherchk').is(':checked') == true) {
        if (($('#languageOther').val()) == '') {
            showError('1', 'please enter languages you can speak');
            $('#languageOtherchk').focus();
        return false;
        }
    }
    $('#sports').val(getVal($('#sports_right')[0]));
    if (($('#sports').val()) == '') {
        showError('1', 'select atleast one favorite sports');
        $('#sports_left').focus();
        return false;
    }
    if ($('#sportsOtherchk').is(':checked') == true) {
        if (($('#sportsOther').val()) == '') {
            showError('1', 'please enter your favorite sports');
            $('#sportsOther').focus();
        return false;
        }
    }
    showError('0', '');
    return true;
}