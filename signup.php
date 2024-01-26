<?php
    $msg ="";
    if(isset($_POST['submit'])){
        $name= $_POST['name'];
        $email= $_POST['email'];
        $no= $_POST['no'];
        $pass=md5($_POST['password']);
        $path="";
        if($_FILES['myfile']['error']==0){
            $from = $_FILES['myfile']['tmp_name'];
            $to = $_SERVER['DOCUMENT_ROOT']."/MyApp/expenseTracking/images/".$_FILES['myfile']['name'];
            if(move_uploaded_file($from,$to)){
                $path = "images/".$_FILES['myfile']['name'];
                include './dbconfig.php';
                $conn = mysqli_connect(HOSTNAME, USERNAME, "",DBNAME);
                $qry = "insert into user_master values ('$name','$email',$no,'$pass','$path')";
                mysqli_query($conn,$qry);
                $msg = "Signup Successful !!!";
            }
            else {
                $msg= "Signup not Successful !!!";
            }
            mysqli_close($conn);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h1>Daily Expense Tracker</h1>
    <div class="container">
        <form onsubmit="return validateForm()" method="post" enctype="multipart/form-data">
            <h3>Sign Up</h3>
            <p><?php echo "<center><font color='green'>" . $msg . "</font></center>"?></p>
            <div class="form-group">
                <hr>
                <input type="text" class="form-control" name="name" placeholder="Full Name" required>
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="E-mail" required>
            </div>
            <div class="form-group">
                <input type="number" class="form-control" id="mobilenumber" name="no" placeholder="Mobile Number" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" id="p1" name="password" placeholder="Password" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" id="p2" name="txt-rpwd" placeholder="Repeat Password" required>
            </div>
            <form>
                <div class="form-group">
                  <input type="file" class="form-control" name="myfile" id="exampleFormControlFile1">
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Register</button>
                <span class="reg-btn"><a href="index.php"><input type="button" class="btn btn-primary btn-right" value="Login"></a></span>
              </form>

        </form>
    </div>
    <script src="js/main.js"></script>
</body>

</html>