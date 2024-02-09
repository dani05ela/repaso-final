<?php
$conexion =new mysqli("localhost","root","","bdd_pymes");

$sentencia = "SELECT c.CAT_ID, c.CAT_NOMBRE
FROM tbl_categorias c";

$ejecucion = $conexion->query($sentencia);

$resp= " <table class='table table-hover'>
<thead>
    <tr>
        <th>NOMBRE CATEGORIA</th>
        <th>BUSCAR</th>
    </tr>
</thead>
<tbody>";

while($cat = mysqli_fetch_array($ejecucion)){
    $resp.="<tr>
        <td>{$cat['CAT_NOMBRE']}</td>
        <td><a href='busqueda.php?id={$cat['CAT_ID']}'class='btn btn-danger' >Buscar</a></td>
    </tr>";
}
$resp.="</tbody>
</table>";

echo $resp;