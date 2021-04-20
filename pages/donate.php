<?php 
require('header.php');
?>
<link href="../assets/css/donate.css" rel="stylesheet" />
<title>Donate</title>

<div class="header">
	<div class="container">
		<p id="text_header">Make a donation</p>
		<div class="divider mb-4"></div>
		<p id="text_desc">All proceeds go to the Jimmy Greaves Foundation, which lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>

		<div class="select_method_div">
			<button class="select_method_button selected" id="one_off">One off</button>
			<button class="select_method_button" id="monthly" style="margin-left:30px">Monthly</button>
		</div>
		<div class="select_amount_div row">
			<div class="col-md-6">
				<p id="donate_method_text">Make a one off donation of:</p>	
				<div style="display: flex">
					<button class="amount_select_btn" id="10">£10.00</button>	
					<button class="amount_select_btn" id="25">£25.00</button>	
					<button class="amount_select_btn selected" id="50">£50.00</button>	
					<button class="amount_select_btn" id="100">£100.00</button>	
				</div>
			</div>
			<div class="col-md-6">
				<p>Or enter amount</p>
				<div style="display: flex">
					<input id="input_donation_amount" value="50" type="number" />
					<div id="paypal-button" style="width: 200px; margin-left: 20px;align-items: center; align-self: center; justify-content: center"></div>
				</div>		
			</div>

			<div class="col-md-6" style="margin-top:20px">
				<div style="display: flex" >
					<!-- <input type="checkbox" id="checkbox_input" checked /> -->
					<input id="checkbox_input" type="checkbox"><label id="checkbox_input_label" for="checkbox_input"></label>
					<p style="margin-left: 10px">Add Gift Aid to my donation</p>
				</div>		
			</div>
		</div>

	</div>
</div>

<div class="row container" id="donate_section_2">
    <div class="col-md-6" id="first_div" >
        <p id="text_header">Where will my money go?</p>
        <div class="divider mb-4" ></div>
        <p id="text_body">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>
        <button id="button_desktop">Causes we support</button>
    </div>
    <div class="col-md-6">
        <div class="row" style="padding:20px">
            <div class="col-md-4">
                <img src="../assets/img/home7.png" style="width: 100%" />
            </div>
            <div class="col-md-4">
                <img src="../assets/img/home6.png" style="width:100%" />
            </div>
        </div>
        <button id="button_mobile">Causes we support</button>

    </div>
</div>


<?php
require('footer.php');
?>
<script type="text/javascript">
	var donate_value = 50;
</script>
<script src="https://www.paypalobjects.com/api/checkout.js"></script>

<script src="../assets/js/donate.js"></script>


