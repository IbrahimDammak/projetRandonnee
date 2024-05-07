<?php
  class Randonnee
  {
    private $idRand;
    private $objectif;
    private $ville;
    private $description;
    private $dateDeb;
    private $dateFin;
    private $etat;
    private $commentaire;
    private $login;
    private $matricule;

    public function __construct($objectif, $ville, $description,$dateDeb,$dateFin,
    $etat,$commentaire,$login,$matricule){
        $this->objectif=$objectif;
        $this->ville=$ville;
        $this->description=$description;
        $this->dateDeb=new DateTime($dateDeb);
        $this->dateFin=new DateTime($dateFin);
        $this->etat=$etat;
        $this->commentaire=$commentaire;
        $this->login=$login;
        $this->matricule=$matricule;
    }

    public function __get($attr)
    {
        if (!isset($this->$attr)) {
            return "erreur";
        } else
            return ($this->$attr);
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function __isset($name)
    {
        return isset($this->$name);
    }

    public static function getRando()
    {
        include "Connexion.php";
        $sql = $bdd->query("SELECT * FROM randonnee ");
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $lesRando = $sql->fetchAll();

        $html = '';

        foreach ($lesRando as $rando) {
            $html .= '<tr>';
            $html .= '<td><a href="../view/DescriptionRando.php?ObjectifR=' . $rando['objectif'] . '&DescR=' . $rando['description'] . '&VilleR=' .$rando['ville']. '&DateDeb=' . $rando['date_debut'] . '&DateFin=' . $rando['date_fin'] . '&Commentaire=' . $rando['commentaire'] . '">' . $rando['objectif'] . '</a></td>';
            $html .= '<td>' . $rando['ville'] . '</td>';
            $html .= '<td>' . $rando['login'] . '</td>';
            $html .= '<td>' . $rando['matricule'] . '</td>';
            $html .= '<td>' . $rando['date_debut'] . '</td>';
            $html .= '<td>' . $rando['date_fin'] . '</td>';
            $html .= '<td>' . $rando['etat'] . '</td>';
            $html .= '<td>' . $rando['commentaire'] . '</td>';
            $html .= '<form  action="../controlleur/controlleurRando.php" method="post">
                        <input type="hidden" name="id_rando" value="' . $rando['idRandonnee'] . '">
                        <input type="hidden" name="login" value="' . $rando['login'] . '">
                        <input type="hidden" name="ville" value="' . $rando['ville'] . '">
                        <input type="hidden" name="desc" value="' . $rando['description'] . '">
                        <input type="hidden" name="dateDeb" value="' . $rando['date_debut'] . '">
                        <input type="hidden" name="dateFin" value="' . $rando['date_fin'] . '">
                        <input type="hidden" name="etat" value="' . $rando['etat'] . '">
                        <input type="hidden" name="comm" value="' . $rando['commentaire'] . '">
                        <input type="hidden" name="bus" value="' . $rando['matricule'] . '">
                        <input type="hidden" name="objectif" value="' . $rando['objectif'] . '">
                          <td><input type="submit" name="update" value="Modifier" class="btn btn-custom-sup-mod text-custom btn-text-custom m-1">
                          <input type="submit" name="delete" value="Supprimer" class="btn btn-custom-sup-mod text-custom btn-text-custom m-1" onclick="return confirm(`Êtes-vous sûr de vouloir supprimer cet article ?`)">
                      </td>
                      </form>';
            $html .= '</tr>';
        }

        return $html;
    }

    public static function getRandoAccueil()
    {
        include "Connexion.php";
        $sql = $bdd->query("SELECT * FROM randonnee ");
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $lesRando = $sql->fetchAll();

        $html = '';

        foreach ($lesRando as $rando) {
            $html .= '<tr>';
            $html .= '<td><a href="../view/DescriptionRando.php?ObjectifR=' . $rando['objectif'] . '&DescR=' . $rando['description'] . '&VilleR=' . $rando['ville'] . '&DateDeb=' . $rando['date_debut'] . '&DateFin=' . $rando['date_fin'] . '&Commentaire=' . $rando['commentaire'] . '">' . $rando['objectif'] . '</a></td>';
            $html .= '<td>' . $rando['ville'] . '</td>';
            $html .= '<td>' . $rando['matricule'] . '</td>';
            $html .= '<td>' . $rando['date_debut'] . '</td>';
            $html .= '<td>' . $rando['date_fin'] . '</td>';
            $html .= '<td>' . $rando['commentaire'] . '</td>';
            $html .= '<form  action="../controlleur/controlleurRando.php" method="post">';
            $html .= '<input type="hidden" name="id_rando" value="' . $rando['idRandonnee'] . '">
                        <input type="hidden" name="login" value="' . $rando['login'] . '">
                        <input type="hidden" name="ville" value="' . $rando['ville'] . '">
                        <input type="hidden" name="desc" value="' . $rando['description'] . '">
                        <input type="hidden" name="dateDeb" value="' . $rando['date_debut'] . '">
                        <input type="hidden" name="dateFin" value="' . $rando['date_fin'] . '">
                        <input type="hidden" name="etat" value="' . $rando['etat'] . '">
                        <input type="hidden" name="comm" value="' . $rando['commentaire'] . '">
                        <input type="hidden" name="bus" value="' . $rando['matricule'] . '">
                        <input type="hidden" name="objectif" value="' . $rando['objectif'] . '">
                      </form>';
            $html .= '</tr>';
        }

        return $html;
    }
    
    public static function getRandoEnAttente()
    {
        include "Connexion.php";
        $sql = $bdd->query("SELECT * FROM randonnee WHERE etat = 'en Attente' ");
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $lesRando = $sql->fetchAll();

        $html = '';

        foreach ($lesRando as $rando) {
            $html .= '<tr>';
            $html .= '<td><a href="../view/DescriptionRando.php?ObjectifR=' . $rando['objectif'] . '&DescR=' . $rando['description'] . '&VilleR=' . $rando['ville'] . '&DateDeb=' . $rando['date_debut'] . '&DateFin=' . $rando['date_fin'] . '&Commentaire=' . $rando['commentaire'] . '">' . $rando['objectif'] . '</a></td>';
            $html .= '<td>' . $rando['ville'] . '</td>';
            $html .= '<td>' . $rando['login'] . '</td>';
            $html .= '<td>' . $rando['matricule'] . '</td>';
            $html .= '<td>' . $rando['date_debut'] . '</td>';
            $html .= '<td>' . $rando['date_fin'] . '</td>';
            $html .= '<td>' . $rando['etat'] . '</td>';
            $html .= '<td>' . $rando['commentaire'] . '</td>';
            $html .= '<form  action="../controlleur/controlleurRando.php" method="post">
                        <input type="hidden" name="id_rando" value="' . $rando['idRandonnee'] . '">
                        <input type="hidden" name="login" value="' . $rando['login'] . '">
                        <input type="hidden" name="ville" value="' . $rando['ville'] . '">
                        <input type="hidden" name="desc" value="' . $rando['description'] . '">
                        <input type="hidden" name="dateDeb" value="' . $rando['date_debut'] . '">
                        <input type="hidden" name="dateFin" value="' . $rando['date_fin'] . '">
                        <input type="hidden" name="etat" value="' . $rando['etat'] . '">
                        <input type="hidden" name="comm" value="' . $rando['commentaire'] . '">
                        <input type="hidden" name="bus" value="' . $rando['matricule'] . '">
                        <input type="hidden" name="objectif" value="' . $rando['objectif'] . '">
                          <td>
                          <input type="submit" name="deleteEnAttente" value="Annuler" class="btn btn-custom-sup-mod text-custom btn-text-custom m-1" onclick="return confirm(`Êtes-vous sûr de vouloir annuler cet randonnee ?`)">
                      </td>
                      </form>';
            $html .= '</tr>';
        }

        return $html;
    }
    
    public static function getRandoEnAttenteNonFinalisee()
    {
        include "Connexion.php";
        $sql = $bdd->query("SELECT * FROM randonnee WHERE etat = 'en Attente' ");
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $lesRando = $sql->fetchAll();

        $html = '';

        foreach ($lesRando as $rando) {
            $html .= '<tr>';
            $html .= '<td><a href="../view/DescriptionRando.php?ObjectifR=' . $rando['objectif'] . '&DescR=' . $rando['description'] . '&VilleR=' . $rando['ville'] . '&DateDeb=' . $rando['date_debut'] . '&DateFin=' . $rando['date_fin'] . '&Commentaire=' . $rando['commentaire'] . '">' . $rando['objectif'] . '</a></td>';
            $html .= '<td>' . $rando['ville'] . '</td>';
            $html .= '<td>' . $rando['login'] . '</td>';
            $html .= '<td>' . $rando['matricule'] . '</td>';
            $html .= '<td>' . $rando['date_debut'] . '</td>';
            $html .= '<td>' . $rando['date_fin'] . '</td>';
            $html .= '<td>' . $rando['etat'] . '</td>';
            $html .= '<td>' . $rando['commentaire'] . '</td>';
            $html .= '<form  action="../controlleur/controlleurRando.php" method="post">
                        <input type="hidden" name="id_rando" value="' . $rando['idRandonnee'] . '">
                        <input type="hidden" name="login" value="' . $rando['login'] . '">
                        <input type="hidden" name="ville" value="' . $rando['ville'] . '">
                        <input type="hidden" name="desc" value="' . $rando['description'] . '">
                        <input type="hidden" name="dateDeb" value="' . $rando['date_debut'] . '">
                        <input type="hidden" name="dateFin" value="' . $rando['date_fin'] . '">
                        <input type="hidden" name="etat" value="' . $rando['etat'] . '">
                        <input type="hidden" name="comm" value="' . $rando['commentaire'] . '">
                        <input type="hidden" name="bus" value="' . $rando['matricule'] . '">
                        <input type="hidden" name="objectif" value="' . $rando['objectif'] . '">
                          <td>
                          <input type="submit" name="Finaliser" value="Finaliser" class="btn btn-custom-sup-mod text-custom btn-text-custom m-1" ">
                      </td>
                      </form>';
            $html .= '</tr>';
        }

        return $html;
    }
    

    public static function 
modifRando($rando,$id_rando,$login){
        include "Connexion.php";

        $dateDebString = $rando->dateDeb->format('Y-m-d');
        $dateFinString = $rando->dateFin->format('Y-m-d');

        $sql = $bdd->prepare("UPDATE randonnee set objectif = :objectif , ville = :ville , description = :description, date_debut = :dateDeb, date_fin = :dateFin, etat = :etat, commentaire = :commentaire, login = :login, matricule = :matricule WHERE idRandonnee = :id AND login = :login") ;
        $sql->bindParam(":id", $id_rando);
        $sql->bindParam(':objectif', $rando->objectif);
        $sql->bindParam(':ville', $rando->ville);
        $sql->bindParam(':description', $rando->description);
        $sql->bindParam(':login', $login);
        $sql->bindParam(':matricule', $rando->matricule);
        $sql->bindParam(':dateDeb', $dateDebString);
        $sql->bindParam(':dateFin', $dateFinString);
        $sql->bindParam(':etat', $rando->etat);
        $sql->bindParam(':commentaire', $rando->commentaire);

        if ($sql->execute()) {
            return true;
        }
        
    }

    public static function supprimerRandonne($id,$login_id)
        {
            include("connexion.php");
            $query = $bdd->prepare("DELETE FROM randonnee WHERE idRandonnee = :id AND login = :login");
            $query->bindParam(":id", $id);
            $query->bindParam(":login", $login_id);
            if ($query->execute()) {
                return true;
            }
       }




    public static function addRandonnee($rando){
        include "Connexion.php";
    
        $dateDebString = $rando->dateDeb->format('Y-m-d');
        $dateFinString = $rando->dateFin->format('Y-m-d');
    
        $sql = $bdd->prepare("INSERT INTO randonnee (objectif, ville, description, date_debut, date_fin, etat, commentaire, login, matricule) 
                              VALUES (:objectif, :ville, :description, :dateDeb, :dateFin, :etat, :commentaire, :login, :matricule)");
        $sql->bindParam(':objectif', $rando->objectif);
        $sql->bindParam(':ville', $rando->ville);
        $sql->bindParam(':description', $rando->description);
        $sql->bindParam(':login', $rando->login);
        $sql->bindParam(':matricule', $rando->matricule);
        $sql->bindParam(':dateDeb', $dateDebString);
        $sql->bindParam(':dateFin', $dateFinString);
        $sql->bindParam(':etat', $rando->etat);
        $sql->bindParam(':commentaire', $rando->commentaire);
    
    
        $success = $sql->execute();
        
        return $success;  
    }
    

    public function __toString(){
        $html = '<tr><td><a href= "../view/DescriptionRando.php">'. $this->objectif .'</a></td><td>'.$this->ville.'</td><td>'.'</td><td>'.$this->login.'</td><td>'.'</td><td>'.$this->matricule.'</td><td>'.'</td><td>'.$this->dateDeb.'</td><td>'.'</td><td>'.$this->dateFin.'</td><td>'.'</td><td>'.$this->etat.'</td><td>'.'</td><td>'.$this->commentaire.'</td><td>';
        return $html;
    }
    
  }
    
?>