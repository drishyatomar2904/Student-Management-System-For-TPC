<?php 
$host="localhost";
$user="root";
$password="";
$dbname= "managementsystem1";

$data=mysqli_connect($host,$user,$password,$dbname);

$sql="SELECT*FROM teacher";
$result=mysqli_query($data,$sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="admin.css">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<style type="text/css">
    .table_th
    {
        padding: 80px;
        font: size 20px;
    }
    .table_td
    {
        padding: 20px;
        background-color: lightgrey;
    }
    </style>
</head>
<body>
    <header class="header">
        <a href="">Admin Dashboard</a>
        <div class ="logout">
            <a href="logout.php" class="btn btn-primary">Logout</a>
        </div>
    </header>
    <aside>
        <ul>
        <li>
                <a href="adminhome.php">ADMIN</a>
            </li>
            <li>
                <a href="apply.php">Apply</a>
            </li>
            <li>
                <a href="add_student.php">Add Student</a>
            </li>
            <li>
                <a href="view_student.php">View Student</a>
            </li>
            <li>
                <a href="add_teacher.php">Add Teacher</a>
            </li>
            <li>
                <a href="">Add Events</a>
            </li>
            <li>
                <a href="">View Events</a>
            </li>
        </ul>
    </aside>
    <center>
    <div class="content">
        <h1>VIEW ALL TEACHERS DATA HERE</h1>
        <table border="2px">
            <tr>
                <th class="table_th">Teacher Name</th>
                <th class="table_th">About Teacher</th>
                <th class="table_th">Image</th>            
            </tr>
            <?php 
            
            while($info=$result->fetch_assoc())
            {
            
            ?>
            <tr>
                <td class="table_td">
                <?php echo "{$info['name']}"?>
                </td>
                <td class="table_td">
                <?php echo "{$info['description']}"?>
                </td>
                <td class="table_td">
                <img height="100px" width="100px" src ="<?php echo "{$info['image']}"?>">
                </td>
            </tr>
            <?php 
            }?>
        </table>
        </center>
    </div>
</body>
</html>