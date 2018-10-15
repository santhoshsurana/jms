<?php session_start(); 
include "../control/functions.php"; 
if(isset($_POST[ 'submit'])) { 
header( 'Location:index.php'); } ?>
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

<body>
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
                        <div class="bar" style="width: 60%;"></div>
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
                                <li class="span active" style="width:15%">
                                    <a class="step active"> <span class="number">3</span>
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
                    <form name="likes" class="form-horizontal" action="../control/interests.php" method="post" onSubmit="return interests();">
                        <div class="control-group">
                            <label class="control-label">
                                <h4>Favourite Cuisine</h4>
                            </label>
                            <div class="controls">
                                <select id='cuisine_left' name='cuisine_left' multiple size="6" onDblClick="moveOptions(cuisine_left, cuisine_right);">
                                    <option value='1'>Arabic</option>
                                    <option value='2'>Bengali</option>
                                    <option value='3'>Chinese</option>
                                    <option value='4'>Continental</option>
                                    <option value='5'>Gujarati</option>
                                    <option value='6'>Italian</option>
                                    <option value='7'>Konkan</option>
                                    <option value='8'>Mexican</option>
                                    <option value='9'>Moghlai</option>
                                    <option value='10'>Punjabi</option>
                                    <option value='11'>Rajasthani</option>
                                    <option value='12'>South Indian</option>
                                    <option value='13'>Sushi</option>
                                    <option value='14'>I'm a foodie</option>
                                    <option value='15'>Not a foodie!</option>
                                </select>
                                <input type="button" class='btn' value="Add" onClick="moveOptions(cuisine_left, cuisine_right);">
                                <input type="button" class='btn' value="Remove" onClick="removeOptions(cuisine_left, cuisine_right);">
                                <select multiple size="6"  name="cuisine_right" id="cuisine_right" onDblClick="removeOptions(cuisine_left, cuisine_right);"></select>
                                <input type="hidden" name="cuisine" id="cuisine" value="" />
                            </div>
                        </div>
                        <div class="control-group line">
                            <div class="controls">
                                <label class='control-label' for='cuisineOtherchk'>
                                    <input type='checkbox' name='cuisineOtherchk' id='cuisineOtherchk' onClick="enableOther('cuisineOtherchk', 'cuisineOther');" />Others</label>
                                <input type='text' name='cuisineOther' id='cuisineOther' disabled onBlur="checkOthers('cuisineOther')" placeholder='others' value="" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">
                                <h4>Favourite Music</h4>
                            </label>
                            <div class="controls">
                                <select id='music_left' name='music_left' multiple size="6" onDblClick="moveOptions(music_left, music_right);anyChk(music_left, music_right);">
                                    <option value='1'>Blues</option>
                                    <option value='2'>Devotional</option>
                                    <option value='3'>Disco</option>
                                    <option value='4'>Film songs</option>
                                    <option value='5'>Ghazals</option>
                                    <option value='6'>Hip-Hop</option>
                                    <option value='7'>metal</option>
                                    <option value='8'>House music</option>
                                    <option value='9'>Indian classical</option>
                                    <option value='10'>Indipop</option>
                                    <option value='11'>Jazz</option>
                                    <option value='12'>Pop</option>
                                    <option value='13'>Qawalis</option>
                                    <option value='14'>Rap</option>
                                    <option value='15'>Reggae</option>
                                    <option value='16'>Sufi</option>
                                    <option value='17'>Techno</option>
                                    <option value='18'>Western classical</option>
                                    <option value='19'>I'm not a music fan</option>
                                </select>
                                <input type="button" class='btn' value="Add" onClick="moveOptions(music_left, music_right);anyChk(music_left, music_right);">
                                <input type="button" class='btn' value="Remove" onClick="removeOptions(music_left, music_right);">
                                <select multiple size="6"  name="music_right" id="music_right" onDblClick="removeOptions(music_left, music_right);"></select>
                                <input type="hidden" name="music" id="music" value="" />
                            </div>
                        </div>
                        <div class="control-group line">
                            <div class="controls">
                                <label class='control-label' for='musicOtherchk'>
                                    <input type='checkbox' name='musicOtherchk' id='musicOtherchk' onClick="enableOther('musicOtherchk', 'musicOther');" />Others</label>
                                <input type='text' name='musicOther' id='musicOther' disabled onBlur="checkOthers('musicOther')" placeholder='others' value="" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">
                                <h4>Favourite Reads</h4>
                            </label>
                            <div class="controls">
                                <select id='read_left' name='read_left' multiple size="6" onDblClick="moveOptions(read_left, read_right);">
                                    <option value='1' />Actually a bookworm</option>
                                    <option value='2' />Biographies</option>
                                    <option value='3' />Business / Occupational</option>
                                    <option value='4' />Classics</option>
                                    <option value='5' />Comics</option>
                                    <option value='6' />Fantasy</option>
                                    <option value='7' />History</option>
                                    <option value='8' />Humor</option>
                                    <option value='9' />Literature</option>
                                    <option value='10' />Magazines/newspapers</option>
                                    <option value='11' />Philosophy / spiritual</option>
                                    <option value='12' />Poetry</option>
                                    <option value='13' />Romance</option>
                                    <option value='14' />Science fiction</option>
                                    <option value='15' />Self-help</option>
                                    <option value='16' />Short stories</option>
                                    <option value='17' />Stay away from books</option>
                                    <option value='18' />Thriller / suspense</option>
                                </select>
                                <input type="button" class='btn' value="Add" onClick="moveOptions(read_left, read_right);">
                                <input type="button" class='btn' value="Remove" onClick="removeOptions(read_left, read_right);">
                                <select multiple size="6"  name="read_right" id="read_right" onDblClick="removeOptions(read_left, read_right);"></select>
                                <input type="hidden" name="read" id="read" value="" />
                            </div>
                        </div>
                        <div class="control-group line">
                            <div class="controls">
                                <label class='control-label' for='readOtherchk'>
                                    <input type='checkbox' name='readOtherchk' id='readOtherchk' onClick="enableOther('readOtherchk', 'readOther');" />Others</label>
                                <input type='text' name='readOther' id='readOther' disabled onBlur="checkOthers('readOther')" placeholder='others' value="" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">
                                <h4>Hobbies</h4>
                            </label>
                            <div class="controls">
                                <select id='hobby_left' name='hobby_left' multiple size="6" onDblClick="moveOptions(hobby_left, hobby_right);anyChk(hobby_left, hobby_right);">
                                    <option value='1' />Acting</option>
                                    <option value='2' />Astronomy</option>
                                    <option value='3' />Astrology</option>
                                    <option value='4' />Art / handicraft</option>
                                    <option value='5' />Collectibles</option>
                                    <option value='6' />Cooking</option>
                                    <option value='7' />Crosswords</option>
                                    <option value='8' />Dancing</option>
                                    <option value='9' />Film-making</option>
                                    <option value='10' />Fishing</option>
                                    <option value='11' />Gardening/ landscaping</option>
                                    <option value='12' />Graphology</option>
                                    <option value='13' />Nature</option>
                                    <option value='14' />Numerology</option>
                                    <option value='15' />Painting</option>
                                    <option value='16' />Palmistry</option>
                                    <option value='17' />Pets</option>
                                    <option value='18' />Photography</option>
                                    <option value='19' />Playing hobbyal instruments</option>
                                    <option value='20' />Puzzles</option>
                                </select>
                                <input type="button" class='btn' value="Add" onClick="moveOptions(hobby_left, hobby_right);anyChk(hobby_left, hobby_right);">
                                <input type="button" class='btn' value="Remove" onClick="removeOptions(hobby_left, hobby_right);">
                                <select multiple size="6"  name="hobby_right" id="hobby_right" onDblClick="removeOptions(hobby_left, hobby_right);"></select>
                                <input type="hidden" name="hobby" id="hobby" value="" />
                            </div>
                        </div>
                        <div class="control-group line">
                            <div class="controls">
                                <label class='control-label' for='hobbyOtherchk'>
                                    <input type='checkbox' name='hobbyOtherchk' id='hobbyOtherchk' onClick="enableOther('hobbyOtherchk', 'hobbyOther');" />Others</label>
                                <input type='text' name='hobbyOther' id='hobbyOther' disabled onBlur="checkOthers('hobbyOther')" placeholder='others' value="" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">
                                <h4>Interests</h4>
                            </label>
                            <div class="controls">
                                <select id='interest_left' name='interest_left' multiple size="6" onDblClick="moveOptions(interest_left, interest_right);anyChk(interest_left, interest_right);">
                                    <option value='1' />Adventure sports</option>
                                    <option value='2' />Book clubs</option>
                                    <option value='3' />Computer games</option>
                                    <option value='4' />Health & fitness</option>
                                    <option value='5' />Internet</option>
                                    <option value='6' />Learning new languages</option>
                                    <option value='7' />Movies</option>
                                    <option value='8' />interest</option>
                                    <option value='9' />Politics</option>
                                    <option value='10' />Reading</option>
                                    <option value='11' />Social service</option>
                                    <option value='12' />Sports</option>
                                    <option value='13' />Sports</option>
                                    <option value='14' />Theatre</option>
                                    <option value='15' />Television</option>
                                    <option value='16' />Travel</option>
                                    <option value='17' />Writing</option>
                                    <option value='18' />Yoga</option>
                                    <option value='19' />Alternative healing / medicine</option>
                                </select>
                                <input type="button" class='btn' value="Add" onClick="moveOptions(interest_left, interest_right);anyChk(interest_left, interest_right);">
                                <input type="button" class='btn' value="Remove" onClick="removeOptions(interest_left, interest_right);">
                                <select multiple size="6"  name="interest_right" id="interest_right" onDblClick="removeOptions(interest_left, interest_right);"></select>
                                <input type="hidden" name="interest" id="interest" value="" />
                            </div>
                        </div>
                        <div class="control-group line">
                            <div class="controls">
                                <label class='control-label' for='interestOtherchk'>
                                    <input type='checkbox' name='interestOtherchk' id='interestOtherchk' onClick="enableOther('interestOtherchk', 'interestOther');" />Others</label>
                                <input type='text' name='interestOther' id='interestOther' disabled onBlur="checkOthers('interestOther')" placeholder='others' value="" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">
                                <h4>Preferred fashionStyle</h4>
                            </label>
                            <div class="controls">
                                <select id='fashion_left' name='fashion_left' multiple size="6" onDblClick="moveOptions(fashion_left, fashion_right);anyChk(fashion_left, fashion_right);">
                                    <option value='1' />Casual wear</option>
                                    <option value='2' />Designer wear</option>
                                    <option value='3' />Indian / Ethnic wear</option>
                                    <option value='4' />Western formal wear</option>
                                </select>
                                <input type="button" class='btn' value="Add" onClick="moveOptions(fashion_left, fashion_right);anyChk(fashion_left, fashion_right);">
                                <input type="button" class='btn' value="Remove" onClick="removeOptions(fashion_left, fashion_right);">
                                <select multiple size="6"  name="fashion_right" id="fashion_right" onDblClick="removeOptions(fashion_left, fashion_right);"></select>
                                <input type="hidden" name="fashion" id="fashion" value="" />
                            </div>
                        </div>
                        <div class="control-group line">
                            <div class="controls">
                                <label class='control-label' for='fashionOtherchk'>
                                    <input type='checkbox' name='fashionOtherchk' id='fashionOtherchk' onClick="enableOther('fashionOtherchk', 'fashionOther');" />Others</label>
                                <input type='text' name='fashionOther' id='fashionOther' disabled onBlur="checkOthers('fashionOther')" placeholder='others' value="" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">
                                <h4>Preferred Movies</h4>
                            </label>
                            <div class="controls">
                                <select id='movies_left' name='movies_left' multiple size="6" onDblClick="moveOptions(movies_left, movies_right);anyChk(movies_left, movies_right);">
                                    <option value='1' />Action / suspense</option>
                                    <option value='2' />Comedy</option>
                                    <option value='3' />Classics</option>
                                    <option value='4' />Drama</option>
                                    <option value='5' />Documentaries</option>
                                    <option value='6' />Epics</option>
                                    <option value='7' />Horror</option>
                                    <option value='8' />Romantic</option>
                                    <option value='9' />Short films</option>
                                    <option value='10' />Sci-Fi & fantasy</option>
                                    <option value='11' />Not into movies</option>
                                    <option value='12' />Non-commercial / art</option>
                                    <option value='13' />World cinema</option>
                                    <option value='14' />Movie fanatic</option>
                                </select>
                                <input type="button" class='btn' value="Add" onClick="moveOptions(movies_left, movies_right);anyChk(movies_left, movies_right);">
                                <input type="button" class='btn' value="Remove" onClick="removeOptions(movies_left, movies_right);">
                                <select multiple size="6"  name="movies_right" id="movies_right" onDblClick="removeOptions(movies_left, movies_right);"></select>
                                <input type="hidden" name="movies" id="movies" value="" />
                            </div>
                        </div>
                        <div class="control-group line">
                            <div class="controls">
                                <label class='control-label' for='moviesOtherchk'>
                                    <input type='checkbox' name='moviesOtherchk' id='moviesOtherchk' onClick="enableOther('moviesOtherchk', 'moviesOther');" />Others</label>
                                <input type='text' name='moviesOther' id='moviesOther' disabled onBlur="checkOthers('moviesOther')" placeholder='others' value="" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">
                                <h4>Spoken Languages</h4>
                            </label>
                            <div class="controls">
                                <select id='language_left' name='language_left' multiple size="6" onDblClick="moveOptions(language_left, language_right);anyChk(language_left, language_right);">
                                    <option value='1' />Assamese</option>
                                    <option value='2' />Bengali</option>
                                    <option value='3' />English</option>
                                    <option value='4' />Gujarati</option>
                                    <option value='5' />Hindi</option>
                                    <option value='6' />Kannada</option>
                                    <option value='7' />Kashmiri</option>
                                    <option value='8' />Konkani</option>
                                    <option value='9' />Kutchi</option>
                                    <option value='10' />Malayalam</option>
                                    <option value='11' />Marathi</option>
                                    <option value='12' />Marwadil</option>
                                    <option value='13' />Oriya</option>
                                    <option value='14' />Punjabi</option>
                                    <option value='15' />Sindhi</option>
                                    <option value='16' />Tamil</option>
                                    <option value='17' />Telugu</option>
                                    <option value='18' />Tulu</option>
                                    <option value='19' />Urdu</option>
                                </select>
                                <input type="button" class='btn' value="Add" onClick="moveOptions(language_left, language_right);anyChk(language_left, language_right);">
                                <input type="button" class='btn' value="Remove" onClick="removeOptions(language_left, language_right);">
                                <select multiple size="6"  name="language_right" id="language_right" onDblClick="removeOptions(language_left, language_right);"></select>
                                <input type="hidden" name="language" id="language" value="" />
                            </div>
                        </div>
                        <div class="control-group line">
                            <div class="controls">
                                <label class='control-label' for='languageOtherchk'>
                                    <input type='checkbox' name='languageOtherchk' id='languageOtherchk' onClick="enableOther('languageOtherchk', 'languageOther');" />Others</label>
                                <input type='text' name='languageOther' id='languageOther' disabled onBlur="checkOthers('languageOther')" placeholder='others' value="" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">
                                <h4>Sports/Fitness Activities</h4>
                            </label>
                            <div class="controls">
                                <select id='sports_left' name='sports_left' multiple size="6" onDblClick="moveOptions(sports_left, sports_right);anyChk(sports_left, sports_right);">
                                    <option value='1' />Adventure Sports</option>
                                    <option value='2' />Aerobics</option>
                                    <option value='3' />Basketball</option>
                                    <option value='4' />Badminton</option>
                                    <option value='5' />Bowling</option>
                                    <option value='6' />Billiards / snooker / pool</option>
                                    <option value='7' />Cricket</option>
                                    <option value='8' />Cycling</option>
                                    <option value='9' />Card games</option>
                                    <option value='10' />Carrom</option>
                                    <option value='11' />Chess</option>
                                    <option value='12' />Football</option>
                                    <option value='13' />Golf</option>
                                    <option value='14' />Hockey</option>
                                    <option value='15' />Jogging / walking</option>
                                    <option value='16' />Martial arts</option>
                                    <option value='17' />Scrabble</option>
                                    <option value='18' />Squash</option>
                                    <option value='19' />Swimming / water sports</option>
                                    <option value='20' />Table-tennis</option>
                                    <option value='21' />Tennis</option>
                                    <option value='22' />Volleyball</option>
                                    <option value='23' />Weight lifting</option>
                                    <option value='24' />Yoga / meditation</option>
                                </select>
                                <input type="button" class='btn' value="Add" onClick="moveOptions(sports_left, sports_right);anyChk(sports_left, sports_right);">
                                <input type="button" class='btn' value="Remove" onClick="removeOptions(sports_left, sports_right);">
                                <select multiple size="6"  name="sports_right" id="sports_right" onDblClick="removeOptions(sports_left, sports_right);"></select>
                                <input type="hidden" name="sports" id="sports" value="" />
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">
                                <label class='control-label' for='sportsOtherchk'>
                                    <input type='checkbox' name='sportsOtherchk' id='sportsOtherchk' onClick="enableOther('sportsOtherchk', 'sportsOther');" />Others</label>
                                <input type='text' name='sportsOther' id='sportsOther' disabled onBlur="checkOthers('sportsOther')" placeholder='others' value="" />
                            </div>
                        </div>
                        <center><input type="submit" name="submit" class="btn" value="submit" /></center>
                    </form>
                </div>
            </div>
            <p align="center">&copy; <?php echo date('Y');?> Reserved to christianmatrimony.com</p>
        </div>
        <!-- end of box -->
        <script src="js/jquery-2.0.3.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/custom.js"></script>
        <script src="js/register_val.js"></script>
        <script src="js/partner_val.js"></script>
        <script src="js/interests.js"></script>
</body>

</html>