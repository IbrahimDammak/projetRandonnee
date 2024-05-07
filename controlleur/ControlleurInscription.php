<?php
    include "../Model/Utilisatuer.php";
    $login = "";
    $password ="";
    $nom="";
    $cin="";
    $dateNaiss="";
    $email="";

    if (isset($_POST["login"])) $login = $_POST["login"];
    if (isset($_POST["password"])) $password = $_POST["password"];
    if (isset($_POST["nom"]))    $nom = $_POST["nom"];
    if (isset($_POST["cin"]))    $cin = $_POST["cin"];
    if (isset($_POST["dateNaiss"]))    $dateNaiss = $_POST["dateNaiss"];
    if (isset($_POST["email"]))    $email = $_POST["email"];

    $dateAu = new DateTime();
    $dateFormat = $dateAu->format('Y-m-d');
    $dateAnnifERR = new DateTime("2006-01-01");
    if (isset($_POST['submit'])) {
        if ($login != null && $password != null && $nom != null && $cin != null && $dateNaiss != $dateAu && $email != null ) {
            $us = new Utilisatuer($login,$password,$nom,$cin,$dateNaiss,$email);
            
            $ajout = Utilisatuer::AjouterUser($us);
            $role = Utilisatuer::getRole($login);
                session_start();
                $_SESSION['username'] = Utilisatuer::getNom($login);
                $_SESSION['role'] = $role;
            if ($ajout != false ) {
                echo '<script>alert("utilisateur Ajouter !!")</script>';
                header('Location:../view/Accueil.php');
            } else {
                echo '<script>alert("erreur lors l`ajout")</script>';
                header('Location:../view/inscription.html');
            }
            
        }
    }

?>