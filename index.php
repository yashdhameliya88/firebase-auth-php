<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: text/html; charset=UTF-8");
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Google Auth Test</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <script src="firebaseConn.js" defer type="module"></script>
    </head>

    <body>
    <div class="box">
   <h2>Sign in</h2>
   <p>Use your Google Account</p>
   <form>
     <div class="inputBox">
       <input type="email" name="email" required onkeyup="this.setAttribute('value', this.value);" value="" />
       <label>Username</label>
     </div>
     <div class="inputBox">
       <input type="password" name="password" required onkeyup="this.setAttribute('value', this.value);" value="" />
       <label>Password</label>
     </div>
     <div class="inputBox">
     <input type="submit" name="sign-in" value="Sign In" />
</div>
</form>

<div class="inputBox">
<button id="google-login-btn" type="button">
Sign in with Google
</button>
</div>
 </div>
    </body>

    </html>