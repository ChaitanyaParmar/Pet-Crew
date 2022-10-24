<?php
include_once("header.php");
?>

<?php
$did = $_SESSION["id"];
if (isset($_POST["btnsub1"])) {
  $cnn = mysqli_connect("localhost", "root", "", "project");

  $qy = "UPDATE doctor SET isapprove='2'";
  $result1 = $cnn->query($qy);
  $qry1 = "UPDATE `mplan` SET status='old' where did='$did' AND status='cur'";
  $result = $cnn->query($qry1);

  $qy = "select * from mplantype where mptid='1' ";

  $result = $cnn->query($qy);
  $row = $result->fetch_assoc();
  $mptid = $row["mptid"];
  $mpprice = $row["mpprice"];

  //echo $mptid;

  echo $plan;
  echo $mptid;
  $qry = "insert into mplan(mptid,amount,did) values('$mptid','$mpprice','$did')";

  $result = $cnn->query($qry);
  // echo $qy;
  // echo $qry;
  // $c1="checked";
  // echo $mpprice." your plan.".$row["mplimit"];

  $qryy = "select MAX(mpid) as mpid from mplan where did='$did'";
  $result1 = $cnn->query($qryy);
  $row1 = mysqli_fetch_assoc($result1);
  $mpid = $row1["mpid"];
  // $price=$row["mpprice"];

  $yourURL = "http://localhost/pet/paytm/dpgredirect.php?id=$did&price=$mpprice&mpid=$mpid";
  echo ("<Script>location.href='$yourURL'</script>");
}

if (isset($_POST["btnsub2"])) {
  $cnn = mysqli_connect("localhost", "root", "", "project");
  $qy = "UPDATE doctor SET isapprove='2'";
  $result1 = $cnn->query($qy);
  $qry1 = "UPDATE `mplan` SET status='old' where did='$did' AND status='cur'";
  $result = $cnn->query($qry1);

  $qy = "select * from mplantype where mptid='2' ";

  $result = $cnn->query($qy);
  $row = $result->fetch_assoc();
  $mptid = $row["mptid"];
  $mpprice = $row["mpprice"];

  //echo $mptid;

  echo $plan;
  echo $mptid;
  $qry = "insert into mplan(mptid,amount,did) values('$mptid','$mpprice','$did')";

  $result = $cnn->query($qry);
  // echo $qy;
  // echo $qry;
  // $c1="checked";
  // echo $mpprice." your plan.".$row["mplimit"];

  $qryy = "select MAX(mpid) as mpid from mplan where did='$did'";
  $result1 = $cnn->query($qryy);
  $row1 = mysqli_fetch_assoc($result1);
  $mpid = $row1["mpid"];
  // $price=$row["mpprice"];

  $yourURL = "http://localhost/pet/paytm/dpgredirect.php?id=$did&price=$mpprice&mpid=$mpid";
  echo ("<Script>location.href='$yourURL'</script>");
}

if (isset($_POST["btnsub3"])) {
  $cnn = mysqli_connect("localhost", "root", "", "project");
  $qy = "UPDATE doctor SET isapprove='2'";
  $result1 = $cnn->query($qy);
  $qry1 = "UPDATE `mplan` SET status='old' where did='$did' AND status='cur'";
  $result = $cnn->query($qry1);

  $qy = "select * from mplantype where mptid='3' ";

  $result = $cnn->query($qy);
  $row = $result->fetch_assoc();
  $mptid = $row["mptid"];
  $mpprice = $row["mpprice"];

  //echo $mptid;

  echo $plan;
  echo $mptid;
  $qry = "insert into mplan(mptid,amount,did) values('$mptid','$mpprice','$did')";

  $result = $cnn->query($qry);
  // echo $qy;
  // echo $qry;
  // $c1="checked";
  // echo $mpprice." your plan.".$row["mplimit"];

  $qryy = "select MAX(mpid) as mpid from mplan where did='$did'";
  $result1 = $cnn->query($qryy);
  $row1 = mysqli_fetch_assoc($result1);
  $mpid = $row1["mpid"];
  // $price=$row["mpprice"];

  $yourURL = "http://localhost/pet/paytm/dpgredirect.php?id=$did&price=$mpprice&mpid=$mpid";
  echo ("<Script>location.href='$yourURL'</script>");
}


?>

<div class="content-wrapper">
  <!-- <div class="card"> -->



  <form action="" method="POST" name="form1" role="form">
    <table class='table'>
      <tr class="col-md-6 col-lg-3">
        <td>
          <div class="card card-hover">
            <div style="background:#f3f3f3; font-weight:bold;" class="box bg-sucess text-center">
              <!-- <div style="background:#928c8c47; font-weight:bold;"> -->
              <img src='images/resources/mpbronze.png' height='215' width='180'> <br><br>BRONZE<br>Rs.
              5000<br>20 Appointment<br><br><a href=""><button type="submit" name="btnsub1" class="btn btn-info" style="font-size: 15px; padding: 10px 50px; font-weight:bold; margin-bottom: 20px;">Select</button></a>
            </div>
        </td>
</div> &nbsp; &nbsp;
<td>
  <div class="card card-hover">
    <div class="box bg-sucess text-center" style="background:#f3f3f3; font-weight:bold;">
      <img src='images/resources/mpsilver.png' height='215' width='180'><br><br>SILVER<br>Rs. 10000<br>50
      Appointment<br><br><a href=""><button type="submit" name="btnsub2" class="btn btn-info" style="font-size: 15px; padding: 10px 50px; font-weight:bold; margin-bottom: 20px;">Select</button></a>
    </div>
</td>
</div>&nbsp;&nbsp;
<td>
  <div class="card card-hover">
    <div class="box bg-sucess text-center" style="background:#f3f3f3; font-weight:bold;">
      <img src='images/resources/mpgold.png' height='215' width='180'><br><br>GOLD<br>Rs. 15000<br>85
      Appointment<br><br><a href=""><button type="submit" name="btnsub3" class="btn btn-info" style="font-size: 15px; padding: 10px 50px; margin-bottom: 20px; font-weight:bold;">Select</button></a>
    </div>
</td>
</div>
</tr>
</table>
</form>

</div>



<?php
include_once("footer.php");
?>