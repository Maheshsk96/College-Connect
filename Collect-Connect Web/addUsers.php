<?php

require_once "rds_DB.php";

if (isset($_POST['submit'])) {

    $roll = $_POST['roll'];
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    $dno = $_POST['dno'];
    $year = $_POST['year'];
    $sem = $_POST['sem'];
    $p_id = $_POST['p_id'];
    $gender = $_POST['gender'];


    $query = "INSERT INTO student (s_roll, s_name, s_mobile, s_email, s_dob, s_address, s_password, dno, year, sem, p_id, s_gender) VALUES ('$roll','$name','$mobile','$email','$date','$address','$password','$dno','$year','$sem', '$p_id','$gender')";
    
    $result = mysqli_query($con, $query);

}
mysqli_close($con);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Users</title>
    <link rel="stylesheet" type="text/css" href="web.css">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="https://kit.fontawesome.com/4c9f55937e.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

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
if ($result===true) {
    ?>
    <script>
        $(document).ready(function() {
            swal({
                title: "Success User Registration!!",
                icon: "success",
                button: "Ok",
                timer: 12000
            });
        });
    </script>
<?php } ?>

<?php
if ($result === false) {
    ?>
    <script>
        $(document).ready(function() {
            swal({
                title: "Faild User Registration",
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
            <li><a class="" href="Notice.php">Notice</a></li>
            <li><a class="active" href="Users.php">Users</a></li>
            <li><a class="" href="Subjects.php">Subjects</a></li>
            <li><a class="" href="#">Logout</a></li>
        </ul>
    </nav>

    <!-- ================================================================================= -->

    <div class="container">

        <h2>Add User</h2>
        
        <form action="" method="post" enctype="multipart/form-data">
      
        <table>

                <div class="input-name">
                    
                     <tr><td><label for="p_id">Person Role: </label></td> <td>
                         
                     <select name="p_id"  class="ucomon">
                    
                        <option value="P-11">Student</option>
                     
                        <option value="P-12">Teacher</option>
                    
                        <option value="P-13">HOD</option>
                
                    </select></td></tr>
                </div>
                
  
                <div class="input-name">
                    
                    <tr><td><label for="roll">Roll No: </label></td><td>
                        
                    <input type="text" class="ucomon" name="roll" placeholder="Roll No"></td></tr>
                    
                </div>

            
                <div class="input-name">
                    
                    <tr><td><label for="name">Name: </label></td><td>
                    
                    <input type="text" class="ucomon"  name="name" placeholder="Name"></td></tr>
                
                </div>


                <div class="input-name">
                   
                    <tr><td><label for="gender">Gender: </label></td><td>
                    
                    <select name="gender"  class="ucomon">
                        
                        <option value="Male">Male</option>
                         
                        <option value="Female">Female</option>
                        
                        <option value="Other">Other</option>
                    
                    </select></td></tr>
                
                </div>

            
                <div class="input-name">
                   
                    <tr><td><label for="mobile">Mobile No: </label> </td><td>
                   
                    <input type="tel" class="ucomon"  name="mobile" placeholder="Mobile No" pattern="[0-9]{10}"></td></tr>
                
                </div>

                
                <div class="input-name">
                    
                    <tr><td><label for="email">Email id: </label></td><td>
                    
                    <input type="email" class="ucomon"  name="email" placeholder="Email Id" required></td></tr>
                
                </div>

                
                <div class="input-name">
                    
                    <tr><td><label for="date">Date of Birth:</label></td>
                    
                    <td> <input type="date" class="date" name="date" value="2017-06-01" /></td></tr>
                
                </div>
                
    
                <div class="input-name">
                    
                    <tr><td> <label for="address">Address: </label> </td><td>
                    
                    <input type="text" class="ucomon" name="address" placeholder="Address"></td></tr>
                            
                </div>

                
                <div class="input-name">
                    
                    <tr><td><label for="branch">Branch: </label></td><td> <select name="dno"  class="ucomon">
                                    
                        <option value="101">Computer Science & Engg</option>
                                     
                        <option value="102">Electronics & Telecommunication Engg</option>
                                    
                        <option value="103">Civil Engg</option>
                                
                        <option value="104">Mechanical Engg</option>
                                
                    </select></td></tr>
                
                </div>

                       
                <div class="input-name">
                    
                    <tr><td><label for="year">Year: </label> </td><td>
                    
                    <select name="year" class="ucomon"  id="yearSelect" onchange="updateSemesterOptions()">
                                    
                        <option value="1">First Year</option>
                                     
                        <option value="2">Second Year</option>
                                    
                        <option value="3">Third Year</option>
                                
                        <option value="4">Fourth Year</option>
                        
                    </select></td></tr>
                
                </div>


                <div class="input-name">
                    
                    <tr><td><label for="sem">Semester: </label></td><td> 
                    
                    <select class="ucomon" name="sem"  id="semSelect">
                                    
                        <option value="1">1st Sem</option>
                                     
                        <option value="2">2nd Sem</option>
                                    
                        <option value="3">3rd Sem</option>
                                
                        <option value="4">4th Sem</option>

                        <option value="5">5th Sem</option>
                                     
                        <option value="6">6th Sem</option>
                                    
                        <option value="7">7th Sem</option>
                                
                        <option value="8">8th Year</option>
                                
                    </select></td></tr>
                
                </div>

            
                <div class="input-name">
                
                    <tr><td> <label for="password">Password: </label></td><td>
                    
                    <input type="password" class="ucomon"  id="password" name="password" placeholder="Password">
                    
                    <input type="checkbox" id="showPassword" onclick="togglePasswordVisibility()">
                     
                     <label for="showPassword">Show Password</label></td></tr>
                
                </div>
    
                <div class="input-name">
                    
                    <tr><td colspan="2"> <input type="submit" name="submit" class="button" value="Submit"></td></tr>
                
                </div>

        </table>
            
        </form> 
    
    </div>
    
</body>



<style>

.date {
    border: 2px solid #dadada;
    border-radius: 7px;
    width: 45%;
    padding: 8px 20px;
    margin: 8px 0;
    box-sizing: border-box;
}

.date:focus { 
    outline: none;
    border-color: #9ecaed;
    box-shadow: 0 0 10px #9ecaed;
}


.ucomon {
    border: 2px solid #dadada;
    border-radius: 7px;
    width: 100%;
    padding: 8px 20px;
    margin: 8px 0;
    box-sizing: border-box;
}

.ucomon:focus { 
    outline: none;
    border-color: #9ecaed;
    box-shadow: 0 0 10px #9ecaed;
}



    table {
      font-family: arial, sans-serif;
      font-size: 14px;
      border-collapse: collapse;
      width: 100%;
      
    }
    
    td{
      text-align: left;
      padding: 8px;
    }

/* CSS */
.button {
  appearance: none;
  background-color: #FAFBFC;
  border: 1px solid rgba(27, 31, 35, 0.15);
  border-radius: 6px;
  box-shadow: rgba(27, 31, 35, 0.04) 0 1px 0, rgba(255, 255, 255, 0.25) 0 1px 0 inset;
  box-sizing: border-box;
  color: #24292E;
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



<script>


function togglePasswordVisibility() {
    var passwordInput = document.getElementById("password");
    var showPasswordCheckbox = document.getElementById("showPassword");

    if (showPasswordCheckbox.checked) {
      passwordInput.type = "text";
    } else {
      passwordInput.type = "password";
    }
  }

    //---------------------------------------------------------
    function updateSemesterOptions() {
      var yearSelect = document.getElementById("yearSelect");
      var semSelect = document.getElementById("semSelect");
      var selectedYear = yearSelect.value;
  
      // Reset the semSelect options
      semSelect.innerHTML = "";
  
      // Add the relevant semester options based on the selected year
      if (selectedYear === "1") {
        addOption(semSelect, "1", "1st Sem");
        addOption(semSelect, "2", "2nd Sem");
      } 
      else if (selectedYear === "2") {
        addOption(semSelect, "3", "3rd Sem");
        addOption(semSelect, "4", "4th Sem");
      }
       else if (selectedYear === "3" ){
        addOption(semSelect, "5", "5th Sem");
        addOption(semSelect, "6", "6th Sem");
      }
      else if ( selectedYear === "4") {
        addOption(semSelect, "7", "7th Sem");
        addOption(semSelect, "8", "8th Sem");
      }
  
      // You can customize the conditions and options based on your specific requirements
  
      // Trigger a change event on semSelect to update its value (if necessary)
      var event = new Event("change");
      semSelect.dispatchEvent(event);
    }
  
    function addOption(select, value, text) {
      var option = document.createElement("option");
      option.value = value;
      option.text = text;
      select.appendChild(option);
    }
  
    // Initial update to set the correct semester options based on the default year selection
    updateSemesterOptions();
  </script>

</html>