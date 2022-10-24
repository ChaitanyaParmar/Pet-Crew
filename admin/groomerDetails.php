<?php
ob_start();
include_once("header.php");
?>

<div class="content-wrapper">
  <!-- <section class="content"> -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary" style="font-size: 20px;">
            <?php
            $id = $_REQUEST["id"];
            $conn = mysqli_connect("localhost", "root", "", "project");
            $qry = "Select * from groomer where gid = $id";
            $result = $conn->query($qry);
            $tbl = "<table class='table table-borderless'>";
            while ($row = $result->fetch_assoc()) {
              $gid = $row["gid"];
              $name = $row["fullname"];
              $username = $row["uname"];
              $contact = $row["contactno"];
              $gender = $row["gender"];
              $email = $row["email"];
              $shop = $row["shopname"];
              $address = $row["address"];

              $contactno = strlen($contact);
              if($contactno == 8){
                $contact = "(079) " . $contact;
              }
              else if($contactno == 10){
                $contact = "(+91) " . $contact;
              }

              $tbl .= "<td><b>Name :</b> $name <br> <b>Username :</b> $username <br> <b>Contact No :</b> $contact <br> <b>Gender :</b> $gender <br> <b>Email:</b> $email <br> <b>Shop Name :</b> $shop <br> <b>Address:</b> $address</td>";
            }
            $tbl .= "</table>";
            if (isset($_POST["btnupdate"])) {
              header("location: groomerUpdate.php?id=$gid");
            }
            if (isset($_POST["btnback"])) {
              header("location: groomerView.php");
            }
            ?>
            <form method="POST">
              <div class="card-body">
                <?php echo $tbl; ?>
                <br>
                <input type='submit' name='btnupdate' value='Update' class='btn btn-primary'>
                <input type="submit" name="btnback" value="Back" class="btn btn-danger">
              </div>
            </form>
          </div>
        </div>
      </div>
  <!-- </section> -->
</div>

<?php include_once("footer.php"); ?>