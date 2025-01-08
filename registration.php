

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
    $phoneError ="";
    $birthError ="";
    $userError ="";
    $success ="";
    $exists = false;
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // if(isset($_POST['submit'])){
            $emailid = $_POST['email'];
            $passwordid = $_POST['password'];
            $phoneid = $_POST['phone'];
            $birthid = $_POST['birth'];
            $first_name = $_POST['first_name'];
            $middle_name = $_POST['middle_name'];
            $last_name = $_POST['last_name'];
            $sql2 = "Select emailid from login where emailid='$emailid'";
            $sql = "Select contact from login where contact='$phoneid'";
                $result = mysqli_query($conn,$sql);
                $result2 = mysqli_query($conn,$sql2);
                $num = mysqli_num_rows($result);
                $num2 = mysqli_num_rows($result2);

            if(empty($phoneid)){
                $phoneError ="This Field is mandatory";
            }elseif(preg_match('/[^0-9]/',$phoneid)){
                $phoneError ="This fields contain number only";
            }elseif(strlen($phoneid) > 10){
                $phoneError ="Please use correct number";
            }elseif($num == 1){
                $phoneError = "This number is already used";
            }elseif(empty($emailid)){
                $emaiError ="This Field is mandatory";
            }elseif(!preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i',$emailid)){
                $emaiError = "Please use correct email";
            }elseif($num2 == 1){
                $emailError = "This emailid is already in used";
            }elseif(empty($first_name)){
                $userError ="This Field is mandatory";
            }elseif(empty($passwordid)){
                $passwordError ="This Field is mandatory";
            }elseif(strlen($passwordid) < 6){
                $passwordError ="Use strong password";
            }else{
                $sql = "INSERT INTO `login` (`first_name`, `middle_name`, `last_name`, `DOB`, `contact`, `emailid`, `password`, `access`) VALUES ('$first_name', '$middle_name', '$last_name', '$birthid', '$phoneid', '$emailid', '$passwordid', '0')";
                    $result = mysqli_query($conn,$sql);
                    if($result){
                        $success ="Form submitted Successfully";
                    }
            }
    
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="registration.css">
</head>
<body>
    
    <form action="" method="post" class="registratin">
        <div class="form_fill">
            <div class="close">
                <a href="index.php">
                <img src="icons/cross.png" alt="creoss">
                </a>
            </div>
            <div id="_symbol">Sign Up</div>
        <label for="">
            <span>Mobile Number</span>
            <div class="_phone mr">
                <div class="country_code">
                    <!-- <div class="dropdown"> -->
                        <button class="">
                            <span class="code">+977</span>
                        </button>
                    <!-- </div> -->
                </div>
                <input type="text" name="phone" placeholder="Enter your phone number">
            </div>
        </label>
        <p ><?php echo $phoneError ?></p>
        <label for="">
            <span>Email</span>
            <input type="text" name="email" class="mr" placeholder="Enter your email">
        </label>
        <p><?php echo $emaiError ?></p>
        <label for="">
            <span>Date Of Birth</span>
            <div>
                <input type="date" name="birth" class=" mr" placeholder="dd/mm/yyyy">
            </div>
        </label>
        <p><?php echo $birthError ?></p>
        <div class=" user ">
            <div>
                <label for="">
                    <span>First Name</span>
                    <input type="text" name="first_name" class="mr" placeholder="Enter your first name">
                </label>
            </div>
            <div class="nm-m">
                <label for="">
                    <span>Middle Name (Optional)</span>
                    <input type="text" name="middle_name" class="mr" placeholder="Enter your middle name">
                </label>
            </div>
            <div class="mr_d">
                <label for="">
                    <span>Last Name</span>
                    <input type="text" name="last_name" class="mr" placeholder="Enter your last name">
                </label>
            </div>
        </div>
        <p><?php echo $userError ?></p>
        <label for="" class="mr-t">
            <span>Password</span>
            <input type="text" name="password" class="mr" placeholder="Enter your password">
        </label>
        <p><?php echo $passwordError ?></p>
        <div class="check_box">
            <input class="_check" type="checkbox">
            <label for="" class="terms">I agree to all
                <a href="">Terms & Conditions</a>
            </label>
        </div class="conform ">
        <button name="submit" class="conform_btn">Confirm</button>
        <span class="success _flex"><?php echo $success ?></span>

        </div>
    </form>
</body>
</html>