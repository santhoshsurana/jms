<?php session_start();
$id=$_SESSION['_JMUID'];
if(!isset($_SESSION['_JMEMAIL']))
	{
		header('Location:login.php');
		}
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
<link rel="stylesheet" href="css/style.default.css" type="text/css" />
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
<div class="messagemenu">
    <ul>
        <li class="back"><a><span class="iconfa-chevron-left"></span> Back</a>
        </li>
        <li class="active"><a href=""><span class="iconfa-inbox"></span> Inbox</a>
        </li>
        <li><a href=""><span class="iconfa-plane"></span> Sent</a>
        </li>
        <li><a href=""><span class="iconfa-edit"></span> Draft</a>
        </li>
        <li><a href=""><span class="iconfa-trash"></span> Trash</a>
        </li>
    </ul>
</div>
<div class="messagecontent">
    <div class="messageleft">
        <form class="messagesearch" />
        <input type="text" class="input-block-level" placeholder="Search message and hit enter..." />
        </form>
        <ul class="msglist">
            <li class="selected">
                <div class="thumb">
                    <img src="images/photos/thumb1.png" alt="" />
                </div>
                <div class="summary"> <span class="date pull-right"><small>April 03, 2013</small></span>
                    <h4>Leevanjo Sarce</h4>
                    <p><strong>Lorem ipsum dol..</strong> - Hey, leevanjo doloe..</p>
                </div>
            </li>
            <li class="unread">
                <div class="thumb">
                    <img src="images/photos/thumb2.png" alt="" />
                </div>
                <div class="summary"> <span class="date pull-right"><small>April 03, 2013</small></span>
                    <h4>Yanmar Iobi</h4>
                    <p><strong>Lorem ipsum dol..</strong> - Hey, leevanjo doloe..</p>
                </div>
            </li>
            <li>
                <div class="thumb">
                    <img src="images/photos/thumb3.png" alt="" />
                </div>
                <div class="summary"> <span class="date pull-right"><small>April 03, 2013</small></span>
                    <h4>Nusjan Wanlacal</h4>
                    <p><strong>Lorem ipsum dol..</strong> - Hey, leevanjo doloe..</p>
                </div>
            </li>
            <li>
                <div class="thumb">
                    <img src="images/photos/thumb4.png" alt="" />
                </div>
                <div class="summary"> <span class="date pull-right"><small>April 03, 2013</small></span>
                    <h4>Zaham Sindilmaca</h4>
                    <p><strong>Lorem ipsum dol..</strong> - Hey, leevanjo doloe..</p>
                </div>
            </li>
            <li class="unread">
                <div class="thumb">
                    <img src="images/photos/thumb5.png" alt="" />
                </div>
                <div class="summary"> <span class="date pull-right"><small>April 03, 2013</small></span>
                    <h4>Weno Carasbong</h4>
                    <p><strong>Lorem ipsum dol..</strong> - Hey, leevanjo doloe..</p>
                </div>
            </li>
            <li>
                <div class="thumb">
                    <img src="images/photos/thumb6.png" alt="" />
                </div>
                <div class="summary"> <span class="date pull-right"><small>April 03, 2013</small></span>
                    <h4>Ratesoc Maitum</h4>
                    <p><strong>Lorem ipsum dol..</strong> - Hey, leevanjo doloe..</p>
                </div>
            </li>
            <li>
                <div class="thumb">
                    <img src="images/photos/thumb7.png" alt="" />
                </div>
                <div class="summary"> <span class="date pull-right"><small>April 03, 2013</small></span>
                    <h4>Venro Leongal</h4>
                    <p><strong>Lorem ipsum dol..</strong> - Hey, leevanjo doloe..</p>
                </div>
            </li>
        </ul>
    </div>
    <!--messageleft-->
    <div class="messageright">
        <div class="messageview">
            <div class="btn-group pull-right">
                <button data-toggle="dropdown" class="btn dropdown-toggle">Actions <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="#">Forward</a>
                    </li>
                    <li><a href="#">Report as Spam</a>
                    </li>
                    <li><a href="#">Delete Message</a>
                    </li>
                    <li><a href="#">Print Message</a>
                    </li>
                    <li><a href="#">Mark as Unread</a>
                    </li>
                </ul>
            </div>
            <h1 class="subject">Lorem ipsum dolor sit amet, consectetur adipisicing elit</h1>
            <div class="msgauthor">
                <div class="thumb">
                    <img src="images/photos/thumb1.png" alt="" />
                </div>
                <div class="authorinfo"> <span class="date pull-right">April 03, 2012</span>
                    <h5><strong>Leevanjo Sarce</strong> <span>hisemail@hisdomain.com</span></h5>
                    <span class="to">to me@mydomain.com</span>
                </div>
                <!--authorinfo-->

            </div>
            <!--msgauthor-->
            <div class="msgbody">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis
                    aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem
                    quia voluptas</p>
                <p>It aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
                <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum
                    exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo
                    voluptas nulla pariatur?</p>
                <p>Regards,
                    <br />Leevanjo</p>
            </div>
            <!--msgbody-->
            <div class="msgauthor">
                <div class="thumb">
                    <img src="images/photos/thumb10.png" alt="" />
                </div>
                <div class="authorinfo"> <span class="date pull-right">April 03, 2012</span>
                    <h5><strong>Draneim Daamul</strong> <span>myemail@mydomain.com</span></h5>
                    <span class="to">to his@hisdomain.com</span>
                </div>
                <!--authorinfo-->
            </div>
            <!--msgauthor-->
            <div class="msgbody">
                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem
                    quia voluptas</p>
                <p>It aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
                <p>- Draneim</p>
            </div>
            <!--msgbody-->
            <div class="msgauthor">
                <div class="thumb">
                    <img src="images/photos/thumb1.png" alt="" />
                </div>
                <div class="authorinfo"> <span class="date pull-right">April 03, 2012</span>
                    <h5><strong>Leevanjo Sarce</strong> <span>hisemail@hisdomain.com</span></h5>
                    <span class="to">to me@mydomain.com</span>
                </div>
                <!--authorinfo-->
            </div>
            <!--msgauthor-->
            <div class="msgbody">
                <p>It aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
            </div>
            <!--msgbody-->
            <div class="msgauthor">
                <div class="thumb">
                    <img src="images/photos/thumb10.png" alt="" />
                </div>
                <div class="authorinfo"> <span class="date pull-right">April 03, 2012</span>
                    <h5><strong>Draneim Daamul</strong> <span>myemail@mydomain.com</span></h5>
                    <span class="to">to his@hisdomain.com</span>
                </div>
                <!--authorinfo-->
            </div>
            <!--msgauthor-->
            <div class="msgbody">
                <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum
                    exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur?</p>
            </div>
            <!--msgbody-->
        </div>
        <!--messageview-->
        <div class="msgreply">
            <div class="thumb">
                <img src="images/photos/thumb1.png" alt="" />
            </div>
            <div class="reply">
                <textarea placeholder="Type something here to reply"></textarea>
            </div>
            <!--reply-->
        </div>
        <!--messagereply-->
    </div>
    <!--messageright-->
