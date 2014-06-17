<?php session_start(); ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Basketmania</title>
    
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    
    <link rel="stylesheet" href="/basketmania/stylesheets/screen.css">
</head>
<body>
    <div class="container-flux">
        <div class="row">
            <div class="col-md-12">
                <nav id="navTop">
                    <div class="row">
                        <div class="navbox col-md-2"><a href="/basketmania/podstrony/zalogowany.php">Strona Glowna</a></div>
                        <div class="navbox col-md-2"><a href="/basketmania/podstrony/galeria.php">Galeria</a></div>
                        <div class="navbox col-md-2"><a href="/basketmania/podstrony/turnieje.php">Turnieje</a></div>
                        <div class="navbox col-md-2">x</div>                        
                        
                        
                        <div class="col-md-4 sideGradient">
                            <div class="row">
                                <div class="powitanie">
                                    <p><?php echo  "Witaj, " . $_SESSION['login_login'] ?></p>
                                    <a href="/basketmania/php/wyloguj.php">Wyloguj</a>
                                    <a href="#">O mnie</a>
                                </div>                    
                            </div>                            
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <div class="row top_margin">
            <div class="col-md-offset-1 col-md-10">
                <?php
                    
                    $path = '/xampp/htdocs/basketmania/user_img/'.$_SESSION['login_id']; // folder ze zdjęciami uzytkownikow
                    $img_names = scandir($path); // Nazwy wszystkich zdjęc w folderze uzytkownika
                    $img_names = preg_grep("/^[1-9]*.[a-z]{2,}/",$img_names); // Nazwy zdjęc bez tych zaczynających się na 0 ( bez avatara ktory nazywa sie 0.* )
                    foreach( $img_names as $key => $value ){                                                        
                        echo '<div class="galleryDiv"></div>';                    
                        echo "<img class='galleryImg' src=\"/basketmania/user_img/$_SESSION[login_id]/$value\" alt=\"...\">"; 
                        echo '<div class="galleryDiv"></div>';
                    }
                ?>
                <form action="/basketmania/php/file_upload.php" enctype="multipart/form-data" method="post">                
                    <input name="file" type="file">
                    <input type="submit" value="dodaj zdjęcie">
                </form>
            </div>            
        </div>
        
    </div>
    
    
    
</body>
</html>




