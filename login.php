<?php
session_start();

if(isset($_POST["loginbtn"]))
{

include("dbconnect.php");

$pn = $_POST["name"];
$pd = $_POST["pwd"];

$qry = "SELECT * FROM `userinfo` WHERE studname = '$pn' AND studpwd = '$pd'";

$result = mysqli_query($connect,$qry);

$row = mysqli_num_rows($result);

if($row>0)
{
$data = mysqli_fetch_assoc($result);

$_SESSION["uid"] = $data["pid"];

header("location:userpage.php");

}

else
{

?><script> alert("Unvalid Username or Password"); </script><?php

}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>studuct Login Form</title>

  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />

  <style>
    /* Center the form in the middle of the screen */
    body, html {
      height: 100%;
      margin: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      background-color: #f8f9fa; /* Light background color */
    }

    /* Styling the Card */
    .card {
      border-radius: 15px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Soft shadow */
      background-color: #ffffff; /* White background */
      padding: 40px;
      width: 100%;
      max-width: 400px;
    }

    /* Title */
    .card-title {
      font-size: 24px;
      font-weight: bold;
      text-align: center;
      color: #007bff;
      margin-bottom: 20px;
    }

    /* Form inputs */
    .form-control {
      border-radius: 10px;
      padding: 10px;
      font-size: 16px;
      margin-bottom: 15px;
    }

    /* Login Button */
    .btn-login {
      border-radius: 10px;
      padding: 10px;
      font-size: 16px;
      width: 100%;
      background-color: #007bff;
      color: white;
      border: none;
    }

    /* Hover effect on Login Button */
    .btn-login:hover {
      background-color: #0056b3;
      cursor: pointer;
    }

    /* Styling for Error Messages */
    .error-message {
      color: red;
      font-size: 12px;
      margin-bottom: 10px;
      text-align: center;
    }

    /* Customizing the form submit (since no JS) */
    .form-group {
      margin-bottom: 20px;
    }
  </style>

</head>
<body>

  <!-- Bootstrap Card with Login Form -->
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">studuct Login</h5>

      <!-- Login Form -->
      <form action="#" method="POST">
        <div class="mb-3 form-group">
          <label for="username" class="form-label">Username</label>
          <input type="text" class="form-control" placeholder="Enter Username" required name="name">
        </div>
        
        <div class="mb-3 form-group">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" placeholder="Enter Password" required name="pwd">
        </div>

        <!-- The submit button will trigger form submission -->
        <button type="submit" class="btn-login" name="loginbtn">Login</button>
      </form>
    </div>
  </div>

  <!-- Bootstrap JS & Popper.js (optional, but not needed for this specific form) -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>
</html>
