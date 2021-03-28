<?php
include 'header.php';
$val = $_SESSION['Donor_ID'];
$table = 'donor';
$query = "SELECT * FROM donor where Donor_ID = '$val'";
$result = mysqli_query($connect, $query);
$count = mysqli_num_rows($result);
?>
			<section id="One" class="wrapper style3">
				<div class="inner">
					<header class="align-center">

						<h2><?php echo $lang['showYouerData']?></h2>
					</header>
				</div>
			</section>
<section>
    <div class="has-form">

        <form method="post" action="show_dataOfDonor.php">
        <br>
           <section >
               <div class="inner" >
					  <div class="grid-style">
                            <div >
							     <div class="box" style="background-color: #E7B3AB;">
                                      <?php
                                            if ($count != 0) {
                                            $row = mysqli_fetch_assoc($result);
                                      ?>
                                      <br>
                                      <label><?php echo $lang['Name']?> : <?php echo $row['Donor_Name']; ?>  </label>
                                      <br>
                                      <label><?php echo $lang['gender']?> : <?php echo $row['Sex']; ?></label>
                                      <br>
                                      <label><?php echo $lang['HomeAddress']?> : <?php echo $row['HomeAddress']; ?></label>
                                      <br>
                                      <label><?php echo $lang['JopAddress']?> : <?php echo $row['JopAddress']; ?></label>
                                      <br>
                                      <label><?php echo $lang['Phone']?> : <?php echo $row['Phone']; ?></label>

                                 </div>
						    </div>

                            <div>
							     <div class="box" style="background-color: #E7B3AB;">
                                      <br>
                                      <label><?php echo $lang['LastDateOfDonation']?> : <?php echo $row['LastDateOfDonation']; ?></label>
                                      <br>
                                      <label><?php echo $lang['Age']?> : <?php echo $row['Age']; ?></label>
                                      <br>
                                      <label><?php echo $lang['Weight']?> : <?php echo $row['Weight']; ?></label>
                                      <br>
                                      <label><?php echo $lang['Sicknesses']?> : <?php echo $row['Sicknesses']; ?></label>
                                      <br>
                                      <label><?php echo $lang['Password']?> : <?php echo $row['Password']; ?></label>
                                 </div>
                           </div>
				</div>
            </section>
            <br>
     <a href="edit_dataOfDonor.php?id=<?php echo $row['Donor_ID']; ?> && lang=ar"><?php echo $lang['Modify']?></a>
     <a href="activity.php?id=<?php echo $row['Donor_ID']; ?> && lang=ar"><?php echo $lang['activit']?></a>
        </form>
    </div>
</section>
       <?php  }
                ?>
<?php
                              // $Phone = $row2['Phone'];
                               $date = $row['LastDateOfDonation'];
                               $end = strtotime("$date");
                               $i2 = time() - $end;
                               $d = round($i2/ (60*60*24));
                               if ( $d >= 360 )
                               {
                                           if( $row['Donation_statue'] == 0)
                                           {
                                           $orgName = "BloodBank";
                                           $userName = "Blood";
                                           $password = "Blood@255";
                                           $mobileNo = $row['Phone'];
                                           $text = "äÑÌæÇ ãäß ÇáÊæÌå Çáì Èäß ÇáÏã áÚãá ÇáÝÍæÕÇÊ ";
                                           $coding = "2";
                                           $text = urlencode($text);
                                           $data = "orgName=".$orgName . "&userName=".$userName."&password=".$password."&mobileNo=".$mobileNo."&text=".$text."&coding=".$coding;
                                           $url="http://52.36.50.145:8080/MainServlet?".$data;
                                           $result = file_get_contents($url);
                                           }
                               }
 ?>
<?php include '../footer.php'; ?>