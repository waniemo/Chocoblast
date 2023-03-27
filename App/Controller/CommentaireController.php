<?php
    namespace App\Controller;
    use App\Utils\Functions;
    use App\Model\Commentaire;

    class CommentaireController extends Commentaire{
        public function insertCommentaire():void{
            if(isset($_SESSION['connected'])){
                $message  = "";

                if(isset($_POST['submit'])){
                    $text = Functions::cleanInput($_POST['text_commentaire']);
                    $note = Functions::cleanInput($_POST['note_commentaire']);
                    $date = Functions::cleanInput($_POST['date_commentaire']);

                    $auteur = $_SESSION['id'];
                    if(!empty($text) AND !empty($note) AND !empty($date)){
                        $this->setTextCommentaire($text);
                        $this->setNoteCommentaire($note);
                        $this->setDateCommentaire($date);
                        $this->getAuteurCommentaire()->setIdUtilisateur($_SESSION['id']);
                        $this->getChocoblast()->setIdChocoblast($_GET['id_chocoblast']);

                        $this->addCommentaire();
                        $message = "Le commentaire a été envoyé";

                    } else{
                        $message = "Veuillez remplir les champs du formulaire";
                    }
                }
                include './App/Vue/viewAddCommentaire.php';
            }else{
                header('Location: ./');
            }
        }
    }
?>