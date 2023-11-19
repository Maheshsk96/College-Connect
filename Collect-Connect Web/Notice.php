<?php
require_once "rds_DB.php";
require_once "send_notice_api.php";

if (isset($_POST['submit'])) {
    
    $uploadDir = $_SERVER['DOCUMENT_ROOT'] . "/uploaded_files/";
    $filename = uniqid() . "_" . $_FILES["file"]["name"];
    
    $getfilepath = "#".$filename;
    
    $uploadPath = $uploadDir . $filename;
   
    if ($_FILES["file"]["error"] === UPLOAD_ERR_OK) {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $uploadPath)) {
            
        } else 
        {
            //die('Error moving uploaded file.');
        }
    } 
    
 
    $topic = $_POST['topic'];
    $title = $_POST['title'];
    $body = $_POST['body'];
    
 

    $query = "INSERT INTO notice (topic, title, body,files) VALUES (' $topic', '$title', '$body','$getfilepath')";
    $result = mysqli_query($con, $query);

    if (!$result) {
        die('Error: ' . mysqli_error($con));
    }
    
    $selectQuery = "SELECT * FROM notice order by id desc limit 0,1";
    $selectResult = mysqli_query($con, $selectQuery);

    if ($selectResult) {
        
        // Display the fetched data
        
        while ($row = mysqli_fetch_assoc($selectResult)) 
        {
            // Access the columns using the column names
            
            $rowId = $row['id'];
            $topic = $row['topic'];
            $title = $row['title'];
            $body = $row['body'];
            $files = $row['files'];
            
           $noticeResult = sendNotice($topic,$title,$body,$getfilepath,$rowId); //it returns true or false
           
        }
    } else {
        die('Error: ' . mysqli_error($con));
    }
}

mysqli_close($con);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notice</title>
    <link rel="stylesheet" type="text/css" href="web.css">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Add the active class to the clicked link
        $('nav ul li a').click(function() {
            $('nav ul li a').removeClass('active');
            $(this).addClass('active');
        });
    });
</script>


<?php
if ($noticeResult===true) {
    ?>
    <script>
        $(document).ready(function() {
            swal({
                title: "Success message sent!!",
                icon: "success",
                button: "Ok",
                timer: 12000
            });
        });
    </script>
<?php } ?>

<?php
if ($noticeResult === false) {
    ?>
    <script>
        $(document).ready(function() {
            swal({
                title: "Faild to send Notice",
                icon: "error",
                button: "Ok",
                timer: 12000
            });
        });
    </script>
<?php } ?>





</head>
<body>
    <nav>
        <div class="logo">My College</div>
        <input type="checkbox" id="click">
      <label for="click"><ion-icon name="menu"></ion-icon></label>
        <ul>
            <li><a class="" href="Home.php">Home</a></li>
            <li><a class="active" href="Notice.php">Notice</a></li>
            <li><a class="" href="Users.php">Users</a></li>
            <li><a class="" href="Subjects.php">Subjects</a></li>
            <li><a class="" href="#">Logout</a></li>
        </ul>
    </nav>

    <!-- ================================================================================= -->

    
<div class="container">

    <h2>Notification</h2>
        <form action="" method="post" enctype="multipart/form-data">

            <div class="input-name">
            <select name="topic"  id="topic">
                
                 <option value="All">All</option>
                
                 <option value="Student">Student</option>
                 
                 <option value="Teacher">Teacher</option>
                
                 <option value="HOD">HOD</option>
            
            </select>
            </div>
            
  
            <div class="input-name">
            <input type="text" class="comon"  id="title" name="title" placeholder="Enter Title">
            </div>
            
            
            <div class="input-name">
                <textarea class="comon"  id="body" name="body" placeholder="Write something.." style="height:200px"></textarea>
             </div>
          
            
            <div class="input-name">

                <label for="fileUpload">Upload file</label>
                <input type="file" name="file" id="file" />
            </div>
            <div class="input-name">
            <input type="submit" name="submit" class="submit" value="Send">
            </div>
</form> 
</div>
    
</body>
</html>
