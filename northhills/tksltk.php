
<?php
include('main/cf.php');
include("nvk.php");
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
     
                  <br>
                  <p style="margin-left:30%; margin-top:20px; color:green;  font-family:times; font-size:24px;"> DANH SÁCH SỐ LƯỢNG SÁCH TRONG KHO</p>
				  <a class = "btn btn-success btn-print" href = "" onclick = "window.print()"><i class ="glyphicon glyphicon-print" ></i> Print</a><br><br>
							
						
                  <table class="table table-bordered table-striped" style="font-size:15px;">
                    <thead>
					
                      <tr style="font-size:17px;">
					  
                        <th style="color:black; height:40px;">Tên Sách</th>
                        <th style="color:black;">Số Lượng</th>
						
            						<th style="color:black;">Giá Sách</th>
            						<th style="color:black;" >Total</th>
            						<th style="color:black;">Ghi chú</th>
                       
                      </tr>
                    </thead>
                    <tbody>
							<?php
									
									$query=mysqli_query($con,"select * from sach")or die(mysqli_error());
									$grand=0;
                                   
									while($row=mysqli_fetch_array($query)){
										$total=$row['soluong']*$row['gia'];
										$grand+=$total;
							?>
                      <tr>
                        <td><?php echo $row['tensach'];?></td>
                        <td><?php echo $row['soluong'];?></td>
						
						<td><?php echo $row['gia'];?></td>
						<td><?php echo number_format($total,2);?></td>
						
						<td class="text-center" style="color:red; " ><?php if ($row['soluong']<= 11 )echo "<span class='badge bg-red' ><i class='glyphicon glyphicon-refresh' >Vui lòng nhập thêm</i></span>";?></td>
                       
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
         

          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

	<?php include 'footernvk.php';?>
    <!-- /gauge.js -->
  </body>
</html>
