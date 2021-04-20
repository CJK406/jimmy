<?php 
require('header.php');
?>
<link href="../assets/css/home.css?i=<?php echo rand(10,100);?>" rel="stylesheet" />
<title>Home</title>

<header class="masthead">
    <div class="container h-100">
        <div class="row h-100 align-items-center justify-content-center text-center">
            <div class="col-lg-10 align-self-end mt-5 mb-5">
                <p class="text-white" style="font-size:50px;">Welcome to the Jimmy Greaves Foundation</p>
                <div class="divider mb-4" style="margin:auto"></div>
            </div>
            <div class="col-lg-8 align-self-baseline mt-5 mb-5">
                <img src="../assets/img/home_arraow.png" />
            </div>
        </div>
    </div>
</header>

<div class="row" id="home_section_2_desktop">
    <div class="col-md-5">
        <img src="../assets/img/home11.jpg" />
    </div>
    <div class="col-md-6" style="text-align:left">
        <p id="text_header">Supporting lorem ipsum dolor sit amet</p>
        <div class="divider mb-4" ></div>
        <p id="text_body">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>
        <button >About</button>
    </div>
</div>

<div id="home_section_2_mobile">
        <p id="text_header" >Supporting lorem ipsum dolor sit amet</p>
        <div class="divider mb-4" ></div>

        <img src="../assets/img/home11.jpg" />
        <p id="text_body" style="font-weight:500; font-size:14px; line-height:22px">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>
        <button>About</button>
</div>

<div style="overflow-x:auto">
    <div id="home_section_3">
        <a href="<?php echo $site_url?>pages/auction.php" style="width: 33.333333%">
            <div class="three_hover_div" id="1">
                <p id="header">Auction</p>
                <div class="bottom_boder"></div>
                <p id="description">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </p>
                <div id="arraw">
                    <i class="fa fa-arrow-right" aria-hidden="true"></i>
                </div>
            </div>
        </a>
        <a href="<?php echo $site_url?>pages/raffle.php" style="width: 33.333333%">
            <div class=" three_hover_div" id="2">
                <p id="header">Raffle</p>
                <div class="bottom_boder"></div>
                <p id="description">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </p>
                <div id="arraw">
                    <i class="fa fa-arrow-right" aria-hidden="true"></i>
                </div>
            </div>
        </a>
        <a href="<?php echo $site_url?>pages/donate.php" target="_blank" style="width: 33.333333%">
            <div class=" three_hover_div" id="3">
                <p id="header">Donate</p>
                <div class="bottom_boder"></div>
                <p id="description">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </p>
                <div id="arraw">
                    <i class="fa fa-arrow-right" aria-hidden="true"></i>
                </div>
            </div>
        </a>
    </div>
<div>

<div class="row" id="home_section_4">
    <div class="col-md-6" id="first_div" >
        <p id="text_header">Supporting causes lorem ipsum dolor sit amet</p>
        <div class="divider mb-4" ></div>
        <p id="text_body">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>
        <button id="button_desktop">Causes we support</button>
    </div>
    <div class="col-md-6">
        <div class="row" style="padding:20px">
            <div class="col-md-4">
                <img src="../assets/img/home7.png" style="width:100%" />
            </div>
            <div class="col-md-4">
                <img src="../assets/img/home6.png" style="width: 100%" />
            </div>
        </div>
        <button id="button_mobile">Causes we support</button>

    </div>
</div>

<?php
require('footer.php');
?>
<script src="../assets/js/home.js?i=<?php echo rand(10,100);?>"></script>
<script src="../assets/js/three_hover.js"></script>

