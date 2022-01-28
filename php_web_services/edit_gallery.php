<?php $page_title="Edit Gallery";

include("includes/header.php");
require("language/language.php");

require_once("thumbnail_images.class.php");

  //Get Category
	$cat_qry="SELECT * FROM tbl_category ORDER BY `category_name`";
	$cat_result=mysqli_query($mysqli,$cat_qry); 

	// Get wallpaer
  $qry="SELECT * FROM tbl_wallpaper WHERE `id`='".$_GET['gallery_id']."'";
  $result=mysqli_query($mysqli,$qry);
  $row=mysqli_fetch_assoc($result);
	
	// Get update wallpaper start
	if(isset($_POST['submit']))
	{

    	if($_FILES['wallpaper_image']['name']!="")
        { 

    		   $albumimgnm=rand(0,99999)."_".$_FILES['wallpaper_image']['name'];
       
           //Main Image
           $tpath1='categories/'.$_POST['cat_id'].'/'.$albumimgnm;       
           $pic1=compress_image($_FILES["wallpaper_image"]["tmp_name"], $tpath1, 80);
       
           //Thumb Image 
           $thumbpath='categories/'.$_POST['cat_id'].'/thumbs/'.$albumimgnm;        
           $thumb_pic1=create_thumb_image($tpath1,$thumbpath,'400','400');   
    					   
			       $data = array( 
						    'cat_id'  =>  $_POST['cat_id'],
						    'image'  =>  $albumimgnm
						    );		

    		 		 
             $qry=Update('tbl_wallpaper', $data, "WHERE id = '".$_POST['gallery_id']."'");
         }
         $_SESSION['msg']="11";
	     if(isset($_GET['redirect'])){
          header("Location:".$_GET['redirect']);
        }
        else{
					header( "Location:edit_gallery.php?gallery_id=".$_POST['gallery_id']);
        }
        exit; 
	}
	// Get update wallpaper end
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
              <div class="page_title"><?=$page_title?></div>
            </div>
          </div>
          <div class="clearfix"></div>
          <div class="card-body mrg_bottom"> 
            <form action="" name="addeditcategory" method="post" class="form form-horizontal" enctype="multipart/form-data">
              <input  type="hidden" name="gallery_id" value="<?php echo $_GET['gallery_id'];?>" />
		              <div class="section">
		                <div class="section-body">
		                   <div class="form-group">
		                    <label class="col-md-3 control-label">Category :-</label>
		                    <div class="col-md-6">
		                      <select name="cat_id" id="cat_id" class="select2">
		                        <option value="">--Select Category--</option>
		          							<?php while($cat_row=mysqli_fetch_array($cat_result)){ ?>          						 
      									
      													<option value="<?php echo $cat_row['cid'];?>" <?php if($cat_row['cid']==$row['cat_id']){?>selected<?php }?>><?php echo $cat_row['category_name'];?></option>	          							 
		          						<?php }?>
		                      </select>
		                    </div>
		                  </div>
                 			<div class="form-group">
		                    <label class="col-md-3 control-label">Gallery Image :-
		                      <p class="control-label-help">(Recommended resolution: 600x600)</p>
		                    </label>
		                    <div class="col-md-6">
		                      <div class="fileupload_block">
		                        <input type="file" name="wallpaper_image" id="fileupload" onchange="return fileValidation()">
		                          <?php if($row['image']!="") {?>
		                            <div class="fileupload_img"><img id="wallpaper_image" src="categories/<?php echo $row['cat_id'];?>/thumbs/<?php echo $row['image'];?>" alt="image" style="width: 150px;height: 100px"/></div>
		                          <?php } ?>
		                           
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
	
// Get gallery img preview start
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $("input[name='wallpaper_image']").next(".fileupload_img").find("img").attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
  }
}
$("input[name='wallpaper_image']").on("change",function() { 
  readURL(this);
});
// Get gallery img preview end


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