<?php

include 'function.php';
$p = new Mclass_dr;

if(isset($_POST['on'])):
	$makh = $_POST['makh'];
	$sql = "update khachhang set account = 'active' where makh = '$makh' ";
	$p->multipleFunc($sql);
endif;
if(isset($_POST['off'])):
	$id_doctor = $_POST['makh'];
	$sql = "update khachhang set account = 'unactive' where makh = '$makh' ";
	$p->multipleFunc($sql);
endif;	

if(isset($_POST['search'])):

	if(!empty($_POST['tenkh'])):
		$tenkh = $_POST['tenkh'];
		$sql = "select * from khachhang by tenkh, account asc";
		// order by b.id_khoa asc"
		if(!empty($_POST['account'])):
			$account = $_POST['account'];
			$sql = "select * from khachhang by account";	
		endif;
		$allkh = $p->show_all_doctor($sql);	
	elseif(!empty($_POST['account'])):
		$account = $_POST['account'];
		$sql = "select * from khachhang by account asc ";	
		$allkh = $p->show_all_doctor($sql);
	else:
		$sql = "select * from khachhang by diachikh,account asc";	
		$allkh = $p->show_all_doctor($sql);		
	endif;	
else:
	$sql = "select * from khachhang  by emailkh ,account asc";	
	$allkh = $p->show_all_doctor($sql);					
endif;	
?>

<?php

?>
<style>
	  body{
    font-family:times;
  }
  </style>
<br>

<marquee style="color: blue; font-size:25px;   text-shadow: 5px 2px 4px grey;">---QUẢN LÝ TÀI KHOẢN BÁC SĨ!!!---</marquee>
<hr style="width:200px">

<div class="container">
	<div class="row">
		<div class="col-7">
			<div class="row" >
			
			<form action="qlykh.php" method="POST" class="form-inline">
				
			
		
				<select class="custom-select custom-select-sm m-1" name="account">
				  <option value="">Quyền truy cập</option>
				  <option value="active"
				  <?php 
				  	if(isset($_POST['search'])):
				  		if($_POST['account'] == 'active'):
				  			echo "selected";
				  		endif;	
				  	endif;	
				  ?>>Có quyền truy cập</option>
				  <option value="unactive"<?php 
				  	if(isset($_POST['search'])):
				  		if($_POST['account'] == 'unactive'):
				  			echo "selected";
				  		endif;	
				  	endif;	
				  ?>>Không được phép</option>
				</select>
				<button class="btn btn-outline-info py-0 m-1" type="submit" name="search">Tìm kiếm</button>
			</form>	
			</div>
		</div>
		<!--<div class="col-4 text-right mt-3"><a href="add_doctor.php" class="btn btn-outline-primary">Thêm bác sĩ</a></div>-->
	</div>

	<div class="row">
		<table class="table table-bordered text-center">
		  <thead class="table-info">
		    <tr>
		      <th scope="col">STT</th>
			  <th scope="col">ID</th>
		      <th scope="col">Họ và Tên</th>
		      <th scope="col">Chuyên khoa</th>
		      <th scope="col">Khu vực làm việc</th>
		      <th scope="col">Thông tin chi tiết</th>
			  <th scope="col">Mật khẩu</th>
		      <th scope="col">Cấp phát quyền.</th>
		    </tr>
		  </thead>
		  <tbody>
		<?php
			if(!empty($allkh)):
				foreach ($allkh as $key => $val) {
					$key++;
		?>			
		    <tr>
		      <th scope="row"><?php echo $key;?></th>
			  <td><?php echo $val['makh'];?></td>
		      <td><?php echo $val['tenkh'];?></td>
		      <td><?php echo $val['emailkh'];?></td>
		      
				    
				
				<td><button class="btn btn-outline-info py-0" data-toggle="modal" data-target="#chitiet<?php echo $key;?>">Reset</button>
		      	<div class="modal fade" id="chitiet<?php echo $key;?>" tabindex="-1" role="dialog" aria-hidden="true">
				  <div class="modal-dialog modal-dialog-centered">
				    <div class="modal-content">
				      <div class="modal-body text-left">
				      	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				       
				        
		      <td>
		      	
		      	<?php
		      		if($val['account'] =='active'):
		      	?>
		      	<button class="btn btn-outline-danger py-0" data-toggle="modal" data-target="#unactive_modal<?php echo $key;?>">Hủy quyền truy cập</button>
		      	<!-- modal OFF -->
		      	<div class="modal fade" id="unactive_modal<?php echo $key;?>" tabindex="-1" role="dialog" aria-hidden="true">
				  <div class="modal-dialog modal-dialog-centered">
				    <div class="modal-content">
				      <div class="modal-body">
				        <p class="m-0">Vô hiệu hóa tài khoản này?</p>
				        <small>Lưu ý:Sau khi vô hiệu hóa tài khoản,người dùng sẽ không thể truy cập vào hệ thống.</small>
				      </div>
				      <div class="modal-footer">
				      	<form action="manage_doctor.php" method="POST">
				      		<input type="hidden" name="id_doctor" value="<?php echo $val['id_doctor'] ;?>" >
				        	<button type="submit" class="btn btn-danger py-0" name="off">Xác nhận</button>
				        </form>
				        <a href="#" class="btn btn-secondary py-0" data-dismiss="modal">Đóng</a>
				      </div>
				    </div>
				  </div>
				</div>
				<!-- end modal OFF -->
		      	<?php	
		      		else:
		      	?>
		      	<button class="btn btn-outline-success py-0" data-toggle="modal" data-target="#active_modal<?php echo $key;?>">Cho phép truy cập</button>
		      	<!-- modal ON -->
		      	<div class="modal fade" id="active_modal<?php echo $key;?>" tabindex="-1" role="dialog" aria-hidden="true">
				  <div class="modal-dialog modal-dialog-centered">
				    <div class="modal-content">
				      <div class="modal-body">
				        <p class="m-0">Kích hoạt tài khoản này?</p>
				        <small>Lưu ý:Sau khi kích hoạt tài khoản,người dùng có quyền truy cập vào hệ thống.</small>
				      </div>
				      <div class="modal-footer">
				      	<form action="manage_doctor.php" method="POST">
				      		<input type="hidden" name="id_doctor" value="<?php echo $val['id_doctor'] ;?>" >
				      		<button type="submit" class="btn btn-success py-0" name="on">Xác nhận</button>
				      	</form>	
				        <a href="#" class="btn btn-secondary py-0" data-dismiss="modal">Đóng</a>
				      </div>
				    </div>
				  </div>
				</div>
				<!-- end modal ON -->		
		      	<?php	
		      		endif; 
		      	?>
		      </td>
		    </tr>
		<?php	}
			endif; 
		?>    
		  </tbody>
		</table>
	</div>
</div>
<?php
include './view-dr/sidebar_end.php';
?>
<?php
include './view-dr/footer.php'; ?>