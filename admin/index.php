<?php session_start();?>

<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width" />
    <title>Jamesmatrimony.com</title>
    <link rel="stylesheet" type="text/css" href="../view/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../view/css/bootstrap-responsive.css">
    <link rel="stylesheet" type="text/css" href="../view/css/style.css">
    <link rel="icon" href="../view/img/favicon.ico">
</head>

<body>
<header>
<div class="navbar">
              <div class="navbar-inner">
                  <a class="btn-navbar" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </a>
                  <div class="logo_bg">
                  <a class="brand logo" href="index.php"><img src="../view/img/logo.png" alt="JM_logo"></a>
                  </div>
                  <div class="nav-collapse collapse navbar-responsive-collapse">
                    <ul class="nav">
                     <li><a href="#" onClick="display('home');"><i class="icon-home"></i> Home</a>
                     </li>
                     <li class="dropdown"><a href="#"><i class="icon-star"></i> Heighlight</a>
                     </li>
                     <li class="dropdown"><a href="#"><i class="icon-star"></i> Verify Photo</a>
                     </li>
                            <li class="dropdown adminMenu">
                            	<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-cog"></i>Settings</a>
                            	<ul class="dropdown-menu">
                                    <li><a href="#"><i class="icon-plus"></i> Change password</a>
                                    </li>
                                    <li><a href="#"><i class="icon-list"></i> view user</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="../control/logout.php"><i class="icon-off"></i> Logout</a>
                            </li>
                        </ul>
                    <ul class="nav pull-right">
                      <li><form class="input-append navbar-search  pull-right">
                            <input placeholder="Search" id="search" type="text">
                            <button class="btn" type="submit" style="margin-top: -3px;"><i class="icon-search"></i></button>
                        </form></li>
                    </ul>
                  </div><!-- /.nav-collapse -->
              </div><!-- /navbar-inner -->
            </div>
</header>
<div class="container-fluid">
<section class="row-fluid">

</section>
</div>
    <div class="admin_footer">&copy; 2013 Reserved to Azul computer techonologies.LLP</div>
    <script src="../view/js/jquery-2.0.3.min.js"></script>
    <script src="../view/js/bootstrap.js"></script>
    <script src="../view/js/custom.js"></script>

</body>

</html>