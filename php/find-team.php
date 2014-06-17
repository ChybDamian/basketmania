<?php
    session_start();
    include("logowanie-mysql.php");
    
    
    $query = "SELECT tmi_name,tmi_teamid FROM team_info ORDER BY tmi_name LIMIT 20";
    $result = mysql_query($query) or die( mysql_error() );
    
    while( $row = mysql_fetch_row($result) ){
        
        $path = "/xampp/htdocs/basketmania/team_img/$row[1]/";
        $name = glob($path."0.*");
        
        echo $row[0] . ','; // echo nazwa teamu
        
        if( @$name[0] ){
//          echo $name[0] . "<br/>";
            $name = end(explode("/",$name[0]));
//          echo $name . "<br/>";
            
            echo "/basketmania/team_img/$row[1]/$name,";  
        }else{
            echo "/basketmania/img/avatar.png,";
        }    
    }
    
    exit();
    mysql_close($db);

?>