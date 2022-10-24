<?php
    $id=$_GET["id"];
    if(isset($_REQUEST["id"]))
    {
        $cnn=mysqli_connect("localhost","root","","project");
        $qry="update admin set img='' where adminid='$id'";
        $result=$cnn->query($qry);       
        header("Location:adminProfile.php");
    }
?>
    