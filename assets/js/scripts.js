/*!
    * Start Bootstrap - Creative v6.0.4 (https://startbootstrap.com/theme/creative)
    * Copyright 2013-2020 Start Bootstrap
    * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-creative/blob/master/LICENSE)
    */
    (function($) {
  "use strict"; // Start of use strict

  // Smooth scrolling using jQuery easing
  $('a.js-scroll-trigger[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      if (target.length) {
        $('html, body').animate({
          scrollTop: (target.offset().top - 72)
        }, 1000, "easeInOutExpo");
        return false;
      }
    }
  });

  // Closes responsive menu when a scroll trigger link is clicked
  $('.js-scroll-trigger').click(function() {
    $('.navbar-collapse').collapse('hide');
  });

  // Activate scrollspy to add active class to navbar items on scroll
  $('body').scrollspy({
    target: '#mainNav',
    offset: 75
  });

  // Collapse Navbar
  
  // Collapse the navbar when page is scrolled

  // Magnific popup calls
  $('#portfolio').magnificPopup({
    delegate: 'a',
    type: 'image',
    tLoading: 'Loading image #%curr%...',
    mainClass: 'mfp-img-mobile',
    gallery: {
      enabled: true,
      navigateByImgClick: true,
      preload: [0, 1]
    },
    image: {
      tError: '<a href="%url%">The image #%curr%</a> could not be loaded.'
    }
  });

})(jQuery); // End of use strict

$("#user_pops").click(function(){
  if(login_flag=="0"){
    $("#signin_modal").modal('show');
  }
});
$("#user_pops").popover({
    html: true,
    content: function () {
        if(login_flag=="1"){
          return `<div>
                  <img src="../assets/img/header_user1.png" />
                  <span id="user_header_name">`+user_name+`</span>
                  <p id="user_header_email">`+user_email+`</p>
                    <a href="myaccount.php" id="user_header_account">My account</a>
                    <a href="#" id="user_header_signout" style="margin-left:30px">Sign out</a>
                </div>`;
    }
  }
});

$("#sign_up_link").click(function(){
  $("#signin_modal").modal('hide');
  $("#signup_modal").modal('show');

})

$("#sign_in_link").click(function(){
  $("#signin_modal").modal('show');
  $("#signup_modal").modal('hide');

})

$("#signin_button").click(function(){
        var email = $("#email_signin").val();
        var password = $("#password_signin").val();
        if(email!="" && password!=""){
            $.ajax({
              url:"../api/user/login/",
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
                    swal("Success","Successfully login","success");
                    login_flag='1';
                    user_name = result['user_name'];
                    user_id = result['user_id'];
                    user_email = result['email'];
                    $("#signin_modal").modal('hide');

                    location.reload();

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


$("#signup_button").click(function(){
    var fullname = $("#fullname_signup").val();
    var email = $("#email_signup").val();
    var password = $("#password_signup").val();
    var conf_password = $("#con_password_signup").val();

    if(fullname!="" && password!="" && email!="" && password==conf_password){
        jQuery.ajax({
          url:"../api/user/signup/",
          data: { 
              fullname:fullname,
              password:password,
              email:email,
             },
          type: 'post',
          success: function(re) 
          {
            var result = JSON.parse(re);
            if(result['status']=="200"){
                 swal("Success","Successfully sign up","success");
                 login_flag='1';
                 user_name = result['user_name'];
                 user_id = result['user_id'];
                 user_email = result['email'];

                 $("#signup_modal").modal('hide');
                 setTimeout(function(){ location.reload(); }, 1000);

            }
            else{
                swal("Info","The user already exist","info");
            }
          }
        }); 
    }
    else{
        swal('Error','Some of fields are empty or confirm password is incorrect. Please check and try again.','error');
    }
    
});

$( "body" ).on( "click", "#user_header_signout", function() {
  $.ajax({
      url:"../api/user/signout.php",
      data: { 
         },
      type: 'post',
      success: function(re) 
      {
        swal("Success","Successfully signout","success");

        login_flag="0";
        
        setTimeout(function(){ location.reload(); }, 1000);
      }
    }); 
});



$(".facebook_login").click(function(){
    FB.init({
        appId      : '721002358593144',
        status     : false,
        cookie     : true,  // enable cookies to allow the server to access 
                                     // the session
        xfbml      : true,  // parse social plugins on this page
        version    : 'v2.8' // use graph api version 2.8
    });
    FB.login(function(response) {
        if (response.authResponse) {
         FB.api('/me', { locale: 'en_US', fields: 'name, email' }, function(response) {
            jQuery.ajax({
              url:"../api/user/facebook_login/",
              data: { 
                  fullname:response.name,
                  email:response.email,
                 },
              type: 'post',
              success: function(re) 
              {
                var result = JSON.parse(re);
                if(result['status']=="200"){
                     swal("Success","Successfully Log In","success");
                     login_flag='1';
                     user_name = result['user_name'];
                     user_id = result['user_id'];
                     user_email = result['email'];

                     $("#signup_modal").modal('hide');
                     $("#signin_modal").modal('hide');
                     setTimeout(function(){ location.reload(); }, 1000);


                }
                else{
                    swal("Info","The user already exist","info");
                }
              }
            }); 

         });
        } else {
         console.log('User cancelled login or did not fully authorize.');
        }
    }, {scope: 'email',return_scopes: true});
});
