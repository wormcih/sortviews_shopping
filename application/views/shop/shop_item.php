<?php
	// Move to controller!!!
	// show one product
	if (empty($data[0])) {
		show_404();
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

		<!-- JQuery -->
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

		<!-- fancyBox -->
		<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css">
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
		
		<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/helpers/jquery.fancybox-buttons.css" type="text/css" media="screen" />
		<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/helpers/jquery.fancybox-buttons.js"></script>

		<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/helpers/jquery.fancybox-thumbs.css" type="text/css" media="screen" />
		<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/helpers/jquery.fancybox-thumbs.js"></script>
		
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
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>

	<body>
		<?php echo $uuid; ?>
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
						<p class="cover_picture" style="border: 1px solid #ddd;">
							<a class="fancybox" rel="group" href="<?php base_url(); ?>/img/<?php echo $product -> cover_pic; ?>" title="cold forest (picturesbywalther)">
								<img src="<?php base_url(); ?>/img/<?php echo $product -> cover_pic; ?>" alt="" />
							</a>
						</p>

						<p><a href="#">觀看更多圖片</a></p>
						<?php foreach ($images as $image) { 
							if ($image -> pic_url == $product -> cover_pic) continue;
						?>
						<p>img:  <?php echo $image -> pic_url; ?></p>
						<?php } ?>

					</div>
					<div class="col-md-6">
						<p>
							<span><a href=""><span class="label label-primary"><?php echo $product -> cat_name; ?></span></a></span>&nbsp;
							<span><a href="#"><i class="fa fa-heart"></i> 收藏</a></span>
						</p>
				
						<p>
							<span style="color: #3FCA36; padding-right: 6px; border-right: 1px solid #ddd; margin-right: 6px;"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> 開放發售中</span>
							<span>貨品狀況: 全新</span>
						</p>
						
						<p>
							<span style="font-size: 24px; font-weight: bold; color: #222;">$17,620.00</span> <a href="#">聯絡買家</a>
							<a class="btn btn-default" type="button" style="margin-top: -10px; margin-left: 6px;">交換卡片</a>
						</p>

						<p><i class="fa fa-user"></i> 由商舖 <a href="#"><?php echo $product -> shop_owner; ?></a> 提供</p>


						<p style="margin: 5px 0; padding: 5px 0; border-bottom: 1px dashed #ddd;"></p>

						<p style="font-weight: bold; font-size: 16px">貨品簡介</p>
						<p><?php echo $product -> product_description; ?></p>
						<p>交收方式: 
							<span style="color: #3699CA; padding: 4px; border: 1px solid #ddd; margin-right: 6px;"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> 面交</span>
							<span style="color: #3699CA; padding: 4px; border: 1px solid #ddd; margin-right: 6px;"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> 郵寄</span>
							<span style="color: #3699CA; padding: 4px; border: 1px solid #ddd; margin-right: 6px;"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> 網上轉賬 (paypal)</span>	
						</p>
						
						<p style="font-weight: bold; font-size: 16px">分享至社交媒體:</p>
						<p>
							<a href="#"><i class="fa fa-facebook-square" style="font-size: 36px; color: #3b5998;"></i></a>
							<a href="#"><i class="fa fa-twitter-square" style="font-size: 36px; color: #00aced;"></i></a>
							<a href="#"><i class="fa fa-pinterest-square" style="font-size: 36px; color: #cb2027;"></i></a>
							<a href="#"><i class="fa fa-google-plus-square" style="font-size: 36px; color: #dd4b39;"></i></a>
						</p>
					</div>
				</div>
			</div>
			
			<div class="desciption_section">
				<div class="row">

					<div class="col-md-3">
						<div class="pending">
							買家評價俾分
							限時特價
							小圖預覽
							TAG
							貨品存貨
						</div>

						<div class="shop_section">
							<h2>店舖資訊</h2>
							<p><a href=""><span><?php echo $product -> shop_owner; ?></span></a></p>
							<p>目前刊登商品: <a href="">10 件</a></p>
							<p>可靠度: <span style="color: #3FCA36;">高</span></p>
						</div>

						<div class="relative_section">
							<h2>其他相關商品</h2>
							<p><a href=""><span><?php echo $product -> shop_owner; ?></span></a></p>
						</div>
					</div>

					<div class="col-md-9">
						<div class="chat_section">
							<h2>查詢及回應</h2>
							<div class="row">
								<div class="col-md-6">
								一半
								</div>
								<div class="col-md-6">
								一半
								</div>
							</div>
							<p>Hi</p>
							<p>注意: 請勿在此張貼個人資料, 如電郵及電話號碼, 請使用 "交換卡片" 功能交換個人資料</p>
						</div>
					</div>

				</div>
				
			</div>


			<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
		</div>


		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> -->
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	</body>
</html>