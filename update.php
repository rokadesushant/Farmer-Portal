<?php
  include('session.php');
?><!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Dashboard</title>

  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">
  <div id="wrapper">
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="db.php">
        <img src="icon.png">
        <div class="sidebar-brand-text mx-3">Cropify</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item">
        <a class="nav-link" href="db.php">
          <i class="fas fa-fw fa-th-large"></i>
          <span>Dashboard</span></a>
      </li>

      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Interface
      </div>

      <li class="nav-item active">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePortal" aria-expanded="true" aria-controls="collapsePortal">
          <i class="fas fa-fw fa-folder"></i>
          <span>Portal</span>
        </a>
        <div id="collapsePortal" class="collapse show" aria-labelledby="headingPortal" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="insert.php">Insert</a>
            <a class="collapse-item active" href="update.php">Update</a>
           
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOrders" aria-expanded="true" aria-controls="collapseOrders">
          <i class="fas fa-fw fa-shopping-cart"></i>
          <span>Orders</span>
        </a>
        <div id="collapseOrders" class="collapse" aria-labelledby="headingOrders" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="pend.php">Pending</a>
            <a class="collapse-item" href="stock.php">Stock</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAnalytics" aria-expanded="true" aria-controls="collapseAnalytics">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Analytics</span>
        </a>
        <div id="collapseAnalytics" class="collapse" aria-labelledby="headingAnalytics" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="charts.php">Charts</a>
           
          </div>
        </div>
      </li>

      <hr class="sidebar-divider">

      <div class="sidebar-heading">
        Add-ons
      </div>

      <li class="nav-item">
        <a class="nav-link" href="profile.php">
          <i class="fas fa-fw fa-user"></i>
          <span>Profile</span>
        </a>
      
      </li>

     <li class="nav-item">
        <a class="nav-link" href="about.php">
          <i class="fas fa-fw fa-file"></i>
          <span>About</span>
        </a>
      
      </li>

      <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
          <i class="fas fa-fw fa-sign-out-alt"></i>
          <span>Logout</span></a>
      </li>

      <hr class="sidebar-divider d-none d-md-block">

      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>

    <div id="content-wrapper" class="d-flex flex-column">

      <div id="content">
 <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <ul class="navbar-nav ml-auto">

            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                  <?php
                    echo $login_session;
                  ?>
                </span>
                <i class="fas fa-fw fa-user"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="profile.php">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
              

                <a class="dropdown-item" href="about.php">
                  <i class="fas fa-file fa-sm fa-fw mr-2 text-gray-400"></i>
                  About
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>


        <div class="container-fluid">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Update</h1>
          </div>
        </div>




















<div class="container">
  
  

  <div >  
      <div id="records_content">  </div>
    </div>
  </div>



<!-- //////////////// after update ////////////////// -->
<div class="modal fade" id="update_user_modal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Update Items</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

    

      <!-- Modal body -->
      <div class="modal-body">
        <div class="form-group">
          <label>Product Name:</label>
          <input type="text" name="productname" id="update_productname" class="form-control">
        </div>
        <div class="form-group">
          <label>Quantity:</label>
          <input type="text" name="quantity" id="update_quantity" class="form-control">
        </div>

        <div class="form-group">
    <select name="type" id="update_type">
      <option value="">Choose Unit:</option>
       <option value="kg" >kg</option>
      <option  value="quintal">quintal</option>
      <option value="ton">ton</option>
    </select>
    
   </div>
        <div class="form-group">
          <label>Price:</label>
          <input type="text" name="price" id="update_price" class="form-control">
        </div>


        <div class="form-group">
          <label> address:</label>
          
          <input  type="text" name="address" id="address" class="form-control">
        </div>

         
      </div>



      <!-- Modal footer -->
     <div class="modal-footer">
                  <button type="button" class="btn btn-primary" onclick="UpdateUserDetails()" >Update</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                  <input type="hidden" id="hidden_user_id">
   </div>



    </div>
  </div>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

<script>
  
$(document).ready(function () {
    readRecords(); 
  });

  

readRecords();
//////////////////Display Records
  function readRecords(){
    
    var readrecords = "readrecords";
    $.ajax({
      url:"backend2.php",
      type:"POST",
      data:{readrecords:readrecords},
      success:function(data,status){
        $('#records_content').html(data);
      },

    });
  }


/////////////delete userdetails ////////////
function DeleteUser(deleteid){

  var conf = confirm("Are u sure?");
  if(conf == true) {
  $.ajax({
    url:"backend2.php",
    type:'POST',
    data: {  deleteid : deleteid},

    success:function(data, status){
      readRecords();
    }
  });
  }
}



function GetUserDetails(id){
    $("#hidden_user_id").val(id);
    $.post("backend2.php", {
            productid: id
        },
        function (data, status) {
            //alert(data);
            //JSON.parse() parses a string, written in JSON format, and returns a JavaScript object.
            var user = JSON.parse(data);
            //alert(user);
            console.log(user);

            $("#update_productname").val(user.productname);
            $("#update_quantity").val(user.quantity);
            $("#update_type").val(user.type);
            $("#update_price").val(user.price);
            $("#address").val(user.address);
        }
    );
    $("#update_user_modal").modal("show");
}




function UpdateUserDetails() {
    var productname = $("#update_productname").val();
    var quantity = $("#update_quantity").val();
    var type= $("#update_type").val();
    var price = $("#update_price").val();
    var address= $("#address").val();
    var hidden_user_id = $("#hidden_user_id").val();
    $.post("backend2.php", {
            hidden_user_id: hidden_user_id,
            productname: productname,
            quantity: quantity,
            type: type,
            price: price,
            address: address
        },
        function (data, status) {
            $("#update_user_modal").modal("hide");
            readRecords();
        }
    );
}

</script>




















      </div>


     <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto"id="google_translate_element">
            Copyright &copy; Cropify 2020

<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
          </div></div>
      </footer>

    </div>

  </div>

  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>



  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <script src="js/sb-admin-2.min.js"></script>
  <script src="vendor/chart.js/Chart.min.js"></script>

  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

  </body>
</html>