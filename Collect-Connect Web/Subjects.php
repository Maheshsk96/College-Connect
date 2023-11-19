<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subjects</title>
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
            <li><a class="" href="Users.php">Users</a></li>
            <li><a class="active" href="Subjects.php">Subjects</a></li>
            <li><a class="" href="#">Logout</a></li>
        </ul>
    </nav>


    
</body>
</html>