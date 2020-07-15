<?php
include("conexion.php");

session_start();
if (!isset($_SESSION['ci'])) {
    $_SESSION['ci'] = $_POST['ci'];
    $_SESSION['pass'] = $_POST['pass'];
}

$ci = $_SESSION['ci'];
$pass = $_SESSION['pass'];

if (!isset($ci) && !isset($pass)) {
    echo "<script>alert('El usuario o contraseña no coinciden...');</script>";
    header('Location: index.php');
}

//https://jsfiddle.net/mfX57/2149/
// PARA OBTENER LA IMAGEN DEL USUARIO ACTUAL
$sqlu = "SELECT * FROM usuario WHERE ci='$ci'";
$result = $conexion->query($sqlu);
$fila = mysqli_fetch_row($result);

$_SESSION['color'] = $fila[2];
$_SESSION['img'] = $fila[3];
// PARA OBTENER EL NOMBRE COMPLETO
$sqln = "SELECT * FROM identificador WHERE ci='$ci'";
$result = $conexion->query($sqln);
$fila = mysqli_fetch_row($result);


$_SESSION['nombre_completo'] = $fila[3];
$_SESSION['cod_dep'] = $fila[1];



include('./includes/header.php');

?>

<nav class="navbar navbar-dark" style="background-color: <?php echo '#' . $_SESSION['color'] ?>;">
    <div class="container">
        <div class="row">
            <div class="col-md-1">
                <a href="salir.php"><button class="btn btn-danger">Cerrar sesión</button></a>
            </div>
            <div class="col-md-1 p-0 color-white">
                <img class="card-img-top" src="<?php echo './imagenes/' . $_SESSION['img'] ?>" alt="Card image" style="width:100%">
            </div>
            <div class="col-md-5">
                <div class="card text-white bg-dark" style="width:200px">
                    <h4 class="card-title"><?php echo $_SESSION['nombre_completo']; ?></h4>

                </div>
            </div>
            <div class="col-md-5">
                <form method="POST" action="addMateria.php">
                    <div class="row">
                        <div class="col-md-4">
                            <input class="form-control " type="text" name="nom_mat" placeholder="Materia" required>
                        </div>
                        <div class="col-md-4">
                            <input class="form-control " type="text" name="nota" placeholder="Nota" required>
                        </div>
                        <div class="col-md-4">
                            <input type="submit" class="btn btn-dark btn-block " value="Añadir materia">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</nav>

<div class="row p-0 bg-light">
    <div class="col-md-4">
        <div class="card text-white bg-dark" style="width:400px">
            <img class="card-img-top" src="<?php echo './imagenes/' . $_SESSION['img'] ?>" alt="Card image" style="width:100%">
            <div class="card-body">
                <h4 class="card-title"><?php echo $_SESSION['nombre_completo']; ?></h4>
                <h6><?php echo $_SESSION['cod_dep'] ?></h6>
            </div>
        </div>
    </div>
    <div class="col-md-4 p-3">
        <h3 bg-dark>Tus Materias</h3>
        <table class="table table-hover ">
            <thead>
                <tr>
                    <th>Alumno</th>
                    <th>Materia</th>
                    <th>Nota</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $queryMat = "SELECT * FROM materia WHERE ci=$ci";
                $res_mat = mysqli_query($conexion, $queryMat);


                while ($row = mysqli_fetch_array($res_mat)) {
                ?>
                    <tr>
                        <td><?php echo $row['nom_comp'] ?></td>
                        <td><?php echo $row['nom_mat'] ?></td>
                        <td><?php echo $row['nota'] ?></td>
                    </tr>
                <?php } ?>
                <!-- //$queryMat = "SELECT nom_comp,nom_mat,nota FROM materia,identificador WHERE materia.ci=identificador.ci and materia.nota>51 GROUP BY ";
                ?> -->
            </tbody>
        </table>
    </div>
    <div class="col-md-4 p-3">
        <table class="table table-hover ">
            <thead>
                <tr>
                    <th>Cantidad de aprobados</th>

                    <th>Cod Dep</th>

                </tr>
            </thead>
            <tbody>
                <?php
                $queryAp = "SELECT COUNT(*) as numero ,cod_dep FROM materia,identificador WHERE materia.ci=identificador.ci and nota>51 group BY identificador.cod_dep";
                $res_Ap = mysqli_query($conexion, $queryAp);


                while ($row = mysqli_fetch_array($res_Ap)) {
                ?>
                    <tr>
                        <td><?php echo $row['numero'] ?></td>
                        <td><?php echo $row['cod_dep'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<?php
include('./includes/footer.php');
