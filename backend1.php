<?php

$conn = mysqli_connect('localhost','root',"",'farmer');
include('session.php');

//extract($_POST);

if(isset($_POST['productname']) && isset($_POST['quantity']) && isset($_POST['type']) && isset($_POST['price']) )
{
	$productname=$_POST['productname'];
	$quantity=$_POST['quantity'];
	$type=$_POST['type'];
	$price=$_POST['price'];
	$address=$_POST['address'];
	$sql="SELECT latitude,longitude,address from user where farmerid=$rowid ";
	$res=mysqli_query($conn,$sql);
	$row=mysqli_fetch_array($res,MYSQLI_ASSOC);
	if($row["address"]==$address)
	{
		$query = " INSERT INTO product(productname, quantity, type, price,farmerid,address,latitude,longitude) VALUES ( '$productname',  '$quantity', '$type', '$price','$rowid','$address',".$row["latitude"].",".$row["longitude"].") ";
	}
	else
	{
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

		$query = " INSERT INTO product(productname, quantity, type, price,farmerid,address,latitude,longitude) VALUES ( '$productname',  '$quantity', '$type', '$price','$rowid','$address','$lat','$long') ";
	}
	mysqli_query($conn,$query);

}

?>