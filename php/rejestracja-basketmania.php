<?php    
    // DODAC CAPTHCA I AKTYWACJE EMAIL
    include("logowanie-mysql.php");
    
    //Jesli wszystkie wymagane wartosci zostaly wyslane z formularza
    function dataSent(){
        if( isset($_POST['login']) && isset($_POST['pass']) && isset($_POST['email']) && isset($_POST['imie']) && isset($_POST['nazwisko']) && isset($_POST['dataUr']) && isset($_POST['plec']) && isset($_POST['regulamin']) ){
            return true;
        }
        
        echo "Nie wpisano wszystkich wymaganych informacji<br/>";
        return false;
    }
        
    echo mysql_num_rows(mysql_query("SELECT login_login FROM login WHERE login_login = '$_POST[login]'")) . "<br/>";
    
    function validate(){
        //Czy podany login jest zajęty4
        if( !mysql_num_rows(mysql_query("SELECT login_login FROM login WHERE login_login = '$_POST[login]'")) && preg_match('%^[A-Za-z0-9]{6,20}$%', stripslashes(trim($_POST['login']))) ){  // DOPISAC REGEXP
            echo "login jest unikalny<br/>";
        }else{
            echo "taki login juz istnieje, lub jest nieprawidlowy<br/>";
            return false;
        }
            
        if( !preg_match('%^[A-Za-z0-9]{8,20}$%', stripslashes(trim($_POST['pass']))) ){  // DOPISAC MOZLIWOSC ZNAKOW SPECJALNYCH
            echo "haslo jest nie prawidlowe<br/>";                
            return false;
        }
        
        if( !mysql_query("SELECT login_email FROM login WHERE login_email = '$_POST[email]'")){ // DOPISAC REGEXP DLA EMAIL'A
            echo "Ten email jest juz uzywany<br/>";
            return false;
        }
        
        if( !preg_match('%^[A-Za-z]{3,20}$%', stripslashes(trim($_POST['imie']))) ){
            echo "Imie jest nieprawidlowe<br/>";
            return false;
        }
        
        if( !preg_match('%^[A-Za-z]{3,20}$%', stripslashes(trim($_POST['nazwisko']))) ){
            echo "Nazwisko jest nieprawidlowe<br/>";
            return false;
        }
        
        
        //validacja reszty (dataur i plec)
    
        return true;
    }
    
    // Egzekucja
    if( dataSent() && validate() ){
        
        @$query = "INSERT INTO login VALUES (NULL, '$_POST[login]', '$_POST[pass]', '$_POST[email]', '$_POST[imie]', '$_POST[nazwisko]', '$_POST[plec]', '$_POST[dataUr]' )";
         
        $result = mysql_query($query) || die( mysql_error() );    
         
    }else{
        echo "Rejestracja sie nie powiodla";    
    }
    
?>