<head>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<style>
  body {
    background: grey;
    margin-top: 120px;
    margin-bottom: 120px;
  }
</style>

<?php
$id = $_GET["oid"];
$conn = mysqli_connect("localhost", "root", "", "project");
$qry = "Select * from orders where oid = $id";
$result = $conn->query($qry);
$row = $result->fetch_assoc();
$oid = $row["order_id"];
$otime = $row["doo"];
$name = $row["fullname"];
$address = $row["addr"];
$contact = $row["contact"];
$gtotal = $row["pay"];
?>

<body>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body p-0">
            <div class="row p-5">
              <div class="col-md-5">
                <img src="images/logo/main-logo.png" height="100px">
              </div>

              <div class="col-md-7 text-right">
                <p class="font-weight-bold mb-1" style="margin-top: 20px;">Order ID: <?php echo $oid; ?></p>
                <p class="text-muted">Ordered On: <?php echo $otime; ?></p>
              </div>
            </div>

            <hr class="my-2">

            <div class="row pb-6 p-5" style="font-size: 20px;">
              <div style="margin-left: 20px;">
                <p class="font-weight-bold mb-4">Client Details</p>
                <table style="font-size: 18px;">
                  <tr>
                    <td>Full Name </td>
                    <td> &nbsp;:&nbsp; </td>
                    <td><?php echo $name; ?></td>
                  </tr>
                  <tr>
                    <td class="mb-1">Contact No </td>
                    <td> &nbsp;:&nbsp; </td>
                    <td class="mb-1"><?php echo $contact; ?></td>
                  </tr>
                  <tr>
                    <td class="mb-1">Address </td>
                    <td> &nbsp;:&nbsp; </td>
                    <td class="mb-1"><?php echo $address; ?></td>
                  </tr>
                </table>
              </div>
            </div>

            <div class="row p-4">
              <div class="col-md-12">
                <?php
                $qry1 = "Select product.pname, product.img, orderdetails.qty, product.oprice, orderdetails.pqty from orders,orderdetails,product where orders.oid=orderdetails.oid and orderdetails.pid=product.pid and orders.oid = $id";
                $result1 = $conn->query($qry1);
                $tbl = "<table class='table' style='text-align: center;'>
                  <tr>
                    <th>PRODUCT</th>
                    <th>PRODUCT NAME</th>
                    <th>QUANTITY</th>
                    <th>UNIT COST</th>
                    <th>TOTAL</th>
                  </tr>";

                while ($row1 = $result1->fetch_assoc()) {
                  $img = $row1["img"];
                  $item = $row1["pname"];
                  $qty = $row1["qty"];
                  $ucost = $row1["oprice"];
                  $total = $row1["pqty"];
                  $tbl .= "<tr>
                    <td><img src='../admin/images/products/$img' height='80px' width='80px'></td>
                    <td>$item</td>
                    <td>$qty</td>
                    <td>$ucost</td>
                    <td>$total</td>
                  </tr>";
                }
                $tbl .= "
                </table>";
                echo $tbl;
                ?>


                <!-- <table class="table" style="text-align: center;">
                  <thead>
                    <tr>
                      <th class="border-0 text-uppercase font-weight-bold">Item</th>
                      <th class="border-0 text-uppercase font-weight-bold">Quantity</th>
                      <th class="border-0 text-uppercase font-weight-bold">Unit Cost</th>
                      <th class="border-0 text-uppercase font-weight-bold">Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><?php echo $item; ?></td>
                      <td><?php echo $qty; ?></td>
                      <td><?php echo $ucost; ?></td>
                      <td><?php echo $total; ?></td>
                    </tr>
                  </tbody>
                </table> -->
              </div>
            </div>

            <div class="d-flex flex-row-reverse bg-light text-black p-4" style="margin-top: 30px;">

              <div class="py-3 px-5 text-right" id="gtotal">
                <div class="mb-2" id="total">Grand Total</div>
                <div class="h2 font-weight-light"><?php echo "₹ " . $gtotal; ?></div>
              </div>

              <!-- <div class="py-3 px-5 text-right" id="scharge">
                <div class="mb-2">Shipping Charge</div>
                <div class="h2 font-weight-light">₹ 0</div>
              </div> -->

            </div>
            <div class="bg-light text-black">
              <button type="submit" class="btn btn-dark" onclick="onPrint()" id="btnPrint" style="margin-left: 20px; margin-bottom: 20px;">Print</button>
              <a href='index.php'><button type="submit" class="btn btn-dark" id="btnBack" style="margin-left: 10px; margin-bottom: 20px;">Back</button></a>
            </div>

            <!-- <div style="display:flex;">
              <div style="display:flex;">
                <div class="mb-2">Grand Total</div>
                <div class="h2 font-weight-light"><?php echo "₹ " . $gtotal; ?></div>
              </div>
              <div style="display:flex;">
                <div class="mb-2">Shipping Charge</div>
                <div class="h2 font-weight-light">₹ 0</div>
              </div>
            </div> -->

          </div>
        </div>
      </div>
    </div>
  </div>
</body>
<script>
  function onPrint() {
    document.getElementById('btnPrint').style.visibility = 'hidden';
    document.getElementById('btnBack').style.visibility = 'hidden';
    window.print();
  }

  var delayInMilliseconds = 2000; //2 second

  setTimeout(function() {
    document.getElementById('btnPrint').style.visibility = 'visible';
    document.getElementById('btnBack').style.visibility = 'visible';
  }, delayInMilliseconds);
</script>