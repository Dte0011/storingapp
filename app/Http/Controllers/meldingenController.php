<?php

$attractie = $_POST['attractie'];
$type = $_POST['type'];
$capaciteit = $_POST['capaciteit'];
$prioriteit = isset($_POST['prioriteit']) ? 1 : 0; 
$melder = $_POST['melder'];
$overige_info = $_POST['overige_info'];
$status = $_POST['status'];

if (empty($_POST['gemeld_op'])) {
    $gemeld_op = date('Y-m-d H:i:s');
} else {
    $gemeld_op = date('Y-m-d H:i:s', strtotime($_POST['gemeld_op']));
}

require_once '../../../config/conn.php';

$query = "INSERT INTO meldingen (attractie, type, capaciteit, prioriteit, melder, gemeld_op, overige_info, status)
VALUES (:attractie, :type, :capaciteit, :prioriteit, :melder, :gemeld_op, :overige_info, :status)";

$statement = $conn->prepare($query);

$statement->execute([
    ":attractie" => $attractie,
    ":type" => $type,
    ":capaciteit" => $capaciteit,
    ":prioriteit" => $prioriteit,
    ":melder" => $melder,
    ":gemeld_op" => $gemeld_op,
    ":overige_info" => $overige_info,
    ":status" => $status,
]);

header("Location: " . $base_url . "/resources/views/meldingen/index.php?msg=success");