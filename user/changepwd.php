<?php
include_once("header.php");
?>
<style>
  .error {
    color: #FF0000;
    font-weight: normal;
    font-size: 11px;
  }
</style>
<?php
$id = $_SESSION["id"];
$cnn = mysqli_connect("localhost", "root", "", "project");
$qry = "select * from user where uid='$id'";
$result = $cnn->query($qry);
$row = $result->fetch_assoc();
$pwd = $row["pwd"];
// $pwd=md5($pwd1,TRUE);
$npwd = "";
$cpwd = "";
$ccpwd = "";
$epwd = "";
$ecpwd = "";
$enpwd = "";
$flag = "";

if (isset($_POST["btnsubmit"])) {
  $cnn = mysqli_connect("localhost", "root", "", "project");
  $ccpwd = $_POST["txtpwd"];

  $npwd = $_POST["txtnpwd"];
  $cpwd = $_POST["txtcpwd"];

  function test_input($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST") {


    if (empty($_POST["txtpwd"])) {
      $epwd = "Current Password is required";
      $flag = 1;
    } else {
      if ($pwd != md5($ccpwd, TRUE)) {
        $epwd = "Your current password is not matched";
        $flag = 1;
      }
    }

    if (empty($_POST["txtnpwd"])) {
      $enpwd = "New Password is required";
      $flag = 1;
    } else {
      $npwd1 = test_input($npwd);
      if (!preg_match("/^[a-zA-Z0-9!@#$%^&]{8,20}$/", $npwd1)) {
        $enpwd = "The password must have at least 8 characters";
        $flag = 1;
      }
    }

    // cpassword
    if (($_POST["txtnpwd"]) != ($_POST["txtcpwd"])) {
      $ecpwd = "Password and Confirm Password don't match";
      $flag = 1;
    }
  }
  if ($flag == 0) {
    $fpwd = md5($npwd, TRUE);
    $qry = "update user set pwd='$fpwd' where uid='$id'";
    $result = $cnn->query($qry);
    echo "<script>alert('Your password is changed');</script>";
    $yourURL = "home.php";
    echo ("<script>location.href='$yourURL'</script>");
  }
}
?>

<br>
<br>
<br>
<div class="" style="width:60%; position:relative; left:150px; margin:10px 0px 0px 120px;">
  <div id="user-profile-3" class="user-profile row">
    <div class="col-sm-offset-1 col-sm-10">
      <div class="well well-sm">
        <!-- -
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		&nbsp; -->
        <!-- /<div class="inline uiddle blue bigger-110"> Your profile is 70% complete </div> -->

        <!-- &nbsp; &nbsp; &nbsp;
												<div style="width:200px;" data-percent="70%" class="inline uiddle no-margin progress progress-striped active pos-rel">
													<div class="progress-bar progress-bar-success" style="width:70%"></div>
												</div> -->
        <!-- </div>/.well -->

        <div class="space"></div>

        <form class="form-horizontal" method="post">
          <div class="tabbable">
            <ul class="nav nav-tabs padding-16">


              <li class="">
                <a data-toggle="tab" href="#edit-password" aria-expanded="false">
                  <i class="blue ace-icon fa fa-key bigger-125"></i>
                  Password
                </a>
              </li>
            </ul>
            <br>
            <br>

            <div id="edit-password" class="tab-pane">
              <div class="space-10"></div>

              <div class="form-group" style="position:relative; left:150px;">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-pass1">Current
                  Password</label>

                <div class="col-sm-9">
                  <input type="password" name="txtpwd" id="form-field-pass1">
                </div>
                <span class="error">&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $epwd; ?></span>
              </div>

              <div class="space-4"></div>
              <div class="space-10"></div>

              <div class="form-group" style="position:relative; left:150px;">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-pass1">New
                  Password</label>

                <div class="col-sm-9">
                  <input type="password" name="txtnpwd" id="form-field-pass1">
                </div><span class="error">&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $enpwd; ?></span>
              </div>

              <div class="space-4"></div>

              <div class="form-group" style="position:relative; left:150px;">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-pass2">Confirm
                  Password</label>

                <div class="col-sm-9">
                  <input type="password" name="txtcpwd" id="form-field-pass2">
                </div><span class="error">&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $ecpwd; ?></span>
              </div>
            </div>
          </div>
      </div>

      <div class="clearfix form-actions">
        <div class="" style="text-align:center;">
          <button class="btn btn-info" type="submit" name="btnsubmit">
            <i class="ace-icon fa fa-check bigger-110"></i>
            Save
          </button>

        </div>
      </div>
      </form>
    </div><!-- /.span -->
  </div><!-- /.user-profile -->
</div>


<?php
include_once("footer.php");
?>