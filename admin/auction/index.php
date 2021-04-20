<?php 
	require('../header.php');
?>
<div class="page-content">
	 <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="float-right">
                        <button class="btn btn-primary btn_add">Add</button>
                    </div>
                    <h4 class="page-title">Auction List</h4>
                </div><!--end page-title-box-->
            </div><!--end col-->
        </div>
        <!-- end page title end breadcrumb -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                            	<th>Image</th>
                                <th>Auction Name</th>
                                <th>Description</th>
                                <th>Delivery</th>
                                <th>Terms</th>
                                <th>Init Price</th>
                                <th>Create Time</th>
                                <th>End Time</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            	
                            </tbody>
                        </table>        
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->  

    </div><!-- container -->
</div>
<div class="modal" id="create_modal" tabindex="-1"  >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create Auction</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<div class="form-group">
      		<label for="c_auction_name">Name:</label>
      		<input class="form-control" id="c_name" />
      	</div>

      	<div class="form-group">
      		<label for="c_desc">Description</label>
      		<textarea class="form-control" id="c_desc"></textarea>
      	</div>

      	<div class="form-group">
      		<label for="c_delivery">Delivery</label>
      		<textarea class="form-control" id="c_delivery"></textarea>
      	</div>

      	<div class="form-group">
      		<label for="c_terms">Terms</label>
      		<textarea class="form-control" id="c_terms"></textarea>
      	</div> 

      	<div class="form-group">
      		<label for="c_terms">Init Price</label>
      		<input class="form-control" type="price" id="c_price"></input>
      	</div> 

      	<div class="form-group">
      		<label for="c_endtime">End Time:</label>
      		<input class="form-control" id="c_endtime" type="datetime-local" />
      	</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success btn_create_modal">Create</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>

<div class="modal" id="edit_modal" tabindex="2"  >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Auction</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<div class="form-group">
      		<label for="e_auction_name">Name:</label>
      		<input class="form-control" id="e_name" />
      	</div>

      	<div class="form-group">
      		<label for="e_desc">Description</label>
      		<textarea class="form-control" id="e_desc"></textarea>
      	</div>

      	<div class="form-group">
      		<label for="e_delivery">Delivery</label>
      		<textarea class="form-control" id="e_delivery"></textarea>
      	</div>

      	<div class="form-group">
      		<label for="e_terms">Terms</label>
      		<textarea class="form-control" id="e_terms"></textarea>
      	</div> 

      	<div class="form-group">
      		<label for="e_terms">Init Price</label>
      		<input class="form-control" type="number" id="e_price"></input>
      	</div> 

      	<div class="form-group">
      		<label for="e_endtime">End Time:</label>
      		<input class="form-control" id="e_endtime" type="datetime-local" />
      	</div>
      	<input type="hidden" id="hidden_edit_id">
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-success btn_update_modal">Update</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>


