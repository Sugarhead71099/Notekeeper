<form method="POST" id="sign-up-form">

	<div class="card" style="background-color: rgba(183, 183, 183, 0.8);">
		<div class="card-body">

			<div class="form-group">
				<label for="name">Name</label>

				<p class="invalid-description" <?php echo ( isset($fields['name']) ? ( $fields['name']->is_empty ? '' : 'hidden' ) : 'hidden' ); ?> ><small><small>Name cannot be left blank</small></small></p>

				<input type="text" name="name" id="name" class="form-control <?php echo ( isset($fields['name']) ? ( $fields['name']->is_empty ? 'is-invalid' : 'is-valid' ) : '' ); ?>" placeholder="John Doe" value="<?php echo isset($fields['name']) ? $fields['name']->value : ''; ?>" required>
			</div>


			<div class="form-group">
				<label for="email">Email</label>

				<p class="invalid-description" <?php echo ( isset($fields['email']) ? ( $fields['email']->is_valid ? 'hidden' : '' ) : 'hidden' ); ?> ><small><small>Invalid Email Address</small></small></p>

				<p class="invalid-description" <?php echo ( isset($fields['email']) ? ( $fields['email']->is_empty ? '' : 'hidden' ) : 'hidden' ); ?> ><small><small>Email cannot be left blank</small></small></p>

				<input type="email" name="email" id="email" class="form-control <?php echo ( isset($fields['email']) ? ( $fields['email']->is_valid ? 'is-valid' : 'is-invalid' ) : '' ); ?>" placeholder="johndoe@fakeemail.com" value="<?php echo isset($fields['email']) ? $fields['email']->value : ''; ?>" required>
			</div>


			<div class="form-group">
				<label for="password">Password</label>

				<p class="invalid-description" <?php echo ( isset($fields['password']) ? ( $fields['password']->is_valid ? 'hidden' : '' ) : 'hidden' ); ?> ><small><small>Password must consist of 8-20 chararcters and contain at least: 1 lowercase, 1 uppercase and 1 numeric character</small></small></p>

				<p class="invalid-description" <?php echo ( isset($fields['password']) ? ( $fields['password']->is_empty ? '' : 'hidden' ) : 'hidden' ); ?> ><small><small>Password cannot be left blank</small></small></p>

				<input type="password" name="password" id="password" class="form-control <?php echo ( isset($fields['password']) ? ( $fields['password']->is_valid ? 'is-valid' : 'is-invalid' ) : '' ); ?>" placeholder="********" pattern="^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{8,20}$" value="<?php echo isset($fields['password']) ? ( $fields['password']->is_valid && !($fields['password']->is_empty) ? $fields['password']->value : '' ) : ''; ?>" title="Password must consist of 8-20 chararcters and contain at least: 1 lowercase, 1 uppercase and 1 numeric character" required>
			</div>


			<div class="form-group">
				<label for="password">Confirm Password</label>

				<p class="invalid-description" <?php echo ( isset($fields['password']) ? ( $fields['password']->is_valid ? 'hidden' : '' ) : 'hidden' ); ?> ><small><small>Passwords do not match</small></small></p>

				<input type="password" name="confirm_password" id="confirm_password" class="form-control <?php echo ( isset($fields['password']) ? ( $fields['password']->is_valid ? 'is-valid' : 'is-invalid' ) : '' ); ?>" placeholder="********" value="<?php echo isset($fields['password']) ? ( $fields['password']->is_valid && !$fields['password']->is_empty ? $fields['password']->value : '' ) : ''; ?>" required>
			</div>


			<div class="form-group">
				<label for="human_validation"><?php echo $_SESSION['human_validation_pair' . count($_SESSION)]->randomNum1 . ' + ' . $_SESSION['human_validation_pair' . count($_SESSION)]->randomNum2; ?></label>

				<p class="invalid-description" <?php echo ( isset($fields['human_validation']) ? ( $fields['human_validation']->is_valid ? 'hidden' : '' ) : 'hidden' ); ?> ><small><small>Your math is suspect</small></small></p>

				<p class="invalid-description" <?php echo ( isset($fields['human_validation']) ? ( $fields['human_validation']->is_empty ? '' : 'hidden' ) : 'hidden' ); ?> ><small><small>Human Validation cannot be left blank</small></small></p>

				<input type="text" name="human_validation" id="human_validation" class="form-control <?php echo ( isset($fields['human_validation']) ? ( $fields['human_validation']->is_valid ? '' : 'is-invalid' ) : '' ); ?>" placeholder="Your Answer" required>
			</div>


			<button type="submit" id="sign_up" class="btn btn-success col-sm-12">Sign Up</button>

			<p class="sign-up-redirect">Already have an account? <a href="https://projects.braijonglover.com/notekeeper/">login here</a>.</p>

		</div>
	</div>

</form>