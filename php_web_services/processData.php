<?php 
require("includes/connection.php");
require("includes/function.php");
require("language/language.php");
require("language/app_language.php");

require("language/app_language.php");

include("smtp_email.php");

$file_path = getBaseUrl();

$response=array();

switch ($_POST['action']) {
	case 'toggle_status':
	$id=$_POST['id'];
	$for_action=$_POST['for_action'];
	$column=$_POST['column'];
	$tbl_id=$_POST['tbl_id'];
	$table_nm=$_POST['table'];

	// Enable & disable status
	if($for_action=='active'){
		$data = array($column  =>  '1');
		$edit_status=Update($table_nm, $data, "WHERE $tbl_id = '$id'");
		$_SESSION['msg']="13";
	}else{
		$data = array($column  =>  '0');
		$edit_status=Update($table_nm, $data, "WHERE $tbl_id = '$id'");
		$_SESSION['msg']="14";
	}

	$response['status']=1;
	$response['action']=$for_action;
	echo json_encode($response);
	break;

	// Get remove contact start	
	case 'removeContact':

	$ids=is_array($_POST['ids']) ? implode(',', $_POST['ids']) : $_POST['ids'];

	$sqlDelete="DELETE FROM tbl_contact_list WHERE `id` IN ($ids)";

	if(mysqli_query($mysqli, $sqlDelete)){
		$response['status']=1;	
	}
	else{
		$response['status']=0;
	}

	$response['status']=1;	
	$_SESSION['msg']="12";
	echo json_encode($response);
	break;

	// Get remove sub contact start	
	case 'removesubContact':

	$ids=is_array($_POST['ids']) ? implode(',', $_POST['ids']) : $_POST['ids'];

	$sqlDelete="DELETE FROM tbl_contact_sub WHERE `id` IN ($ids)";

	if(mysqli_query($mysqli, $sqlDelete)){
		$response['status']=1;	
	}
	else{
		$response['status']=0;
	}

	$response['status']=1;	
	$_SESSION['msg']="12";
	echo json_encode($response);
	break;

	// Get remove gallery image start	
	case 'remove_gallery_img':

	$id=$_POST['id'];

	$img=$_POST['img'];

	if(file_exists('images/gallery'.$img)){
		unlink('images/gallery'.$img);
	}

	Delete('tbl_room_gallery','id='.$id);

	$response['status']=1;
	echo json_encode($response);
	break;	

	// For mutli action perform	
	case 'multi_action':

	      	$action=$_POST['for_action'];
	      	$ids=implode(",", $_POST['id']);
	      	$table=$_POST['table'];

	      	if($ids==''){
	      		$ids=$_POST['id'];
	      	}

	      	if($action=='enable'){

	      		$sql="UPDATE $table SET `status`='1' WHERE `id` IN ($ids)";
	      		mysqli_query($mysqli, $sql);
	      		$_SESSION['msg']="13";				
	      	}
	      	else if($action=='disable'){
	      		$sql="UPDATE $table SET `status`='0' WHERE `id` IN ($ids)";
	      		if(mysqli_query($mysqli, $sql)){
	      			$_SESSION['msg']="14";
	      		}
	      	}

	      	if($action=='enable'){

	      		$sql="UPDATE $table SET `wall_status`='1' WHERE `id` IN ($ids)";
	      		mysqli_query($mysqli, $sql);
	      		$_SESSION['msg']="13";				
	      	}
	      	else if($action=='disable'){
	      		$sql="UPDATE $table SET `wall_status`='0' WHERE `id` IN ($ids)";
	      		if(mysqli_query($mysqli, $sql)){
	      			$_SESSION['msg']="14";
	      		}
	      	}

	      	if($action=='enable'){

	      		$sql="UPDATE $table SET `banner_status`='1' WHERE `id` IN ($ids)";
	      		mysqli_query($mysqli, $sql);
	      		$_SESSION['msg']="13";				
	      	}
	      	else if($action=='disable'){
	      		$sql="UPDATE $table SET `banner_status`='0' WHERE `id` IN ($ids)";
	      		if(mysqli_query($mysqli, $sql)){
	      			$_SESSION['msg']="14";
	      		}
	      	}

	      	if($action=='enable'){

	      		$sql="UPDATE $table SET `room_status`='1' WHERE `id` IN ($ids)";
	      		mysqli_query($mysqli, $sql);
	      		$_SESSION['msg']="13";				
	      	}
	      	else if($action=='disable'){
	      		$sql="UPDATE $table SET `room_status`='0' WHERE `id` IN ($ids)";
	      		if(mysqli_query($mysqli, $sql)){
	      			$_SESSION['msg']="14";
	      		}
	      	}
	      	else if($action=='delete'){

	      		if($table=='tbl_users'){

	      			$sql="SELECT * FROM tbl_users WHERE `id` IN ($ids)";
	      			$res=mysqli_query($mysqli, $sql);

	      			while ($row=mysqli_fetch_assoc($res)) {
	      				if($row['user_image']!="")
	      				{
	      					unlink('images/'.$row['user_image']);
	      				}
	      			}

	      			$deleteSql="DELETE FROM tbl_rating WHERE `user_id` IN ($ids)";
	      			mysqli_query($mysqli, $deleteSql);

	      			$deleteSql="DELETE FROM $table WHERE `id` IN ($ids)";
	      			mysqli_query($mysqli, $deleteSql);

	      			$deleteSql="DELETE FROM tbl_active_log WHERE `user_id` IN ($ids)";
	      			mysqli_query($mysqli, $deleteSql);
	      		}
	      		else if($table=='tbl_category'){

	      			$sql="SELECT * FROM tbl_wallpaper WHERE `cat_id` IN ($ids)";
	      			$res=mysqli_query($mysqli, $sql);

	      			while ($row=mysqli_fetch_assoc($res)) {
	      				if($row['category_image']!="")
	      				{
	      					unlink('images/'.$row['category_image']);
	      					unlink('images/thumbs/'.$row['category_image']);
	      				}

	      				if($row['image']!="")
	      				{
	      					unlink('categories/'.$row['cat_id'].'/'.$row['image']);
	      					unlink('categories/'.$row['cat_id'].'/thumbs/'.$row['image']);
	      				}

	      				if(!rmdir('categories/'.$row['cat_id']))
	      				{
	      					rmdir('categories/'.$row['cat_id'].'/thumbs');
	      					rmdir('categories/'.$row['cat_id']);       
	      				}

	      			}

	      			$deleteSql="DELETE FROM tbl_wallpaper WHERE `cat_id` IN ($ids)";
	      			mysqli_query($mysqli, $deleteSql);

	      			$sql="SELECT * FROM $table WHERE `cid` IN ($ids)";
	      			$res=mysqli_query($mysqli, $sql);

	      			while ($row=mysqli_fetch_assoc($res)){
	      				if($row['category_image']!="")
	      				{
	      					unlink('images/'.$row['category_image']);
	      					unlink('images/thumbs/'.$row['category_image']);
	      				}

	      			}

	      			$deleteSql="DELETE FROM $table WHERE `cid` IN ($ids)";
	      			mysqli_query($mysqli, $deleteSql);
	      		}	
	      		else if($table=='tbl_home_banner'){

	      			$sql="SELECT * FROM tbl_home_banner WHERE `id` IN ($ids)";
	      			$res=mysqli_query($mysqli, $sql);

	      			while ($row=mysqli_fetch_assoc($res)) {

	      				if($row['banner_image']!="")
	      				{
	      					unlink('images/thumbs/'.$row['banner_image']);
	      					unlink('images/'.$row['banner_image']);
	      				}

	      			}

	      			$deleteSql="DELETE FROM tbl_home_banner WHERE `id` IN ($ids)";
	      			mysqli_query($mysqli, $deleteSql);

	      		}
	      		else if($table=='tbl_rooms'){

	      			$sql="SELECT * FROM $table WHERE `id` IN ($ids)";
	      			$res=mysqli_query($mysqli, $sql);
	      			while ($row=mysqli_fetch_assoc($res)){
	      				if($row['room_image']!="")
	      				{
	      					unlink('images/'.$row['room_image']);
	      					unlink('images/thumbs/'.$row['room_image']);
	      				}

	      				Delete('tbl_rating','post_id='.$row['id']);

	      			}

	      			$deleteSql="DELETE FROM $table WHERE `id` IN ($ids)";

	      			mysqli_query($mysqli, $deleteSql);

	      			$sql="SELECT * FROM tbl_room_gallery WHERE `room_id` IN ($ids)";
	      			$res=mysqli_query($mysqli, $sql);

	      			while ($row=mysqli_fetch_assoc($res)) {
	      				if($row['image_name']!="")
	      				{
	      					unlink('images/gallery/'.$row['image_name']);
	      				}

	      			}

	      			$deleteSql="DELETE FROM tbl_room_gallery WHERE `rood_id` IN ($ids)";
	      			mysqli_query($mysqli, $deleteSql);

	      		}
	      		else if($table=='tbl_wallpaper'){

	      			$sql="SELECT * FROM $table WHERE `id` IN ($ids)";
	      			$res=mysqli_query($mysqli, $sql);
	      			while ($row=mysqli_fetch_assoc($res)){

	      				if($row['image']!="")
	      				{
	      					unlink('categories/'.$row['cat_id'].'/'.$row['image']);
	      					unlink('categories/'.$row['cat_id'].'/thumbs/'.$row['image']);
	      				}

	      				if(!rmdir('categories/'.$row['cat_id']))
	      				{
	      					rmdir('categories/'.$row['cat_id'].'/thumbs');
	      					rmdir('categories/'.$row['cat_id']);       
	      				}
	      			}

	      			$deleteSql="DELETE FROM $table WHERE `id` IN ($ids)";
	      			mysqli_query($mysqli, $deleteSql);
	      		}

	      		$_SESSION['msg']="12";
	      	}

	      	$response['status']=1;	
	      	echo json_encode($response);
	      	break;

		// Check smtp mail 	
	    case 'check_smtp':
	      	{
	      		
	      		$to = trim($_POST['email']);
	      		$recipient_name='Check User';

	      		$subject = '[IMPORTANT] '.APP_NAME.' Check SMTP Configuration';

	      		$message='<div style="background-color: #f9f9f9;" align="center"><br />
	      		<table style="font-family: OpenSans,sans-serif; color: #666666;" border="0" width="600" cellspacing="0" cellpadding="0" align="center" bgcolor="#FFFFFF">
	      		<tbody>
	      		<tr>
	      		<td colspan="2" bgcolor="#FFFFFF" align="center"><img src="'.$file_path.'images/'.APP_LOGO.'" alt="header" /></td>
	      		</tr>
	      		<tr>
	      		<td width="600" valign="top" bgcolor="#FFFFFF"><br>
	      		<table style="font-family:OpenSans,sans-serif; color: #666666; font-size: 10px; padding: 15px;" border="0" width="100%" cellspacing="0" cellpadding="0" align="left">
	      		<tbody>
	      		<tr>
	      		<td valign="top"><table border="0" align="left" cellpadding="0" cellspacing="0" style="font-family:OpenSans,sans-serif; color: #666666; font-size: 10px; width:100%;">
	      		<tbody>
	      		<tr>
	      		<td>
	      		<p style="color: #262626; font-size: 24px; margin-top:0px;">Hi, '.$_SESSION['admin_name'].'</p>
	      		<p style="color: #262626; font-size: 18px; margin-top:0px;">This is the demo mail to check SMTP Configuration. </p>
	      		<p style="color:#262626; font-size:17px; line-height:32px;font-weight:500;margin-bottom:30px;">'.$app_lang['thank_you_lbl'].' '.APP_NAME.'</p>

	      		</td>
	      		</tr>
	      		</tbody>
	      		</table></td>
	      		</tr>

	      		</tbody>
	      		</table></td>
	      		</tr>
	      		<tr>
	      		<td style="color: #262626; padding: 20px 0; font-size: 18px; border-top:5px solid #52bfd3;" colspan="2" align="center" bgcolor="#ffffff">'.$app_lang['email_copyright'].' '.APP_NAME.'.</td>
	      		</tr>
	      		</tbody>
	      		</table>
	      		</div>';

			// Send mail
	      		send_email($to,$recipient_name,$subject,$message, true);
	      	}	
	      	break;	
	      	default:
			# code...
	      	break;
	      }

	  ?>