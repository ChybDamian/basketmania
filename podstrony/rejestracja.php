<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
     <link rel="stylesheet" href="/basketmania/stylesheets/screen.css">
</head>
<body>
    
  <!--  <form action="http://localhost/basketmania/php/rejestracja-basketmania.php" method="POST">
        <p>Login*: <input type="text" name="login"></p>
        <p>Haslo*: <input type="text" name="pass"></p>
        <p>e-mail*: <input type="text" name="email"></p>
        <p>Imie*: <input type="text" name="imie"></p>
        <p>Nazwisko*: <input type="text" name="nazwisko"></p>
        <p>Data urodzenia: <input type="text" name="dataUr"></p>
        <p>
            Plec*: 
            <label for="plecM">Męzczyzna</label><input type="radio" id="plecM" name="plec" value="M">
            <label for="plecK">Kobieta</label><input type="radio" id="plecK" name="plec" value="K">
        
        </p>
        <p>Akceptacja regulaminu: <input type="checkbox" value="regulamin" name="regulamin" ></p>
        
        <input type="submit" value="Dolacz do nas!">
    </form>
    
    -->
    
    <form action="/basketmania/php/rejestracja-basketmania.php" method="post" class="dark-matter">
        <h1>Rejestracja
            <span>Prosze wypelnić wszystkie pola oznaczone gwiazdką</span>
        </h1>
        <label for="login">
            <span>Login*:</span>
            <input id="login" type="text" name="login"/>
        </label>

        <label for="password">
            <span>Haslo*:</span>
            <input id="password" type="password" name="pass"/>
        </label>

        <label for="email">
            <span>Email*:</span>
            <input id="email" type="text" name="email"/>
        </label>
        <label for="name">
            <span>Imie*:</span>
            <input id="name" type="text" name="imie"/>
        </label>
        <label for="lastname">
            <span>Nazwisko*:</span>
            <input id="lastname" type="text" name="nazwisko"/>
        </label>
        <label for="dataUr">
            <span>DataUr*:</span>
            <input id="dataUr" type="text" name="dataUr"/>
        </label>
        <label>
            <span>Plec*:</span>
            <p style="font-size: 15px;">
                Mężczyzna:<input type="radio" id="plecM" name="plec" value="M">
                Kobieta: <input type="radio" id="plecK" name="plec" value="K">
            </p>
        </label>
        <label for="regulamin">
            <span>DataUr*:</span>
            <p style="font-size: 15px;">Akceptuje regulamin<input id="regulamin" type="checkbox" name="regulamin"/></p>
        </label>                                                                                                                        
         <label>
            <span></span>
            <input type="submit" value="Dolacz do nas!">
        </label>    
    </form>
</body>
</html>
