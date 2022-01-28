<?php $page_title="Add Gallery";

include("includes/header.php");
require("language/language.php");

// Get category list
$cat_qry="SELECT * FROM tbl_category ORDER BY `category_name`";
$cat_result=mysqli_query($mysqli,$cat_qry); 

// Get all gallery image start
if(isset($_POST['submit']))
{

	$count = count($_FILES['wallpaper_image']['name']);
	for($i=0;$i<$count;$i++)
	{ 
		
		$albumimgnm=rand(0,99999)."_".$_FILES['wallpaper_image']['name'][$i];

    //Main Image
		$tpath1='categories/'.$_POST['cat_id'].'/'.$albumimgnm;			 
		$pic1=compress_image($_FILES["wallpaper_image"]["tmp_name"][$i], $tpath1, 80);

	  //Thumb Image 
		$thumbpath='categories/'.$_POST['cat_id'].'/thumbs/'.$albumimgnm;				
		$thumb_pic1=create_thumb_image($tpath1,$thumbpath,'400','400');   			

		$date=date('Y-m-j');								

		$data = array( 
			'cat_id'  =>  $_POST['cat_id'],
			'image_date'  =>  $date,
			'image'  =>  $albumimgnm
		);		

		$qry = Insert('tbl_wallpaper',$data);	

	}			

	$_SESSION['msg']="10";
	header( "Location:manage_gallery.php");
	exit;	
}
// Get all gallery image end
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
				<div class="section">
					<div class="section-body">
						<div class="form-group">
						  <label class="col-md-3 control-label">Category :-</label>
							<div class="col-md-6">
								<select name="cat_id" id="cat_id" class="select2" required>
								 <option value="">--Select Category--</option>
									<?php while($cat_row=mysqli_fetch_array($cat_result)){?>
										<option value="<?php echo $cat_row['cid'];?>"><?php echo $cat_row['category_name'];?></option>
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
									<input type="file" name="wallpaper_image[]" value="" id="fileupload" multiple required onchange="return fileValidation()">
									<div class="fileupload_img"><img type="image" src="assets/images/landscape.jpg" alt="category image" /></div>
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