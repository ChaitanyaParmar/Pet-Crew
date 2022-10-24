<?php
include_once("header.php");
?>
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12"><br>
                <div class="card card-primary" style="font-size: 20px;"><br>
                    <?php
                    $gid = $_SESSION["id"];
                    $aid = $_GET["id"];
                    $cnn = mysqli_connect("localhost", "root", "", "project");
    
                    // $qry="Update appointment set mpid='$mpid',status='1',vdatetime=now() where aid='$id' AND did='$did'";
                    $qry = "Update appointment set status='1',apvdate=now() where aid='$aid' AND gid='$gid'";
                    $result = $cnn->query($qry);

                    $queryEmail = "Select appointment.fullname, user.email, groomer.fullname from appointment, user, groomer where appointment.uid = user.uid and appointment.gid = groomer.gid and aid = '$aid'";
    
                    $result1 = $cnn->query($queryEmail);
                    $row = $result1->fetch_assoc();
                    $email = $row["email"];
                    $name = $row["name"];
                    $fullname = $row["fullname"];
    
    
                    $to_email = $email;
                    $subject = "Thank You";
    
                    $headers = "From: Pet Crew<petcreworganisation@gmail.com>\r\n";
    
                    $headers .= "Content-Type : text/html; charset=ISO-8859-1\r\n";
    
                    $body = "<html>
                    <body>
                    <p> $name , <br><br>Your appointment of $fullname has been scheduled.<br><br>
                    If you have any queries regarding the appointment, you can contact us by <a href='mailto:petcreworganisation@gmail.com'>email</a><br>
                    <br><small>Pet Crew</small></p>
                    </body>
                    </html>";
    
                    if (mail($to_email, $subject, $body, $headers)) {
    
                        echo "<script>alert('Appointment Scheduled !');</script><br>";
    
                        echo "<script>location.href='appointmentView.php'</script>";
                    } else {
                        echo "Email sending failed...";
                        ini_set("error_reporting", E_ALL);
                        print_r(error_get_last());
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include_once("footer.php");
?>