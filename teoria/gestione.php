

<?php 



    // Variabili SuperGlobali di PHP
    // Permettono di scambiare i dati con un client tramite una richiesta HTTP

    # $_SERVER
        // print_r($_SERVER);

        if($_SERVER['REQUEST_METHOD'] == 'GET') {
            echo '<h1> GET: ' . $_GET['firstname'] . ' ' . $_GET['lastname'] . '</h1>';
        } else if($_SERVER['REQUEST_METHOD'] == 'POST') {
            echo '<h1> POST: ' . $_POST['firstname'] . ' ' . $_POST['lastname'] . '</h1>';
        }
    # $_GET
        if(isset($_GET['firstname']) && isset($_GET['lastname'])) {
            var_dump($_GET);
            echo '<h1> GET: ' . $_GET['firstname'] . ' ' . $_GET['lastname'] . '</h1>';
        }
    # $_POST
        if(isset($_POST['firstname']) && isset($_POST['lastname'])) {
            var_dump($_POST);
            echo '<h1> POST: ' . $_POST['firstname'] . ' ' . $_POST['lastname'] . '</h1>';
        }
    # $_REQUEST
        echo '<h1>$_REQUEST</h1>';
        print_r($_REQUEST);
        echo '<h1>'. $_SERVER['REQUEST_METHOD'] .' : ' . $_REQUEST['firstname'] . ' ' . $_REQUEST['lastname'] . '</h1>';

    # $_FILES
        var_dump($_FILES['miofile']);
        $file_name = $_FILES['miofile']["name"];
        $file_type = $_FILES['miofile']["type"];
        $file_size = $_FILES['miofile']["size"];
        
        $target_dir = "uploads/";

        if(!empty($_FILES['miofile'])) {
            echo '<h3>File Name: ' . $file_name . '</h3>';
            echo '<h3>File Type: ' . $file_type . '</h3>';
            echo '<h3>File Size: ' . $file_size . '</h3>';
            if($file_type === 'image/png') {
                if($file_size < 400000) {
                    // is_uploaded_file è una funzione predefinita di PHP che controlla se un file è presente o meno
                    if(is_uploaded_file($_FILES['miofile']["tmp_name"]) && $_FILES['miofile']["error"] === UPLOAD_ERR_OK) {
                        // move_uploaded_file è una funzione predefinita di PHP che mi permette di spostare un file 
                        // caricato nella cartella temporanea in una cartella definitiva
                        if(move_uploaded_file($_FILES['miofile']["tmp_name"], $target_dir.$file_name)) {
                            echo 'Caricamento avvenuto con successo';
                        } else {
                            echo 'Errore!!!';
                        }
                    }
                } else {
                    echo 'FileSize troppo grande';
                }
            } else {
                echo 'FileType non supportato';
            }
        }
    # $_SESSION

        session_start(); // inizializza una sessione su browser del client
        $_SESSION['user'] = 'Mario Rossi';
        session_write_close();
        var_dump($_SESSION);


    # $_COOKIE


    // Redirect su altra pagina
    header('Location: http://localhost/Giorno-2_PHP_Teoria/test.php');

    
?>

