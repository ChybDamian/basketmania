<?php session_start(); ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Basketmania</title>
    
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    
    <link rel="stylesheet" href="http://localhost/basketmania/stylesheets/screen.css">
</head>
<body>
    <div class="container-flux">
        <div class="row">
            <div class="col-md-12 test">
                <nav id="navTop">
                    <div class="row">
    
                        <div class="navbox col-md-2">x</div>
                        <div class="navbox col-md-2">x</div>
                        <div class="navbox col-md-2">x</div>
                        <div class="navbox col-md-2">x</div>                        

                        <div class="col-md-3 col-md-offset-1">                            
                            <div class="powitanie">
                                <p><?php echo  "Witaj, " . $_SESSION['login_login'] ?></p>
                                <a href="http://localhost/basketmania/php/wyloguj.php">Wyloguj</a>
                                <a href="#">O mnie</a>
                            </div>                    
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <div class="row top_margin">
            <div class="col-md-offset-1 col-md-3 user_info">
                <img class="avatar" src="http://localhost/basketmania/img/avatar.png" alt="avatar">
                <form action="http://localhost/php/uplad_img.php" method="POST">                    
                    <input type="file">
                    <input type="submit" value="dodaj zdjęcie">
                </form>
                
                <p class="imie">Imie: <?php echo $_SESSION['login_firstname'] ?></p>
                <p class="nazwisko">Nazwisko: <?php echo $_SESSION['login_lastname'] ?></p>
            </div>
            <div class="col-md-offset-1 col-md-6 team">
                
            </div>
        </div>        
        
    </div>
    
    
    
</body>
</html>




