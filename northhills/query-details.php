<?php
session_start();
error_reporting(0);
include('main/config.php');


//updating Admin Remark
if(isset($_POST['update']))
		  {
$qid=intval($_GET['id']);
$adminremark=$_POST['adminremark'];
$isread=1;
$query=mysqli_query($con,"update tblcontactus set  AdminRemark='$adminremark',IsRead='$isread' where id='$qid'");
if($query){
echo "<script>alert('Admin Remark updated successfully.');</script>";
echo "<script>window.location.href ='read-query.php'</script>";
}
		  }
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Admin | REP</title>
		 <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800;900&display=swap"
    rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
		
	</head>
	<body>
	
		<?php include('headerad.php');
		?>

			<div class="app-content">
				
						
					
				<!-- end: TOP NAVBAR -->
				<div class="main-content" >
					<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
						<section id="page-title">
							<div class="row">
							
									<bR>
									<BR>
									<BR>
									<h2 class="mainTitle" style="text-align:center; font-family: times; color: green; margin-left:35%; margin-top:10% ">GỬI MAIL THÔNG BÁO!!!!</h2>
																	</div>
								
							</div>
						</section>
						<!-- end: PAGE TITLE -->
						<!-- start: BASIC EXAMPLE -->
						<div class="container-fluid container-fullw bg-white" style="margin-left:24%;">
						

									<div class="row">
								<div class="col-md-6" style="font-size:17px; font-family: times;">
									
									<table class="table table-hover" id="sample-table-1">
		
										<tbody>
<?php
$qid=intval($_GET['id']);
$sql=mysqli_query($con,"select * from tblcontactus where id='$qid'");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>

											<tr>
												<th style>Họ & Tên</th>
												<td><?php echo $row['fullname'];?></td>
											</tr>

											<tr>
												<th>Email </th>
												<td><?php echo $row['email'];?></td>
											</tr>
											<tr>
												<th>Số điện thoại</th>
												<td><?php echo $row['contactno'];?></td>
											</tr>
											<tr>
												<th>Message</th>
												<td><?php echo $row['message'];?></td>
												</tr>

<?php if($row['AdminRemark']==""){?>	
<form name="query" method="post">
	<tr>
												
												<a href="maill/mail.php"class="fa fa-envelope-open">Gửi mail trả lời</a></p>
												

<tr>
												
											<?php 
											 }} ?>
											
											
										</tbody>
									</table>
								</div>
							</div>
								</div>
							</div>
						</div>
						<!-- end: BASIC EXAMPLE -->
						<!-- end: SELECT BOXES -->
						
					</div>
				</div>
			</div>
			<?php
include './view-dr/footer.php'; ?>