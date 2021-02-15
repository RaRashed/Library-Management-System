<?php
include_once '../dbcon.php';
session_start();
if(isset($_SESSION['student_login'])){
    header('location:index.php');
}
?>
<?php

if (isset($_POST['student_register'])){
   $fname= $_POST['fname'];
    $lname= $_POST['lname'];
     $roll= $_POST['roll'];
     $reg= $_POST['reg'];
     $department= $_POST['department'];
    $email= $_POST['email'];
    $username= $_POST['username'];
    $password= $_POST['password'];
   
    
    $phone= $_POST['phone'];

    $input_errors = array();
    if(empty($fname)){
    	$input_errors['fname'] = "First name feild is required";
    }
     if(empty($lname)){
    	$input_errors['lname'] = "last name feild is required";
    }
     if(empty($roll)){
    	$input_errors['roll'] = "Roll No feild is required";
    }
     if(empty($reg)){
    	$input_errors['reg'] = "Registration feild is required";
    }
    if(empty($department)){
        $input_errors['department'] = "Department feild is required";
    }
     if(empty($email)){
    	$input_errors['email'] = "email feild is required";
    }
     if(empty($username)){
    	$input_errors['username'] = "username feild is required";
    }
     if(empty($password)){
    	$input_errors['password'] = "password feild is required";
    }
     if(empty($phone)){
    	$input_errors['phone'] = "Phone No feild is required";


    }

if (count($input_errors)==0) {
	$email_check=mysqli_query($con,"SELECT * FROM `students` WHERE `email`='$email'");
	$email_check_row = mysqli_num_rows($email_check);
	if($email_check_row==0){


	$username_check=mysqli_query($con,"SELECT * FROM `students` WHERE `username`='$username'");
	$username_check_row = mysqli_num_rows($username_check);
	if($username_check_row==0){
		if(strlen($username)>=6){

			if(strlen($password)>=6){
				//$password_hash=password_hash($password, PASSWORD_DEFAULT);
	//$result = mysqli_query($con,"INSERT INTO students(fname, lname, roll, reg, email, username, password, status, phone) VALUES ('$fname','$lname','$roll','$reg','$email','$username','$password_hash','0','$phone')");
				$result = mysqli_query($con,"INSERT INTO students(fname, lname, roll, reg, department, email, username, password, status, phone) VALUES ('$fname','$lname','$roll','$reg','$department','$email','$username','$password','0','$phone')");
	if ($result) {
		$success = "Registration successfully";
	}
		else {

			$error= "Something is wrong";
		}


			}
			else{
			$password_error ="Password more than 8 characters";
		}


		}
		else{
			$username_exists ="username more than 8 characters";
		}
		}
		else{
			$username_exists="this username already exists";
		}


		


	}
	else{
		$email_exists = "this email already exits";
	}


	/* $password_hash=password_hash($password, PASSWORD_DEFAULT);
	$result = mysqli_query($con,"INSERT INTO students(fname, lname, roll, reg, email, username, password, status, phone) VALUES ('$fname','$lname','$roll','$reg','$email','$username','$password_hash','0','$phone')");
	if ($result) {
		$success = "Registration successfully";
	}
		else {

			$error= "Something is wrong";
		}
		*/
	}
	
}

   
    
    /*$result = " INSERT INTO students(fname, lname, roll, reg, email, username, password, status, phone) VALUES ('$fname','$lname','$roll','$reg','$email','$username','$password_hash','0','$phone') ";
  if(mysqli_query($con,$result)){
	echo "<script>alert('new record successfully added');</script>";

	
	}
	else{
		echo "<script>alert('new record not added');</script>";

	}*/




?>

<!doctype html>
<html lang="en" class="fixed accounts sign-in">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Registration</title>
    <link rel="apple-touch-icon" sizes="120x120" href="favicon/apple-icon-120x120.png">
    <link rel="icon" type="image/png" sizes="192x192" href="favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <!--BASIC css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="../assets/vendor/animate.css/animate.css">
    <!--SECTION css-->
    <!-- ========================================================= -->
    <!--TEMPLATE css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../assets/stylesheets/css/style.css">
</head>

