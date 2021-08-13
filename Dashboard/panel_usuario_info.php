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
                    <a href="../Dashboard/panel_usuario_fam.php?variable=<?php echo $usuario; ?>"><span class="las la-users"></span>
                        <span>Mis familiares</span></a>
                </li>
                <li>
                    <a href="../Dashboard/panel_usuario_hosp.php?variable=<?php echo $usuario; ?>"><span class="las la-hospital"></span>
                        <span>Hospitalización</span></a>
                </li>
                <li>
                    <a href="../Dashboard/panel_usuario_historial.php?variable=<?php echo $usuario; ?>"><span class="las la-list"></span>
                        <span>Mi historial</span></a>
                </li>
                <li>
                    <a href="" class="active"><span class="las la-user"></span>
                        <span>Mi informacion</span></a>
                </li>
                <li>
                    <a href="../Dashboard/panel_usuario_cita.php?variable=<?php echo $usuario; ?>"><span class="las la-user-circle"></span>
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
<!--
            <div class="cards">
                <div class="card-single">
                    <div>
                        <?php
                            $conn = mysqli_connect("localhost", "root","", "segurodb");
                            if (!$conn) {
                                die("Error de conexion: " . mysqli_connect_error());
                            }
                            $query = mysqli_query($conn,"SELECT * FROM paciente where usuario = '".$usuario."'");
                            $row = mysqli_fetch_array($query);
                        ?>
                        <span>Horarios</span>
                    </div>
                    <div>
                        <span class="las la-boxes"></span>
                    </div>
                </div>
            </div>
                        -->
            <div class="container">
                <div class="tittle">Mi informacion personal</div>
                    <div class="user-details">
                        <div class="input-box">
                                <span class="details">Seguro</span>
                                <input type="text" name="ResultadoExamen" id="ResultadoExamen" placeholder="<?php echo $row['numSeguro'] ?>" disabled="">
                        </div>
                        <div class="input-box">
                                <span class="details">Nombre</span>
                                <input type="text" name="Diagnostico" id="Diagnostico" placeholder="<?php echo $row['Nombre'] ?>" disabled="">
                        </div>
                        <div class="input-box">
                                <span class="details">Apellido</span>
                                <input type="text" name="Medicamentos" id="Medicamentos" placeholder="<?php echo $row['Apellido'] ?>" disabled="">
                        </div>
                        <div class="input-box">
                                <span class="details">DNI</span>
                                <input type="text" name="ResultadoExamen" id="ResultadoExamen" placeholder="<?php echo $row['DNI'] ?>" disabled="">
                        </div>
                        <div class="input-box">
                                <span class="details">Direccion</span>
                                <input type="text" name="Diagnostico" id="Diagnostico" placeholder="<?php echo $row['Domicilio'] ?>" disabled="">
                        </div>
                        <div class="input-box">
                                <span class="details">Numero celular</span>
                                <input type="text" name="Medicamentos" id="Medicamentos" placeholder="<?php echo $row['Telefono'] ?>" disabled="">
                        </div>
                        <div class="input-box">
                                <span class="details">Fecha Nacimiento</span>
                                <input type="text" name="ResultadoExamen" id="ResultadoExamen" placeholder="<?php echo $row['FechaNacimiento'] ?>" disabled="">
                        </div>
                    </div>
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