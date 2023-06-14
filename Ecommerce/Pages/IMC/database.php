<?php 
 $server = '127.0.0.1';
 $username = 'root';
 $password = '';
 $database = 'php_login_database';

    try {
        $conn = new PDO("mysql:host=$server;dbname=$database;",$username, $password);
    } catch (PDOException $e) {
        die('connected failed: ' .$e -> getMessage());
    }

?> 
