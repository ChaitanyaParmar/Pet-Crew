<?php
include_once("header.php");
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
  .bod {
    font-family: Arial;
    font-size: 17px;
    padding: 20px 120px 30px 120px;
    box-sizing: border-box;
  }

  .row {
    display: -ms-flexbox;
    /* IE10 */
    display: flex;
    -ms-flex-wrap: wrap;
    /* IE10 */
    flex-wrap: wrap;
    margin: 0 -16px;
  }

  .col-25 {
    -ms-flex: 25%;
    /* IE10 */
    flex: 25%;
  }

  .col-50 {
    -ms-flex: 50%;
    /* IE10 */
    flex: 50%;
  }

  .col-75 {
    -ms-flex: 75%;
    /* IE10 */
    flex: 75%;
  }

  .col-25,
  .col-50,
  .col-75 {
    padding: 0 16px;
  }

  .pform {
    background-color: #f2f2f2b0;
    padding: 5px 20px 15px 20px;
    border: 1px solid lightgrey;
    border-radius: 3px;
  }

  input[type=text] {
    width: 100%;
    margin-bottom: 20px;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 3px;
  }

  label {
    margin-bottom: 10px;
    display: block;
  }

  .icon-cont {
    margin-bottom: 20px;
    padding: 7px 0;
    font-size: 24px;
  }

  .btn {
    background-color: #04AA6D;
    color: white;
    padding: 12px;
    margin: 10px 0;
    border: none;
    width: 100%;
    border-radius: 3px;
    cursor: pointer;
    font-size: 17px;
  }

  .btn:hover {
    background-color: #45a049;
  }

  a {
    color: #2196F3;
  }

  hr {
    border: 1px solid lightgrey;
  }

  span.price {
    float: right;
    color: grey;
  }

  .error {
    position: relative;
    top: -20px;
    color: #FF0000;
  }
</style>

<?php

$uid = $_SESSION["id"];
$price = $_GET['id'];
$flname = "";
$addr = "";
$email = "";
$contact = "";
$ozip = "";
$city = "";

$eflname = "";
$eaddr = "";
$econtact = "";
$eozip = "";
$ecity = "";
$flag = 0;

$cnn = mysqli_connect("localhost", "root", "", "project");
$query = "select * from user where uid='$uid'";
$result = $cnn->query($query);
$row = $result->fetch_assoc();
$contact = $row["contact"];
$flname = $row["name"];
$email = $row["email"];
$addr = $row["address"];

if (isset($_POST["btnsub"])) {
  $ozip = $_POST["txtzip"];
  $flname = $_POST["txtflname"];
  $addr = $_POST["txtaddr"];
  $contact = $_POST["txtcontact"];
  $city = $_POST["txtcity"];

  function test_input($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["txtflname"])) {

      $flag = 1;
    } else {
      $fname1 = test_input($flname);
      if (!preg_match("/^[a-zA-Z ]*$/", $fname1)) {

        $eflname = "Only letters and white space allowed";
        $flag = 1;
      }
    }

    if (empty($_POST["txtcontact"])) {

      $flag = 1;
    } else {
      $fname1 = test_input($contact);
      if (!preg_match("/^\d{10}$/", $fname1)) {
        $econtact = "Enter contact number of 10 digit";
        $flag = 1;
      }
    }
    if (empty($_POST["txtaddr"])) {

      $flag = 1;
    } else {
      $addr = test_input($addr);
      if (strlen($addr) < 3) {
        $eaddr = "Address must have more then 3 letters";
        $flag = 1;
      }
    }

    if (empty($_POST["txtzip"])) {

      $flag = 1;
    } else {
      $zip1 = test_input($ozip);
      // if (!preg_match("/^[1-9]{1}[0-9]{2}\\s{0, 1}[0-9]{3}$/",$zip1)) 
      if (!preg_match("/^\d{6}$/", $zip1)) {
        $eozip = "Please enter valid Pin code in digit";
        $flag = 1;
      }
    }

    if (empty($_POST["txtcity"])) {

      $flag = 1;
    } else {
      $city1 = test_input($city);
      if (!preg_match("/^[a-zA-Z ]*$/", $city1)) {

        $ecity = "Only letters and white space allowed";
        $flag = 1;
      }
    }
  }

  if ($flag == 0) {

    $qry = "insert into orders(uid,fullname,email,addr,contact,ozip,city) values('$uid','$flname','$email','$addr','$contact','$ozip','$city')";
    $result = $cnn->query($qry);

    $qry3 = "select MAX(oid) as o_id from orders";
    $result = $cnn->query($qry3);
    $row = mysqli_fetch_assoc($result);
    $o_id = $row["o_id"];

    $qry5 = "select * from pcart where uid='$uid' ";
    $result = $cnn->query($qry5);
    while ($row = $result->fetch_assoc()) {
      $productid = $row["pid"];
      $qty = $row["qty"];
      $pqty = $row["pqty"];
      $shid = $row['shid'];

      $qry4 = "INSERT INTO orderdetails(oid, pid, qty, pqty, shid) VALUES ('$o_id','$productid','$qty','$pqty','$shid')";
      $result2 = $cnn->query($qry4);
    }
    $qry6 = "Delete from pcart where uid='$uid'";
    echo $qry6;
    $result2 = $cnn->query($qry6);

    echo "Order successful";

    $qryy = "select MAX(oid) as o_id from orders";
    $result1 = $cnn->query($qryy);
    $row1 = mysqli_fetch_assoc($result1);
    $oid = $row1["o_id"];

    $yourURL = "http://localhost/PetCrew/paytm/pgRedirect.php?type=$oid&id=$uid&price=$price";
    echo ("<Script>location.href='$yourURL'</script>");
  }
}
?>


