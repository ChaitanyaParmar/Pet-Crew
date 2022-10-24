<?php
    include_once("header.php");
?>
<div class="col-12">
    <h3 class="page-title">Order Details</h3><br>
    <div class="card-body"></div> 
    <div class="card">
    
    <?php      
        $id=$_GET["id"];

            $cnn=mysqli_connect("localhost","root","","pet");
            $query1="select user.username,user.uid,orders.oid,orders.uid,orders.fullname,orders.addr,orders.contact,orders.ozip,orders.email,orders.order_id from orders,user where orders.uid=user.uid AND orders.oid='$id'";
            $result=$cnn->query($query1);
            $row=$result->fetch_assoc();
            $uname=$row["username"];
            $fullname=$row["fullname"];
            $addr=$row["addr"];
            $contact=$row["contact"];
            $email=$row["email"];
            $ozip=$row["ozip"];
            $order_id=$row["order_id"];

            echo "<div style='color:black; padding:10px 0px 30px 20px;'><span  style='text-transform:capitalize; ' ><h4>".$fullname."</h4>Address : ".$addr."<br>Zip Code : ".$ozip."<br>Contact : </span>".$contact."<br>Email : ".$email."<br>( Username : ".$uname." )</div>";

        $cnt=1;
        $query="select orderdetails.dbid,orderdetails.odid,orderdetails.oid,orderdetails.pid,orderdetails.pqty,orderdetails.qty,orderdetails.dod,orderdetails.shid,orders.addr,orders.contact,orders.fullname,orders.email,user.username,product.pid,product.pname,product.oprice,product.img,shop.sname,shop.shid from orderdetails,orders,user,product,shop where orderdetails.oid='$id' AND user.uid=orders.uid and orders.oid=orderdetails.oid AND product.pid=orderdetails.pid AND product.shid=orderdetails.shid AND shop.shid=product.shid "; 
        $result=$cnn->query($query);
        $str="<table class='table'><tr class='card-title m-b-0'><td>Sr No.</td><td>Product</td><td>name</td><td>Shop Name</td><td>quantity</td><td>Total</td></tr>";
        $dbid="";
        $sum="";
        $dod="";
        while($row=$result->fetch_assoc())
        {
            $dbid=$row["dbid"];
            $dod=$row["dod"];
            $str.="<tr><td>"."$cnt</td><td><img src='..\\img\\".$row["img"]."' height='50' width='60'>"."</td><td style='text-transform:capitalize;'>".$row["pname"]."</td><td><a href='shopdetail.php?id=".$row["shid"]."'>".$row["sname"]."</a></td><td>".$row["qty"]."</td><td>₹ ".$row["pqty"]."</td></tr>";
            
            $qry1="select SUM(pqty) as sum from orderdetails where oid='$id' ";
            $result1=$cnn->query($qry1);
            
            $row=mysqli_fetch_assoc($result1);
            
            $sum=$row["sum"];
            $cnt++; 
        }   
        $del_boy="Select * from delivery_boy where dbid='$dbid'"; 
        $resultt=$cnn->query($del_boy); 
        $row=$resultt->fetch_assoc();
        $name=$row["fname"]." ".$row["lname"];
        if($dbid!=0)
        {
            $str.="<span style='text-transform:capitalize;position:absolute;top:20px;left:750px; color:#6d6b6b; font-size:15px;'><b>Order id : ".$order_id."</b><br>To Delivery Boy : <b>".$name."<br></b>Date and Time : <b>".$dod."</span>";   
        }
        $str.="</table><p class='card-body' style='margin-left:870px; color:black;'>Sub Total : ₹ $sum</p>";
        echo $str; 
    ?>
    
</div>
    </div>



<?php
    include_once("footer.php");
?>