<body>
<div class="wrap">
    <!-- page BODY -->
    <!-- ========================================================= -->
    <div class="page-body animated slideInDown">
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
        <!--LOGO-->
        <div class="logo">
            <img alt="logo" src="../assets/images/rashed.jpg" />
            <?php
            if (isset($success)) {

            	?>

<div class="alert alert-success" role="alert">
  <?= $success ?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  	<span aria-hidden="true">&times;</span>
  </button>
</div>

            	<?php
            	
            }

            ?>
             <?php
            if (isset($error)) {

            	?>

<div class="alert alert-danger" role="alert">
  <?= $error ?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  	<span aria-hidden="true">&times;</span>
  </button>
</div>

            	<?php
            	
            }

            ?>
                       <?php
            if (isset($email_exists)) {

            	?>

<div class="alert alert-danger" role="alert">
  <?= $email_exists ?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  	<span aria-hidden="true">&times;</span>
  </button>
</div>

            	<?php
            	
            }

            ?>
            <?php
            if (isset($username_exists)) {

            	?>

<div class="alert alert-danger" role="alert">
  <?= $username_exists ?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  	<span aria-hidden="true">&times;</span>
  </button>
</div>

            	<?php
            	
            }

            ?>

            <?php
            if (isset($password_error)) {

            	?>

<div class="alert alert-danger" role="alert">
  <?= $password_error ?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  	<span aria-hidden="true">&times;</span>
  </button>
</div>

            	<?php
            	
            }

            ?>





                 
        </div>
 
        <div class="box">
            <!--SIGN IN FORM-->
            <div class="panel mb-none">
                <div class="panel-content bg-scale-0">
                    <form method="post" action="<?= $_SERVER['PHP_SELF'] ?>">
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" placeholder="First Name" name="fname" value="<?=isset($fname) ? $fname:''?>">
                                <i class="fa fa-user"></i>
                            </span>
                             <?php
                            if (isset($input_errors['fname'])) {
                            	echo '<span class="input-errors">'.$input_errors['fname'].'</span>';
                            }
                            ?>
                        </div>
                         <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" placeholder="Last Name" name="lname" value="<?=isset($lname) ? $lname:''?>">
                                <i class="fa fa-user"></i>
                            </span>

                            <?php
                            if (isset($input_errors['lname'])) {
                            	echo '<span class="input-errors">'.$input_errors['lname'].'</span>';
                            }
                            ?>
                        </div>
                          <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" placeholder="Roll" name="roll" pattern="[0-9]{6}" value="<?=isset($roll) ? $roll:''?>">
                                <i class="fa fa-user"></i>
                            </span>

                            <?php
                            if (isset($input_errors['roll'])) {
                            	echo '<span class="input-errors">'.$input_errors['roll'].'</span>';
                            }
                            ?>
                        </div>
                         <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" placeholder="Reg. No." name="reg" pattern="[0-9]{6}" value="<?=isset($reg) ? $reg:''?>">
                                <i class="fa fa-user"></i>
                            </span>

                            <?php
                            if (isset($input_errors['reg'])) {
                            	echo '<span class="input-errors">'.$input_errors['reg'].'</span>';
                            }
                            ?>
                        </div>




                            <div class="form-group mt-md">
                            <span class="input-with-icon">

                                <i class="fa fa-user"></i>
                                <select class="form-control" name="department"  value="<?=isset($department) ? $department:''?>" >
                                    <option></option>
                                    <option>B.Sc. Engg. in CSE</option>
                                    <option>EEE</option>
                                    <option>Civil</option>
                                    <option>Mechanical</option>
                                    <option>LLB</option>
                                    <option>BBA</option>
                                </select>
                            </span>

                            <?php
                            if (isset($input_errors['department'])) {
                                echo '<span class="input-errors">'.$input_errors['department'].'</span>';
                            }
                            ?>
                        </div>








                        
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="email" class="form-control" placeholder="Email" name="email" value="<?=isset($email) ? $email:''?>">
                                <i class="fa fa-envelope"></i>
                            </span>

                            <?php
                            if (isset($input_errors['email'])) {
                            	echo '<span class="input-errors">'.$input_errors['email'].'</span>';
                            }
                            ?>
                        </div>
                         <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" placeholder="User Name" name="username" value="<?=isset($username) ? $username:''?>">
                                <i class="fa fa-user"></i>
                            </span>

                            <?php
                            if (isset($input_errors['username'])) {
                            	echo '<span class="input-errors">'.$input_errors['username'].'</span>';
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <span class="input-with-icon">
                                <input type="password" class="form-control" placeholder="Password" name="password">
                                <i class="fa fa-key"></i>
                            </span>

                            <?php
                            if (isset($input_errors['password'])) {
                            	echo '<span class="input-errors">'.$input_errors['password'].'</span>';
                            }
                            ?>
                        </div>
                     
                         <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" placeholder="01*********" name="phone" pattern="01[3|4|5|6|7|8|9][0-9]{8}">
                                <i class="fa fa-user"></i>
                            </span>

                            <?php
                            if (isset($input_errors['phone'])) {
                            	echo '<span class="input-errors">'.$input_errors['phone'].'</span>';
                            }
                            ?>
                        </div>
                      
                        <div class="form-group">
                        
                        <input class="btn btn-primary btn-block" type="submit" name="student_register" value="Register">
                        
                        </div>
                        <div class="form-group text-center">
                            Have an account?, <a href="sign-in.php">Sign In</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    </div>
</div>
<!--BASIC scripts-->
<!-- ========================================================= -->
<script src="../assets/vendor/jquery/jquery-1.12.3.min.js"></script>
<script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="../assets/vendor/nano-scroller/nano-scroller.js"></script>
<!--TEMPLATE scripts-->
<!-- ========================================================= -->
<script src="../assets/javascripts/template-script.min.js"></script>
<script src="../assets/javascripts/template-init.min.js"></script>
<!-- SECTION script and examples-->
<!-- ========================================================= -->
</body>


</html>
