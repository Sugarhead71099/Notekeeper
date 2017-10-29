<form method="POST" id="reset-password-form">

<?php

	if(isset($_COOKIE['resetpassword']) && $_COOKIE['resetpassword'] == 1) { ?>

		<div class="form-group">
			<label for="password">New Password</label>

			<p class="invalid-description" <?php echo ( isset($fields['password']) ? ( $fields['password']->is_valid ? 'hidden' : "" ) : 'hidden' ); ?> ><small><small>Password must be 8-20 chararcters long and contain at least: 1 lowercase, 1 uppercase and 1 numeric character</small></small></p>

			<p class="invalid-description" <?php echo ( isset($fields['password']) ? ( $fields['password']->is_empty ? "" : 'hidden' ) : 'hidden' ); ?> ><small><small>Password cannot be left blank</small></small></p>

			<input type="password" name="password" id="password" class="form-control <?php echo ( isset($fields['password']) ? ( $fields['password']->is_valid ? 'is-valid' : 'is-invalid' ) : '' ); ?>" placeholder="********" pattern="^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{8,20}$" value="<?php echo isset($fields['password']) ? ( $fields['password']->is_valid && !($fields['password']->is_empty) ? $fields['password']->value : '' ) : ''; ?>" required>
		</div>


		<div class="form-group">
			<label for="password">Confirm Password</label>

			<p class="invalid-description" <?php echo ( isset($fields['password']) ? ( $fields['password']->is_valid ? 'hidden' : "" ) : 'hidden' ); ?> ><small><small>Passwords do not match</small></small></p>

			<input type="password" name="confirm_password" id="confirm_password" class="form-control <?php echo ( isset($fields['password']) ? ( $fields['password']->is_valid ? 'is-valid' : 'is-invalid' ) : '' ); ?>" placeholder="********" value="<?php echo isset($fields['password']) ? ( $fields['password']->is_valid && !$fields['password']->is_empty ? $fields['password']->value : '' ) : ''; ?>" required>
		</div>
<?php

	} else { ?>

		<div class="form-group">
			<label for="email">Email</label>
			<p class="invalid-description" <?php echo ( isset($_POST['email']) ? ( $_POST['email'] ? 'hidden' : '' ) : 'hidden' ); ?> ><small><small>Email cannot be left blank</small></small></p>
			<input type="email" name="email" id="email" class="form-control" placeholder="johndoe@fakeemail.com" value="" required>
		</div>

<?php

	}

?>

	<button type="submit" id="sign_up" class="btn btn-primary col-sm-12">Submit</button>

</form>