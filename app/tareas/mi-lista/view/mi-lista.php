<!-- <h1 class="text-center">Mis tareas</h1> -->
<link rel="stylesheet" href="./style.css">
<hr>
<section class="row">
    <div class="col-md-4 col-lg-3 col-sm-6 col-12">
        <h3 class="text-center">Menu</h3>
        <hr><div>
                <div class="card-body">
                <img class="card-img-top" src="/mvc/app/imagen.jpeg" alt="Card image cap">
                    <h3>Usuario:  <?php echo $_SESSION["nombreusuario"]; ?> </h3>              
                    <a href="#" class="btn btn-dark"><i class="ri-user-fill"> </i>Perfil</a>
                    <a href="/MVC/logout" class="btn btn-dark"><i class="ri-logout-circle-line"> </i>LogOut</a>
                </div>
            </div>
        <ul class="list-group">
            <li class="list-group-item">
                <a href="/mvc/tareas/registro" class="btn btn-link">Nueva tarea</a>
            </li>
            <li class="list-group-item bg-primary">
                <a href="/mvc/tareas" class="btn btn-link text-white">Mis tareas</a>
            </li>
        </ul>
    </div>
    <div class="col row">
        <h3 class="text-center">Tareas</h3>
        <hr>
        <?php
            include_once("./app/tareas/repository/tareas.repository.php");
          
            $idusuario = (int) $_SESSION["usuarios"];

            $usuario = new User($idusuario, "", "", "");

            $tareas = TareasRepository::getInstance()->getAllTareas($usuario);

            // print_r($tareas);

            for ($i=0; $i < count($tareas); $i++) {
                $color = "";
                $ocultarbtn = "";
                switch ($tareas[$i]->getStatus()) {
                    case 'Pendiente':
                        $color = "primary";
                        break;

                    case 'Completado':
                        $color = "success";
                        $ocultarbtn="visually-hidden";
                        break;
                    
                    default:
                        $color = "danger";
                        break;
                }

                $html = "
                    <div class='col-12 mx-3'>
                        <div class='card mt-3 border-black'>
                            <div class='card-header bg-{$color}'>
                                <h4 class='card-title text-center text-white'>
                                    {$tareas[$i]->getTitulo()}
                                </h4>
                            </div>

                            <div class='card-body'>
                                <p class='card-text'>
                                    {$tareas[$i]->getDescripcion()}
                                </p>
                            </div>

                            <div class='card-footer'>
                                <div class='row align-items-center'>
                                    <p class='col card-text'></p>
                                    <p class='col card-text text-center text-{$color}'>
                                        <strong>&squf;</strong>{$tareas[$i]->getStatus()}
                                    </p>
                                    <p class='col card-text'>
                                    

                                    <form class='col'  method='POST' action=''>
                            <input type='hidden' name='completar' value='{$tareas[$i]->getId()}'>
                            <button type='submit' class='btn btn-success btn-sm {$ocultarbtn}'id='btn-completado{$tareas[$i]->getId()}' href='MVC/tareas/'>
                                Completado
                            </button>
                            
                        </form>
                                  
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                ";
                echo $html;
            }

            
        ?>
    </div>
</section>































