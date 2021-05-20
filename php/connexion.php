<?php
    function OpenConnexion(){
         $dbhost = "localhost";
         $dbuser = "deva";
         $dbpass = "Admin_deva0000";
         $db = "devaeyewear";

        $connexion = new mysqli($dbhost, $dbuser, $dbpass,$db);
        if ($connexion->connect_error) {
            die("Database Connection Failed:" .$connexion->connect_error);
        }
        return $connexion;
    }
     
    function CloseConnexion($connexion){
        $connexion->close();
    }
?>