<?php
require('../footer.php');
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
					 string+=`<tr>
                		<td>
                			<img src="`+first_image+`" style="width:100%; border-radius: 10px; width:50px">
                		</td>
                		<td>`+data[i]['auction_name']+`</td>
                		<td>`+data[i]['description']+`</td>
                		<td>`+data[i]['delivery']+`</td>
                		<td>`+data[i]['terms']+`</td>
                		<td>`+data[i]['init_price']+`</td>
                		<td>`+data[i]['create_time']+`</td>
                		<td>`+data[i]['end_time']+`</td>
                    <td><a href="manage_biders.php?id=`+data[i]['id']+`&n=`+data[i]['auction_name']+`">`+data[i]['bid_count']+` bids</a></td>
                		<td>
                			<button class="btn btn-primary edit_btn" id="`+data[i]['id']+`" index="`+i+`"><i style="color:white" class="far fa-edit"></i></button>
                    	    <button class="btn btn-danger remove_btn" id="`+data[i]['id']+`"><i class="far fa-trash-alt"></i></button>
                    	    <a href="manage_images.php?id=`+data[i]['id']+`"><button class="btn btn-success"><i class="fa fa-upload"></i></button></a>
                    	</td>
                	</tr>`;
				}
				$("tbody").html(string);
	        }
	        else{
	        }
	      }
	    }); 
	}
	
    $(".btn_add").click(function(){
    	$("#create_modal").modal('show');
    });
    $('body').on('click', '.edit_btn', function () {
    	$("#edit_modal").modal('show');
    	var index = $(this).attr('index');
    	var id = $(this).attr('id');
    	$("#hidden_edit_id").val(id);
    	$("#e_name").val(auctions[index]['auction_name']);
    	$("#e_desc").val(auctions[index]['description']);
    	$("#e_delivery").val(auctions[index]['delivery']);
    	$("#e_terms").val(auctions[index]['terms']);
    	$("#e_price").val(auctions[index]['init_price']);

		var dateVal = new Date(auctions[index]['end_time']);
        var day = dateVal.getDate().toString().padStart(2, "0");
        var month = (1 + dateVal.getMonth()).toString().padStart(2, "0");
        var hour = dateVal.getHours().toString().padStart(2, "0");
        var minute = dateVal.getMinutes().toString().padStart(2, "0");
        var sec = dateVal.getSeconds().toString().padStart(2, "0");
        var ms = dateVal.getMilliseconds().toString().padStart(3, "0");
        var inputDate = dateVal.getFullYear() + "-" + (month) + "-" + (day) + "T" + (hour) + ":" + (minute) + ":" + (sec) + "." + (ms);
        $("#e_endtime").val(inputDate);

    });

    $(".btn_create_modal").click(function(){
    	var name = $("#c_name").val();
    	var desc = $("#c_desc").val();
    	var delivery = $("#c_delivery").val();
    	var terms = $("#c_terms").val();
    	var price = $("#c_price").val();
    	var endtime = $("#c_endtime").val();
    	if(name!="" && endtime!=""){
    		$.ajax({
		      url:"<?php echo $site_url?>api/ajax.php",
		      data: { 
		      		request:'create_auction',
		      		name:name,
		      		desc:desc,
		      		delivery:delivery,
		      		terms:terms,
		      		price:price,
		      		endtime:endtime
		         },
		      type: 'post',
		      success: function(re) 
		      {
		        var result = JSON.parse(re);
		        if(result['status']=="200"){
					swal("Success","Successfully created","success");
    				$("#create_modal").modal('hide');
    				show();

		        }
		        else{

		        }
		      }
		    }); 
    	}
    	else{
    		swal('Error',"Name or endtime is empty","info");
    	}
    });

    $('body').on('click', '.remove_btn', function () {
    	var id = $(this).attr('id');
    	swal({
	        title: 'Are you sure?',
	        text: "You won't be able to remove this!",
	        icon: 'warning',
	        showCancelButton: true,
	        confirmButtonColor: '#3085d6',
	        cancelButtonColor: '#d33',
	        confirmButtonText: 'Yes, delete it!'
	      }).then((result) => {
	      	remove(id);
	          swal(
	            'Deleted!',
	            'The auction has been deleted.',
	            'success'
	          )
	      })
    });
    $(".btn_update_modal").click(function(){
    	var name = $("#e_name").val();
    	var desc = $("#e_desc").val();
    	var delivery = $("#e_delivery").val();
    	var terms = $("#e_terms").val();
    	var price = $("#e_price").val();
    	var endtime = $("#e_endtime").val();
    	var id = $("#hidden_edit_id").val();
    	if(name!="" && endtime!=""){
    		$.ajax({
		      url:"<?php echo $site_url?>api/ajax.php",
		      data: { 
		      		request:'edit_auction',
		      		name:name,
		      		desc:desc,
		      		delivery:delivery,
		      		terms:terms,
		      		price:price,
		      		endtime:endtime,
		      		id:id
		         },
		      type: 'post',
		      success: function(re) 
		      {
		      	console.log(re);
		        var result = JSON.parse(re);
		        if(result['status']=="200"){
					swal("Success","Successfully updated","success");
    				$("#edit_modal").modal('hide');
    				show();

		        }
		        else{

		        }
		      }
		    }); 
    	}
    	else{
    		swal('Error',"Name or endtime is empty","info");
    	}
    });

    function remove(id){
		$.ajax({
	      url:"<?php echo $site_url?>api/ajax.php",
	      data: { 
	      		request:'delete_auction',
	      		id:id
	         },
	      type: 'post',
	      success: function(re) 
	      {
	        var result = JSON.parse(re);
	        if(result['status']=="200"){
				swal("Success","Successfully removed","success");
				show();
	        }
	        else{

	        }
	      }
	    }); 
    }
    
</script>