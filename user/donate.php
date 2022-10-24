<?php
    include_once("header.php");
?>
<style>
.error {
    color: #FF0000;
    font-size: 14px;
    font-weight: normal;

}
</style>

<div class="container">
    <div class=""
        style="text-align:center; font-weight:bold; color:orange;color:#d2631c; margin-top:20px; margin-bottom:50px;">
        <div style="font-family:normal; font-size:18px; color:#c51f58;">"It's not how much we give but how much love we
            put into giving" - Mother Teresa</div>

        <br>
        <!-- <div class="row"> -->
        <div class="section-title text-center">
            <h6><span class="flaticon-pawprint"></span></h6>
            <div class="border"></div>

            <h2>Donation Form</h2>
        </div>
    </div>
    <?php

if(isset($_SESSION["id"]))
{ 
    $uid=$_SESSION["id"];
}
else {
    $uid="";
}

$email="";
$name="";
$contactno="";
$addr="";
$amount="";
$dod="";

$ename="";
$econtact="";
$eaddr="";
$eamt="";
$emailerror="";
$flag=0;


$cnn=mysqli_connect("localhost","root","","project");
$query="select * from user where uid='$uid'";
$result=$cnn->query($query);
$row=$result->fetch_assoc();
$contactno=$row["contact"];
$email=$row["email"];
$name=$row["name"];

if(isset($_POST["btnsub"]))
{
    $cnn=mysqli_connect("localhost","root","","project");  
    $name=$_POST["txtname"];
    $contactno=$_POST["txtcontact"];
    $amount=$_POST["txtamt"];
    $email=$_POST["txtemail"];

    
    function test_input($data) 
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        // email
        if (empty($_POST["txtemail"])) {
            $emailerror = "This field is required";
            $flag=1;
            } 
            else
             {
              $email1 = test_input($email);
              if (!filter_var($email1, FILTER_VALIDATE_EMAIL)) 
              {
                $emailerror = "Invalid email format";
                $flag=1;
              }
            }
        
        //name
            if (empty($_POST["txtname"])) {
                $ename = "This field is required.";
                $flag=1;
                } 
                else
                {
                    $uname1 = test_input($name);                
                    if (!preg_match("/^[a-zA-Z ]*$/",$uname1)) 
                    {
                        $ename = "Only letters and white space allowed.";
                        $flag=1;
                    }
                }
                
                // contact no
                if (empty($_POST["txtcontact"])) {
                    $econtact = "This field is required.";
                    $flag=1;
                        } 
                        else
                        {
                        $contno1 = test_input($contactno);
                        if (!preg_match("/^\d{10}$/",$contno1)) 
                        {
                            $econtact = "Please enter contactno of 10 digit.";
                            $flag=1;
                        }
                        }

                    if (empty($_POST["txtamt"])) {
                        $eamt = "This field is required.";
                        $flag=1;
                        } 
                        else
                        {
                            $amt1 = test_input($amount);                
                            if (!preg_match("/^[0-9]*$/",$amt1)) 
                            {
                                $eamt = "Please write your donation amount only in digits. (e.g. 11)";
                                $flag=1;
                            }
                        }
                }

    if($flag==0)
    {
   
        $qry="insert into donation(uid,email,name,contactno,amount,dod) values('$uid','$email','$name','$contactno','$amount',now())";
        $result=$cnn->query($qry);

        $qryy="select uid,MAX(dnid) as id from donation where uid='$uid'"  ;
        $result1=$cnn->query($qryy);
        $row1=mysqli_fetch_assoc($result1);
        $id=$row1["id"];
        
        $yourURL="http://localhost/PetCrew/paytm/dopgRedirect.php?id=$id&price=$amount&uid=$uid";
          echo("<Script>location.href='$yourURL'</script>");
}
}

?>

    <div class="card">
        <form class="form-horizontal" method="post" style='margin-left:35%; margin-right:35%; '>
            <div class="card-body">
                <div class="form-group row" style='font-weight:bold;'>Email
                    <input type="text" name="txtemail" class="form-control" id="fname" value="<?php echo $email;?>">
                <span class="error"> <?php echo $emailerror;?></span>
                </div>

                <div class="form-group row" style='font-weight:bold;'>Full Name
                    <input type="text" class="form-control" id="fname" name="txtname" value="<?php echo $name;?>">
                    <span class="error"> <?php echo $ename;?></span>
                </div>

                <div class="form-group row" style='font-weight:bold;'>Contact No
                    <input type="text" class="form-control" id="fname" name="txtcontact"
                        value="<?php echo $contactno;?>">
                    <span class="error"> <?php echo $econtact;?></span>
                </div>

                <div class="form-group row" style='font-weight:bold;'>How Much Do You Wish To Donate?
                    <input type="text" class="form-control" id="fname" name="txtamt" value="<?php echo $amount; ?>"
                        placeholder="Donation amount ( in Rs. )">
                    <span class="error"> <?php echo $eamt;?></span>
                </div>


                <div class="border-top">
                    <div class="card-body">
                        <input type="submit" class="btn btn-primary" name="btnsub" value="Donate">
                    </div>
                </div>

        </form>
    </div>
</div>
</div>

<?php
    include_once("footer.php");
?>