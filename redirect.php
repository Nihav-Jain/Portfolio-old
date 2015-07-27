<?php
	include('php/sqlconnect.php');
	$url = $_SERVER['REQUEST_URI'];
	
        //echo print_r($_GET);
	$aliases = explode("/", $url);
	//print_r($aliases);
	$id = 0;
	$title = "Nihav Jain";
	for($i=1;$i<count($aliases);$i++)
	{
		if(strlen($aliases[$i]) == 0)
			break;
		$aliases[$i] = mysql_real_escape_string($aliases[$i]);
		$query = "SELECT id, parent_id, menu_name FROM nihav_menu WHERE menu_alias='".$aliases[$i]."' ORDER BY id ASC";
		$result = mysql_query($query) or die(mysql_error());
		$row = mysql_fetch_array($result, MYSQL_ASSOC);
		if($row)
		{
				if(intval($id) == intval($row['parent_id']))
				{
					$id = $row['id'];
					$title = $row['menu_name']." | Nihav Jain";
				}
				else
				{
					header("location: http://nihavjain.info/404.html");
					//include("location: http://nihavjain.info/404.html");
					//die();
				}
		}
		else
		{	
			header("location: http://nihavjain.info/404.html");
			//		include("location: http://nihavjain.info/404.html");
			//		die();
		}
	}
?>
<!DOCTYPE HTML>
<!--
	Prologue 1.2 by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
	Customized for personal use by Nihav Jain
-->
<html>
	<head>
<base href="http://nihavjain.info/old/">
		<title><?php echo $title; ?></title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="Nihav Jain, Msc.(Tech.) Information Systems, BITS Pilani, Game Developer, Flash Professional" />
		<meta name="keywords" content="nihav, jain, bits pilani, birla institute of technology and science, game developer, mobile-app developer, android, iOS, windows phone, flash professional" />
		<meta name="author" content="Nihav Jain" />

		<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="http://nihavjain.info/css/icons.css">
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
		<script src="http://nihavjain.info/js/jquery.min.js"></script>
		<script src="http://nihavjain.info/js/galleria/galleria-1.4.2.min.js"></script>
		<script src="http://nihavjain.info/js/skel.min.js"></script>
		<script src="http://nihavjain.info/js/skel-panels.min.js"></script>
		<script type="text/javascript" src="http://nihavjain.info/js/main.js"></script>
		<script src="http://nihavjain.info/js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="http://nihavjain.info/css/skel-noscript.css" />
			<link rel="stylesheet" href="http://nihavjain.info/css/style.css" />
			<link rel="stylesheet" href="http://nihavjain.info/css/style-wide.css" />
		</noscript>
		<!--[if lte IE 9]><link rel="stylesheet" href="css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie8.css" /><![endif]-->
		<script type="text/javascript">
			window.onload = getMenuTree(<?php echo $id; ?>);
		</script>
	</head>
	<body>

		<!-- Header -->
			<div id="header" class="skel-panels-fixed">

				<div class="top">

					<!-- Logo -->
						<div id="logo">
							<span class="image"><img src="nihav jain profile.jpg" /></span>
							<h1 id="title">Nihav Jain</h1>
							<span class="byline">BITS Pilani</span>
						</div>

					<!-- Nav -->
						<nav id="nav" data-parent="0">
							<!--
							
								Prologues nav expects links in one of two formats:
								
								1. Hash link (scrolls to a different section within the page)
								
								   <li><a href="#foobar" id="foobar-link" class="skel-panels-ignoreHref"><span class="fa fa-whatever-icon-you-want">Foobar</span></a></li>

								2. Standard link (sends the user to another page/site)

								   <li><a href="http://foobar.tld"><span class="fa fa-whatever-icon-you-want">Foobar</span></a></li>
							
							sample:
							<ul>
								<li><a href="#top" id="top-link" class="skel-panels-ignoreHref"><span class="fa fa-home">Intro</span></a></li>
								<li><a href="#portfolio" id="portfolio-link" class="skel-panels-ignoreHref"><span class="fa fa-th">Portfolio</span></a></li>
								<li><a href="#about" id="about-link" class="skel-panels-ignoreHref"><span class="fa fa-user">About Me</span></a></li>
								<li><a href="#contact" id="contact-link" class="skel-panels-ignoreHref"><span class="fa fa-envelope">Contact</span></a></li>
							</ul>
						-->
						</nav>
						
				</div>
				<!--
				<div class="bottom">

						<ul class="icons">
							<li><a href="https://twitter.com/nihavjain" target="_blank" class="fa fa-twitter solo"><span>Twitter</span></a></li>
							<li><a href="https://www.facebook.com/nihav.jain" target="_blank" class="fa fa-facebook solo"><span>Facebook</span></a></li>
							<li><a href="#" class="fa fa-github solo"><span>Github</span></a></li>
							<li><a href="#" class="fa fa-dribbble solo"><span>Dribbble</span></a></li>
							<li><a href="#" class="fa fa-envelope solo"><span>Email</span></a></li>
						</ul>
				
				</div>
				-->			
			</div>

		<!-- Main -->
			<div id="main">
				<!-- Intro -->
					<section id="top" class="one">
						<div class="container">
								Nihav Jain <span>| BITS Pilani |</span>
								<a href="https://plus.google.com/+NihavJain" target="_blank" class="icon icon-googleplus"></a><a href="http://in.linkedin.com/in/nihavjain" target="_blank" class="icon icon-linkedin"></a><a href="https://www.youtube.com/channel/UCcyjDhimmxXyJ5lUQrPeO5g/videos" target="_blank" class="icon icon-youtube"></a><a href="https://github.com/Nihav-Jain" target="_blank" class="icon icon-github"></a>
								<!-- <a href="https://www.facebook.com/nihav.jain" target="_blank" class="icon icon-facebook"></a> <a href="https://twitter.com/nihavjain" target="_blank" class="icon icon-twitter"></a> -->
						</div>
					</section>
					<section id="loader" class="two"><img src="loader.gif" id="loadergif"/></section>			
					<section id="content" class="two">
					</section>		
			</div>

		<!-- Footer 
			<div id="footer">
				-->
				<!-- Copyright

					<div class="copyright">
						<p>&copy; 2014 Nihav Jain. All rights reserved.</p>
						<ul class="menu">
							<li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
						</ul>
					</div>
				
			</div>
				-->
				<script>
					  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
					  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
					  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
					  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
					
					  ga('create', 'UA-54514504-1', 'auto');
					  ga('send', 'pageview');
					
				</script>
				
	</body>
</html>