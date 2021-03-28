<?php
include "../config.php";
include '../connect.php'; ?>
<html>
    <head>
<!--	<title>Hielo by TEMPLATED</title>  -->
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="../assets/css/main.css" />
        <link rel="stylesheet" href="../assets/css/style.css" />
    </head>
    <body style="background-color: #E7B3AB;">
		<!-- Header -->
			<header id="header">
			  <!--	<div class="logo"><a href="index.html">Hielo <span>by TEMPLATED</span></a></div>-->
				<a href="#menu"><?php echo $lang['Menu']?></a>
			</header>

		<!-- Nav -->
			<nav id="menu">
				<ul class="links">
					<li><a href="../index.php?lang=en"><?php echo $lang['home']?></a></li>
                    <li><a href="../AboutUs.php?lang=en"><?php echo $lang['AboutUs']?></a></li>
                    <li><a href="signupDonor.php?lang=en"><?php echo $lang['signup']?></a></li>
					<li><a href="../login.php?lang=en"><?php echo $lang['login']?></a></li>
				</ul>
			</nav>




<?php
$table = 'donor';
$message = '';
if (isset($_POST['save'])) {
    if ($_POST['Age'] < 18 || $_POST['Weight'] < 50 || $_POST['sick'] != "No") {
        ?><script>alert("Sorry you can not SignUp");
        window.location="../index.php";
         </script>
<?php    }

    else{
$key = "+967";
$tel = $_POST['Phone'];
    $Name = $_POST['Name'];
    $Sex = $_POST['Sex'];
    $HomeAddress = $_POST['HomeAddress'];
    $JopAddress = $_POST['JopAddress'];
    $Phone = $key.$tel;
    $LastDateOfDonation = $_POST['LastDateOfDonation'];
    $Age = $_POST['Age'];
    $Weight = $_POST['Weight'];
    $sick = $_POST['sick'];
    $Register_date = date("Y-m-d");
    $Password = $_POST['Password'];
    $query = "INSERT INTO donor (Donor_Name, Sex, HomeAddress, JopAddress, Phone, LastDateOfDonation, Age, Weight, Sicknesses, Register_date, Password) VALUES ('$Name', '$Sex', '$HomeAddress', '$JopAddress', '$Phone', '$LastDateOfDonation', '$Age', '$Weight', '$sick', '$Register_date', '$Password')";
    $result = mysqli_query($connect, $query);

// send massage
$orgName = "BloodBank";
$userName = "Blood";
$password = "Blood@255";
$mobileNo = $Phone;
//$text = "أهلا بك $Name ونشكرك على إنضمامك";
$text = " أهلا بك $Name ونشكرك على انضمامك , نرجوا منك التوجه الى بنك الدم لعمل الفحوصات الازمة لتاكد من صحتك وامكانية تبرعك بالدم . ";
$coding = "2";
$text = urlencode($text);
$data = "orgName=".$orgName . "&userName=".$userName."&password=".$password."&mobileNo=".$mobileNo."&text=".$text."&coding=".$coding;
$url = "http://52.36.50.145:8080/MainServlet?".$data;
$result = file_get_contents($url);
     if($result == true){
     echo "Message has been sent!";
     }
     else{ echo "unsent";}
echo '<meta http-equiv="refresh" content="3;url=../index.php?lang=en">';
}
isset($result) ? $message = '<p class="message"> Save Success</p>' : $message = '';
}
?>
			<section id="One" class="wrapper style3">
				<div class="inner">
					<header class="align-center">

						<h2><?php echo $lang['signup']?></h2>
					</header>
				</div>
			</section>
