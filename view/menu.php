<header>
<div class="navbar">
 <div class="navbar-inner">
   <a class="btn-navbar" data-toggle="collapse" data-target=".navbar-responsive-collapse">
     <span class="icon-bar"></span>
     <span class="icon-bar"></span>
     <span class="icon-bar"></span>
   </a>
   <div class="logo_bg">
    <a class="brand logo" href="index.php"><img src="img/logo.png"  alt=""/></a>
   </div>
 <div class="nav-collapse collapse navbar-responsive-collapse">
 	<ul class="nav">
     <?php require_once( '../control/functions.php');
	  if(!isset($_SESSION['_JMEMAIL'])){?>
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About us</a></li>
            <li><a href="#">Success stories</a></li>
        <?php }else{ ?>
            <li><a href="home.php"><i class="icon-home"></i> My Home</a></li>
            <li><a href="search.php"><i class="icon-search"></i> Search</a></li>
            <li><a href="matches.php"><i class="icon-random"></i> Matches</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user"></i> My Profile <b class="caret"></b></a>
                <ul class="dropdown-menu">
                <li><a href="profile.php">View Profile</a></li>
                <li><a href="editprofile.php">Edit Profile</a></li>
                <li><a href="editpartner.php">partner preferences</a></li>
                <li><a href="editinterests.php">Hobbies &amp; Interests</a></li>
                <li><a href="upload.php">Upload Photos</a></li>
           		<li><a href="account.php">Delete Profile</a></li>
                </ul>
            </li>
            <!-- <li><a href="upgrade.php"><i class="icon-arrow-up"></i> Upgrade</a></li>-->
        <?php } ?>
	</ul>
	<ul class="nav pull-right">
		<?php if(!isset($_SESSION['_JMEMAIL'])){?>
            <li><a href="login.php">Login</a></li>
        <?php }else{ ?>
            <li class="dropdown">
                              <li class="divider-vertical"></li>
                              <li class="dropdown" style="padding: 5px 0px;">
                                <span class="dropdown-toggle" data-toggle="dropdown"><img src="
								<?php 
								$sql="SELECT `gender` FROM `personal` WHERE `user_id`=".$id; 
								$result=_db($sql); 
								$gender=mysqli_fetch_row($result); 
								$sql = "SELECT photo_name FROM `photos` WHERE `user_id`='".$id."' AND `dp_flag`='1'";
								$result=_db($sql);
								$count   = mysqli_num_rows($result); 
								$data=mysqli_fetch_row($result); 
								if($count>0){
									echo "../uploads/".$data[0]."_75.jpg";
									}
								else{
									if($gender[0]==1){
									echo "../uploads/m_default_75.jpg";
									}else{
										echo "../uploads/f_default_75.jpg";
									}
									}?>" width="40px" height="40px" class="img-circle" /></span>
                                <ul class="dropdown-menu">
                                 <li><a href="account.php">Account</a></li>
                                 <li><a href="profile.php">Profile</a></li>
                                 <li><a href="account.php">Privacy</a></li>
                                  <li class="divider"></li>
                                  <li><a href="../control/logout.php">Logout</a></li>
                                </ul>
                              </li>
        <?php } ?>
						
                      
   </ul>
  </div><!-- /.nav-collapse -->
 </div><!-- /navbar-inner -->
</div>
</header>