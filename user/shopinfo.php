<?php
include_once("header.php");
?>

<div class="col-12">
  <h3 class="page-title"></h3><br>

  <section>

    <?php
    if (isset($_SESSION["id"])) {
      $uid = $_SESSION["id"];
    } else {
      $uid = "";
    }
    $shid = $_GET["shid"];
    $cnn = mysqli_connect("localhost", "root", "", "project");
    $query = "Select * from shop where shid='$shid'";
    $result = $cnn->query($query);
    $row1 = mysqli_fetch_assoc($result);
    ?>

    <section class="slider_area" style="background-image:url(images/slider/4.jpg);">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="slider">
              <h2>SHOP DETAILS</h2>
              <p><a href="home.php">Home </a><span>/</span><a href="shop.php"> Shop </a><span>/ </span><?php echo $row1["sname"]; ?> </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <br>

    <div class="container">

      <?php
      $shid = $_GET["shid"];
      $cnn = mysqli_connect("localhost", "root", "", "project");
      $query1 = "Select * from shop where shid='$shid'";
      $result1 = $cnn->query($query1);


      $str = "<table class'table' style='font-size:18px; color: black; width:75%; margin-left:200px; margin-bottom:50px;'>";
      while ($row = $result1->fetch_assoc()) {
        $str .= "<tr><td><h4 class='page-title' style='font-size:28px; font-weight:bold; text-transform:capitalize;'> " . $row["sname"] . "</h4><br><img src='../shop/images/shop/".$row["img"]."' height='270' width='350' style='padding-right:40px;'>" . "</td>
				<td style='padding-left:30px; margin-right:20px; padding-top:100px;'>" . "
        <b>Address</b> : " . $row["address"] . ".<span style='display: block;margin-bottom: 12px;'></span>
				<b>Contact No</b> : " . $row["contactno"] . " <span style='display: block;margin-bottom: 12px;'></span>
				<b>Email</b> : " . $row["email"] . "<span style='display: block;margin-bottom: 12px;'></span>
				<b>Website</b> : <a href='$row[website]'> " . $row["website"] . "</a><br>
                
        </div><a href='sprod.php?name=" . $row["shid"] . "' ><input type='submit' style='background: #4a4848 none repeat scroll 0 0;color: #ffffff;font-size: 16px;font-weight: bold;height: 45px;margin-top: 30px; text-transform: uppercase;transition: all 500ms ease 0s;width: 160px;border-radius:10px;text-align: center;line-height: 50px' value='View Products'/></a></td></tr></table>";
      }


      echo $str;
      ?>


    </div>

  </section>

  <?php
  include_once("footer.php");
  ?>