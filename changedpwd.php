<?php
if (isset($_POST["changedbtn"])) 
{
    include("dbconnect.php");

    $username = $_POST["username"];  
    $cpwd = $_POST["pwd"];  
    $npwd = $_POST["newpwd"];  

    
    $qry = "SELECT * FROM userinfo WHERE studname = '$username' AND studpwd = '$cpwd'"; 
    $result = mysqli_query($connect, $qry);
    $row = mysqli_num_rows($result);

    
    if ($row > 0) 
    {
        $qry = "UPDATE userinfo SET studpwd= '$npwd' WHERE studname = '$username'";
        $result = mysqli_query($connect, $qry);

        if ($result) 
        {
            ?><script> alert("Password changed succesfully"); </script><?php 
        } 
        else 
        {
            echo "Error updating password.";
        }
    } 
    else 
    {
        echo "Current password is incorrect.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Full-screen centering */
        .full-screen {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Card styling */
        .card {
            width: 100%;
            max-width: 400px;
            border-radius: 12px; /* Rounded corners */
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1); /* Soft shadow */
            background-color: #fff;
            padding: 30px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px); /* Slight lift on hover */
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.15); /* Larger shadow */
        }

        .card-title {
            font-size: 1.8rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 30px;
            text-align: center;
            font-family: 'Arial', sans-serif;
        }

        .form-label {
            font-weight: 500;
        }

        /* Form control (inputs) styling */
        .form-control {
            border-radius: 8px;
            border: 1px solid #ccc;
            padding: 12px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #6f42c1; /* Purple color on focus */
            box-shadow: 0 0 10px rgba(111, 66, 193, 0.5);
        }

        /* Button styling */
        .btn-primary {
            background-color: #6f42c1;
            border-color: #6f42c1;
            font-size: 1.1rem;
            font-weight: 500;
            padding: 12px 18px;
            border-radius: 8px;
            width: 100%;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #5a2a8e;
            border-color: #5a2a8e;
            transform: translateY(-3px); /* Hover lift effect */
        }

        /* Additional subtle effects */
        .btn:focus {
            box-shadow: 0 0 8px rgba(111, 66, 193, 0.6);
        }

        /* Small text for password reset link */
        .small-text {
            font-size: 0.875rem;
            color: #6f42c1;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <!-- Fullscreen container for centering -->
    <div class="full-screen">
        <!-- Card for Reset Password Form -->
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Reset Password</h5>
                
                <!-- Reset Password Form -->
                <form method="POST">
                    <!-- Username Input -->
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Enter your username" required>
                    </div>

                    <!-- Current Password Input -->
                    <div class="mb-3">
                        <label for="current-password" class="form-label">Current Password</label>
                        <input type="password" class="form-control" name="pwd" placeholder="Enter current password" required>
                    </div>

                    <!-- New Password Input -->
                    <div class="mb-3">
                        <label for="new-password" class="form-label">New Password</label>
                        <input type="password" class="form-control" name="newpwd" placeholder="Enter new password" required>
                    </div>

                    <!-- Submit Button -->
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary" name="changedbtn">Change Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>