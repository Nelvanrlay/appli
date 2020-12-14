<?php
    namespace App\Service;

    abstract class RouterService {

        /**
         * Prise en charge des paramètres d'une requête GET
         * 
         * @param array $params les paramètres de l'rui ($params)
         * @return array la réponse correspondante au return d'un contrôleur
         */
        
        public static function handleRequest($params) :array
        {
            /*----------APPEL DU CONTROLEUR-----*/

            $class = "Store"; //Controleur par défaut

            if(isset($params['ctrl'])){// ctrl = admin
                $uri_class = ucfirst($params['ctrl']); //$uri_class = Admin
                //on vérifie que App\Controller\AdminControler existe ! 
                if(class_exists("App\Controller\\".$uri_class."Controller")){
                    //le contrôleur à appeler devient la classe contenue dans l'url
                    $class = $uri_class;
                }
            }  
            
            //App\Controller\StoreController => fully Qualified Class Name    
            $classname = "App\Controller\\".$class."Controller";

            $controller = new $classname(); //instanciation du controleur


        /*---------APPEL DE LA METHODE DANS LE CONTROLEUR ---------*/

            $method = "indexAction"; //La méthode par défaut 

            if(isset($params['action'])){//action = list
                $uri_method = $params['action']."Action"; //$uri_method = ListAction
                //on vérifie si la méthode listAction est une méthode du controller
                if(method_exists($controller, $uri_method)){
                    //La méthode à appeler est celle provenant de l'uri
                    $method = $uri_method;
                }
            }

        /*-------PRISE EN CHARGE DU PARAM OPTIONNEL $GET_ID['id] --------*/

            $id = null;//pas d'id par défaut
            if(isset($params['id'])){
                $id = $params['id'];
            }
            
        
        
            //StoreController::listAction()
            return $controller->$method($id);//appel de la méthode du controleur
                }
    }