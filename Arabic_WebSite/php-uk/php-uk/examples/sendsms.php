
<?php
include '../textlocal.class.php';
  if(isset($_POST['send'])) {

    $phone = $_POST['phone'];
        	// Authorisation details.
	$username = "hamas1464@gmail.com";
	$hash = "75d22ec6bb52cb3c969c54b78cc5b3a0e958d113aa722d899627682ffd0c5e07";

	// Config variables. Consult http://api.txtlocal.com/docs for more info.
	$test = "0";

	// Data for text message. This is the text message data.
	$sender = "AmalDrop"; // This is who the message appears to be from.
	$numbers = array($phone); // A single number or a comma-seperated list of numbers
    $opt = mt_rand(10000, 99999);
	$message = "This is a test message from the PHP API script.";
	// 612 chars or less
	// A single number or a comma-seperated list of numbers
	$message = urlencode($message);
	$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
	$ch = curl_init('http://api.txtlocal.com/send/?');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch); // This is the result from the API
	curl_close($ch);
             if($result == true){
     echo "Message has been sent!";
     }
     else{ echo "unsent";}
}

?>
<html>

<head>
  <title>Hello!</title>
</head>

<body>
<form action="sendsms.php" method="post">
<table align="center">
<tr>
<td> from:</td>
<td> <input type="email" name="mail" placeholder="email"> <br> </td>
</tr>
<tr>
<td> phone:</td>
<td> <input type="text" name="phone" placeholder="phone"> <br> </td>
</tr>
<tr>
<td> carrier:</td>
<td> <input type="text" name="carrier" placeholder="carrier"> <br> </td>
</tr>
<tr>
<td> massage:</td>
<td> <input type="text" name="message" placeholder="massage"> <br> </td>
</tr>
<tr>
   <td></td>
   <td> <input type="submit" value="send" name="send" </td>
</tr>
</table>
</form>

</body>
</html>