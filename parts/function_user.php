<?php
    function isConnected() {
        if (isset($_SESSION['username'])) {
            return true;
        }
        else {
            return false;
        }
    }

    function checkIfUserExist($username) {
        $dbUrl = 'database';
        $port = '3306';
        $dbName = 'php_natif_resto';
        $user = 'root';
        $password = 'root';

        $connexion = new PDO('mysql:host='.$dbUrl.';port='.$port.';dbname='.$dbName, $user, $password);
        $query = $connexion->prepare('SELECT * FROM user WHERE username = :username');
        $query->execute(['username'=>$username]);
        $userInDB = $query->fetchAll();
        if (empty($userInDB)){
            return false;
        }
        else {
            return true;
        }

    }

