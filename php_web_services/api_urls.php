<?php $page_title="Api Urls";

     include("includes/header.php");
	
    $file_path = getBaseUrl().'api.php';

?>
<div class="row">
  <div class="col-sm-12 col-xs-12">
    <?php
          if(isset($_SERVER['HTTP_REFERER']))
          {
            echo '<a href="'.$_SERVER['HTTP_REFERER'].'"><h4 class="pull-left" style="font-size: 20px;color: #e91e63"><i class="fa fa-arrow-left"></i> Back</h4></a>';
          }
        ?>
    <div class="card">
        <div class="card-header">
          Example API URLS
          </div>
            <div class="card-body no-padding">
            <pre>
            <code class="html">
              <br><b>API URL</b>&nbsp; <?php echo $file_path;?>    

              <br><b>Home</b> (Method: get_home)
              <br><b>Room List</b> (Method: get_room_list) (Parameter: page)
              <br><b>Get facilities</b> (Method: get_facilities)
              <br><b>Get Location</b> (Method: get_location)
              <br><b>Single Room</b> (Method: get_single_room) (Parameter: room_id)
              <br><b>Gallery Category List</b> (Method: get_category) (Parameter: page)
              <br><b>Gallery list by Cat ID</b> (Method: get_cat_by_gallery_id) (Parameter: cat_id,page)
              <br><b>Room Booking</b> (Method: get_room_booking) (Parameter: name,email,phone,room_id,adults,children,check_in_date,check_out_date)
              <br><b>User Register</b>(Method: user_register)(Parameter: type [google,normal,facebook] name,email,password,phone,auth_id,device_id )
              <br><b>User Login</b> (Method: user_login)(Parameter: email, password)
              <br><b>Check User Status</b>(Method: user_status) (Parameter: user_id)
			        <br><b>User Profile</b>(Method: user_profile)(Parameter: user_id)
              <br><b>User Profile Update</b>(Method: user_profile_update)(Parameter: user_id, name, is_remove, password, phone) (Parameter: user_image)
              <br><b>Change Password</b> (Method: change_password) (Parameters: user_id, old_password, new_password)
              <br><b>Forgot Password</b>(Method: forgot_pass)(Parameter: user_email)
              <br><b>User Contact Us</b> (Method: user_contact_us)(Parameter: contact_email, contact_name,contact_phone,contact_msg,contact_subject)
              <br><b>Get Contact Subject List</b> (Method: get_contact) (Parameter: user_id)
              <br><b>Rating</b>(Method: user_rating)(Parameter: room_id,user_id,rate,message)
              <br><b>User's Rating</b>(Method: get_rating) (Parameter: room_id)
               <br><b>User's Rating List</b>(Method: get_user_rating) (Parameter: user_id, room_id)
              <br><b>App FAQ</b> (Method: app_faq)</span>
              <br><b>App Terms & Conditions</b>(Method: app_terms_conditions)
              <br><b>App Privacy Policy</b> (Method: app_privacy_policy)
			        <br><b>App About Details</b>(Method: app_about)
			        <br><b>App Details</b>(Method: get_app_details)
            </code> 
          </pre>
          </div>
        </div>
    </div>
  </div>
<br/>
<div class="clearfix"></div>
        
<?php include("includes/footer.php");?>