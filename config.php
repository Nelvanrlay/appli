<?php

    define("DS", DIRECTORY_SEPARATOR);
    define('ROOT_DIR', '.'.DS);

    //constantes de dossiers par défaut
    define('PUBLIC_DIR', ROOT_DIR."public".DS);
    define('TEMPLATE_DIR', ROOT_DIR."template".DS);
    define('CSS_DIR', PUBLIC_DIR."css".DS);

    //constantes côté controleur
    define('DEFAULT_CTRL', "store");
    define('DEFAULT_ACTION', "index");