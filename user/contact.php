<?php include_once("header.php"); ?>
<!--.slider_area-->
<section class="slider_area" style="background-image:url(images/slider/4.jpg);">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="slider">
          <h2>CONTACT</h2>
          <p> <a href="index.php">Home <span>/</span></a> Contact</p>
        </div>
      </div>
    </div>
  </div>
</section>
<!--/slider_area-->
<?php
$conn = mysqli_connect("localhost", "root", "", "project");
if (isset($_SESSION["id"])) {
  $uid = $_SESSION["id"];
  $qry = "Select * from user where uid = '$uid'";
  $result = $conn->query($qry);
  $row = $result->fetch_assoc();
  $name = $row["name"];
  $email = $row["email"];
  $contact = $row["contact"];
} else {
  $uid = "";
  $name = "";
  $email = "";
  $contact = "";
}
if(isset($_POST["btncontact"])){
  $tname = $_POST["txtname"];
  $temail = $_POST["txtemail"];
  $tcontact = $_POST["txtcontact"];
  $tmessage = $_POST["txtmessage"];

  $qry = "Insert into contactus (uid, name, email, contact, msg, dop, status) values('$uid ', '$tname', '$temail', '$tcontact', '$tmessage', now(), 0)"; 
  $result = $conn->query($qry);
  
  if($result){
    echo "<script>alert('Message sent successfully!');</script>";
  }
  else{
    echo "<script>alert('Message not sent');</script>";
  }
}
?>
<!-- start latest-news-->
<section class="contact-us">
  <div class="container">
    <div class="row">
      <div class="col-md-7 col-sm-7 col-xs-12">
        <div class="contact-office">
          <h4>OUR OFFICE</h4>
          <ul>
            <li><a href="#"><i class="fa fa-map-o" aria-hidden="true"></i>Government Polytechnic Ahmedabad, Panjra Pol, Ahmedadbad, Gujarat - 380015.</a></li>
            <li><a href="#"><i class="fa fa-phone" aria-hidden="true"></i>+01 234 56789</a></li>
            <li><a href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i>info@petcrew.com</a></li>
          </ul>
        </div>
        <div class="default-form clearfix">
          <form class="contact-form" class="default-form" method="post" style="color: black;">
            <div class="form-group">
              <input type="text" placeholder="Your Name" name="txtname" required="" value="<?php echo $name; ?>">
            </div>
            <div class="form-group">
              <input type="email" placeholder="Your Email" name="txtemail" required="" value="<?php echo $email; ?>">
            </div>  
            <div class="form-group">
              <input type="text" placeholder="Your Phone Number" name="txtcontact" required="" value="<?php echo $contact; ?>">
            </div>
            <div class="form-group comments">
              <textarea placeholder="Your Message" name="txtmessage" required=""></textarea>
            </div>
            <input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden" value="">
            <button type="submit" name="btncontact" data-loading-text="Please wait..." class="btn btn-one btn-tow">SUBMIT</button>
          </form>
        </div>
      </div>
      <div class="col-md-5 col-sm-5">
        <div class="map-section">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3671.93220593028!2d72.   54537831498138!3d2302626128495124!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f131!3m3!1m2!1s0x395e84e8f8295a89%3A0xbbc57db3ec7081c2!2sGovernment%20Polytechnic%20Ahmedabad!5e0!3m2!1sen!2sin4v1634904733469!5m2!1sen!2sin" width="600" height="565" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
      </div>
    </div>
  </div>
</section>
<!--End latest-news-->
<?php include_once("footer.php"); ?>