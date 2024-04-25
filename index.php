<?php
$host="localhost";
$user="root";
$password= "";
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
  <title>STUDENT MANAGEMENT SYSTEM</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
  <header>
    <nav>
      <label class="logo">TPC</label>
      <ul>
        <li><a href="">Home</a></li>
        <li><a href="">Contact</a></li>
        <li><a href="">Apply</a></li>
        <li><a href="login.php" class="btn btn-success">Login</a></li>
      </ul>
    </nav>
    <div class="section1">
      <img class="main_img" src="tfp.jpg"> </div>
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <img class="welcome_img" src="tep.png"> </div>
        <div class="col-md-8">
            <h1>About TPC RAIT</h1>
            <p>The Ramrao Adik Institute of Technology (RAIT) Training and Placement Cell isn't just a committee; it's a well-oiled machine dedicated to propelling your career forward. Established with a singular goal of success for its students, the Training and Placement Cell boasts a long and impressive track record. Their deep understanding of industry needs allows them to bridge the gap between academia and the professional world. This translates into strategically designed training programs that equip you with the technical prowess and soft skills coveted by top recruiters. From resume-writing workshops and mock interview sessions to industry interaction programs and career fairs, the Training and Placement Cell meticulously prepares you for every aspect of the placement process. Their genuine commitment to your future is further demonstrated by their strong network of established industry partnerships. These partnerships open doors to a vast pool of placement opportunities, ensuring a smooth transition from your academic journey to a fulfilling professional career. So, if you're looking for a committee that goes beyond the bare minimum and actively champions your success, then look no further than the RAIT Training and Placement Cell.</p>

        </div>
      </div>
     <center>
        <h1>Our Teachers</h1>
     </center>
     <div class="container">
        <div class="row">
          <?php 
          while($info=$result->fetch_assoc())
          {?>
            <div class="col-md-4">
            <img class="t" src="<?php echo "{$info['image']}"?>">
            <h3><?php echo "{$info['name']}"?></h3>
            <h5><?php echo "{$info['description']}"?></h5>
            </div>
          <?php 
          }?>
        </div>
        
     </div>
         
     <center>
        <h1>Upcoming Events</h1>
     </center>
     <div class="container">
        <div class="row">
            <div class="col-md-4">
            <img class="t" src="eve.avif">
            <h3>Event A</h3>
            </div>
        <div class="col-md-4">
        <img class="t" src="eve.avif">
        <h3>Event B</h3>
        </div>
        <div class="col-md-4">
        <img class="t" src="eve.avif">
        <h3>Event C</h3>
        </div>
        </div>
        
     </div>
     <center>
        <h1>Apply</h1>
     </center>
     <div align="center" class="apply">
       <form action="data_check.php" method="POST">
        <div class="adm_int">
            <label class="label_text">Name</label>
            <input class="input_deg" type="text" name="name">
        </div>
        <div class="adm_int">
            <label class="label_text">Email</label>
            <input class="input_deg" type="text" name="email">
        </div>
        <div class="adm_int">
            <label class="label_text">Phone</label>
            <input class="input_deg"type="text" name="phone">
        </div>
        <div class="adm_int">
            <label class="label_text">Message</label>
            <textarea class="input_txt" name="message"></textarea>
        </div>
        <div class="adm_int">
          
            <input class="btn btn-primary" id="submit" type="submit" value="apply" name="apply">
        </div>
       </form>
     </div>
     </header>


</body>
</html>
