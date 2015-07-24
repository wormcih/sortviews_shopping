<!DOCTYPE html>
<html lang="zh-Hant-HK">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title>Bootstrap 101 Template</title>

		<!-- Bootstrap -->
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet"/>
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400' rel='stylesheet' type='text/css'/>
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"/>

		<!-- JQuery -->
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>


		<!-- fancyBox -->
		<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css">
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
		
		<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/helpers/jquery.fancybox-buttons.css" type="text/css" media="screen" />
		<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/helpers/jquery.fancybox-buttons.js"></script>

		<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/helpers/jquery.fancybox-thumbs.css" type="text/css" media="screen" />
		<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/helpers/jquery.fancybox-thumbs.js"></script>
		


		<script src="<?php echo base_url(); ?>js/script.js"></script>
		<link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet"/>

		<script type="text/javascript">
			$(document).ready(function() {
				$(".fancybox").fancybox({

					prevEffect		: 'none',
					nextEffect		: 'none',
					closeBtn		: false,
					helpers		: {
						title	: { type : 'inside' }
					}

				});
			});
		</script>
	</head>

	<body>
	<?php echo base_url(); ?>
		<div class="header">
			<div class="header_logo"><img src="<?php echo base_url(); ?>img/meta/logo.png" /></div>
		
			<div class="container">
				<div class="header_nav">
					<ul>
						<li><a href="">物品分類</a></li>
						<li><a href="">放售物品</a></li>
					</ul>
				</div>
			</div>
		</div>
			
		<div class="container">