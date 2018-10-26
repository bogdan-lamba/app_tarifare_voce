<div class="alert alert-warning" role="alert">
    Atentie! Modificarea sau stergerea discounturilor existente va invalida desfasuratoarele generate pe acea perioada!
    <br>
    Setati 'Data End' pentru a incheia un discount.
</div>

<h3>Discounturi pe destinatie <!--<a href="/tarif_voce/discount/add" class="btn btn-primary">Adauga discount nou</a>--></h3>

<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Account</th>
        <th scope="col">Destinatie</th>
        <th scope="col">Valoare</th>
        <th scope="col">Data Start</th>
        <th scope="col">Data End</th>
        <!--<th scope="col" colspan="2">Actiuni</th>-->
    </tr>
    </thead>
    <tbody>
    <?php
    foreach($discounts as $discount) {
        echo "
            <tr>
                <th scope='row'>{$discount['id']}</th>
                <td>{$discount['account']}</td>
                <td>{$discount['destinatie']}</td>
                <td>{$discount['discount']}</td>
                <td>{$discount['data_start']}</td>
                <td>".($discount['data_end']=='9999-12-30' ? '-' : $discount['data_end'])."</td>
                <!--<td>Edit</td>
                <td>Delete</td>-->
            </tr>";
    }
    ?>
    </tbody>
</table>