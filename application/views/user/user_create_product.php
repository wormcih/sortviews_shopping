		<div class='row'>
			<h1>Add product --- User</h1>
			<div class='col-md-12'>
				<form action="<?php echo base_url(); ?>manage/add_shop/process" method="POST">
				
					<p>發售物品名稱:</p>
					<input type="text" name="product_title" id="product_title" />
					<br />

					<p>發售物品分類</p>
					<select class="product_category">
					<?php foreach ($category as $index) { ?>
						<option value="<?php echo $index['slug']; ?>"><?php echo $index["name"]; ?></option>
					<?php } ?>
					</select>
					<br />

					<p>發售物品描述:</p>
					<textarea type="text" name="product_description" id="description" row="5"></textarea>
					<br />

					<p>發售物品售價:</p>
					<span>$</span><input type="number" name="product_price" class="form-control" placeholder="Amount" />
					<br />

					<p>發售物品相片</p>
					<input type="file" name="userfile" id="userfile">
					<div class="photo_sel"></div>
					<br />


					<p>交收方式</p>
					<label>
					<input type="checkbox" name="payment_way[]" value="payment_face">
					可以面交
					</label>

					<label>
					<input type="checkbox" name="payment_way[]" value="payment_mail">
					可以郵寄交收
					</label>

					<label>
					<input type="checkbox" name="payment_way[]" value="payment_paypal">
					可使用 PayPal
					</label>

					<input type="submit" value="新增">

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
