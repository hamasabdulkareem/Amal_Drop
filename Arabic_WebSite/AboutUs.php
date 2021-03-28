<?php
 include "config.php";
?>
<html lang="en">
	<head>
		<title>Amal_Drop</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main_ar.css" />
	</head>
	<body class="subpage">

		<!-- Header -->
			<header id="header">

				<a href="#menu"><?php echo $lang['Menu']?></a>
			</header>

		<!-- Nav -->
			<nav id="menu">
				<ul class="links">
					<li><a href="index.php?lang=ar"><?php echo $lang['home']?></a></li>
                    <li><a href="AboutUs.php?lang=ar"><?php echo $lang['AboutUs']?></a></li>
                    <li><a href="Donor/signupDonor.php?lang=ar"><?php echo $lang['signup']?></a></li>
					<li><a href="login.php?lang=ar"><?php echo $lang['login']?></a></li>
				</ul>
			</nav>


 		<!-- One -->

			<section id="One" class="wrapper style3">
				<div class="inner">
					<header class="align-center">

						<h2><?php echo $lang['AboutUs']?></h2>
					</header>
				</div>
			</section>
			<section id="one" class="wrapper style2">
				<div class="inner">
					<div class="grid-style">

						<div>
							<div class="box">
								<div class="image fit">
									<img src="images/pic03.jpg" alt="" />
								</div>
								<div class="content">
									<header class="align-center">
                                    <h2><?php echo $lang['AmalDrop']?></h2>
										<p style="font-size: large"> </p>
									</header>
                                    <br>
                                    <p ><?php echo $lang['Amal_drop']?> </p>
								</div>
							</div>
						</div>

						<div>
							<div class="box" style="height: 570px">
								<div class="image fit">
									<img src="images/pic02.jpg" alt="" />
								</div>
								<div class="content">
                                	<header class="align-center">
                                        <h2><?php echo $lang['BeWithUs']?> </h2>
										<p class="text-center title section-title-c"> </p>

                                    </header>
                                    <br>
                                    <p><?php echo $lang['Be_with_us']?>  </p>
									<footer class="align-center">
										<a href="#" class="button alt"> <?php echo $lang['Register_here']?></a>
									</footer>
								</div>
							</div>
						</div>



					</div>
				</div>
			</section>

		<!-- Two -->
			<section id="two" class="wrapper style3">
				<div class="inner">
					<header class="align-center">
						<p><?php echo $lang['phrase']?></p>
						<h2><?php echo $lang['logo']?></h2>
					</header>
				</div>
			</section>

		<!-- Three -->
			<section id="three" class="wrapper style2">
				<div class="inner">
					<header class="align-center">
						<p class="special"><?php echo $lang['phrase']?></p>
						<h2><?php echo $lang['logo']?></h2>
					</header>
					<div class="gallery">
						<div>
							<div class="image fit">
								<a href="#"><img src="images/pic01.jpg" alt="" /></a>
							</div>
						</div>
						<div>
							<div class="image fit">
								<a href="#"><img src="images/pic05.jpg" alt="" style="height: 262px"/></a>
							</div>
						</div>
				 <!--		<div>
							<div class="image fit">
								<a href="#"><img src="images/pic06.jpg" alt="" /></a>
							</div>
						</div>
						<div>
							<div class="image fit">
								<a href="#"><img src="images/pic04.jpg" alt="" /></a>
							</div>
						</div>  -->
					</div>
				</div>
			</section>

		<!-- Footer -->
			<footer id="footer">
				<div class="container">
					<ul class="icons">
						<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
						<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
						<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
						<li><a href="#" class="icon fa-envelope-o"><span class="label">Email</span></a></li>
					</ul>
				</div>
			 <!--	<div class="copyright" style="margin-right: 10px;">
					 . Hamas Alrwhani &copy;
				</div> -->
			</footer>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>