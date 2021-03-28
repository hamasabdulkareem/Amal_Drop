<?php
include 'header.php';
    if(isset($_POST['login']))
    {

        $Admin_Name = $_POST['Admin_Name'];
        $password = mysqli_real_escape_string($connect,$_POST['password']);
        $query = "select * from admin where Admin_name = '$Admin_Name' and Password = '$password'";
        $result = mysqli_query($connect,$query);
        $count = mysqli_num_rows($result);

        if($count > 0)
        {
            $query = "select ID from admin where Admin_name ='$Admin_Name'";
            $val = mysqli_query($connect,$query);
            $_SESSION['Admin_Name']= $Admin_Name;
            $v = $_SESSION['Admin_Name'];
            $go = "<meta http-equiv='refresh' content='3;url=insertDataOfHospital.php?lang=en'>";
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