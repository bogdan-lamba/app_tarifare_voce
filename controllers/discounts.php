<?php

$discounts=array();
$sql=$pdo_cdr->query("SELECT trf_discount_dest.id as id_discount,account,destinatie,discount,data_start,data_end,id_destinatie FROM trf_discount_dest
                        LEFT JOIN trf_destinatii ON trf_discount_dest.id_destinatie=trf_destinatii.id
                        INNER JOIN trf_accounts ON trf_discount_dest.id_account=trf_accounts.id
                        ORDER BY id_discount DESC");
while($row=$sql->fetch()) {
    if(is_numeric($row['id_destinatie'])) {
        $destinatie=$row['destinatie'];
    } else {
        $destinatie=$row['id_destinatie'];
    }
    array_push($discounts,array(
        'id' =>  $row['id_discount'],
        'account' => $row['account'],
        'destinatie' => $destinatie,
        'discount' => $row['discount'],
        'data_start' => $row['data_start'],
        'data_end' => $row['data_end']
    ));
}

//var_dump($discounts);
require 'views/discount.view.php';