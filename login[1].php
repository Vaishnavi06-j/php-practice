<?php
session_start();
if(isset($_SESSION['uid']))
{
    header("location:user.php");
}



include("dbconnect[1].php");

if (isset($_POST["loginbtn"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    //admin
    if ($email === "admin" && $password === "admin") 
    {
        header("location:admin.php");
    }

  
    $qry = "SELECT * FROM register WHERE email='$email' AND password='$password'";
    $result = mysqli_query($connect, $qry);
    $row =mysqli_num_rows($result);

    if ($row>0)
    {
        $data = mysqli_fetch_assoc($result);
        session_start();
        $_SESSION["uid"] = $data["id"];

        header("location:home[1].php");
    } 
    else 
    {
        echo "invalid crenditanls";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">
    <div class="container bg-white p-4 rounded shadow" style="max-width: 400px;">
        <h3 class="text-center">Login</h3>
        <form method="post">
            <div class="mb-3">
                <label class="form-label">Email / Username</label>
                <input type="text" class="form-control" name="email" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100" name="loginbtn">Login</button>
        </form>
    </div>
</body>
</html>
