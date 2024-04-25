<?php
$host="localhost";
$user="root";
$password="";
$db="managementsystem1";

$data = mysqli_connect($host,$user,$password,$db);

if(!$data) {
  echo "Error: Could not connect to database.";
  die();
}

$sql="SELECT * from apply";
$result=mysqli_query($data,$sql);

if(!$result) {
  echo "Error: Could not execute query.";
  die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="admin.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
  <?php
    include 'admin_sidebar.php';
  ?>
  <header class="header">
    <a href="">Apply Dashboard</a>
    <div class="logout">
      <a href="logout.php" class="btn btn-primary">Logout</a>
    </div>
  </header>
  <aside>
    <ul>
      <li>
        <a href="add_student.php">Add Student</a>
      </li>
      <li>
        <a href="">View Student</a>
      </li>
      <li>
        <a href="add_teacher.php">Add Teacher</a>
      </li>
      <li>
        <a href="">View Teacher</a>
      </li>
      <li>
        <a href="">Add Events</a>
      </li>
      <li>
        <a href="">View Events</a>
      </li>
    </ul>
  </aside>
  <div class="content">
    <center>
    <h1>Applied Candidates</h1>
    <br><br>
    <table border="2px">
      <tr>
        <th style="padding: 20px;font-size:15px;">Name</th>
        <th style="padding: 20px;font-size:15px;">Email</th>
        <th style="padding: 20px;font-size:15px;">Phone</th>
        <th style="padding: 20px;font-size:15px;">Message</th>
      </tr>
      <?php 
        while($info = $result->fetch_assoc()) { // Use $info instead of creating new variable
      ?>
        <tr>
          <td style="padding: 20px;"><?php echo $info['name']; ?></td>
          <td style="padding: 20px;"><?php echo $info['email']; ?></td>
          <td style="padding: 20px;"><?php echo $info['phone']; ?></td>
          <td style="padding: 20px;"><?php echo $info['message']; ?></td>
        </tr>
      <?php } ?>
    </table>
    </center>
    <p></p>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVfCSyRWbTQoBXBjfwWuxqOCZipIvlUzfwRSxRW9zRLboAhDnRM" crossorigin="anonymous"></script>
</body>
</html>
