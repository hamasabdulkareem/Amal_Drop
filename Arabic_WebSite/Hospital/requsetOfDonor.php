<?php
include 'header.php';
$id = $_SESSION['Hospital_ID'];
$query1 = "SELECT * FROM hospital WHERE Hospital_ID='$id'";
$result2 = mysqli_query($connect, $query1);
$count = mysqli_num_rows($result2);
$table = 'request';
$output = '';
$i = '1';
$idDonor = '';
if (isset($_POST['send'])) {

   $Hospital_ID = $_POST['Hospital_ID'];
    $Sick_Number = $_POST['Sick_Number'];
    $Sick_Name = $_POST['Sick_Name'];
    $Type_Of_Blood = $_POST['Type_Of_Blood'];
    $Numberings_Of_Donor = $_POST['Numberings_Of_Donor'];
    $Time_Wiat = $_POST['Time_Wiat'];
    $Requset_Date = date("Y-m-d");
    $query = "INSERT INTO request (sick_Number, sick_Name, Type_of_blood, Numberings_Of_Donor, Time_Wiat, request_Date, Hospital_ID) VALUES ('$Sick_Number', '$Sick_Name', '$Type_Of_Blood', '$Numberings_Of_Donor', '$Time_Wiat', '$Requset_Date', '$Hospital_ID')";
    $result = mysqli_query($connect, $query);
     //  $connect->exec($query);
if ($result) {
    $last_id = mysqli_insert_id($connect);
    echo "New record created successfully. Last inserted ID is: " . $last_id;
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($connect);
}


              $num = $Numberings_Of_Donor;
              $donor_num = 2 * $num;
       $searchq = $_POST['Type_Of_Blood'];
    //   $searchq = preg_replace("#[^0-9a-z]#i","",$searchq);
       $query2 = "SELECT * FROM test WHERE BI_group LIKE '$searchq' AND statue = '1' LIMIT $donor_num";
       $result3 = mysqli_query($connect, $query2);
       $count2 = mysqli_num_rows($result3);
    //   $row1 = mysqli_fetch_assoc($result3);
     //  $id = $row1['Donor_ID'];
      // echo $id;
       if ($count2 == 0)
             {
           $output = 'There was no search results!';
           echo $output;
              } //end if
       else{

              echo 'donor '.$donor_num.'<br>';
              //  for ($v = 1; $v <= $donor_num; $v++ )
                                                 //    {
          //   if ($i <= 2 ){
            while ($row1 = mysqli_fetch_assoc($result3)) :
                   echo "<br><br>";
                   $idDonor = $row1['Donor_ID'];
                   echo 'hello'.' : '.$idDonor.'   ';
                               $query4 = "SELECT * FROM donor WHERE Donor_ID = $idDonor";
                               $result4 = mysqli_query($connect, $query4);
                               $row2 = mysqli_fetch_assoc($result4);
                              // $Phone = $row2['Phone'];
                               $dateDonation = $row2['LastDateOfDonation'];
                               $end = strtotime("$dateDonation");
                               $iDonation = time() - $end;
                               $dDonation = round($iDonation/ (60*60*24));
                               echo $dDonation;
                               if ( $dDonation >= 90 )
                               {
                                           $SendSms_date = $row2['SendSms_date'];
                                           $end_SendSms_date = strtotime("$SendSms_date");
                                           $iSendSms_date = time() - $end_SendSms_date;
                                           $dSendSms_date = round($iSendSms_date/ (60*60*24));
                                                  echo 'date is '.$dSendSms_date;
                                                  if ( $dSendSms_date >= 1 )
                                                  {


                                                     $orgName = "BloodBank";
                                                     $userName = "Blood";
                                                     $password = "Blood@255";
                                                     $mobileNo = $row2['Phone'];
                               $text = " أهلا بك  ونشكرك على انضمامك , نرجوا منك التوجه الى بنك الدم لعمل الفحوصات الازمة لتاكد من صحتك وامكانية تبرعك بالدم . ";
                                                     $coding = "2";
                                                     $data = "orgName=".$orgName."&userName=".$userName."&password=".$password."&mobileNo=".$mobileNo."&text=".$text."&coding=".$coding;
                                                            $url="http://52.36.50.145:8080/MainServlet?".$data;
                                                            $result = file_get_contents($url);
                                            // echo '<br>'.$data;
                                                                   $SendSms_date = date("Y-m-d");
                                                                    $query4 = "INSERT INTO activity (Donor_ID, request_ID) VALUES ('$idDonor', '$last_id')";
                                                                    $query4 = "UPDATE donor SET SendSms_date='$SendSms_date' WHERE Donor_ID='$idDonor'";
                                                                    $result4 = mysqli_query($connect, $query4)or mysql_errno();

                                                  }//end if
                                                 else
                                                 {
                                                   echo " Sorry2";
                                                 }



                               }//end if
                               else
                                {
                                   echo " Sorry";
                                }//end else


               $i++;
               endwhile;
               //} //end for
            } //end else

          }  //end if

isset($result) ? $message = '<p class="message"><?php echo $lang["MessageSend"]?></p>' : $message = '';


?>
		<!-- One -->
			<section id="One" class="wrapper style3">
				<div class="inner">
					<header class="align-center">

						<h2><?php echo $lang['requset_Donor']?></h2>
					</header>
				</div>
			</section>

