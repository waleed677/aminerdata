<?php 
require("../include/config.php");
include('../include/simple_html_dom.php');
include('../include/functions.php');
if(!empty($_GET['id'])){
	$id = $_GET['id'];
	//$id = explode("/",$id);
}
//$researchPeriod = get_research_period($id[1]);
//$projects = get_no_of_projects($id[1]);
$projectData = get_projects($id);
$publicationData = get_publications($id);
$null = 0;

// if($projectData->data[0]->keyValues!=""){
// 	$projects = $projectData->data[0]->keyValues->total;
// 	}else{
// 		$projects = 0;
// 	}
//$projects = $projectData->data[0]->keyValues->total;
$name = $_SESSION['items'][$id]['name'];
$hindex = $_SESSION['items'][$id]['hindex'];
$paper = $_SESSION['items'][$id]['paper'];
$citation = $_SESSION['items'][$id]['citation'];
$avatar = $_SESSION['items'][$id]['avatar'];
$position = $_SESSION['items'][$id]['position'];
$affilation = $_SESSION['items'][$id]['affilation'];
$phone = $_SESSION['items'][$id]['phone'];
$bio = $_SESSION['items'][$id]['bio'];
$edu = $_SESSION['items'][$id]['edu'];
$activity = $_SESSION['items'][$id]['activity'];
$patent = $_SESSION['items'][$id]['patent'];
$tags = $_SESSION['items'][$id]['tags'];
$homepage = $_SESSION['items'][$id]['homepage'];
$projects = $_SESSION['items'][$id]['project'];
$researchPeriod= $_SESSION['items'][$id]['rp'];
$awards = $_SESSION['items'][$id]['awards'];


$awardData = get_award_for_user($awards);
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
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

	<!------ Include the above in your HEAD tag ---------->


	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<!-- Custom fonts for this template -->
	<link href="<?php echo BASE_URL;?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
	<link href="<?php echo BASE_URL;?>vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet"
		type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet"
		type="text/css">

	<!-- Custom styles for this template -->
	<link href="<?php echo BASE_URL;?>css/landing-page.css" rel="stylesheet">

</head>

<body>



	<nav class="navbar_menu fixed-top">

		<a href="<?php echo BASE_URL; ?>" class="logo"> <strong>BIT</strong>Miner </a>
		<ul class="arama">
		<form  method="post" action="<?php echo BASE_URL ?>experts/">
				<li class="input-group">
					<input type="search" placeholder="Whatever field comes to your mind..." name="field" class="form-control">
					<button class="btn btn-md btn-success" type="submit">Search</button>
				</li>
				</form>
		</ul>
	</nav>


	<section class="features-icons bg-light text-center">

		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="card">

						<div class="card-body">
							<div class="card-title mb-4">
								<div class="d-flex justify-content-start">
									<div class="image-container">
										<img src="<?php echo $avatar; ?>" id="imgProfile"
											style="width: 150px; height: 150px" class="" />
										
									</div>
									<div class="userData ml-3">
										<h2 class="d-block justify" style="font-size: 1.5rem; font-weight: bold"><a
												href="javascript:void(0);"><?php echo $name; ?></a></h2>
