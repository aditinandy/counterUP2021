<?php

session_start();


?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php 
include 'links.php';
?>


    <link rel="stylesheet" type="text/css" href="login.css">
    <link rel="stylesheet" type="text/css" href="home.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="comment.css">
    

</head>
<body>

<?php

include 'commdb.php';

if(isset($_POST['submit'])){
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $pin = mysqli_real_escape_string($con, $_POST['pin']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);

    $pass = password_hash($password, PASSWORD_BCRYPT);
    $cpass = password_hash($cpassword, PASSWORD_BCRYPT);

    $token = bin2hex(random_bytes(15));

    $emailquery = " select  * from registration where email='$email' ";
    $query = mysqli_query($con, $emailquery);

    $emailcount = mysqli_num_rows($query);

    if($emailcount>0){
                ?>
                <script>
                    alert("Email already exist");
                </script>
                <?php
    }else{
        if($password === $cpassword){

            $insertquery = "insert into registration(username, email, mobile, password, cpassword, pin) values('$username','$email','$phone','$pass','$cpass', '$pin')";

            $iquery = mysqli_query($con, $insertquery);
            
            ?>
                <script>
                    location.replace("login1.php");
                </script>
                <?php
            
            

        }else{
            ?>
            <script>
                alert("password not matching");
            </script>
            <?php
        }
    }

}
?>



<section class="hearder">
  <div class="menu-bar">
  <nav class="navbar justify-content-between" id="navbar">
    <a href="#" class="navbar-brand"><img class="logo" src=""></a>
    <div id="mySidenav" class="sidenav">

    </div>
  </nav>
  </div>
</section>






<header id="header">

<div class="scrollmenu">
  <a href="homepage.php" class="active">Home<span class="sr-only">(current)</span></a>
  <a href="login.php" class="active"><i class="fa fa-user"></i><span class="sr-only">(current)</span></a>
  <!------<a href="cart.php" class="active"><i class="fa fa-"></i><span class="sr-only">(current)</span></a>---------->

  
  





  
  <a href="#"><i class="fa fa-facebook"></i></a>
  <a href="#contact"><i class="fa fa-twitter"></i></a>
  <a href="#about"><i class="fa fa-instagram"></i></a>
  <a href="#about"><i class="fa fa-reddit"></i></a>
  
    

  
  <a href="#blog"><i class="fa fa-google"></i></a>
  <a href="#tools"><i class="fa fa-telegram"></i></a>  
  <a href="#base"><i class="fa fa-envelope"></i></a>
  
</div>

    
                        
                        
    
</header>

<!---------<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-scroll">
    <div class="container-fluid">
        <a href="#" class="navbar-brand"><img class="logo" src="img/p0wm1a90.png"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse text-center" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="" class="nav-link text-dark">
                      Features</a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link text-dark">Pricing</a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link text-dark">FAQ</a>
                </li>
                <li class="nav-item">
                <a href="login1.php"><button class="bttn text-center">Login</button></a>
                </li>
                <li class="nav-item">
                  <a href="login.php"><button class="bttn text-center">Sign Up</button></a>
                </li>
                <li class="nav-item">
                  <a href="logout.php"><button class="bttn text-center">Logout</button></a>
                </li>
            </ul>
        </div>
    </div>
    </nav>--------------------->






    <div class="card bg-light">
        <article class="card-body mx-auto" style="max-width: 400px;">
        <h4 class="card-title text-center">Create Account</h4>
        <p class="text-center">
            Get Started With Your Free Account
        
        <!------------<a href="" class="btn btn-block btn-gmail"><i class="fa fa-google"></i>
        Login via Gmail
    </a>

    <a href="" class="btn btn-block btn-facebook"><i class="fa fa-facebook-f"></i>
        Login via Facebook
    </a>------------------>
        </p>
        <!----<p class="divider-text">
            <span class="bg-light">OR</span>
        </p>------------->
        <form action="" method="POST">
            <div class="from-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                </div>
                <input name="username" class="form-control" placeholder="User_Name" type="text" required>
            </div>
            <br>
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                </div>
                <input name="email" class="form-control" placeholder="Email" type="email" required>
            </div>
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-phone"></i></span>
                </div>
                <input id="mobile" name="phone" class="form-control" placeholder="Phone Number" type="phone" required>
            </div>

            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-address-card"></i></span>
                </div>
                <input name="pin" class="form-control" placeholder="pin" type="pin" required>
            </div>

            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-lock"></i></span>
                </div>
                <input name="password" class="form-control" placeholder="Create Password" type="password" required>
            </div>
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-lock"></i></span>
                </div>
                <input name="cpassword" class="form-control" placeholder="Conform Password" type="password" required>
            </div>
            <div class="error">
            <div class="form-group">
                <button type="submit" name="submit" class="btn-info btn-sm btn-block" value="send otp" onClick="sendOTP();">
                    Create Account
                </button>
            </div>
            </div>
    <p class="text-center">Create an account? <a href="login1.php">Log in</a></p>
            </div>
            
        </form>
        
    </article>
    </div>



    <script src="verification.js"></script>
</body>
</html>