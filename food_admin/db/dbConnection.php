<?php

    // Local Server (Uncomment and use as needed)
         $host = "localhost"; 
         $user = "root"; 
         $pass = ""; 
         $db = "db_fish";

    //  $host = "103.174.10.215"; 
    //  $user = "rajkumar_user1"; 
    //  $pass = "Zenvic@1011"; 
    //  $db = "rajkumar_intern";
    
    // // GoDaddy Server
    // $host = "92.205.4.188";
    // $user = "roririERP";
    // $pass = "RoririERP@2024";
    // $db = "db_Roriri_ERP";

    $conn = mysqli_connect($host, $user, $pass, $db);
    if (mysqli_connect_errno()) {
        echo "Connection failed: " . mysqli_connect_error();
        die();
    }
?>  
