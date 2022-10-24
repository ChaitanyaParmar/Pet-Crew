<?php
include_once("header.php");
?>
<?php $_SESSION["id"];
?>


<!-- </div> -->

<?php
$cnn = mysqli_connect("localhost", "root", "", "pet");
$query = "select oid,count(*) as count from orderdetails where orderdetails.dod='0000-00-00 00:00:00' AND dbid=0 group by oid";

$result = $cnn->query($query);
// $str="";
$cnt = mysqli_num_rows($result);


?>

<?php
$cnn = mysqli_connect("localhost", "root", "", "pet");
$query1 = "select oid,count(*) as count from orderdetails where orderdetails.dod!='0000-00-00 00:00:00' AND dbid!=0 group by oid";

$result1 = $cnn->query($query1);
// $str="";
$cnt1 = mysqli_num_rows($result1);


?>
<!--  -->
<div class="col-6 m-t-15" style="margin-top:70px;padding-left:100px; ">
    <a href="sorders.php">
        <div class="bg-dark p-10 text-white text-center">
            <i class="fa fa-table m-b-5 font-16"></i>
            <h5 class="m-b-0 m-t-5"><?php echo $cnt; ?></h5>
            <small class="font-light">Pending Orders</small>
        </div>
    </a>
</div>

<div class="col-6 m-t-15" style="margin-top:70px; margin-bottom:40px; padding-right:100px; ">
    <a href="sorders_old.php">
        <div class="bg-dark p-10 text-white text-center">
            <i class="fa fa-globe  m-b-5 font-16"></i>
            <h5 class="m-b-0 m-t-5"><?php echo $cnt1; ?></h5>
            <small class="font-light"> Delivered Orders</small>
        </div>
    </a>
</div>







<!-- </div> -->

<?php
include_once("footer.php");
?>