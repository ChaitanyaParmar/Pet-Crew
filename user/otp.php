<html>
<style>
  .error {
    color: #FF0000;
  }

  * {
    margin: 0;
    padding: 0;
  }

  body {
    background-repeat: no-repeat;
    background-size: cover;
  }

  .page {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 300px;
    height: 280px;
    background: rgb(191 191 191 / 19%);

    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    font-family: 'Roboto Slab', serif;
    font-weight: bold;
  }

  .page::before {
    content: '';
    position: absolute;
    width: 100%;
    height: 100%;
    /* background-image:url('bgg.jpg'); */
    z-index: -1;
    filter: blur(25px);
    transition: all .4s;

  }

  .page:hover::before {
    transform: scale(1.05);
  }

  input {
    width: 250px;
    height: 35px;
    margin: 8px 0;
    font-size: 1rem;
    border: none;
    background: transparent;
    outline: none;
    color: black;

  }

  .text {
    /* border-bottom:2px solid rgb(190,190,190); */

    border-bottom: 2px solid rgb(127 119 119);

  }

  .btn {
    /* background:rgba(255,255,255,0.521); */
    background: rgb(66 108 171);
    cursor: pointer;
    transition: all .4s;
    position: relative;
    top: 50px;

  }

  .btn:hover {
    /* background:rgba(255,255,255,0.233); */
    background: rgb(90 109 138);
  }
</style>

<body>
  <?php
  session_start();
  $x = "";
  if (isset($_POST["btnsubmit"])) {
    $x = $_POST["txtotp"];
    $uname = $_SESSION["uname"];
    $otp = $_SESSION["otp"];

    if ($x == $otp) {
      echo "<script>location.href='http://localhost/pet/pwd_reset1.php'</script>";
    } else {
      echo '<script language="javascript">';
      echo 'alert("Invalid otp")';
      echo '</script>';
    }
  }

  ?>

  <form name="frm1" method="post" class="page">
    <div class="page">
      <h2>Verify OTP</h2><br><br>
      <p style="position:relative; left:-105px;">OTP</p>
      <input type="text" name="txtotp" class="text" value="<?php echo $x; ?>">
      <input type="submit" name="btnsubmit" class="btn" value="NEXT"><br>

    </div>
  </form>


</body>

</html>