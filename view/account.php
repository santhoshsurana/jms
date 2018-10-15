<?php require_once( 'header.php');?>
 <?php require_once( 'ads.php');?>
<div class="span10">

    <ul class="nav nav-tabs">
        <li class="active"><a href="#delete" data-toggle="tab">Delete account</a>
        </li>
        <li><a href="#account" data-toggle="tab">Privacy</a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="delete">
            <form name="deleteprof" id="deleteprof" method="GET" style="margin:0px;" enctype="multipart/form-data">
                <p>We hope you found your life partner and this is the reason you decided to delete your profile. Please note that profiles once deleted cannot be restored.</p>
                <button name="delete" id="delete" class="btn">Delete</button>
            </form>
        </div>
        <div class="tab-pane" id="account">
            <p>Comin Soon.....</p>
        </div>
    </div>
</div>
    <?php require_once( 'footer.php');?>