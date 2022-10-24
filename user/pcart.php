<?php
include_once("header.php");
?>

<style>
  .cart-page .cupon-box input {
    padding-left: 10px;
  }
</style>

<form name="frm1" method="post">
  <section class="cart-page cart-detail" style="padding-top: 50px;">
    <section class="slider_area" style="background-image:url(images/slider/4.jpg);">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="slider">
              <h2>My Cart</h2>
              <p> <a href="home.php">Home </a><span>/</span><a href="shop.php"> Shop </a><span>/</span> Product <span>/</span> Cart</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <br>
    <div class="container">

      <?php
      $uid = $_SESSION["id"];

      $cnn = mysqli_connect("localhost", "root", "", "project");
      $qry = "select * from pcart,product where pcart.pid=product.pid AND pcart.shid=product.shid AND uid='$uid' ";
      $result = $cnn->query($qry);
      // $row1 = mysqli_fetch_assoc($result);
      // $img = $row1["img"];

      $cnt = mysqli_num_rows($result);

      $qry1 = "select SUM(pqty) as sum from pcart where uid='$uid' ";
      $result1 = $cnn->query($qry1);

      $row = mysqli_fetch_assoc($result1);

      $sum = $row["sum"];



      $str = "<div class='row'>
        <div class='col-lg-12 col-md-12'>
            <table class='table cart-table'>
                <thead>
                    <tr>
                        <th class='preview'>PRODUCT</th>
                        <th class='quantity'>QUANTITY</th>
                        <th class='price'>PRICE  (in  ₹) </th>
                        <th class='total'>TOTAL  (in  ₹) </th>
                    </tr>
                </thead>";
      $i = 1;

      while ($row = $result->fetch_assoc()) {
        $sqry = "select sname,pcart.shid,shop.shid,pcid from pcart,shop where pcart.shid=shop.shid AND uid='$uid' AND pcart.pcid='$row[pcid]'";
        $sresult = $cnn->query($sqry);

        $srow = $sresult->fetch_assoc();

        $sname = $srow["sname"];

        $pqry = "Select * from product";
        $presult = $cnn->query($pqry);
        $prow = $presult->fetch_assoc();


        $str .= "   
              
          <tbody >
              <tr>

                  <td class='preview'><a href='pcart_d.php?id=" . $row["pcid"] . "'>
                      <i class='fa fa-trash-o' aria-hidden='true'></i></a>
                      <img src='../shop/images/products/".$row["img"]."' height='180' width=210' style='margin: -90px 20px -90px 1px; ' alt=''>
                      
                      <span style='position:relative;top:80px; font-weight:normal; font-size:13px; color:gray;'>From Shop : " . $sname . "</span>
                  </td>
                  <td class='quantity'>
                      <div class='select-input-wrapper'>
                          <input class='quantity-spinner' type='number' min='1' max='20' value=" . $row["qty"] . "  
                          name='txtquantity$i'  id='txtquantity$i' onchange='hi($i);'> 
          </div>
                  </td>
                  
                  
                  <td class='price' id='price$i'>" . $row["oprice"] . "</td>
                  
                  
                  <td class='total' id='priceqty$i' name='priceqty$i'>" . $row["pqty"] . "</td>
              </tr>
              
          </tbody>

          ";

        if (isset($_POST["btnedit"])) {

          $c1 = $row["pcid"];
          $quantity = $_POST["txtquantity$i"];
          $p = $row["oprice"];
          $a = $quantity * $p;

          $qry2 = "UPDATE pcart SET qty = '$quantity',pqty='$a' WHERE pcart.pcid = '$c1'";

          $result2 = $cnn->query($qry2);
          $yourURL = "pcart.php";
          echo ("<Script>location.href='$yourURL'</script>");
        }

        $i++;
      }
      echo $str;
      ?>
      </table>
    </div>
    </div>
    <div class='row'>
      <div class='col-lg-6 col-md-6 col-sm-6 pull-left cupon-box'>
        <br>
        <a class='button' href='shop.php'>
          <input type='button' style='background: #00a765 none repeat scroll 0 0;
            border: medium none;
            color: #ffffff;
            font-size: 15px;
            font-weight: bold;
            height: 55px;
            text-transform: uppercase;
            transition: all 500ms ease 0s;
            width: 200px;
            text-align: center;
            line-height: 50px' value='Continue Shopping'>
        </a>
      </div>
      <div class='col-lg-6 col-md-6 col-sm-6 pull-right add-to-cart-wrap'>

        <input type='submit' class='contact-us-button' name='btnedit' id='btnedit' value='UPDATE CART'>

      </div>
    </div>

    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-6 pull-right">
        <div class="update-cart pull-right">
          <div class="update-cart-box">
            <p>Items<span><?php echo $cnt ?></span></p>
            <p class="tolte">Sub Total<span><?php echo "₹ " . $sum ?></span></p>
          </div>
          <?php
          $str1 = " <a href='checkout.php?id=" . $sum . "'>
                    <div class='button' style='font-size:15px;'>PROCEED TO CHECKOUT</div>
                    </a>";
          echo $str1;
          ?>
        </div>
      </div>
    </div>
    </div>
  </section>



  <script src="jquery-3.4.1.min.js"></script>

  <script>
    function hi(x) {
      var pricectl = "price" + x;
      var qtyctl = "txtquantity" + x;
      //alert(pricectl + "  " + qtyctl);

      const price = document.getElementById("price" + x + "").innerHTML;

      // alert(price);

      const qty = document.getElementById("txtquantity" + x + "").value;
      // alert(qty);
      // console.log(price);
      console.log(price);
      var ans = price * qty;

      // console.log(ans);

      // var ans=100.90*qty;
      document.getElementById("priceqty" + x + "").innerHTML = ans;
      // alert(x);

    }
  </script>

</form>


<?php
include_once("footer.php");
?>