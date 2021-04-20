<?php
	session_start();
    include __DIR__ . "/../config.php";
    echo $_SESSION['admin_login_flag'];
    if(isset($_SESSION['admin_login_flag'])){
    	if($_SESSION['admin_login_flag']=="1")
    		header("Location: ".$site_url."admin/auction/");
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Admin Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A premium admin dashboard template by Mannatthemes" name="description" />
        <meta content="Mannatthemes" name="author" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo $site_url?>assets/img/logo2.png">

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/style.css" rel="stylesheet" type="text/css" />

    </head>
     <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/5.0.7/sweetalert2.min.css">
     <style type="text/css">
     	.fade:not(.show){
     		opacity: 1 !important;
     	}
     </style>
    <body class="account-body accountbg">

        <!-- Log In page -->
        <div class="row vh-100 ">
            <div class="col-12 align-self-center">
                <div class="auth-page">
                    <div class="card auth-card shadow-lg">
                        <div class="card-body">
                            <div class="px-3">
                                <div class="auth-logo-box">
                                    <a href="" class="logo logo-admin"><img src="<?php echo $site_url?>assets/img/logo2.png" height="55" alt="logo" class="auth-logo"></a>
                                </div><!--end auth-logo-box-->
                                
                                <div class="text-center auth-logo-text">
                                    <h4 class="mt-0 mb-3 mt-5">Welcome</h4>
                                </div> <!--end auth-logo-text-->  
                                <form class="form-horizontal auth-form my-4">
                                    <div class="form-group">
                                        <label for="username">Email</label>
                                        <div class="input-group mb-3">
                                            <span class="auth-form-icon">
                                                <i class="dripicons-user"></i> 
                                            </span>                                       
                                            <input type="text" class="form-control" id="email" placeholder="Enter email">
                                        </div>                                    
                                    </div><!--end form-group--> 
        
                                    <div class="form-group">
                                        <label for="userpassword">Password</label>                                            
                                        <div class="input-group mb-3"> 
                                            <span class="auth-form-icon">
                                                <i class="dripicons-lock"></i> 
                                            </span>                                                       
                                            <input type="password" class="form-control" id="password" placeholder="Enter password">
                                        </div>                               
                                    </div><!--end form-group--> 
        
        
                                                            
                                </form><!--end form-->
                                <div class="form-group mb-0 row">
                                        <div class="col-12 mt-2">
                                            <button class="btn btn-primary btn-round btn-block waves-effect waves-light btn_login" type="submit">Log In <i class="fas fa-sign-in-alt ml-1"></i></button>
                                        </div><!--end col--> 
                                    </div> <!--end form-group-->   
                            </div><!--end /div-->
                            
                           
                        </div><!--end card-body-->
                    </div><!--end card-->
                
                </div><!--end auth-page-->
            </div><!--end col-->           
        </div><!--end row-->
        <!-- End Log In page -->
    

    </body>
</html>
<script src="<?php echo $site_url?>admin/assets/js/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/5.0.7/sweetalert2.min.js"></script>

<script type="text/javascript">
	$(".btn_login").click(function(){
        var email = $("#email").val();
        var password = $("#password").val();
        if(email!="" && password!=""){
            $.ajax({
              url:"../api/user/admin-login/",
              data: { 
                  email:email,
                  password:password,
                 },
              type: 'post',
              success: function(re) 
              {
                var result = JSON.parse(re);
                console.log(result);
                if(result['status']=="200"){
					window.location.href = '<?php echo $site_url?>admin/auction/';                    
                }
                else{
                    swal("Info","Incorrect username or password","info");
                }
              }
            }); 
        }
        else{
            swal('Error','Username or password field is empty','error');
        }
});
</script>