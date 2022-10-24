<?php include_once("header.php"); ?>

  <div class="content-wrapper">
    <?php
      $conn = mysqli_connect("localhost", "root", "", "project");
      $qry = "Select * from contactus";
      $result = $conn -> query($qry);
      $tbl = "<section class='content'><div class='container-fluid'><div class='row'><div class='col-12'><div class='card'><div class='card-body table-responsive p-0' style='height: 84vh;'><table class='table table-head-fixed text-nowrap'><thead><tr><th>Full Name</th><th>Email</th><th>Date</th><th>Message</th><th>Status</th><th></th></tr></thead>";
      while ($row = $result->fetch_assoc()) {
        $id = $row["cuid"];
        $name = $row["name"];
        $email = $row["email"];
        $date = $row["dop"];
        $msg = $row["msg"];
        $status = $row["status"];

        if($status == 0){
          $status = "Pending";
        }
        else{
          $status = "Replied";
        }

        $tbl .= "<tbody><tr><td>$name</td><td>$email</td><td>$date</td><td>$msg</td><td>$status</td><td><a href='feedbackReply.php?id=$id'><input type='submit' class='reply' name='reply'value='Reply'></a></td></tr></tbody>";
      }
      $tbl .= "</table></div><!-- /.card-body --></div><!-- /.card --></div></div><!-- /.row --></div><!-- /.container-fluid --></section><!-- /.content --></div>";
      echo "<br>" . $tbl;
    ?>                  
  
<?php include_once("footer.php"); ?>