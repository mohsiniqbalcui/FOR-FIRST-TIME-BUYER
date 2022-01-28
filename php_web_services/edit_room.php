<?php $page_title="Edit Room";

include("includes/header.php");
require("language/language.php");

require_once("thumbnail_images.class.php");
  
  // Get all rooms
  if(isset($_GET['room_id']))
  {
       
      $qry="SELECT * FROM tbl_rooms WHERE id='".$_GET['room_id']."'";
      $result=mysqli_query($mysqli,$qry);
      $row=mysqli_fetch_assoc($result);

      //Gallery Images
      $qry1="SELECT * FROM tbl_room_gallery WHERE room_id='".$_GET['room_id']."'";
      $result1=mysqli_query($mysqli,$qry1);
       
  }
	 // Get room update start
	if(isset($_POST['submit']))
	{
	    
     if($_FILES['room_image']['name']!="")
     {
        
         $file_name= str_replace(" ","-",$_FILES['room_image']['name']);

         $room_image=rand(0,99999)."_".$file_name;
           
         //Main Image
         $tpath1='images/'.$room_image;        
         $pic1=compress_image($_FILES["room_image"]["tmp_name"], $tpath1, 80);
       
         //Thumb Image 
         $thumbpath='images/thumbs/'.$room_image;   
         $thumb_pic1=compress_image($_FILES["room_image"]["tmp_name"], $thumbpath, 50);   
 
       $data = array( 
         'room_name'  =>  cleanInput($_POST['room_name']),
         'room_description'  =>  trim($_POST['room_description']),
         'room_rules'  => trim($_POST['room_rules']),
         'room_amenities'  =>  trim($_POST['room_amenities']),
         'room_price'  =>  cleanInput($_POST['room_price']),          
         'room_image'  =>  $room_image
          );    

     }
     else
     {
           $data = array( 
         'room_name'  =>  cleanInput($_POST['room_name']),
         'room_description'  => trim($_POST['room_description']),
         'room_rules'  => trim($_POST['room_rules']),
         'room_amenities'  => trim($_POST['room_amenities']),
         'room_price'  =>  $_POST['room_price'] 
          );   
     }   
	   
    $room_edit=Update('tbl_rooms', $data, "WHERE id = '".$_POST['room_id']."'");

    $room_id=$_POST['room_id'];

    $size_sum = array_sum($_FILES['room_gallery_image']['size']);
     
    if($size_sum > 0)
     {  
        for ($i = 0; $i < count($_FILES['room_gallery_image']['name']); $i++) 
        {
             $file_name1= str_replace(" ","-",$_FILES['room_gallery_image']['name'][$i]);

             $room_gallery_image=rand(0,99999)."_".$file_name1;
           
             //Main Image
             $tpath1='images/gallery/'.$room_gallery_image;       
             $pic1=compress_image($_FILES["room_gallery_image"]["tmp_name"][$i], $tpath1, 80);

              $data1 = array(
                  'room_id'=>$room_id,
                  'image_name'  => $room_gallery_image                         
                  );      

              $qry1 = Insert('tbl_room_gallery',$data1); 

        }
      }
      	 $_SESSION['msg']="11";
	     if(isset($_GET['redirect'])){
          header("Location:".$_GET['redirect']);
        }
        else{
		header( "Location:edit_room.php?room_id=".$_POST['room_id']);
        }
        exit; 
	}
  // Get update room end

?>
<link rel="stylesheet" type="text/css" href="assets/bootstrap-tag/bootstrap-tagsinput.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
 
