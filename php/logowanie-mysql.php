<?php
    define("HOST", "localhost");
    define("USERNAME","damian");
    define("PASSWORD","");
    define("DBNAME","basketmania");
   
    $db = mysqli_connect(HOST,USERNAME,PASSWORD) or die("Nie udalo sie polaczyc z baza danych"); 
    
//    mysql_select_db(DBNAME) or die('Nie udalo sie wybrac bazy danych '. mysql_error());
    
$query = 'create database test1';
$result = mysql_query($query) or die('Query failed: ' . mysql_error());

    echo $result;
    
    mysqli_close($db);
    
?>