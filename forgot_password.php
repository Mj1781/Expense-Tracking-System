<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h1>Daily Expense Tracker</h1>
    <div class="container">
        <form action="reset.php">
            <h3>Reset Password</h3>
            <div class="form-group">
                <hr>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    placeholder="Email">
            </div>
            <div class="form-group">
                <input type="number" class="form-control" id="exampleInputPassword1" placeholder="Mobile Number">
            </div>
            <button type="submit" class="btn btn-primary">Reset</button>
            <span class="reg-btn"><a href="index.php"><input type="button" class="btn btn-primary btn-right" value="Login"></a></span>
        </form>
    </div>
</body>

</html>