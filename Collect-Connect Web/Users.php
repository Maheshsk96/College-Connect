<?php
require_once "rds_DB.php";

if ($_SERVER["REQUEST_METHOD"] === "POST"){

if (isset($_POST['searchButton'])) 

    {
     $a = $_POST['searchInput'];
     
     $getdata = #'";

    }
    
    if (isset($_POST['department'])) 
    {
    $d = $_POST['department'];
    
    if (!empty($d)) {
        $getdata = "#";
        } 
    }
 
 
 
 
}

else{
$getdata = "#";
}

$result = mysqli_query($con,$getdata);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link rel="stylesheet" type="text/css" href="web.css">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

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
</head>
<body>
    <nav>
        <div class="logo">My College</div>
        <input type="checkbox" id="click">
      <label for="click"><ion-icon name="menu"></ion-icon></label>
        <ul>
            <li><a class="" href="Home.php">Home</a></li>
            <li><a class="" href="Notice.php">Notice</a></li>
            <li><a class="active" href="Users.php">Users</a></li>
            <li><a class="" href="Subjects.php">Subjects</a></li>
            <li><a class="" href="#">Logout</a></li>
        </ul>
    </nav>

    <div class="users">
        
        <form action="" method="post">

            <select name="role"  class="role">
                
                 <option value="Student">Student</option>
                 
                 <option value="Teacher">Teacher</option>
                
                 <option value="HOD">HOD</option>
            
            </select>  &nbsp;  &nbsp; &nbsp;
            
                <input type="text"  name="searchInput" class="search" placeholder="Enter roll no or name"> &nbsp;  &nbsp; &nbsp;

                <input type="submit" name="searchButton" class="button" value="Search">

                &nbsp;  &nbsp; &nbsp;  <button class="button" type="button"> <a href="addUsers.php"  style="text-decoration: none;">Add User</a></button>


                </form>
    </div>

<div id="tablee">
    <table >
      <tr id="tr">
        <th>Roll No</th>
        <th>Name</th>
        <th>Gender</th>
        <th>Mobile No</th>
        <th>Email</th>
        <th>Date Of Birth</th>
        <th>Address</th>
        <th>
            <form method="POST" action="">Department
                 <select id="department" name="department" onchange="this.form.submit()">
                    <option value="">Option</option>
                    <option value="101">CSE</option>
                    <option value="102">ENTC</option>
                    <option value="103">Civil</option>
                    <option value="104">Mech</option>
                 </select>
            </form>
        </th>
        <th>Year</th>
        <th>Sem</th>
        <th>Action</th>
      </tr>
      
      
     <?php  while ($row = mysqli_fetch_assoc($result))
    
    {

            $s_id = $row['s_id'];
            $s_roll = $row['s_roll'];
            $s_name = $row['s_name'];
            $s_gender = $row['s_gender'];
            $s_mobile = $row['s_mobile'];
            $s_email = $row['s_email'];
            $s_dob = $row['s_dob'];
            $s_address = $row['s_address'];
            $s_password = $row['s_password'];
            $dname = $row['dname'];
            $year = $row['year'];
            $sem = $row['sem'];
            $p_id = $row['p_id'];

    ?>
        <tr>
            
            <td><?php echo $s_roll; ?></td>
            <td><?php echo $s_name; ?></td>
            <td><?php echo $s_gender; ?></td>
            <td><?php echo $s_mobile; ?></td>
            <td><?php echo $s_email; ?></td>
            <td><?php echo $s_dob; ?></td>
            <td><?php echo $s_address; ?></td>
            <td><?php echo $dname; ?></td>
            <td><?php echo $year; ?></td>
            <td><?php echo $sem; ?></td>
            <td><a href="#" style="text-decoration: none;">EDIT</a> &nbsp;<a href="#" style="text-decoration: none;">DELETE</a></td>
        </tr>
        
    <?php } ?>
    
    
    <?php if (mysqli_num_rows($result) === 0) { ?>   
        <tr>
            <td colspan="10">Data not found</td>
         </tr>
    <?php } ?>      
    
    </table>
 </div>
    
</body>

<style>

.role{
  display: inline-block;
  width: 20%;
  height: 30px;
  padding: 0px 10px;
  cursor: pointer;
  border: 2px solid rgba(0, 0, 0, 0.474);
  background-color: white;
  border-radius: 4px;
}

.search {
  width: 30%;
  padding: 8px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: none;
  border-bottom: 2px solid #1b105b;
}
    table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
      box-shadow: rgba(255, 255, 255, 0.1) 0px 1px 1px 0px inset, rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px;
    }
    
    td, th {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }
    

    #tablee{
        padding: 20px;
        margin: auto;
    }

    #tr{
        background-color: #1b105b;
        color: aliceblue;
    }


    @media (max-width: 480px)
{
    table{
        width: 100%;
        
    }

}

.button {
  appearance: none;
  background-color: #FAFBFC;
  border: 1px solid rgba(27, 31, 35, 0.15);
  border-radius: 6px;
  
  box-shadow: rgba(27, 31, 35, 0.04) 0 1px 0, rgba(255, 255, 255, 0.25) 0 1px 0 inset;
  box-sizing: border-box;
  color: #000000;
  cursor: pointer;
  display: inline-block;
  font-family: -apple-system, system-ui, "Segoe UI", Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji";
  font-size: 14px;
  font-weight: 500;
  line-height: 20px;
  list-style: none;
  padding: 6px 16px;
  position: relative;
  transition: background-color 0.2s cubic-bezier(0.3, 0, 0.5, 1);
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  vertical-align: middle;
  white-space: nowrap;
  word-wrap: break-word;
}

.button-4:hover {
  background-color: #F3F4F6;
  text-decoration: none;
  transition-duration: 0.1s;
}

.button-4:disabled {
  background-color: #FAFBFC;
  border-color: rgba(27, 31, 35, 0.15);
  color: #959DA5;
  cursor: default;
}

.button-4:active {
  background-color: #EDEFF2;
  box-shadow: rgba(225, 228, 232, 0.2) 0 1px 0 inset;
  transition: none 0s;
}

.button-4:focus {
  outline: 1px transparent;
}

.button-4:before {
  display: none;
}

.button-4:-webkit-details-marker {
  display: none;
}

       
</style>
</html>
