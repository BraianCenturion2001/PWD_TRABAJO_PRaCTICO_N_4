<!-- MENÚ DE NAVEGACIÓN -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark border rounded shadow-lg">
    <a class="navbar-brand" href="./index.php" title="Click para saltar al ejercicio">TP 4</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
        <div class="row mx-2">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Autos
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="./ListaAutos.php">Listado de autos</a>
                            <a class="dropdown-item" href="./BuscarAuto.php">Buscar auto</a>
                            <a class="dropdown-item" href="./NuevoAuto.php">Nuevo Auto</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Personas
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="./listaPersonas.php">Listado de personas</a>
                            <a class="dropdown-item" href="./BuscarPersona.php">Buscar y actualizar Persona</a>
                            <a class="dropdown-item" href="./NuevaPersona.php">Nueva Persona</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="./CambioDuenio.php">Cambio de dueño</a>
                    </li>
                </li>            
            </ul>
        </div>
        <div class="row mx-3">
            <ul class="navbar-nav mr-auto">                
                <li class="nav-item dropdown"> 
                    <a class='nav-link' href="./Consulta.php">Consultas</a>
                </li>                
            </ul>
        </div>
    </div>
</nav>