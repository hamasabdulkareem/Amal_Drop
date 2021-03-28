<?php
include "../config.php";
include '../connect.php'; ?>
<html>
    <head>
<!--	<title>Hielo by TEMPLATED</title>  -->
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="../assets/css/main.css" />
        <link rel="stylesheet" href="../assets/css/style.css">
    </head>
    <body style="background-color: #E7B3AB;">
		<!-- Header -->
			<header id="header">
			  <!--	<div class="logo"><a href="index.html">Hielo <span>by TEMPLATED</span></a></div> -->
				<a href="#menu"> <?php echo $lang['Menu']?></a>
			</header>

		<!-- Nav -->
			<nav id="menu">
				<ul class="links">
					<li><a href="insertDataOfHospital.php?lang=en"><?php echo $lang['insertDataOfHospital']?></a></li>
                    <li><a href="insertDataOfBloodBank.php?lang=en"><?php echo $lang['insertDataOfBloodBank']?></a></li>
                    <li><a href="showDataOfHospital.php?lang=en"><?php echo $lang['showDataOfHospital']?></a></li>
                    <li><a href="showDataOfBloodBank.php?lang=en"><?php echo $lang['showDataOfBloodBank']?></a></li>
                    <li><a href="../logout.php?lang=en"><?php echo $lang['logout']?></a></li>

				</ul>
			</nav>

       



