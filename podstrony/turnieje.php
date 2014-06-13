<?php 
    session_start(); 
    include("../php/logowanie-mysql.php");
    
    $nazwaTurnieju = "tes1";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    
    
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>    
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="http://localhost/basketmania/stylesheets/screen.css">
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
            <div class="col-md-offset-1 col-md-10 listaZespolow">
                <p><strong style="font-weight: bold;">Zespoly biorące udzial:</strong>
                <?php
                    $tabelaTurnieju = 'turniej_'.$nazwaTurnieju.'_zespoly';
                    $query = "SELECT team_info.tmi_name FROM $tabelaTurnieju JOIN team_info ON $tabelaTurnieju.teamid = team_info.tmi_teamid";
                    $result = mysql_query($query) or die( "sql1: " . mysql_error());

                    while( $row = mysql_fetch_row($result)){
                        foreach( $row as $key => $value ){
                            echo "$value ";
                        }
                    }
                
                ?> 
                </p>       
            </div>        
        </div>
        
        <div class="row top_margin">
            <div class="col-md-offset-1 col-md-10">
                <table class="table table-striped table-condensed">
                    <thead>
                        <tr>
                            <th>Mecze</th>
                            <th colspan="2">Druzyny</th>                        
                            <th colspan="2">Wynik</th>
                            <th>Data</th>
                        </tr>    
                    </thead>
                    <tbody>
                            <?php
                                $tabelaMeczyTurnieju = 'turniej_'.$nazwaTurnieju.'_mecze';
                                $query = "SELECT mecz_id, t1.tmi_name, t2.tmi_name, m.team1_score, m.team2_score, m.mecz_data
                                          FROM $tabelaMeczyTurnieju m 
                                          JOIN team_info t1 ON m.team1_id = t1.tmi_teamid
                                          JOIN team_info t2 ON m.team2_id = t2.tmi_teamid";                            
                                          
                                $result = mysql_query($query) or die("sql2: " . mysql_error());
                                                                
                                while( $row = mysql_fetch_row($result)){
                                    echo "<tr>";
                                    foreach( $row as $key => $value ){
                                        echo "<td>";
                                        if( $value )
                                            echo "$value ";
                                        else
                                            echo " - ";
                                        echo "</td>";
                                    }
                                    echo "</tr>";
                                }
                                                                                                
                                //SELECT mecz_id, t1.tmi_name, t2.tmi_name, m.team1_score, m.team2_score, m.mecz_data FROM turniej_tes1_mecze m JOIN team_info t1 ON m.team1_id = t1.tmi_teamid JOIN team_info t2 ON m.team2_id = t2.tmi_teamid                                 
                                
                            ?>
                    </tbody>
                    <tfoot>


                    </tfoot>        
                </table>
            </div>
        </div>
    </div>
    
</body>
</html>