<?php
	$product = $data[0];
?>
		<?php echo $uuid; ?>
		<div class="container">
			<div class="breadcrumb_section">
				<ol class="breadcrumb">
					<li><a href="#">Sortping</a></li>
					<li>會員 <a href="#"><?php echo $product -> username; ?></a> 的店舖</li>
					<li class="active"><?php echo $product -> product_title; ?></li>
				</ol>
			</div>

			<h1 class="item_title"><?php echo $product -> product_title; ?></h1>

			<div class="product_section">
				<div class="row">
					<div class="col-md-6">
						<p class="cover_picture" style="border: 1px solid #ddd;">
							<a class="fancybox" rel="group" href="<?php base_url(); ?>/img/<?php echo $product -> feature_picture; ?>" title="cold forest (picturesbywalther)">
								<img src="<?php base_url(); ?>/img/<?php echo $product -> feature_picture; ?>" alt="" />
							</a>
						</p>
						<div class="row">
							<?php 
								$pic_maxcount = 4; $pic_index = 0;
								foreach ($images as $img) {
									if ($pic_index == $pic_maxcount) return;
									$img_url = base_url().'img/'.$img -> img_src;
							?>
							<div class="col-md-3">
								<a class="fancybox" rel="group" href="<?php echo $img_url; ?>" title="cold forest (picturesbywalther)">
									<img src="<?php echo $img_url; ?>" style="width: 100%" />
								</a>
							</div>
							<?php $pic_index += 1; } ?>
						</div>
						<p><a href="#">觀看更多圖片</a></p>

					</div>
					<div class="col-md-6">
						<p>
							<?php 
								$category_list = '';
								if (isset($taxonomy['category'])) {
									foreach ($taxonomy['category'] as $index => $val) {
										$category_list = $category_list.'<a href="'.$val['slug'].'">'.
										'<span class="label label-primary">'.$val['name'].'</span></a> ';
					
									}
								}
							?>
							<span><?php echo $category_list; ?></span>&nbsp;
							<span><a href="#"><i class="fa fa-heart"></i> 收藏</a></span>
						</p>
				
						<p>
							<?php 
							$good_status = '未知';
							if (isset($meta['good_status'])){
							if ($meta['good_status'] == 'new') $good_status = '全新';
							else $good_status = '中古品';
							}
							?>
							<span style="color: #3FCA36; padding-right: 6px; border-right: 1px solid #ddd; margin-right: 6px;"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> 開放發售中</span>
							<span>貨品狀況: <?php echo $good_status; ?></span>
						</p>
						
						<p>
							<span style="font-size: 24px; font-weight: bold; color: #222;">$<?php echo $product -> product_price; ?></span>
							<a class="btn btn-default" type="button" style="margin-top: -10px; margin-left: 6px;">聯絡買家</a>
						</p>

						<p><i class="fa fa-user"></i> 由會員 <a href="<?php echo base_url().'shop/'.$product -> username; ?>"><?php echo $product -> username; ?></a> 提供</p>


						<p style="margin: 5px 0; padding: 5px 0; border-bottom: 1px dashed #ddd;"></p>

						<p style="font-weight: bold; font-size: 16px">貨品簡介</p>
						<p><?php echo $product -> product_description; ?></p>
						<p>交收方式: 
							<span style="color: #3699CA; padding: 4px; border: 1px solid #ddd; margin-right: 6px;"><span class="glyphicon glyphicon-<?php if ($meta['payment_face'] == 1){ ?>ok<?php } else { ?>remove<?php };?>" aria-hidden="true"></span> 面交</span>
							<span style="color: #3699CA; padding: 4px; border: 1px solid #ddd; margin-right: 6px;"><span class="glyphicon glyphicon-<?php if ($meta['payment_mail'] == 1){ ?>ok<?php } else { ?>remove<?php };?>" aria-hidden="true"></span> 郵寄</span>
							<span style="color: #3699CA; padding: 4px; border: 1px solid #ddd; margin-right: 6px;"><span class="glyphicon glyphicon-<?php if ($meta['payment_paypal'] == 1){ ?>ok<?php } else { ?>remove<?php };?>" aria-hidden="true"></span> 網上轉賬 (paypal)</span>	
						</p>
						
						<p style="font-weight: bold; font-size: 16px">分享至社交媒體:</p>
						<p>
							<?php 
							$facebook_share = 'https://www.facebook.com/sharer/sharer.php?u='.current_url();
							$twitter_share = 'https://twitter.com/share?url='.current_url().'&text=By_sortview' ?>
							<a href="<?php echo $facebook_share; ?>"><i class="fa fa-facebook-square" style="font-size: 36px; color: #3b5998;"></i></a>
							<a href="<?php echo $twitter_share; ?>"><i class="fa fa-twitter-square" style="font-size: 36px; color: #00aced;"></i></a>
							<a href="#"><i class="fa fa-pinterest-square" style="font-size: 36px; color: #cb2027;"></i></a>
							<a href="#"><i class="fa fa-google-plus-square" style="font-size: 36px; color: #dd4b39;"></i></a>
						</p>
						<?php 
						$tag_list = '';
						if (isset($taxonomy['tag'])) {
							
							foreach ($taxonomy['tag'] as $index => $val) {
								$tag_list = $tag_list.'<a href="'.$val['slug'].'">'.
								'<span class="label label-primary">'.$val['name'].'</span></a> ';
				
							}
						}
						?>
						<p><span class="glyphicon glyphicon-tag" aria-hidden="true"></span> <?php echo $tag_list; ?></p>
					</div>
				</div>
			</div>
			
			<div class="desciption_section">
				<div class="row">

					<div class="col-md-3">
						<div class="shop_section">
							<h2>店舖資訊</h2>
							<p><a href=""><span><?php //echo $product -> shop_owner; ?></span></a></p>
							<p>目前刊登商品: <a href="">10 件</a></p>
							<p>可靠度: <span style="color: #3FCA36;">高</span></p>
						</div>

						<div class="relative_section">
							<h2>其他相關商品</h2>
							<p><a href=""><span><?php //echo $product -> shop_owner; ?></span></a></p>
						</div>
					</div>

					<div class="col-md-9">
						<div class="chat_section">
							<h2>查詢及回應</h2>
							<p class="bg-danger" style="padding: 10px">注意: 請勿在此張貼個人資料, 如電郵及電話號碼, 請使用 "聯絡買家" 功能交換個人資料</p>
							<div>
								<div class="media">
									<div class="media-left">
										<a href="#">
										<img class="media-object" src="https://scontent-hkg3-1.xx.fbcdn.net/hphotos-xat1/v/t1.0-9/11329952_10206809169285841_6378214152956145780_n.jpg?oh=d3f669fd4dfb4b5b537c42e6c1953d67&oe=55C4373E" alt="..." style="width: 64px; height:64px;">
										</a>
									</div>
									<div class="media-body">
										<h4 class="media-heading">耶穌:</h4>
										<p>x你正呀喂!</p>

										<div class="media">
											<div class="media-left">
												<a href="#">
												<img class="media-object" src="https://scontent-hkg3-1.xx.fbcdn.net/hphotos-xft1/v/t1.0-9/18818_10206713094964043_3575656666416845422_n.jpg?oh=92ba440df930908e9db99607b8d43f93&oe=56064D32" alt="..." style="width: 64px; height:64px;">
												</a>
											</div>
											<div class="media-body">
												<h4 class="media-heading"><span class="label label-success">店主</span> 不良貓:</h4>
												<p>55!</p>
											</div>
										</div>

									</div>
								</div>

							</div>

							<p>Hi</p>
						</div>
					</div>

				</div>
				
			</div>
		</div>
