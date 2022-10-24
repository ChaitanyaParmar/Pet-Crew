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
$tid=$_GET['tid'];
$mpid=$_GET['mpid'];


// $tid=$_SESSION['tid'];

if($isValidChecksum == "TRUE") {
	// echo "<b>Checksum matched and following are the transaction details:</b>" . "<br/>";
	if ($_POST["STATUS"] == "TXN_SUCCESS") {
		echo "<b>Transaction status is success</b>" . "<br/>";

		//Process your transaction here as success transaction.
		//Verify amount & order id received from Payment gateway with your application's order id and amount.
		
		$cnn=mysqli_connect("localhost","root","","pet");
		$query="update mplan set dop=now(),status='cur',ispay=1 where mpid=$mpid";
		$result=$cnn->query($query);
		echo $query;
		$qry="select * from trainer where tid='$tid'";
		$result1=$cnn->query($qry);
		$row=$result1->fetch_assoc();
		$email=$row["email"];
		$fname=$row["fname"];
        $lname=$row["lname"];

		$qy="select * from mplantype where mpprice=$TXN_AMOUNT";
            
		$result=$cnn->query($qy);
		$row=$result->fetch_assoc();
		$mplimit=$row["mplimit"];
		$mname=$row["mname"];

		$to_email = $email;
        $subject = "Plan Active";
		
        $headers = "From: Pet Wholly<mtattooist216@gmail.com>\r\n";
        // $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type : text/html; charset=ISO-8859-1\r\n";

        $body = "<html>
		<body>
			<p>Thank You <b>$fname $lname</b> For joining us.<br>Your $mname Plan of ₹<b>$TXN_AMOUNT</b> has been activated.<br>Now you can take <b>$mplimit</b> appointment under this plan.</p>
		</body>
		</html>";

        if (mail($to_email, $subject, $body, $headers)) {
			echo "<script>alert('Thank You!Your Payment is sucessful.');</script>";
			echo "<script>location.href='http://localhost:8080/pet/trainer/home.php'</script>";
			echo "payment sucessful"."<br>";
            echo "Email successfully sent to $to_email...";
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