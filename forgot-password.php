<!DOCTYPE html>
<html>
<head>
	<title>Forgot Password</title>
	 <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
 
</head>
<body>
	<form action="Forgotpass.php" method="post">
		<div class="form-group">
			<input type="telephone" name="phone" placeholder="  Enter Phone nmber">
		</div>

	      <div class="form-group row">
	            <select name="securityq" id="securityq" class="form-control">
	              <option value="Select Security Question">Select Security Question </option>
	              <option value="What was the name of your first/current/favorite pet?">What was the name of your first/current/favorite pet?</option>
	              <option value="Where is your favorite place to vacation?">Where is your favorite place to vacation?</option>
	              <option value="Which is your birth place?">Which is your birth place?</option>
	              <option value="Which is your favorite street food?">Which is your favorite street food?</option>
	              </select>
	            </div>

	            <div calss="form-group row">
	                <input type="text" id="securitya" name="securitya" placeholder="Security Answer" >
	            </div>

	             <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" id="password" name="password" class="form-control form-control-user" placeholder="Password">
                  </div>
                  <div class="col-sm-6">
                    <input type="password" id="cpassword" name="cpassword" class="form-control form-control-user" placeholder="Repeat Password">
                  </div>
                </div>

	            <button type="submit" id="resetpass" class="btn btn-primary btn-user btn-block">
                  Reset Password
                </button>

	</form>

</body>

</html>

