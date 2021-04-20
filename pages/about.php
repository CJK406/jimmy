<?php 
require('header.php');

?>
<link href="../assets/css/about.css?i=<?php echo rand(10,100);?>" rel="stylesheet" />
<link href="../assets/css/home.css?i=<?php echo rand(10,100);?>" rel="stylesheet" />
<title>About</title>

<div class="header">
	<div class="container">
		<p>About the Jimmy Greaves Foundation</p>
		<div class="divider mb-4"></div>
	</div>
</div>

<div class="container">
	<div class="row" id="about_section_2">
	    <div class="col-md-6">
	        <img src="../assets/img/about1.png" />
	    </div>
	    <div class="col-md-6" style="text-align:left">
	        <p id="text_header">The story behind the <br> Jimmy Greaves Foundation</p>
	        <div class="divider mb-4" ></div>
	        <p id="text_body">
	           Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
	        </p>
	    </div>
	</div>
</div>

<div class="container" id="about_section_3">
	<p id="text_header">Supporting causes lorem ipsum dolor sit amet</p>
	<div class="divider" style="margin-bottom:70px" ></div>
	
	<div class="row">
	    <div class="col-sm-6 order-sm-1" id="first_sub_div">
	    	<img src="../assets/img/home6.png" />
	    	<p id="text_sub_header">Alcoholics Anonymous</p>
	    	<p id="text_sub_desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

	    </div>
	    <div class="col-sm-6 order-sm-12" id="second_sub_div">
	    	<img src="../assets/img/about2.png">
	    </div>
    </div>

    <div class="row">
	    <div class="col-sm-6 order-sm-12" id="first_sub_div">
	    	<img src="../assets/img/home7.png" />
	    	<p id="text_sub_header">Jimmy Greaves Football Academy</p>
	    	<p id="text_sub_desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

	    </div>
	    <div class="col-sm-6 order-sm-11" id="second_sub_div">
	    	<img src="../assets/img/about2.png">
	    </div>
    </div>

    <div class="row">
	    <div class="col-sm-6 order-sm-1" id="first_sub_div">
	    	<img src="../assets/img/home6.png" />
	    	<p id="text_sub_header">Alcoholics Anonymous</p>
	    	<p id="text_sub_desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

	    </div>
	    <div class="col-sm-6 order-sm-12" id="second_sub_div">
	    	<img src="../assets/img/about2.png">
	    </div>
    </div>

    <div class="row">
	    <div class="col-sm-6 order-sm-12" id="first_sub_div">
	    	<img src="../assets/img/home7.png" />
	    	<p id="text_sub_header">Jimmy Greaves Football Academy</p>
	    	<p id="text_sub_desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

	    </div>
	    <div class="col-sm-6 order-sm-11" id="second_sub_div">
	    	<img src="../assets/img/about2.png">
	    </div>
    </div>
  </div>
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
</div>
<?php
require('footer.php');
?>
<script src="../assets/js/three_hover.js?i=<?php echo rand(10,100);?>"></script>


