<!DOCTYPE html>
<?php
 include "../config.php";
?>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Sign Up Form with live validation</title>
      <link rel="stylesheet" href="../assets/css/style_login.css">
</head>
<body>
<form action="loginServer.php" method="post">
  <h2>Admin_LogIn</h2>
		<p>
			<label for="Admin_Name" class="floatLabel"><?php echo $lang['UserName']?></label>
			<input id="Admin_Name" name="Admin_Name" type="text">
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
