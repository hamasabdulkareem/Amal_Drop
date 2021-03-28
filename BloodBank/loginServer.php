<?php
include 'header.php';
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
            $go = "<meta http-equiv='refresh' content='3;url=search.php?lang=en'>";
           echo $go;
        }
        else
        {  ?>
        <script>alert("<?php echo $lang['massage']; ?>");
        window.location="login.php?lang=en";
         </script>
    <?php
        }
    }

?>
