<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Logout</title>
  <link rel="icon" type="image/png" sizes="16x16" href="..//acca.png">
  <!-- Stylesheets -->
  <link href="css/bootstrap.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">

  <!-- Responsive -->
  <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->

  <meta http-equiv="refresh" content="3; url = index.php" />

  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <link href="css/responsive.css" rel="stylesheet">
</head>

<style>
  div {
    position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    z-index: 999999;
    /* background-image: url("images/resources/logout.jpg"); */
    background-color: #ffffff;
    background-position: center center;
    background-repeat: no-repeat;
    /* background-size: 500px 500px; */
  }

  img {
    display: block;
    margin-left: auto;
    margin-right: auto;
    width: 50%;
    margin-top: 180px;
  }

  h2 {
      text-align: center;
      top: 50%;
  }
</style>

<body>

  <?php
  session_start();
  ?>

  <div>
<!--    <img height='400px' width='800px' src="images/resources/logout.jpg">-->
    <h2> Logging Out...</h2>

  </div>
  <?php
  session_destroy();
  ?>
</body>

</html>