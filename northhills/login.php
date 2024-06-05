
<?php
include('data.php');

$message = '';
if(isset($_POST["login"]))
{
 if(empty($_POST["uesname"]) || empty($_POST["password"]))
 {
  $message = "<div class='alert alert-danger'>Both Fields are required</div>";
 }
 else
 {
  $query = "
  SELECT * FROM nhanvien
  WHERE uesname = :uesname
  ";
  $statement = $connect->prepare($query);
  $statement->execute(
   array(
    'uesname' => $_POST["uesname"]
   )
  );
  $count = $statement->rowCount();
  if($count > 0)
  {
   $result = $statement->fetchAll();
   foreach($result as $row)
   {
    if($row["user_status"] == 'Active')
    {
     if(password_verify($_POST["password"], $row["password"]))
     {
      $_SESSION["type"] = $row["user_type"];
      header("location: index.php");
     }
     else
     {
      $message = '<div class="alert alert-danger">Wrong Password</div>';
     }
    }
    else
    {
     $message = '<div class="alert alert-danger">Your Account has been disabled, please contact admin</div>';
    }
   }
  }
  else
  {
   $message = "<div class='alert alert-danger'>Wrong Email Address</div>";
  }
 }
}
?>

<!DOCTYPE html>
<html>
 <head>
  <title>How to Disable Enable User Login in PHP using Ajax</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body>
  <br />
  <div class="container">
   <h2 align="center">How to Disable Enable User Login in PHP using Ajax</h2>
   <br />
   <div class="panel panel-default">
    <div class="panel-heading">Login</div>
    <div class="panel-body">
     <form method="post">
      <span class="text-danger"><?php echo $message; ?></span>
      <div class="form-group">
       <label>User Email</label>
       <input type="text" name="uesname" id="uesname" class="form-control" />
      </div>
      <div class="form-group">
       <label>Password</label>
       <input type="password" name="password" id="password" class="form-control" />
      </div>
      <div class="form-group">
       <input type="submit" name="login" id="login" class="btn btn-info" value="Login" />
      </div>
     </form>
    </div>
   </div>
   <br />
   <p>Admin email - john_smith@gmail.com</p>
   <p>Admin Password - password</p>
   <p>All user password is 'password'</p>
  </div>
 </body>
</html>