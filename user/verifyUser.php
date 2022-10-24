<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGNUP</title>
    <link rel="stylesheet" href="signup.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="icon" href="images/logo/favicon.ico">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

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
$conn = mysqli_connect("localhost", "root", "", "project");

$msg = "";
if ($_SESSION['demo'] == 1) {
    $otp = rand(1000, 9999);
    $_SESSION['otp'] = $otp;
    $name = $_SESSION['name'];
    $uname = $_SESSION['uname'];
    $email = $_SESSION['email'];
    $pass = $_SESSION['pass'];

    $to_email = $email;
    $subject = "OTP for validation";

    $headers = "From: Pet Crew<petcreworganisation@gmail.com>\r\n";
    // $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type : text/html; charset=ISO-8859-1\r\n";

    $body = "<html>
                <body>
                    <p>Hello <b>$name</b>!!!<br>Your OTP (One Time Password) for Registration is <b>$otp</b>. Use this password to validate your Login! For any help hit the Reply button to contact our support team.<br><small>~ Pet Crew.</small></p>
                </body>
            </html>";

    if (mail($to_email, $subject, $body, $headers)) {
        echo "<script>alert('OTP Sent!!');</script>";
    } else {
        echo "Email Failed...";
        ini_set("error_reporting", E_ALL);
        print_r(error_get_last());
    }
    $_SESSION['demo'] = 2;
}

if (isset($_POST['btnVerify'])) {
    $cotp = $_POST['txtOtp'];

    if ($cotp == $_SESSION['otp']) {
        echo "<script>alert('Registration Successful!');</script>";
        $name = $_SESSION['name'];
        $email = $_SESSION['email'];
        $uname = $_SESSION['uname'];
        $password = $_SESSION['pass'];
        $role = $_SESSION['role'];
        $mpassword = md5($password);


        $qry = "Insert into user(name, uname, email, pass, doj, role) Values('$name', '$uname', '$email', '$mpassword', now(), '$role')";
        $result = $conn->query($qry);

        if ($result) {
            $to_email = $email;
            $subject = "Welcome to Pet Crew Family!!";

            $headers = "From: Pet Crew<petcreworganisation@gmail.com>\r\n";
            // $headers = "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type : text/html; charset=ISO-8859-1\r\n";

            $body = "<html>
                <body>
                <p>Welcome to Pet Crew <b>$name</b>! We're glad you have decided to join us.<br><br>
                We want to make your onboarding experience free of worry. Feel free to send us an email if you have any questions. In the meantime, you can find out more about Pet Crew using the links below:<br>
                ○ You can check out available <a href='pet.php'>pets</a> on Pet Page.<br>
                ○ To get the best professionals for your pet visit the <a href='services.php'>Services</a> Page.<br>
                ○ We have a range of items and accessories for your little friend. Make sure to check out <a href='shop.php'>Shop</a>.<br>
                ○ Learn more about us on the <a href='about.php'>About Us</a> Page.<br>
                ○ Also follow us on social media platforms like <a href='https://www.facebook.com/Pet-Crew-108844805019255'>Facebook</a>, <a href='https://www.instagram.com/petcrew_00/'>Instagram</a>.<br>
                ○ You can also reach out to us through our <a href='contact.php'>Contact</a> Page. We look forward to hearing from you! <br>
                <small>~ Pet Crew.</small></p>
                </body>
                </html>";

            if (mail($to_email, $subject, $body, $headers)) {
                echo "Email sent..";
            } else {
                echo "Email Failed...";
                ini_set("error_reporting", E_ALL);
                print_r(error_get_last());
            }
            header("location: login.php");
        } else {
            $msg = "Incorrect OTP. Enter again";
            echo "Error: " . mysqli_error($conn);
        }
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
                    <input class="form-control" type="text" name="txtOtp" placeholder="Enter OTP" required>
                </div>
                <div class="form-group">
                    <input class="form-control button" type="submit" name="btnVerify" value="Submit">
                </div>
            </form>
        </div>
    </div>
</div>
<!--<div class="container py-5">-->
<!--    <div class="card card-outline-secondary">-->
<!--        <div class="card-body">-->
<!--            --><?php //echo "<p class='dispErr'>" . $msg . "</p>"; ?>
<!--            <form name="frm1" method="post" class="page">-->
<!--                <div class="page">-->
<!--                    <h2>Verify OTP</h2><br><br>-->
<!--                    <p style="position:relative; left:-110px;">OTP</p>-->
<!--                    <input type="text" name="txtOtp" class="text">-->
<!--                    <input type="submit" name="btnVerify" class="btn" value="NEXT"><br>-->
<!--                </div>-->
<!--            </form>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
</body>

</html>