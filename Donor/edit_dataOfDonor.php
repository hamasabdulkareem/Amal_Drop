<?php
include 'header.php';
$id = $_SESSION['Donor_ID'];
$table = 'donor';
$query1 = "SELECT * FROM donor WHERE Donor_ID='$id'";
$result2 = mysqli_query($connect, $query1);
$count = mysqli_num_rows($result2);
$message = "";

if(isset($_POST['update'])) {

    $Donor_Name = $_POST['Donor_Name'];
    $Sex = $_POST['Sex'];
    $HomeAddress = $_POST['HomeAddress'];
    $JopAddress = $_POST['JopAddress'];
    $Phone = $_POST['Phone'];
    $LastDateOfDonation = $_POST['LastDateOfDonation'];
    $Age = $_POST['Age'];
    $Weight = $_POST['Weight'];
    $sick = $_POST['sick'];
    $Password = $_POST['Password'];
    $query_update = "UPDATE $table SET Donor_Name='$Donor_Name', Sex='$Sex', HomeAddress='$HomeAddress', JopAddress='$JopAddress', Phone='$Phone', LastDateOfDonation='$LastDateOfDonation', Age='$Age', Weight='$Weight', Sicknesses='$sick', Password='$Password' WHERE Donor_ID='$id'";
    $result_update = mysqli_query($connect, $query_update);
             print_r($result_update);
    $query = "SELECT * FROM $table WHERE Donor_ID=$id";
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($result);
isset($result_update) ? $message = '<p class="message">Update Unsuccess</p>' : $message = '';
    $v = $row['Donor_ID'];
// send massage
$orgName = "BloodBank";
$userName = "Blood";
$password = "Blood@255";
$mobileNo = $Phone;
$text = " „  ⁄œÌ· »Ì«‰« ﬂ »‰Ã«Õ";
$coding = "2";
$text = urlencode($text);
$data = "orgName=".$orgName . "&userName=".$userName."&password=".$password."&mobileNo=".$mobileNo."&text=".$text."&coding=".$coding;
$url = "http://52.36.50.145:8080/MainServlet?".$data;
$result = file_get_contents($url);
     if($result == true){
     echo "Message has been sent!";
     }
     else{ echo "unsent";}

         $go = "<meta http-equiv='refresh' content='3;url=show_dataOfDonor.php?v=$v'>";
         echo $go;

}
 else {
    $query = "SELECT * FROM $table WHERE Donor_ID=$id";
    $result = mysqli_query($connect, $query);


}
?>
			<section id="One" class="wrapper style3">
				<div class="inner">
					<header class="align-center">

						<h2><?php echo $lang['UpdateYouerData']?></h2>
					</header>
				</div>
			</section>
<section>
    <div class="has-form">

        <?php echo $message; ?>
        <form method="post" action="">
           <?php
            if ($count != 0) {
                  $row = mysqli_fetch_assoc($result2);
           ?>
            <br>
           <label><?php echo $lang['Name']?>
                <input type="text" name="Donor_Name" value="<?php echo $row['Donor_Name']; ?>" >
           </label>
            <br>
           <label><?php echo $lang['gender']?>
                <input type="text" name="Sex" value="<?php echo $row['Sex']; ?>" >
            </label>
            <br>
           <label><?php echo $lang['HomeAddress']?>
                <input type="text" name="HomeAddress" value="<?php echo $row['HomeAddress']; ?>" >
            </label>
            <br>
            <label><?php echo $lang['JopAddress']?>
                <input type="text" name="JopAddress" value="<?php echo $row['JopAddress']; ?>" >
            </label>
            <br>
            <label><?php echo $lang['Phone']?>
                <input type="text" name="Phone" value="<?php echo $row['Phone']; ?>">
            </label>
            <br>
            <label><?php echo $lang['LastDateOfDonation']?>
            <input type='date' name='LastDateOfDonation'value="<?php echo $row['LastDateOfDonation']; ?>" >
            </label>
            <br>
            <label><?php echo $lang['Age']?>
                <input type="text" name="Age" value="<?php echo $row['Age']; ?>">
            </label>
            <br>
            <label><?php echo $lang['Weight']?>
                <input type="text" name="Weight" value="<?php echo $row['Weight']; ?>">
            </label>
            <br>
            <label><?php echo $lang['Sick']?>
                 <select name="sick"  >
                    <option value="<?php echo $row['Sicknesses']; ?>"><?php echo $row['Sicknesses']; ?></option>
                    <option value="Yes"><?php echo $lang['Yes']?></option>
                    <option value="Nothing"><?php echo $lang['No']?></option>
                </select>
            </label>
            <br>
            <label><?php echo $lang['Password']?>
                <input type="text" name="Password" value="<?php echo $row['Password']; ?>">
            </label>
            <br>
            <input type="submit" name="update" value="<?php echo $lang['Update']; ?>" class="link">
        </form>
    </div>
</section>
       <?php
                        }

       ?>
<?php include '../footer.php'; ?>
