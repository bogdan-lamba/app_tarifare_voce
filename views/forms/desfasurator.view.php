<div class="loading">
    <span>Please wait...</span><div class="loader"></div>
</div>

<form method="POST" action="/tarif_voce/index.php">
    <div class="form-row align-items-center">
        <div class="col-sm-3 my-1">
            <label for="account">Account:</label>
            <select class="form-control" id="account" name="account">
                <option value="0">--account--</option>
                <?php
                foreach ($accounts as $account){
                    echo '<option value="'.$account.'" ';
                        if($_POST['account']==$account) { echo ' selected'; }
                        echo '>'.$account.'</option>';
                }
                ?>
            </select>
        </div>
        <div class="col-sm-3 my-1">
            <label for="luna">Luna:</label>
            <select class="form-control" id="luna" name="luna">
                <?php
                    foreach ($months as $k=>$v){
                        echo '<option value="'.$k.'"';
                            if(!isset($_POST['luna'])) {
                                if($k==date('m')) { echo " selected"; }
                            } else {
                                if($_POST['luna']==$k) { echo " selected"; }
                            }
                        echo '>'.$v.'</option>';
                    }
                ?>
            </select>
        </div>
        <div class="col-sm-3 my-1">
            <label for="an">An:</label>
            <select class="form-control" id="an" name="an">
                <?php
                    foreach ($years as $year){
                        echo '<option value="'.$year.'" ';
                            if($_POST['an']==$year) { echo " selected"; }
                        echo '>'.$year.'</option>';
                    }
                ?>
            </select>
        </div>
            <div class="col-sm-1 my-1 pt-2">
                <label for="genereaza"> </label>
                <button type="submit" class="btn btn-primary " name="genereaza">Genereaza</button>
            </div>
    </div>
</form>


