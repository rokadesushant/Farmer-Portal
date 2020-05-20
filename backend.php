<?php

include"database.php";
include('session.php');
extract($_POST);

if(isset($_POST['readrecords'])){

	$data =  '<table class="table table-bordered table-striped ">
						<tr class="bg-dark text-white">
							<th>No.</th>
							<th>Product Name</th>
							<th>Quantity</th>
							<th>Type</th>
							<th>Price</th> 
							<th>address</th>
						</tr>'; 

	$displayquery = " SELECT * FROM `product` where farmerid='$rowid'"; 
	$result = mysqli_query($link,$displayquery);


	if(mysqli_num_rows($result) > 0){

		$number = 1;
		while ($row = mysqli_fetch_array($result)) {
			
			$data .= '<tr>  
				<td>'.$number.'</td>
				<td>'.$row['productname'].'</td>
				<td>'.$row['quantity'].'</td>
				<td>'.$row['type'].'</td>
				<td>'.$row['price'].'</td>
				<td>'.$row['address'].'</td>
				
    		</tr>';
    		$number++;

		}
	} 
	 $data .= '</table>';
    	echo $data;

}

//adding records in database
/*if(isset($_POST['productname']) &&  isset($_POST['quantity']) && isset($_POST['type']) && isset($_POST['price']) && isset($_POST['image']))
	{
		echo "connection";
		$query = " INSERT INTO `product`( `productname`, `quantity`, `type`, `price`,`image`) VALUES('$productname', '$quantity', '$type', '$price','$image' )   ";

		if($result = mysqli_query($conn,$query)){
			exit(mysqli_error());
		}else{
			echo "1 record added";
		}


	}*/
	// pass id on modal
if(isset($_POST['productid']) != "")
{
    $user_id = $_POST['productid'];
    $query = "SELECT * FROM product WHERE productid = '$user_id'";
    if (!$result = mysqli_query($link,$query)) {
        exit(mysqli_error());
    }
    
    $response = array();

    if(mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
       
            $response = $row;
        }
    }
  //  // agar ek bhi value nai milta hai tho data not found no. of rows 0 hai tho
    else
    {
        $response['status'] = 200;
        $response['message'] = "Data not found!";
    }
   //     PHP has some built-in functions to handle JSON.
// Objects in PHP can be converted into JSON by using the PHP function json_encode(): 

    echo json_encode($response);
}
// ye top wala id jo humhe mil raha hai uska hai jaha wo id check karega sahi hai ya nai agar nai tho invalid req boldega...
else
{
    $response['status'] = 200;
    $response['message'] = "Invalid Request!";
}
//////////////// update table//////////////

if(isset($_POST['hidden_user_id']))
{
    // get values
    $productid = $_POST['hidden_user_id'];
    $productname = $_POST['productname'];
    $quantity = $_POST['quantity'];
    $type = $_POST['type'];
    $price = $_POST['price'];
    $address = $_POST['address'];

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


    $query = "UPDATE product SET productname = '$productname', quantity = '$quantity', type = '$type', price = '$price' ,address='$address',latitude='$lat',longitude='$long' WHERE productid = '$productid' and farmerid='$rowid'";
    if (!$result = mysqli_query($link,$query)) {
        exit(mysqli_error());
    }
}
/////////////Delete user record /////////

if(isset($_POST['deleteid']))
{

	$user_id = $_POST['deleteid']; 

	$deletequery = " delete from product where productid ='$user_id' and farmerid='$rowid' ";
	if (!$result = mysqli_query($link,$deletequery)) {
        exit(mysqli_error());

}

}

?>








