<!DOCTYPE html>
<?php
 include "../config.php";
?>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Sign Up Form with live validation</title>
      <link rel="stylesheet" href="../assets/css/style_login_ar.css">
</head>
<body>
<form action="loginServer.php" method="post">
  <h2>Hospital_LogIn</h2>
		<p>
			<label for="Hospital_Name" class="floatLabel"><?php echo $lang['UserName']?></label>
			<input id="Hospital_Name" name="Hospital_Name" type="text">
		</p>
		<p>
			<label for="password" class="floatLabel"><?php echo $lang['Password']?></label>
			<input id="password" name="password" type="password">

		</p>

		<p>
            <input type="submit" name="login" value="<?php echo $lang['login']?>" class="link">
		</p>
	</form>
</body>
</html>
