<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
    </nav>

    <!-- ================================================================================= -->

    
<div class="container">

    <h2>Login</h2>
        <form action="" method="post" enctype="multipart/form-data">         
  
            <div class="input-name">
            <input type="text" class="comon"  id="username" name="username" placeholder="Username">
            </div>

            <div class="input-name">
                <input type="text" class="comon"  id="password" name="password" placeholder="Password">
                </div>
            
            <div class="input-name">
            <input type="submit" name="submit" class="submit" value="Login">
            </div>
</form> 
</div>
    
</body>
</html>