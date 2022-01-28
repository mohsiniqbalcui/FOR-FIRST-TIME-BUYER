<?php $page_title="Manage Gallery";

include("includes/header.php");
require("language/language.php");

 
$tableName="tbl_wallpaper";   
$targetpage = "manage_gallery.php"; 
$limit = 12; 
  
  // Get Filter
	if(isset($_GET['filter'])){
			if($_GET['filter']=='enable'){
			  $status="tbl_wallpaper.`wall_status`='1'";
			}else if($_GET['filter']=='disable'){
			  $status="tbl_wallpaper.`wall_status`='0'";
			}
      } 

  if(isset($_GET['cat_id'])){
  
      $cat_id = filter_var($_GET['cat_id'], FILTER_SANITIZE_STRING);

  	 if(isset($_GET['filter'])){
      
        $query ="SELECT COUNT(*) as num FROM tbl_wallpaper 
					LEFT JOIN tbl_category ON tbl_wallpaper.`cat_id`=tbl_category.`cid`
		        	WHERE $status AND ".$_GET['filter']."";

        $targetpage = "manage_gallery.php?cat_id=$cat_id&filter=".$_GET['filter'];
      }
      else{
       
       $query = "SELECT COUNT(*) as num FROM $tableName WHERE `cat_id`='$cat_id'";

	     $targetpage = "manage_gallery.php?cat_id=".$cat_id; 
      }
      
      $total_pages = mysqli_fetch_array(mysqli_query($mysqli,$query));
      $total_pages = $total_pages['num'];
      
      $stages = 3;
      $page=0;
      if(isset($_GET['page'])){
        $page = mysqli_real_escape_string($mysqli,$_GET['page']);
      }
      if($page){
        $start = ($page - 1) * $limit; 
      }else{
        $start = 0; 
      }

      $quotes_qry="SELECT tbl_category.`category_name`,tbl_wallpaper.* FROM tbl_wallpaper
	            LEFT JOIN tbl_category ON tbl_wallpaper.`cat_id`= tbl_category.`cid` 
	            WHERE tbl_wallpaper.`cat_id`='$cat_id'
	            ORDER BY tbl_wallpaper.`id` DESC LIMIT $start, $limit";

	    $result=mysqli_query($mysqli,$quotes_qry);

      if(isset($_GET['filter'])){
  
        $status='';

			if($_GET['filter']=='enable'){
			  	$status="tbl_wallpaper.`wall_status`='1'";
			}else if($_GET['filter']=='disable'){
			  	$status="tbl_wallpaper.`wall_status`='0'";
			}

      $quotes_qry="SELECT tbl_category.`category_name`,tbl_wallpaper.* FROM tbl_wallpaper
				LEFT JOIN tbl_category ON tbl_wallpaper.`cat_id`=tbl_category.`cid`
				WHERE $status AND tbl_wallpaper.`cat_id`='$cat_id'
				ORDER BY tbl_wallpaper.`id` DESC LIMIT $start, $limit";

      $result=mysqli_query($mysqli,$quotes_qry);
      }

  }
  else if(isset($_GET['filter'])){

		
			$targetpage = "manage_gallery.php?filter=".$_GET['filter'];
			$status='';

			if($_GET['filter']=='enable'){
			  	$status="tbl_wallpaper.`wall_status`='1'";
			}else if($_GET['filter']=='disable'){
			  	$status="tbl_wallpaper.`wall_status`='0'";
				
			}

			$query ="SELECT COUNT(*) as num FROM tbl_wallpaper 
					LEFT JOIN tbl_category ON tbl_wallpaper.`cat_id`=tbl_category.`cid`
		        	WHERE $status";
			$total_pages = mysqli_fetch_array(mysqli_query($mysqli,$query));
			$total_pages = $total_pages['num'];

			$stages = 3;
			$page=0;
			if(isset($_GET['page'])){
			$page = mysqli_real_escape_string($mysqli,$_GET['page']);
			}
			if($page){
			  $start = ($page - 1) * $limit; 
			}else{
			  $start = 0; 
			} 


			$quotes_qry="SELECT tbl_category.`category_name`,tbl_wallpaper.* FROM tbl_wallpaper
				LEFT JOIN tbl_category ON tbl_wallpaper.`cat_id`=tbl_category.`cid`
				WHERE $status
				ORDER BY tbl_wallpaper.`id` DESC LIMIT $start, $limit";
			 
	 		$result=mysqli_query($mysqli,$quotes_qry);

	 }else{

		  $tableName="tbl_wallpaper";   
	      $targetpage = "manage_gallery.php"; 
	      $limit = 12; 
	      
	      $query = "SELECT COUNT(*) as num FROM $tableName";
	      $total_pages = mysqli_fetch_array(mysqli_query($mysqli,$query));
	      $total_pages = $total_pages['num'];
	      
	      $stages = 3;
	      $page=0;
	      if(isset($_GET['page'])){
	      $page = mysqli_real_escape_string($mysqli,$_GET['page']);
	      }
	      if($page){
	        $start = ($page - 1) * $limit; 
	      }else{
	        $start = 0; 
	        } 
	      
	     $quotes_qry="SELECT * FROM tbl_wallpaper
	                  LEFT JOIN tbl_category ON tbl_wallpaper.`cat_id`= tbl_category.`cid`
	                  ORDER BY tbl_wallpaper.`id` DESC LIMIT $start, $limit";
	 
	     $result=mysqli_query($mysqli,$quotes_qry); 

	 }


