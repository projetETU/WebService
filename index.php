<?php
require 'flight/Flight.php';
Flight::register('db','mysqli',array('mysql-itu.alwaysdata.net','itu','MENDRIKAmalal','itu_stat'));
Flight::route('GET /generals/', function () {
    $con = Flight::db();
    if ($con->connect_error) {
        die("ERREUR LORS DE LA CONNEXION À LA BASE DE DONNÉES");
    }

    $sql = "SELECT * FROM V_match";
    $rs = $con->query($sql);

    $data = array(); 
    if ($rs->num_rows > 0) {
        while ($row = $rs->fetch_assoc()) {
            $data[] = $row; 
        }
    }
    $con->close();
    Flight::json($data);
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
});
Flight::route('GET /defenses/', function () {
    $con = Flight::db();
    if ($con->connect_error) {
        die("ERREUR LORS DE LA CONNEXION À LA BASE DE DONNÉES");
    }

    $sql = "SELECT * FROM V_def";
    $rs = $con->query($sql);

    $data = array(); 
    if ($rs->num_rows > 0) {
        while ($row = $rs->fetch_assoc()) {
            $data[] = $row; 
        }
    }
    $con->close();
    Flight::json($data);
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
});
Flight::route('GET /attaks/', function () {
    $con = Flight::db();
    if ($con->connect_error) {
        die("ERREUR LORS DE LA CONNEXION À LA BASE DE DONNÉES");
    }

    $sql = "SELECT * FROM V_attaks";
    $rs = $con->query($sql);

    $data = array(); 
    if ($rs->num_rows > 0) {
        while ($row = $rs->fetch_assoc()) {
            $data[] = $row; 
        }
    }
    $con->close();
    Flight::json($data);
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
});
Flight::start();
