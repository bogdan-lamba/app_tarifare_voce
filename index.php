<?php
require 'config/db_connect.php';
require 'config/functions.php';
require 'config/variables.php';

require 'views/layouts/head.view.php';

//routes


switch (stripslashes($_SERVER['REQUEST_URI'])) {
    case "/tarif_voce/":
    case "/tarif_voce/index.php":
        require 'controllers/desfasurator.php';
        break;
    case "/tarif_voce/discount":
        require 'controllers/discounts.php';
        break;
    case "/tarif_voce/discount/add":
        require 'controllers/discount_add.php';
        break;
    case "/tarif_voce/tarife":
        require 'controllers/tarife.php';
        break;
    default:
        echo "Page not found!";
}

require 'views/layouts/footer.view.php';