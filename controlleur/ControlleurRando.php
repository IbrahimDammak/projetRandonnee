<?php

    include "../Model/Randonnee.php";
    
    $objectif = "";
    $ville = "";
    $desc = "";
    $nomRand = "";
    $bus = "";
    $dateDeb = "";
    $dateFin = "";
    $etat = "";
    $comm = "";




    
    if (isset($_POST["objectif"])) $objectif = $_POST["objectif"];
    if (isset($_POST["ville"])) $ville = $_POST["ville"];
    if (isset($_POST["desc"])) $desc = $_POST["desc"];
    if (isset($_POST["nomRand"]))    $nomRand = $_POST["nomRand"];
    if (isset($_POST["bus"]))    $bus = $_POST["bus"];
    if (isset($_POST["dateDeb"]))    $dateDeb = $_POST["dateDeb"];
    if (isset($_POST["dateFin"]))    $dateFin = $_POST["dateFin"];
    if (isset($_POST["etat"]))    $etat = $_POST["etat"];
    if (isset($_POST["comm"]))    $comm = $_POST["comm"];


    if (isset($_POST['submit'])) {
    
        if ($objectif != null && $ville != null && $desc != null && $nomRand!= null && $bus != null && $dateDeb != null && $dateFin != null && $etat != null && $comm != null) {
            $nRando = new Randonnee($objectif,$ville,$desc,$dateDeb,$dateFin,$etat,$comm,$nomRand,$bus);
            if ($dateDeb>$dateFin) {
              echo "<script> 
                alert(\"La Date debut doit etre inferieur a ala date fin \"); 
                setTimeout(function() {
                window.location.href = '../view/Administration.php';
                }, 100);
              </script>";
              exit();
            }
            $ajout = Randonnee::addRandonnee($nRando);


            if ($ajout != false){
                echo "<script> 
                alert(\"La randonnée a bien été ajouter \"); 
                setTimeout(function() {
                window.location.href = '../view/Administration.php';
                }, 100);
              </script>";  
            }else {
                echo "<script> 
                alert(\"ERREUR LORS L'AJOUT !!! \"); 
                setTimeout(function() {
                window.location.href = '../view/Administration.php';
                }, 100);
              </script>"; 
            }
        
        }
    }

    
    if (isset($_POST["delete"])) {
        $id=$_POST["id_rando"];
        $login_id = $_POST["login"];
        $etat = $_POST['etat'];

        if ($etat == "en cours" || $etat == "finalise") {
          echo "<script> 
            alert(\"L'etat ne doit pas etre en cour ou finalise\"); 
            setTimeout(function() {
            window.location.href = '../view/Administration.php';
            }, 100);
          </script>";
          exit();
        }
        

        $delete = Randonnee::supprimerRandonne($id,$login_id);
        if ($delete != false){
            echo "<script> 
            alert(\"La randonnée a bien été supprimée\"); 
            setTimeout(function() {
            window.location.href = '../view/Administration.php';
            }, 100);
          </script>";  
        }else {
            echo "<script> 
            alert(\"ERREUR LORS LA SUPRESSION !!! \"); 
            setTimeout(function() {
            window.location.href = '../view/Administration.php';
            }, 100);
          </script>"; 
        }
    }

    if (isset($_POST["deleteEnAttente"])) {
        $id=$_POST["id_rando"];
        $login_id = $_POST["login"];

        $delete = Randonnee::supprimerRandonne($id,$login_id);
        if ($delete != false){
            echo "<script> 
            alert(\"La randonnée a bien été Annuler\"); 
            setTimeout(function() {
            window.location.href = '../view/RandonneesEnAttente.php';
            }, 100);
          </script>";  
        }else {
            echo "<script> 
            alert(\"ERREUR LORS L'ANNULATION !!! \"); 
            setTimeout(function() {
            window.location.href = '../view/RandonneesEnAttente.php';
            }, 100);
          </script>"; 
        }
    }

    if (isset($_POST['update'])) {
        

        session_start();
        $_SESSION['id_rando'] =$_POST["id_rando"];

        if (isset($_POST["objectif"])) $_SESSION['objectif'] = $_POST["objectif"];
        if (isset($_POST["ville"])) $_SESSION['ville'] = $_POST["ville"];
        if (isset($_POST["desc"])) $_SESSION['desc'] = $_POST["desc"];
        if (isset($_POST["login"]))    $_SESSION['login'] = $_POST["login"];
        if (isset($_POST["bus"]))    $_SESSION['bus']  = $_POST["bus"];
        if (isset($_POST["dateDeb"]))    $_SESSION['dateDeb'] = $_POST["dateDeb"];
        if (isset($_POST["dateFin"]))    $_SESSION['dateFin'] = $_POST["dateFin"];
        if (isset($_POST["etat"]))    $_SESSION['etat'] = $_POST["etat"];
        if (isset($_POST["comm"]))   $_SESSION['comm'] = $_POST["comm"];



        $nrando = new Randonnee($objectif,$ville,$desc,$dateDeb,$dateFin,$etat,$comm,$nomRand,$bus);
        header('Location:../view/ModifierRando.php');

    }

    if (isset($_POST['updateForm'])) {
        
        session_start();

        $objectif = "";
        $ville = "";
        $desc = "";
        $nomRand = "";
        $bus = "";
        $dateDeb = "";
        $dateFin = "";
        $etat = "";
        $comm = "";

        $id = $_SESSION['id_rando'];
        
        if (isset($_POST["objectif"])) $objectif = $_POST["objectif"];
        if (isset($_POST["ville"])) $ville = $_POST["ville"];
        if (isset($_POST["desc"])) $desc = $_POST["desc"];
        if (isset($_POST["nomRand"]))    $nomRand = $_POST["nomRand"];
        if (isset($_POST["bus"]))    $bus = $_POST["bus"];
        if (isset($_POST["dateDeb"]))    $dateDeb = $_POST["dateDeb"];
        if (isset($_POST["dateFin"]))    $dateFin = $_POST["dateFin"];
        if (isset($_POST["etat"]))    $etat = $_POST["etat"];
        if (isset($_POST["comm"]))    $comm = $_POST["comm"];


    
        if ($objectif != null && $ville != null && $desc != null && $nomRand!= null && $bus != null && $dateDeb != null && $dateFin != null && $etat != null && $comm != null) {
            $nRando = new Randonnee($objectif,$ville,$desc,$dateDeb,$dateFin,$etat,$comm,$nomRand,$bus);
            $modifier = Randonnee::modifRando($nRando,$id,$nomRand);
            
            if ($modifier != false){
                echo "<script> 
                alert(\"La randonnée a bien été modifier\"); 
                setTimeout(function() {
                window.location.href = '../view/Administration.php';
                }, 100);
              </script>";  
            }else {
                echo "<script> 
                alert(\"ERREUR LORS LA MODIFICATION !!! \"); 
                setTimeout(function() {
                window.location.href = '../view/Administration.php';
                }, 100);
              </script>"; 
            }
        
        }

    }

    if (isset($_POST['Finaliser'])) {
        
        session_start();
        $_SESSION['id_rando'] =$_POST["id_rando"];
        if (isset($_POST["objectif"])) $_SESSION['objectif'] = $_POST["objectif"];
        if (isset($_POST["ville"])) $_SESSION['ville'] = $_POST["ville"];
        if (isset($_POST["desc"])) $_SESSION['desc'] = $_POST["desc"];
        if (isset($_POST["login"]))    $_SESSION['login'] = $_POST["login"];
        if (isset($_POST["bus"]))    $_SESSION['bus']  = $_POST["bus"];
        if (isset($_POST["dateDeb"]))    $_SESSION['dateDeb'] = $_POST["dateDeb"];
        if (isset($_POST["dateFin"]))    $_SESSION['dateFin'] = $_POST["dateFin"];
        if (isset($_POST["etat"]))    $_SESSION['etat'] = $_POST["etat"];
        if (isset($_POST["comm"]))   $_SESSION['comm'] = $_POST["comm"];
        
        header('Location:../view/FinaliserRandonnee.php');
        
    }




    

?>