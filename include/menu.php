<?php
 require("config.php");
?>


<nav class="navbar navbar-expand-lg navbar-light navigation">
					<a class="navbar-brand" href="<?php echo BASE_URL; ?>">
						<img src="<?php  echo BASE_URL ?>assets/images/logo.png" alt="">
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav ml-auto main-nav ">
							<li class="nav-item active">
								<a class="nav-link" href="<?php echo BASE_URL  ?>">Home</a>
							</li>
							<li class="nav-item ">
								<a class="nav-link" href="<?php echo BASE_URL  ?>top-ranked">Top Ranked</a>
							</li>
							<li class="nav-item ">
								<a class="nav-link" href="<?php echo BASE_URL  ?>popular-users">Popular Users</a>
							</li>
							<li class="nav-item ">
								<a class="nav-link" href="<?php echo BASE_URL  ?>popular-media">Popular Media</a>
							</li>
							<li class="nav-item ">
								<a class="nav-link" href="<?php echo BASE_URL  ?>popular-tags">Popular Tags</a>
							</li>
						</ul>
						
					</div>
				</nav>