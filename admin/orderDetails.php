<?php
include_once("header.php");
?>
<div class="content-wrapper"><br>
    <div class="col-12">
        <div class="card">
        <center><br>
            <p style="font-size: 36px;">Order Details</p>
        </center>
            <?php
            $id = $_GET["id"];

            $cnn = mysqli_connect("localhost", "root", "", "project");
            $query1 = "select user.uname,user.uid,orders.oid,orders.uid,orders.fullname,orders.addr,orders.contact, orders.pay, orders.ozip,orders.email,orders.order_id from orders,user where orders.uid=user.uid AND orders.oid='$id'";
            $result = $cnn->query($query1);
            $row = $result->fetch_assoc();
            $uname = $row["uname"];
            $fullname = $row["fullname"];
            $addr = $row["addr"];
            $contact = $row["contact"];
            $email = $row["email"];
            $ozip = $row["ozip"];
            $order_id = $row["order_id"];
            $total = $row["pay"];

            echo "<div style='color:black; padding:10px 0px 30px 20px;'><span  style='text-transform:capitalize; ' ><h4>" . $fullname . "</h4>Address : " . $addr . "<br>Zip Code : " . $ozip . "<br>Contact : </span>" . $contact . "<br>Email : " . $email . "<br>( Username : " . $uname . " )<br><br><b style = 'font-size: 20px;'>Total Amount : ₹ " . $total . "</b></div>";

            $cnt = 1;
            $query = "select orderdetails.dbid,orderdetails.odid,orderdetails.oid,orderdetails.pid,orderdetails.pqty,orderdetails.qty,orderdetails.dod,orderdetails.shid,orders.addr,orders.contact,orders.fullname,orders.email,user.uname,product.pid,product.pname,product.oprice,product.img,shop.sname,shop.shid from orderdetails,orders,user,product,shop where orderdetails.oid='$id' AND user.uid=orders.uid and orders.oid=orderdetails.oid AND product.pid=orderdetails.pid AND product.shid=orderdetails.shid AND shop.shid=product.shid ";
            $result = $cnn->query($query);

            $str = "<section class='content'><div class='container-fluid'><div class='row'><div class='col-12'><div class='card'><div class='card-body table-responsive p-0' style='height: 50vh;'><table class='table table-head-fixed text-nowrap'><thead><tr><th>Sr No.</th><th>Product</th><th>Product Name</th><th>Shop Name</th><th>Quantity</th><th>Total</th><th></th><th></th></tr></thead>";
            $dbid = "";
            $sum = "";
            $dod = "";
            while ($row = $result->fetch_assoc()) {
                $dbid = $row["dbid"];
                $dod = $row["dod"];

                // $str .= "<tr><td>" . "$cnt</td><td style='text-transform:capitalize;'>" . $row["pname"] . "</td><td><a href='shopdetail.php?id=" . $row["shid"] . "'>" . $row["sname"] . "</a></td><td>" . $row["qty"] . "</td><td>₹ " . $row["pqty"] . "</td></tr>";
                $str.="<tbody><tr><td>$cnt</td><td><img src='images/products/".$row["img"]."' height='50' width='60'>"."</td><td>".$row["pname"]."</td><td>".$row["sname"]."</td><td>".$row["qty"]."</td><td>".$row["pqty"]."</td></tr></tbody>";

                $qry1 = "select SUM(pqty) as sum from orderdetails where oid='$id' ";
                $result1 = $cnn->query($qry1);

                $row = mysqli_fetch_assoc($result1);

                $sum = $row["sum"];
                $cnt++;
            }
            $str .= "</table></div><!-- /.card-body --></div><!-- /.card --></div></div><!-- /.row --></div><!-- /.container-fluid --></div>";
            
            $del_boy = "Select * from deliveryboy where dbid='$dbid'";
            $resultt = $cnn->query($del_boy);
            $rowd = $resultt->fetch_assoc();
            // $name = $rowd["fullname"];
            if ($dbid != 0) {
                $str .= "<span style='text-transform:capitalize;position:absolute;top:150px;left:850px; font-size: 16px;'>Order id : " . $order_id . "<br>To Delivery Boy :   " . $rowd["fullname"] . "<br>Date and Time : " . $dod . "</span>";
            }
            else{
                $str .= "<span style='text-transform:capitalize;position:absolute;top:20px;left:850px; color:#6d6b6b; font-size:15px;'><b>Order id : " . $order_id . "</b></span>";
            }
            echo $str;
            ?>

        </div>
    </div>
    </div>



    <?php
    include_once("footer.php");
    ?>