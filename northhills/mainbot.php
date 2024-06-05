<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Chating Bot</title>
  
</head>
<style>
    *
{
    padding: 0;
    margin: 0;
    font-family: sans-serif;
    box-sizing: border-box;
}
#container
{
    height: 100vh;
    width: 100%;
    position: relative;
    display: grid;
    place-items: center;
    background: #f6f6f6;
    overflow: hidden;
}
#dot1
{
    height: 900px;
    width: 900px;
    position: absolute;
    top: -200px;
    right: -200px;
    background-image: url(./img/sh3.jpg);
    border-radius: 50%;
}
#dot2
{
    height: 900px;
    width: 900px;
    position: absolute;
    bottom: -200px;
    left: -200px;
    background-image: url(./img/sh3.jpg);
    border-radius: 50%;
}
#screen
{
    height: 670px;
    width: 400px;
    border-radius: 30px;
    background: #efeff3;
    border-radius: 25px;
    border: 15px solid #fff;
    box-shadow: 3px 3px 15px rgba(0,0,0,0.2);
    position: relative;
    overflow: hidden;
}
#header
{
    height: 80px;
    width: 100%;
    position: absolute;
    top: 0;
    left: 0;
    background: #21237a;
    display: grid;
    place-items: center;
    font-size: 25px;
    color: #fff;
    font-weight: bold;
    text-shadow: 1px 1px 2px #000000a1;
}
#messageDisplaySection
{
    height: 450px;
    width: 100%;
    position: absolute;
    left: 0;
    top: 100px;
    padding: 0 20px;
    overflow-y: auto;
}
.chat
{
    min-height: 40px;
    max-width: 70%;
    padding: 15px;
    border-radius: 10px;
    margin: 15px 0;
}
.botMessages
{
    background: #21237a;
    color: #fff;
    text-shadow: 1px 1px 2px #000000d4;
}
#messagesContainer
{
    height: auto;
    width: 100%;
    display: flex;
    justify-content: flex-end;
}
.usersMessages
{
    background: #00000010;
}
#userInput
{
    height: 50px;
    width: 90%;
    position: absolute;
    left: 5%;
    bottom: 3%;
    background: rgb(245, 235, 235);
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 2px 2px 8px rgba(0,0,0,0.1);
}
#messages
{
    height: 50px;
    width: 90%;
    position: absolute;
    left: 0;
    border: none;
    outline: none;
    background: transparent;
    padding: 0px 15px;
    font-size: 17px;
}
#send
{
    height: 50px;
    width: 24%;
    position: absolute;
    right: 0;
    border: none;
    outline: none;
    display: grid;
    place-items: center;
    color: #fff;
    font-size: 20px;
    background: #21237a;
    cursor: pointer;
    display: none;
}
    </style>
<body>
    <div id="container">
        <div id="dot1"> 
            
        </div>
        <div id="dot2">
       
        </div>
        <div id="screen">
            <div id="header">ONLINE CHAT</div>
            <div id="messageDisplaySection">
                <!-- bot messages -->
                <!-- <div class="chat botMessages">Hello there, how can I help you?</div> -->

                <!-- usersMessages -->
                <!-- <div id="messagesContainer">
                <div class="chat usersMessages">I need your help to build a website.</div>
            </div> -->
        </div>
            <!-- messages input field -->
            <div id="userInput">
                <input type="text" name="messages" id="messages" autocomplete="OFF" placeholder="Nhập tại đây" required>
                <input type="submit" value="Send" id="send" name="send">
            </div>
        </div>
        
    </div>

    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    
    <!-- Jquery Start -->
    <script>
        $(document).ready(function(){
            $("#messages").on("keyup",function(){

                if($("#messages").val()){
                    $("#send").css("display","block");
                }else{
                    $("#send").css("display","none");
                }
            });
        });
        // 
        $("#send").on("click",function(e){
            $userMessage = $("#messages").val();
            $appendUserMessage = '<div  class="chat usersMessages">  <img src="./img/avt.png" alt="image" class="col-md-3 col-sm-3 float-right img-avata mediaImg" style="width:30px;">'+  $userMessage +'</div>';
            $("#messageDisplaySection").append($appendUserMessage);

            // sử dụng ajax 
            $.ajax({
                url: "bot.php",
                type: "POST",
                // sending data
                data: {messageValue: $userMessage},
                // response text
                success: function(data){
                    // show response
                    $appendBotResponse = '<div id="messagesContainer"><div class="chat botMessages">'+data+'</div></div>';
                    $("#messageDisplaySection").append($appendBotResponse);
                }
            });
            $("#messages").val("");
            $("#send").css("display","none");
        });
    </script>
</body>
</html>