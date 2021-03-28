<!DOCTYPE HTML>
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
	<body dir="rtl" style="background-color: #E7B3AB;">

		<!-- Header -->
			<header id="header" class="alt">
			   <!-- 	<div ><img src="images/amal_drop.jpg" alt="" /></div>-->
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

		<!-- Banner -->
			<section class="banner full">
				<article>
					<img src="images/slide03.jpg" alt="" />
					<div class="inner">
	                	<!--  <header>
							<p>A free responsive web site template by <a href="https://templated.co">TEMPLATED</a></p>
							<h2>"ومن أحياها"</h2>
						</header> -->
					</div>
				</article>
				<article>
					<img src="images/slide02.jpg" alt="" />
					<div class="inner">
				   <!--		<header>
							<p>Lorem ipsum dolor sit amet nullam feugiat</p>
							<h2>Magna etiam</h2>
						</header> -->
					</div>
				</article>
				<article>
					<img src="images/slide05.jpg"  alt="" />
					<div class="inner">
				   <!--		<header>
							<p>Sed cursus aliuam veroeros lorem ipsum nullam</p>
							<h2>Tempus dolor</h2>
						</header>     -->
					</div>
				</article>
				<article>
					<img src="images/slide04.jpg"  alt="" />
					<div class="inner">
				 <!--		<header>
							<p>Adipiscing lorem ipsum feugiat sed phasellus consequat</p>
							<h2>Etiam feugiat</h2>
						</header>  -->
					</div>
				</article>
				<article>
					<img src="images/slide01.jpg"  alt="" />
					<div class="inner">
					<!--	<header>
							<p>Ipsum dolor sed magna veroeros lorem ipsum</p>
							<h2>Lorem adipiscing</h2>
						</header>  -->
					</div>
				</article>
			</section>



		<!-- Footer -->
			<footer id="footer">
           <div style="margin-right: 20px; margin-bottom: 20px">
                <a href="../index.php?lang=en"><?php echo $lang['lang-en']?></a> |
                <a href="index.php?lang=ar"><?php echo $lang['lang-ar']?></a>
                </div>
				<div class="container">
					<ul class="icons">
						<li ><a href="#" class="icon fa-twitter" ><span class="label">Twitter</span></a></li>
						<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
						<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
						<li><a href="#" class="icon fa-envelope-o" style="margin-right: 20px;"><span class="label">Email</span></a></li>
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