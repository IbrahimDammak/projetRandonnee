<?php

    class Utilisatuer 
    {        
        private $login;
        private $password;
        private $nom;
        private $cin;
        private $dateNaiss;
        private $email;
        private $role;

        public function __construct($login,$password,$nom,$cin,$dateNaiss,$email)
		{
            $this->login=$login;
            $this->password=$password;
            $this->nom=$nom;
            $this->cin=$cin;
            $dateNaissObj = DateTime::createFromFormat('Y-m-d', $dateNaiss);
            if ($dateNaissObj === false) {
                throw new Exception("Invalid date format for dateNaiss: $dateNaiss");
            }
            $this->dateNaiss = $dateNaissObj;
            $this->email=$email;
            //par defaut l'utilisateur est un randonneur
            $this->role="randonneur";

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

        public static function AjouterUser($user){
            include "Connexion.php";

            $dateNaissString = $user->dateNaiss->format('Y-m-d');
            $sql = $bdd->prepare("INSERT INTO utilisateur VALUES(:login, :password, :nom, :cin, :dateNaiss, :email, :role) ");
            $sql->bindParam(':login',$user->login);
            $sql->bindParam(':password',$user->password);
            $sql->bindParam(':nom',$user->nom);
            $sql->bindParam(':cin',$user->cin);
            $sql->bindParam(':dateNaiss',$dateNaissString);
            $sql->bindParam(':email',$user->email);
            $sql->bindParam(':role',$user->role);
            try {
                $success = $sql->execute();    
            } catch (Throwable $th) {
               throw $th;
            }
            
            return $success;
        }

        public static function authUser($login,$password){
            include "Connexion.php";
            
            $sql = $bdd->prepare("SELECT * FROM utilisateur WHERE login  = ? AND password =?");
            $sql->execute([$login,$password]);
            $sql->setFetchMode(PDO::FETCH_OBJ);
            $user = $sql -> fetch();
            return $user;

        }      
        
        public static function getRole($login){
            include "Connexion.php";
            
            $sql = $bdd->prepare("SELECT role FROM utilisateur WHERE login  = ? ");
            $sql->execute([$login]);
            $role = $sql -> fetchColumn();
            return $role;

        } 
        public static function getNom($login){
            include "Connexion.php";
            
            $sql = $bdd->prepare("SELECT nom FROM utilisateur WHERE login  = ? ");
            $sql->execute([$login]);
            $nom = $sql -> fetchColumn();
            return $nom;

        }     
        


    }
    



?>