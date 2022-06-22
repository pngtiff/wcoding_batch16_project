<form action="index.php" method="post" id='signInForm'>
    <h2>Sign In:</h2>
    <br>
    <!-- calling rememberMe feature function -->
    <input type="email" name="email" value="<?=!empty($_COOKIE['email']) ? $_COOKIE['email'] : ''?>" id="emailIn" placeholder="Email"> <br><br>
    <input type="password" name="password"  id="passwordIn" placeholder="Password"> <br><br>
    <!-- <a href="#">Forgot your password?</a> <br><br> -->
    
    <div>
        <label for="rememberMe">Remember Me</label>
        <input type="checkbox" name="rememberMe" id="rememberMe">
    </div>
    
    <button class="button" type="submit">Sign In</button>
    <input type="hidden" name="action" value="signIn">
    <span class="errorText">Please try again</span>    
</form>
<?php include("view/googleLoginButton.php")?>

<script src="public/js/signInCheck.js"></script>


