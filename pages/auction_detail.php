<?php 
require('header.php');
$id= $_GET['id'];
$name= $_GET['n'];

?>
<link href="../assets/css/auction_detail.css?i=<?php echo rand(10,100);?>" rel="stylesheet" />
<link rel="stylesheet"  href="../assets/css/lightslider.css"/>

<title>Auction</title>

<div class="header container">
	<ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);">Auction</a></li>
        <li class="breadcrumb-item active"><?php echo $name?></li>
    </ol>
</div>

<div class="container" style="margin-bottom:50px">
	<div class="row">
		<div class="col-md-5">
			<div class="demo">
		        <div class="item">            
		            <div class="clearfix" style="max-width:474px;">
		                <ul id="image-gallery" class="gallery list-unstyled cS-hidden">

		                </ul>
		            </div>
		        </div>
		       

		    </div>	
		</div>
		<div class="col-md-7">
			<p id="title"><?php echo $name?></p>
			<div id="status" style="display:flex">
	    		<span class="bid_count" style="align-items: center;display: flex;">2 bids</span>
	    		<span id="timer"><ion-icon name="alarm-outline"></ion-icon> <span id="left_time"></span></span>
	    	</div> 

	    	<div id="bid_div" class="row">
	    		<div class="col-md-4">
	    			<p style="font-size:16px">Current bid:</p>
	    			<p style="font-size:26px;font-weight: 800;" id="max_current_bid_amount"></p>
	    			<span class="bid_count" id="bid_status"></span>
	    		</div>
	    		<div class="col-md-4">
	    			<span id="bid_amount_desc">Enter £251.00 or more</span>
	    			<input id="input_bid_amount" type="number" placeholder="£251.00" />
	    		</div>
	    		<div class="col-md-4">
	    			<button class="bid_button">Place bid</button>
	    			
	    		</div>
	    	</div>
	    	<div id="description_div" style="margin-top:30px">
				<p>DESCRIPTION</p>
				<p id="desc_text"></p>
			</div>
			<div id="eiscription_div">
				<p>DELIVERY</p>
				<p id="delivery_text"></p>
			</div>
			<div id="description_div">
				<p>TERMS</p>
				<p id="terms_text"></p>
			</div>
		</div>
	</div>
</div>

<div class="modal" id="bid_status_modal" tabindex="-1" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title bid_count" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="current_bids_div">
	         
      </div>
    </div>
  </div>
</div>



<?php
require('footer.php');
?>
<script type="text/javascript">
	var id = '<?php echo $id?>';
</script>

<script src="../assets/js/lightslider.js?i=<?php echo rand(10,100);?>"></script> 
<script src="../assets/js/auction_detail.js?i=<?php echo rand(10,100);?>"></script> 

