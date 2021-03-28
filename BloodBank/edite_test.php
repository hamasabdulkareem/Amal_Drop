<?php
include 'header.php';
$id = $_GET['id'];
$table = 'test';
$message = "";
$query1 = "SELECT * FROM $table WHERE Donor_ID='$id'";
$result2 = mysqli_query($connect, $query1);
$count = mysqli_num_rows($result2);
if(isset($_POST['update'])) {

    $Donor_ID = $_POST['Donor_ID'];
    $BloodBank_ID = $_SESSION['BloodBank_ID'];
    $Hcv_ab = $_POST['Hcv_ab'];
    $HB_SAg = $_POST['HB_SAg'];
    $Hiv_ab = $_POST['Hiv_ab'];
    $Hp = $_POST['Hp'];
    $pcv = $_POST['pcv'];
    $MalariaParasiteSmear = $_POST['MalariaParasiteSmear'];
    $BI_group = $_POST['BI_group'];
    $HBC_ab = $_POST['HBC_ab'];
    $query_update = "UPDATE $table SET Donor_ID='$Donor_ID', statue='$statue', BloodBank_ID='$BloodBank_ID', Hcv_ab='$Hcv_ab', HB_SAg='$HB_SAg', Hiv_ab='$Hiv_ab', Hp='$Hp', pcv='$pcv', MalariaParasiteSmear='$MalariaParasiteSmear', BI_group='$BI_group', HBC_ab='$HBC_ab' WHERE Donor_ID='$id'";
    $result = mysqli_query($connect, $query_update)or mysql_errno();;;;
             print_r($result_update);
    $query = "SELECT * FROM $table WHERE BloodBank_ID=$id";
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($result);
isset($result_update) ? $message = '<p class="message">Update success</p>' : $message = '';
    echo '<meta http-equiv="refresh" content="3;url=showTest.php?lang=en">';
} else {
    $query = "SELECT * FROM $table WHERE BloodBank_ID=$id";
    $result = mysqli_query($connect, $query);
}

?>
			<section id="One" class="wrapper style3">
				<div class="inner">
					<header class="align-center">

						<h2><?php echo $lang["insetrResultOftest"]?></h2>
					</header>
				</div>
			</section>
          <section>
    <div class="has-form">
 <?php echo $message; ?>
               <form method="post" action="">
               <br>
       <?php
          if ($count != 0)
           {
             $row = mysqli_fetch_assoc($result2);
        ?>
            <input hidden="hidden" value="<?php echo $row['Donor_ID']; ?>" name="Donor_ID">
            <input hidden="hidden" value="<?php echo $row['BloodBank_ID']; ?>" name="BloodBank_ID">
            <input hidden="hidden" value="<?php echo $row['statue']; ?>" name="statue">
            <br>
            <label>Hcv_ab
               <select name="Hcv_ab"  >
                    <option value="<?php echo $row['Hcv_ab']; ?>"></option>
                    <option value="Negative">Negative</option>
                    <option value="positive">positive</option>
                </select>
            </label>
            <br>
            <label>HB_SAg
               <select name="HB_SAg">
                    <option value="<?php echo $row['HB_SAg']; ?>"></option>
                    <option value="Negative">Negative</option>
                    <option value="positive">positive</option>
                </select>
            </label>
            <br>
            <label>Hiv_ab
                <select name="Hiv_ab"  >
                    <option value="<?php echo $row['Hiv_ab']; ?>"></option>
                    <option value="Negative">Negative</option>
                    <option value="positive">positive</option>
                </select>
            </label>
            <br>
            <label>Hp
                <input type="number" name="Hp" placeholder="Hp" value="<?php echo $row['Hp']; ?>" >
            </label>
            <br>
            <label>pcv
                <input type="number" name="pcv" placeholder="pcv" value="<?php echo $row['pcv']; ?>" >
            </label>
            <br>
            <label>Malaria_Parasite_Smear
                 <select name="MalariaParasiteSmear"  >
                    <option value="<?php echo $row['MalariaParasiteSmear']; ?>"></option>
                    <option value="Negative">Negative</option>
                    <option value="positive">positive</option>
                </select>
            </label>
            <br>
            <label>BI_group
                 <select name="BI_group"  >
                    <option value="<?php echo $row['BI_group']; ?>"></option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                </select>
            </label>
            <br>
            <label>HBC_ab
                 <select name="HBC_ab"  >
                    <option value="<?php echo $row['HBC_ab']; ?>"></option>
                    <option value="Negative">Negative</option>
                    <option value="positive">positive</option>
                </select>
            </label>

   <?php }
                                  ?>
            <br>
            <input type="submit" name="save" value="<?php echo $lang["Update"]?>" class="link">
        </form>
    </div>
</section>

<?php include '../footer.php'?>