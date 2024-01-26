<?php
    session_start();
    if(!isset($_SESSION['userid'])){
        header("location:index.php");
    }
?>
<?php
$amount = 0;
$date = date("Y-m-d");
$user = $_SESSION['userid'];
include './dbconfig.php';
$conn = mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DBNAME);
$qry = "select sum(expensecost) as total from expense where userid= '$user' and expensedate = '$date'";
$resultset = mysqli_query($conn,$qry);
if(mysqli_num_rows($resultset)>0){
    $row = mysqli_fetch_array($resultset);
    $amount = $row[0];
}
?>

<?php
$amount2 = 0;
$date2 = date("Y-m-d",strtotime("-1 days"));
$qry2 = "select sum(expensecost) as total from expense where userid= '$user' and expensedate = '$date2'";
$resultset = mysqli_query($conn,$qry2);
if(mysqli_num_rows($resultset)>0){
    $row = mysqli_fetch_array($resultset);
    $amount2 = $row[0];
}
?>

<?php
$amount3 = 0;
$date3 = date("Y-m-d",strtotime("-1 week"));
// $qry3 = "select sum(expensecost) as total from expense where userid= '$user' and expensedate = '$date3'";
$qry3 = "SELECT sum(expensecost) as total FROM expense WHERE userid = '$user' AND expensedate BETWEEN '$date3' AND '$date'";
$resultset = mysqli_query($conn,$qry3);
if(mysqli_num_rows($resultset)>0){
    $row = mysqli_fetch_array($resultset);
    $amount3 = $row[0];
}
?>

<?php
$amount4 = 0;
$date4 = date("Y-m-d",strtotime("-1 month"));
$qry4 = "select sum(expensecost) as total from expense where userid= '$user' and expensedate BETWEEN '$date4' AND '$date'";
$resultset = mysqli_query($conn,$qry4);
if(mysqli_num_rows($resultset)>0){
    $row = mysqli_fetch_array($resultset);
    $amount4 = $row[0];
}
?>

<?php
$amount5 = 0;
$date5 = date("Y-m-d",strtotime("-1 year"));
$qry5 = "select sum(expensecost) as total from expense where userid= '$user' and expensedate BETWEEN '$date5' AND '$date'";
$resultset = mysqli_query($conn,$qry5);
if(mysqli_num_rows($resultset)>0){
    $row = mysqli_fetch_array($resultset);
    $amount5 = $row[0];
}
?>
<?php
$amount6 = 0;
// $date6 = date("Y-m-d",strtotime(""));
$qry6 = "select sum(expensecost) as total from expense where userid= '$user'";
$resultset = mysqli_query($conn,$qry6);
if(mysqli_num_rows($resultset)>0){
    $row = mysqli_fetch_array($resultset);
    $amount6 = $row['total'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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
        <div class="col-sm-9 main">
            <!-- <div class="container-fluid"> -->
                <div class="row">
                    <div class="col">
                        <h4>Today's Expense <?php if(isset($amount)) echo "<br><br>". $amount; else echo "<br><br> 0";?></h4>
                    </div>
                    <div class="col">
                        <h4>Yesterday Expense<?php if(isset($amount2)) echo "<br><br>". $amount2; else echo "<br><br>0";?></h4>
                    </div>
                    <div class="col">
                        <h4>Last 7 Days Expense <?php if(isset($amount3)) echo "<br><br>". $amount3; else echo "<br><br>0";?></h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h4>Current Month Expense <?php if(isset($amount4)) echo "<br><br>". $amount4; else echo "<br><br>0";?></h4>
                    </div>
                    <div class="col">
                        <h4>Current Year Expense <?php if(isset($amount5)) echo "<br><br>". $amount5; else echo "<br><br>0";?></h4>
                    </div>
                    <div class="col">
                        <h4>Total Expense<?php if(isset($amount6)) echo "<br><br>". $amount6; else echo "<br><br>0";?></h4>
                    </div>
                </div>
            <!-- </div> -->
        </div>
        <div class="row">
            <div class="col-sm-12 text-center footer ">
                <h5>Footer @ Copyright Reserved Act 2021.</h5>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"></script>
</body>
</html>