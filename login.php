

<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "cinema";

$conn = mysqli_connect($servername, $username, $password, $database);
if(!$conn){
    die("Sorry your connection is failed");
}
// echo "connection wa successful";
?>
 
<?php
    $emaiError ="";
    $passwordError ="";
    $success ="";
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // if(isset($_POST['submit'])){
            $emailid = $_POST['email'];
            $passwordid = $_POST['password'];
            $phoneid = $_POST['email'];
            
            if(empty($emailid)){
                $emaiError ="This Field is mandatory";
            }if(empty($passwordid)){
                $passwordError ="This Field is mandatory";
            }else{
                $sql = "Select * from login where ( contact='$phoneid' or emailid='$emailid') AND password='$passwordid'";
                $result = mysqli_query($conn,$sql);
                $num = mysqli_num_rows($result);
            
                if($num ==1){
                    session_start();
                    // $_SESSION['email'] =$emailid;
                    header("location: dashboard.php");
                }else{
                    $success ="Invalid Your Login Credencials";
                }
            }
        }
    // }
?>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // include("cinema/database.php");
    // $phone = $_POST[""]
    // $emailid = $_POST['email'];
    // $passwordid = $_POST['password'];
    // $phoneid = $_POST['phone'];
   
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- <link rel="stylesheet" href="registration.css"> -->
    <style>
        body{
            width: 100%;
            height: 600px;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 0;
            margin: 0;
            /* color: white; */
            /* font-family:-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans","Liberation Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji"; */
            /* font-size: small; */
        }
        .form_fill{
            /* width: 82%; */
            color: white;
            padding: 30px;
            justify-content: center;
            margin-left:-10px
            

        }
        form{
            width: 350px;
            height: 400px;
            background-color: #24262b;
            display: flex;
            justify-content: center;
            border-radius:5px;
            
            
        }
        label{
            width: 100%;
            /* height: 40px; */
            /* display; */
            /* padding: 1px; */
        }
        button{
            background-color: transparent;
            /* width:auto; */
            /* height: 30px; */
            padding: 8px;
            border: none;
            margin-left:40px;
            /* margin-right: 100px; */
        }
        .code{
            /* height: 25px; */
            display: flex;
            justify-content: center;
            align-items: center;
            
        }
        span{
            color: white;
            width: 100%;
            font-size: 15px;
        }
        .mr{
            margin-top: 5px;
        }
        .mr_d{
            margin-bottom:5px;
        }
        
        input{
            width: 100%;
            height: 30px;
            border-radius: 10px;
            border: 1px solid white;
            opacity: 0.6;
            background-color: transparent;
            /* margin */
        }
        ._flex{
            display: flex;
            justify-content: center;
            align-items: center;
        }
        ._phone{
            display: flex;
        }
        ._phone .country_code{
            /* width: 10%; */
            margin-right: 8px;
            border: 1px solid white;
            opacity: 0.6;
            border-radius: 8px;
        }
        .user .nm-m{
            margin: 0px 16px 0px 16px;
            /* width: 40px; */
        }
        #_symbol{
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top:-10px;
            margin-bottom:20px;
            color: #00aad3;
        }
        input{
            padding: 6px;
            /* margin: 10px; */
        }
        .check_box{
            display: flex;
            justify-content: center;
            align-items: center;
            margin-left: 40px;
            /* margin-top:10px; */
        }
        .check_box label a{
            color: #00aad3;
            font-size:small;
            
        }
        
        input[type="date"]{
            color: white;
            opacity: 0.3;
            font-size: medium;
        }
        input[type=text],input[type=password]{
            color: white;
        }
        
        .conform_btn{
            width: 80%;
            height:40px;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #00aad3;
    
        }
        .close{
            /* width:100%; */
            padding:10px;
            padding-right: 0px;
            display: flex;
            justify-content: flex-end;
            margin-top: -20px;
            /* margin-left: 30px; */
            /* margin-bottom: 20px; */
            margin-right: -30px;
            /*  */
            

        }
        .close img{
            width: 15px;
        
        }
        .conform{
            margin-top: 20px;
        }
        i{
            color:white;
            background-color: transparent;
        }
        #cbtn{
            margin-top: 10px;
            margin-left: 30px;
        }
        p , .success{
            height:5px;
            color:rgb(179, 58, 58);
            margin-top: 2px;
            font-size: small;
        }
        .success{
            margin-top:10px;
        }
    </style>
</head>
<body>
    <form action="" method="post" class="registratin">
        <div class="form_fill">
            <div class="close">
                <a href="index.php">
                    <img src="icons/cross.png" alt="">
                </a>
            </div>
            <div id="_symbol">Login</div>
        
        <label for="">
            <span>Email</span>
            <input type="text" name="email" class="mr" placeholder="Enter your email/phone">
        </label>
        <p><?php echo $emaiError ?></p>
        
        <label for="" class="mr-t" style="margin-top: 10px;">
            <span>Password</span>
            <input type="password" name="password" class="mr" placeholder="Enter your password">
        </label>
        <p><?php echo $passwordError ?></p>
        <div class="check_box">
            <label for="">

                <a href="">Forgot password?</a>
                <a href="registration.php">Create new</a>
            </label>
        </div class="conform">
        <button id="cbtn" name="submit" class="conform_btn">Confirm</button>
        <span class="success _flex"><?php echo $success ?></span>

        </div>
    </form>
</body>
</html>