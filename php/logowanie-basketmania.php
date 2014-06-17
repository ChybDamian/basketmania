<?php
    session_start();
    include("logowanie-mysql.php");

    
    if( isset($_POST['login']) && isset($_POST['pass']) ){
       // walidacja wyslanych informacji
       if( preg_match('%^[A-Za-z0-9]{4,20}$%', stripslashes(trim($_POST['login']))) && preg_match('%^[A-Za-z0-9]{4,20}$%', stripslashes(trim($_POST['login']))) ){
            echo "Podany login i haslo zawiera porawne znaki<br/>";

            $query = "SELECT login_id, login_login, login_password, login_firstname, login_lastname FROM login WHERE login_login= '$_POST[login]' AND login_password= '$_POST[pass]' ";            

            
            $result = mysql_query($query) or die("query nie zadzialalo");;    
            $affected_rows = mysql_affected_rows();
        
            echo $affected_rows . "<br/>";
            
            if( $affected_rows == 0 ){
                die( "Nie ma takiego uzytkownika" );
            }elseif( $affected_rows == 1 ){
                $row = mysql_fetch_array( $result, MYSQL_NUM );
                $_SESSION['login_id'] = $row[0];
                $_SESSION['login_login'] = $row[1];
                $_SESSION['login_firstname'] = $row[3];
                $_SESSION['login_lastname'] = $row[4];

                
                echo "<br/><br/> logowanie-basketmania -- success <br/>";
                header("Location: /basketmania/podstrony/zalogowany.php");

            }elseif( $affected_rows > 1 ){
                echo "Cos mi tutaj smierdzi!<br/>";
            }            
             

       }else{
           echo "Podany login lub haslo zawiera niepoprawne znaki<br/>";
       }       
    }else{
        echo "Nie wprowadzono wszystkich potrzebnych danych<br/>";
    }
    
    // CAPTCHA SYSTEM
    
    
    
    
    // CAPTCHA SYSTEM
    

    

     mysqli_close($db);
     exit();
?>