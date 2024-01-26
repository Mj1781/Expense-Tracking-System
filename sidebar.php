<div class="container-fluid">
                <div class="profile-box">
                    <div class="col-left">
                        <img src="<?php
                        echo $_SESSION['uimage'];
                        ?>" 
                         alt="" class="img-circle profile-img" style="width: 50px; height: 50px;">
                    </div>
                    <div class="col-right">
                        <h4><?php
                        echo $_SESSION['uname'];?> <br>
                            <small><i class="fa-solid fa-circle"></i>ONLINE</small>    
                        </h4>
                        
                    </div>
                </div>
            </div>
            <hr>
            <div class="navbar">
                <ul>
                <a href="home.php">
                    <li class="active">
                            <i class="fa-solid fa-gauge"></i> Dashboard
                    </li>
                </a>
                <a href="#expenseItem" data-toggle="collapse"  aria-expanded="false" >
                    <li>
                        <i class="fa-solid fa-bars"></i>
                        Expenses
                            <ul class="collapse" id="expenseItem">
                                <li>
                                    <a href="add_expense.php">Add Expense</a>
                                </li>
                                <li>
                                    <a href="manage_expense.php">Manage Expense</a>
                                </li>
                                
                            </ul>
                    </li>
                </a>
                    <li>
                        <a href="#expenseItem-1" data-toggle="collapse"  aria-expanded="false">
                            <i class="fa-solid fa-bars"></i>Expense Report
                                <ul class="collapse" id="expenseItem-1">
                                    <li>
                                        <a href="daywisereport.php">Daywise Expense Report</a>
                                    </li>                            
                                    <li>
                                        <a href="monthwisereport.php">Monthwise Expense Report</a>
                                    </li>                            
                                    <li>
                                        <a href="yearwisereport.php">Yearwise Expense Report</a>
                                    </li>                            
                                </ul>
                        </a>
                    </li>
                    <li>
                        <a href="profile.php"><i class="fa-solid fa-user"></i>Profile</a>
                    </li>
                    <li>
                        <a href="change_password.php"><i class="fa-sharp fa-regular fa-clone"></i>Change Password</a>
                    </li>
                    <li>
                        <a href="logout.php"><i class="fa-solid fa-power-off"></i>Logout</a>
                    </li>
                </ul>
            </div>

        
