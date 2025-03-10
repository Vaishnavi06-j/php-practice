<?php
    
if (isset($_POST["registerbtn"]))
{

include("dbconnect.php");

$pn = $_POST["studname"];
$pd = $_POST["studpwd"];
$pm = $_POST["studmob"];

$qry = "INSERT INTO `userinfo`( `studname`, `studpwd`, `studmob`) VALUES ('$pn','$pd','$pm')";

$result = mysqli_query($connect,$qry);

if($result)
{
   ?><script> alert("Register Sucessfully"); </script><?php
}
else
{
    ?><script> alert("REgister Unsucessfull"); </script><?php
}



}
?>















<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>studuct Register Form</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    /* Full screen background */
    body, html {
      height: 100%;
      margin: 0;
      font-family: 'Arial', sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      background: #f0f2f5; 
    }

    /* Center the card */
    .card {
      width: 400px;
      border-radius: 15px;
      box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.1); /* Soft shadow effect */
    }

    /* Card Body */
    .card-body {
      padding: 40px;
    }

    /* Title styling */
    .card-title {
      font-size: 1.8rem;
      font-weight: bold;
      color: #333;
      text-align: center;
      margin-bottom: 30px;
    }

    /* Form input fields */
    .form-control {
      border-radius: 10px;
      border: 1px solid #ccc;
      padding: 12px 15px;
      font-size: 1rem;
    }

    .form-control:focus {
      border-color: #0066cc; /* Blue border on focus */
      box-shadow: 0 0 5px rgba(0, 102, 204, 0.5); /* Glow effect */
    }

    /* Label styling */
    .form-label {
      font-weight: bold;
      color: #555;
    }

    /* Button styling */
    .btn-primary {
      background-color: #0066cc;
      border-color: #0066cc;
      border-radius: 10px;
      padding: 12px;
      font-size: 1.1rem;
      font-weight: bold;
      width: 100%;
    }

    .btn-primary:hover {
      background-color: #0057b7;
      border-color: #0057b7;
    }

    /* Add space between form fields */
    .mb-3 {
      margin-bottom: 20px;
    }

    /* Mobile responsiveness: Stack inputs on small screens */
    @media (max-width: 576px) {
      .card {
        width: 90%;
        margin: 20px;
      }
    }
  </style>
</head>
<body>

  <!-- Bootstrap Card with Form -->
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">studuct Registration</h5>

      <!-- Registration Form -->
      <form action="#" method="POST">
        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input type="text" class="form-control" placeholder="Enter Username" required name="studname">
        </div>
        
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" placeholder="Enter Password" required name="studpwd">
        </div>

        <div class="mb-3">
          <label for="mobile" class="form-label">Mobile Number</label>
          <input type="tel" class="form-control" placeholder="Enter Mobile Number" required name="studmob">
        </div>

        <button type="submit" class="btn btn-primary" name="registerbtn">Register</button>
      </form>
    </div>
  </div>

  <!-- Bootstrap JS & Popper.js -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
