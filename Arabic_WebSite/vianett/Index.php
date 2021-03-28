<?php

include_once("ViaNettSMS.php");

// Declare variables.
$Username = "hamas1464@gmail.com";
$Password = "e6701";
$MsgSender = "amaldrop";
$DestinationAddress = "+00966777612050"; //
$Message = "Hello World! ";

// Create ViaNettSMS object with params $Username and $Password
$ViaNettSMS = new ViaNettSMS($Username, $Password);
try
{
	// Send SMS through the HTTP API
	$Result = $ViaNettSMS->SendSMS($MsgSender, $DestinationAddress, $Message);
	// Check result object returned and give response to end user according to success or not.
	if ($Result->Success == true)
		$Message = "Message successfully sent!";
	else
		$Message = "Error occured while sending SMS<br />Errorcode: " . $Result->ErrorCode . "<br />Errormessage: " . $Result->ErrorMessage;
}
catch (Exception $e)
{
	//Error occured while connecting to server.
	$Message = $e->getMessage();
}

?>

<html>
	<head>
		<title>ViaNettSMS Example</title>
	</head>
	<body>
<?php
echo "			<p><strong>SMS Result</strong><br />Status: $Message</p>";
?>
	</body>
</html>