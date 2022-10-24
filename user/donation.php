<?php
    include_once("header.php");
?>   

<style>
.capt{

    padding:0px 180px 20px 180px; 
    font-size:25px; 
    font-weight:bold; 
    color:black; 
    text-align:center; 
    letter-spacing:1px;
    word-spacing:1px;
    line-height:1.3; 
    font-family:cursive;
}

.dont{
    margin-left:490px; 
    padding:15px 20px 15px 20px;
    color:white; 
    background:#b30909; 
    font-size:20px; 
    border-radius:5px; 
    text-transform:uppercase; 
    font-family:ui-rounded;
}
</style>

<section>
<div class="container" style="height:425px;">
<div style="margin-top:150px"><div class="capt" >Thank you for your great generosity! We greatly appreciate your donation. <br>Your support is invaluable to us as it will help us grow further, thank you again!</div>
<form class="" method="post">
</form>
</div>
<div style="padding:80px 0px 0px 200px;">Thanks From,<br>Pet Crew.</div>
</div>
</section>

<?php

if(isset($_POST["btndonate"]))
{
    $yourURL="donate.php";
    echo("<Script>location.href='$yourURL'</script>");  
}
?>
<?php
    include_once("footer.php");
?>
