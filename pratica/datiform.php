<?php

// Creo o leggo una sessione esistente

session_start();

// Setto l'array di $_REQUEST all'interno della sessione con la chiave userdata

$_SESSION['userdata'][] = $_REQUEST;

// Chiudo la sessione

session_write_close();

// Reindirizzo l'utente alla pagina precedente

header('Location: index.php');

?>