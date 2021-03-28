<!DOCTYPE html>
<?php
 include "config.php";
    if(isset($_POST['login']))
    {

        $rad_login = $_POST['rad_login'];
        if($rad_login == "User")
        {
            header("location: Donor/login.php?lang=en");
        }
        elseif($rad_login == "BloodBank")
        {
            header("location: BloodBank/login.php?lang=en");
        }
        elseif($rad_login == "Hospital")
        {
            header("location: Hospital/login.php?lang=en");
        }
        elseif($rad_login == "Admin")
        {
            header("location: admin/login.php?lang=en");
        }
        else
        {  ?>
        <script>alert("this Hospital_Name or password is not true");
        window.location="login.php?lang=en";
         </script>
    <?php
        }
    }
    ?>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Sign Up Form with live validation</title>
      <link rel="stylesheet" href="assets/css/style_login.css">


</head>
<body>
<form action="login.php" method="post">
  <h2>LogIn</h2>
		<p>
			<input type="radio" name="rad_login" value="User" checked>
            <label for="User" class="floatLabel"><?php echo $lang['User']?></label>

		</p>
		<p>
            <input type="radio" name="rad_login" value="BloodBank" checked>
            <label for="BloodBank" class="floatLabel"><?php echo $lang['BloodBank']?></label>
		</p>
		<p>
            <input type="radio" name="rad_login" value="Hospital" checked>
            <label for="Hospital" class="floatLabel"><?php echo $lang['Hospital']?></label>
        </p>
		<p>
            <input type="radio" name="rad_login" value="Admin" checked>
            <label for="Admin" class="floatLabel"><?php echo $lang['Admin']?></label>
		</p>
		<p>
            <input type="submit" name="login" value="<?php echo $lang['login']?>" class="link">
		</p>
	</form>
</body>
</html>
