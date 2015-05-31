		<?php 
		$dataset_index = 0;
		foreach($dataset as $key => $value) {
			// | term_name | username | product_title | product_description 
		    // | product_price | feature_picture | product_timestamp  |

		    $data[$dataset_index]['term_name'] = $value -> term_name;
		    $data[$dataset_index]['username'] = $value -> username;
		    $data[$dataset_index]['product_title'] = $value -> product_title;
		    $data[$dataset_index]['product_description'] = $value -> product_description;
		    $data[$dataset_index]['feature_picture'] = base_url().'img/'.$value -> feature_picture;
		    $data[$dataset_index]['product_timestamp'] = $value -> product_timestamp;

		    $dataset_index += 1;

		}; ?>
		<p>分類: ddd</p>
		<div class="row">
		 	<div class="col-md-8">
		 		<div class="row">
		 			<?php for ($i = 0; $i < 16; $i++) { ?>
		 			<div class="col-md-4">
						<div class="thumbnail">
							<img src="<?php echo $data[0]['feature_picture']; ?>" alt="...">
							<div class="caption">
								<h3><?php echo $data[0]['product_title']; ?></h3>
								<p>由 <?php echo $data[0]['username']; ?> 提供</p>
								<p><?php echo $data[0]['product_description']; ?></p>
							</div>
						</div>
		 			</div>
		 			<?php } ?>
		 		</div>
		 	</div>
		 	
		 	<div class="col-md-4"></div>

		</div>