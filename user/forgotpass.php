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
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'project');
if (isset($_POST["check-email"])) {
    $email = mysqli_real_escape_string($conn, $_POST["txtemail"]);
    $check_email = "SELECT * FROM user WHERE email='$email'";
//    $run_sql = mysqli_query($conn, $check_email);
    $result = $conn->query($check_email);
    $row = $result->fetch_assoc();
    $name = $row["name"];
    if (mysqli_num_rows($result) > 0) {
        $code = rand(1000, 9999);
        $_SESSION['otp'] = $code;
        $_SESSION['email'] = $email;
        $to_email = $email;
        $subject = "OTP for validation";

        $headers = "From: Pet Crew<petcreworganisation@gmail.com>\r\n";
        // $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type : text/html; charset=ISx`O-8859-1\r\n";

        $body = "<html>
                <body>
                    <p>Hello <b>$name</b>!!!<br>Your OTP (One Time Password) for Changing Password is <b>$code</b>. Use this OTP to reset your Password! For any help hit the Reply button to contact our support team.<br><small>~ Pet Crew.</small></p>
                </body>
            </html>";

        if (mail($to_email, $subject, $body, $headers)) {
            echo "<script>alert('OTP Sent');</script>";
            $info = "We've sent code to $email";
            $_SESSION['info'] = $info;
            header('location: resetcode.php');
            exit();
        } else {
            echo "Something Went Wrong!";
            ini_set("error_reporting", E_ALL);
            print_r(error_get_last());
        }
    } else {
        echo "<script>alert('This email address does not exist!');</script>";
    }
}
?>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-4 offset-md-4 form">
            <form method="POST" autocomplete="">
                <h2 class="text-center">Forgot Password</h2><br>

                <div class="form-group">
                    <input class="form-control" type="email" name="txtemail" placeholder="Enter email address" required>
                </div>
                <div class="form-group">
                    <input class="form-control button" type="submit" name="check-email" value="Continue">
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>