<section>
  <div class="row bod">
    <div class="col-50">
      <h3> Billing Details</h3><br>
      <div class="cont pform">
        <form action="" method="POST">

          <div class="row">
            <div class="col-50">
              <br>
              <label for="email"><i class="fa fa-envelope"></i> Email</label>
              <input type="text" id="email" name="email" value="<?php echo $email; ?>">

              <label for="fname"><i class="fa fa-user"></i> Full Name <span style="color:red; font-size:22px;">*</span></label>
              <input type="text" id="fname" name="txtflname" placeholder="Your Full Name" value="<?php echo $flname; ?>">
              <span class="error"> <?php echo $eflname; ?></span>
              </span>
              <label for="adr"><i class="fas fa-map-marker-alt"></i> Address <span style="color:red; font-size:22px;">*</span></label>
              <input type="text" id="adr" name="txtaddr" placeholder="Shipping Address" value="<?php echo $addr; ?>">
              <span class="error"> <?php echo $eaddr; ?></span>
              </span>

              <label for="city"><i class="fa fa-institution"></i> City <span style="color:red; font-size:22px;">*</span></label>
              <input type="text" id="city" name="txtcity" placeholder="City name" value="<?php echo $city; ?>">
              <span class="error"> <?php echo $ecity; ?></span>
              </span>

              <div class="row">

                <div class="col-50">
                  <label for="zip"><i class="fas fa-map-marked-alt"></i> Zip <span style="color:red; font-size:22px;">*</span></label>
                  <input type="text" id="zip" name="txtzip" placeholder="Pincode" value="<?php echo $ozip; ?>">
                  <span class="error"> <?php echo $eozip; ?></span>
                  </span>
                </div>

                <div class="col-50">
                  <label for="state"><i class="fas fa-phone-alt"></i> Phone <span style="color:red; font-size:22px;">*</span></label>
                  <input type="text" id="phone" name="txtcontact" placeholder="Phone number" value="<?php echo $contact; ?>">
                  <span class="error"> <?php echo $econtact; ?></span>
                  </span>
                </div>
              </div>
            </div>

          </div>

          <label>
            <input type="checkbox" checked="checked" name="sameadr" required> Shipping address same as billing <span style="color:red; font-size:18px;">*</span>
          </label>

          <div> &nbsp;&nbsp;<span style="color:red; font-size:30px; font-weight:unset; position:relative;top:5px;">*</span> fields are required. </div>
          <input type="submit" name="btnsub" value="Continue to checkout" class="btn">
      </div>
      </form>
    </div>
    <div class="col-25" style="padding-left:40px;"><br><br><br>
      <div class="cont pform">
          <h4>Cart </h4>
          <span class="price" style="color:black">
            <?php
            $pqryy = "select * from pcart,product where pcart.pid=product.pid AND pcart.shid=product.shid AND uid='$uid'";
            $presult1 = $cnn->query($pqryy);
            $cnt = mysqli_num_rows($presult1);
            $str = "";
            $str = "<i class='fa fa-shopping-cart'></i>
          <b>" . $cnt . "</b>
        </span>
      </h4><br>";
            while ($row = $presult1->fetch_assoc()) {
              $shid = $row["shid"];
              $pid = $row["pid"];
              $str .= "<table><tr><td style='width:70%; padding-bottom:10px;'><a href='productdetails.php?name=" . $pid . "&shid=" . $shid . "'>" . $row["pname"] . "</a> (" . $row["qty"] . " x ₹" . $row["oprice"] . ")</td> <td style='padding-bottom:10px;'><span class='price'>₹" . $row["pqty"] . "</span></td></tr></table>";
            }
            $str .= "<hr>
      <p>Total <span class='price' style='color:black'><b>₹" . $price . "</b>";

            echo $str;
            ?>

          </span></p>
      </div>
    </div>
  </div>

  </div>
</section>
<?php
include_once("footer.php");
?>