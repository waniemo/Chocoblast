<?php
    namespace App\Model;
    use App\Utils\BddConnect;
    use App\Model\Roles;
    class Utilisateur{
         /*-----------------------------
                    Attributs
        ------------------------------*/

        private $id_utilisateur;
        private $nom_utilisateur;
        private $prenom_utilisateur;
        private $mail_utilisateur;
        private $password_utilisateur;
        private $image_utilisateur;
        private $statut_utilisateur;
        private $roles;

        /*-----------------------------
                Constructeur
        ------------------------------*/

        public function __construct(){
            $this->roles = new Roles('user');
        }

        /*-----------------------------
            Getter, Setter, Method
        ------------------------------*/
        public function getIdUtilisateur():?int{
            return $this->id_utilisateur;
        }

        public function getNomUtilisateur():?string{
            return $this->nom_utilisateur;
        }

        public function getPrenomUtilisateur():?string{
            return $this->prenom_utilisateur;
        }

        public function getMailUtilisateur():?string{
            return $this->mail_utilisateur;
        }

        public function getImageUtilisateur():?string{
            return $this->image_utilisateur;
        }

        public function setNomUtilisateur($name):void{
            $this->nom_utilisateur = $name;
        }
    }

?>