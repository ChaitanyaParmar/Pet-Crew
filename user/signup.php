<?php
session_start();
?>
<!DOCTYPE html>
<html?>

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGNUP</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="icon" href="images/logo/favicon.ico">

  </head>
  <style media="screen">
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    section {
      position: relative;
      width: 100%;
      height: 100vh;
      display: flex;
    }

    section .imgBx {
      position: relative;
      width: 50%;
      height: 100%;
    }

    section .imgBx::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: linear-gradient(225deg, #000, #ffe);
      z-index: 1;
      mix-blend-mode: screen;
    }

    section .imgBx img {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    section .contentBx {
      background: linear-gradient(180deg, rgba(173, 173, 173, 0.63), rgba(255, 255, 255, 0.651));
      display: flex;
      justify-content: center;
      align-items: center;
      width: 50%;
      height: 100%;
    }

    section .contentBx .formBx {
      width: 65%;
    }

    section .contentBx .formBx h2 {
      color: #000;
      font-weight: 600;
      font-size: 1.7em;
      text-transform: uppercase;
      margin-bottom: 10px;
      border-bottom: 4px solid #000;
      display: inline-block;
      letter-spacing: 1px;
    }

    section .contentBx .formBx .inputBx {
      margin-bottom: 20px;
    }

    section .contentBx .formBx .inputBx span {
      font-size: 16px;
      margin-bottom: 5px;
      margin-left: 15px;
      display: inline-block;
      /* color: #000; */
      font-weight: 300;
      letter-spacing: 1px;
    }

    section .contentBx .formBx .inputBx input {
      width: 100%;
      padding: 10px 20px;
      outline: none;
      font-weight: 400;
      border: 1px solid #607d8b;
      font-size: 16px;
      letter-spacing: 1px;
      color: #000;
      background: transparent;
      border-radius: 30px;
    }

    section .contentBx .formBx .inputBx input[type="Submit"] {
      background: #000;
      color: #fff;
      outline: none;
      border: none;
      font-weight: 500;
      cursor: pointer;
    }

    section .contentBx .formBx .inputBx input[type="Submit"]:hover {
      background: rgb(65, 55, 55);
      color: #fff;
    }

    section .contentBx .formBx .remember {
      margin-bottom: 10px;
      color: #000;
      font-weight: 400;
      font-size: 14px;
    }

    section .contentBx .formBx .inputBx p {
      color: #000;
      text-align: center;
    }

    section .contentBx .formBx .inputBx p a {
      color: #000;
    }
  </style>

  <?php
  $conn = mysqli_connect("localhost", "root", "", "project");

  if (isset($_POST["btnsignup"])) {
    $name = mysqli_real_escape_string($conn, $_POST["txtname"]);
    $uname = mysqli_real_escape_string($conn, $_POST["txtuname"]);
    $email = mysqli_real_escape_string($conn, $_POST["txtemail"]);
    $pass = mysqli_real_escape_string($conn, $_POST["txtpass"]);
    $cpass = mysqli_real_escape_string($conn, $_POST["txtcpass"]);
    $role = mysqli_real_escape_string($conn, $_POST["txtrole"]);
    $password = md5($pass);
    $cpassword = md5($cpass);

    if (!preg_match("/^[a-z A-Z ]+$/", $name)) {
      $name_error = "Name must contain only alphabets and space";
      $error = 1;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $email_error = "Please Enter Valid Email ID";
      $error = 1;
    }

    if (strlen($pass) < 7 || strlen($pass) > 15) {
      $password_error = "Password must be between 7 - 15 characters.";
      $error = 1;
    }

    if ($pass != $cpass) {
      $cpassword_error = "Passwords doesn't match";
      $error = 1;
    }
    $qryCheck = "SELECT * FROM user WHERE uname = '$uname' or pass = '$password'";
    $resultCheck = $conn->query($qryCheck);
    $count  = mysqli_num_rows($resultCheck);

    if ($count > 0) {
      $amb_error = "Username or Password already exists!";
      $error = 1;
    }
    if ($count == 0) {
      if($error == 0){
        $_SESSION['name'] = $name;
        $_SESSION['uname'] = $uname;
        $_SESSION['email'] = $email;
        $_SESSION['pass'] = $pass;
        $_SESSION['role'] = $role;
        $_SESSION['demo'] = 1;
        header("location: verifyUser.php");
      }
      else{
        echo "<script>alert('Something Went Wrong!');</script>";
      }
    }
  }
  ?>

  <body>
    <section>
      <div class="imgBx">
        <img src="images/resources/bg.jpg" alt="">
      </div>
      <div class="contentBx">
        <div class="formBx">
          <h2>registration</h2>
          <form action="" method="POST">
            <span style="color: red; margin-left: 10px"><?php if (isset($amb_error)) echo $amb_error; ?></span><br>
            <div class="inputBx">
              <span>Full Name<?php if (isset($name_error)) echo " || " . $name_error; ?></span>
              <input type="text" name="txtname" placeholder="John Doe" required>
            </div>
            <div class="inputBx">
              <span>Username</span>
              <input type="text" name="txtuname" placeholder="john00" required>
            </div>
            <div class="inputBx">
              <span>Email<?php if (isset($email_error)) echo " || " . $email_error; ?></span>
              <input type="text" name="txtemail" placeholder="johndoe00@gmail.com" required>
            </div>
            <div class="inputBx">
              <span>Password <?php if (isset($password_error)) echo " || " . $password_error; ?></span>
              <input type="password" name="txtpass" placeholder="7-15 characters" id="pass" required>
              <!-- <span id="text" style="color: red;">CAPS LOCK ON!!!</span>
              <script>
                var input = document.getElementById("pass");
                var text = document.getElementById("text");
                input.addEventListener("keyup", function(event) {

                  if (event.getModifierState("CapsLock")) {
                    text.style.display = "block";
                  } else {
                    text.style.display = "none"
                  }
                });
              </script> -->
            </div>
            <div class="inputBx">
              <span>Confirm Password <?php if (isset($cpassword_error)) echo " || " . $cpassword_error; ?></span>
              <input type="password" name="txtcpass" placeholder="7-15 characters" id="cpass" required>
              <!-- <span id="text1" style="color: red;">CAPS LOCK ON!!!</span>
              <script>
                var input = document.getElementById("cpass");
                var text = document.getElementById("text1");
                input.addEventListener("keyup", function(event) {

                  if (event.getModifierState("CapsLock")) {
                    text.style.display = "block";
                  } else {
                    text.style.display = "none"
                  }
                });
              </script> -->
            </div>
            <div class="inputBx">
              <input type="hidden" name="txtrole" value="6">
            </div>
            <div class="inputBx">
              <input type="submit" value="Sign Up" name="btnsignup">
            </div>
            <div class="inputBx">
              <p>Already Have An Account? <a href="login.php">Sign In</a></p>
            </div>
          </form>
        </div>
      </div>
    </section>
  </body>

  </html>