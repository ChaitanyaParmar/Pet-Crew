<?php
    include_once("header.php");
    ?>

<?php

$uid=$_SESSION["uid"];
$name=$_GET["name"];

if(isset($_REQUEST["name"]))
{
    $cnn=mysqli_connect("localhost","root","","project");
    $ch=$_REQUEST["name"];
            $query="Select * from product where pid='$name'";
            $result=$cnn->query($query);
            $row=$result->fetch_assoc();

            $pid=$row["pid"];
            $oprice=$row["oprice"];
            $shid=$row["shid"];
			$qty=1;


            $pcart1="select * from pcart where uid='$uid' AND pid='$pid' AND shid='$shid'";
    $presult=$cnn->query($pcart1);
    $cnt=mysqli_num_rows($presult);
    if($cnt>0)
    {
      
    $row1=$presult->fetch_assoc();
      $pcid=$row1["pcid"];
      $qty=$row1["qty"];
      echo "<script>alert('product is already exist')</script>";
      $tqty=$qty+1;
      $pqty=$oprice*$tqty;
      $qry2="update pcart set qty='$tqty',pqty='$pqty',doa=now() where pcid=$pcid";
      $result2=$cnn->query($qry2);
      $yourURL="http://localhost:8080/pet/user/pcart.php";
     echo("<Script>location.href='$yourURL'</script>");   

    }
    else {
        $pqty=$oprice*$qty;
            $qry1="insert into pcart(uid,pid,qty,pqty,doa,shid)
            values('$uid','$pid','$qty','$pqty',now(),$shid)";
			$result1=$cnn->query($qry1);
			$yourURL="http://localhost:8080/pet/user/pcart.php";
            echo("<Script>location.href='$yourURL'</script>");   
    }
}    
?>