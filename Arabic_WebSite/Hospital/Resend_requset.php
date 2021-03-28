<?php echo "<br><br><br><br><br><br><br><br><br>"; ?>
<?php
include 'header.php';
$id = $_GET['id'];
$i = '1';
// $_SESSION['Hospital_ID'];
$query = "SELECT * FROM request WHERE request_ID='$id'";
$result = mysqli_query($connect, $query);
$count = mysqli_num_rows($result);
$row = mysqli_fetch_assoc($result);
$searchq = $row['Type_of_blood'];
    //   $searchq = preg_replace("#[^0-9a-z]#i","",$searchq);
       $query2 = "SELECT * FROM test WHERE BI_group LIKE '$searchq' AND statue = '1' LIMIT 1";
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
          //   if ($i <= 2 ){
            while ($row1 = mysqli_fetch_assoc($result3)) :
                   echo "<br><br>";
                   $id = $row1['Donor_ID'];
                   echo 'hello'.' : '.$id.'   ';
                               $query4 = "SELECT * FROM donor WHERE Donor_ID = $id ";
                               $result4 = mysqli_query($connect, $query4);
                               $row2 = mysqli_fetch_assoc($result4);
                              // $Phone = $row2['Phone'];
                               $date = $row2['LastDateOfDonation'];
                               $end = strtotime("$date");
                               $i2 = time() - $end;
                               $d = round($i2/ (60*60*24));
                               echo $d;
                               if ( $d >= 90 )
                               {
                                           $orgName = "BloodBank";
                                           $userName = "Blood";
                                           $password = "Blood@255";
                                           $mobileNo = $row2['Phone'];
                                           $text = " أهلا بك  ونشكرك على انضمامك , نرجوا منك التوجه الى بنك الدم لعمل الفحوصات الازمة لتاكد من صحتك وامكانية تبرعك بالدم . ";
                                           $coding = "2";
                                           $data = "orgName=".$orgName."&userName=".$userName."&password=".$password."&mobileNo=".$mobileNo."&text=".$text."&coding=".$coding;
                                           echo '<br>'.$data;//"<meta http-equiv='refresh' content='2;url=http://52.36.50.145:8080/MainServlet?$data'>";
                               }//end if
                               else
                                {
                                   echo " Sorry";
                                }//end else
                              // $date = date("Y-m-d") - '2014-07-06';
                             //  echo $Phone.'   '.'    '.$row2['LastDateOfDonation'].'  '.'     '.$id;

               $i++;
               endwhile;
            } //end else
?>
<?php echo "<br><br><br><br><br><br><br><br><br>"; ?>
<?php include '../footer.php'?>