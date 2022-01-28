<?php $page_title="Hotel Info";

include("includes/header.php");
require("language/language.php");
	 
// Get hotel info
$qry="SELECT * FROM tbl_hotel WHERE `id`='1'";
$result=mysqli_query($mysqli,$qry);
$row=mysqli_fetch_assoc($result);
  
  // Get update hotel info
 if(isset($_POST['submit']))
	{       

		$data=array( 
		    'hotel_name'  => cleanInput($_POST['hotel_name']),
	      'hotel_info'  =>  trim($_POST['hotel_info']),
	      'hotel_address'  =>  cleanInput($_POST['hotel_address']),
	      'hotel_phone'  =>  cleanInput($_POST['hotel_phone']),
	      'hotel_email'  =>  cleanInput($_POST['hotel_email']),
	      'hotel_lat'  =>  cleanInput($_POST['hotel_lat']),
	      'hotel_long'  =>  cleanInput($_POST['hotel_long']),
	      'hotel_amenities'  =>  cleanInput($_POST['hotel_amenities']),
	      'facebook_url'  =>  cleanInput($_POST['facebook_url']),
	      'instagram_url'  =>  cleanInput($_POST['instagram_url']),
	      'twitter_url'  =>  cleanInput($_POST['twitter_url']),
	      'whatsapp_url'  =>  cleanInput($_POST['whatsapp_url']),
	      'youtube_url'  =>  cleanInput($_POST['youtube_url']),
	      'website_url'  =>  cleanInput($_POST['website_url'])

		);
		
		$hotel_edit=Update('tbl_hotel', $data, "WHERE id = '1'"); 
		 
		$_SESSION['msg']="11"; 
		header( "Location:hotel_info.php");
		exit;
		 
	}

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
        <form action="" name="editprofile" method="post" class="form form-horizontal" enctype="multipart/form-data">
          <div class="section">
            <div class="section-body">
              <div class="form-group">
                <label class="col-md-3 control-label">Hotel Name :-</label>
                <div class="col-md-6">
                  <input type="text" name="hotel_name" id="hotel_name" value="<?php echo $row['hotel_name'];?>" class="form-control" required autocomplete="off">
                </div>
              </div>
               <div class="form-group">
                <label class="col-md-3 control-label">Hotel Address :-</label>
                <div class="col-md-6">
                  <input type="text" name="hotel_address" id="hotel_address" value="<?php echo $row['hotel_address'];?>" class="form-control" required autocomplete="off">
                </div>
              </div>
               <div class="form-group">
                <label class="col-md-3 control-label">Hotel Email :-</label>
                <div class="col-md-6">
                  <input type="text" name="hotel_email" id="hotel_email" value="<?php echo $row['hotel_email'];?>" class="form-control" required autocomplete="off">
                </div>
              </div>
               <div class="form-group">
                <label class="col-md-3 control-label">Hotel Phone :-</label>
                <div class="col-md-6">
                  <input type="text" name="hotel_phone" id="hotel_phone" value="<?php echo $row['hotel_phone'];?>" class="form-control" required autocomplete="off">
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-3 control-label">Hotel Latitude :-</label>
                <div class="col-md-6">
                  <input type="text" name="hotel_lat" id="hotel_lat" value="<?php echo $row['hotel_lat'];?>" class="form-control" required autocomplete="off">
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-3 control-label">Hotel Longitude :-</label>
                <div class="col-md-6">
                  <input type="text" name="hotel_long" id="hotel_long" value="<?php echo $row['hotel_long'];?>" class="form-control" required autocomplete="off">
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-3 control-label">&nbsp;</label>
                <div class="col-md-6">
                  Get Latitude and Longitude <a href="http://www.latlong.net" target="_blank">Here!</a>
                </div>
              </div> 
              <div class="form-group">&nbsp;</div> 
                  <div class="form-group">
                    <label class="col-md-3 control-label">Hotel Description :-</label>
                    <div class="col-md-6">
                      <textarea name="hotel_info" id="hotel_info" class="form-control" ><?php echo $row['hotel_info'];?></textarea>
                       <script>
                    CKEDITOR.replace( 'hotel_info' ,{
                      filebrowserBrowseUrl : 'filemanager/dialog.php?type=2&editor=ckeditor&fldr=&akey=viaviweb',
                      filebrowserUploadUrl : 'filemanager/dialog.php?type=2&editor=ckeditor&fldr=&akey=viaviweb',
                      filebrowserImageBrowseUrl : 'filemanager/dialog.php?type=1&editor=ckeditor&fldr=&akey=viaviweb'
                    });
                  </script>
                    </div>
                  </div>
                   <br>
                <div class="form-group">
                <label class="col-md-3 control-label">Hotel Amenities:- <p class="control-label-help">(Air conditioning,Gym..)</p></label>
                <div class="col-md-6">
                  <input  name="hotel_amenities" id="hotel_amenities" value="<?php echo $row['hotel_amenities'];?>" data-role="tagsinput" class="form-control">
                </div>
              </div>
              <br/>
               <div class="form-group">
                <label class="col-md-3 control-label">Facebook URL :-</label>
                <div class="col-md-6">
                  <input type="text" name="facebook_url" id="facebook_url" value="<?php echo $row['facebook_url'];?>" class="form-control" required autocomplete="off">
                </div>
              </div>
               <div class="form-group">
                <label class="col-md-3 control-label">Instagram URL :-</label>
                <div class="col-md-6">
                  <input type="text" name="instagram_url" id="instagram_url" value="<?php echo $row['instagram_url'];?>" class="form-control" required autocomplete="off">
                </div>
              </div>
               <div class="form-group">
                <label class="col-md-3 control-label">Twitter URL :-</label>
                <div class="col-md-6">
                  <input type="text" name="twitter_url" id="twitter_url" value="<?php echo $row['twitter_url'];?>" class="form-control" required autocomplete="off">
                </div>
              </div>
               <div class="form-group">
                <label class="col-md-3 control-label">Whatsapp URL :-</label>
                <div class="col-md-6">
                  <input type="text" name="whatsapp_url" id="whatsapp_url" value="<?php echo $row['whatsapp_url'];?>" class="form-control" required autocomplete="off">
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-3 control-label">Youtube URL :-</label>
                <div class="col-md-6">
                  <input type="text" name="youtube_url" id="youtube_url" value="<?php echo $row['youtube_url'];?>" class="form-control" required autocomplete="off">
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-3 control-label">Website URL :-</label>
                <div class="col-md-6">
                  <input type="text" name="website_url" id="website_url" value="<?php echo $row['website_url'];?>" class="form-control" required autocomplete="off">
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

<script type="text/javascript" src="assets/bootstrap-tag/bootstrap-tagsinput.js"></script>
<script type="text/javascript">
  // Get hotel amenities
  $('#hotel_amenities').tagsinput();
</script>
