<?php
require_once 'Api.php';

$api = new Api();
$data = $api->getData();
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Site description" />
    <title>Netwrix Partner Locator</title>
    <link rel="stylesheet" href="/app.css">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
</head>

<body>

<script>
    document.addEventListener('partnersAppReady', (e) => {
        let data = <?= json_encode($data); ?>;
        e.detail.$set(data);
    })
</script>

<script src="/app.js"></script>
</body>

</html>
