<?php
session_start();
include('./connectToDb.php');
include('./create.php');
$msg= '';
if($_SERVER["REQUEST_METHOD"] == "POST"){
  $userName=$_POST["user_name"];
  $userpassword=$_POST["password"];
  $sql = "SELECT * FROM admin_users WHERE username = :username AND password = :password";
    

    $stmt = $connect->prepare($sql);
    

    $stmt->bindParam(':username', $userName, PDO::PARAM_STR);
    $stmt->bindParam(':password', $userpassword, PDO::PARAM_STR);
    
   
    $stmt->execute();
    
   
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($result) {
      $_SESSION['name']=$_POST["user_name"];
      $_SESSION['pass']=$_POST["password"];
      if ($result['isAdmin'] == 1) {
          header("Location: users.php");
          $_SESSION['isAdmin'] = true; 
          exit();
      } else {
          
          header("Location:../index.php"); 
          $_SESSION['isAdmin'] = false; 
          exit();
      }
  } else {
      
      header("Location: login.php?error=1");
    $msg = "Invalid username and email";
      exit();
  }
}


?>





<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Images Admin | Login/Register</title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="" method="post">
              <h1>Login Form</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required=""  name='user_name'/>
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" name="password"/>
                
              </div>
             <p><?php echo $msg;?></p>
              <div>
                <button class="btn btn-default submit" href="index.php" name="login" type="submit" style="color:#5A738E;font-size:12px;padding:10px 0 0 0 ;">Log in</button>
                <a class="reset_pass" href="#">Lost your password?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">New to site?
                  <a href="#signup" class="to_register" name="create"> Create Account </a>
                </p>

                <div class="clearfix"></div>
                <br />

                
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form method="post" action="">
              <h1>Create Account</h1>
              <div>
                <input type="text" class="form-control" placeholder="Fullname" required=""  name='full_name'/>
              </div>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" name="name"/>
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" required="" name="email"/>
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" name="pass"/>
              </div>
              <div>
                <input class="btn btn-default submit" href="index.php" type="submit" name="submit" value="Submit" style="margin-left:120px">
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
