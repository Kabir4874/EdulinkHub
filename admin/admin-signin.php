<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduLink Hub</title>
    <link rel="icon" href="Edulink Hub logo.jpg" type="image/jpg">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="header">
        <a href="#"><i class="material-icons">arrow_back</i></a>
    <h1>Admin Sign In</h1>
    </div>

    <div class="container">
        <img src="Edulink Hub logo.jpg" alt="EduLink Hub Logo" class="logo"/>

        <form class="form"> 

            <div class="input-group">
                <label for="email">Admin Email</label>
                <div class="input-box">
                    <i class="material-icons icon">email</i>
                    <input type="email" id="email" placeholder="Enter admin email" name="admin-email" required />
                    <span class="icon"><i class="fa-solid fa-envelope"></i></span>
                </div>
            </div>

            <div class="input-group">
                <label for="password">Admin Password</label>
                <div class="input-box">
                    <i class="material-icons icon" >lock</i>
                    <input type="password" id="password" placeholder="Enter password" name="admin-password" required />
                    <i class="material-icons toggle-password">visibility_off</i>
                </div>
            </div>
            <button type="submit" class="signin-btn">Admin Sign In</button>
        </form>
        <i class="fas fa-cloud"></i>
    </div> 
</body>
</html>