<?php session_start(); include "../control/functions.php"; if(isset($_POST[ 'submit'])) { header( 'Location:index.php'); }
echo getcwd();
$name=$_GET['photo'];
$sql = "SELECT url FROM `photos` WHERE `photo_name`='$name'";
$result=mysqli_query($CON, $sql);
$data=mysqli_fetch_row($result);
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
<form action="../control/managephoto.php?photo=<?php echo $name;?>" method="post" onsubmit="return checkCoords();">
<div class="span8">
        <img src="<?php echo $data[0];?>" id="cropbox"/>
		<!-- This is the form that our event handler fills -->
			<input type="hidden" id="x" name="x" />
			<input type="hidden" id="y" name="y" />
			<input type="hidden" id="w" name="w" />
			<input type="hidden" id="h" name="h" />
</div>
<div class="span4">
        <div style="width:75px;height:75px;overflow:hidden; ">
            <img src="<?php echo $data[0];?>" id="preview" alt="Preview" class="jcrop-preview" />
          </div>

        <div style="width:150px;height:150px;overflow:hidden;">
            <img src="<?php echo $data[0];?>" id="preview2" alt="Preview" class="jcrop-preview" />
          </div>
          			<input type="submit" name="crop" value="crop" class="btn" />
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
		<script src="js/jquery.Jcrop.min.js"></script>
		<script language="Javascript">
		
		jQuery(function($){

      // Create variables (in this scope) to hold the API and image size
      var jcrop_api, boundx, boundy;
      
      $('#cropbox').Jcrop({
        onChange: updatePreview,
        onSelect: updatePreview,
		onSelect: updateCoords,
        aspectRatio: 1
      },function(){
        // Use the API to get the real image size
        var bounds = this.getBounds();
        boundx = bounds[0];
        boundy = bounds[1];
        // Store the API in the jcrop_api variable
        jcrop_api = this;
		jcrop_api.animateTo([100,100,300,300]);
      });

	function updateCoords(c)
			{
				$('#x').val(c.x);
				$('#y').val(c.y);
				$('#w').val(c.w);
				$('#h').val(c.h);
			};

			function checkCoords()
			{
				if (parseInt($('#w').val())) return true;
				alert('Please select a crop region then press submit.');
				return false;
			};
		
      function updatePreview(c)
      {
        if (parseInt(c.w) > 0)
        {
          var rx = 75 / c.w;
          var ry = 75 / c.h;

          $('#preview').css({
            width: Math.round(rx * boundx) + 'px',
            height: Math.round(ry * boundy) + 'px',
            marginLeft: '-' + Math.round(rx * c.x) + 'px',
            marginTop: '-' + Math.round(ry * c.y) + 'px'
          });
		  var rx = 150 / c.w;
          var ry = 150 / c.h;
		  $('#preview2').css({
            width: Math.round(rx * boundx) + 'px',
            height: Math.round(ry * boundy) + 'px',
            marginLeft: '-' + Math.round(rx * c.x) + 'px',
            marginTop: '-' + Math.round(ry * c.y) + 'px'
          });
        }
      };

    });


		</script>
</body>

</html>