<section >
    <div class="has-form">

        <?php echo $message; ?>
        <form method="post" action="signupDonor.php">
            <br>
            <label><?php echo $lang['Name']?>
                <input type="text" name="Name" placeholder="<?php echo $lang['Name']?>" required>
            </label>
            <br>
            <label><?php echo $lang['gender']?>
                   <select name="Sex"  required>
                    <option value=""></option>
                    <option value="Male"><?php echo $lang['Male']?></option>
                    <option value="Female"><?php echo $lang['Female']?></option>
                   </select>
            </label>
            <br>
            <label><?php echo $lang['HomeAddress']?>
                <input type="text" name="HomeAddress" placeholder="<?php echo $lang['HomeAddress']?>" required>
            </label>
            <br>
            <label><?php echo $lang['JopAddress']?>
                <input type="text" name="JopAddress" placeholder="<?php echo $lang['JopAddress']?>" >
            </label>
            <br>
            <label><?php echo $lang['Phone']?>
                <input type="text" name="Phone" placeholder="<?php echo $lang['Phone']?>" required>
            </label>
            <br>
            <label><?php echo $lang['LastDateOfDonation']?>
            <input type='date' name='LastDateOfDonation' >
            </label>
            <br>
            <label><?php echo $lang['Age']?>
                <input type="text" name="Age" placeholder="<?php echo $lang['Age']?>  " required>
            </label>
            <br>
            <label><?php echo $lang['Weight']?>
                <input type="text" name="Weight" placeholder="<?php echo $lang['Weight']?>" required>
            </label>
            <br>
            <label><?php echo $lang['Sick']?>
                 <select name="sick"  required>
                    <option value=""></option>
                    <option value="Yes"><?php echo $lang['Yes']?></option>
                    <option value="No"><?php echo $lang['No']?></option>
                </select>
            </label>
            <br>
            <label><?php echo $lang['Password']?>
                <input type="Password" name="Password" placeholder="<?php echo $lang['Password']?>" required>
            </label>
            <br>
            <input type="submit" name="save" value="<?php echo $lang['Save']?>" class="link"> <br><br>
        </form>
    </div>
</section>
<?php include '../footer.php';   ?>
<!--//$text = "أهلا بك $Name";
//echo "<br><br><br><br><br><br><br>";
 /*    $orgName = "BloodBank";
     $userName = "Blood";
     $password = "Blood@255";
     $mobileNo = $_POST['Phone'];
     $text = " أهلا بك $Name ونشكرك على انضمامك , نرجوا منك التوجه الى بنك الدم لعمل الفحوصات الازمة لتاكد من صحتك وامكانية تبرعك بالدم . ";
     $text = urlencode($text);
     $coding = "2";
     $data = "orgName=".$orgName."&userName=".$userName."&password=".$password."&mobileNo=".$mobileNo."&text=".$text."&coding=".$coding;
   	 $ch = curl_init('http://52.36.50.145:8080/MainServlet?');
	 curl_setopt($ch, CURLOPT_POST, true);
	 curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	 $result = curl_exec($ch);
     if($result == true){
     echo "Message has been sent!";
     }
     else{ echo "unsent";}
    curl_close($ch); */

/*require_once 'autoload.php';
$client = new Nexmo\Client(new Nexmo\Client\Credentials\Basic(API_KEY, API_SECRET));
$basic  = new \Nexmo\Client\Credentials\Basic(NEXMO_API_KEY, NEXMO_API_SECRET);
$client = new \Nexmo\Client($basic);
$message = $client->message()->send(
    'to' => 771564567
    'from' => '2b1e75ae'
    'text' => 'A text message sent using the Nexmo SMS API'
);

require_once "vendor/autoload.php";
$client = new Nexmo\Client(new Nexmo\Client\Credentials\Basic(API_KEY, API_SECRET));
$message = $client->message()->send([
    'to' => NEXMO_TO,
    'from' => NEXMO_FROM,
    'text' => 'Test message from the Nexmo PHP Client'
]);
echo "Sent message to " . $message['to'] . ". Balance is now " . $message['remaining-balance'] . PHP_EOL;*/

//$url = "http://52.36.50.145:8080/MainServlet?$data";
  //  $url_json = file_get_contents( $url );
/*if (false !== ($contents = file_get_contents( $url ))) {
    echo " true ";// all good
} else {
    echo " false ";// error happened
}
//echo "<meta http-equiv='refresh' content='2;url=http://52.36.50.145:8080/MainServlet?$data'>";
  //  echo "<meta http-equiv='refresh' content='1;url=signupDonor.php'>";

    /* $result = "http://52.36.50.145:8080/MainServlet?$data";
    // echo $result;
     if($result == true){
     echo "Message has been sent!";
     }
     else{ echo "unsent";}*/


  }//end else
  } -->