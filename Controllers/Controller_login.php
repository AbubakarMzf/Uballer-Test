<?php

	class Controller_login extends Controller {

            //action par defaut du controlleur. Retourne la page d'accueil login
			public function action_default(){
				$this->render("login");
			}


            //appeler lors de la soumission du formulaire pour se connecter.  
            public function action_login(){
                $m = Model::getModel() ; 
                //on vérifie si le login et le mot de passe ne sont pas vide.
                if (isset($_POST["login"], $_POST["pass"]) && !preg_match("/^ *$/", $_POST["login"]) && !preg_match("/^ *$/", $_POST["login"])) {
                    $login = $_POST["login"] ; 
                    $pass = $_POST["pass"] ; 
                    //on verifie que le login existe dans la base de donnée et que le mdp correspond
                    if ($m->isInDataBase($login) && password_verify($pass, $m->getPass($login)['pass'])) {
                        $_SESSION["login"] = $login ; 
                        //redirection vers la vue qui correspond à la page personnel du client
                        $this->render("home", ["infos" => $m->getAllInfos($login)]); 
                    } 
                    //si le login n'existe pas ou que le mdp ne correspond pas
                    else {
                        $this->render("message", ["title" =>"erreur", "message" => "login ou mdp incorrect."]); 
                    }
                }

                //si on était déjà connecter redirection vers la page perso du client
                else if (isset($_SESSION["login"])) {
                    $this->render("home", ["infos" => $m->getAllInfos($_SESSION["login"])]); 
                }

                //erreur
                else {
                    $this->render("message", ["title" =>"ORH", "message" => "CONNECTEZ-VOUS SVP ! (quand même) "]);
                }
            }


             //appeler lors de la soumission du formulaire pour créer un compte. 
            public function action_sign(){
                $m = Model::getModel(); 
                //on verifie si les champs saisie sont corrects à l'aide de la fonction chechData défini dans functions.php
                if (checkData($_POST)){
                        //si c'est correct on vérifie que le login n'existe pas déjà. 
                        if (!$m->isInDataBase($_POST['login'])){
                            $data = [
                                'fname' => $_POST['fname'], 
                                'lname' => $_POST['lname'], 
                                'login' => $_POST['login'], 
                                'pass' => password_hash($_POST['pass'], PASSWORD_DEFAULT), 
                                'birth' => $_POST['year'] . '-' . $_POST['month'] . '-' . $_POST['day'], 
                                'gender' => $_POST['gender']
                            ]; 
                            //ajout dans la base de donnée
                            $m->addUser($data) ; 
                            $this->render("message", ["title" =>"bienvenue", "message" => "inscription réussis"]); 
                        }
                        //erreur si le login existe déjà
                        else {
                            $this->render("message", ["title" =>"erreur", "message" => "login deja existant"]); 
                        }
                }
                //erreur dans les champs
                else {
                    $this->render("message", ["title" =>"erreur", "message" => "Veuillez vérifier que les champs soient corrects."]);
                        
                }

            }

            //deconnexion
            public function action_deco(){
                unset($_SESSION["login"]) ; 
                $this->action_default();  
            }

                
    }

?>