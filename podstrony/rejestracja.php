<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    
    <form action="http://localhost/basketmania/php/rejestracja-basketmania.php" method="POST">
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
    
</body>
</html>