<?php
//Funcion que te lleva al admin-o-cliente.php si no estas logueado. 
//Descomentar cuando funcione la parte del login.
  include_once 'funciones/sesiones.php';
  include_once 'funciones/funciones.php';
  include_once 'templates/header2.php';
?>

<body class="">
    <div class="wrapper">
        <?php include_once 'templates/barra.php'; ?>
        <div class="main-panel" id="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-transparent bg-primary navbar-absolute">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-toggle">
                            <button type="button" class="navbar-toggler">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </button>
                        </div>
                        <a class="navbar-brand" href="dashboard.php">Nuevo Examen</a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
                        aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <?php include_once 'templates/navbar-usuario.php'; ?>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="panel-header panel-header-lg">
                <canvas id="bigDashboardChart"></canvas>
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="title">Nuevo Examen</h5>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="modelo-examen.php" name="guardar-registro" id="guardar-registro">
                                    <div class="row">
                                        <div class="col-md-8 pr-1">
                                            <div class="form-group">
                                                <label for="inputState">Paciente</label>
                                                <select required name="idPaciente" id="inputState" class="form-control">
                                                    <option value="0" selected>Elige...</option>
                                                    <?php
                                                        $idUsuario = $_SESSION['id']; 
                                                        $pacientes = obtenerPacientes($idUsuario);
                                                        if ($pacientes->num_rows) {
                                                            foreach ($pacientes as $paciente) :
                                                        ?>
                                                    <option value="<?php echo $paciente['idPaciente']; ?>">
                                                        <?php echo $paciente['nombrePaciente'] . " " . $paciente['apellidoPaciente']; ?>
                                                    </option>
                                                    <?php
                                                            endforeach;
                                                        } else{ ?>

                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8 pr-1">
                                            <div class="form-group">

                                                <label for="inputState">Tipo de Examen</label>
                                                <select required name="idTipoDeExamen" id="inputState" class="form-control">
                                                    <option value="0" selected>Elige...</option>
                                            <?php
                                                $idUsuario = $_SESSION['id']; 
                                                $tipoDeExamenes = obtenerTipoDeExamenes();
                                                if ($tipoDeExamenes->num_rows) {
                                                    foreach ($tipoDeExamenes as $tipoDeExamen) :
                                                ?>
                                                    <option value="<?php echo $tipoDeExamen['idTipoExamen']; ?>"><?php echo $tipoDeExamen['nombreTipoExamen']; ?></option>
                                                    <?php
                                                            endforeach;
                                                        } else{ ?>

                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Información del Examen</label>
                                                <input name="infoExamen" required type="text" class="form-control"
                                                    placeholder="Información del Examen" value="" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                            <input type="hidden" name="registro" value="nuevo">
                                                <button type="submit" class="btn btn-success btn-round">
                                                    Crear
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <nav>
                        <ul>
                            <li>
                                <a href="https://www.creative-tim.com"> Creative Tim </a>
                            </li>
                            <li>
                                <a href="http://presentation.creative-tim.com"> About Us </a>
                            </li>
                            <li>
                                <a href="http://blog.creative-tim.com"> Blog </a>
                            </li>
                        </ul>
                    </nav>
                    <div class="copyright" id="copyright">
                        &copy;
                        <script>
                        document
                            .getElementById("copyright")
                            .appendChild(
                                document.createTextNode(new Date().getFullYear())
                            );
                        </script>
                        , Designed by
                        <a href="https://www.invisionapp.com" target="_blank">Invision</a>. Coded by
                        <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a>.
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <?php include_once 'templates/footer2.php'; ?>
</body>

</html>