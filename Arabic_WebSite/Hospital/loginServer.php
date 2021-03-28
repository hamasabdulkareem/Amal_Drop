<?php
include 'header.php';
    if(isset($_POST['login']))
    {

        $Hospital_Name = $_POST['Hospital_Name'];
        $password = mysqli_real_escape_string($connect,$_POST['password']);
        $query = "select * from hospital where Hospital_Name = '$Hospital_Name' and Password = '$password'";
        $result = mysqli_query($connect,$query);
        $count = mysqli_num_rows($result);

        if($count > 0)
        {
            $query = "select ID from hospital where Hospital_Name ='$Hospital_Name'";
            $val = mysqli_query($connect,$query);
            $row = mysqli_fetch_assoc($result);
            $show = $row['Hospital_ID'];
            $_SESSION['Hospital_ID']= $show;
            $v = $_SESSION['Hospital_ID'];
           $go = "<meta http-equiv='refresh' content='3;url=requsetOfDonor.php'>";
           echo $go;
        }
        else
        {  ?>
        <script>alert("this Hospital_Name or password is not true");
        window.location="login.php";
         </script>
    <?php
        }
    }

?>