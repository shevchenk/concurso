<?php

$carreraId = $_GET['carrera_id'];
$file = "../json/asignaturas.json";
$json=file_get_contents($file);
$json = json_decode($json, true);
$asignaturas=[];

foreach ($json as $key => $value)
{
    if ($carreraId==$value['id']) {
        $asignaturas = $value['asignaturas'];
        break;
    }
}
echo json_encode($asignaturas);