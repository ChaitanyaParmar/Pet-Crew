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
$dnid=$_GET['id'];


if($isValidChecksum == "TRUE") {
	// echo "<b>Checksum matched and following are the transaction details:</b>" . "<br/>";
	if ($_POST["STATUS"] == "TXN_SUCCESS") {
		// echo "<b>Transaction status is success</b>" . "<br/>";

		//Process your transaction here as success transaction.
		//Verify amount & order id received from Payment gateway with your application's order id and amount.
		
		$cnn=mysqli_connect("localhost","root","","project");
		$query="update donation set dod=now() where dnid='$dnid'";
		$result=$cnn->query($query);
		echo $query;

		$qry="select * from donation where dnid='$dnid'";
		$result1=$cnn->query($qry);
		$row=$result1->fetch_assoc();
		$email=$row["email"];
		$name=$row["name"];
	
		$to_email = $email;
        $subject = "Thank You";
		
        $headers = "From: petcreworganisation@gmail.com\r\n";
        // $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type : text/html; charset=ISO-8859-1\r\n";

        $body = "<html>
		<body>
			<p>Dear $name, <br><br>From one pet lover to another, thank you for your generous gift of ₹$TXN_AMOUNT. Your support is deeply gratifying to us, and we are honored to welcome you into our donor family. <br><br>Please feel free to contact by <a href='petcreworganisation@gmail.com'>email</a> or <a href='tel:1234567890'>phone</a>, if you have any specific questions, we would love a chance to thank you again!</a><br><br><br>With deepest gratitude,<br>and warmest wishes,<br><small>Pet Crew.</small></p>
		</body>
		</html>";

        if (mail($to_email, $subject, $body, $headers)) {

			echo "<script>alert('Thank You!!!');</script>";
			echo "<script>location.href='http://localhost/PetCrew/user/donation.php'</script>";
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