		<div class='row'>
			<h1>物品分類</h1>
			<div class='col-md-12'>
				<?php foreach ($categories as $category) {
					foreach ($category as $key => $value) {
						echo $key . ' ' . $value;
						echo '<br/>';
					}
					echo '<br/>';
					
				} ?>
			</div>
			
		</div>
