
 

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


$erreur = null;
        if(isset($_POST["valider"]) && isset($_POST["nom"]) && $_SERVER["REQUEST_METHOD"] == "POST"){
                 
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


                          
              $nom = $_POST['nom']; 
              $passe = $_POST['passe'];
  
              try {
                  $sql = "SELECT * FROM utilisateurs WHERE nom = '$nom' AND passe='$passe'";
                  $reponse = $dbco->query($sql);
                  if($reponse->rowCount() != 0 ){

                    header ('location:dashboard.php');

                  } 
                  else {

                    $erreur = "nom ou mot de passe incorrect ";


                  }

              }
              catch(PDOException $e) {
                  echo $sql . "<br>" . $e->getMessage();
              header('location:formCon.php');
              }



          

        }


        ?>

        <div class="container w-50">
            <form action="" method="post" class= "m-auto">
                    <h1 >CONNEXION</h1>
                    

                <div class="form-group w-50">
                    <label for="nom">nom</label>
                    <input type="text"
                      class="form-control" name="nom" id="nom" placeholder="nom">
                      
                   </div>
                
                <div class="form-group w-50">
                    <label for="passe">mot de passe</label>
                    <input type="password"
                      class="form-control" name="passe" id="passe" aria-describedby="helpId" placeholder="mot de passe">
                   </div>

                    <p><?php echo $erreur ; ?></p>
 
                   <div class="bouton d-flex justify-content-between">
                   <input name="valider" id="" class="btn btn-primary" type="submit" value="CONNEXION">

                       <button class="btn btn-light my-2 my-sm-0 d-block" type="button"><a href="index.php" >Retour</a></button>

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