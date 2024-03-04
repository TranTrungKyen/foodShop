
<html>
<head>
    <title>Login</title>
 
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/login-register.css">
</head>
<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form action="./admin/controllers/authen/checkLogin.php" method="POST">
        <h1>KFOOD</h1>

        <label for="email">Email</label>
        <input type="text" placeholder="Email" name="email" id="email">

        <label for="password">Password</label>
        <input type="password" placeholder="Password" name="password" id="password">

        <button name="submit">Log In</button>
        <div class="social">
          <div class="go"><i class="fab fa-google"></i>  Google</div>
          <div class="fb"><i class="fab fa-facebook"></i>  Facebook</div>
        </div>
        <div class="extends">
            <p>Don't have an account yet?</p><a href="register.php">Register</a>
        </div>
    </form>
</body>
</html>
