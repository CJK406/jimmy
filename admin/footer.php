<script src="<?php echo $site_url?>admin/assets/js/jquery.min.js"></script>
<script src="<?php echo $site_url?>admin/assets/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo $site_url?>admin/assets/js/metisMenu.min.js"></script>
<script src="<?php echo $site_url?>admin/assets/js/waves.min.js"></script>
<script src="<?php echo $site_url?>admin/assets/js/jquery.slimscroll.min.js"></script>
<script src="<?php echo $site_url?>admin/assets/plugins/summernote/summernote-bs4.min.js"></script>
<script src="<?php echo $site_url?>admin/assets/js/app.js"></script>
<script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>

<script src="<?php echo $site_url?>admin/assets/plugins/datatables/jquery.dataTables.min.js"></script>
 <script src="<?php echo $site_url?>admin/assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/5.0.7/sweetalert2.min.js"></script>
 <script type="text/javascript">
 	$("#log_out").click(function(){
 		 $.ajax({
		      url:"<?php echo $site_url?>api/user/signout.php",
		      data: { 
		         },
		      type: 'post',
		      success: function(re) 
		      {
					window.location.href = '<?php echo $site_url?>admin/';                    

		      }
		    }); 
 	});
 </script>