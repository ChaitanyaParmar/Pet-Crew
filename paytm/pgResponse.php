<?php
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");

$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application’s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.

$TXN_AMOUNT=$_GET['pay'];
$ORDER_ID=$_GET['odid'];
$oid=$_GET['oid'];
$uid=$_GET['uid'];

// $uid=$_SESSION['uid'];

if($isValidChecksum == "TRUE") {
	// echo "<b>Checksum matched and following are the transaction details:</b>" . "<br/>";
	if ($_POST["STATUS"] == "TXN_SUCCESS") {
		// echo "<b>Transaction status is success</b>" . "<br/>";

		//Process your transaction here as success transaction.
		//Verify amount & order id received from Payment gateway with your application's order id and amount.
		
		echo "Payment Successful"."<br>";
		$cnn=mysqli_connect("localhost","root","","project");
		$query="update orders set pay=$TXN_AMOUNT,order_id=$ORDER_ID,doo=now() where oid=$oid";
		$result=$cnn->query($query);

        $pqryy="select * from orderdetails,product,orders where orderdetails.pid=product.pid AND orderdetails.shid=product.shid AND orders.oid=orderdetails.oid AND orders.oid=$oid";
        $presult1=$cnn->query($pqryy);

    $str="<table style='width:40%;'><tr style='font-weight:bold;'><td style='width:40%;padding-right:10px;'>Product </td><td>Rate</td><td>Quantity</td><td>Price </td></tr></b>";
    while($row=$presult1->fetch_assoc())
      { 
		$email=$row["email"];

        $pname=$row["pname"];
        $qty=$row["qty"];
        $pqty=$row["pqty"];
        $oprice=$row["oprice"];
        $ORDER_ID=$row["order_id"];

        $addr=$row["addr"];
        $city=$row["city"];
        $ozip=$row["ozip"];
        $doo=$row["doo"];
        $phone=$row["contact"];
        $flname=$row["fullname"];

        $str.="<tr><td style='width:50%; padding-right:20px; padding-bottom:10px;'>".$pname."</td><td style='padding-bottom:10px; '> ".$oprice."</td><td style='padding-bottom:10px;'> ".$qty."</td><td>₹".$pqty."</td></tr>";
    }
        
        $str.="<br><tr><td>Shipping charge : </td><td></td><td></td><td>₹0</td></tr><tr style='font-weight:bold;'><td></td><td></td><td>Total : </td><td>₹$TXN_AMOUNT</td></tr></table>";

		$to_email = $email;
        $subject = "Order Confirmation";
		
        $headers = "From: petcreworganisation@gmail.com\r\n";
        // $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type : text/html; charset=ISO-8859-1\r\n";

        $body = "<html>
		<body>
			<p style='text-align:center;'>$flname, thank you for your order!<br>We've received your order payment of ₹<b>$TXN_AMOUNT</b> and will contact you as soon as your package is shipped. you can find your purchase information below.</p><br><br>
            Order Time : $doo <br><br>
            $str

            <div style='text-align:center; width:20%; text-transform:capitalize; padding-top:30px;'><b>Billing and Shipping</b><br><br>".$addr."<br>City : ".$city."<br>Pin code:".$ozip."<br>Phone : ".$phone."<br><br><b>Payment method</b><br>Paytm<br><br>Order id : $ORDER_ID</div>
		</body>
		</html>";

        if (mail($to_email, $subject, $body, $headers)) {
            echo "<script>location.href='http://localhost/PetCrew/user/receipt.php?oid=$oid'</script>";
        } else {
            echo "Email sending failed...";
            ini_set("error_reporting", E_ALL);
            print_r(error_get_last());
        }
	}
	else {
		echo "<b>Transaction status is failure</b>" . "<br/>";
	}

	if (isset($_POST) && count($_POST)>0 )
	{ 
		foreach($_POST as $paramName => $paramValue) {
				// echo "<br/>" . $paramName . " = " . $paramValue;
		}
	}
	

}
else {
	echo "<b>Checksum mismatched.</b>";
	//Process transaction as suspicious.
}

?>