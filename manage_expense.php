<?php
    session_start();
    if(!isset($_SESSION['userid'])){
        header("location:index.php");
    }
    $msg = "";
    if(isset($_POST['btnadd'])){
        $date = date('Y-m-d', strtotime($_POST['txt-date']));
        $item_name = $_POST['item-name'];
        $item_price = $_POST['item-price'];
        $user = $_SESSION['userid'];
        $qry = "insert into expense values ('$user','$date','$item_name',$item_price)";
        mysqli_query($conn,$qry);
        $msg = "Successfull Added !!!!"; 
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Expense</title>
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
            <table class="table table-striped">
                <caption><h2>Expense Detail's</h2></caption>
                <tr>
                    <th>Expense Date</th>
                    <th>Expense Item Name</th>
                    <th>Expense Amount</th>
                </tr>
                <?php
                    include './dbconfig.php';
                    $conn = mysqli_connect(HOSTNAME, USERNAME, "",DBNAME);
                    $qry = "select * from expense where userid = '$_SESSION[userid]'";
                    $resultset = mysqli_query($conn,$qry);
                    if(mysqli_num_rows($resultset)>0){
                        while($row = mysqli_fetch_assoc($resultset)){
                            echo "<tr>";
                            echo "<td> $row[expensedate]</td>";
                            echo "<td> $row[expenseitem]</td>";
                            echo "<td> $row[expensecost]</td>";
                            echo "<td> <a href= 'delete.php?pid=$row[id]' class='btn btn-danger'> Delete </a> </td>";
                            echo "</tr>";
                            
                        }
                    }
                ?>
            </table>
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