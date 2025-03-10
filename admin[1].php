<?php
include("dbconnect[1].php");

if (isset($_POST["submit_notice"])) 
{
    $notice = $_POST["notice"];
    $qry = "INSERT INTO `notice`(`notice`) VALUES ('$notice')";

    $result = mysqli_query($connect,$qry);
    
        if($result)
        {
            ?><script>alert('Notice added successfully!');</script><?php
        } 
        else 
        {
            ?><script>alert('Failed to add notice!');</script><?php
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
<body class="bg-light p-5">
    <div class="container bg-white p-4 rounded shadow">
        <h3 class="text-center">Add Notice</h3>
        <form method="post">
            <div class="mb-3">
                <textarea class="form-control" name="notice" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary w-100" name="submit_notice">Submit Notice</button>
        </form>
    </div>
</body>
</html>
