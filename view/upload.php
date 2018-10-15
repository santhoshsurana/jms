<?php session_start(); include "../control/functions.php"; if(isset($_POST[ 'submit'])) { header( 'Location:index.php'); } ?>
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
                        <div class="bar" style="width: 80%;"></div>
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
                                <li class="span" style="width:19%">
                                    <a class="step"> <span class="number">4</span>
                                        <span class="desc"><i class="icon-ok"></i> Partner details</span> 
                                    </a>
                                </li>
                                <li class="span active" style="width:17%">
                                    <a class="step active"> <span class="number">5</span>
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
                <h4>Upload multiple photos to increase your response.</h4>
                <p>Adding photo makes your profile complete, authentic and delivers more response. Add as many photos as possible, with a maximum of 10 photos. It's best to have your photograph taken by a professional. The Photo must be in jpg / gif / png / bmp format and no larger than 10 MB.</p>
                <form action="../control/addphoto.php" method="post" id="image_upload" onSubmit="return profilePic();" enctype='multipart/form-data'>
                    <input type="file" name="profile_pic"  />
                    <input type="submit" name="upload" value="upload" class="btn" />
                </form>
            </div>
            <p align="center">&copy; <?php echo date('Y');?> Reserved to christianmatrimony.com</p>
        </div>
        <!-- end of box -->
        <script src="js/jquery-2.0.3.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/custom.js"></script>
        <script src="js/register_val.js"></script>
        <script src="js/partner_val.js"></script>
</body>

</html>