<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../style/style.css">
    <title>Administration</title>
</head>
<body>

<?php 
   include '../Model/Utilisatuer.php';
   include '../Model/Randonnee.php';
   include '../Model/Bus.php';
  session_start();
    if (isset($_SESSION['username'])) {
        $nomU = $_SESSION['username'] ;
    }

?>

<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-custom-navv">
        <a class="navbar-brand" href="../view/Administration.php"><img src="../img/logo.png" alt="Logo" style="height: 100px;"></a>

        <div class="nav-custom" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                  <div class="container-fluid">
                    <form action="../controlleur/controlLogout.php" method="post">
                        <input type="submit" id="logout" name="logout" class="btn logout-custom " value='Log out'>
                    </form>
                  </div>
                </li>
            </ul>
            <img
                src="../img/trees.png"
                class="img-fluid rounded-top img-tree"
                alt="img-tree"width =500px
              />
        </div>
    </nav>
</header>

<div class="container mt-5">
      <h1 class="user-name">Bonjour <?php echo $nomU ;?> </h1>
</div>

      
      <div class="container mt-5">
        <!-- Table of Randonnées -->
        <h2>Liste des Randonnées</h2>
        <table class="table">
          <thead>
            <tr>
              <th>Objectif</th>
              <th>Ville</th>
              <th>NomRandonneur</th>
              <th>Bus</th>
              <th>Date début</th>
              <th>Date fin</th>
              <th>État</th>
              <th>Commentaire</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php
            echo Randonnee::getRando();
            ?>
          </tbody>
        </table>
        <div class="container  button-link-div">
            <a href="../view/FinaliserRandonnee.php" class="button-link p-3">Finaliser Randonnee</a>
            <a href="../view/RandonneesEnAttente.php" class="button-link">Randonnees En Attente</a><br>
        </div>
        
        <button id="toggleButton" class="btn btn-custom-sup-mod text-custom btn-text-custom m-1">ajouter un randonnee</button>

        <!-- Section to be shown/hidden -->
        <section id="hiddenSection">
          <div class="container mt-5">
      <!-- Ajouter une nouvelle randonnée -->
              <h2>Ajouter une Nouvelle Randonnée</h2>
              <form action="../controlleur/ControlleurRando.php" method = "Post" >
                <div class="form-group">
                  <label for="objectif">Objectif:</label>
                  <input type="text" class="form-control" id="objectif" name="objectif" required>
                </div>
                <div class="form-group">
                  <label for="ville">Ville:</label>
                  <input type="text" class="form-control" id="ville" name="ville" required>
                </div>
                <div class="form-group">
                  <label for="desc">description:</label>
                  <input type="text" class="form-control" id="desc" name="desc" required>
                </div>
                <div class="form-group">
                  <label for="nomRandonneur">Nom du Randonneur:</label>
                  <input type="text" class="form-control" id="nomRand" name="nomRand" required>
                </div>
                <div class="form-group">
                  <label for="bus">Bus:</label>
                  <select class="form-control" id="bus" name="bus" required>
                  <?php
                      echo bus::getBus();
                  ?>  
                </select>
                </div>
                <div class="form-group">
                  <label for="dateDebut">Date de Début:</label>
                  <input type="date" class="form-control" id="dateDeb" name="dateDeb" required>
                </div>
                <div class="form-group">
                  <label for="dateFin">Date de Fin:</label>
                  <input type="date" class="form-control" id="dateFin" name="dateFin" required>
                </div>
                <div class="form-group">
                  <label for="etat">État de la randonnée:</label>
                  <select class="form-control" id="etat" name="etat" required>
                    <option value="en attente">En Attente</option>
                    <option value="en cours">En Cours</option>
                    <option value="finalisee">Finalisée</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="commentaire">Commentaire:</label>
                  <textarea class="form-control" id="comm" name="comm" rows="2"></textarea>
                </div>
                <!-- <button type="submit" class="btn btn-primary">Ajouter</button> -->
                <input type="submit" id="submit" name="submit" class="btn btn-custom text-custom btn-text-custom m-1" value="ajouter"  >
              </form>
        </div>
        </section>

        <script>
        // JavaScript to toggle the section visibility
        document.getElementById("toggleButton").addEventListener("click", function() {
          var section = document.getElementById("hiddenSection");
          if (section.style.display === "none") {
            section.style.display = "block";
            document.getElementById("toggleButton").textContent = " fermer";
          } else {
            section.style.display = "none";
            document.getElementById("toggleButton").textContent = "ajouter randonne"; 
          }
        });
        </script>


   
    

      <footer class="footer mt-auto py-3 bg-light">
        <div class="container footer">
          <span class="text-muted">Realiser par <a href="https://www.linkedin.com/in/ibrahim-damak/" class="text-reset">Ibrahim Dammak</a></span>
        </div>
      </footer>

</body>
</html>