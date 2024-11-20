    <?php
    // Include config file
    require_once "config.php";
    
    // Define variables and initialize with empty values
    $username = $password = $confirm_password = "";
    $username_err = $password_err = $confirm_password_err = "";

    // Processing form data when form is submitted
    if($_SERVER["REQUEST_METHOD"] == "POST"){
    
        // Validate username
        if(empty(trim($_POST["username"]))){
            $username_err = "Please enter a username.";
        } else{
            // Prepare a select statement
            $sql = "SELECT id FROM users WHERE username = ?";
            
            if($stmt = mysqli_prepare($link, $sql)){
                mysqli_stmt_bind_param($stmt, "s", $param_username);
                $param_username = trim($_POST["username"]);
                
                if(mysqli_stmt_execute($stmt)){
                    mysqli_stmt_store_result($stmt);
                    if(mysqli_stmt_num_rows($stmt) == 1){
                        $username_err = "This username is already taken.";
                    } else{
                        $username = trim($_POST["username"]);
                    }
                } else{
                    echo "Oops! Something went wrong. Please try again later.";
                }

                mysqli_stmt_close($stmt);
            }
        }

        // Validate password
        if(empty(trim($_POST["password"]))){
            $password_err = "Please enter a password.";     
        } elseif(strlen(trim($_POST["password"])) < 6){
            $password_err = "Password must have at least 6 characters.";
        } else{
            $password = trim($_POST["password"]);
        }

        // Validate confirm password
        if(empty(trim($_POST["confirm_password"]))){
            $confirm_password_err = "Please confirm password.";     
        } else{
            $confirm_password = trim($_POST["confirm_password"]);
            if(empty($password_err) && ($password != $confirm_password)){
                $confirm_password_err = "Password did not match.";
            }
        }

        // Check input errors before inserting in database
        if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
            $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
            
            if($stmt = mysqli_prepare($link, $sql)){
                mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
                $param_username = $username;
                $param_password = password_hash($password, PASSWORD_DEFAULT);

                if(mysqli_stmt_execute($stmt)){
                    header("location: login.php");
                } else{
                    echo "Oops! Something went wrong. Please try again later.";
                }

                mysqli_stmt_close($stmt);
            }
        }
        
        mysqli_close($link);
    }
    ?>

    <!DOCTYPE html>
    <html lang="en" dir="ltr">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Registration Form | Career.ly</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

        * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
        }

        body {
    height: 100vh;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;;
    align-items: center;
    background: linear-gradient(135deg, #71b7e6, #9b59b6);
    }

        .container {
        max-width: 700px;
        width: 100%;
        background-color: #fff;
        padding: 25px 30px;
        border-radius: 5px;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.15);
        }
        .navbar-brand {
    width: 100%;
    margin: 20px 0;
    text-align: center;
    }

    .navbar-brand .logo {
    font-size: 48px;
    font-weight: bold;
    color: white;
    text-transform: uppercase;
    display: inline-block;
    }
        .title {
        font-size: 25px;
        font-weight: 500;
        position: relative;
        }

        .title::before {
        content: "";
        position: absolute;
        left: 0;
        bottom: 0;
        height: 3px;
        width: 30px;
        border-radius: 5px;
        background: linear-gradient(135deg, #71b7e6, #9b59b6);
        }

        .user-details {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        margin: 20px 0 12px 0;
        }

        .input-box {
        margin-bottom: 15px;
        /* width: calc(100% / 2 - 20px); */
        width: 100%;
        }

        .input-box span.details {
        display: block;
        font-weight: 500;
        margin-bottom: 5px;
        }

        .input-box input {
        height: 45px;
        width: 100%;
        outline: none;
        font-size: 16px;
        border-radius: 5px;
        padding-left: 15px;
        border: 1px solid #ccc;
        border-bottom-width: 2px;
        transition: all 0.3s ease;
        }

        .input-box input:focus,
        .input-box input:valid {
        border-color: #9b59b6;
        }

        .button {
        height: 45px;
        margin: 35px 0;
        }

        .button input {
        height: 100%;
        width: 100%;
        border-radius: 5px;
        border: none;
        color: #fff;
        font-size: 18px;
        font-weight: 500;
        letter-spacing: 1px;
        cursor: pointer;
        transition: all 0.3s ease;
        background: linear-gradient(135deg, #71b7e6, #9b59b6);
        }

        .button input:hover {
        background: linear-gradient(-135deg, #71b7e6, #9b59b6);
        }

        @media(max-width: 584px) {
        .container {
            max-width: 100%;
        }

        .input-box {
            margin-bottom: 15px;
            width: 100%;
        }
        }
    </style>
    </head>
    <body>
    <div class="navbar-brand">
        <a class="logo" href="main.php">Intelligent IT Career Advisor</a>
    </div>
    <div class="container">
        <div class="title">Sign Up</div>
        <div class="content">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="user-details">
            <div class="input-box">
                <span class="details">Username</span>
                <input type="text" name="username" placeholder="Enter your username" required class="<?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>
            <div class="input-box">
                <span class="details">Password</span>
                <input type="password" name="password" placeholder="Enter your password" required class="<?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="input-box">
                <span class="details">Confirm Password</span>
                <input type="password" name="confirm_password" placeholder="Confirm your password" required class="<?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
            </div>
            </div>
            <div class="button">
            <input type="submit" value="Register">
            </div>
            <p>Already have an account? <a href="login.php" style="color: #9b59b6;">Login here</a>.</p>
        </form>
        </div>
    </div>
    </body>
    </html>
