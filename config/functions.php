<?php

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

//find longest match prefix in tarife
function matchPrefixTarife($called,$pdo_cdr) {
    $called = '00'.$called;
    $prefix_called = $called[0];
    for ($j = 1; $j <= strlen($called); $j++) {
        $prefix_called .= $called[$j];
        $sql_prefix = $pdo_cdr->prepare('SELECT * FROM trf_tarife
                                         WHERE prefix LIKE :prefix_called');
        $prefixlike=$prefix_called.'%' ;
        $sql_prefix->bindParam(':prefix_called', $prefixlike);
        $sql_prefix->execute();
        if (!$sql_prefix->rowCount()) {
            $prefix_called = substr($prefix_called, 0, (strlen($prefix_called) - 1));
            break;
        }
    }

    //longest $prefix_called substring with exact match
    for ($j = strlen($prefix_called); $j >= 0; $j--) {
        $prefix_search = $prefix_called;
        $prefix_search = substr($prefix_called, 0, $j);

        $sql_search = $pdo_cdr->prepare('SELECT * FROM trf_tarife
                                         WHERE prefix = :prefix_called');
        $sql_search->bindParam(':prefix_called', $prefix_search);
        $sql_search->execute();
        $row_search = $sql_search->fetch();
        if ($sql_search->rowCount()) {
            $prefix_called = $row_search['prefix'];
            break;
        }
    }

    return $prefix_called;
}


function discount($pdo_cdr,$rowAcccount,$rowDate,$prefix,$idDestinatie) {
    $discount=0;
    $sql_d = $pdo_cdr->prepare("SELECT * FROM trf_discount_dest
                                            INNER JOIN trf_accounts ON trf_discount_dest.id_account=trf_accounts.id
                                            WHERE account= :account AND :dataApel >= data_start 
                                            AND :dataApel < DATE_ADD(data_end, INTERVAL 1 day) ");
    $sql_d->bindParam(':account', $rowAcccount);
    $sql_d->bindParam(':dataApel', $rowDate);
    $sql_d->execute();
    if($sql_d->rowCount()) {
        while($row_d = $sql_d->fetch()) {
            switch($row_d['id_destinatie']) {
                case ('all'):
                    $discount = $row_d['discount'];
                    break;
                case ('international'):
                    if(substr($prefix,0,4)!='0040') {
                        $discount = $row_d['discount'];
                    }
                    break;
                case ('national'):
                    if(substr($prefix,0,4)=='0040') {
                        $discount = $row_d['discount'];
                    }
                    break;
                default://destinatie specifica
                    if($idDestinatie == $row_d['id_destinatie']) {
                        $discount = $row_d['discount'];
                    }
                    break;
            }
        }
    }
    return $discount;
}