?>
                
    <div class="row">
      <div class="col-xs-12">
        <?php
          if(isset($_SERVER['HTTP_REFERER']))
          {
            echo '<a href="'.$_SERVER['HTTP_REFERER'].'"><h4 class="pull-left" style="font-size: 20px;color: #e91e63"><i class="fa fa-arrow-left"></i> Back</h4></a>';
          }
         ?>
        <div class="card mrg_bottom">
          <div class="page_title_block">
            <div class="col-md-5 col-xs-12">
              <div class="page_title"><?=$page_title?></div>
            </div>
            <div class="col-md-7 col-xs-12">
              <div class="search_list">
              	<form  method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"></form>
                <div class="add_btn_primary"> <a href="add_gallery.php">Add Gallery</a> </div>
              </div>
            </div>
             <div class="clearfix"></div>
            <form id="filterForm" accept="" method="GET">
            <div class="col-md-3"> 
                <select name="filter" class="form-control select2 filter" required style="padding: 5px 40px;height: 40px;">
                    <option value="">All</option>
                    <option value="enable" <?php if(isset($_GET['filter']) && $_GET['filter']=='enable'){ echo 'selected';} ?>>Enable</option>
                    <option value="disable" <?php if(isset($_GET['filter']) && $_GET['filter']=='disable'){ echo 'selected';} ?>>Disable</option>
                  </select>
              </div>
             <div class="col-md-3"> 
                  <select name="cat_id" class="form-control select2 filter" required style="padding: 5px 40px;height: 40px;">
                    <option value="">All Category</option>
                    <?php
                      $cat_qry="SELECT * FROM tbl_category ORDER BY category_name";
                      $cat_result=mysqli_query($mysqli,$cat_qry);
                      while($cat_row=mysqli_fetch_array($cat_result))
                      {
                    ?>                       
                    <option value="<?php echo $cat_row['cid'];?>" <?php if(isset($_GET['cat_id']) && $_GET['cat_id']==$cat_row['cid']){echo 'selected';} ?>><?php echo $cat_row['category_name'];?></option>                           
                    <?php
                      }
                    ?>
                  </select>
             </div>
         	</form>
             <div class="col-md-4 col-xs-12 text-right" style="float: right;">
	          <div class="checkbox" style="width: 95px;margin-top: 5px;margin-left: 10px;right: 100px;position: absolute;">
	            <input type="checkbox" id="checkall_input">
	            <label for="checkall_input">
	                Select All
	            </label>
	          </div>
	          <div class="dropdown" style="float:right">
	            <button class="btn btn-primary dropdown-toggle btn_cust" type="button" data-toggle="dropdown">Action
	            <span class="caret"></span></button>
	            <ul class="dropdown-menu" style="right:0;left:auto;">
	              <li><a href="" class="actions" data-action="enable">Enable</a></li>
	              <li><a href="" class="actions" data-action="disable">Disable</a></li>
	              <li><a href="" class="actions" data-action="delete">Delete !</a></li>
	            </ul>
	          </div>
	        </div>
          </div>
          <div class="clearfix"></div>
          <div class="col-md-12 mrg-top">
            <div class="row">
              <?php 
	            $i=0;
	            while($row=mysqli_fetch_array($result))
	            {?>
              <div class="col-lg-4 col-sm-6 col-xs-12">
                <div class="block_wallpaper">
                  <div class="wall_category_block">
                    <h2><?php echo $row['category_name'];?></h2>
                     <div class="checkbox" style="float: right">
                      <input type="checkbox" name="post_ids[]" id="checkbox<?php echo $i;?>" value="<?php echo $row['id']; ?>" class="post_ids" style="margin: 0px;">
                      <label for="checkbox<?php echo $i;?>"></label>
                    </div>              
                  </div>
                  <div class="wall_image_title">
                    <ul>
                      <li><a href="edit_gallery.php?gallery_id=<?php echo $row['id'];?>&action=edit&redirect=<?=$redirectUrl?>" data-toggle="tooltip" data-tooltip="Edit"><i class="fa fa-edit"></i></a></li>
                      <li><a href="" class="btn_delete_a" data-action="delete" data-id="<?php echo $row['id'];?>" data-toggle="tooltip" data-tooltip="Delete"><i class="fa fa-trash"></i></a></li>

                      <?php if($row['wall_status']!="0"){?>
	                  <li><div class="row toggle_btn"><a href="javascript:void(0)" data-id="<?php echo $row['id'];?>" data-action="deactive" data-column="wall_status" data-toggle="tooltip" data-tooltip="ENABLE"><img src="assets/images/btn_enabled.png" alt="wallpaper_1" /></a></div></li>

	                  <?php }else{?>
	                  
	                  <li><div class="row toggle_btn"><a href="javascript:void(0)" data-id="<?=$row['id']?>" data-action="active" data-column="wall_status" data-toggle="tooltip" data-tooltip="DISABLE"><img src="assets/images/btn_disabled.png" alt="wallpaper_1" /></a></div></li>
	             
	                  <?php }?>
                    </ul>
                  </div>
                  <span><img src="categories/<?php echo $row['cat_id'];?>/thumbs/<?php echo $row['image'];?>" /></span>
                </div>
              </div>
          <?php $i++; }?>     
      		</div>
          </div>
           <div class="col-md-12 col-xs-12">
            <div class="pagination_item_block">
              <nav>
                <?php include("pagination.php");?>                 
              </nav>
            </div>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>
    </div>
        
