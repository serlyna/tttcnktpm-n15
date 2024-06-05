<?php
session_start();
error_reporting(0);
include('main/config.php');




?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Admin | ORDER</title>
		
	 <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800;900&display=swap"
    rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
		
	
<?php include('headerad.php');
?>
<style>
	  body{
    
  }
 
  </style>
<br>
			<div class="app-content">
				
					
					
				<!-- end: TOP NAVBAR -->
				<div class="main-content" >
					<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
						<section id="page-title">
							<div class="row">
								<div class="col-sm-12">
									
								<h2 class="mainTitle" style="text-align:center; color:blue;  font-family:times"> SÁCH KHÁCH HÀNG MONG MUỐN!!</h2>
									
																	</div>
								
							</div>
						</section>
						<br>

						<!-- end: PAGE TITLE -->
						<!-- start: BASIC EXAMPLE -->
						<div class="container-fluid container-fullw bg-white">
						

									<div class="row">
								<div class="col-md-12">
								
									<table class="table table-hover" id="sample-table-1" style="font-size:15px;">
										<thead>
											<tr>
												<th class="center">STT</th>
												<th>Name</th>
												<th class="hidden-xs">E-mail</th>
												<th>Số điện thoại </th>
												<th>Tên sách </th>
												<th>Action</th>
												
											</tr>
										</thead>
										<tbody>
<?php
$sql=mysqli_query($con,"select * from tblcontactus where IsRead is null");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>

											<tr>
												<td class="center"><?php echo $cnt;?>.</td>
												<td class="hidden-xs"><?php echo $row['fullname'];?></td>
												<td><?php echo $row['email'];?></td>
												<td><?php echo $row['contactno'];?></td>
												<td><?php echo $row['message'];?></td>
												
												<td >
												<div class="visible-md visible-lg hidden-sm hidden-xs">
							<a href="query-details.php?id=<?php echo $row['id'];?>" class="btn btn-transparent btn-lg" title="View Details"><i class="fa fa-heart"></i></a>
												</div>
												
														
														</ul>
													</div>
												</div></td>
												
											</tr>
											
											<?php 
$cnt=$cnt+1;
											 }?>
											
											
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
			<!-- start: FOOTER -->
	
			<!-- end: FOOTER -->
		
			<!-- start: SETTINGS -->
	
	</body>
</html>
