		<div class='row'>
			<h1>你目前的物品...</h1>
			<div class='col-md-12'>
			
			<table class="table table-striped">
				<thead>
					<tr>
						<th>物品標題</th>
						<th>售價</th>
						<th>物品選項</th>
					</tr>
				</thead>

				<tbody>
				<?php foreach ($products as $product) { ?>
					<tr>
						<td><a href="<?php echo base_url(). 'shop/'. $product -> username. '/'. $product -> product_id ; ?>"><?php echo $product -> product_title; ?></a></td>
						<td><?php echo $product -> product_price; ?></td>
						<td><a href="#">編輯</a> / <a href="#">停用</a></td>
					</tr>
				<?php } ?>
				</tbody>
			
			</table>

			<?php 

			//p.product_id, u.username, p.product_title, p.product_price, i.meta_value

			foreach ($products as $product) {
				echo $product -> product_id . '<br/>';
				echo $product -> username . '<br/>';
				echo $product -> product_price . '<br/>';
				echo $product -> img_src . '<br/>';

				
			}
			?>

			</div>
			
		</div>
