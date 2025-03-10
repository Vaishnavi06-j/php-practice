<?php
if (isset($_POST["resetbtn"])) {

    include("dbconnect.php");

    $pn = $_POST["name"];
    $mob = $_POST["mobile"];

    $qry = "SELECT * FROM userinfo WHERE studname ='$pn' AND studmob ='$mob'";  // Use $mob, not 'mob'

    $result = mysqli_query($connect, $qry);

    // Check if the query returned any result
    if (mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
        $id = $data["sid"];  

        $pwd = randomPassword();

        $updateQry = "UPDATE userinfo SET studpwd='$pwd' WHERE sid='$id'";

        if (mysqli_query($connect, $updateQry)) {
            echo "Updated";
        } else {
            echo "Error updating password: " . mysqli_error($connect);
        }
    } else {
        echo "Not done";
    }
}

function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array();
    $alphaLength = strlen($alphabet) - 1;
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass);
}
?>










<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <!-- Link to Bootstrap 4 or 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

    <style>
        /* Basic reset and body styling */
        body, html {
            height: 100%;
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f4f7fc; /* Soft background color */
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Center the container vertically and horizontally */
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }

        /* Style for the card */
        .card {
            width: 100%;
            max-width: 400px;
            border-radius: 15px; /* Rounded corners */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Subtle shadow */
            background: #ffffff; /* White background for the card */
        }

        /* Title styling */
        .card-title {
            text-align: center;
            font-size: 1.5rem;
            font-weight: bold;
            color: #333;
            padding-top: 20px;
        }

        /* Input fields styling */
        .form-control {
            border-radius: 10px; /* Rounded inputs */
            border: 1px solid #ddd;
            padding: 10px;
            transition: all 0.3s ease-in-out;
        }

        .form-control:focus {
            border-color: #007bff; /* Focus border color */
            box-shadow: 0 0 8px rgba(0, 123, 255, 0.3); /* Focus shadow effect */
        }

        /* Label styling */
        .form-label {
            font-size: 1rem;
            color: #555;
            font-weight: 500;
        }

        /* Submit button styling */
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            border-radius: 10px;
            padding: 12px;
            font-size: 1.1rem;
            font-weight: bold;
            width: 100%;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }

        /* Margin between form elements */
        .mb-3 {
            margin-bottom: 20px;
        }

        /* Add space between card body content */
        .card-body {
            padding: 30px;
        }

        /* Add a link for extra text (optional) */
        .card-body p {
            text-align: center;
            color: #888;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Reset Password</h5>
            <form action="#" method="post">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control"  name="name" placeholder="Enter your username" required>
                </div>
                <div class="mb-3">
                    <label for="mobile" class="form-label">Mobile Number</label>
                    <input type="tel" class="form-control"  name="mobile" placeholder="Enter your mobile number" required pattern="[0-9]{10}">
                </div>
                <button type="submit" class="btn btn-primary" name="resetbtn">Reset Password</button>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap JS for responsiveness and interactivity -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

</body>
</html>
