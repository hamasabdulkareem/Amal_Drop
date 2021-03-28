<?php
include 'header.php';
//$table = 'activity';
//function start_count(){ echo "<br><br><br><br><br> you ";}
//start_count();
$v = $_SESSION['Donor_ID'];
$query = "SELECT * FROM activity,request,hospital WHERE activity.request_ID = request.request_ID AND request.Hospital_ID = hospital.Hospital_ID AND activity.Donor_ID = $v ";
$result = mysqli_query($connect, $query);
$count = mysqli_num_rows($result);
$i = 1;
$id = '';
$message = '';
$LastDateOfDonation = '';
$idDonor = '';
?>

			<section id="One" class="wrapper style3">
				<div class="inner">
					<header class="align-center">

						<h2><?php echo $lang["activit"]?> </h2>
					</header>
				</div>
			</section>

<section>
    <div class="has-form">
<br><br><br>


                   <?php
                        if ($count != 0)
                                 $row = mysqli_fetch_assoc($result);
                                 if($row['Satue_Donation'] == 1)
                                     {
                   ?>
                                         <table style="border-collapse:collapse">
                                             <thead>
                                                  <tr>
                                                     <th></th>
                                                     <th><?php echo $lang["Hospital_Name"]?></th>
                                                     <th><?php echo $lang["Sick_Name"]?></th>
                                                     <th><?php echo $lang["date"]?></th>
                                                  </tr>
                                             </thead>
                                             <tbody>
                                                   <tr>
                                                     <input type="hidden" value="<?php echo $row['Activity_ID'];?>" name="id">
                                                     <td><?php echo $i; ?></td>
                                                     <td><?php echo $row['Hospital_Name']; ?> </td>
                                                     <td><?php echo $row['sick_Name']; ?></td>
                                                     <td><?php echo $row['request_Date']; ?></td>
                                                   </tr>
                    <?php
                                     }
                        else
                            {
                    ?>
                              <script>alert("<?php echo $lang['Datafound']; ?>");
                              window.location="show_dataOfDonor.php";
                              </script>
                     <?php  }
                     ?>
                                             </tbody>
                                         </table>
        </div>
</section>
<?php
echo "<br><br><br><br><br><br><br><br>";
include '../footer.php';   ?>