<?php

 session_start();

 $identificacion = $_REQUEST['identificacion'];
 
 
 $host     = "localhost";
 $user     = "root";
 $password = ""; 
 $dbname   = "encuesta_udc"; 

 try { $conn= new PDO ("mysql:host=$host; dbname=$dbname",$user,$password);
   

     $sen = $conn->prepare("UPDATE  students SET identificacion = ? WHERE identificacion = ?"); 

     $sen->execute(array($identificacion,$_SESSION['identificacion']));

        if ($sen) {
            $msg = '¡identificacion Actualizado Con Exito!';
          header("location:index.php?err=$msg");

        }
    

    } catch (PDOException $th) {
        echo $th->getMessage();
    } 

?>