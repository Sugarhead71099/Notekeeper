<form method="POST" id="login-form">

	<div class="card" style="background-color: rgba(183, 183, 183, 0.8);">
		<div class="card-body">

			<div class="form-group">
				<label for="email">Email</label>
				<p class="invalid-description" <?php echo ( isset($_POST['email']) ? ( $_POST['email'] ? 'hidden' : '' ) : 'hidden' ); ?> ><small><small>Email cannot be left blank</small></small></p>
				<input type="email" name="email" id="email" class="form-control" placeholder="johndoe@fakeemail.com" value="" required>
			</div>


			<div class="form-group">
				<label for="password">Password</label>
				<p class="invalid-description" <?php echo ( isset($_POST['password']) ? ( $_POST['password'] ? 'hidden' : '' ) : 'hidden' ); ?> ><small><small>Password cannot be left blank</small></small></p>
				<input type="password" name="password" id="password" class="form-control" placeholder="********" required>
			</div>

			<div class="form-check mb-2 mr-sm-2 mb-sm-0 checkbox">
				<label for="remember_me" class="form-check-label">
				  <input type="checkbox" name="remember_me" class="form-check-input" id="remember_me" checked> Remember me
				</label>

				<label id="password_reset" class="form-chek-label disabled"><a href="javascript:void(0)">Forgot Password</a></label>
			</div>

			<button type="submit" id="sign_up" class="btn btn-success col-sm-12">Login</button>

			<p class="sign-up-redirect">If you don't have an account, you can <a href="https://projects.braijonglover.com/notekeeper/?signup=1">sign up now</a>.</p>

		</div>
	</div>

</form>