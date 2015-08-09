<?php
	$product = $data[0];
?>
		<div class="container">
			<div class="breadcrumb_section">
				<ol class="breadcrumb">
					<li><a href="#">Sortping</a></li>
					<li>會員 <a href="<?php echo base_url().'shop/'.$product -> username; ?>"><?php echo $product -> username; ?></a> 的店舖</li>
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
							if ($product -> product_usestatus == 'new') $good_status = '全新';
							elseif ($product -> product_usestatus == 'old') $good_status = '舊品';
							?>
							<?php if ($product -> product_status == 'active') { ?>
							<span style="color: #3FCA36; padding-right: 6px; border-right: 1px solid #ddd; margin-right: 6px;"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> 開放發售中</span>
							<?php } elseif ($product -> product_status == 'deactive') { ?>
							<span style="color: #ca9f6c; padding-right: 6px; border-right: 1px solid #ddd; margin-right: 6px;"><span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span> 物品發售已暫停</span>
							<?php } elseif ($product -> product_status == 'sold') { ?>
							<span style="color: #ca4e5a; padding-right: 6px; border-right: 1px solid #ddd; margin-right: 6px;"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> 已下架</span>
							<?php } else { ?>
							<span style="color: #ddd; padding-right: 6px; border-right: 1px solid #ddd; margin-right: 6px;"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> DEL</span>
							<?php } ?>
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
							<p>目前刊登物品: <a href="">10 件</a></p>
							<p>可靠度: <span style="color: #3FCA36;">高</span></p>
						</div>
					</div>

					<div class="col-md-9">
						<div class="chat_section">
							<h2>查詢及回應</h2>
							<p class="bg-danger" style="padding: 10px">注意: 請勿在此張貼個人資料, 如電郵及電話號碼, 請使用 "聯絡買家" 功能交換個人資料</p>
							<div>
								<?php 
								if (count($comments) > 0) {
								foreach ($comments as $comment_item) { ?>
								<div class="media">
									<div class="media-left">
										<a href="#">
										<img class="media-object" src="https://scontent-hkg3-1.xx.fbcdn.net/hphotos-xat1/v/t1.0-9/11329952_10206809169285841_6378214152956145780_n.jpg?oh=d3f669fd4dfb4b5b537c42e6c1953d67&oe=55C4373E" alt="..." style="width: 64px; height:64px;">
										</a>
									</div>
									<div class="media-body">
										<h4 class="media-heading"><?php echo $comment_item -> username;  ?>:</h4>
										<h4><?php echo $comment_item -> comment_title; ?></h4>
										<p><?php echo $comment_item -> comment_content; ?></p>

									</div>
								</div>

								<?php }
								} else { ?>
								<p>暫時未有發問及回覆，要發問嗎？</p>
								<?php } ?>

								<div class="comment_box">
									<h4>查詢賣家</h4>
									<?php if (!isset($_SESSION['user_id'])) { ?>
									<p>請<a href="<?php echo site_url('user/login'); ?>">登入</a>再繼續, 沒有帳戶？請<a href="#">註冊帳戶</a></p>
									<?php } else { ?>
									<form action="<?php echo site_url('comment/process'); ?>" method="POST">
										<p>詢問內容</p>
										<textarea type="text" name="comment" id="description" class="form-control" row="5" placeholder="對物品有提問？在此輸入詢問的內容！"></textarea>
										<br/>
										<input type="hidden" name="product" value="<?php echo $product_id; ?>">
										<input type="hidden" name="redirect" value="<?php echo $this->uri->uri_string(); ?>">
										<input class="btn btn-success" type="submit" value="回覆">
									</form>
									<?php } ?>

								</div>

							</div>
						</div>
					</div>

				</div>
				
			</div>
			<div class="relative_section">
				<h2>其他相似的物品</h2>
				<div class="row">
				<?php foreach ($related as $item) { ?>
					<div class="col-md-3">
					<p><img src="<?php base_url(); ?>/img/<?php echo $item -> img_url; ?>" /></p>
					<p><a href="<?php base_url(); ?>/shop/<?php echo $item -> username; ?>/<?php echo $item -> product_id; ?>"><?php echo $item -> product_title; ?></a></p>
					<p><?php echo $item -> username; ?></p>
					</div>
				<?php } ?>					
				</div>
				<p><a href=""><span><?php //echo $product -> shop_owner; ?></span></a></p>
			</div>
		</div>
