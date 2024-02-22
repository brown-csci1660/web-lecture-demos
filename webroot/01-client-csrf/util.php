<?php
function _session_setup() {
    session_set_cookie_params([
        'samesite' => 'Strict',
        'httponly' => false, // Don't allow Javascript to read this cookie
    ]);
    session_start();
}

?>
