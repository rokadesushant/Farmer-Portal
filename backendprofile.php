
<?php

include"database.php";
include('sessionbuyer.php');
extract($_POST);

if(isset($_POST['readrecords'])){

	$data =  '<table class="table table-bordered table-striped ">
						<tr class="bg-dark text-white">
							<th>First Name</th>
							<th>Last Name</th>
							<th>Email</th>
							<th>Username</th>
							<th>Phone No</th> 
							<th>Address</th>
							<th>State</th>
							<th>City</th>
							<th>Edit</th>
						</tr>'; 

	$displayquery = " SELECT * FROM `buyer` where buyerid='$rowid'"; 
	$result = mysqli_query($link,$displayquery);

	if(mysqli_num_rows($result) > 0){

		$number = 1;
		while ($row = mysqli_fetch_array($result)) {
			
			$data .= '<tr>  
				
				<td>'.$row['firstname'].'</td>
				<td>'.$row['lastname'].'</td>
				<td>'.$row['email'].'</td>
				<td>'.$row['username'].'</td>
				<td>'.$row['phoneno'].'</td>
				<td>'.$row['address'].'</td>
				<td>'.$row['state'].'</td>
				<td>'.$row['city'].'</td>
				<td>
					<button onclick="GetUserDetails('.$row['buyerid'].')" class="btn btn-success">Edit</button>
				</td>
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
if(isset($_POST['id']) != "")
{
    $user_id = $_POST['id'];
    $query = "SELECT * FROM buyer WHERE buyerid = '$user_id'";
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
    $id = $_POST['hidden_user_id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $phoneno= $_POST['phoneno'];
    $address= $_POST['address'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $query = "UPDATE buyer SET firstname = '$firstname',lastname = '$lastname', email = '$email',username = '$username', phoneno = '$phoneno', address = '$address' ,state='$state',city = '$city' WHERE buyerid = '$rowid' ";
    if (!$result = mysqli_query($link,$query)) {
        exit(mysqli_error());
    }
}

?>