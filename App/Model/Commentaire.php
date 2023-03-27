<?php
    namespace App\Model;
    use App\Utils\BddConnect;
    use App\Model\Utilisateur;
    use App\Model\Chocoblast;

    
    class Commentaire extends BddConnect{
        /*-----------------------------
                    Attributs
        ------------------------------*/
        private ?int $id_commentaire;
        private ?string $note_commentaire;
        private ?string $text_commentaire;
        private ?string $date_commentaire;
        private ?string $statut_commentaire;
        private ?Chocoblast $id_chocoblast;
        private ?Utilisateur $auteur_commentaire;

        /*-----------------------------
                Constructeur
        ------------------------------*/

        public function __construct(){
            $this->id_chocoblast = new Chocoblast();
            $this->auteur_commentaire = new Utilisateur();
            $this->statut_commentaire = true;
        }

        /*-----------------------------
                Getter, Setter
        ------------------------------*/

        public function getIdCommentaire():?int{
            return $this->id_commentaire;
        }

        public function getNoteCommentaire():?string{
            return $this->note_commentaire;
        }

        public function getTextCommentaire():?string{
            return $this->text_commentaire;
        }

        public function getDateCommentaire():?string{
            return $this->date_commentaire;
        }

        public function getStatutCommentaire():?bool{
            return $this->statut_commentaire;
        }

        public function getChocoblast(){
            return $this->id_chocoblast;
        }

        public function getAuteurCommentaire():?Utilisateur{
            return $this->auteur_commentaire;
        }

        public function setNoteCommentaire($note):void{
            $this->note_commentaire = $note;
        }

        public function setTextCommentaire($text):void{
            $this->text_commentaire = $text;
        }

        public function setDateCommentaire($date):void{
            $this->date_commentaire = $date;
        }

        public function setStatutCommentaire($statut):void{
            $this->statut_commentaire = $statut;
        }

        public function setAuteurCommentaire(?Utilisateur $auteur):void{
            $this->auteur_commentaire = $auteur;
        }

        public function setIdChocoblast(?Chocoblast $id):void{
            $this->id_chocoblast = $id;
        }

        public function setIdCommentaire($id):void{
            $this->id_commentaire = $id;
        }


        /*-----------------------------
                    Method
        ------------------------------*/

        public function addCommentaire(){
            try{
                $note = $this->getNoteCommentaire();
                $text = $this->getTextCommentaire();
                $date = $this->getDateCommentaire();
                $statut = $this->getStatutCommentaire();
                $auteur = $this->getAuteurCommentaire()->getIdUtilisateur();
                $idChoco = $this->getChocoblast()->getIdChocoblast();

                $req = $this->connexion()->prepare('INSERT INTO commentaire(note_commentaire, text_commentaire, date_commentaire, statut_commentaire, auteur_commentaire, id_chocoblast) VALUES (?,?,?,?,?,?)');

                $req->bindParam(1,$note,\PDO::PARAM_INT);
                $req->bindParam(2,$text,\PDO::PARAM_STR);
                $req->bindParam(3,$date,\PDO::PARAM_STR);
                $req->bindParam(4, $statut,\PDO::PARAM_BOOL);
                $req->bindParam(5, $auteur,\PDO::PARAM_INT);
                $req->bindParam(6, $idChoco,\PDO::PARAM_INT);

                $req->execute();
            } 
            catch(\Exception $e){
                die('Erreur : '.$e->getMessage());
            }
        }

        public function __toString(){
            return $this->text_commentaire;
        }
    }
?>