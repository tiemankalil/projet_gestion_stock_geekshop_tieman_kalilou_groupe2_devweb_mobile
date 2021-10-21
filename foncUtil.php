<?php 

require 'accesbd.php';

//////////-----fontion obtenir tout les utilisateur------/////////////////////

function getAllUsers(){
    $conn = connbd();
    $requete = 'SELECT * FROM utilisateur';
    $stmt= $conn->query($requete);
    $row = $stmt->fetchAll();

    return $row;

}

///// ---fonction obtenir (lire(read)) un utilisateur en utilisant don id en parametre----///////////

function readUser($id){
    $conn = getDatabaseConnexion();
    $requete = "SELECT * FROM utilisateur WHERE id = $id";
    $stmt = $conn->query($requete);
    $row = $stmt->fetchAll();
    if(!empty($row)){
        return $row[0] ;
    }
    

}

//////---fonction creation nouvel utilisateur---//////////
/////--utilisation de (try,catch)----en cas d'erreur dans la requete---/// 
function createUser($nom,$prenom,$age,$adresse){
    try{
        $conn = getDatabaseConnexion();
        $sql = "INSERT INTO utilisateur (nom,prenom,age,adresse)
                 VALUES ($nom,$prenom,$age,$adresse)";
        $conn->exec($sql);

               
}

catch(PDOException $e){
  echo $sql."<p> Erreur : requete non executée </p>" . $e->getMessage()."<br>";
 
}


}

//////////--fonction mise a jour (modification) utilisateur--///////
function updateUser($id,$nom,$prenom,$age,$adresse){
    try{
        $conn = getDatabaseConnexion();
        $requete = "UPDATE utilisateur SET 
                            nom = '$nom',
                            prenom = '$prenom',
                            age = '$age',
                            adresse = '$adresse'
                            WHERE id = '$id' " ;
        $stmt = $conn->query($requete);
              
}

catch(PDOException $e){
  echo $sql."<p> Erreur : requete non executée </p>" . $e->getMessage()."<br>";
 
}

}

///////-- fonction effacer (delete) utilisateur--///////////
function deleteUser($id){
    try{
        $conn = getDatabaseConnexion();
        $requete = "DELETE FROM  utilisateur
                        WHERE id = '$id' " ;
        $stmt = $conn->query($requete);
              
}

catch(PDOException $e){
  echo $sql."<p> Erreur : requete non executée </p>" . $e->getMessage()."<br>";
 
}

}


function getNewUser() {
     $user['id'] = "";
     $user['nom'] = "";
     $user['prenom'] = "";
     $user['age'] = "";
     $user['adresse'] = "";
    
}

 


?>