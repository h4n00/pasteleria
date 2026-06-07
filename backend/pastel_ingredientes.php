<?php
include 'conexion.php';
$m = $_SERVER['REQUEST_METHOD'];

if ($m == 'POST') {
    $d = json_decode(file_get_contents("php://input"), true);
    $conexion->query("INSERT INTO pastel_ingrediente (id_pastel, id_ingrediente, cantidad, unidad) 
                      VALUES ({$d['id_pastel']}, {$d['id_ingrediente']}, {$d['cantidad']}, '{$d['unidad']}')");
    echo json_encode(["ok" => true]);
}
elseif ($m == 'DELETE') {
    $id = $_GET['id'];
    $conexion->query("DELETE FROM pastel_ingrediente WHERE id_pastel_ingrediente=$id");
    echo json_encode(["ok" => true]);
}
?>