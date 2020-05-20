

           <?php

include('database.php');
include('sessiontransport.php');

extract($_POST);
if(isset($_POST['readrecords'])){

  $data =  '<table class="table table-bordered table-striped ">
            <tr class="bg-dark text-white">
              <th>Buyer Name</th>
              <th>Product Name</th>
              <th>Buyer Contact</th>
             <th>Quanity </th> 
            </tr>'; 

      $queryt="SELECT b.firstname,bp.productname,b.phoneno,bp.quantity from buyer b, product p, buyerproduct bp where b.buyerid=bp.buyerid and bp.transportid=$rowid";

                $ses = mysqli_query($link,$queryt);
                //$rowt = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
                if(mysqli_num_rows($ses) > 0){

    $number = 1;
    while ($row = mysqli_fetch_array($ses)) {
      
      $data .= '<tr>  
        <td>'.$number.'</td>
        <td>'.$row['firstname'].'</td>
        <td>'.$row['productname'].'</td>
        <td>'.$row['phoneno'].'</td>
              <td>'.$row['quantity'].'</td>
        </tr>';
        $number++;

    }
  } 
   $data .= '</table>';
      echo $data;
}


        ?>