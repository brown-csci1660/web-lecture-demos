<?php
function _session_setup() {
    // Set cookie params
    // More info:  https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Set-Cookie
    session_set_cookie_params([
        'samesite' => 'None', // Allow this cookie to be sent when request made from different site
        'httponly' => false, // Don't allow Javascript to read this cookie
    ]);
    session_start();
}

?>
