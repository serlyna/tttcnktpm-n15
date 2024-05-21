<?php
include('main/config.php')
?>
<?php 
$id = $_GET['id'];
$query = "SELECT * FROM tin_tuc where id=$id";
          $query_run= mysqli_query($con,$query);
?>

<?php
include("header-kh.php")
?>

         <div class="col-md-12" >
             <div class="container">
                 <div class="row">
                    <div class="col-md-4">
                            <div class="card-body" style="padding-right:5%">
                              <div class="blog-post">
                                  <?php while ($row=mysqli_fetch_assoc($query_run)) 
                                    {            
                                  ?>      
                                    <h4 style="font-family:times; " class="blog-post-title"> Người đăng:<?= $row['TuaDe'];  ?></h4>
                                    <br>
                                       
                                        <p> <?php echo '<img src="img/'.$row['img'].'" alt="Image">' ?></p>                         
                                        <p> Câu hỏi: <?php echo $row['TinTuc']; ?></p>
                                        <p> </p>
								 
                           <?php } ?>
                              </div>
                            </div>
                        </div>
               

           
      
       

    <?php 
  
?>

        
        <script>
                $(document).ready(function () {
                    $(".owl-carousel").owlCarousel({
                        loop: true,
                        margin: 30,
                        responsive: {
                            0: {
                                items: 1
                            },
                            1000: {
                                items: 4
                            }
                        }
                    });
                });
            </script>
           

            <div class="col-md-6" style="margin-left:12%" >
<script src="comments.js"></script>

	<div class="container" style="width:100%">		
		<h2 style="color:#0B243B; margin-top:5%; font-family:times">Nhận xét!</h2>		
		<br>		
		<form method="POST" id="commentForm">
			<div class="form-group">
				<input type="text" style="width:300px"name="name" id="name" class="form-control" placeholder="Tên của bạn" required />
			</div>
			<div class="form-group">
				<textarea name="comment" style="width:600px" id="comment" class="form-control" placeholder="Nhận xét của bạn về tin này là gì?" rows="5" required></textarea>
			</div>
			<span id="message"></span>
			<br>
			<div class="form-group">
				<input type="hidden" name="commentId" id="commentId" value="0" />
				<input type="submit" name="submit" id="submit" class="btn btn-primary" style="background:#0B243B;" value="Đăng nhận xét" />
			</div>
		</form>		
		<br>
		<div id="showComments"></div>   
</div>	