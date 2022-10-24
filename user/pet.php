<?php
include_once("header.php");
?>

<style>
  /* Formatting search box */
  .result {
    position: absolute;
    z-index: 999;
    top: 100%;
    left: 0;
  }

  .result {
    width: 100%;
    box-sizing: border-box;

  }

  /* Formatting result items */
  .result p {
    margin: 0;
    padding: 7px 10px;
    border: 1px solid #CCCCCC;
    border-top: none;
    cursor: pointer;
    background: white;

  }

  .result p:hover {
    background: #f2f2f2;
  }

  .our-team-text h4 {
    color: #222222;
    font-family: 'Open Sans', sans-serif;
    font-size: 30px;
    font-weight: bold;
    line-height: 5px;
    margin-top: 15px;
    text-align: center;
    padding-bottom: 18px;
  }
</style>
<div class="col-12">
<h3 class="page-title"></h3><br>
  
  <form role="form" method="post">
    <section class="shop-section" style="padding-bottom: 0px;">
      <section class="slider_area" style="background-image:url(images/slider/4.jpg);">
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="slider">
                <h2>PET</h2>
                <p> <a href="index.php">Home </a><span>/</span> <a href="pet.php"> Pet</a></p>
              </div>
            </div>
          </div>
        </div>
      </section>


      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">

            <div class="showing">
              <div class="single-form" style="text-align:center; margin-right:85px; margin-top:20px; ">
                <div class="select-input-wrapper">

                  <?php

                  if (isset($_SESSION["id"])) {
                    $uid = $_SESSION["id"];
                  } else {
                    $uid = "";
                  }
                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- <div class="row"> -->

        <?php
        $cnn = mysqli_connect("localhost", "root", "", "project");
        $query = "Select petsid, name, bname, age, sname, pets.img from pets, shop, breed where pets.bid = breed.bid and pets.shid = shop.shid";
        $result = $cnn->query($query);
        $str = "<table style='table-layout:fixed; '>";
        $x = 1;
        while ($row = $result->fetch_assoc()) {
          if ($x == 1) {
            $str .= "<tr class='row '>";
          }
          $x++;
          $str .= "<td class='col-lg-4 col-md-12 col-sm-3'>
                
        <div class='our-team wow fadeInUp animated' data-wow-delay='300ms' data-wow-duration='1500ms'style='visibility: visible; animation-duration: 1500ms; animation-delay: 300ms; animation-name: fadeInUp;'>
          <div class='img-holder' style=' padding:20px;'>
            <figure><a href='petinfo.php?pid=" . $row["petsid"] . "'><img src='images/pet/".$row["img"]."' height='300px' width='1200px' style='border-radius:0px; box-shadow:0px 0px 6px 2px black; width:350px;' alt='Images'></a></figure>
          </div>
          <div class='our-team-text' >
            <h4>" . $row["name"] . "</h4>
            <p style='font-size:19px; text-transform:capitalize;'>( " . $row["bname"] . " )</p>
          </div>
        </div></td>";
          if ($x == 4) {
            $str .= "</tr>";
            $x = 1;
          }
        }
        $str .= "</table>";
        echo $str;

        ?>
      </div>

</div>
</section>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


<?php
include_once("footer.php");
?>