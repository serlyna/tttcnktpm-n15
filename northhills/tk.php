<?php
include("main/cf.php");
?>
<?php include 'headerad.php';


?>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
     

        <!-- top navigation -->
          <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main"> 
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">					
						<div class = "x-panel">
				 
		  
      	<p style="color:green; margin-left:36%; margin-top:30px; font-size:24px; font-family:times"> THỐNG KÊ DOANH THU</p> 
        
	     
               <br>   
                  
				  <a class = "btn btn-success btn-print" href = "" onclick = "window.print()"><i class ="glyphicon glyphicon-print"></i> Print </a> <br>
          <br>
						
						
                  <table class="table table-bordered table-striped" style="font-size:15px;">
                    <thead>
					
                      <tr >
					  
                        <th >Mã đơn hàng</th>
                        <th >Mã khách hàng</th>
						
            						<th>Ngày đặt</th>
            						<th>Tổng</th>
                     
            						
                       
                      </tr>
                    </thead>
                    <tbody>
							<?php
									
									$query=mysqli_query($con,"select * from donhang where tinhtrang='Nhận hàng - hoàn tất đơn hàng' ")or die(mysqli_error());
									$grand=0;
									while($row=mysqli_fetch_array($query)){
										$total=$row['tongtien'];
										$grand+=$total;
                
							?>
                      <tr>
                        <td><?php echo $row['madh'];?></td>
                        <td><?php echo $row['makh'];?>
                      </td>
                      
						
						<td><?php echo $row['ngaydat'];?></td>
						<td><?php echo number_format($total,2);?></td>
					  
                       
                      </tr>

<?php }?>					  
                    </tbody>
                    <tfoot>
                      <tr>
                        <th colspan="3">Total</th>
                        
						
						<th colspan="2"><?php echo number_format($grand,2);?></th>
						
                        
                      </tr>					  
                    </tfoot>
                  </table>
                </div>
						</div>
				</div>
			</div>
        </div>		
        <!-- /page content -->
	
        <!-- footer content -->
        <footer>
          <div class="pull-right">
       
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

	
    <!-- /gauge.js -->
  </body>
</html>
