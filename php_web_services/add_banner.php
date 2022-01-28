<?php $page_title="Add Banner";

include("includes/header.php");
require("language/language.php");

require_once("thumbnail_images.class.php");

	// Get add banner start
	if(isset($_POST['submit']) AND isset($_GET['add']))
	{
	
	    $banner_image=rand(0,99999)."_".$_FILES['banner_image']['name'];
		 	 
      //Main Image
	    $tpath1='images/'.$banner_image; 			 
      $pic1=compress_image($_FILES["banner_image"]["tmp_name"], $tpath1, 80);
	 
		  //Thumb Image 
	    $thumbpath='images/thumbs/'.$banner_image;		
      $thumb_pic1=create_thumb_image($tpath1,$thumbpath,'200','200');   
 
       $data = array( 
			    'banner_image'  =>  $banner_image
			  );		

 		$qry = Insert('tbl_home_banner',$data);	
 	   
		$_SESSION['msg']="10"; 
		header( "Location:manage_home_banner.php");
		exit;	

	}
	
	// Get banner list
	if(isset($_GET['banner_id']))
	{
			 
			$qry="SELECT * FROM tbl_home_banner WHERE `id`='".$_GET['banner_id']."'";
			$result=mysqli_query($mysqli,$qry);
			$row=mysqli_fetch_assoc($result);

	}

	// Get update banner start
	if(isset($_POST['submit']) AND isset($_POST['banner_id']))
	{
		 
		 if($_FILES['banner_image']['name']!="")
		 {		
		 			// remove old banner image
			   if($row['banner_image']!="")
		        {
							unlink('images/thumbs/'.$row['banner_image']);
							unlink('images/'.$row['banner_image']);
			     }

 				     $banner_image=rand(0,99999)."_".$_FILES['banner_image']['name'];
		 	 
			       //Main Image
				     $tpath1='images/'.$banner_image; 			 
			       $pic1=compress_image($_FILES["banner_image"]["tmp_name"], $tpath1, 80);
				 
					   //Thumb Image 
				     $thumbpath='images/thumbs/'.$banner_image;		
			       $thumb_pic1=create_thumb_image($tpath1,$thumbpath,'200','200');

             $data = array(
					    'banner_image'  =>  $banner_image
						);

					$category_edit=Update('tbl_home_banner', $data, "WHERE id = '".$_POST['banner_id']."'");
		 }

		  $_SESSION['msg']="11";
	     if(isset($_GET['redirect'])){
          header("Location:".$_GET['redirect']);
        }
        else{
				header( "Location:add_banner.php?banner_id=".$_POST['banner_id']);
        }
        exit; 
		     
	}

?>
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
              <div class="page_title"><?php if(isset($_GET['banner_id'])){?>Edit<?php }else{?>Add<?php }?> Banner</div>
            </div>
          </div>
          <div class="clearfix"></div>
          
          <div class="card-body mrg_bottom"> 
            <form action="" name="addeditcategory" method="post" class="form form-horizontal" enctype="multipart/form-data">
            	<input  type="hidden" name="banner_id" value="<?php if(isset($_GET['banner_id'])){echo $_GET['banner_id'];}?>" />
            	
              <div class="section">
                <div class="section-body">
                                    
                  <div class="form-group">
                    <label class="col-md-3 control-label">Bannel Image :- <p class="control-label-help">(Recommended resolution: 600x400)</p></label>

                    <div class="col-md-6">
                      <div class="fileupload_block">
                        <input type="file" name="banner_image" value="fileupload" id="fileupload" <?php if(!isset($_GET['banner_id'])) {?>required<?php }?> onchange="return fileValidation()">
                            <?php if(isset($_GET['banner_id']) and $row['banner_image']!="") {?>
                        	  <div class="fileupload_img"><img  id="banner_image" type="image" src="images/<?php echo $row['banner_image'];?>" alt="banner image" style="width: 150px;height: 100px"/></div>
                        	<?php } else {?>
                        	  <div class="fileupload_img"><img id="banner_image" type="image" src="assets/images/landscape.jpg" alt="banner image" style="width: 150px;height: 100px"/></div>
                        	<?php }?>
                      </div>
                    </div>
                  </div>
                   
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

<script type="text/javascript">

// Get banner image preview start
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $("input[name='banner_image']").next(".fileupload_img").find("img").attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
  }
}
$("input[name='banner_image']").on("change",function() { 
  readURL(this);
});
// Get banner image preview end

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

</script>