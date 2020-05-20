<?php

include('sessiontransport.php');
           $cost=$_POST['cost'];
           if(isset($cost)){

            $sql="UPDATE transport set cost=$cost where transportid=$rowid";
            
            $result = mysqli_query($link,$sql);
            header("Location:tdb.php");
           }


           ?>