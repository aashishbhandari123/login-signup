<?php
  session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Login and Signup Forms</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <?php include 'style.php' ?>
    <?php include 'links.php' ?>
  <style>
    .container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
  </style>
</head>
<body>

<?php

include 'dbcon.php';

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $email_search = " select * from registration where email='$email' ";
    $query = mysqli_query($con,$email_search);

    $email_count = mysqli_num_rows($query);

    if($email_count){
        $email_pass = mysqli_fetch_assoc($query);
        $db_pass = $email_pass['password'];

        $_SESSION['username'] = $email_pass['username'];

        $pass_decode = password_verify($password, $db_pass);
        if($pass_decode){
            echo "login Successful";
            ?>
            <script>
                location.replace("home.php");
            </script>
            <?php
        }else{
            echo "Password Incorrect";
        }
    }else{
        echo "Invalid Email";
    }
}

?>

  <div class="container">
    <div class="card bg-light">
      <article class="card-body mx-auto" style="max-width: 400px;">
        <h4 class="card-title mt-3 text-center">Create Account</h4>
        <p class="text-center">Get started with your free account</p>
        <p>
          <a href="" class="btn btn-block btn-gmail"> <i class="fa fa-google"></i> Login via Gmail</a>
          <a href="" class="btn btn-block btn-facebook"> <i class="fa fa-facebook-f"></i>  Login via Facebook</a>
        </p>
        <p class="divider-text">
          <span class="bg-light">OR</span>
        </p>
        <form action="" method="POST"> 
          <div class="form-group input-group">
            <div class="input-group-prepend">
            <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
            </div> 
            <input name="email" class="form-control" placeholder="Email address" type="email" required>
          </div> <!--form-group//-->
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
            </div>
            <input class="form-control" placeholder="Password" type="password" name="password" required>
          </div>  <!--form-group//-->
          <div class="form-group">
            <button type="submit" name="submit" class="btn btn-primary btn-block"> Log In </button>
          </div>  <!--form-group//-->
          <p class="text-center">Don't have an account? <a href="regis.php">Sign Up</a></p>
        </form>
      </article>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
