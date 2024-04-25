<?php
// Database connection details
$host = "localhost";
$user = "root";
$password = "";
$dbname = "managementsystem1";

// Establish connection
$conn = mysqli_connect($host, $user, $password, $dbname);

// Check connection
if (mysqli_connect_errno()) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST["add_student"])) {
    // Sanitize user input (prevent SQL injection)
    $s_name = mysqli_real_escape_string($conn, $_POST['name']);
    $s_description = mysqli_real_escape_string($conn, $_POST['description']);

    // Get uploaded file details
    $image = $_FILES['image']; // Assuming image input name is 'image'

    // Validate uploaded file
    if (isset($image) && $image['error'] === UPLOAD_ERR_OK) {
        $target_dir = "image/"; // Target directory for uploads
        $target_file = $target_dir . basename($image["name"]); // Sanitize filename with `basename`
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION)); // Get image extension

        // Check if image file is actually an image
        $check = getimagesize($image["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";

            // Allow certain file types (expand as needed)
            $allowedExtensions = array("jpg", "jpeg", "png");
            if (in_array($imageFileType, $allowedExtensions)) {
                // Check if file already exists (optional)
                if (file_exists($target_file)) {
                    echo "Sorry, file already exists.";
                } else {
                    // Move uploaded file to target directory
                    if (move_uploaded_file($image["tmp_name"], $target_file)) {
                        $dst_db = $target_dir . $image["name"]; // Store relative path in database
                        $sql = "INSERT INTO student(name,description,image) VALUES('$s_name','$s_description','$dst_db')";
                        $result = mysqli_query($conn, $sql);

                        if ($result) {
                            echo "The file ". htmlspecialchars( basename( $image["name"])). " has been uploaded.";
                        } else {
                            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                        }
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }
            } else {
                echo "Sorry, only JPG, JPEG, PNG files are allowed.";
            }
        } else {
            echo "File is not an image.";
        }
    } else {
        // Handle file upload errors
        if ($image['error'] === UPLOAD_ERR_NO_FILE) {
            echo "No file selected.";
        } else {
            echo "Unknown upload error (" . $image['error'] . ").";
        }
    }
}

mysqli_close($conn); // Close connection
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <style type="text/css">
   
   .div_deg
   {
    background-color: lightgray;
    padding-top: 70px;
    padding-bottom: 70px;
    width: 500px;
   }

   </style>

    <link rel="stylesheet" href="admin.css">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
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
                <a href="apply.php">Apply</a>
            </li>
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
        <h1>ADD STUDENT</h1><br><br>
        <div class="div_deg">
        <form action="#" method="POST" enctype="multipart/form-data">
               <div>
                 <label>Student Name :</label>
                 <input type="text" name="name"> 
               </div>
               <br>
               <div>
                 <label>Description :</label>
                 <textarea name="description"></textarea>
               </div>
               <br>
               <div>
                 <label>Image :</label>
                 <input type="file" name="image"> 
               </div>
               <br>
               <div>
                 <input type="submit" name="add_student" value="Add Student" class="btn btn-primary"> 
               </div>
               <br>
            </form>
        </div>
        </center>
        <p></p>
    </div>
</body>
</html>