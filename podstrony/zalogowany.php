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
                                <p><?php echo  "Witaj, " . $_SESSION['user_login'] ?></p>
                                <a href="#">Wyloguj</a>
                                <a href="#">O mnie</a>
                            </div>                    
                        </div>
                    </div>
                </nav>
            </div>
        </div>        
        
    </div>
    
    
    
</body>
</html>




