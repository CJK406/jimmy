$(".select_method_button").click(function(){
	$(".select_method_button").removeClass('selected');
	$(this).addClass("selected");
	var id = $(this).attr('id');
	if(id=="monthly")
		$("#donate_method_text").html("Set up a monthly donation of:");
	else{
		$("#donate_method_text").html("Make a one off donation of:");

	}
})
$(".amount_select_btn").click(function(){
	$(".amount_select_btn").removeClass('selected');
	var value = $(this).attr('id');
	$("#input_donation_amount").val(parseInt(value));
	$(this).addClass("selected");
	donate_value = parseInt(value);
});


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
          // actions.disable(); // Allow for validation in onClick()
          paypalActions = actions; // Save for later enable()/disable() calls
        },
        onClick: function(data,actions){
         
        },


        // Enable Pay Now checkout flow (optional)
        commit: true,

        // Set up a payment
        payment: function(data, actions) {
            var value = parseFloat(donate_value);
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
                  request:'buy_donate',
                  user_id:user_id,
                  price:donate_value,
                 },
              async:false,
              type: 'post',
              success: function(re)
              {
                console.log(re);
                var result = JSON.parse(re);
                if(result['status']=="200"){
                    swal("Success","Successfully donated","success");
                }
              }
        });  
          });
        }
      }, '#paypal-button');


