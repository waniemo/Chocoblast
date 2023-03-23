<?php
    namespace App\Controller;
    use App\Model\Utilisateur;
    use App\Utils\Functions;

    class UserController extends Utilisateur{
        public function insertUser(){
            $message = "";
            if(isset($_POST['submit'])){
                $nom = Functions::cleanInput($_POST['nom_utilisateur']);
                $prenom = Functions::cleanInput($_POST['prenom_utilisateur']);
                $mail = Functions::cleanInput($_POST['mail_utilisateur']);
                $password = Functions::cleanInput($_POST['password_utilisateur']);

                if(!empty($nom) AND !empty($prenom) AND !empty($mail) AND !empty($password)){
                    $this->setMailUtilisateur($mail);

                    if($this->getUserByMail()){
                        $message = "Les informations sont incorrectes";
                    } else{
                        $password = password_hash($password, PASSWORD_DEFAULT);

                        $this->setNomUtilisateur($nom);
                        $this->setPrenomUtilisateur($prenom);
                        $this->setPasswordUtilisateur($password);
    
                        $this->addUser();
                    }

                    $message = "Le compte : ".$mail ."a été ajouté en BDD";
                } else{
                    $message = "Veuillez remplir tous les champs du formulaire";
                }
            }

            include './App/Vue/viewAddUser.php';
        }

        public function connexionUser(){
            $message = "";
            if(isset($_POST['submit'])){
                $mail = Functions::cleanInput($_POST['mail_utilisateur']);
                $password = Functions::cleanInput($_POST['password_utilisateur']);

                if(!empty($mail) AND !empty($password)){
                    $this->setMailUtilisateur($mail);
                    $this->setPasswordUtilisateur($password);
                    
                    if($this->getUserByMail()){
                        $data = $this->getUserByMail();
                        if(password_verify($password, $data[0]->password_utilisateur)){
                            $_SESSION['connected'] = true;
                            $_SESSION['mail'] = $data[0]->mail_utilisateur;
                            $_SESSION['id'] = $data[0]->id_utilisateur; 
                            $_SESSION['nom'] = $data[0]->nom_utilisateur; 
                            $_SESSION['prenom'] = $data[0]->prenom_utilisateur;
                            $message = "Vous êtes connecté";
                        } else{
                            $message = "Le mail ou le mot de passe est incorrect";
                        }                                      
                    }
                } else{
                    $message = "Veuillez remplir les champs du formulaire";
                }
            }

            include './App/Vue/viewConnexion.php';
        }
    }

?>