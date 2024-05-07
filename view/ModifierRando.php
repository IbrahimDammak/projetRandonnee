<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
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
                    <form action="../controlleur/controlLogout.php" method="post">
                        <input type="submit" id="logout" name="logout" class="btn logout-custom" value='Log out'>
                    </form>
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
        
    <h1>Bonjour <?php echo $nomU; ?> </h1>
        <h2>Modifier Randonner</h2>
        <form action="../controlleur/ControlleurRando.php" method="post">

        <?php
        

        $id_rando = $_SESSION['id_rando'];
        $login = $_SESSION['login'];
        $ville = $_SESSION['ville'];
        $desc = $_SESSION['desc'];
        $dateDeb = $_SESSION['dateDeb'];
        $dateFin = $_SESSION['dateFin'];
        $etat = $_SESSION['etat'];
        $comm = $_SESSION['comm'];
        $bus = $_SESSION['bus'];
        $objectif = $_SESSION['objectif'];
        ?>
            <div class="form-group">
                <label for="objectif">Objectif:</label>
                <input type="text" class="form-control" id="objectif" name="objectif"
                    value="<?php echo $objectif; ?>" required>
            </div>
            <div class="form-group">
                <label for="ville">Ville:</label>
                <input type="text" class="form-control" id="ville" name="ville" value="<?php echo $ville; ?>"
                    required>
            </div>
            <div class="form-group">
                <label for="desc">Description:</label>
                <input type="text" class="form-control" id="desc" name="desc"
                    value="<?php echo $desc; ?>" required>
            </div>
            <div class="form-group">
                <label for="nomRand">Nom du Randonneur:</label>
                <input type="text" class="form-control" id="nomRand" name="nomRand"
                    value="<?php echo $login; ?>" required>
            </div>
            <div class="form-group">
    <label for="bus">Bus:</label>
    <select class="form-control" id="bus" name="bus" required>
    <?php
        $busOptions = bus::getBusColl();
        foreach ($busOptions as $bus) {
            $selected = ($bus['matricule'] == $bus) ? 'selected' : '';
            echo "<option value='{$bus['matricule']}' $selected>{$bus['matricule']}</option>";
        }
        ?>
    </select>
    
    </div>
            <div class="form-group">
                <label for="dateDeb">Date de Début:</label>
                <input type="date" class="form-control" id="dateDeb" name="dateDeb"
                    value="<?php echo $dateDeb; ?>" required>
            </div>
            <div class="form-group">
                <label for="dateFin">Date de Fin:</label>
                <input type="date" class="form-control" id="dateFin" name="dateFin"
                    value="<?php echo $dateFin; ?>" required>
            </div>
            <div class="form-group">
                <label for="etat">État de la randonnée:</label>
                <select class="form-control" id="etat" name="etat" required>
                    <option value="en attente" <?php if ($etat == 'en attente')
                        echo 'selected'; ?>>En Attente</option>
                    <option value="en cours" <?php if ($etat == 'en cours')
                        echo 'selected'; ?>>En Cours</option>
                    <option value="finalisee" <?php if ($etat == 'finalisee')
                        echo 'selected'; ?>>Finalisée</option>
                </select>

            </div>
            <div class="form-group">
                <label for="commentaire">Commentaire:</label>
                <textarea class="form-control" id="comm" name="comm"
                    rows="2"><?php echo $comm; ?></textarea>
            </div>
            <input type="submit" id="submit" name="updateForm" class="btn btn-custom text-custom btn-text-custom m-1"
                value="Modifier">
        </form>
    </div>



    <footer class="footer mt-auto py-3 bg-light">
        <div class="container footer">
            <span class="text-muted">Realiser par <a href="https://www.linkedin.com/in/ibrahim-damak/"
                    class="text-reset">Ibrahim Dammak</a></span>
        </div>
    </footer>

</body>

</html>