<?php
    namespace App\Controller;
    use App\Utils\Functions;
    use App\Model\Utilisateur;
    use App\Model\Chocoblast;

    class ChocoblastController extends Chocoblast{
        public function insertChocoblast():void{
            if(isset($_SESSION['connected'])){
                $user = new Utilisateur;
                $data = $user->getUserAll();
                $message  = "";

                if(isset($_POST['submit'])){
                    $slogan = Functions::cleanInput($_POST['slogan_chocoblast']);
                    $date = Functions::cleanInput($_POST['date_chocoblast']);
                    $cible = Functions::cleanInput($_POST['cible_chocoblast']);

                    $auteur = $_SESSION['id'];
                    if(!empty($slogan) AND !empty($date) AND !empty($cible) AND !empty($auteur)){
                        $this->setSloganChocoblast($slogan);
                        $this->setDateChocoblast($date);
                        $this->getCibleChocoblast()->setIdUtilisateur($cible);
                        $this->getAuteurChocoblast()->setIdUtilisateur($auteur);

                        $this->addChocoblast();
                        $message = "Le chocoblast".$slogan." a été ajouté en BDD";

                    } else{
                        $message = "Veuillez remplir les champs du formulaire";
                    }
                }
                include './App/Vue/viewAddChocoblast.php';
            }else{
                header('Location: ./');
            }
        }

        public function showChocoblast(){
            $this->getChocoblastAll();
            include './App/Vue/showAllChocoblast.php';
        }
    }
?>