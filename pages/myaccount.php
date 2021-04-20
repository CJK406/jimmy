<?php 
require('header.php');
?>
<link href="../assets/css/myaccount.css?i=<?php echo rand(10,100);?>" rel="stylesheet" />
<title>My Account</title>

<div class="header">
	<div class="container">
		<p>My Account</p>
		<div class="divider mb-4"></div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-3">
			<img src="../assets/img/header_user1.png" />
	        <span id="user_header_name"><?php echo $user_name?></span>
	        <p id="user_header_email"><?php echo $email?></p>
	        <div id="left_side_menu">
	        	<span>Bids</span>
	        	<ion-icon name="chevron-forward-outline"></ion-icon>
	        </div>
	        <div id="left_side_menu">
	        	<span>Orders</span>
	        	<ion-icon name="chevron-forward-outline"></ion-icon>
	        </div>
	        <div id="left_side_menu">
	        	<span>Account</span>
	        	<ion-icon name="chevron-forward-outline"></ion-icon>
	        </div>
	        <a style="font-size: 13px; float: right; margin-top:20px; margin-bottom: 20px">Sign out</a>
		</div>
		<div class="col-md-9" style="margin-bottom:30px">
			<p style="font-size: 28px; color: #343A42; font-weight: 500">Bids</p>
			<div id="bids_div" class="row">
				<img class="col-md-3" src="../assets/img/auction2.png" />
				<div class="col-md-9">
					<p>Auction memorabilia item name goes here</p>
					<p>£250.00</p>
					<div id="status">
						<span>3 bids</span>
	    				<span id="timer"> <ion-icon name="alarm-outline"></ion-icon> 1d 17h left (Tue, 15:31)</span>
					</div>
				</div>
			</div>

			<div id="bids_div" class="row">
				<img class="col-md-3" src="../assets/img/auction2.png" />
				<div class="col-md-9">
					<p>Auction memorabilia item name goes here</p>
					<p>£250.00</p>
					<div id="status">
						<span>3 bids</span>
	    				<span id="timer"> <ion-icon name="alarm-outline"></ion-icon> 1d 17h left (Tue, 15:31)</span>
					</div>
				</div>
			</div>

			<div id="bids_div" class="row">
				<img class="col-md-3" src="../assets/img/auction2.png" />
				<div class="col-md-9">
					<p>Auction memorabilia item name goes here</p>
					<p>£250.00</p>
					<div id="status">
						<span>3 bids</span>
	    				<span id="timer"> <ion-icon name="alarm-outline"></ion-icon> 1d 17h left (Tue, 15:31)</span>
					</div>
				</div>
			</div>
		
		</div>
	</div>
</div>

<?php
require('footer.php');
?>
<script src="../assets/js/three_hover.js"></script>


