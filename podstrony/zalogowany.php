<?php session_start(); ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Basketmania</title>
    
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>    
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>
    
        $(document).ready(function(){
            $('#btnJoinTeam').click(function(){
                 $('#formJoinTeam').toggle();
                 $('#teams').toggle();
                 $('#formCreateTeam').hide();
                 
                 $.ajax({
                    type: "POST",
                    url: "/basketmania/php/find-team.php",
                    data: { name: "John", location: "Boston" },
                    beforeSend: function(){                        
                        $('#teams .loading').toggle();
                        $('#teams .list-group-item').remove();
                    },
                    success: function(data){
                        $('#teams .loading').toggle();            
                        var dataArr = data.split(",");
                        dataArr.splice(dataArr.length-1,1); // usuniecie ostatniego elementu array'a ( z powodu przecinka ktory bedzie na koncu data )
                       // alert(dataArr);
                                                
                        var t= dataArr.length/2;
                        for( var i=0; i<t; i++ ){
                            var nazwaTeamu = dataArr.shift(),
                                imgSrc = dataArr.shift();
                                                           
                            $('#teams').append('<li class="list-group-item team"><img src="'+imgSrc+'" alt="">'+nazwaTeamu+'</li>');
                        }
                    }
                 })
            
            });
            
            $('#btnCreateTeam').click(function(){
                $('#formCreateTeam').toggle();
                $('#formJoinTeam').hide();
                $('#teams').hide();
                
            });
            
            $('#zmianaAvataru btn-file').click(function(){
                //this.
            });
        });
        
        
    </script>
     
     

    <link rel="stylesheet" href="/basketmania/stylesheets/screen.css">
</head>
<body class="gradientBackground">
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
            <div class="col-md-offset-1 col-md-3">
                <div class="panel panel-primary">
                    <div class="panel-heading"><h3 class="panel-title center">O mnie</h3></div>
                    <div class="panel-body">
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
                        
                        <form id="zmianaAvataru" action="/basketmania/php/file_upload.php" enctype="multipart/form-data" method="POST">
                            <input hidden="hidden" name="avatar" type="text">
                            <span class="btn btn-default btn-file">
                                <span>Zmiana zdjęcia</span>
                                <input name="file" type="file">    
                            </span>                        
                            <input type="submit" value="dodaj zdjęcie">
                            
                        </form>
                        <hr>

                        <p class="user_info_paragraph">Imie: <?php echo $_SESSION['login_firstname'] ?></p>
                        <p class="user_info_paragraph">Nazwisko: <?php echo $_SESSION['login_lastname'] ?></p>
                        <p class="user_info_paragraph"><?php if(0){ echo "Zespol: "; } ?></p> 
                    </div>
                </div>
            </div>
            <div class="col-md-offset-1 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading"><h3 class="panel-title center">Zespoly</h3></div>
                        <div class="panel-body">
                            <button id="btnJoinTeam" class="btn btn-primary">Dolącz do zespolu</button> <!--AJAX -->
                            <button id="btnCreateTeam" class="btn btn-primary">Stworz zespol</button>
                        </div>                    
                    
                        <form id="formJoinTeam" hidden="hidden" enctype="multipart/form-data" action="/basketmania/php/find-team.php" method="post">
                            Nazwa zespolu: <input name="nazwa" type="text"><input class="btn btn-primary" style="margin-left: 10px;" type="submit" value="znajdz zespol">
                        </form>

                        <form id="formCreateTeam" class="test" hidden="hidden" enctype="multipart/form-data" action="/basketmania/php/create-team.php" method="post">
                            <p>Nazwa zespolu: <input name="nazwa" type="text"></p>

                            <p>Logo zespolu: <input name="file" type="file"></p>
                            <input type="submit" value="zaloz zespol">
                        </form>
                        <ul id="teams" class="list-group" hidden="hidden">
                            <img src="/basketmania/img/Vector_Loading_fallback.gif" class="loading" hidden="hidden">
                        </ul>                        

                    </div>
                    

            </div>
        </div>        
        <div class="row" style="padding-top: 20px;" >
            <div class="col-md-offset-1 col-md-3 user_info">
                Lista zawodnikow mojego zespolu
            </div>
            <div class="col-md-offset-1 col-md-6" style="border: 1px solid black; height: 500px;"> 
                Komunikaty, chat
            </div>
        </div>
    </div>
    
    
    
</body>
</html>




