

<!doctype html>
<html lang="en">
  <head>
    <title>GEEKSHOP</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="bootstrap.css">
  </head>
  <body>


  <nav class="navbar navbar-expand-sm navbar-dark bg-primary  ">
            <a class="navbar-brand" href="#">GEEKSHOP</a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                    <form class="form-inline my-2 my-lg-0">
                    <button class="btn btn-light my-2 my-sm-0 d-block" type="button"><a href="formProd.php?id=0&action=ajouter" >AJOUTER</a></button>
                </form>
             
                     </li>
                    
                    
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <button class="btn btn-light my-2 my-sm-0 d-block" type="button"><a href="index.php" >DECONNEXION</a></button>
                </form>
            </div>

            </nav>



            <?php
        
            
            ?>

  <div class="container">
      <table class="table">
          <thead>
              <tr>
                  <th>reference</th>
                  <th>libelle</th>
                  <th>quantite</th>
                  <th>quantite minimale</th>
                  <th>Modifier</th>
                  <th>Supprimer</th>

              </tr>
          </thead>
          <tbody>
              
    <?php
                include 'fonctions.php';

     $conn = getDatabaseConnexion();
     $requete = 'SELECT * FROM produits ORDER BY reference DESC';
     $stmt= $conn->query($requete);
     $row = $stmt->fetchAll(); 
                  
            foreach($row as $row): 
     ?>
                <tr>
 
                     <td scope="row"><?php echo $row['reference']?></td>

                    <td><?php echo $row['libelle']?></td>
                    <td><?php echo $row['quantite']?></td>
                    <td><?php echo $row['minimale']?></td>
                    <td>
                        <a name="modifier" id="" class="btn btn-primary" href="formProd.php?id=<?php echo $row['reference'].'&action=modifier'?>" role="button">Modifier</a>
                    </td>
                    <td>
                        <a name="supprimer" id="" class="btn btn-danger" href="formProd.php?id=<?php echo $row['reference'].'&action=supprimer'?>" role="button">Supprimer</a>
                    </td>
                    
                  
                </tr>
    <?php endforeach ?>
     
          </tbody>
      </table>
  </div>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>