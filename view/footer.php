</section>
</div>
<!-- end of container-fluid -->
<div class="footer2">
    <div class="row-fluid">
        <div class="span2">
            <h5>Know More</h5>
            <ul>
                <li><a href="about.php">About Us</a>
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
                <li><a href="about.php">About Us</a>
                </li>
                <li><a href="membership.php">Membership</a>
                </li>
                <li><a href="#">Help</a>
                </li>
                <li><a href="advertise.php">Advertise with us</a>
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
            <div class="span4">
            <img src="img/paypal.png" alt="" />
            </div>
            <div class="span4">
                    <img src="img/visa.png" alt="" />
                    </div>
            <div class="span4">
                    <img src="img/amex.png" alt="" />
                    </div>
                    </div>
           <div class="row-fluid">
            <div class="span4">
                    <img src="img/mastercard.png" alt="" />
                    </div>
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