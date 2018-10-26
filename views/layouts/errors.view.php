<?php
if (!empty($errors)) {
    echo '<div class="form-group">
        <div class="alert alert-danger">
            <ul>';
    foreach($errors as $error) {
        echo '<li>'.$error.'</li>';
    }
    echo '</ul>
        </div>
    </div>';
}
