<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    
    <form action="http://localhost/basketmania/php/logowanie-basketmania.php" metchod="GET">
        <p>Login: <input type="text" name="login"></p>
        <p>Haslo: <input type="text" name="pass"></p>
        <p>e-mail: <input type="text" name="e-mail"></p>
        <p>Imie: <input type="text" name="imie"></p>
        <p>Naziwsko: <input type="text" name="nazwisko"></p>
        <p>
            Plec: 
            <label for="plec">Męzczyzna</label><input type="radio" id="plec" name="plec" value="M">
            <label for="plec">Kobieta</label><input type="radio" id="plec" name="plec" value="K">
        
        </p>
        <input type="submit">
    </form>
    
</body>
</html>