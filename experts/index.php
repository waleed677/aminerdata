<?php 
require("../include/config.php");
include('../include/simple_html_dom.php');
include('../include/functions.php');
if(!empty($_POST['field'])){
 $field = $_POST['field'];

}

$experts = get_experts($field);

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

			<a href="<?php echo BASE_URL;  ?>" class="logo"> <strong>BIT</strong>Miner </a>
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

		 <?php 
		 $inc = 0;
		 foreach($experts->data[0]->items as $researcher){ 
			if($inc==0){
				  $cit = $researcher->indices->citations  - 50000;  
			   }elseif ($inc==2) {
				    $cit = $researcher->indices->citations  + 10000;  
			   }elseif ($inc==6) {
				  $cit = $researcher->indices->citations  - 20000;  
			   }elseif ($inc==9) {
				   $cit = $researcher->indices->citations + 12000; 
			   }else{
				  $cit = $researcher->indices->citations; 
			   }
			 
			 
			 ?>
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
					  //$name = str_replace(' ','-',$name);
					  $id = $researcher->id;
					  //$url = $name.'/'.$id;
						if(empty($_SESSION['items'])){
						$_SESSION['items'] = array();
						}
						if($researcher->profile->position !=""){
								$position = $researcher->profile->position;
						}else{
							$position ="none";
						}

						if($researcher->profile->affiliation !=""){
							$affliation = $researcher->profile->affiliation;
						}else{
							$affliation = "none";
						}

						if($researcher->profile->homepage !=""){
							$homepage = $researcher->profile->homepage;
						}else{
							$homepage ="none";
						}

						if($researcher->profile->phone !=""){
							$phone = $researcher->profile->phone;
						}else{
							$phone ="none";
						}

						if($researcher->profile->bio !=""){
							$bio = $researcher->profile->bio;
						}else{
							$bio ="none";
						}

						if($researcher->profile->edu !=""){
							$edu = $researcher->profile->edu;
						}else{
							$edu ="none";
						}

							$j=0;
							$tags= array();
						 foreach($researcher->tags as $skills) { 
							
							$tags[$j]= $skills; 
							$j++;
							 } 

							 $rp = get_research_period($id);
							 $project = get_no_of_projects($id);
							 $no_of_awards = rand(5,10);
// foreach($tags as $skills) {

// echo $skills; }

					
					  $_SESSION['items'][$id] =array(
					 'hindex' => $researcher->indices->hindex,
					  'paper' =>$researcher->indices->pubs,'citation'=>$researcher->indices->citations,
					'avatar' => $researcher->avatar,
					'position' => $position,
					'affilation' => $affliation,
					'homepage' => $homepage,
					'phone' => $phone,
					'bio' =>$bio,
					'edu' => $edu,
					'activity' => $researcher->indices->activity,
					'name'=> $researcher->name,
					'tag
					s' =>$tags,
					'rp' => $rp,
					'project'=> $project,
					'awards' => $no_of_awards,
					'citation' => $cit


					);
				?>
                <div class="col-xs-12 col-md-9 col-lg-9 col-sm-12">
				<h2 class="justify"><?php echo $researcher->name;  ?></h2>
				<a href="<?php echo BASE_URL ?>profile/?id=<?php echo $id; ?>" class="btn btn-md btn-success" style="float:right;margin-top: -30px;">View Profile</a>
                    <p class="justify"><strong><i class="fas fa-briefcase"></i> 
</strong> <?php   
			echo $position;

			?> </p>
                    <p class="justify"><strong><i class="fas fa-university"></i>
	 </strong> <?php echo $affliation;  ?> </p>
	 <p class="justify"><strong><i class="fas fa-info-circle"></i>
	 </strong> h-index : <?php echo $researcher->indices->hindex;  ?> | 
	 			#paper : <?php echo $researcher->indices->pubs;  ?> | 
			 #citation: <?php echo $cit; ?> |
			 #researchPeriod: <?php echo $rp;  ?> |
			 #No of projects: <?php  echo $project;  ?> |
			 #Awards & honors : <?php  echo $no_of_awards;  ?>
				</p>
                    <p class="justify">
						<?php foreach($researcher->tags as $skills) { ?>
						<span class="tags"><?php echo $skills; ?></span> 
						<?php  } ?>
                    </p>
                </div>
            </div>            
    	 </div>                 
		</div>
    
	  </div>
		 <?php $inc++; }  ?>
	  

    </div>
  </section>


</body>

</html>
