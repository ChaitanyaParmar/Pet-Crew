<?php
    $id=$_GET["id"];
    if(isset($_REQUEST["id"]))
    {
        $cnn=mysqli_connect("localhost","root","","project");
        $qry="update trainer set img='' where tid='$id'";
        $result=$cnn->query($qry);       
        header("Location:profile.php");
    }
?>
    