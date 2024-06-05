<?php

//Google Code
require_once './login_gg/Google/libraries/Google/autoload.php';
//Insert your cient ID and secret 
//You can get it from : https://console.developers.google.com/
$client_id = '342805763988-1se7dl3a9ufmvq66b0hukmfkt1uki79k.apps.googleusercontent.com';
$client_secret = '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';
$redirect_uri = 'https://northhills.tk/trangdangky.php';

//incase of logout request, just unset the session var
//if (isset($_GET['logout'])) {
//    unset($_SESSION['access_token']);
//}

/* * **********************************************
  Make an API request on behalf of a user. In
  this case we need to have a valid OAuth 2.0
  token for the user, so we need to send them
  through a login flow. To do this we need some
  information from our API console project.
 * ********************************************** */
$client = new Google_Client();
$client->setClientId($client_id);
$client->setClientSecret($client_secret);
$client->setRedirectUri($redirect_uri);
$client->addScope("email");
$client->addScope("profile");

/* * **********************************************
  When we create the service here, we pass the
  client to it. The client then queries the service
  for the required scopes, and uses that when
  generating the authentication URL later.
 * ********************************************** */
$service = new Google_Service_Oauth2($client);

/* * **********************************************
  If we have a code back from the OAuth 2.0 flow,
  we need to exchange that with the authenticate()
  function. We store the resultant access token
  bundle in the session, and redirect to ourself.
 */

if (isset($_GET['code'])) {
    $client->authenticate($_GET['code']);
    $_SESSION['access_token'] = $client->getAccessToken();
    header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
    exit;
}
/* * **********************************************
  If we have an access token, we can make
  requests, else we generate an authentication URL.
 * ********************************************** */
if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
    $client->setAccessToken($_SESSION['access_token']);
} else {
    $authUrl = $client->createAuthUrl();
}
if ($client->isAccessTokenExpired()) {
    $authUrl = $client->createAuthUrl();
//            header('Location: ' . filter_var($authUrl, FILTER_SANITIZE_URL));
}

if (!isset($authUrl)) {
    $googleUser = $service->userinfo->get(); //get user info 
    if(!empty($googleUser)){
        function loginFromSocialCallBack($socialUser) {
            $con = mysqli_connect("localhost","root");
            $con->set_charset("utf8");
            if (mysqli_connect_errno()) {
                echo "Connection Fail: " . mysqli_connect_errno();
                exit;
            }
            echo '<script> alert("Bạn cần điền thông tin để đăng nhập !!'.$socialUser['email'].'"); </script>';
            $result = mysqli_query($con, "Select * from `khachhang` WHERE `emailkh` ='" . $socialUser['email'] . "'");
            
            if ($result->num_rows == 0) {
                $result = mysqli_query($con, "INSERT INTO `khachhang` (usename,password,tenkh,`emailkh`) VALUES ( '" . $socialUser['email'] . "','123456','" . $socialUser['name'] . "', '" . $socialUser['email'] . "');");
                if (!$result) {
                    echo mysqli_error($con);
                    exit;
                }
                $result = mysqli_query($con, "Select * from `khachhang` WHERE `emailkh` ='" . $socialUser['email'] . "'");
            }
            if ($result->num_rows > 0) {
                $user = mysqli_fetch_assoc($result);
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }
                header('Location: ./indexkh.php');
            }
        }
        
        function validateDateTime($date) {
            //Kiểm tra định dạng ngày tháng xem đúng DD/MM/YYYY hay chưa?
            preg_match('/^[0-9]{1,2}-[0-9]{1,2}-[0-9]{4}$/', $date, $matches);
            if (count($matches) == 0) { //Nếu ngày tháng nhập không đúng định dạng thì $match = array(); (rỗng)
                return false;
            }
            $separateDate = explode('-', $date);
            $day = (int) $separateDate[0];
            $month = (int) $separateDate[1];
            $year = (int) $separateDate[2];
            //Nếu là tháng 2
            if ($month == 2) {
                if ($year % 4 == 0) { //Nếu là năm nhuận
                    if ($day > 29) {
                        return false;
                    }
                } else { //Không phải năm nhuận
                    if ($day > 28) {
                        return false;
                    }
                }
            }
            //Check các tháng khác
            switch ($month) {
                case 1:
                case 3:
                case 5:
                case 7:
                case 8:
                case 10:
                case 12:
                    if ($day > 31) {
                        return false;
                    }
                    break;
                case 4:
                case 6:
                case 9:
                case 11:
                    if ($day > 30) {
                        return false;
                    }
                    break;
            }
            return true;
        }
        loginFromSocialCallBack($googleUser);
    }
}
//End Google Code
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Trang chủ</title>
        <link rel="stylesheet" type="text/css" href="main/indexkh.css"/>
    </head>
    <body>
       
                  <?php
                    include("dangky.php");
//                ?>
            </div>
       
    </body>
</html>
