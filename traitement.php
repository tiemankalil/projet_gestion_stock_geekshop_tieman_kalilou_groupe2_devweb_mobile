<?php 


$servername = "localhost";
$username = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$servername;dbname=geekshop", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

if(isset($_POST["valider"] ) && isset($_POST["nom"] )){

    
 
$nom = $_POST['nom']; 
$prenom = $_POST['prenom'];
$passe = $_POST['passe'];
$conf_passe = $_POST['conf_passe'];
$valider = $_POST["valider"];

try {
     $sql = "INSERT INTO utilisateurs (nom, prenom, passe) 
            VALUES ('$nom', '$prenom', '$passe')";
    $conn->exec($sql);
}
catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
header('location:formCon.php');
}



}

if(isset($_POST["valider"] ) && isset($_POST["libelle"] )){

    
 
$libelle = $_POST['libelle']; 
$quantite = $_POST['quantite'];
$minimale = $_POST['minimale'];
$valider = $_POST["valider"];

 

try {
     $sql = "INSERT INTO produits (libelle, quantite, minimale) 
            VALUES ('$libelle', '$quantite', '$minimale')";
    $conn->exec($sql);
}
catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

      header('location:dashboard.php');

}


// try{

    
    
    //  $sql = "INSERT INTO utilisateurs (nom,prenom,passe)
    //          VALUES ($nom,$prenom,$passe)";
    // $dbco->exec($sql);

           
// }

// catch(PDOException $e){
// echo $sql."<p> Erreur : requete non executée </p>" . $e->getMessage()."<br>";

// }





?>