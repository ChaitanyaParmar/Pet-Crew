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
    $pid = $_GET["pid"];
    $cnn = mysqli_connect("localhost", "root", "", "project");
    $query = "Select petsid, name, bname, age, sname from pets, shop, breed where pets.bid = breed.bid and pets.shid = shop.shid and petsid='$pid'";
    $result = $cnn->query($query);
    $row1 = mysqli_fetch_assoc($result);
    ?>

    <section class="slider_area" style="background-image:url(images/slider/4.jpg);">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="slider">
              <h2>PET DETAILS</h2>
              <p><a href="home.php">Home </a><span>/</span><a href="pet.php"> Pet </a><span>/ </span><?php echo $row1["name"]; ?> </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <br>

    <div class="container">

      <?php
      $pid = $_GET["pid"];
      $cnn = mysqli_connect("localhost", "root", "", "project");
      $query1 = "Select petsid, name, bname, pets.shid, gender, age, price, height, weight, details, sname, pets.img from pets, shop, breed where pets.bid = breed.bid and pets.shid = shop.shid and petsid='$pid'";
      $result1 = $cnn->query($query1);


      $str = "<table class'table' style='width:75%; margin-left:150px; margin-bottom:50px;'>";
      while ($row = $result1->fetch_assoc()) {
        $str .= "<tr><td><h4 class='page-title' style='font-size:28px; font-weight:bold; text-transform:capitalize;'> " . $row["name"] . "</h4><br><img src='images/pet/".$row["img"]."' height='270' width='350' style='padding-right:40px;'>" . "</td>
				<td style='color:black; font-size:20px;padding-left:30px; margin-right:20px; padding-top:80px;'>" . 
        // "Name: " . $row["name"] . "<span style='display: block;margin-bottom: 12px;'></span>".
        "<b>Breed</b>:  " . $row["bname"] . "<span style='display: block;margin-bottom: 12px;'></span>".
        "<b>Shop</b>: " . $row["sname"] . "<span style='display: block;margin-bottom: 12px;'></span>".
        "<b>Gender</b>: " . $row["gender"] . "<span style='display: block;margin-bottom: 12px;'></span>".
        "<b>Age</b>: " . $row["age"] . "<span style='display: block;margin-bottom: 12px;'></span>".
        "<b>Height</b>: " . $row["height"] . " cm<span style='display: block;margin-bottom: 12px;'></span>".
        "<b>Weight</b>:  " . $row["weight"] . " kg<span style='display: block;margin-bottom: 12px;'></span>".
        "<b>Price</b>: ₹ " . $row["price"] . "<span style='display: block;margin-bottom: 12px;'></span>".
        "<b>Details</b>: " . $row["details"] . "<span style='display: block;margin-bottom: 12px;'></span>".
        " <br>
				
                
        </div><a href='shopinfo.php?shid=" . $row["shid"] . "' ><input type='submit' style='background: #000000 none repeat scroll 0 0;color: #ffffff;font-size: 16px;font-weight: bold;height: 45px;margin-top: 3text-transform: uppercase;transition: all 500ms ease 0s;width: 160px;border-radius:10px;text-align: cenline-height: 50px' value='Visit Shop'/></a></td></tr>  </table>";
      }


      echo $str;
      ?>


    </div>

  </section>

  <?php
  include_once("footer.php");
  ?>