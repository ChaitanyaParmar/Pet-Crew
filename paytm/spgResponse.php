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

$TXN_AMOUNT=$_GET['price'];
$shid=$_GET['shid'];
$shpid=$_GET['shpid'];


// $shid=$_SESSION['shid'];

if($isValidChecksum == "TRUE") {
	// echo "<b>Checksum matched and following are the transaction details:</b>" . "<br/>";
	if ($_POST["STATUS"] == "TXN_SUCCESS") {
		// echo "<b>Transaction status is success</b>" . "<br/>";
		$mm=$TXN_AMOUNT/2000;
		//Process your transaction here as success transaction.
		//Verify amount & order id received from Payment gateway with your application's order id and amount.
		$date=date_create("now");
		date_add($date,date_interval_create_from_date_string("$mm month"));
		$date1=date_format($date,"Y-m-d");

		// date_add($date,date_interval_create_from_date_string("40 days"));
		
		$cnn=mysqli_connect("localhost","root","","pet");
		$query="update shplan set dop=now(),doe='$date1',ispay=1 where shpid=$shpid";
		$result=$cnn->query($query);

		$qry="select * from shop where shid='$shid'";
		$result1=$cnn->query($qry);
		$row=$result1->fetch_assoc();
		$email=$row["email"];
		$sname=$row["sname"];
		$ownername=$row["ownername"];

		$to_email = $email;
        $subject = "Plan Active";
		
        $headers = "From: Pet Wholly<mtattooist216@gmail.com>\r\n";
        // $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type : text/html; charset=ISO-8859-1\r\n";

        $body = "<html>
		<body>
			<p>Thank You...$ownername (shop : $sname) <br>Payment Sucessfull of ₹<b>$TXN_AMOUNT</b> <br>Your plan is Renewed for $mm Months.<br><br>Valid till $date1.</p>
		</body>
		</html>";

        if (mail($to_email, $subject, $body, $headers)) {
			echo "<script>alert('Your Plan Has Just Been Renewed... Thank You!');</script>";
				$yourURL="http://localhost:8080/pet/shop/acsetting.php";
				echo ("<script>location.href='$yourURL'</script>");
			
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
				echo "<br/>" . $paramName . " = " . $paramValue;
		}
	}
}
else {
	echo "<b>Checksum mismatched.</b>";
	//Process transaction as suspicious.
}

?>