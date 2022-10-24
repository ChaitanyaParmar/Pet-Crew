<?php
    $id=$_GET["id"];
    if(isset($_REQUEST["id"]))
    {
        $cnn=mysqli_connect("localhost","root","","project");
        $qry="Delete from pcart where pcid='$id'";
        $result=$cnn->query($qry);
        echo "Deleted Successfully!!";
        echo $qry;
//        header("Location:pcart.php");
    }
?>