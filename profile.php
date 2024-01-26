<?php
    session_start();
    if(!isset($_SESSION['userid'])){
        header("location:index.php");
    }
    $name= $_SESSION['uname'];
    $email= $_SESSION['userid'];
    $image= $_SESSION['uimage'];
    $mobile= $_SESSION['umobile'];
    $msg = "";
    $resultset = "";
    if(isset($_POST['update_profile'])){
        $new_name = $_POST['txtname'];
        $new_email = $_POST['txtmail'];
        $new_mobile = $_POST['txtmobile'];
        $user = $_SESSION['userid'];
        $path=$_SESSION['uimage'];

        if(isset($_FILES['myfile'])){
            if($_FILES['myfile']['error']==0){
                $from = $_FILES['myfile']['tmp_name'];
                $to = $_SERVER['DOCUMENT_ROOT']."/MyApp/expenseTracking/images/".$_FILES['myfile']['name'];
                if(move_uploaded_file($from,$to)){
                    $path = "images/".$_FILES['myfile']['name'];
                }
                else {
                    $msg= "Invalid Image";
                }        
            }
        }
        include './dbconfig.php';
        $conn = mysqli_connect(HOSTNAME, USERNAME, "",DBNAME);
        $qry= "UPDATE user_master set name= '$new_name',email= '$new_email',mobile_no='$new_mobile', profile_pic= '$path' where email='$user'";
        $qry2= "UPDATE expense set userid='$new_email' where userid='$user' ";
        mysqli_query($conn,$qry);
        mysqli_query($conn,$qry2);
       $name= $_SESSION['uname']= $new_name;
        $email= $_SESSION['userid']= $new_email;
       $mobile= $_SESSION['umobile']= $new_mobile;
        $_SESSION['uimage']= $path;
        $msg = "Profile Updated !!!";
        mysqli_close($conn);
    }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="row">
        <div class="col-sm-12">
            <?php
                include("./navbar.php");            
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3 sidebar">
            <?php
                include("./sidebar.php");
            ?>
        </div>
        <div class="col-sm-9">
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-8">
                    <div class="container-fluid">
                        <form method="post" enctype="multipart/form-data">
                            <p><?php echo "<center><font color='green'>" . $msg . "</font></center>"?></p>
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" class="form-control" name="txtname" placeholder="<?php
                                echo $name ;
                                ?>" required >
                            </div>
                            <div class="form-group">
                                <label for=""> Email</label>
                                <input type="text" class="form-control" name="txtmail" placeholder="<?php
                                echo $email?>" required>
                            </div>
                            <div class="form-group">
                                <label for=""> Mobile No.</label>
                                <input type="text" class="form-control" name="txtmobile" placeholder="<?php
                                echo $mobile?>" required>
                            </div>
                            <div class="form-group">
                                <label for=""> Profile Image</label>
                                <input type="file" class="form-control" name="myfile">
                            </div>
                            <input type="submit" name="update_profile" class="btn btn-primary "  value="Update Profile">
                        </form>
                    </div>
                </div>
                <div class="col-sm-2"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 text-center footer ">
            <h5>Footer @ Copyright Reserved Act 2021.</h5>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"></script>
</body>
</html>