<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LOGIN</title>
  <link rel="stylesheet" href="login.css">
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
    ;
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
    font-size: 1.8em;
    text-transform: uppercase;
    margin-bottom: 20px;
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
    display: inline-block;
    color: #000;
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
ob_start();
session_start();
$conn = mysqli_connect("localhost", "root", "", "project");

if (isset($_POST["btnlogin"])) {
  $uname = mysqli_real_escape_string($conn, $_POST["txtuname"]);
  $pass = mysqli_real_escape_string($conn, $_POST["txtpass"]);
  $password = md5($pass);

  if (strlen($pass) < 7) {
    $password_error = "Password must be of 7 - 15 characters";
    $error = 1;
  }

  if (empty($uname) && empty($pass)) {
    echo '<script>alert("Both Fields are required")</script>';
  }

  $qry = "SELECT * FROM user WHERE uname = '$uname' and pass = '$password'";
  $result = $conn->query($qry);
  $count  = mysqli_num_rows($result);
  if ($count > 0) {
    $row = $result->fetch_assoc();
    $_SESSION["id"] = $row["uid"];
    if (isset($_POST["checkrem"])) {
      setcookie("uname", $uname, time() + (86400 * 30), "/");
      setcookie("pass", $pass, time() + (86400 * 30), "/");
    }
    header("location:index.php");
  } else {
    $error = "Invalid Username or Password!";
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
        <h2>Login</h2>
        <form method="POST">
          <span style="color: red;"><?php if (isset($error)) echo $error; ?></span><br>
          <div class="inputBx">
            <span>Username</span>
            <input type="text" name="txtuname">
          </div>
          <div class="inputBx">
            <span>Password<?php if (isset($password_error)) echo " || " . $password_error; ?></span>
            <input type="password" name="txtpass">
          </div>
          <div class="remember">
            <label> <input type="checkbox" name="checkrem"> Remember Me</label>
          </div>
          <div class="inputBx">
            <input type="submit" value="Sign In" name="btnlogin">
          </div>
          <div class="inputBx">
            <p><a href="forgotpass.php">Forgot Password?</a></p>
            <p>Don't Have An Account? <a href="signup.php">Sign up</a></p>
            <p>Are you a professional? <a href="../login.php">Sign In Here</a></p>
          </div>
        </form>
      </div>
    </div>
  </section>
</body>

</html>