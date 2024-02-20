<!DOCTYPE html>
<html>
<head>
  <title>Signup Form</title>
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
        $username = mysqli_real_escape_string($con, $_POST['username']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $mobile = mysqli_real_escape_string($con, $_POST['mobile']);
        $password = mysqli_real_escape_string($con,$_POST['password']);
        $cpassword = mysqli_real_escape_string($con,$_POST['cpassword']);

        $pass = password_hash($password, PASSWORD_BCRYPT);
        $cpass = password_hash($cpassword, PASSWORD_BCRYPT);

        $email_query = " select * from registration where email='$email' ";
        $query = mysqli_query($con,$email_query);

        $emailcount = mysqli_num_rows($query);

        if($emailcount>0){
            echo "Email already exist";
                 
        }else{
            if($password === $cpassword){

                $insertquery = " insert into registration( username, email, mobile, password, cpassword) values ('$username', '$email',
                '$mobile', '$pass', '$cpass') ";

                $iquery = mysqli_query($con, $insertquery);
                
                if($iquery){
                    ?>
                    <script>
                        alert("Data inserted successful");
                    </script>
                    <?php
                }else{
                    ?>
                    <script>
                        alert("No data inserted");
                    </script>
                    <?php
                }
            

            }else{
                ?>
                <script>
                    alert("Password are not matching");
                </script>
                <?php
            }
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
              <span class="input-group-text"> <i class="fa fa-user"></i> </span>
            </div>
            <input name="username" class="form-control" placeholder="Full name" type="text" required>
          </div> <!--form-group//-->
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
            </div> 
            <input name="email" class="form-control" placeholder="Email address" type="email" required>
          </div> <!--form-group//-->
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
            </div>
            <input name="mobile" class="form-control" placeholder="Phone number" type="number" required>
          </div>  <!--form-group//-->
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
            </div>
            <input class="form-control" placeholder="Create password" type="password" name="password" value="" required>
          </div>  <!--form-group//-->
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
            </div>
            <input class="form-control" placeholder="Repeat password" type="password" name="cpassword" required>
          </div>  <!--form-group//-->
          <div class="form-group">
            <button type="submit" name="submit" class="btn btn-primary btn-block"> Create Account </button>
          </div>  <!--form-group//-->
          <p class="text-center">Have an account? <a href="logins.php">Log In</a></p>
        </form>
      </article>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
