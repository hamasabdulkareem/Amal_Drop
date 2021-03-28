<?php
include 'header.php';
$val = $_SESSION['BloodBank_ID'];
$table = 'bloodbank';
$query = "SELECT * FROM $table WHERE BloodBank_ID='$val' ";
$result = mysqli_query($connect, $query);
$count = mysqli_num_rows($result);
$output = ' ';
    if (isset($_POST['search']))
    {
       $s = $_POST['BloodBank_Name'];
       $searchq = $_POST['Donor_Phone'];
       $searchq = preg_replace("#[^0-9]#i","",$searchq);
       $query = "SELECT * FROM donor where Phone like '%$searchq%'";
       $result = mysqli_query($connect, $query);
       $count = mysqli_num_rows($result);
       if ($count == 0) {
           $output = 'There was no search results!';
                        }
       else
       {
           while ($row = mysqli_fetch_assoc($result))
              {
                  $id = $row['Donor_ID'];
              }
       $go = "<meta http-equiv='refresh' content='3;url=insertResultTest.php?id=$id && lang=en'>";
       echo $go;
       }

}

?>
			<section id="One" class="wrapper style3">
				<div class="inner">
					<header class="align-center">

						<h2><?php echo $lang['searchofdonor']?></h2>
					</header>
				</div>
			</section>
<section>
    <div class="has-form">

        <form method="post" action="search.php"><br>
             <?php
                 echo "<br><br><br>";
                 if ($count != 0)
                 {
                     $row = mysqli_fetch_assoc($result);
             ?>
                     <label><?php echo $lang['BloodBank_Name']?> : <?php echo $row['BloodBank_Name']; ?> </label>
              <!----><input type="hidden" name="BloodBank_Name" value="<?php echo $row['BloodBank_Name']; ?>">
                     <br><br>
             <?php }
             ?>
                <label><?php echo $lang['Donor_Ph']?> </label>
                <input type="text" name="Donor_Phone" placeholder="Donor_Phone" required><br>
                <input type="submit" name="search" value="<?php echo $lang['Search']?>" class="link">
     </form>
    </div>
</section>

<?php
echo "<br><br><br><br><br>";
include '../footer.php'
/*$show = '';
    if(isset($_POST['login']))
    {

        $BloodBank_Name = $_POST['BloodBank_Name'];
        $password = mysqli_real_escape_string($connect,$_POST['password']);
        $query = "select * from bloodbank where BloodBank_Name = '$BloodBank_Name' and Password = '$password'";
        $result = mysqli_query($connect,$query);
        $count = mysqli_num_rows($result);

        if($count > 0)
        {
            $query = "select * from bloodbank where BloodBank_Name ='$BloodBank_Name' and Password = '$password'";
            $val = mysqli_query($connect,$query);
            $row = mysqli_fetch_assoc($result);
            $show = $row['BloodBank_ID'];
            $_SESSION['BloodBank_ID']= $show;
            $v = $_SESSION['BloodBank_ID'];
         //   echo $show;
        //    $go1 = "<meta http-equiv='refresh' content='9;url=insertResultTest.php?v=$v'>";
         //  echo $go1;
        }
    } */
?>
