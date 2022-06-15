<div class="gridContainer">
    <div class="signIn">
        <form action="index.php" method="post" id='signInForm'>
            <input type="email" name="email" value="" id="email" placeholder="Email"> <br><br>
            <input type="password" name="password"  id="password" placeholder="Password"> <br><br>
            <!-- <a href="#">Forgot your password?</a> <br><br> -->
            <button class="button" type="submit">Sign In</button>
            <button type="submit" class="googleButton">Sign In with Google</button>
            <input type="hidden" name="action" value="signIn">
            <span class="errorText">Please try again</span>    
        </form>
        <?php include("view/googleLoginButton.php")?>
    </div>
</div>

<style>
    .errorText {
        visibility: hidden;
    }
</style>

<script src="public/js/signInCheck.js"></script>
