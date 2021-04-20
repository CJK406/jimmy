<?php 
require('header.php');
?>
<link href="../assets/css/auction.css?i=<?php echo rand(10,100);?>" rel="stylesheet" />
<title>Auction</title>
<style type="text/css">
	.tooltip-custom {
	    .tooltip-inner {
	        background-color: red !important;    
	    }
	}
</style>
<div class="header" style="background-position: center">
	<div class="container">
		<p id="text_header">Auction memorabilia</p>
		<div class="divider mb-4"></div>
		<p id="text_desc">All proceeds go to the Jimmy Greaves Foundation, which lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
	</div>
</div>

<div class="container">
	<div class="row" id="auction_section_2">
	   
	</div>
	
</div>
<?php
require('footer.php');
?>

<script type="text/javascript">
	show();
	var auctions = [];
	function show(){
		$.ajax({
	      url:"<?php echo $site_url?>api/ajax.php",
	      data: { 
	      		request:'get_auctions',
	         },
	      type: 'post',
	      success: function(re) 
	      {
	        var result = JSON.parse(re);
	        console.log(result)
	        if(result['status']=="200"){
				var data = result['data'];
				auctions = data;
				var string = "";
				for(var i=0; i<data.length; i++){
					var images = JSON.parse(data[i]['image']);
					var first_image = images.length==0 ? "" : "<?php echo $site_url?>api/upload/auction/"+data[i]['id']+"/"+images[0]+"";	

					var end_date = new Date(data[i]['end_time']);
		            var now   = new Date();
		            var diff  = new Date(end_date - now);
		            var days  = parseInt(diff/1000/60/60/24);
		            var hours  = parseInt(diff/1000/60/60 - (days*24));
		            var weeks = ["Sun","Mon","Tues","Wed","Thu","Fri","Satur"];
		            var week = weeks[end_date.getDay()];
		            var end_hour = end_date.getHours();
		            var end_min  = end_date.getMinutes();
		            var pm_am = end_hour>=12 ? 'PM' : 'AM';
		            var expir_date = days>0 ? days+"d"+" "+hours+"h left ( "+week+" "+end_hour+":"+end_min+" "+pm_am : "Expired";

					 string+=`<div class="col-md-6" style="margin-top:30px;">
				    	<a href="auction_detail.php?id=`+data[i]['id']+`&n=`+data[i]['auction_name']+`"><img style="width:100%; max-height:450px; min-height:400px;" src="`+first_image+`" /></a>
				    	<a href="auction_detail.php?id=`+data[i]['id']+`&n=`+data[i]['auction_name']+`"><p id="header">`+data[i]['auction_name']+`</p></a>
				    	<p id="price">£`+data[i]['init_price']+`</p>
				    	<p id="desc">`+data[i]['description']+`</p>
				    	<div id="status" style="display:flex">
				    		<span>`+data[i]['bid_count']+` bids</span>
				    		<span id="timer"><ion-icon name="alarm-outline"></ion-icon>`+expir_date +" ( "+week+" "+end_hour+":"+end_min+" "+pm_am+")"+`</span>
				    	</div> 
				    </div>`;
				}
				$("#auction_section_2").html(string);
	        }
	        else{
	        }
	      }
	    }); 
	}
</script>
