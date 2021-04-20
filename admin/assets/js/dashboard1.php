<?php
session_start();
	if(isset($_POST['password']))
	{
		$password = $_POST['password'];
		$username = $_POST['username'];
		$_SESSION['username'] = $username;
		$_SESSION['password'] = $password;

	}
	if(!isset($_SESSION['password'])){
		header("Location: index.php");
	}

	

	$rand = rand();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Dashboard</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	  
	<link rel="stylesheet" type="text/css" href="assets/css/util.css?ra=<?php echo $rand?>">
	<link rel="stylesheet" type="text/css" href="assets/css/dashboard.css?ra=<?php echo $rand?>">
	 <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">  -->
	 <link rel="stylesheet" href="assets/css/bootstrap3.css?ra=<?php echo $rand?>">
	<script src="https://code.highcharts.com/highcharts.js?ra=<?php echo $rand?>"></script>
	<script src="https://code.highcharts.com/modules/exporting.js?ra=<?php echo $rand?>"></script>
	<script src="https://code.highcharts.com/modules/export-data.js?ra=<?php echo $rand?>"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js?ra=<?php echo $rand?>"></script>
	<link rel='stylesheet' href='https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css?ra=<?php echo $rand?>'>
	<!-- <link rel="stylesheet" href="assets/css/main1.css?ra=<?php echo $rand?>" /> -->
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css?ra=<?php echo $rand?>">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js?ra=<?php echo $rand?>"></script>
	<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js?ra=<?php echo $rand?>"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js?ra=<?php echo $rand?>"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.4/jquery.fancybox.pack.js?ra=<?php echo $rand?>"></script>
	<link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.4/jquery.fancybox.css?ra=<?php echo $rand?>">
	<script src="https://cdn.jsdelivr.net/npm/jquery.redirect@1.1.4/jquery.redirect.min.js"></script>
	<style>
		.svg-item svg{
			height: 240px !important;
        }
        .modal-dialog {
            width:70% !important;
        }
	</style>


</head>

