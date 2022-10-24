<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Code Verification</title>
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
$con = mysqli_connect('localhost', 'root', '', 'project');
$otp = $_SESSION['otp'];
if (isset($_POST['check-reset-otp'])) {
    $cotp = mysqli_real_escape_string($con, $_POST['txtotp']);

    if ($cotp == $otp) {
        $name = $_SESSION['name'];
        $email = $_SESSION['email'];
        echo $name;
        $info = "Please create a new password that you don't use on any other site.";
        $_SESSION['info'] = $info;
        header('location: newpass.php');
        exit();
    } else {
        echo "<script>alert('You have entered incorrect code!');</script>";
    }
}
?>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-4 offset-md-4 form">
            <form method="POST" autocomplete="off">
                <h2 class="text-center">Code Verification</h2>
                <?php
                if (isset($_SESSION['info'])) {
                    ?>
                    <div class="alert alert-success text-center" style="padding: 0.4rem 0.4rem">
                        <?php echo $_SESSION['info']; ?>
                    </div>
                    <?php
                }
                ?>
                <div class="form-group">
                    <input class="form-control" type="text" name="txtotp" placeholder="Enter OTP" required>
                </div>
                <div class="form-group">
                    <input class="form-control button" type="submit" name="check-reset-otp" value="Submit">
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>