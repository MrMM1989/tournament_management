<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>
		<main>
			<h1><?php echo $title; ?></h1>
			<?php echo form_open('tournament/create_confirm'); ?>
			<ul>
				<li>
					<label for="tname">Tournament name: </label>
					<input id="tname" type="text" name="tname" required />
				</li>
				<li>
					<label for="tmaxplayers">Maximum participants: </label>
					<select id="tmaxplayers" name="tmaxplayers">
						<option disabled="disabled">--Select a number--</option>
						<option>8</option>
						<option>16</option>
						<option selected="selected">32</option>
						<option>64</option>
						<option>128</option>
						<option>256</option>
					</select>
				</li>
				<li>
					<input id="player" type="radio" name="teams" value="player" checked="checked" />
					<label for="player">Tournament for players</label>
					<input id="team" type="radio" name="teams" value="team" />
					<label for="team">Tournament for teams</label>
				</li>
				<li>
					<label for="trules">Tournament rules: </label>
				 	<textarea id="trules" name="trules"></textarea>
				</li>
				<li>
					<label for="tprices">Tournament prices: </label>
				 	<textarea id="tprices" name="tprices"></textarea>
				</li>
				<li>
					<input id="submit" class="buttonblue" type="submit" name="submit" value="Create tournament" />
				</li>
			</ul>
			</form>
		</main>