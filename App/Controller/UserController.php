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
    }

?>