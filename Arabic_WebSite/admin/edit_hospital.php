<?php
include 'header.php';
$id = $_GET['id'];
$table = 'hospital';
$message = "";
$query1 = "SELECT * FROM $table WHERE Hospital_ID='$id' ";
$result2 = mysqli_query($connect, $query1);
$count = mysqli_num_rows($result2);
if(isset($_POST['update'])) {

    $Hospital_Name = $_POST['Hospital_Name'];
    $Email = $_POST['Email'];
    $Phone = $_POST['Phone'];
    $Address = $_POST['Address'];
    $Password = $_POST['Password'];

    $query_update = "UPDATE $table SET Hospital_Name='$Hospital_Name', Email='$Email', Phone='$Phone', Password='$Password' WHERE Hospital_ID='$id'";
    $result_update = mysqli_query($connect, $query_update);
             print_r($result_update);
    $query = "SELECT * FROM $table WHERE Hospital_ID=$id";
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($result);
isset($result_update) ? $message = '<p class="message"><?php echo $lang["MessageUpdate"]?></p>' : $message = '';
    echo '<meta http-equiv="refresh" content="3;url=showDataOfHospital.php?lang=ar">';
} else {
    $query = "SELECT * FROM $table WHERE Hospital_ID=$id";
    $result = mysqli_query($connect, $query);
}

?>
			<section id="One" class="wrapper style3">
				<div class="inner">
					<header class="align-center">

						<h2><?php echo $lang['DataofHospital']?></h2>
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
            <label><?php echo $lang['Hospital_Name']?>
                <input type="text" name="Hospital_Name" value="<?php echo $row['Hospital_Name']; ?>" >
            </label>
            <br>
            <label><?php echo $lang['Email']?>
                <input type="email" name="Email" value="<?php echo $row['Email']; ?>">
            </label>
            <br>
            <label><?php echo $lang['Phone']?>
                <input type="text" name="Phone" value="<?php echo $row['Address']; ?>" >
            </label>
            <br>
            <label><?php echo $lang['Address']?>
                <input type="text" name="Address" value="<?php echo $row['Phone']; ?>" >
            </label>
            <br>
            <label><?php echo $lang['Password']?>
                <input type="text" name="Password" value="<?php echo $row['Password']; ?>" >
            </label>
            <br>
            <input type="submit" name="update" value="<?php echo $lang['Update']?>" class="link">
        </form>
    </div>
</section>
       <?php  }
                ?>
<?php include '../footer.php'; ?>
