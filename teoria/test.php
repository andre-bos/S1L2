<?php
    session_start(); // leggo o inizializza una sessione su browser del client
    echo 'Variabile di sessione: ' . $_SESSION['user'];
    session_write_close();
?>