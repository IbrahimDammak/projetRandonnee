<?php
    include "../Model/Utilisatuer.php";
    $login= "";
    $password = "";

    if (isset($_POST["login"])) $login = $_POST["login"];
    if (isset($_POST["password"])) $password = $_POST["password"];

    if (isset($_POST['submit'])) {
        if ($login != null && $password != null) {
            $resultat = Utilisatuer::authUser($login,$password);
            if ($resultat != null) {
                $role = Utilisatuer::getRole($login);
                session_start();
                $_SESSION['username'] = Utilisatuer::getNom($login);
                $_SESSION['role'] = $role;
                if ($role == "randonneur") {
                    header('Location:../view/Accueil.php');
                }elseif ($role == "admin") {
                    header('Location:../view/Administration.php');
                }
            }else {
                echo "<script>alert(\"le compte n'existe pas\")</script>";
            }
        }
    }
?>