<?php 
    session_start()
?>


<?php
    // destroy the session
    session_destroy();
    header('Location: index.php');
    exit;
?>