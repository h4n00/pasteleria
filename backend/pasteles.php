<?php
include 'conexion.php';
$m = $_SERVER['REQUEST_METHOD'];

if ($m == 'GET') {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $pastel = $conexion->query("SELECT * FROM pastel WHERE id_pastel=$id")->fetch_assoc();
        $ings = $conexion->query("SELECT pi.id_pastel_ingrediente, i.nombre, pi.cantidad, pi.unidad
                                  FROM pastel_ingrediente pi 
                                  JOIN ingrediente i ON pi.id_ingrediente=i.id_ingrediente
                                  WHERE pi.id_pastel=$id");
        $pastel['ingredientes'] = $ings->fetch_all(MYSQLI_ASSOC);
        echo json_encode($pastel);
    } else {
        $r = $conexion->query("SELECT * FROM pastel ORDER BY id_pastel DESC");
        echo json_encode($r->fetch_all(MYSQLI_ASSOC));
    }
}
elseif ($m == 'POST') {
    $d = json_decode(file_get_contents("php://input"), true);
    $conexion->query("INSERT INTO pastel (nombre, descripcion, preparado_por, fecha_creacion, fecha_vencimiento) 
                      VALUES ('{$d['nombre']}', '{$d['descripcion']}', '{$d['preparado_por']}', '{$d['fecha_creacion']}', '{$d['fecha_vencimiento']}')");
    echo json_encode(["ok" => true]);
}
elseif ($m == 'PUT') {
    $d = json_decode(file_get_contents("php://input"), true);
    $conexion->query("UPDATE pastel SET nombre='{$d['nombre']}', descripcion='{$d['descripcion']}', preparado_por='{$d['preparado_por']}',
                      fecha_creacion='{$d['fecha_creacion']}', fecha_vencimiento='{$d['fecha_vencimiento']}' 
                      WHERE id_pastel={$d['id_pastel']}");
    echo json_encode(["ok" => true]);
}
elseif ($m == 'DELETE') {
    $id = $_GET['id'];
    $conexion->query("DELETE FROM pastel WHERE id_pastel=$id");
    echo json_encode(["ok" => true]);
}
?>