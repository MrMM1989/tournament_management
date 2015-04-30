<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>
		<main>
			<h1><?php echo $title; ?></h1>
			<h2>Account settings</h2>
			<p>
				Username: <?php echo $user_name; ?>
			</p>
			<p id="emailchange">
				Current email: <?php echo $user_email; ?> | <a href="">change email</a>
			</p>
			<?php
				$attributes = array('id' => 'emailchangeform');
				echo form_open('account/profile_email_confirm', $attributes); 
			?>
				<ul>
					<li>
						<label for="oldemail">Current Email: </label>
						<input id="oldemail" type="email" name="oldemail" value="<?php echo $user_email; ?>" required />
						<?php echo form_error('email', '<label class="error">','</label>') ?>
					</li>
					<li>
						<label for="newemail">New Email: </label>
						<input id="newemail" type="email" name="newemail" value="<?php echo set_value('newemail'); ?>" required />
						<?php echo form_error('newemail', '<label class="error">','</label>') ?>
					</li>
					<li>
						<label for="cnewemail">Confirm New Email: </label>
						<input id="cnewemail" type="email" name="cnewemail" value="<?php echo set_value('cnewemail'); ?>" required />
						<?php echo form_error('cnewemail', '<label class="error">','</label>') ?>
					</li>
					<li>
						<input id="submit" class="buttonblue" type="submit" name="submit" value="Change Email" />
					</li>
				</ul>
			</form>
			<p id="passwordchange">
				Password: <a href="">change password</a>
			</p>
			<?php
				$attributes = array('id' => 'passwordchangeform'); 
				echo form_open('account/profile_password_confirm', $attributes); 
			?>
				<ul>
					<li>
						<label for="oldpassword">Current Password: </label>
						<input id="oldpassword" type="password" name="oldpassword" value="<?php echo set_value('oldpassword'); ?>" required />
						<?php echo form_error('oldpassword', '<label class="error">','</label>') ?>
					</li>
					<li>
						<label for="newpassword">New Password: </label>
						<input id="newpassword" type="password" name="newpassword" value="<?php echo set_value('newpassword'); ?>" required />
						<?php echo form_error('newpassword', '<label class="error">','</label>') ?>
					</li>
					<li>
						<label for="cnewpassword">Confirm New Password: </label>
						<input id="cnewpassword" type="password" name="cnewpassword" value="<?php echo set_value('cnewpassword'); ?>" required />
						<?php echo form_error('cnewpassword', '<label class="error">','</label>') ?>
					</li>
					<li>
						<input id="submit" class="buttonblue" type="submit" name="submit" value="Change Password" />
					</li>
				</ul>
			</form>
		</main>
