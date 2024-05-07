<?php
    class Bus 
    {
        private $matricule;
        private $marque;
        private $couleur;
        private $date;
        private $etat;



        public function __construct($matricule, $marque, $couleur, $date, $etat){
            $this->matricule=$matricule;
            $this->marque=$marque;
            $this->couleur=$couleur;
            $this->date=new DateTime($date);
            $this->etat=$etat;
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


        public static function getBus(){
            include "Connexion.php";
            $sql = $bdd->query("SELECT * FROM bus ");
            $sql->setFetchMode(PDO::FETCH_ASSOC);
            $lesBus = $sql->fetchAll();
        
            $html = ''; 
        
            foreach ($lesBus as $bus) {
                $html .= '<option value ="'.  $bus['matricule'] .'">'.$bus['matricule'].'</option>';
            }
        
            return $html;

        }

        
        public static function getBusColl(){
            include "Connexion.php";
            $sql = $bdd->query("SELECT * FROM bus ");
            $sql->setFetchMode(PDO::FETCH_ASSOC);
            $lesBus = $sql->fetchAll();
        
            return $lesBus;
            

        }

        public function __toString(){
            $html = '<option value ="'.  $this -> matricule .'">'.$this->matricule.'</option>';
            return $html;
        }


    }
    


?>