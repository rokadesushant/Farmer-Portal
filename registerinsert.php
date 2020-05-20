<?php
include("database.php");
// Escape user inputs for security
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$username = $_POST['username'];
$phoneno = $_POST['phoneno'];
$city=$_POST['city'];
$state=$_POST['state'];
$password = $_POST['password'];
$address = $_POST['address'];
$email = $_POST['email'];
$type=$_POST['type'];




 
 $password=hash('sha1','$password',FALSE);
// Attempt insert query execution
 if ($type=='farmer') {

		 	$curl = curl_init();
			$address1=rawurlencode($address);
			curl_setopt_array($curl, array(
				CURLOPT_URL => "https://trueway-geocoding.p.rapidapi.com/Geocode?language=en&country=IN&address=$address1",
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_ENCODING => "",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 30,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => "GET",
				CURLOPT_HTTPHEADER => array(
					"x-rapidapi-host: trueway-geocoding.p.rapidapi.com",
					"x-rapidapi-key: 3665a3639fmsh04a783ce9c61a9bp1ed5dejsnff6ae02df8af"
				),
			));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
			
		} else {
			//echo $response;
			$res=json_decode($response);
			//print_r($res);
			$lat= $res->results[0]->location->lat;
			$long= $res->results[0]->location->lng;
		}
 	$sql = "INSERT INTO user (firstname, lastname, username,phoneno,email,password,address,state,city,latitude,longitude) VALUES ('$firstname', '$lastname','$username',$phoneno,'$email','$password','$address','$state','$city','$lat','$long')";
 }else if($type=='buyer'){
 		
 		$curl = curl_init();
			$address1=rawurlencode($address);
			curl_setopt_array($curl, array(
				CURLOPT_URL => "https://trueway-geocoding.p.rapidapi.com/Geocode?language=en&country=IN&address=$address1",
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_ENCODING => "",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 30,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => "GET",
				CURLOPT_HTTPHEADER => array(
					"x-rapidapi-host: trueway-geocoding.p.rapidapi.com",
					"x-rapidapi-key: 3665a3639fmsh04a783ce9c61a9bp1ed5dejsnff6ae02df8af"
				),
			));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
			
		} else {
			//echo $response;
			$res=json_decode($response);
			//print_r($res);
			$lat= $res->results[0]->location->lat;
			$long= $res->results[0]->location->lng;
		}


 	$sql = "INSERT INTO buyer (firstname, lastname, username,phoneno,email,password,address,state,city,latitude,longitude) VALUES ('$firstname', '$lastname','$username',$phoneno,'$email','$password','$address','$state','$city','$lat','$long')";
 }else if($type=='transport'){
 		
 		$curl = curl_init();
			$address1=rawurlencode($address);
			curl_setopt_array($curl, array(
				CURLOPT_URL => "https://trueway-geocoding.p.rapidapi.com/Geocode?language=en&country=IN&address=$address1",
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_ENCODING => "",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 30,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => "GET",
				CURLOPT_HTTPHEADER => array(
					"x-rapidapi-host: trueway-geocoding.p.rapidapi.com",
					"x-rapidapi-key: 3665a3639fmsh04a783ce9c61a9bp1ed5dejsnff6ae02df8af"
				),
			));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
			
		} else {
			//echo $response;
			$res=json_decode($response);
			//print_r($res);
			$lat= $res->results[0]->location->lat;
			$long= $res->results[0]->location->lng;
		}

		$cost = $_POST['cost'];


 	$sql = "INSERT INTO transport (firstname, lastname, username,phoneno,email,password,address,state,city,latitude,longitude,cost) VALUES ('$firstname', '$lastname','$username',$phoneno,'$email','$password','$address','$state','$city','$lat','$long','$cost')";
 }
if(mysqli_query($link, $sql)){
    //echo "Records added successfully.";
	header("Location:login.php");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
//mysqli_close($link);
?>
