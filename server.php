<?php

$listjson = file_get_contents('js/data.json');


$listjson = file_get_contents('js/data.json');

if (isset($_POST['id'])) {
    // Process POST data and update $listjson
    $list = json_decode($listjson, true);
    $listjson = [
        'id' => (int)$_POST['id'],
        'city' => $_POST['city'],
        'done' => (bool)$_POST['done']
    ];
    $list[] = $listjson;

    // **Update JSON file before sending response**
    $listjson = json_encode($list, JSON_PRETTY_PRINT);
    file_put_contents('js/data.json', $listjson);
}








header('Content-Type: application/json');

echo $listjson;

