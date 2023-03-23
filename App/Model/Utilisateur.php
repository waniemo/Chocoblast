<?php
    namespace App\Model;
    use App\Utils\BddConnect;
    use App\Model\Roles;
    
    class Utilisateur extends BddConnect{
        /*-----------------------------
                    Attributs
        ------------------------------*/

        private ?int $id_utilisateur;
        private ?string $nom_utilisateur;
        private ?string $prenom_utilisateur;
        private ?string $mail_utilisateur;
        private ?string $password_utilisateur;
        private ?string $image_utilisateur;
        private ?string $statut_utilisateur;
        private ?Roles $roles;

        /*-----------------------------
                Constructeur
        ------------------------------*/

        public function __construct(){
            $this->roles = new Roles();
            $this->roles->setNomRoles('utilisateur');
            $this->roles->setIdRoles(2);
        }

        /*-----------------------------
                Getter, Setter
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

        public function getPasswordUtilisateur():?string{
            return $this->password_utilisateur;
        }

        public function setNomUtilisateur($name):void{
            $this->nom_utilisateur = $name;
        }

        public function setPrenomUtilisateur($firstName):void{
            $this->prenom_utilisateur = $firstName;
        }

        public function setMailUtilisateur($mail):void{
            $this->mail_utilisateur = $mail;
        }

        public function setPasswordUtilisateur($pwd):void{
            $this->password_utilisateur = $pwd;
        }

        /*-----------------------------
                    Method
        ------------------------------*/

        public function addUser(){
            try{
                $nom = $this->nom_utilisateur;
                $prenom = $this->prenom_utilisateur;
                $mail = $this->mail_utilisateur;
                $password = $this->password_utilisateur;
                $id = $this->roles->getIdRoles();

                $req = $this->connexion()->prepare('INSERT INTO utilisateur(nom_utilisateur, prenom_utilisateur, mail_utilisateur, password_utilisateur, id_roles) VALUES (?,?,?,?,?)');

                $req->bindParam(1,$nom, \PDO::PARAM_STR);
                $req->bindParam(2,$prenom, \PDO::PARAM_STR);
                $req->bindParam(3,$mail, \PDO::PARAM_STR);
                $req->bindParam(4,$password, \PDO::PARAM_STR);
                $req->bindParam(5,$id, \PDO::PARAM_INT);

                $req->execute();
            } 
            catch(\Exception $e){
                die('Erreur : '.$e->getMessage());
            }
        }

        public function getUserByMail():?array{
            try{
                $mail = $this->mail_utilisateur;

                $req = $this->connexion()->prepare('SELECT id_utilisateur, nom_utilisateur, prenom_utilisateur, mail_utilisateur, password_utilisateur, image_utilisateur, statut_utilisateur, id_roles FROM utilisateur WHERE mail_utilisateur = ?');

                $req->bindParam(1,$mail, \PDO::PARAM_STR);

                $req->execute();
                $data = $req->fetchAll(\PDO::FETCH_OBJ);
                return $data;
            } 
            catch(\Exception $e){
                die('Erreur : '.$e->getMessage());
            }
        }
        
    }

?>