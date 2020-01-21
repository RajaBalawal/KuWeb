<?php
if(isset($_SESSION['Message'])){
    echo '<div id="message">';
    echo '<div class="'.$_SESSION['Message']['type'].'">'.$_SESSION['Message']['msg'].'</div>';
    echo '</div>';
}

if($_SERVER['REQUEST_METHOD']!='POST'){
    if(isset($_SESSION['Message'])){
        unset($_SESSION['Message']);
    }
}
?>