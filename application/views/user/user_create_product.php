		<div class='row'>
			<h1>Add product --- User</h1>
			<div class='col-md-12'>
				<form action="<?php echo base_url(); ?>manage/add_shop/process" method="POST">
					<p>Product title:</p>
					<input type="text" name="product_title" id="product_title" />
					<br />

					<p>Product description:</p>
					<textarea type="text" name="product_description" id="description" row="5"></textarea>
					<br />

					<p>Price:</p>
					<span>$</span>
					<input type="search" name="product_price" class="form-control" placeholder="Amount" />
					<br />

					<p>Product status:</p>
					<span>$</span>
					<input type="search" name="product_status" class="form-control" placeholder="Amount" />
					<br />

					<p>Product photos</p>
					<input type="file" name="userfile" id="userfile">
					<br />

					<input type="submit" value="upload">

				</form>

			</div>
			
		</div>



<!---
CREATE TABLE s_product (
	product_id INT AUTO_INCREMENT,
	user_id INT NOT NULL,
	product_title VARCHAR(255) NOT NULL,
	product_description MEDIUMTEXT,
	product_price NUMERIC(10, 1) NOT NULL,
	product_timestamp TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	product_status ENUM ('active', 'end', 'removed') DEFAULT 'active',
