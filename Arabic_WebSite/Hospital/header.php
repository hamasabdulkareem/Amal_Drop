<?php
include "../config.php";
include '../connect.php'; ?>
<html>
    <head>
<!--	<title>Hielo by TEMPLATED</title>  -->
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="../assets/css/main_ar.css" />
        <link rel="stylesheet" href="../assets/css/style_ar.css" />

    </head>
    <body style="background-color: #E7B3AB;">
		<!-- Header -->
			<header id="header">
			  <!--	<div class="logo"><a href="index.html">Hielo <span>by TEMPLATED</span></a></div>-->
				<a href="#menu"> <?php echo $lang['Menu']?></a>
			</header>

		<!-- Nav -->
			<nav id="menu">
				<ul class="links">
					<li><a href="requsetOfDonor.php?lang=ar"><?php echo $lang['requset_Donor']?></a></li>
				 <!--	<li><a href="situations.php?lang=en">situations</a></li> -->
                    <li><a href="situation.php?lang=ar"><?php echo $lang['situations']?></a></li>
                    <li><a href="../logout.php?lang=ar"><?php echo $lang['logout']?></a></li>
				</ul>
			</nav>

        </header>



