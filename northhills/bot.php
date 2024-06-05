

<?php


$conn = mysqli_connect("localhost","root","", "lagezrwa_sach");
mysqli_set_charset($conn, 'UTF8');


if($conn){
$user_messages = mysqli_real_escape_string($conn, $_POST['messageValue']);// tra ve

$query = "SELECT * FROM chat WHERE messages LIKE '%$user_messages%'";
$runQuery = mysqli_query($conn, $query);

if(mysqli_num_rows($runQuery) > 0){
    // fetch result
    $result = mysqli_fetch_assoc($runQuery);
    // echo result
    echo $result['response'];
}else{
    echo "Nhà sách  chào bạn?";
}
}else{
    echo "connection Failed " . mysqli_connect_errno();
}
?>