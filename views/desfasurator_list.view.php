<?php

echo "<br>Apeluri: <span style='color: blue;'>{$sql->rowCount()}</span>; Minute efective: <span style='color: blue;'>".ceil($total_billed / 60)."</span>; Minute facturate: <span style='color: blue;'>{$total_durata}</span>";
echo "<br>Total cost: <span style='color: blue;'>".(round($total_cost,2)+round
        ($total_discount,2))."€</span>";
echo "<br>Total discount: <span style='color: blue;'>".round($total_discount,2)."€</span>";
echo "<br>Total cost dupa discount: <span style='color: blue;'>".round($total_cost,2)."€</span>";

echo "<br><a target=\"_blank\" class=\"btn btn-primary btn-sm mb-2\" href="."/tarif_voce/storage/getcsv.php?f="."{$file_name}>Exporta 
desfasurator</a>";
echo ' 
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">Data</th>
                      <th scope="col">Numar Apelant</th>
                      <th scope="col">Numar Apelat</th>
                      <th scope="col">Destinatie</th>
                      <th scope="col">Durata (secunde)</th>
                      <th scope="col">Tarif (eurocenti/minut)</th>
                      <th scope="col">Cost (eurocenti)</th>
                   </tr>
                 </thead>
                 <tbody>
            ';

foreach ($calls as $call) {
    echo "<tr>
                          <td>{$call['date']}</td>
                          <td>{$call['calling']}</td>
                          <td>{$call['called']}</td>
                          <td>{$call['destinatie']}</td>
                          <td>{$call['billed']}</td>
                          <td>{$call['tarif']}</td>
                          <td>{$call['cost']}</td>
                    </tr>";
}
echo '
                  </tbody>
                </table>
            ';