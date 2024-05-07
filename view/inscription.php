<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../style/style.css">
    <title>inscription</title>
</head>
<body>
  

    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-custom-navv">
          <a class="navbar-brand" href="#"><img src="../img/logo.png" alt="Logo" style="height: 100px;"></a>
        </nav>
        <img
                src="../img/trees.png"
                class="img-fluid rounded-top img-tree"
                alt="img-tree"width =500px
              />
      </header>




    <div class="container mt-5">
        <div class="row justify-content-center">
          <div class="col-md-6">
            <div class="card">
              <div class="card-header bg-custom text-white">
                Inscription
              </div>
              <div class="card-body">
                <form action="../controlleur/ControlleurInscription.php" method="post">
                  <div class="form-group pt-2">
                    <label for="login">Login:</label>
                    <input type="text" class="form-control" id="login" name="login" required>
                  </div>
                  <div class="form-group pt-2">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                  </div>
                  <div class="form-group pt-2">
                    <label for="nom">Nom:</label>
                    <input type="text" class="form-control" id="nom" name="nom" required>
                  </div>
                  <div class="pt-2 form-group">
                    <label for="CIN">CIN:</label>
                    <input type="text" class="form-control" id="cin" name="cin" required>
                  </div>
                  <div class="pt-2 form-group">
                    <label for="dateNaissance">Date de Naissance:</label>
                    <input type="date" class="form-control" id="dateNaiss" name="dateNaiss" required>
                  </div>
                  <div class="pt-2 form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                    <label class="text-muted">vous avez un compte <a href="../view/authentification.html" class="text-reset">se connecter</a></label>  
                </div>
                  <div class="pt-2 mx-3">
                    <input type="submit" name="submit" class="btn btn-custom text-custom btn-text-custom " value="inscrire"  >
                  </div>
                  
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    

      <footer class="footer mt-auto py-3 bg-light">
        <div class="container footer">
          <span class="text-muted">Realiser par <a href="https://www.linkedin.com/in/ibrahim-damak/" class="text-reset">Ibrahim Dammak</a></span>
        </div>
      </footer>

</body>
</html>