<?php include("includes/footer.php");?>       

<script type="text/javascript">
 
 // For enable and disable wallpaper
 $(".toggle_btn a").on("click",function(e){
    e.preventDefault();

    var _for=$(this).data("action");
    var _id=$(this).data("id");
    var _column=$(this).data("column");
    var _table='tbl_wallpaper';

    $.ajax({
      type:'post',
      url:'processData.php',
      dataType:'json',
      data:{id:_id,for_action:_for,column:_column,table:_table,'action':'toggle_status','tbl_id':'id'},
      success:function(res){
          console.log(res);
          if(res.status=='1'){
            location.reload();
          }
        }
    });

  });

// For delete wallpaper
   $(document).on("click",".btn_delete_a",function(e){
      e.preventDefault();
      
       var _ids=$(this).data("id");
       var _for_action='delete';
       
        confirmDlg = duDialog('Are you sure?', 'All data will be removed which belong to this!', {
        init: true,
        dark: false, 
        buttons: duDialog.OK_CANCEL,
        okText: 'Proceed',
        callbacks: {
          okClick: function(e) {
            $(".dlg-actions").find("button").attr("disabled",true);
            $(".ok-action").html('<i class="fa fa-spinner fa-pulse"></i> Please wait..');
            var _table='tbl_wallpaper';

            $.ajax({
              type:'post',
              url:'processData.php',
              dataType:'json',
              data:{'id[]':_ids,'table':_table,'for_action':_for_action,'action':'multi_action'},
              success:function(res){
                location.reload();
              }
            });

          } 
        }
      });
      confirmDlg.show();
    });


// for multiple actions on news
$(document).on("click",".actions",function(e){
    e.preventDefault();

    var _ids = $.map($('.post_ids:checked'), function(c){return c.value; });
    var _action=$(this).data("action");

    if(_ids!='')
    {
      confirmDlg = duDialog('Action: '+$(this).text(), 'Do you really want to perform?', {
        init: true,
        dark: false, 
        buttons: duDialog.OK_CANCEL,
        okText: 'Proceed',
        callbacks: {
          okClick: function(e) {
            $(".dlg-actions").find("button").attr("disabled",true);
            $(".ok-action").html('<i class="fa fa-spinner fa-pulse"></i> Please wait..');
            var _table='tbl_wallpaper';

            $.ajax({
              type:'post',
              url:'processData.php',
              dataType:'json',
              data:{id:_ids,for_action:_action,table:_table,'action':'multi_action'},
              success:function(res){
                $('.notifyjs-corner').empty();
                if(res.status=='1'){
                  location.reload();
                }
              }
            });

          } 
        }
      });
      confirmDlg.show();
    }
    else{
      infoDlg = duDialog('Opps!', 'No data selected', { init: true });
      infoDlg.show();
    }
});

// Checkall inputs
   var totalItems=0;

  $("#checkall_input").click(function () {

    totalItems=0;

    $('input:checkbox').not(this).prop('checked', this.checked);
    $.each($("input[name='post_ids[]']:checked"), function(){
      totalItems=totalItems+1;
    });

    if($('input:checkbox').prop("checked") == true){
      $('.notifyjs-corner').empty();
      $.notify(
        'Total '+totalItems+' item checked',
        { position:"top center",className: 'success'}
      );
    }
    else if($('input:checkbox'). prop("checked") == false){
      totalItems=0;
      $('.notifyjs-corner').empty();
    }
  });

  var noteOption = {
      clickToHide : false,
      autoHide : false,
  }

  $.notify.defaults(noteOption);

  $(".post_ids").click(function(e){

      if($(this).prop("checked") == true){
        totalItems=totalItems+1;
      }
      else if($(this). prop("checked") == false){
        totalItems = totalItems-1;
      }

      if(totalItems==0){
        $('.notifyjs-corner').empty();
        exit();
      }

      $('.notifyjs-corner').empty();

      $.notify(
        'Total '+totalItems+' item checked',
        { position:"top center",className: 'success'}
      );
  });

    $(".filter").on("change",function(e){
    $("#filterForm *").filter(":input").each(function(){
      if ($(this).val() == '')
        $(this).prop("disabled", true);
    });
    $("#filterForm").submit();
  });

  </script>