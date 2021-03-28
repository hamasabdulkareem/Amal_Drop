
<?php
include 'header.php';
$table = 'bloodbank';
if (isset($_POST['save'])) {

    $BloodBank_Name = $_POST['BloodBank_Name'];
    $Email = $_POST['Email'];
    $Phone = $_POST['Phone'];
    $Address = $_POST['Address'];
    $Password = $_POST['Password'];
    $query = "INSERT INTO bloodbank(BloodBank_Name, Email, Address, Phone, Password) VALUES ('$BloodBank_Name', '$Email', '$Address', '$Phone', '$Password')";
    $result = mysqli_query($connect, $query);

    echo '<meta http-equiv="refresh" content="3;url=showDataOfBloodBank.php?lang=ar">';
}
isset($result) ? $message = '<p class="message"><?php echo $lang["message"]?></p>' : $message = '';
?>
			<section id="One" class="wrapper style3">
				<div class="inner">
					<header class="align-center">

						<h2><?php echo $lang['insertDataOfBloodBank']?></h2>
					</header>
				</div>
			</section>
<section>
    <div class="has-form">

        <?php echo $message; ?>
        <form method="post" action="insertDataOfBloodBank.php">
            <br>
            <label><?php echo $lang['BloodBank_Name']?>
                <input type="text" name="BloodBank_Name" placeholder="<?php echo $lang['BloodBank_Name']?>" required>
            </label>
            <br>
            <label><?php echo $lang['Email']?>
                <input type="email" name="Email" placeholder="<?php echo $lang['Email']?>" required>
            </label>
            <br>
            <label><?php echo $lang['Phone']?>
                <input type="text" name="Phone" placeholder="<?php echo $lang['Phone']?>" required>
            </label>
            <br>
            <label><?php echo $lang['Address']?>
                <input type="text" name="Address" placeholder="<?php echo $lang['Address']?>" required>
            </label>
            <br>
            <label><?php echo $lang['Password']?>
                <input type="Password" name="Password" placeholder="<?php echo $lang['Password']?>" required>
            </label>
            <br>
            <input type="submit" name="save" value="<?php echo $lang['Save']?>" class="link">
        </form>
    </div>
</section>
<?php include '../footer.php'?>
