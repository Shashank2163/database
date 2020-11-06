<?php
echo '<ul>
        <li><a href="dashboard.php">DASHBOARD</a></li>
        <li class="dropdown">
            <a href="javascript:void(0)" class="dropbtn">USERS</a>
            <div class="dropdown-content">
                <a href="viewuser.php">MANAGE</a>
                <a href="manageuser.php">EDIT</a>
            </div>
        </li>
        <li class="dropdown">
            <a href="javascript:void(0)" class="dropbtn">PRODUCTS</a>
            <div class="dropdown-content">
                <a href="addproduct.php">MANAGE</a>
                <a href="addproduct.php">EDIT</a>
            </div>
        </li>
        <li><a href="deleteproduct.php">ORDERS</a></li>
        <li><a href="logout.php">LOGOUT</a></li></ul>';
