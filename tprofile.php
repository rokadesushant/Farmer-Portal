 <?php
          include_once("database.php");
          include("inc/config.inc.php"); 
          include("inc/header.php"); 
          include('sessiontransport.php');
        ?>
<!DOCTYPE html>
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
  <!--<style type="text/css">
    .cart-counter xyz
    {
        background: #fff;
        box-shadow: 0px;
    }
  </style>-->

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
        <a class="nav-link" href="tdb.php">
          <i class="fas fa-fw fa-th-large"></i>
          <span>Dashboard</span></a>
      </li>

      <hr class="sidebar-divider">


      <li class="nav-item">
        <a class="nav-link" href="torders.php">
          <i class="fas fa-fw fa-shopping-cart"></i>
          <span>Orders</span>
        </a>
      </li>


      <hr class="sidebar-divider">

      <div class="sidebar-heading">
        Add-ons
      </div>

      <li class="nav-item active">
        <a class="nav-link" href="tprofile.php">
          <i class="fas fa-fw fa-user"></i>
          <span>Profile</span>
        </a>
      
      </li>

      <li class="nav-item">
        <a class="nav-link" href="tabout.php">
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
            <h1 class="h3 mb-0 text-gray-800">Profile</h1>
          </div>
        </div>




        <div class="container">
          <div>
            <div id="records_content">  </div>
          </div>
        </div>


        <div class="modal fade" id="update_user_modal">
          <div class="modal-dialog">
            <div class="modal-content">

              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Update Profile</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>

            

              <!-- Modal body -->
              <div class="modal-body">
                <div class="form-group">
                  <label>First Name:</label>
                  <input type="text" id="update_firstname" name="firstname" class="form-control">
                </div>

                <div class="form-group">
                  <label>Last Name:</label>
                  <input type="text" name="lastname" id="update_lastname" class="form-control">
                </div>

                <div class="form-group">
                  <label>Email:</label>
                  <input type="email" name="email" id="update_email" class="form-control">
                </div>

            
                <div class="form-group">
                  <label>Username:</label>
                  <input type="text" name="username" id="update_username" class="form-control">
                </div>

                <div class="form-group">
                  <label>Phone No:</label>
                  <input type="telphone" name="phoneno" id="update_phoneno" class="form-control">
                </div>
              
                <div class="form-group">
                    <label>Address:</label>
                      <textarea type="text" id="update_address" name="address" class="form-control"></textarea>
                </div>

                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <select onchange="print_city('city', this.selectedIndex);" id="state" name ="state" class="form-control " required style="border-radius: 30px;"></select>
                  </div>
                  <div class="col-sm-6">
                    <select id ="city" name="city" class="form-control " required style="border-radius: 30px;"></select>
                    <script language="javascript">print_state("state");</script>
                  </div>
                </div>
              



                    <!-- Modal footer -->
                <div class="modal-footer">
                  <button type="button" class="btn btn-primary" onclick="UpdateUserDetails()" >Update Details</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                  <input type="hidden" id="hidden_user_id">
                </div>
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

            function readRecords(){
                
                var readrecords = "readrecords";
                $.ajax({
                  url:"backend4.php",
                  type:"POST",
                  data:{readrecords:readrecords},
                  success:function(data,status){
                    $('#records_content').html(data);
                  },

                });
              }

            function GetUserDetails(id){
                $("#hidden_user_id").val(id);
                $.post("backend4.php", {
                        id: id
                    },
                    function (data, status) {
                        //alert(data);
                        //JSON.parse() parses a string, written in JSON format, and returns a JavaScript object.
                        //alert("done");
                      var user = JSON.parse(data);
                        
                        //alert(user);

                      $("#update_firstname").val(user.firstname);
                      $("#update_lastname").val(user.lastname);
                      $("#update_email").val(user.email);
                      $("#update_username").val(user.username);
                      $("#update_phoneno").val(user.phoneno);
                      $("#update_address").val(user.address);
                      $("#state").val(user.state);
                      $("#city").val(user.city);
                    }
                );
                $("#update_user_modal").modal("show");
            }




            function UpdateUserDetails() {
              var firstname = $("#update_firstname").val();
              var lastname = $("#update_lastname").val();
              var email = $("#update_email").val();
              var username = $("#update_username").val();
              var phoneno= $("#update_phoneno").val();
              var address = $("#update_address").val();
              var state= $("#state").val();
              var city= $("#city").val();
              var hidden_user_id = $("#hidden_user_id").val();
              $.post("backend4.php", {
                      hidden_user_id: hidden_user_id,
                      firstname: firstname,
                      lastname: lastname,
                      email: email,
                      username: username,
                      phoneno: phoneno,
                      address: address,
                      state: state,
                      city: city
                      
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
                        
            </div>
          </div>
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