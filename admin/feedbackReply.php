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
            $qry = "Select * from contactus where cuid = $id";
            $result = $conn->query($qry);
            while ($row = $result->fetch_assoc()) {
              $id = $row["cuid"];
              $name = $row["name"];
              $email = $row["email"];
              $msg = $row["msg"];
            }
            if (isset($_POST["btnreply"])) {
              $to_email = $email;
              $subject = "Regarding Your Feedback";
              $headers = "From: petcreworganisation@gmail.com\r\n";
              $headers .= "Content-Type : text/html; charset=ISO-8859-1\r\n";
              $reply = $_POST['txtreply'];
              $body = "<html>
                <body>
                    <p>Hello <b>$name</b>!!!<br>$reply <br><small>~ Pet Crew.</small></p>
                </body>
            </html>";

              if (mail($to_email, $subject, $body, $headers)) {
                echo "<script>alert('Reply Sent!!!');</script>";
                echo "<script>location.href='feedbackView.php'</script>";
                $qryStatus = "Update contactus set status = 1  where cuid = $id ;";
                $result1 = $conn -> query($qryStatus);
              } else {
                echo "Email Failed...";
                ini_set("error_reporting", E_ALL);
                print_r(error_get_last());
              }
            } else {
              mysqli_close($conn);
            }
            if (isset($_POST["btnback"])) {
              header("location: feedbackView.php");
            }
            ?>
            <form method="POST">
              <div class="card-body">
                <div class="form-group">
                  <label for="txtname">Full Name</label>
                  <input type="text" class="form-control" name="txtname" id="txtname" value="<?php echo $name; ?>" readonly>
                </div>
                <div class="form-group">
                  <label for="txtemail">Email</label>
                  <input type="text" class="form-control" name="txtemail" id="txtemail" value="<?php echo $email; ?>" readonly>
                </div>
                <div class="form-group">
                  <label for="txtmsg">Message</label>
                  <input type="text" class="form-control" name="txtmsg" id="txtmsg" value="<?php echo $msg; ?>" readonly>
                </div>
                <div class="form-group">
                  <label for="txtreply">Message</label>
                  <textarea name="txtreply" class="form-control" id="txtreply" cols="20" rows="10"></textarea>
                </div>
              </div>
              <div class="card-footer">
                <input type="submit" name="btnreply" value="Reply " class="btn btn-primary">
                <input type="submit" name="btnback" value="Back" class="btn btn-danger">
              </div>
            </form>
          </div>
        </div>
      </div>
  </section>
</div>

<?php include_once("footer.php"); ?>