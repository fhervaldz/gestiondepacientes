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
                        <a class="navbar-brand" href="dashboard.php">Dashboard</a>
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
                    <?php
          $idUsuario = $_SESSION['id']; 
          $tipoDeExamenes = obtenerTipoDeExamenes();
          if ($tipoDeExamenes->num_rows) {
            foreach ($tipoDeExamenes as $tipoDeExamen) :
          ?>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="title text-center"><?php echo $tipoDeExamen['nombreTipoExamen']; ?></h5>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group text-center">
                                            <a href="editar-tipo-examen.php?id=<?php echo $tipoDeExamen['idTipoExamen']; ?>" class="btn btn-info btn-round">
                                                Editar
                                            </a>
                                            <a href="#" data-id="<?php echo $tipoDeExamen['idTipoExamen']; ?>" data-tipo="tipo-examen" class="btn btn-danger btn-round borrar_registro">
                                                Eliminar
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <?php
                        endforeach;
                      } else{ ?>
                      <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="title">Registra tipos de examenes</h5>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
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