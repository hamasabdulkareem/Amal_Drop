<?php
include 'header.php';
    if(isset($_POST['login']))
    {

        $username = $_POST['username'];
        $password = mysqli_real_escape_string($connect,$_POST['password']);
        $query = "select * from donor where Donor_Name = '$username' and Password = '$password'";
        $result = mysqli_query($connect,$query);
        $count = mysqli_num_rows($result);

        if($count > 0)
        {
            $query = "select * from donor where Donor_Name ='$username' and Password = '$password'";
            $val = mysqli_query($connect,$query);
            $row = mysqli_fetch_assoc($result);
            $show = $row['Donor_ID'];
            $_SESSION['Donor_ID']= $show;
            $v = $_SESSION['Donor_ID'];
           $go = "<meta http-equiv='refresh' content='3;url=show_dataOfDonor.php?lang=en'>";
           echo $go;
        }
        else
        {  ?>
        <script>alert("<?php echo $lang['massage']; ?>");
        window.location="login.php";
         </script>
    <?php
        }
    }

?>