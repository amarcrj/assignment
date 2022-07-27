<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "assignment";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['loginform'])){
    extract($_POST);
    if(1){
        $sql = "select * from users where uname='$uname' and upass='$upass'";
        $result = mysqli_query($conn,$sql);
        $count = mysqli_num_rows($result);
        if($count>0){
            $_SESSION['user_logged_in']=TRUE;
            header("location: landing.php");
            exit();
        }else{
            echo "DB Error!!!";
        }
    }else{
        die("Internal Error!!!");
    }
}

if(isset($_POST['signupform'])){
    extract($_POST);
    $ustat="ACTIVE";
    if($upass==$againupass){
        $sql = "INSERT INTO users (uname, upass, ustat)
                VALUES ('$uname', '$upass', '$ustat')";
        if ($conn->query($sql) === TRUE) {
            echo "<br/><p class='alert alert-success text-center'>Signup Success!!!</p><br/>";
        }else{
            echo "DB Error!!!";
        }
    }else{
        die("Re-password doesnot match");
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login & Signup - Assignment</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">        
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <section class="vh-100">
            <div class="container-fluid h-custom">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-md-4 col-lg-4">
                        <form method="POST" action="#">
                            <h2>Signup Form</h2>
                            <br/>
                            <div class="form-outline mb-4">
                              <input type="text" name="uname" class="form-control" required/>
                              <label class="form-label" for="registerUsername">Username</label>
                            </div>
                            <div class="form-outline mb-4">
                              <input type="password" name="upass" class="form-control" required/>
                              <label class="form-label" for="registerPassword">Password</label>
                            </div>
                            <div class="form-outline mb-4">
                              <input type="password" name="againupass" class="form-control" required/>
                              <label class="form-label" for="registerRepeatPassword">Repeat password</label>
                            </div>
                            <div class="form-check d-flex justify-content-center mb-4">
                                <i class="fa fa-check"></i> By Signing up, I agree to the terms and conditions
                            </div>
                            <button type="submit" name="signupform" class="btn btn-primary btn-block mb-3">Sign up</button>
                        </form>
                    </div>
                    <div class="col-md-2 col-lg-2"></div>
                    <div class="col-md-4 col-lg-4">
                        <h2>Login Form</h2>
                        <br/>
                        <form method="POST" action="#">
                            <div class="form-outline mb-4">
                                <input type="text" name="uname" class="form-control" required/>
                                <label class="form-label" for="loginName">Email or username</label>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="password" name="upass" class="form-control" required/>
                                <label class="form-label" for="loginpassword">Password</label>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6 d-flex justify-content-center">
                                    <!-- Checkbox -->
                                    <div class="form-check mb-3 mb-md-0">
                                        <input class="form-check-input" type="checkbox" value="" id="loginCheck" checked />
                                        <label class="form-check-label" for="loginCheck"> Remember me </label>
                                    </div>
                                </div>
                                <div class="col-md-6 d-flex justify-content-center">
                                    <!-- Simple link -->
                                    <a href="#!">Forgot password?</a>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success btn-block mb-4" name="loginform">Sign in</button>

                          <!-- Register buttons -->
                          <div class="text-center">
                            <p>Not a member? <a href="#pills-register">Register</a></p>
                          </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
                <div class="text-white mb-3 mb-md-0">
                    Copyright © 2022. All rights reserved.
                </div>
                <div class="text-white">
                    Designed & Developed By Amar Sinha
                </div>
            </div>
        </section>
        <script src="js/bootstrap.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
    </body>
</html>
