

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
    $oldError ="";
    $newError ="";
    $conformError ="";
    $success ="";
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // if(isset($_POST['submit'])){
            $old_paasword = $_POST['old_password'];
            $new_password = $_POST['new_password'];
            $conform_password = $_POST['conform_password'];
            
            if(empty($old_paasword)){
                $oldError ="This Field is mandatory";
            }elseif(empty($new_password)){
                $newError ="This Field is mandatory";
            }elseif(empty($conform_password)){
                $conformError ="This Field is mandatory";
            }elseif($new_password != $conform_password){
            // }elseif(!str_compare($new_password , $conform_password)){
                $conformError ="Conform password must be new password";
            }else{
                $sql = "Select * from login where (emailid='$old_password') ";
                $result = mysqli_query($conn,$sql);            
                if($old_paasword == $result){
                    $success ="Old password does not match";
                    // header("location: index.php");
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
            width: 400px;
            height: 450px;
            background-color: #24262b;
            display: flex;
            justify-content: center;
            border-radius:10px;
            
            
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
        }
        input{
            padding: 6px;
            /* margin: 10px; */
        }
        .check_box{
            display: flex;
            justify-content: center;
            align-items: center;
            margin-left: 15px;
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
        #close{
            /* width:20px; */
            padding:10px;
            display: flex;
            justify-content: flex-end;
            margin-top: -8px;
            /*  */
            

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
            <div id="close">
                <a href="index.php">
                    <i class="fa-duotone fa-solid fa-xmark"></i>
                </a>
            </div>
            <div id="_symbol">Change Password</div>
        
        
        <label for="" class="mr-t" style="margin-top: 10px;">
            <span>Old Password</span>
            <input type="text" name="old_password" class="mr" placeholder="Enter your old password">
        </label>
        <p><?php echo $oldError ?></p>
        
        <label for="" class="mr-t" style="margin-top: 10px;">
            <span>New Password</span>
            <input type="text" name="new_password" class="mr" placeholder="Enter your new password">
        </label>
        <p><?php echo $newError ?></p>
        <label for="" class="mr-t" style="margin-top: 10px;">
            <span>Conform Password</span>
            <input type="text" name="conform_password" class="mr" placeholder="Enter your conform password">
        </label>
        <p><?php echo $conformError ?></p>
        <div class="check_box">
            <label for="">

                <a href="">Forgot password?</a>
                <a href="">Change your password</a>
            </label>
        </div class="conform">
        <button id="cbtn" name="submit" class="conform_btn">Confirm</button>
        <span class="success _flex"><?php echo $success ?></span>

        </div>
    </form>
</body>
</html>