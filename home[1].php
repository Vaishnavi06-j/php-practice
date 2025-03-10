<?php
include("dbconnect.php");
session_start();
if(!isset($_SESSION["uid"]))
{
    header("location:login[1].php");
}
include("dbconnect[1].php");

$qry =  "SELECT * FROM `notice` order by id desc limit 5"; 
$result = mysqli_query($connect, $qry);
$row = mysqli_num_rows($result);
if($row>0)
{

}
else
{

}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Poppins', sans-serif; }
        body { background: linear-gradient(135deg, #71b7e6, #9b59b6); }
        .container { max-width: 600px; margin-top: 50px; background-color: #fff; padding: 25px; border-radius: 10px; box-shadow: 0 5px 10px rgba(0,0,0,0.15); }
        .notice-card { background: #f4f4f4; padding: 10px; border-radius: 5px; margin-bottom: 10px; }
        marquee { font-size: 18px; font-weight: bold; color: #444; }
    </style>
</head>
<body>
    <div class="container">
        <h3 class="text-center">Latest Notices</h3>
        <marquee direction="up">

        <div><ul>
            <?php if($row>0)
            {
               while($data = mysqli_fetch_assoc($result))
               {
                ?><li><?php echo $data["notice"];?></li><?php
               }
            }
            else
            {
              echo "no notice";  
            }
            ?>
            </ul>
                <div class="notice-card"><br> <small></small></div>
         
        </div>
        </marquee>
    </div>
    <a href="logout.php"> <font color="black"> logout</font></a>
</body>
</html>
