<?php
	// show one product
	if (empty($data[0])) {
		header("HTTP/1.0 404 Not Found");
		echo "404 not found!";
		die();
	}

	$product = $data[0];
?>

<!DOCTYPE html>
<html lang="zh-Hant-HK">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title>Bootstrap 101 Template</title>

		<!-- Bootstrap -->
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">


		<style>
		* {
			font-family: 'Open Sans', sans-serif;
		}

		p.cover_picture {
			text-align: center;
		}

		p.cover_picture img {
			width: 100%;
			max-width: 400px;
		}
		</style>
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>

	<body>
		<div class="container">
			<div class="breadcrumb_section">
				<ol class="breadcrumb">
					<li><a href="#">Home</a></li>
					<li><a href="#"><?php echo $product -> shop_owner; ?></a></li>
					<li class="active"><?php echo $product -> product_title; ?></li>
				</ol>
			</div>

			<h1 class="item_title"><?php echo $product -> product_title; ?></h1>	

			<div class="product_section">
				<div class="row">
					<div class="col-md-6">
						<p class="cover_picture"><img src="<?php base_url(); ?>/img/ring.png" /></p>
						<p>img:  <?php echo $product -> cover_pic; ?></p>
						<p>img:  <?php echo $product -> cover_pic; ?></p>

						<?php foreach ($images as $image) { ?>
						<?php } ?>

					</div>
					<div class="col-md-6">
						<p><span style="color: #3FCA36;"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> 尚有存貨</span></p>
						<p>category:  <?php echo $product -> cat_name; ?></p>
						<p>owner:  <?php echo $product -> shop_owner; ?></p>
						<p>Description: <?php echo $product -> product_description; ?></p>
						<p>交收方式: 面交/可郵寄</p>
						<p>分享至社交媒體:<br/>fb, tw, sina, pin</p>
					</div>
				</div>
			</div>
			
			<div class="chat_section">
				<h2>查詢及回應</h2>
				<p>Hi</p>
			</div>


			<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
		</div>


		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	</body>
</html>