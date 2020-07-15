<?php
include("conexion.php");
?>


<?php include("includes/header.php") ?>

<div class="container p-4">
    <div class="col-md-5">
        <div class="card card-body bg-dark">
            <form method="POST" action="login.php">
                <div class="form-group">
                    <input class="form-control" type="text" name="ci" placeholder="Ci" autofocus required>
                </div>
                <div class="form-group">
                    <input class="form-control" type="password" name="pass" placeholder="Password" required>
                </div>
                <input type="submit" class="btn btn-primary btn-block" value="enviar">
            </form>
            <a href="registrar.php" data-toggle="modal" data-target="#myModal">Registrarse</a>
        </div>
    </div>
</div>


<!-- The Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content ">

            <!-- Modal Header -->
            <div class="modal-header bg-light">
                <h4 class="modal-title">Registrar usuario</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body bg-dark">

                <div class="card card-body text-white bg-dark">
                    <form method="POST" action="registrar.php" enctype='multipart/form-data'>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <input class="form-control" type="text" name="name" placeholder="Nombre" autofocus required>
                            </div>
                            <div class="form-group col-md-6">
                                <input class="form-control" type="text" name="lastname" placeholder="Apellidos" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <b><label for="cod_dep">Fecha de Nacimiento</label></b>
                            </div>
                            <div class="form-group col-md-3">
                                <input class="form-control" type="date" name="borndate" placeholder="Fecha de Nacimiento" required>
                            </div>
                            <div class="form-group col-md-3">
                                <b><label for="cod_dep">Código de departamento</label></b>
                            </div>

                            <div class="form-group col-md-3 select">
                                <select class="form-control" name="cod_dep" required>
                                    <option value="LP">La Paz</option>
                                    <option value="CH">Chuqisaca</option>
                                    <option value="CB">Cochabamba</option>
                                    <option value="OR">Oruro</option>
                                    <option value="PT">Potosi</option>
                                    <option value="TJ">Tarija</option>
                                    <option value="SC">Santa Cruz</option>
                                    <option value="BE">Beni</option>
                                    <option value="PD">Pando</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="card card-body p-4 mb-3">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="ci" placeholder="Ci" required>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="password" name="pass" placeholder="Password" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="card card-body p-4">
                                    <div class="row form-group">
                                        <select class="select form-control" name="color" required>
                                            <option style="background-color: #F0386B;" value="F0386B"></option>
                                            <option style="background-color: #FFA62B;" value="FFA62B"></option>
                                            <option style="background-color: #41337A;" value="41337A"></option>
                                        </select>
                                    </div>
                                    <div class="row form-group">
                                        <input type="file" name="photo" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-success btn-block" value="enviar">
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

<?php include("includes/footer.php") ?>