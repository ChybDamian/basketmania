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
                        <div class="navbox col-md-2"><a href="/basketmania/podstrony/zalogowany.php">Strona Glowna</a></div>
                        <div class="navbox col-md-2"><a href="/basketmania/podstrony/galeria.php">Galeria</a></div>
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
                <img class="avatar" 
                src=
                    <?php
                        $path = '/xampp/htdocs/basketmania/user_img/'.$_SESSION['login_id'];                
                        $name = glob($path."/0.*"); // nazwa wraz ze sciezka dostepu ( name -> array )
                                    
                        if( $name ){ // jesli uzytkownik chce zmienic avatar ( posiada avatar tzn plik 0.* )          
                            $name = end(explode("/",$name[0])); // sama nazwa pliku; ( name -> string )
                            echo "/basketmania/user_img/$_SESSION[login_id]./".$name;                                       
                        }else{ // jesli uzytkownik nie posiada wlasnego avataru
                            echo "/basketmania/img/avatar.png";       
                        }                                                                          
                    ?>                                                         
                    
                alt="avatar">                                                                                            

                <form action="http://localhost/basketmania/php/file_upload.php" enctype="multipart/form-data" method="POST">
                    <input name="file" type="file">
                    <input hidden="hidden" name="avatar" type="text">
                    <input type="submit" value="dodaj zdjęcie">
                </form>
                
                <p class="user_info_paragraph">Imie: <?php echo $_SESSION['login_firstname'] ?></p>
                <p class="user_info_paragraph">Nazwisko: <?php echo $_SESSION['login_lastname'] ?></p>
                <p class="user_info_paragraph"><?php if(0){ echo "Zespol: "; } ?></p> 
            </div>
            <div class="col-md-offset-1 col-md-6 team">
                    <button id="dolaczDoZespolu" class="btn btn-primary">Dolącz do zespolu</button> <!--AJAX -->
                    <button id="stworzZespol" class="btn btn-primary">Stworz zespol</button>
            </div>
        </div>        
        
    </div>
    
    
    
</body>
</html>




