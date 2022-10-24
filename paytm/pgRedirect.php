<?php
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

// session_start();

// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");

// coding
$oid="";
$uid="";
$amt="";

$ORDER_ID = "";
$CUST_ID = "";
$INDUSTRY_TYPE_ID = "";
$CHANNEL_ID = "";
$TXN_AMOUNT = "";

$oid=$_GET['type'];
$uid=$_GET['id'];
$amt=$_GET['price'];


$checkSum = "";
$paramList = array();

$ORDER_ID =  rand(10000000,99999999);
$CUST_ID = "CUST001";
$INDUSTRY_TYPE_ID = "Retail";
$CHANNEL_ID = "WEB";
$TXN_AMOUNT = $amt;

// $ORDER_ID = rand(10000000,99999999);
// $CUST_ID = $uid;
// $INDUSTRY_TYPE_ID = $_POST["INDUSTRY_TYPE_ID"];
// $CHANNEL_ID = $_POST["CHANNEL_ID"];
// $TXN_AMOUNT = $amt;

// Create an array having all required parameters for creating checksum.
$paramList["MID"] = PAYTM_MERCHANT_MID;
$paramList["ORDER_ID"] = $ORDER_ID;
$paramList["CUST_ID"] = $uid;
$paramList["INDUSTRY_TYPE_ID"] = $INDUSTRY_TYPE_ID;
$paramList["CHANNEL_ID"] = $CHANNEL_ID;
$paramList["TXN_AMOUNT"] = $TXN_AMOUNT;
$paramList["WEBSITE"] = PAYTM_MERCHANT_WEBSITE;
$paramList["CALLBACK_URL"] = "http://localhost/PetCrew/paytm/pgResponse.php?pay=$TXN_AMOUNT&oid=$oid&odid=$ORDER_ID&uid=$uid";
/*
$paramList["CALLBACK_URL"] = "http://localhost/PaytmKit/pgResponse.php";
$paramList["MSISDN"] = $MSISDN; //Mobile number of customer
$paramList["EMAIL"] = $EMAIL; //Email ID of customer
$paramList["VERIFIED_BY"] = "EMAIL"; //
$paramList["IS_USER_VERIFIED"] = "YES"; //

*/

//Here checksum string will return by getChecksumFromArray() function.
$checkSum = getChecksumFromArray($paramList,PAYTM_MERCHANT_KEY);

?>
<html>
<head>
<title>Merchant Check Out Page</title>
</head>
<body>
	<center><h1>Please do not refresh this page...</h1></center>
		<form method="post" action="<?php echo PAYTM_TXN_URL ?>" name="f1">
		<table border="1">
			<tbody>
			<?php
			foreach($paramList as $name => $value) {
				echo '<input type="hidden" name="' . $name .'" value="' . $value . '">';
			}
			?>
			<input type="hidden" name="CHECKSUMHASH" value="<?php echo $checkSum ?>">
			</tbody>
		</table>
		<script type="text/javascript">
			document.f1.submit();
		</script>
	</form>
</body>
</html>