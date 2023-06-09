<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Assistant:400,700" rel="stylesheet">
        <!-- <link rel="stylesheet" href="./style.css"> -->
        <link rel="stylesheet" href="style.css">
        <title>Confluence APP || Login Page</title>
    </head>
    <body>
        <section class='login' id='login'>
            <div class='head'>
                <h1 class='company'>Universe Confluence</h1>
                <h5 class='msg'>Register Here</h5>
            </div>
            <br>
            <div class='form'>
                <form action="includes/login_data.php" method="POST">
                    <input type="text" name="studId" placeholder='Student Id' class='text' required><br><br>
                    <input type="text" name="studName" placeholder='Student Name' class='text' required><br><br>
                    <input type="email" name="studEmail" placeholder='Student Email' class='text' required><br><br>
                    <input type="password" name="studPass" placeholder='Password' class='password pass1' required><br><br>
                    <button type="submit" class='btn-login' name="signup-submit">Sign Up</button>
                    <button class='btn-login' onclick="window.location.href = 'login.php'">Login</button>
                </form>
            </div>
        </section>
    </body>
</html>