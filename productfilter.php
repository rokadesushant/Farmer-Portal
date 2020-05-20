 <?php  
 include_once("database.php");
  include("inc/config.inc.php"); 
  include("inc/header.php"); 
  include('sessionbuyer.php');
  //extract($_POST);


              $output1='<table class="table table-bordered" id="shopping-cart-results" width="100%" cellspacing="0">
                    
                    <tr>
                      <th>Product Name</th>
                      <th>Price</th>
                      <th>Available Quantity</th>
                      <th>Quantity</th>
                      <th>Farmer Name</th>
                      <th>Farmer Phone</th>
                      <th class="cart-counter"><a href="viewcart.php" class="btn btn-primary">
                        <span class="cart-item" id="cart-container">';
                        echo $output1;

                        if(isset($_POST["addid"])){
                                echo "View Cart:y";
                                echo count($_SESSION["products"]); 
                                } else {
                                    echo "View Cart:";
                                    echo 0; 
                              }
                
                $output='';

              $output.='Products
                          
                        </span><i class="glyphicon glyphicon-menu-right"></i></a></th>
                    </tr>
                    
                 
                            ';
                          
      
                

                    $sql_query = "SELECT u.firstname,u.phoneno,p.productid, p.productname, p.quantity, p.type, p.price, p.farmerid,p.latitude as plat,p.longitude as plong ,b.latitude as blat,b.longitude as blong FROM product p,user u,buyer b WHERE p.farmerid=u.id and p.quantity>0 and b.buyerid=$rowid GROUP BY p.productid";  
                      $resultset = mysqli_query($link, $sql_query) or die("database error:". mysqli_error($link));
                    while( $row = mysqli_fetch_assoc($resultset) ) {
                      $lat1=$row["blat"];
                      $long1=$row["blong"];
                      $lat2=$row["plat"];
                      $long2=$row["plong"];
                      $curl = curl_init();

                      curl_setopt_array($curl, array(
                        CURLOPT_URL => "https://trueway-matrix.p.rapidapi.com/CalculateDrivingMatrix?destinations=$lat2%252C$long2&origins=$lat1%252C$long1",
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_FOLLOWLOCATION => true,
                        CURLOPT_ENCODING => "",
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 30,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => "GET",
                        CURLOPT_HTTPHEADER => array(
                          "x-rapidapi-host: trueway-matrix.p.rapidapi.com",
                          "x-rapidapi-key: 3665a3639fmsh04a783ce9c61a9bp1ed5dejsnff6ae02df8af"
                        ),
                      ));
                      ini_set('max_execution_time', 60);
                      $response = curl_exec($curl);
                      $err = curl_error($curl);

                      curl_close($curl);

                      if ($err) {
                        echo "cURL Error #:" . $err;
                      } else {
                        $res=json_decode($response);
                        $distance=($res->distances[0][0])/1000;
                      }
                      if($distance<=$_POST['radius'])
                      {

                        //echo $distance;
             
              $output.='  
                        <tr>
                          <form class="product-form">
                          <td>'.$row["productname"].'</td>
                          <td>'.$currency.''.$row["price"].'</td>
                          <td>'.$row["quantity"].'</td>
                          <td><input type="number" name="product_qty" min="1" value="1"max="'.$row["quantity"].'"></td>
                          <td>'.$row["firstname"].'</td>
                          <td>'.$row["phoneno"].'</td> 

                          <input name="productid" type="hidden" value="'. $row["productid"].'">
                          <input name="farmerid" type="hidden" value="'.$row["farmerid"].'">
                          <input name="quantity" type="hidden" value="'.$row["quantity"].'">
                          <input name="latitude" type="hidden" value="'.$row["plat"].'">
                          <input name="longitude" type="hidden" value="'.$row["plong"].'">
                          <td><button  type="submit" onclick="addtocart('.$row['productid'].')" class="btn btn-success">Add to Cart</button></td>
                         </form>
                        </tr>
                        ';
                      }
                    }
                    $output.='  
                        
      </table>';
                   
                    echo $output;
            
        ?>