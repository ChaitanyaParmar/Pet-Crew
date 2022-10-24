<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="icon" href="images/logo/favicon.ico">
</head>
<style>
    @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');

    html, body {
        background: #f2eeec;
        font-family: 'Poppins', sans-serif;
    }

    ::selection {
        color: #fff;
        background: #6665ee;
    }

    .container {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .container .form {
        background: #fff;
        padding: 30px 35px;
        border-radius: 5px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    .container .form form .form-control {
        height: 40px;
        font-size: 15px;
    }

    .container .form form .forget-pass {
        margin: -15px 0 15px 0;
    }

    .container .form form .forget-pass a {
        font-size: 15px;
    }

    .container .form form .button {
        background: #000;
        color: #fff;
        font-size: 17px;
        font-weight: 500;
        transition: all 0.3s ease;
        border-radius: 10px;
    }

    .container .form form .button:hover {
        background: #b9bbbd;
        color: #000;
    }

    .container .form form .link {
        padding: 5px 0;
    }

    .container .form form .link a {
        color: #6665ee;
    }

    .container .login-form form p {
        font-size: 14px;
    }

    .container .row .alert {
        font-size: 14px;
    }

</style>
<?php 
if(isset($_POST['continue'])){
  $email = $_POST['txtemail'];

  $to_mail = $email;
  $subject = "Invitation to join us at PetCrew";

  $headers = "From: Pet Crew<petcreworganisation@gmail.com>\r\n";
  // $headers = "MIME-Version: 1.0\r\n";
  $headers .= "Content-Type : text/html; charset=ISx`O-8859-1\r\n";

  $body = "<html>
            <body>
                <p>Hello dear!!!<br>We invite you come on board with us. To join, you have to take a plan. There are basically 3 plans : Bronze, Silver and Gold. Please go on <a href='takeplans.php'>this</a> page for further information.<br><small>~ Pet Crew.</small></p>
            </body>
           </html>";

      echo "<script>alert('Email Sent. Please Check It and Follow Accordingly.')</script>";
  if (mail($to_mail, $subject, $body, $headers)) {
    $info = "We've sent code to $email";
    $_SESSION['info'] = $info;
    echo ("<Script>location.href='takeplans.php'</script>");
    // exit();
  } else {
      echo "Something Went Wrong!";
      ini_set("error_reporting", E_ALL);
      print_r(error_get_last());
  }
}
?>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-4 offset-md-4 form">
            <form method="post">
                <h2 class="text-center">Join as Professional</h2><br>

                <div class="form-group">
                    <input class="form-control" type="email" name="txtemail" placeholder="Enter email address" required autocomplete="">
                </div>
                <div class="form-group">
                    <input class="form-control button" type="submit" name="continue" value="Continue">
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>