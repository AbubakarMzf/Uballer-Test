<?php 


    class Model{

        private $bd;
        private static $instance;

        private function __construct(){
            require('credentials.php') ; 
            $this->bd = new PDO($dsn,$login, $mdp);
            $this->bd->query("SET NAMES 'utf8'");
            $this->bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        public static function getModel(){
            
            if (self::$instance === null) {
                self::$instance = new self();
            }
            return self::$instance;
        }

        //return false si le login passé en param n'existe pas dans la base de donnée. 
        public function isInDataBase($login){
            $requete = $this->bd->prepare('SELECT login from users WHERE login = :login') ; 
            $requete->bindValue(':login', $login); 
            $requete->execute() ;  
            return (bool) $requete->rowCount() ; 
        }

        //return le mdp correspondant
        public function getPass($login) {
            $requete = $this->bd->prepare('SELECT pass from users WHERE login = :login') ; 
            $requete->bindValue(':login', $login); 
            $requete->execute() ;
            return $requete->fetch(PDO::FETCH_ASSOC); 
        }


        //recup toutes les infos d'un user

        public function getAllInfos($login){
        	$requete=$this->bd->prepare('SELECT * FROM users where login=:login'); 
            $requete->bindValue(':login', $login); 
            $requete->execute() ;
        	return $requete->fetch(PDO::FETCH_ASSOC); 
        }

        public function addUser($data){
            $requete=$this->bd->prepare('INSERT INTO users VALUES (default, :lname, :fname, :login ,:pass, :birth, :gender)');
            foreach($data as $d => $v){
                $requete->bindValue(':'.$d, $v) ; 
            }
            $requete->execute(); 
            return (bool) $requete->rowCount() ;  
        }

        
    }
?>