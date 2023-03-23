<?php
    namespace App\Controller;
    use App\Model\Roles;
    use App\Utils\Functions;

    class RolesController extends Roles{
        public function insertRoles(){
            $message = "";
            if(isset($_POST['submit'])){
                $roles = Functions::cleanInput($_POST['nom_roles']);

                if(!empty($roles)){
                    $this->setNomRoles($roles);

                    if($this->getRoleByName()){
                        $message = "Ce rôle existe déja";
                    } else{
                        
                        $this->addRoles();
                        $message = "Le rôle a été ajouté en BDD";
                    }
                } else{
                    $message = "Veuillez remplir tous les champs du formulaire";
                }
            }
            include './App/Vue/viewAddRoles.php';
        }
    }
?>
