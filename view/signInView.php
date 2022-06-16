<form action="index.php" method="post" id='signInForm'>
    <input type="email" name="email" value="" id="emailIn" placeholder="Email"> <br><br>
    <input type="password" name="password"  id="passwordIn" placeholder="Password"> <br><br>
    <!-- <a href="#">Forgot your password?</a> <br><br> -->
    <button class="button" type="submit">Sign In</button>
    <input type="hidden" name="action" value="signIn">
    <span class="errorText">Please try again</span>    
</form>
<?php include("view/googleLoginButton.php")?>

<script src="public/js/signInCheck.js"></script>
