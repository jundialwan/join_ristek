<!DOCTYPE Html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Open Recruitment SIG Junior Member &amp; Supporting Division Staff Ristek Fasilkom UI dibuka 26 Januari 2016 pkl 19.00. Silakan login dengan akun SSO Anda untuk melanjutkan.">
		<meta name="author" content="Ristek Fasilkom UI">
		<meta name="msapplication-TileColor" content="transparent"/>
		<meta name="msapplication-square150x150logo" content="http://ristek.cs.ui.ac.id/img/logo-blue.png"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<title><?= $title; ?> - Ristek Fasilkom UI</title>
		
		<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css" media="none" onload="if(media!='all')media='all'">
		<link rel="stylesheet" href="<?= base_url().'assets/css/bootstrap.min.css' ?>" media="none" onload="if(media!='all')media='all'">		
		<link rel="stylesheet" href="<?= base_url().'assets/css/main.css' ?>" media="none" onload="if(media!='all')media='all'">
		<noscript>
			<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
			<link rel="stylesheet" href="<?= base_url().'assets/css/bootstrap.min.css' ?>">		
			<link rel="stylesheet" href="<?= base_url().'assets/css/main.css' ?>">
		</noscript>		
		<link rel="shortcut icon" type="image/x-icon" href="<?= base_url().'assets/img/favicon.ico' ?>">		
	</head>
	<body>
		<header>			
			<img class="img" src="http://ristek.cs.ui.ac.id/img/logo-blue.png" alt="logo-ristek" width="30" height="40">
			<span class="head-font page-title"><b><?= $title; ?></b></span>
			<a class="btn btn-danger well-sm pull-right" href="<?= site_url('logout') ?>">Logout</a>							
			<p class="pull-right">&nbsp;&nbsp;</p>																		
		</header>
		
		<div class="container">			
			<?= $content; ?>
		</div>			

		<script type="text/javascript" src="<?= base_url().'assets/js/jquery.min.js' ?>"></script>		
		<script type="text/javascript" src="<?= base_url().'assets/js/bootstrap.min.js' ?>"></script>
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

			ga('create', 'UA-72851467-1', 'auto');
			ga('send', 'pageview');
		</script>		
	</body>	
	
</html>