<!doctype html>
<html class="login_gradient" lang="en">
<head>
    <meta charset="UTF-8">
    <title>Logowanie</title>            
    <link rel="stylesheet" href="/basketmania/stylesheets/screen.css">
</head>
<body>
    <div>
        
       <form  action="/basketmania/php/logowanie-basketmania.php" method="post" class="dark-matter">
            <h1>Logowanie</h1>
            <label for="login">
                <span>Login :</span>
                <input id="login" type="text" name="login"/>
            </label>

            <label for="pass">
                <span>Haslo :</span>
                <input id="pass" type="password" name="pass"/>
            </label>
             <label>
                <span>&nbsp;</span>
                <input type="submit" class="button" value="Zaloguj" />
            </label>    
        </form>
    </div>
</body>
</html>