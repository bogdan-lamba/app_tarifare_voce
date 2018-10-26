<style>
    * {
        box-sizing: border-box;
    }

    #myInput {
        background-image: url('/css/searchicon.png');
        background-position: 10px 10px;
        background-repeat: no-repeat;
        width: 100%;
        font-size: 16px;
        padding: 12px 20px 12px 40px;
        border: 1px solid #ddd;
        margin-bottom: 12px;
    }
    </style>

<script>
    function myFunction() {
        var input, filter, table, tr, td, i;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
                if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>

<div class="col-sm-8">
    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Cauta Prefix..." title="Type
    in a name">

<table class="table table-striped" id="myTable">
    <thead>
    <tr>
        <th scope="col">Prefix</th>
        <th scope="col">Tarif (eurocent/minut)</th>
        <th scope="col">Destinatie</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach($tarife as $tarif) {
        echo "
            <tr>
                <td>{$tarif['prefix']}</td>
                <td>{$tarif['tarif']}</td>
                <td>{$tarif['destinatie']}</td>
            </tr>";
    }
    ?>
    </tbody>
</table>
</div>