<body style="overflow-x: hidden;">
	<div class="loading-gif"></div>	
		<?php 
			include('menu_dashboard.php'); 
		?>
			<div class="log-out">
				<button style="margin-top:20px; float: right; margin-right: 10%;" id="log_out"><i class="fa fa-sign-out" aria-hidden="true"></i> log out</button>
			</div>
		<div style="width: 85%;margin-left: 14%;">
		<div class="limiter row" style="width: 100%; margin: 0;">
			
				

				<div class="overview_section" style="display: flex; margin: 0 auto;height: 300px">
						<!-- <div class="title" style="padding-bottom: 4%">
						<h4 style="color: rgb(13,38,62)">CONSUMER UNITS OVERVIEW</h4>
						</div> -->
						<div class="svg-item Restricted_list" item='Restricted_list'>
							<svg width="100%" height="100%" viewBox="0 0 40 40" class="donut">
								<circle class="donut-hole" cx="20" cy="20" r="15.91549430918954" fill="#fff"></circle>
								<circle class="donut-ring" cx="20" cy="20" r="15.91549430918954" fill="transparent" stroke-width="3.5"></circle>
								<circle class="donut-segment donut-segment-2" cx="20" cy="20" r="15.91549430918954" fill="transparent" stroke-width="3.5" stroke-dasharray="<?php echo $_SESSION['Restricted']?> <?php echo 100-$_SESSION['Restricted'] ?>" stroke-dashoffset="25"></circle>
								<g class="donut-text donut-text-1">

								<text y="50%" transform="translate(0, 2)">
									<tspan x="50%" text-anchor="middle" class="donut-percent donut-percent_restricted"><?php echo $_SESSION['Restricted']?>%</tspan>   
								</text>
								<text y="100%" transform="translate(0, 2)">
									<tspan x="50%" text-anchor="middle" class="donut-data1">Not Accessible</tspan>   
								</text>
								</g>
							</svg>
						</div>
						<div class="svg-item Offline_list" item='Offline_list'>
							<svg width="100%" height="100%" viewBox="0 0 40 40" class="donut">
								<circle class="donut-hole" cx="20" cy="20" r="15.91549430918954" fill="#fff"></circle>
								<circle class="donut-ring" cx="20" cy="20" r="15.91549430918954" fill="transparent" stroke-width="3.5"></circle>
								<circle class="donut-segment donut-segment-3" cx="20" cy="20" r="15.91549430918954" fill="transparent" stroke-width="3.5" stroke-dasharray="<?php echo $_SESSION['Offline']?> <?php echo 100-$_SESSION['Offline'] ?>" stroke-dashoffset="25"></circle>
								<g class="donut-text donut-text-2">

								<text y="50%" transform="translate(0, 2)">
									<tspan x="50%" text-anchor="middle" class="donut-percent donut-percent_offline"><?php echo $_SESSION['Offline']?>%</tspan>   
								</text>
								<text y="100%" transform="translate(0, 2)">
									<tspan x="50%" text-anchor="middle" class="donut-data1">Offline</tspan>   
								</text>
								</g>
							</svg>
						</div>
						<div class="svg-item Schedule_list" item='Schedule_list'>
							<svg width="100%" height="100%" viewBox="0 0 40 40" class="donut">
								<circle class="donut-hole" cx="20" cy="20" r="15.91549430918954" fill="#fff"></circle>
								<circle class="donut-ring" cx="20" cy="20" r="15.91549430918954" fill="transparent" stroke-width="3.5"></circle>
								<circle class="donut-segment donut-segment-4 schedule_c" cx="20" cy="20" r="15.91549430918954" fill="transparent" stroke-width="3.5" stroke-dasharray="<?php echo $_SESSION['Schedule']?> <?php echo 100-$_SESSION['Schedule'] ?>" stroke-dashoffset="25"></circle>
								<g class="donut-text donut-text-3">

								<text y="50%" transform="translate(0, 2)">
									<tspan x="50%" text-anchor="middle" class="donut-percent donut-percent_schedule"><?php echo $_SESSION['Schedule']?>%</tspan>   
								</text>
								<text y="100%" transform="translate(0, 2)">
									<tspan x="50%" text-anchor="middle" class="donut-data1">Schedule</tspan>   
								</text>
								</g>
							</svg>
						</div>
						<div class="svg-item ToBeDone_list" item='ToBeDone_list'>
							<svg width="100%" height="100%" viewBox="0 0 40 40" class="donut">
								<circle class="donut-hole" cx="20" cy="20" r="15.91549430918954" fill="#fff"></circle>
								<circle class="donut-ring" cx="20" cy="20" r="15.91549430918954" fill="transparent" stroke-width="3.5"></circle>
								<circle class="donut-segment donut-segment-10" cx="20" cy="20" r="15.91549430918954" fill="transparent" stroke-width="3.5" stroke-dasharray="<?php echo $_SESSION['ToBeDone']?> <?php echo 100-$_SESSION['ToBeDone'] ?>" stroke-dashoffset="25"></circle>
								<g class="donut-text donut-text-1">

								<text y="50%" transform="translate(0, 2)">
									<tspan x="50%" text-anchor="middle" class="donut-percent donut-percent_tobedone"><?php echo $_SESSION['ToBeDone']?>%</tspan>   
								</text>
								<text y="100%" transform="translate(0, 2)">
									<tspan x="40%" text-anchor="bottom" class="donut-data">Done</tspan>   
								</text>
								</g>
							</svg>
						</div>
						<div class="svg-item Requiring_list" item='Requiring_list'>
							<svg width="100%" height="100%" viewBox="0 0 40 40" class="donut">
								<circle class="donut-hole" cx="20" cy="20" r="15.91549430918954" fill="#fff"></circle>
								<circle class="donut-ring" cx="20" cy="20" r="15.91549430918954" fill="transparent" stroke-width="3.5"></circle>
								<circle class="donut-segment donut-segment-11" cx="20" cy="20" r="15.91549430918954" fill="transparent" stroke-width="3.5" stroke-dasharray="<?php echo $_SESSION['Requiring']?> <?php echo 100-$_SESSION['Requiring'] ?>" stroke-dashoffset="25"></circle>
								<g class="donut-text donut-text-2" style="z-index:223232">

								<text y="50%" transform="translate(0, 2)">
									<tspan x="50%" text-anchor="middle" class="donut-percent donut-percent_requiring"><?php echo $_SESSION['Requiring_count']?></tspan>   
								</text>
								<text y="100%" transform="translate(0, 2)">
									<tspan x="10%" text-anchor="bottom" class="donut-data">Attention Required</tspan>   
								</text>
								</g>
							</svg>
						</div>
						<div class="svg-item pass_fail_list" item='pass_fail_list' style="max-width: 16% !important">
							<svg width="100%" height="100%" viewBox="0 0 48 40" class="donut">
								<circle class="donut-hole" cx="20" cy="20" r="15.91549430918954" fill="#fff"></circle>
								<circle class="donut-ring" cx="20" cy="20" r="15.91549430918954" fill="transparent" stroke-width="3.5"></circle>
								<circle class="donut-segment donut-segment-12" cx="20" cy="20" r="15.91549430918954" fill="transparent" stroke-width="3.5" stroke-dasharray="<?php echo $_SESSION['pass_fail']?> <?php echo 100-$_SESSION['pass_fail'] ?>" stroke-dashoffset="25"></circle>
								<g class="donut-text donut-text-3">

								<text y="50%" transform="translate(0, 2)">
									<tspan x="45%" text-anchor="middle" class="donut-percent donut-percent_pass_fail"><?php echo $_SESSION['pass_fail_count']?></tspan>   
								</text>
								<text y="100%" transform="translate(0, 2)">
									<tspan x="0%" text-anchor="bottom" class="donut-data">Immediate Action Required</tspan>   
								</text>
								</g>
							</svg>
						</div>
						<div class="svg-item device_list" item='device_list'>
							<svg width="100%" height="100%" viewBox="0 0 40 40" class="donut">
								<circle class="donut-hole" cx="20" cy="20" r="15.91549430918954" fill="#fff"></circle>
								<circle class="donut-ring" cx="20" cy="20" r="15.91549430918954" fill="transparent" stroke-width="3.5"></circle>
								<circle class="donut-segment donut-segment-12" cx="20" cy="20" r="15.91549430918954" fill="transparent" stroke-width="3.5" stroke-dasharray="<?php echo $_SESSION['device']?> <?php echo 100-$_SESSION['device'] ?>" stroke-dashoffset="25"></circle>
								<g class="donut-text donut-text-3">

								<text y="50%" transform="translate(0, 2)">
									<tspan x="50%" text-anchor="middle" class="donut-percent donut-percent_pass_fail"><?php echo $_SESSION['device']?>%</tspan>   
								</text>
								<text y="100%" transform="translate(0, 2)">
									<tspan x="33%" text-anchor="bottom" class="donut-data">Device list</tspan>   
								</text>
								</g>
							</svg>
						</div>
				</div>
                <div class="overview_section1" style="display: none; margin: 0 auto;height: 300px">
						<!-- <div class="title" style="padding-bottom: 4%">
						<h4 style="color: rgb(13,38,62)">CONSUMER UNITS OVERVIEW</h4>
						</div> -->
						<div class="svg-item first_list" item='first_list'>
							<svg width="100%" height="100%" viewBox="0 0 40 40" class="donut">
								<circle class="donut-hole" cx="20" cy="20" r="15.91549430918954" fill="#fff"></circle>
								<circle class="donut-ring" cx="20" cy="20" r="15.91549430918954" fill="transparent" stroke-width="3.5"></circle>
								<circle class="donut-segment donut-segment-2" cx="20" cy="20" r="15.91549430918954" fill="transparent" stroke-width="3.5" stroke-dasharray="<?php echo $_SESSION['first_done']?> <?php echo 100-$_SESSION['first_done'] ?>" stroke-dashoffset="25"></circle>
								<g class="donut-text donut-text-1">

								<text y="50%" transform="translate(0, 2)">
									<tspan x="50%" text-anchor="middle" class="donut-percent donut-percent_first"><?php echo $_SESSION['first_done']?>%</tspan>   
								</text>
								<text y="100%" transform="translate(0, 2)">
									<tspan x="50%" text-anchor="middle" class="donut-data"></tspan>   
								</text>
								</g>
							</svg>
						</div>
						<div class="svg-item second_list" item='second_list'>
							<svg width="100%" height="100%" viewBox="0 0 40 40" class="donut">
								<circle class="donut-hole" cx="20" cy="20" r="15.91549430918954" fill="#fff"></circle>
								<circle class="donut-ring" cx="20" cy="20" r="15.91549430918954" fill="transparent" stroke-width="3.5"></circle>
								<circle class="donut-segment donut-segment-3" cx="20" cy="20" r="15.91549430918954" fill="transparent" stroke-width="3.5" stroke-dasharray="<?php echo $_SESSION['second_done']?> <?php echo 100-$_SESSION['second_done'] ?>" stroke-dashoffset="25"></circle>
								<g class="donut-text donut-text-2">

								<text y="50%" transform="translate(0, 2)">
									<tspan x="50%" text-anchor="middle" class="donut-percent donut-percent_second"><?php echo $_SESSION['second_done']?>%</tspan>   
								</text>
								<text y="100%" transform="translate(0, 2)">
									<tspan x="50%" text-anchor="middle" class="donut-data"></tspan>   
								</text>
								</g>
							</svg>
						</div>
						<div class="svg-item third_list" item='Schedule_list'>
							<svg width="100%" height="100%" viewBox="0 0 40 40" class="donut">
								<circle class="donut-hole" cx="20" cy="20" r="15.91549430918954" fill="#fff"></circle>
								<circle class="donut-ring" cx="20" cy="20" r="15.91549430918954" fill="transparent" stroke-width="3.5"></circle>
								<circle class="donut-segment donut-segment-4 " cx="20" cy="20" r="15.91549430918954" fill="transparent" stroke-width="3.5" stroke-dasharray="<?php echo $_SESSION['third_done']?> <?php echo 100-$_SESSION['third_done'] ?>" stroke-dashoffset="25"></circle>
								<g class="donut-text donut-text-3">

								<text y="50%" transform="translate(0, 2)">
									<tspan x="50%" text-anchor="middle" class="donut-percent donut-percent_third"><?php echo $_SESSION['third_done']?>%</tspan>   
								</text>
								<text y="100%" transform="translate(0, 2)">
									<tspan x="50%" text-anchor="middle" class="donut-data"></tspan>   
								</text>
								</g>
							</svg>
						</div>
						<div class="svg-item fourth_list" item='fourth_list'>
							<svg width="100%" height="100%" viewBox="0 0 40 40" class="donut">
								<circle class="donut-hole" cx="20" cy="20" r="15.91549430918954" fill="#fff"></circle>
								<circle class="donut-ring" cx="20" cy="20" r="15.91549430918954" fill="transparent" stroke-width="3.5"></circle>
								<circle class="donut-segment donut-segment-10" cx="20" cy="20" r="15.91549430918954" fill="transparent" stroke-width="3.5" stroke-dasharray="<?php echo $_SESSION['fourth_done']?> <?php echo 100-$_SESSION['fourth_done'] ?>" stroke-dashoffset="25"></circle>
								<g class="donut-text donut-text-1">

								<text y="50%" transform="translate(0, 2)">
									<tspan x="50%" text-anchor="middle" class="donut-percent donut-percent_fourth"><?php echo $_SESSION['fourth_done']?>%</tspan>   
								</text>
								<text y="100%" transform="translate(0, 2)">
									<tspan x="45%" text-anchor="bottom" class="donut-data"></tspan>   
								</text>
								</g>
							</svg>
						</div>
						<div class="svg-item fifth_list" item='fifth_list'>
							<svg width="100%" height="100%" viewBox="0 0 40 40" class="donut">
								<circle class="donut-hole" cx="20" cy="20" r="15.91549430918954" fill="#fff"></circle>
								<circle class="donut-ring" cx="20" cy="20" r="15.91549430918954" fill="transparent" stroke-width="3.5"></circle>
								<circle class="donut-segment donut-segment-11" cx="20" cy="20" r="15.91549430918954" fill="transparent" stroke-width="3.5" stroke-dasharray="<?php echo $_SESSION['fifth_done']?> <?php echo 100-$_SESSION['fifth_done'] ?>" stroke-dashoffset="25"></circle>
								<g class="donut-text donut-text-2" style="z-index:223232">

								<text y="50%" transform="translate(0, 2)">
									<tspan x="50%" text-anchor="middle" class="donut-percent donut-percent_fifth"><?php echo $_SESSION['fifth_done']?>%</tspan>   
								</text>
								<text y="100%" transform="translate(0, 2)">
									<tspan x="45%" text-anchor="bottom" class="donut-data"></tspan>   
								</text>
								</g>
							</svg>
						</div>
						<div class="svg-item sixth_list" item='sixth_list'>
							<svg width="100%" height="100%" viewBox="0 0 40 40" class="donut">
								<circle class="donut-hole" cx="20" cy="20" r="15.91549430918954" fill="#fff"></circle>
								<circle class="donut-ring" cx="20" cy="20" r="15.91549430918954" fill="transparent" stroke-width="3.5"></circle>
								<circle class="donut-segment donut-segment-12" cx="20" cy="20" r="15.91549430918954" fill="transparent" stroke-width="3.5" stroke-dasharray="<?php echo $_SESSION['sixth_done']?> <?php echo 100-$_SESSION['sixth_done'] ?>" stroke-dashoffset="25"></circle>
								<g class="donut-text donut-text-3">

								<text y="50%" transform="translate(0, 2)">
									<tspan x="50%" text-anchor="middle" class="donut-percent donut-percent_sixth"><?php echo $_SESSION['sixth_done']?>%</tspan>   
								</text>
								<text y="100%" transform="translate(0, 2)">
									<tspan x="45%" text-anchor="bottom" class="donut-data"></tspan>   
								</text>
								</g>
							</svg>
						</div>
				</div>

				<div style="width: 40%; margin-left:auto">
					<canvas id="bar-chart" width="800" height="450"></canvas>
				</div>

			

				
				
			
		
			
			
		
		<!-- <div class="middle">
			<div id="container" style="min-width: 310px; max-width: 1500px; height: 200px; margin: 0 auto"></div>
		</div> -->
		
	</div>

	<div id="list_modal" class="modal fade" role="dialog">
		<div class="modal-dialog" style="margin-top: 40px !important; margin: 0 auto; height: 100%">

			<!-- Modal content-->
			<div class="modal-content" style="overflow-y: auto; max-height: 80%; background-color: rgb(255,255,255,0.9) !important; ">
				<!-- <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div> -->
				<div class="modal-body">
				
					<div class="row">

						<div class="col-md-6">
							<div class="left_list"></div>
						</div>
						<div class="col-md-6">
							<div class="right_list"></div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
				
				</div>
			</div>

		</div>
	</div>
	