</div>
<!--messagecontent-->
</section>
</div>
<!-- end of container-fluid -->
<div class="footer2">
    <div class="row-fluid">
        <div class="span2">
            <h5>Know More</h5>
            <ul>
                <li><a href="#">About Us</a>
                </li>
                <li><a href="#">Success stories</a>
                </li>
                <li><a href="#">FAQs</a>
                </li>
                <li><a href="#">Report Abuse</a>
                </li>
                <li><a href="#">Contact us</a>
                </li>
            </ul>
        </div>
        <div class="span2">
            <h5>Links</h5>
            <ul>
                <li><a href="#">About Us</a>
                </li>
                <li><a href="#">Success stories</a>
                </li>
                <li><a href="#">Help</a>
                </li>
                <li><a href="#">Advertise with us</a>
                </li>
                <li><a href="#">Feedback</a>
                </li>
            </ul>
        </div>
        <div class="span4">
            <h5>Reach Us</h5>
            <p id="subscribe_txt">Subscribe to get bride/grooms profile updates, matchs, notifications and more.</p>
            <input type="text" name="subscribe" id="subscribe" onBlur="emailAvail()" onKeyPress="charChk(event,'email');" /><input type="button" class="btn" style="margin:-10px 0 0 4px" value="subscribe" onClick="subscribe()" />
        </div>
        
        <div class="span2">
            <h5>Follow us</h5>
            <ul>
                <li>
                    <div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-colorscheme="light" data-layout="button_count" data-action="like" data-show-faces="true" data-send="false"></div>
                </li>
                <li><a href="https://twitter.com/share" class="twitter-share-button" data-url="http://localhost/mat/view/home.php" data-via="cmatrimony" data-related="christianmatrimony" data-hashtags="matrimony">Tweet</a>
                </li>
                <li>
                    <div class="g-plusone" data-size="medium"></div>
                </li>
                <li><a data-pin-do="buttonFollow" href="http://www.pinterest.com/pinterest/">Jamesmatrimony</a>
                </li>
            </ul>
        </div>
        <div class="span2">
            <h5>Why us</h5>
            <div class="row-fluid">
                    <img src="img/paypal.png" alt="" />
                    <img src="img/visa.png" alt="" />
                    <img src="img/amex.png" alt="" />
             </div>
             <div class="row-fluid">
                    <img src="img/mastercard.png" alt="" />
             </div>
        </div>
    </div>
