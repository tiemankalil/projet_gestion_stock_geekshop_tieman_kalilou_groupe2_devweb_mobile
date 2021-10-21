<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="bootstrap.css">

    <link rel="stylesheet" href="style.css">
</head>
  <body>


          <?php



          if(isset($_GET['id']) && $_GET['id'] != 0 ){
 
            $id = $_GET['id'];


            try{
              $servname = 'localhost';
              $dbname = 'geekshop';
              $user = 'root';
              $pass = '';
          $dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);  
          $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                     
        }

        catch(PDOException $e){
        echo "<p> Erreur : probleme d'access a la base de données </p>" . $e->getMessage()."<br>";
        die();
        }

        $sql = "SELECT * FROM produits WHERE reference = '$id' ";
        $stmt= $dbco->query($sql);
        $row = $stmt->fetch(); 
        //  var_dump ($row ) ;           
        

          }    else {
            $row['reference'] = "" ;
            $row['libelle'] = "" ;
            $row['quantite'] = "" ;
            $row['minimale'] = "" ;
          }            
                        
          ?>
 


        <div class="container w-50">
            <form action="traitement.php" method="post" class= "justify-content-center">
                    <h1 >produit</h1>
                    

                <div class="form-group w-50">
                    <label for="reference">reference</label>
                    <input type="text" disabled
                      class="form-control" name="reference" id="nom" placeholder="reference" 
                      value="<?php echo $row['reference']?>">
                      
                   </div>
                <div class="form-group w-50" >
                    <label for="libelle">libelle</label>
                    <input type="text"
                      class="form-control" name="libelle" id="libelle"   placeholder="designation" value="<?php echo $row['libelle']?>"> 
                   </div>
                <div class="form-group w-50">
                    <label for="quantite">quantite</label>
                    <input type="number"
                      class="form-control" name="quantite" id="passe" aria-describedby="helpId" placeholder="quantite" value="<?php echo $row['quantite']?>">
                   </div>
                <div class="form-group w-50">
                    <label for="mini">quantite minimale</label>
                    <input type="number"
                      class="form-control" name="minimale" id="mini" aria-describedby="helpId" placeholder="quantite minimale" value="<?php echo $row['minimale']?>">
                   </div>
                   <div class="bouton d-flex justify-content-between">
                     <?php 
                     $action = $_GET['action'];
 
                            if($action == 'modifier' || $action == 'supprimer' ||  $action == 'ajouter' ){
 
                             if($action == 'modifier'){ ?>    <?php ?>
 
                                             
 <?php    echo ' <a name="modifier" id="" class="btn btn-success" href="fonctionsProd.php?id='. $row['reference'].'&action=modifier';?> <?php echo ' " role="button">Modifier</a>';?>

                                     
 <?php
                                        
                                    }
                                    if($action == 'supprimer') {
                                      echo '<input name="valider" id="" class="btn btn-danger" type="submit" value="supprimer">';
                                      

                                      

                                    }
                                    if($action == 'ajouter') {
                                      echo '<input name="valider" id="" class="btn btn-primary" type="submit" value="valider">';

                                    }

                                     }
                           
                            else{

                                  header("location:dashboard.php");
                            }
                     
                     ?>
                           
                          
                      <button class="btn btn-light my-2 my-sm-0 d-block" type="button"><a href="dashboard.php" >Retour</a></button>

                   </div>
                  
            </form>
           
        </div>



      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>