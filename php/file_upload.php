<?php
    session_start();
    
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
    ) {
      if ($_FILES["file"]["error"] > 0) {
        echo "Error: " . $_FILES["file"]["error"] . "<br>";
      } else {
        echo "Upload: " . $_FILES["file"]["name"] . "<br>";
        echo "Type: " . $_FILES["file"]["type"] . "<br>";
        echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
        echo "Stored in: " . $_FILES["file"]["tmp_name"];
        echo "<br/><br/>";
        
        //$_FILES["file"]["name"] = $_SESSION["login_id"] . "_1.$extension";
        
        $path = '/xampp/htdocs/basketmania/user_img/'.$_SESSION['login_id']; // path do folderu
        if( !file_exists( $path ) ){
            mkdir( $path );
        }
        $path = $path . "/"; // path do zawartosci tego samego folderu
        
        $uploaded_files = scandir( $path ); // pliki wyslane przez uzytkownika
        
        if( isset($_POST['avatar']) ){ // zmiana avataru na glownej stronie
            //usunięcie poprzedniego avataru
            foreach( $allowedExts as $key => $value ){
                @unlink($path."0.".$value);
            }
            
            $_FILES['file']["name"] = "0.".$extension; //pierwsze zdjęcie jest zdjęciem profilowym
            echo $_FILES['file']["name"] . "<br/><br/>";
            
            //
            echo count($uploaded_files) . "<br/><br/>";
            header("Location: /basketmania/podstrony/zalogowany.php");
        
        }else{
            //dodawanie zdjęć do galerii ( zdjęcia będą w tym samym folderze ale numerowane, zdjęcia nazwane innaczej niż 0.* będą lecialy do galerii usera
            $_FILES['file']['name'] =  count($uploaded_files) . "." . $extension;
             header("Location: /basketmania/podstrony/galeria.php");
            
        }
        
        move_uploaded_file($_FILES["file"]["tmp_name"], $path . $_FILES["file"]["name"]);
        
        /*
        if (file_exists("/xampp/htdocs/basketmania/user_img/" . $_FILES["file"]["name"])) {
          echo $_FILES["file"]["name"] . " already exists. ";
        } else {
         
          echo "Stored in: " . "/basketmania/user_img/" . $_FILES["file"]["name"];
        }*/
        
      }
    } else {
      echo "Invalid file";
    }
    
    exit();
    
?>