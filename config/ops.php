<?php

include 'db_connect.php';

/*$sql=$pdo_cdr->query("SELECT id FROM trf_destinatii
                      WHERE (destinatie LIKE 'UNITED KINGDOM%' OR destinatie LIKE 'UNITED STATES OF AMERICA%' OR destinatie LIKE 'HUNGARY%' )");
while($row=$sql->fetch()) {
    $sql2=$pdo_cdr->query("INSERT INTO trf_discount_dest
          SET id_account='52', id_destinatie={$row['id']}, discount='0.5', data_start='2015-01-01',
    data_end='9999-12-30' ");//exxon

}*/

/*$sql=$pdo_cdr->query("SELECT id FROM trf_destinatii
                      ");

while($row=$sql->fetch()) {
    $sql2=$pdo_cdr->query("SELECT id from trf_accounts WHERE (account like 'regus%' OR account like 'pachiu')");
    while($row2=$sql2->fetch()) {
        $sql3=$pdo_cdr->query("INSERT INTO trf_discount_dest
                                SET id_account={$row2['id']}, id_destinatie={$row['id']}, discount='0.5', data_start='2015-01-01',data_end='9999-12-30'");
    }
}*/


/*    $sql2=$pdo_cdr->query("SELECT id from trf_accounts WHERE (account like 'rolink%')");
    while($row2=$sql2->fetch()) {
        $sql3=$pdo_cdr->query("INSERT INTO trf_discount_dest
                                SET id_account={$row2['id']}, id_destinatie='international', discount='0.15',
                                data_start='2015-01-01',data_end='9999-12-30'");

}*/

