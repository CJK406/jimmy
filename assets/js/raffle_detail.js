var raffle_data;
var max_bid_amount = 0;
var total_price=0;
var price = 0;
var expire_flag=true;
get_auction_by_id();
function get_auction_by_id(){
    $.ajax({
          url:"../api/ajax.php",
          data: { 
              request:'get_raffle_by_id',
              id:id
             },
          async:false,
          type: 'post',
          success: function(re) 
          {
            var result = JSON.parse(re);
            if(result['status']=="200"){
              raffle_data = result['data'];
              images = JSON.parse(result['data']['image']);
              var image_gallery_string = "";
              for(var i=0; i<images.length; i++){
                image_gallery_string+=`<li data-thumb="../api/upload/raffle/`+id+`/`+images[i]+`"> 
                                            <img style="height:300px" src="../api/upload/raffle/`+id+`/`+images[i]+`" />
                                       </li>`;
              }
              $("#terms_text").html(result['data']['terms']);
              $("#desc_text").html(result['data']['description']);
              $("#delivery_text").html(result['data']['delivery']);
              $("#image-gallery").html(image_gallery_string);
              $("#price").html("£"+result['data']['price']);
              total_price = result['data']['price'];
              price = result['data']['price'];
              $("#total_price").html("£"+total_price);
              var end_date = new Date(result['data']['end_time']);
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
              expire_flag = days>0 ? true : false;

              $("#left_time").html(expir_date+" ( "+week+" "+end_hour+":"+end_min+" "+pm_am+")");
            }
            else{
            }
          }
    });     
}



    
$("#content-slider").lightSlider({
    loop:true,
    keyPress:true
});
$('#image-gallery').lightSlider({
    gallery:true,
    item:1,
    thumbItem:9,
    slideMargin: 0,
    speed:500,
    auto:true,
    loop:true,
    onSliderLoad: function() {
        $('#image-gallery').removeClass('cS-hidden');
    }  
});


$("#buy_button").click(function(){
    var err_msg = "";

    if(login_flag!="1")
    {
        swal("Info","Please log in first","info");
    }
    else{
             
    }
});

$("#select_bid_amount").click(function(){
  var p_count = $(this).val();
  total_price = parseInt(p_count)*parseFloat(price);
  $("#total_price").html("£"+total_price);
});
var paypalActions;

paypal.Button.render({
        // Configure environment
        //env: 'production',
        env: 'sandbox',
        client: {
          sandbox: 'AUOIw9T0HlHoFXrskX2L8M6WWkbH_QhN2k3BtJRUlx0IBEen8S_mOVgdIJ5h2ml37Hc4GX2WTR9KDF0u',
          //production: 'ASAq7Q3AwES6JQ9Mc_Od5doolAQkzGxjyQ74oNA0LkBEbVz2eO38eLnNOF7iOMWWp6vsUcWjFGvsjTCJ'
        },
        // Customize button (optional)
        locale: 'en_US',
        style: {
          size: 'responsive',
          color: 'blue',
          shape: 'rect',
          label:'paypal',
           tagline: false
        },

        validate: function(actions) {
          console.log("validate called");
          actions.disable(); // Allow for validation in onClick()
          paypalActions = actions; // Save for later enable()/disable() calls
        },
        onClick: function(data,actions){
         
          var err_msg = "";
          if(!expire_flag){
              err_msg = "Time is already expired";
          }
          else if(login_flag!="1"){
              err_msg = "Please login first";
          }

          if (err_msg!=""){
            swal("Info",err_msg,"info");
          }
          else{
            paypalActions.enable();
          }
        },


        // Enable Pay Now checkout flow (optional)
        commit: true,

        // Set up a payment
        payment: function(data, actions) {
            var value = parseFloat(total_price);
             return actions.payment.create({
              transactions: [{
                amount: {
                  total: value,
                  currency: 'GBP',
                }
              }]
            });
         
        },
        // Execute the payment
        onAuthorize: function(data, actions) {
          return actions.payment.execute().then(function() {
            var p_count = $("#select_bid_amount").val();

            $.ajax({
              url:"../api/ajax.php",
              data: { 
                  request:'buy_raffle',
                  id:id,
                  user_id:user_id,
                  price:price,
                  buy_amount:p_count
                 },
              async:false,
              type: 'post',
              success: function(re)
              {
                console.log(re);
                var result = JSON.parse(re);
                if(result['status']=="200"){
                    swal("Success","Successfully buyed","success");
                }
              }
        });  
          });
        }
      }, '#paypal-button');