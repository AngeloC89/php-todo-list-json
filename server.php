<?php

$listjson = file_get_contents('js/data.json');


$method = $_SERVER['REQUEST_METHOD'];
$list = json_decode($listjson, true);
if ($method === 'POST') {
    if (isset($_POST['id'])) {
        // Process POST data and update $listjson

        $listjsonNew = [
            'id' => (int) $_POST['id'],
            'city' => $_POST['city'],
            'done' => (bool) $_POST['done']
        ];
        $list[] = $listjsonNew;


    }
} elseif ($method === 'DELETE') {
    $obj = json_decode(file_get_contents('php://input'), true);
    $index = $obj['id'];
    array_splice($list, $index, 1);
} elseif ($method === 'PUT') {
    $obj = json_decode(file_get_contents('php://input'), true);
    $index = $obj['idd'];
    $list[$index]['done'] = $obj['done'];
}





$listjson = json_encode($list, JSON_PRETTY_PRINT);
file_put_contents('js/data.json', $listjson);


header('Content-Type: application/json');

echo $listjson;



