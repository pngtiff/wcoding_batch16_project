<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    <link rel="stylesheet" href="public/style/style.css">
</head>
<body>
    <div class="create">
        <h1>Create Account</h1>
        <form id="signUpForm" action="index.php" method="post">
            <div class="firstName">
                <input type="text" name="firstName" id="firstName" placeholder="First Name" required>
                <div class="nameError"><em>Please enter 2 or more characters (only letters)</em></div><br>
            </div>
            <div class="lastName">
                <input type="text" name="lastName" id="lastName" placeholder="Last Name" required> 
                <div class="lastNameError"><em>Please enter 2 or more characters (only letters)</em></div><br>
            </div>
            <div class="email">
                <input type="text" name="email" id="email" placeholder="Email" required> 
                <div class="emailError"><em>Please enter a valid email address</em></div><br>
            </div>
            <div class="password">
                <input type="password" name="password"  id="password" placeholder="Password" required> 
                <div class="passwordError"><em>Must be a minimum of 8 characters: at least 1 uppercase, at least 1 lowercase, at least 1 digit, at least 1 special character: !@#$%^&*-</em></div><br>
            </div>
            <div class="passwordConfirm">
                <input type="password" name="passwordConfirm"  id="passwordConfirm" placeholder="Password Confirm" required> 
                <div class="passwordConfirmError"><em>Password must match</em></div><br>
            </div>
            <button id="submit "type="submit" name="signUp" class="button">Create Account</button> <br><br>
            <input type="hidden" name="action" value="signUp">
        </form>
        <button id="submit" type="submit" name="googleSignup" class="button" onclick="view/googleLoginButton">Sign in using Google</button> <br><br>
        <button id="reset" type="reset" onclick="resetForm()">Reset the form</button>
    </div>

    <script src="public/js/signUp.js"></script>
</body>
</html>