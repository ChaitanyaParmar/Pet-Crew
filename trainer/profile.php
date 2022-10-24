<?php
include_once("header.php");
$error = "";
?>
<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    body {
      /* width: 100%; */
      color: black;

      /* background:white;  */
    }

    table {
      width: 70%;
      margin-left: 180px;
      background: white;
      font-weight: bold;
    }

    td {
      /* padding-left: 40px; */
      padding-top: 10px;
    }

    .card-body p {
      padding-left: 150px;
    }

    #fname {
      width: 100%;
      border: 1px solid black;
    }

    .form-control[disabled],
    .form-control[readonly],
    fieldset[disabled] .form-control {
      background-color: white;
      /* o pacity: 1; */
    }

    .error {
      color: #FF0000;
      font-weight: normal;
      font-size: 13px;
    }
  </style>
</head>

<body>
  <?php

  $id = $_SESSION["id"];

  $cnn = mysqli_connect("localhost", "root", "", "project");
  $qry = "select * from trainer where tid='$id'";
  $result = $cnn->query($qry);
  $row = $result->fetch_assoc();

  $uname = $row["uname"];
  $name = $row["fullname"];
  $email = $row["email"];
  $doj = $row["doj"];
  $sname = $row["shop"];
  $addr = $row["address"];
  $gen = $row["gender"];
  $contact = $row["contactno"];
  $img = $row["img"];

  $fnameerror = "";
  $lnameerror = "";
  $emailerror = "";
  $adderror = "";
  $gendererror = "";
  $noerror = "";
  $flag = "0";

  if (isset($_POST["btnsub"])) {
    $cnn = mysqli_connect("localhost", "root", "", "project");

    // $username=$_POST["txtusername"];
    $id = $_SESSION["id"];
    $tname = $_POST["txtname"];
    $contactno = $_POST["txtcontact"];
    $gender = $_POST["txtgender"];
    $temail = $_POST["txtemail"];
    $tsname = $_POST["txtsname"];
    $address = $_POST["txtaddress"];


    function test_input($data)
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // name
      if (empty($_POST["txtname"])) {
        $nameerror = "Name is required";
        $flag = 1;
      } else {
        $name1 = test_input($name);
        if (!preg_match("/^[a-zA-Z]*$/", $name)) {
          $nameerror = "Only letters in lastname";
          $flag = 1;
        }
      }

      // gender
      if (empty($gender)) {
        $gendererror = "Gender is required";
        $flag = 1;
      } else {
        $gender = test_input($gender);
      }

      // email
      if (empty($_POST["txtemail"])) {
        $emailerror = "Email is required";
        $flag = 1;
      } else {
        $email1 = test_input($email);
        if (!filter_var($email1, FILTER_VALIDATE_EMAIL)) {
          $emailerror = "Invalid email format";
          $flag = 1;
        }
      }

      // contact no
      if (empty($_POST["txtcontact"])) {
        $noerror = "Contact number is required";
        $flag = 1;
      } 

      // address
      if (empty($_POST["txtaddress"])) {
        $adderror = "Address is required";
        $flag = 1;
      } else {
        $address1 = test_input($addr);
        if (strlen($addr) < 3) {
          $adderror = "Address must have more than 3 letters";
          $flag = 0;
        }
      }
    }
    if ($_FILES['file']['name'] != "") {
      $file = $_FILES['file'];

      $fileName = $_FILES['file']['name'];
      $fileTmpName = $_FILES['file']['tmp_name'];
      $fileSize = $_FILES['file']['size'];
      $fileError = $_FILES['file']['error'];
      $fileType = $_FILES['file']['type'];

      // Gets file extension
      $fileExt = explode('.', $fileName);
      $fileActualExt = strtolower(end($fileExt));

      $allow = array('png', 'jpg', 'jpeg');

      if (in_array($fileActualExt, $allow)) {
        if ($fileError == 0) {
          if ($fileSize < 500000) {
            $fileNameNew = $id . "." . $fileActualExt;
            $fileDestination = "images/trainers/" . $fileNameNew;
            move_uploaded_file($fileTmpName, $fileDestination);
            echo "<script>alert('Upload Successful !!');</script>";
          } else {
            $error = "Your file is too Big!!!";
          }
        } else {
          $error = "There was an error uploading your file!!!";
        }
      } else {
        $error = "You cannot upload files of this type!!!";
      }

      $qry = "update trainer set fullname='$tname',contactno='$contactno',gender='$gender',email='$temail',shop = '$tsname', address='$address',img='$fileNameNew' where tid='$id'";
      $result = $cnn->query($qry);
      $yourURL = "profile.php";
      echo ("<script>location.href='$yourURL'</script>");
    } else {
      $qry = "update trainer set fullname='$tname',contactno='$contactno',gender='$gender',email='$temail',shop = '$tsname', address='$address' where tid='$id'";
      $result = $cnn->query($qry);
      if ($result) {
        echo "<script>location.href='Profile.php';</script>";
      } else {
        echo "<script>alert('Profile Not Updated Successfully)</script>";
      }
    }
  }
  ?>


  <!-- <div class="card"> -->
  <div class="card-body">
    <form role="form" method="POST" enctype="multipart/form-data"><br>
      <h2 style="text-align: center;">Edit Profile</h2>
      <table style="width:100%;">

        <tr>
          <td>
            <!-- <p>User Name </p> -->
            <br>

            <?php
            if (empty($img)) {
              echo "<img width='180px' height='160px' style='border-radius:10%; position:relative; left:200px; top:-20px; background-color: white;'src='images/logo/account.jpg '>";
            } else {
              echo "<img width='180px' height='160px' style='border-radius:10%; position:relative; left:200px; top:-20px;'src='images/trainers/$img'>";
            }
            ?>
            <input id="f02" type="file" name="file" style="position:relative; overflow:hidden; display:none;">
          </td>
          <td><label style="font-size:26px;margin-top:20px;"><?php echo $uname; ?></label><br><br>
            <label for="f02" style="position:relative; color:blue; top:-3px; ">Change Profile Photo</label>
            <br>

            <?php
            echo "<a href='Profile_d.php?id=" . $id . "'>"; ?>
            <label style="position:relative; color:red; top:-13px; ">Remove Photo</label>
          </td>

          <td><br>
            <p style="padding-left:40px; margin-top: 20px;">


            </p>

            </p>
          </td>



        <tr>
          <td style=" position:absolute;margin-left:50px;">
            <p>Full Name</p>
          </td>
          <td><input type="text" class="form-control" id="fname" name="txtname" value="<?php echo $name; ?>">

            <!-- <span class="error"> <?php echo $nameerror; ?></span> -->
          </td>
        </tr>

        <tr>
          <td style=" position:absolute;margin-left:50px;">
            <p>Email</p>
          </td>
          <td><input type="text" class="form-control" id="fname" name="txtemail" value="<?php echo $email; ?>">
            <span class="error"> <?php echo $emailerror; ?></span>
          </td>
        </tr>

        <tr>
          <td style=" position:absolute;margin-left:50px;">
            <p>Contact No</p>
          </td>
          <td><input type="text" class="form-control" id="fname" name="txtcontact" value="<?php echo $contact; ?>">
            <span class="error"> <?php echo $noerror; ?></span>
          </td>
        </tr>

        <tr>
          <td style=" position:absolute;margin-left:50px;">
            <p>Gender</p>
          </td>
          <td><input type="text" class="form-control" id="fname" name="txtgender" value="<?php echo $gen; ?>">
            <span class="error"> <?php echo $gendererror; ?></span>
          </td>
        </tr>

        <tr>
          <td style=" position:absolute;margin-left:50px;">
            <p>Clinic Name</p>
          </td>
          <td><input type="text" class="form-control" id="fname" name="txtsname" value="<?php echo $sname; ?>">
            <span class="error"> <?php echo $gendererror; ?></span>
          </td>
        </tr>

        <tr>
          <td style=" position:absolute;margin-left:50px;">
            <p>Clinic Address</p>
          </td>
          <td><textarea name="txtaddress" class="form-control" id="fname" cols="10" rows="5" value=""><?php echo $addr; ?></textarea>
            <span class="error"> <?php echo $adderror; ?></span>
          </td>
        </tr>

      </table>
      <div style="text-align:center;">
        <div style="padding:10px 0px 20px 0px; font-style:normal; color:gray;">
          <?php echo "Joined since " . $doj; ?>
        </div>
        <input type="submit" class="btn btn-primary" name="btnsub" style=" background:#231e1ee0;" value="UPDATE">

      </div>
    </form>

  </div>
  <!-- </div> -->

</body>

</html>
<?php
include_once("footer.php");
?>