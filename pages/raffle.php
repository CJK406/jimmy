<?php 
require('header.php');
?>
<link href="../assets/css/auction.css" rel="stylesheet" />
<title>Raffle</title>

<div class="header" style="background-image: linear-gradient(to bottom, rgb(10 27 80 / 30%) 0%, rgb(52 58 66 / 60%) 100%), url(../assets/img/home9.jpg)">
	<div class="container">
		<p id="text_header">Raffle memorabilia</p>
		<div class="divider mb-4"></div>
		<p id="text_desc">All proceeds go to the Jimmy Greaves Foundation, which lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
	</div>
</div>

<div class="container">
	<div class="row" id="auction_section_2">
	   
	   
	   
	</div>
</div>

<div class="container">
	<div class="row" id="auction_section_3">
		<div class="col-md-2">
			<img src="../assets/img/home6.png" />
		</div>
		<div class="col-md-2">
			<img src="../assets/img/home7.png" />
		</div>
		<div class="col-md-2">
		</div>
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
	      		request:'get_raffles',
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
					var first_image = images.length==0 ? "" : "<?php echo $site_url?>api/upload/raffle/"+data[i]['id']+"/"+images[0]+"";	

					var end_date = new Date(data[i]['end_time']);
		            var now   = new Date();
		            var diff  = new Date(end_date - now);
		            var days  = parseInt(diff/1000/60/60/24);
		            var hours  = parseInt(diff/1000/60/60 - (days*24));
		            var weeks = ["Sun","Mon","Tues","Wednes","Thu","Fri","Satur"];
		            var week = weeks[end_date.getDay()];
		            var end_hour = end_date.getHours();
		            var end_min  = end_date.getMinutes();
		            var pm_am = end_hour>=12 ? 'PM' : 'AM';
		            var expir_date = days>0 ? days+"d"+" "+hours+"h left ( "+week+" "+end_hour+":"+end_min+" "+pm_am : "Expired";

					 string+=`<div class="col-md-6" style="margin-top:30px;">
				    	<a href="raffle_detail.php?id=`+data[i]['id']+`&n=`+data[i]['raffle_name']+`"><img style="width:100%; max-height:450px; min-height:400px;" src="`+first_image+`" /></a>
				    	<a href="raffle_detail.php?id=`+data[i]['id']+`&n=`+data[i]['raffle_name']+`"><p id="header">`+data[i]['raffle_name']+`</p></a>
				    	<p id="price">£`+data[i]['price']+`</p>
				    	<p id="desc">`+data[i]['description']+`</p>
				    	<div id="status" style="display:flex">
				    		<span>`+data[i]['buyer_count']+` bids</span>
				    		<span id="timer"><ion-icon name="alarm-outline"></ion-icon>`+expir_date+" ( "+week+" "+end_hour+":"+end_min+" "+pm_am+")"+`</span>
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
