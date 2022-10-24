<?php
    include_once("header.php");
?>
<style>
  .error {
    color: #FF0000;
  }

  .default-form .form-group input[type="text"],
  .default-form .form-group input[type="email"],
  .default-form .form-group input[type="password"],
  .default-form .form-group input[type="tel"],
  .default-form .form-group input[type="number"],
  .default-form .form-group select,
  .default-form .form-group textarea {
    background: #ffffff;
    border: 1px solid #EEEEEE;
    border-radius: 0px;
    display: block;
    font-family: 'Lato', sans-serif;
    font-size: 14px;
    height: 50px;
    line-height: 26px;
    padding: 11px 15px;
    position: relative;
    transition: all 500ms ease 0s;
    width: 100%;
    z-index: 1;
    margin-bottom: -4px;
  }

</style>

<?php

// heading
$did = $_REQUEST["id"];
$uid = $_SESSION["id"];

$cnn = mysqli_connect("localhost", "root", "", "project");
$qry1 = "select fullname from doctor where did='$did'";
$result = $cnn->query($qry1);
$row = $result->fetch_assoc();
$fullname = $row["fullname"];

$query = "select * from user where uid='$uid'";
$resultu = $cnn->query($query);
$row = $resultu->fetch_assoc();
$email = $row["email"];
$fname=$row["name"];
$address=$row["address"];
$contactno=$row["contact"];

// $fname = "";
$cid = "";
$bid = "";
$adatetime = "";
$petage = "";
$pname = "";
// $ppic="";
$contact = "";
$addr = "";
$cmt = "";
// $gen="";

$efullname = "";
$ecid = "";
$ebid = "";
$eadatetime = "";
$epetage = "";
$epname = "";
// $eppic="";
$econtact = "";
$eaddr = "";
// $egen="";
$flag = 0;


