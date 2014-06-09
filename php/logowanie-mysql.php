<?php
    define("HOST", "localhost");
    define("USERNAME","damian");
    define("PASSWORD","");
    define("DBNAME","basketmania");
   
    $db = mysqli_connect(HOST,USERNAME,PASSWORD) or die("Nie udalo sie polaczyc z baza danych"); 
    
    mysql_select_db(DBNAME) or die('Nie udalo sie wybrac bazy danych:  '. mysql_error());
    
    echo "logowanie-mysql -- success </br></br>";
    
  //  mysqli_close($db);
    
?>