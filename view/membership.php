<?php session_start();
if(isset($_SESSION['_JMUID'])){
$id=$_SESSION['_JMUID'];}?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css">
<link rel="stylesheet" type="text/css" href="css/price.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="icon" href="img/favicon.ico">
<title>Jamesmatrimony.com</title>
</head>

<body>
<div id="fb-root"></div>
<div class="yellow_bg"></div>
<div class="cm_logo"><img src="img/cm_logo.png"></div>
<div class="box">
<?php require_once('menu.php');?>
<div class="container-fluid">
<section class="row-fluid">
<h2 class="page-title text-center">Membership Packages</h2>
<br/><br/>
						<!-- Primary style -->
						<div class="pricing-table style-primary" data-appear-animation="fadeIn">
							<div style="width: 25%;" class="col features-list hide-on-phone">
								<div class="inside">
									<ul class="features-items-left">
										<li class="even">Package</li>
										<li class="odd">Price (monthly)</li>
										<li class="even">Profile's Access</li>
										<li class="odd">Profile Highlighter (days)</li>
										<li class="even">Photo upload limit</li>
										<li class="odd">Search Priority</li>
										<li class="even">Support</li>
									</ul>
								</div>
							</div>
							<div style="width: 25%;" class="col feature">
								<div class="inside">
									<ul class="features-items-right">
										<li class="even title">Basic</li>
										<li class="odd price">Rs 199/-</li>
										<li class="even">20</li>
										<li class="odd"> 1</li>
										<li class="even">5</li>
										<li class="odd">NO</li>
										<li class="even">YES</li>
									</ul>
									<div class="buy-button">
										<input type="button" class="btn"  value="BUY" onClick="" />
									</div>
								</div>
							</div>
							<div style="width: 25%;" class="col feature best-value">
								<div class="inside">
									<ul class="features-items-right">
										<li class="even title">Standard</li>
										<li class="odd price">Rs 249/-</li>
										<li class="even">30</li>
										<li class="odd">3</li>
										<li class="even">10</li>
										<li class="odd">YES</li>
										<li class="even">YES</li>
									</ul>
									<div class="buy-button">
										<input type="button" class="btn"  value="BUY" onClick="" />
									</div>
								</div>
							</div>
							<div style="width: 25%;" class="col feature">
								<div class="inside">
									<ul class="features-items-right">
										<li class="even title">Premium</li>
										<li class="odd price">Rs 399/-</li>
										<li class="even">50</li>
										<li class="odd">5</li>
										<li class="even">20</li>
										<li class="odd">YES</li>
										<li class="even">YES</li>
									</ul>
									<div class="buy-button">
										<input type="button" class="btn"  value="BUY" onClick="" />
									</div>
								</div>
							</div>
<?php require_once('footer.php');?>