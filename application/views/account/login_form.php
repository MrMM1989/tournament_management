<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>
		<main>
			<h1><?php echo $title; ?></h1>
			<p>You haven't an account yet? Register an account <a href="<?php echo site_url('account/register_form'); ?>">here</a>!</p>
			<?php if(isset($_SESSION['login_error'])): ?>
				<p class="error">Invalid login credentials! Please try again!</p>
			<?php 
				endif;
				$attributes = array('id' => 'loginform');
				echo form_open('account/login', $attributes); 
			?>
			<ul>
				<li>
					<label for="email">Email: </label>
					<input id="email" type="email" name="email" required />
				</li>
				<li>
					<label for="password">Password: </label>
					<input id="password" type="password" name="password" required />
				</li>
				<li>
					<input id="submit" class="buttonblue" type="submit" name="submit" value="Login" />
				</li>
			</ul>
			</form>
		</main>
