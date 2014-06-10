<?php
    session_start();
?>


<?php
    
    $_SESSION = array(); //niszczy zmienne
    session_destroy(); // niszczy sesje
    setcookie (session_name(),'', time()-300, '/', '', 0);
    
    echo "Zostales wylogowany";
    header( "Location: http://localhost/basketmania/index.html");

?>