// $uid = $_SESSION["id"];
if (isset($_POST["btnsub"])) {
  $cnn = mysqli_connect("localhost", "root", "", "project");
//  $query1 = "select mpid from mplan where did='$did' AND status='cur'";
//  $result = $cnn->query($query1);
//  $row = $result->fetch_assoc();
//  $mpid = $row["mpid"];

  $tbid = $_POST["txtbid"];
  $tpetage = $_POST["txtpetage"];
  $tadatetime = $_POST["txtadatetime"];
  $tpname = $_POST["txtpname"];
  $taddr = $_POST["txtaddr"];
  $tcontact = $_POST["txtcontact"];
  $tfname = $_POST["txtname"];
  $tcmt = $_POST["txtcmt"];

  function test_input($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

//  if ($_SERVER["REQUEST_METHOD"] == "POST") {
//
//    //name
//    if (empty($_POST["txtname"])) {
//      $efullname = "Fullname is required.";
//      $flag = 1;
//    } else {
//      $uname1 = test_input($fname);
//      if (!preg_match("/^[a-zA-Z ]*$/", $uname1)) {
//        $efullname = "Only letters and white space allowed.";
//        $flag = 1;
//      }
//    }
//
//    // contact no
//    if (empty($_POST["txtcontact"])) {
//      $econtact = "Contact number is required.";
//      $flag = 1;
//    } else {
//      $contno1 = test_input($contact);
//      if (!preg_match("/^\d{10}$/", $contno1)) {
//        $econtact = "Please enter contactno of 10 digit.";
//        $flag = 1;
//      }
//    }
//
//    // address
//    if (empty($_POST["txtaddr"])) {
//      $eaddr = "Address is required.";
//      $flag = 1;
//    } else {
//      $address1 = test_input($addr);
//      if (strlen($addr) < 7) {
//        $eaddr = "Please write your full address.";
//        $flag = 1;
//      }
//    }
//
//
//    // adatetime
//    if (empty($adatetime)) {
//      $eadatetime = "Please choose your preferred appointment time.";
//      $flag = 1;
//    } else {
//      $aadatetime = test_input($adatetime);
//    }
//  }

  if ($flag == 0) {

    $qry = "insert into appointment(uid,fullname,contactno,address,bid,age,appdate,petname,details,did, status) values('$uid','$tfname','$tcontact','$taddr','$tbid','$tpetage','$tadatetime','$tpname','$tcmt','$did', '0')";

    $result = $cnn->query($qry);
    echo "<script>alert('Your appointment request is appended. Please keep checking your mail for updates.')</script>";

    header("location: services.php");
     $to_email = $email;
     $subject = "$fullname's Appointment Request";

     $headers = "From: Pet Crew<petcreworganisation@gmail.com>\r\n";
     // $headers = "MIME-Version: 1.0\r\n";
     $headers .= "Content-Type : text/html; charset=ISO-8859-1\r\n";

     $body = "<html>
         <body>
         <p><br>Dear " . $fname . ",
         <br><br>Your request of Doctor $fullname's appointment is appended. Please keep checking your mail for updates.<br>Thank You.<br>
         <br>~Pet Crew.</p>
        
     </body>
     </html>";

     if (mail($to_email, $subject, $body, $headers)) {
       echo ("<Script>location.href='services.php'</script>");
     } else {
       echo "Email sending failed...";
       ini_set("error_reporting", E_ALL);
       print_r(error_get_last());
     }
  }
}


?>



<section class="contact-area" style="padding-top: 40px;
    padding-bottom: 0px;">
  <div class="container">
    <div class="row clearfix">
      <!--Left Column-->
      <div class="col-md-9 col-sm-9 col-xs-12 ">
        <!-- .contact-form-wrap -->
        <div class="default-form">
          <h2>MAKE AN APPOINTMENT <br><span style="font-size:15px;"><?php echo "Doctor :  $fullname</a>"; ?>
            </span></h2>
          <form action="" id="" method="post" enctype="multipart/form-data">
            <div class="row clearfix">
              <div class="col-md-6 col-sm-6 col-xs-12 ">
<!--                <div class="form-group">-->
<!--                  <input type="text" style="color: black" name="email" value="--><?php //echo $email; ?><!--">-->
<!--                </div>-->
                  <div class="form-group">
                      <input type="text" name="txtname" style="color: black" placeholder="Your Fullname" value="<?php echo $fname; ?>">
                      <span class="error"> <?php echo $efullname; ?></span>
                  </div>


                <div class="single-form">
                  <div class="select-input-wrapper">
                    <select class="select-input" name="txtpetage" style="padding-left: 10px; color: black;">
                      <option value="" selected="selected">Pet age </option>
                      <option value="Puppy">Puppy (1-12 months)</option>
                      <option value="Junior">Junior (1-2 years)</option>
                      <option value="Adult">Adult (2-4 years)</option>
                      <option value="Mature">Mature (4-7 years)</option>
                      <option value="Senior">Senior (7-14 years)</option>
                      <option value="Geriatric">Geriatric (more than 14 years)</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <input type="text" style="color: black" name="txtpname" placeholder="Name of Pet" value="<?php echo $pname; ?>">
                </div>

                <div class="form-group comments">
                  <textarea name="txtaddr" style="color: black" placeholder="Address"><?php echo $address; ?></textarea>
                  <span class="error"> <?php echo $eaddr; ?></span>
                </div>
              </div>

              <div class="col-md-6 col-sm-6 col-xs-12 ">
                  <div class="form-group">
                      <input type="tel" style="color: black" name="txtcontact" placeholder="Phone" value="<?php echo $contactno; ?>">
                      <span class="error"> <?php echo $econtact; ?></span>
                  </div>

                <div class="single-form">
                  <div class="select-input-wrapper">
                    <select style="color: black" class="select-input" name="txtbid" style="padding-left: 10px;">
                      <?php
                      $cnn = mysqli_connect("localhost", "root", "", "project");
                      $qry = "SELECT * from breed";
                      $result1 = $cnn->query($qry);
                      ?>
                      <option value="39" selected="selected">Pet Breed </option>
                      <?php
                      while ($row1 = $result1->fetch_assoc()) {
                        $cid = $row1["bid"];
                        echo "<option value=" . $row1["bid"] . ">" . $row1["bname"] . "</option>";
                      }

                      ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <span class="Zebra_DatePicker_Icon_Wrapper" style="display: block; position: relative; float: none; inset: 0px;">
                    <input name="txtadatetime" type="text" placeholder="Visiting Date" class="datepicker" style="position: relative; inset: auto; color: black" readonly="readonly" value="<?php echo $adatetime; ?>">
                    <button type="button" class="Zebra_DatePicker_Icon Zebra_DatePicker_Icon_Inside" style="top: 17px; left: 401px;">Pick a date</button></span>
                  <span class="error"> <?php echo $eadatetime; ?></span>
                </div>
                <div class="form-group comments">
                  <textarea name="txtcmt" style="color: black" placeholder="Your Comments (or also write reason for appointment)"><?php echo $cmt; ?></textarea>
                </div>
              </div>

            </div>

            <input type="submit" class="btn btn-one" name="btnsub" value="GET AN APPOINTMENT">
          </form>
        </div>
        <!-- /.contact-form-wrap -->
      </div>
      <div class="col-md-3 col-sm-3 col-xs-12 ">
        <figure class="img-box wow slideInRight animated" data-wow-delay="300ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 300ms; animation-name: slideInRight; margin-top: -20px;">
          <img src="images/services/appoint.png" alt="Images" width="200px">
        </figure>
      </div>
    </div>

  </div>
</section>
<?php
include_once("footer.php");
?>