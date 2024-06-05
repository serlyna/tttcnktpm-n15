<style>
  .news-box-down a{
    color:black;
    font-family:times;
    font-weight:bold;
    font-size:22px;
    font-style:italic;
  }
  </style>
<?php
include_once('main/config.php');
$query1 = "SELECT * FROM tin_tuc";
          $tt_run= mysqli_query($con,$query1);
		  ?>


<?php
include('header-kh.php');
?>
 <div id="news">
        <div class="container">
			<br>

          <h4 class="heading text-center" style="color:#0b243b; font-weight:bold; font-size:20px;">CỘNG ĐỒNG THẢO LUẬN VỀ SÁCH</h4>
          <a href="tin_tucsa.php">  <img src="img/post.gif" style="width:10%; margin-left:45%"> </a>
          <br>
          <Br>
          <div class="row">
              

          <?php 
          

                while ($row=mysqli_fetch_assoc($tt_run)) 
                { ?>   
            <div class="col-md-4">
              <div class="news-box">
                <div class="news-box-up">
                  <a href="<?php echo  "tin-tucct.php?id=".$row['id']; ?>" class="news-box-img"  style="width:250px; height:450px;">
                    <?php echo '<img src="img/'.$row['img'].'" alt="Image">' ?></a>
                </div>
                <div class="news-box-down" >
                  <a href="<?php echo "tin-tucct.php?id=".$row['id']; ?>">Người đăng: <?php echo $row['TuaDe']; ?></a>
                </div>
              </div>
            </div>
           <?php     
          
                                                    } 
                                                ?>
            
            
          </div>
        </div>
      </div>
      <BR>
      <BR>