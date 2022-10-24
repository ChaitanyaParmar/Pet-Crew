<?php
include_once("header.php");
?>

<!-- <style>
  .container{
    width: 1400px;
  }
  
</style> -->

<script src="jquery-3.4.1.min.js"></script>
<script>
  $(document).ready(function() {
    $("#r1").click(function() {
      $("#r1").css("color", "#009ed4");
      //$("#txtrate").val('1');
      // $("#r1").click(function(){
      // 	$("#r1").css("color","gray");
      // });
      if ($("#r1").css("color", "#009ed4")) {
        $("#txtrate").val('1');
        $("#r2,#r3,#r4,#r5").css("color", "gray");
      }
    });
    $("#r2").click(function() {
      $("#r1,#r2").css("color", "#009ed4");

      // $("#r2").click(function(){
      // 	$("#r2").css("color","gray");
      // });
      if ($("#r2").css("color", "#009ed4")) {
        $("#txtrate").val('2');
        $("#r3,#r4,#r5").css("color", "gray");
      }

    });
    $("#r3").click(function() {
      $("#r1,#r2,#r3").css("color", "#009ed4");
      // $("#r3").click(function(){
      // 	$("#r3").css("color","gray");
      // });
      if ($("#r3").css("color", "#009ed4")) {
        $("#txtrate").val('3');
        $("#r4,#r5").css("color", "gray");
      }

    });
    $("#r4").click(function() {
      $("#r1,#r2,#r3,#r4").css("color", "#009ed4");
      // $("#r4").click(function(){
      // 	$("#r4").css("color","gray");
      // });
      if ($("#r4").css("color", "#009ed4")) {
        $("#txtrate").val('4');
        $("#r5").css("color", "gray");
      }

    });
    $("#r5").click(function() {
      $("#r1,#r2,#r3,#r4,#r5").css("color", "#009ed4");
      // $("#r5").click(function(){
      // 	$("#r5").css("color","gray");
      // });
      if ($("#r5").css("color", "#009ed4")) {
        $("#txtrate").val('5');
      }

    });


  });
</script>

