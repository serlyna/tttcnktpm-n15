<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
<?php
session_start();
error_reporting(0);
include('main/config.php');



?>
<?php

?>
 <?php

include 'header-kh.php';

?>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" >
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thêm câu hỏi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="tin_tuc_codesa.php" method="POST" enctype=multipart/form-data>

        <div class="modal-body">   
           <div class="form-group">
                <label>Tên người đăng </label> 
                <input type="text" name="tua_de" class="form-control" required >
            </div>
            <div class="form-group">
                <label>Hình Ảnh </label>
                <input type="file" name="image"  id="anh" class="form-control" required >
            </div>       
           
            <div class="form-group">
                <label>Điều muốn hỏi</label>
                <textarea name="tin_tuc" id="tt" rows="15"  class="form-control" required></textarea>                
            </div>           
            
            
        </div>
        <div class="modal-footer">           
            <button type="submit" name="add_tt" class="btn btn-primary">Lưu</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
        </div>
      </form>

    </div>
  </div>
</div>

<br>
<div class="container-fluid" style="width:1050px; ">
<h1 class="h3 mb-2 text-gray-800" style="margin-left:35%; color:#0b243b; font-family:times">BẠN MUỐN TRAO ĐỔI ĐIỀU GÌ</h1>

 <?php 
        if(isset($_SESSION['success'])&& $_SESSION['success']!='')
        {
          echo '
          <div class="alert alert-success">
            '.$_SESSION['success'].'
          </div>'
          ;
          unset($_SESSION['success']);
        }

        if(isset($_SESSION['status'])&& $_SESSION['status']!='')
        {
          echo '
          <div class="alert alert-danger">
            '.$_SESSION['status'].'
          </div>';
          unset($_SESSION['status']);
        }
?>
<!-- DataTales Example -->
<div class="card shadow mb-4" style="margin-left:100px;">
  <div class="card-header py-3" >    
      <button style="background-color:white; color:blue;"type="button" id="add_button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
        Thêm câu hỏi trao đổi
      </button>     
  </div>
        <div class="card-body"  style="width:100%;">      
         <div class="table-responsive">

        <?php  
          
          $query = "SELECT * FROM tin_tuc order by id desc";
          $query_run= mysqli_query($con,$query);
        ?>
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <div class="row">
          <form action="" method="post" >
            <div class="col-sm-12 col-md-6">
            <div id="dataTable_filter" class="dataTables_filter">            
            <a href="congdong.php">Quay lại trang cộng đồng </a>     
                
            </div>
          </div>           
          </form>         
        </div>
        <br>
        <thead align="center"> Bảng danh sách câu hỏi trong cộng đồng trao đổi
          <tr>
           <th>STT </th>
           <th>Tên người đăng </th>
           <th>Câu hỏi trao đổi </th>
           <th style="width: 200px">Hình Ảnh</th>                    
		   
                       
          
                 
          </tr>
        </thead>
        <tbody>

        <?php 
        if(mysqli_num_rows($query_run)>0)
        {
          $serial_number=0;
         
          while ($row=mysqli_fetch_assoc($query_run)) 
          {
             $serial_number++;
            
            ?>      
            <tr>
                  <th><?php echo $serial_number; ?> </th>
                  <th><?php echo $row['TuaDe']; ?></th>
                  <td> <?php echo $row['TinTuc']; ?></td>
                  <td> <?php echo '<img src="img/'.$row['img'].'" width="150px;" height="150px" alt="Image">' ?></td>
                
                 
      
                  
                
              </tr>
      <?php     
          }
        }
        else{
          echo "No record found";
        } 
      ?>
          
      
        
        </tbody>
      </table>

    </div>
  </div>
</div>
    
      </div>
     


 <?php 
 
 


  