<?php

function validate_session() {
    //Sees if a user is logged in before proceeding
    if(isset($_SESSION['username'])) {
        return true;
    } else {
        return false;
    }
}

?>