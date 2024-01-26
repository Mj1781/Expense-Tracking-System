<?php
    session_start();
    $msg = "";
    if(isset($_POST['login'])){
        $username= $_POST['email'];
        $password = md5($_POST['password']);
        // include './dbconfig.php';
        // $con = mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DBNAME);
        include './dbconfig.php';
        $con = mysqli_connect(HOSTNAME, USERNAME, "",DBNAME);
        $qry = "select * from user_master where email = '$username' and password ='$password'";
        $resultset = mysqli_query($con,$qry);
        if(mysqli_num_rows($resultset)>0){
            $row = mysqli_fetch_array($resultset);
            $_SESSION['uname']=$row[0];
            $_SESSION['userid']=$row[1];
            $_SESSION['umobile']=$row[2];
            $_SESSION['uimage']=$row[4];
            header("location:home.php");
        }
        else{
            $msg= "Invalid username and password !!!!!!";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h1>Daily Expense Tracker</h1>
    <div class="container">
        <form method="post">
            <h3>Log in</h3>
            <p><?php echo "<center><font color='green'>" . $msg . "</font></center>"?></p>
            <div class="form-group">
                <hr>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    placeholder="Enter email">
            </div>
            <div class="form-group">
                <h5><a href="forgot_password.php">Forgot Password?</a></h5>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <button type="submit" name="login" class="btn btn-primary">Login</button>
            <span class="reg-btn"><a href="signup.php"><input type="button" class="btn btn-primary btn-right" value="Register"></a></span>
        </form>
    </div>
</body>

</html>