    <?php
    include("conexion.php");
    ?>


    <?php include("includes/header.php") ?>

    <?php
    // print_r($_POST);
    print_r($_FILES['photo']);
    $ci = $_POST['ci'];
    $pass = $_POST['pass'];
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $borndate = $_POST['borndate'];
    $cod_dep = $_POST['cod_dep'];
    $color = $_POST['color'];
    //IMAGEN
    $photo =  ($_FILES['photo']['name']) ? $_FILES['photo']['name'] : '';
    $Fecha = new DateTime();
    $nombreArchivo = ($photo != '') ? $Fecha->getTimestamp() . '_' . $_FILES['photo']['name'] : 'imagen.jpg';
    $tmpFoto = $_FILES['photo']['tmp_name'];
    if ($tmpFoto != '') {
        move_uploaded_file($tmpFoto, "./imagenes/" . $nombreArchivo);
    }
    //nombre completo
    $complet = $name . ' ' . $lastname;
    //query para guardar Usuario
    $query = "INSERT INTO usuario(ci, pass, color, img) VALUES ('$ci','$pass','$color','$nombreArchivo')";
    $response = mysqli_query($conexion, $query);
    //query para guardar Identificadors
    $query1 = "INSERT INTO identificador(ci, cod_dep, fecha_nac, nom_comp) VALUES ('$ci','$cod_dep','$borndate','$complet')";
    $response1 = mysqli_query($conexion, $query1);
    if (!$response1) {
        die("Query failed...");
    } else {
        header('Location: index.php');
    }
    ?>


    <?php include("includes/footer.php") ?>