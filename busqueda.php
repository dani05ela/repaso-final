<?php
$conexion =new mysqli("localhost","root","","bdd_pymes");

$id = $_GET['id'];


$sentencia = "SELECT c.CAT_ID, c.CAT_NOMBRE, p.PROD_NOMBRE, p.PROD_CODIGO
FROM tbl_categorias c
INNER JOIN tbl_productos p
ON c.CAT_ID = p.CAT_ID 
WHERE c.CAT_ID = $id";

$ejecucion = $conexion->query($sentencia);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>final</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="http://localhost/final">Inicio</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <button class="nav-link active" aria-current="page" onclick="cargar()">Categorias</button>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <?php
    $resp= " <table class='table table-hover'>
    <thead>
        <tr>
            <th>NOMBRE ID</th>
            <th>NOMBRE CATEGORIA</th>
            <th>NOMBRE PRODUCTO</th>
            <th>CODIGO PRODUCTO</th>
        </tr>
    </thead>
    <tbody>";

    while($cat = mysqli_fetch_array($ejecucion)){
        $resp.="<tr>
            <td>{$cat['CAT_ID']}</td>
            <td>{$cat['CAT_NOMBRE']}</td>
            <td>{$cat['PROD_NOMBRE']}</td>
            <td>{$cat['PROD_CODIGO']}</td>
    
        </tr>";
    }
    $resp.="</tbody>
    </table>";
    
    echo $resp;
    ?>

</body>

<footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="js/js.js"></script>
</footer>

</html>