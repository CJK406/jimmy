var auction_data;
var max_bid_amount = 0;
var expire_flag=true;
get_auction_by_id();
get_biders();
function get_auction_by_id(){
    $.ajax({
          url:"../api/ajax.php",
          data: { 
              request:'get_auction_by_id',
              id:id
             },
          async:false,
          type: 'post',
          success: function(re) 
          {
            var result = JSON.parse(re);
            if(result['status']=="200"){
              auction_data = result['data'];
              images = JSON.parse(result['data']['image']);
              var image_gallery_string = "";
              for(var i=0; i<images.length; i++){
                image_gallery_string+=`<li data-thumb="../api/upload/auction/`+id+`/`+images[i]+`"> 
                                            <img style="width:100%" src="../api/upload/auction/`+id+`/`+images[i]+`" />
                                       </li>`;
              }
              $("#terms_text").html(result['data']['terms']);
              $("#desc_text").html(result['data']['description']);
              $("#delivery_text").html(result['data']['delivery']);
              $("#image-gallery").html(image_gallery_string);

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

function get_biders(){
    $.ajax({
          url:"../api/ajax.php",
          data: { 
              request:'get_biders',
              id:id
             },
          async:false,
          type: 'post',
          success: function(re) 
          {
            var result = JSON.parse(re);
            console.log(result);
            if(result['status']=="200"){
                $(".bid_count").html(result['data'].length+" bids");
                var string = "";
                for(var i=0; i<result['data'].length; i++){
                    string +=`<div>
                                <p id="bid_amount_modal">£`+result['data'][i]['bid_amount']+`</p>
                                <p id="bid_time">`+result['data'][i]['bid_time']+`</p>
                            </div>`;
                    if(max_bid_amount<result['data'][i]['bid_amount'])
                        max_bid_amount=result['data'][i]['bid_amount'];
                }

                $("#current_bids_div").html(string);
                $("#max_current_bid_amount").html(`£`+max_bid_amount+``);
                var placeholder_value = parseInt(max_bid_amount) + 1
                $("#input_bid_amount").attr('placeholder',`£`+placeholder_value+``);
                $("#bid_amount_desc").html('Enter £'+placeholder_value+' or more')
            }
            else{
                max_bid_amount = auction_data['init_price'];
                var placeholder_value = parseInt(auction_data['init_price']) + 1

                $(".bid_count").html("0 bids");
                $("#max_current_bid_amount").html(`£`+auction_data['init_price']+``);
                $("#input_bid_amount").attr('placeholder',`£`+placeholder_value+``);
                $("#bid_amount_desc").html('Enter £'+placeholder_value+' or more')
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

$("#bid_status").click(function(){
    $("#bid_status_modal").modal('show');
});


$(".bid_button").click(function(){
    var bid_amount = $("#input_bid_amount").val();
    var err_msg = "";
    if(login_flag!="1")
    {
        err_msg= "You need to login first";
    }
    else if(bid_amount<=max_bid_amount)
        err_msg = "Current bid amount is "+max_bid_amount+". Please input bigger amount than current bid amount.";
    else if(bid_amount=="" || bid_amount==0){
        err_msg = "Please input bid amount";
    }
    else if(!expire_flag){
        err_msg = "Time is already expired";
    }
    
    if(err_msg!="")
        swal("Error",err_msg,"error");
    else{
           $.ajax({
              url:"../api/ajax.php",
              data: { 
                  request:'save_bid',
                  id:id,
                  user_id:user_id,
                  bid_amount:bid_amount,
                 },
              async:false,
              type: 'post',
              success: function(re) 
              {
                var result = JSON.parse(re);
                if(result['status']=="200"){
                    swal("Success","Successfully submit your bid","success");
                    get_auction_by_id();
                    get_biders();
                }
              }
        });     
    }
});

function get_max_amount (data){

}