<section>
    <div class="has-form">
     <?php// echo $id;?><?php //echo "$output" ;?>
 <!--           <label>Donor_ID </label>
                <input type="text" name="Donor_ID" placeholder="Hiv_ab" required><br>
        <?php echo $message; ?>    -->
        <form method="post" action="requsetOfDonor.php">
            <br>
            <?php
                if ($count != 0) {
                $row = mysqli_fetch_assoc($result2);
            ?>
            <label><?php echo $lang['Hospital_Name']?> : <?php echo $row['Hospital_Name']; ?></label>
            <input hidden="hidden" value="<?php echo $row['Hospital_ID']; ?>" name="Hospital_ID">
            <?php } ?>
<!--            <label>Hospital_Name
                <input type="text" name="Hospital_Number" placeholder="Hospital_Number" required>
            </label>  -->
            <label><?php echo $lang['Sick_Number']?>
                <input type="text" name="Sick_Number" placeholder="<?php echo $lang['Sick_Number']?> " required>
            </label>
            <br>
            <label><?php echo $lang['Sick_Name']?>
                <input type="text" name="Sick_Name" placeholder="<?php echo $lang['Sick_Name']?>" required>
            </label>
            <br>

            <label><?php echo $lang['Type_Of_Blood']?>
                <select name="Type_Of_Blood"  required>
                    <option value=""></option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                </select>
            </label>
            <br>

<!---->            <label><?php echo $lang['Numberings_Of_Donor']?>
                <input type="number" name="<?php echo $lang['Numberings_Of_Donor']?>"  required>
            </label>
            <br>
            <label><?php echo $lang['Time_Wiat']?>
                <input type="time" name="Time_Wiat" placeholder="<?php echo $lang['Time_Wiat']?>" required>
            </label>
            <br>
        <!--   <label>Requset_Date
                <input type="date" name="Requset_Date" placeholder="Requset_Date" required>
            </label> -->

            <input type="submit" name="send" value="<?php echo $lang['send']?>" class="link">
        </form>
    </div>
</section>
<?php echo "$output" ;?>
<?php echo "<br><br><br><br><br><br><br><br><br>"; ?>
<?php include '../footer.php'
  //  $last_id = $connect->lastInsertId();

  //  echo "New record created successfully. Last inserted ID is: " . $last_id;
  //  $last_id = mysql_insert_id($connect);
    //echo "New record has id: " . $last_id;
//   echo '<meta http-equiv="refresh" content="3;url=situations.php">';
  //  echo '<meta http-equiv="refresh" content="3;url=../index.php">';   */
/* $Type_Of_Blood = $row1['BI_group'];
                $id = $row1['Donor_ID'];    //SELECT * FROM test INNER JOIN donor ON test.Donor_ID = '33' AND donor.Donor_ID = '33'
                $query3 = "SELECT * FROM test INNER JOIN donor ON test.Donor_ID = '$id' AND donor.Donor_ID = '$id'";
             $result3 = mysqli_query($connect, $query3);
               $count3 = mysqli_num_rows($result3);
               $row3 = mysqli_fetch_assoc($result3);
              $phone = $row3['Phone'];
               echo '<div>'.$row3['/Phone'].' '.'</div>';
             echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'; echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'; echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';;
               echo '<div>'.$i.' '.'</div>';
               echo '<div>'.$row1['BI_group'].' '.'</div>';
               $statue =
               echo '<div>'.$row1['statue'].' '.'</div>';
               echo '<div>'.$row1['Donor_ID'].' '.'</div>';
               $Phone = $row1['Phone'];
               $Name = $row1['Donor_Name'];
                echo $id;
                echo $Phone;
         $query4 = "INSERT INTO activity (Donor_ID, request_ID)
                        VALUES ('$id', '$Sick_Number')";

     $orgName = "BloodBank";
     $userName = "Blood";
     $password = "Blood@255";
     $mobileNo = $row1['Phone'];
     $text = " أهلا بك  ونشكرك على انضمامك , نرجوا منك التوجه الى بنك الدم لعمل الفحوصات الازمة لتاكد من صحتك وامكانية تبرعك بالدم . ";
     $coding = "2";
     $data = "orgName=".$orgName."&userName=".$userName."&password=".$password."&mobileNo=".$mobileNo."&text=".$text."&coding=".$coding;
    echo '<br>'.$data;"<meta http-equiv='refresh' content='2;url=http://52.36.50.145:8080/MainServlet?$data'>";



               $id = $row1['Donor_ID'];
               $query3 = "SELECT * FROM test INNER JOIN donor ON test.Donor_ID = '$id' AND donor.Donor_ID = '$id'";
               $result3 = mysqli_query($connect, $query3);
               $count3 = mysqli_num_rows($result3);
               $row3 = mysqli_fetch_assoc($result3);
               $phone = $row3['Phone'];
               echo 'hello'.'<div>'.$row3['Phone'].' '.'</div>';
               echo '<div>'.$row1['Donor_ID'].' '.'</div>';
               $query3 = "SELECT * FROM test WHERE Donor_ID='$id'";
               $result3 = mysqli_query($connect, $query3);
               $count3 = mysqli_num_rows($result3);
               $row3 = mysqli_fetch_assoc($result3);
               $phone = $row3['Phone'];
               $output = '<div>'.$Type_Of_Blood.' '.$statue.' '.$id.' '.$i.'</div>';

               $query3 = "SELECT * FROM test INNER JOIN donor ON test.Donor_ID = '$id' AND donor.Donor_ID = '$id'";
               $result3 = mysqli_query($connect, $query3);
               $count3 = mysqli_num_rows($result3);
               $row3 = mysqli_fetch_assoc($result3);
               $phone = $row3['Phone'];
               echo 'hello'.'<div>'.$row3['Phone'].' '.'</div>';
                         }*/
                         //echo "<br><br><br><br><br><br><br>";
//echo $_SESSION['Hospital_ID'];
?>
