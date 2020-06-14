<?php

    include("includes/classes/Account.php");

    $account = new Account();

    include("includes/handlers/register-handler.php");
    include("includes/handlers/login-handler.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Music App</title>
</head>
<body>
    <div id="inputContainer">
        <form id="loginForm" action="register.php" method="POST">
            <h2>Login to your Account</h2>
            <p>
                <label for="loginUsername">Username</label>
                <input id="loginUsername" name="loginUsername" type="text" placeholder="Enter Your Username" required>
            </p>
            <p>
                <label for="loginPassword">Password</label>
                <input id="loginPassword" name="loginPassword" type="password" placeholder="Enter Your Password" required>
            </p>
            <button type="submit" name="loginButton">LOG IN</button>
        </form>

        <form id="registerForm" action="register.php" method="POST">
            <h2>Create Account</h2>
            <p>
                <?php echo $account->getError("Username must be between 2 and 15 characters"); ?>
                <label for="username">Username</label>
                <input id="username" name="username" type="text" placeholder="Enter Your Username" required>
            </p>
            <p>
                <?php echo $account->getError("First Name must be between 2 and 20 characters"); ?>
                <label for="firstName">First Name</label>
                <input id="firstName" name="firstName" type="text" placeholder="Enter Your First Name" required>
            </p>
            <p>
                <?php echo $account->getError("Last Name must be between 2 and 20 characters"); ?>
                <label for="lastName">Last Name</label>
                <input id="lastName" name="lastName" type="text" placeholder="Enter Your Last Name" required>
            </p>
            <p>
                <?php echo $account->getError("Provided Emails don't match"); ?>
                <?php echo $account->getError("Email format is invalid"); ?>
                <label for="email">Email</label>
                <input id="email" name="email" type="text" placeholder="Enter Your Email" required>
            </p>
            <p>
                <label for="email2">Confirm Email</label>
                <input id="email2" name="email2" type="email" placeholder="Confirm Your Email" required>
            </p>
            <p>
                <?php echo $account->getError("Provided Passwords don't match"); ?>
                <?php echo $account->getError("Your Password must be at least 8 characters long"); ?>
                <label for="password">Password</label>
                <input id="password" name="password" type="password" placeholder="Enter Your Password" required>
            </p>
            <p>
                <label for="password2">Confirm Password</label>
                <input id="password2" name="password2" type="password" placeholder="Confirm Your Password" required>
            </p>
            <button type="submit" name="registerButton">SIGN UP</button>
        </form>
    </div>
</body>
</html>