<div class="col-12">
  <h3 class="page-title"></h3><br>

  <?php

  if (isset($_SESSION["id"])) {
    $uid = $_SESSION["id"];

    $pid = $_GET["name"];
    $shid = $_GET["shid"];
  ?>

    <section>
      <form role="form" method="post" action="">

        <section class="slider_area" style="background-image:url(images/slider/4.jpg);">
          <div class="container">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="slider">
                  <h2>SHOP</h2>
                  <p> <a href="home.php">Home </a><span>/</span><a href="shop.php"> Shop </a><span>/</span> <?php echo "<a href='sprod.php?name=" . $shid . "'>"; ?> Products </a> <span>/</span> Product Details </p>
                </div>
              </div>
            </div>
          </div>
        </section>
        <br>

        <div class="container">

          <?php

          $cnn = mysqli_connect("localhost", "root", "", "project");
          $qty = "";


          if (isset($_POST["btnrate"])) {

            $selected = "";
            $selected = $_POST['txtrate'];

            $yourURL = "prate.php?pid=" . $pid . "&uid=" . $uid . "&shid=" . $shid . "&rt=" . $selected . "";
            echo ("<Script>location.href='$yourURL'</script>");
          }

          if (isset($_POST["btnsub"])) {

            $query = "Select * from product where pid='$pid'";
            $result = $cnn->query($query);
            $row = $result->fetch_assoc();

            $pid = $row["pid"];
            $oprice = $row["oprice"];
            $shid = $row["shid"];

            $pcart1 = "select * from pcart where uid='$uid' AND pid='$pid' AND shid='$shid'";
            $presult = $cnn->query($pcart1);
            $cnt = mysqli_num_rows($presult);
            if ($cnt > 0) {

              $row1 = mysqli_fetch_assoc($presult);
              $dbqty = $row1["qty"];
              $pcid = $row1["pcid"];
              echo "<script>alert('Product Already Exists')</script>";
              $qty = $_POST["txtqty"];
              $tqty = $dbqty + $qty;
              $pqty = $oprice * $tqty;
              $qry2 = "update pcart set qty='$tqty',pqty='$pqty',doa=now() where pcid=$pcid";
              $result2 = $cnn->query($qry2);
              $yourURL = "pcart.php";
              echo ("<Script>location.href='$yourURL'</script>");
            } else {
              $qty = $_POST["txtqty"];
              $pqty = $oprice * $qty;
              $qry1 = "insert into pcart(uid,pid,qty,pqty,doa,shid) values('$uid','$pid','$qty','$pqty',now(),$shid)";
              $result1 = $cnn->query($qry1);
              $yourURL = "pcart.php";
              echo ("<Script>location.href='$yourURL'</script>");
//              echo $qry1;

            }
          }
          $query = "Select * from product where pid='$pid'";
          $result = $cnn->query($query);

          $qry = "select * from shop,product where product.pid='$pid' AND shop.shid=product.shid";
          $result1 = $cnn->query($qry);
          $row = $result1->fetch_assoc();
          $sname = $row["sname"];
          $str = "<table class'table' style='width:50%; margin-left:300px;'>";
          while ($row = $result->fetch_assoc()) {
            $str .= "<tr><td><img src='../shop/images/products/".$row["img"]."' height='300' width='360' style='padding-right:40px;'>" . "</td><td><br><br><h4 class='page-title' style='font-size:22px; font-weight:bold;'>" . $row["pname"] . "</h4>" . "From Shop : <a href='shopfull.php?shid=" . $shid . "' style='color:#ff9800;'>" . $sname . "</a><br>
                
                <li style='font-size:20px;padding-top:20px;'><span style='font-size:13px; color:#009ed4;'>
                Give Your Rate :</span><br>
                
                <i class='fa fa-star' style='color:gray;' name='rating1[]' id='r1' value='1'></i>
                <i class='fa fa-star' style='color:gray;' name='rating1[]' id='r2' value='2'></i>
                <i class='fa fa-star' style='color:gray;' name='rating1[]' id='r3' value='3'></i>
                <i class='fa fa-star' style='color:gray;' name='rating1[]' id='r4' value='4'></i>
                <i class='fa fa-star' style='color:gray;' name='rating1[]' id='r5' value='5'></i>
                
                &nbsp;<button type='submit' style='font-size:12px; color:black; padding:0px 5px 0px 5px; border-radius:2px;' name='btnrate'>Rate</button>
                <span><input id='txtrate' name='txtrate' style='visibility: hidden;'></span>              


                </li><span style='font-size:18px; font-weight:bold;'>₹ " . $row["oprice"] . "&nbsp; </span><strike><font style='color:grey;'> " . $row["aprice"] . "</strike></font><br><br>";
          }
          $str .= "<div class='' '>
            
            
                    <label style=''>Quantity :</label>&nbsp;

                        <input type='number' style='border:1px solid #80808063; text-align:center; ' value='1' min='1' max='20' name='txtqty' value='$qty' >

                <br>
               
                <div class='' style=''>	
           
                <input type='submit' name='btnsub' style='background: #00a765 ;border: medium none;color: #ffffff;font-size: 16px;font-weight: bold;height: 48px;margin-top: 30px;text-transform: uppercase;transition: all 500ms ease 0s;width: 160px;text-align: center;line-height: 50px' value='add to cart'>
       
                    <br><br>        
                    <br><br>                
                </div>
</form>

</div>
</div></td></tr>
</table>";
          // <i class='flaticon-shopping-cart'></i>           
          echo $str;
          ?>


        </div>

    </section>

  <?php
  } else {

    $pid = $_GET["name"];
    $shid = $_GET["shid"];
  ?>

    <section>
      <form role="form" method="post" action="">
        <section class="slider_area" style="background-image:url(images/slider/4.jpg);">
          <div class="container">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="slider">
                  <h2>SHOP</h2>
                  <p><a href="home.php">Home </a><span>/</span><a href="shop.php"> Shop </a><span>/</span> <?php echo "<a href='sprod.php?name=" . $shid . "'>"; ?> Products </a> <span>/</span> Product Details </p>
                  <p> <a href="index.php">Home </a><span>/</span> <a href="shop.php">Shop</a></p>
                </div>
              </div>
            </div>
          </div>
        </section>

        <div class="container">

          <?php

          $cnn = mysqli_connect("localhost", "root", "", "pet");
          $qty = "";
          if (isset($_POST["btnsub"])) {

            echo "<script type='text/javascript'>";
            echo 'alert("You need to do login to go ahead in Shopping ");';
            echo 'window.location="login.php?pid=' . $pid . '&shid=' . $shid . '";';
            echo "</script>";
          }
          $query = "Select * from product where pid='$pid'";
          $result = $cnn->query($query);

          $qry = "select * from shop,product where product.pid='$pid' AND shop.shid=product.shid";
          $result1 = $cnn->query($qry);
          $row = $result1->fetch_assoc();
          $sname = $row["sname"];
          $str = "<table class'table' style='width:50%; margin-left:300px;'>";
          while ($row = $result->fetch_assoc()) {
            $str .= "<tr><td><img src='images/resources/product.jpg' height='380' width='400' style='padding-right:40px;'>" . "</td><td><br><br><h4 class='page-title' style='font-size:22px; font-weight:bold;'>" . $row["pname"] . "</h4>" . "From Shop : <a href='shopfull.php?shid=" . $shid . "' style='color:#ff9800;'>" . $sname . "</a><br><br>
                    </li><span style='font-size:18px; font-weight:bold;'>₹ " . $row["oprice"] . "&nbsp; </span><strike><font style='color:grey;'> " . $row["aprice"] . "</strike></font><br><br>";
          }
          $str .= "<div class='' '>
                        <label style=''>Quantity :</label>&nbsp;
                            <input type='number' style='border:1px solid #80808063; text-align:center; ' value='1' min='1' max='20' name='txtqty' value='$qty' ><br>
                    <div class='' style=''>	
                    <input type='submit' name='btnsub' style='background: #00a765 ;border: medium none;color: #ffffff;font-size: 16px;font-weight: bold;height: 48px;margin-top: 30px;text-transform: uppercase;transition: all 500ms ease 0s;width: 160px;text-align: center;line-height: 50px' value='add to cart'>
                        <br><br>        
                        <br><br>                
                    </div>
    </form>
    </div>
    </div></td></tr>
    </table>";
          // <i class='flaticon-shopping-cart'></i>           
          echo $str;
          ?>
        </div>
    </section>
  <?php
  }
  ?>
  <?php
  include_once("footer.php");
  ?>