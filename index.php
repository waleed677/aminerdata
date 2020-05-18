<?php 
require("include/config.php");



?>
<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>BIT- HCI</title>

	<!-- Bootstrap core CSS -->
	<link href="<?php echo BASE_URL;?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom fonts for this template -->
	<link href="<?php echo BASE_URL;?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
	<link href="<?php echo BASE_URL;?>vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet"
		type="text/css">

	<!-- Custom styles for this template -->
	<link href="<?php echo BASE_URL;?>css/landing-page.css" rel="stylesheet">

</head>

<body>

 <!-- Navigation -->


<!-- Masthead -->
<header class="masthead text-white text-center">
<div class="overlay"></div>
<div class="container">
	<div class="row">
		<div class="col-xl-9 mx-auto">
			<h1 class="mb-5">Big Educational Data powered Rank Center Beijing Institute of technology!</h1>
		</div>
		<div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
			<form class="card card-sm" method="post" action="<?php echo BASE_URL ?>experts/">
				<div class="card-body row no-gutters align-items-center">

					<!--end of col-->
					<div class="col">
						<input class="form-control form-control-lg form-control-borderless" type="search"
							placeholder="Whatever field comes to your mind..." name="field">
					</div>
					<!--end of col-->
					<div class="col-auto">
						<button class="btn btn-lg btn-success" type="submit">Search</button>
					</div>
					<!--end of col-->
				</div>
			</form>
		</div>
	</div>
</div>
</header>


	<!-- Footer -->
	<!-- <footer class="footer bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-5"></div>
        <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
          <p class="text-muted small mb-4 mb-lg-0">&copy; BITMINER 2020. All Rights Reserved.</p>
        </div>
        
      </div>
    </div>
  </footer> -->

	<!-- Bootstrap core JavaScript -->
	<script src="<?php echo BASE_URL;?>vendor/jquery/jquery.min.js"></script>
	<script src="<?php echo BASE_URL;?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>