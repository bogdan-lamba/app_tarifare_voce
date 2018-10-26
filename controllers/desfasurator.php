<?php

require 'views/forms/desfasurator.view.php';

if(isset($_POST['genereaza'])) {
    $account = test_input($_POST['account']);
    $luna = test_input($_POST['luna']);
    $an = test_input($_POST['an']);
    $file_name = $account . '_' . $luna . '-' . $an . '@' . date("Y-m-d") . '_' . date("h:i:sa") . '.csv';
    $calls = array();
    $cost_discount = 0;
    $total_billed=$total_cost=$total_discount=$total_durata=0;

    if (!in_array($account, $accounts)) {
        $errors[] = "Select account!";
    }

    include 'views/layouts/errors.view.php';

    if (empty($errors)) {
        $sql = $pdo_cdr->prepare('
                              SELECT * FROM cdr_billing 
                              WHERE account = :account AND MONTH(date) = :luna AND YEAR(date) = :an AND billed!=0'
        );
        $sql->bindParam(':account', $account);
        $sql->bindParam(':luna', $luna);
        $sql->bindParam(':an', $an);
        $sql->execute();

        if ($sql->rowCount()) {
            while ($row = $sql->fetch()) {
                $called = $row['called'];

                $prefix_called = matchPrefixTarife($called, $pdo_cdr);

                $sql_tarif = $pdo_cdr->prepare('
                                        SELECT * FROM trf_tarife
                                        INNER JOIN trf_destinatii ON trf_tarife.id_destinatie=trf_destinatii.id
                                        WHERE prefix LIKE :prefix_called
                    ');

                $sql_tarif->bindParam(':prefix_called', $prefix_called);
                $sql_tarif->execute();
                $row_tarif = $sql_tarif->fetch();
                $idDestinatie = $row_tarif['id_destinatie'];
                $prefix = $row_tarif['prefix'];
                $destinatie = $row_tarif['destinatie'];
                $tarif = $row_tarif['tarif'];
                $durata = ceil($row['billed'] / 60);
                $cost = ($durata) * $tarif;

                $discount = discount($pdo_cdr,$row['account'],$row['date'],$prefix,$idDestinatie);

                if($discount) {
                    $tarif-=$tarif*$discount;
                    $cost_discount = $cost * $discount;
                    $total_discount+=$cost_discount/100;
                    $cost-=$cost_discount;
                }

                $total_durata+=$durata;
                $total_billed+=$row['billed'];
                $total_cost+=$cost/100;

                $call = array(
                    'date' => $row['date'],
                    'calling' => $row['calling'],
                    'called' => $row['called'],
                    'destinatie' => $destinatie,
                    'billed' => $row['billed'],
                    'tarif' => $tarif,
                    'cost' => $cost
                );
                array_push($calls, $call);
            }

            $file = fopen($file_path . $file_name, 'w');
            fputcsv($file, array('Data', 'Numar Apelant', 'Numar Apelat', 'Destinatie', 'Durata (secunde)', 'Tarif (eurocenti/minut)', 'Cost (eurocenti)'));
            foreach ($calls as $call) {
                fputcsv($file, array($call['date'], $call['calling'], $call['called'], $call['destinatie'], $call['billed'],
                    $call['tarif'], $call['cost']));
            }
            fclose($file);

            require 'views/desfasurator_list.view.php';

        } else {
            echo '<br>
                  <div class="alert alert-primary">';
                echo 'No records found for selection.';
            echo '</div>';
        }
    }
}
