<!DOCTYPE html>
<html lang="en">
<?php
include("database.php");
?>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Register</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="css/sb-admin-3.min.css" rel="stylesheet">
  <script src="cities.js"></script>
  <script>
          function show(value){
              var a=document.getElementById('cost');
              if(value=="transport")
              {
              
                a.style.display="block";
              }
              else
              {
                a.style.display="none";
              }
          }
        </script>
</head>



<body class="bg-gradient-primary">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">        
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
              </div>
              <form class="user" id="first_form" method="post" action="registerinsert.php">
                <input type="radio" name="type" id="farmer" value="farmer" checked onclick="show('farmer')"> Farmer
                <input type="radio" name="type" id="buyer" value="buyer" onclick="show('buyer')"> Buyer
                <input type="radio" name="type" id="transport" value="transport" onclick="show('transport')"> Transporter<br>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" id="first_name" name="firstname" class="form-control form-control-user" placeholder="First Name">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" id="last_name" name="lastname" class="form-control form-control-user" placeholder="Last Name">
                  </div>
                </div>
                <div class="form-group">
                  <input type="email" id="email" name="email" class="form-control form-control-user" placeholder="Email Address">
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" id="username" name="username" class="form-control form-control-user" placeholder="Username">
                  </div>
                  <div class="col-sm-6">
                    <input type="telphone" id="phoneno" name="phoneno" class="form-control form-control-user" placeholder="Phone No.">
                  </div>
                </div>
                <div class="form-group">
                  <textarea type="text" id="address" name="address" rows="2" cols="5" class="form-control form-control-user" placeholder="H.No Street(Product Address)" style="border-radius: 30px;"></textarea>
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
                 
                <div class="form-group">
                  <input style="display: none;" class="form-control form-control-user" type="text" name="cost" id="cost"  placeholder="Cost/km.">
                </div>
                  

                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" id="password" name="password" class="form-control form-control-user" placeholder="Password">
                  </div>
                  <div class="col-sm-6">
                    <input type="password" id="cpassword" name="cpassword" class="form-control form-control-user" placeholder="Repeat Password">
                  </div>
                </div>
                <button type="submit" id="formsubmit" class="btn btn-primary btn-user btn-block">
                  Register Account
                </button>
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="forgot-password.html">Forgot Password?</a>
              </div>
              <div class="text-center">
                <a class="small" href="login.php">Already have an account? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/sb-admin-2.min.js"></script>
</body>
</html>