<p class="justify"><strong><i class="fas fa-briefcase"></i></strong> <?php echo $position; ?></p>
<p class="justify"><strong><i class="fas fa-university"></i></strong> <?php echo $affilation; ?></p>
<p class="justify"><strong><i class="fas fa-phone-square-alt"></i></strong> <?php echo $phone; ?></p>
<!-- <p class="justify"><strong><i class="fas fa-home"></i></strong><a href="<?php echo $homepage; ?>"> <?php echo $homepage; ?></a></p> -->
<p class="justify"> <?php 
foreach($tags as $skills) { ?>
<span class="tags" style="font-size:12px"><?php echo $skills;  ?></span>
<?php }?></p>
									</div>
									
								</div>
							</div>

							<div class="row">
							<div class="col-md-2"><h2><strong><?php echo $hindex; ?></strong></h2>                    
                    			<p><small>H-Index</small></p></div>
							<div class="col-md-2"><h2><strong><?php echo $paper; ?></strong></h2>                    
                    			<p><small>#Paper</small></p></div>
							<div class="col-md-2"><h2><strong><?php echo $citation; ?></strong></h2>                    
								<p><small>#Citations</small></p></div>	
							<div class="col-md-2"><h2><strong><?php echo $researchPeriod; ?></strong></h2>                    
								<p><small>#Research Period</small></p></div>
							<div class="col-md-2"><h2><strong><?php echo $projects; ?></strong></h2>                    
							<p><small>#Projects</small></p></div>
							<div class="col-md-2"><h2><strong><?php echo $awards; ?></strong></h2>                    
							<p><small>#Awards</small></p></div>
							</div>

							<div class="row">
								
								<div class="col-12">

									<ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
										<li class="nav-item">
											<a class="nav-link active" id="basicInfo-tab" data-toggle="tab"
												href="#basicInfo" role="tab" aria-controls="basicInfo"
												aria-selected="true">Basic Info</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" id="paper-tab" data-toggle="tab"
												href="#paper" role="tab" aria-controls="paper"
												aria-selected="false">Papers</a>
										</li>

										<li class="nav-item">
											<a class="nav-link" id="projects-tab" data-toggle="tab"
												href="#projects" role="tab" aria-controls="projects"
												aria-selected="false">Projects</a>
										</li>

										<li class="nav-item">
											<a class="nav-link" id="awards-tab" data-toggle="tab"
												href="#awards" role="tab" aria-controls="projects"
												aria-selected="false">Awards & Honors</a>
										</li>
									</ul>
									



									<div class="tab-content ml-1" id="myTabContent">
										<div class="tab-pane fade show active" id="basicInfo" role="tabpanel"
											aria-labelledby="basicInfo-tab">


											<!-- <div class="row">
												<div class="col-sm-3 col-md-2 col-5">
													<label style="font-weight:bold;">BIO</label>
												</di>
												<div class="col-md-8 col-6">
												<p class="justify"><?php echo $bio;  ?></p>
												</div>
											</div>
											<hr /> -->

											<div class="row">
												<div class="col-sm-3 col-md-2 col-5">
													<label style="font-weight:bold;">Education</label>
												</div>
												<div class="col-md-8 col-6">
												<p class="justify"><?php echo $edu;  ?></p>
												</div>
											</div>
											<hr />

										</div>

				<div class="tab-pane fade" id="paper" role="tabpanel"
					aria-labelledby="paper-tab">
					<?php  foreach($publicationData->data[0]->items as $papers){ ?>
					<div class="row">
					<div class="col-sm-8 col-md-8 col-8">
					<h2 class="paper-title">
					<?php  echo $papers->title; ?>
					</h2>
					<p class="justify ">
					<span class="authors"><?php foreach($papers->authors as $author){ 
										echo $author->name.", ";	
										 } ?></span>
					<span class="duration">Published Year : <?php  echo $papers->year; ?></span>
					</p><br>
					<p style="float: left" >
					Venue : <?php  echo $papers->venue->info->name; ?>
					</p>
					</div>	
					</div>
										<hr />	<?php } ?>
				</div>

							<div class="tab-pane fade" id="projects" role="tabpanel"
								aria-labelledby="projects-tab">
								<?php if($projects <=0){ ?>
									There is no project found !!!
								<?php }else{ 
									foreach($projectData->data[0]->items as $titles){
									?>
									<div class="row">
									<div class="col-sm-8 col-md-8 col-8">
									<h2 class="paper-title">
									<?php echo $titles->title;  ?>
									</h2>
									<p class="justify ">
										<span class="authors">
										<?php foreach($titles->investigators as $author){ 
										echo $author->name.", ";	
										 } ?>
									</span>
									<span class="duration">

									Durration : <?php echo $titles->start_year." - ". $titles->end_year; ?>
									</span>
									</p>

									

									</div>
								</div>
								<hr />		

								<?php }} ?>
							</div>



							<div class="tab-pane fade" id="awards" role="tabpanel"
					aria-labelledby="awards-tab">
					<?php foreach($awardData as $award) { ?>
					<div class="row">
					<div class="col-sm-8 col-md-8 col-8">
					<h2 class="paper-title">
					<?php  echo $award; ?>
					</h2>
					
					
					</div>	
					</div>
										<hr />	<?php } ?>
				</div>

									</div>
								</div>
							</div>


						</div>

					</div>
				</div>
			</div>
		</div>


	</section>

	<script src="<?php echo BASE_URL  ?>vendor/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>