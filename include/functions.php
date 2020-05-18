<?php
function get_research_period($id){
	$url = 'https://apiv2.aminer.cn/magic?a=GetPersonPubsStats__person.GetPersonPubsStats___';
	 $data = [array(
		"action" => "person.GetPersonPubsStats",
		"parameters" => array(
			"ids" => [$id]
		)
		)];
		//echo json_encode($data);
	// // Initializes a new cURL session
	 $curl = curl_init();
	 curl_setopt($curl, CURLOPT_URL, $url);
	// // Set the CURLOPT_RETURNTRANSFER option to true
	 curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	
	// // Set the CURLOPT_POST option to true for POST request
	 curl_setopt($curl, CURLOPT_POST, true);
	
	// // Set the request data as JSON using json_encode function
	 curl_setopt($curl, CURLOPT_POSTFIELDS,  json_encode($data));
	 //curl_setopt($curl, CURLOPT_TIMEOUT_MS,3000);
	// // Set custom headers for RapidAPI Auth and Content-Type header
	 curl_setopt($curl, CURLOPT_HTTPHEADER,array(
	  
		 "accept: application/json",
		 "accept-language: en-GB,en-US;q=0.9,en;q=0.8",
		 "cache-control: no-cache",
		 "content-type: application/json; charset=utf-8",
		 "pragma: no-cache",
		 "sec-fetch-dest: empty",
		 "sec-fetch-mode: cors",
		 "sec-fetch-site: same-site",
		 "Connection: keep-alive"
	
	 ));
	 // Execute cURL request with all previous settings
	  $response = curl_exec($curl);
	  $data = json_decode($response);
	$httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
	 curl_error($curl);
	 // Close cURL session
	 curl_close($curl);
	   $response . PHP_EOL;
	   $res = json_decode($response);
	   $items = array();
		 $j=0;
	   foreach($res->data[0]->keyValues->year as $years){
		   $items[] =$years->year;
	   }
	  
	   $firstyear = end($items);
	   $lastyear = $items[0];
	  $researchPeriod= $lastyear - $firstyear;
	  return $researchPeriod;
	
	}


function get_no_of_projects($id){
	$url = 'https://apiv2.aminer.cn/magic?a=GetFundsByPersonID__person.GetFundsByPersonID___';
	
		$data = [array(
		"action" => "person.GetFundsByPersonID",
		"parameters" => array(
			"id" => $id,
			"start" => 100,
			"end"  => 100
		)
		)];
		//echo json_encode($data);
	// // Initializes a new cURL session
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
	// // Set the CURLOPT_RETURNTRANSFER option to true
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	
	// // Set the CURLOPT_POST option to true for POST request
		curl_setopt($curl, CURLOPT_POST, true);
	
	// // Set the request data as JSON using json_encode function
		curl_setopt($curl, CURLOPT_POSTFIELDS,  json_encode($data));
		//curl_setopt($curl, CURLOPT_TIMEOUT_MS,3000);
	// // Set custom headers for RapidAPI Auth and Content-Type header
		curl_setopt($curl, CURLOPT_HTTPHEADER,array(
		
			"accept: application/json",
			"accept-language: en-GB,en-US;q=0.9,en;q=0.8",
			"cache-control: no-cache",
			"content-type: application/json; charset=utf-8",
			"pragma: no-cache",
			"sec-fetch-dest: empty",
			"sec-fetch-mode: cors",
			"sec-fetch-site: same-site",
			"Connection: keep-alive"
	
		));
	
		// Execute cURL request with all previous settings
		$response = curl_exec($curl);
		$data = json_decode($response);
	$httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
		curl_error($curl);
		// Close cURL session
		curl_close($curl);
	$response . PHP_EOL;
	$null = 0;
		$res = json_decode($response);
	if($res->data[0]->keyValues!=""){
		return $res->data[0]->keyValues->total;
	}else{
		return  $null;
	}
	
	}

