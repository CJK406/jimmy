


$("#mainNav").removeClass("navbar-scrolled");

var navbarCollapse = function() {
    if ($("#mainNav").offset().top > 100) {
      $("#mainNav").addClass("navbar-scrolled");
      $("#mainNav .navbar-brand img").attr('src','../assets/img/logo2.png');
    } else {
      $("#mainNav").removeClass("navbar-scrolled");
      $("#mainNav .navbar-brand img").attr('src','../assets/img/logo1.png');

    }
  };
  // Collapse now if page is not at top
navbarCollapse();
$(window).scroll(navbarCollapse);