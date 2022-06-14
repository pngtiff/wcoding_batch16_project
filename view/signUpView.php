<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
</head>
<body>
    <div class="create">
        <h1>Create Account</h1>
        <form action="UserManager.php" method="post">
            <input type="text" name="login" value="" id="login" placeholder="Login"> <br><br>
            <input type="text" name="email" id="email" placeholder="Email"> <br><br>
            <input type="password" name="password"  id="password" placeholder="Password"> <br><br>
            <input type="password" name="passwordConfirm"  id="passwordConfirm" placeholder="Password confirm"> <br><br>
            <button type="submit" name="signUp" class="button">Create Account</button> <br>
        </form>
    </div>
</body>
</html>