function get_projects($id){
	$url = 'https://apiv2.aminer.cn/magic?a=GetFundsByPersonID__person.GetFundsByPersonID___';
	//$id = "53f42ed2dabfaedd74d496dc";
		$data = [array(
		"action" => "person.GetFundsByPersonID",
		"parameters" => array(
			"id" => $id,
			"start" => 0,
			"end"  => 100
		)
		)];
		//echo json_encode($data);
	// // Initializes a new cURL session
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
	// // Set the CURLOPT_RETURNTRANSFER option to true
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	
	// // Set the CURLOPT_POST option to true for POST request
		curl_setopt($curl, CURLOPT_POST, true);
	
	// // Set the request data as JSON using json_encode function
		curl_setopt($curl, CURLOPT_POSTFIELDS,  json_encode($data));
		//curl_setopt($curl, CURLOPT_TIMEOUT_MS,3000);
	// // Set custom headers for RapidAPI Auth and Content-Type header
		curl_setopt($curl, CURLOPT_HTTPHEADER,array(
		
			"accept: application/json",
			"accept-language: en-GB,en-US;q=0.9,en;q=0.8",
			"cache-control: no-cache",
			"content-type: application/json; charset=utf-8",
			"pragma: no-cache",
			"sec-fetch-dest: empty",
			"sec-fetch-mode: cors",
			"sec-fetch-site: same-site",
			"Connection: keep-alive"
	
		));
	
		// Execute cURL request with all previous settings
		$response = curl_exec($curl);
		$data = json_decode($response);
	$httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
		curl_error($curl);
		//Close cURL session
		curl_close($curl);
		$response . PHP_EOL;
		$res = json_decode($response);
	
	return $res;
	}


	function get_publications($id){
		$url = 'https://apiv2.aminer.cn/magic?a=GetPersonPubs__person.GetPersonPubs___';
		//$id = "53f42ed2dabfaedd74d496dc";
		 $data = [array(
			"action" => "person.GetPersonPubs",
			"parameters" => array(
				"offset"=> 0,
				"ids" => [$id],
				"size" => 20,
				"sorts"=>["!year"],
				"searchType" =>"all",
		
			),
			"schema" => array(
				"publication" => ["title","year","authors.name","venue","num_citation"]
			)
			)];
			//echo json_encode($data);
		// // Initializes a new cURL session
		 $curl = curl_init();
		 curl_setopt($curl, CURLOPT_URL, $url);
		// // Set the CURLOPT_RETURNTRANSFER option to true
		 curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		
		// // Set the CURLOPT_POST option to true for POST request
		 curl_setopt($curl, CURLOPT_POST, true);
		
		// // Set the request data as JSON using json_encode function
		 curl_setopt($curl, CURLOPT_POSTFIELDS,  json_encode($data));
		 //curl_setopt($curl, CURLOPT_TIMEOUT_MS,3000);
		// // Set custom headers for RapidAPI Auth and Content-Type header
		 curl_setopt($curl, CURLOPT_HTTPHEADER,array(
		  
			 "accept: application/json",
			 "accept-language: en-GB,en-US;q=0.9,en;q=0.8",
			 "cache-control: no-cache",
			 "content-type: application/json; charset=utf-8",
			 "pragma: no-cache",
			 "sec-fetch-dest: empty",
			 "sec-fetch-mode: cors",
			 "sec-fetch-site: same-site",
			 "Connection: keep-alive"
		
		 ));
		
		 // Execute cURL request with all previous settings
		  $response = curl_exec($curl);
		  $data = json_decode($response);
		$httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
		 curl_error($curl);
		 //Close cURL session
		 curl_close($curl);
		 $response . PHP_EOL;
		 $res = json_decode($response);
		
		return $res;
		}

		function get_experts($query){
			$url = 'https://apiv2.aminer.cn/magic?a=__person7.SearchPersonWithDSL___';
			//$id = "53f42ed2dabfaedd74d496dc";
			$data = [
				array(
			   "action" => "person7.SearchPersonWithDSL",
			   "parameters" => array(
				   "offset"=>0,
				   "size"=>10,
				   "query"=>$query,
				   "sort"=> "h_index"
			
			   ),
			   "schema" => array(
					"person" => ["id","name","avatar","tags",
					array(
						"profile" =>["position", "position_zh", "affiliation", "affiliation_zh", "org","work","bio","edu","homepage","phone"]
					),
					array(
						"indices" =>["activity"]
					)
				   ]
			   )
			   )
			   ];
				//echo json_encode($data);
			// // Initializes a new cURL session
			 $curl = curl_init();
			 curl_setopt($curl, CURLOPT_URL, $url);
			// // Set the CURLOPT_RETURNTRANSFER option to true
			 curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			
			// // Set the CURLOPT_POST option to true for POST request
			 curl_setopt($curl, CURLOPT_POST, true);
			
			// // Set the request data as JSON using json_encode function
			 curl_setopt($curl, CURLOPT_POSTFIELDS,  json_encode($data));
			 //curl_setopt($curl, CURLOPT_TIMEOUT_MS,3000);
			// // Set custom headers for RapidAPI Auth and Content-Type header
			 curl_setopt($curl, CURLOPT_HTTPHEADER,array(
			  
				 "accept: application/json",
				 "accept-language: en-GB,en-US;q=0.9,en;q=0.8",
				 "cache-control: no-cache",
				 "content-type: application/json; charset=utf-8",
				 "pragma: no-cache",
				 "sec-fetch-dest: empty",
				 "sec-fetch-mode: cors",
				 "sec-fetch-site: same-site",
				 "Connection: keep-alive"
			
			 ));
			
			 // Execute cURL request with all previous settings
			  $response = curl_exec($curl);
			  $data = json_decode($response);
			$httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
			 curl_error($curl);
			 //Close cURL session
			 curl_close($curl);
			  $response . PHP_EOL;
			 $res = json_decode($response);
			
			return $res;
			}

	function get_award_for_user($total){
		$newArray = array();
		$awards = [
			'ACM Distinguished Lecturer',
			'National Merit Scholar',
			'Best Paper Award, 21st IEEE',
			'Best Paper Award at ICML/COLT',
			'Premio Scopus Mexico',
			'TRF-CHE-Scopus Mid-Career Researcher Award',
			'PMI Scholar-Practitioner Award',
			'IEEE John von Neumann Medal, 2020',
			'IEEE Neural Networks Pioneer Award',
			'Elected Member, International Statistical Institute',
			'most influential computer scientist',
			'Alexander-von-Humboldt Professorship',
			'IFIP Fellow ',
			'honorary professor',
			'SIGOPS Hall of Fame Award',
			'IGCOMM Test of Time Award ',
			'ACM doctoral dissertation award',
			'Euro-Par Achievement Award,',
			'IEEE TCSC Award for Excellence in Scalable Computing',
			'ACM HPDC Lifetime Achievement Award',
			'IEEE Tsutomu Kanai Award',
			'Best Paper Award',
			'Gordon Bell Award',
			'Most Promising New Technology” Award',
			'British Computer Society Award for Technical Innovation',
			'IBM Faculty Award',
			'PNC Center for Innovation Award',
			'Graduate Research Board Summer Research Award',
			' Honorary PhD  degree',
			' AI Tang fellowship',
			'Distinguished Contribution Award',
			'Innovations Award, in ACM SIGKDD,',
			'Best faculty award'
		];

		for ($i=0; $i <$total; $i++) { 
			$aw = array_rand($awards);
			$newArray[$i] = $awards[$aw];
			//echo $name[$awards]."<br>";
			unset($awards[$aw]);
		
		}
		return $newArray;

	}

?>