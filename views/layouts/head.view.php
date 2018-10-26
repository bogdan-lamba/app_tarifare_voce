<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <title>Voce</title>

    <style>
        .loader {
            border: 8px solid #f3f3f3;
            border-radius: 50%;
            border-top: 8px solid #3498db;
            width: 44px;
            height: 44px;
            -webkit-animation: spin 2s linear infinite; /* Safari */
            animation: spin 2s linear infinite;
        }

        /* Safari */
        @-webkit-keyframes spin {
            0% { -webkit-transform: rotate(0deg); }
            100% { -webkit-transform: rotate(360deg); }
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>

</head>

<body>


<?php
switch (stripslashes($_SERVER['REQUEST_URI'])) {
    case "/tarif_voce/":
    case "/tarif_voce/index.php":
        $menu_desfasurator='active';
        break;
    case "/tarif_voce/discount":
    case "/tarif_voce/discount/add":
        $menu_discounturi='active';
        break;
    case "/tarif_voce/tarife":
        $menu_tarife='active';
        break;
    default:
        $menu_desfasurator = '';
        $menu_discounturi = '';
        $menu_tarife = '';
}
?>
<?php require 'views/layouts/nav.view.php'; ?>

<main role="main" class="container">
    <div class="pt-2 pb-2">
        <h1>Tarifare voce</h1>
        <hr>
    </div>



