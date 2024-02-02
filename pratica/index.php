<?php

// Inizializzo la sessione
session_start();

// Stampo l'array di sessione per verificare che i dati siano presenti
print_r($_SESSION['userdata']);
?>

<!doctype html>
<html lang="IT">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestione dati in PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

    <div class="container-fluid p-0">
        <div class="row mt-3">
            <div class="col d-flex align-items-center flex-column">
                <h2>Registrati ora</h2>
                <form class="w-75" method="post" action="datiform.php">
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome">
                    </div>
                    <div class="mb-3">
                        <label for="cognome" class="form-label">Cognome</label>
                        <input type="text" class="form-control" id="cognome" name="cognome">
                    </div>
                    <div class="mb-3">
                        <label for="citta" class="form-label">Città</label>
                        <input type="text" class="form-control" id="citta" name="citta">
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col d-flex align-items-center flex-column">
                <h2>Utenti registrati</h2>
                <table class="table w-50">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Cognome</th>
                        <th scope="col">Città</th>
                        <th scope="col">Username</th>
                        <th scope="col">Password</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($_SESSION['userdata'] as $index => $user) {
                        ?>
                        <tr>
                            <th scope="row"><?php echo $index; ?></th>
                            <td><?php echo $user['nome']; ?></td>
                            <td><?php echo $user['cognome']; ?></td>
                            <td><?php echo $user['citta']; ?></td>
                            <td><?php echo $user['username']; ?></td>
                            <td><?php echo $user['password']; ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>