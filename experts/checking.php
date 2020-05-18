<?php

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

 foreach($res->ava as $skills) { 
			echo $skills;				
	//$tags[$j]= $skills; 
	//$j++;
	 } 


//return $res;
}

//$id ="Computer Vision";
//get_experts($id);
//get_publications("53f42ed2dabfaedd74d496dc")
?>




  