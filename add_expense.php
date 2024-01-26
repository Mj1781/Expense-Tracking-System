<?php
    session_start();
    if(!isset($_SESSION['userid'])){
        header("location:index.php");
    }
    $msg = "";
    if(isset($_POST['btnadd'])){
        $date = $_POST['txt-date'];
        $item_name = $_POST['item-name'];
        $item_price = $_POST['item-price'];
        $user = $_SESSION['userid'];
        include './dbconfig.php';
        $conn = mysqli_connect(HOSTNAME, USERNAME, "",DBNAME);
        $qry = "insert into expense values ('$user','$date','$item_name',$item_price,'')";
        mysqli_query($conn,$qry);
        $msg = "Successfull Added !!!!"; 
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Expense</title>
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
                        <h1>Add Expense</h1>
                        <form action="" method="post">
                            <div class="form-group">
                                <label for=""> Select Date</label>
                                <input type="date" class="form-control" name="txt-date" >
                            </div>
                            <div class="form-group">
                                <label for=""> Item Name's</label>
                                <input type="text" class="form-control" name="item-name" placeholder="Item name here" >
                            </div>
                            <div class="form-group">
                                <label for="">Total Price</label>
                                <input type="text" class="form-control" name="item-price" placeholder="Price Here" >
                           </div>
                            <input type="submit" name="btnadd" class="btn btn-primary form-control"  value="Add Expense Detail">
                        </form>
                        <?php
                            echo "<h2>" . $msg . "</h2>";
                         ?>
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