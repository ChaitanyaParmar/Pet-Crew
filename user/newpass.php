<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create a New Password</title>
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
        background: #6665ee;
        color: #fff;
        font-size: 17px;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .container .form form .button:hover {
        background: #5757d1;
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
$email = $_SESSION['email'];
if(isset($_POST['change-password'])){
    $_SESSION['info'] = "";
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
    if($password !== $cpassword){
        echo "<script>alert('Confirm password not matched!');</script>";
    }else{
        $email = $_SESSION['email'];
        $encpass = md5($password);
        $update_pass = "UPDATE user SET pass = '$encpass' WHERE email = '$email'";
//        $run_query = mysqli_query($con, $update_pass);
        $result = $con ->query($update_pass);
        if($result){
            echo "<script>alert('Your password changed. Now you can login with your new password.');</script>";
            header('Location: login.php');
        }else{
            $errors['db-error'] = "Failed to change your password!";
        }
    }
}
?>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-4 offset-md-4 form">
            <form method="POST" autocomplete="off">
                <h2 class="text-center">New Password</h2>
                <?php
                if(isset($_SESSION['info'])){
                    ?>
                    <div class="alert alert-success text-center">
                        <?php echo $_SESSION['info']; ?>
                    </div>
                    <?php
                }
                ?>
                <div class="form-group">
                    <input class="form-control" type="password" name="password" placeholder="Create new password" required>
                </div>
                <div class="form-group">
                    <input class="form-control" type="password" name="cpassword" placeholder="Confirm your password" required>
                </div>
                <div class="form-group">
                    <input class="form-control button" type="submit" name="change-password" value="Change">
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>