<?php
$tarife=array();
$sql = $pdo_cdr->query('SELECT * FROM trf_tarife INNER JOIN trf_destinatii ON trf_tarife.id_destinatie=trf_destinatii.id');
while($row = $sql->fetch()) {
    array_push($tarife, array(
        'prefix' => $row['prefix'],
        'tarif' => $row['tarif'],
        'destinatie' => $row['destinatie']
    ));
}
require 'views/tarife.view.php';