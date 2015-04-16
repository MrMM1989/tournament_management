<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>
		<main>
			<h1><?php echo $title; ?></h1>
			<p>Do you already have an account? Log in <a href="<?php echo site_url('account/login_form'); ?>">here</a>!</p>
			<?php
				$attributes = array('id' => 'registerform'); 
				echo form_open('account/register', $attributes); 
			?>
			<ul>
				<li>
					<label for="username">Username: </label>
					<input id="username" type="text" name="username" required />
				</li>
				<li>
					<label for="email">Email: </label>
					<input id="email" type="email" name="email" required />
				</li>
				<li>
					<label for="cemail">Confirm email: </label>
					<input id="cemail" type="email" name="cemail" required />
				</li>
				<li>
					<label for="password">Password: </label>
					<input id="password" type="password" name="password" required />
				</li>
				<li>
					<label for="cpassword">Confirm password: </label>
					<input id="cpassword" type="password" name="cpassword" required />
				</li>
				<li>
					<input id="accepttos" type="checkbox" name="accepttos" required />
					<label for="accepttos">I agree with the terms of service and privacy policy!</label>
					<label for="accepttos" class="error"></label>
				</li>
				<li>
					<input id="submit" class="buttonblue" type="submit" name="submit" value="Register" />
				</li>
			</ul>
			</form>
		</main>
