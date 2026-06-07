<?php
include 'conexion.php';
$m = $_SERVER['REQUEST_METHOD'];

if ($m == 'GET') {
    $r = $conexion->query("SELECT * FROM ingrediente ORDER BY id_ingrediente DESC");
    echo json_encode($r->fetch_all(MYSQLI_ASSOC));
}
elseif ($m == 'POST') {
    $d = json_decode(file_get_contents("php://input"), true);
    $conexion->query("INSERT INTO ingrediente (nombre, descripcion, fecha_ingreso, fecha_vencimiento) 
                      VALUES ('{$d['nombre']}', '{$d['descripcion']}', '{$d['fecha_ingreso']}', '{$d['fecha_vencimiento']}')");
    echo json_encode(["ok" => true]);
}
elseif ($m == 'PUT') {
    $d = json_decode(file_get_contents("php://input"), true);
    $conexion->query("UPDATE ingrediente SET nombre='{$d['nombre']}', descripcion='{$d['descripcion']}', 
                      fecha_ingreso='{$d['fecha_ingreso']}', fecha_vencimiento='{$d['fecha_vencimiento']}' 
                      WHERE id_ingrediente={$d['id_ingrediente']}");
    echo json_encode(["ok" => true]);
}
elseif ($m == 'DELETE') {
    $id = $_GET['id'];
    $conexion->query("DELETE FROM ingrediente WHERE id_ingrediente=$id");
    echo json_encode(["ok" => true]);
}
?>