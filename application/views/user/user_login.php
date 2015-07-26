		<div class='row'>
			<h1>Add product --- User</h1>
			<div class='col-md-12'>
			<?php if (!isset($_SESSION['user_id'])) { ?>
				<form action="<?php echo base_url(); ?>user/login/process" method="POST">
				
					<p>登入名稱:</p>
					<input type="text" name="login_name" id="login_name" />
					<br />

					<input type="submit" value="登入">

				</form>

			<?php } else { ?>

				<form action="<?php echo base_url(); ?>manage/add_shop/process" method="POST">
				
					<p>已登入為:</p>

					<input type="submit" value="登出">

				</form>			

			<?php } ?>

			</div>
			
		</div>
