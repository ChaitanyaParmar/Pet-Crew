<?php
ob_start();
include_once("header.php");
?>

<div class="content-wrapper">
  <section class="content" style="margin-top: 20px;">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <?php
            $id = $_REQUEST["id"];
            $conn = mysqli_connect("localhost", "root", "", "project");
            $qry = "Select * from deliveryboy where dbid = $id";
            $result = $conn->query($qry);
            $tbl = "<table class='table table-borderless'>";
            while ($row = $result->fetch_assoc()) {
              $id = $row["dbid"];
              $name = $row["fullname"];
              $contact = $row["contactno"];
              $email = $row["email"];
              $address = $row["address"];
              $tbl .= "<td><b>Name :</b> $name <br> <b>Contact No :</b> $contact <br> <b>Email:</b> $email <br> <b>Address:</b> $address </td>";
            }
            $tbl .= "</table>";
            if (isset($_POST["btndelete"])) {
              $qryDelete = "Delete from deliveryboy where dbid = $id";
              $resultDelete = $conn->query($qryDelete);
              if ($resultDelete == TRUE) {
                header("location: deliveryBoyView.php");
              } else {
                mysqli_close($conn);
              }
            }
            if (isset($_POST["btnback"])) {
              header("location: deliveryBoyView.php");
            }
            ?>
            <form method="POST">
              <div class="card-body">
                <?php echo $tbl; ?>
              </div>
              <div class="card-footer">
                <input type="submit" name="btndelete" value="Delete" class="btn btn-primary">
                <input type="submit" name="btnback" value="Back" class="btn btn-danger">
              </div>
            </form>
          </div>
        </div>
      </div>
  </section>
</div>

<?php include_once("footer.php"); ?>