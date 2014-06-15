<?php
    session_start();
    include("logowanie-mysql.php");
    
    
    $query = "SELECT tmi_name,tmi_teamid FROM team_info WHERE leader = \"$_SESSION[login_id]\"";
    $result = mysql_query($query) or die("sql1: " . mysql_error() );
    
    
    if( mysql_affected_rows() ){ // czy uzytkownik jest leaderem zespolu?
        
        $row = mysql_fetch_row($result);
        
        $query = "SELECT teamid FROM turniej_$_GET[turniej]_zespoly WHERE teamid = $row[1]";
        $result = mysql_query($query) or die("sqli2: " . mysql_error() );
        
        if( !mysql_affected_rows() ){ // czy uzytkownik dodal juz swoj zesplo do turnieju?
            $query = "INSERT INTO turniej_".$_GET['turniej']."_zespoly VALUES(NULL,$row[1])";
            $result = mysql_query($query) or die("sql3: " . mysql_error() );
            echo $row[0];        
        }else{
            echo "<p style='color: red'> Twoja druzyna juz bierze udzial w turnieju</p>";
        }        
    }else{
        echo "<p style='color: red'> Druzyne moze dodac tylko leader zespolu</p>";
    }
    
    
?>