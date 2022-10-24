<?php
    $id=$_GET["id"];
    if(isset($_REQUEST["id"]))
    {
        $cnn=mysqli_connect("localhost","root","","project");
        $qry="update mplan set status = 'curr' where did='$id'";
        $result=$cnn->query($qry);       
        header("Location:doctorView.php");
    }
?>