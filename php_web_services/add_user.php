<?php $page_title=(isset($_GET['user_id'])) ? 'Edit User' : 'Add User'; 

include('includes/header.php');
include('language/language.php'); 

require_once("thumbnail_images.class.php");
	 
	 // Get add users start
	if(isset($_POST['submit']) and isset($_GET['add']))
	{			
		if ($_FILES['user_image']['name'] != "") {

			$ext = pathinfo($_FILES['user_image']['name'], PATHINFO_EXTENSION);

			$user_image = rand(0, 99999) . '_' . date('dmYhis') . "_user." . $ext;

    	//Main Image
			$tpath1 = 'images/' . $user_image;

			if ($ext != 'png') {
				$pic1 = compress_image($_FILES["user_image"]["tmp_name"], $tpath1, 80);
			} else {
				$tmp = $_FILES['user_image']['tmp_name'];
				move_uploaded_file($tmp, $tpath1);
			}
			 	 
			$data = array(
			    'user_type'=>'Normal',  
		      'name'  =>  cleanInput($_POST['name']),
		      'email'  =>  cleanInput($_POST['email']),
		      'password'  =>  md5(trim($_POST['password'])),
		      'phone'  =>  cleanInput($_POST['phone']),
		      'user_image' => $user_image,		
		      'registration_on'  =>  strtotime(date('d-m-Y h:i:s A'))
			);

		}else{

			$data = array(
			    'user_type'=>'Normal',  
		      'name'  =>  cleanInput($_POST['name']),
		      'email'  =>  cleanInput($_POST['email']),
		      'password'  =>  md5(trim($_POST['password'])),
		      'phone'  =>  cleanInput($_POST['phone']),
		      'registration_on'  =>  strtotime(date('d-m-Y h:i:s A'))
			);

		 }

			$qry = Insert('tbl_users',$data);

			$_SESSION['msg']="10";
			header("location:manage_users.php");	 
			exit;
	}
	// Get add users end	
	
	// Get all users
	if(isset($_GET['user_id']))
	{
			 
			$user_qry="SELECT * FROM tbl_users WHERE `id`='".$_GET['user_id']."'";
			$user_result=mysqli_query($mysqli,$user_qry);
			$user_row=mysqli_fetch_assoc($user_result);
		
	}
	
	// Get update user start
    if(isset($_POST['submit']) and isset($_POST['user_id']))
    {

        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) 
        {
            $_SESSION['class']="warn";
            $_SESSION['msg']="invalid_email_format";
            header("Location:add_user.php?user_id=".$_POST['user_id']);
            exit;
        }
        else{

            $email=cleanInput($_POST['email']);

            $sql="SELECT * FROM tbl_users WHERE `email` = '$email' AND `id` <> '".$_POST['user_id']."'";

            $res=mysqli_query($mysqli, $sql);

            if(mysqli_num_rows($res) == 0){
                $data = array(
                    'name'  =>  cleanInput($_POST['name']),
                    'email'  =>  cleanInput($_POST['email']),
                    'phone'  =>  cleanInput($_POST['phone']),
                );

                if($_POST['password']!="")
                {
                    $password=md5(trim($_POST['password']));
                    $data = array_merge($data, array("password"=>$password));
                }

                if($_FILES['user_image']['name']!="")
                {

                    if($user_row['user_image']!="" OR !file_exists('images/'.$user_row['user_image']))
                    {
                        unlink('images/'.$user_row['user_image']);
                    }

                    $ext = pathinfo($_FILES['user_image']['name'], PATHINFO_EXTENSION);

                    $user_image=rand(0,99999).'_'.date('dmYhis')."_user.".$ext;

                    //Main Image
                    $tpath1='images/'.$user_image;   

                    if($ext!='png')  {
                      $pic1=compress_image($_FILES["user_image"]["tmp_name"], $tpath1, 80);
                    }
                    else{
                      $tmp = $_FILES['user_image']['tmp_name'];
                      move_uploaded_file($tmp, $tpath1);
                    }

                    $data = array_merge($data, array("user_image" => $user_image));

                }

                $user_edit=Update('tbl_users', $data, "WHERE id = '".$_POST['user_id']."'");

                $_SESSION['class']="success";

                $_SESSION['msg']="11";
            }
            else{
                $_SESSION['class']="warn";
                $_SESSION['msg']="email_exist";
                
                header("Location:add_user.php?user_id=".$_POST['user_id']);
                exit;
            }
        }
        $_SESSION['msg']="11";
        if(isset($_GET['redirect'])){
          header("Location:".$_GET['redirect']);
        }
        else{
          header("Location:add_user.php?user_id=".$_POST['user_id']);
        }
        exit;
    }
    // Get update user end
	
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
              <div class="page_title"><?php if(isset($_GET['cat_id'])){?>Edit<?php }else{?>Add<?php }?> User</div>
            </div>
          </div>
          <div class="clearfix"></div>
          <div class="card-body mrg_bottom"> 
            <form action="" name="addedituser" method="post" class="form form-horizontal" enctype="multipart/form-data" >
            	<input  type="hidden" name="user_id" value="<?php if(isset($_GET['user_id'])){echo $_GET['user_id'];}?>" />

              <div class="section">
                <div class="section-body">
                  <div class="form-group">
                    <label class="col-md-3 control-label">Name :-</label>
                    <div class="col-md-6">
                      <input type="text" name="name" id="name" value="<?php if(isset($_GET['user_id'])){echo $user_row['name'];}?>" class="form-control" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-3 control-label">Email :-</label>
                    <div class="col-md-6">
                      <input type="email" name="email" id="email" value="<?php if(isset($_GET['user_id'])){echo $user_row['email'];}?>" class="form-control" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-3 control-label">Password :-</label>
                    <div class="col-md-6">
                      <input type="password" name="password" id="password" value="" class="form-control" <?php if(!isset($_GET['user_id'])){?>required<?php }?>>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-3 control-label">Phone :-</label>
                    <div class="col-md-6">
                      <input type="text" name="phone" id="phone" value="<?php if(isset($_GET['user_id'])){echo $user_row['phone'];}?>" class="form-control">
                    </div>
                  </div>
                  <div class="form-group">
									<label class="col-md-3 control-label">User Image :-</label>
									<div class="col-md-6">
										<div class="fileupload_block">
											<input type="file" name="user_image" value="" id="fileupload" <?php echo (!isset($_GET['user_id'])) ? 'required="require"' : '' ?> onchange="return fileValidation()">

											<div class="fileupload_img">
	                    <?php 
	                      $img_src="";
	                      if(!isset($_GET['user_id']) || $user_row['user_image']==''){
	                          $img_src='assets/images/landscape.jpg';
	                      }else{
	                          $img_src='images/'.$user_row['user_image'];
	                      }
	                    ?>
	                    <img type="image" src="<?=$img_src?>" alt="image" style="width: 86px;height: 86px" />
	                    </div>   
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
   
<?php include('includes/footer.php');?>                  

<script type="text/javascript">
// Get preview image start
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $("input[name='user_image']").next(".fileupload_img").find("img").attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
  }
}
$("input[name='user_image']").on("change",function() { 
  readURL(this);
});
// Get image preview end

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
//  For image validation end

</script>