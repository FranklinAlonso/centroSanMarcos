<?php 
    session_start();
    $usuario = $_SESSION['usuario'];
    if(isset($_SESSION['usuario'])){
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centro Medico San Marcos</title>
    <link rel="stylesheet" href="../CSS/estilo_admi.css">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="../images/favicon2.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="../images/apple-touch-icon.png">

    <link rel = "stylesheet" href = "https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" >
</head>
<body>
    <input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2><span class="las la-cross"></span><span>San Marcos</span></h2>
        </div>

        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="../Dashboard/panel_usuario.php?variable=<?php echo $usuario; ?>"><span class="las la-home"></span>
                        <span>Inicio</span></a>
                </li>
                <li>
                    <a href="../Dashboard/panel_usuario_fam.php?variable=<?php echo $usuario; ?> " class="active"><span class="las la-users"></span>
                        <span>Mis familiares</span></a>
                </li>
                <li>
                    <a href="../Dashboard/panel_usuario_hosp.php?variable=<?php echo $usuario; ?>"><span class="las la-hospital"></span>
                        <span>Hospitalización</span></a>
                </li>
                <li>
                    <a href="../Dashboard/panel_usuario_hisorial.php?variable=<?php echo $usuario; ?>"><span class="las la-list"></span>
                        <span>Mi historial</span></a>
                </li>
                <li>
                    <a href="../Dashboard/panel_usuario_info.php?variable=<?php echo $usuario; ?>"><span class="las la-clock"></span>
                        <span>Mi informacion</span></a>
                </li>
                <li>
                    <a href="" ><span class="las la-user-circle"></span>
                        <span>Sacar cita</span></a>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-content">
        <header>
            <h2>
                <label for="nav-toggle">
                    <span class="las la-bars"></span>
                </label>
                Dashboard
            </h2>

            <div class="user-wrapper">
                <div>
                    <h4><?php echo $usuario?></h4>
                    <small>Paciente</small>
                    <a href="salir2.php">Cerrar Sesion</a>
                </div>
            </div>
        </header>

        <main>

            <div class="container">
                <div class="tittle">Agregar Familiar</div>
                <form method="post" action="add_familiar.php" id="Registrar">
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Nombre Familiar</span>
                            <input type="text" name="nombre" id="nombre" placeholder="Ingresar Nombre">
                        </div>
                        <div class="input-box">
                            <span class="details">Apellido Familiar</span>
                            <input type="text" name="apellido" id="apellido" placeholder="Ingresar Apellido">
                        </div>
                        <div class="input-box">
                            <span class="details">DNI Familiar</span>
                            <input type="text" name="dni" id="dni" placeholder="Ingresar DNI">
                        </div>
                        <div class="input-box">
                            <span class="details">Celular Familiar</span>
                            <input type="text" name="telefono" id="telefono" placeholder="Ingresar Celular">
                        </div>
                    </div>
                    <div class="button">
                        <input type="submit" value="Agregar Familiar"></input>
                    </div>
                </form>
            </div>
        </main>
    </div>
</body>
</html>

<?php
    }else{
        header("location: login.html");
        exit();
    }
?>