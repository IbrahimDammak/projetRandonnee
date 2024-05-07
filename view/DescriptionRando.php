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
    <title>Details Randonne</title>
</head>

<body>

    <?php
    include '../Model/Utilisatuer.php';
    include '../Model/Randonnee.php';
    include '../Model/Bus.php';
    session_start();
    if (isset($_SESSION['username'])) {
        $nomU = $_SESSION['username'];
    }

    $Nrand = $_GET["ObjectifR"];
    $ville = $_GET["VilleR"];
    $description = $_GET["DescR"];
    $dateDeb = $_GET["DateDeb"];
    $dateFin = $_GET["DateFin"];
    $commentaire = $_GET["Commentaire"];
    ?>

    <?php
    $accessKey = '1PBRhAv6g_1Jnxx531swOyIfYGYpxuH0RLYbhHsGPIs';
    $VilleR = isset($_GET['VilleR']) ? $_GET['VilleR'] : ''; // Get the objectifR variable from the URL
    $searchQuery = urlencode($VilleR." Tunisia"); // URL encode the search query

    $url = 'https://api.unsplash.com/photos/random?query=' . $searchQuery . '&client_id=' . $accessKey;

    $response = file_get_contents($url);

    $imageData = json_decode($response, true);

    $imageUrl = $imageData['urls']['regular'];
    $altText = $imageData['alt_description'];
    ?>



    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-custom-navv">
            <a class="navbar-brand" href="../view/Accueil.php"><img src="../img/logo.png" alt="Logo"
                    style="height: 100px;"></a>

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
        <h1 class="user-name">Bonjour <?php echo $nomU; ?> </h1>
        <h2 class="user-name">Details <?php echo $Nrand; ?> </h2>
    </div>




    <div class="container mt-5">
        <img src="<?php echo $imageUrl; ?>" class="col-md-6 col-lg-3 photo-container" alt="<?php echo $altText; ?>">
        <ul class="list-group">
            <li class="list-group-item"><strong>Description:</strong> <?php echo $description; ?></li>
            <li class="list-group-item"><strong>Ville:</strong> <?php echo $ville; ?></li>
            <li class="list-group-item"><strong>Date de Début:</strong> <?php echo $dateDeb; ?></li>
            <li class="list-group-item"><strong>Date de Fin:</strong> <?php echo $dateFin; ?></li>
            <li class="list-group-item"><strong>Commentaire:</strong> <?php echo $commentaire; ?></li>
        </ul>
    </div>

    <footer class="footer mt-auto py-3 bg-light">
        <div class="container footer">
            <span class="text-muted">Realiser par <a href="https://www.linkedin.com/in/ibrahim-damak/"
                    class="text-reset">Ibrahim Dammak</a></span>
        </div>
    </footer>

</body>

</html>