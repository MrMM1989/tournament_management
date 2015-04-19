<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>			
			<nav id="usernav">
  				<ul>
  					<li>
  						Welcome <?php echo $_SESSION['username']; ?>!
  					</li>
  					<li>
  						<a href="<?php echo site_url('account/profile'); ?>">My Profile</a>
  					</li>
  					<li>|</li>
  					<li>
  						<a href="<?php echo site_url('account/logout') ?>">Logout</a>
  					</li>
  				</ul>
  			</nav>
  		</header>
 		