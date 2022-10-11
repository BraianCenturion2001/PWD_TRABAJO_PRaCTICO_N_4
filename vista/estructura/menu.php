<!-- NAVBAR INICIO -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark border rounded">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="./index.php">Inicio</a>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-car-side"></i> AUTOS
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="./ListaAutos.php">Listado de Autos</a></li>
                        <li><a class="dropdown-item" href="./BuscarAuto.php">Buscar Auto</a></li>
                        <li><a class="dropdown-item" href="./NuevoAuto.php">Nuevo Auto</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-person"></i> PERSONAS
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="./listaPersonas.php">Listado de Personas</a></li>
                        <li><a class="dropdown-item" href="./BuscarPersona.php">Buscar y Actualizar Persona</a></li>
                        <li><a class="dropdown-item" href="./NuevaPersona.php">Nueva Persona</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./CambioDuenio.php"><i class="fas fa-people-arrows"></i> CAMBIO DUEÑO</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./Consulta.php"><i class="fa-solid fa-clipboard-question"></i> CONSULTAS</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- NAVBAR FIN -->