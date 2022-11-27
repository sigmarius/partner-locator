<?php
require_once 'Api.php';
$api = new Api();

$status = $_GET['selected'] ?? '';

if ($status) {
    echo json_encode($api->getPartners($status));
}
