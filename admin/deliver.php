<?php
include_once("header.php");
?>
<div class='' style="padding-left:300px;">
  <div class="page-header"><br><br>
    <center><h1>
      Order Infomation
    </h1><br>
  </div></center>

  <?php
  $id = $_GET["id"];
  $cnn = mysqli_connect("localhost", "root", "", "project");

  $query1 = "select user.uname,user.uid,user.email,user.address,orders.oid,orders.uid,orders.fullname,orders.ozip,orders.doo,orders.order_id from orders,user where orders.uid=user.uid AND orders.oid='$id'";
  $result = $cnn->query($query1);
  $row = $result->fetch_assoc();
  $uname = $row["uname"];
  $ozip = $row["ozip"];
  $orid = $row["order_id"];
  $fullname = $row["fullname"];
  $address = $row["address"];

  $fullname = $row["fullname"];
  echo "<h4><b>Name: </b>" . $fullname . "</h4>";
  $email = $row["email"];
  echo "<h4><b>Email: </b>" . $email . "</h4>";
  $address = $row["address"];
  echo "<h4><b>Address: </b>" . $address . "</h4>";
  $oid = $row["oid"];
  echo "<h4><b>Zip: </b>" . $ozip . "</h4>";
  echo "<h4><b>Order id: </b>" . $orid . "</h4>";
  echo "<h4><b>Date of Order: </b>" . $row["doo"] . "</h4>";

  // $comment="";
  if (isset($_POST["btnsubmit"])) {
    $dbid = $_POST["fullname"];
    $cnn = mysqli_connect("localhost", "root", "", "project");
    // $email=$_POST["email"];
    //$delivery_boy_id=$_POST["delivery_boy_id"];
    $qry = "UPDATE orderdetails SET dbid = '$dbid', dod = now() WHERE orderdetails.oid = '$id'";

    $result = $cnn->query($qry);

    $qryy = "select shop.sname,orderdetails.dbid,orderdetails.oid,deliveryboy.dbid,deliveryboy.email,deliveryboy.fullname,deliveryboy.contactno,orderdetails.shid,shop.shid,shop.email from orderdetails,deliveryboy,shop where orderdetails.oid='$id' AND shop.shid=orderdetails.shid AND deliveryboy.dbid='$dbid'";
    $result11 = $cnn->query($qryy);
    while ($row1 = $result11->fetch_assoc()) {
      $demail = $row1["email"];
      $name = $row1["fullname"];
      $cno = $row1["contactno"];
      $email = $row1["email"];
      $sname = $row1["sname"];

      $to_email = $email;
      $subject = "Order Supply";

      $headers = "From: Pet Crew<petcreworganisation@gmail.com>\r\n";
      // $headers = "MIME-Version: 1.0\r\n";
      $headers .= "Content-Type : text/html; charset=ISO-8859-1\r\n";

      $body = "<html>
		<body>
			<p>$sname<br>Please prepare your order of order number : <b>$orid</b>.Delivery boy is coming at your shop to get this order for delivery.
			<br>
			Delivery Boy Details ,<br>
			Name : $name<br>
			Email : $demail<br>
			Phone : $cno<br><br>Yours Sincerely,
			<br>Pet Crew.</p>
			
		</body>
		</html>";

      if (mail($to_email, $subject, $body, $headers)) {
        // $yourURL="doctor.php";
        echo "Done";
        // echo("<Script>location.href='$yourURL'</script>");
      } else {
        echo "Email sending failed...";
        ini_set("error_reporting", E_ALL);
        print_r(error_get_last());
      }
    }
    $yourURL = "doneOrders.php";
    echo ("<Script>location.href='$yourURL'</script>");
  }
  $cnn = mysqli_connect("localhost", "root", "", "project");
  $qry2 = "select * from deliveryboy";
  $result1 = $cnn->query($qry2);

  ?>


  <!-- </div> -->
  <br>
  <br>
  <div class="col-xs-12">
    <form class="form-horizontal" role="form" method="post">
      <div class="form-group">

        <div class="col-sm-9" style="font-size: 24px; padding-left: 0;">
          <!-- <input type="text" id="form-field-1"  name="txtname" value="" class="col-xs-10 col-sm-5"> -->
          <b>Delivery Boy's Name : &nbsp;&nbsp;</b>
           <select name="fullname" style="height: 30px; font-size: 18px;">
            <option value="">--Select From Following--</option>
            <?php
            while ($row = $result1->fetch_assoc()) {
              echo "<option value=" . $row["dbid"] . ">" . $row["fullname"] . "</option>";
            }

            ?>
          </select>
        </div>
      </div>

      <!-- <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Email</label>

										<div class="col-sm-9">
										<select name="email"> -->
      <?php
      // $cnn=mysqli_connect("localhost","root","","pet");
      // $qry3="select * from delivery_boy";
      // $result2=$cnn->query($qry3); 
      // while($row=$result2->fetch_assoc())
      // {
      // 	echo "<option value=".$a1=$row["d_email"].">".$row["d_email"]."</option>";

      // }

      ?>
      </select>
  </div>
  <!-- </div> -->
  <br>
  <div class="clearfix form-actions" style="text-align:right;">
    <div class="space-4"></div>
    <!-- <a href="sorders.php"> -->
      <div class="col-md-offset-3 col-md-9">
        <button class="btn btn-info" type="submit" name="btnsubmit">
          <i class="ace-icon fa fa-check bigger-110"></i>
          Confirm
        </button>
      </div>
    <!-- </a> -->
  </div>
  </form>

</div>
<?php
include_once("footer.php");
?>