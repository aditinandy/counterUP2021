<?php

session_start();
ob_start();

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="login.css">
    <link rel="stylesheet" type="text/css" href="login1.css">
    <link rel="stylesheet" type="text/css" href="home.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="comment.css">
    <?php 
include 'links.php';
?>

    <title>Document</title>
</head>
<body>

<?php

include 'commdb.php';

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $email_search = " select * from registration where email='$email' ";
    $query = mysqli_query($con, $email_search);

    $email_count = mysqli_num_rows($query);


    if($email_count){
        $email_pass = mysqli_fetch_assoc($query);
        
        $db_pass = $email_pass['password'];

        $_SESSION['username'] = $email_pass['username'];

        $pass_decode = password_verify($password, $db_pass);

        if($pass_decode){


            if(isset($_POST['rememberme'])){

                setcookie('emailcookie', $email, time()+86400);
                setcookie('passwordcookie', $password, time()+86400);

                ?>
                <script>
                    location.replace("homepage.php");
                </script>
                <?php
            }else{
                ?>
                <script>
                    location.replace("homepage.php");
                </script>
                <?php
            }

        }else{
            ?>
            <script>
                alert("Password Incorrect");
            </script>
            <?php
        }
    }else{
        ?>
        <script>
            alert("Invalid Email");
        </script>
        <?php
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

<!---------------<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-scroll">
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
</nav>------------------------------------>




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
    </a>---------->
        </p>
        <!------------<p class="divider-text">
            <span class="bg-light">OR</span>
        </p>------------>
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
            
            
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                </div>
                <input name="email" class="form-control" placeholder="Email" type="email" value="<?php if(isset($_COOKIE['emailcookie']))  echo $_COOKIE['emailcookie']; ?>" required>
            </div>
            
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-lock"></i></span>
                </div>
                <input name="password" class="form-control" placeholder="Create Password" type="password" value="<?php if(isset($_COOKIE['passwordcookie']))  echo $_COOKIE['passwordcookie']; ?>" required>
            </div>

            <div class="form-group">
                <input name="rememberme" type="checkbox"> Remember Me
            </div>
            
            <div class="form-group">
                <button type="submit" name="submit" class="btn-info btn-sm btn-block">
                    Login Now
                </button>
            </div>
    <p class="text-center">Create an account? <a href="login.php">Sign Up</a></p>
            </div>
            
        </form>
        
    </article>
    </div>



    




</body>
</html>