<div class="row">
      <div class="col-md-12">
      	<?php
          if(isset($_SERVER['HTTP_REFERER']))
          {
            echo '<a href="'.$_SERVER['HTTP_REFERER'].'"><h4 class="pull-left" style="font-size: 20px;color: #e91e63"><i class="fa fa-arrow-left"></i> Back</h4></a>';
          }
         ?>
        <div class="card">
          <div class="page_title_block">
            <div class="col-md-5 col-xs-12">
              <div class="page_title"><?=$page_title?></div>
            </div>
          </div>
          <div class="clearfix"></div>
         
          <div class="card-body mrg_bottom"> 
            <form action="" name="addeditcategory" id="FormData" method="post" class="form form-horizontal" enctype="multipart/form-data">
              <input  type="hidden" name="room_id" value="<?php echo $_GET['room_id'];?>" />
               <div class="section">
                <div class="section-body">                 
                  <div class="form-group">
                    <label class="col-md-3 control-label">Room Name :-</label>
                    <div class="col-md-6">
                      <input type="text" name="room_name" id="room_name" value="<?php echo $row['room_name'];?>" class="form-control" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-3 control-label">Room Description :-</label>
                    <div class="col-md-6">
                      <textarea name="room_description" id="room_description" class="form-control"><?php echo $row['room_description'];?></textarea>
                       <script>
                    CKEDITOR.replace( 'room_description' ,{
                      filebrowserBrowseUrl : 'filemanager/dialog.php?type=2&editor=ckeditor&fldr=&akey=viaviweb',
                      filebrowserUploadUrl : 'filemanager/dialog.php?type=2&editor=ckeditor&fldr=&akey=viaviweb',
                      filebrowserImageBrowseUrl : 'filemanager/dialog.php?type=1&editor=ckeditor&fldr=&akey=viaviweb'
                    });
                  </script>
                    </div>
                  </div>       
				          <div class="form-group">&nbsp;</div> 
                  <div class="form-group">
                    <label class="col-md-3 control-label">Room Rulse :-</label>
                    <div class="col-md-6">
                      <textarea name="room_rules" id="room_rules" class="form-control" ><?php echo $row['room_rules'];?></textarea>
                       <script>
                    CKEDITOR.replace( 'room_rules' ,{
                      filebrowserBrowseUrl : 'filemanager/dialog.php?type=2&editor=ckeditor&fldr=&akey=viaviweb',
                      filebrowserUploadUrl : 'filemanager/dialog.php?type=2&editor=ckeditor&fldr=&akey=viaviweb',
                      filebrowserImageBrowseUrl : 'filemanager/dialog.php?type=1&editor=ckeditor&fldr=&akey=viaviweb'
                    });
                  </script>
                    </div>
                  </div>
           		 <div class="form-group">&nbsp;</div>
                  <div class="form-group">
                    <label class="col-md-3 control-label">Amenities :- <p class="control-label-help">(eg.Air conditioning,Gym,Internet)</p></label>
                    <div class="col-md-6">
                      <input type="text" value="<?php echo $row['room_amenities'];?>" name="room_amenities" id="room_amenities" class="form-control" data-role="tagsinput">
                    </div>
                  </div>
                  <br>
                  <div class="form-group">
                    <label class="col-md-3 control-label">Price :-</label>
                    <div class="col-md-6">
                      <input type="text" name="room_price" id="room_price" value="<?php echo $row['room_price'];?>" class="form-control">
                    </div>
                  </div>

                  <div class="form-group">&nbsp;</div>
                  <div class="form-group">
                    <label class="col-md-3 control-label">Featured Image :- <p class="control-label-help">(Recommended resolution: 600x400)</p></label>
                    <div class="col-md-6">
                      <div class="fileupload_block">
                        <input type="file" name="room_image" value="" id="fileupload" onchange="return fileValidation()">
                          <?php if($row['room_image']!="") {?>
                         <div class="fileupload_img"><img id="room_image" src="images/<?php echo $row['room_image'];?>" alt="Featured image" style="width: 150px;height: 100px" /></div>
                          <?php }else{ ?>
                          	<img id="room_image" type="image" src="assets/images/landscape.jpg" style="width: 150px;height: 100px" alt="Featured image" />
                          <?php }?>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-3 control-label">&nbsp; </label>
                    <div class="col-md-6">
                     
                    </div>
                  </div><br> 
                   <div class="form-group" id="image_news">
                    <label class="col-md-3 control-label">Gallery Image :-<p class="control-label-help">(Recommended resolution: 600x400 OR width greater than height)</p></label>
                    <div class="col-md-6">
                      <div class="fileupload_block">
                        <div class="col-md-5" style="padding-left: 0px;display:inline-block">
                          <input type="file" name="room_gallery_image[]" value="" id="img" multiple onchange="validateImage()">
                        </div>
                        <div class="col-md-7">
                          <?php
                            while ($row_img=mysqli_fetch_array($result1)) {?>
                              <div class="col-6 col-lg-6 col-sm-6 col-xs-12" style="margin-bottom:20px;">
                                <img src="images/gallery/<?php echo $row_img['image_name'];?>" class="img-responsive">
                                <a href="javascript:void(0)" class="remove_img" data-id="<?php echo $row_img['id'];?>" data-img="<?php echo $row_img['image_name'];?>"><i class="fa fa-close"></i></a>
                              </div>
                            <?php }?>
                        </div>
                      </div>
                    </div>
                  </div>
                 
                 <div class="form-group">&nbsp;</div>
                  <div class="form-group">
                    <div class="col-md-9 col-md-offset-3">
                      <button type="submit" name="submit" class="btn btn-primary">Save</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
        
<?php include("includes/footer.php");?>    

<script type="text/javascript" src="assets/bootstrap-tag/bootstrap-tagsinput.js"></script>
<script type="text/javascript"> 
 // Get rooms image preview
  function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $("input[name='room_image']").next(".fileupload_img").find("img").attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
  }
}
$("input[name='room_image']").on("change",function() { 
  readURL(this);
});

// Remove gallery image start 
$(".remove_img").click(function(e){
  e.preventDefault();
    
   var _id=$(this).data("id");
   var _img=$(this).data("img");

   var element=$(this).parent("div");
    
    confirmDlg = duDialog('Are you sure?', 'All data will be removed which belong to this!', {
    init: true,
    dark: false, 
    buttons: duDialog.OK_CANCEL,
    okText: 'Proceed',
    callbacks: {
      okClick: function(e) {
        $(".dlg-actions").find("button").attr("disabled",true);
        $(".ok-action").html('<i class="fa fa-spinner fa-pulse"></i> Please wait..');
        $.ajax({
          type:'post',
          url:'processData.php',
          dataType:'json',
          data:{'id':_id,'img':_img,'action':'remove_gallery_img'},
          success:function(res){
            location.reload();
          }
        });

      } 
    }
  });
  confirmDlg.show();
});
// Remove gallery image end

$('#room_amenities').tagsinput();

// For image validation start
function fileValidation(){
    var fileInput = document.getElementById('fileupload');
    var filePath = fileInput.value;
    var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
    if(!allowedExtensions.exec(filePath)){
        swal('Please upload file having extensions .jpeg/.jpg/.png only.');
        fileInput.value = '';
        return false;   
    }
}
// For image validation end

// For gallery img validation end
function validateImage() {
    var formData = new FormData();

    var file = document.getElementById("img").files[0];

    formData.append("Filedata", file);
    var t = file.type.split('/').pop().toLowerCase();
    if (t != "jpeg" && t != "jpg" && t != "png") {
        swal('Please select a valid image file');
        document.getElementById("img").value = '';
        return false;
    }

    return true;
}
// For gallery img validation end
</script>