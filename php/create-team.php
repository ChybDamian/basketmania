<?php
    session_start();
    include("logowanie-mysql.php");
    
    if( isset($_POST['nazwa']) ){
        
        //czy taki zespol istnieje?
        $query = "SELECT tmi_name FROM team_info WHERE tmi_name = \"$_POST[nazwa]\" ";
        $result = mysql_query($query) or die("sql1: " . mysql_error());
        
        $affected_rows = mysql_affected_rows(); //czy taki zespol istnieje?
        if( $affected_rows == 0 ){
            echo "Nazwa teamu jest unikalna <br/>";    
            
            // validacja poprawnosci logo
            
            $allowedExts = array("gif", "jpeg", "jpg", "png");
            $temp = explode(".", $_FILES["file"]["name"]);
            $extension = end($temp);
            
            $query = "SELECT teamid FROM login WHERE login_id = $_SESSION[login_id]";
            $result = mysql_query($query) or die("$query --->>>" . mysql_error() );
            $row = mysql_fetch_row($result);
            
            if ( !$row[0] ){ // czy uzytkownik zalozyl juz jakis zespol?
            
                if ( 
                    (($_FILES["file"]["type"] == "image/gif")
                    || ($_FILES["file"]["type"] == "image/jpeg")
                    || ($_FILES["file"]["type"] == "image/jpg")
                    || ($_FILES["file"]["type"] == "image/pjpeg")
                    || ($_FILES["file"]["type"] == "image/x-png")
                    || ($_FILES["file"]["type"] == "image/png"))
                    && ($_FILES["file"]["size"] < 2000000)
                    && in_array($extension, $allowedExts)
                ){
                    // TWORZENIE RECORDU TEAMU
                    $query = "INSERT INTO team_info VALUES(NULL,\"$_POST[nazwa]\",\"$_SESSION[login_id]\")";
                    $result = mysql_query($query) or die("sql2: " . mysql_error);                                                                      

                    //TWORZENIE FOLDERU TEAMU ( NA ZDJECIA -- są one przechowywane w folderze o nazwie id teamu na serverze )
                    $query = "SELECT tmi_teamid FROM team_info WHERE tmi_name = \"$_POST[nazwa]\"";
                    $result = mysql_query($query) or die( "sql3: " . mysql_error());
                    $row = mysql_fetch_row($result);
                    $idTeamu = $row[0];
                    $path = "/xampp/htdocs/basketmania/team_img/$idTeamu";                
                    mkdir( $path );
                    //Przenoszenie zdjęcia do stworzonego folderu pod nazwą "0" ( Zdjęcie o nazwie "0" oznacza logo )
                    $_FILES['file']['name'] = "0." . $extension;
                    move_uploaded_file($_FILES["file"]["tmp_name"], $path . "/" . $_FILES["file"]["name"]);                

                    //DODAWANIE INFORMACJI O TYM CZY UZYTKOWNIK JEST LEADEREM/ POSIADA ZESPOL
                    $query = "UPDATE login SET teamid = $idTeamu, isLeader = 1 WHERE login_id = $_SESSION[login_id]";
                    echo $query . "<br/>";                                
                    mysql_query($query) or die("sql4: " . mysql_error() );
                }else{
                    echo "Logo teamu jest niepoprawne<br/> ";
                }
                
            }else{
                echo "Uzytkownik moze miec byc liderem tylko jednego zespolu<br/>";
            }                               
            
                        
        }elseif( $affected_rows == 1 ){
            echo "Taki zespol juz istnieje<br/>";   
        }elseif( $affected_rows > 1 ){ //  Taki wynik powienien miec miejsce tylko w wypadko proby hackowania
            echo "Cos mi tu smierdzi!<br/>";
        }
             
    }else{        
        echo "Nie wprowadzono wszystkich wymaganych informacji<br/>";
    }
    
    
    header("Location: /basketmania/podstrony/zalogowany.php");
    exit();
    mysql_close($db);
    
?>