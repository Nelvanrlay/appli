<?php 

    namespace App\Controller;

    use App\Manager\ProductManager;
    use App\Service\MessageService;
    use App\Service\RouterService as Router;

    class AdminController {
            public function indexAction(){
            
                $manager = new ProductManager();
                $products = $manager->getAll();

                return[
                    "view" => "admin/panel.php",
                    "data" => $products,
                ];
            }

            public function addAction(){

                    //si nous arrivons sur cette méthode en ayant validé le form
                    if(isset($_POST['submit'])){
                        //on filtre les champs du form
                        $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
                        $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                        //si les filtres passent
                        if($name && $price){
                            //on instancie le manager
                            $manager = new ProductManager();
                            $manager->insert($name, $price);    //ajout en base de données
                            MessageService::setMessage("success", "Produit ajouté avec succès !!");     
                            //on redirige vers le panel admin
                            return Router::redirect("admin");
                        }
                        else MessageService::setMessage("error", "Formulaire mal rempli, réessayez !");
            }
            //si nous arrivons sur cette méthode sans validation de formulaire
            //alors c'est qu'on veut juste l'afficher, le formulaire, haha
            return [
                "view" => "admin/form.php",
            ];
    }

            public function deleteAction($id){

                $manager = new ProductManager();
                $manager->delete($id);
                MessageService::setMessage("success", "Produit supprimé avec succès !");
                
                return Router::redirect("admin", "index");
            }
        }