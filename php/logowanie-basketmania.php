<?php
    session_start();
    include("logowanie-mysql.php");
    
    
    if( isset($_GET['login']) && isset($_GET['pass']) ){
        if( preg_match('%^[A-Za-z0-9]{4,20}$%', stripslashes(trim($_GET['login']))) ){
            echo "Podany login jest prawidlowy <br/>";
            $login = $_GET['login']; 
        }else{
            echo "Podany login jest nieprawidlowy "; 
            $login = FALSE;
        }
        
        if( preg_match('%^[A-Za-z0-9]{4,20}$%', stripslashes(trim($_GET['pass']))) ){ // dodac mozliwosc wpisywania znakow specjalnych
            echo "Podane haslo jest prawidlowe <br/>";
            $pass = $_GET['pass'];
        }else{
            echo "Podany haslo jest nieprawidlowe "; 
            $pass = FALSE;
        }
        
    }else{
        echo "uzytkownik nie podal wszystkich wymaganych wartosci <br/><br/>";
    }
    
    // CAPTCHA SYSTEM
    
    
    
    
    // CAPTCHA SYSTEM
    
    if( $login && $pass ){
        $query = "SELECT users_id, users_login, users_password FROM users WHERE users_login= \"$login\" AND users_password=\"$pass\""; // !! SHA()
        $result = mysql_query($query) or die("Nie ma takiego uzytkownika lub hasla");
        
        if( mysql_affected_rows() == 1 ){
            $row = mysql_fetch_array( $result, MYSQL_NUM );
            $_SESSION['user_id'] = $row[0];
            $_SESSION['user_login'] = $row[1];
 
            /*
            $tokenId = rand(10000,99999); // ochrona przed "php fixation" ???
            $query = 'UPDATE USERS SET users_tokenid = $tokenId WHERE users_id = "' . $_SESSION['user_id'] . '"'; 
            $result = mysql_query($query) or die("dodanie tokena nie zadzialalo");
            session_regenerate_id();
            */
            
             
            echo "<br/><br/> logowanie-basketmania -- success <br/>";
            header("Location: http://localhost/basketmania/podstrony/zalogowany.php");
             
        }
    }    
    

     mysqli_close($db);
     exit();
?>