</div>
<footer>
    <div class="row-fluid">
        <p class="fleft">© <?php echo date('Y');?> Reserved to Jamesmatrimony.com. Developed By <a href="http://azul.in">AzulTech</a>
            &nbsp;
            <a href="#" onClick="model('term');">Terms</a> &amp; <a href="#" onClick="model('policy');">Policies</a>
        </p>
        <?php require_once('terms.php');?>

        <div class="fright">
            <ul class="social-links">
                <li>
                    <a href="#" class="dribbble"></a>
                </li>
                <li>
                    <a href="#" class="facebook"></a>
                </li>
                <li>
                    <a href="#" class="twitter"></a>
                </li>
                <li>
                    <a href="#" class="rss"></a>
                </li>
                <li>
                    <a href="#" class="pinterest"></a>
                </li>
            </ul>
        </div>
    </div>
</footer>
</div>
<!-- end of box -->
</body>
<script src="js/jquery-2.0.3.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/custom.js"></script>
<script src="js/register_val.js"></script>
<script src="js/partner_val.js"></script>
<script src="js/jquery.Jcrop.min.js"></script>
<script type="text/javascript">
    jQuery(function ($) {

        // Create variables (in this scope) to hold the API and image size
        var jcrop_api, boundx, boundy;

        $('#cropbox').Jcrop({
            onChange: updatePreview,
            onSelect: updatePreview,
            onSelect: updateCoords,
            aspectRatio: 1
        }, function () {
            // Use the API to get the real image size
            var bounds = this.getBounds();
            boundx = bounds[0];
            boundy = bounds[1];
            // Store the API in the jcrop_api variable
            jcrop_api = this;
            jcrop_api.animateTo([100, 100, 300, 300]);
        });

        function updateCoords(c) {
            $('#x').val(c.x);
            $('#y').val(c.y);
            $('#w').val(c.w);
            $('#h').val(c.h);
        };

        function checkCoords() {
            if (parseInt($('#w').val())) return true;
            alert('Please select a crop region then press submit.');
            return false;
        };

        function updatePreview(c) {
            if (parseInt(c.w) > 0) {
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
	
<?php /*?><!-- facebook like button-->

    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

<!-- tweet button-->
    ! function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0],
            p = /^http:/.test(d.location) ? 'http' : 'https';
        if (!d.getElementById(id)) {
            js = d.createElement(s);
            js.id = id;
            js.src = p + '://platform.twitter.com/widgets.js';
            fjs.parentNode.insertBefore(js, fjs);
        }
    }(document, 'script', 'twitter-wjs');

<!-- G+ button  -->
    (function () {
        var po = document.createElement('script');
        po.type = 'text/javascript';
        po.async = true;
        po.src = 'https://apis.google.com/js/plusone.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(po, s);
    })();<?php */?>
</script>

<!-- pinterest button  -->
<!--<script type="text/javascript" src="//assets.pinterest.com/js/pinit.js"></script>-->

</html>