<?php $page_title="Settings"; 

include("includes/header.php");
require("language/language.php");

// Get settings
$qry = "SELECT * FROM tbl_settings WHERE `id`='1'";
$result = mysqli_query($mysqli, $qry);
$settings_row = mysqli_fetch_assoc($result);

// Get app settings
if (isset($_POST['submit'])) {

	$img_res = mysqli_query($mysqli, "SELECT * FROM tbl_settings WHERE id='1'");
	$img_row = mysqli_fetch_assoc($img_res);

	if ($_FILES['app_logo']['name'] != "") {

		unlink('images/' . $img_row['app_logo']);

		$app_logo = $_FILES['app_logo']['name'];
		$pic1 = $_FILES['app_logo']['tmp_name'];

		$tpath1 = 'images/' . $app_logo;
		copy($pic1, $tpath1);


		$data = array(
			'app_name'  =>  cleanInput($_POST['app_name']),
			'app_logo'  =>  $app_logo,
			'app_description'  => trim($_POST['app_description']),
			'app_version'  =>  cleanInput($_POST['app_version']),
			'app_author'  =>  cleanInput($_POST['app_author']),
			'app_contact'  =>  cleanInput($_POST['app_contact']),
			'app_email'  =>  cleanInput($_POST['app_email']),
			'app_website'  =>  cleanInput($_POST['app_website']),
			'app_developed_by'  =>  cleanInput($_POST['app_developed_by'])

		);
	} else {

		$data = array(
			'app_name'  =>  cleanInput($_POST['app_name']),
			'app_description'  => trim($_POST['app_description']),
			'app_version'  =>  cleanInput($_POST['app_version']),
			'app_author'  =>  cleanInput($_POST['app_author']),
			'app_contact'  =>  cleanInput($_POST['app_contact']),
			'app_email'  =>  cleanInput($_POST['app_email']),
			'app_website'  =>  cleanInput($_POST['app_website']),
			'app_developed_by'  =>  cleanInput($_POST['app_developed_by'])


		);
	}

	$settings_edit = Update('tbl_settings', $data, "WHERE id = '1'");

	$_SESSION['msg'] = "11";
	header("Location:settings.php");
	exit;

} 
// Get admob 
else if (isset($_POST['admob_submit'])) {

	$data = array(
			'publisher_id'  =>  cleanInput($_POST['publisher_id']),
			'interstital_ad'  => ($_POST['interstital_ad']) ? 'true' : 'false',
			'interstital_ad_id'  =>  cleanInput($_POST['interstital_ad_id']),
			'interstital_ad_click'  =>  cleanInput($_POST['interstital_ad_click']),
			'facebook_interstital_ad_id'  =>  cleanInput($_POST['facebook_interstital_ad_id']),
	    'interstital_ad_type'  => cleanInput ($_POST['interstital_ad_type']),
	    'banner_ad_type'  => cleanInput($_POST['banner_ad_type']),
			'banner_ad'  => ($_POST['banner_ad']) ? 'true' : 'false',
			'banner_ad_id'  =>  ($_POST['banner_ad_id']),
	    'facebook_banner_ad_id'  =>  cleanInput($_POST['facebook_banner_ad_id'])
	);

	$settings_edit = Update('tbl_settings', $data, "WHERE id = '1'");

	$_SESSION['msg'] = "11";
	header("Location:settings.php");
	exit;

} 
// Get app privacy policy	
else if (isset($_POST['app_pri_poly'])) {

	$data = array(
		'app_privacy_policy'  =>  trim($_POST['app_privacy_policy'])
	);

	$settings_edit = Update('tbl_settings', $data, "WHERE id = '1'");

	$_SESSION['msg'] = "11";
	header("Location:settings.php");
	exit;

} 
// Get app faq
else if (isset($_POST['app_faq_submit'])) {

	$data = array('app_faq'  =>  trim($_POST['app_faq']));

	$settings_edit = Update('tbl_settings', $data, "WHERE id = '1'");


	$_SESSION['msg'] = "11";
	header("Location:settings.php");
	exit;

} 
// Get app update popup
else if (isset($_POST['app_update_popup'])) {

	$data = array(
		'app_update_status'  => ($_POST['app_update_status']) ? 'true' : 'false',
		'app_new_version'  =>  trim($_POST['app_new_version']),
		'app_update_desc'  =>  trim($_POST['app_update_desc']),
		'app_redirect_url'  =>  trim($_POST['app_redirect_url']),
		'cancel_update_status'  => ($_POST['cancel_update_status']) ? 'true' : 'false',
	);

	$settings_edit = Update('tbl_settings', $data, "WHERE id = '1'");

	$_SESSION['msg'] = "11";
	header("Location:settings.php");
	exit;

}
// Get api update
else if(isset($_POST['api_submit']))
    {

      $data = array(

        'api_page_limit'  =>  cleanInput($_POST['api_page_limit']),
        'api_cat_order_by'  =>  cleanInput($_POST['api_cat_order_by']),
        'api_cat_post_order_by'  =>  cleanInput($_POST['api_cat_post_order_by'])
      );


      $settings_edit=Update('tbl_settings', $data, "WHERE id = '1'");

      $_SESSION['msg']="11";
      header( "Location:settings.php");
      exit;

  }
  // Get account delete
 else if(isset($_POST['account_delete'])){

  $data = array(
    'account_delete_intruction'  =>  trim($_POST['account_delete_intruction'])
  );

  $settings_edit=Update('tbl_settings', $data, "WHERE id = '1'");

  $_SESSION['msg'] = "11";
  header( "Location:settings.php");
  exit;
} 
// Get app terms condtion
else if(isset($_POST['app_terms_con'])){

	$data = array(
		'app_terms_conditions'  =>  trim($_POST['app_terms_conditions'])
	);

	$settings_edit=Update('tbl_settings', $data, "WHERE id = '1'");

	$_SESSION['msg']="11";
	header( "Location:settings.php");
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
					<div class="page_title"><?=$page_title?></div>
				</div>
			</div>
			<div class="clearfix"></div>
			
			<div class="card-body mrg_bottom" style="padding: 0px">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active"><a href="#app_settings" aria-controls="app_settings" role="tab" data-toggle="tab">App Settings</a></li>
					<li role="presentation"><a href="#admob_settings" aria-controls="admob_settings" role="tab" data-toggle="tab">Ads Settings</a></li>
					 <li role="presentation"><a href="#api_settings" aria-controls="api_settings" role="tab" data-toggle="tab">API Settings</a></li>
					 <li role="presentation"><a href="#app_terms_cond" aria-controls="app_terms_cond" role="tab" data-toggle="tab">Terms & Condition</a></li>
					 <li role="presentation"><a href="#account_delete" aria-controls="account_delete" role="tab" data-toggle="tab">Delete Account Instructions</a></li>
					<li role="presentation"><a href="#api_privacy_policy" aria-controls="api_privacy_policy" role="tab" data-toggle="tab">App Privacy Policy</a></li>
					<li role="presentation"><a href="#api_faq" name="App FAQ" aria-controls="api_faq" role="tab" data-toggle="tab">App FAQ</a></li>
					<li role="presentation"><a href="#app_update_popup" aria-controls="app_update_popup" role="tab" data-toggle="tab">App Update</a></li>
				</ul>

			 <div class="rows">
         <div class="col-md-12">
				<div class="tab-content">
				<div role="tabpanel" class="tab-pane active" id="app_settings">
					<form action="" name="settings_from" method="post" class="form form-horizontal" enctype="multipart/form-data">
						<div class="section">
							<div class="section-body">
							<div class="form-group" style="">
                <label class="col-md-3 control-label">Email <span style="color: red">*</span>:-
                  <p class="control-label-help" style="color: red">(<strong>Note:</strong> This email is required when user want to contact you.)</p>
                </label>
                <div class="col-md-6">
                  <input type="text" name="app_email" id="app_email" value="<?php echo $settings_row['app_email']; ?>" class="form-control">
                </div>
              </div>   
								<div class="form-group">
									<label class="col-md-3 control-label">App Name :-</label>
									<div class="col-md-6">
										<input type="text" name="app_name" id="app_name" value="<?php echo $settings_row['app_name']; ?>" class="form-control">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">App Logo :- <p class="control-label-help">(Recommended resolution: 80X80, 90x90)</p></label>
									<div class="col-md-6">
										<div class="fileupload_block">
											<input type="file" name="app_logo" id="fileupload" onchange="return fileValidation()">

											<?php if ($settings_row['app_logo'] != "") { ?>
												<div class="fileupload_img"><img id="app_logo" type="image" src="images/<?php echo $settings_row['app_logo']; ?>" alt="image" /></div>
											<?php } else { ?>
												<div class="fileupload_img"><img id="app_logo" type="image" src="assets/images/landscape.jpg" alt="image" /></div>
											<?php } ?>

										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">App Description :-</label>
									<div class="col-md-6">
										<textarea name="app_description" id="app_description" class="form-control"><?php echo stripslashes($settings_row['app_description']); ?></textarea>
										<script>
											CKEDITOR.replace('app_description');
										</script>
									</div>
								</div>
								<div class="form-group">&nbsp;</div>
								<div class="form-group">
									<label class="col-md-3 control-label">App Version :-</label>
									<div class="col-md-6">
										<input type="text" name="app_version" id="app_version" value="<?php echo $settings_row['app_version']; ?>" class="form-control">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">Author :-</label>
									<div class="col-md-6">
										<input type="text" name="app_author" id="app_author" value="<?php echo $settings_row['app_author']; ?>" class="form-control">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">Contact :-</label>
									<div class="col-md-6">
										<input type="text" name="app_contact" id="app_contact" value="<?php echo $settings_row['app_contact']; ?>" class="form-control">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">Website :-</label>
									<div class="col-md-6">
										<input type="text" name="app_website" id="app_website" value="<?php echo $settings_row['app_website']; ?>" class="form-control">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">Developed By :-</label>
									<div class="col-md-6">
										<input type="text" name="app_developed_by" id="app_developed_by" value="<?php echo $settings_row['app_developed_by']; ?>" class="form-control">
									</div>
								</div>
								<br>
								<div class="form-group">
									<div class="col-md-9 col-md-offset-3">
										<button type="submit" name="submit" class="btn btn-primary">Save</button>
									</div>
								</div>
								<br>
							</div>
						</div>
					</form>
					</div>
					<div role="tabpanel" class="tab-pane" id="admob_settings">
              <form action="" name="admob_settings" method="post" class="form form-horizontal" enctype="multipart/form-data">
             <div class="section">
            	<div class="section-body">
              <div class="form-group">
              <label class="col-md-2 control-label">Publisher ID <a href="#target-content5"></a>:- <p class="control-label-help" style="color: red">(<strong>Note:</strong>Publisher ID is not required for Facebook Ads)</p></label>
              <div class="col-md-10">
                <input type="text" name="publisher_id" id="publisher_id" value="<?php echo $settings_row['publisher_id'];?>" class="form-control">
              </div>
              </div>
               <div class="row">                
						  <div class="col-md-6">
							<div class="banner_ads_block">
							  <div class="banner_ad_item">
								<label class="control-label">Banner Ads :-</label>
								  <div class="row toggle_btn" style="position: relative;margin-top: -8px;">
								  <input type="checkbox" id="checked1" name="banner_ad" value="true" class="cbx hidden" <?php if($settings_row['banner_ad']=='true'){?>checked <?php }?> />
								  <label for="checked1" class="lbl"></label>
								</div>
							  </div>
								<div class="col-md-12">
								<div class="form-group">
								  <label class="col-md-4 control-label">Choose Banner Ad:-</label>
								  <div class="col-md-8">
								    <select name="banner_ad_type" id="banner_ad_type" class="select2">
										<option value="facebook" <?php if($settings_row['banner_ad_type']=='facebook'){?>selected<?php }?>>Facebook</option>
										<option value="admob" <?php if($settings_row['banner_ad_type']=='admob'){?>selected<?php }?>>Admob</option>
									</select>
								  </div>
								</div>
								<div class="form-group">
								  <label class="col-md-4 control-label">Admob banner id:-</label>
								  <div class="col-md-8">
								  <input type="text" name="banner_ad_id" id="banner_ad_id" value="<?php echo $settings_row['banner_ad_id'];?>" class="form-control">
								  </div>
								</div>   
								<div class="form-group">
								 <label class="col-md-4 control-label mr_bottom20">Facebook banner id :-</label>
								  <div class="col-md-8">
						        <input type="text" name="facebook_banner_ad_id" id="facebook_banner_ad_id" value="<?php echo $settings_row['facebook_banner_ad_id'];?>" class="form-control">
								  </div>
								</div>  
							  </div>
							</div>
						  </div>	
						  <div class="col-md-6">	
  					         <div class="banner_ads_block">
							  <div class="banner_ad_item">
								<label class="control-label">Interstitial Ads :-</label>
								 <div class="row toggle_btn" style="position: relative;margin-top: -8px;">
								  <input type="checkbox" id="checked" name="interstital_ad" value="true" class="cbx hidden" <?php if($settings_row['interstital_ad']=='true'){?>checked <?php }?> />
								  <label for="checked" class="lbl"></label>
								</div>
							  </div>
							  <div class="col-md-12">
								<div class="form-group">
								  <label class="col-md-4 control-label">Choose Interstitial Ad:-</label>
								  <div class="col-md-8">
								    <select name="interstital_ad_type" id="interstital_ad_type" class="select2">
										<option value="facebook" <?php if($settings_row['interstital_ad_type']=='facebook'){?>selected<?php }?>>Facebook</option>
										<option value="admob" <?php if($settings_row['interstital_ad_type']=='admob'){?>selected<?php }?>>Admob</option>
									</select>
								  </div>
								</div>
						       <div class="form-group">
								  <label class="col-md-4 control-label">Admob Interstitial id:-</label>
								  <div class="col-md-8">
						        <input type="text" name="interstital_ad_id" id="interstital_ad_id" value="<?php echo $settings_row['interstital_ad_id'];?>" class="form-control">
								  </div>
								</div>   
								<div class="form-group">
								 <label class="col-md-4 control-label">Facebook Interstitial id :-</label>
								  <div class="col-md-8">
						        <input type="text" name="facebook_interstital_ad_id" id="facebook_interstital_ad_id" value="<?php echo $settings_row['facebook_interstital_ad_id'];?>" class="form-control">
								  </div>
								</div>  
								<div class="form-group">
                        		<label class="col-md-4 control-label">Interstitial Clicks :-</label>
								  <div class="col-md-8">
				       			<input type="text" name="interstital_ad_click" id="interstital_ad_click" value="<?php echo $settings_row['interstital_ad_click'];?>" class="form-control">
								  </div>
								</div>  
								</div> 
							  </div>
							</div>
						  </div>
						  <br>
              <div class="form-group">
               <div class="col-md-9 col-md-offset-3">
            <button type="submit" name="admob_submit" class="btn btn-primary">Save</button>
            </div>
          </div>
          <br>
          </div>
        </div>
      </form>
    </div>
				<div role="tabpanel" class="tab-pane" id="api_settings">
					<form action="" name="settings_api" method="post" class="form form-horizontal" enctype="multipart/form-data">
						<div class="section">
							<div class="section-body">
									<div class="form-group">
                    <label class="col-md-3 control-label">Pagination Limit:-</label>
                    <div class="col-md-6">
                      <input type="number" name="api_page_limit" id="api_page_limit" value="<?php echo $settings_row['api_page_limit'];?>" class="form-control"> 
                    </div>
                  </div>
									<div class="form-group">
									<label class="col-md-3 control-label">Category List Order By:-</label>
									<div class="col-md-6">
										<select name="api_cat_order_by" id="api_cat_order_by" class="select2">
											<option value="cid" <?php if ($settings_row['api_cat_order_by'] == 'cid') { ?>selected<?php } ?>>ID</option>
											<option value="category_name" <?php if ($settings_row['api_cat_order_by'] == 'category_name') { ?>selected<?php } ?>>Name</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">Category Post Order:-</label>
									<div class="col-md-6">
										<select name="api_cat_post_order_by" id="api_cat_post_order_by" class="select2">
											<option value="ASC" <?php if ($settings_row['api_cat_post_order_by'] == 'ASC') { ?>selected<?php } ?>>ASC</option>
											<option value="DESC" <?php if ($settings_row['api_cat_post_order_by'] == 'DESC') { ?>selected<?php } ?>>DESC</option>
										</select>
									</div>
								</div>
								<br>
								<div class="form-group">
									<div class="col-md-9 col-md-offset-3">
										<button type="submit" name="api_submit" class="btn btn-primary">Save</button>
									</div>
								</div>
								<br>
							</div>
						</div>
					</form>
				</div>
				<div role="tabpanel" class="tab-pane" id="app_update_popup">
					<form action="" name="app_update" method="post" class="form form-horizontal" enctype="multipart/form-data">

						<div class="section">
							<div class="section-body">
								<div class="form-group">
									<label class="col-md-3 control-label">App Update Popup Show/Hide:-
										<p class="control-label-help" style="color:#F00">You can show/hide update popup from this option</p>
									</label>
									<div class="col-md-6">
										<div class="row" style="margin-top: 15px">
											<input type="checkbox" id="chk_update" name="app_update_status" value="true" class="cbx hidden" <?php if ($settings_row['app_update_status'] == 'true') {echo 'checked';} ?> />
											<label for="chk_update" class="lbl" style="left:13px;"></label>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">New App Version Code :-
										<a href="assets/images/android_version_code.png" target="_blank">
											<p class="control-label-help" style="color:#F00">How to get version code</p>
										</a>
									</label>
									<div class="col-md-6">
										<input type="number" min="1" name="app_new_version" id="app_new_version" required="" value="<?php echo $settings_row['app_new_version']; ?>" class="form-control">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">Description :-</label>
									<div class="col-md-6">
										<textarea name="app_update_desc" class="form-control"><?php echo $settings_row['app_update_desc']; ?></textarea>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">App Link :-
										<p class="control-label-help">You will be redirect on this link after click on update</p>
									</label>
									<div class="col-md-6">
										<input type="text" name="app_redirect_url" id="app_redirect_url" required="" value="<?php echo $settings_row['app_redirect_url']; ?>" class="form-control">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">Cancel Option :-
										<p class="control-label-help" style="color:#F00">Cancel button option will show in app update popup</p>
									</label>
									<div class="col-md-6">
										<div class="row" style="margin-top: 15px">
											<input type="checkbox" id="chk_cancel_update" name="cancel_update_status" value="true" class="cbx hidden" <?php if ($settings_row['cancel_update_status'] == 'true') {echo 'checked';} ?> />
											<label for="chk_cancel_update" class="lbl" style="left:13px;"></label>
										</div>
									</div>
								</div>
								<br>
								<div class="form-group">
									<div class="col-md-9 col-md-offset-3">
										<button type="submit" name="app_update_popup" class="btn btn-primary">Save</button>
									</div>
								</div>
								<br>
							</div>
						</div>
					</form>
				</div>
				<div role="tabpanel" class="tab-pane" id="api_faq">
					<form action="" name="api_faq" method="post" class="form form-horizontal" enctype="multipart/form-data">

						<div class="section">
							<div class="section-body">
								<div class="form-group">
									<label class="col-md-3 control-label">App FAQ :-</label>
									<div class="col-md-9">

										<textarea name="app_faq" id="app_faq" class="form-control"><?php echo stripslashes($settings_row['app_faq']); ?></textarea>

										<script>
                    CKEDITOR.replace( 'app_faq' ,{
                      filebrowserBrowseUrl : 'filemanager/dialog.php?type=2&editor=ckeditor&fldr=&akey=viaviweb',
                      filebrowserUploadUrl : 'filemanager/dialog.php?type=2&editor=ckeditor&fldr=&akey=viaviweb',
                      filebrowserImageBrowseUrl : 'filemanager/dialog.php?type=1&editor=ckeditor&fldr=&akey=viaviweb'
                    });
                  </script>
									</div>
								</div>
								<br>
								<div class="form-group">
									<div class="col-md-9 col-md-offset-3">
										<button type="submit" name="app_faq_submit" class="btn btn-primary">Save</button>
									</div>
								</div>
								<br>
							</div>
						</div>
					</form>
				</div>
				<div role="tabpanel" class="tab-pane" id="app_terms_cond"> 
					<div class="rows">
						<form action="" method="post" class="form form-horizontal" enctype="multipart/form-data">
							<div class="section">
								<div class="section-body">
									<?php 
									if(file_exists('terms_conditions.php'))
									{
										?>
										<div class="form-group">
											<label class="col-md-3 control-label">App Terms Conditions URL :-</label>
											<div class="col-md-9">
												<input type="text" readonly class="form-control" value="<?=getBaseUrl().'terms_conditions.php'?>">
											</div>
										</div>
									<?php } ?>
									<div class="form-group">
										<label class="col-md-3 control-label">App Terms Conditions :-</label>
										<div class="col-md-9">
											<textarea name="app_terms_conditions" id="app_terms_conditions" class="form-control"><?php echo stripslashes($settings_row['app_terms_conditions']);?></textarea>
											<script>
												CKEDITOR.replace( 'app_terms_conditions' ,{
													filebrowserBrowseUrl : 'filemanager/dialog.php?type=2&editor=ckeditor&fldr=&akey=viaviweb',
													filebrowserUploadUrl : 'filemanager/dialog.php?type=2&editor=ckeditor&fldr=&akey=viaviweb',
													filebrowserImageBrowseUrl : 'filemanager/dialog.php?type=1&editor=ckeditor&fldr=&akey=viaviweb'
												});
											</script>
										</div>
									</div>
									<br/>
									<div class="form-group">
										<div class="col-md-9 col-md-offset-3">
											<button type="submit" name="app_terms_con" class="btn btn-primary">Save</button>
										</div>
									</div>
									<br>
								</div>
							</div>
						</form>
					</div>
				</div>
				<div role="tabpanel" class="tab-pane" id="account_delete"> 
					<div class="rows">
						<form action="" method="post" class="form form-horizontal" enctype="multipart/form-data">
							<div class="section">
								<div class="section-body">
									<?php 
									if(file_exists('delete_instruction.php'))
									{
										?>
										<div class="form-group">
											<label class="col-md-3 control-label">Account Delete Instructions URL :-</label>
											<div class="col-md-9">
												<input type="text" readonly class="form-control" value="<?=getBaseUrl().'delete_instruction.php'?>">
											</div>
										</div>
									<?php } ?>
									<div class="form-group">
										<label class="col-md-3 control-label">Account Delete Instructions :-</label>
										<div class="col-md-9">
											<textarea name="account_delete_intruction" id="account_delete_intruction" class="form-control"><?php echo stripslashes($settings_row['account_delete_intruction']);?></textarea>
											<script>
												CKEDITOR.replace( 'account_delete_intruction' ,{
													filebrowserBrowseUrl : 'filemanager/dialog.php?type=2&editor=ckeditor&fldr=&akey=viaviweb',
													filebrowserUploadUrl : 'filemanager/dialog.php?type=2&editor=ckeditor&fldr=&akey=viaviweb',
													filebrowserImageBrowseUrl : 'filemanager/dialog.php?type=1&editor=ckeditor&fldr=&akey=viaviweb'
												});
											</script>
										</div>
									</div>
									<br/>
									<div class="form-group">
										<div class="col-md-9 col-md-offset-3">
											<button type="submit" name="account_delete" class="btn btn-primary">Save</button>
										</div>
									</div>
									<br>
								</div>
							</div>
						</form>
					</div>
				</div>
				<div role="tabpanel" class="tab-pane" id="api_privacy_policy">
					<form action="" name="api_privacy_policy" method="post" class="form form-horizontal" enctype="multipart/form-data">
						<div class="section">
							<div class="section-body">
								<?php 
                    if(file_exists('privacy_policy.php'))
                    {
                  	?>
                    <div class="form-group">
                      <label class="col-md-3 control-label">App Privacy Policy URL :-</label>
                      <div class="col-md-9">
                        <input type="text" readonly class="form-control" value="<?=getBaseUrl().'privacy_policy.php'?>">
                      </div>
                    </div>
                  <?php } ?>
								<div class="form-group">
									<label class="col-md-3 control-label">App Privacy Policy :-</label>
									<div class="col-md-9">
										<textarea name="app_privacy_policy" id="app_privacy_policy" class="form-control"><?php echo stripslashes($settings_row['app_privacy_policy']); ?></textarea>

										<script>
                    CKEDITOR.replace( 'app_privacy_policy' ,{
                      filebrowserBrowseUrl : 'filemanager/dialog.php?type=2&editor=ckeditor&fldr=&akey=viaviweb',
                      filebrowserUploadUrl : 'filemanager/dialog.php?type=2&editor=ckeditor&fldr=&akey=viaviweb',
                      filebrowserImageBrowseUrl : 'filemanager/dialog.php?type=1&editor=ckeditor&fldr=&akey=viaviweb'
                    });
                  </script>
									</div>
								</div>
								<br>
								<div class="form-group">
									<div class="col-md-9 col-md-offset-3">
										<button type="submit" name="app_pri_poly" class="btn btn-primary">Save</button>
									</div>
								</div>
								<br>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>
</div>

<?php include("includes/footer.php"); ?>

<script type="text/javascript">
	// Get preview image
  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function(e) {
        $('#app_logo').attr('src', e.target.result);
      }

      reader.readAsDataURL(input.files[0]);
    }
  }
  
  // Get active tab
  $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
    localStorage.setItem('activeTab', $(e.target).attr('href'));
  });

  var activeTab = localStorage.getItem('activeTab');
  if(activeTab){
    $('.nav-tabs a[href="' + activeTab + '"]').tab('show');
  }

  // For ads click
  $("#interstital_ad_click").blur(function(e){
    if($(this).val() == '')
      $(this).val("0");
  });
 
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