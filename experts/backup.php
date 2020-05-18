<?php 
require("../include/config.php");
include('../include/simple_html_dom.php');
include('../include/functions.php');
if(!empty($_POST['field'])){
 $field = $_POST['field'];

}

function file_get_contents_curl($url) {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //Set curl to return the data instead of printing it to the browser.
	curl_setopt($ch, CURLOPT_URL, $url);
	$data = curl_exec($ch);
	curl_close($ch);
	return $data;
	}
	

$mainUrl = 'https://api.aminer.org/api/search/person?query='.urlencode($field).'&size=10&as_h_index=>100&sort=relevance';

$url = file_get_contents($mainUrl);
$response = json_decode($url);

 //echo "<br>the name is ".$response->result[0]->name;

$authors = $response->result;

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
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<link href="<?php echo BASE_URL;?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
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



<nav class="navbar_menu fixed-top" >

			<a href="" class="logo"> <strong>BIT</strong>Miner </a>
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
          <div class="col-lg-2"></div>
          <div class="col-lg-8">
          <h1 class="text-center"><span class="">Expert Researcher </span> in <?php echo $field;  ?></h1>
          <div class="text-center">
          </div>
          </div>
         </div><!--/ container -->
		 <div class="space"></div>

		 <?php foreach($authors as $researcher){  ?>
      <div class="row">
        
		<div class="col-md-10 col-lg-8">
    	 <div class="well profile">
            <div class="col-sm-12 ">
                <div class="col-xs-12 col-md-3 col-lg-3 col-sm-12  text-center">
				<figure>
                        <img src="<?php echo $researcher->avatar; ?>"  class="img-thumbnail img-circle">
                    </figure>
                    
				</div>             
				<?php $name = $researcher->name;
					  $name = str_replace(' ','-',$name);
					  $id = $researcher->id;
					  $url = $name.'/'.$id;
						if(empty($_SESSION['items'])){
						$_SESSION['items'] = array();
						}
						if($researcher->pos[0] !=""){
								$position = $researcher->pos[0]->n;
						}else{
							$position ="none";
						}

						if($researcher->aff !=""){
							$affliation = $researcher->aff->desc;
						}else{
							$affliation = "none";
						}

						if($researcher->contact->homepage !=""){
							$homepage = $researcher->contact->homepage;
						}else{
							$homepage ="none";
						}

						if($researcher->contact->phone !=""){
							$phone = $researcher->contact->phone;
						}else{
							$phone ="none";
						}

						if($researcher->contact->bio !=""){
							$bio = $researcher->contact->bio;
						}else{
							$bio ="none";
						}

						if($researcher->contact->edu !=""){
							$edu = $researcher->contact->edu;
						}else{
							$edu ="none";
						}

						if($researcher->indices->num_patents !=""){
							$patent = $researcher->indices->num_patents;
						}else{
							$patent ="0";
						}

						
							$j=0;
							$tags= array();
						 foreach($researcher->tags as $skills) { 
							
							$tags[$j]= $skills->t; 
							$j++;
							 } 

							 $rp = get_research_period($id);
							 $project = get_no_of_projects($id);

// foreach($tags as $skills) {

// echo $skills; }

					
					  $_SESSION['items'][$id] =array(
					 'hindex' => $researcher->indices->h_index,
					  'paper' =>$researcher->indices->num_pubs,'citation'=>$researcher->indices->num_citation,
					'avatar' => $researcher->avatar,
					'position' => $position,
					'affilation' => $affliation,
					'homepage' => $homepage,
					'phone' => $phone,
					'bio' =>$bio,
					'edu' => $edu,
					'activity' => $researcher->indices->activity,
					'name'=> $researcher->name,
					'patent' => $patent,
					'tags' =>$tags,
					'rp' => $rp,
					'project'=> $project


					);
				?>
                <div class="col-xs-12 col-md-9 col-lg-9 col-sm-12">
				<h2 class="justify"><?php echo $researcher->name;  ?></h2>
				<a href="<?php echo BASE_URL ?>profile/?id=<?php echo $id; ?>" class="btn btn-md btn-success" style="float:right;margin-top: -30px;">View Profile</a>
                    <p class="justify"><strong><i class="fas fa-briefcase"></i> 
</strong> <?php   
			if($researcher->pos[0] !=""){
				echo $researcher->pos[0]->n;
			}else{
				echo "none";
			}

			?> </p>
                    <p class="justify"><strong><i class="fas fa-university"></i>
	 </strong> <?php if($researcher->aff !=""){
				echo $researcher->aff->desc;
			}  ?> </p>
	 <p class="justify"><strong><i class="fas fa-info-circle"></i>
	 </strong> h-index : <?php echo $researcher->indices->h_index;  ?> | 
	 			#paper : <?php echo $researcher->indices->num_pubs;  ?> | 
			 #citation: <?php echo $researcher->indices->num_citation;  ?> |
			 #No of patents: <?php echo $researcher->indices->num_patents;  ?> |
			 #researchPeriod: <?php echo $rp;  ?> |
			 #No of projects: <?php  echo $project;  ?>
			</p>
                    <p class="justify">
						<?php foreach($researcher->tags as $skills) { ?>
						<span class="tags"><?php echo $skills->t; ?></span> 
						<?php  } ?>
                    </p>
                </div>
            </div>            
    	 </div>                 
		</div>
    
	  </div>
		 <?php }  ?>
	  

    </div>
  </section>


</body>

</html>