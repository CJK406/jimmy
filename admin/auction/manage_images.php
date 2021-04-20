<?php 
	require('../header.php');
  $id = $_GET['id'];
?>
<link href="../../assets/css/manage_image.css" rel="stylesheet" />

<div class="page-content">
	 <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                  <div class="float-right">
                    <div class="fileUpload">
                        <input type="file" class="upload input-file" id="edit_avatar_image_change"/>
                        <span>Add +</span>
                    </div>
                    </div>
                    <h4 class="page-title">Auction Images</h4>
                </div><!--end page-title-box-->
            </div><!--end col-->
        </div>
        <!-- end page title end breadcrumb -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body row">
                     
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->  

    </div><!-- container -->
</div>
<div id="uploadimageModal" class="modal" role="dialog">
    <div class="modal-dialog" >
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Upload & Crop Image</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="row" style="overflow: auto; justify-content: center; align-self: center">
                    <div class="col-md-8 text-center">
                          <div id="image_demo" style="width:650px; margin-top:30px"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success crop_image" >Crop & Upload Image</button>
            </div>
        </div>
    </div>
</div>

<?php
require('../footer.php');
?>
<script src="../../assets/js/croppie.js"></script> 

<script type="text/javascript">
  var id = <?php echo $id?>;
  var images = [];
  $.ajax({
      url:"<?php echo $site_url?>api/ajax.php",
      data: { 
          request:'get_auction_by_id',
          id:id
         },
      type: 'post',
      success: function(re) 
      {
        var result = JSON.parse(re);
        if(result['status']=="200"){
          images = JSON.parse(result['data']['image']);
          show_images();
        }
        else{
        }
      }
    }); 

    $('body').on('click', '.btn_remove_image', function () {
      var file_name = $(this).attr("file_name");
      var index = $(this).attr("index");
      images = jQuery.grep(images, function(value) {
        return value != file_name;
      });
      swal({
        title: 'Are you sure?',
        text: "You won't be able to remove this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
          save_image();
          show_images();
          swal(
            'Deleted!',
            'Your file has been deleted.',
            'success'
          )
      })
    });

    $image_crop = $('#image_demo').croppie({
      enableExif: true,
      viewport: {
        width:500,
        height:500,
        type:'square' //circle
      },
      boundary:{
        width:550,
        height:550
      }
    });
  function b64toBlob(b64Data, contentType, sliceSize) {
          contentType = contentType || '';
          sliceSize = sliceSize || 512;

          var byteCharacters = atob(b64Data);
          var byteArrays = [];

          for (var offset = 0; offset < byteCharacters.length; offset += sliceSize) {
              var slice = byteCharacters.slice(offset, offset + sliceSize);

              var byteNumbers = new Array(slice.length);
              for (var i = 0; i < slice.length; i++) {
                  byteNumbers[i] = slice.charCodeAt(i);
              }

              var byteArray = new Uint8Array(byteNumbers);

              byteArrays.push(byteArray);
          }

        var blob = new Blob(byteArrays, {type: contentType});
        return blob;
  }
    $('body').on('change', '.input-file', function (e) {
      var reader = new FileReader();
      reader.onload = function (event) {
        $image_crop.croppie('bind', {
          url: event.target.result
        }).then(function(){
          console.log('jQuery bind complete');
        });
      }
      reader.readAsDataURL(this.files[0]);
      $('#uploadimageModal').modal('show');
    });



    $('.crop_image').click(function(event){
       $(".loading-gif").css("display","block");
        $image_crop.croppie('result', {
          type: 'canvas',
          size: 'viewport'
        }).then(function(response){
          var ImageURL = response;
          // Split the base64 string in data and contentType
          var block = ImageURL.split(";");
          // Get the content type of the image
          var contentType = block[0].split(":")[1];// In this case "image/gif"
          // get the real base64 content of the file
          var realData = block[1].split(",")[1];// In this case "R0lGODlhPQBEAPeoAJosM...."

          // Convert it to a blob to upload
          var blob = b64toBlob(realData, contentType);

          var formdata = new FormData();
           var tmppath = URL.createObjectURL(blob);
           var filename = blob.name;
            formdata.append("fileToUpload", blob);
            formdata.append("id", id);
            $("#uploadimageModal").modal('hide');
              jQuery.ajax({
                  url:"<?php echo $site_url?>api/upload/auction/upload.php",
                  data: formdata,
                  processData: false,
                  contentType: false,
                  type: 'post',
                  success: function(result) 
                  {
                     $(".loading-gif").css("display","none");
                     var result1 = JSON.parse(result);
                     if(result1['status']=="200"){
                      images.push(result1['filename']);
                      save_image();  
                      show_images();
                      swal("Success","Successfully added.","success");              
                    }
                  }
              });
        })
      });

    function save_image(){
      $.ajax({
        url:"<?php echo $site_url?>api/ajax.php",
        data: { 
            request:'save_auction_image',
            id:id,
            images:JSON.stringify(images)
           },
        type: 'post',
        success: function(re) 
        {
        }
      }); 
    }

  function show_images(){
    var string = "";
    for(var i=0; i<images.length; i++){
      string +=`<div class="col-md-3" id="image_div_`+i+`" style="text-align: center; margin-bottom:20px">
                    <img src="../../api/upload/auction/`+id+`/`+images[i]+`" style="width: 100%; border-radius: 10px; min-height:220px">
                    <button style="margin-top:10px" index="`+i+`" file_name = '`+images[i]+`' class="btn btn-danger btn_remove_image"><i class="far fa-trash-alt"></i></button>
                  </div>`;
    }
    $(".card-body").html(string);
  }
</script>