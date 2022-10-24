<?php include_once("header.php"); ?>

<div class="content-wrapper">
  <?php
  $conn = mysqli_connect("localhost", "root", "", "project");
  $qry = "Select * from doctor";
  $result = $conn->query($qry);
  $tbl = "<section class='content'><div class='container-fluid'><div class='row'><div class='col-12'><div class='card'><div class='card-body table-responsive p-0' style='height: 84vh;'><table class='table table-head-fixed text-nowrap'><thead><tr><th>Name</th><th>Clinic Name</th><th>Contact No</th><th>Email</th><th></th><th></th><th></th></tr></thead>";
  while ($row = $result->fetch_assoc()) {
    $id = $row["did"];
    $name = $row["fullname"];
    $username = $row["uname"];
    $contact = $row["contactno"];
    $gender = $row["gender"];
    $email = $row["email"];
    $occupation = $row["occupation"];
    $experience = $row["experience"];
    $gvc_no = $row["gvc_no"];
    $cname = $row["cname"];
    $caddress = $row["caddress"];

    $contactno = strlen($contact);
    if ($contactno == 8) {
      $contact = "(079) " . $contact;
    } 
    else if ($contactno == 10) {
      $contact = "(+91) " . $contact;
    }
    
    $tbl .= "<tbody><tr><td>$name</td><td>$cname</td><td>$contact</td><td>$email</td><td><a href='doctorDetails.php?id=$id'><input type='submit' class='update' name='update' value='View'></a></td><td><a href='doctorDelete.php?id=$id'><input type='submit' class='delete' name='delete' value='Delete'></a></td></tr></tbody>";
  }
  $tbl .= "</table></div><!-- /.card-body --></div><!-- /.card --></div></div><!-- /.row --></div><!-- /.container-fluid --></section><!-- /.content --></div>";
  echo "<br>" . $tbl;
  ?>

  <?php include_once("footer.php"); ?>