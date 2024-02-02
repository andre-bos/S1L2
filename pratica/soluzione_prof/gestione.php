<?php
    session_start();

    //var_dump($_FILES['image']);
    //print_r($_REQUEST);

    $contacts = isset($_SESSION['contacts'])  ?  $_SESSION['contacts'] : [] ;
    $target_dir = "uploads/";

    if(!empty($_FILES['image'])) {
        if($_FILES['image']["type"] === 'image/png' || $_FILES['image']["type"] === 'image/jpg') {
            if($_FILES['image']["size"] < 400000) {
                if(is_uploaded_file($_FILES['image']["tmp_name"]) && $_FILES['image']["error"] === UPLOAD_ERR_OK) {
                    if(move_uploaded_file($_FILES['image']["tmp_name"], $target_dir.$_REQUEST['firstname'].'-'.$_REQUEST['lastname'])) {
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

    
    $contact = [
        'Firstname' => $_REQUEST['firstname'], 
        'Lastname' => $_REQUEST['lastname'], 
        'City' => $_REQUEST['city'], 
        'Phone' => $_REQUEST['phone'],  
        'Email' => $_REQUEST['email'],
        'Image' => $target_dir.$_REQUEST['firstname'].'-'.$_REQUEST['lastname']];

    $_SESSION['contacts'] = [...$contacts, $contact];

    session_write_close();

    header('Location: http://localhost/S1L2/Esercizio/');
?>