</body>


</html>

<script type="text/javascript">
	sessionStorage.removeItem('Schedule');
	

	

	function generate_random_number() {
		return(Math.floor((Math.random() * 100000000000) + 1));
	}
	var CertType = "";
	var Certtype_menu = "";

	var d = new Date();
	var months = ["Jan", "Feb", "Mar", "Apr", "May", "June", "July", "Aug", "Sep", "Oct", "Nov", "Dec"];
	var month = months[d.getMonth()];
	var year = d.getFullYear();
	var day = d.getDate();


	$('#select_month option[value='+(d.getMonth()+1)+']').attr('selected','selected');
	$('#select_year option[value='+year+']').attr('selected','selected');

	


	sessionStorage.removeItem('Schedule');


	$(function(){
		// Just to append id number for each row  
		$('table tr:eq(0)').prepend('<th> ID </th>')

		var id = 0;

		$('table tr:gt(0)').each(function(){	
			id++
			$(this).prepend('<td>'+id+'</td>');
		});
	})
		
		

$(document).ready(function(){
	var username = '<?php echo $_SESSION['username'] ?>';
		var password = '<?php echo $_SESSION['password'] ?>';

		var Restricted="";
		var Offline="";
		var Schedule="";
		var ToBeDone="";
		var Requiring="";
		var pass_fail="";
		var device   ="";

      

        var last_done = [];


		var Restricted_list = [];
		var Offline_list	=[];
		var Schedule_list   =[];
		var ToBeDone_list   =[];
		var Requiring_list  =[];
		var pass_fail_list  =[];
		var device_list		=[];

        var last_done_list = [[],[],[],[],[],[]];


		var OrgID="";
		var area = "";
		
		var filename = "";
		var userid	="";
		var user_level = "";



		jQuery.ajax({
	    	url:"https://iotops.net/SN011.php?cmd=logintype&Username="+username+"&Password=" +password +"&UserLevel=1",
	        async:false,
	        data: { 
	        	
	            },
	            type: 'post',
	            success: function(result) 
	            {
	            	console.log(result);
	            	OrgID = result[0]["OrgID"];
					CertType = result[0]["CertType"];
					Certtype_menu = result[0]['CertType'];

					userid = result[0]['UserID'];
					area   = result[0]['area'];
					user_level = result[0]["UserLevel"];
					if(user_level=="30"){
						//$("#select_certtype_superuser").css("display","block");
						$("#dashboard-super-link").css("display","block");
						//CertType = $("#select_certtype_superuser").val();
						console.log(CertType);
					}
					if(CertType=="8"){
						$("#wraparound").css("display","none");
					}
					else if(CertType=="22"){
						$("#assessment").css("display","none");
					}

					
	         
	            }
		});	
		
		var d = new Date();
		//var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        var months = ["Jan", "Feb", "Mar", "Apr", "May", "June", "July", "Aug", "Sep", "Oct", "Nov", "Dec"];
		var month = d.getMonth();
		var year = d.getFullYear();
		var day = d.getDate();
		
		var middate = year+'-'+(month+1)+'-15';
		var current_month = month+1;


		get_chart_value(middate,current_month);

		function get_chart_value(middate, current_month){

			

			Restricted_list = [];
			Offline_list	=[];
			Schedule_list   =[];
			ToBeDone_list   =[];
			Requiring_list  =[];
			pass_fail_list  =[];
			device_list		=[];


            last_done_list = [[],[],[],[],[],[]];
            
			if(CertType=="22"){
				$(".svg-item").css("max-width","21%");
				$(".device_list").css("display","block");
				$(".Restricted_list").css("display","none");
				$(".Offline_list").css("display","none");
				$(".Requiring_list").css("display","none");
				$(".pass_fail_list").css("display","none");
				
				$(".Schedule_list .donut-data1").html("Scheduled");
				
				$(".ToBeDone_list .donut-data").html("Completed");	
				jQuery.ajax({
					url:"ajax.php",
					data: { 
						request:"get_done_schedule_device",
						OrgID:OrgID,
						CertType:CertType,
						userID:userid,
						middate:middate,
						current_month:current_month
						},
						type: 'post',
						success: function(result) 
						{
							$(".loading-gif").css("display","none");
							
							var res = JSON.parse(result);
							console.log(res);
							device_list 		= res['device_list'];
							ToBeDone_list		= res['ToBeDone_list'];
							Schedule_list		= res['Schedule_list'];
							var total_count	= res['total_count'];
							var device_count		= res['device_count'];
							var done_count		    = res['done_count'];
							var schedule_count		= res['schedule_count'];
							var block_count		    = res['block_count'];

							if(block_count==0){
								Schedule=0;
								ToBeDone=0;
							}
							else{
								Schedule=parseInt((schedule_count/block_count)*100);
								ToBeDone=parseInt(100-Schedule);
							}
							
							
							if(total_count==0){
								device=0;
							}
							else
								device = parseInt((device_count/block_count)*100);
                            var last_month_status = res['last_status'];
                            for( var j=0; j<last_month_status.length; j++){
                                idone = 0;

                                for (var k=0; k<last_month_status[j].length;k++)
                                {
                                    var done = "";
                                    if(last_month_status[j][k]['Status']=="70"){
                                        var done_array = [last_month_status[j][k]['Location'],last_month_status[j][k]['Filename']];
                                        if(last_done_list[j].length==0){
                                            last_done_list[j].push(done_array);
                                        }
                                        else{
                                            if(last_done_list[j][last_done_list[j].length-1][0]!=last_month_status[j][k]['Location']){
                                                last_done_list[j].push(done_array);
                                            }
                                        }
                                        
                                            
                                        idone++;

                                    }
                                
                                            
                                    
                                }
                                last_done[j]=parseInt((idone/(last_month_status[j].length))*100);
                                
                            }

					
							jQuery.ajax({
								url:"ajax.php",
								data: { 
									request:"save_donut",
									Restricted:Restricted,
									Offline:Offline,
									Schedule:Schedule,
									ToBeDone:ToBeDone,
									Requiring:Requiring,
									pass_fail:pass_fail,
									device:device,

								

									Restricted_count : 0,
									Offline_count    : 0,
									Schedule_count   : Schedule_list.length,
									ToBeDone_count   : ToBeDone_list.length,
									Requiring_count  : 0,
									pass_fail_count  : 0,
									device_count	 : device_list.length,

									



                                    first_done:last_done[0],
                                                    
                                    second_done:last_done[1],
                                    third_done:last_done[2],
                                    fourth_done:last_done[3],
                                    fifth_done:last_done[4],
                                    sixth_done:last_done[5]
									
									},
								type: 'post',
								success: function(result) 
								{
									console.log(result);
									$(".overview_section" ).hide();
                                    $(".overview_section1" ).hide();
									$(".overview_section" ).load( "dashboard.php .overview_section" );
                                    $(".overview_section1" ).load( "dashboard.php .overview_section1" );

									$(".donut-text").css("font-family","Arial, Helvetica, sans-serif");
									setTimeout(function() {
										$(".overview_section" ).show();
                                        //$(".overview_section1" ).show();
										$("body .svg-item").css("max-width","21%");
										$("body .device_list").css("display","block");
										$("body .Restricted_list").css("display","none");
										$("body .Offline_list").css("display","none");
										$("body .Requiring_list").css("display","none");
										$("body .pass_fail_list").css("display","none");
										
										$("body .Schedule_list .donut-data1").html("Scheduled");
										
										$("body .ToBeDone_list .donut-data").html("Completed");
										$(".ToBeDone_list .donut-data").attr("x","30%");

                                        var last_six_months_number = [current_month+6,current_month+7,current_month+8,current_month+9,current_month+10,current_month+11,current_month+12];
                                        var last_six_months=[];
                                        for(var m=0; m<last_six_months_number.length; m++){
                                            var last_month_number = last_six_months_number[m]%12;
                                            if(last_month_number==0){
                                                last_month_number=12;
                                            }
                                            last_six_months[m] =last_month_number;
                                        }

                                        console.log(last_six_months);

                                        $(".first_list .donut-data").html(months[last_six_months[0]-1]);
                                        $(".second_list .donut-data").html(months[last_six_months[1]-1]);
                                        $(".third_list .donut-data").html(months[last_six_months[2]-1]);
                                        $(".fourth_list .donut-data").html(months[last_six_months[3]-1]);
                                        $(".fifth_list .donut-data").html(months[last_six_months[4]-1]);
                                        $(".sixth_list .donut-data").html(months[last_six_months[5]-1]);
                        			},1000)
									
									//$(".donut").click();
									//location.reload();
								}
							});	
							// console.log("Schedule_list",Schedule_list);
							// console.log("ToBeDone_list",ToBeDone_list);
							
						}
				});
			}
			else{
				$(".svg-item").css("max-width","13%");
				
				$(".pass_fail_list").css("max-width","16%");
				$(".device_list").css("display","none");
				$(".Restricted_list").css("display","block");
				$(".Offline_list").css("display","block");
				$(".Requiring_list").css("display","block");
				$(".pass_fail_list").css("display","block");
				
				$(".Schedule_list .donut-data1").html("Schedule");
				
				$(".ToBeDone_list .donut-data").html("Done");	

				jQuery.ajax({
					//url:"https://iotops.net/SN012.php?cmd=getchartdata&CertType="+CertType+"&DateStart="+startdate+"&DateEnd="+enddate+"&OrgID="+OrgID,
					url:"ajax.php",
					data: { 
						request:"get_dashboard",
						CertType:CertType,
						middate:middate,
						OrgID:OrgID,
						current_month:current_month
						},
						type: 'post',
						success: function(result) 
						{
							
							
							// console.log(result);
							$(".loading-gif").css("display","none");
							result = JSON.parse(result);
							//    console.log(result);
							
								// if(result['Restricted']!="")
								// {
									Restricted=Math.round(result['Restricted']);
									console.log("reerER",Restricted);
									Offline=Math.round(result['Offline']);
									Schedule=Math.round(result['Schedule']);
									ToBeDone=Math.round(result['To Be Done']);
									Requiring=Math.round(result['Requiring Follow-up Work']);
									pass_fail=Math.round(result['Alerts']);


									Restricted_list = result['Restricted_list'];
									Offline_list 	= result['Offline_list'];
									Requiring_list 	= result['FollowOn_list'];
									pass_fail_list 	= result['Alerts_list'];
									
									console.log("middate",middate);
								jQuery.ajax({
									url:"ajax.php",
									data: { 
										request:"get_done_schedule",
										OrgID:OrgID,
										CertType:CertType,
										userID:userid,
										middate: middate,
										current_month:current_month
										},
										type: 'post',
										success: function(result) 
										{
										
											var ischedule = 0;
											var idone 	  = 0;

                                          
											console.log("result",result);
											$(".loading-gif").css("display","none");
											var res1 = JSON.parse(result);
											console.log(res1);
											var res = res1['current_status'];
											var last_month_status = res1['last_status'];
											for (var i=0;i<res.length;i++)
											{
												var done = "";
												if(res[i]['Status']=="70"){
													var done_array = [res[i]['Location'],res[i]['Filename']];
													if(ToBeDone_list.length==0){
														ToBeDone_list.push(done_array);
													}
													else{
														if(ToBeDone_list[ToBeDone_list.length-1][0]!=res[i]['Location']){
															ToBeDone_list.push(done_array);
														}
													}
													
														
													idone++;

												}
												else if(res[i]['Status']=="0"){
													var schedule_array = [res[i]['Location'],res[i]['Filename']];
													if(Schedule_list.length==0){
														Schedule_list.push(schedule_array);
													}
													else{
														if(Schedule_list[Schedule_list.length-1][0]!=res[i]['Location']){
															Schedule_list.push(schedule_array);
														}
													}

													
													ischedule++;
												}
														
												
											}

                                            
											Schedule=parseInt((ischedule/(res.length))*100);
											ToBeDone=parseInt(100-Schedule);

                                            for( var j=0; j<last_month_status.length; j++){
                                                idone = 0;

                                                for (var k=0; k<last_month_status[j].length;k++)
                                                {
                                                    var done = "";
                                                    if(last_month_status[j][k]['Status']=="70"){
                                                        var done_array = [last_month_status[j][k]['Location'],last_month_status[j][k]['Filename']];
                                                        if(last_done_list[j].length==0){
                                                            last_done_list[j].push(done_array);
                                                        }
                                                        else{
                                                            if(last_done_list[j][last_done_list[j].length-1][0]!=last_month_status[j][k]['Location']){
                                                                last_done_list[j].push(done_array);
                                                            }
                                                        }
                                                        
                                                            
                                                        idone++;

                                                    }
                                               
                                                            
                                                    
                                                }
                                                last_done[j]=parseInt((idone/(last_month_status[j].length))*100);
											   
                                            }
									

											jQuery.ajax({
												url:"ajax.php",
												data: { 
													request:"save_donut",
													Restricted:Restricted,
													Offline:Offline,
													Schedule:Schedule,
													ToBeDone:ToBeDone,
													Requiring:Requiring,
													pass_fail:pass_fail,


													Restricted_count : Restricted_list.length,
													Offline_count	:Offline_list.length,
													Schedule_count   :Schedule_list.length,
													ToBeDone_count   :ToBeDone_list.length,
													Requiring_count  :Requiring_list.length,
													pass_fail_count  :pass_fail_list.length,
													device_count		:0,

                                                    first_done:last_done[0],
                                                    
                                                    second_done:last_done[1],
                                                    third_done:last_done[2],
                                                    fourth_done:last_done[3],
                                                    fifth_done:last_done[4],
                                                    sixth_done:last_done[5]
													
													},
												type: 'post',
												success: function(result) 
												{
													console.log(result);
													$(".overview_section" ).hide();
													$( ".overview_section" ).load( "dashboard.php .overview_section" );

                                                    $(".overview_section1" ).hide();
													$( ".overview_section1" ).load( "dashboard.php .overview_section1" );

													$(".donut-text").css("font-family","Arial, Helvetica, sans-serif");
													setTimeout(function() {
														$(".overview_section" ).show();
                                                       // $(".overview_section1" ).show();
														$(".svg-item").css("max-width","13%");
														$(".pass_fail_list").css("max-width","16%");
														$("body .device_list").css("display","none");
														$(".Restricted_list").css("display","block");
														$(".Offline_list").css("display","block");
														$(".Requiring_list").css("display","block");
														$(".pass_fail_list").css("display","block");
														
														$(".Schedule_list .donut-data1").html("Schedule");
														
														$(".ToBeDone_list .donut-data").html("Done");
														$(".ToBeDone_list .donut-data").attr("x","40%");

                                                        var last_six_months_number = [current_month+6,current_month+7,current_month+8,current_month+9,current_month+10,current_month+11,current_month+12];
                                                        var last_six_months=[];
                                                        for(var m=0; m<last_six_months_number.length; m++){
                                                            var last_month_number = last_six_months_number[m]%12;
                                                            if(last_month_number==0){
                                                                last_month_number=12;
                                                            }
                                                            last_six_months[m] =last_month_number;
                                                        }

                                                        console.log(last_six_months);

                                                        $(".first_list .donut-data").html(months[last_six_months[0]-1]);
                                                        $(".second_list .donut-data").html(months[last_six_months[1]-1]);
                                                        $(".third_list .donut-data").html(months[last_six_months[2]-1]);
                                                        $(".fourth_list .donut-data").html(months[last_six_months[3]-1]);
                                                        $(".fifth_list .donut-data").html(months[last_six_months[4]-1]);
                                                        $(".sixth_list .donut-data").html(months[last_six_months[5]-1]);


                                                      

													},1000)	
													//$(".donut").click();
													//location.reload();
												}
											});	
											console.log("Schedule_list",Schedule_list);
											console.log("ToBeDone_list",ToBeDone_list);
											
										}
								});

								console.log("Restricted_list",Restricted_list);
								console.log("Offline_list",Offline_list);
								console.log("Schedule_list",Schedule_list);
								console.log("ToBeDone_list",ToBeDone_list);
								console.log("Requiring_list",Requiring_list);
								console.log("pass_fail_list",pass_fail_list);
								
						}
				});
			}

			var startdate = year+"-"+current_month+"-1";
			
			var enddate = year+"-"+current_month+"-30";
			jQuery.ajax({
            	url:"https://sticsbackoffice.com/2.php?cmd=getfullcertificatesbydateorguserget_dashboard&OrgID="+OrgID+"&CertType="+CertType+"&DateStart="+startdate+"&DateEnd="+enddate+"&area="+area,
                data: { 
                	 
                    },
                    type: 'post',
                    success: function(result) 
                    {
						console.log(result);
						var parse_data = JSON.parse(result);
						console.log(parse_data);
						var not_checked= parse_data['not_checked'].length;
						var job_rased =  parse_data['job_raised'].length;
						var job_complete =  parse_data['job_complete'].length;

						console.log("not+checked",not_checked);
						
						console.log("not+checked",not_checked);
						new Chart(document.getElementById("bar-chart"), {
							type: 'bar',
							data: {
							labels: ["Not checked", "Job raised", "Job complete"],
							datasets: [
								{
								label: "",
								backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f"],
								data: [not_checked,job_rased,job_complete]
								}
							]
							},
							options: {
							legend: { display: false },
							title: {
								display: true,
								text: ''
							}
							}
						});
					}
				});
			
			




		};
		
		$("#btn_viewreport1").click(function(){
			$("#btn_viewreport").click();
		});	
		$("#btn_viewreport").click(function(){
			
			$(".loading-gif").css("display","block");
			$("#data").html("");

			var string="";

			var middate_month = $("#select_month").val();
			var middate_year  = $("#select_year").val();
			var middate = middate_year+"-"+middate_month+"-15";
			get_chart_value(middate,current_month);
			
			
                	


		});	
		
	
		$("body").on('click', '.svg-item', function () {
			var item = $(this).attr('item');
			var flag="1";
			var list = [];
			console.log(item);
			var left_string = "";
			var right_string = "";
			if(item == "Restricted_list"){
				list = Restricted_list;
			}
			if(item == "Offline_list"){
				list = Offline_list;
			}
			if(item == "Schedule_list"){
				list = Schedule_list;
			}
			if(item == "ToBeDone_list"){
				list = ToBeDone_list;
			}
			if(item == "Requiring_list"){
				var array = [];
				for(var i=0; i< Requiring_list.length; i++){
					array.push(Requiring_list[i][1]);
				}

				$.redirect('./tracker-water.php', {'from_dashboard': "1","data":array});
				flag="0";
				list = Requiring_list;
			}
			if(item == "pass_fail_list"){
				
				var array = [];
				for(var i=0; i< pass_fail_list.length; i++){
					array.push(pass_fail_list[i][1]);
				}

				$.redirect('./tracker-water.php', {'from_dashboard': "1",'data': array});
				flag="0";
				list = pass_fail_list;
			}
			if(item == "device_list"){
				list = device_list;
			}

            if(item == "first_list"){
				list = last_done_list[0];
			}
            if(item == "second_list"){
				list = last_done_list[1];
			}
            if(item == "third_list"){
				list = last_done_list[2];
			}
            if(item == "fourth_list"){
				list = last_done_list[3];
			}
            if(item == "fifth_list"){
				list = last_done_list[4];
			}
            if(item == "sixth_list"){
				list = last_done_list[5];
			}

            

			for(var i =0; i< list.length; i++){
				console.log(list[i]);
				if(i < (list.length/2)){
					left_string += "<a style='font-weight:800' target='_blank' href='https://iotops.net/html2pdf/"+list[i][1]+"'>"+list[i][0]+"</a><br />";
				}
				else {
					right_string += "<a style='font-weight:800' target='_blank' href='https://iotops.net/html2pdf/"+list[i][1]+"'>"+list[i][0]+"</a><br />";
				}
			}
			$(".left_list").html(left_string);
			$(".right_list").html(right_string);
			if(flag=="1")
				$("#list_modal").modal('show'); 
		});


		

		// $(".donut-text").css("font-family","Arial, Helvetica, sans-serif");



		$('#iframe').load('dashboard.php');
		

		
	});
</script>
<script src="menu.js?ra=<?php echo $rand?>"></script>