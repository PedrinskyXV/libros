<header class="mb-auto">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                ExFinal
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    
                    <a class="nav-link" href="<?=constant('URL')?>inicio/index" onclick="agregarAlTitulo('Inicio');">Inicio</a>

                    <?php if($_SESSION['rol'] == "1"): ?>
                        <a class="nav-link" href="<?=constant('URL')?>libro/index" onclick="agregarAlTitulo('Libros');">Libros</a>                    
                    <?php endif; ?>

                    <?php if($_SESSION['rol'] == "2"): ?>
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-mdb-toggle="dropdown" aria-expanded="false">
                            Reportes
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li>
                                <a class="dropdown-item" href="<?=constant('URL')?>informe/pdfEditorial" target="_blank">Reporte 1</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="<?=constant('URL')?>informe/pdfAutores">Reporte 2</a>
                            </li>
                        </ul>
                    </li>
                    <?php endif; ?>

                    <?php if($_SESSION['rol'] == "3"): ?>
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-mdb-toggle="dropdown" aria-expanded="false">
                            Gr??ficos
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li>
                                <a class="dropdown-item" href="<?=constant('URL')?>graficos/lineal">Grafico de Linea</a>
                                <a class="dropdown-item" href="<?=constant('URL')?>graficos/anillo">Grafico de Anillo</a>
                            </li>
                        </ul>
                    </li>
                    <?php endif; ?>                                                        

                    <div class="d-flex align-items-center">
                        <a class="btn btn-light px-3" href="<?=constant('URL')?>inicio/logout">Salir</a>
                        <a class="btn btn-warning px-3 ms-3" href="#">Rol: <?= $_SESSION['rol'] ?> </a>
                    </div>

                </div>
            </div>
        </div>
    </nav>
</header>