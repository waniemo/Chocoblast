<?php
    namespace App\Model;
    use App\Utils\BddConnect;
    use App\Model\Utilisateur;

    class Chocoblast extends BddConnect{
        /*-----------------------------
                    Attributs
        ------------------------------*/
        private ?int $id_chocoblast;
        private ?string $slogan_chocoblast;
        private ?string $date_chocoblast;
        private ?string $statut_chocoblast;
        private ?Utilisateur $auteur_chocoblast;
        private ?Utilisateur $cible_chocoblast;
    

        /*-----------------------------
                Constructeur
        ------------------------------*/

        public function __construct(){
            $this->auteur_chocoblast = new Utilisateur();
            $this->cible_chocoblast = new Utilisateur();
            $this->statut_chocoblast = true;
        }

        /*-----------------------------
                Getter, Setter
        ------------------------------*/

        public function getIdChocoblast():?int{
            return $this->id_chocoblast;
        }

        public function getSloganChocoblast():?string{
            return $this->slogan_chocoblast;
        }

        public function getDateChocoblast():?string{
            return $this->date_chocoblast;
        }

        public function getStatutChocoblast():?bool{
            return $this->statut_chocoblast;
        }

        public function getAuteurChocoblast():?Utilisateur{
            return $this->auteur_chocoblast;
        }

        public function getCibleChocoblast():?Utilisateur{
            return $this->cible_chocoblast;
        }

        public function setIdChocoblast($id):void{
            $this->id_chocoblast = $id;
        }

        public function setSloganChocoblast($slogan):void{
            $this->slogan_chocoblast = $slogan;
        }

        public function setDateChocoblast($date):void{
            $this->date_chocoblast = $date;
        }

        public function setStatutChocoblast($statut):void{
            $this->cible_chocoblast = $statut;
        }

        public function setAuteurChocoblast(?Utilisateur $auteur):void{
            $this->cible_chocoblast = $auteur;
        }

        public function setCibleChocoblast(?Utilisateur $cible):void{
            $this->cible_chocoblast = $cible;
        }

        /*-----------------------------
                    Method
        ------------------------------*/

        public function addChocoblast():void{
            try{
                $slogan = $this->getSloganChocoblast();
                $date = $this->getDateChocoblast();
                $statut = $this->getStatutChocoblast();
                $auteur = $this->getAuteurChocoblast()->getIdUtilisateur();
                $cible = $this->getCibleChocoblast()->getIdUtilisateur();

                $req = $this->connexion()->prepare('INSERT INTO chocoblast(slogan_chocoblast, date_chocoblast, statut_chocoblast, auteur_chocoblast, cible_chocoblast) VALUES (?,?,?,?,?)');

                $req->bindParam(1,$slogan,\PDO::PARAM_STR);
                $req->bindParam(2,$date,\PDO::PARAM_STR);
                $req->bindParam(3, $statut,\PDO::PARAM_BOOL);
                $req->bindParam(4, $auteur,\PDO::PARAM_INT);
                $req->bindParam(5, $cible,\PDO::PARAM_INT);

                $req->execute();
            } 
            catch(\Exception $e){
                die('Erreur : '.$e->getMessage());
            }
        }

        public function getAllChocoblast(){
            try{
                $req = $this->connexion()->prepare('SELECT id_chocoblast, slogan_chocoblast, date_chocoblast, nom_auteur, prenom_auteur, nom_cible, prenom_cible FROM chocoblast INNER JOIN vwCible ON cible_chocoblast = vwcible.id_cible INNER JOIN vwAuteur ON auteur_chocoblast = vwauteur.id_auteur');
                $req->execute();
                $data = $req->fetchAll(\PDO::FETCH_OBJ);
                return $data;
            }
            catch(\Exception $e){
                die('Erreur : '.$e->getMessage());
            }
        }

        public function __toString(){
            return $this->slogan_chocoblast;
        }
    }

?>