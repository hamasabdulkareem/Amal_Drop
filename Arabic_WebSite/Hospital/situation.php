<?php
include 'header.php';
//$table = 'activity';
//function start_count(){ echo "<br><br><br><br><br> you ";}
//start_count();
$v = $_SESSION['Hospital_ID'];
$query = "SELECT * FROM activity,request,donor WHERE activity.request_ID = request.request_ID AND activity.Donor_ID = donor.Donor_ID ";
$result = mysqli_query($connect, $query);
$count = mysqli_num_rows($result);
$i = 1;
$id = '';
$message = '';
$LastDateOfDonation = '';
$idDonor = '';
?>
<?php
/*if(isset($_POST['Resend']))
{
    $Arrival_donor = "1";
    $id = $_POST['id'];
    $query_update = "UPDATE activity SET Arrival_donor='$Arrival_donor' WHERE Activity_ID ='$id'";
    $result_update = mysqli_query($connect, $query_update);
             print_r($result_update);
    $query2 = "SELECT * FROM activity WHERE Activity_ID=$id";
    $result2 = mysqli_query($connect, $query2);
    $row2 = mysqli_fetch_assoc($result2);
isset($result_update) ? $message = '<p class="message">Update success</p>' : $message = '';
echo '<meta http-equiv="refresh" >';
}                                      */
?>
<?php
if(isset($_POST['Done']))
{
    $Satue_Donation = "1";
    $id = $_POST['id'];
    $idDonor = $_POST['idDonor'];
    $LastDateOfDonation = date("Y-m-d");
    $query_update = "UPDATE activity SET Satue_Donation='$Satue_Donation' WHERE Activity_ID ='$id'";
    $query_update = "UPDATE donor SET Donation_statue='1', LastDateOfDonation='$LastDateOfDonation' WHERE Donor_ID='$idDonor'";
    $result_update = mysqli_query($connect, $query_update);
             print_r($result_update);
    $query2 = "SELECT * FROM activity WHERE Activity_ID=$id";
    $result2 = mysqli_query($connect, $query2);
    $row2 = mysqli_fetch_assoc($result2);
isset($result_update) ? $message = '<p class="message"><?php echo $lang["MessageUpdate"]?></p>' : $message = '';
echo '<meta http-equiv="refresh" >';
}
?>


			<section id="One" class="wrapper style3">
				<div class="inner">
					<header class="align-center">

 						<h2><?php echo $lang["situations"]?> </h2>
					</header>
				</div>
			</section>
<section>
    <div class="has-form">
    <?php //echo $message;
    //<th>Counter</th>  s <th>Arrival_donor</th> ?>
<br><br><br>
    <table style="border-collapse:collapse">
        <thead>
            <tr>
                <th></th>
                <th><?php echo $lang["Donor_Name"]?></th>
                <th><?php echo $lang["Sick_Name"]?></th>
                <th><?php echo $lang["Type_Of_Blood"]?></th>
                <th><?php echo $lang["Statue_Donation"]?></th>

            </tr>
        </thead>
        <tbody>
        <form method="post" action="activity.php">
                   <?php
                        if ($count != 0)
                                  {
                                while ($row = mysqli_fetch_assoc($result)):
                                //$id = $row['Activity_ID'];
                   ?>
                    <tr>
                    <input type="hidden" value="<?php echo $row['Activity_ID'];?>" name="id">
                        <td><?php echo $i; ?></td>
                        <!--<td><?php echo $row['Activity_ID']; ?> <input type="hidden" value="<?php echo $row['Activity_ID']; ?>" name="id"> </td> -->
                        <td><?php echo $row['Donor_Name']; ?> <input type="hidden" value="<?php echo $row['Donor_ID']; ?>" name="idDonor"></td>
                        <td><?php echo $row['sick_Name']; ?></td>
                        <td><?php echo $row['Type_of_blood']; ?></td>
                        <?php// if ($row['Arrival_donor'] == 0){echo "No";} else { echo "Yes";}  ?>
                        <td><?php  if($row['Satue_Donation'] == 0) { echo $lang['No'];} else { echo $lang['Yes'];} ?></td>
                        <td> <input type="submit" value="<?php echo $lang["Done"]?>" name="Done">  </td>
                        <td>
                        <a href="Resend_requset.php?id=<?php echo $row['request_ID']; ?>"><?php echo $lang["Resend"]?></a> </td>

               <?php
                                 $i++;
                                 endwhile;
                                   }
                        else
                          {
                    ?>
                <tr>
                    <td colspan="5" style="text-align: center; color: #f00">Data not found</td>
                </tr>
                   <?php
                  }
            ?>
<!--
<script>
    function start_count()
    {
        var count = 0;
        myVar = setInterval(function()
        {
            if(count <= 20)
            {
                document.getElementById("count").innerHTML=count;
                var time = <?php echo $row['Arrival_donor'];?>;
                if(time == 0)  {
                      var t = "<?php echo 'hello  the'; ?>"
                      document.getElementById("count").innerHTML="  " + t + count ;
                      }
                else {
                      document.getElementById("count").innerHTML="you" + count ;
                                               }

            }
            if(count == 21)
            {
                      document.getElementById("count").innerHTML="you " + count + " sec";

            }
            count++;

        }, 1000)
    }
</script>
<script>

    start_count();

 </script>
-->









        </tbody>
    </table>
        </div>
</section>
<?php
echo "<br><br><br><br><br><br><br><br><br><br><br><br>";
include '../footer.php'; ?>