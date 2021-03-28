
<?php
include 'header.php';
$val = $_SESSION['BloodBank_ID'];
$table = 'bloodbank';
$query3 = "SELECT * FROM $table WHERE BloodBank_ID='$val' ";
$result3 = mysqli_query($connect, $query3);
$count = mysqli_num_rows($result3);
$id = $_GET['id'];
$query1 = "SELECT * FROM donor WHERE Donor_ID='$id'";
$result2 = mysqli_query($connect, $query1);
$count = mysqli_num_rows($result2);
$table = 'test';
if (isset($_POST['save'])) {
        if ($_POST['Hcv_ab'] != "Negative" || $_POST['HB_SAg'] != "Negative" || $_POST['Hiv_ab'] != "Negative" || $_POST['MalariaParasiteSmear'] != "Negative" || $_POST['Hp'] < 18 || $_POST['pcv'] < 45)
        {
       $statue = 0;
       $name = $_POST['Donor_Name'];
       $orgName = "BloodBank";
       $userName = "Blood";
       $password = "Blood@255";
       $mobileNo = $_POST['Phone'];
       $text = " äÚÊÐÑ ãäß $name áä íÊã ÍÝÙ ÈíÇäÇÊß áÇä ÝÍæÕÇÊß ÛíÑ ÓáíãÉ .";
       $coding = "2";
       $text = urlencode($text);
       $data = "orgName=".$orgName."&userName=".$userName."&password=".$password."&mobileNo=".$mobileNo."&text=".$text."&coding=".$coding;
       $url="http://52.36.50.145:8080/MainServlet?".$data;
       $result = file_get_contents($url);
    }
    else {
       $statue = 1;
    }

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
    $query = "INSERT INTO test (Donor_ID, statue, BloodBank_ID, Hcv_ab, HB_SAg, Hiv_ab, Hp, pcv, MalariaParasiteSmear, BI_group, HBC_ab)
                        VALUES ('$Donor_ID', '$statue', '$BloodBank_ID', '$Hcv_ab', '$HB_SAg', '$Hiv_ab', '$Hp', '$pcv', '$MalariaParasiteSmear', '$BI_group', '$HBC_ab')";
    $result = mysqli_query($connect, $query);
    if ( $statue == 0)
    {
       $name = $_POST['Donor_Name'];
       $orgName = "BloodBank";
       $userName = "Blood";
       $password = "Blood@255";
       $mobileNo = $_POST['Phone'];
       $text = " äÚÊÐÑ ãäß $name áä íÊã ÍÝÙ ÈíÇäÇÊß áÇä ÝÍæÕÇÊß ÛíÑ ÓáíãÉ .";
       $coding = "2";
       $text = urlencode($text);
       $data = "orgName=".$orgName."&userName=".$userName."&password=".$password."&mobileNo=".$mobileNo."&text=".$text."&coding=".$coding;
       $url="http://52.36.50.145:8080/MainServlet?".$data;
       $result = file_get_contents($url);

    }
    if ( $statue == 1)
    {
       $name = $_POST['Donor_Name'];
       $orgName = "BloodBank";
       $userName = "Blood";
       $password = "Blood@255";
       $mobileNo = $_POST['Phone'];
       $text = " $name Êã ÍÝÙ ÈíÇäÇÊß æÓíÊã ÇÑÓÇá ÑÓÇáÉ äÕíÉ áß ÚäÏ ÇÍÊíÇÌ Çí ÔÎÕ ááÊÈÑÚ .";
       $coding = "2";
       $data = "orgName=".$orgName."&userName=".$userName."&password=".$password."&mobileNo=".$mobileNo."&text=".$text."&coding=".$coding;
       $url="http://52.36.50.145:8080/MainServlet?".$data;
       $result = file_get_contents($url);
    }

}
isset($result) ? $message = '<p class="message">Save Success</p>' : $message = '';
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
               <form method="post" action="insertResultTest.php">
               <br>
                      <section>
            				<div class="inner">
				                 <div class="grid-style">
                                  <?php
                                     if ($count != 0)
                                     {
                                         $row = mysqli_fetch_assoc($result3);
                                  ?>
                                       <div>
						                 	<div class="box">
                                               <label><?php echo $lang["BloodBank_Name"]?> : <?php echo $row['BloodBank_Name']; ?>
             	                            </div>
					                   </div>
                                  <?php }
                                  ?>

                                   <?php
                                      if ($count != 0)
                                       {
                                          $row2 = mysqli_fetch_assoc($result2);
                                   ?>
                                        <div>
							               <div class="box">
                                                <label><?php echo $lang["Donor_Name"]?> : <?php echo $row2['Donor_Name']; ?> </label>
                                                <input hidden="hidden" value="<?php echo $row2['Donor_ID']; ?>" name="Donor_ID">
                                                <input hidden="hidden" value="<?php echo $row2['Donor_Name']; ?>" name="Donor_Name">
                                                <input hidden="hidden" value="<?php echo $row2['Phone']; ?>" name="Phone">
                                           </div>
					                 	</div>
                                        <br>
                                   <?php }
                                   ?>
            		             </div>
			               </div>
                       </section>

            <label>Hcv_ab
               <select name="Hcv_ab"  required>
                    <option value=""></option>
                    <option value="Negative">Negative</option>
                    <option value="positive">positive</option>
                </select>
            </label>
            <br>
            <label>HB_SAg
               <select name="HB_SAg"  required>
                    <option value=""></option>
                    <option value="Negative">Negative</option>
                    <option value="positive">positive</option>
                </select>
            </label>
            <br>
            <label>Hiv_ab
                <select name="Hiv_ab"  required>
                    <option value=""></option>
                    <option value="Negative">Negative</option>
                    <option value="positive">positive</option>
                </select>
            </label>
            <br>
            <label>Hp
                <input type="number" name="Hp" placeholder="Hp" required>
            </label>
            <br>
            <label>pcv
                <input type="number" name="pcv" placeholder="pcv" required>
            </label>
            <br>
            <label>Malaria_Parasite_Smear
                 <select name="MalariaParasiteSmear"  required>
                    <option value=""></option>
                    <option value="Negative">Negative</option>
                    <option value="positive">positive</option>
                </select>
            </label>
            <br>
            <label>BI_group
                 <select name="BI_group"  required>
                    <option value=""></option>
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
                 <select name="HBC_ab"  required>
                    <option value=""></option>
                    <option value="Negative">Negative</option>
                    <option value="positive">positive</option>
                </select>
            </label>
            <br>
            <input type="submit" name="save" value="<?php echo $lang["Save"]?>" class="link">
        </form>
    </div>
</section>

<?php include '../footer.php'?>
