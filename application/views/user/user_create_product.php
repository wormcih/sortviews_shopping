		<div class='row'>
			<div class='col-md-12'>
				<form>
					<p>Product title:</p>
					<input type="text" name="title" id="title" />
					<br />

					<p>Product description:</p>
					<textarea type="text" name="description" id="description" row="5"></textarea>
					<br />

					<p>Price:</p>
					<span>$</span>
					<input type="search" class="form-control" placeholder="Amount" />
					<br />

					<p>Product status:</p>
					<span>$</span>
					<input type="search" class="form-control" placeholder="Amount" />
					<br />

					<p>Product photos</p>
					<input type="file" name="fileToUpload" id="fileToUpload">
					<br />


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
