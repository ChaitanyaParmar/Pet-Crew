<?php
    $id=$_GET["id"];
    if(isset($_REQUEST["id"]))
    {
        $cnn=mysqli_connect("localhost","root","","project");
        $qry="update doctor set img='' where did='$id'";
        $result=$cnn->query($qry);       
        header("Location:Profile.php");
    }
?>
    