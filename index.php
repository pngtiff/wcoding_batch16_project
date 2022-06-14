<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="create">
        <h1>Create Account</h1>
        <form action="model/UserManager.php" method="post">
            <input type="text" name="firstName" id="firstName" placeholder="First Name"> <br><br>
            <input type="text" name="lastName" id="lastName" placeholder="Last Name"> <br><br>
            <input type="text" name="email" id="email" placeholder="Email"> <br><br>
            <input type="password" name="password"  id="password" placeholder="Password"> <br><br>
            <input type="password" name="passwordConfirm"  id="passwordConfirm" placeholder="Password confirm"> <br><br>
            <button type="submit" name="signUp" class="button">Create Account</button> <br><br>
        </form>
        <button type="submit" name="googleSignup" class="button" onclick="view/googleLoginButton">Log in using Google</button>
    </div>
</body>
</html>