<?php

$listjson = file_get_contents('js/data.json');
header('Content-Type: application/json');
echo $listjson;