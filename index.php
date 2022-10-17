<?php 
// Connexion à la base de donnée
$basname = "127.0.0.1";
$username ='root';
$password= '';
    
$nom=$_POST["nom"];
$prenoms=$_POST["prenom"];
$email=$_POST["email"];
$telephone=$_POST["tel"];
$message=$_POST["message"];
 




//connexion 
   try {
    $con = new PDO("mysql:host=$basname;dbname=basformulaire",
    $username,$password);
    //pour les erreur
    $con->setAttribute(PDO::ATTR_ERRMODE,
    PDO::ERRMODE_EXCEPTION);
     echo 'connexion reussie';
     //Insertion de donnée dans la BD;
     //$nom = POST['nom'];
     //die($_POST['nom']);

     /*if (POST['submit'] != null) {
        POST['nom'];
        die(POST['nom']);
     }*/
  $res= $con->prepare("INSERT INTO formcontact (nom,prenoms,email,numero,message)
  VALUES (:nom,:prenoms,:email,:numero,:message)");
  $res->bindParam(':nom',$nom);
  $res->bindParam(':prenoms',$prenoms);
  $res->bindParam(':email',$email);
  $res->bindParam(':numero',$tel);
  $res->bindParam(':message',$message);
  $res->execute();

$con->exec($res);
echo 'Entrée ajoutée dans la table';
 
    // afficher les exeptions
   }
    catch (PDOException $e) {
        echo "ERREUR:".$e->getMessage();
    //throw $th;
   }

 


?>