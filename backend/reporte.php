<?php
include 'conexion.php';

$r = $conexion->query("SELECT * FROM pastel ORDER BY nombre");
$reporte = [];
while ($p = $r->fetch_assoc()) {
    $ings = $conexion->query("SELECT i.nombre, pi.cantidad, pi.unidad 
                              FROM pastel_ingrediente pi 
                              JOIN ingrediente i ON pi.id_ingrediente=i.id_ingrediente
                              WHERE pi.id_pastel={$p['id_pastel']}");
    $p['ingredientes'] = $ings->fetch_all(MYSQLI_ASSOC);
    $reporte[] = $p;
}
echo json_encode($reporte);
?>