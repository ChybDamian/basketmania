<?php
    session_start();
    include("logowanie-mysql.php");
    
    if( isset($_POST['nazwa']) ){
        
        //czy taki zespol istnieje?
        
        $query = "SELECT tmi_name FROM team_info WHERE tmi_name = \"$_POST[nazwa]\" ";
        $result = mysql_query($query) or die("sql1: " . mysql_error());
        
        $affected_rows = mysql_affected_rows();
        if( $affected_rows == 0 ){
            echo "Nazwa teamu jest unikalna <br/>";    
            
            // validacja poprawnosci logo
            
            $allowedExts = array("gif", "jpeg", "jpg", "png");
            $temp = explode(".", $_FILES["file"]["name"]);
            $extension = end($temp);
            
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
                //TWORZENIE FOLDERU TEAMU ( NA ZDJECIA -- są one przechowywane w folderze o nazwie id teamu w bazie danych )
                $query = "SELECT tmi_teamid FROM team_info WHERE tmi_name = \"$_POST[nazwa]\"";
                $result = mysql_query($query) or die( "sql3: " . mysql_error());
                $row = mysql_fetch_row($result);
                $path = "/xampp/htdocs/basketmania/team_img/$row[0]";                
                mkdir( $path );
                //Przenoszenie zdjęcia do stworzonego folderu pod nazwą "0" ( Zdjęcie o nazwie "0" oznacza logo )
                $_FILES['file']['name'] = "0." . $extension;
                move_uploaded_file($_FILES["file"]["tmp_name"], $path . "/" . $_FILES["file"]["name"]);                
                
            }else{
                echo "Logo teamu jest niepoprawne<br/> ";
            }
            
                        
        }elseif( $affected_rows == 1 ){
            echo "Taki zespol juz istnieje<br/>";   
        }elseif( $affected_rows > 1 ){ //  Taki wynik powienien miec miejsce tylko w wypadko proby hackowania
            echo "Cos mi tu smierdzi!<br/>";
        }
             
    }else{        
        echo "Nie wprowadzono wszystkich wymaganych informacji<br/>";
    }
    
    exit();
    mysql_close($db);
    
?>